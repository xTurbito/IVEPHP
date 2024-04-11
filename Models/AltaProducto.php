<?php
require_once "../config/dbcontext.php";


$nombre = $_POST["nombre"];
$precio_costo = $_POST["precio_costo"];
$precio_venta = $_POST["precio_venta"];
$descripcion = $_POST["descripcion"];
$stock = $_POST["stock"];
$lActivo = $_POST["activo"];
$Departamento = $_POST["departamento"];
$fotoproducto = $_FILES["fotoproducto"]["name"];

$sql = "INSERT INTO productos (nombre, descripcion, precio_venta, stock, lActivo, precio_costo, IDDepartamento, fotoproducto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($link, $sql);

$fecha_foto = new DateTime();
$nombreArchivo_foto = ($fotoproducto != '') ? $fecha_foto->getTimestamp()."_".$_FILES["fotoproducto"]["name"] : "";

$tmp_fotoproducto = $_FILES["fotoproducto"]["tmp_name"];

if ($tmp_fotoproducto != '') {
    move_uploaded_file($tmp_fotoproducto,"../images/".$nombreArchivo_foto);
}

mysqli_stmt_bind_param($stmt, "ssiddids", $nombre, $descripcion, $precio_venta, $stock, $lActivo, $precio_costo, $Departamento, $nombreArchivo_foto);

// Ejecutamos la consulta
if (mysqli_stmt_execute($stmt)) {
    $Resultado = "ok";
} else {
    $Resultado = "error: " . mysqli_stmt_error($stmt);
}


mysqli_stmt_close($stmt);


echo '{"Resultado":"' . $Resultado . '"}';;
