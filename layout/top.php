<?php

  $url_base = "http://localhost/ivephp/";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- DATATABLE -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/ivephp">
      IVE
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/ivephp">
            Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url_base?>modulos/usuarios/">
            Usuarios
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $url_base?>modulos/productos/">
            Productos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Departaments">
            Departamentos
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/Clients">
            Clientes
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Reportes
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="/CatalogoProducts">Productos</a></li>
            <li><a class="dropdown-item" href="#action/3.2">Another action</a></li>
            <li><a class="dropdown-item" href="#action/3.3">Something</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#action/3.4">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<section class="container">