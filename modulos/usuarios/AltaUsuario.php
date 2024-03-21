<?php include("../../layout/top.php") ?>
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
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo de Usuario</label>
                    <select class="form-select form-select" name="tipo" id="tipo">
                        <option selected>Seleccione el tipo de usuario</option>
                        <option value="1">Administrador</option>
                        <option value="2">Usuario</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<?php include("../../layout/foot.php"); ?>