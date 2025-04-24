export class SubmitForm {

    _form = null;
    _hasError = false;
    _sending = false;

    constructor(form) {
        this._form = form;
        form.addEventListener('submit', this._onSubmit.bind(this));
    }

    _onSubmit(_ev) {
        _ev.preventDefault();
        const formData = new FormData(this._form);
        this._resetErrorClass();
        this._validate(formData, 
            () => {
                this._send(formData, 
                    () => this._sent(), 
                    () => this._fail(), 
                    () => this._loading()
                );
            }, (error) => {
                this._applyErrorClassToInput(error);
            });
    }

    _loading() {
        this._form.classList.remove('has-error');
        this._form.classList.remove('has-sent');
        this._form.classList.add('is-loading');
        const button = this._form.querySelector('label.button');
        if (button) {
            const firstText = button.children[0];
            const primaryText = button.children[1];
            firstText.innerHTML = "Please wait";
            primaryText.innerHTML = "Sending project...";
        }
    }

    _sent() {
        this._sending = false;
        this._form.classList.remove('has-error');
        this._form.classList.remove('is-loading');
        this._form.classList.add('has-sent');
        const button = this._form.querySelector('label.button');
        if (button) {
            const name = this._grabFirstname();
            const firstText = button.children[0];
            const primaryText = button.children[1];
            firstText.innerHTML = "Sent project successfully";
            primaryText.innerHTML = "Thank you" + (", " + name ?? "") + "!";
        }
    }

    _grabFirstname() {
        const input = document.getElementById('name');
        if (input) {
            return input.value.split(' ')[0];
        }
        return undefined;
    }

    _fail() {
        this._form.classList.remove('is-loading');
        this._form.classList.remove('has-sent');
        this._form.classList.add('has-error');
        const button = this._form.querySelector('label.button');
        if (button) {
            const firstText = button.children[0];
            const primaryText = button.children[1];
            firstText.innerHTML = "Error occurred";
            primaryText.innerHTML = "Failed to send project";
        }
    }

    _send(data, onSuccess, onError, onLoad) {
        if (!this._sending) {
            console.log("Sending...");
            this._sending = true;
            this._disableFormInputs();
            if (onLoad) onLoad();
            const post = async (data) => {
                const url = 'api/submit';
                return fetch(url, {
                    method: 'POST',
                    body: data,
                })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error(response);
                    } else {
                        return response.json();
                    }
                })
                .then(data => data);
            };
            post(data)
                .then((response) => {
                    window.setTimeout(() => {
                        onSuccess(response);
                    }, 2000);
                })
                .catch((error) => {
                    window.setTimeout(() => {
                        console.error(error);
                        onError(error);
                    }, 2000);
                })
                .finally(() => {
                    this._enableFormInputs();
                });
        }
    }

    _disableFormInputs() {
        Array.from(this._form.children).forEach((child) => {
            if (child instanceof HTMLInputElement) {
                child.disabled = true;
            }
        });
    }

    _enableFormInputs() {
        Array.from(this._form.children).forEach((child) => {
            if (child instanceof HTMLInputElement) {
                child.disabled = false;
            }
        });
    }

    _applyErrorClassToInput(error) {
        Array.from(this._form.children).forEach((child) => {
            if (child.name === error[0]) {
                child.classList.add('has-error');
            }
        });
    }
    
    _resetErrorClass() {
        Array.from(this._form.children).forEach((child) => {
            if (child.classList.contains('has-error')) {
                child.classList.remove('has-error');
            }
        });
    }

    _validate(formData, onSuccessCallback, onErrorCallback) {
        this._hasError = false;
        for (const [key, value] of formData.entries()) {
            if (key === 'name') {
                if (value.length < 1) {
                    this._hasError = true;
                    onErrorCallback([key, value]);
                }
            } else if (key === 'repo') {
                const pattern = new RegExp(/^https:\/\/github\.com\/\w+/);
                if (!pattern.test(value)) {
                    this._hasError = true;
                    onErrorCallback([key, value]);
                }
            }
        }
        if (!this._hasError) {
            onSuccessCallback();
        }
    }

}