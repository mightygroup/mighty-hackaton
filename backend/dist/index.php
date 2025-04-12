<?php 
    $hackatonModel = $this->hackatonEvent ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mighty Hackaton</title>
    <link rel="stylesheet" type="text/css" href="/mighty-hackaton/backend/dist/css/timer.css" >
</head>
<body>
    <header>

        <!-- Logotype -->
        <div aria-label="Logotype">
            
        </div>

    </header>
    <main>
        
        <!-- Timer -->
        <section id="timer">
            <p>Time left</p>
            <span id="days">00</span>
            <span>Days</span>
            <span>:</span>
            <span id="hours">00</span>
            <span>Hours</span>
            <span>:</span>
            <span id="minutes">00</span>
            <span>Minutes</span>
            <span>:</span>
            <span id="seconds">00</span>
            <span>Seconds</span>
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