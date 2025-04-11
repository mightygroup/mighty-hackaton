"use strict";

import { CountDownTimer } from './js/CountDownTimer.js';

function getEndDate() {
    const endDateInput = document.getElementById('endDate');
    if (!endDateInput) {
        return undefined;
    } else {
        return endDateInput.value;
    }
}

(() => {

    // End date.
    const endDate = getEndDate();

    // Timer.
    const timerElement = document.getElementById('timer');
    if (timerElement) {
        new CountDownTimer(timerElement, endDate);
    }

})();