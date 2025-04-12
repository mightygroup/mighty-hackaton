<?php 
    $hackatonModel = $this->hackatonEvent ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mighty Hackaton</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/mighty-hackaton/backend/dist/css/style.css" >
    <link rel="stylesheet" type="text/css" href="/mighty-hackaton/backend/dist/css/timer.css" >
</head>
<body>

    <header>

        <!-- Logotype -->
        <div class="logo logo-large" aria-label="Logotype">
            <img src="/mighty-hackaton/backend/dist/images/mighty-firebird.svg" alt="Mighty" />
            <h1 class="logo-text">Hackaton</h1>
        </div>

        <!-- Music controls -->
        <section id="music" aria-label="Music controls">
            <!-- Play -->
            <button id="play" class="music-control-button is-active" title="Play music" aria-label="Play music button">
                <img src="/mighty-hackaton/backend/dist/images/sound_on.gif" alt="Sound on" />
                <span>Play</span>
            </button>
            <!-- Mute -->
            <button id="mute" class="music-control-button" title="Mute music" aria-label="Mute music button">
                <img src="/mighty-hackaton/backend/dist/images/sound_off.gif" alt="Sound off" />
                <span>Mute</span>
            </button>
            <!-- Audio player -->
            <audio id="audioPlayer" aria-hidden="true" autoplay>
                <source src="/mighty-hackaton/backend/dist/sound/MightyOutrun-84_.mp3" type="audio/mp3">
            </audio>
        </section>

    </header>

    <main>
        
        <!-- Timer -->
        <section id="timer">
            <h3>Time left</h3>
            <div class="timer-body">
                <p class="timer-body-col">
                    <span id="days" class="timer-value-text">00</span>
                    <span class="timer-small-text">Days</span>
                </p>
                <div class="timer-value-text">:</div>
                <p class="timer-body-col">
                    <span id="hours" class="timer-value-text">00</span>
                    <span class="timer-small-text">Hours</span>
                </p>
                <div class="timer-col-minutes timer-value-text">:</div>
                <p class="timer-col-minutes timer-body-col">
                    <span id="minutes" class="timer-value-text">00</span>
                    <span class="timer-small-text">Minutes</span>
                </p>
                <div class="timer-value-text timer-col-seconds">:</div>
                <p class="timer-col-seconds timer-body-col">
                    <span id="seconds" class="timer-value-text">00</span>
                    <span class="timer-small-text">Seconds</span>
                </p>
            </div>
        </section>

        <!-- Theme -->
        <section aria-label="Theme">
            <h2>Theme</h2>
            <ul>
                <li>A jump-over-obstacles game.</li>
                <li>Strive for 80’s GFX or retro.</li>
            </ul>
        </section>
        
        <!-- Rules -->
        <section aria-label="Rules">
            <h2>Rules</h2>
            <ol>
                <li>A game about jumping over obstacles.</li>
                <li>Must contain a score & life system.</li>
                <li>Must be playable on the browser.</li>
            </ol>
        </section>

        <!-- Submit -->
        <section aria-label="Submition">
            <h2>Submit</h2>
            <ul>
                <li>Must be a solo project.</li>
                <li>Submit by providing a link to your GitHub Repo.</li>
                <li>Must be on time!</li>
            </ul>
            <a href="#join" title="Click to join" aria-label="Action link">
                <span>Give it a shot</span>
                <span>Click to join</span>
            </a>
        </section>


    </main>

    <footer>

        <!-- Logotype -->
        <div class="logo" aria-label="Logotype">
            <img src="/mighty-hackaton/backend/dist/images/mighty-firebird.svg" alt="Mighty" />
            <h4 class="logo-text">Hackaton</h4>
        </div>
    </footer>

    <?php 
        if ($hackatonModel) {
            $endDate = $hackatonModel->getEndDate();
            echo "<input id='endDate' type='hidden' name='endDate' value='$endDate'>";
        }
    ?>

    <script src="/mighty-hackaton/backend/dist/main.js" type="module"></script>
</body>
</html>