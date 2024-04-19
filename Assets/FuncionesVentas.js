document.getElementById("producto").addEventListener("keyup", getProductos)

function getProductos() {
    let inputProducto = document.getElementById("producto").value
    let lista = document.getElementById("lista")

    let url = "../../models/getProductos.php" // Asegúrate de que la ruta y el nombre del archivo son correctos
    let formData = new FormData()
    formData.append("producto", inputProducto);

    fetch(url, {
      method: "POST",
      body: formData,
      mode: "cors"  
    }).then(response => response.json())
    .then(data => {
        lista.style.display = 'block'
        lista.innerHTML = ""
        data.forEach(producto => {
            let item = document.createElement('li');
            item.textContent = producto.nombre; // Asegúrate de que 'nombre' es la propiedad correcta
            lista.appendChild(item);
        });
    })
    .catch(err => console.error(err));
}