-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2014 a las 22:33:39
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoiden` varchar(34) NOT NULL,
  `identificacion` varchar(34) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fechanacimiento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `tipoiden`, `identificacion`, `nombre`, `apellido`, `celular`, `email`, `fechanacimiento`) VALUES
(14, 'TI', '325', 'Carlos', 'Benavidez', '1', 'carlos@hotmail.com', '2014-09-10'),
(15, 'CD', '3256', 'FRANCISCO JOSE', 'Ramos', '2', 'carlos@hotmail.com', '2014-09-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `placa` varchar(45) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `linea` int(11) NOT NULL,
  `modelo` int(11) NOT NULL,
  `chasis` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `trasmision` varchar(4) NOT NULL,
  `propietario_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `propietario_id` (`propietario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `marca`, `linea`, `modelo`, `chasis`, `color`, `trasmision`, `propietario_id`) VALUES
(6, '23ee', 'CH', 1, 3, 123, '#0080ff', 'AT', 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
