-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 01-09-2021 a las 23:03:17
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistente_sesion`
--

DROP TABLE IF EXISTS `asistente_sesion`;
CREATE TABLE IF NOT EXISTS `asistente_sesion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idasistente` int(10) NOT NULL COMMENT 'Numero del Documento',
  `idevento` int(13) NOT NULL COMMENT 'Codigo del Evento',
  `idsesion` varchar(13) NOT NULL COMMENT 'Codigo de la Sesion',
  `tipoid` varchar(4) DEFAULT NULL COMMENT 'Tipo de Documento',
  `nombre` varchar(800) DEFAULT NULL COMMENT 'Nombre del asistente',
  `correo` varchar(800) DEFAULT NULL COMMENT 'Correo',
  `celular` varchar(30) DEFAULT NULL COMMENT 'Celular',
  `genero` varchar(20) DEFAULT NULL COMMENT 'Genero',
  `idinstitucion` int(5) DEFAULT NULL COMMENT 'Codigo de la Institución',
  PRIMARY KEY (`id`,`idasistente`,`idevento`,`idsesion`),
  KEY `idinstitucionasis` (`nombre`),
  KEY `institucionidsesion` (`idinstitucion`),
  KEY `evfe121` (`idevento`),
  KEY `asistente_sesion_1` (`idasistente`,`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
CREATE TABLE IF NOT EXISTS `ciudad` (
  `idciudad` int(3) NOT NULL COMMENT 'Codigo de la Ciudad',
  `nombre` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nombre de la Ciudad',
  PRIMARY KEY (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `nombre`) VALUES
(1, 'Santiago de Cali'),
(2, 'Bogota'),
(3, 'Barranquilla'),
(4, 'Cartagena'),
(5, 'Cúcuta'),
(6, 'Pereira'),
(7, 'Socorro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencistas`
--

DROP TABLE IF EXISTS `conferencistas`;
CREATE TABLE IF NOT EXISTS `conferencistas` (
  `foto` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `cedula` varchar(30) NOT NULL COMMENT 'Numero de Indentificación',
  `nombre` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nombre',
  `celular1` varchar(30) DEFAULT NULL COMMENT 'Celular 1',
  `celular2` varchar(30) DEFAULT NULL COMMENT 'Celular 2',
  `correo` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Correo',
  `linkedin` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'LinkedIn',
  `perfil` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Perfil del Conferencista',
  `pais` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Codigo del Pais',
  PRIMARY KEY (`cedula`),
  KEY `conferencistapais` (`pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

DROP TABLE IF EXISTS `entidad`;
CREATE TABLE IF NOT EXISTS `entidad` (
  `identidad` int(10) NOT NULL AUTO_INCREMENT,
  `nombreentidad` varchar(800) CHARACTER SET latin2 DEFAULT NULL,
  `url` varchar(800) CHARACTER SET latin2 DEFAULT NULL,
  `idciudad` int(10) DEFAULT NULL,
  PRIMARY KEY (`identidad`),
  KEY `entidad_ciudad` (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

DROP TABLE IF EXISTS `evento`;
CREATE TABLE IF NOT EXISTS `evento` (
  `idevento` int(13) NOT NULL AUTO_INCREMENT COMMENT 'Codigo del Evento',
  `nombreevento` varchar(800) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre del Evento',
  `idtipoeve` int(10) DEFAULT NULL COMMENT 'Id Tipo de Evento',
  `certificado` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT '¿Realiza Certificado? Si(1) No(0)',
  `generalinfo` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Descripción del Evento',
  `tematica` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Tema del Evento',
  `responsable` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Responsable',
  `estado` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Estado del Evento',
  `idciudad` int(3) DEFAULT NULL COMMENT 'Codigo de la Ciudad',
  `O_tipo` varchar(50) NOT NULL,
  `registro` varchar(30) NOT NULL,
  PRIMARY KEY (`idevento`),
  KEY `certificado` (`certificado`),
  KEY `asdsss` (`estado`),
  KEY `tipoeve123` (`idtipoeve`),
  KEY `123asd` (`idciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_conferencistas`
--

DROP TABLE IF EXISTS `evento_conferencistas`;
CREATE TABLE IF NOT EXISTS `evento_conferencistas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(800) NOT NULL COMMENT 'Nombre del Conferencista',
  `idevento` int(13) NOT NULL COMMENT 'Codigo del evento',
  `conferencia` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nombre de la Conferencia',
  `duracion` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Duración de la Conferencia',
  PRIMARY KEY (`id`,`idevento`),
  KEY `cedulaconf` (`nombre`),
  KEY `idcodigoconf` (`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_entidades`
--

DROP TABLE IF EXISTS `evento_entidades`;
CREATE TABLE IF NOT EXISTS `evento_entidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entidad` int(800) NOT NULL COMMENT 'Entidad',
  `idevento` int(13) NOT NULL,
  PRIMARY KEY (`id`,`idevento`),
  KEY `entidades` (`entidad`),
  KEY `eventoentidades2` (`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_foto`
--

DROP TABLE IF EXISTS `evento_foto`;
CREATE TABLE IF NOT EXISTS `evento_foto` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idevento` int(15) NOT NULL,
  `nombre` varchar(800) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tipo` varchar(800) DEFAULT NULL,
  `detalles` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`,`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_programas`
--

DROP TABLE IF EXISTS `evento_programas`;
CREATE TABLE IF NOT EXISTS `evento_programas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programa` int(800) NOT NULL COMMENT 'Programa',
  `idevento` int(13) NOT NULL COMMENT 'Codigo del Evento',
  PRIMARY KEY (`id`,`programa`,`idevento`),
  KEY `evento12` (`idevento`),
  KEY `evento123` (`programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_sesion`
--

DROP TABLE IF EXISTS `evento_sesion`;
CREATE TABLE IF NOT EXISTS `evento_sesion` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Sesion',
  `idevento` int(13) NOT NULL COMMENT 'Codigo del Evento',
  `nombresesion` varchar(800) CHARACTER SET latin1 NOT NULL COMMENT 'Nombre de la Sesión',
  `audsalon` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'lugar',
  `horainicio` time DEFAULT NULL COMMENT 'Hora Inicio',
  `horafin` time DEFAULT NULL COMMENT 'Hora Fin',
  `fechainicio` date DEFAULT NULL COMMENT 'Fecha Inicio',
  `fechafin` date DEFAULT NULL COMMENT 'Fecha Fin',
  `observacion` varchar(800) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Observación',
  `posicion` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`,`idevento`),
  KEY `id` (`id`),
  KEY `evento_sesion` (`idevento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_tipo`
--

DROP TABLE IF EXISTS `evento_tipo`;
CREATE TABLE IF NOT EXISTS `evento_tipo` (
  `idtipoeve` int(3) NOT NULL COMMENT 'Codigo del Tipo del Evento',
  `nombretipo` varchar(15) CHARACTER SET latin1 DEFAULT NULL COMMENT 'Nombre del tipo de Evento',
  PRIMARY KEY (`idtipoeve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento_tipo`
--

INSERT INTO `evento_tipo` (`idtipoeve`, `nombretipo`) VALUES
(1, 'Reunión'),
(2, 'Conferencia'),
(3, 'Taller'),
(4, 'Congreso'),
(5, 'Reunión Virtual'),
(6, 'Otros Eventos'),
(7, 'Externo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_usuario`
--

DROP TABLE IF EXISTS `evento_usuario`;
CREATE TABLE IF NOT EXISTS `evento_usuario` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idusuario` int(10) DEFAULT NULL,
  `idevento` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento_usuario` (`idevento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_educativa`
--

DROP TABLE IF EXISTS `institucion_educativa`;
CREATE TABLE IF NOT EXISTS `institucion_educativa` (
  `idinstitucion` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Codigo de la Institución',
  `nombre` varchar(800) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Nombre',
  `telefono` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Telefono',
  `direccion` varchar(800) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Direccion de la Instititución',
  `idciudad` int(10) NOT NULL COMMENT 'Codigo Ciudad',
  PRIMARY KEY (`idinstitucion`,`idciudad`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `institucion_educativa`
--

INSERT INTO `institucion_educativa` (`idinstitucion`, `nombre`, `telefono`, `direccion`, `idciudad`) VALUES
(0, 'Otro', NULL, NULL, 1),
(1, 'No Aplica', NULL, NULL, 1),
(2, ' Universidad Libre', '12345678', 'Cra. 37a ##3-29', 1),
(7, 'Otro', NULL, NULL, 2),
(8, 'Otro', NULL, NULL, 3),
(9, 'Otro', NULL, NULL, 4),
(10, 'Otro', NULL, NULL, 5),
(11, 'Otro', NULL, NULL, 6),
(12, 'Otro', NULL, NULL, 7),
(13, 'No Aplica', NULL, NULL, 2),
(14, 'No Aplica', NULL, NULL, 3),
(15, 'No Aplica', NULL, NULL, 4),
(16, 'No Aplica', NULL, NULL, 5),
(17, 'No Aplica', NULL, NULL, 6),
(18, 'No Aplica', NULL, NULL, 7),
(19, ' Universidad Libre', NULL, NULL, 2),
(20, ' Universidad Libre', NULL, NULL, 3),
(21, ' Universidad Libre', NULL, NULL, 4),
(22, ' Universidad Libre', NULL, NULL, 5),
(23, ' Universidad Libre', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pre_inscripcion`
--

DROP TABLE IF EXISTS `pre_inscripcion`;
CREATE TABLE IF NOT EXISTS `pre_inscripcion` (
  `idasistente` int(10) NOT NULL COMMENT 'Numero del Documento',
  `tipoid` varchar(10) DEFAULT NULL COMMENT 'Tipo de Documento',
  `nombre` varchar(800) DEFAULT NULL COMMENT 'Nombre del Asistente',
  `correo` varchar(800) DEFAULT NULL COMMENT 'Correo',
  `celular` varchar(15) DEFAULT NULL COMMENT 'Celular',
  `genero` varchar(20) DEFAULT NULL COMMENT 'Genero',
  `idinstitucion` int(4) DEFAULT NULL COMMENT 'Codigo de la Institución',
  `idevento` int(13) NOT NULL COMMENT 'Codigo del Evento',
  PRIMARY KEY (`idasistente`,`idevento`),
  KEY `pre_inscripcionevento` (`idevento`),
  KEY `institucionfk1` (`idinstitucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

DROP TABLE IF EXISTS `programas`;
CREATE TABLE IF NOT EXISTS `programas` (
  `idprograma` int(10) NOT NULL AUTO_INCREMENT,
  `nombreprograma` varchar(800) DEFAULT NULL,
  `url` varchar(8100) DEFAULT NULL,
  `idciudad` int(10) DEFAULT NULL,
  PRIMARY KEY (`idprograma`),
  KEY `programa_idciudad` (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `registro` varchar(800) DEFAULT NULL,
  `idciudad` int(5) DEFAULT NULL,
  `idasistente` varchar(12) DEFAULT NULL,
  `idevento` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `registro_pre_idevento` (`idevento`),
  KEY `registro_pre_ciudad` (`idciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `rol` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Colaborador'),
(3, 'sin permisos'),
(4, 'Administrador de Eventos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `clave` varchar(200) DEFAULT NULL,
  `rol_id` int(3) DEFAULT NULL,
  `idciudad` int(10) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idrol` (`rol_id`),
  KEY `usario_idciudad` (`idciudad`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `email`, `clave`, `rol_id`, `idciudad`, `foto`) VALUES
(1, 'Admin', 'Admin', 'RkMxa1lEZVpMYjcrTUl6MFBIczdjdz09', 1, 1, '1620623974_Foto.PNG');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD CONSTRAINT `entidad_ciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `idciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`),
  ADD CONSTRAINT `idtipoeve` FOREIGN KEY (`idtipoeve`) REFERENCES `evento_tipo` (`idtipoeve`);

--
-- Filtros para la tabla `evento_conferencistas`
--
ALTER TABLE `evento_conferencistas`
  ADD CONSTRAINT `conferencista_evento` FOREIGN KEY (`nombre`) REFERENCES `conferencistas` (`cedula`),
  ADD CONSTRAINT `evento_conferencista_1` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`);

--
-- Filtros para la tabla `evento_entidades`
--
ALTER TABLE `evento_entidades`
  ADD CONSTRAINT `entidad_evento` FOREIGN KEY (`entidad`) REFERENCES `entidad` (`identidad`),
  ADD CONSTRAINT `evento_entidad` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`);

--
-- Filtros para la tabla `evento_programas`
--
ALTER TABLE `evento_programas`
  ADD CONSTRAINT `evento_programa` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`),
  ADD CONSTRAINT `programa_evento` FOREIGN KEY (`programa`) REFERENCES `programas` (`idprograma`);

--
-- Filtros para la tabla `evento_sesion`
--
ALTER TABLE `evento_sesion`
  ADD CONSTRAINT `evento_sesion` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`);

--
-- Filtros para la tabla `evento_usuario`
--
ALTER TABLE `evento_usuario`
  ADD CONSTRAINT `evento_usuario` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`);

--
-- Filtros para la tabla `pre_inscripcion`
--
ALTER TABLE `pre_inscripcion`
  ADD CONSTRAINT `pre_evento` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`);

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `programa_idciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `registro_pre_ciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`),
  ADD CONSTRAINT `registro_pre_idevento` FOREIGN KEY (`idevento`) REFERENCES `evento` (`idevento`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `idrol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `usario_idciudad` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
