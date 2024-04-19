<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

// Verifica si los datos requeridos están presentes
if (isset($datos["total"], $datos["cajera"], $datos["cliente"], $datos["productos"])) {

    $total = $datos["total"];
    $cajera = $datos["cajera"];
    $cliente = $datos["cliente"];
    $productos = $datos["productos"];

    // Agrega la fecha actual
    $fecha = date("Y-m-d H:i:s");

    $sql = "INSERT INTO ventas (cajera, cliente, total, fecha) VALUES (?, ?, ?, ?)";
    $sql3 = "INSERT INTO detalleventa(idventa, productos, precio) VALUES (?, ?,?)";


    $stmt = mysqli_prepare($link, $sql);


    mysqli_stmt_bind_param($stmt, "ssds", $cajera, $cliente, $total, $fecha);


    if (mysqli_stmt_execute($stmt)) {
        $Resultado = "ok";
        $idVenta = mysqli_insert_id($link); // Obtiene el ID del último registro insertado

        //  insertar en detalleventa
        $stmt2 = mysqli_prepare($link, $sql3);

        // Para cada producto, inserta un nuevo registro en detalleventa
        for ($i = 0; $i < count($productos); $i += 2) {
            $nombreProducto = $productos[$i]; // Obtiene solo el nombre del producto
            $precioProducto = $productos[$i+1]; // Obtiene el precio del producto
            mysqli_stmt_bind_param($stmt2, "isi", $idVenta, $nombreProducto, $precioProducto);
            if (!mysqli_stmt_execute($stmt2)) {
                $Resultado = "error: " . mysqli_stmt_error($stmt2);
                break;
            }
        }

        // Cierra la consulta preparada
        mysqli_stmt_close($stmt2);
    } else {
        $Resultado = "error: " . mysqli_stmt_error($stmt);
    }

    // Cierra la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    // Si falta algún dato requerido
    $Resultado = "error";
}

echo json_encode(['Resultado' => $Resultado]);
