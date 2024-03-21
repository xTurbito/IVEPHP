//Funcion para la alta de Usuario
    const formUsuario = document.getElementById("formUsuario");
    if (formUsuario) {
        formUsuario.addEventListener("submit", (e) => {
            e.preventDefault();
            const usuario = document.getElementById("usuario").value;
            const nombre = document.getElementById("nombre").value;
            const password = document.getElementById("password").value;
            const tipo = document.getElementById("tipo").value;

            

            const valores = {
                usuario,
                nombre,
                password,
                tipo
            };
            const URL = "../../Controllers/AltaUsuario.php";

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
        });
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
