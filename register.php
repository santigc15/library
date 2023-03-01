<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./assets/css/style.css">

    <title>Document</title>
</head>

<body>

<?php require("header.php"); ?>


<div class="form-container">
      <form action="newuser.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="name" required placeholder="Introduzca su nombre...">
        <label for="surname">Apellidos:</label>
        <input type="text" name="surname" required placeholder="Introduzca sus apellido...">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" required placeholder="Introduzca su DNI...">
        <label for="email">Email:</label>
        <input type="email" name="email" required placeholder="Introduzca su email...">
        <label>Contraseña:</label>
        <input type="password" name="password" required placeholder="Introduzca una contraseña..."> 
        <input type="submit" name="register" value="Registrar">
      </form>
    </div>


</body>

</html>
