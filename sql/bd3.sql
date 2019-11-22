-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2019 at 02:47 AM
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
-- Database: `prueba`
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
  `idEnvio` int(11) NOT NULL,
  `remitente` varchar(40) DEFAULT NULL,
  `destinatario` varchar(40) DEFAULT NULL,
  `fechaTiempo` datetime DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEnvio`),
  KEY `idPersona` (`idPersona`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` int(11) NOT NULL,
  `correo` varchar(40) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `contrasena` varchar(15) DEFAULT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `apPaterno` varchar(15) DEFAULT NULL,
  `apMaterno` varchar(15) DEFAULT NULL,
  `edad` varchar(3) DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idPersona`, `correo`, `fechaNacimiento`, `contrasena`, `nombre`, `apPaterno`, `apMaterno`, `edad`, `genero`) VALUES
(1, 'joelcito@hotmail.com', '1999-11-13', 'joelcitoMaximo', 'Joel', 'Rar', 'Mar', '20', '0'),
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
  `idPostal` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `cate` varchar(30) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `idEnvio` int(11) DEFAULT NULL,
  `nEnvios` int(3) DEFAULT NULL,
  PRIMARY KEY (`idPostal`),
  KEY `idEnvio` (`idEnvio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postal`
--

INSERT INTO `postal` (`idPostal`, `nombre`, `cate`, `likes`, `estado`, `idEnvio`, `nEnvios`) VALUES
(1, 'Postal_1', 'amor', 5, '0', 1, 6),
(2, 'Postal_2', 'amistad', 1, '0', 2, 2),
(3, 'Postal_3', 'amistad', 6, '0', 3, 5),
(4, 'Postal_4', 'felicitaciones', 5, '0', 4, 2),
(5, 'Postal_5', 'amor', 0, '0', 5, 0),
(6, 'Postal_6', 'amistad', 4, '0', 5, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
