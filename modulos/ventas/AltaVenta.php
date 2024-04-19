<?php
require("../../config/login.php");
include("../../layout/top.php")
?>
<style>
    .mi-clase-ul {
        display: none;
        list-style: none;
        width: 250px;
        height: auto;
        position: absolute;
        z-index: 10;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .mi-clase-li {
        padding: 10px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
    }

    .mi-clase-li:hover {
        background-color: #f5f5f5;
    }

    .mi-clase-li:last-child {
        border-bottom: none;
    }

    .mi-clase-input {
        /* Aquí van tus estilos */
        margin-bottom: 10px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .input-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .mi-clase-input {
        flex-grow: 1;
        margin-right: 10px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .mi-clase-boton {
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        background-color: #f44336;
        color: white;
        cursor: pointer;
    }
</style>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nueva Venta</h3>
        </div>
        <div>
            <div class="card-body">
                <form  method="post" id="formVenta" autocomplete="off">
                    <input type="text" class="form-control" hidden name="cajera"value="<?php echo $_SESSION['usuario']; ?>">
                    <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Ingresa el Nombre del Cliente">
                    </div>
                    <div>
                        <h3>Productos</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="producto" id="search" placeholder="Buscar...">
                            <ul id="lista" class="mi-clase-ul"></ul>
                        </div>
                    </div>
                    <div class="mb-3" id="inputContainer">
                        <input type="text" class="mb-3" id="inputNuevo" style="display: none;">
                    </div>
                    <div class="pt-5 pl-1">
                        <h3 id="total">Total: $0</h3>
                    </div>
                    <button type="submit" id="submitVenta" class="btn btn-primary mt-3">Guardar Venta</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../Assets/FuncionesVentas.js"> </script>
<?php include("../../layout/foot.php"); ?>