<head>
    <meta charset="UTF-8">
    <title>PHP Kalender</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="topnav">
    <a href="Trainingsdaten.html">Trainingsdaten</a>
    <a href="GRIDKalender.html">GRID Kalender</a>
    <a href="KIKalender.html">KI Kalender</a>
    <a href="FinalKalender.php">Finaler Kalender</a>
    <a href="Auswertung.html">Auswertung</a>
    <a href="Impressum.html">Impressum</a>
</div>
</body>

<?php
//$monat = date('m');
//$jahr = date('Y');
$monat = '9';
$jahr = '2026';

$timestamp = mktime(0, 0, 0, $monat, 1, $jahr);
$anzahlTageImMonat = date('t', $timestamp);
$ersterTagInWoche = date('w', $timestamp);

//$anzahlTageImMonat = date ('t',mktime(0,0,0,$monat,1,$jahr));
//$ersterTagInWoche = date('w',mktime(0,0,0,$monat,1,$jahr));

$start = ($ersterTagInWoche == 0) ? 6 : $ersterTagInWoche - 1;

//$monatsName = date('F Y');
$monatsName = "September 2026";
?>

<h1><?php echo $monatsName; ?></h1>

<table>
    <thread>
        <tr>
            <th>Montag</th>
            <th>Dienstag</th>
            <th>Mittwoch</th>
            <th>Donnerstag</th>
            <th>Freitag</th>
            <th>Samstag</th>
            <th>Sonntag</th>
        </tr>
    </thread>
    <tbody>
        <tr>
            <?php
            for ($i = 0; $i < $start; $i++) {
                echo "<td></td>";}

            $aktuellerTagInWoche = $start;
            for ($tag = 1; $tag <= $anzahlTageImMonat; $tag++) {
                $heute = ($tag == date('j') && $monat == date('m') && $jahr == date('Y')) ? 'class="heute"':'';
                echo "<td $heute>$tag</td>";
                $aktuellerTagInWoche++;

                if ($aktuellerTagInWoche % 7 == 0 && $tag < $anzahlTageImMonat) {
                    echo "</tr><tr>";}
            }
            while ($aktuellerTagInWoche % 7 != 0) {
                echo "<td></td>";
                $aktuellerTagInWoche++;
            }
            ?>
        </tr>
    </tbody>
</table>