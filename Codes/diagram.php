<?php
// Aktivieren der Fehleranzeige für Entwicklung
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Beispiel-Daten (könnten auch aus einer Datenbank kommen)
$data = [
    "Januar" => 120,
    "Februar" => 90,
    "März" => 150,
    "April" => 60
];

// Bildgröße
$width = 500;
$height = 300;

// Erstelle ein leeres Bild
$image = imagecreatetruecolor($width, $height);

// Farben definieren
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$blue  = imagecolorallocate($image, 0, 102, 204);

// Hintergrund füllen
imagefilledrectangle($image, 0, 0, $width, $height, $white);

// Diagramm-Parameter
$barWidth = 50;
$gap = 30;
$maxValue = max($data);
$scale = ($height - 50) / $maxValue; // Skalierung für Höhe

// Balken zeichnen
$x = 50;
foreach ($data as $label => $value) {
    $barHeight = $value * $scale;
    imagefilledrectangle(
        $image,
        $x,
        $height - 30 - $barHeight,
        $x + $barWidth,
        $height - 30,
        $blue
    );
    // Beschriftung
    imagestring($image, 3, $x, $height - 25, $label, $black);
    imagestring($image, 3, $x, $height - 45 - $barHeight, $value, $black);
    $x += $barWidth + $gap;
}

// Ausgabe als PNG
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>
