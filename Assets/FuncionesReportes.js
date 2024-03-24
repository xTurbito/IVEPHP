const formCatalogoProductos = document.getElementById("formCatalogoProductos");
if (formCatalogoProductos) {
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

        const URL = "../../FPDF/CatalogoProductos.php";

        axios.post(URL, valores, {
                headers: {
                    'Content-Type': 'application/json'
                },
                responseType: 'blob'
            })
            .then((response) => {
                const blob = new Blob([response.data], { type: 'application/pdf' });
                const url = window.URL.createObjectURL(blob);
                window.open(url, '_blank');
            })
            .catch((error) => {
                console.error("Error: " + error.message);
                alert("Error: " + error.message);
            });
    });
}



/*CODIGO PARA VALIDAR SI ESTA REGRESANDO LA INFORMACION 
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
                console.log(response.data); // Imprimir la respuesta en la consola
                if (response.data.Resultado === "ok") {
                   alert("Llegó la información correctamente")
                } else {
                    alert("ERROR!!!");
                }
            })
            .catch((error) => {
                console.error("Error: " + error.message); // Imprimir el mensaje de error en la consola
                alert("Error: " + error.message);
            });
    })
}
*/