<?php
require("../../config/login.php");
include("../../layout/top.php")
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nuevo Perfil</h3>
        </div>
        <div class="card-body">
            <form id="formPerfil">
                <div class="mb-3">
                        <label for="Nombre" class="form-label">Nombre del Perfil</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                </div>
                <div class="mb-3 p-3 border rounded">
                    <h3 class="text-center mb-3">PERMISOS</h3>
                    
                </div>
                <div class="form-check d-flex justify-content-between mb-2">
                <?php include("./MostrarPermisos.php") ?>
                </div>
                <div class="gap-2 mt-5">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../../Assets/FuncionesPerfiles.js"></script>
<?php
include("../../layout/foot.php")
?>