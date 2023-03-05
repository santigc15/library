<?php


if (isset($_POST['register'])) {
    require_once("database.php");

    $datos = array();

    $datos["nombre"] = $_POST['nombre'];
    $datos["apellidos"] = $_POST['apellidos'];
    $datos["dni"] = $_POST['dni'];
    $datos["email"] = $_POST['email'];
    $datos["contrasena"] = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
    $database = new Database();
    $dbh = $database->dbh;

    $database->insertUser($dbh, $datos);
    header('Location: login.php');
} else {
    require_once("register.php");
}
