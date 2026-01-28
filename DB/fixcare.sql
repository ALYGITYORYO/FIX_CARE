-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-01-2026 a las 07:27:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `fix_care`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE `edificio` (
  `idEdificio` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `idUsuario` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`idEdificio`, `nombre`, `idUsuario`) VALUES
(1, 'Edificio A', 1),
(2, 'Edificio B', 1),
(3, 'Edificio C', 1),
(4, 'Edificio D', 1),
(5, 'Edificio E', 1),
(6, 'Rectoria', 1),
(7, 'Cafeteria', 1),
(8, 'Biblioteca', 1),
(9, 'Pesado I', 9),
(10, 'Sala Maestros', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `idSeguimiento` int(10) NOT NULL,
  `idTecnico` int(10) NOT NULL,
  `idTicket` int(10) NOT NULL,
  `bitacora` text NOT NULL,
  `fecha` datetime NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `idTecnico`, `idTicket`, `bitacora`, `fecha`, `img`) VALUES
(1, 7, 11, 'Asignado el T?cnico', '2025-10-13 00:00:00', ''),
(2, 8, 12, 'Asignado el T?cnico', '2025-10-13 00:00:00', ''),
(3, 10, 14, 'Asignado el T?cnico', '2025-10-13 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idServicios` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idServicios`, `nombre`) VALUES
(1, 'Plomeria'),
(2, 'Electricidad'),
(3, 'Limpieza/Sanitizaci?n'),
(4, 'Soporte T?cnico'),
(5, 'Infraestructura'),
(6, 'Seguridad'),
(7, 'Mant. General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idEdificio` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idServicio` int(10) NOT NULL,
  `area` varchar(250) NOT NULL,
  `problematica` text NOT NULL,
  `estado` varchar(50) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idTicket`, `idUsuario`, `idEdificio`, `fecha`, `idServicio`, `area`, `problematica`, `estado`, `img`) VALUES
(1, 1, 2, '2025-10-12', 1, 'Ba?o Hombres - P1', 'Sanitario del primer piso no deja de gotear, desperdicio de agua.', 'Abierto', ''),
(2, 10, 5, '2025-10-12', 1, 'Cocina Cafeter?a', 'Fuga de agua considerable debajo del lavaplatos industrial.', 'Abierto', ''),
(5, 1, 3, '2025-10-13', 1, 'Ba?o Personal', 'Hay un mal olor persistente, probablemente un problema en el drenaje.', 'Abierto', ''),
(6, 10, 8, '2025-10-14', 1, 'Area de Jard?n', 'Un aspersor de riego autom?tico est? roto y roc?a agua al pasillo.', 'Proceso', ''),
(9, 1, 9, '2025-10-15', 2, 'Gimnasio', 'El contacto de pared cerca de la cancha est? quemado y no funciona.', 'Proceso', ''),
(10, 10, 2, '2025-10-15', 2, 'Sala de Maestros', 'El aire acondicionado no enciende. Revisar el circuito o breaker.', 'Proceso', ''),
(13, 1, 3, '2025-10-16', 2, 'Biblioteca', 'La l?mpara de mesa del bibliotecario est? en cortocircuito.', 'Pendiente', ''),
(14, 10, 7, '2025-10-16', 3, 'Comedor', 'Restos de comida olvidados en varias mesas despu?s del almuerzo.', 'Proceso', ''),
(17, 1, 6, '2025-10-17', 3, 'Ba?o Hombres - P2', 'Falta de jab?n de manos y papel higi?nico en los dispensadores.', 'Completo', ''),
(18, 10, 9, '2025-10-18', 3, 'Oficina Admisiones', 'El piso de la oficina est? pegajoso y no se limpi? bien ayer.', 'Completo', ''),
(21, 1, 1, '2025-10-19', 4, 'Aula 302', 'El proyector del aula no se enciende ni responde al control remoto.', 'Abierto', ''),
(22, 10, 3, '2025-10-19', 4, 'Oficina Direcci?n', 'La impresora de red est? marcando error y no se pueden imprimir documentos.', 'Abierto', ''),
(25, 1, 6, '2025-10-20', 4, 'Sala de Conferencias', 'El sistema de audio y micr?fonos presenta fallas de est?tica.', 'Abierto', ''),
(26, 10, 8, '2025-10-21', 4, 'Oficina de Contabilidad', 'La pantalla de mi monitor est? presentando l?neas verdes intermitentes.', 'Proceso', ''),
(29, 1, 5, '2025-10-22', 4, 'Laboratorio Qu?mica', 'La computadora del profesor est? muy lenta, posible virus o falta de RAM.', 'Proceso', ''),
(30, 10, 1, '2025-10-22', 5, 'Patio Central', 'Un gran agujero en el asfalto del patio central, peligro de tropiezo.', 'Proceso', ''),
(33, 1, 4, '2025-10-23', 5, 'Escalera Norte', 'Grieta grande en la pared de la escalera norte, se ve el exterior.', 'Pendiente', ''),
(34, 10, 6, '2025-10-24', 5, 'Cancha de F?tbol', 'La cerca perimetral est? rota en un sector, posible acceso no autorizado.', 'Pendiente', ''),
(37, 1, 5, '2025-10-25', 6, 'Acceso Principal', 'La c?mara de seguridad del acceso principal est? fuera de l?nea.', 'Completo', ''),
(38, 10, 9, '2025-10-25', 6, 'Almac?n General', 'El sensor de movimiento de la alarma del almac?n est? fallando.', 'Completo', ''),
(41, 1, 7, '2025-10-26', 6, 'Oficina Tesorer?a', 'Se requiere revisi?n del sistema de videovigilancia de la caja fuerte.', 'Abierto', ''),
(42, 10, 4, '2025-10-27', 6, 'Pasillo P1', 'El extintor de incendios del primer piso tiene fecha de caducidad vencida.', 'Abierto', ''),
(45, 1, 9, '2025-10-28', 7, 'Comedor', 'Una mesa del comedor est? coja y se tambalea, dif?cil usarla.', 'Abierto', ''),
(46, 10, 2, '2025-10-28', 7, 'Oficina RH', 'Se necesita desarmar un escritorio modular y reubicarlo en otra oficina.', 'Proceso', ''),
(49, 1, 3, '2025-10-30', 7, 'Area de Descanso', 'La fuente de agua est? funcionando, pero el chorro es muy d?bil.', 'Proceso', ''),
(50, 10, 7, '2025-10-30', 7, 'Biblioteca', 'Se necesita reinstalar una repisa de libros que se desprendi? parcialmente.', 'Proceso', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `menu` text NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apepat` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `img` varchar(250) NOT NULL,
  `usuario_creado` datetime NOT NULL,
  `usuario_actualizado` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `rol`, `menu`, `nombre`, `apepat`, `correo`, `user`, `password`, `img`, `usuario_creado`, `usuario_actualizado`) VALUES
(1, 'ADMIN', '\"dashboard\",\"userNew\",\"userList\",\"userUpdate\",\"userSearch\",\"userPhoto\",\"logOut\"', 'Dayana Magdiel', 'Custodio', 'chatita20@fake.com', 'Day232', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', '', 'Cesar', 'Adame', 'cesar@gmai.com', 'cesar', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', '', 'Candy', 'Custodio', 'candy123@gmail.com', 'candy', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '', '', 'Lau', 'Aguilar', 'lau123@hotmail.com', 'lau', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '', '', 'pedro', 'hernadez', 'pedro@fake.com', 'pedro', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'ADMIN', '[     {         \n    \"ruta\": \"dashboard\",         \n    \"nombre\": \"Dashboard\",         \n    \"icono\": \"bi bi-tv\"     },     {         \n    \"ruta\": \"userNew\",         \n    \"nombre\": \"Nuevo Usuario\",         \n    \"icono\": \"bi bi-file-person-fill\"     },     {         \n    \"ruta\": \"userList\",         \n    \"nombre\": \"Lista de Usuarios\",         \n    \"icono\": \"bi bi-info-circle-fill\"     },     {         \n    \"ruta\": \"userUpdate\",         \n    \"nombre\": \"Editar Usuario\",         \n    \"icono\": \"bi bi-input-cursor-text\"     },     {         \n    \"ruta\": \"userSearch\",         \n    \"nombre\": \"Buscar Usuario\",         \n    \"icono\": \"bi bi-search\"     },     {         \n    \"ruta\": \"userPhoto\",         \n    \"nombre\": \"Foto de Perfil\",         \n    \"icono\": \"bi bi-image\"     },     {         \n    \"ruta\": \"logOut\"   } ]', 'andres', 'pedro', 'qwerty1234', 'Andy', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '2025-12-16 23:15:15', '2025-12-16 23:15:15'),
(17, '', '', 'ruby', 'snaldaña', '', 'ruby', '$2y$10$pKNeu7BdbZ0Zqqyj1tZshONEkukrnweqENLJD6aTl1bdUsyd0Ton6', '', '2025-12-16 23:16:09', '2025-12-16 23:16:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`idEdificio`),
  ADD KEY `IdUsuario` (`idUsuario`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`idSeguimiento`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicios`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `ticket_ibfk_1` (`idUsuario`),
  ADD KEY `ticket_ibfk_2` (`idEdificio`),
  ADD KEY `ticket_ibfk_3` (`idServicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `edificio`
--
ALTER TABLE `edificio`
  MODIFY `idEdificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `edificio`
--
ALTER TABLE `edificio`
  ADD CONSTRAINT `IdUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idEdificio`) REFERENCES `edificio` (`idEdificio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicios`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
