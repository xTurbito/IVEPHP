<?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr class="">
            <td scope="row"><?php echo $row['NombreDepartamento'] ?></td>
            <th><?php echo ($row['lActivo'] == 1) ? 'Activado' : 'Desactivado'; ?></th>
            <td> <a name="btneditar" id="btneditar" class="btn edit" href="EditarDepartamento.php?txtID=<?php echo $row['IDDepartamento']; ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                |
                <a class="btn delete" href="javascript:void(0);" onclick="borrar(<?php echo $row['IDDepartamento']; ?>, '<?php echo $row['NombreDepartamento']; ?>')" role="button"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
<?php
    }
} else {
    $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
} ?>