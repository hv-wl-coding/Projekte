<?php
    $name = $_POST["name"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];

    $host = "localhost";
    $user = "main";
    $pw = "aevyjtgihs.,.1";
    $db = "beispiel";
    $con = mysqli_connect($host, $user, $pw, $db);

    if ($con) {
        echo "<span>Erfolg!</span><br>";
        $sql_statement = "INSERT INTO User VALUES (0, '$name', '$age', '$gender', '$email')";
        $result = mysqli_query($con, $sql_statement);
            if($result) {
                var_dump($result);}
    }
    else {
        echo "<span>Fehler!</span><br>";}

//Videoupload
$zielordner = "C:\Users\it012616\Downloads\Projekt Pudding\Videos";

//Zielordner erstellen wenn nicht vorhanden
if (!is_dir($zielordner)) {
    mkdir($zielordner, 0755, true);}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//Vorübgerehende Datei auf dem Server
    $tmpName = $_FILES['videoFile']['tmp_name'];

//basename schützt den originalen Videonamen
    $dateiname = basename($_FILES['videoFile']['name']);

//Pfad mit Dateiname
    $zielpfad = $zielordner . $dateiname;

//vom vorübergehenden Ordner in Zielpfad schieben
    if (move_uploaded_file($tmpName, $zielpfad)) {
        echo "Das Video wurde erfolgreich in den Ordner '$zielordner' hochgeladen!";}
    else {
        echo "Fehler beim Hochladen des Videos.";}
}
?>
<div class="<?= $classname ?>">
    <?php
        echo $name."<br>";
        echo $age."<br>";
        echo $gender."<br>";
        echo $email."<br>";
    ?>
</div>
