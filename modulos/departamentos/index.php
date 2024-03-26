<?php
require("../../config/dbcontext.php");

$sql = "SELECT * FROM departamentos";
$result = $link->query($sql);


//NAVBAR
include("../../layout/top.php") 
?>
<br>
<div class="card border-0">
  <div class="card-header">
    <a class="btn mt-2 mb-2 btn-hover-gray" href="AltaDepartamento.php" role="button" style="color: #8000ff">Agregar Departamento <i class="fa-solid fa-plus"></i></a>

  </div>
  <div class="card-body">
    <div class="table-responsive-sm">
      <table class="table" id="tabla_id">
        <thead>
          <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php include("./ShowDepartaments.php") ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php include("../../layout/foot.php"); ?>
