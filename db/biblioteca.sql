CREATE DATABASE  IF NOT EXISTS `Biblioteca` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Biblioteca`;
-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: Biblioteca
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autor`
--

DROP TABLE IF EXISTS `autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAutor` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autor`
--

LOCK TABLES `autor` WRITE;
/*!40000 ALTER TABLE `autor` DISABLE KEYS */;
INSERT INTO `autor` VALUES (1,'Miguel Angel ','Asturias'),(3,'Marta','Valles'),(4,'Felipe','Cordero'),(5,'Santiago','Martinez'),(6,'DEITEL','DEITEL');
/*!40000 ALTER TABLE `autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargar_libro_donador`
--

DROP TABLE IF EXISTS `cargar_libro_donador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargar_libro_donador` (
  `idcargarlibro` int(11) NOT NULL AUTO_INCREMENT,
  `ejemplares` int(11) NOT NULL,
  `donadores_iddonador` int(11) NOT NULL,
  `libro_idlibro` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idcargarlibro`),
  KEY `fk_cargar_libro_donador_donadores1_idx` (`donadores_iddonador`),
  KEY `fk_cargar_libro_donador_libro1_idx` (`libro_idlibro`),
  CONSTRAINT `fk_cargar_libro_donador_donadores1` FOREIGN KEY (`donadores_iddonador`) REFERENCES `donadores` (`iddonador`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_cargar_libro_donador_libro1` FOREIGN KEY (`libro_idlibro`) REFERENCES `libro` (`idlibro`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargar_libro_donador`
--

LOCK TABLES `cargar_libro_donador` WRITE;
/*!40000 ALTER TABLE `cargar_libro_donador` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargar_libro_donador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCat` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Idioma'),(2,'TECNOLOGIA');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `carne` varchar(15) DEFAULT NULL,
  `DPI` varchar(15) DEFAULT NULL,
  `nombre` varchar(65) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'FERQJ8701','22334455667788','fernando alfonso quiquivix junco','champerico retalhule','43546576','Alumno','Masculino'),(2,'2890','34242','jose miguel','champerico','54657687','Alumno','Masculino');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donadores`
--

DROP TABLE IF EXISTS `donadores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donadores` (
  `iddonador` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(45) NOT NULL,
  PRIMARY KEY (`iddonador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donadores`
--

LOCK TABLES `donadores` WRITE;
/*!40000 ALTER TABLE `donadores` DISABLE KEYS */;
INSERT INTO `donadores` VALUES (1,'Ministerio de Educacion','777435465','ciudad de Guatemala');
/*!40000 ALTER TABLE `donadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editorial`
--

DROP TABLE IF EXISTS `editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editorial` (
  `ideditorial` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEditorial` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ideditorial`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editorial`
--

LOCK TABLES `editorial` WRITE;
/*!40000 ALTER TABLE `editorial` DISABLE KEYS */;
INSERT INTO `editorial` VALUES (1,'Aguilar'),(2,'Pirámide'),(3,'Santillana'),(5,'Universidad de Sevilla'),(6,'NORMA');
/*!40000 ALTER TABLE `editorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadolibro`
--

DROP TABLE IF EXISTS `estadolibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadolibro` (
  `idestadolibro` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestadolibro`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadolibro`
--

LOCK TABLES `estadolibro` WRITE;
/*!40000 ALTER TABLE `estadolibro` DISABLE KEYS */;
INSERT INTO `estadolibro` VALUES (1,'Bueno'),(2,'Malo'),(3,'Dañado');
/*!40000 ALTER TABLE `estadolibro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libro`
--

DROP TABLE IF EXISTS `libro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `libro` (
  `idlibro` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `autor_idautor` int(11) NOT NULL,
  `ubicacion_idubicacion` int(11) NOT NULL,
  `estadolibro_idestadolibro` int(11) NOT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `editorial_ideditorial` int(11) NOT NULL,
  PRIMARY KEY (`idlibro`),
  KEY `fk_libro_autor_idx` (`autor_idautor`),
  KEY `fk_libro_ubicacion1_idx` (`ubicacion_idubicacion`),
  KEY `fk_libro_estadolibro1_idx` (`estadolibro_idestadolibro`),
  KEY `fk_libro_categoria1_idx` (`categoria_idcategoria`),
  KEY `fk_libro_editorial1_idx` (`editorial_ideditorial`),
  CONSTRAINT `fk_libro_autor` FOREIGN KEY (`autor_idautor`) REFERENCES `autor` (`idautor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_editorial1` FOREIGN KEY (`editorial_ideditorial`) REFERENCES `editorial` (`ideditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_estadolibro1` FOREIGN KEY (`estadolibro_idestadolibro`) REFERENCES `estadolibro` (`idestadolibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_ubicacion1` FOREIGN KEY (`ubicacion_idubicacion`) REFERENCES `ubicacion` (`idubicacion`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libro`
--

LOCK TABLES `libro` WRITE;
/*!40000 ALTER TABLE `libro` DISABLE KEYS */;
INSERT INTO `libro` VALUES (1,'007','EL PRESIDENTE',345,'historia de guatemala',1,1,1,1,1),(2,'008BYT','EL CHIQUITO BARCO',192,'LIBRO DE LECTURA PARA PRIMARIA',1,1,2,1,3),(3,'009','INTRODUCCION A C++',655,'LIBRO DE INTRODUCCION A LA PROGRAMACION DE C++',6,3,1,2,6);
/*!40000 ALTER TABLE `libro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `idubicacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUbicacion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idubicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (1,'5-3'),(2,'5-2'),(3,'6-1');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'Biblioteca'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-04 11:20:58
