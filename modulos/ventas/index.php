<?php
require("../../config/login.php");
include("../../layout/top.php");
require("../../config/dbcontext.php");
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card border-0 ">
        <div class="card-header">
          <a class="btn mt-2 mb-2 btn-hover-gray" href="AltaVenta.php" role="button" style="color: #8000ff">Nueva Venta <i class="fa-solid fa-plus"></i></a>

        </div>
        <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table" id="tabla_id">
              <thead>
                <tr>
                  <th scope="col">Folio</th>
                  <th scope="col">Cajera</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Total</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php include('./MostrarVentas.php') ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="http://localhost/SistemaVentasPHP/Assets/Funciones.js"></script>
<?php
include("../../layout/foot.php");
?>