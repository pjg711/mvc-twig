-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-01-2019 a las 16:59:24
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
-- Estructura de tabla para la tabla `resumenes`
--

CREATE TABLE `resumenes` (
  `id_resumen` bigint(10) UNSIGNED NOT NULL,
  `id_idioma` bigint(10) UNSIGNED NOT NULL DEFAULT '0',
  `area` varchar(100) DEFAULT NULL,
  `componente` varchar(100) DEFAULT NULL,
  `resumen` json DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='tabla con resumenes';

--
-- Volcado de datos para la tabla `resumenes`
--
-- Inserto sexos
INSERT INTO `resumenes` (`id_resumen`, `id_idioma`, `area`, `componente`, `resumen`) VALUES
(0, 0, 'personal', 'sexo', '{"sexo": "Masculino", "sigla": "M", "id_sexo": "1"}'),
(1, 0, 'personal', 'sexo', '{"sexo": "Femenino", "sigla": "F", "id_sexo": "2"}');
-- Inserto grupos
INSERT INTO `resumenes` (`id_resumen`, `id_idioma`, `area`, `componente`, `resumen`) VALUES
(2, 0, 'grupos', 'grupo', '{"grupo": "grupo_1", "activo": "1", "nombre": "Grupo 1", "id_grupo": "1", "keywords": "", "id_inv_dir": "2", "link_corto": "/grupos/1", "descripcion": "Descripcion grupo 1"}'),
(3, 0, 'grupos', 'grupo', '{"grupo": "grupo_2", "activo": "1", "nombre": "Grupo 2", "id_grupo": "2", "keywords": "", "id_inv_dir": "4", "link_corto": "/grupos/2", "descripcion": "Descripcion grupo 2"}'),
(4, 0, 'grupos', 'grupo', '{"grupo": "grupo_3", "activo": "1", "nombre": "Grupo 3", "id_grupo": "3", "keywords": "", "id_inv_dir": "5", "link_corto": "/grupos/3", "descripcion": "Descripcion grupo 3"}');
-- Inserto personal
INSERT INTO `resumenes` (`id_resumen`, `id_idioma`, `area`, `componente`, `resumen`) VALUES
(5, 0, 'personal', 'persona', '{"beca": "", "pais": "Argentina", "tipo_objeto": "Persona", "activo": "1", "nombre": "Roberta", "titulo": "Dra.", "id_foto": "1", "id_pais": "1", "id_sexo": "2", "interno": "", "apellido": "Fulano", "director": "", "division": "", "id_grupo": "2", "codirector": "", "es_becario": false, "id_persona": "1", "pagina_web": "http://www.paginaweb.com", "cargo_extra": "Profesora Titular", "id_director": "0", "id_codirector": "0", "tipo_personal": "investigador", "es_investigador": true, "palabras_claves": "", "id_tipo_personal": "1", "mail_alternativo": "fulano@paginaweb.com", "telefono_laboral": "", "es_personal_apoyo": false, "otra_info_persona": "", "mail_institucional": "fulano@instituto.gov.ar", "tema_investigacion": "Tema de investigaci\u00f3n de Roberta Fulano", "resumen_investigacion": "", "titulo_nombre_apellido": "Dr. Roberta Fulano"}'),
(6, 0, 'personal', 'persona', '{"beca": "", "pais": "Argentina", "tipo_objeto": "Persona", "activo": "1", "nombre": "Patricia", "titulo": "Dra.", "id_foto": "2", "id_pais": "1", "id_sexo": "2", "interno": "", "apellido": "Mengano", "director": "", "division": "", "id_grupo": "2", "codirector": "", "es_becario": false, "id_persona": "2", "pagina_web": "http://www.paginawebfulano.com", "cargo_extra": "Profesora Titular", "id_director": "0", "id_codirector": "0", "tipo_personal": "investigador", "es_investigador": true, "palabras_claves": "", "id_tipo_personal": "1", "mail_alternativo": "mengana@paginaweb.com", "telefono_laboral": "", "es_personal_apoyo": false, "otra_info_persona": "", "mail_institucional": "mengano@instituto.gov.ar", "tema_investigacion": "Tema de investigaci\u00f3n de Patricia Mengano", "resumen_investigacion": "", "titulo_nombre_apellido": "Dra. Patricia Mengano"}'),
(7, 0, 'personal', 'persona', '{"beca": "", "pais": "Argentina", "tipo_objeto": "Persona", "activo": "1", "nombre": "Javier", "titulo": "Dr.", "id_foto": "3", "id_pais": "1", "id_sexo": "1", "interno": "", "apellido": "Sultano", "director": "", "division": "", "id_grupo": "2", "codirector": "", "es_becario": false, "id_persona": "3", "pagina_web": "http://www.paginawebsultano.com", "cargo_extra": "Profesor Titular", "id_director": "0", "id_codirector": "0", "tipo_personal": "investigador", "es_investigador": true, "palabras_claves": "", "id_tipo_personal": "1", "mail_alternativo": "sultano@paginaweb.com", "telefono_laboral": "", "es_personal_apoyo": false, "otra_info_persona": "", "mail_institucional": "sultano@instituto.gov.ar", "tema_investigacion": "Tema de investigaci\u00f3n de Javier Sultano", "resumen_investigacion": "", "titulo_nombre_apellido": "Dr. Javier Sultano"}'),
(8, 0, 'personal', 'persona', '{"beca": "", "pais": "Argentina", "tipo_objeto": "Persona", "activo": "1", "nombre": "Pedro", "titulo": "Dr.", "id_foto": "4", "id_pais": "1", "id_sexo": "1", "interno": "302", "apellido": "Bartolo", "director": "", "id_grupo": "1", "codirector": "", "es_becario": false, "id_persona": "4", "pagina_web": "http://www.paginawebbartolo.com", "cargo_extra": "Profesor Titular", "id_director": "0", "id_codirector": "0", "tipo_personal": "investigador", "es_investigador": true, "palabras_claves": "", "id_tipo_personal": "1", "mail_alternativo": "bartolo@paginaweb.com", "telefono_laboral": "", "es_personal_apoyo": false, "otra_info_persona": "", "mail_institucional": "bartolo@instituto.gov.ar", "tema_investigacion": "Tema de investigaci\u00f3n de Pedro Bartolo", "resumen_investigacion": "", "titulo_nombre_apellido": "Dr. Pedro Bartolo"}'),
(9, 0, 'personal', 'persona', '{"beca": "", "pais": "Argentina", "tipo_objeto": "Persona", "activo": "1", "nombre": "Pilar", "titulo": "Dra.", "id_foto": "5", "id_pais": "1", "id_sexo": "2", "interno": "305", "apellido": "Abraza", "director": "", "id_grupo": "1", "codirector": "", "es_becario": false, "id_persona": "5", "pagina_web": "http://www.paginawebabraza.com", "cargo_extra": "Profesor Adjunto", "id_director": "0", "id_codirector": "0", "tipo_personal": "investigador", "es_investigador": true, "palabras_claves": "", "id_tipo_personal": "1", "mail_alternativo": "abraza@paginaweb.com", "telefono_laboral": "", "es_personal_apoyo": false, "otra_info_persona": "", "mail_institucional": "abraza@instituto.gov.ar", "tema_investigacion": "Tema de investigaci\u00f3n de Pilar Abraza", "resumen_investigacion": "", "titulo_nombre_apellido": "Dra. Pilar Abraza"}');
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `resumenes`
--
ALTER TABLE `resumenes` ADD PRIMARY KEY (`id_resumen`);
--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `resumenes`
--
ALTER TABLE `resumenes` MODIFY `id_resumen` bigint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
