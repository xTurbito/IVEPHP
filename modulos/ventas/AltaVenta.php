<?php
require("../../config/login.php");
include("../../layout/top.php")
?>
<style>
    #lista{
        display: none;
    }

    ul{
        list-style: none;
        width: 250px;
        height: auto;
        position: absolute;
        z-index: 10;
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    li{
        padding: 10px;
        border-bottom: 1px solid #ccc;
        cursor: pointer;
    }

    li:hover {
        background-color: #f5f5f5;
    }

    li:last-child {
        border-bottom: none;
    }
</style>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex justify-content-center">Nueva Venta</h3>
        </div>
        <div>
            <div class="card-body">
                <form action="" method="post" id="formVenta" autocomplete="off">
                    <div class="mb-3">
                        <label for="cliente" class="form-label">Cliente</label>
                        <input type="text" class="form-control" name="cliente" id="cliente" placeholder="Ingresa el Nombre del Cliente">
                    </div>
                    <div >
                        <h3>Productos</h3>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" class="form-control" name="producto" id="search" placeholder="Buscar...">
                            <ul id="lista" ></ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById("search").addEventListener("keyup", getProductos);

function getProductos(){
    let inputProductos = document.getElementById("search").value;
    let lista = document.getElementById("lista");

    let url = "../../Models/getProductos.php"
    let formData = new FormData();
    formData.append("producto", inputProductos);

    if(inputProductos.length > 0){


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
        lista.style.display = "block";
        lista.innerHTML = data;
    }).catch(err => console.log(err));
   } else {
         lista.style.display = "none";
   }
}
</script>
<?php include("../../layout/foot.php"); ?>