-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-01-2019 a las 22:48:31
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
(195, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_granitto", "activo": "1", "nombre": "Aprendizaje Automatizado y Aplicaciones", "id_grupo": "1", "keywords": "", "id_inv_dir": "10", "link_corto": "/grupos/1", "descripcion": "<div class=\\"letra1\\" align=\\"left\\"> <p>El campo del Aprendizaje Automatizado (Machine Learning) es parte central de la nueva revolución tecnológica basada en el uso inteligente de la información. Tradicionalmente, los principales problemas que se investigan en esta área son los de reconocimiento de patrones o Clasificación, aproximación de funciones de variable continua o Regresión, y descubrimiento de estructuras ocultas en datos o Clustering. Lógicamente, el desarrollo de nuevos métodos y algoritmos se concentró en un principio en los problemas más simples o típicos de encontrar, por ejemplo en problemas estacionarios en el tiempo, con una abundante cantidad de ejemplos de los cuales aprender y con solo unas pocas clases bastante balanceadas entre si. Sin embargo, los nuevos tipos de datos provenientes de la genómica, la proteómica, los equipos de monitoreo continuo de sistemas críticos, etc., han introducido nuevos desafíos en el Aprendizaje Automatizado. Este proyecto propone el desarrollo de nuevos métodos (o la extensión de los métodos actuales cuando sea apropiado) para poder modelar eficientemente esta nueva clase de datos, incluyendo problemas de regresión y clasificación no estacionarios y/o con gran nivel de ruido, problemas de clasificación y clustering con un número extremadamente alto de variables de entrada, o problemas de clasificación con un importante desbalance entre clases. En todas las líneas del proyecto se incluyen aplicaciones a problemas actuales de gran interés tecnológico, abarcando áreas de la biotecnología, la agrotecnología y la industria siderúrgica.</p> </div>\\n", "id_division": "1", "link_acceso": "Aprendizaje-Automaticado-y-Aplicaciones"}', '{"grupo": "grupo_granitto", "activo": "1", "nombre": "Automated Learning and Applications", "id_grupo": "1", "keywords": "", "id_inv_dir": "10", "link_corto": "/grupos/1", "descripcion": "<div class=\\"letra1\\" align=\\"left\\"> <p>The field of Automated Learning (Machine Learning) is a central part of the new technological revolution based on the intelligent use of information. Traditionally, the main problems that are investigated in this area are those of pattern recognition or classification, function approximation or regression of continuous variables, and the discovery of hidden structures in data or Clustering. Logically, the development of new methods and algorithms are focused at first on the most simple and typical ones to find, for example in stationary problems in time, with an abundance of examples to learn from and with only a few classes fairly balanced between them. However, new types of data from genomics, proteomics and continuous monitoring equipment of critical systems have introduced new challenges in Automated Learning. This project proposes the development of new methods, or the extension of existing techniques when appropriate, to efficiently model this new kind of data, including unsteady regression classification problems or with great noise, clustering classification problems with an extremely high number of input variables or classification problems with a significant imbalance between classes. All lines of this project include applications to current issues of great technological interest, covering areas of biotechnology, agriculture and steel industries.</p> </div>\\n", "id_division": "1", "link_acceso": "Aprendizaje-Automatizado-y-Aplicaciones"}', '{"grupo": "grupo_granitto", "activo": "1", "nombre": "Apprentissage Automatisé et Applications", "id_grupo": "1", "keywords": "", "id_inv_dir": "10", "link_corto": "/grupos/1", "descripcion": "<div align=\\"left\\" class=\\"letra1\\"><p>Le domaine de l \'Apprentissage Automatisé (Machine  Learning) constitue le noyau de la nouvelle révolution technologique basée sur l \'usage intelligent de l \'information. Traditionnellement, les principaux probl èmes qui sont objet de  recherches dans ce domaine sont ceux de la reconnaissance de mod èles ou  Classification, approximation de fonctions de variable continue ou Régression,  et découverte de structures cachées dans des données ou Clustering.  Logiquement, le développement de nouvelles méthodes et algorithmes est centré, au début, sur les probl èmes les plus simples ou typiques, par exemple sur des probl èmes stationnaires dans le temps, avec une quantité abondante d \'exemples dont on peut apprendre, dont certains avec tr ès peu de classes qui possédent des quantité différentes. Cependant, les nouveaux types de données  provenant de la génomique, la protéomique, les équipements de surveillance  continue de syst èmes critiques, etc., ont introduit de nouveaux défis dans  l \'Apprentissage Automatisé. Ce projet propose le développement de nouvelles  méthodes (ou l \'extension des méthodes actuelles lorsqu \' pertinente) pour  pouvoir modeler efficacement ce nouveau type de données, tout en incluant les domaines de la bio-technologie, l\'agro-technologie et l\'industrie sidérurgique.</p></div>\\n", "id_division": "1", "link_acceso": "Aprendizaje-Automatizado-y-Aplicaciones"}', 0, NULL),
(1803, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_tapia", "activo": "1", "nombre": "Bioinformática y Agroinformática", "id_grupo": "2", "keywords": "", "id_inv_dir": "18", "link_corto": "/grupos/2", "id_division": "1", "link_acceso": "Bioinformatica-Agroinformatica"}', '{"link": "/grupos/2", "grupo": "grupo_tapia", "activo": "1", "nombre": "Bioinformatics & Agroinformatics", "id_grupo": "2", "keywords": "", "id_inv_dir": "18", "id_division": "1", "link_acceso": "Bioinformatica-Agroinformatica"}', '{"link": "/grupos/2", "grupo": "grupo_tapia", "activo": "1", "nombre": "Bioinformatique et informatique apliquée à l\'agriculture", "id_grupo": "2", "keywords": "", "id_inv_dir": "18", "id_division": "1", "link_acceso": "Bioinformatica-Agroinformatica"}', 0, NULL),
(1804, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_portapila", "activo": "1", "nombre": "Dinámica de Fluídos Computacional e Hidroinformática", "id_grupo": "3", "keywords": "", "id_inv_dir": "16", "link_corto": "/grupos/3", "id_division": "1", "link_acceso": "Dinamica-de-Fluidos-Computacional-e-Hidrodinamica", "id_imagen_grupo": 322}', '{"grupo": "grupo_portapila", "activo": "1", "nombre": "Dinámica de Fluídos Computacional e Hidroinformática", "id_grupo": "3", "keywords": "", "id_inv_dir": "16", "link_corto": "/grupos/3", "id_division": "1", "link_acceso": "Dinamica-de-Fluidos-Computacional-e-Hidrodinamica", "id_imagen_grupo": 322}', '{"grupo": "grupo_portapila", "activo": "1", "nombre": "Dinámica de Fluídos Computacional e Hidroinformática", "id_grupo": "3", "keywords": "", "id_inv_dir": "16", "link_corto": "/grupos/3", "id_division": "1", "link_acceso": "Dinamica-de-Fluidos-Computacional-e-Hidrodinamica", "id_imagen_grupo": 322}', 0, NULL),
(1805, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_gomez", "activo": "1", "nombre": "Procesamiento de Señales Multimedia", "id_grupo": "4", "keywords": "", "id_inv_dir": "9", "link_corto": "/grupos/4", "id_division": "1", "link_acceso": "Procesamiento-de-Seniales-Multimedia"}', '{"grupo": "grupo_gomez", "activo": "1", "nombre": "Procesamiento de Señales Multimedia", "id_grupo": "4", "keywords": "", "id_inv_dir": "9", "link_corto": "/grupos/4", "id_division": "1", "link_acceso": "Procesamiento-de-Seniales-Multimedia"}', '{"grupo": "grupo_gomez", "activo": "1", "nombre": "Procesamiento de Señales Multimedia", "id_grupo": "4", "keywords": "", "id_inv_dir": "9", "link_corto": "/grupos/4", "id_division": "1", "link_acceso": "Procesamiento-de-Seniales-Multimedia"}', 0, NULL),
(1806, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_casali", "activo": "1", "nombre": "Fundamentos y aplicaciones de la lógica y la programación", "id_grupo": "6", "keywords": "", "id_inv_dir": "5", "link_corto": "/grupos/6", "id_division": "1", "link_acceso": "Fundamentos-y-aplicaciones-de-la-logica-y-la-programacion"}', '{"link": "/grupos/6", "grupo": "grupo_casali", "activo": "1", "nombre": "Fundamentals and applications of logic and programming", "id_grupo": "6", "keywords": "", "id_inv_dir": "5", "id_division": "1", "link_acceso": "Fundamentos-y-aplicaciones-de-la-logica-y-la-programacion"}', '{"link": "/grupos/6", "grupo": "grupo_casali", "activo": "1", "nombre": "Fondements et applications de la logique et de programmation", "id_grupo": "6", "keywords": "", "id_inv_dir": "5", "id_division": "1", "link_acceso": "Fundamentos-y-aplicaciones-de-la-logica-y-la-programacion"}', 0, NULL),
(1807, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_cristia", "activo": "1", "nombre": "Ingeniería de Software", "id_grupo": "8", "keywords": "", "id_inv_dir": "7", "link_corto": "/grupos/8", "id_division": "2", "link_acceso": "Ingenieria-de-Software"}', '{"grupo": "grupo_cristia", "activo": "1", "nombre": "Software Engineering", "id_grupo": "8", "keywords": "", "id_inv_dir": "7", "link_corto": "/grupos/8", "id_division": "2", "link_acceso": "Ingenieria-de-Software"}', '{"grupo": "grupo_cristia", "activo": "1", "nombre": "Ingénierie en software", "id_grupo": "8", "keywords": "", "id_inv_dir": "7", "link_corto": "/grupos/8", "id_division": "2", "link_acceso": "Ingenieria-de-Software"}', 0, NULL),
(1808, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_aragone", "activo": "1", "nombre": "Optimización y Control", "id_grupo": "9", "keywords": "", "id_inv_dir": "2", "link_corto": "/grupos/9", "id_division": "2", "link_acceso": "Optimizacion-y-Control"}', '{"grupo": "grupo_aragone", "activo": "1", "nombre": "Optimization and Control", "id_grupo": "9", "keywords": "", "id_inv_dir": "2", "link_corto": "/grupos/9", "id_division": "2", "link_acceso": "Optimizacion-y-Control"}', '{"grupo": "grupo_aragone", "activo": "1", "nombre": "Optimisation et contrôle", "id_grupo": "9", "keywords": "", "id_inv_dir": "2", "link_corto": "/grupos/9", "id_division": "2", "link_acceso": "Optimizacion-y-Control"}', 0, NULL),
(1809, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_kofman", "activo": "1", "nombre": "Simulación y Control de Sistemas Dinámicos", "id_grupo": "10", "keywords": "", "id_inv_dir": "13", "link_corto": "/grupos/10", "id_division": "2", "link_acceso": "Simulacion-y-Control-de-Sistemas-Dinamicos"}', '{"grupo": "grupo_kofman", "activo": "1", "nombre": "Simulation and Control of Dynamic Systems", "id_grupo": "10", "keywords": "", "id_inv_dir": "13", "link_corto": "/grupos/10", "id_division": "2", "link_acceso": "Simulacion-y-Control-de-Sistemas-Dinamicos"}', '{"grupo": "grupo_kofman", "activo": "1", "nombre": "Simulation et Contrôle de Systèmes Dynamiques", "id_grupo": "10", "keywords": "", "id_inv_dir": "13", "link_corto": "/grupos/10", "id_division": "2", "link_acceso": "Simulacion-y-Control-de-Sistemas-Dinamicos"}', 0, NULL),
(1810, 0, 0, 1, 0, 'grupos', 'grupo', '{"grupo": "grupo_zumoffen", "activo": "1", "nombre": "Ingeniería de Sistemas de Procesos", "id_grupo": "14", "keywords": "", "id_inv_dir": "19", "link_corto": "/grupos/14", "id_division": "2", "link_acceso": "Ingenieria-de-Sistemas-de-Procesos"}', '{"grupo": "grupo_zumoffen", "activo": "1", "nombre": "Process Systems Engineering", "id_grupo": "14", "keywords": "", "id_inv_dir": "19", "link_corto": "/grupos/14", "id_division": "2", "link_acceso": "Ingenieria-de-Sistemas-de-Procesos"}', '{"grupo": "grupo_zumoffen", "activo": "1", "nombre": "Process Systems Ingénierie", "id_grupo": "14", "keywords": "", "id_inv_dir": "19", "link_corto": "/grupos/14", "id_division": "2", "link_acceso": "Ingenieria-de-Sistemas-de-Procesos"}', 0, NULL),
(1929, 0, 0, 0, 0, 'grupos', 'grupo', '{"link": "/grupos/5", "grupo": "grupo_sanmartin", "activo": "0", "nombre": "Dispositivos Hipermediales Dinámicos", "id_grupo": "5", "keywords": "", "id_inv_dir": "17", "id_division": "2"}', '{"link": "/grupos/5", "grupo": "grupo_sanmartin", "activo": "0", "nombre": "Dispositivos Hipermediales Dinámicos", "id_grupo": "5", "keywords": "", "id_inv_dir": "17", "id_division": "2"}', '{"link": "/grupos/5", "grupo": "grupo_sanmartin", "activo": "0", "nombre": "Dispositivos Hipermediales Dinámicos", "id_grupo": "5", "keywords": "", "id_inv_dir": "17", "id_division": "2"}', 0, NULL),
(1931, 0, 0, 0, 0, 'grupos', 'grupo', '{"grupo": "grupo_informatica", "activo": "0", "nombre": "Informatica CIFASIS", "id_grupo": "12", "keywords": "", "id_inv_dir": "61", "link_corto": "/grupos/12", "descripcion": "", "id_division": "", "link_acceso": ""}', '{"grupo": "grupo_informatica", "activo": "0", "nombre": "Informatica CIFASIS", "id_grupo": "12", "keywords": "", "id_inv_dir": "61", "link_corto": "/grupos/12", "descripcion": "", "id_division": "", "link_acceso": ""}', '{"grupo": "grupo_informatica", "activo": "0", "nombre": "Informatica CIFASIS", "id_grupo": "12", "keywords": "", "id_inv_dir": "61", "link_corto": "/grupos/12", "descripcion": "", "id_division": "", "link_acceso": ""}', 0, NULL);

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
