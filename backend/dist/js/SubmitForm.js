export class SubmitForm {

    _form = null;
    _hasError = false;

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
                this._send(formData);
            }, (error) => {
                this._applyErrorClassToInput(error);
            });
    }

    _send(data) {
        const post = async (data) => {
            const url = 'http://localhost/mighty-hackaton/backend/api/submit';
            return fetch(url, {
                method: 'POST',
                body: data,
            })
            .then((res) => {
                if (!res.ok) {
                    throw new Error(res);
                } else {
                    return res.json();
                }
            })
            .then(data => data);
        };
        post(data)
            .then((res) => {
                console.log(res);
            })
            .catch((error) => {
                console.error(error);
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