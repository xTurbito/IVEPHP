<?php
include("../../layout/top.php");
require("../../config/login.php");
require("../../config/dbcontext.php");

if (isset($_GET['txtID'])) {

    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $query = $link->prepare("SELECT * FROM usuarios where IDUsuario = ?");
    $query->bind_param("s", $txtID);
    $query->execute();
    $result = $query->get_result();

    if ($registro = $result->fetch_assoc()) {
        $usuario = $registro["usuario"];
        $nombre = $registro["nombre"];
        $password = $registro["password"];
        $tipo_usuario = $registro["idPerfil"];
        $lactivo = $registro["lactivo"];
    } else {
        echo ("NO SE ENCONTRARON REGISTROS");
    }
}
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nuevo Usuario</h3>
        </div>
        <div class="card-body">
        <form action="" method="post" id="formEditarUsuario">
            <div class="mb-3">
                <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" name="id" id="id" aria-describedby="helpId">
            </div>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" value="<?php echo $usuario; ?>" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Primera palabra y apellido completo">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="text" value="<?php echo  $password; ?>" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Contraseña">
            </div>
            <?php include("SelectPerfilesEditar.php") ?>
            <div class="mb-3">
                <label for="status" class="form-label">Estado del Usuario</label>
                <select aria-valuemax="" class="form-select form-select" name="status" id="status">
                    <option value="1" <?php echo ($registro["lactivo"] == 1) ? 'selected' : ''; ?>>Activado</option>
                    <option value="0" <?php echo ($registro["lactivo"] == 0) ? 'selected' : ''; ?>>Desactivado</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
        </div>
    </div>
</div>
<?php include("../../layout/foot.php"); ?>