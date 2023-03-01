<?php


if (isset($_POST['register'])) {
            require_once("database.php");

            $datos = array();

            $datos["nombre"] = $_POST['name'];
            $datos["surname"] = $_POST['surname'];
            $datos["dni"] = $_POST['dni'];
            $datos["email"] = $_POST['email'];
            $datos["contrasena"] = $_POST['password'];
  $database =new Database();
  $dbh = $database->dbh;

 $database->insertUser($dbh, $datos);
 header('Location: login.php');       

        } else {
            require_once("register.php");
        }