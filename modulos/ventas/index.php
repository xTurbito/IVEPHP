<?php
include("../../layout/top.php") 
?>

<div class="card border-0">
  <div class="card-header">
    <a class="btn mt-2 mb-2 btn-hover-gray" href="AltaUsuario.php" role="button" style="color: #8000ff">Nueva Venta <i class="fa-solid fa-plus"></i></a>
  </div>
  <div class="card-body">
    <div class="table-responsive-sm">
      <table class="table" id="tabla_id">
        <thead>
          <tr>
            <th scope="col">Cliente</th>
            <th scope="col">Monto</th>
            <th scope="col">Fecha</th>
            <th scope="col">Vendedor</th>
          </tr>
        </thead>
        <tbody>
          
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include("../../layout/foot.php") 
?>