<?php
require_once "../config/dbcontext.php";


$json = file_get_contents("php://input");
$datos = json_decode($json, true);


if(isset($datos["nombre"],$datos["status"])){
    
    $nombre = $datos["nombre"];
    $status = $datos["status"];
    

    $sql = "INSERT INTO departamentos (NombreDepartamento, lActivo) VALUES (?, ?)";
    $stmt = mysqli_prepare($link, $sql);

    
    if($stmt){
     
        mysqli_stmt_bind_param($stmt, "si", $nombre, $status);
        
      
        if(mysqli_stmt_execute($stmt)){
         
            $Resultado = "ok";
        } else {
           
            $error = mysqli_stmt_error($stmt);
            $Resultado = "error: " . $error;
        }
        
    
        mysqli_stmt_close($stmt);
    } else {
       
        $error = mysqli_error($link);
        $Resultado = "error: " . $error;
    }
} else {
   
    $Resultado = "error: Falta algún dato requerido";
}


echo json_encode(["Resultado" => $Resultado]);
?>
