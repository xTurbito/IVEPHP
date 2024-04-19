const formDetalleVenta = document.querySelector("#formDetalleVenta")
if(formDetalleVenta){
    formDetalleVenta.addEventListener('submit', e => {
        e.preventDefault();

        const formdata = new FormData(e.target);
        const data = Object.fromEntries(formdata.entries());

        const URL = "../../FPDF/DetalleVenta.php";

        axios.post(URL, JSON.stringify(data), {
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
    })
}