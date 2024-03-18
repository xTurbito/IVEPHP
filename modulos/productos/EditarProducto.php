<?php
require("../../config/dbcontext.php");

if (isset($_GET['txtID'])) {
    $txtID = $_GET['txtID'];
    $query = $link->prepare("SELECT * FROM productos WHERE IDProducto = ?");
    $query->bind_param("s", $txtID);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $registro = $result->fetch_assoc();
        $nombre = $registro["Nombre"];
        $descripcion = $registro["Descripcion"];
        $precio = $registro["Precio"];
        $stock = $registro["Stock"];
        $activo = $registro["lActivo"];
        $fotoproducto = $registro["fotoproducto"];
        $precio_cost = $registro["precio_cost"];
        $IDDepartamento = $registro["IDDepartamento"];

        // Consulta para obtener el nombre del departamento
        $query_departamento = $link->prepare("SELECT NombreDepartamento FROM Departamentos WHERE IDDepartamento = ?");
        $query_departamento->bind_param("s", $IDDepartamento);
        $query_departamento->execute();
        $result_departamento = $query_departamento->get_result();

        if ($result_departamento->num_rows > 0) {
            $registro_departamento = $result_departamento->fetch_assoc();
            $nombre_departamento = $registro_departamento["NombreDepartamento"];
        } else {
            $nombre_departamento = "Departamento no encontrado";
        }
    } else {
        echo "NO SE ENCONTRARON REGISTROS";
    }
}

?>
<?php include("../../layout/top.php") ?>
<br>
<div class="card">
    <div class="card-header">
        Datos del Producto
    </div>
    <div class="card-body">
        <form method="post" id="formEditarProducto">
            <div class="mb-3">
                <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" name="id" id="id">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" value="<?php echo $descripcion; ?>" class="form-control" name="departamento" id="departamento">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio Costo</label>
                <input type="number" value="<?php echo $precio_cost; ?>" class="form-control" name="precio" id="precio">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio Venta</label>
                <input type="number" value="<?php echo $precio; ?>" class="form-control" name="precio" id="precio">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" value="<?php echo $stock; ?>" class="form-control" name="stock" id="stock">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Estado del Producto</label>
                <select aria-valuemax="" class="form-select form-select" name="status" id="status">
                    <option value="1" <?php echo ($registro["lActivo"] == 1) ? 'selected' : ''; ?>>Activado</option>
                    <option value="0" <?php echo ($registro["lActivo"] == 0) ? 'selected' : ''; ?>>Desactivado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <select name='departamento' class="form-select form-select" id="departamentos">
                    <option value='<?php echo $IDDepartamento; ?>'><?php echo $nombre_departamento; ?></option>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto_producto" class="form-label">Foto del Producto</label>
                <?php if (!empty($fotoproducto)) : ?>
                    <img src="data:image/jpeg;base64, <?php echo $fotoproducto; ?>" class="img-fluid" alt="Foto del Producto">
                <?php else : ?>
                    <p>No hay imagen disponible</p>
                <?php endif; ?>
            </div>

        </form>
    </div>
</div>
<?php include("../../layout/foot.php"); ?>