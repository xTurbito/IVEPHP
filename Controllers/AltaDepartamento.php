<?php
require_once "../config/dbcontext.php";

// Lee el contenido JSON de la solicitud
$json = file_get_contents("php://input");
$datos = json_decode($json, true);

$Resultado = "error";

if(isset($datos["NombreDepartamento"])){
    $NombreDep = $datos["NombreDepartamento"];
    $lActivo = 1;

    $sql = "INSERT INTO departamentos(NombreDepartamento,lActivo) VALUES (?,?)";
    $stmt = mysqli_prepare($link, $sql);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "si", $NombreDep, $lActivo);

        if(mysqli_stmt_execute($stmt)){
            $Resultado = "ok";
        } else {
            $Resultado = "error" . mysqli_stmt_error($stmt);
        }
        
        mysqli_stmt_close($stmt);
    } else {
        $Resultado = "error: " . mysqli_error($link);
    }
}

// Devuelve el resultado como un JSON
echo '{"Resultado":"'.$Resultado.'"}';
?>
