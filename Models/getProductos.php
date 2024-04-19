<?php
require("../config/dbcontext.php");

$producto = $_POST["producto"];
$sql= "SELECT Nombre,precio_venta FROM productos WHERE Nombre LIKE '%$producto%' ORDER BY Nombre LIMIT 0, 10";
$query = $link->query($sql);

$productos = [];

while($row = $query->fetch_assoc()){
    $productos[] = $row["Nombre"]. " " . "$" . $row["precio_venta"];
}

echo json_encode($productos, JSON_UNESCAPED_UNICODE);
?>