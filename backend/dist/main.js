"use strict";

import { CountDownTimer } from './js/CountDownTimer.js';
import { MusicPlayer } from './js/MusicPlayer.js';

function getEndDate() {
    const endDateInput = document.getElementById('endDate');
    if (!endDateInput) {
        return undefined;
    } else {
        return endDateInput.value;
    }
}

function initTimer() {
    const endDate = getEndDate();
    const timerElement = document.getElementById('timer');
    if (!timerElement || !endDate) {
        console.error("Missing the timer element or the time data!");
    } else {
        const timer = new CountDownTimer(timerElement, endDate);
        timer.start();
    }
}

function initMusicPlayer() {
    const playButtonElement = document.getElementById("play");
    const muteButtonElement = document.getElementById("mute");
    const audioElement = document.getElementById("audioPlayer");
    if (!playButtonElement || !muteButtonElement || !audioElement) {
        console.error("Missing mute/play music buttons.");
    } else {
        const musicPlayer = new MusicPlayer();
        musicPlayer.setPlayButton(playButtonElement);
        musicPlayer.setMuteButton(muteButtonElement);
        musicPlayer.setAudioElement(audioElement);
    }
}

// Main.
(() => {
    initMusicPlayer();
    initTimer();
})();