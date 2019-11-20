-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 20, 2019 at 08:27 PM
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
-- Database: `bd3`
--

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
  `genero` int(11) DEFAULT NULL,
  `contrasena` varchar(15) DEFAULT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `apPaterno` varchar(15) DEFAULT NULL,
  `apMaterno` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`idPersona`, `correo`, `fechaNacimiento`, `genero`, `contrasena`, `nombre`, `apPaterno`, `apMaterno`) VALUES
(1, 'joelcito@hotmail.com', '1999-11-13', 1, 'joelcitoMaximo', 'Joel', 'Rar', 'Mar');

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
  PRIMARY KEY (`idPostal`),
  KEY `idEnvio` (`idEnvio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
