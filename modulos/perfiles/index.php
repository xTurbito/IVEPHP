<?php
require_once("../../config/dbcontext.php");
require("../../config/login.php");
include("../../layout/top.php");

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-">
            <div class="card border-0 mt-4 ">
                <div class="card-header">
                    <a class="btn mt-2 mb-2 btn-hover-gray" href="AltaPerfil.php" role="button" style="color: #8000ff">Agregar Perfil <i class="fa-solid fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table" id="tabla_id">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre Perfil</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include("./MostrarPerfiles.php") ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="../../Assets/Funciones.js"></script>
<?php
include("../../layout/foot.php");
?>