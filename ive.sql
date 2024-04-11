-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 11-04-2024 a las 02:58:42
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ive`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `IDDepartamento` int(11) NOT NULL,
  `NombreDepartamento` varchar(100) NOT NULL,
  `lActivo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`IDDepartamento`, `NombreDepartamento`, `lActivo`) VALUES
(4, 'Procesadores', 1),
(5, 'Tarjetas', 1),
(6, 'Perifericos', 0),
(7, 'Monitores', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfiles`
--

CREATE TABLE `Perfiles` (
  `idPerfil` int(11) NOT NULL,
  `NombrePerfil` varchar(50) NOT NULL,
  `Permisos` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Perfiles`
--

INSERT INTO `Perfiles` (`idPerfil`, `NombrePerfil`, `Permisos`) VALUES
(1, 'Cajera', 'usuarios,'),
(3, 'Administrador', 'Usuarios,Productos'),
(4, 'Cajera2', 'Usuarios,Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Permisos`
--

CREATE TABLE `Permisos` (
  `idPermiso` int(11) NOT NULL,
  `nombre_permiso` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Permisos`
--

INSERT INTO `Permisos` (`idPermiso`, `nombre_permiso`) VALUES
(1, 'Usuarios'),
(2, 'Productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IDProducto` int(11) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Descripcion` text DEFAULT NULL,
  `precio_venta` decimal(10,2) DEFAULT NULL,
  `Stock` int(11) DEFAULT NULL,
  `lActivo` int(11) NOT NULL,
  `fotoproducto` text DEFAULT NULL,
  `precio_costo` decimal(10,2) DEFAULT NULL,
  `IDDepartamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `contacto` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `lActivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombre`, `contacto`, `email`, `direccion`, `lActivo`) VALUES
(0, 'Nvidia', '9992412341', 'nvidia@gmail.com', 'Calle 60 LA', 1),
(1, 'BARCEL', '9992541358', 'miguelalcocer2102@gmail.com', '596B 63', 0),
(2, 'LALA', '9992501358', 'miguelalcocer2102@gmail.com', 'Calle 63 #596b x 56b y 60 La Herradura II', 1),
(3, 'Bimbo', '9992501358', 'miguelalcocer2102@gmail.com', 'Calle 36 Zona', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `idtipo` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tipo_usuclave` int(11) NOT NULL,
  `createdAT` date DEFAULT NULL,
  `updatedAT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`idtipo`, `nombre`, `tipo_usuclave`, `createdAT`, `updatedAT`) VALUES
(1, 'Administrador', 1, NULL, NULL),
(2, 'Usuario Estandar', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idPerfil` int(11) NOT NULL,
  `lactivo` int(11) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `updatedAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `usuario`, `password`, `nombre`, `idPerfil`, `lactivo`, `createdAt`, `updatedAt`) VALUES
(27, 'malcocer', 'Hola123', 'Miguel', 3, 1, '2024-03-10', '2024-03-10'),
(35, 'Bruelas', '1234', 'Brian Ruelas', 1, 0, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`IDDepartamento`);

--
-- Indices de la tabla `Perfiles`
--
ALTER TABLE `Perfiles`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `Permisos`
--
ALTER TABLE `Permisos`
  ADD PRIMARY KEY (`idPermiso`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IDProducto`),
  ADD KEY `IDDepartamento` (`IDDepartamento`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`idtipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `IDDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `Perfiles`
--
ALTER TABLE `Perfiles`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `Permisos`
--
ALTER TABLE `Permisos`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IDProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `idtipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`IDDepartamento`) REFERENCES `departamentos` (`IDDepartamento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idPerfil`) REFERENCES `Perfiles` (`idPerfil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
