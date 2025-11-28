-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2025 at 05:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fix_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `edificio`
--

CREATE TABLE `edificio` (
  `idEdificio` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `idUsuario` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `edificio`
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
-- Table structure for table `seguimiento`
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
-- Dumping data for table `seguimiento`
--

INSERT INTO `seguimiento` (`idSeguimiento`, `idTecnico`, `idTicket`, `bitacora`, `fecha`, `img`) VALUES
(1, 7, 11, 'Asignado el T?cnico', '2025-10-13 00:00:00', ''),
(2, 8, 12, 'Asignado el T?cnico', '2025-10-13 00:00:00', ''),
(3, 10, 14, 'Asignado el T?cnico', '2025-10-13 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `servicios`
--

CREATE TABLE `servicios` (
  `idServicios` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicios`
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
-- Table structure for table `ticket`
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
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `idUsuario`, `idEdificio`, `fecha`, `idServicio`, `area`, `problematica`, `estado`, `img`) VALUES
(1, 1, 2, '2025-10-12', 1, 'Ba?o Hombres - P1', 'Sanitario del primer piso no deja de gotear, desperdicio de agua.', 'Abierto', ''),
(2, 10, 5, '2025-10-12', 1, 'Cocina Cafeter?a', 'Fuga de agua considerable debajo del lavaplatos industrial.', 'Abierto', ''),
(3, 11, 1, '2025-10-13', 1, 'Ba?o Mujeres - P3', 'El lavabo del tercer piso est? obstruido, el agua no drena.', 'Abierto', ''),
(4, 12, 7, '2025-10-13', 1, 'Laboratorio Biolog?a', 'La llave de agua de una estaci?n de trabajo no cierra completamente.', 'Abierto', ''),
(5, 1, 3, '2025-10-13', 1, 'Ba?o Personal', 'Hay un mal olor persistente, probablemente un problema en el drenaje.', 'Abierto', ''),
(6, 10, 8, '2025-10-14', 1, 'Area de Jard?n', 'Un aspersor de riego autom?tico est? roto y roc?a agua al pasillo.', 'Proceso', ''),
(7, 11, 4, '2025-10-14', 2, 'Aula 205', 'Foco de luz parpadea constantemente, genera distracci?n y fatiga visual.', 'Proceso', ''),
(8, 12, 6, '2025-10-14', 2, 'Pasillo Principal', 'Tres luminarias del pasillo principal est?n fundidas, baja visibilidad.', 'Proceso', ''),
(9, 1, 9, '2025-10-15', 2, 'Gimnasio', 'El contacto de pared cerca de la cancha est? quemado y no funciona.', 'Proceso', ''),
(10, 10, 2, '2025-10-15', 2, 'Sala de Maestros', 'El aire acondicionado no enciende. Revisar el circuito o breaker.', 'Proceso', ''),
(11, 11, 5, '2025-10-15', 2, 'Sal?n de Actos', 'Se fue la luz en toda la zona del escenario durante una presentaci?n.', 'Proceso', ''),
(12, 12, 1, '2025-10-16', 2, 'Cuarto de Servidores', 'El regulador de voltaje del rack est? emitiendo un sonido inusual.', 'Proceso', ''),
(13, 1, 3, '2025-10-16', 2, 'Biblioteca', 'La l?mpara de mesa del bibliotecario est? en cortocircuito.', 'Pendiente', ''),
(14, 10, 7, '2025-10-16', 3, 'Comedor', 'Restos de comida olvidados en varias mesas despu?s del almuerzo.', 'Proceso', ''),
(15, 11, 4, '2025-10-17', 3, 'Aula 101', 'El bote de basura est? desbordando, se necesita vaciar y desinfectar.', 'Pendiente', ''),
(16, 12, 8, '2025-10-17', 3, 'Pasillo P2', 'Hay un derrame de l?quido (posiblemente caf?) que no ha sido limpiado.', 'Completo', ''),
(17, 1, 6, '2025-10-17', 3, 'Ba?o Hombres - P2', 'Falta de jab?n de manos y papel higi?nico en los dispensadores.', 'Completo', ''),
(18, 10, 9, '2025-10-18', 3, 'Oficina Admisiones', 'El piso de la oficina est? pegajoso y no se limpi? bien ayer.', 'Completo', ''),
(19, 11, 2, '2025-10-18', 3, 'Vest?bulo Principal', 'Las ventanas del vest?bulo est?n muy sucias y empa?adas.', 'Completo', ''),
(20, 12, 5, '2025-10-18', 4, 'Laboratorio C?mputo', '10 equipos de c?mputo del lab. no tienen conexi?n a internet.', 'Completo', ''),
(21, 1, 1, '2025-10-19', 4, 'Aula 302', 'El proyector del aula no se enciende ni responde al control remoto.', 'Abierto', ''),
(22, 10, 3, '2025-10-19', 4, 'Oficina Direcci?n', 'La impresora de red est? marcando error y no se pueden imprimir documentos.', 'Abierto', ''),
(23, 11, 7, '2025-10-20', 4, 'Biblioteca', 'Necesito instalar software especializado (MATLAB) en 5 computadoras.', 'Abierto', ''),
(24, 12, 4, '2025-10-20', 4, 'Aula 201', 'El mouse de la computadora del profesor no funciona, es inal?mbrico.', 'Abierto', ''),
(25, 1, 6, '2025-10-20', 4, 'Sala de Conferencias', 'El sistema de audio y micr?fonos presenta fallas de est?tica.', 'Abierto', ''),
(26, 10, 8, '2025-10-21', 4, 'Oficina de Contabilidad', 'La pantalla de mi monitor est? presentando l?neas verdes intermitentes.', 'Proceso', ''),
(27, 11, 9, '2025-10-21', 4, 'Sala de Dise?o', 'Una licencia de software CAD ha expirado y no me deja trabajar.', 'Proceso', ''),
(28, 12, 2, '2025-10-21', 4, 'Aula 105', 'El cable HDMI del proyector est? da?ado y no se ve la imagen.', 'Proceso', ''),
(29, 1, 5, '2025-10-22', 4, 'Laboratorio Qu?mica', 'La computadora del profesor est? muy lenta, posible virus o falta de RAM.', 'Proceso', ''),
(30, 10, 1, '2025-10-22', 5, 'Patio Central', 'Un gran agujero en el asfalto del patio central, peligro de tropiezo.', 'Proceso', ''),
(31, 11, 3, '2025-10-23', 5, 'Aula 301', 'El techo falso tiene una mancha de humedad y comienza a caerse.', 'Pendiente', ''),
(32, 12, 7, '2025-10-23', 5, 'Pasillo P3', 'Varias losetas del piso est?n rotas y sueltas en el tercer piso.', 'Pendiente', ''),
(33, 1, 4, '2025-10-23', 5, 'Escalera Norte', 'Grieta grande en la pared de la escalera norte, se ve el exterior.', 'Pendiente', ''),
(34, 10, 6, '2025-10-24', 5, 'Cancha de F?tbol', 'La cerca perimetral est? rota en un sector, posible acceso no autorizado.', 'Pendiente', ''),
(35, 11, 8, '2025-10-24', 5, 'Zona de Estacionamiento', 'Se cay? un poste de luz del estacionamiento por fuertes vientos.', 'Pendiente', ''),
(36, 12, 2, '2025-10-24', 5, 'Puerta Acceso', 'La puerta principal del edificio 2 no cierra bien y se azota con el viento.', 'Completo', ''),
(37, 1, 5, '2025-10-25', 6, 'Acceso Principal', 'La c?mara de seguridad del acceso principal est? fuera de l?nea.', 'Completo', ''),
(38, 10, 9, '2025-10-25', 6, 'Almac?n General', 'El sensor de movimiento de la alarma del almac?n est? fallando.', 'Completo', ''),
(39, 11, 1, '2025-10-26', 6, 'Estacionamiento', 'Las luces de emergencia de la rampa de salida no encienden.', 'Completo', ''),
(40, 12, 3, '2025-10-26', 6, 'Salida de Emergencia', 'La barra antip?nico de la salida de emergencia est? trabada y no abre.', 'Completo', ''),
(41, 1, 7, '2025-10-26', 6, 'Oficina Tesorer?a', 'Se requiere revisi?n del sistema de videovigilancia de la caja fuerte.', 'Abierto', ''),
(42, 10, 4, '2025-10-27', 6, 'Pasillo P1', 'El extintor de incendios del primer piso tiene fecha de caducidad vencida.', 'Abierto', ''),
(43, 11, 6, '2025-10-27', 7, 'Aula 103', 'El picaporte de la puerta del sal?n est? flojo y se sale de su sitio.', 'Abierto', ''),
(44, 12, 8, '2025-10-28', 7, 'Sala de Juntas', 'Dos sillas de la sala de juntas est?n rotas, se necesita reemplazo.', 'Abierto', ''),
(45, 1, 9, '2025-10-28', 7, 'Comedor', 'Una mesa del comedor est? coja y se tambalea, dif?cil usarla.', 'Abierto', ''),
(46, 10, 2, '2025-10-28', 7, 'Oficina RH', 'Se necesita desarmar un escritorio modular y reubicarlo en otra oficina.', 'Proceso', ''),
(47, 11, 5, '2025-10-29', 7, 'Aula 207', 'La pizarra blanca tiene marcas permanentes que no se pueden borrar.', 'Proceso', ''),
(48, 12, 1, '2025-10-29', 7, 'Pasillo P3', 'Hay un trozo de vidrio roto en el suelo de un marco de fotos ca?do.', 'Proceso', ''),
(49, 1, 3, '2025-10-30', 7, 'Area de Descanso', 'La fuente de agua est? funcionando, pero el chorro es muy d?bil.', 'Proceso', ''),
(50, 10, 7, '2025-10-30', 7, 'Biblioteca', 'Se necesita reinstalar una repisa de libros que se desprendi? parcialmente.', 'Proceso', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apepat` varchar(50) NOT NULL,
  `apemat` varchar(50) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `rol` varchar(30) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apepat`, `apemat`, `correo`, `telefono`, `rol`, `user`, `password`, `img`) VALUES
(1, 'Dayana Magdiel', 'Custodio', 'Avalos', 'chatita20@fake.com', '55555555', 'Administrador', 'Day232', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(3, 'Jose Andres', 'Palma', 'Hernandez', 'andres@gmail.com', '4564468', 'Docente', 'Andy', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(7, 'Cesar', 'Adame', 'Contreras', 'cesar@gmai.com', '4546', 'Tecnico', 'cesar', '123', ''),
(8, 'Candy', 'Custodio', 'Avalos', 'candy123@gmail.com', '5464645', 'Tecnico', 'candy', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(9, 'Lau', 'Aguilar', 'Pineda', 'lau123@hotmail.com', '445456546', 'Administrador', 'lau', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(10, 'pedro', 'hernadez', 'custodio', 'pedro@fake.com', '5555555', 'Tecnico', 'pedro', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(11, 'Jose Andres', 'Palma', 'Hernandez', 'andres@gmail.com', '4564468', 'Docente', 'Andy', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(12, 'Jose Luis', 'Lara', 'Perez', 'lau123@hotmail.com', '445456546', 'Administrador', 'lau', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(13, 'pedro', 'hernadez', 'custodio', 'pedro@fake.com', '5555555', 'Tecnico', 'pedro', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg'),
(14, 'Juan', 'Palma', 'Hernandez', 'andres@gmail.com', '4564468', 'Docente', 'Andy', '123', 'C:\\Users\\erick\\OneDrive\\Escritorio\\gatito.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `edificio`
--
ALTER TABLE `edificio`
  ADD PRIMARY KEY (`idEdificio`),
  ADD KEY `IdUsuario` (`idUsuario`);

--
-- Indexes for table `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`idSeguimiento`);

--
-- Indexes for table `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idServicios`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `ticket_ibfk_1` (`idUsuario`),
  ADD KEY `ticket_ibfk_2` (`idEdificio`),
  ADD KEY `ticket_ibfk_3` (`idServicio`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `edificio`
--
ALTER TABLE `edificio`
  MODIFY `idEdificio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `idSeguimiento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idServicios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `edificio`
--
ALTER TABLE `edificio`
  ADD CONSTRAINT `IdUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`idEdificio`) REFERENCES `edificio` (`idEdificio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`idServicio`) REFERENCES `servicios` (`idServicios`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
