<?php
require_once "../config/dbcontext.php";


$json = file_get_contents("php://input");
$datos = json_decode($json, true);


if(isset($datos["departamento"],$datos["precio"],$datos["activo"]))
?>