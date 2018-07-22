-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 22-07-2018 a las 03:49:42
-- Versión del servidor: 5.7.21
-- Versión de PHP: 7.0.29
create database restaurantbd;
use restaurantbd;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurantbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de Categoria',
  `cat_nombre` varchar(60) NOT NULL COMMENT 'Nombre de Categoria',
  `cat_imagen` varchar(200) NOT NULL COMMENT 'Imagen de Categoria',
  `cat_descripcion` varchar(200) NOT NULL COMMENT 'Descripcion de Categoria',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cat_id`, `cat_nombre`, `cat_imagen`, `cat_descripcion`) VALUES
(11, 'CARNE ANIMAL', 'cat_CARNE ANIMAL.png', 'CARNE DE VACA. POLLO Y CERDO'),
(12, 'CARNE VEGETAL', 'cat_CARNE VEGETAL.png', 'CARNE DE SOYA'),
(13, 'CEREALES', 'cat_CEREALES.png', 'ALIMENTOS NUTRITIVOS'),
(14, 'EMBUTIDOS', 'cat_EMBUTIDOS.png', 'CARNE PROCESADA'),
(15, 'FRUTAS', 'cat_FRUTAS.png', 'FRUTAS'),
(16, 'VEGETALES', 'cat_VEGETALES.png', 'PRODUCTOS NATURALES Y DE LA TIERRA'),
(17, 'JUGOS NATURALES', 'cat_JUGOS NATURALES.png', 'BEBIDA NATURAL DE EXTRACTO DE FRUTAS CON AZÚCAR'),
(18, 'PRODUCTO RAPIDITO', 'cat_PRODUCTO RAPIDITO.png', 'PRODUCTOS PREPARADOS EN EL RESTAURANT'),
(19, 'REFRESCOS', 'cat_REFRESCOS.png', 'GASEOSAS'),
(20, 'SALSAS', 'cat_SALSAS.png', 'SALSAS'),
(21, 'TUBERCULOS', 'cat_TUBERCULOS.png', 'FRUTOS DE LA TIERRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cli_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Cliente',
  `cli_nombre` varchar(60) NOT NULL COMMENT 'Nombre de Cliente',
  `cli_apellido` varchar(60) NOT NULL COMMENT 'Apellido de Cliente',
  `cli_direccion` varchar(60) NOT NULL COMMENT 'Direccion de de Cliente',
  `cli_ciudad` varchar(60) NOT NULL COMMENT 'Ciudad de Cliente',
  `cli_telefono` varchar(60) NOT NULL COMMENT 'Telefono de Cliente',
  `cli_email` varchar(60) NOT NULL COMMENT 'Email de Cliente',
  `cli_fechaNacimiento` date NOT NULL COMMENT 'Nacimiento de Cliente',
  PRIMARY KEY (`cli_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nombre`, `cli_apellido`, `cli_direccion`, `cli_ciudad`, `cli_telefono`, `cli_email`, `cli_fechaNacimiento`) VALUES
(2, 'DANIEL', 'LOPEZ', 'QUITO', 'QUITO', '098765432', 'DANIEL@GMAIL.COM', '2018-05-01'),
(3, 'ANTHONY', 'CABRERA', 'SANTO DOMINGO', 'SANTO DOMINGO', '345678909876', 'ANTHONY@GMAIL.COM', '2018-08-06'),
(4, 'JOHNNY', 'VILLACIS', 'AMBATO', 'AMBATO', '09876567890', 'JOHNNY@GMAIL.COM', '2018-07-02'),
(5, 'DAVID', 'ESPARZA', 'SAN GABRIEL', 'SAN GABRIEL', '3456789876', 'DAVID@GMAIL.COM', '2018-07-04'),
(6, 'JONATHAN', 'FRANCO', 'QUITO', 'QUITO', '234546532', 'JONA@GMAIL.COM', '2018-07-07'),
(7, 'ISRAEL', 'TENEDA', 'SALCEDO', 'SALCEDO', '23453465', 'ISRA@GMAIL.COM', '2018-07-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

DROP TABLE IF EXISTS `cobro`;
CREATE TABLE IF NOT EXISTS `cobro` (
  `cob_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Cobro',
  `cob_total` float NOT NULL COMMENT 'Total de Cobro',
  `cob_cuenta_A` varchar(60) NOT NULL COMMENT 'Cuenta A de Cobro',
  `cob_cuenta_B` varchar(60) NOT NULL COMMENT 'Cuenta B de Cobro',
  `cob_estado` varchar(60) NOT NULL COMMENT 'Estado de Cobro',
  PRIMARY KEY (`cob_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cobro`
--

INSERT INTO `cobro` (`cob_id`, `cob_total`, `cob_cuenta_A`, `cob_cuenta_B`, `cob_estado`) VALUES
(1, 100, '1234546', '23456', 'ABIERTO'),
(2, 56, '324564', '123256', 'ABIERTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE IF NOT EXISTS `factura` (
  `fac_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Factura',
  `fac_fecha` date NOT NULL COMMENT 'Fecha de Factura',
  `fac_subtotal` float NOT NULL COMMENT 'Subtotal de Factura',
  `fac_total` float NOT NULL COMMENT 'Total a Pagar',
  `fac_iva` float NOT NULL COMMENT 'Iva de Factura',
  `cli_id` int(11) NOT NULL COMMENT 'id de Cliente',
  `ped_id` int(11) NOT NULL COMMENT 'id de Pedido',
  `cob_id` int(11) NOT NULL COMMENT 'id Cobro',
  PRIMARY KEY (`fac_id`),
  KEY `cli_id` (`cli_id`),
  KEY `ped_id` (`ped_id`),
  KEY `cob_id` (`cob_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`fac_id`, `fac_fecha`, `fac_subtotal`, `fac_total`, `fac_iva`, `cli_id`, `ped_id`, `cob_id`) VALUES
(1, '2018-07-03', 27, 30, 3, 2, 4, 1),
(2, '2018-07-01', 17, 20, 3, 3, 5, 2),
(3, '2018-07-03', 7, 15, 8, 4, 6, 1),
(4, '2018-07-03', 70, 82, 12, 5, 7, 1),
(5, '2018-08-17', 40, 48, 8, 7, 8, 1),
(6, '2018-05-08', 23, 28, 5, 3, 5, 1),
(7, '2017-06-13', 24, 32, 8, 7, 7, 2),
(8, '2019-04-18', 23, 20, 12, 5, 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
CREATE TABLE IF NOT EXISTS `itempedido` (
  `ite_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Item Pedido',
  `ite_cantidad` int(11) NOT NULL COMMENT 'Cantidad de Item Pedido',
  `ped_id` int(11) NOT NULL COMMENT 'id de Pedido',
  `pro_id` int(11) NOT NULL COMMENT 'id de Producto',
  PRIMARY KEY (`ite_id`),
  KEY `ped_id` (`ped_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `itempedido`
--

INSERT INTO `itempedido` (`ite_id`, `ite_cantidad`, `ped_id`, `pro_id`) VALUES
(4, 10, 4, 8),
(5, 10, 4, 4),
(6, 10, 4, 11),
(7, 1, 5, 16),
(8, 3, 6, 10),
(9, 3, 6, 20),
(10, 1, 6, 24),
(11, 2, 6, 27),
(12, 1, 7, 12),
(13, 1, 7, 11),
(14, 2, 8, 9),
(15, 2, 8, 5),
(16, 2, 8, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `ped_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Pedido',
  `ped_estado` varchar(60) NOT NULL COMMENT 'Estado de Pedido',
  `ped_total` varchar(45) NOT NULL COMMENT 'Valor Total',
  PRIMARY KEY (`ped_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`ped_id`, `ped_estado`, `ped_total`) VALUES
(4, 'ABIERTO', '0'),
(5, 'CERRADO', '100'),
(6, 'ABIERTO', '30'),
(7, 'CERRADO', '30'),
(8, 'ABIERTO', '40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

DROP TABLE IF EXISTS `producto`;
CREATE TABLE IF NOT EXISTS `producto` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id de Producto',
  `pro_nombre` varchar(60) NOT NULL COMMENT 'Nombre de Producto',
  `pro_descripcion` varchar(200) NOT NULL COMMENT 'Descripcion de Producto',
  `pro_costo` float NOT NULL COMMENT 'Costo de Producto',
  `pro_precio` float NOT NULL COMMENT 'Precio de Producto',
  `pro_imagen` varchar(200) NOT NULL COMMENT 'Imagen de Producto',
  `pro_estado` varchar(60) NOT NULL COMMENT 'Estado de Producto',
  `cat_id` int(11) NOT NULL COMMENT 'id Categoria',
  PRIMARY KEY (`pro_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_costo`, `pro_precio`, `pro_imagen`, `pro_estado`, `cat_id`) VALUES
(2, 'ARROZ', 'PORCIÓN 200 mg', 0.5, 1, 'pro_ARROZ.png', 'DISPONIBLE', 13),
(3, 'PORCION CEBOLLA', '10 AROS DE CEBOLLA', 0.1, 0.5, 'pro_PORCION CEBOLLA.png', 'VERDURAS', 16),
(4, 'COCA COLA 22oz', 'VASO PEQUEÑO', 0.5, 1, 'pro_COCA COLA 22oz.png', 'DISPONIBLE', 19),
(5, 'COCA COLA 30oz', 'VASO MEDIANO', 0.6, 1.5, 'pro_COCA COLA 30oz.png', 'DISPONIBLE', 19),
(6, 'COCA COLA 44oz', 'VASO GRANDE', 0.7, 1.75, 'pro_COCA COLA 44oz.png', 'DISPONIBLE', 19),
(7, 'COCA COLA ZERO 22oz', 'VASO MEDIANO SIN CALORÍAS', 0.5, 1.5, 'pro_COCA COLA ZERO 22oz.png', 'NO DISPONIBLE', 19),
(8, 'HAMBURGUESA GIGANTE', 'HAMBURGUESA GRANDE', 0.8, 2.5, 'pro_HAMBURGUESA GIGANTE.png', 'DISPONIBLE', 18),
(9, 'HAMBURGUESA MEDIUN', 'HAMBURGUESA MEDIANA', 0.7, 2, 'pro_HAMBURGUESA MEDIUN.png', 'DISPONIBLE', 18),
(10, 'HAMBURGUESA LITTLE', 'HAMBURGUESA PEQUEÑA', 0.5, 1.5, 'pro_HAMBURGUESA LITTLE.png', 'NO DISPONIBLE', 18),
(11, 'CHOCOLATE ICE CREAM', 'HELADO DE CHOCOLATE', 0.5, 1, 'pro_CHOCOLATE ICE CREAM.png', 'DISPONIBLE', 18),
(12, 'VAINILLA ICE CREAM', 'HELADO DE VAINILLA', 0.5, 1, 'pro_VAINILLA ICE CREAM.png', 'DISPONIBLE', 18),
(13, 'HOTDOG XXX', 'HOTDOG NORMAL', 0.8, 2, 'pro_HOTDOG XXX.png', 'DISPONIBLE', 18),
(14, 'MIX ICE CREAM', 'HELADO MIXTO', 0.5, 1.2, 'pro_MIX ICE CREAM.png', 'NO DISPONIBLE', 18),
(15, 'PORCION JAMON 3 RODAJAS', 'JAMÓN DE ESPALDA', 0.5, 1.5, 'pro_PORCION JAMON 3 RODAJAS.png', 'DISPONIBLE', 14),
(16, 'VASO AVENA 22oz', 'VASO PEQUEÑO DE AVENA', 0.3, 1, 'pro_VASO AVENA 22oz.png', 'DISPONIBLE', 17),
(17, 'AVENA POLACA 40oz', 'VASO DE AVENA POLACA PEQUEÑA', 1, 1.5, 'pro_AVENA POLACA 40oz.png', 'NO DISPONIBLE', 19),
(18, 'JUGO LIMON 22oz', 'VASO PEQUEÑO DE JUGO DE LIMÓN', 0.3, 0.5, 'pro_JUGO LIMON 22oz.png', 'DISPONIBLE', 17),
(19, 'JUGO NARANJA 22oz', 'VASO PEQUEÑO DE JUGO DE NARANJA', 0.3, 0.5, 'pro_JUGO NARANJA 22oz.png', 'DISPONIBLE', 17),
(20, 'JUGO SANDIA 22oz', 'VASO PEQUEÑO DE JUGO DE SANDÍA', 0.3, 0.7, 'pro_JUGO SANDIA 22oz.png', 'NO DISPONIBLE', 17),
(21, 'NACHOS CON QUESO', 'NACHOS ACOMPAÑADOS CON SALSA DE QUESO', 1, 2.5, 'pro_NACHOS CON QUESO.png', 'DISPONIBLE', 18),
(22, 'NUGGETS RAPIDITO', 'NUGGETS DE POLLO', 0.7, 2, 'pro_NUGGETS RAPIDITO.png', 'DISPONIBLE', 18),
(23, 'BIG PAPAS', 'PORCIÓN GRANDE DE PAPAS', 0.5, 2, 'pro_BIG PAPAS.png', 'DISPONIBLE', 18),
(24, 'MED PAPAS', 'PORCIÓN MEDIANA DE PAPAS', 0.4, 1.8, 'pro_MED PAPAS.png', 'DISPONIBLE', 18),
(25, 'LIT PAPAS', 'PORCIÓN PEQUEÑA DE PAPAS', 0.3, 1.5, 'pro_LIT PAPAS.png', 'DISPONIBLE', 18),
(26, 'PORCION PASAS', 'UVAS PASAS DISECADAS', 0.2, 1, 'pro_PORCION PASAS.png', 'DISPONIBLE', 15),
(27, 'PORCION TOMATE', 'REBANADAS DE TOMATE', 0.2, 1, 'pro_PORCION TOMATE.png', 'NO DISPONIBLE', 16),
(28, 'PORCION SALSA DE TOMATE', 'SALSA DE TOMATE', 0.3, 1, 'pro_PORCION SALSA DE TOMATE.png', 'DISPONIBLE', 20),
(29, 'PORCION MAYONESA', 'MAYONESA', 0.4, 1, 'pro_PORCION MAYONESA.png', 'NO DISPONIBLE', 20),
(30, 'PORCION SALSA DE QUESO', 'SALSA PICANTE DE QUESO', 0.8, 1.5, 'pro_PORCION SALSA DE QUESO.png', 'DISPONIBLE', 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(250) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `accessToken` varchar(250) NOT NULL,
  `activate` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(250) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `authKey`, `accessToken`, `activate`, `verification_code`, `role`) VALUES
(5, 'anthoro2', 'huasipango@gmail.com', 'fsbqobwqC.aMo', '120aab889efc525bb86f061d2c1f7179b5d7403d11555f230b536af85eae2d79b7f35450e21cca5abbb51d42de9c37d6078cb5c1123084eeca763eeabde8af92c57385a0bfb3abd12784bcf009a275bbe1b8b3ddaa942021f2008954a3b9aa336b6c3e78', 'f4e303d02beac326ac2f3c18437d2861bb8f44ecb2135c4602f32c4c78dc60b8c18ae357a7b953c4d7257aed1ca9157d34e3e02fe9bda7b0f9c426ed1ed4198005a94b569a0f6afa79b2304a7e5e8a0145de04daa9c07aa2680ea8063c454ad0d2512ccd', 0, '', 1),
(4, 'anthoro', 'anthoro.53@gmail.com', 'fsVxBShJYasG2', 'fdc2a47b77cc9eaa07cffb30699799e969e02281b37664c31315296d55781e39245cffe55e8e984b9db8a508aeb7f1e85d373ab756f32a2075c99ef1655432f4e47fc2d7ccc71a64bb38d6587b5ed16fd905c965810968055ff58b0deeb7de372c092d41', 'a399140540219f10c08e3a6ecd6cd08b33862e52a0baf191ffa2f3f2db1cf13312d2961e6e91c0608c251ae5483a6f395e8c7d378ae6eead88069f3513b64cadf994a1bff49a7938d14572d44c81766f01193394dc9b533188e1b3e0c3c91f9f67ed23d8', 1, 'c849ced5', 1),
(6, 'jacc', 'jacc_bobis@hotmail.com', 'fsbqobwqC.aMo', '241f666373e38d701f7f4ea2b47f76b62ebed14819ea0b4441cdef4682243b2987bc999b1d3ff766d179ef48bd284efb4e17c04c60f131e7de834ca7369acf3a63d0545b2002d9d52afc08652d599ec7f5f747c74e80ef11d4c221717387cbb3d67c9782', 'ba5d43bcecf6a9fb1603660c155f46bb959815b451888ed327fc5fc3b2905242dd20352a2578c2199634b6d9bc3fcd376327c3ef67c663bd53e96b4c153c958a678baf01f77263ae8ffd7e2eec98cc2bca3ee991e48cb00e185fff5d005150397a5f9170', 1, '', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`),
  ADD CONSTRAINT `factura_ibfk_2` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`),
  ADD CONSTRAINT `factura_ibfk_3` FOREIGN KEY (`cob_id`) REFERENCES `cobro` (`cob_id`);

--
-- Filtros para la tabla `itempedido`
--
ALTER TABLE `itempedido`
  ADD CONSTRAINT `itempedido_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `producto` (`pro_id`),
  ADD CONSTRAINT `itempedido_ibfk_2` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
