-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-07-2017 a las 22:39:14
-- Versión del servidor: 5.5.55-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `asterisk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cdr`
--

CREATE TABLE IF NOT EXISTS `cdr` (
`id` int(11) unsigned NOT NULL,
  `calldate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clid` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `src` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `dst` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `dcontext` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastapp` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `lastdata` varchar(200) COLLATE utf8_bin NOT NULL DEFAULT '',
  `duration` float unsigned DEFAULT NULL,
  `billsec` float unsigned DEFAULT NULL,
  `disposition` enum('ANSWERED','BUSY','FAILED','NO ANSWER','CONGESTION') COLLATE utf8_bin DEFAULT NULL,
  `channel` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `dstchannel` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `amaflags` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `accountcode` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `uniqueid` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '',
  `userfield` float unsigned DEFAULT NULL,
  `answer` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cdr`
--
ALTER TABLE `cdr`
 ADD PRIMARY KEY (`id`), ADD KEY `calldate` (`calldate`), ADD KEY `dst` (`dst`), ADD KEY `src` (`src`), ADD KEY `dcontext` (`dcontext`), ADD KEY `clid` (`clid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cdr`
--
ALTER TABLE `cdr`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
