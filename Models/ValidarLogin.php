<?php 
session_start();
require_once "../config/dbcontext.php";
$json = file_get_contents("php://input");
$datos = json_decode($json, true);  

$Resultado = "error";

if(isset($datos["usuario"], $datos["password"])) {
    $usuario = $datos["usuario"];
    $password = $datos["password"];

    $sql = "SELECT * FROM usuarios WHERE usuario = ? AND password = ?";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $usuario, $password);
        if (mysqli_stmt_execute($stmt)) {
            $Resultado = "ok";
            $_SESSION["usuario"] = $usuario;
        } else {
            $error = error_get_last();
            $Resultado = "error: " . mysqli_stmt_error($stmt) . " - " . $error['message'];
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = error_get_last();
        $Resultado = "error: " . mysqli_error($link) . " - " . $error['message'];
    }
}

echo '{"Resultado":"'.$Resultado.'"}';
?>