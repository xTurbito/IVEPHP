<?php
require("../../config/login.php");
include("../../layout/top.php") 
?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nuevo Departamento</h3>
        </div>
        <div class="card-body">
            <form method="post" id="formDepartamento">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Departamento</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Estado del Departamento</label>
                    <select aria-valuemax="" class="form-select form-select" name="status" id="status">
                        <option value="1" >Activado</option>
                        <option value="0" >Desactivado</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="index.php" class="btn btn-primary" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<?php include("../../layout/foot.php"); ?>