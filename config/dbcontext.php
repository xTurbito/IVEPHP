<?php
$server= "localhost";
$user= "root";
$pass = "";
$db = "ive";
$link = mysqli_connect($server, $user, $pass, $db);

// Verificar la conexión
if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>