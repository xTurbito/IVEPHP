document.querySelector("#formLogin")
.addEventListener('submit', e => { 
    e.preventDefault()
    const data = Object.fromEntries(
        //El formdata lee los names de los inputs
        new FormData(e.target)
    )   

    // Verificar que los datos no estén vacíos
    if (!data.usuario || !data.password) {
        alert('Por favor, completa todos los campos');
        return;
    }

    let URL = "http://localhost/SistemaVentasPHP/Models/ValidarLogin.php";

    axios.post(URL, data,{
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(function(response){
        if(response.data.Resultado == "ok"){
            Swal.fire({
                title: "<strong>Inicio de Sesión Exitoso</strong>",
                html: "<i>Bienvenido <strong>" +
                    data.usuario +
                    "</strong></i>",
                icon: "success",
                showCancelButton: false,
                confirmButtonText: "OK",
            }).then(function() {
                window.location.href = "./index.php";
            });
        }else {
            alert("ERROR!!!");
        }
    })
});