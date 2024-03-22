<?php
require('fpdf.php');

function generarPDF($result) {
    // Crear el objeto PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // Iterar sobre los resultados de la consulta
    while ($fila = mysqli_fetch_assoc($result)) {
        // Mostrar datos del producto
        $nombre = $fila['nombre'];
        $precio = $fila['precio'];
        // Puedes agregar más datos según sea necesario

        // Agregar nombre y precio al PDF
        $pdf->Cell(0, 10, "Nombre: $nombre, Precio: $precio", 0, 1);

        // Mostrar la imagen codificada en base64
        $imagen_base64 = $fila['imagen_base64'];
        if (!empty($imagen_base64)) {
            // Convertir la imagen codificada en base64 a una imagen (en este caso, asumiendo que es un JPEG)
            $imagen = base64_decode($imagen_base64);

            // Agregar la imagen al PDF
            $pdf->Image('@' . $imagen, 10, $pdf->GetY() + 10, 50, 50);
        }

        // Agregar un salto de línea
        $pdf->Ln();
    }

    // Salida del PDF
    return $pdf; // Devuelve el objeto PDF para su uso posterior
}
?>
