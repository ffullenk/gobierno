-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2010 a las 17:33:35
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ejercicios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cargo`
--

CREATE TABLE IF NOT EXISTS `tb_cargo` (
  `IDCARGO` smallint(7) NOT NULL AUTO_INCREMENT,
  `CARGO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADOCARGO` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDCARGO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `tb_cargo`
--

INSERT INTO `tb_cargo` (`IDCARGO`, `CARGO`, `ESTADOCARGO`) VALUES
(1, 'DIRECTOR REGIONAL', 'A'),
(2, 'DIRECTOR PROVINCIAL', 'A'),
(3, 'DIRECTOR COMUNAL', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cobertura`
--

CREATE TABLE IF NOT EXISTS `tb_cobertura` (
  `IDCOBERTURA` smallint(7) NOT NULL AUTO_INCREMENT,
  `COBERTURA` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADOCOBERTURA` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDCOBERTURA`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `tb_cobertura`
--

INSERT INTO `tb_cobertura` (`IDCOBERTURA`, `COBERTURA`, `ESTADOCOBERTURA`) VALUES
(1, 'LOCAL-INSTITUCION', 'A'),
(2, 'COMUNAL', 'A'),
(3, 'PROVINCIAL', 'A'),
(4, 'REGIONAL', 'A'),
(5, 'NACIONAL', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_colaboradores`
--

CREATE TABLE IF NOT EXISTS `tb_colaboradores` (
  `IDCOLABORADOR` smallint(7) NOT NULL AUTO_INCREMENT,
  `COLABORADOR` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IDCARGO` smallint(7) NOT NULL,
  `ESTADOCOLABORADOR` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDCOLABORADOR`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `tb_colaboradores`
--

INSERT INTO `tb_colaboradores` (`IDCOLABORADOR`, `COLABORADOR`, `IDCARGO`, `ESTADOCOLABORADOR`) VALUES
(1, 'MAURICIO MIRANDA', 3, 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_conteoejercicio`
--

CREATE TABLE IF NOT EXISTS `tb_conteoejercicio` (
  `IDCONTEOEJERCICIO` bigint(11) NOT NULL AUTO_INCREMENT,
  `IDEJERCICIO` bigint(11) NOT NULL,
  `CONTEO_CIVILES` bigint(11) NOT NULL,
  `CONTEO_ESCOLARES` bigint(11) NOT NULL,
  `FECHAHORA` datetime NOT NULL,
  PRIMARY KEY (`IDCONTEOEJERCICIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_conteoejercicio`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_conteosubzona`
--

CREATE TABLE IF NOT EXISTS `tb_conteosubzona` (
  `IDCONTEOSUBZONA` bigint(11) NOT NULL AUTO_INCREMENT,
  `IDSUBZONAEJERCICIO` bigint(11) NOT NULL,
  `CONTEO_CIVILES` bigint(11) NOT NULL,
  `CONTEO_ESCOLARES` bigint(11) NOT NULL,
  `FECHAHORA` datetime NOT NULL,
  PRIMARY KEY (`IDCONTEOSUBZONA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_conteosubzona`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_conteozona`
--

CREATE TABLE IF NOT EXISTS `tb_conteozona` (
  `IDCONTEOZONA` bigint(11) NOT NULL AUTO_INCREMENT,
  `IDZONAEJERCICIO` bigint(11) NOT NULL,
  `CONTEO_CIVILES` bigint(11) NOT NULL,
  `CONTEO_ESCOLARES` bigint(11) NOT NULL,
  `FECHAHORA` datetime NOT NULL,
  PRIMARY KEY (`IDCONTEOZONA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_conteozona`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ejercicios`
--

CREATE TABLE IF NOT EXISTS `tb_ejercicios` (
  `IDEJERCICIO` bigint(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `NOMBREEJERCICIO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FECHAEJERCICIO` datetime NOT NULL,
  `HORAINICIO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `HORATERMINO` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `IDCOBERTURA` smallint(7) NOT NULL,
  `IDORGANIZADOR` smallint(7) NOT NULL,
  `TOTALEVACUADOS` int(7) NOT NULL,
  `FECHACREACION` datetime NOT NULL,
  `HORACREACION` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `IDENCARGADO` smallint(7) NOT NULL,
  PRIMARY KEY (`IDEJERCICIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_ejercicios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_encargados`
--

CREATE TABLE IF NOT EXISTS `tb_encargados` (
  `IDENCARGADO` smallint(7) NOT NULL AUTO_INCREMENT,
  `IDCARGO` smallint(7) NOT NULL,
  `TIPOCUENTA` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `CUENTA` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `CLAVE` varchar(36) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADOENCARGADO` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDENCARGADO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `tb_encargados`
--

INSERT INTO `tb_encargados` (`IDENCARGADO`, `IDCARGO`, `TIPOCUENTA`, `NOMBRE`, `CUENTA`, `CLAVE`, `ESTADOENCARGADO`) VALUES
(1, 2, 'S', 'Luis Jimenez Villalobos', 'ljimenez', '99zgvixvHziyzozk939188', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_organizador`
--

CREATE TABLE IF NOT EXISTS `tb_organizador` (
  `IDORGANIZADOR` smallint(7) NOT NULL AUTO_INCREMENT,
  `ORGANIZADOR` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADOORGANIZADOR` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDORGANIZADOR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_organizador`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_subzonaejercicio`
--

CREATE TABLE IF NOT EXISTS `tb_subzonaejercicio` (
  `IDSUBZONAEJERCICIO` bigint(11) NOT NULL AUTO_INCREMENT,
  `IDZONAEJERCICIO` bigint(11) NOT NULL,
  `NOMBRESUBZONA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FECHACREACION` datetime NOT NULL,
  `ESTADOSUBZONA` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDSUBZONAEJERCICIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_subzonaejercicio`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_zonaejercicio`
--

CREATE TABLE IF NOT EXISTS `tb_zonaejercicio` (
  `IDZONAEJERCICIO` bigint(11) NOT NULL AUTO_INCREMENT,
  `IDREGION` smallint(3) NOT NULL,
  `IDPROVINCIA` smallint(3) NOT NULL,
  `IDCOMUNA` smallint(3) NOT NULL,
  `NOMBREZONA` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `FECHACREACION` datetime NOT NULL,
  `IDENCARGADO` smallint(7) NOT NULL,
  `IDEJERCICIO` bigint(11) NOT NULL,
  `IDCOLABORADOR` smallint(7) NOT NULL,
  `ESTAADOZONA` char(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`IDZONAEJERCICIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `tb_zonaejercicio`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
