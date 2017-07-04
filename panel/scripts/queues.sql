-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-07-2017 a las 22:44:22
-- Versión del servidor: 5.5.55-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `asterisk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `queues_table`
--

CREATE TABLE IF NOT EXISTS `queues_table` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `musiconhold` varchar(128) DEFAULT NULL,
  `announce` varchar(128) DEFAULT NULL,
  `context` varchar(128) DEFAULT NULL,
  `timeout` int(11) DEFAULT NULL,
  `monitor_join` tinyint(1) DEFAULT NULL,
  `monitor_format` varchar(128) DEFAULT NULL,
  `queue_youarenext` varchar(128) DEFAULT NULL,
  `queue_thereare` varchar(128) DEFAULT NULL,
  `queue_callswaiting` varchar(128) DEFAULT NULL,
  `queue_holdtime` varchar(128) DEFAULT NULL,
  `queue_minutes` varchar(128) DEFAULT NULL,
  `queue_seconds` varchar(128) DEFAULT NULL,
  `queue_lessthan` varchar(128) DEFAULT NULL,
  `queue_thankyou` varchar(128) DEFAULT NULL,
  `queue_reporthold` varchar(128) DEFAULT NULL,
  `announce_frequency` int(11) DEFAULT NULL,
  `announce_round_seconds` int(11) DEFAULT NULL,
  `announce_holdtime` varchar(128) DEFAULT NULL,
  `retry` int(11) DEFAULT NULL,
  `wrapuptime` int(11) DEFAULT NULL,
  `maxlen` int(11) DEFAULT NULL,
  `servicelevel` int(11) DEFAULT NULL,
  `strategy` varchar(128) DEFAULT NULL,
  `joinempty` varchar(128) DEFAULT NULL,
  `leavewhenempty` varchar(128) DEFAULT NULL,
  `eventmemberstatus` tinyint(1) DEFAULT NULL,
  `eventwhencalled` tinyint(1) DEFAULT NULL,
  `reportholdtime` tinyint(1) DEFAULT NULL,
  `memberdelay` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `timeoutrestart` tinyint(1) DEFAULT NULL,
  `periodic_announce` varchar(50) DEFAULT NULL,
  `periodic_announce_frequency` int(11) DEFAULT NULL,
  `ringinuse` tinyint(1) DEFAULT NULL,
  `setinterfacevar` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `queues_table`
--

-- INSERT INTO `queues_table` (`id`, `name`, `musiconhold`, `announce`, `context`, `timeout`, `monitor_join`, `monitor_format`, `queue_youarenext`, `queue_thereare`, `queue_callswaiting`, `queue_holdtime`, `queue_minutes`, `queue_seconds`, `queue_lessthan`, `queue_thankyou`, `queue_reporthold`, `announce_frequency`, `announce_round_seconds`, `announce_holdtime`, `retry`, `wrapuptime`, `maxlen`, `servicelevel`, `strategy`, `joinempty`, `leavewhenempty`, `eventmemberstatus`, `eventwhencalled`, `reportholdtime`, `memberdelay`, `weight`, `timeoutrestart`, `periodic_announce`, `periodic_announce_frequency`, `ringinuse`, `setinterfacevar`) VALUES
-- (2, '900', 'default', 'thank-you-message', 'internas', 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 0, 'once', 10, 2, 0, NULL, 'ringall', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 10, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `queues_table`
--
ALTER TABLE `queues_table`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `queues_table`
--
ALTER TABLE `queues_table`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
