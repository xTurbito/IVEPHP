<?php



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr class="">
            <td scope="row"><?php echo $row['usuario'] ?></td>
            <td scope="row"><?php echo $row['password'] ?></td>
            <td><?php echo $row['nombre'] ?></td>
            <td><?php echo ($row['tipo_usuclave'] == 1) ? 'Administrador' : 'Usuario'; ?></td>
            <td><?php echo ($row['lactivo'] == 1) ? 'Activado' : 'Desactivado'; ?></td>
            <td>
              <a name="btneditar" id="btneditar" class="btn edit" href="EditarUsuario.php?txtID=<?php echo $row['idusuario']; ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
              <span>|</span>
              <a class="btn delete" href="javascript:void(0);" onclick="borrar(<?php echo $row['idusuario']; ?>, '<?php echo $row['nombre']; ?>')" role="button"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
<?php
    }
} else {
    $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
} ?>
<script>
  //Borrar el usuario
  function borrar(id, nombre){
    Swal.fire({
  title: "¿Deseas borrar al usuario '" + nombre + "'?",
  showCancelButton: true,
  confirmButtonText: "Si"
}).then((result) => {
 
  if (result.isConfirmed) {
    window.location="index.php?txtID="+id;
  } 
}); 
  }
</script>