-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: bd5
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `administrador` (
  `idAdmin` int(3) NOT NULL,
  `usuarioAdmin` varchar(15) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'Admin','Admin','0');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `envios`
--

DROP TABLE IF EXISTS `envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `envios` (
  `idEnvio` int(11) NOT NULL,
  `remitente` varchar(40) DEFAULT NULL,
  `destinatario` varchar(40) DEFAULT NULL,
  `fechaTiempo` datetime DEFAULT NULL,
  `idPersona` int(11) DEFAULT NULL,
  `idPostal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idEnvio`),
  KEY `idPersona` (`idPersona`),
  KEY `idPostal` (`idPostal`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `envios`
--

LOCK TABLES `envios` WRITE;
/*!40000 ALTER TABLE `envios` DISABLE KEYS */;
/*!40000 ALTER TABLE `envios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `persona` (
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
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'joelcito@hotmail.com','1999-11-13','abcd','Joel','Rar','Mar','20','0'),(8,'hola@adio.com','2019-11-05','hola','Juan','Perez','Perez','19','0'),(9,'como@estas.com','2019-10-15','lallaala','Jennifer','Lopez','Lopez','21','1'),(2,'jakfsj1o@oanfa.com','2019-09-24','ksajflkkaf','adriana','a','a','20','1'),(3,'jajaja@hehehe.com','2019-11-05','hohoho','daniela','kek','kek','20','1'),(5,'lolol@olo.com','2019-11-01','xdxdxxd','hugo','sss','sss','22','0'),(11,'11@11.com','2019-08-15','msmsmsms','luis','ss','ss','20','0'),(99,'99@99.com','2019-11-01','hola','sandra','p','p','22','1');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postal`
--

DROP TABLE IF EXISTS `postal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `postal` (
  `idPostal` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `cate` varchar(30) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `estado` varchar(1) DEFAULT NULL,
  `idEnvio` int(11) DEFAULT NULL,
  `nEnvios` int(3) DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idPostal`),
  KEY `idEnvio` (`idEnvio`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postal`
--

LOCK TABLES `postal` WRITE;
/*!40000 ALTER TABLE `postal` DISABLE KEYS */;
INSERT INTO `postal` VALUES (1,'Postal_1','amor',5,'0',1,6,NULL),(2,'Postal_2','amistad',1,'0',2,2,NULL),(3,'Postal_3','amistad',6,'0',3,5,NULL),(4,'Postal_4','felicitaciones',5,'0',4,2,NULL),(5,'Postal_5','amor',0,'0',5,0,NULL),(6,'Postal_6','amistad',4,'0',5,1,NULL);
/*!40000 ALTER TABLE `postal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-26 14:36:15
