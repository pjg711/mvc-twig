-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-01-2019 a las 01:51:07
-- Versión del servidor: 5.7.24-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.33-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cifasis_actual_05052017`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cifasis_resumenes`
--

CREATE TABLE `cifasis_resumenes` (
  `id_resumen` bigint(10) UNSIGNED NOT NULL,
  `id_persona` bigint(10) UNSIGNED NOT NULL DEFAULT '0',
  `id_grupo` bigint(10) UNSIGNED NOT NULL DEFAULT '0',
  `activo` int(1) NOT NULL DEFAULT '0',
  `id_idioma` bigint(10) UNSIGNED NOT NULL DEFAULT '0',
  `area` varchar(100) DEFAULT NULL COMMENT 'puede ser: instituto, personal, grupos',
  `componente` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `resumen_es` json DEFAULT NULL,
  `resumen_in` json DEFAULT NULL,
  `resumen_fr` json DEFAULT NULL,
  `orden` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `config` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tabla con resumenes';

--
-- Volcado de datos para la tabla `cifasis_resumenes`
--

INSERT INTO `cifasis_resumenes` (`id_resumen`, `id_persona`, `id_grupo`, `activo`, `id_idioma`, `area`, `componente`, `resumen_es`, `resumen_in`, `resumen_fr`, `orden`, `config`) VALUES
(215, 0, 0, 1, 0, 'personal', 'sexo', '{"sexo": "Masculino", "sigla": "M", "id_sexo": "1"}', '{"sexo": "Male", "sigla": "M", "id_sexo": "1"}', '{"sexo": "Male", "sigla": "M", "id_sexo": "1"}', 0, NULL),
(216, 0, 0, 1, 0, 'personal', 'sexo', '{"sexo": "Femenino", "sigla": "F", "id_sexo": "2"}', '{"sexo": "Female", "sigla": "F", "id_sexo": "2"}', '{"sexo": "Female", "sigla": "F", "id_sexo": "2"}', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cifasis_resumenes`
--
ALTER TABLE `cifasis_resumenes`
  ADD PRIMARY KEY (`id_resumen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cifasis_resumenes`
--
ALTER TABLE `cifasis_resumenes`
  MODIFY `id_resumen` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2009;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
