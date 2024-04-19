<?php
$server= "sql5.freesqldatabase.com";
$user= "sql5700277";
$pass = "hFG9fehTLV";
$db = "sql5700277";
$link = mysqli_connect($server, $user, $pass, $db);

// Verificar la conexión
if (!$link) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>