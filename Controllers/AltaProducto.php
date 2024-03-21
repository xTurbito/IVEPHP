<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

// Verifica si los datos requeridos están presentes
if (isset($datos["nombre"], $datos["precio"], $datos["descripcion"], $datos["stock"], $datos["activo"])) {
    
    $nombre = $datos["nombre"];
    $precio = $datos["precio"];
    $descripcion = $datos["descripcion"];
    $stock = $datos["stock"];
    $lActivo = $datos["activo"];
   
    $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, lActivo) VALUES (?, ?, ?, ?, ?)";

    // Prepara la consulta
    $stmt = mysqli_prepare($link, $sql);

    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "ssidi", $nombre, $descripcion, $precio, $stock, $lActivo);

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
