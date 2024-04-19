<?php
require_once "../config/dbcontext.php";

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    // Verifica si el perfil está asignado a algún usuario
    $checkQuery = $link->prepare("SELECT * FROM usuarios WHERE IDPerfil = ?");
    $checkQuery->bind_param("s", $txtID);
    $checkQuery->execute();
    $checkResult = $checkQuery->get_result();

    if ($checkResult->num_rows > 0) {
        // Si el perfil está asignado, devuelve un mensaje de error específico
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Este perfil ya está asignado a algún usuario.']);
        exit;
    }

    // Si el perfil no está asignado, procede a borrarlo
    $query = $link->prepare("DELETE FROM perfiles WHERE IDPerfil = ?");
    $query->bind_param("s", $txtID);
    if ($query->execute()) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Error al ejecutar la consulta: ' . $query->error]);
    }
}