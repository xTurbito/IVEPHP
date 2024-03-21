<?php
require("../../config/dbcontext.php");

$sql = "SELECT IDDepartamento, NombreDepartamento FROM departamentos";
$result = $link->query($sql);
?>

<div class="mb-3">
    <label for="departamento" class="form-label">Departamento</label>
    <select name='departamento' class="form-select form-select" id="departamento">

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $IDDepartamento = $row["IDDepartamento"];
            $nombreDepartamento = $row["NombreDepartamento"];
            ?>
            <option value='<?php echo $IDDepartamento; ?>'><?php echo $nombreDepartamento; ?></option>
            <?php
        }
    } else {
        ?>
        <option value='' disabled>No se encontraron departamentos</option>
        <?php
    }
    ?>

    </select>
</div>

<?php
$link->close();
?>
