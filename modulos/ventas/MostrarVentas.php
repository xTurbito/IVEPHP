<?php
$sql = "SELECT * FROM ventas ORDER BY idVenta DESC";
$result = $link->query($sql);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){ ?>
        <tr>
            <td scope="row"><?php echo $row['idVenta'] ?></td>
            <td><?php echo $row['cajera'] ?></td>
            <td><?php echo $row['cliente'] ?></td>
            <td><?php echo $row['total'] ?></td>
            <td><?php echo $row['fecha'] ?></td>
            <td>
                <a name="btnver" id="btnver" class="btn edit" href="VerVenta.php?txtID=<?php echo $row['idVenta']; ?>" role="button"><i class="fa-solid fa-eye"></i></a>
            </td>
        </tr>
<?php
    }
} else {
    $Resultado .= "<tr><td colspan='3'>No se encontraron registros.</td></tr>";
}
?>