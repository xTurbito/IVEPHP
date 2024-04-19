<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

// Verifica si los datos requeridos están presentes
if(isset($datos["total"], $datos["cajera"], $datos["cliente"])) {
    
 
    $total = $datos["total"];
    $cajera = $datos["cajera"];
    $cliente = $datos["cliente"];

    // Agrega la fecha actual
    $fecha = date("Y-m-d H:i:s");

    $sql = "INSERT INTO ventas (cajera, cliente, total, fecha) VALUES (?, ?, ?, ?)";

    // Prepara la consulta
    $stmt = mysqli_prepare($link, $sql);

    // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "ssds", $cajera, $cliente, $total, $fecha);    

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

echo '{"Resultado":"'.$Resultado.'"}';
?>