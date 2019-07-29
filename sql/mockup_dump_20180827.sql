-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: mockup
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

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
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'wmagdy@qpixsolutions.com','1a1dc91c907325c69271ddf0c944bc72'),(2,'ooo','7f94dd413148ff9ac9e9e4b6ff2b6ca9'),(3,'amustafa@qpixsolutions.com','d6635f906df8520a6c98c91e334eebfa');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` VALUES (8,11,'pending','2015-12-17 15:17:14'),(9,12,'pending','2017-11-06 20:05:10'),(10,3,'pending','2018-08-07 15:16:05');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cart_items`
--

DROP TABLE IF EXISTS `cart_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_items`
--

LOCK TABLES `cart_items` WRITE;
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` VALUES (90,8,50,1,'pending','2016-01-04 15:41:31'),(91,8,49,1,'pending','2016-01-04 15:41:34'),(93,8,47,1,'pending','2016-02-09 16:36:15'),(94,8,48,1,'pending','2017-11-06 17:53:23'),(95,9,46,1,'pending','2017-11-06 20:05:10'),(96,9,47,1,'pending','2017-11-06 20:05:16'),(97,10,58,1,'pending','2018-08-07 15:16:05');
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conf_areas`
--

DROP TABLE IF EXISTS `conf_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conf_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `conf_id` int(11) NOT NULL,
  `pos_x` varchar(50) NOT NULL,
  `pos_y` varchar(50) NOT NULL,
  `width` varchar(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conf_areas`
--

LOCK TABLES `conf_areas` WRITE;
/*!40000 ALTER TABLE `conf_areas` DISABLE KEYS */;
INSERT INTO `conf_areas` VALUES (22,'Upper area',14,'4','4','46','29'),(23,'Bottom area',14,'4','33','55','25'),(24,'Bottom area',14,'4','57','83','38'),(25,'Upper left corner object',15,'0','0','19','35'),(26,'Upper right corner object',15,'77','1','23','29'),(27,'Bottom right corner object',15,'77','73','19','22'),(28,'Couch1',17,'50','83','16','8'),(29,'Pouf',17,'48','69','8','11'),(31,'Dining',17,'52','42','10','13'),(32,'Bedroom',17,'47','11','12','17'),(34,'Chair',17,'59','67','6','16'),(36,'Couch2',18,'62','70','18','20'),(37,'Stuhl2',18,'82','68','8','24'),(38,'dining2',18,'70','44','11','12'),(39,'Bed2',18,'59','10','18','17'),(40,'Couch3',19,'67','87','20','9'),(41,'Stuhl/Regal3',19,'60','73','9','17'),(42,'Stuhl3',19,'81','71','7','17'),(43,'dining3',19,'69','42','12','15'),(44,'Bed3',19,'59','10','18','17'),(45,'area1',20,'5','15','44','15'),(46,'area51',20,'49','29','48','16'),(47,'testarea1',21,'11','22','40','45'),(48,'upshoe',23,'23','10','34','32'),(49,'frontshoe',23,'73','52','25','40'),(50,'sandal',22,'65','44','34','52'),(51,'up',22,'10','1','83','13'),(52,'123123qfqwdqdwqdwqwdqwd',24,'18','13','33','57'),(54,'area2',26,'79','23','21','51'),(55,'jhj',26,'74','43','23','34'),(56,'ölk',26,'81','52','14','22'),(58,'Bed',29,'3','32','69','36'),(59,'chair',28,'0','36','28','36'),(60,'layout56_1',32,'0','0','26','22'),(61,'layouts_2',32,'71','42','29','50'),(62,'',34,'20','16','13','16');
/*!40000 ALTER TABLE `conf_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) CHARACTER SET latin1 NOT NULL,
  `img` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `style_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `configuration`
--

LOCK TABLES `configuration` WRITE;
/*!40000 ALTER TABLE `configuration` DISABLE KEYS */;
INSERT INTO `configuration` VALUES (14,'Top configuration','conf5.png',21,'2015-12-17 14:56:43'),(15,'Another configuration testing','ewp1.jpg',21,'2015-12-17 17:37:39'),(17,'Grundrissplanung','configuration12.png',24,'2015-12-17 18:36:38'),(18,'Grundrissplanung','2016-08-24_10.14_.00_.png',25,'2017-10-25 11:29:41'),(19,'Grundrissplanung4','configuration4.png',26,'2017-11-06 14:19:00'),(20,'testconfig','2016-08-24_11.34_.39_.png',27,'2017-11-06 14:22:32'),(21,'Conf 2','2016-08-24_10.14_.00_1.png',27,'2017-11-06 18:27:18'),(22,'heart','heart-2114333_640.png',28,'2017-11-06 19:22:00'),(23,'shoe','shoe-1433925_640.jpg',28,'2017-11-06 19:22:27'),(24,'conf1','2016-08-24_10.10_.58_.png',29,'2017-11-06 19:47:35'),(25,'config1','test2_26.jpg',30,'2017-11-06 20:35:23'),(28,'test_config','index.jpeg',31,'2018-03-13 11:46:39'),(29,'bed_config','bed.jpeg',32,'2018-03-13 11:50:02'),(30,'Config 2','52959_XXX_v1.jpg',31,'2018-03-13 16:17:00'),(31,'Config 3','browncouch.png',31,'2018-03-13 16:22:33'),(32,'conf1','armchair2.jpg',33,'2018-03-13 22:06:29'),(33,'conf2','armchair3.jpg',33,'2018-03-13 22:06:49'),(34,'layout1','Screen_Shot_2018-04-16_at_7.37_.35_PM_1.png',36,'2018-04-17 09:26:01'),(35,'Layout2','Screen_Shot_2018-04-16_at_7.37_.30_PM_.png',36,'2018-04-17 09:26:18'),(36,'Layout3','Screen_Shot_2018-04-16_at_7.37_.26_PM_.png',36,'2018-04-17 09:26:38');
/*!40000 ALTER TABLE `configuration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `configuration_area_id` int(255) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout`
--

LOCK TABLES `layout` WRITE;
/*!40000 ALTER TABLE `layout` DISABLE KEYS */;
INSERT INTO `layout` VALUES (47,'Leasure time','set-1.jpg',22,'2015-12-17 15:01:51'),(48,'Chairs layout','set-4.jpg',25,'2015-12-17 17:40:52'),(54,'Dolab','layout5.png',33,'2015-12-17 18:58:33'),(55,'Couch1','layou11.png',28,'2015-12-18 19:14:34'),(56,'Couch2','Layout4_1.png',36,'2015-12-18 19:47:30'),(57,'Stuhl2','Layout4_2.png',0,'2015-12-18 19:48:13'),(60,'Stuhl/Regal3','Layout3_3.png',40,'2015-12-18 19:56:30'),(61,'couch3','Layout3_1.png',40,'2015-12-18 19:57:33'),(63,'dining3','Layout3_5.png',0,'2015-12-18 19:58:58'),(64,'Stuhl3','Layout_3_2.png',42,'2015-12-18 20:02:21'),(65,'dining2','Layout4_3.png',0,'2015-12-18 20:05:16'),(66,'Dining1','layout41.png',31,'2015-12-18 20:09:37'),(68,'neues layout','2016-08-24_10.11_.09_1.png',0,'2017-11-06 21:11:48'),(69,'test layout','2016-08-24_10.11_.09_2.png',52,'2017-11-06 21:13:09'),(70,'testlayout','01_inspire-livingroom_bg_012.png',0,'2017-11-06 21:14:44'),(71,'testlayout2','01_inspire-garden_011.png',0,'2017-11-06 21:15:00'),(72,'dressalternative','dress-1730320_640.png',53,'2017-11-06 21:37:02'),(73,'shoealternative','shoe-1433925_640.jpg',54,'2017-11-06 21:37:35'),(74,'shoe2','shoe-506826_6406.jpg',54,'2017-11-06 21:37:49'),(75,'chair_layout_1','chair.png',60,'2018-03-13 23:10:16'),(76,'carpet_layout1','carpetpressed.png',60,'2018-03-13 23:10:42'),(77,'Blue','Screen_Shot_2018-04-16_at_7.35_.45_PM_.png',62,'2018-04-17 11:29:40'),(78,'rose','Screen_Shot_2018-04-16_at_7.36_.09_PM_.png',62,'2018-04-17 11:30:19');
/*!40000 ALTER TABLE `layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_area`
--

DROP TABLE IF EXISTS `layout_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_area`
--

LOCK TABLES `layout_area` WRITE;
/*!40000 ALTER TABLE `layout_area` DISABLE KEYS */;
INSERT INTO `layout_area` VALUES (6,47,22),(7,48,25),(8,47,25),(9,49,28),(11,52,31),(14,55,28),(15,56,36),(16,57,37),(17,58,38),(19,52,38),(20,61,40),(21,60,41),(22,62,42),(23,58,43),(24,63,43),(25,52,43),(26,64,42),(28,58,44),(29,65,43),(30,65,38),(31,66,31),(33,47,45),(34,55,46),(35,64,45),(36,65,47),(37,48,48),(39,48,39),(40,64,39),(41,54,39),(42,56,39),(44,48,50),(45,64,52),(46,68,0),(47,69,52),(48,70,0),(49,71,0),(50,48,53),(51,72,53),(52,73,54),(53,74,54),(54,48,57),(55,69,58),(56,54,59),(57,75,60),(58,76,60),(59,77,62),(60,78,62);
/*!40000 ALTER TABLE `layout_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_object`
--

DROP TABLE IF EXISTS `layout_object`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layout_id` int(11) NOT NULL,
  `object_id` int(11) NOT NULL,
  `pos_x` int(11) NOT NULL,
  `pos_y` int(11) NOT NULL,
  `frame_width` int(11) NOT NULL,
  `frame_height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_object`
--

LOCK TABLES `layout_object` WRITE;
/*!40000 ALTER TABLE `layout_object` DISABLE KEYS */;
INSERT INTO `layout_object` VALUES (11,47,46,10,53,30,37),(12,47,47,38,53,22,35),(13,47,48,8,49,36,45),(14,48,46,13,53,28,40),(15,48,47,39,56,23,34),(16,49,49,25,58,57,35),(20,66,51,30,1,39,35),(21,55,49,28,37,61,42),(22,55,47,6,63,21,30),(23,65,46,29,30,41,36),(24,68,46,4,53,38,35),(25,68,47,69,13,26,22),(26,69,47,42,40,25,27),(27,70,52,19,31,107,106),(28,70,53,8,37,48,42),(29,72,54,75,184,70,80),(30,72,46,3,61,36,35),(31,54,46,2,2,2,2),(32,75,55,6,7,23,25),(33,77,56,208,50,50,62),(34,77,57,61,62,21,21),(35,77,58,81,87,47,32);
/*!40000 ALTER TABLE `layout_object` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `object`
--

DROP TABLE IF EXISTS `object`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `object` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `product_width` int(11) NOT NULL,
  `product_height` int(11) NOT NULL,
  `product_depth` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `object`
--

LOCK TABLES `object` WRITE;
/*!40000 ALTER TABLE `object` DISABLE KEYS */;
INSERT INTO `object` VALUES (46,'Orange chair','Orange simple chair','Qpix solutions',24,'cart-item-113.png','www.ae.com',34,160,160,'2015-12-17 15:02:56'),(47,'Table','Table in the middle','Qpix solutions',24,'cart-item-210.png','www.ae.com',34,160,160,'2015-12-17 15:10:37'),(48,'Right chair','Right chair','Qpix solutions',24,'cart-item-114.png','www.ae.com',34,160,160,'2015-12-17 15:13:58'),(49,'Couch ','ddf','Brabbu',3200,'maree-lounge-sofa-mid-century-modern-furniture-11.jpg','www.dein-inneneinrichter.de',56,23,12,'2015-12-17 20:41:45'),(50,'Lampe','www.dein-inneneinrichter.de/products','Delightfull',1200,'hanna-unique-ceiling-dining-vintage-lamp-detail-02.jpg','www.dein-inneneinrichter.de',34,34,234,'2016-01-04 15:46:21'),(51,'Eine Klassiche Lampe','Lampe','Qpix solutions',3245,'Screen_Shot_2016-01-24_at_7.51_.35_PM_.png','www.google.com',34,160,160,'2016-01-24 19:52:08'),(52,'obj1','asdsa','sdf',345,'test2_12.jpg','sdfsdfsdf',123,123,23,'2017-11-06 20:25:21'),(53,'object','sdfs','ikea',123,'test2_121.jpg','dfsdfsd',23,23,23,'2017-11-06 20:25:56'),(54,'object11','1122','sdf',123,'01_inspire-bedroom_bg_01.png','sdfsdfsdf',23,23,23,'2017-11-06 20:38:57'),(55,'456','hgj','ihjk',675,'demo2.jpg','www.google.de',678,678,7678,'2018-03-13 22:46:53'),(56,'chair','2','d',3456,'Screen_Shot_2018-04-16_at_7.36_.24_PM_.png','link',50,60,60,'2018-04-17 09:30:57'),(57,'pouf','sd','f',5645,'Screen_Shot_2018-04-16_at_7.36_.32_PM_2.png','link',46,456,50,'2018-04-17 09:32:36'),(58,'p2','','sdf',45,'Screen_Shot_2018-04-16_at_7.36_.46_PM_.png','link',40,50,40,'2018-04-17 09:33:15');
/*!40000 ALTER TABLE `object` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style`
--

DROP TABLE IF EXISTS `style`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) NOT NULL,
  `room` int(11) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(1000) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style`
--

LOCK TABLES `style` WRITE;
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
INSERT INTO `style` VALUES (36,'Skandinavian',1,'','living-room-2732939_1920.jpg','2018-04-17 09:23:44'),(37,'Classic',1,'','armchair-2608301_1920.jpg','2018-04-17 09:24:12'),(38,'Bohemian',1,'','colorful-1340664_1920.jpg','2018-04-17 09:24:47'),(39,'MockUpStudio1',1,'','WhatsApp_Image_2018-04-17_at_00.43_.24_.jpeg','2018-04-17 09:41:56'),(40,'MockUpStudio2',2,'','WhatsApp_Image_2018-04-17_at_03.17_.50_.jpeg','2018-04-17 09:42:14');
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `style_user`
--

DROP TABLE IF EXISTS `style_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `style_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `style_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `style_user`
--

LOCK TABLES `style_user` WRITE;
/*!40000 ALTER TABLE `style_user` DISABLE KEYS */;
INSERT INTO `style_user` VALUES (16,21,11,'2015-12-17 15:00:39'),(17,22,11,'2015-12-17 17:32:29'),(18,23,11,'2015-12-17 17:32:36'),(44,36,3,'2018-04-17 11:25:04'),(45,37,3,'2018-04-17 11:25:09'),(46,38,3,'2018-04-17 11:25:13'),(47,39,3,'2018-04-17 11:42:49'),(48,40,3,'2018-04-17 11:42:58');
/*!40000 ALTER TABLE `style_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  `img` varchar(1000) NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Hatem','Maamoun','hmaamoun@qpixsolutions.com','12345678','1','2015-09-04 08:19:32'),(2,'Wahid','Magdy','wmagdy@qpixsolutions.com','12345678','img-thing2.jpeg','2015-09-04 15:18:41'),(3,'Test f','test l','test@test.com','12345678','mallet_logo_10-02.png','2015-09-05 11:21:30'),(4,'monica','riad','monicariad@googlemail.com','12345678','image12.jpeg','2015-09-08 21:03:44'),(5,'Hesham','Sharawy','hsharawy@qpixsolutions.com','12345678','marsa-alam-jetsetegypt-46.jpg','2015-09-09 17:14:22'),(6,'Ahmed','Mustafa','amustafa@qpixsolutions.com','12345678','map.png','2015-10-21 13:27:20'),(7,'Test','Test','testuser1@mockup.com','12345678','map1.png','2015-10-27 18:49:36'),(8,'Test','Test','testuser2@mockup.com','12345678','map2.png','2015-10-27 19:35:37'),(9,'gggg','ggggg','gg@gg.de','12345678','12111989_1062390413785478_1389167556257710400_n.jpg','2015-10-28 16:11:04'),(10,'Hatem','Maamoun','hatemmaamoun','12345678','Building_A_Repeated_Floor.jpg','2015-12-15 13:10:31'),(11,'Dominic','Tizziano','dominic','12345678','2016-08-24_10.10_.58_.png','2017-11-06 14:29:43'),(12,'moni','riad','moni','12345678','drink-1870139_640.jpg','2017-11-06 19:23:44'),(13,'monica234','riad234','monica123','monica123','bilderrahmen1.jpg','2018-03-13 22:03:49');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nav_data_Deutschland`
--

DROP TABLE IF EXISTS `wp_nav_data_Deutschland`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nav_data_Deutschland` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(64) NOT NULL,
  `value` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=610 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nav_data_Deutschland`
--

LOCK TABLES `wp_nav_data_Deutschland` WRITE;
/*!40000 ALTER TABLE `wp_nav_data_Deutschland` DISABLE KEYS */;
INSERT INTO `wp_nav_data_Deutschland` VALUES (231,'16.12.2013','100.00'),(232,'17.12.2013','100.00'),(233,'18.12.2013','99.93'),(234,'19.12.2013','100.32'),(235,'20.12.2013','100.47'),(236,'23.12.2013','100.64'),(237,'27.12.2013','100.76'),(238,'30.12.2013','101.03'),(239,'02.01.2014','101.01'),(240,'03.01.2014','100.80'),(241,'06.01.2014','101.18'),(242,'07.01.2014','100.97'),(243,'08.01.2014','101.12'),(244,'09.01.2014','101.03'),(245,'10.01.2014','100.94'),(246,'13.01.2014','101.20'),(247,'14.01.2014','101.24'),(248,'15.01.2014','101.27'),(249,'16.01.2014','101.63'),(250,'17.01.2014','101.75'),(251,'20.01.2014','102.10'),(252,'21.01.2014','102.11'),(253,'22.01.2014','102.14'),(254,'23.01.2014','101.97'),(255,'24.01.2014','101.43'),(256,'27.01.2014','100.88'),(257,'28.01.2014','100.75'),(258,'29.01.2014','100.72'),(259,'30.01.2014','100.64'),(260,'31.01.2014','100.63'),(261,'03.02.2014','100.65'),(262,'04.02.2014','100.38'),(263,'05.02.2014','100.12'),(264,'06.02.2014','100.14'),(265,'07.02.2014','100.42'),(266,'10.02.2014','100.65'),(267,'11.02.2014','100.59'),(268,'12.02.2014','101.24'),(269,'13.02.2014','101.28'),(270,'14.02.2014','101.38'),(271,'17.02.2014','101.91'),(272,'18.02.2014','102.10'),(273,'19.02.2014','102.04'),(274,'20.02.2014','102.13'),(275,'21.02.2014','102.04'),(276,'24.02.2014','102.08'),(277,'25.02.2014','102.32'),(278,'26.02.2014','102.38'),(279,'27.02.2014','102.34'),(280,'28.02.2014','102.21'),(281,'03.03.2014','102.21'),(282,'04.03.2014','101.67'),(283,'05.03.2014','102.19'),(284,'06.03.2014','101.66'),(285,'07.03.2014','101.23'),(286,'10.03.2014','100.62'),(287,'11.03.2014','100.55'),(288,'12.03.2014','100.70'),(289,'13.03.2014','100.30'),(290,'14.03.2014','100.18'),(291,'17.03.2014','100.16'),(292,'18.03.2014','100.37'),(293,'19.03.2014','100.54'),(294,'20.03.2014','100.39'),(295,'21.03.2014','100.29'),(296,'24.03.2014','100.44'),(297,'25.03.2014','100.12'),(298,'26.03.2014','100.76'),(299,'27.03.2014','101.05'),(300,'28.03.2014','101.40'),(301,'31.03.2014','101.70'),(302,'01.04.2014','101.71'),(303,'02.04.2014','101.59'),(304,'03.04.2014','101.71'),(305,'04.04.2014','101.89'),(306,'07.04.2014','102.27'),(307,'08.04.2014','101.93'),(308,'09.04.2014','102.03'),(309,'10.04.2014','101.92'),(310,'11.04.2014','101.88'),(311,'14.04.2014','101.44'),(312,'15.04.2014','101.79'),(313,'16.04.2014','101.47'),(314,'17.04.2014','101.92'),(315,'22.04.2014','102.28'),(316,'23.04.2014','102.43'),(317,'24.04.2014','102.41'),(318,'25.04.2014','102.40'),(319,'28.04.2014','102.18'),(320,'29.04.2014','102.23'),(321,'30.04.2014','102.73'),(322,'02.05.2014','102.85'),(323,'05.05.2014','102.87'),(324,'06.05.2014','102.81'),(325,'07.05.2014','102.64'),(326,'08.05.2014','103.01'),(327,'09.05.2014','103.44'),(328,'12.05.2014','103.59'),(329,'13.05.2014','103.95'),(330,'14.05.2014','104.83'),(331,'15.05.2014','104.99'),(332,'16.05.2014','104.75'),(333,'19.05.2014','104.77'),(334,'20.05.2014','104.83'),(335,'21.05.2014','104.59'),(336,'22.05.2014','104.81'),(337,'23.05.2014','104.97'),(338,'26.05.2014','105.07'),(339,'27.05.2014','105.10'),(340,'28.05.2014','105.20'),(341,'30.05.2014','105.35'),(342,'02.06.2014','105.15'),(343,'03.06.2014','105.26'),(344,'04.06.2014','105.11'),(345,'05.06.2014','105.07'),(346,'06.06.2014','105.17'),(347,'10.06.2014','105.56'),(348,'11.06.2014','105.91'),(349,'12.06.2014','105.80'),(350,'13.06.2014','105.91'),(351,'16.06.2014','106.10'),(352,'17.06.2014','105.97'),(353,'18.06.2014','106.01'),(354,'19.06.2014','105.93'),(355,'20.06.2014','106.30'),(356,'24.06.2014','106.33'),(357,'25.06.2014','106.32'),(358,'26.06.2014','106.06'),(359,'27.06.2014','106.06'),(360,'30.06.2014','106.00'),(361,'01.07.2014','105.97'),(362,'02.07.2014','106.04'),(363,'03.07.2014','106.10'),(364,'04.07.2014','106.40'),(365,'07.07.2014','106.43'),(366,'08.07.2014','106.04'),(367,'09.07.2014','105.70'),(368,'10.07.2014','105.74'),(369,'11.07.2014','105.70'),(370,'14.07.2014','105.67'),(371,'15.07.2014','105.93'),(372,'16.07.2014','105.75'),(373,'17.07.2014','106.59'),(374,'18.07.2014','106.35'),(375,'21.07.2014','106.29'),(376,'22.07.2014','106.43'),(377,'23.07.2014','106.81'),(378,'24.07.2014','107.07'),(379,'25.07.2014','106.91'),(380,'28.07.2014','106.58'),(381,'29.07.2014','106.48'),(382,'30.07.2014','106.71'),(383,'31.07.2014','106.42'),(384,'01.08.2014','105.87'),(385,'04.08.2014','105.36'),(386,'05.08.2014','105.19'),(387,'06.08.2014','105.23'),(388,'07.08.2014','105.30'),(389,'08.08.2014','105.29'),(390,'11.08.2014','104.95'),(391,'12.08.2014','105.61'),(392,'13.08.2014','105.33'),(393,'14.08.2014','105.76'),(394,'18.08.2014','105.78'),(395,'19.08.2014','106.20'),(396,'20.08.2014','106.49'),(397,'21.08.2014','106.41'),(398,'22.08.2014','106.59'),(399,'25.08.2014','106.80'),(400,'26.08.2014','107.13'),(401,'27.08.2014','107.61'),(402,'28.08.2014','107.55'),(403,'29.08.2014','107.54'),(404,'01.09.2014','107.71'),(405,'02.09.2014','107.87'),(406,'03.09.2014','107.69'),(407,'04.09.2014','107.80'),(408,'05.09.2014','108.69'),(409,'08.09.2014','108.87'),(410,'09.09.2014','108.81'),(411,'10.09.2014','108.21'),(412,'11.09.2014','108.25'),(413,'12.09.2014','107.89'),(414,'15.09.2014','107.47'),(415,'16.09.2014','107.44'),(416,'17.09.2014','107.42'),(417,'18.09.2014','107.66'),(418,'19.09.2014','107.84'),(419,'22.09.2014','107.71'),(420,'23.09.2014','107.53'),(421,'24.09.2014','107.19'),(422,'25.09.2014','107.31'),(423,'26.09.2014','106.85'),(424,'29.09.2014','107.14'),(425,'30.09.2014','107.01'),(426,'01.10.2014','107.27'),(427,'02.10.2014','106.99'),(428,'06.10.2014','106.50'),(429,'07.10.2014','106.43'),(430,'08.10.2014','106.11'),(431,'09.10.2014','105.92'),(432,'10.10.2014','105.81'),(433,'13.10.2014','105.26'),(434,'14.10.2014','104.95'),(435,'15.10.2014','104.92'),(436,'16.10.2014','103.89'),(437,'17.10.2014','103.55'),(438,'20.10.2014','104.69'),(439,'21.10.2014','104.35'),(440,'22.10.2014','105.39'),(441,'23.10.2014','105.57'),(442,'24.10.2014','105.73'),(443,'27.10.2014','105.67'),(444,'28.10.2014','105.49'),(445,'29.10.2014','106.23'),(446,'30.10.2014','106.63'),(447,'31.10.2014','106.72'),(448,'03.11.2014','107.31'),(449,'04.11.2014','107.09'),(450,'05.11.2014','106.71'),(451,'06.11.2014','107.09'),(452,'07.11.2014','107.55'),(453,'10.11.2014','107.31'),(454,'11.11.2014','107.43'),(455,'12.11.2014','107.41'),(456,'13.11.2014','107.33'),(457,'14.11.2014','107.52'),(458,'17.11.2014','107.32'),(459,'18.11.2014','107.59'),(460,'19.11.2014','107.68'),(461,'20.11.2014','107.59'),(462,'21.11.2014','107.84'),(463,'24.11.2014','109.08'),(464,'25.11.2014','108.97'),(465,'26.11.2014','108.87'),(466,'27.11.2014','108.89'),(467,'28.11.2014','108.92'),(468,'01.12.2014','108.33'),(469,'02.12.2014','108.86'),(470,'03.12.2014','109.17'),(471,'04.12.2014','109.57'),(472,'05.12.2014','109.01'),(473,'08.12.2014','109.39'),(474,'09.12.2014','108.95'),(475,'10.12.2014','108.54'),(476,'11.12.2014','108.06'),(477,'12.12.2014','108.37'),(478,'15.12.2014','107.23'),(479,'16.12.2014','106.31'),(480,'17.12.2014','106.33'),(481,'18.12.2014','107.00'),(482,'19.12.2014','107.95'),(483,'22.12.2014','108.37'),(484,'23.12.2014','108.67'),(485,'29.12.2014','108.96'),(486,'30.12.2014','109.06'),(487,'02.01.2015','108.81'),(488,'05.01.2015','108.73'),(489,'06.01.2015','108.06'),(490,'07.01.2015','108.21'),(491,'08.01.2015','108.74'),(492,'09.01.2015','109.61'),(493,'12.01.2015','109.08'),(494,'13.01.2015','109.21'),(495,'14.01.2015','109.90'),(496,'15.01.2015','109.75'),(497,'16.01.2015','112.42'),(498,'19.01.2015','113.20'),(499,'20.01.2015','113.38'),(500,'21.01.2015','113.65'),(501,'22.01.2015','113.84'),(502,'23.01.2015','115.11'),(503,'26.01.2015','116.25'),(504,'27.01.2015','116.14'),(505,'28.01.2015','115.24'),(506,'29.01.2015','115.30'),(507,'30.01.2015','114.58'),(508,'02.02.2015','114.48'),(509,'03.02.2015','115.22'),(510,'04.02.2015','115.25'),(511,'05.02.2015','115.85'),(512,'06.02.2015','115.45'),(513,'09.02.2015','115.38'),(514,'10.02.2015','115.24'),(515,'11.02.2015','115.18'),(516,'12.02.2015','114.82'),(517,'13.02.2015','114.98'),(518,'16.02.2015','115.48'),(519,'17.02.2015','115.58'),(520,'18.02.2015','115.15'),(521,'19.02.2015','115.16'),(522,'20.02.2015','115.32'),(523,'23.02.2015','115.46'),(524,'24.02.2015','115.85'),(525,'25.02.2015','116.00'),(526,'26.02.2015','116.16'),(527,'27.02.2015','117.09'),(528,'02.03.2015','117.24'),(529,'03.03.2015','117.27'),(530,'04.03.2015','116.77'),(531,'05.03.2015','117.32'),(532,'06.03.2015','117.63'),(533,'09.03.2015','117.55'),(534,'10.03.2015','117.41'),(535,'11.03.2015','117.18'),(536,'12.03.2015','118.26'),(537,'13.03.2015','118.09'),(538,'16.03.2015','118.82'),(539,'17.03.2015','118.92'),(540,'18.03.2015','118.32'),(541,'19.03.2015','118.41'),(542,'20.03.2015','118.95'),(543,'23.03.2015','119.23'),(544,'24.03.2015','118.84'),(545,'25.03.2015','119.17'),(546,'26.03.2015','118.21'),(547,'27.03.2015','118.60'),(548,'30.03.2015','118.48'),(549,'31.03.2015','119.11'),(550,'01.04.2015','118.79'),(551,'02.04.2015','118.65'),(552,'07.04.2015','118.28'),(553,'08.04.2015','119.53'),(554,'09.04.2015','119.35'),(555,'10.04.2015','120.28'),(556,'13.04.2015','121.34'),(557,'14.04.2015','121.21'),(558,'15.04.2015','120.57'),(559,'16.04.2015','121.05'),(560,'17.04.2015','120.61'),(561,'20.04.2015','119.95'),(562,'21.04.2015','120.38'),(563,'22.04.2015','120.35'),(564,'23.04.2015','120.20'),(565,'24.04.2015','119.35'),(566,'27.04.2015','119.14'),(567,'28.04.2015','120.17'),(568,'29.04.2015','119.27'),(569,'30.04.2015','117.65'),(570,'04.05.2015','116.91'),(571,'05.05.2015','117.66'),(572,'06.05.2015','116.64'),(573,'07.05.2015','115.67'),(574,'08.05.2015','116.14'),(575,'11.05.2015','117.22'),(576,'12.05.2015','116.94'),(577,'13.05.2015','116.09'),(578,'15.05.2015','116.34'),(579,'18.05.2015','116.10'),(580,'19.05.2015','116.79'),(581,'20.05.2015','117.99'),(582,'21.05.2015','117.89'),(583,'22.05.2015','117.62'),(584,'26.05.2015','118.26'),(585,'27.05.2015','117.44'),(586,'28.05.2015','117.69'),(587,'29.05.2015','117.41'),(588,'01.06.2015','116.90'),(589,'02.06.2015','116.74'),(590,'03.06.2015','115.94'),(591,'04.06.2015','114.94'),(592,'05.06.2015','114.62'),(593,'08.06.2015','114.41'),(594,'09.06.2015','113.57'),(595,'10.06.2015','113.76'),(596,'11.06.2015','114.21'),(597,'12.06.2015','114.76'),(598,'15.06.2015','114.41'),(599,'16.06.2015','113.67'),(600,'17.06.2015','113.97'),(601,'18.06.2015','113.52'),(602,'19.06.2015','113.96'),(603,'22.06.2015','113.60'),(604,'24.06.2015','114.99'),(605,'25.06.2015','114.86'),(606,'26.06.2015','114.72'),(607,'29.06.2015','115.19'),(608,'30.06.2015','113.89'),(609,'01.07.2015','114.20');
/*!40000 ALTER TABLE `wp_nav_data_Deutschland` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-27 10:17:12
