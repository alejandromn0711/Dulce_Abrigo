-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2021 a las 20:18:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

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
(2, 'Telas'),
(3, 'Cubre colchón'),
(4, 'Almohada'),
(5, 'Base Cama');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedula` int(11) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `Clave` varchar(100) NOT NULL,
  `estado` set('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedula`, `correo`, `nombre`, `telefono`, `direccion`, `Clave`, `estado`) VALUES
(10832175, 'maro31@gmail.com', 'Mateo ', '3005487544', '0', 'd64bd96f9f28533849461bdd2e8481a0', 'Activo'),
(79583602, 'perez2323@gmail.com', 'Raul Perez', '3115248596', 'Carrera 4ta #89c 62 sur', '62c882cae9d487dffdcbbecae0bb6ad7', 'Activo'),
(80108234, 'rabbit09@gmail.com', 'Conejo', '5478954125', '0', 'a215b0a8fe5fe544fbe987f5e15fc256', 'Activo'),
(87321402, 'sneider53535@gmail.com', 'Sneider Guzman', '3224578459', '0', '84a88108434f119b7cb5b06d5d84be58', 'Activo'),
(91234871, 'hs154@gmail.com', 'Harold', '3154782159', '0', '6b7661bf1b2f463e984927960210d2e9', 'Activo'),
(678884531, 'perdo454@hotmail.com', 'Hector', '3227459874', '0', '90e528618534d005b1a7e7b7a367813f', 'Activo'),
(990108129, 'dalniel@gmail.com', 'Daniel Salvador', '3150247858', '0', 'b5ea8985533defbf1d08d5ed2ac8fe9b', 'Activo'),
(1000693932, 'camilo1454@gmail.com', 'Cristian Camilo', '3110489652', '0', 'fa3367027246db000e7cd30d8e4e6615', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventas`
--

CREATE TABLE `detalleventas` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `preciounit` int(20) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codproducto` int(11) NOT NULL,
  `nombre_producto` varchar(30) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` int(10) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `imagen` text NOT NULL,
  `fk_idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codproducto`, `nombre_producto`, `descripcion`, `precio`, `existencia`, `imagen`, `fk_idcategoria`) VALUES
(1, 'Colchón Sensaflex Sencillo', 'Colchon De 100x190 con una capa de espuma de 16cm', 180000, 8, 'sensaflex1.jpg', 1),
(2, 'Colchón Sensaflex Semi Doble', 'Colchón De 120x190 con una capa de espuma de 16cm y cubierto con una suave tela', 220000, 8, 'sensaflex2.jpg', 1),
(3, 'Colchón Sensaflex Doble', 'Colchón De 140x190 con una capa de espuma de 16cm y cubierto con una suave tela', 240000, 6, 'sensaflex.jpg', 1),
(4, 'Colchón Piloto Sencillo', 'Colchon de 100x190 con base americana de alambre, capa de espuma de 26cm cuvierto de una suave tela', 750000, 6, 'piloto1.jpg', 1),
(5, 'Colchón Piloto Semi Doble', 'Colchon de 120x190 con base americana de alambre, capa de espuma de 26cm cuvierto de una suave tela', 850000, 4, 'piloto2.jpg', 1),
(6, 'Colchón Piloto Doble', 'Colchon de 140x190 con base americana de alambre, capa de espuma de 26cm cuvierto de una suave tela', 870000, 4, 'piloto.jpg', 1),
(7, 'Colchón Sencillo Con Cassata', 'Colchon de 100x190 con base americana de alambre, Capa De Cassaca y capa de espuma de 26cm cuvierto ', 860000, 4, 'cassata1.jpg', 1),
(8, 'Colchón Semi Doble Con Cassata', 'Colchon de 120x190 con base americana de alambre, Capa De Cassaca y capa de espuma de 26cm cuvierto ', 950000, 3, 'cassata2.jpg', 1),
(9, 'Colchón Doble Con Cassata', 'Colchon de 140x190 con base americana de alambre, Capa De Cassaca y capa de espuma de 26cm cuvierto ', 11000000, 1, 'cassata.jpg', 1),
(10, 'Colchoneta', 'Capa de espuma de 26cm de grosor con unas medidas de 100x190 y cubierta de tela suave', 130000, 15, 'colchoneta.jpg', 1),
(11, 'Colchón Ortopedico Sencillo', 'Colchón de 100x190 con base americana de alambre, y una doble capa de 26cm de espuma viscofoam', 510000, 7, 'ortopedico1.jpg', 1),
(12, 'Colchón Ortopedico Semi Doble', 'Colchón de 120x190 con base americana de alambre, y una doble capa de 26cm de espuma viscofoam', 560000, 5, 'ortopedico2.jpg', 1),
(13, 'Colchón Ortopedico Doble', 'Colchón de 120x190 con base americana de alambre, y una doble capa de 26cm de espuma viscofoam', 590000, 2, 'ortopedico.jpg', 1),
(14, 'Base Cama Cama Sencilla ', 'Base Cama de madera con para cama sencilla con medidas de 100x190 forrada en tela', 110000, 6, 'base1.jpg', 5),
(15, 'Base Cama Cama Semi Doble', 'Base Cama de madera con para cama Semi Doble con medidas de 120x190 forrada en tela', 110000, 5, 'base.jpg', 5),
(16, 'Base Cama Cama SemiDoble      ', 'Base Cama de madera con para cama Doble con medidas de 140x190 forrada en tela', 110000, 2, 'base2.jpg', 5),
(17, 'CubreColchon Cama Sencilla', 'CubreColchon acolchado y anti fluidos de 100x190', 22000, 19, 'sabana1.jpg', 3),
(18, 'CubreColchon Cama Semi Doble', 'CubreColchon acolchado y anti fluidos de 120x190', 24000, 15, 'sabana2.jpg', 3),
(19, 'CubreColchon Cama Doble', 'CubreColchon acolchado y anti fluidos de 140x190', 2600, 11, 'sabana.jpg', 3),
(20, 'Almohada Siliconada', 'Almohada personal fabricada con fibra de poliester y cubiertas con una suave tela', 15000, 60, 'almohada.jpg', 4),
(21, 'Tela .9', 'Tela suave con un grosor de 0.9cm (El Producto Se Vende Por Metros)', 800, 200, 'telas.jpg', 2);

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
(1, 'Sebastian', 'sebas423@gmail.com', 'sebasadmi', '4d6993543cd9203435aa92560d5aaba1'),
(2, 'Andres', 'andres32@gmail.com', 'andresvend', 'f70a50b47e0f2c5a597cb779a3febf50'),
(4, 'Sara', 'sara58@gmail.com', 'saraadmi', '312dc6ec7c900fb9017bf43c6b1f81bb'),
(5, 'Fernando', 'fer857@gmail.com', 'fernanvend', 'b3af8dc6ffcef22dfd56e6acb9367045'),
(6, 'Barrera', 'barrerami@gmail.com', 'barreravend', '78b714409fe9334d234dbe73b7c9d551'),
(8, 'Camilo', 'camilo323@gmail.com', 'camilovend', 'fa3367027246db000e7cd30d8e4e6615');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `correocli` varchar(100) NOT NULL,
  `total` int(20) NOT NULL,
  `estatus` set('Pendiente','Procesado','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `correocli`, `total`, `estatus`) VALUES
(1, '2021-02-16', 'alejandromn0711@gmail.com', 1090000, 'Pendiente'),
(2, '2021-02-16', 'alejandromn0711@gmail.com', 1090000, 'Pendiente'),
(3, '2021-02-18', 'alejandromn0711@gmail.com', 220000, 'Pendiente');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idventa` (`idventa`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codproducto`),
  ADD KEY `fk_idcategoria` (`fk_idcategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cedula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000693934;

--
-- AUTO_INCREMENT de la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalleventas`
--
ALTER TABLE `detalleventas`
  ADD CONSTRAINT `detalleventas_ibfk_1` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleventas_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`codproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`fk_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
