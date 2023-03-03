
<?php


if (isset($_POST["login"])) {
    require_once("database.php");

    $usuario = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $database = new Database();
    $dbh = $database->dbh;

    $database->compruebaUser($dbh, $usuario, $contrasena);

   
} else {
    require_once("login.php");
}


?>
        