<?php
$url_base = "http://localhost/";
$modulos = [
    ['url' => $url_base, 'icon' => 'fa-solid fa-house pe-2', 'nombre' => 'Inicio'],
    ['url' => $url_base . 'modulos/Ventas/', 'icon' => 'fa-solid fa-cash-register pe-2', 'nombre' => 'Ventas'],
    ['url' => $url_base . 'modulos/usuarios/', 'icon' => 'fa-solid fa-user pe-2', 'nombre' => 'Usuarios'],
    ['url' => $url_base . 'modulos/perfiles/', 'icon' => 'fa-solid fa-address-card pe-2', 'nombre' => 'Perfiles'],
    ['url' => $url_base . 'modulos/productos/', 'icon' => 'fa-solid fa-box pe-2', 'nombre' => 'Productos'],
    ['url' => $url_base . 'modulos/departamentos/', 'icon' => 'fa-solid fa-building pe-2', 'nombre' => 'Departamentos'],
    ['url' => $url_base . 'modulos/Reportes/', 'icon' => 'fa-solid fa-table-list pe-2', 'nombre' => 'Reportes'],
    
];
$permisos = $_SESSION['permisos'];
$permisos = explode(',', $permisos);
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IVE Sistema Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost/layout/style.css">
    <link rel="stylesheet" href="http://localhost/layout/buttons.css">

    <!--DATATABLES  -->
    <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="/">IVE</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Modulos
                    </li>
                    <?php foreach ($modulos as $modulo) : ?>
                        <?php if (in_array($modulo['nombre'], $permisos)) : ?>
                            <li class="sidebar-item">
                                <a href="<?php echo $modulo['url'] ?>" class="sidebar-link">
                                    <i class="<?php echo $modulo['icon'] ?>"></i>
                                    <?php echo $modulo['nombre'] ?>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="#" id="logout" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <script>
                document.getElementById('logout').addEventListener('click', function(e) {
                    e.preventDefault();

                    fetch('http://localhost/Models/CerrarSesion.php')
                        .then(response => response.json())
                        .then(data => {
                            window.location.href = 'http://localhost/login.php';
                        })
                        .catch(error => console.log(error));
                });
            </script>