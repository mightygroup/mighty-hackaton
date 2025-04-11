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