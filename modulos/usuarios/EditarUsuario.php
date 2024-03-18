<?php
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
        $tipo_usuario = $registro["tipo_usuclave"];
        $lactivo = $registro["lactivo"];
    } else {
        echo ("NO SE ENCONTRARON REGISTROS");
    }
}
?>
<?php include("../../layout/top.php") ?>
<br>
<div class="card">
    <div class="card-header">
        Datos del usuario
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
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Usuario</label>
                <select class="form-select form-select" name="tipo" id="tipo">
                    <option value="1" <?php echo ($registro["tipo_usuclave"] == 1) ? 'selected' : ''; ?>>Administrador</option>
                    <option value="2" <?php echo ($registro["tipo_usuclave"] == 2) ? 'selected' : ''; ?>>Usuario</option>
                </select>
            </div>
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
<script>
    document.getElementById("formEditarUsuario");
    addEventListener("submit", function(e) {
        e.preventDefault();

        let id = document.getElementById("id").value;
        let usuario = document.getElementById("usuario").value;
        let nombre = document.getElementById("nombre").value;
        let password = document.getElementById("password").value;
        let tipo = document.getElementById("tipo").value;
        let status = document.getElementById("status").value;

        let valores = {
            id: id,
            usuario: usuario,
            nombre: nombre,
            password: password,
            tipo: tipo,
            status: status
        };

        let URL = "../../Controllers/EditarUsuario.php";

        axios.post(URL, valores, {
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(function(response) {
                if (response.data.Resultado == "ok") {
                    Swal.fire({
                        title: "<strong>Actualizacion Exitosa</strong>",
                        html: "<i>El usuario <strong>" +
                            nombre +
                            "</strong> fue actualizado con éxito</i>",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "../../Modulos/Usuarios/index.php";
                    });
                } else {
                    alert("ERROR!!!");
                }
            })
            .catch(function(error) {
                alert("Error: " + error.message);
            });
    });
</script>
<?php include("../../layout/foot.php"); ?>