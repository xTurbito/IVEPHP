<?php
require_once "../config/dbcontext.php";
require('./fpdf.php');

$json = file_get_contents("php://input");
$datos = json_decode($json, true);

if(isset($datos["idVenta"])){
    $idVenta = $datos["idVenta"];

    $query = $link->prepare("SELECT * FROM ventas V INNER JOIN detalleventa D ON D.idVenta = V.idVenta WHERE V.idVenta = ?");
    $query->bind_param("i", $idVenta);
    $query->execute();
    $result = $query->get_result();

    $pdf = new FPDF('P','mm',array(80,200));
    $pdf->AddPage();

    // Encabezado del ticket
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,10,'Ticket de Compra',0,1,'C');

    // Datos de la venta
    $pdf->SetFont('Arial','B',10);
    $row = $result->fetch_assoc();

    // Guardar el total en una variable
    $total = $row['total'];

    $pdf->Cell(60,10,'Fecha: ' . $row['fecha'],0,1);
    $pdf->Cell(60,10,'ID Venta: ' . $row['idVenta'],0,1);
    $pdf->Cell(60,10,'Cajera: ' . $row['cajera'],0,1);
    $pdf->Cell(60,10,'Cliente: ' . $row['cliente'],0,1);

    // Título de la lista de productos
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,10,'COMPRA',0,1,'C');

    // Lista de productos
    $pdf->SetFont('Arial','B',10);
    do {
        $pdf->Cell(60,10, $row['productos'] . ' ........................... $' . $row['precio'],0,1);
    } while ($row = $result->fetch_assoc());

    // Total de la venta
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(60,10,'Total: ' . $total,0,1,'C'); // Usar la variable $total

    // Mensaje de agradecimiento
    $pdf->SetFont('Arial','I',10);
    $pdf->Cell(60,10,'Gracias por su compra!',0,1,'C');

    $pdf->Output();
}
?>