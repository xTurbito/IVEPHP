//Funcion para la alta de Usuario
const formUsuario = document.querySelector("#formUsuario")
if(formUsuario){
    formUsuario.addEventListener('submit', e => {
        e.preventDefault()
        const data = Object.fromEntries(
            new FormData(e.target)
        )
        let URL = "../../Controllers/AltaUsuario.php";

        axios.post(URL, data,{
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function(response){
            if(response.data.Resultado == "ok"){
                Swal.fire({
                    title: "<strong>Registro Exitoso</strong>",
                    html: "<i>El Departamento <strong>" +
                        data.nombre +
                        "</strong> fue creado con éxito</i>",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "../../Modulos/usuarios/index.php";
                });
            }else {
                alert("ERROR!!!");
            }
        })
        .catch(function(error) {
            alert("Error: " + error.message);
        });
    })
}




    

//Funcion para editar al Usuario
    const formEditarUsuario = document.getElementById("formEditarUsuario");
    if (formEditarUsuario) {
        formEditarUsuario.addEventListener("submit", function(e) {
            e.preventDefault();

            let id = document.getElementById("id").value;
            let usuario = document.getElementById("usuario").value;
            let nombre = document.getElementById("nombre").value;
            let password = document.getElementById("password").value;
            let tipo = document.getElementById("tipo").value;
            let status = document.getElementById("status").value;

            let valores = {
                id: id,
                usuario: usuario,
                nombre: nombre,
                password: password,
                tipo: tipo,
                status: status
            };

            let URL = "../../Controllers/EditarUsuario.php";

            axios.post(URL, valores, {
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                .then(function(response) {
                    if (response.data.Resultado == "ok") {
                        Swal.fire({
                            title: "<strong>Actualizacion Exitosa</strong>",
                            html: "<i>El usuario <strong>" +
                                nombre +
                                "</strong> fue actualizado con éxito</i>",
                            icon: "success",
                            showCancelButton: false,
                            confirmButtonText: "OK",
                        }).then(function() {
                            window.location.href = "../../Modulos/Usuarios/index.php";
                        });
                    } else {
                        alert("ERROR!!!");
                    }
                })
                .catch(function(error) {
                    alert("Error: " + error.message);
                });
        });
    }
