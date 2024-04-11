const formProducto = document.querySelector("#formProducto");
if (formProducto) {
  formProducto.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(e.target); 

    let URL = "../../Models/AltaProducto.php";

    for (let [key, value] of data.entries()) {
      if (!value) {
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: `El campo ${key} es requerido`,
        });
        return;
      }
    }

    axios.post(URL, data)
      .then(function (response) {
        if (response.data.Resultado == "ok") {
          Swal.fire({
            title: "<strong>Registro Exitoso</strong>",
            html:
              "<i>El Producto <strong>" +
              data.get('nombre') + 
              "</strong> fue creado con éxito</i>",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "OK",
          }).then(function () {
            window.location.href = "../../Modulos/productos/index.php";
          });
        } else {
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



const formEditarProducto = document.querySelector("#formEditarProducto"); 
if(formEditarProducto){
  formEditarProducto.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(e.target); 
    
    

    let URL = "../../Models/EditarProducto.php";

    axios.post(URL, data)
      .then(function (response) {
        if (response.data.Resultado == "ok") {
          Swal.fire({
            title: "<strong>Registro Exitoso</strong>",
            html:
              "<i>El Producto <strong>" +
              data.get('nombre') + 
              "</strong> fue creado con éxito</i>",
            icon: "success",
            showCancelButton: false,
            confirmButtonText: "OK",
          }).then(function () {
            window.location.href = "../../Modulos/productos/index.php";
          });
        } else {
          alert("ERROR!!!");
        }
      })
      .catch(function (error) {
        alert("Error: " + error.message);
      });
  });
}

