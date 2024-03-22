<?php
// Incluir el archivo del contexto de la base de datos
require_once "./config/dbcontext.php";

// Obtener los datos del cuerpo de la solicitud HTTP
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

// Verificar si los datos requeridos están presentes
if(isset($datos["departamento"], $datos["precio"], $datos["activo"])) {
    // Guardar los datos en variables
    $departamento = $datos["departamento"];
    $precio = $datos["precio"];
    $activo = $datos["activo"];

    // Definir los rangos de precios
    switch ($precio) {
        case 'menos_de_500':
            $precio_min = 0;
            $precio_max = 500;
            break;
        case 'mas_de_500':
            $precio_min = 500;
            $precio_max = 1500;
            break;
        case 'mas_de_1000':
            $precio_min = 1000;
            $precio_max = 99999999; // Un valor alto para representar "mayor que mil"
            break;
        default:
            // En caso de no seleccionar un rango válido, establecer valores predeterminados
            $precio_min = 0;
            $precio_max = 99999999;
            break;
    }

    // Preparar la consulta SQL
    $sql = "SELECT * FROM productos WHERE IDDepartamento = $departamento AND precio_venta BETWEEN $precio_min AND $precio_max AND lAcitvo = $activo";

    // Ejecutar la consulta usando la conexión establecida en el archivo de contexto de la base de datos
    $result = mysqli_query($link, $sql);

    // Verificar si la consulta tuvo éxito
    if ($result) {
        // Incluir el archivo de generación de PDF
        require_once 'index.php';
        
        // Generar el PDF con los resultados obtenidos y pasar los valores como parámetros
        $pdf = generarPDF($result);

        // Salida del PDF en forma de cadena base64
        $pdf_content = $pdf->Output('S');

        // Devolver el contenido del PDF como respuesta JSON
        echo json_encode(['pdf_content' => base64_encode($pdf_content)]);
    } else {
        echo "Error al ejecutar la consulta: " . mysqli_error($link);
    }
} else {
    // Si falta algún dato requerido, mostrar un mensaje de error
    echo "Faltan datos requeridos";
}
?>
