<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

// Verifica si los datos requeridos están presentes
if (isset($datos["usuario"], $datos["nombre"], $datos["password"], $datos["tipo"])) {
    
    $usuario = $datos["usuario"];
    $nombre = $datos["nombre"];
    $password = $datos["password"];
    $tipo = $datos["tipo"];

    // Establece lActivo en 1
    $lActivo = 1;

    $sql = "INSERT INTO usuarios (usuario, nombre, password, tipo_usuclave,lActivo) VALUES (?, ?, ?, ?, ?)";

    // Prepara la consulta
    $stmt = mysqli_prepare($link, $sql);

    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "ssssi", $usuario, $nombre, $password, $tipo, $lActivo);

    // Ejecuta la consulta
    if (mysqli_stmt_execute($stmt)) {
        $Resultado = "ok";
    } else {
        $Resultado = "error: " . mysqli_stmt_error($stmt);
    }

    // Cierra la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    // Si falta algún dato requerido
    $Resultado = "error";
}

// Devuelve el resultado como un JSON
echo '{"Resultado":"'.$Resultado.'"}';

?>

