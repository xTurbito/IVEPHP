<?php
require("../../config/login.php");
include("../../layout/top.php");
require("../../config/dbcontext.php");

if (isset($_GET['txtID'])) {
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
    $query = $link->prepare("SELECT * FROM perfiles where IDPerfil = ?");
    $query->bind_param("s", $txtID);
    $query->execute();
    $result = $query->get_result();
    if ($registro = $result->fetch_assoc()) {
        $nombre = $registro["NombrePerfil"];
        $permisosPerfil = explode(",", $registro["Permisos"]);
    } else {
        echo ("NO SE ENCONTRARON REGISTROS");
    }
}

$query = $link->prepare("SELECT * FROM permisos");
$query->execute();
$result = $query->get_result();
$Permisos = $result->fetch_all(MYSQLI_ASSOC);


?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Editar Perfil</h3>
        </div>
        <div class="card-body">
            <form id="formEditarPerfil">
                <div class="mb-3">
                    <input type="hidden" value="<?php echo $txtID;?>"  name="idPerfil" id="idPerfil">
                    <label for="Nombre" class="form-label">Nombre del Perfil</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $nombre ?>">
                </div>
                <div class="mb-3 p-3 border rounded">
                    <h3 class="text-center mb-3"> PERMISOS</h3>
                </div>
                <div class="form-check d-flex justify-content-between mb-2">
                <?php
                foreach ($Permisos as $permiso) {
                    $nombrePermiso = $permiso['NombrePermiso'];
                    $idPermiso = $permiso['idPermiso'];
                    echo '<label class="form-check-label" for="permiso' . $idPermiso . '">' . $nombrePermiso . '</label>';
                    if (in_array($nombrePermiso, $permisosPerfil)) {
                        echo '<input class="form-check-input" type="checkbox" name="permisos" value="' . $nombrePermiso . '" id="permiso' . $idPermiso . '" checked><br>';
                    } else {
                        echo '<input class="form-check-input" type="checkbox" name="permisos" value="' . $nombrePermiso . '" id="permiso' . $idPermiso . '"><br>';
                    }
                }
                ?>
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
include("../../layout/foot.php");
?>