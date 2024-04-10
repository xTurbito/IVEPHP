const formProducto = document.querySelector("#formProducto");
if (formProducto) {
  formProducto.addEventListener("submit", (e) => {
    e.preventDefault();
    const data = new FormData(e.target); 

    let URL = "../../Models/AltaProducto.php";

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

