<?php
$sql = "SELECT 
P.IDProducto,
P.Nombre,
P.Descripcion,
P.precio_venta,
P.Stock,
P.lActivo,
P.IDDepartamento,
D.NombreDepartamento
FROM 
Productos P
INNER JOIN 
Departamentos D ON P.IDDepartamento = D.IDDepartamento
WHERE
P.Descripcion <> 'BAJA';
;";
$result = $link->query($sql);
?>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td scope="row"><?php echo $row['Nombre'] ?></td>
            <td scope="row"><?php echo $row['Descripcion'] ?></td>
            <td><?php echo $row['precio_venta'] ?></td>
            <td><?php echo $row['Stock'] ?></td>
            <td><?php echo $row['NombreDepartamento'] ?></td>
            <th><?php echo ($row['lActivo'] == 1) ? 'Activado' : 'Desactivado'; ?></th>
            <td><a name="btnEditarProducto" id="btnEditarProducto" class="btn btn-info" href="EditarProducto.php?txtID=<?php echo $row['IDProducto']; ?>" role="button"><i class="fa-regular fa-pen-to-square"></i></a>
                |
                <a class="btn btn-danger" href="javascript:void(0);" onclick="borrar(<?php echo $row['IDProducto']; ?>, '<?php echo $row['Nombre']; ?>')" role="button">
                    <i class="fa-solid fa-trash"></i>
                </a>

            </td>
        </tr>
<?php
    }
} else {
    $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
} ?>
<script>
    function borrar(id, nombre) {
        Swal.fire({
            title: "¿Deseas borrar al usuario '" + nombre + "'?",
            showCancelButton: true,
            confirmButtonText: "Si"
        }).then((result) => {

            if (result.isConfirmed) {
                window.location = "index.php?txtID=" + id;
            }
        });
    }
</script>