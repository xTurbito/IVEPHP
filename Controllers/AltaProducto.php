<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

$Resultado = "error";

if(isset($datos["nombre"], $datos["descripcion"], $datos["precio_costo"], $datos["precio_venta"], $datos["stock"], $datos["departamentos"], $datos["foto_producto"])) {
    // Validar los datos recibidos
    $nombre = mysqli_real_escape_string($link, $datos["nombre"]);
    $descripcion = mysqli_real_escape_string($link, $datos["descripcion"]);
    $precioCosto = mysqli_real_escape_string($link, $datos["precio_costo"]);
    $precioVenta = mysqli_real_escape_string($link, $datos["precio_venta"]);
    $stock = mysqli_real_escape_string($link, $datos["stock"]);
    $departamentos = mysqli_real_escape_string($link, $datos["departamentos"]);
    $fotoProducto = $datos["foto_producto"];
    $lActivo = 1;

    // Verificar si la imagen está en formato base64
    if (strpos($fotoProducto, 'data:image/jpeg;base64,') === false) {
        $Resultado = "error: El formato de la imagen no es válido.";
    } else {
        // Eliminar el encabezado de la cadena base64
        $fotoProducto = str_replace('data:image/jpeg;base64,', '', $fotoProducto);
        
        // Decodificar la imagen base64
        $fotoProducto = base64_decode($fotoProducto);

        // Guardar la imagen en el servidor (opcional)
        $nombreImagen = "nombre_uniquede_la_imagen.jpg";
        $rutaImagen = "../carpeta/para/imagenes/" . $nombreImagen;
        file_put_contents($rutaImagen, $fotoProducto);
        
        // Guardar la ruta de la imagen en la base de datos
        $foto_producto_bd = $rutaImagen; // Aquí deberías guardar la ruta correcta en tu base de datos

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
}

// Devuelve el resultado como un JSON
echo json_encode(array("Resultado" => $Resultado));
?>
