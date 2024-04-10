<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
    body {
        background-color: #343a40;
    }

    .card {
        border-radius: 10px;
        box-shadow: 10px 10px 5px 0px rgba(0, 0, 0, 0.75);
    }

    .btn {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 70%;
        background-color: blueviolet;
        border-color: blueviolet;
        transition: background-color 0.3s ease;
    }

    .btn:hover {
        background-color: darkmagenta;
        border-color: darkmagenta;
    }


    .form-control {
        border: none;
        border-radius: 4px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        padding: 10px 15px;
    }

    .form-control:focus {
        outline: none;
        box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.16), 0 3px 10px 0 rgba(0, 0, 0, 0.12);
    }

    .stylish-font {
        font-family: 'Arial', sans-serif;
        color: #5a6268;
    }

    .stylish-input {
        border: none;
        border-bottom: 2px solid #5a6268;
        border-radius: 0;
        box-shadow: none;
    }

    .stylish-input:focus {
        border-color: #80bdff;
        box-shadow: none;
    }


    .stylish-btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <h2 class="card-title text-center stylish-font">Iniciar Sesión</h2>
                <form class="p-3" id="formLogin">
                    <div class="form-group mb-4">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control stylish-input" id="usuario" name="usuario" >
                    </div>
                    <div class="form-group mb-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control stylish-input" id="password" name="password" >
                    </div>
                    <button type="submit" class="btn stylish-btn">Entrar</button>
                </form>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="http://localhost/Assets/FuncionesLogin.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</body>
</html>