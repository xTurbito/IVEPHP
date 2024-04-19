<?php
$modulos = [
    ['url' => $url_base, 'icon' => 'fa-solid fa-house pe-2', 'nombre' => 'Inicio'],
    ['url' => $url_base . 'modulos/productos/', 'icon' => 'fa-solid fa-cash-register', 'nombre' => 'Productos'],
    ['url' => $url_base . 'modulos/usuarios/', 'icon' => 'fa-solid fa-user pe-2', 'nombre' => 'Usuarios'],

];
$permisos = $_SESSION['permisos'];
$permisos = explode(',', $permisos);
?>