<?php
require("../../config/login.php");
require("../../config/dbcontext.php");

$sql = "SELECT * FROM Permisos";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <div class="form-check d-flex justify-content-between mb-2">
            <label class="form-check-label" for="permiso<?php echo $row['idPermiso']; ?>">
                <?php echo $row['nombre_permiso'] ?>
            </label>
            <input class="form-check-input" type="checkbox" name="permisos" value="<?php echo $row['nombre_permiso']; ?>" id="permiso<?php echo $row['nombre_permiso']; ?>">
        </div>
        

<?php
    }
} else {
    $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
}
?>