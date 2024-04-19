<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

// Verifica si los datos requeridos están presentes
if (isset($datos["usuario"], $datos["nombre"], $datos["password"], $datos["idPerfil"], $datos["status"], $datos["id"])) {
    
    $id = $datos["id"];
    $usuario = $datos["usuario"];
    $nombre = $datos["nombre"];
    $password = $datos["password"];
    $Perfil = $datos["idPerfil"];
    $status = $datos["status"];

    $sql = "UPDATE usuarios SET usuario = ?, nombre = ?, password = ?, idPerfil = ?, lActivo = ? WHERE idusuario = ?";

    // Prepara la consulta
    $stmt = mysqli_prepare($link, $sql);

    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "ssssii", $usuario, $nombre, $password, $Perfil, $status, $id);

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
