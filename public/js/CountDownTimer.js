export class CountDownTimer {

    _MS_PER_SECOND = 1000;
    _MS_PER_MINUTE = 60 * this._MS_PER_SECOND;
    _MS_PER_HOUR = 60 * this._MS_PER_MINUTE;
    _MS_PER_DAY = 24 * this._MS_PER_HOUR;

    _daysLeftDisplay = null;
    _hoursLeftDisplay = null;
    _minutesLeftDisplay = null;
    _secondsLeftDisplay = null;

    elem = null;
    endDate = undefined;

    constructor(elem, endDate) {
        this.elem = elem;
        this.endDate = new Date(endDate);
        this._initDisplays();
    }

    start() {
        this._update();
        this.interval = setInterval(() => this._update(), 1000);
    }

    _update() {
        const now = new Date();
        const distance = this.endDate - now;
        if (distance <= 0) {
            clearInterval(this.interval);
            this._updateDisplays(0, 0, 0, 0);
            return;
        }
        const days = Math.floor(distance / this._MS_PER_DAY);
        const hours = Math.floor((distance % this._MS_PER_DAY) / this._MS_PER_HOUR);
        const minutes = Math.floor((distance % this._MS_PER_HOUR) / this._MS_PER_MINUTE);
        const seconds = Math.floor((distance % this._MS_PER_MINUTE) / this._MS_PER_SECOND);
        this._updateDisplays(days, hours, minutes, seconds);
    }

    _updateDisplays(days, hours, minutes, seconds) {
        if (!this._daysLeftDisplay || !this._hoursLeftDisplay || !this._minutesLeftDisplay || !this._secondsLeftDisplay) return;
        this._daysLeftDisplay.textContent = String(days).padStart(2, '0');
        this._hoursLeftDisplay.textContent = String(hours).padStart(2, '0');
        this._minutesLeftDisplay.textContent = String(minutes).padStart(2, '0');
        this._secondsLeftDisplay.textContent = String(seconds).padStart(2, '0');
    }

    _initDisplays() {
        this._daysLeftDisplay = document.getElementById('days');
        this._hoursLeftDisplay = document.getElementById('hours');
        this._minutesLeftDisplay = document.getElementById('minutes');
        this._secondsLeftDisplay = document.getElementById('seconds');
        if (!this._daysLeftDisplay || !this._hoursLeftDisplay || !this._minutesLeftDisplay || !this._secondsLeftDisplay) {
            console.error("Missing timer display elements!");
        }
    }

}
