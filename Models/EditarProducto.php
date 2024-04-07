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

$fotoproducto=(isset($_FILES['fotoproducto']['name']))?$_FILES['fotoproducto']['name']:"";
$fecha = new DateTime();
$nombreArchivo_foto = ($fotoproducto != '') ? $fecha->getTimestamp()."_".$_FILES["fotoproducto"]["name"] : "";
$tmp_fotoproducto = $_FILES["fotoproducto"]["tmp_name"];

if ($tmp_fotoproducto != '') {
    move_uploaded_file($tmp_fotoproducto,"../images/".$nombreArchivo_foto);
    $query = $link->prepare("SELECT fotoproducto FROM productos WHERE IDProducto = ?");
    $query->bind_param("s", $id);
    $query->execute(); // Ejecutar la consulta
    $resultado = $query->get_result(); // Obtener el resultado
    $registro_recuperado = $resultado->fetch_assoc(); // Obtener el resultado como un array asociativo
    if(isset($registro_recuperado["fotoproducto"]) && $registro_recuperado["fotoproducto"]!=""){
        if(file_exists("../images/".$registro_recuperado["fotoproducto"])){
            unlink("../images/".$registro_recuperado["fotoproducto"]);
        }
    }
    $query = $link->prepare("UPDATE productos SET fotoproducto = ? WHERE IDProducto = ?");
    $query->bind_param("si", $nombreArchivo_foto, $id);
    $query->execute();
}

mysqli_stmt_close($stmt);

echo '{"Resultado":"' . $Resultado . '"}';
?>