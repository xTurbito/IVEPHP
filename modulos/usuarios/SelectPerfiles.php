<?php
require("../../config/dbcontext.php");

$sql = "SELECT IDPerfil, NombrePerfil FROM perfiles";
$result = $link->query($sql);
?>

<div class="mb-3">
    <label for="perfil" class="form-label">Perfil</label>
    <select name="idPerfil" class="form-select form-select" id="NombrePerfil" >
    <?php
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $IDPerfil = $row["IDPerfil"];
            $NombrePerfil = $row["NombrePerfil"];
            ?>
            <option value='<?php echo $IDPerfil; ?>'><?php echo $NombrePerfil; ?></option>
            <?php
        }
    } else {
        ?>
        <option value='' disabled>No se encontraron perfiles</option>
        <?php
    }
    ?>
    </select>
</div>

<?php
$link->close();
?>