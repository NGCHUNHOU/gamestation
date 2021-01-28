-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: gamestation
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.6-MariaDB

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
-- Table structure for table `daytable`
--

DROP TABLE IF EXISTS `daytable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `daytable` (
  `day_id` int(11) NOT NULL,
  `day` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `daytable`
--

LOCK TABLES `daytable` WRITE;
/*!40000 ALTER TABLE `daytable` DISABLE KEYS */;
INSERT INTO `daytable` VALUES (1,'monday'),(2,'tuesday'),(3,'wednesday'),(4,'thursday'),(5,'friday'),(6,'saturday'),(7,'sunday');
/*!40000 ALTER TABLE `daytable` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `metainfo`
--

DROP TABLE IF EXISTS `metainfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `metainfo` (
  `meta_id` int(5) NOT NULL AUTO_INCREMENT,
  `metaname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `metainfo`
--

LOCK TABLES `metainfo` WRITE;
/*!40000 ALTER TABLE `metainfo` DISABLE KEYS */;
INSERT INTO `metainfo` VALUES (1,'description'),(2,'keywords'),(3,'author');
/*!40000 ALTER TABLE `metainfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsauthor`
--

DROP TABLE IF EXISTS `newsauthor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newsauthor` (
  `aut_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL,
  PRIMARY KEY (`aut_id`),
  KEY `fk_newsID` (`news_id`),
  CONSTRAINT `fk_newsID` FOREIGN KEY (`news_id`) REFERENCES `updatenews` (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsauthor`
--

LOCK TABLES `newsauthor` WRITE;
/*!40000 ALTER TABLE `newsauthor` DISABLE KEYS */;
INSERT INTO `newsauthor` VALUES (1,'John','example@gmail.com',1);
/*!40000 ALTER TABLE `newsauthor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newscategory`
--

DROP TABLE IF EXISTS `newscategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newscategory` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `initial_date` date NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newscategory`
--

LOCK TABLES `newscategory` WRITE;
/*!40000 ALTER TABLE `newscategory` DISABLE KEYS */;
INSERT INTO `newscategory` VALUES (1,'Hardware','All the topics about the hardware introduction and news of desktop, laptop, tablet, mobile device and etc... ','2020-09-01'),(2,'gameFeed','concerning about game trend and content ','2020-09-18'),(4,'Recommandation','Giving daily news for every trending game, summary, detail, pros and cons, and more','0000-00-00');
/*!40000 ALTER TABLE `newscategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siteinfo`
--

DROP TABLE IF EXISTS `siteinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `siteinfo` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(5) NOT NULL,
  `meta_id` int(5) NOT NULL,
  `metacontent` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`page_id`),
  KEY `meta_id` (`meta_id`),
  KEY `title_id` (`title_id`),
  CONSTRAINT `fk_meta_id` FOREIGN KEY (`meta_id`) REFERENCES `metainfo` (`meta_id`),
  CONSTRAINT `fk_title_id` FOREIGN KEY (`title_id`) REFERENCES `titleinfo` (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siteinfo`
--

LOCK TABLES `siteinfo` WRITE;
/*!40000 ALTER TABLE `siteinfo` DISABLE KEYS */;
INSERT INTO `siteinfo` VALUES (1,1,1,'GameStation is a social networking service for gaming discussion and news. Share your game experience to your friend. We provide the latest news and complete game information for the majority of players'),(2,2,1,'error description content'),(3,3,1,'help description content'),(4,1,2,'game, gaming forum, GameStation, game information, player, social networking service'),(5,2,2,'error keywords'),(6,3,2,'help keywords'),(7,1,3,'HOU'),(8,4,1,'We are delighted to deliver the latest news and game info for player '),(9,4,2,'GameStation, GameStation info, game news, latest news provider'),(10,4,3,'HOU'),(11,5,1,'Latest news for console game, pc game and mobile game '),(12,5,3,'HOU'),(13,5,2,'News, Console Game, PC Game, Mobile Game, Latest News');
/*!40000 ALTER TABLE `siteinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titleinfo`
--

DROP TABLE IF EXISTS `titleinfo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `titleinfo` (
  `title_id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `css_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titleinfo`
--

LOCK TABLES `titleinfo` WRITE;
/*!40000 ALTER TABLE `titleinfo` DISABLE KEYS */;
INSERT INTO `titleinfo` VALUES (1,'home','/view/assets/css/custom.css'),(2,'error','/view/assets/css/error.css'),(3,'help',''),(4,'about-us',''),(5,'news','/view/assets/css/news.css');
/*!40000 ALTER TABLE `titleinfo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `updatenews`
--

DROP TABLE IF EXISTS `updatenews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `updatenews` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `imgNews_thumbnail` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgNews_content` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `cat_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  PRIMARY KEY (`news_id`),
  KEY `fkCategory` (`cat_id`),
  KEY `fkDayTable` (`day_id`),
  CONSTRAINT `fkCategory` FOREIGN KEY (`cat_id`) REFERENCES `newscategory` (`cat_id`),
  CONSTRAINT `fkDayTable` FOREIGN KEY (`day_id`) REFERENCES `daytable` (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `updatenews`
--

LOCK TABLES `updatenews` WRITE;
/*!40000 ALTER TABLE `updatenews` DISABLE KEYS */;
INSERT INTO `updatenews` VALUES (1,'2020 top 100 cpu latest ranking chart','This chart displays the latest cpu performance comparison in 2020. This Ranking is based on cpu performance, i/O thread calculation and latency to determine the rank  ','/gamestation/view/assets/images/news/bargraph-clear-300.png','/gamestation/view/assets/images/news/bargraph-1600.jpg','cpu ranking chart, cpu','2020-09-02',1,1),(2,'steam daily promotion: barn finder price goes down to 56 dollar','based on official steam store announcements, <barn finder> and <furi> both included into steam discount event   ','/gamestation/view/assets/images/news/barn_finder.png',NULL,'steam discount event','2020-09-11',2,1),(3,'Sony plans to make secret event in PAX exhibition','Sony is going to have a unnamed event in PAX exhibition with label \"Sony location\"','/gamestation/view/assets/images/news/sony.png',NULL,'sony, event, PS5','2020-09-15',2,2),(4,'List of Top 10 Hardest Boss in Sekiro','There are so many strong enemies in Sekiro you may encounter in the game. Here we are going to discuss the hardest and the most popular boss','/gamestation/view/assets/images/news/Dark-Souls-3-Iudex-Gundyr.png',NULL,'Sekiro, Hardest Boss','2020-10-15',1,1),(5,'The Witcher season 2 halts production due to COVID outbreak, again','Filming of the second season of Netflix\'s adaptation of The Watcher has been paused due to an outbreak of COVID on set, Deadline reports.','/gamestation/view/assets/images/news/witcher-season2.png',NULL,'witcher, COVID, film halt','2020-10-28',2,2),(6,'Top 50 games in December','Although the arrival of COVID-19 blocks our access to outside. However, there are so many games can help you go through tough time','/gamestation/view/assets/images/news/topGameDec.png',NULL,'december, popular game','2020-11-04',2,2),(7,'Microsoft Is Happy If You Got Your Xbox Series X Early','Microsoft has given the green light for players who got their Xbox Series X early to start playing games','/gamestation/view/assets/images/news/xbox.png',NULL,'microsft, xbox','2020-11-04',1,3),(8,'Genshin Impact appears to be exposing some players\' mobile numbers','Genshin Impact players on Reddit are reporting what could be a fairly major potential privacy breach on the MiHoYo website','/gamestation/view/assets/images/news/genshin.png',NULL,'Genshin Impact, privacy breach','2020-11-05',2,4),(9,'A Call of Duty player accidentally found a third-person mode that\'s too cool to not come true','In a weird twist of FPS fate, one Call of Duty: Modern Warfare player accidentally discovered a third-person mode during a match of Spec Ops','/gamestation/view/assets/images/news/callofduty.png',NULL,'Call of Duty, third person mode, Easter eggs','2020-11-06',2,5),(10,'Demon\'s Souls On PS5 Gives You Far More Options For Character Customization','Considering how many times you\'re going to be dying, it\'s helpful to have a character profile you enjoy looking at','/gamestation/view/assets/images/news/demon-souls.png',NULL,'Demon\'s Souls, PS5, Character Customization','2020-11-07',2,6),(11,'Mortal Kombat 11 Will Add Kross Generation Play With Next-Gen Versions','Mortal Kombat 11 is coming to PS5 and Xbox Series X/S along with Kombat Pack 2, featuring Rain, Milenna, and Rambo','/gamestation/view/assets/images/news/kombat.png',NULL,'Mortal Kombat, Kross Generation','2020-11-08',2,7),(12,'This gorgeous Cyberpunk 2077 art book is almost half-off and the perfect lore primer','It might be news to you that Cyberpunk 2077 isn\'t set in a CD Projekt Red original universe','/gamestation/view/assets/images/news/cyberpunk-artbook.png',NULL,'Cyperpunk 2077, half-off art book','2020-11-20',2,1),(13,'Assassin\'s Creed Valhalla Update Is Live, Full Patch Notes Detailed','Ubisoft releases a new update adding an option for PS5 and Xbox Series X|S users to change their visual settings','/gamestation/view/assets/images/news/assassin-creed.png',NULL,'Assassin-Creed, Patch Update','2020-11-15',2,1),(14,'Fortnite Recreates 100 Thieves Cash App Compound In-Game','Fortnite and esports team 100 Thieves have come together to create an in-game version of the 100 Thieves Cash App Compound','/gamestation/view/assets/images/news/fornite-200.jpg',NULL,'Fortnite, 100 Thieves Cash App','2020-11-16',2,1);
/*!40000 ALTER TABLE `updatenews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test@test.com','test','123'),(4,'test2@test2.com','test2','123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'gamestation'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-31 15:33:47
