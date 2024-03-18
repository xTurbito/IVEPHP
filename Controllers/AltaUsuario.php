<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

$Resultado = "error";

if(isset($datos["nombre"], $datos["descripcion"], $datos["precio_costo"], $datos["precio_venta"], $datos["stock"], $datos["departamentos"], $datos["foto_producto"])) {
    // Validar los datos recibidos
    $nombre = $datos["nombre"];
    $descripcion = $datos["descripcion"];
    $precioCosto = $datos["precio_costo"];
    $precioVenta = $datos["precio_venta"];
    $stock = $datos["stock"];
    $departamentos = $datos["departamentos"];
    $fotoProducto = $datos["foto_producto"];
    $lActivo = 1;




    $foto_producto_bd = $fotoProducto; 

    $sql = "INSERT INTO productos(Nombre, Descripcion, Precio, Stock, lActivo, foto_producto, precio_cost, IDDepartamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssiiisii", $nombre, $descripcion, $precioVenta, $stock, $lActivo, $foto_producto_bd, $precioCosto, $departamentos);

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
