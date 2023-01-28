-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: miras
-- ------------------------------------------------------
-- Server version	8.0.32-0buntu0.20.04.1

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
-- Table structure for table `activation`
--

DROP TABLE IF EXISTS `activation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activation` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `vc_expired_at` bigint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `activation_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activation`
--

LOCK TABLES `activation` WRITE;
/*!40000 ALTER TABLE `activation` DISABLE KEYS */;
INSERT INTO `activation` VALUES (8,'09121234568',640813,'2022-10-24 09:01:30','2022-10-24 09:01:30',0);
/*!40000 ALTER TABLE `activation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `address` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `x` double NOT NULL,
  `y` double NOT NULL,
  `city_id` int unsigned NOT NULL,
  `recv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recv_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recv_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `address_name_user_id_unique` (`name`,`user_id`),
  UNIQUE KEY `address_postal_code_unique` (`postal_code`),
  KEY `address_user_id_index` (`user_id`),
  KEY `address_city_id_index` (`city_id`),
  CONSTRAINT `address_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `events`.`cities` (`id`),
  CONSTRAINT `address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (3,1,'asdwq\nasdqwdqw\nasd','asdq','1971933113',35.75913110471919,51.42132504166324,1,'asdq','adassda','09121111111',0),(5,1,'asdq\nasdqw','dfsdf','19232132123',35.7108030297143,51.37291183419501,1,'fsfwe','sdfs','09121111111',0);
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `banners` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `section` enum('home','list','detail') COLLATE utf8mb4_unicode_ci NOT NULL,
  `site` enum('event','shop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'shop',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES (1,'https://google.com',NULL,'uXglTxoZg7bty8klGJUrCqtiB8j6XVvEVCzDYj6B.jpg','home','shop'),(2,'https://google.com',NULL,'q3I0GzUgiwsZGLf4xOLVskBpanrcvisboiYQofVt.jpg','home','shop');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digest` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `header` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int unsigned NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (1,NULL,NULL,'asdwqdwqsad','dqwdqdwq',NULL,NULL,NULL,'2022-10-15 04:20:59','2022-10-15 04:54:07','dqdwq',3,1,'sdwq'),(8,NULL,'شسی','lorem …','lorem …','salam',NULL,'test','2022-10-15 04:57:08','2022-10-15 04:57:08','بلاگ1',1,1,NULL),(9,NULL,'سیش','lorem …','lorem …',NULL,'optional','test','2022-10-15 04:57:08','2022-10-15 04:57:08','بلاگ2',2,1,NULL),(10,NULL,'صض','lorem …','lorem …','salam2',NULL,NULL,'2022-10-15 04:57:08','2022-10-15 04:57:08','بلاگ3',4,1,'بلاگ3'),(11,NULL,NULL,'lorem …','lorem …',NULL,NULL,'test,test2','2022-10-15 04:57:08','2022-10-15 04:57:08','بلاگ4',3,1,NULL),(12,NULL,NULL,'lorem …','lorem …',NULL,'tag',NULL,'2022-10-15 04:57:08','2022-10-15 04:57:08','بلاگ5',100,1,'بلاگ5'),(13,NULL,NULL,'lorem …','lorem …',NULL,NULL,'test3','2022-10-15 04:57:08','2022-10-15 04:57:08','بلاگ6',1,0,NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'adsa','YEoVburMYdbrTLfz2rCQUbbuGE9n4RGMe6VQ8HJC.png',NULL),(2,'dsdww',NULL,NULL),(3,'brand1',NULL,NULL),(4,'brand2',NULL,NULL),(5,'brand3',NULL,NULL);
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `digest` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int unsigned NOT NULL,
  `parent_id` int unsigned DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `show_in_first_page` tinyint(1) NOT NULL DEFAULT '0',
  `show_items_in_first_page` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  KEY `categories_parent_id_index` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'صنایع دستی',NULL,'شسی','lorem …','salam','test',1,NULL,1,1,1),(2,'گلیم بافی',NULL,'سیش',NULL,NULL,'test',2,NULL,1,0,1),(3,'منبت کاری',NULL,'صض','lorem …','salam2',NULL,4,NULL,1,0,0),(4,'جاجیم بافی',NULL,NULL,NULL,NULL,'test,test2',3,NULL,1,0,0),(5,'قالی بافی',NULL,NULL,NULL,NULL,NULL,100,NULL,1,1,0),(6,'معرق',NULL,NULL,NULL,NULL,'test3',1,3,1,0,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_features`
--

DROP TABLE IF EXISTS `category_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_features` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_in_top` tinyint(1) NOT NULL DEFAULT '0',
  `effect_on_price` tinyint(1) NOT NULL DEFAULT '0',
  `effect_on_available_count` tinyint(1) NOT NULL DEFAULT '0',
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `choices` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int unsigned NOT NULL,
  `answer_type` enum('number','text','longtext','multi_choice') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'text',
  `category_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_features_category_id_index` (`category_id`),
  CONSTRAINT `category_features_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_features`
--

LOCK TABLES `category_features` WRITE;
/*!40000 ALTER TABLE `category_features` DISABLE KEYS */;
INSERT INTO `category_features` VALUES (1,'باتری',1,1,0,'mA',NULL,1,'number',1),(3,'سایز',1,0,1,NULL,'Small$$__Med$$__Large$$null',2,'multi_choice',6),(4,'multicolor',1,0,1,NULL,'قرمز$$rgb(0, 0, 255)__آبی$$rgb(255, 0, 0)',1,'multi_choice',4);
/*!40000 ALTER TABLE `category_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `msg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate` tinyint DEFAULT NULL,
  `is_bookmark` tinyint(1) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `positive` longtext COLLATE utf8mb4_unicode_ci,
  `negative` longtext COLLATE utf8mb4_unicode_ci,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `comments_product_id_user_id_unique` (`product_id`,`user_id`),
  KEY `comments_product_id_index` (`product_id`),
  KEY `comments_user_id_index` (`user_id`),
  CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=441 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (290,2,1,'Placeat aut et quia vero in. Odio omnis ut et optio eligendi. Error labore earum sit sequi ullam. Repellat debitis aut temporibus quibusdam tenetur non. Voluptas deserunt aut sint similique qui.','2022-10-18 07:35:28','2022-10-18 07:35:28',4,1,0,'Beatae ad dolorem ex accusantium at.$$$___$$$Aut similique nemo incidunt ut consequatur.$$$___$$$Qui fugiat quod quibusdam enim aut.',NULL,NULL),(291,2,3,'Reprehenderit at et et totam consectetur. Eligendi et inventore earum. Nobis consectetur inventore vel omnis omnis maxime provident earum. Et et sunt rerum commodi similique adipisci praesentium.','2022-10-18 07:35:28','2022-10-18 07:35:28',NULL,1,1,'Nobis sint hic qui aut sit.$$$___$$$Corrupti veritatis et expedita nam itaque.$$$___$$$Nemo unde voluptates sequi cum rerum occaecati.','At optio quasi velit quasi.$$$___$$$Non blanditiis sit dolore nam dolor omnis.','2022-10-18 07:35:28'),(292,2,38,'Hic ut aut delectus adipisci officiis in. Sunt dolore deleniti consequatur aut nobis. Laborum voluptate quas necessitatibus voluptatem et.','2022-10-18 07:35:28','2022-10-18 07:35:28',NULL,1,1,NULL,NULL,'2022-10-18 07:35:28'),(293,2,39,'Debitis non unde commodi ipsa. Minus error illo libero eos quia quidem vero. Dicta eius ut voluptas ad excepturi numquam.','2022-10-18 07:35:28','2022-10-18 07:35:28',3,1,0,'Inventore aut aliquid hic incidunt commodi.$$$___$$$Est fugiat sed illum qui aut.$$$___$$$Alias iste earum repudiandae ipsa.',NULL,NULL),(294,2,40,'Necessitatibus est voluptas aperiam sequi. Et ratione totam id odit. Vel rem unde qui quo dicta adipisci nam tempore.','2022-10-18 07:35:28','2022-10-18 07:35:28',5,1,0,'Ratione exercitationem mollitia minima.$$$___$$$Autem omnis sunt nisi fugiat dolorum.$$$___$$$Ab eum rerum ut. Sunt est aut vel eaque facilis.','Iusto odit rerum enim iure sit unde molestiae.$$$___$$$Quod debitis cum quisquam tenetur.',NULL),(295,2,41,'Est iure libero repudiandae qui ex in consectetur. Iure similique corporis aut deserunt et laborum. Et ut aspernatur quia. Voluptatem ab amet sapiente blanditiis quas ut.','2022-10-18 07:35:29','2022-10-18 07:35:29',NULL,1,1,'Sit dolor sint nemo aut voluptatem qui.$$$___$$$Sunt sed odio quas provident non non.$$$___$$$Veritatis esse commodi rerum est enim.',NULL,'2022-10-18 07:35:29'),(296,2,42,'Iure voluptas debitis numquam. Eaque est nulla eum ad perspiciatis et. Nihil et doloremque dolores inventore.','2022-10-18 07:35:29','2022-10-18 07:35:29',2,1,0,NULL,'Deleniti omnis omnis provident quos.$$$___$$$Corrupti quaerat tempore dolor illo quam qui.',NULL),(297,2,43,'Ipsum veniam accusantium nemo consectetur. Eos cupiditate id esse tempora vel doloribus consequatur. Quod nesciunt voluptatem non voluptas laudantium. Porro ex id voluptatem aperiam.','2022-10-18 07:35:29','2022-10-18 07:35:29',4,1,0,NULL,NULL,NULL),(298,2,44,'Eos qui iure deleniti aut molestiae nisi et eos. Et sit quia voluptates deleniti eveniet. Nesciunt tempora beatae mollitia doloremque illo.','2022-10-18 07:35:29','2022-10-18 07:35:29',1,1,1,'Omnis omnis omnis vero mollitia voluptatem.$$$___$$$Eius adipisci ratione voluptas quis impedit et.$$$___$$$At illum fuga deserunt sunt quisquam.',NULL,'2022-10-18 07:35:29'),(299,2,45,'Culpa dolor omnis id et maiores velit deserunt repudiandae. Dignissimos numquam quia minima amet rem consequuntur ut.','2022-10-18 07:35:29','2022-10-18 07:35:29',NULL,0,1,NULL,NULL,'2022-10-18 07:35:29'),(300,2,46,'Voluptatum aut sapiente modi in rerum. Inventore dicta vel assumenda. Aut et asperiores sint repudiandae corporis rerum. Eum eveniet et molestias natus qui ut.','2022-10-18 07:35:30','2022-10-18 07:35:30',NULL,0,0,NULL,'In in et consequatur aliquid voluptatibus soluta.$$$___$$$Nihil molestiae non consequatur quo.',NULL),(301,2,47,'Repellendus rerum porro neque ab nulla ipsa. Saepe necessitatibus quas consectetur eum. Recusandae qui et necessitatibus similique veniam. Minus quaerat autem cum corrupti aliquid et dolore.','2022-10-18 07:35:30','2022-10-18 07:35:30',3,0,1,'Laboriosam autem eos fugit in.$$$___$$$Voluptatum ipsa sit et dolores.$$$___$$$Enim ut sunt sequi.','Neque perspiciatis sunt aut temporibus ut.$$$___$$$Sit odio voluptatem architecto magni.','2022-10-18 07:35:30'),(302,2,48,'Quis dolorum aliquid sed voluptate quaerat cupiditate. Odio sint dolore rerum perferendis.','2022-10-18 07:35:30','2022-10-18 07:35:30',2,1,0,NULL,NULL,NULL),(303,2,49,'Autem voluptatibus molestiae architecto. Vel velit delectus in consectetur dolores beatae.','2022-10-18 07:35:30','2022-10-18 07:35:30',NULL,1,0,NULL,NULL,NULL),(304,2,50,'Inventore veritatis et quam ea. Inventore possimus placeat accusantium dicta illo. Cum voluptatibus et blanditiis laborum dolorem adipisci.','2022-10-18 07:35:30','2022-10-18 07:35:30',5,1,1,NULL,'Necessitatibus ut vel qui autem aut.$$$___$$$Aut id magni laborum facilis sit beatae.','2022-10-18 07:35:30'),(305,2,51,'Ad blanditiis consequatur beatae. Eum occaecati et voluptates facilis eos libero deleniti.','2022-10-18 07:35:30','2022-10-18 07:35:30',1,1,1,NULL,'Sed ut in quos neque dolor libero magni.$$$___$$$Rerum modi repellendus quibusdam quo ipsam ut.','2022-10-18 07:35:30'),(306,2,52,'Soluta tempora est ullam esse. Fugit sunt voluptas molestias rerum nam doloremque. Sequi consequuntur reprehenderit asperiores veniam consectetur. Debitis sit minus iste ab vel earum.','2022-10-18 07:35:30','2022-10-18 07:35:30',2,1,1,'Voluptas voluptatem rerum doloribus ad vel.$$$___$$$Dolorem veniam nam voluptatem non in qui quis.$$$___$$$Quas at rem sit est modi.',NULL,'2022-10-18 07:35:30'),(307,2,53,'Ea natus ipsum consequatur et dolor commodi ab ut. Similique sit dolorum est est et voluptatem incidunt. Et quas possimus sed veniam voluptatibus. Dolore quasi quis ut maxime reprehenderit quos.','2022-10-18 07:35:31','2022-10-18 07:35:31',NULL,0,0,'Sed in dolorem sunt fuga totam.$$$___$$$Error et quia qui consequuntur omnis neque.$$$___$$$Quisquam laboriosam aliquid hic rerum omnis est.','Est labore qui tempora.$$$___$$$A officia nihil aut quia et minus quibusdam sint.',NULL),(308,2,54,'Iusto ut nihil quae tempore. Molestiae ut ab eius mollitia dignissimos fugiat quia. Dolores non exercitationem esse mollitia reprehenderit enim.','2022-10-18 07:35:31','2022-10-18 07:35:31',NULL,1,0,NULL,NULL,NULL),(309,3,1,'Accusantium in earum possimus quam molestiae est et. A adipisci provident sint aliquam eos et. Omnis eaque aliquid et nobis dolor temporibus accusamus doloribus. Optio dolor nulla quisquam unde sint.','2022-10-18 07:35:31','2022-10-18 07:35:31',1,1,1,'Ratione molestias asperiores iusto minima.$$$___$$$Libero debitis atque non ipsum.$$$___$$$Aut minus autem voluptas consequatur atque.','Non dolores esse in vero ad qui.$$$___$$$Laborum ad ullam voluptas nostrum sit iste.','2022-10-18 07:35:31'),(310,3,3,'Totam est maiores magnam quia similique. Repellendus iusto dolores non esse iure harum deleniti. Itaque enim quidem qui enim adipisci hic. Distinctio sint tenetur non maiores optio vel qui et.','2022-10-18 07:35:31','2022-10-18 07:35:31',NULL,1,0,NULL,'Magni mollitia vel veritatis sequi.$$$___$$$Earum ut sit itaque quia qui excepturi id.',NULL),(311,3,38,'Repudiandae et animi dolore autem magnam porro aliquam. Repellendus sunt inventore repellat quidem mollitia accusantium dignissimos. Sit reiciendis qui cum laborum. Sapiente quia doloremque eos.','2022-10-18 07:35:31','2022-10-18 07:35:31',3,0,0,'Qui vitae placeat atque ut sit sed.$$$___$$$Vel ullam voluptas et libero est soluta fuga.$$$___$$$Velit aut deleniti excepturi dolores voluptatum.','Illum eum ut beatae omnis quia omnis vel.$$$___$$$Deleniti quaerat aperiam repudiandae et quaerat.',NULL),(312,3,39,'Et labore iure provident culpa est autem dolor. Rerum aut explicabo id voluptate dolorem commodi maiores. Voluptatibus sapiente officia sed quia pariatur odit accusantium.','2022-10-18 07:35:31','2022-10-18 07:35:31',NULL,1,0,NULL,NULL,NULL),(313,3,40,'Sed quisquam tenetur sint laudantium dolor magnam. Unde facere id dolorum libero magni omnis consequatur. Similique non qui qui alias.','2022-10-18 07:35:31','2022-10-18 07:35:31',NULL,0,1,'Amet minima eius quisquam praesentium sunt.$$$___$$$Officiis laudantium cum est non aut autem.$$$___$$$Eius necessitatibus eaque unde accusamus.',NULL,'2022-10-18 07:35:31'),(314,3,41,'Quia adipisci odit velit sed. Reprehenderit sapiente ipsam provident maxime. Odit sunt vitae est minus veritatis.','2022-10-18 07:35:31','2022-10-18 07:35:31',2,0,1,'Fugit error enim odio adipisci.$$$___$$$Id facilis alias aliquam blanditiis ea ab.$$$___$$$Doloribus consequatur dolor impedit.',NULL,'2022-10-18 07:35:31'),(315,3,42,'Cum exercitationem iure repudiandae qui sapiente voluptatem repellat. Distinctio culpa nulla recusandae nam voluptate amet sit. Debitis ipsam ut tempore odit.','2022-10-18 07:35:32','2022-10-18 07:35:32',NULL,1,1,'Ratione nihil odio id dolorum dolorem nihil.$$$___$$$Vel molestiae possimus at qui sit.$$$___$$$Dignissimos fugiat ut quo quia.','Aut consequuntur libero similique dicta.$$$___$$$Laudantium quia dolor omnis porro ex itaque.','2022-10-18 07:35:32'),(316,3,43,'Vel perferendis minima et sit. Est ullam consequatur dolorem et ea possimus. Voluptatem et fuga fuga ut molestiae enim.','2022-10-18 07:35:32','2022-10-18 07:35:32',NULL,0,0,NULL,'Est nulla tempore officia autem dicta.$$$___$$$Ipsam molestiae minima molestias.',NULL),(317,3,44,'Autem at architecto maxime atque tempora omnis. Ipsam possimus porro explicabo quis maiores. Tenetur ut et rem rerum. Aut non et doloremque ea reiciendis omnis inventore ut.','2022-10-18 07:35:32','2022-10-18 07:35:32',NULL,0,1,NULL,'Accusamus sit quis dignissimos soluta sint.$$$___$$$Illum sed nemo quis aut enim.','2022-10-18 07:35:32'),(318,3,45,'Mollitia nobis inventore praesentium voluptatum amet vel itaque. Beatae ad dolores sunt dolores possimus beatae. Quae non doloremque aut quos deleniti quia cumque quo.','2022-10-18 07:35:32','2022-10-18 07:35:32',3,0,0,'Et odio minima numquam praesentium ut.$$$___$$$Nam dolor beatae nam deserunt possimus dolorum.$$$___$$$Ea ea nihil consequuntur ut aut aspernatur.',NULL,NULL),(319,3,46,'Impedit sed quia sit nesciunt eum autem. Ab eos velit repellendus dicta reiciendis. Minus repellendus qui accusantium voluptatem recusandae dolorum quia.','2022-10-18 07:35:32','2022-10-18 07:35:32',4,1,1,'Rerum repellendus et nihil veritatis nisi.$$$___$$$Qui non nostrum ad.$$$___$$$Dolor similique ut explicabo ad voluptatum sit.',NULL,'2022-10-18 07:35:32'),(320,3,47,'Consequatur maiores cumque hic fugiat ut sed aliquam. Omnis enim cumque quam et asperiores. Molestias hic quod porro officiis consequatur ipsum est. Ea error eum animi maiores.','2022-10-18 07:35:32','2022-10-18 07:35:32',2,1,1,'Soluta et eum odio excepturi voluptatem et odio.$$$___$$$Sed nobis impedit sit reprehenderit.$$$___$$$Saepe non eos et aut. Quos voluptatum rerum amet.',NULL,'2022-10-18 07:35:32'),(321,3,48,'Enim voluptatem maxime aut fugit laudantium quia. Cupiditate nihil error sunt. Ipsam voluptate aut veritatis laborum minima suscipit. Doloribus velit consequatur officiis.','2022-10-18 07:35:32','2022-10-18 07:35:32',1,0,0,'Beatae nihil voluptatibus in sint.$$$___$$$Reiciendis et sunt quia voluptatem et.$$$___$$$Laborum veritatis vel quo omnis maxime ut.','Dolorem deleniti quis ea.$$$___$$$Minus accusantium corporis blanditiis doloribus.',NULL),(322,3,49,'Excepturi tempore dolorem itaque quia ea commodi. Autem laudantium corrupti sed voluptatem sequi non. Accusantium odit qui est quod. Quo aspernatur quam esse id accusamus.','2022-10-18 07:35:32','2022-10-18 07:35:32',NULL,0,0,NULL,'Praesentium possimus vel hic qui.$$$___$$$Omnis doloribus et accusantium maiores.',NULL),(323,3,50,'Magnam ducimus ut quaerat. Quo quasi eligendi occaecati ut rerum non qui autem. Optio reprehenderit sed dolorem commodi. Assumenda vero culpa distinctio sit.','2022-10-18 07:35:33','2022-10-18 07:35:33',5,1,1,NULL,NULL,'2022-10-18 07:35:33'),(324,3,51,'Et repellendus commodi qui error harum perspiciatis. Qui voluptatibus quo possimus architecto aut. Unde eaque rem voluptas alias tempore nihil non.','2022-10-18 07:35:33','2022-10-18 07:35:33',3,1,1,NULL,'Tempora iste sit ipsam amet velit.$$$___$$$Non adipisci dolore quis assumenda magni et.','2022-10-18 07:35:33'),(325,3,52,'Qui quod blanditiis reiciendis eum. Occaecati impedit et est non. Pariatur quisquam eius omnis eveniet. Vero ea suscipit non aut.','2022-10-18 07:35:33','2022-10-18 07:35:33',NULL,0,0,NULL,'Ipsam voluptas voluptatem totam nihil.$$$___$$$Suscipit ducimus quas deserunt nemo.',NULL),(326,3,53,'Laudantium in sit repellendus voluptates quod. Eum optio facilis vero. Ab maxime ab aliquam aperiam.','2022-10-18 07:35:33','2022-10-18 07:35:33',4,0,0,NULL,'Qui non aut delectus libero.$$$___$$$Et modi sunt sequi ex eos.',NULL),(327,3,54,'Nemo fugit vel harum exercitationem molestiae voluptas consectetur. Nostrum voluptas cumque non ratione architecto vero. Quia ex voluptas quasi maiores ea unde quia.','2022-10-18 07:35:33','2022-10-18 07:35:33',4,0,1,'Quisquam possimus expedita autem iste.$$$___$$$Quia error iure quam.$$$___$$$Ut natus quisquam quibusdam officia ipsum.',NULL,'2022-10-18 07:35:33'),(328,3,55,'Aperiam excepturi cumque et enim perspiciatis. Veritatis illum deleniti voluptatum eos labore illo nesciunt. Accusantium et iste aliquam sed. Unde provident sit suscipit deserunt dolorem.','2022-10-18 07:35:33','2022-10-18 07:35:33',NULL,0,1,'Voluptate qui in et harum.$$$___$$$Deleniti officiis nostrum iure omnis.$$$___$$$Accusantium eveniet ratione ullam rem sapiente.',NULL,'2022-10-18 07:35:33'),(329,3,56,'Labore atque sed et illo. Quo reiciendis dolorem sint aspernatur aut. Praesentium nemo ipsam nostrum ut. Dolores voluptatum maxime soluta qui.','2022-10-18 07:35:33','2022-10-18 07:35:33',2,0,1,NULL,NULL,'2022-10-18 07:35:33'),(330,3,57,'Consequatur facere non qui sit eum assumenda dolores. Et mollitia fugit omnis veniam quia. Beatae vitae enim laboriosam aut qui voluptatem.','2022-10-18 07:35:33','2022-10-18 07:35:33',NULL,1,0,NULL,'Qui dolores corporis harum reprehenderit magnam.$$$___$$$Qui debitis consequatur est eveniet.',NULL),(331,3,58,'Ut similique tenetur quis quo expedita. Laudantium nobis est ullam cupiditate est molestiae aut. Perspiciatis id nesciunt quos velit eos voluptatem cupiditate. Et ut eius accusantium in tenetur quia.','2022-10-18 07:35:34','2022-10-18 07:35:34',NULL,0,1,'Velit adipisci nisi et aperiam.$$$___$$$Debitis reprehenderit nulla in distinctio.$$$___$$$Natus ex unde fuga earum nemo qui.',NULL,'2022-10-18 07:35:34'),(332,3,59,'Ut dolores odio accusamus rerum doloremque facere. Animi autem cupiditate pariatur labore. Omnis non ea vel recusandae ad et. Delectus nihil officia quis exercitationem quas expedita.','2022-10-18 07:35:34','2022-10-18 07:35:34',5,1,1,NULL,'Vel quibusdam enim at dolorem.$$$___$$$Unde ipsa magni molestiae id aperiam.','2022-10-18 07:35:34'),(333,3,60,'Quod expedita laborum voluptatem quia molestiae qui. Est molestiae est nihil nisi voluptatem corrupti nihil. Debitis corrupti aliquam ducimus maiores dicta qui eum.','2022-10-18 07:35:34','2022-10-18 07:35:34',NULL,1,1,'Ea necessitatibus sit provident a non sit.$$$___$$$Maxime atque quo quas voluptatum.$$$___$$$Totam explicabo qui quisquam est velit.',NULL,'2022-10-18 07:35:34'),(334,3,61,'Omnis sint culpa perferendis. Sint nesciunt nostrum voluptatem provident quis a. Voluptas aut et quo numquam dolor. Itaque repellat doloremque voluptates excepturi quo quo. Aliquid modi tempora illo.','2022-10-18 07:35:34','2022-10-18 07:35:34',1,0,0,'Rerum quas id aspernatur sit.$$$___$$$Ea labore voluptatem veniam quidem qui aut dicta.$$$___$$$Distinctio sint quia velit eligendi id deserunt.',NULL,NULL),(335,5,1,'Voluptatibus veniam dolores qui fuga reprehenderit sapiente. Perferendis nihil omnis consequuntur. Laudantium autem ex at ut amet eius.','2022-10-18 07:35:34','2022-10-18 07:35:34',1,0,1,NULL,NULL,'2022-10-18 07:35:34'),(336,5,3,'Ipsa et optio eveniet temporibus. Necessitatibus reiciendis dolorum molestias qui iusto. Quasi odit adipisci vitae nostrum modi.','2022-10-18 07:35:34','2022-10-18 07:35:34',4,0,0,'Tempore aliquam rerum suscipit quis mollitia.$$$___$$$Debitis cumque aut distinctio minima fugit.$$$___$$$Et neque incidunt neque sit voluptate odit.','Voluptatem sint minus quo maiores totam fugit.$$$___$$$Est nihil maxime at cum quae.',NULL),(337,5,38,'Reprehenderit qui qui dicta corrupti illum aut neque. Ut et velit distinctio sit. Sunt eius corporis magni. Autem quia recusandae accusamus.','2022-10-18 07:35:34','2022-10-18 07:35:34',4,1,0,'Dolorem excepturi velit quis.$$$___$$$Quibusdam et est itaque recusandae.$$$___$$$Eius alias error impedit repudiandae.','Autem perferendis aut dolor.$$$___$$$Ut in ipsa qui quis sunt. Ex cumque esse ut ut.',NULL),(338,5,39,'Et amet vel similique qui quis quis. Ipsam quidem vitae occaecati dolores recusandae. Dignissimos sit corporis rerum distinctio omnis.','2022-10-18 07:35:35','2022-10-18 07:35:35',NULL,0,1,NULL,'Sint corrupti sit id ut.$$$___$$$Est accusamus aperiam id est.','2022-10-18 07:35:35'),(339,5,40,'Optio tenetur omnis minima iusto ullam dolor deleniti. Molestias ut repellendus molestias. Incidunt voluptas consequatur deserunt ut eum.','2022-10-18 07:35:35','2022-10-18 07:35:35',1,0,1,NULL,NULL,'2022-10-18 07:35:35'),(340,5,41,'Sed qui qui fuga dignissimos ut sunt. Cumque qui labore odio nobis temporibus corporis consequatur. Eaque harum eum blanditiis at facere illo id placeat.','2022-10-18 07:35:35','2022-10-18 07:35:35',2,0,0,'Voluptatem consequatur quis eos esse libero.$$$___$$$Molestias facilis animi hic non.$$$___$$$Qui omnis est non voluptatum non rerum.','Omnis magni aut id quam.$$$___$$$Omnis hic error hic vitae quisquam non.',NULL),(341,5,42,'Nostrum id sed tenetur numquam dolorum natus. Delectus maxime quo repellendus iure repellendus vel. Ipsam ut maiores doloribus et quod.','2022-10-18 07:35:35','2022-10-18 07:35:35',3,1,1,NULL,'Enim dolor ducimus voluptatem delectus.$$$___$$$Omnis omnis et non totam.','2022-10-18 07:35:35'),(342,5,43,'Ut nobis dolorem assumenda eos. Occaecati sed aut nisi asperiores esse expedita. Molestiae aspernatur et voluptas mollitia et in et. Rem ut repellat at numquam.','2022-10-18 07:35:35','2022-10-18 07:35:35',NULL,0,0,NULL,'Ut ipsa eius omnis et quia.$$$___$$$Voluptas dolores ea corporis et rerum.',NULL),(343,5,44,'Accusantium ut assumenda odit aut veniam. Nihil et et aut in quia itaque. Unde maiores corrupti voluptas sit odio. Est accusamus a perferendis.','2022-10-18 07:35:35','2022-10-18 07:35:35',NULL,0,1,NULL,'Nostrum quia qui vel nam.$$$___$$$Voluptatem rerum voluptatem eum consequatur.','2022-10-18 07:35:35'),(344,5,45,'In aut dicta nisi eum aperiam est. Quaerat in consequatur saepe laudantium hic necessitatibus excepturi. Ratione nemo aut sapiente laboriosam reiciendis. Est perspiciatis non et assumenda officia.','2022-10-18 07:35:35','2022-10-18 07:35:35',4,1,0,'Quos velit illo praesentium officia.$$$___$$$Voluptas soluta rerum fugit ex quia magni sit.$$$___$$$Et illum eveniet odit aperiam delectus ad quo.','Animi nihil nisi molestias sed culpa.$$$___$$$A iste eum ex ut deserunt.',NULL),(345,5,46,'Officiis voluptatem dolores nihil maiores nesciunt. Et illo in et corrupti. Aliquam molestiae nesciunt qui accusantium commodi facilis ut.','2022-10-18 07:35:35','2022-10-18 07:35:35',NULL,1,0,'Sed consequuntur enim placeat.$$$___$$$Mollitia autem dicta consectetur velit.$$$___$$$Necessitatibus cum et sit voluptatibus.',NULL,NULL),(346,5,47,'Rem itaque ad eos quod. Sit et quia hic est quidem at minus. Perspiciatis delectus dicta sit sed id omnis. Cum impedit iure esse nihil quia qui consectetur.','2022-10-18 07:35:36','2022-10-18 07:35:36',NULL,0,0,'Veniam non sed alias quos laboriosam.$$$___$$$Enim non esse modi adipisci.$$$___$$$Exercitationem eum ipsa hic non perspiciatis et.',NULL,NULL),(347,5,48,'Qui dolore dicta officiis impedit. Cupiditate vitae aliquid eos eligendi non. Et culpa consectetur ut.','2022-10-18 07:35:36','2022-10-18 07:35:36',NULL,1,0,'Quia asperiores corrupti et quasi.$$$___$$$Amet dolores blanditiis molestias quo labore.$$$___$$$Nesciunt ullam et tempore id commodi.','Nisi magni vel totam quo voluptatum sed dolores.$$$___$$$Perferendis quas beatae qui minus delectus.',NULL),(348,5,49,'Sapiente qui quis possimus et autem adipisci quia. Nihil dolore consequatur nobis et perferendis nemo. Esse ex debitis quis nihil enim doloremque. Est atque qui rerum repellat hic ratione non.','2022-10-18 07:35:36','2022-10-18 07:35:36',2,0,0,NULL,'Aliquid saepe eligendi corporis qui.$$$___$$$Exercitationem exercitationem distinctio cumque.',NULL),(349,5,50,'Rem animi unde libero quaerat suscipit. Recusandae quis ut recusandae porro. Porro voluptatem vitae voluptates ea.','2022-10-18 07:35:36','2022-10-18 07:35:36',5,0,0,NULL,NULL,NULL),(350,5,51,'Pariatur et temporibus aspernatur aut odit dolor non. Et sunt quis in. Non sed inventore et ullam quasi quia excepturi.','2022-10-18 07:35:36','2022-10-18 07:35:36',5,1,1,NULL,NULL,'2022-10-18 07:35:36'),(351,5,52,'Suscipit et odio sunt vitae. Aut impedit exercitationem consequatur delectus. Corporis repellendus modi praesentium facilis. Adipisci consequuntur aperiam repellendus nihil quis id.','2022-10-18 07:35:36','2022-10-18 07:35:36',1,0,1,NULL,'Esse alias atque et iure.$$$___$$$Dicta reprehenderit magni et qui.','2022-10-18 07:35:36'),(352,5,53,'Earum doloremque et omnis excepturi hic. Aut minus voluptatem et delectus ut temporibus sit. Impedit cum magnam dolorum quasi quia eos consequuntur autem.','2022-10-18 07:35:36','2022-10-18 07:35:36',NULL,1,0,NULL,NULL,NULL),(353,5,54,'Eveniet excepturi voluptatem eligendi sapiente. Ullam debitis sunt illum. Omnis dolorum repellat natus omnis exercitationem numquam omnis.','2022-10-18 07:35:36','2022-10-18 07:35:36',5,1,1,NULL,'Et odio dicta incidunt fugit magnam.$$$___$$$Ipsam numquam aut tempora et rem.','2022-10-18 07:35:36'),(354,5,55,'Autem cupiditate repellat aut deserunt. Numquam ea commodi iusto optio voluptatum et nemo. Sit molestiae voluptas dolores et aut mollitia explicabo est.','2022-10-18 07:35:36','2022-10-18 07:35:36',2,1,0,NULL,NULL,NULL),(355,5,56,'Omnis enim culpa tempora nisi sapiente nostrum odit. Est ut optio itaque doloribus ea quis blanditiis maiores. Nostrum dolorem perspiciatis optio voluptatum cum.','2022-10-18 07:35:37','2022-10-18 07:35:37',NULL,1,0,NULL,'Quo quisquam et et voluptas.$$$___$$$Ratione facilis error expedita tenetur ut velit.',NULL),(356,5,57,'Alias iusto illum eaque mollitia. Labore ut fugit quas numquam ea quos deserunt ut. Ipsam natus sunt deserunt dolore dolores rerum. Sequi et harum vel odit porro.','2022-10-18 07:35:37','2022-10-18 07:35:37',4,0,0,NULL,'Saepe et delectus voluptas placeat.$$$___$$$At praesentium ut dolorem et.',NULL),(357,5,58,'Sequi nihil iusto voluptas rerum culpa. Velit at similique voluptas omnis adipisci rerum. Officia illo quidem alias corporis fugiat labore.','2022-10-18 07:35:37','2022-10-18 07:35:37',4,1,1,'Facilis quibusdam temporibus vero fugiat.$$$___$$$Magnam dicta veritatis neque.$$$___$$$Laborum inventore doloribus non.','Ab ea qui dolor voluptas.$$$___$$$Ipsam consequatur quia incidunt ab sint velit.','2022-10-18 07:35:37'),(358,5,59,'Fugiat voluptatem vel hic tempora debitis. Sed culpa necessitatibus nihil quas. Eos voluptates est quo occaecati consequatur. Dolor rerum alias qui a repellat ipsum error vitae.','2022-10-18 07:35:37','2022-10-18 07:35:37',NULL,0,0,NULL,'Et tempora voluptas quia et.$$$___$$$Consequuntur alias sed quod.',NULL),(359,6,1,'Nemo soluta est sequi nesciunt nihil officiis et. Id omnis provident expedita soluta. Rerum praesentium qui vero.','2022-10-18 07:35:37','2022-10-18 07:35:37',3,1,1,NULL,NULL,'2022-10-18 07:35:37'),(360,6,3,'Nam distinctio omnis maiores nam. Temporibus in voluptate aspernatur aspernatur in reiciendis neque reiciendis. Ut voluptatibus tempore facilis distinctio explicabo quaerat in.','2022-10-18 07:35:37','2022-10-18 07:35:37',1,1,1,NULL,'Ut nobis error ipsam tempore earum iure totam.$$$___$$$Beatae sed iste suscipit est id.','2022-10-18 07:35:37'),(361,6,38,'Praesentium ratione et temporibus sit veritatis. Nulla rem eum dolor qui. Voluptatem eligendi modi necessitatibus hic repellat id.','2022-10-18 07:35:38','2022-10-18 07:35:38',NULL,1,1,'Reiciendis aut officia repellat ab sit vero.$$$___$$$Nulla ut expedita doloribus.$$$___$$$Est quisquam vel alias doloremque sequi.',NULL,'2022-10-18 07:35:38'),(362,6,39,'Rerum voluptas et et ex. Rem voluptatem et ipsum at. Ab molestias dolores ea pariatur et excepturi quam. Quaerat ab libero aspernatur.','2022-10-18 07:35:38','2022-10-18 07:35:38',2,0,0,NULL,NULL,NULL),(363,6,40,'Perferendis maiores aut quam facilis perferendis dignissimos. Dolores reprehenderit exercitationem voluptatibus eum nam eius.','2022-10-18 07:35:38','2022-10-18 07:35:38',1,0,1,'Enim ipsa id fugiat nam.$$$___$$$Nihil pariatur cum ducimus minima animi.$$$___$$$Non voluptas voluptatum aliquid illum qui.',NULL,'2022-10-18 07:35:38'),(364,6,41,'Et fugiat qui aspernatur est eius doloribus temporibus. Quo omnis praesentium voluptatem quaerat aut. Exercitationem sit velit quasi. Excepturi omnis id voluptas expedita.','2022-10-18 07:35:38','2022-10-18 07:35:38',1,1,0,'Autem ea omnis ut eius.$$$___$$$Adipisci ea blanditiis quaerat aperiam.$$$___$$$Harum esse ipsum enim non explicabo.','Quis consequatur harum expedita non eum ea.$$$___$$$Ut occaecati mollitia a et et.',NULL),(365,6,42,'Et quae suscipit nobis veritatis ad. Ea nesciunt officiis porro tempore officiis laudantium. At hic omnis neque. Doloremque porro illo voluptatem unde nam dignissimos.','2022-10-18 07:35:38','2022-10-18 07:35:38',4,0,1,NULL,'Aut dicta quasi consectetur dignissimos.$$$___$$$Dicta odio quidem aut pariatur.','2022-10-18 07:35:38'),(366,6,43,'Consequuntur adipisci porro maiores laborum. Perferendis doloribus commodi recusandae sunt reprehenderit aperiam.','2022-10-18 07:35:38','2022-10-18 07:35:38',NULL,1,0,'Et laboriosam pariatur aut ea officia.$$$___$$$Omnis voluptatem tempora vitae ut.$$$___$$$Tempora qui ex eaque nesciunt.','Omnis reiciendis eligendi ut.$$$___$$$Veritatis unde voluptas earum qui.',NULL),(367,6,44,'Nesciunt voluptatem reiciendis esse eum sunt et. Velit quod tenetur aut fugiat. Eaque similique non iste. Alias esse repudiandae quasi.','2022-10-18 07:35:38','2022-10-18 07:35:38',3,1,1,NULL,NULL,'2022-10-18 07:35:38'),(368,6,45,'Eos ut eum sit quidem. Reiciendis eos aut quis. Quasi mollitia dolores quibusdam nesciunt aut corporis. Voluptates qui et laborum ad quaerat quisquam maiores.','2022-10-18 07:35:39','2022-10-18 07:35:39',5,1,1,'Ipsam corporis omnis qui consequatur debitis.$$$___$$$Voluptatem molestias delectus earum eligendi.$$$___$$$Quia quos quod vel autem et.',NULL,'2022-10-18 07:35:39'),(369,6,46,'Doloribus quia et aut qui quia. Sit molestiae tenetur quas dolor. Est distinctio inventore rerum commodi ad. Asperiores omnis totam commodi accusamus velit eum reprehenderit.','2022-10-18 07:35:39','2022-10-18 07:35:39',4,0,0,NULL,NULL,NULL),(370,6,47,'Id quia error corrupti incidunt provident recusandae. Iure ut ducimus adipisci eos eos nihil excepturi. Molestiae optio sed aliquam nisi animi ex.','2022-10-18 07:35:39','2022-10-18 07:35:39',NULL,1,0,NULL,NULL,NULL),(371,6,48,'Quasi nemo veniam dolor. Nesciunt rem facere expedita et sed ducimus omnis natus. Quisquam sit quia repellat. Fuga voluptates in consectetur quas porro quia non.','2022-10-18 07:35:39','2022-10-18 07:35:39',NULL,1,1,'Sunt ea et sunt sunt.$$$___$$$Quo quidem id explicabo eum rerum incidunt quia.$$$___$$$Dolore eos deleniti et ea magni.','Officia praesentium sapiente ut ut ut.$$$___$$$Voluptatem consequatur et omnis.','2022-10-18 07:35:39'),(372,6,49,'Est id aut vitae dolorum nemo odit inventore non. Quis reiciendis aut rem beatae optio. At voluptatum deleniti ut fuga at omnis. Placeat sunt veniam eum.','2022-10-18 07:35:39','2022-10-18 07:35:39',5,0,1,'Ab alias doloremque maxime molestias.$$$___$$$Hic et voluptatem architecto.$$$___$$$Dolorem voluptatem et et omnis enim molestias.','Minus repellat sit hic nulla eos consectetur.$$$___$$$Voluptate eligendi praesentium ducimus.','2022-10-18 07:35:39'),(373,6,50,'Ipsum non impedit et nobis dolorem voluptas. Omnis et enim et magni veniam magnam. Laborum ut aperiam tempore adipisci ipsam ab. Sint velit sed minus.','2022-10-18 07:35:39','2022-10-18 07:35:39',1,1,1,'Odit omnis ea neque debitis ducimus quis.$$$___$$$Nemo iusto quas voluptas et modi provident quia.$$$___$$$Quo vel asperiores voluptas et quod numquam.','Dolorem sed explicabo dolor labore.$$$___$$$Et ullam corrupti voluptatem sunt ipsam et.','2022-10-18 07:35:39'),(374,6,51,'Fugit provident sed voluptatem incidunt eos et ratione mollitia. Aut illum reiciendis non sint doloremque quod et eos.','2022-10-18 07:35:39','2022-10-18 07:35:39',4,1,1,NULL,NULL,'2022-10-18 07:35:39'),(375,6,52,'Eos quas explicabo omnis velit magnam temporibus. Eos consectetur aut error et impedit harum voluptatibus nihil. Voluptatibus illo non deserunt sit molestiae pariatur inventore qui.','2022-10-18 07:35:39','2022-10-18 07:35:39',NULL,1,1,'Aut at vitae est soluta illum minima sequi.$$$___$$$Harum et nulla non eum tempore occaecati.$$$___$$$Consectetur dolorem est ipsum.','Officia nostrum error et rerum voluptas aut.$$$___$$$Debitis explicabo aspernatur nulla.','2022-10-18 07:35:39'),(376,6,53,'Iste ex deleniti quia recusandae. A nulla asperiores est earum nam aut minus. Consequatur aut quo illo.','2022-10-18 07:35:39','2022-10-18 07:35:39',2,1,1,NULL,NULL,'2022-10-18 07:35:39'),(377,6,54,'Illum error nostrum animi sequi. Quo quis ab cumque porro. Sed voluptatem explicabo consequatur quasi amet.','2022-10-18 07:35:40','2022-10-18 07:35:40',NULL,0,1,'Ut architecto quasi error eius.$$$___$$$Tenetur in inventore dolore quis eos tempore qui.$$$___$$$Repudiandae eius et officiis et sint.','Repellat rerum rerum molestias illo at quod.$$$___$$$Qui minus consequatur et velit.','2022-10-18 07:35:40'),(378,6,55,'Est aut quo optio in atque ipsum error. Dolores iste aut voluptatem perspiciatis. Sequi officiis in sunt quo. Deleniti voluptas cum nam sequi et odit. Vel odio ipsam et id voluptatem rerum autem.','2022-10-18 07:35:40','2022-10-18 07:35:40',NULL,1,0,NULL,NULL,NULL),(379,7,1,'Porro fuga aut nobis voluptates cupiditate commodi. In suscipit rerum accusantium est atque. Modi qui et sit ut.','2022-10-18 07:35:40','2022-10-18 07:35:40',NULL,0,0,NULL,'Deleniti ut doloribus animi eum blanditiis.$$$___$$$Optio consequatur quam esse saepe id quis.',NULL),(380,7,3,'Impedit ipsum aut ex soluta aut ullam. Iste commodi sunt cum quisquam error eum et. Aut dolorem et aut error amet beatae.','2022-10-18 07:35:40','2022-10-18 07:35:40',NULL,0,1,NULL,'Rerum facere aperiam ipsam qui optio.$$$___$$$Doloremque error vel rerum iure dolorum.','2022-10-18 07:35:40'),(381,7,38,'Iste aspernatur saepe perspiciatis. Ut qui quasi nostrum sed corporis incidunt. Necessitatibus qui expedita ratione nemo nemo labore ut.','2022-10-18 07:35:40','2022-10-18 07:35:40',NULL,0,1,'Et quis praesentium minima dolorem fugit qui.$$$___$$$Expedita optio atque at id repellat ad.$$$___$$$Impedit at repellat consequatur quo.','Nesciunt unde et error consequatur.$$$___$$$Quae ad quo ipsam.','2022-10-18 07:35:40'),(382,7,39,'Veniam iste quia sint veniam. Fuga ipsa ut delectus vel enim sed. Assumenda totam id quis omnis nemo similique quod aperiam. Fuga quos sit quia eligendi ullam sunt.','2022-10-18 07:35:40','2022-10-18 07:35:40',4,1,0,'In odio non dolore voluptatibus.$$$___$$$Maxime nemo sit repudiandae iure cum.$$$___$$$Ut nisi non dolor error sunt deleniti nisi qui.',NULL,NULL),(383,7,40,'Accusamus molestiae hic dolor praesentium. Vel id maiores et velit. Repellendus earum totam numquam adipisci voluptas est.','2022-10-18 07:35:40','2022-10-18 07:35:40',4,0,0,'Illum similique tenetur esse delectus.$$$___$$$Quam nihil impedit aut.$$$___$$$Dignissimos architecto rerum error alias culpa.','Optio aut expedita veritatis aliquam facilis.$$$___$$$Labore laborum eum possimus odit et.',NULL),(384,7,41,'Facilis voluptas voluptatum aut et ut unde. Ad perferendis distinctio dolores inventore non. Beatae aut impedit aut fuga consequatur ipsum distinctio.','2022-10-18 07:35:41','2022-10-18 07:35:41',3,1,0,NULL,'Architecto culpa id et nostrum consequatur esse.$$$___$$$Quisquam doloribus sit et ut cumque.',NULL),(385,7,42,'Minima est iusto quia rerum hic a. Quia qui dolorem eius repudiandae minus. Voluptas rerum saepe id et praesentium officiis. Id nemo voluptates qui at.','2022-10-18 07:35:41','2022-10-18 07:35:41',NULL,1,0,NULL,'Sed eos sed iste molestiae dolorem odio.$$$___$$$Explicabo dolor distinctio enim nam.',NULL),(386,7,43,'Iste cum qui tenetur similique aut. Ut nisi ea et et rerum et. Blanditiis ipsum et commodi iure saepe ut non. Qui labore quas quos laudantium quibusdam. Aut vel impedit voluptates est in.','2022-10-18 07:35:41','2022-10-18 07:35:41',NULL,1,0,NULL,'Et ipsa et fugit repudiandae sed temporibus.$$$___$$$Qui rerum odio commodi dolor at vel at.',NULL),(387,7,44,'Hic sint animi iure similique et est. Reprehenderit voluptates enim expedita. Sunt officia assumenda voluptas eos aliquid rerum enim.','2022-10-18 07:35:41','2022-10-18 07:35:41',5,1,0,NULL,NULL,NULL),(388,7,45,'Dolorem et recusandae consequatur suscipit. Consequuntur consequatur vero aut tempore voluptatibus totam. Illum consectetur quo porro enim culpa deleniti voluptatem. Laborum et non iure et.','2022-10-18 07:35:41','2022-10-18 07:35:41',1,1,0,NULL,NULL,NULL),(389,7,46,'Non libero quae dolor earum tenetur eaque. Iure consequuntur ad ut itaque quis nostrum eos. Dolor non quasi qui minima.','2022-10-18 07:35:41','2022-10-18 07:35:41',5,0,0,'Sit sunt neque iure doloremque.$$$___$$$Fugit nihil quia et eligendi aut dicta.$$$___$$$Ut nesciunt nesciunt porro voluptatum.',NULL,NULL),(390,7,47,'Aut nam consequatur esse aut earum voluptates. Mollitia consequuntur ut sequi quod libero nihil omnis. Earum corrupti amet voluptatem tempore. Laudantium ut autem sint iste.','2022-10-18 07:35:41','2022-10-18 07:35:41',4,1,0,'Minima veniam doloribus sed accusantium ut nihil.$$$___$$$Omnis expedita debitis minus dicta.$$$___$$$Non provident eaque voluptate et.',NULL,NULL),(391,7,48,'Voluptas doloribus unde ut quo placeat. Sint voluptatem ab ut voluptatibus qui voluptate quia. Suscipit explicabo est ut saepe non quis. Quis eveniet et sunt odit aut eum molestiae minima.','2022-10-18 07:35:41','2022-10-18 07:35:41',5,1,0,'Facilis maxime quo ex iure possimus nostrum.$$$___$$$Ut quasi voluptatum aut fugit.$$$___$$$Nobis sapiente autem amet inventore tenetur.',NULL,NULL),(392,7,49,'Occaecati qui et dolore consequatur ut iste qui. Molestiae ut aut dolores eius. Non aut iste cupiditate eos non et. Voluptatibus commodi fugiat fugiat a sit.','2022-10-18 07:35:42','2022-10-18 07:35:42',2,1,1,NULL,NULL,'2022-10-18 07:35:42'),(393,7,50,'Blanditiis recusandae culpa tenetur vitae id aliquam ut. Illum quia illum nemo consequuntur atque nesciunt sed. Ut consequatur ducimus velit aut. Accusantium modi optio ut.','2022-10-18 07:35:42','2022-10-18 07:35:42',NULL,1,0,NULL,NULL,NULL),(394,8,1,'Aut maiores sed et vero ut at ut. Veniam officia veritatis tempora delectus. Dolore et assumenda ut in.','2022-10-18 07:35:42','2022-10-18 07:35:42',NULL,1,1,NULL,'Corrupti sit voluptatum amet omnis quia qui.$$$___$$$Ea assumenda vel placeat est vel consequatur.','2022-10-18 07:35:42'),(395,8,3,'Aut tempore molestias et quia reprehenderit sit. Omnis qui quis et ex eum itaque exercitationem omnis. Aut doloremque nisi ipsum modi. Fugiat sequi aut maiores.','2022-10-18 07:35:42','2022-10-18 07:35:42',4,0,0,'Est ut error non qui rerum non.$$$___$$$Doloremque sit aut nihil similique.$$$___$$$Harum quo aut saepe odit dolor.',NULL,NULL),(396,8,38,'Rem rerum ullam aut. Voluptatem mollitia impedit doloremque sed ut vel. Libero dolor eveniet corrupti aperiam. Necessitatibus quos id eum enim consequatur magnam.','2022-10-18 07:35:42','2022-10-18 07:35:42',1,0,1,NULL,NULL,'2022-10-18 07:35:42'),(397,8,39,'Sed voluptatum rerum delectus occaecati quia non nostrum consequatur. Nobis reprehenderit quod at et. Et aut dolore qui eos quia fugiat. Autem in dolor quia nihil sit officiis optio.','2022-10-18 07:35:42','2022-10-18 07:35:42',4,0,1,NULL,'Atque est incidunt deserunt facilis fuga sunt.$$$___$$$Placeat aut totam id eos tempore.','2022-10-18 07:35:42'),(398,8,40,'Ut voluptatem aspernatur nostrum quidem. Omnis nostrum excepturi rerum velit non.','2022-10-18 07:35:42','2022-10-18 07:35:42',2,0,1,'Natus fugit ut quasi error et quia accusantium.$$$___$$$Sapiente rem aut fugit consequatur temporibus.$$$___$$$Suscipit dolorum itaque et facere voluptas omnis.',NULL,'2022-10-18 07:35:42'),(399,8,41,'Iusto quos temporibus id nulla omnis quia praesentium. Et consectetur consectetur consequatur rem in reprehenderit. Nesciunt corporis quibusdam et.','2022-10-18 07:35:42','2022-10-18 07:35:42',1,1,1,NULL,NULL,'2022-10-18 07:35:42'),(400,8,42,'Est fugit voluptatum exercitationem omnis. Totam a qui ut nihil a natus alias. Animi numquam voluptatem eum esse tenetur.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,1,1,NULL,'In cum aliquid non commodi aut non.$$$___$$$Qui animi quas ut dolorem.','2022-10-18 07:35:43'),(401,8,43,'Aut eaque corporis minima atque. Incidunt debitis exercitationem dolores omnis dolorum ex doloribus. Omnis et et magnam quos voluptatem nam repellendus culpa.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,0,0,'Et mollitia quas quia dolorem vitae.$$$___$$$Culpa cumque quae aperiam deserunt ad.$$$___$$$Tenetur a recusandae saepe alias.',NULL,NULL),(402,8,44,'Eius accusamus ad aut perferendis quis quia. Quasi vel aut consequatur asperiores amet. Porro et fugiat soluta officia et et. Officiis qui quisquam est tempore.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,1,1,'Est voluptates est non cumque perferendis qui.$$$___$$$Voluptatem est aut autem.$$$___$$$Omnis tempore porro quaerat expedita.',NULL,'2022-10-18 07:35:43'),(403,8,45,'Ad explicabo et necessitatibus nam fuga porro. Rerum eius dolorum doloribus. Beatae pariatur ullam veniam laborum aut adipisci voluptatem.','2022-10-18 07:35:43','2022-10-18 07:35:43',5,0,0,NULL,NULL,NULL),(404,8,46,'Esse itaque sit est odit ipsam expedita totam. Voluptatem quibusdam omnis enim quisquam. Suscipit hic dolores ut occaecati qui. Pariatur nemo porro molestiae voluptatem ipsa odio recusandae.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,0,0,NULL,'Pariatur deserunt cumque quasi officiis.$$$___$$$Omnis consequatur excepturi non ipsam.',NULL),(405,8,47,'In ea itaque eaque blanditiis rem exercitationem. Est possimus et rerum laborum et non. Mollitia veniam voluptate eius dolores alias modi ipsum.','2022-10-18 07:35:43','2022-10-18 07:35:43',2,0,1,'Nihil aperiam odit unde qui eligendi et tempora.$$$___$$$Laboriosam recusandae nemo nihil numquam iure.$$$___$$$Qui repudiandae et assumenda enim.',NULL,'2022-10-18 07:35:43'),(406,8,48,'Voluptatum quia exercitationem assumenda. Perspiciatis commodi cupiditate ut in. Voluptatem recusandae neque dolor possimus mollitia.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,1,0,'Ut ut ut numquam eum itaque cupiditate quisquam.$$$___$$$Eos delectus dolorem quis ab excepturi est.$$$___$$$Nobis vel voluptatem eos quisquam qui.',NULL,NULL),(407,8,49,'Et quia expedita ratione. Maxime accusantium dolore rerum est. Amet repellendus ut est illo vitae et at. Quisquam et sit voluptatem.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,1,0,'Iusto nam optio non voluptates est.$$$___$$$Odio quos repudiandae velit alias quos.$$$___$$$Laudantium eligendi aut suscipit quasi unde.',NULL,NULL),(408,8,50,'Adipisci commodi aut et sint molestias non. Ducimus doloribus cumque soluta aut sed. Consequatur molestias libero cupiditate ipsa sed libero ut voluptas.','2022-10-18 07:35:43','2022-10-18 07:35:43',NULL,0,0,'Et voluptatem qui rerum quia accusantium quia.$$$___$$$Eum corrupti pariatur nesciunt omnis assumenda.$$$___$$$Rerum nam culpa ut dolorem nulla ex.',NULL,NULL),(409,8,51,'Veritatis laborum voluptatem consequatur perspiciatis recusandae aut. Aut quia nobis voluptate aliquam repellendus enim. Unde dolor itaque enim asperiores quis.','2022-10-18 07:35:44','2022-10-18 07:35:44',NULL,1,1,NULL,'Consequatur nam animi magni ab.$$$___$$$Dolor est ut omnis expedita.','2022-10-18 07:35:44'),(410,8,52,'Earum magni architecto optio in. Ipsam quos cumque provident debitis. Libero dignissimos adipisci sit qui sapiente blanditiis doloremque magni. Illo ea aut sit nostrum facilis dolorum.','2022-10-18 07:35:44','2022-10-18 07:35:44',NULL,1,1,'Consequatur cumque et ducimus incidunt.$$$___$$$Vitae nesciunt voluptatem ullam.$$$___$$$Qui impedit saepe qui non.',NULL,'2022-10-18 07:35:44'),(411,8,53,'Fugit eos occaecati quia iusto. Eos aut aut sed repellendus. Iste non numquam voluptate illum est.','2022-10-18 07:35:44','2022-10-18 07:35:44',NULL,0,1,NULL,'Voluptas explicabo aut ab dignissimos iste eius.$$$___$$$Eum nisi in aut nulla.','2022-10-18 07:35:44'),(412,8,54,'Architecto asperiores eveniet est non corporis quis minus. Ab ipsa suscipit sapiente nesciunt. Cum repellendus quisquam porro minus nobis.','2022-10-18 07:35:44','2022-10-18 07:35:44',2,0,1,'Sequi a aut deleniti recusandae.$$$___$$$Animi nemo est quos sit voluptas nisi qui.$$$___$$$Et voluptatibus et quis et cupiditate et.','Voluptatibus provident odit illum omnis deleniti.$$$___$$$Minima aut aut officia.','2022-10-18 07:35:44'),(413,9,1,'Dicta id aut sed sapiente dolorem. Aut tempore ipsam tenetur occaecati. Tempore iste quam provident maxime rerum odit eum. A est dolorem perspiciatis. Provident reprehenderit doloribus quibusdam ut.','2022-10-18 07:35:44','2022-10-18 07:35:44',1,0,1,'Ut enim nihil vitae aliquid.$$$___$$$Voluptas excepturi quis illum quia.$$$___$$$Sunt non nisi molestias consequatur consectetur.',NULL,'2022-10-18 07:35:44'),(414,9,3,'Aut eaque iure beatae aut. Dolores autem totam sit ipsam accusamus.','2022-10-18 07:35:44','2022-10-18 07:35:44',NULL,1,1,'Et repudiandae molestiae itaque placeat.$$$___$$$Deleniti dolor ab accusantium ipsum est fuga qui.$$$___$$$Id cum sit mollitia vero.',NULL,'2022-10-18 07:35:44'),(415,9,38,'Voluptatum velit eos quasi voluptatibus officia. Quos minima quo et exercitationem nihil. Placeat tempore sint ducimus animi quis eos.','2022-10-18 07:35:44','2022-10-18 07:35:44',2,0,1,'Dicta tempore ipsum veritatis iusto reiciendis.$$$___$$$Suscipit ut id quibusdam sunt et.$$$___$$$Earum corrupti quia sed.',NULL,'2022-10-18 07:35:44'),(416,9,39,'Qui velit at beatae dolores excepturi neque maiores explicabo. Saepe eius minima soluta odit sed labore. Velit corrupti cupiditate consequatur itaque.','2022-10-18 07:35:44','2022-10-18 07:35:44',3,1,0,NULL,'Soluta placeat corporis quia a dolores.$$$___$$$Earum vel nam eos nesciunt ipsum rerum.',NULL),(417,9,40,'Nihil reiciendis nisi illo beatae. Neque impedit eveniet in numquam.','2022-10-18 07:35:44','2022-10-18 07:35:44',1,1,1,'Hic eos aut repellendus est qui et eveniet et.$$$___$$$Optio accusamus inventore officia qui minima.$$$___$$$Quis maxime sed qui ex vero officiis aliquam.','Velit voluptate alias magni.$$$___$$$Libero nemo delectus maiores in et commodi vero.','2022-10-18 07:35:44'),(418,9,41,'Sequi minima laborum eum similique earum. Ducimus eius nihil dolore nam iste quos. Assumenda iure maxime mollitia error. Aut exercitationem soluta a nostrum.','2022-10-18 07:35:45','2022-10-18 07:35:45',2,1,0,'Distinctio ut placeat eveniet perspiciatis nam.$$$___$$$Magni qui voluptatem nostrum officia sed nobis.$$$___$$$Et aut autem aut animi.',NULL,NULL),(419,9,42,'Ad suscipit rerum esse et tempora quo amet. Dolorem corporis autem odit. Ipsum maiores aut perferendis quo ut. Repellat fugit blanditiis repudiandae earum deserunt magnam pariatur.','2022-10-18 07:35:45','2022-10-18 07:35:45',3,0,1,'Quo assumenda tempora aliquam qui error omnis ut.$$$___$$$Assumenda voluptatum harum et saepe et excepturi.$$$___$$$Ipsum ut veritatis non est rerum.','Earum quo delectus rem qui perferendis et beatae.$$$___$$$Neque deleniti fugiat quia voluptatum.','2022-10-18 07:35:45'),(420,9,43,'Similique maxime laborum atque inventore. Similique quos rerum et ipsum soluta qui unde. Sunt aut et nihil voluptatem vel facilis nulla. Omnis et quasi sint sequi quia consequuntur laboriosam.','2022-10-18 07:35:45','2022-10-18 07:35:45',NULL,1,1,'Sint odit fugit autem architecto sed eum.$$$___$$$Architecto et aut eveniet commodi ab.$$$___$$$Aut nulla accusamus dolorem reiciendis rem quis.','Quis eos laborum natus tenetur.$$$___$$$Sed repellat magni saepe beatae.','2022-10-18 07:35:45'),(421,9,44,'Tempore est sit deserunt consequatur. Sequi sed ut ut voluptates expedita. Architecto officiis non nam inventore voluptatem animi. Perferendis qui est consectetur sunt.','2022-10-18 07:35:45','2022-10-18 07:35:45',4,0,1,NULL,NULL,'2022-10-18 07:35:45'),(422,9,45,'Est laborum iusto et rerum quos labore quibusdam. Dolorum explicabo cupiditate placeat ullam eos. Ex omnis sit velit ullam. Ut quibusdam repellat commodi nihil est.','2022-10-18 07:35:45','2022-10-18 07:35:45',NULL,1,1,'Rerum hic qui rerum a tenetur sit.$$$___$$$Molestiae quia quidem aut ducimus dolores ut.$$$___$$$Doloribus at ex unde beatae quo.','Aut perspiciatis quod quos aut enim itaque quae.$$$___$$$In velit nihil quis dolor sed.','2022-10-18 07:35:45'),(423,9,46,'Illo error aliquid sed est consequatur culpa deserunt. Ut et praesentium possimus aut. Autem ab facilis doloremque perferendis.','2022-10-18 07:35:45','2022-10-18 07:35:45',4,0,1,NULL,NULL,'2022-10-18 07:35:45'),(424,9,47,'Nam accusamus esse rerum qui distinctio. Delectus omnis eum qui cumque nesciunt exercitationem. Ipsum unde sit fugit alias.','2022-10-18 07:35:45','2022-10-18 07:35:45',NULL,1,0,'Qui vero impedit alias praesentium.$$$___$$$Doloribus cum similique nihil est sit deleniti.$$$___$$$Aperiam dolor qui voluptatem id deleniti.',NULL,NULL),(425,9,48,'Provident perspiciatis voluptas quo ut non quos porro beatae. Magni quidem illum eum id voluptatem.','2022-10-18 07:35:45','2022-10-18 07:35:45',2,1,1,'Minima ab praesentium deleniti eos nulla.$$$___$$$Eum enim iste vero accusamus atque maiores.$$$___$$$Dolores doloribus excepturi asperiores amet id.',NULL,'2022-10-18 07:35:45'),(426,9,49,'Sint voluptates eos non cum ut quae. Vel cumque reiciendis harum fugiat et ab cum. Iusto cum et error quaerat nam minus autem.','2022-10-18 07:35:45','2022-10-18 07:35:45',3,0,1,NULL,NULL,'2022-10-18 07:35:45'),(428,10,3,'Dolor architecto ea et ex. Deserunt veritatis sint velit. Illo quis nemo amet autem dolores et corporis.','2022-10-18 07:35:46','2022-10-18 07:35:46',2,0,0,'Esse perferendis unde id fuga quasi.$$$___$$$Molestiae sunt in est nobis et.$$$___$$$Omnis dignissimos est et.','Est accusantium quaerat nostrum.$$$___$$$Ducimus quis sed et ipsa voluptatem facilis fuga.',NULL),(429,10,38,'Aliquam nemo in delectus placeat quis ut quia dolorum. Iste architecto voluptas cum. Eaque est voluptatibus non veniam repellendus fugiat. Excepturi nobis est aut non.','2022-10-18 07:35:46','2022-10-18 07:35:46',NULL,0,1,NULL,NULL,'2022-10-18 07:35:46'),(430,10,39,'Est dolorem fugit totam. Est blanditiis quia reiciendis amet. Impedit blanditiis ut et et similique.','2022-10-18 07:35:46','2022-10-18 07:35:46',NULL,0,1,'Quis deleniti ea cumque molestiae.$$$___$$$Quasi recusandae enim mollitia.$$$___$$$Eum autem dolore ut consequatur.',NULL,'2022-10-18 07:35:46'),(431,10,40,'Quia repellendus doloremque et exercitationem libero consequatur laboriosam. Eum praesentium neque ut tempore dolores qui ut. Officiis quis non libero esse esse voluptatum.','2022-10-18 07:35:46','2022-10-18 07:35:46',2,0,1,NULL,NULL,'2022-10-18 07:35:46'),(432,10,41,'Harum nihil quo sapiente corrupti eveniet et. Iure deserunt harum unde est optio a. Adipisci officia totam sapiente quo amet et voluptatem. Distinctio ducimus ea dignissimos dolor.','2022-10-18 07:35:46','2022-10-18 07:35:46',5,0,1,NULL,'Quo cupiditate perspiciatis aut numquam culpa.$$$___$$$Repellat inventore et molestiae id.','2022-10-18 07:35:46'),(433,10,42,'Veniam tempora placeat ipsam veniam commodi. Facilis omnis autem voluptas iste et. Saepe inventore beatae iste optio eos et. Iure explicabo ab aut consequatur error. Eaque quo ab eum quod natus.','2022-10-18 07:35:46','2022-10-18 07:35:46',NULL,0,0,'Dolorem consectetur est facilis vel quia.$$$___$$$Dolor voluptatem omnis sint eligendi nobis.$$$___$$$Nemo non est sit explicabo nemo.',NULL,NULL),(434,10,43,'Provident asperiores et nobis esse optio cum. Sit ipsam voluptatem id. Saepe ut vel et nesciunt tenetur itaque.','2022-10-18 07:35:46','2022-10-18 07:35:46',NULL,0,0,NULL,'In accusantium nam ab doloremque expedita.$$$___$$$Ea at amet dolores velit quisquam ut.',NULL),(435,10,44,'Et eveniet hic ab fugit. Id delectus optio sunt officia quia inventore. Dicta occaecati eligendi et illo.','2022-10-18 07:35:47','2022-10-18 07:35:47',NULL,0,1,'Id esse facilis et repudiandae occaecati est.$$$___$$$Autem doloribus vitae reprehenderit.$$$___$$$Dicta cumque debitis voluptas est eveniet iure.','Ut ipsam quia esse a ut aliquid aliquam quidem.$$$___$$$Vel odio in animi vel.','2022-10-18 07:35:47'),(436,10,45,'Similique qui voluptas incidunt sunt maxime. Hic libero delectus consequatur ab voluptatem tenetur perferendis. Suscipit occaecati omnis odit deleniti minima.','2022-10-18 07:35:47','2022-10-18 07:35:47',1,1,0,NULL,'Consequatur nulla et laborum.$$$___$$$Optio velit qui dolorem nobis quam ad ullam aut.',NULL),(437,10,46,'Qui sit et omnis quisquam quia magni qui necessitatibus. Vero repellat quod a recusandae voluptas aut. Unde non quod doloribus qui maiores cumque dolores.','2022-10-18 07:35:47','2022-10-18 07:35:47',4,0,1,NULL,NULL,'2022-10-18 07:35:47'),(438,10,47,'Quia voluptatem ut enim sint quis ut quod nam. Ut sint neque inventore nesciunt voluptatem. Explicabo vitae in illo qui.','2022-10-18 07:35:47','2022-10-18 07:35:47',2,0,0,'Illo debitis laudantium omnis possimus harum.$$$___$$$Officiis esse sed et rerum officia.$$$___$$$Consequuntur eum rem qui qui praesentium.','Distinctio autem dolorem in et.$$$___$$$Est doloremque rerum consequatur.',NULL),(439,10,48,'Natus nostrum voluptate iusto atque atque ut. Alias voluptatibus cupiditate et dolores aut. Nam est ut rerum magni perspiciatis.','2022-10-18 07:35:47','2022-10-18 07:35:47',NULL,1,0,NULL,'Ea debitis facere necessitatibus iusto et quo.$$$___$$$Consectetur nam voluptas a et.',NULL),(440,10,1,'dqwdqw','2022-10-18 08:17:12','2022-10-18 08:58:16',2,NULL,1,'sda','dw','2022-10-18 08:17:20');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `config` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `can_pay_cash` tinyint(1) NOT NULL DEFAULT '0',
  `desc_default` longtext COLLATE utf8mb4_unicode_ci,
  `sell_list_period` tinyint NOT NULL DEFAULT '7',
  `seen_list_period` tinyint NOT NULL DEFAULT '7',
  `home_banner_limit` tinyint NOT NULL DEFAULT '2',
  `detail_banner_limit` tinyint NOT NULL DEFAULT '1',
  `list_banner_limit` tinyint NOT NULL DEFAULT '1',
  `critical_point` tinyint NOT NULL DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,0,NULL,7,7,2,1,1,5);
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faq` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `priority` int unsigned NOT NULL,
  `site` enum('event','shop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'shop',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_box`
--

DROP TABLE IF EXISTS `info_box`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_box` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `img_large` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_mid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collapse_from` enum('right','left','center') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'right',
  `site` enum('event','shop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'shop',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_box`
--

LOCK TABLES `info_box` WRITE;
/*!40000 ALTER TABLE `info_box` DISABLE KEYS */;
/*!40000 ALTER TABLE `info_box` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_users`
--

DROP TABLE IF EXISTS `mail_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_users_mail_unique` (`mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_users`
--

LOCK TABLES `mail_users` WRITE;
/*!40000 ALTER TABLE `mail_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mails` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_id` int unsigned NOT NULL,
  `status` enum('pending','fail','success') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mails_news_id_index` (`news_id`),
  CONSTRAINT `mails_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails`
--

LOCK TABLES `mails` WRITE;
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (115,'2016_06_01_000001_create_oauth_auth_codes_table',1),(116,'2016_06_01_000002_create_oauth_access_tokens_table',1),(117,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(118,'2016_06_01_000004_create_oauth_clients_table',1),(119,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(120,'2019_12_14_000001_create_personal_access_tokens_table',1),(121,'2022_09_08_064622_category',1),(122,'2022_09_08_064753_brand',1),(123,'2022_09_08_064832_product',1),(124,'2022_09_08_065237_category_features',1),(125,'2022_09_08_071213_create_users_table',1),(126,'2022_09_08_075041_create_off_table',1),(127,'2022_09_08_080333_create_purchase_table',1),(128,'2022_09_08_080601_create_purchase_items_table',1),(129,'2022_09_08_081719_create_product_galleries_table',1),(130,'2022_09_08_082540_create_activation_table',1),(131,'2022_09_08_083019_create_product_features_table',1),(132,'2022_09_11_083402_create_comment_table',1),(133,'2022_09_11_083450_create_bookmark_table',1),(134,'2022_09_11_083627_create_address_table',1),(135,'2022_09_11_084857_create_config_table',1),(136,'2022_09_11_084912_create_slider_table',1),(137,'2022_09_16_102513_create_table_info_box',1),(138,'2022_09_16_103227_create_table_faq',1),(139,'2022_09_16_103326_create_table_news',1),(140,'2022_09_16_103358_create_table_mails',1),(141,'2022_09_16_103436_create_table_blogs',1),(142,'2022_09_16_103526_create_table_product_rates',1),(143,'2022_09_16_103544_create_table_banner',1),(144,'2022_10_03_163144_change_digest_in_category_table',1),(145,'2022_10_04_082902_change_digest_in_product_table',1),(146,'2022_10_04_083041_change_digest_in_blogs_table',1),(147,'2022_10_04_083140_create_seller_table',1),(148,'2022_10_04_083243_change_seller_in_products_table',1),(149,'2022_10_04_113735_change_user_accesses',1),(150,'2022_10_04_114414_change_user_accesses_in_users_table',1),(151,'2022_10_05_100138_make_img_nullable_in_product_table',2),(152,'2022_10_05_184628_add_header_to_blogs_table',2),(153,'2022_10_05_185809_make_img_nullable_in_blogs_table',2),(154,'2022_10_06_105533_change_off_expiration_in_products_table',2),(155,'2022_10_06_184513_create_mail_users_table',2),(156,'2022_10_07_123427_add_seller_and_brand_to_offs_table',2),(157,'2022_10_08_154001_create_jobs_table',2),(158,'2022_10_08_170914_change_expiration_in_off_table',2),(159,'2022_10_10_181436_create_product_seen_table',2),(163,'2022_10_12_074652_add_rate_to_comment_table',3),(164,'2022_10_12_075118_remove_bookmarks_table',4),(165,'2022_10_12_134621_change_price_and_count_in_product_features_table',5),(166,'2022_10_13_060432_add_guarantee_to_products_table',5),(173,'2022_10_13_064453_change_comment_dependency_to_cascade_in_comments_table',6),(174,'2022_10_13_064523_change_gallery_dependency_to_cascade_in_product_galleries_table',6),(175,'2022_10_13_064543_change_feature_dependency_to_cascade_in_product_features_table',6),(176,'2022_10_13_065608_change_description_to_nullable_in_products_table',7),(177,'2022_10_14_120221_change_price_and_count_to_string_in_product_features_table',8),(178,'2022_10_14_161940_add_rate_count_to_products_table',8),(179,'2022_10_14_163131_add_status_to_comments_table',8),(180,'2022_10_14_163217_add_new_comment_count_to_products_table',8),(183,'2022_10_15_053659_add_slug_to_products_table',9),(184,'2022_10_15_053706_add_slug_to_blogs_table',9),(185,'2022_10_15_100154_add_sell_count_to_products_table',10),(188,'2022_10_15_102443_create_similars_table',11),(189,'2022_10_15_102822_add_timestamp_to_products_table',11),(190,'2022_10_15_121619_change_gaurantee_in_products_table',12),(191,'2022_10_17_105921_add_negative_and_positive_point_in_comments_table',13),(192,'2022_10_17_125542_add_confirmed_at_in_comments_table',14),(193,'2022_10_18_055625_make_rate_double_in_products_table',15),(194,'2022_10_18_122026_remove_title_in_comments_table',16),(195,'2022_10_18_124200_add_thumbnail_in_products_table',17),(196,'2022_10_18_124206_add_thumbnail_in_gallery_table',17),(203,'2022_10_19_143949_add_access_in_users_table',18),(204,'2022_10_19_152757_add_site_in_sliders_table',18),(205,'2022_10_19_152931_add_site_in_banners_table',18),(206,'2022_10_19_154643_create_states_table',18),(207,'2022_10_19_155301_create_event_facilities_table',18),(208,'2022_10_19_155357_create_event_tags_table',18),(209,'2022_10_19_155512_create_cities_table',18),(210,'2022_10_19_155702_create_launcher_table',18),(211,'2022_10_19_155856_create_events_table',18),(212,'2022_10_19_160157_add_launcher_access_to_users_table',18),(213,'2022_10_19_161844_create_launcher_certifications_table',18),(214,'2022_10_19_161909_create_launcher_bank_accounts_table',18),(215,'2022_10_19_161931_create_event_sessions_table',18),(216,'2022_10_19_165856_create_event_galleries_table',18),(217,'2022_10_19_173541_create_event_comments_table',18),(218,'2022_10_19_173558_create_launcher_comments_table',18),(219,'2022_10_19_184103_change_user_accesses2_in_users_table',18),(220,'2022_10_19_185307_add_site_in_faq_table',18),(221,'2022_10_23_175208_add_site_in_info_box_table',18),(222,'2022_10_23_182055_create_followers_table',18),(223,'2022_10_23_182303_add_follower_count_in_launchers_table',18),(230,'2022_10_24_102253_add_vc_expired_at_in_activations_table',19),(231,'2022_10_24_102317_set_name_nullable_in_users_table',19),(238,'2022_10_26_112848_add_additional_fields_in_address_table',20),(239,'2022_10_29_105247_add_additional_fields_in_users_table',20),(240,'2022_11_05_100603_add_default_in_address_table',20),(241,'2022_11_05_105522_add_delivery_at_in_purchase_table',20),(243,'2022_11_07_074454_make_user_id_unique_in_launchers_table',21),(247,'2022_11_07_090038_make_shaba_24_digit_in_launcher_bank_accounts_table',22),(248,'2022_11_09_080728_change_status_in_launcher_bank_accounts',22),(249,'2022_11_09_102854_add_default_in_launcher_bank_accounts_table',23),(250,'2022_11_10_112642_add_name_and_phone_to_launchers_table',24);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `msg` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offs`
--

DROP TABLE IF EXISTS `offs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `amount` int unsigned NOT NULL,
  `off_type` enum('value','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `off_expiration` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `brand_id` int unsigned DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `offs_user_id_index` (`user_id`),
  KEY `offs_category_id_index` (`category_id`),
  KEY `offs_brand_id_index` (`brand_id`),
  KEY `offs_seller_id_index` (`seller_id`),
  CONSTRAINT `offs_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `offs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `offs_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`),
  CONSTRAINT `offs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offs`
--

LOCK TABLES `offs` WRITE;
/*!40000 ALTER TABLE `offs` DISABLE KEYS */;
INSERT INTO `offs` VALUES (1,NULL,NULL,NULL,10,'percent','14010826','2022-11-05 06:24:43','2022-11-05 06:24:43',NULL,4);
/*!40000 ALTER TABLE `offs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_features`
--

DROP TABLE IF EXISTS `product_features`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_features` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `category_feature_id` int unsigned NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `available_count` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_features_product_id_category_feature_id_unique` (`product_id`,`category_feature_id`),
  KEY `product_features_product_id_index` (`product_id`),
  KEY `product_features_category_feature_id_index` (`category_feature_id`),
  CONSTRAINT `product_features_category_feature_id_foreign` FOREIGN KEY (`category_feature_id`) REFERENCES `category_features` (`id`),
  CONSTRAINT `product_features_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_features`
--

LOCK TABLES `product_features` WRITE;
/*!40000 ALTER TABLE `product_features` DISABLE KEYS */;
INSERT INTO `product_features` VALUES (3,10,3,'Small$$Med$$Large__null',NULL,'4$$3$$0'),(4,9,4,'قرمز$$آبی__rgb(0, 0, 255)$$rgb(255, 0, 0)',NULL,'20$$2');
/*!40000 ALTER TABLE `product_features` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_galleries`
--

DROP TABLE IF EXISTS `product_galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_galleries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `priority` int unsigned NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_galleries_product_id_index` (`product_id`),
  CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_galleries`
--

LOCK TABLES `product_galleries` WRITE;
/*!40000 ALTER TABLE `product_galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_rates`
--

DROP TABLE IF EXISTS `product_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_rates` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `rate` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_rates_product_id_user_id_unique` (`product_id`,`user_id`),
  KEY `product_rates_product_id_index` (`product_id`),
  KEY `product_rates_user_id_index` (`user_id`),
  CONSTRAINT `product_rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `product_rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_rates`
--

LOCK TABLES `product_rates` WRITE;
/*!40000 ALTER TABLE `product_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_seen`
--

DROP TABLE IF EXISTS `product_seen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_seen` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `seen` int unsigned NOT NULL,
  `updated` tinyint(1) NOT NULL DEFAULT '0',
  `date` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_seen_product_id_index` (`product_id`),
  CONSTRAINT `product_seen_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_seen`
--

LOCK TABLES `product_seen` WRITE;
/*!40000 ALTER TABLE `product_seen` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_seen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `digest` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rate` double unsigned DEFAULT NULL,
  `price` int unsigned NOT NULL,
  `seen` int unsigned NOT NULL DEFAULT '0',
  `priority` tinyint NOT NULL,
  `available_count` tinyint NOT NULL DEFAULT '0',
  `off` int unsigned DEFAULT NULL,
  `off_type` enum('value','percent') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `off_expiration` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `is_in_top_list` tinyint(1) NOT NULL DEFAULT '0',
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int unsigned NOT NULL,
  `brand_id` int unsigned NOT NULL,
  `similars` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int unsigned DEFAULT NULL,
  `guarantee` smallint DEFAULT NULL,
  `introduce` longtext COLLATE utf8mb4_unicode_ci,
  `rate_count` int unsigned NOT NULL DEFAULT '0',
  `comment_count` int unsigned NOT NULL DEFAULT '0',
  `new_comment_count` int unsigned NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sell_count` int unsigned NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_index` (`category_id`),
  KEY `products_brand_id_index` (`brand_id`),
  KEY `products_seller_id_index` (`seller_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'sadq',NULL,NULL,NULL,NULL,2.91,300000,10,3,3,20,'percent','14010728',1,0,'YfTuJ8C1rGvG5QH48rG94cGbIF3VnYWFy4BCKX7F.jpg',NULL,5,1,NULL,NULL,NULL,'<p style=\"text-align:justify;\"><br data-cke-filler=\"true\"></p>',11,19,10,'sadq',0,'2022-10-15 14:55:35',NULL,NULL),(3,'test2',NULL,NULL,NULL,NULL,2.86,30000,92,3,5,NULL,NULL,NULL,1,0,'VRdBgYt2Ey3H6dCtSCWfjEcl6vlsMbZCyTySQsbp.jpg',NULL,1,1,NULL,NULL,NULL,'<p style=\"text-align:justify;\"><br data-cke-filler=\"true\"></p>',14,26,11,'ssss_ttttt',0,'2022-10-15 14:55:35',NULL,NULL),(5,'محصول 1','lorem …','salam','test','lorem …',3.13,20000,0,1,0,NULL,NULL,NULL,0,1,NULL,'شسی',2,3,NULL,NULL,NULL,'lorem …',15,24,15,'محصول_ 1',0,'2022-10-15 14:55:35',NULL,NULL),(6,'محصول 2',NULL,NULL,'test','lorem …',2.77,300000,13,2,9,NULL,NULL,NULL,1,0,NULL,'سیش',1,3,NULL,3,NULL,NULL,13,20,6,NULL,0,'2022-10-15 14:55:35',NULL,NULL),(7,'محصول 3','lorem …','salam2',NULL,NULL,3.67,1000,13,4,0,NULL,NULL,NULL,1,0,NULL,'صض',2,4,NULL,NULL,NULL,'lorem …',9,15,12,'محصول_ 3',0,'2022-10-15 14:55:35',NULL,NULL),(8,'محصول 4',NULL,NULL,'test,test2','lorem …',2.63,5000000,18,3,25,NULL,NULL,NULL,1,0,NULL,NULL,1,4,NULL,3,NULL,NULL,8,19,7,NULL,0,'2022-10-15 14:55:35',NULL,NULL),(9,'محصول 5',NULL,NULL,NULL,NULL,2.5,50000,58,100,10,NULL,NULL,NULL,1,1,NULL,NULL,4,5,NULL,NULL,NULL,'lorem …',10,14,3,NULL,0,'2022-10-15 14:55:35',NULL,NULL),(10,'محصول 6',NULL,NULL,'test3','lorem …',3.5,600000,240,1,8,NULL,NULL,NULL,1,1,NULL,NULL,6,5,NULL,4,NULL,'<p style=\"text-align:justify;\"><br data-cke-filler=\"true\"></p>',6,13,6,'محصول_ 6',0,'2022-10-15 14:55:35',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `address_id` int unsigned NOT NULL,
  `off_id` int unsigned DEFAULT NULL,
  `tracking_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('finalized','sending','delivered') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` enum('cach','online') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delivery_at` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_tracking_code_unique` (`tracking_code`),
  KEY `purchase_user_id_index` (`user_id`),
  KEY `purchase_off_id_index` (`off_id`),
  CONSTRAINT `purchase_off_id_foreign` FOREIGN KEY (`off_id`) REFERENCES `offs` (`id`),
  CONSTRAINT `purchase_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_items`
--

DROP TABLE IF EXISTS `purchase_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_items` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `off_amount` int unsigned DEFAULT NULL,
  `product_id` int unsigned NOT NULL,
  `purchase_id` int unsigned NOT NULL,
  `count` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_items_product_id_purchase_id_unique` (`product_id`,`purchase_id`),
  KEY `purchase_items_purchase_id_index` (`purchase_id`),
  KEY `purchase_items_product_id_index` (`product_id`),
  CONSTRAINT `purchase_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_items`
--

LOCK TABLES `purchase_items` WRITE;
/*!40000 ALTER TABLE `purchase_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sellers` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sellers`
--

LOCK TABLES `sellers` WRITE;
/*!40000 ALTER TABLE `sellers` DISABLE KEYS */;
INSERT INTO `sellers` VALUES (1,'asdas',NULL,NULL),(2,'dddd',NULL,NULL),(3,'seller1',NULL,NULL),(4,'seller2',NULL,NULL),(5,'seller3',NULL,NULL);
/*!40000 ALTER TABLE `sellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `similars`
--

DROP TABLE IF EXISTS `similars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `similars` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `sim_1` int unsigned DEFAULT NULL,
  `sim_2` int unsigned DEFAULT NULL,
  `sim_3` int unsigned DEFAULT NULL,
  `sim_4` int unsigned DEFAULT NULL,
  `sim_5` int unsigned DEFAULT NULL,
  `sim_6` int unsigned DEFAULT NULL,
  `sim_7` int unsigned DEFAULT NULL,
  `sim_8` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `similars_product_id_index` (`product_id`),
  CONSTRAINT `similars_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `similars`
--

LOCK TABLES `similars` WRITE;
/*!40000 ALTER TABLE `similars` DISABLE KEYS */;
INSERT INTO `similars` VALUES (1,2,6,10,9,5,7,3,8,NULL),(2,3,8,6,10,5,9,7,2,NULL),(3,5,6,10,7,9,2,3,8,NULL),(4,6,8,2,9,5,7,10,3,NULL),(5,7,8,6,10,5,9,2,3,NULL),(6,8,7,6,3,10,2,9,5,NULL),(7,9,6,10,5,7,2,3,8,NULL),(8,10,2,6,9,5,7,3,8,NULL);
/*!40000 ALTER TABLE `similars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `img_large` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_mid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int unsigned NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT '1',
  `site` enum('event','shop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'shop',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` VALUES (1,'G4hNG4svp7NsSXPW1XXkFVEQfoyaPtlWi5Cn8Szf.jpg',NULL,NULL,NULL,NULL,1,1,'shop');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','init','blocked') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'init',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `access` enum('both','event','shop') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'both',
  `level` enum('admin','editor','report','user','news','finance','launcher') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `nid` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_day` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_back` enum('WALLET','ONLINE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WALLET',
  `shaba_no` varchar(19) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_phone_unique` (`phone`),
  UNIQUE KEY `users_nid_unique` (`nid`),
  UNIQUE KEY `users_mail_unique` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','active','09121111111','$2y$10$arwGUUuIJEB7UacA89DJv.lCkbc3fmQTeguaMrcfkCjTgcTkthuAW',NULL,'2022-10-04 09:05:09','2022-10-04 09:05:09','both','admin',NULL,NULL,NULL,'WALLET',NULL),(3,'user','user','active','09122222222','$2y$10$aH65RSvXvITTkGbojAUgaOeJRxxjIOqV6blR2zUNxkYUlMfNR9o46',NULL,'2022-10-04 09:05:09','2022-10-04 09:05:09','both','user',NULL,NULL,NULL,'WALLET',NULL),(38,'user 0','user 0','active','09123333300','$2y$10$KU5wP8M4oz6Irz3qooXt7uj1UcumrZ0VxeZ8xMjEbF3IA2OsmGHye',NULL,'2022-10-18 06:58:08','2022-10-18 06:58:08','both','user',NULL,NULL,NULL,'WALLET',NULL),(39,'user 1','user 1','active','09123333301','$2y$10$bqYfpQ2uBsGlhCCVHhRFeusaQV2awI3vw8ffzk2fH00g0f0JhWWm6',NULL,'2022-10-18 06:58:08','2022-10-18 06:58:08','both','user',NULL,NULL,NULL,'WALLET',NULL),(40,'user 2','user 2','active','09123333302','$2y$10$RMkLt7w2Wb5PzVF7oNSqBOUCBuQPNOFtO58LWjqScvdUrzbA4zhxm',NULL,'2022-10-18 06:58:09','2022-10-18 06:58:09','both','user',NULL,NULL,NULL,'WALLET',NULL),(41,'user 3','user 3','active','09123333303','$2y$10$qL1lnOOjrzdN7oLipP1HsOidMVEBDdsrTIj7PuEnYw7FO7Lu.3AFy',NULL,'2022-10-18 06:58:09','2022-10-18 06:58:09','both','user',NULL,NULL,NULL,'WALLET',NULL),(42,'user 4','user 4','active','09123333304','$2y$10$reRaUwr/lYg0Sa34XF2qROxjzYo51usDI.ADsOHdEeH9aOqRba2wq',NULL,'2022-10-18 06:58:09','2022-10-18 06:58:09','both','user',NULL,NULL,NULL,'WALLET',NULL),(43,'user 5','user 5','active','09123333305','$2y$10$H4qCSe4z9vgTBW4crL83.u1ksXkmZM00hTjfVfN7.YGTa6Wtq16fe',NULL,'2022-10-18 06:58:09','2022-10-18 06:58:09','both','user',NULL,NULL,NULL,'WALLET',NULL),(44,'user 6','user 6','active','09123333306','$2y$10$At1iho0uG42fJh6rpZRqsuVT.CvAp.fIH.KV1vyilyru0ak1LdV9.',NULL,'2022-10-18 06:58:10','2022-10-18 06:58:10','both','user',NULL,NULL,NULL,'WALLET',NULL),(45,'user 7','user 7','active','09123333307','$2y$10$c.gYAylOi1ARtId45eHj2OHguP67pZnKJnrPfeKU5iSDJch4O1Z6O',NULL,'2022-10-18 06:58:10','2022-10-18 06:58:10','both','user',NULL,NULL,NULL,'WALLET',NULL),(46,'user 8','user 8','active','09123333308','$2y$10$lNcMintMqsUQW15Ty1S0VeHPa.Tok2lXtqOBlXly4biaTrArCxL3.',NULL,'2022-10-18 06:58:10','2022-10-18 06:58:10','both','user',NULL,NULL,NULL,'WALLET',NULL),(47,'user 9','user 9','active','09123333309','$2y$10$Wtj45dR0ZZjClWEsZFZCc.IWvJbMh1u5nzhjFN1jYJ4.1UKxpU4ES',NULL,'2022-10-18 06:58:10','2022-10-18 06:58:10','both','user',NULL,NULL,NULL,'WALLET',NULL),(48,'user 10','user 10','active','09123333310','$2y$10$aKfkSRFct6ySm81vsSxSKeOE7KjPq54JnASdHqytOx.VgVwbW2HrG',NULL,'2022-10-18 06:58:10','2022-10-18 06:58:10','both','user',NULL,NULL,NULL,'WALLET',NULL),(49,'user 11','user 11','active','09123333311','$2y$10$GASCvndioGbhuYTbjfgZN.SVuYrVr8RdjY/Ma2diQhMxv1q3Gfs6i',NULL,'2022-10-18 06:58:10','2022-10-18 06:58:10','both','user',NULL,NULL,NULL,'WALLET',NULL),(50,'user 12','user 12','active','09123333312','$2y$10$IK4CYmdH1heAHK8EbrlvqezjFS3o5bNG.d7U3yzqCs5hM/TzqYnwC',NULL,'2022-10-18 06:58:11','2022-10-18 06:58:11','both','user',NULL,NULL,NULL,'WALLET',NULL),(51,'user 13','user 13','active','09123333313','$2y$10$I.k.9YdgILOUC4Uplb7RZ.Gv/ArqA2ewokVjLVWqTpPG7Wy730dxS',NULL,'2022-10-18 06:58:11','2022-10-18 06:58:11','both','user',NULL,NULL,NULL,'WALLET',NULL),(52,'user 14','user 14','active','09123333314','$2y$10$TAHfZDGz7gqH5t1EaQvfGOLOhGURSjmh.rvOGwjel4HEbTiqEYOWS',NULL,'2022-10-18 06:58:11','2022-10-18 06:58:11','both','user',NULL,NULL,NULL,'WALLET',NULL),(53,'user 15','user 15','active','09123333315','$2y$10$A59ecPAI7j1h3eyOJ817duHgpHC7iscvgew.FjZ83svYGyY2ZwgcW',NULL,'2022-10-18 06:58:11','2022-10-18 06:58:11','both','user',NULL,NULL,NULL,'WALLET',NULL),(54,'user 16','user 16','active','09123333316','$2y$10$bW.dvNtDa5iEigv4W4lIDe9jYV9wUL5vk8uHof6ky1TdIqX3GWnTO',NULL,'2022-10-18 06:58:11','2022-10-18 06:58:11','both','user',NULL,NULL,NULL,'WALLET',NULL),(55,'user 17','user 17','active','09123333317','$2y$10$sPNkai6SRI8HdnqDDHEywOxqAeMV7JUEEaPlZlw6ICWlJN8miISga',NULL,'2022-10-18 06:58:11','2022-10-18 06:58:11','both','user',NULL,NULL,NULL,'WALLET',NULL),(56,'user 18','user 18','active','09123333318','$2y$10$mKgPJEU/Yapr3Tep6zZ76OkvRtdcqq2kz8mXR0omcHJjP9f7B8ffG',NULL,'2022-10-18 06:58:12','2022-10-18 06:58:12','both','user',NULL,NULL,NULL,'WALLET',NULL),(57,'user 19','user 19','active','09123333319','$2y$10$YGhRVgzDR4A8PiLx/fx0A.BzELq3wFMhvFs3U0K2tHb1JATZnDw3C',NULL,'2022-10-18 06:58:12','2022-10-18 06:58:12','both','user',NULL,NULL,NULL,'WALLET',NULL),(58,'user 20','user 20','active','09123333320','$2y$10$Ay0wZ7FnAGTJhP95BsSRVu7XikX/g4HI/wbFQH9gtbWyNT/kx8OlK',NULL,'2022-10-18 06:58:12','2022-10-18 06:58:12','both','user',NULL,NULL,NULL,'WALLET',NULL),(59,'user 21','user 21','active','09123333321','$2y$10$sV1avwMiBAXvuuVSbBb24.dulJwFyhDyItFavPhr72A36.YoPKRn6',NULL,'2022-10-18 06:58:12','2022-10-18 06:58:12','both','user',NULL,NULL,NULL,'WALLET',NULL),(60,'user 22','user 22','active','09123333322','$2y$10$5EA2Zfspok6mWI8nnzDxYuvfYCtiEA/f8vQX7ucuFR2TMXAfD7aw.',NULL,'2022-10-18 06:58:12','2022-10-18 06:58:12','both','user',NULL,NULL,NULL,'WALLET',NULL),(61,'user 23','user 23','active','09123333323','$2y$10$ivink1FKSouT55QHgtgaN.HTQq6d8WtjqiKIvoECzGXiNUF.oFHpm',NULL,'2022-10-18 06:58:13','2022-10-18 06:58:13','both','user',NULL,NULL,NULL,'WALLET',NULL),(62,'user 24','user 24','active','09123333324','$2y$10$JDOKI4T7MMcQlQTFjPCw7.RFyiR80RYb9ZT2JiSNJQKSsVMfYKoH2',NULL,'2022-10-18 06:58:13','2022-10-18 06:58:13','both','user',NULL,NULL,NULL,'WALLET',NULL),(63,'user 25','user 25','active','09123333325','$2y$10$GXoPFZOKEj/Y..lUyJq3MumKaBHc8OAqcdK15AmkYX1Eotr0Z93jW',NULL,'2022-10-18 06:58:13','2022-10-18 06:58:13','both','user',NULL,NULL,NULL,'WALLET',NULL),(64,'user 26','user 26','active','09123333326','$2y$10$TDV7X6oqS830auMPqtCzJulvslbh0QIjqkaB7RwvjquxX8Q7mGf8q',NULL,'2022-10-18 06:58:13','2022-10-18 06:58:13','both','user',NULL,NULL,NULL,'WALLET',NULL),(65,'user 27','user 27','active','09123333327','$2y$10$Tonn1CiUTC2ee3IG8/GiUuL2hAV852jTA885Gwi6hhK197.hr6lse',NULL,'2022-10-18 06:58:13','2022-10-18 06:58:13','both','user',NULL,NULL,NULL,'WALLET',NULL),(66,'user 28','user 28','active','09123333328','$2y$10$ctl7gujEVkl5AaqNVRYZtO/0zqtozPlrijfiovDIhJ19no7Sqvo.u',NULL,'2022-10-18 06:58:14','2022-10-18 06:58:14','both','user',NULL,NULL,NULL,'WALLET',NULL),(67,'user 29','user 29','active','09123333329','$2y$10$O7yX7Ct5GwVefuPgJhGKyObVQZ1.SXhRsZKZ1YgG3JqUJ/hTbzVhS',NULL,'2022-10-18 06:58:14','2022-10-18 06:58:14','both','user',NULL,NULL,NULL,'WALLET',NULL),(68,'user 30','user 30','active','09123333330','$2y$10$ud3rfHvEdoD0iYeq4kasWuEFkwBBoNxw4vW.5JdZtqjtRJquq5q76',NULL,'2022-10-18 06:58:14','2022-10-18 06:58:14','both','user',NULL,NULL,NULL,'WALLET',NULL),(69,'user 31','user 31','active','09123333331','$2y$10$yExknwPSlPqf8OKoRO9q0.83hlv89397EJ4LIsNWblVTqc6Uats.e',NULL,'2022-10-18 06:58:14','2022-10-18 06:58:14','both','user',NULL,NULL,NULL,'WALLET',NULL),(70,'user 32','user 32','active','09123333332','$2y$10$aCB8jaB4OC3m3hw9unXuZOF1LlE3vaCQlTmRYMD23O2GR0Siqzx42',NULL,'2022-10-18 06:58:14','2022-10-18 06:58:14','both','user',NULL,NULL,NULL,'WALLET',NULL),(71,'user 33','user 33','active','09123333333','$2y$10$lj7hqJdEubJihKbt3Ul62O7jzs8GyeOoNIfLqxmNm04UBkLh67fji',NULL,'2022-10-18 06:58:15','2022-10-18 06:58:15','both','user',NULL,NULL,NULL,'WALLET',NULL),(72,'user 34','user 34','active','09123333334','$2y$10$21YKnKm/ytz5GKwLKcdeLuQpEYTrFAeO7D3TeZI5pAGlWwEsZ03na',NULL,'2022-10-18 06:58:15','2022-10-18 06:58:15','both','user',NULL,NULL,NULL,'WALLET',NULL),(73,'user 35','user 35','active','09123333335','$2y$10$lndLZ9hZGSOldEH8hX1iQOcCQ2m1tEQGS4B2yy5of4xzUf0jiq9ma',NULL,'2022-10-18 06:58:15','2022-10-18 06:58:15','both','user',NULL,NULL,NULL,'WALLET',NULL),(74,'user 36','user 36','active','09123333336','$2y$10$yDAC8A9glEmCzD5/iS4BqeREbdF8ex3zkgrMJbqwTYvS8ImCG75LG',NULL,'2022-10-18 06:58:15','2022-10-18 06:58:15','both','user',NULL,NULL,NULL,'WALLET',NULL),(75,'user 37','user 37','active','09123333337','$2y$10$OF6b9dWM1rhl9upIm6HB.eusjvUY.E93cyyhPepgii.mVtsrXNGIC',NULL,'2022-10-18 06:58:15','2022-10-18 06:58:15','both','user',NULL,NULL,NULL,'WALLET',NULL),(76,'user 38','user 38','active','09123333338','$2y$10$BsDLYiMjM7/4srLwXLtzK.Y0jt7gGw3wthq3l11g3RmVFC7LrY8UG',NULL,'2022-10-18 06:58:16','2022-10-18 06:58:16','both','user',NULL,NULL,NULL,'WALLET',NULL),(77,'user 39','user 39','active','09123333339','$2y$10$5f8umi96i.bK6LJ54yq0eOkjTIqn8ocCm11gd59G75Sj53kKNDNsK',NULL,'2022-10-18 06:58:16','2022-10-18 06:58:16','both','user',NULL,NULL,NULL,'WALLET',NULL),(78,'user 40','user 40','active','09123333340','$2y$10$jD/uDjl0i9wYlcfUhZf4t.u2vkYQ99nBE3S/.3yWL0B7Z.rtODGWi',NULL,'2022-10-18 06:58:16','2022-10-18 06:58:16','both','user',NULL,NULL,NULL,'WALLET',NULL),(79,'user 41','user 41','active','09123333341','$2y$10$WVzuvjN7RPTUYMPXfPdsIuinRTupN2xif73z3VdXIiOdBZ6tcWMtO',NULL,'2022-10-18 06:58:16','2022-10-18 06:58:16','both','user',NULL,NULL,NULL,'WALLET',NULL),(80,'user 42','user 42','active','09123333342','$2y$10$rBcxjFw9vQ.73GP0EEE2M.y1V/wOVL1FcQ8w0Vmoq0q3KQi/5NX6.',NULL,'2022-10-18 06:58:16','2022-10-18 06:58:16','both','user',NULL,NULL,NULL,'WALLET',NULL),(81,'user 43','user 43','active','09123333343','$2y$10$kbbUDrrr8mtJdqU4Y44RM.CReAbfjc2IB2DU/ej.2qfM28dy1gPXG',NULL,'2022-10-18 06:58:17','2022-10-18 06:58:17','both','user',NULL,NULL,NULL,'WALLET',NULL),(82,'user 44','user 44','active','09123333344','$2y$10$puggTMo0P29uGO.v2nn58uSg9wtcltkNj9sSmK6BmTDbpcbw6sE2O',NULL,'2022-10-18 06:58:17','2022-10-18 06:58:17','both','user',NULL,NULL,NULL,'WALLET',NULL),(83,'user 45','user 45','active','09123333345','$2y$10$1e8V8kk6gImo.jj/o2v9zufrzcbLBErkjLLtUGhpZE0F.ddiT8E5S',NULL,'2022-10-18 06:58:17','2022-10-18 06:58:17','both','user',NULL,NULL,NULL,'WALLET',NULL),(84,'user 46','user 46','active','09123333346','$2y$10$Rfd4rCTx14Ggy1aUwzMPM.konf4P0t6QjkyoaFFKMXoaJrfXulC.i',NULL,'2022-10-18 06:58:17','2022-10-18 06:58:17','both','user',NULL,NULL,NULL,'WALLET',NULL),(85,'user 47','user 47','active','09123333347','$2y$10$J6W2oKgq9wlkX23/5B9QqONi1hx7xs8EY3Zim1XFSE9svD4m9c9CO',NULL,'2022-10-18 06:58:17','2022-10-18 06:58:17','both','user',NULL,NULL,NULL,'WALLET',NULL),(86,'user 48','user 48','active','09123333348','$2y$10$xSsNYci3YHFE345BVA/gDun8HH5Utc5n.n/GyUmrubRboS7X.5T2i',NULL,'2022-10-18 06:58:17','2022-10-18 06:58:17','both','user',NULL,NULL,NULL,'WALLET',NULL),(87,'user 49','user 49','active','09123333349','$2y$10$PyG8NiqinoeYIP4OhTkwoO6HBhvB5iRvJ.67CT1iHKQbJmjNoN1K2',NULL,'2022-10-18 06:58:18','2022-10-18 06:58:18','both','user',NULL,NULL,NULL,'WALLET',NULL),(88,'user 50','user 50','active','09123333350','$2y$10$9.4u6udmi6e62Rt5bbI35uszPkILuYiRIeGtwVQy5tHIqKog0AzHq',NULL,'2022-10-18 06:58:18','2022-10-18 06:58:18','both','user',NULL,NULL,NULL,'WALLET',NULL),(89,'user 51','user 51','active','09123333351','$2y$10$Z6wZLEbzyzV8vkMvN/6Amu0CfwiZINmGpysbgceg3.zNhmB/am3Cm',NULL,'2022-10-18 06:58:18','2022-10-18 06:58:18','both','user',NULL,NULL,NULL,'WALLET',NULL),(90,'user 52','user 52','active','09123333352','$2y$10$/IaXdpced8xUoZ/bH33YH.39UMOVrcNT1dEtJyipbiRpPvGgzVJFO',NULL,'2022-10-18 06:58:18','2022-10-18 06:58:18','both','user',NULL,NULL,NULL,'WALLET',NULL),(91,'user 53','user 53','active','09123333353','$2y$10$zsLs5V4WfeU.FG6x3O8xLO8W1rAtLSz125gx.abOguRkfVAV4Bova',NULL,'2022-10-18 06:58:18','2022-10-18 06:58:18','both','user',NULL,NULL,NULL,'WALLET',NULL),(92,'user 54','user 54','active','09123333354','$2y$10$JYQ0B7.Rfj/DV5gZDIHiK.x..lkO.0BpTYZd46XMtN0KqPjKxeCmq',NULL,'2022-10-18 06:58:19','2022-10-18 06:58:19','both','user',NULL,NULL,NULL,'WALLET',NULL),(93,'user 55','user 55','active','09123333355','$2y$10$CJdAQdh7EYTSKyhP7SFywOc/CkUPw.dOxT5lUysIFQkzBKwa7S0bq',NULL,'2022-10-18 06:58:19','2022-10-18 06:58:19','both','user',NULL,NULL,NULL,'WALLET',NULL),(94,'user 56','user 56','active','09123333356','$2y$10$37Rgt.i3p/wD3riop8MJlOJCjSVW/C6v/wA3.3VDyJNEFOdZLFmiW',NULL,'2022-10-18 06:58:19','2022-10-18 06:58:19','both','user',NULL,NULL,NULL,'WALLET',NULL),(95,'user 57','user 57','active','09123333357','$2y$10$HHBgNV/QbzqueGwNw/HuM.fLODkcHGJu9qaWQhbgRMuhqBJS6BpSm',NULL,'2022-10-18 06:58:19','2022-10-18 06:58:19','both','user',NULL,NULL,NULL,'WALLET',NULL),(96,'user 58','user 58','active','09123333358','$2y$10$y8B44IgG6uxHywPg/WFV4O2O141EA/IatpBqAOvAmLtSXnXRFyUpO',NULL,'2022-10-18 06:58:20','2022-10-18 06:58:20','both','user',NULL,NULL,NULL,'WALLET',NULL),(97,'user 59','user 59','active','09123333359','$2y$10$yuOa1mA9ZdnimwUHJZ.CNOOq27qL1Kpezf7XLUcv0T8rrVM69Lwxe',NULL,'2022-10-18 06:58:20','2022-10-18 06:58:20','both','user',NULL,NULL,NULL,'WALLET',NULL),(98,'user 60','user 60','active','09123333360','$2y$10$ibEk7bEFBcBZFcsmeyNABuE1Uz99OV7V/fpFKZhZxAzbYlZV9pyoC',NULL,'2022-10-18 06:58:20','2022-10-18 06:58:20','both','user',NULL,NULL,NULL,'WALLET',NULL),(99,'user 61','user 61','active','09123333361','$2y$10$pn06vpn8pssfaVjLpkXNk.L6ETUur2t7g/BybW6LYhyYpAmfH6EE.',NULL,'2022-10-18 06:58:20','2022-10-18 06:58:20','both','user',NULL,NULL,NULL,'WALLET',NULL),(100,'user 62','user 62','active','09123333362','$2y$10$j1HRPPSMbfAXW4MIAerHp.C1FnCOAkJQwbObcS3U799FPEQX0RpzO',NULL,'2022-10-18 06:58:20','2022-10-18 06:58:20','both','user',NULL,NULL,NULL,'WALLET',NULL),(101,'user 63','user 63','active','09123333363','$2y$10$VKiI3rOChEVTpQ.AnXTAmuQ/M1UB/D/WN9pxXOmJ9rescxx2GDr1m',NULL,'2022-10-18 06:58:20','2022-10-18 06:58:20','both','user',NULL,NULL,NULL,'WALLET',NULL),(102,'user 64','user 64','active','09123333364','$2y$10$qsU1kUJqLAwEOKXycH0e5OflUZfAHaByDuM4GTMQbXDo6wUAf5e..',NULL,'2022-10-18 06:58:21','2022-10-18 06:58:21','both','user',NULL,NULL,NULL,'WALLET',NULL),(103,'user 65','user 65','active','09123333365','$2y$10$/EIQEUm7vpo7lNZLeD5Z8e/NA33zViP.nhRc3wpzTNBHA//R6CaXm',NULL,'2022-10-18 06:58:21','2022-10-18 06:58:21','both','user',NULL,NULL,NULL,'WALLET',NULL),(104,'user 66','user 66','active','09123333366','$2y$10$NHVi5tOgeWm0USb8VVw20uYFiynMihyaC9cDuaquvWXq3JVhhfTC6',NULL,'2022-10-18 06:58:21','2022-10-18 06:58:21','both','user',NULL,NULL,NULL,'WALLET',NULL),(105,'user 67','user 67','active','09123333367','$2y$10$wllvriyWIORl81ogJA568ew9G/vM/AWY4dHBOHF.8zyNxG50P7RWy',NULL,'2022-10-18 06:58:21','2022-10-18 06:58:21','both','user',NULL,NULL,NULL,'WALLET',NULL),(106,'user 68','user 68','active','09123333368','$2y$10$bVW4vzDVbvDRKLhwSMkclutODAkEmppYETcStWcuuIxn6irgDbjtq',NULL,'2022-10-18 06:58:21','2022-10-18 06:58:21','both','user',NULL,NULL,NULL,'WALLET',NULL),(107,'user 69','user 69','active','09123333369','$2y$10$jeWtZILHHNDJ8OYM7s.0IueZqo5N1rIGQ4U7MzQsjjasLhG1Uqxl.',NULL,'2022-10-18 06:58:22','2022-10-18 06:58:22','both','user',NULL,NULL,NULL,'WALLET',NULL),(108,'user 70','user 70','active','09123333370','$2y$10$KgLR7Xl73n.sK7dnmoZpmemG6mjJHxPK0NUe7OT4wMMdNKMXKiOm2',NULL,'2022-10-18 06:58:22','2022-10-18 06:58:22','both','user',NULL,NULL,NULL,'WALLET',NULL),(109,'user 71','user 71','active','09123333371','$2y$10$AKvYeftzRPOrAmsyJo8pwu27CrlJEdwTm50DWB7hkVbRy0560MBWm',NULL,'2022-10-18 06:58:22','2022-10-18 06:58:22','both','user',NULL,NULL,NULL,'WALLET',NULL),(110,'user 72','user 72','active','09123333372','$2y$10$DZ8SFdklWsjYD4x3Au3Us.ZbwnyKrni8JJPF3B/b2dzVEZNHhA8Ni',NULL,'2022-10-18 06:58:22','2022-10-18 06:58:22','both','user',NULL,NULL,NULL,'WALLET',NULL),(111,'user 73','user 73','active','09123333373','$2y$10$5pttJH5HtWrXnvtvRakYlecSxHx9Mr/GayXJqwffHCypS6I54w20m',NULL,'2022-10-18 06:58:22','2022-10-18 06:58:22','both','user',NULL,NULL,NULL,'WALLET',NULL),(112,'user 74','user 74','active','09123333374','$2y$10$H.hPiaalDHbss4cp7XefUeqk8ysMfVo8bme83ZthfW2P6ronm2ae2',NULL,'2022-10-18 06:58:23','2022-10-18 06:58:23','both','user',NULL,NULL,NULL,'WALLET',NULL),(113,'user 75','user 75','active','09123333375','$2y$10$SlIFNZkKVjLk8V2Dr4/fze9rj5GZZ5OYjy/OjVwjlREf4zkz6sjZS',NULL,'2022-10-18 06:58:23','2022-10-18 06:58:23','both','user',NULL,NULL,NULL,'WALLET',NULL),(114,'user 76','user 76','active','09123333376','$2y$10$KoSV4WPsFrCEISdzst1NHebRdtYlAKgZG70JHgwmaCw3NIeMac3bi',NULL,'2022-10-18 06:58:23','2022-10-18 06:58:23','both','user',NULL,NULL,NULL,'WALLET',NULL),(115,'user 77','user 77','active','09123333377','$2y$10$aktVnbOtcY8ZBbyd7YPm4O7fAiOIZYID2AP.UE7b0qQI0EYmlori2',NULL,'2022-10-18 06:58:23','2022-10-18 06:58:23','both','user',NULL,NULL,NULL,'WALLET',NULL),(116,'user 78','user 78','active','09123333378','$2y$10$K74upWc1mConGdfcpTbxWuKcyQRbA/4v3gfJmSN3r2PKKA6M71iMG',NULL,'2022-10-18 06:58:23','2022-10-18 06:58:23','both','user',NULL,NULL,NULL,'WALLET',NULL),(117,'user 79','user 79','active','09123333379','$2y$10$/P194sd6MymSR0xv1fBTgeRjnZxL8F6GGSG/G4ym7g2VTs27ruzky',NULL,'2022-10-18 06:58:24','2022-10-18 06:58:24','both','user',NULL,NULL,NULL,'WALLET',NULL),(118,'user 80','user 80','active','09123333380','$2y$10$R1ZWeZ3DsXmVspJY/8nT3.ERR5.nuJwE/u/ufAJO0Ccd38Pah1Q/q',NULL,'2022-10-18 06:58:24','2022-10-18 06:58:24','both','user',NULL,NULL,NULL,'WALLET',NULL),(119,'user 81','user 81','active','09123333381','$2y$10$6ArJs6GQzIlZhsSLg76KTeLJG6u.DpL19YxAKq8VER.xryOnx//9q',NULL,'2022-10-18 06:58:24','2022-10-18 06:58:24','both','user',NULL,NULL,NULL,'WALLET',NULL),(120,'user 82','user 82','active','09123333382','$2y$10$0ebRp1fKXxOA2LWSCK7K8.XuPquhqHIrnkyEwID81D77.pdT61LJK',NULL,'2022-10-18 06:58:24','2022-10-18 06:58:24','both','user',NULL,NULL,NULL,'WALLET',NULL),(121,'user 83','user 83','active','09123333383','$2y$10$jDTreRPtZ5lMAA5jyERgoOAdHvHRz3ur5CcmC66fFXWKTT/WqJVP6',NULL,'2022-10-18 06:58:24','2022-10-18 06:58:24','both','user',NULL,NULL,NULL,'WALLET',NULL),(122,'user 84','user 84','active','09123333384','$2y$10$cCZkXiE/cPNm.7nJ/Q1Svev77yrGgQmko8z.Wx/GxxmniPN/aYAeW',NULL,'2022-10-18 06:58:25','2022-10-18 06:58:25','both','user',NULL,NULL,NULL,'WALLET',NULL),(123,'user 85','user 85','active','09123333385','$2y$10$yaNtqDFMxuMn7aLPc3Ca4.khXjx39xiNYXr3b1Nm5SFvcRWIYKmfS',NULL,'2022-10-18 06:58:25','2022-10-18 06:58:25','both','user',NULL,NULL,NULL,'WALLET',NULL),(124,'user 86','user 86','active','09123333386','$2y$10$NdTLF55OxQXW.bxa2VbxKOhjvfj5trCTXI/6T4KNtbiWQwgFeFF3m',NULL,'2022-10-18 06:58:25','2022-10-18 06:58:25','both','user',NULL,NULL,NULL,'WALLET',NULL),(125,'user 87','user 87','active','09123333387','$2y$10$ZMPZNKNKS7aYzNbPL2BJY.x7nspjneMVFJr5MwQ8XRhn9jswxswpW',NULL,'2022-10-18 06:58:25','2022-10-18 06:58:25','both','user',NULL,NULL,NULL,'WALLET',NULL),(126,'user 88','user 88','active','09123333388','$2y$10$FpyHXJLaxHyKz9JNKkS8O.gYiixStUnEb.wDyHlaDu8e9Aqr2v88a',NULL,'2022-10-18 06:58:25','2022-10-18 06:58:25','both','user',NULL,NULL,NULL,'WALLET',NULL),(127,'user 89','user 89','active','09123333389','$2y$10$SRrgBNipQ/FYw5Vb5mNrV.LeXTwhYCBDVGj.mLNaGxM57eI6PUT0e',NULL,'2022-10-18 06:58:25','2022-10-18 06:58:25','both','user',NULL,NULL,NULL,'WALLET',NULL),(128,'user 90','user 90','active','09123333390','$2y$10$sN6bfli8eAoUTgP/GUNGZOupCvTL3/ZXTVlWA91K77b539Tf.cq5S',NULL,'2022-10-18 06:58:26','2022-10-18 06:58:26','both','user',NULL,NULL,NULL,'WALLET',NULL),(129,'user 91','user 91','active','09123333391','$2y$10$v4iz.l1maYKB18LrlKzlXOXESbhHx/WGz9p3ybGy4GfMn4nLP1x9q',NULL,'2022-10-18 06:58:26','2022-10-18 06:58:26','both','user',NULL,NULL,NULL,'WALLET',NULL),(130,'user 92','user 92','active','09123333392','$2y$10$BOUz75twptBK38dAaAGsYO7nEeONjTEev8pG/x8XAc.4TsPsFU76a',NULL,'2022-10-18 06:58:26','2022-10-18 06:58:26','both','user',NULL,NULL,NULL,'WALLET',NULL),(131,'user 93','user 93','active','09123333393','$2y$10$tccM5QtJ/MGC/yKMquKCpOamlpjdmVUTz64GIXsbLFpMZt9FVY4Wm',NULL,'2022-10-18 06:58:26','2022-10-18 06:58:26','both','user',NULL,NULL,NULL,'WALLET',NULL),(132,'user 94','user 94','active','09123333394','$2y$10$o2HKodmEF4E9lvcGv1NSPOgFo5S5EiYb5YgzgmnEr0qpSRuFn0tFK',NULL,'2022-10-18 06:58:26','2022-10-18 06:58:26','both','user',NULL,NULL,NULL,'WALLET',NULL),(133,'user 95','user 95','active','09123333395','$2y$10$k9zmuL.LWJU4w0v7XO/n2O9B5r/2Zc4x3Z0DBGDdj1YDpjLkjvjU.',NULL,'2022-10-18 06:58:27','2022-10-18 06:58:27','both','user',NULL,NULL,NULL,'WALLET',NULL),(134,'user 96','user 96','active','09123333396','$2y$10$vaOKMkX3WDZbw6wL.CDXsOGZty95/H8asu.H4f9.zj8V74c6/5y7C',NULL,'2022-10-18 06:58:27','2022-10-18 06:58:27','both','user',NULL,NULL,NULL,'WALLET',NULL),(135,'user 97','user 97','active','09123333397','$2y$10$Q1HNBu/v1z76WRbSG6GiCepE8LEA0WcSJU3n/mw.xao5KIzjSMkLS',NULL,'2022-10-18 06:58:27','2022-10-18 06:58:27','both','user',NULL,NULL,NULL,'WALLET',NULL),(136,'user 98','user 98','active','09123333398','$2y$10$giGR3zudkRSIlP2FgnwiHe/WbquXp1Mjcj8KeW1lrDsJ0ago1YIkO',NULL,'2022-10-18 06:58:27','2022-10-18 06:58:27','both','user',NULL,NULL,NULL,'WALLET',NULL),(137,'user 99','user 99','active','09123333399','$2y$10$T.K9r0FOZRR7PTX/gOY/.OA5iaEA0ydP9GPliIGP/CGIQC5JCkIvC',NULL,'2022-10-18 06:58:27','2022-10-18 06:58:27','both','user',NULL,NULL,NULL,'WALLET',NULL),(138,'launcher','launcher','active','09131111111','$2y$10$AEG3BzWn7SdEvnDDbdZB5.1P3OjFEF3hftRpGmZhvwmOSq81XMfde',NULL,'2022-12-12 03:37:45','2022-12-12 03:37:45','both','launcher',NULL,NULL,NULL,'WALLET',NULL),(139,'launcher','launcher','active','09141111111','$2y$10$nfwaw27GAopcNXR0siq.gelusjNbTUzUAZjIKhGsBlvnnNHjZWEha',NULL,'2022-12-12 03:37:45','2022-12-12 03:37:45','both','launcher',NULL,NULL,NULL,'WALLET',NULL),(140,'launcher','launcher','active','09151111111','$2y$10$ubC.g.xmDYK4T8K1P00XdOal4ksZmQRt/ZxOeppe2WZTZalR5UJJu',NULL,'2022-12-12 03:37:45','2022-12-12 03:37:45','both','launcher',NULL,NULL,NULL,'WALLET',NULL),(141,'launcher','launcher','active','09161111111','$2y$10$gUWK8mNM0R0Rgx5ObDEZ5OrcdcC4y8pJsILvtC7A1eOTKbldmexWa',NULL,'2022-12-12 03:37:46','2022-12-12 03:37:46','both','launcher',NULL,NULL,NULL,'WALLET',NULL);
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

-- Dump completed on 2023-01-28 12:38:58
