<?php
require_once "./config/dbcontext.php";
require('./fpdf.php');

$json = file_get_contents("php://input");
$datos = json_decode($json, true);

if(isset($datos["departamento"], $datos["precio"], $datos["activo"])) {
    
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

    $sql = "SELECT Nombre, Descripcion, precio_venta, Stock, fotoproducto FROM productos WHERE IDDepartamento = ? AND precio_venta BETWEEN ? AND ? AND lActivo = ?";
    
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, "iiis", $departamento, $precio_min, $precio_max, $activo);
        
    
        mysqli_stmt_execute($stmt);
        
     
        $resultado = mysqli_stmt_get_result($stmt);

        $pdf = new FPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Ln(10);

        while ($row = mysqli_fetch_array($resultado)) {
            $nombre = $row['Nombre'];
            $descripcion = $row['Descripcion'];
            $stock = $row['Stock'];
            $precio = $row['precio_venta'];
            

            $pdf->Ln(60); 
            $pdf->Cell(0, 10, "Nombre: $nombre", 0, 1, 'C');
            $pdf->Cell(0, 10, "Descripcion: $descripcion", 0, 1, 'C');
            $pdf->Cell(0, 10, "Stock: $stock", 0, 1, 'C');
            $pdf->Cell(0, 10, "Precio: $precio", 0, 1, 'C');
    

       
            $pdf->Ln();
        }

      
        $pdf->Output("D", "catalogo_productos.pdf");

    } else {
        die("Error en la preparación de la consulta: " . mysqli_error($link));
    }


    mysqli_stmt_close($stmt);
    
    exit;
}
?>


<?php
/*CODIGO PARA VALIDAR QUE ESTAN OBTENIENDO LOS DAOTS, DEBE ESTAR MODIFICADO LA SOLICITUD AJAX 
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
*/
?>












