<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

$Resultado = "error";

if(isset($datos["usuario"], $datos["password"], $datos["nombre"], $datos["tipo"])) {
    // Validar los datos recibidos
    $usuario = $datos["usuario"];
    $password = $datos["password"];
    $nombre = $datos["nombre"];
    $tipo_usuclave = $datos["tipo"]; 

    $lActivo = 1;

    $sql = "INSERT INTO usuarios(usuario, password, nombre, tipo_usuclave, lActivo) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssi", $usuario, $password, $nombre, $tipo_usuclave, $lActivo);
        if (mysqli_stmt_execute($stmt)) {
            $Resultado = "ok";
        } else {
            $Resultado = "error: " . mysqli_stmt_error($stmt);
        }

        // Cierra la consulta preparada
        mysqli_stmt_close($stmt);
    } else {
        $Resultado = "error: " . mysqli_error($link);
    }
}

// Devuelve el resultado como un JSON
echo '{"Resultado":"'.$Resultado.'"}';
?>
