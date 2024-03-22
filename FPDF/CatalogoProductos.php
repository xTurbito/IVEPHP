<?php

require_once "./config/dbcontext.php";

$json = file_get_contents("php://input");
$datos = json_decode($json, true);

if(isset($datos["departamento"], $datos["precio"],$datos["activo"])) {
    // Guardar los datos en variables
    $departamento = $datos["departamento"];
    $precio = $datos["precio"];
    $activo = $datos["activo"];

    switch ($precio) {
        case 'menos_de_500':
            $precio_min = 0;
            $precio_max = 500;
            break;
        case 'mas_de_500':
            $precio_min = 500;
            $precio_max = 999;
            break;
        case 'mas_de_1000':
            $precio_min = 1000;
            $precio_max = 99999999; 
            break;
        default:
            $precio_min = 0;
            $precio_max = 99999999;
            break;
    }

    $sql = "SELECT * FROM productos WHERE IDDepartamento = ? AND precio_venta BETWEEN ? AND ? AND lActivo = ?";
    $stmt = mysqli_prepare($link, $sql);

    if($stmt) {
        mysqli_stmt_bind_param($stmt, "iiii", $departamento, $precio_min, $precio_max,$activo);
        
        if(mysqli_stmt_execute($stmt)) {
            $Resultado = "ok";
          //Impresion de los productos mediante consola
           $resultadosConsulta = mysqli_stmt_get_result($stmt); 
            $productos = mysqli_fetch_all($resultadosConsulta, MYSQLI_ASSOC); 
        } else {
            $error = mysqli_stmt_error($stmt);
            $Resultado = "error: " . $error;
        }

        mysqli_stmt_close($stmt);
    } else {
        $error = mysqli_error($link);
        $Resultado = "error: " . $error;
    }
} else {
    $Resultado = "error: Falta algún dato requerido";
}

//echo json_encode(["Resultado" => $Resultado]); 
echo json_encode(["Resultado" => $Resultado, "Productos" => $productos]); //Envio de productos con el ok
?>
