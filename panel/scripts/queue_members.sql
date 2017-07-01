-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-07-2017 a las 22:45:16
-- Versión del servidor: 5.5.55-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `asterisk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queue_members`
--

CREATE TABLE IF NOT EXISTS `queue_members` (
`uniqueid` int(10) unsigned NOT NULL,
  `membername` varchar(40) DEFAULT NULL,
  `queue_name` varchar(128) DEFAULT NULL,
  `interface` varchar(128) DEFAULT NULL,
  `penalty` int(11) DEFAULT NULL,
  `paused` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `queue_members`
--

INSERT INTO `queue_members` (`uniqueid`, `membername`, `queue_name`, `interface`, `penalty`, `paused`) VALUES


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `queue_members`
--
ALTER TABLE `queue_members`
 ADD PRIMARY KEY (`uniqueid`), ADD UNIQUE KEY `queue_interface` (`queue_name`,`interface`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `queue_members`
--
ALTER TABLE `queue_members`
MODIFY `uniqueid` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
