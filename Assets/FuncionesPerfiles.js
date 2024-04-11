const formPerfil = document.querySelector("#formPerfil");
if(formPerfil){
    formPerfil.addEventListener('submit', e => {
        e.preventDefault()
        const formData = new FormData(e.target);

        const checkboxes = formPerfil.querySelectorAll('input[type="checkbox"]');
        const checkboxValues = Array.from(checkboxes)
            .filter(checkbox => checkbox.checked)
            .map(checkbox => checkbox.value);

        if (!checkboxValues.length) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `Al menos un permiso debe ser seleccionado`,
            });
            return;
        }

        formData.delete('permisos'); // Cambiado a 'permisos'

        for (let [key, value] of formData.entries()) {
            if (!value) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: `El campo ${key} es requerido`,
                });
                return;
            }
        }

        const data = Object.fromEntries(formData);
        data['permisos'] = checkboxValues; // Cambiado a 'permisos'
        alert(JSON.stringify(data));

        let URL = "../../Models/AltaPerfil.php";

        axios.post(URL, data, { // Cambiado la coma por un punto
            headers: {
                'Content-Type': 'application/json',
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
                }).then(function(){
                    window.location.href = "../../Modulos/Perfiles/index.php";
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