<?php
//NAVBAR
require("../../config/login.php");
include("../../layout/top.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card border-0">
                <div class="card-header">
                    <a class="btn mt-2 mb-2 btn-hover-gray" href="AltaProducto.php" role="button" style="color: #8000ff">Agregar Producto <i class="fa-solid fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped" id="tabla_id">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Descripcion</th> 
                                    <th scope="col">fotoproducto</th> 
                                    <th scope="col">Precio</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Departamento</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include("./MostrarProductos.php") ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script src="../../Assets/Funciones.js"></script>
<?php include("../../layout/foot.php"); ?>