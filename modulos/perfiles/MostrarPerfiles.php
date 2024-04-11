<?php
$sql = "SELECT * FROM perfiles";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"><?php echo $row['NombrePerfil'] ?></td>
            <td>
                <a name="btneditar" id="btneditar" class="btn edit" href="EditarUsuario.php?txtID=<?php echo $row['idPerfil']; ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                <span>|</span>
                <a class="btn delete" href="javascript:void(0);" onclick="borrar(<?php echo $row['idPerfil']; ?>, '<?php echo $row['nombre']; ?>')" role="button"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
<?php
    }
 } else {
        $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
}
?>