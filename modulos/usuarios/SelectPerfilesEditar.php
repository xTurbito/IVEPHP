<?php
require("../../config/dbcontext.php");

$IDUsuario = $_GET["txtID"];


$sqlPerfilUsuario = "SELECT IDPerfil FROM usuarios WHERE IDUsuario = $IDUsuario";
$resultPerfilUsuario = $link->query($sqlPerfilUsuario);
$rowPerfilUsuario = $resultPerfilUsuario->fetch_assoc();
$IDPerfilUsuario = $rowPerfilUsuario["IDPerfil"];


$sql = "SELECT IDPerfil, NombrePerfil FROM perfiles";
$result = $link->query($sql);
?>


    <label for="perfil" class="form-label">Perfil</label>
    <select name="idPerfil" class="form-select form-select" id="NombrePerfil" >
    <?php
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $IDPerfil = $row["IDPerfil"];
            $NombrePerfil = $row["NombrePerfil"];
            ?>
            <option value='<?php echo $IDPerfil; ?>' <?php echo $IDPerfil == $IDPerfilUsuario ? 'selected' : ''; ?>><?php echo $NombrePerfil; ?></option>
            <?php
        }
    } else {
        ?>
        <option value='' disabled>No se encontraron perfiles</option>
        <?php
    }
    ?>
    </select>


<?php
$link->close();
?>