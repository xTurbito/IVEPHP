<?php
require_once "../config/dbcontext.php";

$json = file_get_contents("php://input");
$datos = json_decode($json, true);

if (isset($datos["id"], $datos["nombre"], $datos["precio_costo"], $datos["descripcion"], $datos["stock"], $datos["activo"], $datos["precio_venta"], $datos["departamento"], $datos["fotoproducto"])) {
    
    $id = $datos["id"];
    $nombre = $datos["nombre"];
    $precio_costo = $datos["precio_costo"];
    $precio_venta = $datos["precio_venta"];
    $descripcion = $datos["descripcion"];
    $stock = $datos["stock"];
    $lActivo = $datos["activo"];
    $departamento = $datos["departamento"];
    $fotoproducto = $datos["fotoproducto"];
   
    $sql = "UPDATE productos SET nombre = ?, descripcion = ?, precio_venta = ?, stock = ?, lActivo = ?, precio_costo = ?, IDDepartamento = ?, fotoproducto = ? WHERE IDProducto = ?";

    $stmt = mysqli_prepare($link, $sql);

    mysqli_stmt_bind_param($stmt, "ssiddidis", $nombre, $descripcion, $precio_venta, $stock, $lActivo, $precio_costo, $departamento, $fotoproducto, $id);

    if (mysqli_stmt_execute($stmt)) {
        $Resultado = "ok";
    } else {
        $Resultado = "error: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    $Resultado = "error";
}

echo '{"Resultado":"'.$Resultado.'"}';
?>
