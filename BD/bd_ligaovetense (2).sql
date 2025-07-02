-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-07-2025 a las 01:24:44
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_ligaovetense`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_accesos`
--

DROP TABLE IF EXISTS `auditoria_accesos`;
CREATE TABLE IF NOT EXISTS `auditoria_accesos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idusuario` int DEFAULT NULL,
  `usuario` text NOT NULL,
  `ip_acceso` varchar(60) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `exito` varchar(20) NOT NULL,
  `mensaje` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=137 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auditoria_accesos`
--

INSERT INTO `auditoria_accesos` (`id`, `idusuario`, `usuario`, `ip_acceso`, `fecha_hora`, `exito`, `mensaje`) VALUES
(1, 15, 'lg@gmail.com', '127.0.0.1', '2025-05-13 20:16:45', 'EXITO', 'Inicio de sesiÃ³n exitoso'),
(2, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-05-16 22:12:07', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(3, 15, 'lg@gmail.com', '127.0.0.1', '2025-05-20 20:53:23', 'EXITO', 'INICIO DE SESION EXITOSO'),
(4, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-20 21:33:47', 'EXITO', 'INICIO DE SESION EXITOSO'),
(5, NULL, 'vbogado@gmail.com', '127.0.0.1', '2025-05-21 20:28:21', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(6, 13, 'vbogado@gmail.com', '127.0.0.1', '2025-05-21 20:28:29', 'EXITO', 'INICIO DE SESION EXITOSO'),
(7, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:05:43', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(8, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:05:58', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(9, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:06:11', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(10, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:06:42', 'EXITO', 'INICIO DE SESION EXITOSO'),
(11, NULL, 'juan@gmail.com', '127.0.0.1', '2025-05-22 01:07:52', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(12, NULL, 'juan@gmail.com', '127.0.0.1', '2025-05-22 01:07:58', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(13, NULL, 'juan@gmail.com', '127.0.0.1', '2025-05-22 01:08:15', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(14, NULL, 'sofia.scout@example.com', '127.0.0.1', '2025-05-22 01:08:47', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(15, 21, 'mb@gmail.com', '127.0.0.1', '2025-05-22 01:09:14', 'EXITO', 'INICIO DE SESION EXITOSO'),
(16, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:10:46', 'EXITO', 'INICIO DE SESION EXITOSO'),
(17, 25, 'gs@gmail.com', '127.0.0.1', '2025-05-22 01:11:55', 'EXITO', 'INICIO DE SESION EXITOSO'),
(18, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:15:00', 'EXITO', 'INICIO DE SESION EXITOSO'),
(19, 25, 'gs@gmail.com', '127.0.0.1', '2025-05-22 01:19:29', 'EXITO', 'INICIO DE SESION EXITOSO'),
(20, NULL, 'he@gmail.com', '127.0.0.1', '2025-05-22 17:14:49', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(21, 24, 'he@gmail.com', '127.0.0.1', '2025-05-22 17:15:21', 'EXITO', 'INICIO DE SESION EXITOSO'),
(22, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 17:42:12', 'EXITO', 'INICIO DE SESION EXITOSO'),
(23, 24, 'he@gmail.com', '127.0.0.1', '2025-05-22 18:10:26', 'EXITO', 'INICIO DE SESION EXITOSO'),
(24, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-22 19:58:55', 'EXITO', 'INICIO DE SESION EXITOSO'),
(25, NULL, 'japr@gmail.com', '127.0.0.1', '2025-05-23 00:11:11', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(26, NULL, 'japr@gmail.com', '127.0.0.1', '2025-05-23 00:11:32', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(27, NULL, 'japr@gmail.com', '127.0.0.1', '2025-05-23 00:11:43', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(28, 26, 'japr@gmail.com', '127.0.0.1', '2025-05-23 00:12:32', 'EXITO', 'INICIO DE SESION EXITOSO'),
(29, 25, 'gs@gmail.com', '127.0.0.1', '2025-05-23 00:19:33', 'EXITO', 'INICIO DE SESION EXITOSO'),
(30, 23, 'gd@gmail.com', '127.0.0.1', '2025-05-23 00:28:12', 'EXITO', 'INICIO DE SESION EXITOSO'),
(31, NULL, 'he@gmail.com', '127.0.0.1', '2025-05-23 12:24:58', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(32, 24, 'he@gmail.com', '127.0.0.1', '2025-05-23 12:25:25', 'EXITO', 'INICIO DE SESION EXITOSO'),
(33, 24, 'he@gmail.com', '127.0.0.1', '2025-05-23 12:40:34', 'EXITO', 'INICIO DE SESION EXITOSO'),
(34, 25, 'gs@gmail.com', '127.0.0.1', '2025-05-27 00:25:24', 'EXITO', 'INICIO DE SESION EXITOSO'),
(35, 23, 'gd@gmail.com', '127.0.0.1', '2025-05-27 00:26:02', 'EXITO', 'INICIO DE SESION EXITOSO'),
(36, 25, 'gs@gmail.com', '127.0.0.1', '2025-05-28 00:26:03', 'EXITO', 'INICIO DE SESION EXITOSO'),
(37, 1, 'lilian@gmail.com', '127.0.0.1', '2025-05-28 00:34:32', 'EXITO', 'INICIO DE SESION EXITOSO'),
(38, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-06-01 02:57:46', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(39, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-01 02:58:04', 'EXITO', 'INICIO DE SESION EXITOSO'),
(40, NULL, 'juan@gmail.com', '127.0.0.1', '2025-06-01 02:59:54', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(41, NULL, 'juan@gmail.com', '127.0.0.1', '2025-06-01 03:00:13', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(42, 21, 'mb@gmail.com', '127.0.0.1', '2025-06-01 03:00:49', 'EXITO', 'INICIO DE SESION EXITOSO'),
(43, 12, 'cc@gmail.com', '127.0.0.1', '2025-06-01 03:03:04', 'EXITO', 'INICIO DE SESION EXITOSO'),
(44, NULL, 'juan@gmail.com', '127.0.0.1', '2025-06-05 00:10:37', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(45, NULL, 'japr@gmail.com', '127.0.0.1', '2025-06-05 00:11:07', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(46, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 00:11:33', 'EXITO', 'INICIO DE SESION EXITOSO'),
(47, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 00:18:15', 'EXITO', 'INICIO DE SESION EXITOSO'),
(48, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 00:25:20', 'EXITO', 'INICIO DE SESION EXITOSO'),
(49, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:13:08', 'EXITO', 'INICIO DE SESION EXITOSO'),
(50, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 12:12:48', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(51, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 12:13:06', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(52, NULL, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 12:13:39', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(53, NULL, 'japr@gmail.com', '127.0.0.1', '2025-06-05 12:13:56', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(54, NULL, 'he@gmail.com', '127.0.0.1', '2025-06-05 12:40:28', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(55, NULL, 'he@gmail.com', '127.0.0.1', '2025-06-05 14:06:47', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(56, NULL, 'he@gmail.com', '127.0.0.1', '2025-06-05 14:07:06', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(57, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 14:07:58', 'EXITO', 'INICIO DE SESION EXITOSO'),
(58, NULL, 'he@gmail.com', '127.0.0.1', '2025-06-05 14:08:53', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(59, 24, 'he@gmail.com', '127.0.0.1', '2025-06-05 14:09:28', 'EXITO', 'INICIO DE SESION EXITOSO'),
(60, NULL, 'japr@gmail.com', '127.0.0.1', '2025-06-05 14:55:43', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(61, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 14:56:07', 'EXITO', 'INICIO DE SESION EXITOSO'),
(62, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 15:01:16', 'EXITO', 'INICIO DE SESION EXITOSO'),
(63, 24, 'he@gmail.com', '127.0.0.1', '2025-06-05 15:19:26', 'EXITO', 'INICIO DE SESION EXITOSO'),
(64, 25, 'gs@gmail.com', '127.0.0.1', '2025-06-05 15:23:00', 'EXITO', 'INICIO DE SESION EXITOSO'),
(65, NULL, 'japr@gmail.com', '127.0.0.1', '2025-06-05 15:26:12', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(66, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 15:26:27', 'EXITO', 'INICIO DE SESION EXITOSO'),
(67, 20, 'en@gmail.com', '127.0.0.1', '2025-06-05 15:27:19', 'EXITO', 'INICIO DE SESION EXITOSO'),
(68, NULL, 'jprz@gmail.com', '127.0.0.1', '2025-06-05 17:57:51', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(69, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 17:58:13', 'EXITO', 'INICIO DE SESION EXITOSO'),
(70, NULL, 'gd@gmail.com', '127.0.0.1', '2025-06-05 18:01:45', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(71, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 18:02:11', 'EXITO', 'INICIO DE SESION EXITOSO'),
(72, 24, 'he@gmail.com', '127.0.0.1', '2025-06-05 18:16:35', 'EXITO', 'INICIO DE SESION EXITOSO'),
(73, 25, 'gs@gmail.com', '127.0.0.1', '2025-06-05 18:20:09', 'EXITO', 'INICIO DE SESION EXITOSO'),
(74, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 18:22:40', 'EXITO', 'INICIO DE SESION EXITOSO'),
(75, 20, 'en@gmail.com', '127.0.0.1', '2025-06-05 18:23:19', 'EXITO', 'INICIO DE SESION EXITOSO'),
(76, NULL, 'jpar@gmail.com', '127.0.0.1', '2025-06-05 18:44:19', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(77, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 18:44:42', 'EXITO', 'INICIO DE SESION EXITOSO'),
(78, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 18:50:11', 'EXITO', 'INICIO DE SESION EXITOSO'),
(79, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 18:53:46', 'EXITO', 'INICIO DE SESION EXITOSO'),
(80, 25, 'gs@gmail.com', '127.0.0.1', '2025-06-05 18:56:27', 'EXITO', 'INICIO DE SESION EXITOSO'),
(81, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 18:59:48', 'EXITO', 'INICIO DE SESION EXITOSO'),
(82, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 19:00:56', 'EXITO', 'INICIO DE SESION EXITOSO'),
(83, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 19:07:16', 'EXITO', 'INICIO DE SESION EXITOSO'),
(84, 24, 'he@gmail.com', '127.0.0.1', '2025-06-05 19:59:34', 'EXITO', 'INICIO DE SESION EXITOSO'),
(85, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 20:15:56', 'EXITO', 'INICIO DE SESION EXITOSO'),
(86, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 21:06:13', 'EXITO', 'INICIO DE SESION EXITOSO'),
(87, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 21:07:40', 'EXITO', 'INICIO DE SESION EXITOSO'),
(88, 26, 'japr@gmail.com', '127.0.0.1', '2025-06-05 21:22:50', 'EXITO', 'INICIO DE SESION EXITOSO'),
(89, NULL, 'he@gmail.com', '127.0.0.1', '2025-06-05 21:32:48', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(90, 24, 'he@gmail.com', '127.0.0.1', '2025-06-05 21:33:07', 'EXITO', 'INICIO DE SESION EXITOSO'),
(91, 20, 'en@gmail.com', '127.0.0.1', '2025-06-05 21:34:21', 'EXITO', 'INICIO DE SESION EXITOSO'),
(92, 25, 'gs@gmail.com', '127.0.0.1', '2025-06-05 21:35:13', 'EXITO', 'INICIO DE SESION EXITOSO'),
(93, NULL, 'en@gmail.com', '127.0.0.1', '2025-06-05 22:12:38', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(94, NULL, 'he@gmail.com', '127.0.0.1', '2025-06-05 22:12:40', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(95, NULL, 'gs@gmail.com', '127.0.0.1', '2025-06-05 22:12:44', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(96, NULL, 'gd@gmail.com', '127.0.0.1', '2025-06-05 22:13:01', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(97, NULL, 'gd@gmail.com', '127.0.0.1', '2025-06-05 22:13:22', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(98, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-05 22:13:40', 'EXITO', 'INICIO DE SESION EXITOSO'),
(99, 24, 'he@gmail.com', '127.0.0.1', '2025-06-05 22:33:36', 'EXITO', 'INICIO DE SESION EXITOSO'),
(100, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-05 22:34:17', 'EXITO', 'INICIO DE SESION EXITOSO'),
(101, 24, 'he@gmail.com', '127.0.0.1', '2025-06-13 20:03:36', 'EXITO', 'INICIO DE SESION EXITOSO'),
(102, NULL, 'hr@gmail.com', '127.0.0.1', '2025-06-14 02:25:48', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(103, 28, 'hr@gmail.com', '127.0.0.1', '2025-06-14 02:26:47', 'EXITO', 'INICIO DE SESION EXITOSO'),
(104, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-14 02:34:40', 'EXITO', 'INICIO DE SESION EXITOSO'),
(105, 28, 'hr@gmail.com', '127.0.0.1', '2025-06-14 02:38:17', 'EXITO', 'INICIO DE SESION EXITOSO'),
(106, 20, 'en@gmail.com', '127.0.0.1', '2025-06-14 03:35:21', 'EXITO', 'INICIO DE SESION EXITOSO'),
(107, 25, 'gs@gmail.com', '127.0.0.1', '2025-06-14 04:37:48', 'EXITO', 'INICIO DE SESION EXITOSO'),
(108, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-14 04:38:39', 'EXITO', 'INICIO DE SESION EXITOSO'),
(109, NULL, 'eg@gmail.com', '127.0.0.1', '2025-06-14 04:43:26', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(110, NULL, 'eg@gmail.com', '127.0.0.1', '2025-06-14 04:44:33', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(111, 29, 'eg@gmail.com', '127.0.0.1', '2025-06-14 04:44:53', 'EXITO', 'INICIO DE SESION EXITOSO'),
(112, 23, 'gd@gmail.com', '127.0.0.1', '2025-06-14 04:50:50', 'EXITO', 'INICIO DE SESION EXITOSO'),
(113, 20, 'en@gmail.com', '127.0.0.1', '2025-06-14 05:25:39', 'EXITO', 'INICIO DE SESION EXITOSO'),
(114, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 02:43:21', 'EXITO', 'INICIO DE SESION EXITOSO'),
(115, NULL, 'nz@gmail.com', '127.0.0.1', '2025-06-21 02:47:40', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(116, 30, 'nz@gmail.com', '127.0.0.1', '2025-06-21 02:49:07', 'EXITO', 'INICIO DE SESION EXITOSO'),
(117, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 02:59:34', 'EXITO', 'INICIO DE SESION EXITOSO'),
(118, 30, 'nz@gmail.com', '127.0.0.1', '2025-06-21 03:00:31', 'EXITO', 'INICIO DE SESION EXITOSO'),
(119, 24, 'he@gmail.com', '127.0.0.1', '2025-06-21 03:03:02', 'EXITO', 'INICIO DE SESION EXITOSO'),
(120, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 03:17:08', 'EXITO', 'INICIO DE SESION EXITOSO'),
(121, 28, 'hr@gmail.com', '127.0.0.1', '2025-06-21 03:18:04', 'EXITO', 'INICIO DE SESION EXITOSO'),
(122, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 03:19:48', 'EXITO', 'INICIO DE SESION EXITOSO'),
(123, 28, 'hg@gmail.com', '127.0.0.1', '2025-06-21 03:21:33', 'EXITO', 'INICIO DE SESION EXITOSO'),
(124, 28, 'hg@gmail.com', '127.0.0.1', '2025-06-21 03:38:20', 'EXITO', 'INICIO DE SESION EXITOSO'),
(125, 28, 'hg@gmail.com', '127.0.0.1', '2025-06-21 03:49:06', 'EXITO', 'INICIO DE SESION EXITOSO'),
(126, 28, 'hg@gmail.com', '127.0.0.1', '2025-06-21 12:40:14', 'EXITO', 'INICIO DE SESION EXITOSO'),
(127, NULL, 'hr@gmail.com', '127.0.0.1', '2025-06-21 12:51:40', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(128, 28, 'hg@gmail.com', '127.0.0.1', '2025-06-21 12:52:15', 'EXITO', 'INICIO DE SESION EXITOSO'),
(129, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 12:54:30', 'EXITO', 'INICIO DE SESION EXITOSO'),
(130, NULL, 'eg@gmail.com', '127.0.0.1', '2025-06-21 12:56:15', 'FALLIDO', 'CREDENCIALES INVALIDAS'),
(131, 29, 'eg@gmail.com', '127.0.0.1', '2025-06-21 12:57:30', 'EXITO', 'INICIO DE SESION EXITOSO'),
(132, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 12:59:35', 'EXITO', 'INICIO DE SESION EXITOSO'),
(133, 1, 'lilian@gmail.com', '127.0.0.1', '2025-06-21 13:03:37', 'EXITO', 'INICIO DE SESION EXITOSO'),
(134, 25, 'gg@gmail.com', '127.0.0.1', '2025-06-21 13:04:49', 'EXITO', 'INICIO DE SESION EXITOSO'),
(135, 25, 'gg@gmail.com', '127.0.0.1', '2025-06-21 13:05:18', 'EXITO', 'INICIO DE SESION EXITOSO'),
(136, 25, 'gg@gmail.com', '127.0.0.1', '2025-06-21 13:06:07', 'EXITO', 'INICIO DE SESION EXITOSO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_fichajes`
--

DROP TABLE IF EXISTS `auditoria_fichajes`;
CREATE TABLE IF NOT EXISTS `auditoria_fichajes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idfichaje` int NOT NULL,
  `accion` varchar(30) NOT NULL,
  `usuario_sistema` text NOT NULL,
  `ip_acceso` text NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auditoria_fichajes`
--

INSERT INTO `auditoria_fichajes` (`id`, `idfichaje`, `accion`, `usuario_sistema`, `ip_acceso`, `fecha_hora`, `descripcion`) VALUES
(1, 6, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 19:17:25', 'FICHAJE REGISTRADO:\nJugador: PEDRO RAMOA (CI: 101010), Fecha Nac: 1995-05-01, Nacionalidad: PARAGUAYO, Tel: 0984339091\nFichaje: Fecha: 2025-05-01, DescripciÃ³n: FICHAJE DE PRUEBA, Tipo: FICHAJE POR TRANSFERENCIA, DuraciÃ³n: 1 meses\nClub Origen: 1, Club Destino: 2\nCosto: 500000, Salario: 2000000, ClÃ¡usula: 8000000\nEstado Fichaje: EN CURSO, ObservaciÃ³n: NINGUNA'),
(2, 6, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 19:27:31', 'FICHAJE DADO DE BAJA:\nJugador: PEDRO RAMOA (CI: 101010),\nFecha: 2025-05-01, DescripciÃ³n: FICHAJE DE PRUEBA,\nClub Origen: CLUB GUARANÃ­, Club Destino: CLUB SOCIAL Y DEPORTIVO GALICIA,\nTipo: FICHAJE POR TRANSFERENCIA, DuraciÃ³n Contrato: 1,\nCosto Transferencia: 500000, Salario Anual: 2000000,\nClÃ¡usula RescisiÃ³n: 8000000, ObservaciÃ³n: NINGUNA.'),
(3, 6, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 19:34:53', 'FICHAJE DADO DE BAJA:\nJugador: PEDRO RAMOA (CI: 101010),\nFecha: 2025-05-01, DescripciÃ³n: FICHAJE DE PRUEBA,\nClub Origen: CLUB GUARANÃ­, Club Destino: CLUB SOCIAL Y DEPORTIVO GALICIA,\nTipo: FICHAJE POR TRANSFERENCIA, DuraciÃ³n Contrato en meses: 1,\nCosto Transferencia: 500000, Salario Anual: 2000000,\nClÃ¡usula RescisiÃ³n: 8000000, ObservaciÃ³n: NINGUNA.'),
(4, 6, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 19:37:30', 'FICHAJE DADO DE BAJA:\nJugador: PEDRO RAMOA (CI: 101010),\nFecha: 2025-05-01, DescripciÃ³n: FICHAJE DE PRUEBA,\nClub Origen: CLUB GUARANÃ­, Club Destino: CLUB SOCIAL Y DEPORTIVO GALICIA,\nTipo: FICHAJE POR TRANSFERENCIA, DuraciÃ³n Contrato en meses: 1,\nCosto Transferencia: 500000, Salario Anual: 2000000,\nClÃ¡usula RescisiÃ³n: 8000000, ObservaciÃ³n: NINGUNA.'),
(5, 7, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 19:39:15', 'FICHAJE REGISTRADO:\nJugador: EZEQUIEL PEREIRA (CI: 888888), Fecha Nac: 1995-05-20, Nacionalidad: PARAGUAYO, Tel: 08312431\nFichaje: Fecha: 2025-05-02, DescripciÃ³n: REALIZANDO PRUEBAS2, Tipo: FICHAJE DE REFORZAMIENTO TEMPORAL, DuraciÃ³n: 1 meses\nClub Origen: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA, Club Destino: 1 - CLUB GUARANÃ­\nCosto: 500000, Salario: 500000, ClÃ¡usula: 1000000\nEstado Fichaje: EN CURSO, ObservaciÃ³n: NINGUNA'),
(6, 8, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 20:25:13', 'FICHAJE REGISTRADO:\nJugador: ABC BCZ (CI: 11111), Fecha Nac: 1995-11-24, Nacionalidad: PARAGUAYO, Tel: 111111\nFichaje: Fecha: 2025-05-21, DescripciÃ³n: PRESTAMO, Tipo: FICHAJE POR TRANSFERENCIA, DuraciÃ³n: 1 meses\nClub Origen: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 500000, Salario: 6000000, ClÃ¡usula: 8000000\nEstado Fichaje: EN CURSO, ObservaciÃ³n: NO'),
(7, 9, 'INSERTAR', 'vbogado@gmail.com', '127.0.0.1', '2025-05-21 20:30:01', 'FICHAJE REGISTRADO:\nJugador: DIEGO ARMOE (CI: 222), Fecha Nac: 1990-05-12, Nacionalidad: PARAGUAYO, Tel: 08312431\nFichaje: Fecha: 2025-05-21, DescripciÃ³n: TRANSFERENCIA, Tipo: FICHAJE POR TRANSFERENCIA, DuraciÃ³n: 2 meses\nClub Origen: 4 - CLUB 1Âº DE MAYO, Club Destino: 1 - CLUB GUARANÃ­\nCosto: 250000, Salario: 1000000, ClÃ¡usula: 2000000\nEstado Fichaje: EN CURSO, ObservaciÃ³n: NP'),
(8, 14, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 18:53:28', 'FICHAJE REGISTRADO:\nJugador: DIEGO MARTíNEZ (CI: 555), Fecha Nac: 1995-06-19, Nacionalidad: PARAGUAYA, Tel: 0971222222\nFichaje: Fecha: 2025-05-22, Descripción: TRANSFERENCIA, Tipo: FICHAJE POR TRANSFERENCIA, Duración: 10 meses\nClub Origen: 13 - CLUB GENERAL DIAZ, Club Destino: 12 - CLUB 15 DE MAYO\nCosto: 15.000.000, Salario: 50.000.000, Cláusula: 1500000\nEstado Fichaje: EN CURSO, Observación: '),
(9, 15, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-05-23 09:14:49', 'FICHAJE REGISTRADO:\nJugador: KYLIAN MBAPPE (CI: 4579088), Fecha Nac: 2007-03-23, Nacionalidad: PARAGUAYA, Tel: 0971009977\nFichaje: Fecha: 2025-05-21, Descripción: PRESTAMO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 12 meses\nClub Origen: 4 - CLUB 1º DE MAYO, Club Destino: 1 - CLUB GUARANI\nCosto: 6000000, Salario: 5000000, Cláusula: 1000000\nEstado Fichaje: EN CURSO, Observación: '),
(10, 16, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 01:02:20', 'FICHAJE REGISTRADO:\nJugador: ULICES RODRIGUEZ (CI: 4579001), Fecha Nac: 2008-06-10, Nacionalidad: PARAGUAYA, Tel: 0991223344\nFichaje: Fecha: 2025-06-03, Descripción: PRESTAMO, Tipo: FICHAJE POR TRANSFERENCIA, Duración: 12 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 5000000, Salario: 7000000, Cláusula: 7000000\nEstado Fichaje: EN CURSO, Observación: '),
(11, 17, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:16:04', 'FICHAJE REGISTRADO:\nJugador: ALFREDO GOMEZ (CI: 4579002), Fecha Nac: 2009-11-11, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 4 - CLUB 1º DE MAYO, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 5000000, Salario: 4500000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(12, 18, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:17:38', 'FICHAJE REGISTRADO:\nJugador: DERLYS VERA (CI: 4579003), Fecha Nac: 2007-02-05, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE POR TRANSFERENCIA, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 7000000, Salario: 6000000, Cláusula: 150000000\nEstado Fichaje: EN CURSO, Observación: '),
(13, 19, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:19:26', 'FICHAJE REGISTRADO:\nJugador: DOMINGO GUZMAN (CI: 4579004), Fecha Nac: 2006-07-29, Nacionalidad: PARAGUAYA, Tel: 0973211993\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE POR TRANSFERENCIA, Duración: 60 meses\nClub Origen: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 4000000, Salario: 3000000, Cláusula: 10000000\nEstado Fichaje: EN CURSO, Observación: '),
(14, 20, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:20:46', 'FICHAJE REGISTRADO:\nJugador: CARLOS CABRERA (CI: 4579005), Fecha Nac: 2009-06-09, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 8 - CLUB CERRO PORTEÑO, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 4000000, Salario: 5000000, Cláusula: 10000000\nEstado Fichaje: EN CURSO, Observación: '),
(15, 21, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:22:18', 'FICHAJE REGISTRADO:\nJugador: ROBERT ESCOBAR (CI: 4579006), Fecha Nac: 2007-06-12, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: PRESTAMO, Tipo: FICHAJE POR TRANSFERENCIA, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 4000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(16, 22, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:23:46', 'FICHAJE REGISTRADO:\nJugador: JORGE BRITEZ (CI: 4579007), Fecha Nac: 2007-06-05, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: PRESTAMO, Tipo: FICHAJE POR TRANSFERENCIA, Duración: 60 meses\nClub Origen: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 5000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(17, 23, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:25:08', 'FICHAJE REGISTRADO:\nJugador: JORGE BENITEZ (CI: 4579008), Fecha Nac: 2008-11-05, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 7000000, Salario: 6000000, Cláusula: 10000000\nEstado Fichaje: EN CURSO, Observación: '),
(18, 24, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:27:41', 'FICHAJE REGISTRADO:\nJugador: MOISES BENITEZ (CI: 4579009), Fecha Nac: 2009-03-04, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 5000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(19, 25, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:29:32', 'FICHAJE REGISTRADO:\nJugador: SERGIO FRUTOS (CI: 4579010), Fecha Nac: 2008-08-08, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 4000000, Salario: 5000000, Cláusula: 5000000\nEstado Fichaje: EN CURSO, Observación: '),
(20, 26, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:31:21', 'FICHAJE REGISTRADO:\nJugador: LUIS GAUTO (CI: 4579011), Fecha Nac: 2007-05-06, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 8 - CLUB CERRO PORTEÑO, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 4000000, Salario: 4500000, Cláusula: 5000000\nEstado Fichaje: EN CURSO, Observación: '),
(21, 27, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:32:23', 'FICHAJE REGISTRADO:\nJugador: MIGUEL ORTIZ (CI: 4579012), Fecha Nac: 2007-11-14, Nacionalidad: PARAGUAYA, Tel: 0981222337\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 8 - CLUB CERRO PORTEÑO, Club Destino: 4 - CLUB 1º DE MAYO\nCosto: 5000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(22, 28, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:38:36', 'FICHAJE REGISTRADO:\nJugador: JULIO VILLAVERDE (CI: 4579013), Fecha Nac: 2008-11-05, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 11 - CLUB LIBERTAD, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 4000000, Salario: 4500000, Cláusula: 5000000\nEstado Fichaje: EN CURSO, Observación: '),
(23, 29, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:39:55', 'FICHAJE REGISTRADO:\nJugador: RAUL GONZALEZ (CI: 4579014), Fecha Nac: 2007-12-13, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 12 - CLUB 15 DE MAYO, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 4000000, Salario: 6000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(24, 30, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:41:23', 'FICHAJE REGISTRADO:\nJugador: REYNALDO RIVAS (CI: 4579015), Fecha Nac: 2007-01-05, Nacionalidad: PARAGUAYA, Tel: 0973211993\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 12 - CLUB 15 DE MAYO, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 5000000, Salario: 4500000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(25, 31, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:42:19', 'FICHAJE REGISTRADO:\nJugador: VICTOR BARRERA (CI: 4579016), Fecha Nac: 2007-08-16, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 12 - CLUB 15 DE MAYO, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 5000000, Salario: 3000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(26, 32, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:44:33', 'FICHAJE REGISTRADO:\nJugador: JOSE BENITEZ (CI: 4579017), Fecha Nac: 2009-06-17, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 3 - CLUB 8 DE DICIEMBRE, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 7000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(27, 33, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:46:05', 'FICHAJE REGISTRADO:\nJugador: ELIAS FRUTOS (CI: 4579018), Fecha Nac: 2009-11-19, Nacionalidad: PARAGUAYA, Tel: 0981222337\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 8 - CLUB CERRO PORTEÑO, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 4000000, Salario: 3000000, Cláusula: 5000000\nEstado Fichaje: EN CURSO, Observación: '),
(28, 34, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:47:32', 'FICHAJE REGISTRADO:\nJugador: SANTIAGO RIVAS (CI: 4579019), Fecha Nac: 2008-07-16, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 5000000, Salario: 6000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(29, 35, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:48:35', 'FICHAJE REGISTRADO:\nJugador: CARLOS GALVAN (CI: 4579020), Fecha Nac: 2008-10-07, Nacionalidad: PARAGUAYA, Tel: 0992112200\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 8 - CLUB CERRO PORTEÑO, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 7000000, Salario: 6000000, Cláusula: 150000000\nEstado Fichaje: EN CURSO, Observación: '),
(30, 36, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:49:45', 'FICHAJE REGISTRADO:\nJugador: MATHIAS BRITEZ (CI: 4579021), Fecha Nac: 2010-02-09, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 5000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(31, 37, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:51:04', 'FICHAJE REGISTRADO:\nJugador: RICARDO JARA (CI: 4579022), Fecha Nac: 2007-01-30, Nacionalidad: PARAGUAYA, Tel: 0973211993\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 4000000, Salario: 5000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(32, 38, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:53:09', 'FICHAJE REGISTRADO:\nJugador: KEVIN BARRERA (CI: 4579023), Fecha Nac: 2008-10-15, Nacionalidad: PARAGUAYA, Tel: 0973211223\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 3 - CLUB 8 DE DICIEMBRE, Club Destino: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nCosto: 5000000, Salario: 4500000, Cláusula: 5000000\nEstado Fichaje: EN CURSO, Observación: '),
(33, 39, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:54:42', 'FICHAJE REGISTRADO:\nJugador: RONY MEDINA (CI: 4579024), Fecha Nac: 2008-01-08, Nacionalidad: PARAGUAYA, Tel: 0992112200\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 5000000, Salario: 4500000, Cláusula: 10000000\nEstado Fichaje: EN CURSO, Observación: '),
(34, 40, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:55:56', 'FICHAJE REGISTRADO:\nJugador: DERLIS LOPEZ (CI: 4579025), Fecha Nac: 2008-01-29, Nacionalidad: PARAGUAYA, Tel: 0973211993\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 12 - CLUB 15 DE MAYO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 5000000, Salario: 6000000, Cláusula: 8000000\nEstado Fichaje: EN CURSO, Observación: '),
(35, 41, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:57:02', 'FICHAJE REGISTRADO:\nJugador: RODRIGO RIOS (CI: 4579026), Fecha Nac: 2008-05-05, Nacionalidad: PARAGUAYA, Tel: 0992112200\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 60 meses\nClub Origen: 10 - CLUB SOCIAL Y DEPORTIVO CORONEL OVIEDO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 4000000, Salario: 5000000, Cláusula: 10000000\nEstado Fichaje: EN CURSO, Observación: '),
(36, 42, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 11:58:49', 'FICHAJE REGISTRADO:\nJugador: RICARDO BLANCO (CI: 4579027), Fecha Nac: 2008-11-13, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 13 - CLUB GENERAL DIAZ, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 1000000, Salario: 2000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(37, 43, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:00:15', 'FICHAJE REGISTRADO:\nJugador: HUGO CABALLERO (CI: 4579028), Fecha Nac: 2008-08-14, Nacionalidad: PARAGUAYA, Tel: 0973211993\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 48 meses\nClub Origen: 10 - CLUB SOCIAL Y DEPORTIVO CORONEL OVIEDO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 1000000, Salario: 2000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(38, 44, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:01:38', 'FICHAJE REGISTRADO:\nJugador: ALEXANDER BAEZ (CI: 4579029), Fecha Nac: 2009-10-13, Nacionalidad: PARAGUAYA, Tel: 0973211993\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 3000000, Salario: 2500000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(39, 45, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:02:34', 'FICHAJE REGISTRADO:\nJugador: CRISTIAN MARTINEZ (CI: 4579030), Fecha Nac: 2006-10-23, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 4 - CLUB 1º DE MAYO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 3000000, Salario: 2000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(40, 46, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:03:33', 'FICHAJE REGISTRADO:\nJugador: NESTOR GIMENEZ (CI: 4579031), Fecha Nac: 2007-06-27, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 8 - CLUB CERRO PORTEÑO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 3000000, Salario: 3000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(41, 47, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:04:24', 'FICHAJE REGISTRADO:\nJugador: ESTEBAN SAMUDIO (CI: 4579032), Fecha Nac: 2008-06-10, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 12 meses\nClub Origen: 1 - CLUB GUARANI, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 3000000, Salario: 2000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(42, 48, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:05:25', 'FICHAJE REGISTRADO:\nJugador: DIEGO SANABRIA (CI: 4579033), Fecha Nac: 2008-11-13, Nacionalidad: PARAGUAYA, Tel: 0992112233\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 12 meses\nClub Origen: 13 - CLUB GENERAL DIAZ, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 3000000, Salario: 2000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(43, 49, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:06:30', 'FICHAJE REGISTRADO:\nJugador: RUBEN FLORENTIN (CI: 4579034), Fecha Nac: 2006-06-13, Nacionalidad: PARAGUAYA, Tel: 0992962697\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 12 - CLUB 15 DE MAYO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 1000000, Salario: 2000000, Cláusula: 3500000\nEstado Fichaje: EN CURSO, Observación: '),
(44, 50, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 15:08:30', 'FICHAJE REGISTRADO:\nJugador: LUIS GAYOSO (CI: 4579036), Fecha Nac: 2007-11-15, Nacionalidad: PARAGUAYA, Tel: 0991345577\nFichaje: Fecha: 2025-06-05, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 4 - CLUB 1º DE MAYO, Club Destino: 3 - CLUB 8 DE DICIEMBRE\nCosto: 4500000, Salario: 4000000, Cláusula: 7500000\nEstado Fichaje: EN CURSO, Observación: '),
(45, 51, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 18:08:04', 'FICHAJE REGISTRADO:\nJugador: LUIS CARDOZO (CI: 4579038), Fecha Nac: 2006-06-06, Nacionalidad: PARAGUAYA, Tel: 0974321199\nFichaje: Fecha: 2025-06-03, Descripción: CONTRATO, Tipo: FICHAJE DE JUGADOR NUEVO, Duración: 24 meses\nClub Origen: 12 - CLUB 15 DE MAYO, Club Destino: 1 - CLUB GUARANI\nCosto: 4500000, Salario: 4000000, Cláusula: 5000000\nEstado Fichaje: EN CURSO, Observación: ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_historiales`
--

DROP TABLE IF EXISTS `auditoria_historiales`;
CREATE TABLE IF NOT EXISTS `auditoria_historiales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idhistorial` int NOT NULL,
  `accion` varchar(30) NOT NULL,
  `usuario_sistema` varchar(100) NOT NULL,
  `ip_acceso` text NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auditoria_historiales`
--

INSERT INTO `auditoria_historiales` (`id`, `idhistorial`, `accion`, `usuario_sistema`, `ip_acceso`, `fecha_hora`, `descripcion`) VALUES
(1, 10, 'INSERTAR', 'lilian@gmail.com', '::1', '2025-05-01 16:49:44', 'Se insertÃ³ un nuevo historial futbolÃ­stico para el jugador ID 1 con fecha 2025-05-13'),
(2, 10, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 17:30:36', 'HISTORIAL DADO DE BAJA:\nID Jugador: 1, Fecha: 2025-05-13, Partidos Jugados: 1, Goles: 2,\nAsistencias: 1, Tarjetas Amarillas: 1, Tarjetas Rojas: 0,\nMinutos Jugados: 35, Pases Completados: 8,\nFaltas Cometidas: 1, Atajadas: 0'),
(3, 11, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 20:13:04', 'Se insertÃ³ un nuevo historial futbolÃ­stico para el jugador ID 6 (EZEQUIEL PEREIRA) con fecha 2025-05-20'),
(4, 12, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 20:16:17', 'Se insertÃ³ un nuevo historial futbolÃ­stico para el jugador ID 6 (EZEQUIEL PEREIRA) con fecha 2025-05-21.\nPartidos Jugados: 2, Goles: 2, Asistencias: 3, Tarjetas Amarillas: 0, Tarjetas Rojas: 0, Minutos Jugados: 10, Pases Completados: 1, Faltas Cometidas: 2, Atajadas: 0.'),
(5, 12, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 20:18:24', 'HISTORIAL DADO DE BAJA:\nID Jugador: 6 (EZEQUIEL PEREIRA), Fecha: 2025-05-21, Partidos Jugados: 2, Goles: 2,\nAsistencias: 3, Tarjetas Amarillas: 0, Tarjetas Rojas: 0,\nMinutos Jugados: 10, Pases Completados: 1,\nFaltas Cometidas: 2, Atajadas: 0'),
(6, 18, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 20:10:04', 'Se insertó un nuevo historial futbolístico para el jugador ID 10 (GUSTAVO SOLIS) con fecha 2024-05-20.\nPartidos Jugados: 2, Goles: 1, Asistencias: 1, Tarjetas Amarillas: 1, Tarjetas Rojas: 1, Minutos Jugados: 10, Pases Completados: 1, Faltas Cometidas: 1, Atajadas: 0.'),
(7, 19, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-05-23 09:18:56', 'Se insertó un nuevo historial futbolístico para el jugador ID 14 (KYLIAN MBAPPE) con fecha 2025-05-21.\nPartidos Jugados: 11, Goles: 20, Asistencias: 9, Tarjetas Amarillas: 2, Tarjetas Rojas: 0, Minutos Jugados: 890, Pases Completados: 21, Faltas Cometidas: 6, Atajadas: 0.'),
(8, 20, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-05-23 09:20:39', 'Se insertó un nuevo historial futbolístico para el jugador ID 14 (KYLIAN MBAPPE) con fecha 2024-05-22.\nPartidos Jugados: 9, Goles: 15, Asistencias: 8, Tarjetas Amarillas: 7, Tarjetas Rojas: 1, Minutos Jugados: 800, Pases Completados: 12, Faltas Cometidas: 5, Atajadas: 0.'),
(9, 21, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-04 18:24:46', 'Se insertó un nuevo historial futbolístico para el jugador ID 10 (GUSTAVO SOLIS) con fecha 2025-06-04.\nPartidos Jugados: 1, Goles: 1, Asistencias: 1, Tarjetas Amarillas: 1, Tarjetas Rojas: 1, Minutos Jugados: 1, Pases Completados: 1, Faltas Cometidas: 1, Atajadas: 1.'),
(10, 22, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-04 18:37:46', 'Se insertó un nuevo historial futbolístico para el jugador ID  (Desconocido) con fecha 2024-05-06.\nPartidos Jugados: 1, Goles: 1, Asistencias: 1, Tarjetas Amarillas: 1, Tarjetas Rojas: 1, Minutos Jugados: 1, Pases Completados: 1, Faltas Cometidas: 1, Atajadas: 1.'),
(11, 23, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-04 18:40:39', 'Se insertó un nuevo historial futbolístico para el jugador ID 10 (GUSTAVO SOLIS) con fecha 2024-01-01.\nPartidos Jugados: 1, Goles: 1, Asistencias: 1, Tarjetas Amarillas: 1, Tarjetas Rojas: 1, Minutos Jugados: 1, Pases Completados: 1, Faltas Cometidas: 1, Atajadas: 1.'),
(12, 24, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-05 00:16:08', 'Se insertó un nuevo historial futbolístico para el jugador ID  (Desconocido) con fecha 2025-06-04.\nPartidos Jugados: 12, Goles: 21, Asistencias: 12, Tarjetas Amarillas: 21, Tarjetas Rojas: 2, Minutos Jugados: 1, Pases Completados: 1, Faltas Cometidas: 2, Atajadas: 2.'),
(13, 25, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:17:24', 'Se insertó un nuevo historial futbolístico para el jugador ID 43 (ALEXANDER BAEZ) con fecha 2025-06-03.\nPartidos Jugados: 9, Goles: 12, Asistencias: 5, Tarjetas Amarillas: 4, Tarjetas Rojas: 0, Minutos Jugados: 888, Pases Completados: 53, Faltas Cometidas: 25, Atajadas: 0.'),
(14, 26, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:21:36', 'Se insertó un nuevo historial futbolístico para el jugador ID 16 (ALFREDO GOMEZ) con fecha 2025-06-03.\nPartidos Jugados: 11, Goles: 888, Asistencias: 0, Tarjetas Amarillas: 5, Tarjetas Rojas: 0, Minutos Jugados: 888, Pases Completados: 10, Faltas Cometidas: 4, Atajadas: 30.'),
(15, 27, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 12:31:23', 'Se insertó un nuevo historial futbolístico para el jugador ID 34 (CARLOS GALVAN) con fecha 2025-06-03.\nPartidos Jugados: 8, Goles: 9, Asistencias: 14, Tarjetas Amarillas: 7, Tarjetas Rojas: 2, Minutos Jugados: 777, Pases Completados: 56, Faltas Cometidas: 18, Atajadas: 0.'),
(16, 28, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:04:43', 'Se insertó un nuevo historial futbolístico para el jugador ID 34 (CARLOS GALVAN) con fecha 2024-06-05.\nPartidos Jugados: 9, Goles: 788, Asistencias: 9, Tarjetas Amarillas: 7, Tarjetas Rojas: 2, Minutos Jugados: 770, Pases Completados: 43, Faltas Cometidas: 22, Atajadas: 0.'),
(17, 29, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:27:05', 'Se insertó un nuevo historial futbolístico para el jugador ID 19 (CARLOS CABRERA) con fecha 2025-06-03.\nPartidos Jugados: 8, Goles: 5, Asistencias: 0, Tarjetas Amarillas: 8, Tarjetas Rojas: 2, Minutos Jugados: 600, Pases Completados: 23, Faltas Cometidas: 29, Atajadas: 0.'),
(18, 30, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:28:47', 'Se insertó un nuevo historial futbolístico para el jugador ID 20 (ROBERT ESCOBAR) con fecha 2024-06-04.\nPartidos Jugados: 9, Goles: 6, Asistencias: 2, Tarjetas Amarillas: 10, Tarjetas Rojas: 0, Minutos Jugados: 888, Pases Completados: 20, Faltas Cometidas: 15, Atajadas: 0.'),
(19, 31, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:30:22', 'Se insertó un nuevo historial futbolístico para el jugador ID 39 (DERLIS LOPEZ) con fecha 2024-06-05.\nPartidos Jugados: 8, Goles: 1, Asistencias: 2, Tarjetas Amarillas: 8, Tarjetas Rojas: 4, Minutos Jugados: 720, Pases Completados: 25, Faltas Cometidas: 20, Atajadas: 0.'),
(20, 32, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:31:21', 'Se insertó un nuevo historial futbolístico para el jugador ID 17 (DERLYS VERA) con fecha 2024-06-05.\nPartidos Jugados: 8, Goles: 3, Asistencias: 3, Tarjetas Amarillas: 6, Tarjetas Rojas: 1, Minutos Jugados: 720, Pases Completados: 21, Faltas Cometidas: 22, Atajadas: 0.'),
(21, 33, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:32:34', 'Se insertó un nuevo historial futbolístico para el jugador ID 18 (DOMINGO GUZMAN) con fecha 2025-06-03.\nPartidos Jugados: 8, Goles: 3, Asistencias: 0, Tarjetas Amarillas: 7, Tarjetas Rojas: 1, Minutos Jugados: 700, Pases Completados: 15, Faltas Cometidas: 25, Atajadas: 0.'),
(22, 34, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:36:03', 'Se insertó un nuevo historial futbolístico para el jugador ID 47 (DIEGO SANABRIA) con fecha 2024-07-16.\nPartidos Jugados: 9, Goles: 9, Asistencias: 5, Tarjetas Amarillas: 4, Tarjetas Rojas: 0, Minutos Jugados: 800, Pases Completados: 15, Faltas Cometidas: 10, Atajadas: 0.'),
(23, 35, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 14:38:11', 'Se insertó un nuevo historial futbolístico para el jugador ID 32 (ELIAS FRUTOS) con fecha 2024-06-04.\nPartidos Jugados: 9, Goles: 8, Asistencias: 11, Tarjetas Amarillas: 7, Tarjetas Rojas: 0, Minutos Jugados: 850, Pases Completados: 20, Faltas Cometidas: 11, Atajadas: 0.'),
(24, 36, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 15:12:58', 'Se insertó un nuevo historial futbolístico para el jugador ID 49 (LUIS GAYOSO) con fecha 2025-06-05.\nPartidos Jugados: 8, Goles: 7, Asistencias: 5, Tarjetas Amarillas: 5, Tarjetas Rojas: 0, Minutos Jugados: 700, Pases Completados: 23, Faltas Cometidas: 8, Atajadas: 0.'),
(25, 37, 'INSERTAR', 'gd@gmail.com', '127.0.0.1', '2025-06-05 18:11:37', 'Se insertó un nuevo historial futbolístico para el jugador ID 50 (LUIS CARDOZO) con fecha 2025-06-03.\nPartidos Jugados: 8, Goles: 13, Asistencias: 8, Tarjetas Amarillas: 5, Tarjetas Rojas: 2, Minutos Jugados: 720, Pases Completados: 26, Faltas Cometidas: 15, Atajadas: 0.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_liga`
--

DROP TABLE IF EXISTS `auditoria_liga`;
CREATE TABLE IF NOT EXISTS `auditoria_liga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_sistema` text NOT NULL,
  `ip_acceso` varchar(30) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `accion` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auditoria_liga`
--

INSERT INTO `auditoria_liga` (`id`, `usuario_sistema`, `ip_acceso`, `fecha_hora`, `accion`, `descripcion`) VALUES
(1, 'lilian@gmail.com', '127.0.0.1', '2025-05-06 22:43:21', 'MODIFICAR', 'MODIFICACION DE LIGA:\nANTES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO 12 DE JUNIO, TelÃ©fono: 123456, Email: ligao@gmail.com\nDESPUES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO 12 DE JUNIO, TelÃ©fono: 123, Email: ligao@gmail.com'),
(2, 'lilian@gmail.com', '127.0.0.1', '2025-05-02 22:49:05', 'MODIFICAR', 'MODIFICACION DE LIGA:\nANTES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO 12 DE JUNIO, TelÃ©fono: 123, Email: ligao@gmail.com\nDESPUES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO 12 DE JUNIO, TelÃ©fono: 1238012, Email: ligao@gmail.com'),
(3, 'lilian@gmail.com', '127.0.0.1', '2025-05-20 22:49:22', 'MODIFICAR', 'MODIFICACION DE LIGA:\nANTES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO 12 DE JUNIO, TelÃ©fono: 1238012, Email: ligao@gmail.com\nDESPUES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO CENTRO, TelÃ©fono: 1238012, Email: ligao@gmail.com'),
(4, 'lilian@gmail.com', '127.0.0.1', '2025-05-21 18:54:53', 'MODIFICAR', 'MODIFICACION DE LIGA:\nANTES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO CENTRO, TelÃ©fono: 1238012, Email: ligao@gmail.com\nDESPUES: DescripciÃ³n: LIGA OVETENSE DE FUTBOL, DirecciÃ³n: BARRIO CENTRO, TelÃ©fono: 3, Email: ligao@gmail.com'),
(5, 'japr@gmail.com', '127.0.0.1', '2025-06-05 15:00:36', 'MODIFICAR', 'MODIFICACION DE LIGA:\nANTES: Descripción: LIGA OVETENSE DE FUTBOL, Dirección: BARRIO 12 DE JUNIO, Teléfono: 123456, Email: ligao@gmail.com\nDESPUES: Descripción: LIGA OVETENSE DE FUTBOL, Dirección: BARRIO 12 DE JUNIO, Teléfono: 123456, Email: ligao@gmail.com'),
(6, 'japr@gmail.com', '127.0.0.1', '2025-06-05 18:52:48', 'MODIFICAR', 'MODIFICACION DE LIGA:\nANTES: Descripción: LIGA OVETENSE DE FUTBOL, Dirección: BARRIO 12 DE JUNIO, Teléfono: 123456, Email: ligao@gmail.com\nDESPUES: Descripción: LIGA OVETENSE DE FUTBOL, Dirección: BARRIO 12 DE JUNIO, Teléfono: 123456, Email: ligao@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_planteles`
--

DROP TABLE IF EXISTS `auditoria_planteles`;
CREATE TABLE IF NOT EXISTS `auditoria_planteles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idplantel` int NOT NULL,
  `accion` varchar(30) NOT NULL,
  `usuario_sistema` varchar(40) NOT NULL,
  `ip_acceso` text NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auditoria_planteles`
--

INSERT INTO `auditoria_planteles` (`id`, `idplantel`, `accion`, `usuario_sistema`, `ip_acceso`, `fecha_hora`, `descripcion`) VALUES
(1, 4, 'INSERTAR', 'LILIAN@GMAIL.COM', '127.0.0.1', '2025-05-01 17:51:46', 'PLANTEL REGISTRADO:\nDescripciÃ³n: PROBANDO, Periodo: 20252, Temporada: PRIMERA, ID Club: 1, ID CategorÃ­a: 1\nDETALLE DE JUGADORES:\n'),
(2, 5, 'INSERTAR', 'LILIAN@GMAIL.COM', '127.0.0.1', '2025-05-21 17:54:16', 'PLANTEL REGISTRADO:\nDescripciÃ³n: PROBANDO, Periodo: 20253, Temporada: PRIMERA, ID Club: 1, ID CategorÃ­a: 1\nDETALLE DE JUGADORES:\nID Fichaje: 3, PosiciÃ³n: MEDIO CAMPISTA\n'),
(3, 6, 'INSERTAR', 'LILIAN@GMAIL.COM', '127.0.0.1', '2025-05-21 17:59:06', 'PLANTEL REGISTRADO:\nDescripciÃ³n: PRUEBA 2, Periodo: 2025, Temporada: PRIMERA, ID Club: 2, ID CategorÃ­a: 1\nDETALLE DE JUGADORES:\nID Fichaje: 2, PosiciÃ³n: ARQUERO\n'),
(4, 6, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 18:22:55', 'PLANTEL Y DETALLE DADOS DE BAJA:\nDescripciÃ³n del Plantel: PRUEBA 2\nID CategorÃ­a: 1, ID Club: 2\nPeriodo: 2025, Temporada: PRIMERA\n------------------------------------------\nDetalle del Plantel:\nID Fichaje: 2, ID Plantel: 6, PosiciÃ³n: ARQUERO'),
(5, 2, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 18:23:32', 'PLANTEL Y DETALLE DADOS DE BAJA:\nDescripciÃ³n del Plantel: APERTURA\nID CategorÃ­a: 2, ID Club: 1\nPeriodo: 2025, Temporada: PRIMERA\n------------------------------------------\nDetalle del Plantel:\nID Fichaje: 4, ID Plantel: 2, PosiciÃ³n: MEDIO CAMPISTA'),
(6, 2, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-21 18:47:05', 'PLANTEL Y DETALLE DADOS DE BAJA:\nDescripciÃ³n del Plantel: APERTURA\nID CategorÃ­a: 2, ID Club: 1\nPeriodo: 2025, Temporada: PRIMERA\n------------------------------------------\nDetalles del Plantel:\nID Fichaje: 4, ID Plantel: 2, PosiciÃ³n: MEDIO CAMPISTA\nID Fichaje: 3, ID Plantel: 2, PosiciÃ³n: DEFENSA\n'),
(7, 7, 'INSERTAR', 'LILIAN@GMAIL.COM', '127.0.0.1', '2025-05-14 20:04:54', 'PLANTEL REGISTRADO:\nDescripciÃ³n: UP, Periodo: 1212, Temporada: UPM21\nClub: 1 - CLUB GUARANÃ­, CategorÃ­a: 3 - CATEGORIA SUB 17\nDETALLE DE JUGADORES:\nID Fichaje: 3, Jugador: MIGUEL CABRERA BEN, PosiciÃ³n: MEDIO CAMPISTA\nID Fichaje: 7, Jugador: EZEQUIEL PEREIRA, PosiciÃ³n: ARQUERO\n'),
(8, 1, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-02 20:07:39', 'PLANTEL Y DETALLE DADOS DE BAJA:\nDescripciÃ³n del Plantel: PRUEBA 2\nCategorÃ­a: 2 - CATEGORIA SUB 16, Club: 2 - CLUB SOCIAL Y DEPORTIVO GALICIA\nPeriodo: 2025, Temporada: PRIMERA\n------------------------------------------\nDetalles del Plantel:\nID Fichaje: 2, Jugador: JORGE FERREIRA CABRERA, PosiciÃ³n: MEDIO CAMPISTA\n'),
(9, 5, 'INSERTAR', 'GD@GMAIL.COM', '127.0.0.1', '2025-06-05 15:10:20', 'PLANTEL REGISTRADO:\nDescripción: PLANTEL JUVENIL, Periodo: 2025, Temporada: PRIMERA\nClub: 3 - CLUB 8 DE DICIEMBRE, Categoría: 8 - CATEGORIA SUB 18\nDETALLE DE JUGADORES:\nID Fichaje: 39, Jugador: RONY MEDINA, Posición: ARQUERO\n'),
(10, 6, 'INSERTAR', 'GD@GMAIL.COM', '127.0.0.1', '2025-06-05 18:09:48', 'PLANTEL REGISTRADO:\nDescripción: PLANTEL JUVENIL, Periodo: 2025, Temporada: SEGUNADA\nClub: 1 - CLUB GUARANI, Categoría: 10 - CATEGORIA JUVENIL\nDETALLE DE JUGADORES:\nID Fichaje: 51, Jugador: LUIS CARDOZO, Posición: DELANTERO\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_usuarios`
--

DROP TABLE IF EXISTS `auditoria_usuarios`;
CREATE TABLE IF NOT EXISTS `auditoria_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idusuario` int NOT NULL,
  `accion` varchar(30) NOT NULL,
  `usuario_sistema` varchar(40) NOT NULL,
  `ip_acceso` varchar(60) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `auditoria_usuarios`
--

INSERT INTO `auditoria_usuarios` (`id`, `idusuario`, `accion`, `usuario_sistema`, `ip_acceso`, `fecha_hora`, `descripcion`) VALUES
(1, 16, 'INSERTAR', '', '127.0.0.1', '2025-05-05 21:34:20', 'NUEVO USUARIO REGISTRADO: u@gmail.com'),
(2, 17, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-08 23:30:58', 'NUEVO USUARIO REGISTRADO: q@gmail.com'),
(3, 0, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-06 21:22:00', 'ModificaciÃ³n de usuario: Q QUINTANILLA, CI: 5, Email: q@gmail.com'),
(4, 16, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-20 21:55:51', 'MODIFICACION DE USUARIO: UENO U2, CI: 2, Email: u@gmail.com'),
(5, 16, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-20 22:11:10', 'MODIFICACION DE USUARIO:\nANTES: Nombre: UENO, Apellido: U2, CI: 2, Tel: 0981092566, Dir: SARGENTO BENITEZ, Email: u@gmail.com, Liga: 1, Nivel: 2\nDESPUES: Nombre: UENO6, Apellido: U2, CI: 2, Tel: 0981092566, Dir: SARGENTO BENITEZ, Email: u@gmail.com, Liga: 1, Nivel: 2'),
(6, 17, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-20 22:18:21', 'USUARIO DADO DE BAJA:\nNombre: Q, Apellido: QUINTANILLA, CI: 5, Tel: Q, DirecciÃ³n: Q, Email: q@gmail.com, Liga: 1, Nivel: 1'),
(7, 25, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 01:11:36', 'NUEVO USUARIO REGISTRADO: gs@gmail.com'),
(8, 21, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 17:46:35', 'MODIFICACION DE USUARIO:\nANTES: Nombre: MARIA, Apellido: BOGADO, CI: 4791925, Tel: 0992123456, Dir: TTE FARIñA, Email: mb@gmail.com, Liga: 1, Nivel: 2\nDESPUES: Nombre: MARIA, Apellido: BOGADO, CI: 4791925, Tel: 0992123456, Dir: TTE FARIñA, Email: mb@gmail.com, Liga: 1, Nivel: 2'),
(9, 23, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 17:48:20', 'MODIFICACION DE USUARIO:\nANTES: Nombre: GUSTAVO, Apellido: DAVALOS, CI: 4555666, Tel: 0971444666, Dir: BARRIO COSTA ALEGRE, Email: gd@gmail.com, Liga: 1, Nivel: 4\nDESPUES: Nombre: GUSTAVO, Apellido: DAVALOS, CI: 4555666, Tel: 0971444666, Dir: BARRIO COSTA ALEGRE, Email: gd@gmail.com, Liga: 1, Nivel: 4'),
(10, 25, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 18:06:41', 'MODIFICACION DE USUARIO:\nANTES: Nombre: GUSTAVO, Apellido: SOLIS, CI: 12345678, Tel: 0971123456, Dir:  AV. CENTRAL 123, Email: gs@gmail.com, Liga: 1, Nivel: 5\nDESPUES: Nombre: GUSTAVO, Apellido: SOLIS, CI: 12345678, Tel: 0971123456, Dir:  AV. CENTRAL 123, Email: gs@gmail.com, Liga: 1, Nivel: 5 selected'),
(11, 11, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 23:45:03', 'USUARIO DADO DE BAJA:\nNombre: JUAN ALBERTO, Apellido: PEREZ ROA, CI: 4579056, Tel: 0992962697, Dirección: BARRIO SANTA LUCIA, Email: japr@gmail.com, Liga: 1, Nivel: 1'),
(12, 26, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-05-22 23:59:32', 'NUEVO USUARIO REGISTRADO: japr@gmail.com'),
(13, 5, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-23 00:04:03', 'USUARIO DADO DE BAJA:\nNombre: SOFIA, Apellido: MARTINEZ, CI: 5678901, Tel: 0971333444, Dirección: AZUCENA, Email: sofia.scout@example.com, Liga: 1, Nivel: 2'),
(14, 17, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-23 00:07:01', 'USUARIO DADO DE BAJA:\nNombre: ULICES, Apellido: RODRIGUEZ, CI: 4579062, Tel: 0981445590, Dirección: BARRIO CRUCE, Email: ur@gmail.com, Liga: 1, Nivel: 2'),
(15, 19, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-05-23 00:07:28', 'USUARIO DADO DE BAJA:\nNombre: RAUL, Apellido: GONZALEZ, CI: 4579064, Tel: 0981445590, Dirección: BARRIO SAN JUAN, Email: rg@gmail.com, Liga: 1, Nivel: 2'),
(16, 21, 'BAJA', 'lilian@gmail.com', '127.0.0.1', '2025-06-05 14:05:56', 'USUARIO DADO DE BAJA:\nNombre: MARIA, Apellido: BOGADO, CI: 4791925, Tel: 0992123456, Dirección: TTE FARIñA, Email: mb@gmail.com, Liga: 1, Nivel: 2'),
(17, 24, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-05 14:09:12', 'MODIFICACION DE USUARIO:\nANTES: Nombre: HECTOR, Apellido: ESTIGARRIBIA, CI: 4.5555555555555, Tel: 1234567, Dir: AVDA. HECTOR ROQUE DUARTE, Email: he@gmail.com, Liga: 1, Nivel: 2\nDESPUES: Nombre: HECTOR, Apellido: ESTIGARRIBIA, CI: 4.5555555555555, Tel: 1234567, Dir: AVDA. HECTOR ROQUE DUARTE, Email: he@gmail.com, Liga: 1, Nivel: 2'),
(18, 27, 'INSERTAR', 'japr@gmail.com', '127.0.0.1', '2025-06-05 15:00:26', 'NUEVO USUARIO REGISTRADO: er@gmail.com'),
(19, 20, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-05 15:26:59', 'MODIFICACION DE USUARIO:\nANTES: Nombre: EFIGENIO, Apellido: NUÑEZ, CI: 4579065, Tel: 0992962777, Dir: BARRIO COSTA ALEGRE, Email: en@gmail.com, Liga: 1, Nivel: 3\nDESPUES: Nombre: EFIGENIO, Apellido: NUÑEZ, CI: 4579065, Tel: 0992962777, Dir: BARRIO COSTA ALEGRE, Email: en@gmail.com, Liga: 1, Nivel: 3'),
(20, 28, 'INSERTAR', 'japr@gmail.com', '127.0.0.1', '2025-06-05 18:00:58', 'NUEVO USUARIO REGISTRADO: hr@gmail.com'),
(21, 29, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-14 04:42:57', 'NUEVO USUARIO REGISTRADO: eg@gmail.com'),
(22, 30, 'INSERTAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-21 02:47:10', 'NUEVO USUARIO REGISTRADO: nz@gmail.com'),
(23, 30, 'MODIFICAR', 'nz@gmail.com', '127.0.0.1', '2025-06-21 02:51:31', 'MODIFICACION DE USUARIO:\nANTES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 1\nDESPUES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 2'),
(24, 30, 'MODIFICAR', 'nz@gmail.com', '127.0.0.1', '2025-06-21 02:55:38', 'MODIFICACION DE USUARIO:\nANTES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 2\nDESPUES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 3'),
(25, 30, 'MODIFICAR', 'nz@gmail.com', '127.0.0.1', '2025-06-21 02:55:49', 'MODIFICACION DE USUARIO:\nANTES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 3\nDESPUES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 1'),
(26, 30, 'MODIFICAR', 'nz@gmail.com', '127.0.0.1', '2025-06-21 02:56:14', 'MODIFICACION DE USUARIO:\nANTES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 1\nDESPUES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 4'),
(27, 30, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-21 02:59:47', 'MODIFICACION DE USUARIO:\nANTES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 4\nDESPUES: Nombre: NELSON, Apellido: ZACARIAS, CI: 1678094, Tel: 0971444666, Dir: AVDA. HECTOR ROQUE DUARTE, Email: nz@gmail.com, Liga: 1, Nivel: 2'),
(28, 28, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-21 03:20:55', 'MODIFICACION DE USUARIO:\nANTES: Nombre: HECTOR, Apellido: RAMIREZ, CI: 4579050, Tel: 0981223322, Dir: BARRIO CENTRO, Email: hr@gmail.com, Liga: 1, Nivel: 2\nDESPUES: Nombre: HECTOR, Apellido: GONZALEZ, CI: 4579050, Tel: 0981223322, Dir: BARRIO CENTRO, Email: hg@gmail.com, Liga: 1, Nivel: 2'),
(29, 25, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-21 13:01:13', 'MODIFICACION DE USUARIO:\nANTES: Nombre: GUSTAVO, Apellido: SOLIS, CI: 12345678, Tel: 0971123456, Dir:  AV. CENTRAL 123, Email: gs@gmail.com, Liga: 1, Nivel: 5\nDESPUES: Nombre: GUSTAVO, Apellido: GONZALEZ, CI: 12345678, Tel: 0971123456, Dir:  AV. CENTRAL 123, Email: gs@gmail.com, Liga: 1, Nivel: 5 selected'),
(30, 25, 'MODIFICAR', 'lilian@gmail.com', '127.0.0.1', '2025-06-21 13:04:01', 'MODIFICACION DE USUARIO:\nANTES: Nombre: GUSTAVO, Apellido: GONZALEZ, CI: 12345678, Tel: 0971123456, Dir:  AV. CENTRAL 123, Email: gs@gmail.com, Liga: 1, Nivel: 5\nDESPUES: Nombre: GUSTAVO, Apellido: GONZALEZ, CI: 12345678, Tel: 0971123456, Dir:  AV. CENTRAL 123, Email: gg@gmail.com, Liga: 1, Nivel: 5 selected');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campeonatos`
--

DROP TABLE IF EXISTS `campeonatos`;
CREATE TABLE IF NOT EXISTS `campeonatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha_i` date NOT NULL,
  `fecha_f` date NOT NULL,
  `fecha_culminacion_real` date NOT NULL,
  `estado_marcha` varchar(20) NOT NULL,
  `idliga` int NOT NULL,
  `idtipocampeonato` int NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `campeonatos`
--

INSERT INTO `campeonatos` (`id`, `descripcion`, `fecha_i`, `fecha_f`, `fecha_culminacion_real`, `estado_marcha`, `idliga`, `idtipocampeonato`, `estado`) VALUES
(1, 'PROBANDO', '2025-04-01', '2025-04-30', '2025-04-17', 'FINALIZADO', 1, 3, 'INACTIVO'),
(2, 'PROBANDO45', '2025-04-01', '2025-04-30', '2025-01-01', 'EN CURSO', 1, 1, 'INACTIVO'),
(3, 'PROBANDO4', '2025-04-01', '2025-04-30', '2025-01-01', 'EN CURSO', 1, 1, 'INACTIVO'),
(4, 'PROBANDO5', '2025-04-01', '2025-04-30', '2025-01-01', 'EN CURSO', 1, 1, 'INACTIVO'),
(5, 'PRUEBA JUEVES', '2025-04-01', '2025-05-10', '2025-01-01', 'SUSPENDIDO', 1, 3, 'INACTIVO'),
(6, 'PROBANDO15', '2025-04-06', '2025-05-16', '2025-01-01', 'POSTERGADO', 1, 3, 'INACTIVO'),
(7, 'PROBANDO40', '2025-04-01', '2025-05-30', '2025-01-01', 'POSTERGADO', 1, 3, 'INACTIVO'),
(8, 'PRUEBA JUEVES 48', '2025-03-30', '2025-04-30', '2025-01-01', 'EN CURSO', 1, 3, 'INACTIVO'),
(9, 'PROBANDO100', '2025-04-01', '2025-07-31', '2025-04-22', 'FINALIZADO', 1, 3, 'INACTIVO'),
(10, 'ULTIMA PRUEBA6', '2025-04-17', '2025-04-24', '2025-01-01', 'TERMINADO', 1, 1, 'INACTIVO'),
(11, 'PROBANDO ULTIMO', '2025-04-03', '2025-06-28', '2025-01-01', 'SUSPENDIDO', 1, 1, 'INACTIVO'),
(12, 'PROBANDO60', '2025-04-10', '2025-04-30', '2025-01-01', 'EN CURSO', 1, 3, 'INACTIVO'),
(13, 'PROBANDOEEEEEE', '2025-04-15', '2025-04-24', '2025-01-01', 'EN CURSO', 1, 1, 'INACTIVO'),
(14, 'A', '2025-04-01', '2025-04-02', '2025-01-01', 'EN CURSO', 1, 1, 'INACTIVO'),
(15, 'ASCENSO', '2025-10-05', '2024-12-15', '2025-04-25', 'FINALIZADO', 1, 1, 'ACTIVO'),
(16, 'LIGA OVETENSE', '2024-04-14', '2024-08-11', '2025-04-25', 'FINALIZADO', 1, 1, 'ACTIVO'),
(17, 'CAMPEONATO DE ASCENSO', '2025-04-06', '2025-07-20', '2025-05-13', 'FINALIZADO', 1, 1, 'ACTIVO'),
(18, 'CAMPEONATO OVETENSE', '2025-04-13', '2025-08-24', '2025-04-22', 'EN CURSO', 1, 1, 'ACTIVO'),
(19, 'PROBANDO4444444444', '2025-04-01', '2025-05-03', '2025-04-22', 'FINALIZADO', 1, 1, 'INACTIVO'),
(20, 'PROBANDOD', '2025-04-01', '2025-05-06', '2025-04-22', 'FINALIZADO', 1, 1, 'INACTIVO'),
(21, 'PROBANDOD', '2025-04-07', '2025-04-01', '2025-04-23', 'FINALIZADO', 1, 1, 'INACTIVO'),
(22, 'LIGA OVETENSE', '2025-06-08', '2025-11-02', '2025-01-01', 'EN CURSO', 1, 5, 'ACTIVO'),
(23, 'COPA ASCENSO', '2025-06-07', '2025-11-01', '2025-06-05', 'FINALIZADO', 1, 6, 'ACTIVO'),
(24, 'COPA ASCENSO', '2025-06-05', '2025-06-30', '2025-01-01', 'SUSPENDIDO', 1, 5, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

DROP TABLE IF EXISTS `canchas`;
CREATE TABLE IF NOT EXISTS `canchas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `idclub` int NOT NULL,
  `direccion` text NOT NULL,
  `tipo_superficie` varchar(100) NOT NULL,
  `capacidad` varchar(60) NOT NULL,
  `disponibilidad` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `canchas`
--

INSERT INTO `canchas` (`id`, `descripcion`, `idclub`, `direccion`, `tipo_superficie`, `capacidad`, `disponibilidad`, `estado`) VALUES
(2, 'Pruaba1', 2, 'prueba112121', 'CESPED NATURAL', '1213', 'DISPONIBLE', 'INACTIVO'),
(3, 'Pruaba3', 1, 'prueba40', 'CESPED NATURAL', '322', 'DISPONIBLE', 'INACTIVO'),
(4, 'Pruaba35', 3, 'prueba112121', 'SINTETICO', '3224444', 'MANTENIMIENTO', 'INACTIVO'),
(5, 'ESTADIO 8 DE DICIEMBRE', 3, 'BARRIO COSTA ALEGRE', 'CESPED NATURAL', '10000', 'INHABILITADA', 'ACTIVO'),
(6, 'PRUABA11212121', 2, 'PRUEBA121212', 'TIERRA', '1213', 'DISPONIBLE', 'INACTIVO'),
(7, 'ESTADIO GALICIA', 2, 'BARRIO SAN JUAN', 'CESPED NATURAL', '7600', 'DISPONIBLE', 'ACTIVO'),
(8, 'ESTADIO CEMENTERIO DE LOS ELEFANTES', 4, 'BARRIO SANTA LUCIA', 'CESPED NATURAL', '5000', 'INHABILITADA', 'ACTIVO'),
(9, 'PRUABA50', 3, 'PRUEBA50', 'SINTETICO', '599', 'DISPONIBLE', 'INACTIVO'),
(10, 'PRUABA1000', 2, 'PRUEBA10000', 'CESPED NATURAL', '1213', 'MANTENIMIENTO', 'INACTIVO'),
(11, 'CERRITO ABIERTO', 8, 'AZUCENA', 'CEMENTO', '7000', 'DISPONIBLE', 'INACTIVO'),
(12, 'ESTADIO GUARANI', 1, 'BARRIO SAN PABLO', 'CESPED NATURAL', '7500', 'DISPONIBLE', 'ACTIVO'),
(13, 'ESTADIO CERRO PORTEÑO', 8, 'AZUCENA', 'CESPED NATURAL', '8000', 'DISPONIBLE', 'ACTIVO'),
(14, 'ESTADIO GENERAL DIAZ', 13, 'BARRIO GENERAL DIAZ', 'CESPED NATURAL', '5500', '0', 'ACTIVO'),
(15, 'ESTADIO LIBERTAD', 11, 'BARRIO POTRERITO', 'CESPED NATURAL', '4700', '0', 'ACTIVO'),
(16, 'ESTADIO 15 DE MAYO', 12, 'BARRIO SAN ISIDRO', 'CESPED NATURAL', '2000', '0', 'ACTIVO'),
(17, 'ESTADIO CORONEL', 10, 'BARRIO SANTA LUCIA', 'CESPED NATURAL', '13000', '0', 'ACTIVO'),
(18, 'ESTADIO BLAS GARAY', 14, 'COLONIA BLAS GARAY', 'CESPED NATURAL', '5000', '0', 'ACTIVO'),
(19, 'ESTADIO 11 DE SEPTIEMBRE', 15, 'BARRIO COSTA ALEGRE', 'CESPED NATURAL', '6500', '0', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `estado`) VALUES
(1, 'CATEGORIA SUB 15', 'ACTIVO'),
(2, 'CATEGORIA SUB 16', 'ACTIVO'),
(3, 'CATEGORIA SUB 17', 'ACTIVO'),
(4, 'PRUEBA 5', 'INACTIVO'),
(6, 'Probandoo', 'INACTIVO'),
(5, 'PRUEBA 3', 'INACTIVO'),
(7, 'PRUEB', 'INACTIVO'),
(8, 'CATEGORIA SUB 18', 'ACTIVO'),
(9, 'CATEGORIA SUB 19', 'ACTIVO'),
(10, 'CATEGORIA JUVENIL', 'ACTIVO'),
(11, 'CATEGORIA PRIMERA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clubes`
--

DROP TABLE IF EXISTS `clubes`;
CREATE TABLE IF NOT EXISTS `clubes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `idpresidente` int NOT NULL,
  `idliga` int NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `clubes`
--

INSERT INTO `clubes` (`id`, `descripcion`, `direccion`, `telefono`, `email`, `idpresidente`, `idliga`, `estado`) VALUES
(1, 'CLUB GUARANI', 'JAIME SAN JUST', '09876543', 'guarani@gmail.com', 18, 1, 'ACTIVO'),
(2, 'CLUB SOCIAL Y DEPORTIVO GALICIA', 'BARRIO SAN JUAN', '09832221111', 'csdg@gmail.com', 19, 1, 'ACTIVO'),
(3, 'CLUB 8 DE DICIEMBRE', 'BARRIO COSTA ALEGRE', '09876543', 'c8dd@gmail.com', 20, 1, 'ACTIVO'),
(4, 'CLUB 1º DE MAYO', 'BARRIO SANTA LUCIA', '09876543', 'c1dm@gmail.com', 12, 1, 'ACTIVO'),
(5, 'PRUEBA8', 'PROBANDO', '094u320', 'prueba@gmail.com', 7, 1, 'INACTIVO'),
(6, 'PRUE', 'PROBD', '09876543', 'probo@gmail.com', 3, 1, 'INACTIVO'),
(7, 'PRUEBA5', 'ASASA', 'asaa', 'guarani@gmail.com', 7, 1, 'INACTIVO'),
(8, 'CLUB CERRO PORTEÑO', 'BARRIO AZUCENA', '24586', 'cerro@gmail.com', 3, 1, 'ACTIVO'),
(9, 'CLUB DEPORTIVO UNIVERSITARIO', 'BARRIO SAN ISIDRO', '24586', 'universitario@gmail.com', 7, 1, 'INACTIVO'),
(10, 'CLUB SOCIAL Y DEPORTIVO CORONEL OVIEDO', 'BARRIO SANTA LUCIA', '0982111222', 'csdco@gmail.com', 13, 1, 'ACTIVO'),
(11, 'CLUB LIBERTAD', 'BARRIO POTRERITO', '0991212122', 'cl@gmail.com', 14, 1, 'ACTIVO'),
(12, 'CLUB 15 DE MAYO', 'BARRIO COSTA ALEGRE', '09876543', 'c15dm@gmail.com', 15, 1, 'ACTIVO'),
(13, 'CLUB GENERAL DIAZ', 'BARRIO GENERAL DIAZ', '0981222333', 'cgd@gmail.com', 16, 1, 'ACTIVO'),
(14, 'CLUB SPORTIVO BLAS GARAY', 'COLONIA BLAS GARAY', '0975109203', 'csbg@gmail.com', 13, 1, 'ACTIVO'),
(15, 'CLUB 11 DE SEPTIEMBRE', 'BARRIO COSTA ALEGRA', '0981224455', 'c11ds@gmail.com', 15, 1, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo_tecnico`
--

DROP TABLE IF EXISTS `cuerpo_tecnico`;
CREATE TABLE IF NOT EXISTS `cuerpo_tecnico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idclub` int NOT NULL,
  `identrenador` int NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_plantel`
--

DROP TABLE IF EXISTS `det_plantel`;
CREATE TABLE IF NOT EXISTS `det_plantel` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idfichaje` int NOT NULL,
  `idplantel` int NOT NULL,
  `posicion` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `det_plantel`
--

INSERT INTO `det_plantel` (`id`, `idfichaje`, `idplantel`, `posicion`, `estado`) VALUES
(1, 2, 1, 'MEDIO CAMPISTA', 'ACTIVO'),
(2, 4, 2, 'MEDIO CAMPISTA', 'ACTIVO'),
(3, 3, 2, 'DEFENSA', 'ACTIVO'),
(5, 3, 3, 'MEDIO CAMPISTA', 'INACTIVO'),
(6, 6, 2, 'DELANTERO', 'ACTIVO'),
(7, 2, 4, 'ENGANCHE', 'ACTIVO'),
(8, 39, 5, 'ARQUERO', 'ACTIVO'),
(9, 40, 5, 'LATERAL', 'ACTIVO'),
(10, 51, 6, 'DELANTERO', 'ACTIVO'),
(11, 12, 6, 'MEDIO CAMPO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrenadores`
--

DROP TABLE IF EXISTS `entrenadores`;
CREATE TABLE IF NOT EXISTS `entrenadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `ci` varchar(25) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_i` date NOT NULL,
  `fecha_s` date NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichajes`
--

DROP TABLE IF EXISTS `fichajes`;
CREATE TABLE IF NOT EXISTS `fichajes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idjugador` int NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `idclub_origen` int NOT NULL,
  `idclub_destino` int NOT NULL,
  `tipo_fichaje` varchar(50) NOT NULL,
  `duracion_contrato` varchar(60) NOT NULL,
  `costo_transferencia` varchar(60) NOT NULL,
  `salario_anual` varchar(45) NOT NULL,
  `clausula_rescision` text NOT NULL,
  `observacion` text NOT NULL,
  `estado_fichaje` varchar(25) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `fichajes`
--

INSERT INTO `fichajes` (`id`, `idjugador`, `fecha`, `descripcion`, `idclub_origen`, `idclub_destino`, `tipo_fichaje`, `duracion_contrato`, `costo_transferencia`, `salario_anual`, `clausula_rescision`, `observacion`, `estado_fichaje`, `estado`) VALUES
(1, 1, '2025-04-01', 'FICHAJE 1', 2, 1, 'PRUEBA', '1', '500000', '500000', '1000000', 'NINGUNA', 'FINALIZADO', 'ACTIVO'),
(2, 1, '2025-04-20', 'FICHAJE 2', 2, 2, 'PRUEBA2', '1', '500000', '1000000', '1500000', 'WW', 'EN CURSO', 'ACTIVO'),
(3, 2, '2025-04-01', 'FICHAJE 3', 2, 1, 'PRUEBA3', '6', '1000000', '6000000', '8000000', 'PROBANDO', 'EN CURSO', 'ACTIVO'),
(4, 3, '2025-03-30', 'FICHAJE 4', 1, 1, 'PRUEBA4', '1', '250000', '500000', '1500000', '', 'SUSPENDIDO', 'INACTIVO'),
(5, 4, '2025-04-23', 'CONTRATO', 1, 13, 'PRESTAMO', '12', '5000000', '6000000', '150000000', '', 'EN CURSO', 'ACTIVO'),
(6, 5, '2025-04-23', 'CONTRATO', 3, 1, 'DEFINITIVO', '0', '5000000', '6000000', '150000000', '', 'EN CURSO', 'ACTIVO'),
(7, 6, '2025-04-23', 'CONTRATO', 8, 12, 'PRESTAMO', '8', '4000000', '4500000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(8, 7, '2025-04-23', 'CONTRATO', 11, 4, 'DEFINITIVO', '0', '7000000', '3000000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(9, 8, '2025-04-22', 'CONTRATO', 10, 3, 'DEFINITIVO', '0', '4000000', '3000000', '5000000', '', 'EN CURSO', 'ACTIVO'),
(10, 9, '2025-04-23', 'CONTRATO', 4, 10, 'PRESTAMO', '24', '7000000', '6000000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(11, 10, '2025-04-25', 'CONTRATO', 1, 3, 'PRESTAMO', '6', '90000000', '215000', '150000000', '', 'EN CURSO', 'ACTIVO'),
(12, 11, '2025-05-13', 'CONTRATO', 1, 1, 'PRESTAMO', '60', '4000000', '215000', '150000000', 'CCCC', 'EN CURSO', 'ACTIVO'),
(13, 12, '2025-05-19', 'CONTRATO', 11, 12, 'FICHAJE DE JUGADOR NUEVO', '8.ocho', '15.000.000', '50.000.000', 'ocho', '', 'EN CURSO', 'ACTIVO'),
(14, 13, '2025-05-22', 'TRANSFERENCIA', 13, 12, 'FICHAJE POR TRANSFERENCIA', '10', '15.000.000', '50.000.000', '1500000', '', 'SUSPENDIDO', 'ACTIVO'),
(15, 14, '2025-05-21', 'PRESTAMO', 4, 1, 'FICHAJE DE JUGADOR NUEVO', '12', '6000000', '5000000', '1000000', '', 'EN CURSO', 'ACTIVO'),
(16, 15, '2025-06-03', 'PRESTAMO', 1, 2, 'FICHAJE POR TRANSFERENCIA', '12', '5000000', '7000000', '7000000', '', 'EN CURSO', 'ACTIVO'),
(17, 16, '2025-06-03', 'CONTRATO', 4, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '4500000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(18, 17, '2025-06-03', 'CONTRATO', 1, 4, 'FICHAJE POR TRANSFERENCIA', '60', '7000000', '6000000', '150000000', '', 'EN CURSO', 'ACTIVO'),
(19, 18, '2025-06-03', 'CONTRATO', 2, 4, 'FICHAJE POR TRANSFERENCIA', '60', '4000000', '3000000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(20, 19, '2025-06-03', 'CONTRATO', 8, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '5000000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(21, 20, '2025-06-03', 'PRESTAMO', 1, 4, 'FICHAJE POR TRANSFERENCIA', '60', '4000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(22, 21, '2025-06-03', 'PRESTAMO', 2, 4, 'FICHAJE POR TRANSFERENCIA', '60', '5000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(23, 22, '2025-06-03', 'CONTRATO', 1, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '7000000', '6000000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(24, 23, '2025-06-03', 'CONTRATO', 1, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(25, 24, '2025-06-03', 'CONTRATO', 1, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '5000000', '5000000', '', 'EN CURSO', 'ACTIVO'),
(26, 25, '2025-06-03', 'CONTRATO', 8, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '4500000', '5000000', '', 'EN CURSO', 'ACTIVO'),
(27, 26, '2025-06-03', 'CONTRATO', 8, 4, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(28, 27, '2025-06-03', 'CONTRATO', 11, 2, 'FICHAJE DE JUGADOR NUEVO', '24', '4000000', '4500000', '5000000', '', 'EN CURSO', 'ACTIVO'),
(29, 28, '2025-06-03', 'CONTRATO', 12, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '6000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(30, 29, '2025-06-03', 'CONTRATO', 12, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '4500000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(31, 30, '2025-06-03', 'CONTRATO', 12, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '3000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(32, 31, '2025-06-03', 'CONTRATO', 3, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '7000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(33, 32, '2025-06-03', 'CONTRATO', 8, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '3000000', '5000000', '', 'EN CURSO', 'ACTIVO'),
(34, 33, '2025-06-03', 'CONTRATO', 1, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '6000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(35, 34, '2025-06-03', 'CONTRATO', 8, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '7000000', '6000000', '150000000', '', 'EN CURSO', 'ACTIVO'),
(36, 35, '2025-06-03', 'CONTRATO', 2, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(37, 36, '2025-06-03', 'CONTRATO', 1, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '5000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(38, 37, '2025-06-03', 'CONTRATO', 3, 2, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '4500000', '5000000', '', 'EN CURSO', 'ACTIVO'),
(39, 38, '2025-06-03', 'CONTRATO', 1, 3, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '4500000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(40, 39, '2025-06-03', 'CONTRATO', 12, 3, 'FICHAJE DE JUGADOR NUEVO', '60', '5000000', '6000000', '8000000', '', 'EN CURSO', 'ACTIVO'),
(41, 40, '2025-06-03', 'CONTRATO', 10, 3, 'FICHAJE DE JUGADOR NUEVO', '60', '4000000', '5000000', '10000000', '', 'EN CURSO', 'ACTIVO'),
(42, 41, '2025-06-03', 'CONTRATO', 13, 3, 'FICHAJE DE JUGADOR NUEVO', '24', '1000000', '2000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(43, 42, '2025-06-03', 'CONTRATO', 10, 3, 'FICHAJE DE JUGADOR NUEVO', '48', '1000000', '2000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(44, 43, '2025-06-03', 'CONTRATO', 1, 3, 'FICHAJE DE JUGADOR NUEVO', '24', '3000000', '2500000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(45, 44, '2025-06-03', 'CONTRATO', 4, 3, 'FICHAJE DE JUGADOR NUEVO', '24', '3000000', '2000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(46, 45, '2025-06-03', 'CONTRATO', 8, 3, 'FICHAJE DE JUGADOR NUEVO', '24', '3000000', '3000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(47, 46, '2025-06-03', 'CONTRATO', 1, 3, 'FICHAJE DE JUGADOR NUEVO', '12', '3000000', '2000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(48, 47, '2025-06-03', 'CONTRATO', 13, 3, 'FICHAJE DE JUGADOR NUEVO', '12', '3000000', '2000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(49, 48, '2025-06-03', 'CONTRATO', 12, 3, 'FICHAJE DE JUGADOR NUEVO', '24', '1000000', '2000000', '3500000', '', 'EN CURSO', 'ACTIVO'),
(50, 49, '2025-06-05', 'CONTRATO', 4, 3, 'FICHAJE DE JUGADOR NUEVO', '24', '4500000', '4000000', '7500000', '', 'EN CURSO', 'ACTIVO'),
(51, 50, '2025-06-03', 'CONTRATO', 12, 1, 'FICHAJE DE JUGADOR NUEVO', '24', '4500000', '4000000', '5000000', '', 'EN CURSO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales_futbolistico`
--

DROP TABLE IF EXISTS `historiales_futbolistico`;
CREATE TABLE IF NOT EXISTS `historiales_futbolistico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idjugador` int NOT NULL,
  `fecha` date NOT NULL,
  `partidos_jugados` varchar(15) NOT NULL,
  `goles` varchar(15) NOT NULL,
  `asistencias` varchar(15) NOT NULL,
  `tarjetas_amarillas` varchar(15) NOT NULL,
  `tarjetas_rojas` varchar(15) NOT NULL,
  `minutos_jugados` varchar(15) NOT NULL,
  `pases_completados` varchar(15) NOT NULL,
  `faltas_cometidas` varchar(15) NOT NULL,
  `atajadas` varchar(15) NOT NULL,
  `video` text,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `historiales_futbolistico`
--

INSERT INTO `historiales_futbolistico` (`id`, `idjugador`, `fecha`, `partidos_jugados`, `goles`, `asistencias`, `tarjetas_amarillas`, `tarjetas_rojas`, `minutos_jugados`, `pases_completados`, `faltas_cometidas`, `atajadas`, `video`, `estado`) VALUES
(1, 1, '2025-04-22', '1', '1', '1', '0', '0', '10', '1', '0', '0', NULL, 'ACTIVO'),
(2, 2, '2025-04-22', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, 'ACTIVO'),
(3, 3, '2025-04-23', '1', '1', '1', '1', '1', '1', '1', '1', '1', '../videos/WIN_20250423_19_49_17_Pro.mp4', 'ACTIVO'),
(4, 1, '2025-04-01', '1', '1', '1', '0', '0', '15', '2', '0', '0', '../videos/WIN_20250423_19_49_17_Pro.mp4', 'ACTIVO'),
(5, 2, '2025-04-01', '1', '2', '4', '0', '0', '26', '5', '0', '0', '../videos/WIN_20250423_19_49_17_Pro.mp4', 'ACTIVO'),
(6, 2, '2025-04-21', '1', '2', '1', '2', '2', '2', '2', '2', '2', NULL, 'ACTIVO'),
(7, 8, '2025-04-23', '9', '3', '5', '35', '5', '810', '55', '45', '0', NULL, 'ACTIVO'),
(8, 5, '2025-04-23', '9', '5', '7', '6', '3', '810', '46', '22', '0', '../videos/dani alves.mp4', 'ACTIVO'),
(9, 10, '2025-04-25', '5', '2', '4', '1', '0', '220', '42', '20', '0', NULL, 'ACTIVO'),
(10, 5, '2025-05-11', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, 'INACTIVO'),
(11, 10, '2025-04-29', '1', '11', '1', '1', '1', '1', '1', '1', '1', NULL, 'ACTIVO'),
(12, 8, '2025-05-13', '1', '1', '2', '1', '0', '120', '2', '1', '0', NULL, 'ACTIVO'),
(13, 10, '2025-05-13', '1', '11', '1', '1', '', '1', '1', '1', '1', NULL, 'ACTIVO'),
(14, 10, '2025-05-15', '2', '2', '2', '1', '0', '120', '2', '0', '0', 'https://www.youtube.com/shorts/qBF746Ggb6g?feature=share', 'ACTIVO'),
(15, 10, '2025-05-16', '1', '1', '3', '1', '1', '90', '1', '0', '0', 'https://www.youtube.com/shorts/qBF746Ggb6g?feature=share', 'ACTIVO'),
(16, 10, '2025-05-14', '1', '1', '1', '1', '1', '11', '1', '1', '1', 'https://www.youtube.com/shorts/qBF746Ggb6g?feature=share', 'ACTIVO'),
(17, 6, '2025-05-19', '1', '1', '1', '1', '0', '30', '2', '1', '0', NULL, 'ACTIVO'),
(18, 10, '2025-05-20', '2', '1', '1', '1', '1', '10', '1', '1', '0', 'https://www.youtube.com/watch?v=d1WN-HUtl60', 'ACTIVO'),
(19, 14, '2024-05-21', '11', '20', '9', '2', '0', '890', '21', '6', '0', 'https://www.youtube.com/shorts/UmEkXA3mPWs', 'ACTIVO'),
(20, 14, '2023-05-22', '9', '15', '8', '7', '1', '800', '12', '5', '0', 'https://www.youtube.com/shorts/UmEkXA3mPWs', 'ACTIVO'),
(21, 10, '2025-06-04', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'https://www.youtube.com/watch?v=d1WN-HUtl60', 'ACTIVO'),
(22, 0, '2024-05-06', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, 'ACTIVO'),
(23, 10, '2024-01-01', '1', '1', '1', '1', '1', '1', '1', '1', '1', NULL, 'ACTIVO'),
(24, 0, '2025-06-04', '12', '21', '12', '21', '2', '1', '1', '2', '2', NULL, 'ACTIVO'),
(25, 43, '2025-06-03', '9', '12', '5', '4', '0', '888', '53', '25', '0', NULL, 'ACTIVO'),
(26, 16, '2025-06-03', '11', '888', '0', '5', '0', '888', '10', '4', '30', 'https://www.youtube.com/shorts/BV60MvKfEPs', 'ACTIVO'),
(27, 34, '2025-06-03', '8', '9', '14', '7', '2', '777', '56', '18', '0', NULL, 'ACTIVO'),
(28, 34, '2024-06-05', '9', '788', '9', '7', '2', '770', '43', '22', '0', 'https://www.youtube.com/shorts/dU-Ir6-HEL8', 'ACTIVO'),
(29, 19, '2025-06-03', '8', '5', '0', '8', '2', '600', '23', '29', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(30, 20, '2024-06-04', '9', '6', '2', '10', '0', '888', '20', '15', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(31, 39, '2024-06-05', '8', '1', '2', '8', '4', '720', '25', '20', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(32, 17, '2024-06-05', '8', '3', '3', '6', '1', '720', '21', '22', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(33, 18, '2025-06-03', '8', '3', '0', '7', '1', '700', '15', '25', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(34, 47, '2024-07-16', '9', '9', '5', '4', '0', '800', '15', '10', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(35, 32, '2024-06-04', '9', '8', '11', '7', '0', '850', '20', '11', '0', 'https://www.youtube.com/shorts/SvvXwO-gdSQ', 'ACTIVO'),
(36, 49, '2025-06-05', '8', '7', '5', '5', '0', '700', '23', '8', '0', 'https://www.youtube.com/watch?v=P89Cpn6OK5M', 'ACTIVO'),
(37, 50, '2025-06-03', '8', '13', '8', '5', '2', '720', '26', '15', '0', 'https://www.youtube.com/watch?v=P89Cpn6OK5M', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_medico`
--

DROP TABLE IF EXISTS `historial_medico`;
CREATE TABLE IF NOT EXISTS `historial_medico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idjugador` int NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(60) NOT NULL,
  `diagnostico` text NOT NULL,
  `tratamiento` text NOT NULL,
  `fecha_recuperacion` date NOT NULL,
  `medico_tratante` varchar(60) NOT NULL,
  `observaciones` text NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `historial_medico`
--

INSERT INTO `historial_medico` (`id`, `idjugador`, `fecha`, `tipo`, `diagnostico`, `tratamiento`, `fecha_recuperacion`, `medico_tratante`, `observaciones`, `estado`) VALUES
(1, 1, '2025-04-20', 'REVISION POST LESION', 'a', 'a', '2025-04-30', 'JOSE CARDOZO', 'ninguna', 'ACTIVO'),
(2, 3, '2025-04-10', 'REVISION POST LESION', 'oprobando', 'prueba', '2025-04-25', 'JUAN PEREZ', 'probando edicion', 'ACTIVO'),
(3, 2, '2025-04-15', 'REVISION POST LESION', 'e', 'e', '2025-04-23', 'JUAN PEREZ', '', 'ACTIVO'),
(4, 2, '2025-04-12', 'REVISION POST LESION', 'control', 'no hay tratamiento', '2025-04-25', 'JUAN PEREZ', 'niguna', 'ACTIVO'),
(5, 4, '2025-04-25', 'LESION DE ESGUINCE DE TOBILLO', 'ESGUINCE DE TOBILLO LADO IZQUIERDO', 'REPOSO TOTAL', '2025-08-21', 'EGGAR GODOY', '', 'ACTIVO'),
(6, 4, '2025-04-25', 'LESION DE RODILLA', 'LESIOS ', 'ASD', '2025-05-21', 'GUSTAVO S0OAS', '', 'ACTIVO'),
(7, 4, '2025-05-14', 'LESION DE ESGUINCE DE TOBILLO', 'ghdfgg', 'gfhdgf', '2025-06-01', 'EGGAR GODOY', 'EDRFSD', 'ACTIVO'),
(8, 6, '2025-05-15', 'Lesion', 'Esguince de tobillo grado 2', 'Reposo, hielo, compresión, elevación', '2025-06-19', 'Eduardo Kim', '', 'ACTIVO'),
(9, 6, '2024-04-19', 'Lesion', 'esguince de tobillo grado 1', 'Reposo, hielo, compresión y elevación', '2025-04-29', 'Eduardo Kim', 'Reposo de 72 horas', 'ACTIVO'),
(10, 15, '2025-06-02', 'Lesion en el tobillo', 'esguince', 'reposo ', '2025-08-05', 'Jose Ovelar', '', 'ACTIVO'),
(11, 50, '2025-06-02', 'Lesion en la pantorrilla', 'tuvo una lesion en la pantorrila en el partido', 'reposo ', '2025-07-01', 'Ricardo Ovelar', '', 'ACTIVO'),
(12, 49, '2025-06-02', 'ligameento cruzado', 'ligamento cruzado ', 'reposo y fisioterapia', '2026-01-06', 'Gladys Rivas', '', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE IF NOT EXISTS `jugadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `ci` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fecha_nac` date NOT NULL,
  `nacionalidad` varchar(60) NOT NULL,
  `foto` text NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id`, `nombre`, `apellido`, `ci`, `telefono`, `fecha_nac`, `nacionalidad`, `foto`, `estado`) VALUES
(1, 'JORGE', 'FERREIRA CABRERA', '5806241', '0984339091', '2000-06-12', 'PARAGUAYO', '1745575908_763_ronaldinho.jpg', 'ACTIVO'),
(2, 'MIGUEL', 'CABRERA BEN', '435321', '08312431', '2002-09-17', 'PARAGUAYO', '1745575998_1745517319_toni.jpg', 'ACTIVO'),
(3, 'LUIS', 'OLMEDO', '1234567', '09754235262', '2003-04-01', 'PARAGUAYO', 'jugador_defecto.jpg', 'ACTIVO'),
(4, 'JUAN ALBERTO', 'PEREZ ROA', '4579056', '0992962697', '2009-08-01', 'PARAGUAYA', '1745575935_1745521341_Cristiano_Ronaldo.jpg', 'ACTIVO'),
(5, 'IVAN', 'GAMARRA', '4579055', '0992962697', '2009-04-10', 'PARAGUAYA', '1745575950_2018-fif-world-cup-mesut-oezil.jpg', 'ACTIVO'),
(6, 'WILLIAN', 'GOMEZ', '4579054', '0992112200', '2008-02-25', 'PARAGUAYA', '1747707645_Gianluigi_Buffon_(31784615942)_(cropped).jpg', 'ACTIVO'),
(7, 'RODOLFO', 'BENITEZ', '4579053', '0973211993', '2008-06-10', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(8, 'FERMIN', 'GIMENEZ', '4579052', '0973211993', '2009-08-11', 'PARAGUAYA', '1745575970_cafu.jpg', 'ACTIVO'),
(9, 'VICTOR', 'AVILA', '4579051', '0992112200', '2008-06-25', 'PARAGUAYA', '1745576104_1745505252_robertocarlos.jpg', 'ACTIVO'),
(10, 'GUSTAVO', 'BENITEZ', '0122222', '0992112200', '2009-06-09', 'PARAGUAYA', '1747177263_robertocarlos.jpg', 'ACTIVO'),
(11, 'JUAN ALBERTO', 'PEREZ ROA', '4556677', '0992112200', '2025-05-06', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(12, 'CARLOS', 'BARRERA', '5555555', '0971222222', '1990-08-14', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(13, 'DIEGO', 'MARTÍNEZ', '555', '0971222222', '1995-06-19', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(14, 'KYLIAN', 'MBAPPE', '4579088', '0971009977', '2007-03-23', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(15, 'ULICES', 'RODRIGUEZ', '4579001', '0991223344', '2008-06-10', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(16, 'ALFREDO', 'GOMEZ', '4579002', '0992962697', '2009-11-11', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(17, 'DERLYS', 'VERA', '4579003', '0992112233', '2007-02-05', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(18, 'DOMINGO', 'GUZMAN', '4579004', '0973211993', '2006-07-29', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(19, 'CARLOS', 'CABRERA', '4579005', '0973211223', '2009-06-09', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(20, 'ROBERT', 'ESCOBAR', '4579006', '0973211223', '2007-06-12', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(21, 'JORGE', 'BRITEZ', '4579007', '0992112233', '2007-06-05', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(22, 'JORGE', 'BENITEZ', '4579008', '0973211223', '2008-11-05', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(23, 'MOISES', 'BENITEZ', '4579009', '0992112233', '2009-03-04', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(24, 'SERGIO', 'FRUTOS', '4579010', '0992962697', '2008-08-08', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(25, 'LUIS', 'GAUTO', '4579011', '0992112233', '2007-05-06', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(26, 'MIGUEL', 'ORTIZ', '4579012', '0981222337', '2007-11-14', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(27, 'JULIO', 'VILLAVERDE', '4579013', '0992112233', '2008-11-05', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(28, 'RAUL', 'GONZALEZ', '4579014', '0973211223', '2007-12-13', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(29, 'REYNALDO', 'RIVAS', '4579015', '0973211993', '2007-01-05', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(30, 'VICTOR', 'BARRERA', '4579016', '0992112233', '2007-08-16', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(31, 'JOSE', 'BENITEZ', '4579017', '0992112233', '2009-06-17', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(32, 'ELIAS', 'FRUTOS', '4579018', '0981222337', '2009-11-19', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(33, 'SANTIAGO', 'RIVAS', '4579019', '0973211223', '2008-07-16', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(34, 'CARLOS', 'GALVAN', '4579020', '0992112200', '2008-10-07', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(35, 'MATHIAS', 'BRITEZ', '4579021', '0973211223', '2010-02-09', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(36, 'RICARDO', 'JARA', '4579022', '0973211993', '2007-01-30', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(37, 'KEVIN', 'BARRERA', '4579023', '0973211223', '2008-10-15', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(38, 'RONY', 'MEDINA', '4579024', '0992112200', '2008-01-08', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(39, 'DERLIS', 'LOPEZ', '4579025', '0973211993', '2008-01-29', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(40, 'RODRIGO', 'RIOS', '4579026', '0992112200', '2008-05-05', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(41, 'RICARDO', 'BLANCO', '4579027', '0992962697', '2008-11-13', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(42, 'HUGO', 'CABALLERO', '4579028', '0973211993', '2008-08-14', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(43, 'ALEXANDER', 'BAEZ', '4579029', '0973211993', '2009-10-13', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(44, 'CRISTIAN', 'MARTINEZ', '4579030', '0992962697', '2006-10-23', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(45, 'NESTOR', 'GIMENEZ', '4579031', '0992962697', '2007-06-27', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(46, 'ESTEBAN', 'SAMUDIO', '4579032', '0992962697', '2008-06-10', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(47, 'DIEGO', 'SANABRIA', '4579033', '0992112233', '2008-11-13', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(48, 'RUBEN', 'FLORENTIN', '4579034', '0992962697', '2006-06-13', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO'),
(49, 'LUIS', 'GAYOSO', '4579036', '0991345577', '2007-11-15', 'PARAGUAYA', '1749154839_Captura de pantalla 2025-06-05 171401.jpg', 'ACTIVO'),
(50, 'LUIS', 'CARDOZO', '4579038', '0974321199', '2006-06-06', 'PARAGUAYA', 'jugador_defecto.jpg', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

DROP TABLE IF EXISTS `liga`;
CREATE TABLE IF NOT EXISTS `liga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `liga`
--

INSERT INTO `liga` (`id`, `descripcion`, `telefono`, `direccion`, `email`) VALUES
(1, 'LIGA OVETENSE DE FUTBOL', '123456', 'BARRIO 12 DE JUNIO', 'ligao@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(15) NOT NULL,
  `idcampeonato` int NOT NULL,
  `idlocal` int NOT NULL,
  `idvisitante` int NOT NULL,
  `idcancha` int NOT NULL,
  `finalizado` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`id`, `descripcion`, `fecha`, `hora`, `idcampeonato`, `idlocal`, `idvisitante`, `idcancha`, `finalizado`, `estado`) VALUES
(1, 'prueba', '2025-04-23', '14:00', 9, 1, 2, 5, 'FINALIZADO', 'ACTIVO'),
(2, 'hloifsad555555', '2025-04-05', '14:15', 10, 2, 1, 12, 'PROGRAMADO', 'INACTIVO'),
(3, 'e', '2025-05-03', '13:30', 3, 1, 2, 13, 'POSTERGADO', 'INACTIVO'),
(4, 'RRRRR', '2025-04-23', '16:00', 5, 1, 2, 13, 'PROGRAMADO', 'INACTIVO'),
(5, 'FECHA 1', '2025-04-20', '16:15', 18, 1, 2, 12, 'FINALIZADO', 'ACTIVO'),
(6, 'FECHA 2', '2025-04-27', '16:30', 18, 2, 1, 12, 'PROGRAMADO', 'ACTIVO'),
(7, 'Fecha 8', '2025-05-25', '16:00', 16, 1, 2, 7, 'PROGRAMADO', 'ACTIVO'),
(8, 'Fecha 5', '2025-06-08', '15:00', 16, 4, 2, 7, 'FINALIZADO', 'ACTIVO'),
(9, 'Fecha 6', '2025-06-15', '15:00', 16, 5, 2, 5, 'FINALIZADO', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planteles`
--

DROP TABLE IF EXISTS `planteles`;
CREATE TABLE IF NOT EXISTS `planteles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `idcategoria` int NOT NULL,
  `idclub` int NOT NULL,
  `periodo` varchar(100) NOT NULL,
  `temporada` varchar(60) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `planteles`
--

INSERT INTO `planteles` (`id`, `descripcion`, `idcategoria`, `idclub`, `periodo`, `temporada`, `estado`) VALUES
(1, 'PRUEBA 2', 2, 2, '2025', 'PRIMERA', 'ACTIVO'),
(2, 'PALNTEL JUVENIL', 2, 1, '2025', 'PRIMERA', 'ACTIVO'),
(3, 'PLANTEL DE CERRO', 9, 1, '2025-1', 'PRIMERA', 'INACTIVO'),
(4, 'PALNTEL JUVENIL', 9, 2, '2025', 'PRIMERA', 'ACTIVO'),
(5, 'PLANTEL JUVENIL', 8, 3, '2025', 'PRIMERA', 'ACTIVO'),
(6, 'PLANTEL JUVENIL', 10, 1, '2025', 'SEGUNADA', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

DROP TABLE IF EXISTS `resultados`;
CREATE TABLE IF NOT EXISTS `resultados` (
  `id` int NOT NULL AUTO_INCREMENT,
  `idpartido` int NOT NULL,
  `descripcion` varchar(15) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id`, `idpartido`, `descripcion`, `estado`) VALUES
(1, 1, '2-0', 'ACTIVO'),
(2, 5, '2-1', 'ACTIVO'),
(3, 8, '3-0', 'ACTIVO'),
(4, 9, '0-0', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporadas`
--

DROP TABLE IF EXISTS `temporadas`;
CREATE TABLE IF NOT EXISTS `temporadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `estado` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temporadas`
--

INSERT INTO `temporadas` (`id`, `descripcion`, `estado`) VALUES
(3, 'Temporada 2025', 'ACTIVO'),
(2, 'Temporada 2024', 'ACTIVO'),
(1, 'Temporada 2023', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipou`
--

DROP TABLE IF EXISTS `tipou`;
CREATE TABLE IF NOT EXISTS `tipou` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipou`
--

INSERT INTO `tipou` (`id`, `descripcion`, `estado`) VALUES
(1, 'ADMINISTRADOR', 'ACTIVO'),
(2, 'SCOUT', 'ACTIVO'),
(3, 'PRESIDENTE', 'ACTIVO'),
(4, 'SECRETARIO', 'ACTIVO'),
(5, 'AUDITOR', 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_campeonato`
--

DROP TABLE IF EXISTS `tipo_campeonato`;
CREATE TABLE IF NOT EXISTS `tipo_campeonato` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `tipo_campeonato`
--

INSERT INTO `tipo_campeonato` (`id`, `descripcion`, `estado`) VALUES
(1, 'APERTURA', 'INACTIVO'),
(2, 'PROBAN', 'INACTIVO'),
(3, 'CLA', 'INACTIVO'),
(4, 'CLAUSURA', 'INACTIVO'),
(5, 'COPA DE PRIMERA DIVISIóN', 'ACTIVO'),
(6, 'CAMPEONATO ASCENSO', 'ACTIVO'),
(7, 'TEMPORADA 2025', 'INACTIVO'),
(8, 'COPA OVETENSE', 'ACTIVO'),
(9, 'COPA ASCENSO', 'ACTIVO'),
(10, 'COPA OVETENSE 2025', 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(80) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pass` text NOT NULL,
  `idtipou` int NOT NULL,
  `idliga` int NOT NULL,
  `estado` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `ci`, `telefono`, `direccion`, `email`, `pass`, `idtipou`, `idliga`, `estado`) VALUES
(1, 'LILIAN', 'AYALA', '1234567', '0971123456', '  AV. CENTRAL 123', 'lilian@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 1, 1, 'ACTIVO'),
(2, 'JUAN', 'PEREZ', '2345678', '0971987654', 'CALLE 4 Y PALMA', 'juan@gmail.com', '5228c2be7c7ed51cbd391ca59cfa7e85', 2, 1, 'INACTIVO'),
(3, 'LAURA', 'FERNANDEZ', '3456789', '0981223344', 'COSTA ALEGRE', 'laura.fan@example.com', '202cb962ac59075b964b07152d234b70', 3, 1, 'ACTIVO'),
(5, 'SOFIA', 'MARTINEZ', '5678901', '0971333444', 'AZUCENA', 'sofia.scout@example.com', '25f9e794323b453885f5181f1b624d0b', 2, 1, 'INACTIVO'),
(7, 'VICTOR', 'MELGAREJO', '53212323', '0976444226', 'BARRIO CENTRO', 'vmelgarejo@gmail.com', 'b8020e8e15c5362a7ac49800e3e86e99', 3, 1, 'INACTIVO'),
(24, 'HECTOR', 'ESTIGARRIBIA', '4.5555555555555', '1234567', 'AVDA. HECTOR ROQUE DUARTE', 'he@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 2, 1, 'ACTIVO'),
(12, 'CARLOS', 'CORTAZA', '4579057', '0981445533', 'BARRIO SANTA LUCIA', 'cc@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 3, 1, 'ACTIVO'),
(13, 'JORGE', 'VEGA', '4579058', '0992962777', 'BARRIO SANTA LUCIA', 'jv@gmail.com', 'ac96a1eaf55d0b8cbfe281eadc3e4fcf', 3, 1, 'ACTIVO'),
(14, 'ARIEL ', 'GODOY', '4579059', '0992123456', 'BARRIO POTRERITO', 'ag@gmail.com', 'a479024c2959e505ae5bea1848cc85dc', 3, 1, 'ACTIVO'),
(15, 'SANTIAGO', 'RIVAS', '4579060', '0992123456', 'BARRIO SAN JUAN', 'sr@gmail.com', '157243c848a8edff8662cb98aab93466', 3, 1, 'ACTIVO'),
(16, 'MONICA', 'RIOS', '4579061', '0981445555', 'BARRIO GENERAL DIAZ', 'mr@gmail.com', 'bfdd59fdb578cf1363ff61fd2e9fdbe8', 3, 1, 'ACTIVO'),
(17, 'ULICES', 'RODRIGUEZ', '4579062', '0981445590', 'BARRIO CRUCE', 'ur@gmail.com', '5217c2d08348409f3a3e47788f74302c', 2, 1, 'INACTIVO'),
(18, 'EDUARDO', 'SANCHEZ', '4579063', '0992962777', 'BARRIO SAN PABLO', 'es@gmail.com', '4ee8c591d9eba58b1a974ebc9b17d2f0', 3, 1, 'ACTIVO'),
(19, 'RAUL', 'GONZALEZ', '4579064', '0981445590', 'BARRIO SAN JUAN', 'rg@gmail.com', '202cb962ac59075b964b07152d234b70', 2, 1, 'INACTIVO'),
(20, 'EFIGENIO', 'NUÑEZ', '4579065', '0992962777', 'BARRIO COSTA ALEGRE', 'en@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 3, 1, 'ACTIVO'),
(21, 'MARIA', 'BOGADO', '4791925', '0992123456', 'TTE FARIñA', 'mb@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 2, 1, 'INACTIVO'),
(23, 'GUSTAVO', 'DAVALOS', '4555666', '0971444666', 'BARRIO COSTA ALEGRE', 'gd@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 4, 1, 'ACTIVO'),
(25, 'GUSTAVO', 'GONZALEZ', '12345678', '0971123456', ' AV. CENTRAL 123', 'gg@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 5, 1, 'ACTIVO'),
(26, 'JUAN ALBERTO', 'PEREZ ROA', '444444', '0971987654', ' BARRIO SANTA LUCIA', 'japr@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 1, 1, 'ACTIVO'),
(27, 'EVER', 'RIVEROS', '4579035', '0981322311', 'BARRIO SAN MIGUEL', 'er@gmail.com', '300fc1e5513fb4a7ed236ad0ecd83bb2', 2, 1, 'ACTIVO'),
(28, 'HECTOR', 'GONZALEZ', '4579050', '0981223322', 'BARRIO CENTRO', 'hg@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 2, 1, 'ACTIVO'),
(29, 'EVER', 'GODOY', '4531622', '0981970454', 'BARRIO CENTRO', 'eg@gmail.com', 'dbda57a13897e26b1c2db4788f91d627', 5, 1, 'ACTIVO'),
(30, 'NELSON', 'ZACARIAS', '1678094', '0971444666', 'AVDA. HECTOR ROQUE DUARTE', 'nz@gmail.com', '729f8ddb3b0a25f0441bc0933ffffb8c', 2, 1, 'ACTIVO');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
