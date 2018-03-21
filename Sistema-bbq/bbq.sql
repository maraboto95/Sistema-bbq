-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2018 a las 16:21:21
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bbq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `ordenes` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `direccion`, `telefono`, `ordenes`) VALUES
(1, 'Ramón', 'Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '8333396338', 0),
(2, 'JosÃ©', 'Martinez', 'Por allÃ¡, calle loca, colonia 3000', '8332245342', 0),
(5, 'Juan', 'Perez', 'DirecciÃ³n 43 calle 5 colonia otomÃ­', '8331112233', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos`
--

CREATE TABLE `costos` (
  `id` int(3) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `costos`
--

INSERT INTO `costos` (`id`, `producto`, `precio`, `fecha`) VALUES
(1, 'Refrescos', 200, '2018-03-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalledeorden`
--

CREATE TABLE `detalledeorden` (
  `id` int(4) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalledeorden`
--

INSERT INTO `detalledeorden` (`id`, `producto`, `precio`) VALUES
(0, 'Brisket Tradicional', 85),
(11, 'Papas de gajo', 32),
(11, 'Aros de Cebolla', 34),
(13, 'Aros de Cebolla', 34),
(13, 'Brisket Tradicional', 85),
(14, 'Papas a la Francesa', 25),
(15, 'Brisket Tradicional', 85),
(15, 'Refresco', 15),
(16, 'BBQ Pulled Pork', 80),
(18, 'Aros de Cebolla', 34),
(18, 'Refresco', 15),
(19, 'Brisket Tradicional', 85),
(19, 'Papas de gajo', 32),
(19, 'Refresco', 15),
(20, 'Refresco', 15),
(20, 'Brisket Spicy', 85),
(21, 'Brisket Tradicional', 85),
(22, 'Brisket Tradicional', 85),
(22, 'Refresco', 15),
(22, 'Aros de Cebolla', 34),
(23, 'Aros de Cebolla', 34),
(24, 'Brisket Tradicional', 85),
(24, 'Brisket Spicy', 85),
(24, 'Brisket Tradicional', 85),
(25, 'Brisket Tradicional', 85),
(25, 'Brisket Tradicional', 85),
(25, 'Brisket Spicy', 85),
(25, 'Aros de Cebolla', 34),
(26, 'Combo Pulled Pork (Aros)', 119),
(26, 'Combo Brisket (Papas F)', 115),
(27, 'Brisket Tradicional', 85),
(27, 'Combo Brisket (Papas Gajo)', 122);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganancias`
--

CREATE TABLE `ganancias` (
  `id` int(4) NOT NULL,
  `fecha` date NOT NULL,
  `total` double NOT NULL,
  `cantidad` int(3) NOT NULL,
  `clientesnuevos` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ganancias`
--

INSERT INTO `ganancias` (`id`, `fecha`, `total`, `cantidad`, `clientesnuevos`) VALUES
(1, '2018-02-27', 205, 3, 0),
(3, '2018-02-28', 366, 4, 1),
(4, '2018-03-01', 812, 4, 0),
(5, '2018-03-02', 7, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

CREATE TABLE `ordenes` (
  `id` int(3) NOT NULL,
  `nodeorden` int(4) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `total` double NOT NULL,
  `notas` varchar(150) NOT NULL,
  `estatus` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ordenes`
--

INSERT INTO `ordenes` (`id`, `nodeorden`, `cliente`, `direccion`, `fecha`, `hora`, `total`, `notas`, `estatus`) VALUES
(1, 2, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'entregado'),
(1, 3, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 4, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 5, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 6, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 7, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 8, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 9, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 10, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 11, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 66, '', 'Entregado'),
(1, 12, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Entregado'),
(1, 13, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-02-27', '09:20:26', 119, '', 'Entregado'),
(1, 15, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-02-27', '12:15:26', 100, '', 'Pendiente'),
(1, 16, 'Ramón', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-02-27', '12:46:00', 80, 'Quiero que me regalen un perrito con mi compra porfa.', 'Pendiente'),
(1, 17, 'Ramón Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '0000-00-00', '00:00:00', 0, '', 'Pendiente'),
(1, 18, 'Ramón Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-02-28', '05:43:20', 49, 'Gracias', 'Pendiente'),
(2, 19, 'JosÃ© Martinez', 'Por allÃ¡, calle loca, colonia 3000', '2018-02-28', '06:14:09', 132, 'Sin BBQ', 'Pendiente'),
(5, 20, 'Juan Perez', 'DirecciÃ³n 43 calle 5 colonia otomÃ­', '2018-02-28', '06:27:41', 100, 'Orden hecha desde el telÃ©fono!', 'Pendiente'),
(5, 21, 'Juan Perez', 'DirecciÃ³n 43 calle 5 colonia otomÃ­', '2018-02-28', '10:06:18', 85, '', 'Pendiente'),
(1, 22, 'Ramón Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-03-01', '01:12:35', 134, 'Algo', 'Pendiente'),
(2, 23, 'JosÃ© Martinez', 'Por allÃ¡, calle loca, colonia 3000', '2018-03-01', '01:15:19', 34, '', 'Pendiente'),
(1, 24, 'Ramón Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-03-01', '02:39:42', 255, '', 'Pendiente'),
(1, 25, 'Ramón Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-03-01', '02:41:40', 289, '', 'Pendiente'),
(2, 26, 'JosÃ© Martinez', 'Por allÃ¡, calle loca, colonia 3000', '2018-03-01', '03:10:08', 234, '', 'Pendiente'),
(1, 27, 'Ramón Maraboto', 'Zacamixtle #606 Colonia Petrolera entre Potrero del llano y Juan Casiano.', '2018-03-02', '09:11:04', 207, '', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `cantidad`) VALUES
(1, 'Brisket Tradicional', 85, 6),
(2, 'Brisket Spicy', 85, 1),
(3, 'BBQ Pulled Pork', 80, 1),
(4, 'Aros de Cebolla', 34, 2),
(5, 'Papas de gajo', 32, 1),
(6, 'Papas a la Francesa', 25, 1),
(7, 'Papas Sazonadas', 28, 0),
(8, 'Elote Amarillo', 25, 0),
(9, 'Refresco', 15, 3),
(10, 'Promo', 100, 0),
(11, 'Combo Pulled Pork (Papas F)', 110, 0),
(12, 'Combo Pulled Pork (Papas Gajo)', 117, 0),
(13, 'Combo Pulled Pork (Aros)', 119, 1),
(14, 'Combo Brisket (Papas F)', 115, 1),
(15, 'Combo Brisket (Papas Gajo)', 122, 1),
(16, 'Combo Brisket (Aros)', 124, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `costos`
--
ALTER TABLE `costos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`nodeorden`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `costos`
--
ALTER TABLE `costos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ganancias`
--
ALTER TABLE `ganancias`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ordenes`
--
ALTER TABLE `ordenes`
  MODIFY `nodeorden` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
