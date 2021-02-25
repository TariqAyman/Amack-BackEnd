-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: amack
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `password`, `photo`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'admin','admin@admin.com','2020-11-07 23:44:24',NULL,'$2y$10$QWhRIQkjPzCzE65hcnsEzO.ih3KzEIN1rz38WIrOuGh3M4PoNyUrC',NULL,'u','o0DfIlEc9D','2020-11-07 23:44:24','2020-11-07 23:44:24');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id`, `name`, `description`, `country_id`, `is_dive`, `temp`, `wind`, `latitude`, `longitude`, `emergency_phone`, `emergency_latitude`, `emergency_longitude`, `rate`, `enabled`, `created_at`, `updated_at`, `peak_season_id`) VALUES (1,'Cairo',NULL,64,1,'20','150',30.04442000,31.23571200,NULL,NULL,NULL,3,1,'2020-11-07 23:44:24','2020-11-07 23:44:24',NULL),(2,'Dahab',NULL,64,1,'20','150',28.48893000,34.50156000,NULL,NULL,NULL,3,1,'2020-11-07 23:44:24','2020-11-07 23:44:24',NULL),(3,'Nuweiba',NULL,64,1,'20','150',28.98080100,34.65972100,NULL,NULL,NULL,3,1,'2020-11-07 23:44:24','2020-11-07 23:44:24',NULL),(4,'Taba',NULL,64,0,NULL,NULL,29.49424510,34.89223240,NULL,NULL,NULL,0,1,'2020-11-14 05:05:25','2020-11-14 05:05:25',NULL),(7,'Sharm El-Sheikh',NULL,64,1,NULL,NULL,27.96535700,34.36170000,NULL,NULL,NULL,0,1,'2020-11-14 05:08:49','2020-11-14 05:08:49',NULL),(8,'Alexandria',NULL,64,1,NULL,NULL,31.20012500,29.91869900,NULL,NULL,NULL,0,1,'2020-11-14 05:09:42','2020-11-14 05:09:42',NULL);
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `city_images`
--

LOCK TABLES `city_images` WRITE;
/*!40000 ALTER TABLE `city_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `city_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `city_top_sites`
--

LOCK TABLES `city_top_sites` WRITE;
/*!40000 ALTER TABLE `city_top_sites` DISABLE KEYS */;
/*!40000 ALTER TABLE `city_top_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `name`, `code`, `phone_code`, `latitude`, `longitude`, `enabled_for_dive`, `enabled_for_signup`, `created_at`, `updated_at`) VALUES (64,'Egypt','EG','20',NULL,NULL,1,1,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(65,'test',NULL,NULL,NULL,NULL,1,1,'2020-11-13 19:41:49','2020-11-13 19:42:08');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `course_packages`
--

LOCK TABLES `course_packages` WRITE;
/*!40000 ALTER TABLE `course_packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `course_packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `day_times`
--

LOCK TABLES `day_times` WRITE;
/*!40000 ALTER TABLE `day_times` DISABLE KEYS */;
INSERT INTO `day_times` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES (1,'Early Morning','dive-times/1/IPMBkGnpOAXdePbc7ZbswO8Hd8f5yLKOXKkQyis0.png','2020-11-07 23:44:24','2020-11-09 19:16:16'),(2,'Day',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(3,'NIGHT',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24');
/*!40000 ALTER TABLE `day_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_activities`
--

LOCK TABLES `dive_activities` WRITE;
/*!40000 ALTER TABLE `dive_activities` DISABLE KEYS */;
INSERT INTO `dive_activities` (`id`, `name`, `icon`, `description`, `created_at`, `updated_at`) VALUES (1,'SCUBA Diving','dive-activities/1/OuvDT3bc8lEDvWEQSeitgBm4N6OnEvlLFs0NZtkD.svg','adasdeqad','2020-11-07 23:44:24','2020-11-25 19:05:37'),(2,'Free-Diving',NULL,'adasdeqad','2020-11-07 23:44:24','2020-11-07 23:44:24');
/*!40000 ALTER TABLE `dive_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_entries`
--

LOCK TABLES `dive_entries` WRITE;
/*!40000 ALTER TABLE `dive_entries` DISABLE KEYS */;
INSERT INTO `dive_entries` (`id`, `name`, `photo`, `created_at`, `updated_at`) VALUES (1,'Shore',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(2,'Boat',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24');
/*!40000 ALTER TABLE `dive_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_activities`
--

LOCK TABLES `dive_site_activities` WRITE;
/*!40000 ALTER TABLE `dive_site_activities` DISABLE KEYS */;
INSERT INTO `dive_site_activities` (`id`, `dive_site_id`, `activity_id`, `created_at`, `updated_at`) VALUES (1,1,1,'2020-11-13 18:00:37','2020-11-13 18:00:37'),(2,23,1,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(3,23,2,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(4,10,1,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(5,10,2,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(6,1,2,'2020-11-14 14:07:05','2020-11-14 14:07:05'),(7,24,1,'2020-11-22 16:33:33','2020-11-22 16:33:33'),(10,27,1,'2020-11-22 16:37:55','2020-11-22 16:37:55'),(11,28,1,'2020-11-22 16:44:34','2020-11-22 16:44:34');
/*!40000 ALTER TABLE `dive_site_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_day_times`
--

LOCK TABLES `dive_site_day_times` WRITE;
/*!40000 ALTER TABLE `dive_site_day_times` DISABLE KEYS */;
INSERT INTO `dive_site_day_times` (`id`, `dive_site_id`, `day_time_id`, `created_at`, `updated_at`) VALUES (1,1,1,'2020-11-13 18:00:37','2020-11-13 18:00:37'),(2,1,2,'2020-11-13 18:00:37','2020-11-13 18:00:37'),(3,1,3,'2020-11-13 18:00:37','2020-11-13 18:00:37'),(4,23,2,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(5,10,1,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(6,10,2,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(7,10,3,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(8,24,2,'2020-11-22 16:33:33','2020-11-22 16:33:33'),(11,27,2,'2020-11-22 16:37:55','2020-11-22 16:37:55'),(12,28,1,'2020-11-22 16:44:34','2020-11-22 16:44:34');
/*!40000 ALTER TABLE `dive_site_day_times` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_entries`
--

LOCK TABLES `dive_site_entries` WRITE;
/*!40000 ALTER TABLE `dive_site_entries` DISABLE KEYS */;
/*!40000 ALTER TABLE `dive_site_entries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_equipments`
--

LOCK TABLES `dive_site_equipments` WRITE;
/*!40000 ALTER TABLE `dive_site_equipments` DISABLE KEYS */;
INSERT INTO `dive_site_equipments` (`id`, `dive_site_id`, `equipment_id`, `created_at`, `updated_at`) VALUES (1,10,2,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(2,1,5,'2020-11-14 14:59:23','2020-11-14 14:59:23'),(3,24,2,'2020-11-22 16:33:33','2020-11-22 16:33:33'),(4,27,3,'2020-11-22 16:37:55','2020-11-22 16:37:55'),(5,28,4,'2020-11-22 16:44:34','2020-11-22 16:44:34');
/*!40000 ALTER TABLE `dive_site_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_images`
--

LOCK TABLES `dive_site_images` WRITE;
/*!40000 ALTER TABLE `dive_site_images` DISABLE KEYS */;
INSERT INTO `dive_site_images` (`id`, `path`, `dive_site_id`, `created_at`, `updated_at`) VALUES (1,'dive-sites/1/RVyFrMpVqbVzXDsFVatUMV1PNGmuAXd4f13d00sk.png',1,'2020-11-13 17:37:13','2020-11-13 17:37:13'),(2,'dive-sites/1/bJ64yWTB6XkIMDeQJopGnRHvxZfNUS7kokavc8pw.gif',1,'2020-11-13 17:37:13','2020-11-13 17:37:13'),(3,'dive-sites/1/KMeKiuGSyDD6sP1jRgsa64n67ssvdJqS9VflGdbo.jpeg',1,'2020-11-13 17:37:13','2020-11-13 17:37:13'),(4,'dive-sites/1/UtYHTg4LkIoblU6yppP3YX9WGuvnFgwomxHlKwiU.jpeg',1,'2020-11-13 17:37:13','2020-11-13 17:37:13'),(6,'dive-sites/2/4NJ7DYqTyfpfsHyqEut0mlGojIzauEyWiddmBuHx.jpeg',2,'2020-11-13 17:38:28','2020-11-13 17:38:28'),(7,'dive-sites/2/MWuLa2QCwdAJ6fJEGbomLk2oUyn3DwONu9WLlvXF.jpeg',2,'2020-11-13 17:38:28','2020-11-13 17:38:28'),(8,'dive-sites/2/cE73oJseNatzJA3q1RVaHqniyKTDTVcSG8XaE60h.jpeg',2,'2020-11-13 17:38:28','2020-11-13 17:38:28'),(9,'dive-sites/2/d92KdJmll4DlAjwPwRvQu5p9d4cUpfd8OB1jux0v.jpeg',2,'2020-11-13 17:38:28','2020-11-13 17:38:28'),(10,'dive-sites/3/4F5PRBoWbf8NTuf7PRKiOYRPBNiqFmxaO0MC9P4s.jpeg',3,'2020-11-13 17:39:00','2020-11-13 17:39:00'),(11,'dive-sites/3/Qnwm1QAmxG6TNY2gkmZlYNStw7VykZP3dFLpFhCb.jpeg',3,'2020-11-13 17:39:00','2020-11-13 17:39:00'),(12,'dive-sites/3/pdoj0Qd9DGdgARe72rpHOLhpbF0x3FXVZqjkAIwT.jpeg',3,'2020-11-13 17:39:00','2020-11-13 17:39:00'),(13,'dive-sites/3/u2fHLS5rJEjBiwv0R23YULYguSxAzCWIdHLXWhUr.jpeg',3,'2020-11-13 17:39:00','2020-11-13 17:39:00'),(14,'dive-sites/4/LYCorKkIgfU38pacc87HYPpeFForF29BirlkBKbS.jpeg',4,'2020-11-13 17:39:29','2020-11-13 17:39:29'),(15,'dive-sites/4/xXzpqS7ZxkArSeQ2kqQ6Bt1Pj7N7GCpQRRVTFTas.jpeg',4,'2020-11-13 17:39:29','2020-11-13 17:39:29'),(16,'dive-sites/4/t2yPpK3fPpSWES4xO6Fw1pspAm5cRuaNLxFHiu0F.jpeg',4,'2020-11-13 17:39:29','2020-11-13 17:39:29'),(17,'dive-sites/4/TyYXOThsNbKiQkGqkd75ckz3qrEtF09CMp0PgpYx.jpeg',4,'2020-11-13 17:39:29','2020-11-13 17:39:29'),(18,'dive-sites/5/9pTqxks78kUaM7nb317eZDwkDbmlQaHVa1KTpafR.jpeg',5,'2020-11-13 17:40:00','2020-11-13 17:40:00'),(19,'dive-sites/5/d7Us0Mf0J9HCx4EkSrBsujg6dBuYSVF1980Nx6p9.jpeg',5,'2020-11-13 17:40:00','2020-11-13 17:40:00'),(20,'dive-sites/5/X7lzhvC2xjXeUAa606yWOr31YE2riHoJcebKnoeO.jpeg',5,'2020-11-13 17:40:00','2020-11-13 17:40:00'),(21,'dive-sites/5/WkuhvcM9NSSi48G7yiBgT75uBjjXQyoVqoB8pRA0.jpeg',5,'2020-11-13 17:40:00','2020-11-13 17:40:00'),(22,'dive-sites/6/WVOAw88GBdSnOtdaohEht2gYsUrhdlbkxSFF9n3m.jpeg',6,'2020-11-13 17:40:36','2020-11-13 17:40:36'),(23,'dive-sites/6/bOuWUbJKs4udCMgcqet58rWr8MZyfCYnQVBeAnhc.jpeg',6,'2020-11-13 17:40:36','2020-11-13 17:40:36'),(24,'dive-sites/6/jzHN2PeWjU8HQDsnmyJnKz4auMuQUy4y96b7zrYM.jpeg',6,'2020-11-13 17:40:36','2020-11-13 17:40:36'),(25,'dive-sites/6/4JTjOB19QUg4ZrpnBfyqGL7lGJRBSvtCL0XYIdRK.jpeg',6,'2020-11-13 17:40:36','2020-11-13 17:40:36'),(26,'dive-sites/7/UBTjXCuIH5TaNuiIKnl921SLf8vzHqm1hJBEJiza.jpeg',7,'2020-11-13 17:41:30','2020-11-13 17:41:30'),(27,'dive-sites/7/Elw8ofWi4IsMw9w1KAWpCDdnhcOsqjbG43jNbQM9.jpeg',7,'2020-11-13 17:41:30','2020-11-13 17:41:30'),(28,'dive-sites/7/B9awraNnblJrOxzDWEtQlO7ngkcNGMcIWWHPYImf.jpeg',7,'2020-11-13 17:41:30','2020-11-13 17:41:30'),(29,'dive-sites/7/e9w37NHPa4rzlidjbL6rje1TlCTJdoagEeejMZ21.jpeg',7,'2020-11-13 17:41:30','2020-11-13 17:41:30'),(30,'dive-sites/8/HSRa1pvRFF3WTdu3zw0MDiSKN1rEuvejQhaIy2NQ.jpeg',8,'2020-11-13 17:42:10','2020-11-13 17:42:10'),(31,'dive-sites/8/ppQZILX8TApQPE3OL5pHvxTolGKnIufNoixLk9zr.jpeg',8,'2020-11-13 17:42:10','2020-11-13 17:42:10'),(32,'dive-sites/8/oLJOpSLNCv7j7QN0rsNnRrVqI0WFZFEvrdearNBg.jpeg',8,'2020-11-13 17:42:10','2020-11-13 17:42:10'),(33,'dive-sites/8/VdMcHzq4W0HUAMT3HKQD5MqkLemAb78SNlY2YeD6.jpeg',8,'2020-11-13 17:42:10','2020-11-13 17:42:10'),(34,'dive-sites/9/sReQQeTZedaBtQsXuKe6iGThlZ8vKQrGDuq0Ggz4.jpeg',9,'2020-11-13 17:42:56','2020-11-13 17:42:56'),(35,'dive-sites/9/Uk0F42HpCfONh42bQnyKbVgNIDBxRKIpQUHHeVmY.jpeg',9,'2020-11-13 17:42:56','2020-11-13 17:42:56'),(36,'dive-sites/9/NagUbISFNSWwGVJV0uuSC4ocsiNzaR8MrXnSdcXN.jpeg',9,'2020-11-13 17:42:56','2020-11-13 17:42:56'),(37,'dive-sites/9/TNRgIlUx6a1NbhpgwWpxUOGrE6pGhAHN7yPdYOtr.jpeg',9,'2020-11-13 17:42:56','2020-11-13 17:42:56'),(38,'dive-sites/10/4VRnCDr2HNYu3DIEy6YZE9Z55552VQuWtvR9k3H3.jpeg',10,'2020-11-13 17:43:16','2020-11-13 17:43:16'),(39,'dive-sites/10/Wo6111J0xs6VsrkVPCriPuyD0PiXU6WI4yYGs0bG.jpeg',10,'2020-11-13 17:43:16','2020-11-13 17:43:16'),(40,'dive-sites/10/cjNxiQsbbfVphUAJLE8ZX7d6c1dd4vBFB7rPdN8H.jpeg',10,'2020-11-13 17:43:16','2020-11-13 17:43:16'),(41,'dive-sites/10/AM4h3Vi34xmQVb45l4VU5daS1Q1pjKG3oZgfNvaQ.jpeg',10,'2020-11-13 17:43:16','2020-11-13 17:43:16'),(42,'dive-sites/12/mms62TCiDRxp1QEoiaGciV9LGJWF35zOKrVmF4qy.jpeg',12,'2020-11-13 17:43:52','2020-11-13 17:43:52'),(43,'dive-sites/12/YqZn0DCsj9ifhYsfRpUfjtcVRcPBX7s15XKBahuX.jpeg',12,'2020-11-13 17:43:52','2020-11-13 17:43:52'),(44,'dive-sites/12/pYDRUl1GOa6Vv2Vxv8tQ37MjY2SwZjNeFUzv6YZz.jpeg',12,'2020-11-13 17:43:52','2020-11-13 17:43:52'),(45,'dive-sites/13/qLpspujjIVmZGDV9elGbaDSQCuZvZNe2J5K5PR15.jpeg',13,'2020-11-13 17:46:50','2020-11-13 17:46:50'),(46,'dive-sites/13/aR5CWq4LbU1AQpKgCmhZjQK1QsX8SGZLb499FZvs.jpeg',13,'2020-11-13 17:46:50','2020-11-13 17:46:50'),(47,'dive-sites/13/hhgTitKcZvMcfezuoFs0aMyrubSSB5lrDgsDVGqx.jpeg',13,'2020-11-13 17:46:50','2020-11-13 17:46:50'),(48,'dive-sites/13/aWD1jMLWkBlpmlTlMdjLxRYADRnDemnmuVfnn81x.jpeg',13,'2020-11-13 17:46:50','2020-11-13 17:46:50'),(49,'dive-sites/14/nqravXEnnggZyfwVFBZOh7BBPXmmY79J5PtjnnJk.jpeg',14,'2020-11-13 17:47:17','2020-11-13 17:47:17'),(50,'dive-sites/14/LN7YWd7MgdF9yREoT44bE7CtrJKbKERTYb0aLIRi.jpeg',14,'2020-11-13 17:47:17','2020-11-13 17:47:17'),(51,'dive-sites/14/9MgEIBKLM2PKV8gQPgBhf3MLThSLNKL38PGR6ePR.jpeg',14,'2020-11-13 17:47:17','2020-11-13 17:47:17'),(52,'dive-sites/14/qBCMpGKDHR5HzLt45u5trGwLOnPvFk35UjfFQRcm.jpeg',14,'2020-11-13 17:47:17','2020-11-13 17:47:17'),(53,'dive-sites/15/nBLezuoiKDQ1wpLc6r27Cc5dxQajYxV49lRwFxoC.jpeg',15,'2020-11-13 17:47:44','2020-11-13 17:47:44'),(54,'dive-sites/15/wCboWNSNpjT7GvBbDFGq1yrfcb96g0Wjy8MS2akD.jpeg',15,'2020-11-13 17:47:44','2020-11-13 17:47:44'),(55,'dive-sites/15/B3FpD5uKMRjAzXcpvYVyioylZiof1K9V6frpazNO.jpeg',15,'2020-11-13 17:47:44','2020-11-13 17:47:44'),(56,'dive-sites/15/qXC6sSBXmLqgwm1AqQN7VqkpYq0IIScRRnAe1XYV.jpeg',15,'2020-11-13 17:47:44','2020-11-13 17:47:44'),(57,'dive-sites/16/QhrluCsjcHEjr11a1Q9RVWPD9hH6SQ1corci5FW0.jpeg',16,'2020-11-13 17:48:20','2020-11-13 17:48:20'),(58,'dive-sites/16/11JBZO7hnGDG7QZOdV7kCnjSVPP7aWyjsYx5vwI5.jpeg',16,'2020-11-13 17:48:20','2020-11-13 17:48:20'),(59,'dive-sites/16/plgsxWozkJHrB6QVlsXWlJW3ZHgGhoksqqyAO786.jpeg',16,'2020-11-13 17:48:20','2020-11-13 17:48:20'),(60,'dive-sites/16/qDr9a8RDs3uGZ7cbqgwU7tWeOkNuORI0FEyt9H8p.jpeg',16,'2020-11-13 17:48:20','2020-11-13 17:48:20'),(61,'dive-sites/20/51rXmwqgJqKeY9fJfTklfVPmbg8Kq5lsXkY4dLES.jpeg',20,'2020-11-13 17:49:03','2020-11-13 17:49:03'),(62,'dive-sites/20/2fO8pD7ZI0hxB1BiGeDDKacfVD6g8l13Z5r0veCG.jpeg',20,'2020-11-13 17:49:03','2020-11-13 17:49:03'),(63,'dive-sites/20/Z5JZvTGILekx4bkm8KOQHM1QXZYlhIFfVF7XAevm.jpeg',20,'2020-11-13 17:49:03','2020-11-13 17:49:03'),(64,'dive-sites/20/XxZ8iG80cP6Kc4IVLnpEQSRezJQ8xAQeRNXSK80i.jpeg',20,'2020-11-13 17:49:03','2020-11-13 17:49:03'),(65,'dive-sites/19/h209TNp2YBG8qOtVCrlhG6FttnsCVeIXeiv17AYt.jpeg',19,'2020-11-13 17:49:26','2020-11-13 17:49:26'),(66,'dive-sites/19/cmVVBCyyWFatjKtYT7jKgiQwsRC1cF7jV1PS8qpt.jpeg',19,'2020-11-13 17:49:26','2020-11-13 17:49:26'),(67,'dive-sites/19/7PXo8RvKaSVt5004AUsyeLe0zwJjkc5doAOpxHY9.jpeg',19,'2020-11-13 17:49:26','2020-11-13 17:49:26'),(68,'dive-sites/19/qnZSmLLK55eSW1UfIF40rYLj9Fd6AqxpwtVro3qA.jpeg',19,'2020-11-13 17:49:26','2020-11-13 17:49:26'),(69,'dive-sites/18/FYMF1441mjNifcDWunnB5EGjroZ2hNgMHcwg4uxZ.jpeg',18,'2020-11-13 17:49:53','2020-11-13 17:49:53'),(70,'dive-sites/18/OHG4zkCFnXGKHBx4jjwgkw9m8teH9ODcu4FNKN9r.jpeg',18,'2020-11-13 17:49:53','2020-11-13 17:49:53'),(71,'dive-sites/18/4j9bWJ1oCaIVIUKcACHKkDrEhygXhhNP4TmEx2kJ.jpeg',18,'2020-11-13 17:49:53','2020-11-13 17:49:53'),(72,'dive-sites/18/o8bChZ4V9lg9cWa4VF41TbngZUgsbgZKXtIbqFeF.jpeg',18,'2020-11-13 17:49:53','2020-11-13 17:49:53'),(73,'dive-sites/21/DVXTlzn1XN2CfgqFNWnW5lBkEo8dO1Nz3J9ikNIG.jpeg',21,'2020-11-13 17:50:17','2020-11-13 17:50:17'),(74,'dive-sites/21/v5J1gsUcBNqdljfQ3FSbdddgqfzPbNOHLrCxibel.jpeg',21,'2020-11-13 17:50:17','2020-11-13 17:50:17'),(75,'dive-sites/21/4qGNayGkG8dE9j3H2dXhIQjMIRWxC8r4SEwfOn4e.jpeg',21,'2020-11-13 17:50:17','2020-11-13 17:50:17'),(76,'dive-sites/21/SkFYHqcmeBRnVhG1zsUtd25GfAFCohrdgyyoaVM2.jpeg',21,'2020-11-13 17:50:17','2020-11-13 17:50:17'),(77,'dive-sites/17/RSZyZ580AM2VACG0gh7RK4BKkuExQDkTE9uJR2ij.jpeg',17,'2020-11-13 17:50:49','2020-11-13 17:50:49'),(78,'dive-sites/17/EcHYcx5dSTa6aR1TaOIyYsn1yZXk7D6LbkYamKOs.jpeg',17,'2020-11-13 17:50:49','2020-11-13 17:50:49'),(79,'dive-sites/17/sTCdDWULzr72jrgCeYeYFO7lRGW435vjWbfJvNly.jpeg',17,'2020-11-13 17:50:49','2020-11-13 17:50:49'),(80,'dive-sites/17/w9MEJpsGx1bGFwYrwVNhuAFcSW82ga1kmeroaHtj.jpeg',17,'2020-11-13 17:50:49','2020-11-13 17:50:49'),(81,'dive-sites/23/SAvnSH5fbX5rY5Nw5sUggJSDKVazX2mEij6lIcyE.jpeg',23,'2020-11-13 17:52:03','2020-11-13 17:52:03'),(82,'dive-sites/23/Yee2n3DriiCUMg63G157wrRje02KJhraBQQJAeG7.jpeg',23,'2020-11-13 17:52:03','2020-11-13 17:52:03'),(83,'dive-sites/23/mGTMRExEPm3XuOJTPKMKAlAVBaeA05VPpYUKePpk.jpeg',23,'2020-11-13 17:52:03','2020-11-13 17:52:03'),(84,'dive-sites/23/tREYj09Kr7sJtwGsFZ1kg1Lm29U1QXU4UgFDKQ9g.jpeg',23,'2020-11-13 17:52:03','2020-11-13 17:52:03'),(85,'dive-sites/22/k7w4jzL2tQYC9XZYWYTM1PIRlVivInQJ63PohC6P.jpeg',22,'2020-11-13 17:53:22','2020-11-13 17:53:22'),(86,'dive-sites/22/9gxuBB4zB3Zkamfo0WQ3SpS2iuetFOUIIYXAdEPz.jpeg',22,'2020-11-13 17:53:22','2020-11-13 17:53:22'),(87,'dive-sites/22/g8UTNTSBLXSakeigH1bTjA9qamXRbm2aJjPsLBb9.jpeg',22,'2020-11-13 17:53:22','2020-11-13 17:53:22'),(88,'dive-sites/22/qYLtFMxhqj7RTQzzy9icwpX5fLm5hKjWGrpoif60.jpeg',22,'2020-11-13 17:53:22','2020-11-13 17:53:22');
/*!40000 ALTER TABLE `dive_site_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_nearby`
--

LOCK TABLES `dive_site_nearby` WRITE;
/*!40000 ALTER TABLE `dive_site_nearby` DISABLE KEYS */;
INSERT INTO `dive_site_nearby` (`id`, `owner_site_id`, `nearby_site_id`, `created_at`, `updated_at`) VALUES (1,1,3,'2020-11-13 18:02:04','2020-11-13 18:02:04'),(2,1,4,'2020-11-13 18:02:04','2020-11-13 18:02:04'),(3,23,21,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(4,23,22,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(5,10,2,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(6,10,3,'2020-11-13 18:05:03','2020-11-13 18:05:03');
/*!40000 ALTER TABLE `dive_site_nearby` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_seasons`
--

LOCK TABLES `dive_site_seasons` WRITE;
/*!40000 ALTER TABLE `dive_site_seasons` DISABLE KEYS */;
INSERT INTO `dive_site_seasons` (`id`, `dive_site_id`, `season_id`, `created_at`, `updated_at`) VALUES (1,1,3,'2020-11-13 18:00:37','2020-11-13 18:00:37'),(2,1,4,'2020-11-13 18:00:37','2020-11-13 18:00:37'),(3,23,1,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(4,23,2,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(5,23,3,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(6,23,4,'2020-11-13 18:04:00','2020-11-13 18:04:00'),(7,10,1,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(8,10,2,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(9,10,3,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(10,10,4,'2020-11-13 18:05:03','2020-11-13 18:05:03'),(11,24,2,'2020-11-22 16:33:33','2020-11-22 16:33:33'),(14,27,2,'2020-11-22 16:37:55','2020-11-22 16:37:55'),(15,28,2,'2020-11-22 16:44:34','2020-11-22 16:44:34');
/*!40000 ALTER TABLE `dive_site_seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_site_taxons`
--

LOCK TABLES `dive_site_taxons` WRITE;
/*!40000 ALTER TABLE `dive_site_taxons` DISABLE KEYS */;
/*!40000 ALTER TABLE `dive_site_taxons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `dive_sites`
--

LOCK TABLES `dive_sites` WRITE;
/*!40000 ALTER TABLE `dive_sites` DISABLE KEYS */;
INSERT INTO `dive_sites` (`id`, `name`, `description`, `latitude`, `longitude`, `max_depth`, `visibility`, `current`, `city_id`, `main_taxon_id`, `license_id`, `enabled`, `special`, `guided`, `rate`, `created_at`, `updated_at`) VALUES (1,'Shoe Stump','shore',28.52861111,34.51416667,30,'High','low',2,1,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:25:02'),(2,'Umm Sid','shore',28.42083333,34.45722222,30,'High','low',3,10,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:10:12'),(3,'Moray Garden','shore',28.43777778,34.45888889,30,'High','low',3,10,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:11:39'),(4,'Rick`s Reef','shore',28.55722222,34.52361111,25,'High','low',2,8,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:12:11'),(5,'Three Pools','shore',28.43538260,34.45733170,20,'High','low',2,9,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:25:14'),(6,'South Ras Abu Galum','boat',28.61167000,34.55333333,30,'High','low',2,7,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:25:47'),(7,'North Ras Abu Galum','boat',28.61500000,34.55944444,30,'High','low',2,7,2,1,1,0,0,'2020-11-07 23:44:24','2020-11-22 16:27:14'),(8,'Ras Abu Galum','boat',28.61166667,34.55333333,30,'High','low',3,1,1,1,1,0,0,'2020-11-07 23:44:24','2020-11-22 16:26:34'),(9,'Red Tooth Trigger Bay','shore',28.61972222,34.56638889,30,'High','low',3,7,1,1,1,0,0,'2020-11-07 23:44:24','2020-11-22 16:13:29'),(10,'Lighthouse','Its The Main Attraction in Dahab, directly on the mamsha region. accessible to most of the dive centers in dahab',28.49888889,34.51972222,35,'High','low',2,5,2,1,0,0,5,'2020-11-07 23:44:24','2020-11-22 16:14:00'),(12,'Lionfish Rock','shore',28.45055556,34.47055556,30,'High','low',3,2,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:14:50'),(13,'The Islands','shore',28.47777778,34.51166667,20,'High','low',3,8,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:15:43'),(14,'Golden Blocks','shore',28.48888889,34.51972222,30,'High','low',3,1,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:22:51'),(15,'Eel Garden','shore',28.50500000,34.51972222,30,'High','low',3,9,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:17:05'),(16,'El Shugarat','shore',28.35583333,34.43972222,30,'High','low',2,6,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:25:28'),(17,'Coral Garden','shore',28.55472222,34.52083333,30,'High','low',3,9,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:18:47'),(18,'Gabr el Bint','shore',28.35305556,34.43333333,30,'High','low',2,9,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:25:37'),(19,'The Canyon','shore',28.55472222,34.52083333,100,'High','low',3,7,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:19:34'),(20,'Bannerfish Bay','shore',28.49888889,34.51861111,30,'High','low',2,10,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:25:43'),(21,'Abu Helal / Abu Talha','shore',28.54238333,34.51438333,60,'High','low',3,8,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-13 17:50:17'),(22,'The Caves','shore',28.41666667,34.45583333,35,'High','low',2,6,2,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 16:26:03'),(23,'The Blue Hole','The Blue Hole is a submarine sinkhole (a kind of cave), around 130 m deep. There is a shallow opening around 6 m deep, known as \'the saddle\', opening out to the sea, and a 26 m long tunnel, known as the arch, the top of which lies at a depth of 52 m. The hole itself and the surrounding area has an abundance of coral and reef fish.',28.57250000,34.53666667,200,'High','low',2,5,1,1,0,0,0,'2020-11-07 23:44:24','2020-11-22 15:55:08'),(24,'Cleopatra\'s palace',NULL,31.01527900,29.33281000,10,'High','medium',2,7,1,0,0,0,5,'2020-11-22 16:33:33','2020-11-25 21:45:39'),(27,'dive dive','31.209004, 29.887368',31.09527800,29.61833600,8,'High','low',2,1,1,1,0,0,5,'2020-11-22 16:37:55','2020-11-25 21:45:33'),(28,'dive dive 1',NULL,31.20340500,29.86037000,2,'High','low',2,1,1,1,0,0,4,'2020-11-22 16:44:34','2020-11-25 21:45:22');
/*!40000 ALTER TABLE `dive_sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `diving_courses`
--

LOCK TABLES `diving_courses` WRITE;
/*!40000 ALTER TABLE `diving_courses` DISABLE KEYS */;
INSERT INTO `diving_courses` (`id`, `name`, `description`, `school_id`, `license_type`, `required_license_id`, `days_num`, `learning_type`, `enabled`, `created_at`, `updated_at`) VALUES (1,'Open Water','Tenetur esse quia sint accusamus quibusdam saepe. Ea eaque nisi cumque officiis. Fugit vero molestias sint. Laudantium omnis dolores cupiditate commodi. Alias modi odio laborum consequuntur voluptas.',1,'main',1,3,'practical',1,'2020-11-07 23:44:24','2020-11-14 04:55:14'),(2,'Advanced Open Water','Sequi numquam quae maxime sint. Officiis id explicabo voluptas ut. Odit dignissimos explicabo numquam repudiandae culpa aut. Illo soluta aspernatur odit occaecati incidunt iste.',1,'main',1,4,'theoretical',1,'2020-11-07 23:44:24','2020-11-14 04:55:40'),(4,'Deep Specialty',NULL,1,'specialty',2,2,'theoretical',0,'2020-11-14 04:56:33','2020-11-14 04:56:33'),(5,'Dive Master',NULL,1,'main',2,2,'theoretical',0,'2020-11-14 04:57:34','2020-11-14 05:10:28'),(6,'Dive Instructor',NULL,1,'main',5,2,'theoretical',0,'2020-11-14 04:58:26','2020-11-14 04:58:26');
/*!40000 ALTER TABLE `diving_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `diving_schools`
--

LOCK TABLES `diving_schools` WRITE;
/*!40000 ALTER TABLE `diving_schools` DISABLE KEYS */;
INSERT INTO `diving_schools` (`id`, `name`, `logo`, `enabled`, `created_at`, `updated_at`) VALUES (1,'PADI','',1,'2020-11-07 23:44:24','2020-11-13 18:19:38'),(2,'SSI','schools/2/PvIkDj4sb3PULeym0aku2Ud2jp68qOCzmgoJpLTf.jpeg',1,'2020-11-07 23:44:24','2020-11-13 18:13:09'),(3,'BSAC','schools/3/R6cJFVCfMhzRqPc3krcNrzQGOMsaDs2Cq18FPuuH.jpeg',1,'2020-11-07 23:44:24','2020-11-13 18:13:29'),(4,'CMAS','schools/4/qfD1ki80lvTvoR5DuPVVqkq80Vto8lmBckzkEYNt.jpeg',1,'2020-11-13 18:13:50','2020-11-13 18:13:50'),(5,'SDI','',1,'2020-11-13 18:23:44','2020-11-14 04:54:08'),(6,'TDI','schools/6/ikBOW7rbdfbDVThEGW4UIzyWVy2Z0rNzoOIQfnu2.jpeg',1,'2020-11-14 04:54:03','2020-11-14 04:54:03');
/*!40000 ALTER TABLE `diving_schools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `equipments`
--

LOCK TABLES `equipments` WRITE;
/*!40000 ALTER TABLE `equipments` DISABLE KEYS */;
INSERT INTO `equipments` (`id`, `name`, `night_dive`, `nitrox`, `image`, `state`, `season_id`, `created_at`, `updated_at`) VALUES (1,'Weight Belt',0,0,'equipments/1/v8jHsgGFYta0OnVssvHhTUzDCByP41gAPrNabsUP.svg','main',1,'2020-11-07 23:44:24','2020-11-14 05:20:08'),(2,'Boots',0,0,NULL,'Main',3,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(3,'Suit',0,0,'equipments/3/BnF9amDhIraRKbV3JyEYGAE5uNjA5jE7LjphlJCu.svg','main',1,'2020-11-07 23:44:24','2020-11-14 05:11:50'),(4,'BCD',0,0,'equipments/4/MbtxkEOERWJEIkhJ9bV4m6wWcol6u7sQKKrUgMSs.svg','main',1,'2020-11-07 23:44:24','2020-11-14 05:21:15'),(5,'Fins',0,0,'equipments/5/XSiDe89Dgsp6P2YY9XKssjZrkd29XFoQYHGoFbK5.svg','main',1,'2020-11-07 23:44:24','2020-11-14 05:21:01'),(6,'Mask',0,0,'equipments/6/NI37PASvEllbUcHOoSyhj2XJdFCZEwfKYtKNQQU5.svg','main',1,'2020-11-07 23:44:24','2020-11-14 05:19:53'),(7,'Pressure Gauge',0,0,'equipments/7/yvXxWVo6jO1vzZXVDY1orozPcOyKubX0kz0xYoGu.svg','main',1,'2020-11-14 05:22:24','2020-11-14 05:22:24'),(8,'Regulator',0,0,'equipments/8/Jyyt6tJvEdGM4V5z2hhXxvOrfzX8kMwzSFSIbnP6.svg','main',1,'2020-11-14 05:22:56','2020-11-14 05:22:56'),(9,'Dive Computer',0,0,'equipments/9/BP2I2TkmUjnFg9x9TfhUX6qsDtxgIpZ8GqLqqjAc.svg','extra',1,'2020-11-14 05:23:23','2020-11-14 05:23:23'),(10,'Flash Light',1,0,'equipments/10/wZ33w6bpQYpjDPvap8yuqNkTFQv47GwrB3u5hI07.svg','extra',1,'2020-11-14 05:24:11','2020-11-14 05:24:47'),(11,'Camera',0,0,'equipments/11/VBkF07QCWwYeO4Ln4ewyCNlVqSmXKS9SlvZeCrV9.svg','extra',1,'2020-11-14 05:24:33','2020-11-14 05:24:33'),(12,'Gloves',0,0,'equipments/12/MjLgju365xGK2SGqnReVNxamEv0jYLFC5RouooDo.svg','extra',1,'2020-11-14 05:25:18','2020-11-14 05:25:18'),(13,'Surface Buoy',0,0,'equipments/13/p25VPA8oyza3HW2fhIQUTqqQR8o4XARo5GCD4kJN.svg','extra',1,'2020-11-14 05:26:15','2020-11-14 05:26:24'),(14,'Hoodie',0,0,'equipments/14/yX5bVA5U6WhMAb3STTA6Byg12SQgNPsX6MvV4T1B.svg','extra',1,'2020-11-14 05:27:16','2020-11-14 05:27:16'),(15,'Compass',0,0,'equipments/15/7gBL1O8ZnX7VqO9BsBjmH5b7kqfeljiSwtjz3RVC.svg','extra',1,'2020-11-14 05:27:45','2020-11-14 05:27:45');
/*!40000 ALTER TABLE `equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_06_01_000001_create_oauth_auth_codes_table',1),(4,'2016_06_01_000002_create_oauth_access_tokens_table',1),(5,'2016_06_01_000003_create_oauth_refresh_tokens_table',1),(6,'2016_06_01_000004_create_oauth_clients_table',1),(7,'2016_06_01_000005_create_oauth_personal_access_clients_table',1),(8,'2019_08_19_000000_create_failed_jobs_table',1),(9,'2020_02_28_131649_create_countries_table',1),(10,'2020_02_28_131703_create_cities_table',1),(11,'2020_03_04_180805_add_country_city_to_users_table',1),(12,'2020_03_07_161224_create_diving_schools_table',1),(13,'2020_03_07_161459_create_diving_courses_table',1),(14,'2020_03_10_193700_create_user_licenses_table',1),(15,'2020_03_10_195847_add_default_license_to_users_table',1),(16,'2020_03_13_155926_add_license_data_to_user_licenses',1),(17,'2020_04_24_224926_edit_countries_table',1),(18,'2020_05_09_201122_create_social_users_table',1),(19,'2020_05_12_190421_add_token_to_social_table',1),(20,'2020_05_26_095354_create_taxons_table',1),(21,'2020_05_26_101043_create_dive_activities_table',1),(22,'2020_05_27_164206_create_seasons_table',1),(23,'2020_05_27_165133_create_day_times_table',1),(24,'2020_05_28_135336_create_dive_entries_table',1),(25,'2020_05_28_155739_create_dive_sites_table',1),(26,'2020_05_28_155920_create_dive_site_taxons_table',1),(27,'2020_05_28_160009_create_dive_site_activities_table',1),(28,'2020_05_28_160105_create_dive_site_seasons_table',1),(29,'2020_05_28_160211_create_dive_site_day_times_table',1),(30,'2020_07_18_143455_create_admins_table',1),(31,'2020_08_09_204102_create_site_images_table',1),(32,'2020_08_09_205206_add_peak_season_to_cities_table',1),(33,'2020_08_12_190126_create_dive_site_entries',1),(34,'2020_08_15_091223_create_dive_site_nearby_table',1),(35,'2020_08_15_091659_create_equipments_table',1),(36,'2020_08_15_092446_create_course_packages_table',1),(37,'2020_08_15_092510_create_package_courses_table',1),(38,'2020_08_15_092846_create_city_images_table',1),(39,'2020_08_15_093257_create_city_top_sites_table',1),(40,'2020_08_15_111514_create_dive_site_equipments_table',1),(41,'2020_11_08_192729_add_icon_in_seasons_table',2),(42,'2020_11_08_192811_add_icon_in_dive_activities_table',2),(43,'2020_11_08_192823_add_icon_in_day_times_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES ('105ee84f9a29c4336919cce9918d2268a4992aa88a5507a1ad3d919692357f4d90c3b9c9af4810b8',4,1,'user','[]',0,'2020-12-09 07:38:01','2020-12-09 07:38:01','2021-12-09 07:38:01'),('1ed413c4e3266639ddb8ec9ce4662d820eb78db93a537af0983083f69bf428ddc774bcaae2e759c5',6,1,'user','[]',0,'2020-11-13 19:56:52','2020-11-13 19:56:52','2021-11-13 19:56:52'),('27a711594d2205f1dc2486430d9b295d01d9913fe4a3cdce7f72546d3915e36dfcd60238be32e0d6',2,1,'user','[]',0,'2020-11-09 18:47:52','2020-11-09 18:47:52','2021-11-09 18:47:52'),('2ba4e348dadff8fbc5d8c7e2b3aef07dd196ad784669e74428f729fdebeb318e3b73cb29b1318285',7,1,'user','[]',0,'2020-11-21 16:46:35','2020-11-21 16:46:35','2021-11-21 16:46:35'),('41fcd880d5ddca8492df9792a1d480f4f0e7d6de3aa5374fd36f739eb058901a8abd48c512df8dc2',6,1,'user','[]',0,'2020-11-13 20:13:45','2020-11-13 20:13:45','2021-11-13 20:13:45'),('45cb48a1d78045b1b06a5cb0f9a49ffa128918bc34816165f481be33055deed26be2be7d44dfbcf8',8,1,'user','[]',0,'2020-12-10 08:56:58','2020-12-10 08:56:58','2021-12-10 08:56:58'),('46c18e14748c76cf4d3255395378569cd6299288111b519054be2a3e9eafc70f0ac98c90d158bef7',8,1,'user','[]',0,'2020-12-10 20:32:01','2020-12-10 20:32:01','2021-12-10 20:32:01'),('4f8292bb574f592d1c836d714b1074be821b8c3aa22578ffaaa81ffb961698aacb29d56adc6c9f03',3,1,'user','[]',0,'2020-11-10 22:16:09','2020-11-10 22:16:09','2021-11-10 22:16:09'),('5b29f9b5f8addeb9c331665796418512bff8addb380c7ac6b58fda5e0b66076db7e9d873f4ba084d',5,1,'user','[]',0,'2020-11-13 14:24:44','2020-11-13 14:24:44','2021-11-13 14:24:44'),('6cd90f6db945fda9244a31fc3ab2e5d6e4b302c3b3d0b3aa35cbe63b4f3a6ee34a110567f7834071',1,1,'user','[]',0,'2020-11-09 18:47:09','2020-11-09 18:47:09','2021-11-09 18:47:09'),('6f06f1d94f80c0fcc8ed4e2f1b81c35db6a1b83a80fa96887ea89e84953eca14e1a69f52fc2e4228',8,1,'user','[]',0,'2020-12-09 21:50:05','2020-12-09 21:50:05','2021-12-09 21:50:05'),('74b7526e0b947327a1400da0bba66a1fd036418ab2e0a5ecf1b19379ecfa8f7284980720c8744178',1,1,'user','[]',0,'2020-11-09 18:49:01','2020-11-09 18:49:01','2021-11-09 18:49:01'),('75bb6bcd96d66aaf3b6cc3b4c2a7a679f028b703da08e8d6046179d08002c6c3c376b8c42a9dc63c',1,1,'user','[]',0,'2020-11-11 23:46:18','2020-11-11 23:46:18','2021-11-11 23:46:18'),('77b55d4995a71fb6823f7efa4db892b78b1b820d9110bbb88f68dfd85448f75fc527b183ce15f4cf',1,1,'user','[]',0,'2020-11-09 18:48:59','2020-11-09 18:48:59','2021-11-09 18:48:59'),('7815ae0dffc15162c2176c4c24a8dcf49b7f65a87bb8557d7e9fbd8de7014ba8c5871e668c666b76',3,1,'user','[]',0,'2020-11-10 22:19:47','2020-11-10 22:19:47','2021-11-10 22:19:47'),('9687ee11a762655b329b5952171e44e16123b4e0b3508c1143088fd5a4f73097bc9a63cb9770bc29',4,1,'user','[]',0,'2020-12-09 07:38:05','2020-12-09 07:38:05','2021-12-09 07:38:05'),('9b2227e1ae1362fb6845386346d1c9b1c88c1637160177e3cdc175ef6d09d5870cb1e2c385076f83',3,1,'user','[]',0,'2020-11-10 22:14:41','2020-11-10 22:14:41','2021-11-10 22:14:41'),('9ed372e69ea7d65ff64c1cd8ea34abbdbaf4462cbf4a1a55bc68cfcea1a94aa7a133c67d64a765ac',4,1,'user','[]',0,'2020-11-10 22:00:36','2020-11-10 22:00:36','2021-11-10 22:00:36'),('a4758d5981a6b0e0e575cf86842f958781ada1968df2d5e2867d03b09b2df11860251c07cdf61b4a',8,1,'user','[]',0,'2020-12-11 16:52:32','2020-12-11 16:52:32','2021-12-11 16:52:32'),('a9b45a6903e70b17e25bb500161d473c19b0426f8e4724ac59a7c172d53e4a1323dfe80928310047',1,1,'user','[]',0,'2020-11-09 18:48:39','2020-11-09 18:48:39','2021-11-09 18:48:39'),('ae48ce17cf6abf1c7105934fc5fd5ece878225da66e92c865de73739c37fcbf1397f5bb4c11421fc',8,1,'user','[]',0,'2020-12-11 16:57:01','2020-12-11 16:57:01','2021-12-11 16:57:01'),('b65bd4fb45b5de90bff1ab3b8cfc623d0b325544f93c390bf786576db0118f6af777e97fff1f8375',6,1,'user','[]',0,'2020-11-13 19:46:25','2020-11-13 19:46:25','2021-11-13 19:46:25'),('c3e5a61651aafe7858a8208829f5b0cab974fd41e53c442ecd15c604c6e663aefc5d962c40c7deec',1,1,'user','[]',0,'2020-11-10 22:07:16','2020-11-10 22:07:16','2021-11-10 22:07:16'),('c6795b61924213ad808fa3b673f4c1e34d04d72abaa2619c15e86f92759e77a96538bab9f915cf63',8,1,'user','[]',0,'2020-12-09 21:49:46','2020-12-09 21:49:46','2021-12-09 21:49:46'),('cc91d78fa87363d8d43061e1d293e0055a1c09ec603b28939c78d1bf79e386de7ccae884aa848a00',8,1,'user','[]',0,'2020-12-09 23:09:18','2020-12-09 23:09:18','2021-12-09 23:09:18'),('d07cea0b6febbe414c8d6e5575bde06bebd508fad50da4c3a0cc97fb48b2ff2e65ac7c8a8c48e5d2',7,1,'user','[]',0,'2020-11-21 16:45:34','2020-11-21 16:45:34','2021-11-21 16:45:34'),('e287b0d1cc706d6ae3b2187d9c059015a1065a84543d980b48125898dc67d88012db362aaaf45482',6,1,'user','[]',0,'2020-11-13 19:52:23','2020-11-13 19:52:23','2021-11-13 19:52:23'),('e6e44bb55c76d0c937bd86335cbc702237f5743fa3a61596809faf7d06bd996542654fcd0e5fee8a',1,1,'user','[]',0,'2020-11-09 18:48:31','2020-11-09 18:48:31','2021-11-09 18:48:31'),('ecf0103a18448b2d734370d3456c510cb779f92b731060e6e2ffc2142bf8aa7829a4b898dd0fe189',3,1,'user','[]',0,'2020-11-10 22:00:11','2020-11-10 22:00:11','2021-11-10 22:00:11'),('f05704970a7a795fe1d9b6230649c912877255c8ab91d4ce1d81453075f9b82d34b295cedb6b4872',1,1,'user','[]',0,'2020-11-09 18:47:47','2020-11-09 18:47:47','2021-11-09 18:47:47'),('f17011818c1f1c80b473aa7825e938d6637b31f61bb0ec3f196f8ad2fca29b810572c3f701c08f2f',8,1,'user','[]',0,'2020-12-11 16:38:20','2020-12-11 16:38:20','2021-12-11 16:38:20'),('f28b9719f5759bc23245b865e5da274bc5eddf4869189bdd8998ef577aa8749476b5eb2cff839051',1,1,'user','[]',0,'2020-11-09 18:48:56','2020-11-09 18:48:56','2021-11-09 18:48:56');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES (1,NULL,'AMACK Personal Access Client','ffglYJhpl2A2HC4XWP0vJDQJwGGvBEtD8NOsbozM','http://localhost',1,0,0,'2020-11-07 23:44:52','2020-11-07 23:44:52'),(2,NULL,'AMACK Password Grant Client','YPEHDyPNkK7189tvhXCv5Czigqn1Gd3ztukciAda','http://localhost',0,1,0,'2020-11-07 23:44:52','2020-11-07 23:44:52');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES (1,1,'2020-11-07 23:44:52','2020-11-07 23:44:52');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `package_courses`
--

LOCK TABLES `package_courses` WRITE;
/*!40000 ALTER TABLE `package_courses` DISABLE KEYS */;
/*!40000 ALTER TABLE `package_courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
INSERT INTO `seasons` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES (1,'Spring','','2020-11-07 23:44:24','2020-11-09 19:16:21'),(2,'Autumn',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(3,'winter',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(4,'summer',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24');
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `social_users`
--

LOCK TABLES `social_users` WRITE;
/*!40000 ALTER TABLE `social_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `taxons`
--

LOCK TABLES `taxons` WRITE;
/*!40000 ALTER TABLE `taxons` DISABLE KEYS */;
INSERT INTO `taxons` (`id`, `name`, `description`, `photo`, `created_at`, `updated_at`) VALUES (1,'wreck','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(2,'Sandy Bottom','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(3,'Altitude','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(4,'Cave','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(5,'marine life','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(6,'Reef','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(7,'artificial','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(8,'shark','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(9,'whale','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(10,'Dolphin','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24'),(11,'Dugong','adasdeqad',NULL,'2020-11-07 23:44:24','2020-11-07 23:44:24');
/*!40000 ALTER TABLE `taxons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `user_licenses`
--

LOCK TABLES `user_licenses` WRITE;
/*!40000 ALTER TABLE `user_licenses` DISABLE KEYS */;
INSERT INTO `user_licenses` (`id`, `user_id`, `course_id`, `license_number`, `front_photo`, `back_photo`, `created_at`, `updated_at`) VALUES (1,1,2,'222222222222','licenses/31s18X88wZ.jpg','licenses/j9kgLaNcet.jpg','2020-11-13 19:51:58','2020-11-13 19:51:58'),(2,1,1,'222222222222333355','licenses/8PIjAp3aCa.jpg','licenses/09F8m2i3uV.jpg','2020-11-21 16:46:22','2020-11-21 16:46:22');
/*!40000 ALTER TABLE `user_licenses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `password`, `birth_date`, `photo`, `gender`, `city_id`, `country_id`, `default_license`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'mahmoud alaa','mahmoudadmob@gmail.com',NULL,NULL,'$2y$10$gkDjWYKvMOhe4B8cLRa1meBFV5AQ33DdbWEfagH70qEUAPBvlTkPS',NULL,NULL,'u',NULL,NULL,NULL,NULL,'2020-11-09 18:46:25','2020-11-09 18:48:47'),(2,'tes1t','tes1312t@test.com',NULL,'01231312453678','$2y$10$J11hH0D7x91TDejbiiFav.j4RNcN41rTr9seT5Nt7uc2JAMpHKc2u',NULL,NULL,'u',NULL,NULL,NULL,NULL,'2020-11-09 18:47:52','2020-11-09 18:47:52'),(3,'mahmoudalaa','test@test.com',NULL,'+201117724287','$2y$10$DNsPz6m8r68EzGzEpTUCxuFcp.n.1pt5JLKQj3vU8./iniGWv2XMC',NULL,NULL,'u',NULL,64,NULL,NULL,'2020-11-10 22:00:11','2020-11-10 22:00:11'),(4,'tes1t','tes132t@test.com',NULL,'012313124578','$2y$10$kQUzcCaBjFzg4o3PWfzdcO1h0.PCM7IjV7ACFTvrs5KW7q19AQPMq',NULL,NULL,'u',NULL,NULL,NULL,NULL,'2020-11-10 22:00:36','2020-11-10 22:00:36'),(5,'tes1t','tes12t@test.com',NULL,'01231124578','$2y$10$Whd4wRg41Js9Fcx8MwUfMuojni6gjeuva0X6SyymPiLnGn1N8k4BC',NULL,NULL,'u',NULL,NULL,NULL,NULL,'2020-11-13 14:24:44','2020-11-13 14:24:44'),(6,'mahmoud','aa@aa.com',NULL,'+20123333666333','$2y$10$/8apzZiXyil6HXFcpgqoiOvDRycnqi.kIztPXpoMPaDhI5eHmJNLS',NULL,NULL,'u',NULL,64,NULL,NULL,'2020-11-13 19:46:25','2020-11-13 19:46:25'),(7,'ahmed','mahmoud@ad.com',NULL,'+21344744777777','$2y$10$FnaRx9GEhHm6J9eIM8eHPObpjJB7dkJtCuYODqak2Vs/WPzJLLlWW',NULL,NULL,'u',NULL,64,NULL,NULL,'2020-11-21 16:45:34','2020-11-21 16:45:34'),(8,'ahmed','a.emam3920@gmail.com',NULL,'+201112807193','$2y$10$by/ZX1JOVMLcoKxRo/tTOe.qnZi1u5aySHzXmCnHYdT/C5//cHbr6',NULL,NULL,'u',NULL,64,NULL,NULL,'2020-12-09 21:49:46','2020-12-09 21:49:46');
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

-- Dump completed on 2020-12-12 18:23:25
