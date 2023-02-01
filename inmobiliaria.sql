-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2021 a las 18:28:08
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--
CREATE DATABASE IF NOT EXISTS `inmobiliaria` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `inmobiliaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE `fotos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_vivienda` smallint(5) UNSIGNED NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id`, `id_vivienda`, `foto`) VALUES
(1, 1, 'foto1.jpg'),
(2, 2, 'chalet1.jpg'),
(3, 3, 'apartamento1.jpg'),
(4, 4, 'piso3.jpg'),
(5, 5, 'adosado1.jpg'),
(6, 6, 'casa1.jpg'),
(9, 8, 'kitchen-2165756_640.jpg'),
(10, 8, 'chairs-2181947_640.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id_usuario` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `password`) VALUES
('admin', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

DROP TABLE IF EXISTS `viviendas`;
CREATE TABLE `viviendas` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `tipo` enum('Piso','Adosado','Chalet','Casa') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Piso',
  `zona` enum('Centro','Norte','Sur','Este','Oeste') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'Centro',
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `ndormitorios` enum('1','2','3','4','5 o más') COLLATE utf8_spanish_ci NOT NULL DEFAULT '3',
  `precio` decimal(10,0) NOT NULL DEFAULT 0,
  `tamano` decimal(10,0) NOT NULL DEFAULT 0,
  `extras` set('Piscina','Jardín','Garage') COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_anuncio` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `viviendas`
--

INSERT INTO `viviendas` (`id`, `tipo`, `zona`, `direccion`, `ndormitorios`, `precio`, `tamano`, `extras`, `observaciones`, `fecha_anuncio`) VALUES
(1, 'Piso', 'Centro', 'Avda de la Buhaira', '4', '360000', '125', 'Garage', 'Aire acondicionado frío/calor, trastero, amueblado, reciente construcción', '2019-12-23'),
(2, 'Chalet', 'Norte', 'Calle del Rosal', '4', '450000', '180', 'Piscina,Jardín,Garage', 'Chalet independiente de una sóla planta en parcela de 1000 metros cuadrados con piscina y cancha de tenis, dentro de una urbanización cerrada y vigilada con club social', '2020-03-08'),
(3, 'Piso', 'Sur', 'Avda de Kansas City', '2', '215000', '89', '', 'Luminoso y bien situado. Reformado recientemente. Oportunidad', '2020-03-30'),
(4, 'Piso', 'Este', 'Ronda de los Olmos', '3', '165000', '83', '', 'Completamente reformado. Soleado. Vistas al río', '2020-01-21'),
(5, 'Adosado', 'Oeste', 'Urb. Santa Mónica', '4', '300000', '130', 'Piscina,Jardín,Garage', 'Urbanización de reciente construcción. Zona ajardinada interior con piscina y pistas de paddle-tenis. Amplias facilidades', '2020-03-10'),
(6, 'Casa', 'Norte', 'Urb. Castilla', '4', '600000', '350', 'Piscina,Jardín,Garage', 'Amplia y luminosa', '2020-04-09'),
(8, 'Piso', 'Oeste', 'Urb. Mirador de Montepinar', '2', '200000', '70', '', 'Vecinos encantadores\r\nAlto standing', '2020-04-09'),
(10, 'Adosado', 'Este', 'Calle del programador web 32', '2', '120000', '90', 'Garage', 'Bien comunicado', '2020-04-09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_vivienda` (`id_vivienda`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`id_vivienda`) REFERENCES `viviendas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
