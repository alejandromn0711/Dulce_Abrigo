-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2020 a las 02:03:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compra`
--

CREATE TABLE `carrito_compra` (
  `idcarrito` int(11) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `codproducto` int(20) NOT NULL,
  `cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nombre_categoria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre_categoria`) VALUES
(1, 'Colchón'),
(2, 'Sabana'),
(3, 'Cubre colchón'),
(4, 'Almohada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `Clave` varchar(120) NOT NULL,
  `estado` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `correo`, `nombre`, `telefono`, `direccion`, `Clave`, `estado`) VALUES
(10832175, 'maro31@gmail.com', 'Mateo ', '3005487544', '0', 'd64bd96f9f28533849461bdd2e8481a0', 'Activo'),
(99018129, 'dalniel@gmail.com', 'Daniel Salvador', '3150247858', '0', 'b5ea8985533defbf1d08d5ed2ac8fe9b', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `iddetallefactura` bigint(11) NOT NULL,
  `nofactura` bigint(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciototal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `iddetalletemp` int(11) NOT NULL,
  `nofactura` bigint(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `preciototal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `iddetalleventa` int(11) NOT NULL,
  `idventa` int(20) NOT NULL,
  `idproducto` int(20) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `iddomicilio` int(11) NOT NULL,
  `idusuario` int(20) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `direccion` varchar(20) NOT NULL,
  `detalle_producto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `identrada` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `nofactura` bigint(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `iddomicilio` int(11) NOT NULL,
  `IVA` varchar(20) NOT NULL,
  `totalfactura` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `idmetodo_pago` int(11) NOT NULL,
  `Nombre_metodo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codproducto` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `categoria` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codproducto`, `nombre_producto`, `imagen`, `categoria`, `descripcion`, `precio`, `existencia`) VALUES
(1, 'Colchon Sencillo', 'colchon2.jpg', 1, 'Colchon para cama sencilla con medidas de 1 metro de ancho y 1.90 metros de largo', '280', 15),
(2, 'Colchon Cama Matrimonial', 'colchon1.jpg', 1, 'Colchon para cama Matrimonial con medidas de 1.35 metros de ancho y 1.90 metros de largo', '350', 22),
(3, 'Colchon Queen', 'colchon3.jpg', 1, 'Colchon Cama Queen con medidas de 1.50 metros de ancho y 1.90 metros de largo', '430', 10),
(4, 'Colchon King', 'colchon4.jpg', 1, 'Colchon para cama King con medidas de 2 metros de ancho y 1.90 metros de largo', '500', 8),
(5, 'Colchon Presidencial', 'colchon1.jpg', 1, 'Colchon para cama Presidencial con medidas de 2 metros de ancho y 2 metros de largo', '590', 6),
(6, 'Colchon California King', 'colchon3.jpg', 1, 'Colchon para cama California King con medidas de 2.13 metros de ancho y 1.83 metros de largo', '650', 4),
(7, 'Sabana Cama Sencilla', 'sabana.jpg', 2, 'Sabana para cama Sencilla con medidas de 1 metros de ancho y 1.90 metros de largo', '30', 30),
(8, 'Sabana Cama Matrimonial', 'sabana.jpg', 2, 'Sabana para cama Matrimonial con medidas de 1.35 metros de ancho y 1.90 metros de largo', '38', 28),
(9, 'Sabana Cama Queen', 'sabana.jpg', 2, 'Sabana para cama Queen con medidas de 1.50 metros de ancho y 1.90 metros de largo', '45', 17),
(10, 'Sabana Cama King', 'sabana.jpg', 2, 'Sabana para cama King con medidas de 2 metros de ancho y 1.90 metros de largo', '51', 15),
(11, 'Sabana Cama Presidencial', 'sabana.jpg', 2, 'Sabana para cama Presidencial con medidas de 2 metros de ancho y 2 metros de largo', '60', 10),
(12, 'Sabana Cama California King', 'sabana.jpg', 2, 'Sabana para cama California King con medidas de 2 metros de ancho y 1.83 metros de largo', '58', 6),
(13, 'Cubrecolchon Impermeable Cama ', 'cubrecolchon.jpg', 3, 'Cubrecolchon para cama Sencilla con medidas de 1 metros de ancho y 1.90 metros de largo', '36', 21),
(14, 'Cubrecolchon Impermeable Cama ', 'cubrecolchon.jpg', 3, 'Cubrecolchon para cama Matrimonial con medidas de 1.35 metros de ancho y 1.90 metros de largo', '43', 18),
(15, 'Cubrecolchon Impermeable Cama ', 'cubrecolchon.jpg', 3, 'Cubrecolchon para cama Queen con medidas de 1.5 metros de ancho y 1.90 metros de largo', '50', 15),
(16, 'Cubrecolchon Impermeable Cama ', 'cubrecolchon.jpg', 3, 'Cubrecolchon para cama King con medidas de 2 metros de ancho y 1.90 metros de largo', '55', 11),
(17, 'Cubrecolchon Impermeable Cama ', 'cubrecolchon.jpg', 3, 'Cubrecolchon para cama Presidencial con medidas de 2 metros de ancho y 2 metros de largo', '60', 7),
(18, 'CubreColchon Cama California K', 'cubrecolchon.jpg', 3, 'Cubrecolchon para cama California King con medidas de 2 metros de ancho y 1.83 metros de largo', '58', 6),
(19, 'Almohada Siliconada', 'almohada.jpg', 4, 'Almohada hecha de Silicona con medidas de 1 metro de ancho y 0.70 metros de largo', '25', 43),
(20, 'Almohada ViscoFoam', 'almohada.jpg', 4, 'Almohada hecha del material moldeable ViscoFoam con medidas de 1 metro de ancho y 0.70 metros de largo', '40', 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `idsalida` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `nombreusuario` varchar(15) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `nombreusuario`, `clave`) VALUES
(7, 'Sebastián ', 'sebas@gmail.com', 'sebasadmin', '43df3b39377fbc50e80b259e8033a7f8'),
(8, 'Sara', 'sara@gmail.com', 'saraadmin', '312dc6ec7c900fb9017bf43c6b1f81bb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idventa` int(11) NOT NULL,
  `idusuario` int(20) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `idmetodopago` int(20) NOT NULL,
  `iddomicilio` int(20) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  ADD PRIMARY KEY (`idcarrito`),
  ADD KEY `codproducto` (`codproducto`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`iddetallefactura`),
  ADD KEY `idproducto` (`idproducto`),
  ADD KEY `nofactura` (`nofactura`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`iddetalletemp`),
  ADD KEY `nofactura` (`nofactura`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`iddetalleventa`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`iddomicilio`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcliente` (`idcliente`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`identrada`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`nofactura`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idcliente` (`idcliente`),
  ADD KEY `iddomicilio` (`iddomicilio`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`idmetodo_pago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codproducto`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`idsalida`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idventa`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `idmetodopago` (`idmetodopago`),
  ADD KEY `iddomicilio` (`iddomicilio`),
  ADD KEY `idcliente` (`idcliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_compra`
--
ALTER TABLE `carrito_compra`
  MODIFY `idcarrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `iddetallefactura` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `iddetalletemp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `iddomicilio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `identrada` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `nofactura` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
