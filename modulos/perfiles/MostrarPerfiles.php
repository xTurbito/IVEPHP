<?php
$sql = "SELECT * FROM perfiles";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"><?php echo $row['NombrePerfil'] ?></td>
            <td>
                <a name="btneditar" id="btneditar" class="btn edit" href="EditarPerfil.php?txtID=<?php echo $row['idPerfil']; ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                <span>|</span>
                <a class="btn delete" href="javascript:void(0);" onclick="borrar(<?php echo $row['idPerfil']; ?>, '<?php echo $row['idPerfil']; ?>')" role="button"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
<?php
    }
 } else {
        $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
}
?>
<script>
  //Borrar el usuario
  function borrar(id, NombrePerfil){
    Swal.fire({
      title: "¿Deseas borrar el perfil '" + NombrePerfil + "'?",
      showCancelButton: true,
      confirmButtonText: "Si"
    }).then((result) => {
      if (result.isConfirmed) {
        axios.get('../../Models/BorrarPerfil.php', {
          params: {
            txtID: id
          }
        })
        .then(function (response) {
          if (response.data.success) {
            Swal.fire('Perfil borrado con éxito').then(() => {
              location.reload(); 
            });
          } else if (response.data.error) {
            if (response.data.error === 'Este perfil ya está asignado a algún usuario.') {
              // Muestra una alerta personalizada si el perfil ya está asignado
              Swal.fire('Error', 'Este perfil ya está asignado a algún usuario y no puede ser borrado.', 'error');
            } else {
              Swal.fire('Error', response.data.error, 'error');
            }
          }
        })
        .catch(function (error) {
          Swal.fire('Error', 'Ocurrió un error al realizar la solicitud: ' + error, 'error');
        });
      } 
    }); 
  }
</script>