-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-10-2019 a las 22:44:37
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `precio` int(11) NOT NULL,
  `idProveedor` int(11) NOT NULL,
  `idTipoProducto` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `precio`, `idProveedor`, `idTipoProducto`, `fechaIngreso`, `cantidad`) VALUES
(1, 'Coca Cola original 600ml', 15, 1, 1, '2019-12-13', 2),
(5, 'Oikos greek yogurt 5.3oz', 10, 26, 3, '2019-01-11', 5),
(6, 'Jalapeño picados en escabeche', 10, 31, 19, '2019-09-30', 25),
(7, 'Paleta magnum clasica 100ml', 35, 32, 12, '2019-09-27', 20),
(8, 'Fanta de fresa de 600ml', 15, 1, 1, '2019-09-05', 5),
(9, 'Fanta de naranja de 600ml', 15, 1, 1, '2019-09-01', 14),
(10, 'Sprite de 600ml', 15, 1, 1, '2019-09-01', 14),
(11, 'Monster Energy 473 ml', 25, 33, 8, '2019-09-03', 20),
(12, 'Agua mineral topo chico de 600ml', 17, 34, 17, '2019-10-31', 20),
(13, 'Cheetos  Flamin Hot xtra sabor queso y chile 150 g', 25, 4, 5, '2019-09-01', 20),
(14, 'Sabritas Flamin Hot sabor chile y especias 170 g', 35, 4, 5, '2019-09-30', 20),
(15, 'Sabritas adobadas 170 g', 37, 4, 5, '2019-09-25', 25),
(16, 'Sabritas original 170 g', 35, 4, 5, '2019-08-15', 25),
(17, 'Cheetos Torciditos sabor queso y chile 255 g', 37, 4, 5, '2019-09-06', 1),
(18, 'Tostitos Salsa Verde 65g	', 37, 4, 5, '2019-10-31', 4),
(19, 'Pepsi Original 600ml', 14, 18, 1, '2019-06-01', 3),
(20, 'Jumex durazno 450 ml', 10, 21, 23, '2019-08-11', 30),
(21, 'Jumex uva 1L', 17, 21, 23, '2019-05-10', 20),
(22, 'Jugo de piña Jumex 1.89 l', 30, 21, 23, '2019-07-20', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `nombre`, `direccion`, `telefono`) VALUES
(1, 'Coca Cola', 'Blvrd Lázaro Cárdenas 2400, Plutarco Elías Calles, 21376 Mexicali, B.C.', '8007044400'),
(2, 'Bimbo', 'Blvrd Lázaro Cárdenas 2012, Plutarco Elías Calles, 21390 Mexicali, B.C.', '6865628500'),
(4, 'Sabritas', 'Av Rio San Pedro Mezquital, Parque Industrial, Pimsa III, Mexicali, B.C.', '6865615900'),
(18, 'Pepsi Co.', 'Gustavo Duran 2689, Esteban Cantú, 21260 Mexicali, B.C.', '6868418000'),
(19, 'Dannone', 'Baritina 4885, Valle del Pedregal, 21395 Mexicali, B.C.', '6868399791'),
(20, 'Barcel', 'El Robledo, Mexicali, B.C.', '6865612323'),
(21, 'Jumex', 'Blvrd Lázaro Cárdenas 4098, Villas del Colorado, 21600 Mexicali, B.C.', '6865924926'),
(22, 'Nestle', 'Cto Del Progreso, El Porvenir, Progreso, Mexicali, B.C.', '018003637853'),
(23, 'el fuerte', 'enrique segoviano', '34563365'),
(24, 'Food', 'villas del colorado', '87768765'),
(25, 'san rafael', 'mision san diego de alcala', '34566446'),
(26, 'danone', 'lomas altas de maicra', '8872764'),
(27, 'prueba', 'prueba de dirrecion', '9878374'),
(28, 'sukarne', 'ampliacion progreso parque industrial', '45454647'),
(31, 'La Costeña', 'Mercado Braulio Maldonado, Av Miguel Hidalgo y Costilla 596, Primera, 21100', '6865540686'),
(32, 'Magnum', 'Pimsam II', '6863562889'),
(33, 'Monster Beverage', 'villas del colorado', '87768765'),
(34, 'Topo Chico', 'lomas altas de maicra', '87768765'),
(35, 'oasa gas y helio', 'lopez  mateos  mexicali', '654243312'),
(36, 'PALETAA  DOBLE A', 'LAS F ', '7871');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoProducto`
--

CREATE TABLE `tipoProducto` (
  `idTipoProducto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoProducto`
--

INSERT INTO `tipoProducto` (`idTipoProducto`, `nombre`) VALUES
(1, 'Gaseosas'),
(2, 'Bebidas Alcoholicas'),
(3, 'Yogurt'),
(4, 'Pan para sandwich'),
(5, 'Papitas'),
(7, 'Cereales'),
(8, 'Bebidas Energéticas'),
(9, 'Galletas'),
(10, 'Leche'),
(11, 'Cafe'),
(12, 'Paletas'),
(13, 'Sopas Instantáneas'),
(15, 'Agua'),
(16, 'Salsas'),
(17, 'Agua Mineral'),
(18, 'Consomes'),
(19, 'Enlatados '),
(20, 'Pastelillos'),
(21, 'Condimentos'),
(22, 'Frutas '),
(23, 'Nectar'),
(24, 'Jugo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`) VALUES
(1, 'admin', 'admin123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`,`idProveedor`,`idTipoProducto`),
  ADD KEY `fk_productos_proveedor` (`idProveedor`),
  ADD KEY `fk_productos_tipoProducto` (`idTipoProducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tipoProducto`
--
ALTER TABLE `tipoProducto`
  ADD PRIMARY KEY (`idTipoProducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tipoProducto`
--
ALTER TABLE `tipoProducto`
  MODIFY `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_proveedor` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_tipoProducto` FOREIGN KEY (`idTipoProducto`) REFERENCES `tipoProducto` (`idTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
