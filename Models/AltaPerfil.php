<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

$Resultado = "error";

if(isset($datos["nombre"], $datos["permisos"])){
    $nombre = $datos["nombre"];
    $permisos = implode(",", $datos["permisos"]); // Une los permisos con una coma

    // Validación de datos
    if (empty($nombre)) {
        echo '{"Resultado":"El nombre no puede estar vacío"}';
        exit;
    }

    $sql = "INSERT INTO perfiles(NombrePerfil, Permisos) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $nombre, $permisos);
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
} else {
    $Resultado = "error: Los campos nombre y permisos son requeridos";
}

// Devuelve el resultado como un JSON
echo '{"Resultado":"'.$Resultado.'"}';
?>