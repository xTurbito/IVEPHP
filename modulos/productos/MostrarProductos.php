<?php

require("../../config/dbcontext.php");

$sql = "SELECT 
P.IDProducto,
P.Nombre,
P.Descripcion,
P.precio_venta,
P.Stock,
P.lActivo,
P.IDDepartamento,
P.fotoproducto,
D.NombreDepartamento
FROM 
Productos P
INNER JOIN 
Departamentos D ON P.IDDepartamento = D.IDDepartamento
WHERE
P.Descripcion <> 'BAJA';";
$result = $link->query($sql);
?>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"><?php echo $row['Nombre'] ?></td>
            <td scope="row"><?php echo $row['Descripcion'] ?></td>
            <td>
                <img width="50" src="../../images/<?php echo $row['fotoproducto']?>">
            </td>
            <td><?php echo $row['precio_venta'] ?></td>
            <td><?php echo $row['Stock'] ?></td>
            <td><?php echo $row['NombreDepartamento'] ?></td>
            <th><?php echo ($row['lActivo'] == 1) ? 'Activado' : 'Desactivado'; ?></th>
            <td><a name="btnEditarProducto" id="btnEditarProducto" class="btn edit" href="EditarProducto.php?txtID=<?php echo $row['IDProducto']; ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                |
                <a class="btn delete" href="../../Models/BorrarProducto.php?txtID=<?php echo $row['IDProducto']; ?>" role="button">
                    <i class="fa-solid fa-trash"></i>
                </a>

            </td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8'>No se encontraron registros.</td></tr>";
} ?>

