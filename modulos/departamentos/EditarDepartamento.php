<?php
require("../../config/login.php");
require("../../config/dbcontext.php");

if (isset($_GET['txtID'])) {

    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : '';
    $query = $link->prepare("SELECT * FROM departamentos WHERE IDDepartamento = ?");
    $query->bind_param("s", $txtID);
    $query->execute();
    $result = $query->get_result();

    if ($registro = $result->fetch_assoc()) {
        $nombredep = $registro["NombreDepartamento"];
        $lactivo = $registro["lActivo"];
    } else {
        echo ("NO SE ENCONTRARON REGISTROS");
    }
}
?>
<?php include("../../layout/top.php") ?>
<div class="card">
    <div class="card-header">
        Datos del Departamento
    </div>
    <div class="card-body">
        <form action="" method="post" id="formEditarDepartamento">
            <div class="mb-3">
                <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" name="id" id="id">
            </div>
            <div class="mb-3">
                <label for="NombrDepartamento" class="form-label">Nombre Departamento</label>
                <input type="text" value="<?php echo $nombredep; ?>" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estado del Usuario</label>
                <select aria-valuemax="" class="form-select form-select" name="status" id="status">
                    <option value="1" <?php echo ($registro["lActivo"] == 1) ? 'selected' : ''; ?>>Activado</option>
                    <option value="0" <?php echo ($registro["lActivo"] == 0) ? 'selected' : ''; ?>>Desactivado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a  class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<?php include("../../layout/foot.php"); ?>