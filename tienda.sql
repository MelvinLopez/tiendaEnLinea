-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 07-06-2019 a las 04:01:37
-- VersiÃ³n del servidor: 10.1.38-MariaDB
-- VersiÃ³n de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

DROP TABLE IF EXISTS `carrusel`;
CREATE TABLE `carrusel` (
  `id` int(11) NOT NULL,
  `estilo_1` varchar(50) NOT NULL,
  `estilo_2` varchar(50) DEFAULT NULL,
  `direccion` varchar(300) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id`, `estilo_1`, `estilo_2`, `direccion`, `descripcion`, `img`) VALUES
(1, 'carousel-item active', 'active', '', '', 'assets/img/carrusel1.jpg'),
(2, 'carousel-item ', '', '', '', 'assets/img/carrusel2.jpg'),
(3, 'carousel-item ', '', '', 'Nuestras Promociones en licores y vinos ', 'assets/img/carrusel3.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `img` varchar(250) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `img`, `estado`) VALUES
(7, 'Carnes', 'assets/img/Categoria Carne.jpeg', 1),
(8, 'Embutidos', 'assets/img/Categoria Embutidos.jpeg', 1),
(9, 'Frutas y Verduras', 'assets/img/Categoria FyV.jpeg', 1),
(10, 'Bebidas', 'assets/img/Categoria Bebida.jpeg', 1),
(11, 'Congelados', 'assets/img/Categoria Congelados.jpeg', 1),
(12, 'Cuidado Personal', 'assets/img/Categoria CP.jpeg', 1),
(13, 'Mascotas', 'assets/img/Categoria Mascota.jpeg', 1),
(14, 'Bebes', 'assets/img/Categoria Bb.jpeg', 1),
(15, 'Bakery', 'assets/img/Categoria Bakery.jpeg', 1),
(16, 'Cuiddado del Hogar', 'assets/img/Categoria AL.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_categoria`
--

DROP TABLE IF EXISTS `detalle_categoria`;
CREATE TABLE `detalle_categoria` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_categoria`
--

INSERT INTO `detalle_categoria` (`id`, `id_categoria`, `id_productos`, `estado`) VALUES
(17, 7, 890740545, 1),
(18, 7, 876572118, 1),
(19, 7, 440494957, 1),
(20, 7, 590071478, 1),
(21, 7, 628621631, 1),
(22, 7, 253947664, 1),
(24, 7, 306146374, 1),
(25, 7, 282249425, 1),
(26, 7, 908471176, 1),
(27, 7, 979949970, 1),
(28, 7, 86276184, 1),
(29, 7, 433811258, 1),
(30, 8, 926997569, 1),
(31, 8, 356601347, 1),
(32, 8, 567220096, 1),
(33, 8, 829857667, 1),
(34, 8, 632497018, 1),
(35, 8, 652442041, 1),
(36, 8, 467082010, 1),
(37, 8, 38636409, 1),
(38, 8, 275410803, 1),
(39, 9, 1529818, 1),
(40, 9, 115830840, 1),
(41, 9, 21786004, 1),
(42, 9, 266994612, 1),
(43, 9, 747962455, 1),
(44, 9, 599560332, 1),
(45, 9, 721446700, 1),
(46, 9, 344081202, 1),
(47, 9, 453861942, 1),
(48, 9, 154541285, 1),
(49, 9, 125540855, 1),
(50, 9, 567627922, 1),
(51, 9, 746333337, 1),
(52, 9, 133588089, 1),
(53, 9, 371209069, 1),
(54, 9, 218880636, 1),
(55, 9, 323428949, 1),
(56, 9, 483081473, 1),
(57, 9, 693997271, 1),
(58, 9, 455579536, 1),
(59, 9, 586964152, 1),
(60, 9, 427498965, 1),
(61, 9, 525739704, 1),
(62, 9, 57796125, 1),
(63, 9, 955378511, 1),
(64, 9, 103989485, 1),
(65, 9, 575447093, 1),
(66, 9, 911570045, 1),
(69, 10, 670234899, 1),
(70, 10, 210057243, 1),
(71, 10, 477504447, 1),
(72, 10, 679400418, 1),
(73, 10, 201495120, 1),
(74, 10, 440784040, 1),
(75, 10, 575217267, 1),
(76, 10, 714124613, 1),
(77, 10, 931230776, 1),
(78, 10, 255492527, 1),
(79, 10, 499470265, 1),
(80, 10, 584455034, 1),
(81, 10, 34469521, 1),
(82, 10, 484282061, 1),
(83, 10, 53302380, 1),
(84, 10, 339924147, 1),
(85, 10, 992786226, 1),
(86, 10, 103203358, 1),
(87, 10, 723769153, 1),
(88, 10, 17628435, 1),
(89, 10, 52896758, 1),
(90, 10, 161911051, 1),
(91, 10, 421818377, 1),
(92, 10, 63989464, 1),
(93, 10, 47474780, 1),
(94, 10, 162495550, 1),
(95, 10, 860887056, 1),
(96, 10, 774619515, 1),
(97, 11, 385201401, 1),
(98, 11, 878784624, 1),
(99, 11, 932050835, 1),
(100, 11, 182903560, 1),
(101, 11, 40212560, 1),
(102, 11, 200872742, 1),
(103, 11, 364772408, 1),
(104, 11, 801330196, 1),
(105, 11, 658505048, 1),
(106, 11, 220257906, 1),
(107, 12, 107803178, 1),
(108, 12, 316640575, 1),
(109, 12, 762910429, 1),
(110, 12, 798745810, 1),
(112, 12, 916354093, 1),
(113, 12, 630196788, 1),
(114, 12, 652502604, 1),
(115, 12, 898832660, 1),
(116, 12, 393842288, 1),
(117, 12, 908390802, 1),
(118, 14, 655908301, 1),
(119, 14, 987932297, 1),
(120, 14, 729974975, 1),
(121, 14, 699732830, 1),
(122, 14, 626755110, 1),
(123, 14, 616478681, 1),
(124, 14, 276454006, 1),
(125, 14, 220017004, 1),
(126, 14, 118044267, 1),
(127, 14, 844084709, 1),
(128, 14, 533431259, 1),
(129, 14, 174645309, 1),
(130, 14, 477796707, 1),
(131, 14, 349468066, 1),
(132, 15, 420117896, 1),
(133, 15, 983643004, 1),
(134, 15, 838141774, 1),
(135, 15, 477128803, 1),
(136, 15, 449744408, 1),
(137, 15, 403489385, 1),
(138, 15, 466942466, 1),
(139, 16, 578072669, 1),
(140, 16, 814276702, 1),
(141, 16, 727772568, 1),
(142, 16, 242049799, 1),
(143, 16, 198566168, 1),
(144, 16, 662244860, 1),
(145, 16, 781562461, 1),
(146, 16, 440557659, 1),
(147, 16, 441946957, 1),
(148, 16, 766815293, 1),
(149, 16, 908650876, 1),
(150, 16, 854880219, 1),
(151, 16, 253534574, 1),
(152, 16, 279602614, 1),
(153, 16, 858306828, 1),
(154, 16, 154791117, 1),
(155, 16, 891617104, 1),
(156, 16, 676674420, 1),
(157, 16, 131841112, 1),
(158, 16, 982804238, 1),
(159, 11, 653115707, 1),
(160, 13, 613817876, 1),
(162, 13, 18876391, 1),
(163, 13, 86784627, 1),
(164, 13, 595598045, 1),
(165, 16, 870690923, 1),
(166, 13, 228980744, 1),
(167, 13, 718433613, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `f_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `id_usuario`, `f_creacion`, `total`) VALUES
(69061280, 3, '2019-05-31 21:24:54', '17.60'),
(123840332, 6, '2019-05-31 21:24:54', '9.04'),
(460205078, 6, '2019-05-31 21:24:54', '42.91'),
(702239990, 3, '2019-05-31 21:24:54', '11.50'),
(719085693, 6, '2019-05-31 21:24:54', '10.37'),
(811584472, 3, '2019-05-31 21:24:54', '9.20'),
(835815429, 6, '2019-05-31 21:24:54', '15.57'),
(914093017, 7, '2019-05-31 21:24:54', '30.55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `f_llegada` date DEFAULT NULL,
  `f_expiracion` date DEFAULT NULL,
  `precio` decimal(16,2) NOT NULL,
  `img` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `cantidad`, `f_llegada`, `f_expiracion`, `precio`, `img`, `estado`) VALUES
(1529818, 'Aguacate ', 'AGUACATE YALCA CHIMBA LIBRA', 100, '2019-06-05', '2019-07-05', '1.15', 'assets/img/pro_aguacate.jpeg', 1),
(17628435, 'Powerade', 'BEBIDA POWERADE AVALANCHA 500ML', 100, '2019-06-05', '2020-12-05', '1.00', 'assets/img/pro_power.jpeg', 1),
(18876391, 'Hueso para Perro', 'HUESO MEDIANO LASSIE', 100, '2019-06-05', '2020-06-05', '2.87', 'assets/img/pro_hueso.jpeg', 1),
(21786004, 'Chile Verde', 'CHILE VERDE OFERTA UNIDAD', 100, '2019-06-05', '2019-06-10', '0.25', 'assets/img/pro_chile.jpeg', 1),
(22426743, 'Zanahoria', 'ZANAHORIA LIBRA', 100, '2019-06-05', '2019-06-10', '0.35', 'assets/img/pro_zanahoria.jpeg', 1),
(34469521, 'Jugo Galon', 'JUGO SUPER JUOO CITRUS PUNCH GALON', 100, '2019-06-05', '2020-12-05', '2.82', 'assets/img/pro_galon.jpeg', 1),
(38636409, 'Chorizo Gaucho  ', 'CHORIZO GAUCHO LA RIOJA LIBRA', 100, '2019-06-05', '2019-07-05', '3.99', 'assets/img/pro_gaucho.jpeg', 1),
(40212560, 'Leche Entera ', 'LECHE ENTERA GALON', 100, '2019-06-05', '2019-07-05', '4.99', 'assets/img/pro_leche.jpeg', 1),
(47474780, 'Tequila Jarana', 'TEQUILA JARANA REPOSADO 1000ML', 100, '2019-06-05', '2020-06-05', '19.99', 'assets/img/pro_jarana.jpeg', 1),
(52896758, 'Gatorade', 'BEBIDA GATORADE SPORTCAP BERRY BLUE 600M', 100, '2019-06-05', '2020-12-05', '1.00', 'assets/img/pro_gato.jpeg', 1),
(53302380, 'Agua', 'AGUA ALPINA SPORT LITRO', 100, '2019-06-05', '2020-12-05', '0.48', 'assets/img/pro_agua.jpeg', 1),
(57796125, 'PiÃ±a ', 'PIÃ‘A GOLDEN UNIDAD', 100, '2019-06-05', '2019-06-10', '2.85', 'assets/img/pro_piÃ±a.jpeg', 1),
(63989464, 'Smirnoff Ice ', 'SMIRNOFF ICE GREEN APPLE VIDRIO 355 ML', 100, '2019-06-05', '2019-12-05', '1.15', 'assets/img/pro_ice.jpeg', 1),
(86276184, 'Costilla Alta', 'COSTILLA ALTA LIBRA', 100, '2019-06-04', '2019-06-14', '2.85', 'assets/img/pro_cosalta.jpeg', 1),
(86784627, 'Alimento para Gato', 'CAT CHOW DELICIAS RELLENAS DE PESCADOS', 100, '2019-06-05', '2020-06-05', '7.45', 'assets/img/pro_cat.jpeg', 1),
(103203358, 'Monster Energy', 'BEBIDA ENERGI MONSTER OBSOLUTELY 473 ML', 100, '2019-06-05', '2020-12-05', '2.14', 'assets/img/pro_mons.jpeg', 1),
(103989485, 'Melocoton ', 'MELOCOTON CONSERVERO LIBRA', 100, '2019-06-05', '2019-06-10', '2.25', 'assets/img/pro_melocoton.jpeg', 1),
(107803178, 'Acondicionador', 'ACOND DOVE RECONSTRUCCION COMP 200 ML', 100, '2019-06-05', '2020-06-06', '3.52', 'assets/img/pro_acon.jpeg', 1),
(115830840, 'Cebolla', 'CEBOLLA MORADA LIBRAS', 100, '2019-06-05', '2019-06-10', '0.99', 'assets/img/pro_cebolla.jpeg', 1),
(118044267, 'Jabon Cremoso', 'JABON CREMOSO JHONSON AVENA 48/125 GRS', 100, '2019-06-05', '2020-06-05', '1.82', 'assets/img/pro_jabon.jpeg', 1),
(125540855, 'Yuca', 'YUCA CRIOLLA LIBRA', 100, '2019-06-05', '2019-06-10', '0.89', 'assets/img/pro_yuca.jpeg', 1),
(131841112, 'Jabon de Platos', 'JABÃ“N PLATOS TARRO AXION COMPLETE 850G', 100, '2019-06-05', '2020-06-05', '3.26', 'assets/img/pro_jplatos.jpeg', 1),
(133588089, 'Cilatro ', 'CILANTRO 1/4 MANOJO', 100, '2019-06-05', '2019-06-10', '0.50', 'assets/img/pro_cilantro.jpeg', 1),
(154541285, 'Rabano', 'RABANOS MANOJO', 100, '2019-06-05', '2019-06-10', '0.65', 'assets/img/pro_rabano.jpeg', 1),
(154791117, 'Insecticida', ' INSECTICIDA RAID MATA BICHOS 400ML', 100, '2019-06-05', '2020-06-05', '3.46', 'assets/img/pro_inse.png', 1),
(160947398, 'AtÃºn', 'VEGETALES EN AGUA 142G', 100, '2019-06-04', '2019-06-14', '2.15', 'assets/img/por_atun.png', 1),
(161911051, '6 Pack Regia', '6 PACK CERVEZA REGIA 355 ML', 100, '2019-06-05', '2019-12-05', '4.80', 'assets/img/pro_regia.jpeg', 1),
(162495550, 'Vodka Finlandia', 'VODKA FINLANDIA 1000ML', 100, '2019-06-05', '2020-06-05', '21.99', 'assets/img/pro_vod.jpeg', 1),
(174645309, 'Shampoo', 'SHAMPOO P/BEBES BABY MAGIC MENNEN 600 ML', 100, '2019-06-05', '2020-06-05', '6.09', 'assets/img/pro_shamp.jpeg', 1),
(182903560, 'Flan Danette', 'FLAN DANETTE DANONE 200GR', 100, '2019-06-05', '2019-07-05', '0.89', 'assets/img/pro_flan.jpeg', 1),
(198566168, 'Ambiental', 'AMBIENTAL GLADE GEL DELEITE FLORAL 70 G', 100, '2019-06-05', '2023-06-05', '0.70', 'assets/img/pro_ambiental.jpeg', 1),
(200872742, 'Leche Entera', 'LECHE ENTERA  946 ML', 100, '2019-06-05', '2019-07-05', '1.45', 'assets/img/pro_lec.jpeg', 1),
(201495120, 'Fanta', 'GASEOSA FANTA 1.25 LITROS PET', 100, '2019-06-05', '2020-12-05', '1.00', 'assets/img/pro_fan.png', 1),
(210057243, 'Coca Cola', 'GASEOSA COCA COLA REGULAR LATA 354 ML', 100, '2019-06-05', '2020-12-05', '0.55', 'assets/img/pro_cocacola.jpeg', 1),
(218880636, 'Apio ', 'APIO LIBRA', 100, '2019-06-05', '2019-06-10', '0.79', 'assets/img/pro_apio.jpeg', 1),
(220017004, 'Formula', 'FORMULA NAN 3 OPTIPRO 800 G', 100, '2019-06-05', '2020-10-05', '20.86', 'assets/img/pro_formula.gif', 1),
(220257906, 'Yogurt', 'YOGURT COOL  YES 115GR', 100, '2019-06-05', '2019-07-05', '0.25', 'assets/img/pro_yogurt.png', 1),
(228980744, 'Correa para Perro', 'CORREA PARA PERRO COLOR ROJO', 100, '2019-06-05', '2020-06-05', '6.70', 'assets/img/pro_correa.jpeg', 1),
(242049799, 'Repelente', 'REPELENTE OFF AEROSOL 12/6 OZ SC JHONSO', 100, '2019-06-05', '2023-06-05', '5.85', 'assets/img/pro_repe.jpeg', 1),
(253534574, 'Detergente', 'DETERGENTE FAB LIMNO 1500G', 100, '2019-06-05', '2021-06-05', '2.86', 'assets/img/pro_deter.jpeg', 1),
(253947664, 'Chuleta de Res', 'CHULETA DE LOMO DE RES LIBRA', 100, '2019-06-04', '2019-06-14', '3.75', 'assets/img/pro_chuleta.jpeg', 1),
(255492527, 'Jugo de Naranja', 'JUGO DE NARANJA JUMEX 1000 ML', 100, '2019-06-05', '2020-12-05', '0.90', 'assets/img/pro_jugo.jpeg', 1),
(266994612, 'Tomate ', 'TOMATE DE COCINA LIBRA', 100, '2019-06-05', '2019-06-10', '0.75', 'assets/img/pro_tomate.jpeg', 1),
(275410803, 'Chorizo de Res', 'CHORIZO DE RES EMBUTIDOS VICENTINOS 227G', 100, '2019-06-05', '2019-07-05', '2.68', 'assets/img/pro_cres.jpeg', 1),
(276454006, 'Enfagron Premium', 'ENFAGROW PREMIUM 3 375 GRAMOS', 100, '2019-06-05', '2019-11-05', '13.63', 'assets/img/pro_enfa.jpeg', 1),
(279602614, 'Esponja', 'ESPONJA MULTIUSO', 100, '2019-06-05', '2020-06-05', '2.34', 'assets/img/pro_esponja.png', 1),
(282249425, 'Sardina', 'SARDINA DULCE CILINDRICA 48', 100, '2019-06-04', '2019-06-14', '0.80', 'assets/img/pro_sardina.jpeg', 1),
(306146374, 'Carne Molida', 'CARNE MOLIDA PREMIUM DE RES', 100, '2019-06-04', '2019-06-14', '4.05', 'assets/img/pro_molida.png', 1),
(316640575, 'Crema para Peinar', 'CREMA P/PEINAR ANTIOX 300ML', 100, '2019-06-05', '2020-06-05', '3.25', 'assets/img/por_peinar.jpeg', 1),
(323428949, 'Manzana', 'MANZANA GALA# 100 LIBRA', 100, '2019-06-05', '2019-06-10', '1.55', 'assets/img/pro_manzana.jpeg', 1),
(339924147, 'Jugo', 'JUGO DE MANGO JUMEX LATA 24/35', 100, '2019-06-05', '2020-12-05', '0.60', 'assets/img/pro_jumex.jpeg', 1),
(344081202, 'Platano ', 'PLATANOS LIBRA', 100, '2019-06-05', '2019-06-10', '0.35', 'assets/img/pro_platano.jpeg', 1),
(349468066, 'Vaselina', 'VASELINA KENT CELESTE GRANDE 240 G', 100, '2019-06-05', '2020-06-05', '2.98', 'assets/img/por_vacelina.jpeg', 1),
(356601347, 'Jamon de Pollo', 'JAMON DE POLLO INDIO EMPACADO AL VACIO D', 100, '2019-06-05', '2019-07-05', '1.35', 'assets/img/pro_japollo.png', 1),
(364772408, 'Queso Clasico', 'QUESO CLASICO PETACONES 200 G', 100, '2019-06-05', '2019-07-05', '2.37', 'assets/img/pro_queso.jpeg', 1),
(371209069, 'Brocoli', 'BROCOLI LIBRA', 100, '2019-06-05', '2019-06-10', '1.15', 'assets/img/pro_brocoli.jpeg', 1),
(385201401, 'Crema Chantilly ', 'CREMA CHANTILLY LAND LAKES 15 ONZ', 100, '2019-06-05', '2019-07-05', '4.52', 'assets/img/pro_chanti.jpeg', 1),
(393842288, 'Desmaquillante', 'DESMAQ BIFASICO DE OJOS NIVEA 1/125ML', 100, '2019-06-05', '2020-07-05', '8.64', 'assets/img/pro_desma.jpeg', 1),
(403489385, 'Galletas de Arroz', 'GALLETA DE ARROZ', 100, '2019-06-05', '2019-07-05', '0.98', 'assets/img/pro_arroz.jpeg', 1),
(420117896, 'Pan Baguet', 'PAN BAGUET CON AJO UNIDAD', 100, '2019-06-05', '2019-10-05', '0.40', 'assets/img/pro_pan.png', 1),
(421818377, 'Corona', 'CERVEZA CORONA EXTRA 355 ML', 100, '2019-06-05', '2019-12-05', '1.50', 'assets/img/pro_corona.jpeg', 1),
(427498965, 'Melon', 'MELON PEQUEÃ‘O', 100, '2019-06-05', '2019-06-10', '0.99', 'assets/img/pro_melon.jpeg', 1),
(433811258, 'Camaron ', 'CAMARON LIBRA', 100, '2019-06-04', '2019-06-14', '2.25', 'assets/img/pro_camaron.jpeg', 1),
(440494957, 'Pavo', 'PAVO CRUDO PRESTAGE LB', 100, '2019-06-04', '2019-06-14', '1.60', 'assets/img/pro_pavo.jpeg', 1),
(440557659, 'Vasos Plasticos', 'VASOS PLASTICOS 8ONZ', 100, '2019-06-05', '2023-06-05', '0.55', 'assets/img/pro_vasos.jpeg', 1),
(440784040, 'Fresca', 'GASEOSA FRESCA BOTELLA 12/12 ONZ', 100, '2019-06-05', '2020-12-05', '1.55', 'assets/img/pro_fresca.jpeg', 1),
(441946957, 'Raqueta', 'RAQUETA MATA MOSQUITOS RECARGABLE LED', 100, '2019-07-05', '2021-06-05', '7.78', 'assets/img/pro_raqueta.jpeg', 1),
(449744408, 'Galleta', '10PACK GALLETAS QUAKER MANZA CANELA 380G', 100, '2019-06-05', '2019-06-09', '3.90', 'assets/img/pro_galelta.jpeg', 1),
(453861942, 'Papa', 'PAPA MORENA LIBRA', 100, '2019-06-05', '2019-06-10', '1.15', 'assets/img/pro_papa.jpeg', 1),
(455579536, 'Fresa', 'FRESAS LIBRA', 100, '2019-06-05', '2019-06-10', '2.25', 'assets/img/.jpeg', 1),
(466942466, 'Tres Leches', 'PORCION DE TRES LECHE', 100, '2019-06-05', '2019-06-07', '0.60', 'assets/img/pro_tres.png', 1),
(467082010, 'Salchicha Alemana ', 'SALCHICHA ALEMANA SELLO DE ORO 227 G', 100, '2019-06-05', '2019-07-05', '1.99', 'assets/img/pro_salalemana.jpeg', 1),
(477128803, 'Rapiditas', 'RAPIDITAS 12 PIEZAS BIMBO 300 GRS', 100, '2019-06-05', '2019-06-09', '1.05', 'assets/img/pro_rapi.jpeg', 1),
(477504447, 'Coca Cola', 'GASEOSA COCA COLA 1.25 LTS', 100, '2019-06-05', '2020-12-05', '1.00', 'assets/img/pro_co.jpeg', 1),
(477796707, 'Toallas Humedas', 'TOALLAS HUMEDAS HUGGIES SOFT SKIN 56 UNI', 100, '2019-06-05', '2020-06-05', '1.60', 'assets/img/pro_toallas.jpeg', 1),
(483081473, 'Banano', 'BANANO LIBRA', 100, '2019-06-05', '2019-06-10', '0.39', 'assets/img/pro_banano.jpeg', 1),
(484282061, 'Aloe Vera', 'BEBIDA ALOE VERA DEL MONTE 1.5 LT', 100, '2019-06-05', '2019-12-05', '3.66', 'assets/img/pro_aloe.jpeg', 1),
(499470265, 'Jugo de Naranja ', 'JUGO D/NARANJA S/PULPA PREMIUM 500ML PET', 100, '2019-06-05', '2020-11-05', '0.76', 'assets/img/pro_juna.jpeg', 1),
(525739704, 'Naranja', 'NARANJA VALENCIA IMPORTADA LIBRA', 100, '2019-06-05', '2019-06-10', '1.89', 'assets/img/pro_naranja.jpeg', 1),
(533431259, 'PaÃ±ales', 'PAÃ‘AL ACTIVE SEC AJUSTE XG 66 UN', 100, '2019-06-05', '2020-06-05', '21.99', 'assets/img/pro_paÃ±ales.jpeg', 1),
(567220096, 'Mortadela', 'MORTADELA 200 GRS', 100, '2019-06-05', '2019-06-05', '0.92', 'assets/img/pro_mortadela.jpeg', 1),
(567627922, 'Guisquil', 'GUISQUIL CRIOLLO UNIDAD', 100, '2019-06-05', '2019-06-10', '0.49', 'assets/img/pro_guis.jpeg', 1),
(575217267, 'Pepsi', 'GASEOSA PEPSI REGULAR 2.5 LITROS', 100, '2019-06-05', '2020-12-05', '1.60', 'assets/img/pro_pepsi.jpeg', 1),
(575447093, 'Sandia', 'SANDIA PERSONAL UNIDAD', 100, '2019-06-05', '2019-06-10', '1.29', 'assets/img/pro_sandia.jpeg', 1),
(578072669, 'Platos', 'PLATOS PLASTICOS 25U', 100, '2019-06-05', '2023-06-05', '0.91', 'assets/img/pro_platos.jpeg', 1),
(584455034, 'Jugo Ponche de Fruta', 'JUGO DEL VALLE PONCHE DE FRUTAS 500 ML', 100, '2019-06-05', '2020-12-05', '0.40', 'assets/img/pro_ponche.jpeg', 1),
(586964152, 'Mango', 'MANGO PANADES LIBRA', 100, '2019-06-05', '2019-06-10', '0.85', 'assets/img/pro_mango.jpeg', 1),
(590071478, 'Pollo Muslo', 'MUSLO PIERNA FRESH LIBRA', 100, '2019-06-04', '2019-06-14', '1.50', 'assets/img/pro_pollo.jpeg', 1),
(595598045, 'Rodillo quita pelusa', 'RODILLO QUITA PELUSA P/MASCOTAS 56 HOJAS', 100, '2019-06-05', '2020-09-05', '5.59', 'assets/img/pro_rodillo.jpeg', 1),
(599560332, 'Lechuga Romana', 'LECHUGA ROMANA UNIDAD', 100, '2019-06-05', '2019-06-10', '0.79', 'assets/img/pro_lechu.jpeg', 1),
(613817876, 'Alimento para perro', 'ALIMENTO P/ PERRO PEDIGREE RAZA PEQUEÃ‘A', 100, '2019-06-05', '2019-07-05', '7.89', 'assets/img/pro_perro.jpeg', 1),
(616478681, 'Colado de Banano', 'COLADO DE BANANA HEINZ 24 113 GRAMOS 207', 100, '2019-06-05', '2019-07-05', '0.61', 'assets/img/pro_colado.jpeg', 1),
(626755110, 'Cereal Infantil', 'CEREAL INSTANTANEO NESTUM 5 CEREALES NES', 100, '2019-06-05', '2019-10-05', '2.55', 'assets/img/pro_cereal.jpeg', 1),
(628621631, 'Costilla de Cerdo', 'COSTILLA DE CERDO BABY BACK AMERICANA LB', 100, '2019-06-04', '2019-06-14', '4.15', 'assets/img/pro_costilla.jpeg', 1),
(630196788, 'Bloqueador Solar', 'BLOQUEADOR SOLAR NIVEA F50 200 ML', 100, '2019-06-05', '2020-08-05', '14.97', 'assets/img/pro_bloqueador.jpeg', 1),
(632497018, 'Salchicha de Pollo', 'SALCHICHA DE POLLO DEL REY 460 GRAMOS', 100, '2019-06-05', '2019-07-05', '1.12', 'assets/img/por_salpollo.png', 1),
(652442041, 'Salchicha con Queso ', 'SALCHICHA CON QUESO SUPERIOR 454GR', 100, '2019-06-05', '2019-07-05', '2.03', 'assets/img/pro_salqueso.jpeg', 1),
(652502604, 'Cepillo Dental', 'CEPILLO DENTAL TECHNIQUE PLUS SUAVE', 100, '2019-06-05', '2022-10-05', '2.70', 'assets/img/pro_ce.jpeg', 1),
(653115707, 'Leche de Almendra', 'BEBIDA SILK ALMENDRA ORIGINAL 946ML', 100, '2019-06-05', '2020-06-05', '3.83', 'assets/img/pro_almendra.jpeg', 1),
(655908301, 'Aceite', 'ACEITE ORIGINAL 100 ML', 100, '2019-06-05', '2020-06-05', '1.82', 'assets/img/pro_aceite.jpeg', 1),
(658505048, 'Queso Procesado', 'QUESO PROCESADO AMARILLO LACTOLAC 200 G', 100, '2019-06-05', '2019-07-05', '1.95', 'assets/img/por_proce.jpeg', 1),
(662244860, 'Autan', 'AUTAN ESPIRALES LAVANDA 10 ESPIRALES', 100, '2019-06-05', '2023-06-05', '0.75', 'assets/img/pro_autan.jpeg', 1),
(670234899, 'Coca Cola', 'GASEOSA COCA COLA REG ENV/PLAST 2.5 LT', 100, '2019-06-05', '2020-12-05', '1.85', 'assets/img/pro_coca.jpeg', 1),
(676674420, 'Jabon Xtra', 'JABON XTRA ELIMINA OLOR Y MANCHAS 425G', 100, '2019-06-05', '2020-06-05', '2.73', 'assets/img/pro_jabonx.jpeg', 1),
(679400418, 'Fanta', 'GASEOSA FANTA NARANJA LATA 12/12 ONZ', 100, '2019-06-05', '2020-12-05', '0.55', 'assets/img/pro_fanta.jpeg', 1),
(693997271, 'Uva', 'UVA RED GLOBE LIBRA', 100, '2019-06-05', '2019-06-10', '1.79', 'assets/img/pro_uva.png', 1),
(699732830, 'Cepillo Lava Pacha', 'CEPILLO LAVA PACHA SK371 BIBERON REDISA', 100, '2019-06-05', '2020-07-05', '3.36', 'assets/img/pro_lava.jpeg', 1),
(714124613, 'Pepsi', 'GASEOSA PEPSI REGULAR LATA 355 ML', 100, '2019-06-05', '2020-12-05', '0.50', 'assets/img/pro_pep.jpeg', 1),
(718433613, 'Arena para Gato ', 'ARENA FINA PARA GATOS 10LIBRAS', 100, '2019-06-05', '2019-07-05', '12.00', 'assets/img/pro_arena.jpeg', 1),
(721446700, 'Limon', 'LIMÃ“N PÃ‰RSICO UNIDAD', 100, '2019-06-05', '2019-06-10', '0.30', 'assets/img/pro_limon.jpeg', 1),
(723769153, 'Te de Melocoton', 'BEBIDA FUZE TEA MELOCOTON PET 600ml', 100, '2019-06-05', '2020-12-05', '0.75', 'assets/img/pro_te.jpeg', 1),
(727772568, 'Trapeador', 'PAÃ‘O TRAPEADOR', 100, '2019-06-05', '2023-06-05', '3.04', 'assets/img/pro_tra.jpeg', 1),
(729974975, 'Crema AntipaÃ±alitis', 'CREMA MILDER BABY ANTIPAÃ‘ALITIS 155GRS', 100, '2019-06-05', '2020-06-05', '7.23', 'assets/img/pro_anti.jpeg', 1),
(746333337, 'Berenjena', 'BERENJENA UNIDAD', 100, '2019-06-05', '2019-06-10', '0.45', 'assets/img/pro_bere.jpeg', 1),
(747962455, 'Pepino ', 'PEPINO CRIOLLO UNIDAD', 100, '2019-06-05', '2019-06-10', '0.29', 'assets/img/pro_pepino.jpeg', 1),
(762910429, 'Gel', 'CERA PARA CABELLO EFECT BRILL XTREME 60G', 100, '2019-06-05', '2020-06-05', '4.14', 'assets/img/pro_gel.jpeg', 1),
(766815293, 'Ambiental', 'AMBIENTAL EN CONO GLADE HAWAIIAM 170GR', 100, '2019-06-05', '2020-06-05', '1.75', 'assets/img/pro_ambiental.jpeg', 1),
(774619515, 'Ron Flor de CaÃ±a', 'RON FLOR DE CAÃ‘A BLACK LABEL 4 aÃ±os 1.75 LT', 100, '2019-06-05', '2020-06-05', '8.25', 'assets/img/pro_flor.jpeg', 1),
(781562461, 'Bolsas Plasticas', 'BOLSAS PLASTICAS JARDINERAS 6U', 100, '2019-06-05', '2023-06-05', '1.00', 'assets/img/pro_bolsa.jpeg', 1),
(798745810, 'Shampoo', 'SHAMP/RECUPERACION EXTREMA 200ML', 100, '2019-06-05', '2020-06-05', '3.95', 'assets/img/pro_sham.jpeg', 1),
(801330196, 'Queso Crema', 'QUESO CREMA ORIGINAL DOS PINOS 210 GR', 100, '2019-06-05', '2019-07-05', '1.59', 'assets/img/pro_quecrema.jpeg', 1),
(814276702, 'Removedores', 'REMOVEDORES 200U', 100, '2019-06-05', '2023-06-05', '1.09', 'assets/img/pro_rem.jpeg', 1),
(829857667, 'Salchicha de Pavo', 'SALCHICHA DE PAVO 266 GRS', 100, '2019-06-05', '2019-07-05', '1.23', 'assets/img/por_salpavo.jpeg', 1),
(838141774, 'Pastel de Frutas', 'PASTEL DE FRUTAS 12 EN DOMO', 100, '2019-06-05', '2019-06-09', '9.99', 'assets/img/pro_pastel.jpeg', 1),
(844084709, 'Jugo de Pera', 'HEINZ FLEX PERA 24/113 GRS', 100, '2019-06-05', '2019-10-05', '0.95', 'assets/img/pro_jugo.jpeg', 1),
(854880219, 'Desinfectante', 'DESINF FLORAL MAGIA BLANCA BOTE 3875ML', 100, '2019-06-05', '2020-06-05', '5.65', 'assets/img/pro_desin.jpeg', 1),
(858306828, 'Escoba', 'ESCOBA GIGANTE HOGAR', 100, '2019-06-05', '2020-06-05', '2.90', 'assets/img/pro_escoba.jpeg', 1),
(860887056, '15 Pack Cerveza Golden', '15 PACK CERVEZA GOLDEN LATA 330 ML', 100, '2019-06-05', '2020-06-05', '4.49', 'assets/img/pro_golden.jpeg', 1),
(870690923, 'Shampoo', 'SHAMPOO DESODORIZANTE PARA PERRO RANGER', 100, '2019-06-05', '2020-06-05', '1.02', 'assets/img/pro_sperro.jpeg', 1),
(876572118, 'Lomo de Cerdo ', 'LOMO DE CERDO LIBRA', 100, '2019-06-04', '2019-06-14', '3.99', 'assets/img/pro_lomo.jpeg', 1),
(878784624, 'Crema', 'CREMA LACTOLAC 380 G', 100, '2019-06-05', '2019-07-05', '1.82', 'assets/img/pro_crema.png', 1),
(890740545, 'Angelina', 'ANGELINA LIBRA', 100, '2019-06-04', '2019-06-14', '4.99', 'assets/img/pro_anglina.jpeg', 1),
(891617104, 'Jabon Liquido', 'JABON PROTEX AVENA LIQUIDO P/MANOS 221 M', 100, '2019-06-05', '2020-06-05', '2.79', 'assets/img/pro_jaliquido.jpeg', 1),
(898832660, 'Crema Facial', 'CREM/FACIAL NIVEA CUIDADO NUTRITIVO200ML', 100, '2019-06-05', '2021-06-05', '7.37', 'assets/img/pro_facial.jpeg', 1),
(908390802, 'Enjuague Bucal', 'ENJUAGUE BUCAL FRESHBURST 250 ML LISTERI', 100, '2019-06-05', '2020-06-05', '4.50', 'assets/img/pro_enjua.jpeg', 1),
(908471176, 'Filete de Pescado', 'FILETE DE PESCADO PESCA DEL DIA LB', 100, '2019-06-04', '2019-06-07', '5.67', 'assets/img/pro_filete.jpeg', 1),
(908650876, 'Cloro', 'DESINFECT AZISTIN ALTERNA AL CLORO 2 L', 100, '2019-06-05', '2020-06-05', '4.40', 'assets/img/pro_cloro.jpeg', 1),
(911570045, 'Maracuya', 'MARACUYA REDONDO UNIDAD', 100, '2019-06-05', '2019-06-10', '0.55', 'assets/img/pro_maracuya.png', 1),
(916354093, 'Desodorante', 'DESOD DOVE BARRA STICK ORIGINAL 50GR', 100, '2019-06-05', '2020-06-05', '3.42', 'assets/img/pro_deso.jpeg', 1),
(926997569, 'Jamon de Pavo', 'JAMON DE PAVO AHUMADO LIBRAS', 100, '2019-06-04', '2019-07-05', '3.45', 'assets/img/pro_japavo.png', 1),
(931230776, '7up', 'GASEOSA 7UP REGULAR 600 ML', 100, '2019-06-05', '2020-12-05', '0.60', 'assets/img/pro_7up.jpeg', 1),
(932050835, 'Dip', 'DIP DE LOROCO 230G', 100, '2019-06-05', '2019-07-05', '1.47', 'assets/img/pro_dip.jpeg', 1),
(955378511, 'Pera', 'PERA VERDE DANJOU LIBRA', 100, '2019-06-05', '2019-06-10', '1.25', 'assets/img/pro_pera.png', 1),
(979949970, 'Carne de Brazuelo', 'BRAZUELO DE TERNERA GALLEGA', 100, '2019-06-04', '2019-06-14', '2.95', 'assets/img/pro_brazuelo.jpeg', 1),
(982804238, 'Limpiador de Cocina', 'LIMPIADOR DE COCINA 500ML', 100, '2019-06-05', '2020-06-05', '2.00', 'assets/img/pro_limpi.jpeg', 1),
(983643004, 'Muffin', 'MUFFIN STRUSSEL BAKERY UNIDAD', 100, '2019-06-05', '2019-06-09', '0.60', 'assets/img/pro_muffin.jpeg', 1),
(987932297, 'Acondicionador', 'ACONDICIONADOR ORIGINAL JOHNSON 400 ML', 100, '2019-06-05', '2020-06-05', '6.09', 'assets/img/pro_acondi.png', 1),
(992544334, 'Jamon Americano', 'JAMON AMERICANO FUD PIEZA LIBRA', 100, '2019-06-05', '2019-07-05', '2.84', 'assets/img/pro_jaamericano.jpeg', 1),
(992786226, 'Red Bull', 'BEBIDA ENERGIZANTE RED BULL 24 DE 250 ML', 100, '2019-06-05', '2020-12-05', '2.17', 'assets/img/pro_red.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precioUnitario` decimal(16,0) NOT NULL,
  `subtotal` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `tipo` enum('Administrador','Estandar') DEFAULT 'Estandar',
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `pass`, `telefono`, `direccion`, `tipo`, `estado`) VALUES
(2, 'Melvin ', 'melvin@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '7474-2514', 'Calle horizontal, pasaje arriba, casa n5', 'Estandar', 1),
(3, 'daniel', 'daniel@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '6589-2514', 'Calle horizontal, pasaje arriba, casa n5', 'Estandar', 1),
(4, 'Melvin Admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '45469-8523', 'calle, estandar, avemnita Arbolito, sobre la calle recta', 'Administrador', 1),
(5, 'mauricio5599', 'mauricio@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '7415-8695', 'el salvador san salvador', 'Estandar', 1),
(6, 'Melvin Giovanni ', 'jlope488@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '6589-2514', 'Calle horizontal, pasaje arriba, casa n5', 'Estandar', 1),
(7, 'susy', 'susy@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '6589-2514', 'Calle horizontal, pasaje arriba, casa n5', 'Administrador', 1);

--
-- Ãndices para tablas volcadas
--

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_categoria`
--
ALTER TABLE `detalle_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_productos` (`id_productos`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_productos` (`id_producto`),
  ADD KEY `id_factura` (`id_factura`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `detalle_categoria`
--
ALTER TABLE `detalle_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992786227;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_categoria`
--
ALTER TABLE `detalle_categoria`
  ADD CONSTRAINT `detalle_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `detalle_categoria_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registro_ibfk_2` FOREIGN KEY (`id_factura`) REFERENCES `factura` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

