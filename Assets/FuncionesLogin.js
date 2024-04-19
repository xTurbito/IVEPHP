const formLogin =  document.querySelector('#formLogin');
if(formLogin){
    formLogin.addEventListener('submit', e => {
        e.preventDefault();
        const formdata = new FormData(e.target);

        const data = Object.fromEntries(formdata.entries());    

        let URL = "../../Models/ValidarLogin.php";

        for (let key in data) {
            if (!data[key]) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `El campo ${key} es requerido`,
                });
                return;
            }
        }

        axios.post(URL, data,{
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function(response){
            if(response.data.Resultado == "ok"){
                Swal.fire({
                    title: "<strong>Acceso Correcto</strong>",
                    html: "<i>Bienvenido <strong>" +
                        data.usuario +
                        "</strong> al Sistema</i>",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "../../modulos/usuarios/index.php";
                });
            }else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Algo salió mal!',
                  });
            }
        })
        .catch(function (error) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Error: ' + error.message,
            });
          });
    })
}