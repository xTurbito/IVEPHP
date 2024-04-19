<?php 
require("../../config/login.php");
include("../../layout/top.php") ?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Catalogo de Productos</h3>
        </div>
        <div class="card-body">
            <form method="post" id="formCatalogoProductos">
                <?php include("../Reportes/SelectDepartamentos.php") ?>
                <div class="mb-3">
                    <label for="precio" class="form-label">Rango de Precio</label><br>
                    <select id="precio" name="precio" class="form-select">
                        <option value="menos_de_500">Menos de 500</option>
                        <option value="mas_de_500">Más de 500</option>
                        <option value="mas_de_1000">Más de 1000</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Estado del Departamento</label>
                    <select aria-valuemax="" class="form-select form-select" name="activo" id="activo">
                        <option value="1">Activado</option>
                        <option value="0">Desactivado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Generar PDF</button>
            </form>
        </div>
    </div>
</div>
<?php include("../../layout/foot.php"); ?>