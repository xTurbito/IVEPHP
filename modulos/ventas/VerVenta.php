<?php
require("../../config/login.php");
include("../../layout/top.php");
include("../../config/dbcontext.php");
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">DETALLE DE VENTA</h3>

            <form action="" id="formDetalleVenta">
                <?php
                $txtID = isset($_GET['txtID']) ? $_GET['txtID'] : '';
                $query = $link->prepare("SELECT idVenta FROM detalleventa WHERE idVenta = ?");
                $query->bind_param("i", $txtID);
                $query->execute();
                $result = $query->get_result();

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<input type="text" hidden name="idVenta" readonly value="' . $row['idVenta'] . '">';
                } else {
                    echo '<input type="text" name="idVenta" readonly value="NO SE ENCONTRÓ EL idVenta">';
                }
                ?>
                <button type="submit" class="btn btn-danger ms-auto"><i class="fa-solid fa-print"></i></button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">

                    <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['txtID'])) {
                            $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";
                            $query = $link->prepare("SELECT productos,precio FROM detalleventa where idVenta = ?");
                            $query->bind_param("i", $txtID);
                            $query->execute();
                            $result = $query->get_result();

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row['productos'] . "</td><td>" . $row['precio'] . "</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='2'>NO SE ENCONTRARON REGISTROS</td></tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="../../Assets/FuncionesVentasReportes.js"></script>
<script src="../../Assets/Funciones.js"></script>
<?php
include("../../layout/foot.php");
?>