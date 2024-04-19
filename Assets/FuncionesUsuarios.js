//Funcion para la alta de Usuario
const formUsuario = document.querySelector("#formUsuario")
if(formUsuario){
    formUsuario.addEventListener('submit', e => {
        e.preventDefault()
        const formdata = new FormData(e.target);

        const data = Object.fromEntries(formdata.entries());
        

        let URL = "../../Models/AltaUsuario.php";

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
                    title: "<strong>Registro Exitoso</strong>",
                    html: "<i>El Usuario <strong>" +
                        data.nombre +
                        "</strong> fue creado con éxito</i>",
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




    
//FUNCION PARA EDITAR USUARRIO
const formEditarUsuario = document.querySelector("#formEditarUsuario")  
if(formEditarUsuario){
    formEditarUsuario.addEventListener('submit', e => {
        e.preventDefault();
        const formdata = new FormData(e.target);
        const data = Object.fromEntries(formdata.entries());
      

        let URL = "../../Models/EditarUsuario.php";

        
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
                    title: "<strong>Registro Exitoso</strong>",
                    html: "<i>El Usuario <strong>" +
                        data.nombre +
                        "</strong> fue editado con éxito</i>",
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
    });
}