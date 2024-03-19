<?php include("../../layout/top.php") ?>
<div class="container mt-3">
    <div class="card">
        <div class="card-header">
        <h3 className="d-flex justify-content-center">Nuevo Departamento</h3>
        </div>
        <div class="card-body">
            <form method="post" id="formDepartamento">
                <div class="mb-3">
                    <label for="NombreDepartamento" class="form-label">Nombre del Departamento</label>
                    <input type="text" class="form-control" name="NombreDepartamento" id="NombreDepartamento" required>
                    
                </div>
                <button type="submit" class="btn btn-success">Guardar</button>
                <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
            </form>
        </div>
    </div>
</div>
<script>
    document.getElementById("formDepartamento").addEventListener("submit", (e) => {
        e.preventDefault();
        const nombre = document.getElementById("NombreDepartamento").value 

        if(!nombre){
            alert("Por favor complete todos los campos");
            return;
        }

        const valores = {
            nombre
        };

        const URL = "../../Controllers/AltaDepartamento.php";


        axios.post(URL, valores, {
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then((response) => {
            if(response.data.Resultado === "ok"){
                Swal.fire({
                        title: "<strong>Registro Exitoso</strong>",
                        html: `<i>El Departamento <strong>${nombre}</strong> fue registrado con éxito</i>`,
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonText: "OK",
                    }).then(() => {
                        window.location.href = "../../Modulos/departamentos/index.php";
                    });
            }else {
                alert("ERROR!!!");
            }
        })
        .catch((error) => {
                alert("Error: " + error.message);
            });
    })
</script>
<?php include("../../layout/foot.php"); ?>