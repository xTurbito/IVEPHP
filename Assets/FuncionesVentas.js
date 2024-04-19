
//LOGICA PARA AGREGAR PRODUCTOS A LA VENTA
document.getElementById("search").addEventListener("keyup", getProductos);
let total = 0;
function getProductos() {
    let inputProductos = document.getElementById("search").value;
    let lista = document.getElementById("lista");

    let url = "../../Models/getProductos.php"
    let formData = new FormData();
    formData.append("producto", inputProductos);

    if (inputProductos.length > 0) {
        fetch(url, {
            method: "POST",
            body: formData,
            mode: "cors"
        }).then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        }).then(data => {
            if (Array.isArray(data)) {
                lista.style.display = "block";
                let html = '';
                data.forEach(producto => {
                    html += `<li class="mi-clase-li">${producto}</li>`;
                });
                lista.innerHTML = html;

                let items = lista.querySelectorAll('.mi-clase-li');
                items.forEach(item => {
                    item.addEventListener('click', function() {
                        let inputContainer = document.getElementById('inputContainer');
                        let inputWrapper = document.createElement('div');
                        inputWrapper.className = "input-wrapper";

                        let productAndPrice = this.textContent.split(" $"); // Divide el texto del producto y el precio
                        let productName = productAndPrice[0];
                        let productUnitPrice = parseFloat(productAndPrice[1]); // Convierte el precio a un número

                        let newInput = document.createElement('input');
                        newInput.value = productName;
                        newInput.className = "mi-clase-input"; // Agrega una clase al nuevo input
                        newInput.readOnly = true; // Hace que el input sea de solo lectura

                        let priceInput = document.createElement('input');
                        priceInput.value = productUnitPrice; // Asigna el precio al input de precio
                        priceInput.className = "mi-clase-input"; // Agrega una clase al input de precio
                        priceInput.readOnly = true; // Hace que el input sea de solo lectura

                        let productPrice = productUnitPrice; // El precio del producto es simplemente el precio unitario

                        let deleteButton = document.createElement('button');
                        deleteButton.textContent = "Borrar";
                        deleteButton.className = "mi-clase-boton"; // Agrega una clase al botón
                        deleteButton.addEventListener('click', function() {
                            total -= productPrice; // Resta el precio del producto del total
                            document.getElementById('total').textContent = "Total: $" + total.toFixed(2); // Actualiza el total en el HTML
                            inputContainer.removeChild(inputWrapper);
                        });

                        inputWrapper.appendChild(newInput);
                        inputWrapper.appendChild(priceInput);
                        inputWrapper.appendChild(deleteButton);
                        inputContainer.appendChild(inputWrapper);
                        document.getElementById('search').value = '';
                        lista.style.display = "none";

                        total += productPrice; // Suma el precio del producto al total
                        document.getElementById('total').textContent = "Total: $" + total.toFixed(2); // Actualiza el total en el HTML
                    });
                });
            } else {
                console.log('data no es un array:', data);
            }
        })
    }
}

const formVenta = document.querySelector("#formVenta")
if(formVenta){
    formVenta.addEventListener('submit', e => {
        e.preventDefault()
        const formdata = new FormData(e.target);
        const data = Object.fromEntries(formdata.entries());

        // Agrega los productos a los datos
        let productos = [];
        document.querySelectorAll('.mi-clase-input').forEach(function(input) {
            productos.push(input.value);
        });
        data.productos = productos;

        // Agrega el total a los datos
        let totalVenta = parseFloat(document.getElementById('total').textContent.split('$')[1]);
        data.total = totalVenta;

        alert(JSON.stringify(data));

        let URL = "../../Models/AltaVenta.php";

       
        axios.post(URL, data,{
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(function(response){
            if(response.data.Resultado == "ok"){
                Swal.fire({
                    title: "<strong>Venta Exitosa</strong>",
                    html: "<i>La Venta del Cliente <strong>" +
                        data.cliente +
                        "</strong> fue registrada con exito</i>",
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonText: "OK",
                }).then(function() {
                    window.location.href = "../../Modulos/ventas/index.php";
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