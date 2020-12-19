-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2020 a las 03:36:36
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto`
--

CREATE TABLE `boleto` (
  `id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `funcion_id` int(11) NOT NULL,
  `butaca_id` int(10) UNSIGNED NOT NULL,
  `precio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boleto`
--

INSERT INTO `boleto` (`id`, `factura_id`, `funcion_id`, `butaca_id`, `precio_id`) VALUES
(1, 1, 1, 101, 1),
(2, 2, 7, 164, 1),
(3, 2, 7, 108, 1),
(4, 2, 7, 116, 1),
(5, 2, 7, 124, 1),
(6, 2, 7, 132, 1),
(7, 2, 7, 140, 1),
(8, 2, 7, 148, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `butaca`
--

CREATE TABLE `butaca` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(5) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `sala_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `butaca`
--

INSERT INTO `butaca` (`id`, `nombre`, `activo`, `sala_id`) VALUES
(1, '1', 0, 1),
(2, '2', 0, 1),
(3, '3', 0, 1),
(4, '4', 0, 1),
(5, '5', 0, 1),
(6, '6', 0, 1),
(7, '7', 0, 1),
(8, '8', 0, 1),
(9, '9', 0, 1),
(10, '10', 0, 1),
(11, '11', 0, 1),
(12, '12', 0, 1),
(13, '13', 0, 1),
(14, '14', 0, 1),
(15, '15', 0, 1),
(16, '16', 0, 1),
(17, '17', 0, 1),
(18, '18', 0, 1),
(19, '19', 0, 1),
(20, '20', 0, 1),
(21, '21', 0, 1),
(22, '22', 0, 1),
(23, '23', 0, 1),
(24, '24', 0, 1),
(25, '25', 0, 1),
(26, '26', 0, 1),
(27, '27', 0, 1),
(28, '28', 0, 1),
(29, '29', 0, 1),
(30, '30', 0, 1),
(31, '31', 0, 1),
(32, '32', 0, 1),
(33, '33', 0, 1),
(34, '34', 0, 1),
(35, '35', 0, 1),
(36, '36', 0, 1),
(37, '37', 0, 1),
(38, '38', 0, 1),
(39, '39', 0, 1),
(40, '40', 0, 1),
(41, '41', 0, 1),
(42, '42', 0, 1),
(43, '43', 0, 1),
(44, '44', 0, 1),
(45, '45', 0, 1),
(46, '46', 0, 1),
(47, '47', 0, 1),
(48, '48', 0, 1),
(49, '49', 0, 1),
(50, '50', 0, 1),
(51, '51', 0, 1),
(52, '52', 0, 1),
(53, '53', 0, 1),
(54, '54', 0, 1),
(55, '55', 0, 1),
(56, '56', 0, 1),
(57, '57', 0, 1),
(58, '58', 0, 1),
(59, '59', 0, 1),
(60, '60', 0, 1),
(61, '61', 0, 1),
(62, '62', 0, 1),
(63, '63', 0, 1),
(64, '64', 0, 1),
(65, '65', 0, 1),
(66, '66', 0, 1),
(67, '67', 0, 1),
(68, '68', 0, 1),
(69, '69', 0, 1),
(70, '70', 0, 1),
(71, '71', 0, 1),
(72, '72', 0, 1),
(73, '73', 0, 1),
(74, '74', 0, 1),
(75, '75', 0, 1),
(76, '76', 0, 1),
(77, '77', 0, 1),
(78, '78', 0, 1),
(79, '79', 0, 1),
(80, '80', 0, 1),
(81, '81', 0, 1),
(82, '82', 0, 1),
(83, '83', 0, 1),
(84, '84', 0, 1),
(85, '85', 0, 1),
(86, '86', 0, 1),
(87, '87', 0, 1),
(88, '88', 0, 1),
(89, '89', 0, 1),
(90, '90', 0, 1),
(91, '91', 0, 1),
(92, '92', 0, 1),
(93, '93', 0, 1),
(94, '94', 0, 1),
(95, '95', 0, 1),
(96, '96', 0, 1),
(97, '97', 0, 1),
(98, '98', 0, 1),
(99, '99', 0, 1),
(100, '100', 0, 1),
(101, '1', 1, 3),
(102, '2', 1, 3),
(103, '3', 1, 3),
(104, '4', 1, 3),
(105, '5', 1, 3),
(106, '6', 1, 3),
(107, '7', 1, 3),
(108, '8', 1, 3),
(109, '9', 1, 3),
(110, '10', 1, 3),
(111, '11', 1, 3),
(112, '12', 1, 3),
(113, '13', 1, 3),
(114, '14', 1, 3),
(115, '15', 1, 3),
(116, '16', 1, 3),
(117, '17', 1, 3),
(118, '18', 1, 3),
(119, '19', 1, 3),
(120, '20', 1, 3),
(121, '21', 1, 3),
(122, '22', 1, 3),
(123, '23', 1, 3),
(124, '24', 1, 3),
(125, '25', 1, 3),
(126, '26', 1, 3),
(127, '27', 1, 3),
(128, '28', 1, 3),
(129, '29', 1, 3),
(130, '30', 1, 3),
(131, '31', 1, 3),
(132, '32', 1, 3),
(133, '33', 1, 3),
(134, '34', 1, 3),
(135, '35', 1, 3),
(136, '36', 1, 3),
(137, '37', 1, 3),
(138, '38', 1, 3),
(139, '39', 1, 3),
(140, '40', 1, 3),
(141, '41', 1, 3),
(142, '42', 1, 3),
(143, '43', 1, 3),
(144, '44', 1, 3),
(145, '45', 1, 3),
(146, '46', 1, 3),
(147, '47', 1, 3),
(148, '48', 1, 3),
(149, '49', 1, 3),
(150, '50', 1, 3),
(151, '51', 1, 3),
(152, '52', 1, 3),
(153, '53', 1, 3),
(154, '54', 1, 3),
(155, '55', 1, 3),
(156, '56', 1, 3),
(157, '57', 1, 3),
(158, '58', 1, 3),
(159, '59', 1, 3),
(160, '60', 1, 3),
(161, '61', 1, 3),
(162, '62', 1, 3),
(163, '63', 1, 3),
(164, '64', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `metodo_pago_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `metodo_pago_id`, `usuario_id`) VALUES
(1, '2020-04-03', 1, 2),
(2, '2020-04-03', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formato`
--

CREATE TABLE `formato` (
  `id` int(11) NOT NULL,
  `formato` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formato`
--

INSERT INTO `formato` (`id`, `formato`) VALUES
(1, '3D'),
(2, 'Digital'),
(3, 'Transmision en vivo'),
(4, 'Divx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion`
--

CREATE TABLE `funcion` (
  `id` int(11) NOT NULL,
  `inicio` time NOT NULL,
  `final` time NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `sala_id` int(11) NOT NULL,
  `pelicula_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funcion`
--

INSERT INTO `funcion` (`id`, `inicio`, `final`, `activo`, `fecha`, `sala_id`, `pelicula_id`) VALUES
(1, '12:00:00', '14:00:00', 1, '2020-04-07', 3, 1),
(2, '12:00:00', '14:00:00', 1, '2020-04-07', 1, 2),
(3, '16:00:00', '18:00:00', 1, '2020-04-06', 3, 3),
(4, '16:00:00', '18:00:00', 1, '2020-04-06', 1, 4),
(5, '13:00:00', '15:00:00', 1, '2020-04-05', 3, 5),
(6, '12:00:00', '14:00:00', 1, '2020-04-06', 3, 2),
(7, '15:00:00', '17:00:00', 1, '2020-04-05', 3, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `genero` varchar(45) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`, `activo`) VALUES
(1, 'Aventura', 1),
(2, 'Suspenso', 1),
(3, 'Accion', 1),
(4, 'Terror', 1),
(5, 'Romance', 1),
(6, 'Musicales', 1),
(7, 'Comic', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id` int(11) NOT NULL,
  `idioma` varchar(30) NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `idioma`
--

INSERT INTO `idioma` (`id`, `idioma`, `activo`) VALUES
(10, 'Ingles Sub Espanol', 1),
(11, 'Espanol Latino', 1),
(12, 'Espanol de Espana', 1),
(13, 'Brasileno sub espanol', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id` int(11) NOT NULL,
  `metodo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id`, `metodo`) VALUES
(1, 'Paypal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_usuario`
--

CREATE TABLE `nivel_usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nivel` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nivel_usuario`
--

INSERT INTO `nivel_usuario` (`id`, `nivel`) VALUES
(1, 'Admin'),
(2, 'Estandar'),
(3, 'Visitante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `director` varchar(45) NOT NULL,
  `productor` varchar(45) NOT NULL,
  `distribuidora` varchar(45) NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `sinopsis` text NOT NULL,
  `img` varchar(45) NOT NULL,
  `codigo` varchar(16) NOT NULL,
  `ano` year(4) NOT NULL,
  `formato_id` int(11) NOT NULL,
  `idioma_id` int(11) NOT NULL,
  `genero_id` int(11) NOT NULL,
  `rating_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id`, `titulo`, `director`, `productor`, `distribuidora`, `activo`, `sinopsis`, `img`, `codigo`, `ano`, `formato_id`, `idioma_id`, `genero_id`, `rating_id`) VALUES
(1, 'Pecuniam', 'Milagros Betancourt', ' Milagros Betancourt', 'Rebeca Larrazabal', 1, 'Una chica de 16 años va a una fiesta que se sale de control y muere, sin embargo, el padre del joven culpable hará todo lo posible para mantener en alto la reputación familiar', '../assets/img/imgpelicula/111111.jpg', '111111', 2020, 2, 11, 2, 3),
(2, 'Jojo Rabbit', 'Taika Waititi', ' Fox Searchlight Productions', 'Walt Disney Products', 1, 'Johannes \"Jojo\" Betzler es un niño que vive en la Alemania nazi durante las últimas etapas de la Segunda Guerra Mundial con su madre, Rosie. Supuestamente, su padre ausente está sirviendo en el frente italiano, pero ha perdido todo contacto, y su hermana mayor, Inge, murió recientemente de gripe. El jingoísta Jojo a menudo habla con su amigo imaginario, una versión solidaria pero burlona de Adolf Hitler.', '../assets/img/imgpelicula/111112.jpg', '111112', 2020, 1, 10, 1, 1),
(3, 'Sonic La Pelicula', 'Jeff Fowler', ' SEGA', 'Paramount Picture', 1, 'Sonic es un pequeño erizo azul proveniente de otra dimensión/planeta que puede correr a velocidades supersónicas. Su cuidadora, Garra Larga la búho, lo alienta a ocultar sus poderes, pero Sonic no le toma importancia a su advertencia, lo que resulta en la invasión de una tribu de equidnas salvajes que intentan secuestrarlo. Durante el escape, Garra Larga termina malherida al recibir un flechazo por parte de un miembro de dicha tribu que se encontraba entre los árboles. Sin tiempo que perder, Garra Larga le entrega a Sonic una bolsa de anillos que abren portales a otros planetas y dimensiones, usando uno para enviarlo hasta el planeta Tierra, mientras ella se sacrifica para detener a los equidnas antes de que lograran entrar al portal, diciéndole a Sonic que no pare de correr pase lo que pase. Mientras tanto, Sonic pasa los próximos 10 años viviendo en secreto en la ciudad de Green Hills, Montana. Él idolatra al alguacil local, Tom Wachowski, y a su esposa veterinaria, Maddie. Tom había sido contratado recientemente por el Departamento de Policía de San Francisco y se estaba preparando para mudarse.', '../assets/img/imgpelicula/111113.jpg', '111113', 2020, 2, 10, 1, 1),
(4, 'Mujercitas', 'Greta Gerwig', ' Columbia Pictures', 'Sony Pictures', 1, 'Amy, Jo, Beth y Meg son cuatro hermanas adolescentes que no se resignan a desarrollar el papel que se espera de las mujeres en su época, sino que buscan expresar su individualidad. A lo largo de la historia, cada una va encontrando su lugar en la vida y desarrolla sus habilidades a pesar de las limitaciones que pesan sobre las mujeres. En el fondo, está la Guerra Civil estadounidense y una crítica de lo que la guerra ocasiona en una sociedad.', '../assets/img/imgpelicula/111114.jpg', '111114', 2019, 2, 10, 5, 1),
(5, 'Parasitos', 'Boong Joon Ho', ' CJ Entertainment', 'CJ Entertainment', 1, 'La familia Kim, compuesta por el padre Kim Ki-taek, la madre Chung-sook, el hijo Ki-woo y la hija Ki-jeong, viven en un pequeño apartamento en un semisótano, trabajan en empleos temporales mal remunerados y luchan para llegar a fin de mes. El amigo de Ki-woo, Min-hyuk, que se está preparando para estudiar en el extranjero, le regala a la familia Kim una piedra de erudito (Gongshi) que se supone les traerá riqueza. Min-hyuk le propone a Ki-woo hacerse pasar por estudiante universitario para obtener su trabajo como tutor de inglés de la hija adolescente de la rica familia Park, Da-hye.', '../assets/img/imgpelicula/111115.jpg', '111115', 2019, 2, 11, 2, 3),
(6, 'Aves de Presa', 'Cathy Yan', ' DC FIlms', 'Warner Bros', 1, 'Tras los acontecimientos de Escuadrón suicida, Harley Quinn es abandonada por el Joker. Cuando Cassandra Cain, una joven, se encuentra con un diamante que pertenece al amo del crimen Máscara Negra, después de una serie de eventos, Harley termina haciendo una alianza con Canario Negro, Cazadora y Renée Montoya para ayudar a protegerla.', '../assets/img/imgpelicula/111116.jpg', '111116', 2020, 2, 11, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio`
--

CREATE TABLE `precio` (
  `id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `activo` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `precio`
--

INSERT INTO `precio` (`id`, `precio`, `activo`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `rating` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rating`
--

INSERT INTO `rating` (`id`, `rating`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nombre` varchar(4) NOT NULL,
  `columnas` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(3) UNSIGNED NOT NULL,
  `filas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sala`
--

INSERT INTO `sala` (`id`, `nombre`, `columnas`, `activo`, `filas`) VALUES
(1, '1', 10, 1, 10),
(3, '2', 8, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nivel_usuario_id` int(10) UNSIGNED NOT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `username`, `contrasena`, `nombre`, `apellido`, `cedula`, `nivel_usuario_id`, `activo`, `email`) VALUES
(1, 'admin', 'admin', 'Administrador', 'Administrador', '0000000', 1, 1, 'admin@cinecachi.com'),
(2, 'juanmespina', 'Maracucho', 'Juan', 'Espina', '25905532', 2, 1, 'jmespina1997@gmail.c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD PRIMARY KEY (`id`,`factura_id`,`funcion_id`,`butaca_id`,`precio_id`) USING BTREE,
  ADD UNIQUE KEY `idboleto_UNIQUE` (`id`) USING BTREE,
  ADD KEY `fk_boleto_factura1_idx` (`factura_id`),
  ADD KEY `fk_boleto_funcion1_idx` (`funcion_id`),
  ADD KEY `fk_boleto_butaca1_idx` (`butaca_id`),
  ADD KEY `fk_boleto_precio1_idx` (`precio_id`);

--
-- Indices de la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD PRIMARY KEY (`id`,`sala_id`) USING BTREE,
  ADD UNIQUE KEY `idsilla_UNIQUE` (`id`),
  ADD KEY `fk_butaca_sala1_idx` (`sala_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`,`metodo_pago_id`,`usuario_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_factura_metodo_pago1_idx` (`metodo_pago_id`),
  ADD KEY `fk_factura_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `formato`
--
ALTER TABLE `formato`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD PRIMARY KEY (`id`,`sala_id`,`pelicula_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD KEY `fk_funcion_pelicula1_idx` (`pelicula_id`),
  ADD KEY `fk_funcion_sala1` (`sala_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `genero_UNIQUE` (`genero`),
  ADD UNIQUE KEY `genero` (`genero`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idmetodo_pago_UNIQUE` (`id`);

--
-- Indices de la tabla `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `nivel_UNIQUE` (`nivel`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`,`formato_id`,`idioma_id`,`genero_id`,`rating_id`),
  ADD UNIQUE KEY `idpelicula_UNIQUE` (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `fk_pelicula_formato1_idx` (`formato_id`),
  ADD KEY `fk_pelicula_idioma1_idx` (`idioma_id`),
  ADD KEY `fk_pelicula_genero1_idx` (`genero_id`),
  ADD KEY `fk_pelicula_rating1_idx` (`rating_id`);

--
-- Indices de la tabla `precio`
--
ALTER TABLE `precio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idSala_UNIQUE` (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`,`nivel_usuario_id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  ADD KEY `fk_usuario_nivel_usuario1_idx` (`nivel_usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boleto`
--
ALTER TABLE `boleto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `butaca`
--
ALTER TABLE `butaca`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formato`
--
ALTER TABLE `formato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `funcion`
--
ALTER TABLE `funcion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nivel_usuario`
--
ALTER TABLE `nivel_usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `precio`
--
ALTER TABLE `precio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleto`
--
ALTER TABLE `boleto`
  ADD CONSTRAINT `fk_boleto_butaca1` FOREIGN KEY (`butaca_id`) REFERENCES `butaca` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boleto_factura1` FOREIGN KEY (`factura_id`) REFERENCES `factura` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boleto_funcion1` FOREIGN KEY (`funcion_id`) REFERENCES `funcion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_boleto_precio1` FOREIGN KEY (`precio_id`) REFERENCES `precio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `butaca`
--
ALTER TABLE `butaca`
  ADD CONSTRAINT `fk_butaca_sala1` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `fk_factura_metodo_pago1` FOREIGN KEY (`metodo_pago_id`) REFERENCES `metodo_pago` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_factura_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `funcion`
--
ALTER TABLE `funcion`
  ADD CONSTRAINT `fk_funcion_pelicula1` FOREIGN KEY (`pelicula_id`) REFERENCES `pelicula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_funcion_sala1` FOREIGN KEY (`sala_id`) REFERENCES `sala` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_pelicula_formato1` FOREIGN KEY (`formato_id`) REFERENCES `formato` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelicula_genero1` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelicula_idioma1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelicula_rating1` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_nivel_usuario1` FOREIGN KEY (`nivel_usuario_id`) REFERENCES `nivel_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
