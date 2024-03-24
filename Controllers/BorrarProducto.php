<?php

require_once "../config/dbcontext.php";

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    // Buscar la foto relacionada con el producto
    $query = $link->prepare("SELECT fotoproducto FROM productos WHERE IDProducto = ?");
    $query->bind_param("s", $txtID);
    $query->execute(); // Ejecutar la consulta
    $resultado = $query->get_result(); // Obtener el resultado
    $registro_recuperado = $resultado->fetch_assoc(); // Obtener el resultado como un array asociativo


    if(isset($registro_recuperado["fotoproducto"]) && $registro_recuperado["fotoproducto"]!=""){
        if(file_exists("./".$registro_recuperado["fotoproducto"])){
            unlink("./".$registro_recuperado["fotoproducto"]);
        }
    }

    $query = $link->prepare("DELETE FROM productos WHERE IDProducto = ? ");
    $query->bind_param("s", $txtID);
    $query-> execute();
    header("Location:../modulos/productos/index.php");
}
?>
