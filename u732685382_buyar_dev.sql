CREATE DATABASE  IF NOT EXISTS `u732685382_buyar_dev` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `u732685382_buyar_dev`;
-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: localhost    Database: u732685382_buyar_dev
-- ------------------------------------------------------
-- Server version	8.3.0

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
  `numero_cuenta_bancaria` varchar(34) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `creador` int NOT NULL,
  `estado` varchar(255) DEFAULT 'Inactivo',
  `estado_cambiado_por` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_id` (`creador`),
  CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'Lucas Viera 22','lucas@lucas.com','09999999','0000000','2024-09-02 01:32:39','2024-09-04 23:32:21',1,'Inactivo',1),(2,'Nahuel Sueirow 2','nahue@nahuel.com','09999991','00000001','2024-09-03 17:11:45','2024-09-22 00:03:05',1,'Inactivo',1),(3,'pepe','pepe@pepe.com','099999976',NULL,'2024-09-30 17:15:40','2024-09-30 17:15:40',1,'Inactivo',1),(4,'ivan','ivan@ivan.com','099999975','00000002','2024-09-30 17:23:54','2024-09-30 17:25:18',1,'Inactivo',1),(5,'a','a@qa.com','092888866','0001','2024-09-30 17:25:38','2024-09-30 17:25:38',1,'Inactivo',1);
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
  `estado_cambiado_por` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `estado_cambiado_por` (`estado_cambiado_por`),
  CONSTRAINT `email_messages_ibfk_1` FOREIGN KEY (`estado_cambiado_por`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `email_messages`
--

LOCK TABLES `email_messages` WRITE;
/*!40000 ALTER TABLE `email_messages` DISABLE KEYS */;
INSERT INTO `email_messages` VALUES (1,'Ivan','prueba@prueba.com','Pendiente','dwadwa','2024-08-26 17:23:29','2024-09-01 13:19:49',1),(2,'prueba 2','prueba@prueba.com','Pendiente','feawawwa','2024-08-26 17:30:58','2024-09-01 13:19:49',1),(3,'dwadw','prueba@prueba.com','Pendiente','prueba 3','2024-08-26 19:13:40','2024-09-01 13:19:49',1),(4,'Ivan','prueba@prueba.com','Pendiente','este es un mensaje de prueba','2024-08-26 20:28:52','2024-09-01 13:19:49',1),(5,'Ivan','prueba@prueba.com','Pendiente','dwadwa','2024-08-26 20:30:06','2024-09-01 13:19:49',1),(6,'ivan','prueba@prueba.com','Pendiente','prueba iconos','2024-08-26 20:38:28','2024-09-01 13:19:49',1),(7,'prueba','prueba@prueba.comdwa','Pendiente','dwa','2024-08-26 20:38:58','2024-09-01 13:19:49',1),(8,'ivan','prueba@prueba.com','Pendiente','Ultima prueba de iconos','2024-08-26 20:40:54','2024-09-01 13:19:49',1),(9,'dwa','prueba@prueba.comdwa','Pendiente','adwanofanoiafewonbdwoanbodwbn ondoi wanoidwna odnboa ndiowanodnbwaiodnwaon naiwopndowandoiawnoidnwaoi noin oidnwaoi noiwandoiwanoidnwaoidnalowndlo naoi ndolawnoidnoiawndiowan oidnwaiodn oilanoidn oianwiodnwaoindoiwandioawndoinwaoin oiwnadionaonsongfoirenpoinm dpinfoip \r\nwadwa\r\ndwadwa \r\n\r\n\r\ndwadwad wa','2024-08-28 20:15:06','2024-09-01 13:19:49',1),(10,'bvihyvbo','prueba@prueba.comdwa','Pendiente','njo','2024-08-28 20:31:34','2024-09-01 13:19:49',1),(11,'hola','prueba@prueba.comdwa','Pendiente','hola','2024-08-29 20:11:31','2024-09-01 13:19:49',1),(12,'prueba controlador','contro@contro.com','Pendiente','prueba controlador','2024-08-29 20:29:04','2024-09-01 13:19:49',1),(13,'Buyar','buyar@buyuar.com','En Proceso','CULO ROTO','2024-08-31 18:08:23','2024-09-02 02:15:00',1),(14,'hola','hola@hola.com','En Proceso','hola','2024-09-22 00:03:43','2024-09-22 00:04:03',1),(15,'Ivan','ivan@ivan.com','Pendiente','dwadwa','2024-09-24 21:49:53','2024-09-24 21:49:53',1),(16,'dwadwa','dwadwa@wda','Pendiente','dwadwa','2024-09-24 21:50:09','2024-09-24 21:50:09',1),(17,'romina','romina@romina.com','Completado','dwadwad','2024-09-26 19:51:59','2024-09-26 19:53:40',1),(18,'prueba','dwadwa@wda.com','Pendiente','dwadwad','2024-09-27 16:55:44','2024-09-27 17:05:09',1);
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
  `creador` int NOT NULL,
  `estado_cambiado_por` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_emails_user_id` (`creador`),
  KEY `estado_cambiado_por` (`estado_cambiado_por`),
  CONSTRAINT `emails_ibfk_1` FOREIGN KEY (`estado_cambiado_por`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_emails_user_id` FOREIGN KEY (`creador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'Pablo 2','pablo@pablo.com','Pendiente','djowabnoiuawnbiofn','2024-08-29 16:17:30','2024-08-29 19:17:30','2024-08-29 20:08:05',1,1),(2,'Pablo','pablo@pablo.com','Pendiente','djowabnoiuawnbiofnaoindowanbdpwa','2024-08-29 16:18:37','2024-08-29 19:18:37','2024-08-31 18:57:15',1,1),(3,'pepe','pepe@pepe.com','Completado','dwadwadwa','2024-08-29 17:04:50','2024-08-29 20:04:50','2024-09-01 04:13:53',1,1),(4,'papa 22312','prueba@prueba.com','En Proceso','dwadwa','2024-08-29 17:07:30','2024-08-29 20:07:30','2024-08-31 18:57:05',1,1),(5,'Pablo 2787','prueba@prueba.com','En Proceso','viyuiyuooíp','2024-08-29 17:11:59','2024-08-29 20:11:59','2024-09-01 04:13:49',1,1),(6,'saccccc','sacc@sacc.com','En Proceso','dwadwa','2024-09-01 02:33:22','2024-09-01 05:33:22','2024-09-02 01:18:36',1,1);
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `color` varchar(7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (5,'tgucc uhiuo','2024-09-04 00:00:00','2024-09-07 00:00:00','#408080',NULL,NULL),(6,'k','2024-09-02 00:00:00','2024-09-20 00:00:00','#378006',NULL,NULL),(7,'dwadwa','2024-09-03 00:00:00','2024-09-07 00:00:00','#ffff00',NULL,NULL),(8,'dwadwaddddddaa','2024-09-01 00:00:00',NULL,'#008000',NULL,NULL),(9,'k','2024-09-01 00:00:00','2024-09-07 00:00:00','#ff0080',NULL,NULL),(10,'Medico','2024-09-21 00:00:00','2024-09-21 00:00:00','#008080',NULL,NULL);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layouts`
--

DROP TABLE IF EXISTS `layouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `layouts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `categoria` enum('web','dashboard','chatbot') NOT NULL,
  `creador` int NOT NULL,
  `link` varchar(255) NOT NULL,
  `imagen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `creador` (`creador`),
  CONSTRAINT `layouts_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layouts`
--

LOCK TABLES `layouts` WRITE;
/*!40000 ALTER TABLE `layouts` DISABLE KEYS */;
INSERT INTO `layouts` VALUES (1,'Prueba web 1','dwadwa','web',1,'a','public/imagenes/cEkFhT8KDaSI6B5rBFqm6NQdKYA5LR2DvY5gJYH4.jpg'),(2,'Prueba web 1','dwadwa','web',1,'a','public/imagenes/qVHVE9x1U4shnQqHdJ7hD8URJXqSvs2JfAkImz5u.jpg'),(3,'Prueba web 1','dwadwa','web',1,'a','public/imagenes/ELdgWxiHsiGpsAIRzewwuvjjfywOGTH5eyTSVf3k.jpg'),(4,'Prueba web 1','dwadwa','web',1,'a','public/imagenes/NRdVrduywH2qG9O25WELNAsEZ72XX2lxph1PVD7q.jpg'),(5,'Prueba web 1 2 22 2 2','dwadwaawdwadwadwadwadwadwa','web',1,'adwadwa','public/imagenes/ODHkWtU84pDECqVlEeViy5f05JfiAJCe9jbAq3zR.jpg'),(6,'prueba dashbord 2','sxryktul dwadwa eddw','dashboard',1,'wadwadwa','public/imagenes/rDEIkugzO4dUPgxUyrzthXkiKeSmGdAKe2WjkTuF.jpg'),(7,'prue','dwadwadwa','dashboard',1,'dwadwa','public/imagenes/2I6V8NOYzYicPctBJxSvjWJBVsaFhxHYkeAUm1Du.png'),(8,'Prueba chatbot','dadwa','chatbot',1,'wadwadwa','public/imagenes/9RXCQexIe3fAsjmS69wDX5RXWWjGHEnd01DKy4e6.png');
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
  `tipo` varchar(50) NOT NULL,
  `creador` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`creador`),
  CONSTRAINT `paginas_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paginas`
--

LOCK TABLES `paginas` WRITE;
/*!40000 ALTER TABLE `paginas` DISABLE KEYS */;
INSERT INTO `paginas` VALUES (1,'public/imagenes/PXzvuqrwjOmmGW2ZQ0kO1qj8YbQZy1jNEL4XqNps.jpg','Prueba pagina 2','https://www.youtube.com','Web',1,'2024-09-02 23:16:27','2024-09-03 17:43:56'),(2,'public/imagenes/Uue2PWnXbdcETMwPnXMWa8CLAxFYZfOfdLJoxwC8.png','pruea 223','ad','Dashboard',1,'2024-09-03 17:47:21','2024-09-03 19:42:12');
/*!40000 ALTER TABLE `paginas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` varchar(50) DEFAULT 'Pendiente',
  `prioridad` varchar(50) DEFAULT 'Media',
  `asignado_a` int DEFAULT NULL,
  `creador` int NOT NULL,
  `fecha_limite` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `asignado_a` (`asignado_a`),
  KEY `creado_por` (`creador`),
  CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`asignado_a`) REFERENCES `users` (`id`),
  CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`creador`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,'Prueba Tickets a','dwabidwbai bdn oiawnbduoibwaiyhdvbi awbud aw','Pendiente','Baja',1,1,NULL,'2024-09-10 17:12:06','2024-09-10 20:51:13'),(2,'Prueba tickets 23','dwadwa','Pendiente','Media',1,1,NULL,'2024-09-10 18:30:23','2024-09-10 21:02:15'),(3,'dwadw 8yg 2','dwadwad k','Pendiente','Alta',2,1,NULL,'2024-09-10 19:23:09','2024-09-10 20:51:05');
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (1,'Ivan Burgio','ivan.24.burgio@gmail.com','$2y$12$R3d19S8vIkO0.4wy3reMWeaWpzTsINnEotQPQ6FdrSrTQo5nbhfAG','53114452',0,0,'2024-08-14 18:58:39','2024-08-19 21:01:05'),(2,'Ivan Yang','prueba@prueba.com','$2y$12$R3d19S8vIkO0.4wy3reMWeaWpzTsINnEotQPQ6FdrSrTQo5nbhfAG','53114453',0,0,'2024-08-14 18:58:39','2024-09-10 15:45:31');
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
  `creador` int NOT NULL,
  `estado_cambiado_por` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_whatsapps_user_id` (`creador`),
  KEY `estado_cambiado_por` (`estado_cambiado_por`),
  CONSTRAINT `fk_whatsapps_user_id` FOREIGN KEY (`creador`) REFERENCES `users` (`id`),
  CONSTRAINT `whatsapps_ibfk_1` FOREIGN KEY (`estado_cambiado_por`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `whatsapps`
--

LOCK TABLES `whatsapps` WRITE;
/*!40000 ALTER TABLE `whatsapps` DISABLE KEYS */;
INSERT INTO `whatsapps` VALUES (1,'Nahuel','092812477','En Proceso','dwa','2024-09-01 02:37:40','2024-09-01 05:37:40','2024-09-01 16:50:54',1,1),(2,'lucas','092888888','Pendiente','hola','2024-09-25 15:17:10','2024-09-25 18:17:10','2024-09-25 18:17:10',1,1);
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

-- Dump completed on 2024-09-30 11:28:24
