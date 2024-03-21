//Reporte para catalogo de productos

const formCatalogoProductos = document.getElementById("formCatalogoProductos");
if(formCatalogoProductos){
    formCatalogoProductos.addEventListener("submit", (e) => {
        e.preventDefault();

        const departamento = document.getElementById("departamento").value;
        const precio = document.getElementById("precio").value;
        const activo = document.getElementById("activo").value;

        const valores = {
            departamento,
            precio,
            activo
        };

        const URL = "http://localhost/FPDF/CatalogoProductos.php";  

        axios.post(URL, valores, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => {
            if (response.data.Resultado === "ok") {
                Swal.fire({
                    title: "<strong>Registro Exitoso</strong>",
                    html: `<i>El usuario <strong>${nombre}</strong> fue registrado con éxito</i>`,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(() => {
                    window.location.href = "../../Modulos/Usuarios/index.php";
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