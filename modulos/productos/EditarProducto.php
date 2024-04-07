<?php
require("../../config/login.php");
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
        $precio_venta = $registro["precio_venta"];
        $stock = $registro["Stock"];
        $activo = $registro["lActivo"];
        $precio_costo = $registro["precio_costo"];
        $IDDepartamento = $registro["IDDepartamento"];
        $fotoproducto = $registro["fotoproducto"];

        // Consulta para obtener el nombre del departamento
        $query_todos_departamentos = $link->prepare("SELECT IDDepartamento,NombreDepartamento FROM Departamentos ");
        $query_todos_departamentos->execute();
        $result_todos_departamentos = $query_todos_departamentos->get_result();

        
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
        <form method="post" id="formEditarProducto" enctype="multipart/form-data" >
            <div class="mb-3">
                <input type="hidden" value="<?php echo $txtID; ?>" class="form-control" name="id" id="id">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="<?php echo $nombre; ?>" class="form-control" name="nombre" id="nombre">
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion</label>
                <input type="text" value="<?php echo $descripcion; ?>" class="form-control" name="descripcion" id="descripcion">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio Costo</label>
                <input type="number" value="<?php echo $precio_costo; ?>" class="form-control" name="precio_costo" id="precio_costo">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio Venta</label>
                <input type="number" value="<?php echo $precio_venta; ?>" class="form-control" name="precio_venta" id="precio_venta">
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" value="<?php echo $stock; ?>" class="form-control" name="stock" id="stock">
            </div>
            <div class="mb-3">
                <label for="activo" class="form-label">Estado del Producto</label>
                <select aria-valuemax="" class="form-select form-select" name="activo" id="activo">
                    <option value="1" <?php echo ($registro["lActivo"] == 1) ? 'selected' : ''; ?>>Activado</option>
                    <option value="0" <?php echo ($registro["lActivo"] == 0) ? 'selected' : ''; ?>>Desactivado</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="departamento" class="form-label">Departamento</label>
                <select name='departamento' class="form-select form-select" id="departamento">
                    <?php
                    // Bucle para generar las opciones del menú desplegable
                    while ($row = $result_todos_departamentos->fetch_assoc()) {
                        $IDDepartamento_actual = $row["IDDepartamento"];
                        $nombre_departamento_actual = $row["NombreDepartamento"];
                    ?>
                        <option value='<?php echo $IDDepartamento_actual; ?>' <?php if ($IDDepartamento_actual == $IDDepartamento) echo 'selected'; ?>><?php echo $nombre_departamento_actual; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="foto_producto" class="form-label">Foto del Producto</label>
                <br>
                <img src="../../images/<?php echo $fotoproducto?>" alt="" width="100">
                <br>
                <input type="file" id="foto_producto" name="fotoproducto" class="form-control">
                <br>

            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
</div>
<script>

</script>
<?php include("../../layout/foot.php"); ?>