const formDepartamento = document.getElementById("formDepartamento");
if(formDepartamento){
formDepartamento.addEventListener("submit", function(e) {
    e.preventDefault();


    let nombre = document.getElementById("nombre").value;
    let status = document.getElementById("status").value;

    let valores = {
        nombre : nombre,
        status : status
    };

    let URL =  "../../Models/AltaDepartamento.php";

    axios.post(URL, valores, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function(response) {
            if (response.data.Resultado == "ok") {
                Swal.fire({
                    title: "<strong>Registro Exitoso</strong>",
                    html: "<i>El Departamento <strong>" +
                        nombre +
                        "</strong> fue creado con éxito</i>",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "../../Modulos/Departamentos/index.php";
                });
            } else {
                alert("ERROR!!!");
            }
        })
        .catch(function(error) {
            alert("Error: " + error.message);
        });
}); 

};


const formEditarDepartamento = document.getElementById("formEditarDepartamento");
if(formEditarDepartamento){
 formEditarDepartamento.addEventListener("submit", function(e) {
    e.preventDefault();

    let id = document.getElementById("id").value;
    let nombre = document.getElementById("nombre").value;
    let status = document.getElementById("status").value;

    let valores = {
        id: id,
        nombre : nombre,
        status : status
    };

    let URL =  "../../Models/EditarDepartamento.php";

    axios.post(URL, valores, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function(response) {
            if (response.data.Resultado == "ok") {
                Swal.fire({
                    title: "<strong>Actualizacion Exitosa</strong>",
                    html: "<i>El Departamento <strong>" +
                        nombre +
                        "</strong> fue actualizado con éxito</i>",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "../../Modulos/Departamentos/index.php";
                });
            } else {
                alert("ERROR!!!");
            }
        })
        .catch(function(error) {
            alert("Error: " + error.message);
        });
}); 

};