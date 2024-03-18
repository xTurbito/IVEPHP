<?php include("../../layout/top.php") ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 className="d-flex justify-content-center">Nuevo Producto</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" id="formProducto">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="precio_costo" class="form-label">Precio Costo</label>
                    <input type="number" class="form-control" name="precio_costo" id="precio_costo" placeholder="Precio Costo del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="precio_venta" class="form-label">Precio Venta</label>
                    <input type="number" class="form-control" name="precio_venta" id="precio_venta" placeholder="Precio Venta del Producto" required>
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock" id="stock" placeholder="Stock del Producto" required>
                </div>
                <?php include("./SelectDepartamentos.php") ?>
                <div class="mb-3">
                    <label for="foto_producto" class="file-label">Foto del Producto
                    <input type="file" id="foto_producto" class="form-control" onchange="previewImage(event)" required>
                    <img id="preview" >
                    </label>
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<script>
    //Cargar la imagen en el img
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]); // Convertimos el archivo a una URL de datos
        }
    }

    //Alta del Producto
    document.getElementById("formProducto").addEventListener("submit", function(e){
        e.preventDefault();

        const nombre = document.getElementById("nombre").value;
        const descripcion = document.getElementById("descripcion").value;
        const precio_costo = document.getElementById("precio_costo").value;
        const precio_venta = document.getElementById("precio_venta").value;
        const stock = document.getElementById("stock").value;
        const departamentos = document.getElementById("departamentos").value;
        const fotoProducto = document.getElementById("foto_producto");

        fileInput.addEventListener("change", e => {
            const file = fileInput.files[0];
            const reader = new FileReader();

            reader.addEventListener("load", () => { 
            });

            reader.readAsDataURL(file);
        })

        let valores = {
            nombre,
            descripcion,
            precio_costo,
            precio_venta,
            stock,
            departamentos,
            fotoProducto
        };
        
        let URL = "../../Controllers/AltaProducto.php"

        axios.post(URL, valores, {
            header: {
                'Content-Type': 'applications/json'
            }
        })
        .then(function(response){
            if(response.data.Resultado == "ok"){
                Swal.fire({
                        title: "<strong>Registro Exitoso</strong>",
                        html: "<i>El Producto <strong>" +
                            nombre +
                            "</strong> fue registrado con éxito</i>",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonText: "OK",
                    }).then(function() {
                        window.location.href = "../../Modulos/Productos/index.php";
                    });
            }else {
                    alert("ERROR!!!");
                }
        })
        .catch(function(error) {
                alert("Error: " + error.message);
            });
    })
</script>
<?php include("../../layout/foot.php"); ?>