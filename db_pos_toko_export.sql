-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: db_pos_toko
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Current Database: `db_pos_toko`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `db_pos_toko` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_pos_toko`;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Makanan','makanan','2026-09-20 20:51:28','2026-09-20 20:51:28'),(2,'Minuman','minuman','2026-09-20 20:51:28','2026-09-20 20:51:28'),(3,'Kebutuhan Rumah Tangga','kebutuhan-rumah-tangga','2026-09-20 20:51:28','2026-09-20 20:51:28'),(4,'Obat-obatan','obat-obatan','2026-09-20 20:51:28','2026-09-20 20:51:28');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000001_create_cache_table',1),(2,'0001_01_01_000002_create_jobs_table',1),(3,'2026_09_21_011723_create_users_table',1),(4,'2026_09_21_011922_add_phone_to_users_table',1),(5,'2026_09_21_011952_create_posts_table',1),(6,'2026_09_21_034653_create_categories_table',1),(7,'2026_09_21_034718_create_products_table',1),(8,'2026_09_21_034959_create_suppliers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_sku_unique` (`sku`),
  KEY `products_category_id_foreign` (`category_id`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'corrupti vel','PRD-98901',10296,32,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(2,3,'optio temporibus','PRD-96917',47071,86,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(3,2,'eligendi in','PRD-43443',43560,66,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(4,1,'rem debitis','PRD-14444',2993,83,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(5,3,'quod ex','PRD-34691',8664,84,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(6,4,'sit velit','PRD-57096',47738,56,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(7,4,'dignissimos excepturi','PRD-33512',46104,77,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(8,1,'unde est','PRD-75142',20574,9,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(9,2,'culpa quae','PRD-39044',28998,19,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(10,1,'esse rerum','PRD-47375',48928,56,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(11,2,'praesentium nam','PRD-79566',3891,94,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(12,3,'ut dolor','PRD-96944',45908,60,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(13,3,'fugiat nihil','PRD-21903',16292,19,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(14,4,'repellendus quas','PRD-38787',13621,16,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(15,2,'corrupti quia','PRD-53684',3333,97,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(16,1,'nesciunt qui','PRD-33444',16408,13,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(17,3,'et et','PRD-58456',13477,53,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(18,3,'iste quia','PRD-76745',27920,7,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(19,1,'ratione ab','PRD-55515',5923,74,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(20,3,'autem corporis','PRD-53233',11947,29,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(21,1,'omnis rerum','PRD-44675',37968,77,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(22,1,'natus adipisci','PRD-93205',4153,87,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(23,4,'officia ut','PRD-85947',23227,85,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(24,3,'necessitatibus enim','PRD-24872',24488,5,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(25,3,'enim sint','PRD-48457',41676,9,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(26,2,'veniam aliquam','PRD-19571',39401,50,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(27,2,'est eum','PRD-57784',36473,77,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(28,3,'veritatis nobis','PRD-86927',3088,12,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(29,1,'et debitis','PRD-69752',47089,60,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(30,4,'rem necessitatibus','PRD-33161',26341,86,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(31,1,'voluptatem exercitationem','PRD-55349',25538,74,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(32,3,'rerum eligendi','PRD-25421',49377,12,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(33,4,'neque similique','PRD-67538',23220,73,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(34,1,'et deleniti','PRD-75565',27816,91,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(35,1,'ea eveniet','PRD-72979',46747,12,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(36,3,'architecto ipsam','PRD-82306',29028,78,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(37,1,'sed aut','PRD-13507',35522,82,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(38,1,'voluptate et','PRD-29466',37399,72,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(39,2,'molestiae amet','PRD-78492',31341,34,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(40,4,'quis ut','PRD-48263',17972,64,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(41,1,'placeat id','PRD-40720',8067,83,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(42,2,'accusantium sit','PRD-60919',22344,22,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(43,2,'possimus dolorem','PRD-65552',37232,61,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(44,3,'aut provident','PRD-69241',4261,35,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(45,2,'dolore atque','PRD-91164',19650,91,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(46,3,'qui aut','PRD-18093',15581,28,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(47,4,'voluptas sed','PRD-93495',13734,51,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(48,2,'ullam ratione','PRD-57513',3382,60,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(49,4,'enim eligendi','PRD-31673',47968,86,'2026-09-20 20:51:28','2026-09-20 20:51:28'),(50,1,'nam adipisci','PRD-31684',24556,30,'2026-09-20 20:51:28','2026-09-20 20:51:28');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (1,'PT. Indofood Sukses Makmur Tbk','021-57945959','Sudirman Plaza, Indofood Tower, Jl. Jend. Sudirman Kav. 76-78, Jakarta 12910','2026-09-20 20:51:28','2026-09-20 20:51:28'),(2,'PT. Unilever Indonesia Tbk','021-78322577','Grha Unilever, BSD Green Office Park, Jl. BSD Boulevard Barat, Tangerang 15345','2026-09-20 20:51:28','2026-09-20 20:51:28'),(3,'PT. Wings Surya','031-8431663','Jl. Kalisosok Kidul No. 2, Surabaya, Jawa Timur 60175','2026-09-20 20:51:28','2026-09-20 20:51:28');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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

-- Dump completed on 2026-09-21 13:54:20
