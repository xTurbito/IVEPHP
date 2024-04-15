<?php 
require("../../config/login.php");
include("../../layout/top.php") ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nuevo Usuario</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" id="formUsuario">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Primera palabra y apellido completo">
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña">
                </div>
                <?php include("SelectPerfiles.php") ?>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php include("../../layout/foot.php"); ?>