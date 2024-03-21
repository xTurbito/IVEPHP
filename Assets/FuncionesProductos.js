 //Cargar la imagen en el alta del producto
 function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('preview');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]); 
    }
}

//Alta del producto
const formProducto = document.getElementById("formProducto");
if (formProducto) {
    formProducto.addEventListener("submit", (e) => {
        e.preventDefault();

        const nombre = document.getElementById("nombre").value;
        const descripcion = document.getElementById("descripcion").value;
        const precio = document.getElementById("precio").value;
        const stock = document.getElementById("stock").value;
        const activo = document.getElementById("activo").value;

       
        let valores = {
            nombre,
            descripcion,
            precio,
            stock,
            activo
        };
        
        const URL = "../../Controllers/AltaProducto.php";

        axios.post(URL, valores, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => {
            if (response.data.Resultado === "ok") {
                Swal.fire({
                    title: "<strong>Registro Exitoso</strong>",
                    html: `<i>El Producto <strong>${nombre}</strong> fue registrado con éxito</i>`,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(() => {
                    window.location.href = "../../Modulos/Productos/index.php";
                });
            } else {
                alert("ERROR!!!");
            }
        })
        .catch((error) => {
            alert("Error: " + error.message);
        });
    })
}
