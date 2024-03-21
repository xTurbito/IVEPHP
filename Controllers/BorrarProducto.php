<?php
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $query = $link->prepare("UPDATE productos SET lActivo = 0, Descripcion = 'BAJA' WHERE IDProducto = ?");
    if ($query === false) {
        die('Error en la preparación de la consulta: ' . $link->error);
    }

    $query->bind_param("s", $txtID);
    $query->execute();
    header("Location:index.php");
}
?>
