<?php
require_once "../config/dbcontext.php";

$id = $_POST["id"];
$nombre = $_POST["nombre"];
$precio_costo = $_POST["precio_costo"];
$precio_venta = $_POST["precio_venta"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$lActivo = $_POST["activo"];
$Departamento = $_POST["departamento"];
$fotoproducto = $_FILES["fotoproducto"]["name"];

$sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio_venta = ?, stock = ?, lActivo = ?, precio_costo = ?, IDDepartamento = ? WHERE IDProducto = ?";
$stmt = mysqli_prepare($link, $sql);
mysqli_stmt_bind_param($stmt, "ssiddidi", $nombre, $descripcion, $precio_venta, $stock, $lActivo, $precio_costo, $Departamento, $id);

// Ejecutamos la consulta
if (mysqli_stmt_execute($stmt)) {
    $Resultado = "ok";
} else {
    $Resultado = "error: " . mysqli_stmt_error($stmt);
}





mysqli_stmt_close($stmt);

echo '{"Resultado":"' . $Resultado . '"}';
?>