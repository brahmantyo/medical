-- MySQL dump 10.15  Distrib 10.0.27-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: medical
-- ------------------------------------------------------
-- Server version	10.0.27-MariaDB-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `medical`
--

USE `medical`;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','admin','2016-11-26 14:04:42','2016-11-26 14:04:42'),(2,'user','user','2016-11-26 14:05:01','2016-11-26 14:05:01');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `privileges`
--

LOCK TABLES `privileges` WRITE;
/*!40000 ALTER TABLE `privileges` DISABLE KEYS */;
INSERT INTO `privileges` VALUES (1,'administrator','2016-12-09 14:58:24','2016-12-09 14:58:24'),(2,'user1','2016-12-09 14:59:30','2016-12-09 14:59:30');
/*!40000 ALTER TABLE `privileges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbadvice`
--

LOCK TABLES `tbadvice` WRITE;
/*!40000 ALTER TABLE `tbadvice` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbadvice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbdiagnosa`
--

LOCK TABLES `tbdiagnosa` WRITE;
/*!40000 ALTER TABLE `tbdiagnosa` DISABLE KEYS */;
INSERT INTO `tbdiagnosa` VALUES ('Q01','Apakah anda sering ingin buang air kecil?','2016-12-18 20:50:55','2016-12-18 20:50:55'),('Q02','Apakah anda sering merasakan cepat haus?','2016-12-18 20:51:04','2016-12-18 20:51:04'),('Q03','Apakah anda sering merasakan cepat lapar?','2016-12-18 20:51:13','2016-12-18 20:51:13'),('Q04','Apakah anda mengalami pandangan kabur?','2016-12-18 20:51:19','2016-12-18 20:51:19'),('Q05','Apakah anda sering merasakan lelah?','2016-12-18 20:51:27','2016-12-18 20:51:27'),('Q06','Apakah anda mengalami sakit kepala?','2016-12-18 20:51:34','2016-12-18 20:51:34'),('Q07','Apakah anda sering merasakan susah berkonsentrasi?','2016-12-18 20:51:41','2016-12-18 20:51:41'),('Q08','Apakah anda mengalami sensasi kesemutan?','2016-12-18 20:51:54','2016-12-18 20:51:54'),('Q09','Apakah anda mengalami rasa perih pada bagian kaki dan tungkai kaki?','2016-12-18 20:52:03','2016-12-18 20:52:03'),('Q10','Apakah anda mengalami kemampuan merasakan sakit menurun?','2016-12-18 20:52:13','2016-12-18 20:52:13'),('Q11','Apakah anda mengalami perubahan suhu tubuh?','2016-12-18 21:22:18','2016-12-18 21:22:18'),('Q12','Apakah anda mengalami kehilang keseimbangan tubuh?','2016-12-18 21:25:04','2016-12-18 21:25:04'),('Q13','Apakah anda memiliki kolestrol tinggi?','2016-12-18 21:25:29','2016-12-18 21:25:29'),('Q14','Apakah anda mengalami tekanan darah tinggi?','2016-12-18 21:25:38','2016-12-18 21:25:38'),('Q15','Apakah anda mengalami obesitas?','2016-12-18 21:25:46','2016-12-18 21:25:46'),('Q16','Apakah anda sering mengalami nyeri bagian dada?','2016-12-18 21:25:54','2016-12-18 21:25:54'),('Q17','Apakah anda mengalami perubahan buang air kecil?','2016-12-18 21:26:02','2016-12-18 21:26:02'),('Q18','Apakah anda mengalami bengkak pada tungkai kaki?','2016-12-18 21:26:09','2016-12-18 21:26:09'),('Q19','Apakah anda mengalami gatal kulit?','2016-12-18 21:26:16','2016-12-18 21:26:16'),('Q20','Apakah anda sering merasakan mulut rasa logam?','2016-12-18 21:26:26','2016-12-18 21:26:26'),('Q21','Apakah anda sering merasakan sesak nafas?','2016-12-18 21:26:33','2016-12-18 21:26:33'),('Q22','Apakah anda sering merasakan kedinginan atau mengigil?','2016-12-18 21:26:40','2016-12-18 21:26:40'),('Q23','Apakah anda sering merasakan nyeri pinggang?','2016-12-18 21:26:47','2016-12-18 21:26:47'),('Q24','Apakah anda mengalami aritmia?','2016-12-18 21:26:54','2016-12-18 21:26:54'),('Q25','Apakah anda sering mengalami berkeringat?','2016-12-18 21:27:02','2016-12-18 21:27:02'),('Q26','Apakah anda sering merasakan lelah?','2016-12-18 21:27:09','2016-12-18 21:27:09');
/*!40000 ALTER TABLE `tbdiagnosa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbgangguan`
--

LOCK TABLES `tbgangguan` WRITE;
/*!40000 ALTER TABLE `tbgangguan` DISABLE KEYS */;
INSERT INTO `tbgangguan` VALUES (1,'P01','','2016-12-18 20:45:45','2016-12-18 20:45:45','Hiperglikemia'),(2,'P02','','2016-12-18 20:45:58','2016-12-18 20:45:58','Neuropathy'),(3,'P03','','2016-12-18 20:46:06','2016-12-18 20:46:06','Jantung Koroner'),(4,'P04','','2016-12-18 20:46:13','2016-12-18 20:46:13','Gagal Ginjal'),(5,'P05','','2016-12-18 20:46:20','2016-12-18 20:46:20','Kerusakan Pembuluh Arteri'),(6,'P06','','2016-12-18 20:46:36','2016-12-18 20:46:36','Susp Hiperglikemia'),(7,'P07','','2016-12-18 20:46:48','2016-12-18 20:46:48','Susp Neuropathy'),(8,'P08','','2016-12-18 20:47:02','2016-12-18 20:47:02','Susp Jantung Koroner'),(9,'P09','','2016-12-18 20:47:09','2016-12-18 20:47:09','Susp Gagal Ginjal'),(10,'P10','','2016-12-18 20:47:19','2016-12-18 20:47:19','Susp Kerusakan Pembuluh Arteri'),(11,'P11','','2016-12-18 20:47:29','2016-12-18 20:47:29','SEHAT');
/*!40000 ALTER TABLE `tbgangguan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbgejala`
--

LOCK TABLES `tbgejala` WRITE;
/*!40000 ALTER TABLE `tbgejala` DISABLE KEYS */;
INSERT INTO `tbgejala` VALUES (1,'G01','Sering Kencing','','','','2016-12-20 02:32:28','2016-12-20 02:32:28'),(2,'G02','Cepat Haus','','','','2016-12-20 02:33:24','2016-12-20 02:33:24'),(3,'G03','Cepat Lapar','','','','2016-12-20 02:33:42','2016-12-20 02:33:42'),(4,'G04','Pandangan Kabur','','','','2016-12-20 02:33:54','2016-12-20 02:33:54'),(5,'G05','Lelah','','','','2016-12-20 02:34:11','2016-12-20 02:34:11'),(6,'G06','Sakit Kepala','','','','2016-12-20 02:34:27','2016-12-20 02:34:27'),(7,'G07','Susah Berkonsentrasi','','','','2016-12-20 02:34:47','2016-12-20 02:34:47');
/*!40000 ALTER TABLE `tbgejala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbkonsultasi`
--

LOCK TABLES `tbkonsultasi` WRITE;
/*!40000 ALTER TABLE `tbkonsultasi` DISABLE KEYS */;
INSERT INTO `tbkonsultasi` VALUES (1,'2016-10-20 17:00:00',1,NULL,'2016-12-09 14:22:18','2016-12-09 14:22:18');
/*!40000 ALTER TABLE `tbkonsultasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbpasien`
--

LOCK TABLES `tbpasien` WRITE;
/*!40000 ALTER TABLE `tbpasien` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbpasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbrespon`
--

LOCK TABLES `tbrespon` WRITE;
/*!40000 ALTER TABLE `tbrespon` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbrespon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tbrule`
--

LOCK TABLES `tbrule` WRITE;
/*!40000 ALTER TABLE `tbrule` DISABLE KEYS */;
INSERT INTO `tbrule` VALUES (32,'R02','G01','P02','2016-12-21 02:50:38','2016-12-21 02:50:38'),(33,'R02','G04','P02','2016-12-21 02:50:38','2016-12-21 02:50:38'),(41,'R01','G01','P01','2016-12-21 03:17:35','2016-12-21 03:17:35'),(42,'R01','G02','P01','2016-12-21 03:17:36','2016-12-21 03:17:36'),(43,'R01','G03','P01','2016-12-21 03:17:36','2016-12-21 03:17:36'),(44,'R01','G04','P01','2016-12-21 03:17:36','2016-12-21 03:17:36'),(45,'R01','G05','P01','2016-12-21 03:17:36','2016-12-21 03:17:36'),(46,'R01','G06','P01','2016-12-21 03:17:36','2016-12-21 03:17:36'),(47,'R01','G07','P01','2016-12-21 03:17:36','2016-12-21 03:17:36');
/*!40000 ALTER TABLE `tbrule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('administrator','21232f297a57a5a743894a0e4a801fc3','2016-12-09 14:55:01','2016-12-09 14:55:01','administrator@system.com',NULL,NULL,'Administrator'),('user1','24c9e15e52afc47c225b757e7bee1f9d','2016-12-09 14:59:14','2016-12-09 14:59:14','user1@system.com',NULL,NULL,'User1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-21 10:42:57
