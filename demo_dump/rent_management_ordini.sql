CREATE DATABASE  IF NOT EXISTS `rent_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `rent_management`;
-- MySQL dump 10.13  Distrib 8.0.20, for macos10.15 (x86_64)
--
-- Host: localhost    Database: rent_management
-- ------------------------------------------------------
-- Server version	8.0.20

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ordini`
--

DROP TABLE IF EXISTS `ordini`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ordini` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datains` datetime DEFAULT NULL,
  `desart` varchar(45) DEFAULT NULL,
  `qta` varchar(45) DEFAULT NULL,
  `returnqta` varchar(45) DEFAULT NULL,
  `idcliente` varchar(45) DEFAULT NULL,
  `returndate` varchar(45) DEFAULT NULL,
  `numord` int DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `finishdate` datetime DEFAULT NULL,
  `returncall` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ordini`
--

LOCK TABLES `ordini` WRITE;
/*!40000 ALTER TABLE `ordini` DISABLE KEYS */;
INSERT INTO `ordini` VALUES (1,'2023-04-06 00:01:26','Bike 1','1','0','3','2023-04-06',2120,'finish','2023-04-06 00:13:50','2'),(2,'2023-04-06 00:01:26','Bike 1','1','0','3','2023-04-06',2120,'finish','2023-04-06 00:13:50','2'),(3,'2023-04-06 00:01:26','Casco','2','1','3','2023-04-06',2120,'finish','2023-04-06 00:13:50','2'),(4,'2023-04-06 00:02:28','Casco','2','2','2','2023-04-18',2226,'finish','2023-04-06 00:08:05','2'),(5,'2023-04-06 00:02:28','Bike 3','4','4','2','2023-04-18',2226,'finish','2023-04-06 00:08:05','2'),(6,'2023-04-06 00:04:49','Bike 3','5','5','1','2023-04-02',2225,'finish','2023-04-06 00:07:45','1'),(7,'2023-04-06 00:15:27','Bike 3','3','3','2','2023-04-08',6678,'active',NULL,'0'),(8,'2023-04-06 00:21:01','Bike 1','9','9','1','2023-04-06',9,'active',NULL,'0'),(9,'2023-12-17 23:38:01','Bike 2','1','1','1','2023-12-21',6,'finish','2023-12-17 23:38:17','2'),(10,'2023-12-17 23:38:01','Bike 2','2','2','1','2023-12-21',6,'finish','2023-12-17 23:38:17','2');
/*!40000 ALTER TABLE `ordini` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-28 19:22:06
