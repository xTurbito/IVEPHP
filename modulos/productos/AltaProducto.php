<?php include("../../layout/top.php") ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nuevo Producto</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" id="formProducto">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio Costo</label>
                    <input type="number" class="form-control" name="precio_costo" id="precio_costo" placeholder="Precio Venta del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio Venta</label>
                    <input type="number" class="form-control" name="precio_venta" id="precio_venta" placeholder="Precio Venta del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock del Producto" required>
                </div>
               <?php include("./SelectDepartamentos.php") ?>
                <div class="mb-3">
                    <label for="status" class="form-label">Estado del Producto</label>
                    <select aria-valuemax="" class="form-select form-select" name="activo" id="activo">
                        <option value="1">Activado</option>
                        <option value="0">Desactivado</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<script>

</script>
<?php include("../../layout/foot.php"); ?>