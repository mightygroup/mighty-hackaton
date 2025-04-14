export class MusicPlayer {

    _playButton = null;
    _muteButton = null;
    _audio = null;

    _FLAG_IS_PLAYING = false;
    _FIRST_TIME = true;

    constructor() {}

    setPlayButton(button) {
        this._playButton = button;
        this._playButton.addEventListener('click', this.play.bind(this));
    }

    setMuteButton(button) {
        this._muteButton = button;
        this._muteButton.addEventListener('click', this.mute.bind(this));
    }

    setAudioElement(audio) {
        this._audio = audio;
    }

    play(_ev) {
        this._FLAG_IS_PLAYING = true;
        this._updateState();
    }

    mute(_ev) {
        this._FLAG_IS_PLAYING = false;
        this._updateState();
    }

    _hideButton() {
        const activeClassName = 'is-active';
        if (this._FLAG_IS_PLAYING) {
            this._playButton.classList.remove(activeClassName);
            this._muteButton.classList.add(activeClassName);
        } else {
            this._playButton.classList.add(activeClassName);
            this._muteButton.classList.remove(activeClassName);
        }
    }

    _updateState() {
        if (this._FLAG_IS_PLAYING) {
            if (this._FIRST_TIME) {
                this._FIRST_TIME = false;
                this._skipToCoolPart();
            }
            this._audio.play();
        } else {
            this._audio.pause();
        }
        this._hideButton();
    }

    _skipToCoolPart() {
        this._audio.currentTime += 29.5;
    }

}