-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-10-2019 a las 12:48:43
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pregunta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `idpregunta` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(180) COLLATE utf8_bin NOT NULL,
  `idusuario` int(11) NOT NULL,
  PRIMARY KEY (`idpregunta`),
  KEY `usuariopregunta` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idpregunta`, `pregunta`, `idusuario`) VALUES
(1, '¿Qué calificación mereces?', 1),
(2, '¿A las cuantas vueltas se echa un perro?', 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pregunta_respuesta`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `pregunta_respuesta`;
CREATE TABLE IF NOT EXISTS `pregunta_respuesta` (
`idpregunta` int(11)
,`pregunta` varchar(180)
,`respuesta` varchar(180)
,`voto` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `idrespuesta` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(180) COLLATE utf8_bin NOT NULL,
  `voto` int(11) NOT NULL DEFAULT '0',
  `idpregunta` int(11) NOT NULL,
  PRIMARY KEY (`idrespuesta`),
  KEY `pregunta` (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idrespuesta`, `respuesta`, `voto`, `idpregunta`) VALUES
(1, '10', 3, 1),
(2, '9', 1, 1),
(3, '7', 1, 1),
(4, '6', 0, 1),
(5, 'No sé', 0, 2),
(6, 'Dos veces', 1, 2),
(7, 'Tres veces', 0, 2),
(8, 'A la última!!! XDXDDXDXDD', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(45) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'oscar', '12345');

-- --------------------------------------------------------

--
-- Estructura para la vista `pregunta_respuesta`
--
DROP TABLE IF EXISTS `pregunta_respuesta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pregunta_respuesta`  AS  select `preguntas`.`idpregunta` AS `idpregunta`,`preguntas`.`pregunta` AS `pregunta`,`respuestas`.`respuesta` AS `respuesta`,`respuestas`.`voto` AS `voto` from (`preguntas` join `respuestas` on((`preguntas`.`idpregunta` = `respuestas`.`idpregunta`))) ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuesta` FOREIGN KEY (`idpregunta`) REFERENCES `preguntas` (`idpregunta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
