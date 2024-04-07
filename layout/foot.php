</main>
<a href="#" class="theme-toggle">
    <i class="fa-regular fa-moon"></i>
    <i class="fa-regular fa-sun"></i>
</a>
</div>
</div>
<!--BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
</script>

<!-- FUNCIONES  -->
<script src="http://localhost/SistemaVentasPHP/Assets/Funciones.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="http://localhost/SistemaVentasPHP/layout/script.js"></script>
<script src="http://localhost/SistemaVentasPHP/Assets/funcionesProductos.js"></script>
<script src="http://localhost/SistemaVentasPHP/Assets/funcionesUsuarios.js"></script>
<script src="http://localhost/SistemaVentasPHP/Assets/funcionesDepartamentos.js"></script>
<script src="http://localhost/SistemaVentasPHP/Assets/funcionesReportes.js"></script>

<script>
    $(document).ready(function() {
        $("#tabla_id").DataTable({
            "pageLength": 5,
            lengthMenu: [
                [5, 10, 25, 50],
                [5, 10, 25, 50],
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
            }
        });

    });
</script>
</body>
</html>