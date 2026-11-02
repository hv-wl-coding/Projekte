<?php
$monat = date('m');
$jahr = date('Y');

$timestamp = mktime(0, 0, 0, $monat, 1, $jahr);
$anzahlTageImMonat = date('t', $timestamp);
$ersterTagInWoche = date('w', $timestamp);

$start = ($ersterTagInWoche == 0) ? 6 : $ersterTagInWoche - 1;

$monatsNamenEnglisch = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$monatsNamenDeutsch = ['Januar', 'Februar', 'März', 'April', 'Mai', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'Dezember'];
$monatsName = str_replace($monatsNamenEnglisch, $monatsNamenDeutsch, date('F Y', $timestamp));
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Trainingsdaten - <?php echo $monatsName; ?></title>
</head>
<body>
<div class="topnav">
    <a href="Trainingsdaten.html">Trainingsdaten</a>
    <a href="GRIDKalender.html">GRID Kalender</a>
    <a href="PHPKalender.php">PHP Kalender</a>
    <a href="KIKalender.html">KI Kalender</a>
    <a href="Auswertung.html">Auswertung</a>
    <a href="Impressum.html">Impressum</a>
</div>

<div class="monat">
    <h1><?php echo $monatsName; ?></h1>
</div>

<div id="popup" popover class="popup-overlay">
    <div class="popup-content">
        <h2>Trainingsdaten</h2>
        <p>Übung</p>
        <p>Sätze</p>
        <p>Wiederholungen</p>
        <button popovertarget="popup" class="cancel">Close</button>
    </div>
</div>

<div class="grid-container">
    <div></div>
    <div class="grid-kw">Montag</div>
    <div class="grid-kw">Dienstag</div>
    <div class="grid-kw">Mittwoch</div>
    <div class="grid-kw">Donnerstag</div>
    <div class="grid-kw">Freitag</div>
    <div class="grid-kw">Samstag</div>
    <div class="grid-kw">Sonntag</div>

    <?php
    $aktuelleKW = (int)date('W', $timestamp);
    echo '<div class="grid-kw">KW ' . $aktuelleKW . '</div>';

    for ($i = 0; $i < $start; $i++) {
        echo '<div></div>';}

    $aktuellerTagInWoche = $start;

    for ($tag = 1; $tag <= $anzahlTageImMonat; $tag++) {
        $heute = ($tag == date('j') && $monat == date('m') && $jahr == date('Y')) ? 'class="grid-item heute"' : 'class="grid-item"';
        echo '<div ' . $heute . '><button popovertarget="popup">' . $tag . '</button></div>';
        $aktuellerTagInWoche++;

        if ($aktuellerTagInWoche % 7 == 0 && $tag < $anzahlTageImMonat) {
            $aktuelleKW++;
            echo '<div class="grid-kw">KW ' . $aktuelleKW . '</div>';}
    }
    while ($aktuellerTagInWoche % 7 != 0) {
        echo '<div></div>';
        $aktuellerTagInWoche++;}
    ?>
</div>

    <div class="container" style="background-color:#f1f1f1">
        <br><button type="reset" class="cancel">Cancel</button>
    </div>
</body>
</html>
