-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: lessondb
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `u_groups`
--

DROP TABLE IF EXISTS `u_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `u_groups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `discription` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_groups`
--

LOCK TABLES `u_groups` WRITE;
/*!40000 ALTER TABLE `u_groups` DISABLE KEYS */;
INSERT INTO `u_groups` VALUES (3,'Зарегистрированные пользователи','Зарегистрированный пользователь после авторизации, на странице /posts/\r видит сообщение - “Вы сможете отправлять сообщения после прохождени...'),(4,'Пользователи имеющие право писать сообщения','Пользователь имеющий право писать сообщения после авторизации, на\r странице /posts/ видит два списка непрочитанных и прочитанных сообщений\r (доработать архитектуру хранения данных). Каждое сообщение - ссылка, состоящая из\r заголовка сообщения и названия раздела, ведущая на страницу просмотра\r сообщения.');
/*!40000 ALTER TABLE `u_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `middle_name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'e10adc3949ba59abbe56e057f20f883e',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `get_mail_agree` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Степан','Петрович','Ходько','khodko@site.ru','+79881231211','$2y$10$4NglPjX.0O6XphHKY6YNXeMhvibpLguzHWxamI7YFWfwSv7V0v8fW',0,1),(2,'Игорь','Иванович','Аникеев','anikeev@site.ru','+79881231212','$2y$10$4NglPjX.0O6XphHKY6YNXeMhvibpLguzHWxamI7YFWfwSv7V0v8fW',0,1),(3,'Артем','Амазаспович','Абрамян','abramian@site.ru','+79881231213','$2y$10$4NglPjX.0O6XphHKY6YNXeMhvibpLguzHWxamI7YFWfwSv7V0v8fW',0,0),(4,'Владислав','Граф','Дракула','drakula@site.ru','+79881231214','$2y$10$4NglPjX.0O6XphHKY6YNXeMhvibpLguzHWxamI7YFWfwSv7V0v8fW',0,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


-- Dump completed on 2023-06-16 15:22:17

    --
-- Table structure for table `group_user`
--

DROP TABLE IF EXISTS `group_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_user` (
                              `group_id` int NOT NULL,
                              `user_id` int NOT NULL,
                              UNIQUE KEY `user_group_index` (`group_id`,`user_id`),
    KEY `user_id` (`user_id`) /*!80000 INVISIBLE */,
    CONSTRAINT `group_user_1` FOREIGN KEY (`group_id`) REFERENCES `u_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `group_user_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_user`
--

LOCK TABLES `group_user` WRITE;
/*!40000 ALTER TABLE `group_user` DISABLE KEYS */;
INSERT INTO `group_user` VALUES (3,1),(3,2),(3,3),(3,4),(4,1),(4,3),(4,4);
/*!40000 ALTER TABLE `group_user` ENABLE KEYS */;
UNLOCK TABLES;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;