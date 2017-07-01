-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-07-2017 a las 22:40:11
-- Versión del servidor: 5.5.55-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `asterisk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `extensions`
--

CREATE TABLE IF NOT EXISTS `extensions` (
`id` int(11) NOT NULL,
  `context` varchar(20) NOT NULL DEFAULT '',
  `exten` varchar(20) NOT NULL DEFAULT '',
  `priority` tinyint(4) NOT NULL DEFAULT '0',
  `app` varchar(20) NOT NULL DEFAULT '',
  `appdata` varchar(128) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `extensions`
--

INSERT INTO `extensions` (`id`, `context`, `exten`, `priority`, `app`, `appdata`) VALUES
(1, 'internas', '_[0-8]XX', 1, 'Dial', 'SIP/${EXTEN}'),
(2, 'internas', '_[0-8]XX', 2, 'Hangup', '');

-- (3, 'internas', '_3XXX', 8, 'Confbridge', '${EXTEN},my_bridge,my_user,sample_user_menu'),
-- (4, 'internas', '_3XXX', 6, 'Playback', 'conf-youareinconfnum'),
-- (5, 'internas', '_3XXX', 7, 'SayDigits', '${EXTEN}'),
-- (6, 'internas', '_3XXX', 1, 'MYSQL', 'connect connid localhost cursovoip 123 asterisk'),
-- (7, 'internas', '_3XXX', 2, 'MYSQL', 'query resultado ${connid} SELECT pin from meetme where confno=${EXTEN}'),
-- (8, 'internas', '_9XX', 1, 'Answer', ''),
-- (9, 'internas', '_3XXX', 5, 'Authenticate', '${pin},,4'),
-- (10, 'internas', '_3XXX', 3, 'Mysql', 'fetch asignacion ${resultado} pin'),
-- (11, 'internas', '_3XXX', 4, 'Noop', 'pin = ${pin}'),
-- (12, 'internas', '_9XX', 2, 'Queue', '${EXTEN},t'),

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `extensions`
--
ALTER TABLE `extensions`
 ADD PRIMARY KEY (`context`,`exten`,`priority`), ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `extensions`
--
ALTER TABLE `extensions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
