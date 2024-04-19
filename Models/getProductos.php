<?php
require("../config/dbcontext.php");

$producto = $_POST["producto"];
$sql= "SELECT Nombre,precio_venta FROM productos WHERE Nombre LIKE '%$producto%' ORDER BY Nombre LIMIT 0, 10";
$query = $link->query($sql);

$html = "";

while($row = $query->fetch_assoc()){
    $html .= "<li>".$row["Nombre"]. " " . "$" . $row["precio_venta"]."</li>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>