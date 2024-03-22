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
            responseType: 'blob', // Especificamos que esperamos una respuesta en formato blob (archivo)
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => {
            const blob = new Blob([response.data], { type: 'application/pdf' });
            const url = window.URL.createObjectURL(blob);
            
            // Abrir el PDF en una nueva ventana
            window.open(url, '_blank');
        })
        .catch((error) => {
            alert("Error: " + error.message);
        });
    })
}
