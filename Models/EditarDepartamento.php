<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

if(isset($datos["nombre"],$datos["status"],$datos["id"])){
    $id = $datos["id"];
    $nombre = $datos["nombre"];
    $status = $datos["status"];

    $sql = "UPDATE departamentos SET NombreDepartamento = ?, lActivo = ? WHERE IDDepartamento = ?";

     // Prepara la consulta
     $stmt = mysqli_prepare($link, $sql);


      // Vincula los parámetros
    mysqli_stmt_bind_param($stmt, "sii", $nombre,$status, $id);

     // Ejecuta la consulta
     if (mysqli_stmt_execute($stmt)) {
        $Resultado = "ok";
    } else {
        $Resultado = "error: " . mysqli_stmt_error($stmt);
    }

    // Cierra la consulta preparada
    mysqli_stmt_close($stmt);
} else {
    // Si falta algún dato requerido
    $Resultado = "error";

}

// Devuelve el resultado como un JSON
echo '{"Resultado":"'.$Resultado.'"}';

?>