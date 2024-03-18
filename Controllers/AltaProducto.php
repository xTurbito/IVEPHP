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

    // Convertir la imagen a formato JPEG si es PNG
    if(strpos($fotoProducto, 'data:image/png;base64,') !== false) {
        // Eliminar el encabezado de la cadena base64
        $fotoProducto = str_replace('data:image/png;base64,', '', $fotoProducto);
        
        // Decodificar la imagen base64
        $fotoProducto = base64_decode($fotoProducto);
        
        // Crear una imagen desde el string
        $imagen = imagecreatefromstring($fotoProducto);
        
        // Crear una imagen en blanco para convertirla a JPEG
        $imagenJpeg = imagecreatetruecolor(imagesx($imagen), imagesy($imagen));
        imagecopy($imagenJpeg, $imagen, 0, 0, 0, 0, imagesx($imagen), imagesy($imagen));
        
        // Guardar la imagen convertida a JPEG en una variable
        ob_start();
        imagejpeg($imagenJpeg);
        $fotoProducto = ob_get_clean();
        
        // Liberar memoria
        imagedestroy($imagen);
        imagedestroy($imagenJpeg);
    }

    // Redimensionar la imagen
    $imagen = imagecreatefromstring($fotoProducto);
    $ancho_original = imagesx($imagen);
    $alto_original = imagesy($imagen);
    $ancho_nuevo = 800;
    $alto_nuevo = 600;
    $imagen_redimensionada = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);
    imagecopyresampled($imagen_redimensionada, $imagen, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);
    
    // Guardar la imagen redimensionada en formato base64
    ob_start();
    imagejpeg($imagen_redimensionada);
    $fotoProducto = base64_encode(ob_get_clean());
    
    // Guardar la ruta de la imagen en la base de datos
    $foto_producto_bd = $fotoProducto; // aquí deberías guardar la ruta correcta en tu base de datos

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

    // Liberar memoria
    imagedestroy($imagen);
    imagedestroy($imagen_redimensionada);
}

// Devuelve el resultado como un JSON
echo '{"Resultado":"'.$Resultado.'"}';
?>
