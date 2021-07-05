-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: php2
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'ffff'),(2,'bbb'),(3,'321'),(4,'312'),(5,'312'),(6,'321'),(7,'222'),(8,'111'),(9,'421'),(10,'987654'),(11,'124'),(12,'3213'),(13,'111'),(14,'111'),(15,'222'),(16,'abracadabra'),(17,'111'),(18,'4321'),(19,'4321'),(20,'098765rffbcvb'),(21,'1'),(22,'21'),(23,'1'),(24,'1'),(25,'1'),(26,'1'),(27,'1'),(28,'1'),(29,'321'),(30,'3213'),(31,'3213'),(32,'3213'),(33,'3213'),(34,'321'),(35,'321'),(36,'321'),(37,'321'),(38,'321'),(39,'321'),(40,'321'),(41,'321'),(42,'321'),(43,'321'),(44,'321'),(45,'312312312'),(46,'32131213'),(47,'31231'),(48,'31231'),(49,'31231'),(50,'31231'),(51,'31231'),(52,'1'),(53,'3213'),(54,'321312');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `article` text NOT NULL,
  `authorId` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (6,'dfgdfg g dfgdfg dfg dg dfg dfg d','fdsgfdgd',20),(7,'fsdfsdf1','qwerty1',0),(10,'3213123','54354353',0),(11,'abcd','В конце июня в журнале Nature вышла статья, подытожившая изучение сотен образцов ДНК древних людей из знаменитой Денисовой пещеры на Алтае. 13 лет назад там были обнаружены обломок фаланги пальца ранее неизвестного вида людей — денисовского человека. Теперь ученые из Института эволюционной антропологии Макса Планка и Института археологии и этнографии Сибирского отделения РАН (ИАЭТ СО РАН) смогли составить подробную хронологию тысячелетий жизни в пещере трех видов людей — сапиенсов (людей современного типа), неандертальцев и денисовцев. Иногда, вероятно, разные виды людей появлялись в пещере в одну и ту же эпоху и даже давали общее потомство. Но и после нового обширного исследования остались (и даже приумножились) вопросы. Так, неясно, кто из обитателей пещеры произвел украшения, найденные в пещере — сапиенсы, которые точно умели это делать, или денисовцы, о способностях которых производить предметы искусства пока ничего доподлинно неизвестно.',16),(15,'-098765','98765',10),(16,'421','DROP DATABASE',11),(17,'31231','312312',12),(18,'dfgdfg g dfgdfg dfg dg dfg dfg d','321321',1),(19,'3123','31231',3213),(20,'321312','321312',321312);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-05 14:26:45
