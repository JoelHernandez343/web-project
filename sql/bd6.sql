-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2019 at 06:09 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd6`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdmin` int(3) NOT NULL,
  `usuarioAdmin` varchar(15) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `usuarioAdmin`, `contrasena`, `status`) VALUES
(1, 'Admin', 'Admin', '0');

-- --------------------------------------------------------

--
-- Table structure for table `envios`
--

DROP TABLE IF EXISTS `envios`;
CREATE TABLE IF NOT EXISTS `envios` (
  `idEnvio` int(11) NOT NULL AUTO_INCREMENT,
  `remitente` varchar(40) DEFAULT NULL,
  `destinatario` varchar(40) DEFAULT NULL,
  `fechaTiempo` datetime DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idPostal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEnvio`),
  KEY `idPersona` (`idPersona`),
  KEY `idPostal` (`idPostal`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `envios`
--

INSERT INTO `envios` (`idEnvio`, `remitente`, `destinatario`, `fechaTiempo`, `idPersona`, `idPostal`) VALUES
(1, 'como@estas.com', 'jakfsj1o@oanfa.com', '2019-05-13 07:12:11', 9, 6),
(2, 'lolol@olo.com', '11@11.com', '2019-11-06 00:00:00', 5, 4),
(3, 'joelcito@hotmail.com', 'hola@adio.com', '2019-11-13 03:06:14', 1, 3),
(4, 'hola@adio.com', 'joelcito@hotmail.com', '2019-11-13 05:08:11', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(40) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `contrasena` varchar(15) DEFAULT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `apPaterno` varchar(15) DEFAULT NULL,
  `apMaterno` varchar(15) DEFAULT NULL,
  `edad` varchar(3) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idPersona`, `correo`, `fechaNacimiento`, `contrasena`, `nombre`, `apPaterno`, `apMaterno`, `edad`, `genero`) VALUES
(1, 'joelcito@hotmail.com', '1999-11-13', 'abcd', 'Joel', 'Rar', 'Mar', '20', '0'),
(8, 'hola@adio.com', '2019-11-05', 'hola', 'Juan', 'Perez', 'Perez', '19', '0'),
(9, 'como@estas.com', '2019-10-15', 'lallaala', 'Jennifer', 'Lopez', 'Lopez', '21', '1'),
(2, 'jakfsj1o@oanfa.com', '2019-09-24', 'ksajflkkaf', 'adriana', 'a', 'a', '20', '1'),
(3, 'jajaja@hehehe.com', '2019-11-05', 'hohoho', 'daniela', 'kek', 'kek', '20', '1'),
(5, 'lolol@olo.com', '2019-11-01', 'xdxdxxd', 'hugo', 'sss', 'sss', '22', '0'),
(11, '11@11.com', '2019-08-15', 'msmsmsms', 'luis', 'ss', 'ss', '20', '0'),
(99, '99@99.com', '2019-11-01', 'hola', 'sandra', 'p', 'p', '22', '1');

-- --------------------------------------------------------

--
-- Table structure for table `postal`
--

DROP TABLE IF EXISTS `postal`;
CREATE TABLE IF NOT EXISTS `postal` (
  `idPostal` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `cate` varchar(30) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `idEnvio` int(11) DEFAULT NULL,
  `nEnvios` int(3) DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPostal`),
  KEY `idEnvio` (`idEnvio`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postal`
--

INSERT INTO `postal` (`idPostal`, `nombre`, `cate`, `likes`, `estado`, `idEnvio`, `nEnvios`, `ruta`) VALUES
(1, 'amor(1)', 'amor_amistad', 5, '0', 1, 6, 'Postales\\amor_amistad'),
(2, 'amor(2)', 'amor_amistad', 1, '0', 2, 2, 'Postales\\amor_amistad'),
(3, 'animales(1)', 'animales', 6, '0', 3, 5, 'Postales\\Animales'),
(4, 'animales(1)', 'Conciencia_ambiental', 5, '0', 4, 2, 'Postales\\Conciencia_ambiental'),
(5, 'felicitacion(1)', 'Felicitaciones', 0, '0', 6, 0, 'Postales\\Felicitacion'),
(6, 'festividad(1)', 'Festividades', 4, '0', 5, 1, 'Postales\\Festividades'),
(7, 'invitaciones(1)', 'Invitaciones', 2, '0', 7, 15, 'Postales\\Invitaciones'),
(8, 'festividades(2)', 'Festividades', 3, '0', 8, 1, 'Postales\\Festividades');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
