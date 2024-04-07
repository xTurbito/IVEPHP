<?php
require("../../config/login.php");
require("../../config/dbcontext.php");
include("../../Models/BorrarUsuario.php"); 

$sql = "SELECT * FROM usuarios where usuario <> 'BAJA'";
$result = $link->query($sql);

//NAVBAR
include("../../layout/top.php") 
?>
<div class="card border-0 mt-4">
  <div class="card-header">
    <a class="btn mt-2 mb-2 btn-hover-gray" href="AltaUsuario.php" role="button" style="color: #8000ff">Agregar Usuario <i class="fa-solid fa-plus"></i></a>

  </div>
  <div class="card-body">
    <div class="table-responsive-sm">
      <table class="table" id="tabla_id">
        <thead>
          <tr>
            <th scope="col">Usuario</th>
            <th scope="col">Password</th>
            <th scope="col">Nombre</th>
            <th scope="col">Tipo</th>
            <th scope="col">Status</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php include("./MostrarUsuarios.php") ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="http://localhost/SistemaVentasPHP/Assets/Funciones.js"></script>
<?php include("../../layout/foot.php"); ?>
