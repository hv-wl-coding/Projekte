<?php
//Startet nach Log In Session für die jeweilige Dauer
session_start();
$_SESSION["step"] = 0;
if($_SERVER['REQUEST_METHOD'] == "POST"){}
?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name = $_POST["name"];
    echo $name;
}
?>

<html>
    <head>
    </head>
        <body>
            <form method="post" action="">
                <?php
                if($_SESSION["step"] == 0){
                echo "<span>Name</span><input type='text' name='name'>";
                $_SESSION["step"]++;
                }
                ?>
                <?php
                if($_SESSION["step"] == 1){
                echo "<span>Nachname</span><input type='text' name='nachname'>";
                $_SESSION["step"]++;
                }
                ?>
                <input tyoe="text" name="name">
                <input type="submit">
            </form>
        </body>
</html>
