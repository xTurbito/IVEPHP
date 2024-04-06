const formProducto = document.querySelector("#formProducto");
if (formProducto) {
  formProducto.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(e.target); 

    let URL = "../../Controllers/AltaProducto.php";

    axios.post(URL, data)
      .then(function (response) {
        if (response.data.Resultado == "ok") {
          Swal.fire({
            title: "<strong>Registro Exitoso</strong>",
            html:
              "<i>El Producto <strong>" +
              data.get('nombre') + 
              "</strong> fue creado con éxito</i>",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "OK",
          }).then(function () {
            window.location.href = "../../Modulos/productos/index.php";
          });
        } else {
          alert("ERROR!!!");
        }
      })
      .catch(function (error) {
        alert("Error: " + error.message);
      });
  });
}



// Función para editar el producto
const formEditarProducto = document.getElementById("formEditarProducto");
if (formEditarProducto) {
    formEditarProducto.addEventListener("submit", (e) => {
        e.preventDefault();

        // Obtener los valores de los campos del formulario
        const id = document.getElementById("id").value;
        const nombre = document.getElementById("nombre").value;
        const descripcion = document.getElementById("descripcion").value;
        const precio_costo = document.getElementById("precio_costo").value;
        const precio_venta = document.getElementById("precio_venta").value;
        const stock = document.getElementById("stock").value;
        const activo = document.getElementById("activo").value;
        const departamento = document.getElementById("departamento").value;

        // Construir objeto con los valores del formulario
        let valores = {
            id,
            nombre,
            descripcion,
            precio_costo,
            precio_venta,
            stock,
            activo,
            departamento
        };

        // URL de la petición AJAX
        const URL = "../../Controllers/EditarProducto.php";

        // Realizar la petición AJAX usando axios
        axios
            .post(URL, valores, {
                headers: {
                    "Content-Type": "application/json",
                },
            })
            .then((response) => {
                if (response.data.Resultado === "ok") {
                    // Si la respuesta es exitosa, mostrar mensaje de éxito y redireccionar
                    Swal.fire({
                        title: "<strong>Actualizacion Exitosa</strong>",
                        html: `<i>El Producto <strong>${nombre}</strong> fue actualizado con éxito</i>`,
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.href = "../../Modulos/Productos/index.php";
                    });
                } else {
                    // Si la respuesta no es exitosa, mostrar mensaje de error
                    alert("ERROR!!!");
                }
            })
            .catch((error) => {
                // En caso de error, mostrar mensaje de error
                alert("Error: " + error.message);
            });
    });
}