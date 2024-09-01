CREATE DATABASE  IF NOT EXISTS `u732685382_buyar_dev` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `u732685382_buyar_dev`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: u732685382_buyar_dev
-- ------------------------------------------------------
-- Server version	8.0.39

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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `numero_cuenta_bancaria` varchar(34) NOT NULL,
  `pagina_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `fk_pagina` (`pagina_id`),
  CONSTRAINT `fk_pagina` FOREIGN KEY (`pagina_id`) REFERENCES `paginas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `email_messages`
--

DROP TABLE IF EXISTS `email_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `email_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pendiente',
  `mensaje` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado_cambiado_por` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_cambiado_por` (`estado_cambiado_por`),
  CONSTRAINT `email_messages_ibfk_1` FOREIGN KEY (`estado_cambiado_por`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_messages`
--

LOCK TABLES `email_messages` WRITE;
/*!40000 ALTER TABLE `email_messages` DISABLE KEYS */;
INSERT INTO `email_messages` VALUES (1,'Ivan','prueba@prueba.com','Pendiente','dwadwa','2024-08-26 17:23:29','2024-09-01 13:19:49',1),(2,'prueba 2','prueba@prueba.com','Pendiente','feawawwa','2024-08-26 17:30:58','2024-09-01 13:19:49',1),(3,'dwadw','prueba@prueba.com','Pendiente','prueba 3','2024-08-26 19:13:40','2024-09-01 13:19:49',1),(4,'Ivan','prueba@prueba.com','Pendiente','este es un mensaje de prueba','2024-08-26 20:28:52','2024-09-01 13:19:49',1),(5,'Ivan','prueba@prueba.com','Pendiente','dwadwa','2024-08-26 20:30:06','2024-09-01 13:19:49',1),(6,'ivan','prueba@prueba.com','Pendiente','prueba iconos','2024-08-26 20:38:28','2024-09-01 13:19:49',1),(7,'prueba','prueba@prueba.comdwa','Pendiente','dwa','2024-08-26 20:38:58','2024-09-01 13:19:49',1),(8,'ivan','prueba@prueba.com','Pendiente','Ultima prueba de iconos','2024-08-26 20:40:54','2024-09-01 13:19:49',1),(9,'dwa','prueba@prueba.comdwa','Pendiente','adwanofanoiafewonbdwoanbodwbn ondoi wanoidwna odnboa ndiowanodnbwaiodnwaon naiwopndowandoiawnoidnwaoi noin oidnwaoi noiwandoiwanoidnwaoidnalowndlo naoi ndolawnoidnoiawndiowan oidnwaiodn oilanoidn oianwiodnwaoindoiwandioawndoinwaoin oiwnadionaonsongfoirenpoinm dpinfoip \r\nwadwa\r\ndwadwa \r\n\r\n\r\ndwadwad wa','2024-08-28 20:15:06','2024-09-01 13:19:49',1),(10,'bvihyvbo','prueba@prueba.comdwa','Pendiente','njo','2024-08-28 20:31:34','2024-09-01 13:19:49',1),(11,'hola','prueba@prueba.comdwa','Pendiente','hola','2024-08-29 20:11:31','2024-09-01 13:19:49',1),(12,'prueba controlador','contro@contro.com','Pendiente','prueba controlador','2024-08-29 20:29:04','2024-09-01 13:19:49',1),(13,'Buyar','buyar@buyuar.com','Pendiente','CULO ROTO','2024-08-31 18:08:23','2024-09-01 13:19:49',1);
/*!40000 ALTER TABLE `email_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pendiente',
  `mensaje` text NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `estado_cambiado_por` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emails_user_id` (`user_id`),
  KEY `estado_cambiado_por` (`estado_cambiado_por`),
  CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`estado_cambiado_por`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_emails_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'Pablo 2','pablo@pablo.com','Pendiente','djowabnoiuawnbiofn','2024-08-29 16:17:30','2024-08-29 19:17:30','2024-08-29 20:08:05',1,1),(2,'Pablo','pablo@pablo.com','Pendiente','djowabnoiuawnbiofnaoindowanbdpwa','2024-08-29 16:18:37','2024-08-29 19:18:37','2024-08-31 18:57:15',1,1),(3,'pepe','pepe@pepe.com','Completado','dwadwadwa','2024-08-29 17:04:50','2024-08-29 20:04:50','2024-09-01 04:13:53',1,1),(4,'papa 22312','prueba@prueba.com','En Proceso','dwadwa','2024-08-29 17:07:30','2024-08-29 20:07:30','2024-08-31 18:57:05',1,1),(5,'Pablo 2787','prueba@prueba.com','En Proceso','viyuiyuooíp','2024-08-29 17:11:59','2024-08-29 20:11:59','2024-09-01 04:13:49',1,1),(6,'sacc','sacc@sacc.com','Pendiente','dwadwa','2024-09-01 02:33:22','2024-09-01 05:33:22','2024-09-01 05:33:22',1,1);
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layouts`
--

DROP TABLE IF EXISTS `layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `layouts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layouts`
--

LOCK TABLES `layouts` WRITE;
/*!40000 ALTER TABLE `layouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `layouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paginas`
--

DROP TABLE IF EXISTS `paginas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paginas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `cliente_id` int DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `version` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cliente_id` (`cliente_id`),
  CONSTRAINT `paginas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `documento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` int DEFAULT '0',
  `role` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Ivan Burgio','ivan.24.burgio@gmail.com','$2y$12$R3d19S8vIkO0.4wy3reMWeaWpzTsINnEotQPQ6FdrSrTQo5nbhfAG','53114452',0,0,'2024-08-14 18:58:39','2024-08-19 21:01:05'),(2,'Ivan yang','prueba@prueba.com','$2y$12$R3d19S8vIkO0.4wy3reMWeaWpzTsINnEotQPQ6FdrSrTQo5nbhfAG','53114453',0,0,'2024-08-14 18:58:39','2024-08-19 21:01:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `whatsapps`
--

DROP TABLE IF EXISTS `whatsapps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `whatsapps` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `telefono` varchar(55) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'Pendiente',
  `mensaje` text NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int NOT NULL,
  `estado_cambiado_por` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_whatsapps_user_id` (`user_id`),
  KEY `estado_cambiado_por` (`estado_cambiado_por`),
  CONSTRAINT `fk_whatsapps_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `whatsapps_ibfk_1` FOREIGN KEY (`estado_cambiado_por`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapps`
--

LOCK TABLES `whatsapps` WRITE;
/*!40000 ALTER TABLE `whatsapps` DISABLE KEYS */;
INSERT INTO `whatsapps` VALUES (1,'Nahuel','092812477','En Proceso','dwa','2024-09-01 02:37:40','2024-09-01 05:37:40','2024-09-01 16:50:54',1,1);
/*!40000 ALTER TABLE `whatsapps` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-01 11:11:36
