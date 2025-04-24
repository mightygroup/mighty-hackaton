<?php 
    $hackatonModel = $this->hackatonEvent ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mighty Hackaton</title>
    <link rel="icon" type="image/x-icon" href="<?= Phro\Web\App::$BASE_FOLDER ?>/public/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= Phro\Web\App::$BASE_FOLDER ?>/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= Phro\Web\App::$BASE_FOLDER ?>/public/css/musicPlayer.css">
    <link rel="stylesheet" type="text/css" href="<?= Phro\Web\App::$BASE_FOLDER ?>/public/css/timer.css">
    <link rel="stylesheet" type="text/css" href="<?= Phro\Web\App::$BASE_FOLDER ?>/public/css/logo.css">
</head>
<body>

    <header>

        <!-- Music controls -->
        <section id="music" aria-label="Music controls">
            <!-- Play -->
            <button id="play" class="music-control-button is-active" title="Play music" aria-label="Play music button">
                <img src="<?= Phro\Web\App::$BASE_FOLDER ?>/public/images/sound_on.gif" alt="Sound on" />
                <span>Play</span>
            </button>
            <!-- Mute -->
            <button id="mute" class="music-control-button" title="Mute music" aria-label="Mute music button">
                <img src="<?= Phro\Web\App::$BASE_FOLDER ?>/public/images/sound_off.gif" alt="Sound off" />
                <span>Mute</span>
            </button>
            <!-- Audio player -->
            <audio id="audioPlayer" aria-hidden="true" autoplay>
                <source src="<?= Phro\Web\App::$BASE_FOLDER ?>/public/sound/MightyOutrun-84_.mp3" type="audio/mp3">
            </audio>
        </section>

        <!-- Logotype -->
        <div class="logo logo-large" aria-label="Logotype">
            <div class="logo-firebird cursor-gradient"></div>
            <h1 class="logo-text">Hackaton</h1>
        </div>

    </header>

    <main>
        
        <!-- Timer -->
        <section id="timer">
            <div class="cursor-gradient"></div>
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
        <section aria-label="Theme" class="card">
            <h2>Theme</h2>
            <ul>
                <li>A jump-over-obstacles game.</li>
                <li>Strive for 80’s GFX or retro.</li>
                <li>Can be 2D/3D or both!</li>
            </ul>
        </section>
        
        <!-- Rules -->
        <section aria-label="Rules" class="card">
            <h2>Rules</h2>
            <ol>
                <li>A game about jumping over obstacles.</li>
                <li>Must contain a score & life system.</li>
                <li>Must be playable on the browser.</li>
            </ol>
        </section>

        <!-- Submit -->
        <?php if ($hackatonModel->due()): ?>
        <section aria-label="Submition" class="card">
            <h2>Submit</h2>
            <ul>
                <li>Must be a solo project.</li>
                <li>Submit by providing a link to your GitHub Repo.</li>
                <li>Must be on time!</li>
            </ul>
            <form id="form" method="POST" aria-label="Submition form">
        
                <label class="input" for="name">Your name</label>
                <input id="name" type="text" name="name" aria-labeL="Name input">
                <label class="input-info" for="name">Enter your name</label>

                <label class="input" for="repo">Link to GitHub repo</label>
                <input id="repo" type="text" name="repo" aria-labeL="Project repo input">
                <label class="input-info" for="repo">Paste link to the project repo</label>

                <label class="button" for="submit" class="button">
                    <span>Click here</span>
                    <span>Submit project</span>
                </label>

                <input id="submit" type="submit" name="submit" aria-hidden="true">

            </form>
        </section>
        <?php endif; ?>


    </main>

    <footer>

        <!-- Logotype -->
        <div class="logo" aria-label="Logotype">
            <div class="logo-firebird cursor-gradient"></div>
            <h4 class="logo-text">Hackaton</h4>
        </div>
    </footer>

    <?php 
        if ($hackatonModel) {
            $endDate = $hackatonModel->getEndDate();
            echo "<input id='endDate' type='hidden' name='endDate' value='$endDate'>";
        }
    ?>

    <script src="<?= Phro\Web\App::$BASE_FOLDER ?>/public/main.js" type="module"></script>
</body>
</html>