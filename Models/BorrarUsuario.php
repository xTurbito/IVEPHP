<?php
if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $query = $link->prepare("Delete from usuarios WHERE idusuario = ?");
    if ($query === false) {
        die('Error en la preparación de la consulta: ' . $link->error);
    }

    $query->bind_param("s", $txtID);
    $query->execute();
    header("Location:index.php");
}
?>
