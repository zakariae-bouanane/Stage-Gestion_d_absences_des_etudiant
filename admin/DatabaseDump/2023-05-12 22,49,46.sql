-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: system_absence
-- ------------------------------------------------------
-- Server version 	10.4.24-MariaDB
-- Date: Fri, 12 May 2023 22:49:46 +0200

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_AUTOCOMMIT=@@AUTOCOMMIT */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `absence`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `absence` (
  `id_abs` int(11) NOT NULL AUTO_INCREMENT,
  `stg_name_abs` varchar(255) NOT NULL,
  `when_abs` varchar(255) NOT NULL,
  `full_when_string` varchar(255) NOT NULL,
  `sumain_du` date NOT NULL,
  `year` year(4) NOT NULL,
  `id_grp` int(11) NOT NULL,
  `id_stg` bigint(11) NOT NULL,
  PRIMARY KEY (`id_abs`),
  KEY `id_stg` (`id_stg`),
  KEY `abs_grp` (`id_grp`),
  CONSTRAINT `abs_grp` FOREIGN KEY (`id_grp`) REFERENCES `groupe` (`id_grp`)
) ENGINE=InnoDB AUTO_INCREMENT=481 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `absence`
--

LOCK TABLES `absence` WRITE;
/*!40000 ALTER TABLE `absence` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `absence` VALUES (421,'Jabbari Karim  ','Lundi_8_10','lundi_matin_8_10_Jabbari_Karim_*_2023-04-03_12345','2023-04-03','2023',49,12345),(422,'Jabbari Karim  ','Lundi_10_12','lundi_matin_10_12_Jabbari_Karim_*_2023-04-03_12345','2023-04-03','2023',49,12345),(423,'Jabbari Karim  ','Mardi_2_4','mardi_après-midi_2_4_Jabbari_Karim_*_2023-04-03_12345','2023-04-03','2023',49,12345),(424,'Jabbari Karim  ','Mardi_4_6','mardi_après-midi_4_6_Jabbari_Karim_*_2023-04-03_12345','2023-04-03','2023',49,12345),(425,'Jabbari Karim  ','Mardi_8_10','mardi_matin_8_10_Jabbari_Karim_*_2023-04-24_12345','2023-04-24','2023',49,12345),(426,'Jabbari Karim  ','Mardi_10_12','mardi_matin_10_12_Jabbari_Karim_*_2023-04-24_12345','2023-04-24','2023',49,12345),(427,'Jabbari Karim  ','Mardi_2_4','mardi_après-midi_2_4_Jabbari_Karim_*_2023-04-24_12345','2023-04-24','2023',49,12345),(428,'Jabbari Karim  ','Mardi_4_6','mardi_après-midi_4_6_Jabbari_Karim_*_2023-04-24_12345','2023-04-24','2023',49,12345),(429,'Jabbari Karim  ','Lundi_8_10','lundi_matin_8_10_Jabbari_Karim_*_2023-04-10_12345','2023-04-10','2023',49,12345),(445,'Jabbari Karim  ','Lundi_10_12','lundi_matin_10_12_Jabbari_Karim_*_2023-04-10_12345','2023-04-10','2023',49,12345),(446,'Jabbari Karim  ','Lundi_2_4','lundi_après-midi_2_4_Jabbari_Karim_*_2023-04-10_12345','2023-04-10','2023',49,12345),(447,'Jabbari Karim  ','Lundi_4_6','lundi_après-midi_4_6_Jabbari_Karim_*_2023-04-10_12345','2023-04-10','2023',49,12345),(448,'Jabbari Karim  ','Mardi_8_10','mardi_matin_8_10_Jabbari_Karim_*_2023-04-10_12345','2023-04-10','2023',49,12345),(449,'Jabbari Karim  ','Mardi_8_10','mardi_matin_8_10_Jabbari_Karim_*_2023-03-06_12345','2023-03-06','2023',49,12345),(450,'Jabbari Karim  ','Mardi_10_12','mardi_matin_10_12_Jabbari_Karim_*_2023-03-06_12345','2023-03-06','2023',49,12345),(451,'Jabbari Karim  ','Mardi_2_4','mardi_après-midi_2_4_Jabbari_Karim_*_2023-03-06_12345','2023-03-06','2023',49,12345),(452,'Jabbari Karim  ','Mardi_4_6','mardi_après-midi_4_6_Jabbari_Karim_*_2023-03-06_12345','2023-03-06','2023',49,12345),(453,'Jabbari Karim  ','Lundi_2_4','lundi_après-midi_2_4_Jabbari_Karim_*_2023-01-16_12345','2023-01-16','2023',49,12345),(454,'Jabbari Karim  ','Lundi_4_6','lundi_après-midi_4_6_Jabbari_Karim_*_2023-01-16_12345','2023-01-16','2023',49,12345),(455,'Jabbari Karim  ','Lundi_8_10','lundi_matin_8_10_Jabbari_Karim_*_2023-05-01_12345','2023-05-01','2023',49,12345),(457,'Jabbari Karim  ','Lundi_10_12','lundi_matin_10_12_Jabbari_Karim_*_2023-05-01_12345','2023-05-01','2023',49,12345),(460,'Jabbari Karim  ','Mardi_10_12','mardi_matin_10_12_Jabbari_Karim_*_2023-04-03_12345','2023-04-03','2023',49,12345),(461,'Jabbari1 Karim1  ','Lundi_10_12','lundi_matin_10_12_Jabbari1_Karim1_*_2023-04-03_142345','2023-04-03','2023',49,142345),(462,'Djabir Fatima  ','Lundi_2_4','lundi_après-midi_2_4_Djabir_Fatima_*_2023-04-03_456789','2023-04-03','2023',49,456789),(463,'Abdelaziz Mohamed  ','Lundi_8_10','lundi_matin_8_10_Abdelaziz_Mohamed_*_2023-05-01_123456','2023-05-01','2023',49,123456),(464,'Abdelaziz Mohamed  ','Lundi_10_12','lundi_matin_10_12_Abdelaziz_Mohamed_*_2023-05-01_123456','2023-05-01','2023',49,123456),(465,'Abdelaziz Mohamed  ','Lundi_2_4','lundi_après-midi_2_4_Abdelaziz_Mohamed_*_2023-05-01_123456','2023-05-01','2023',49,123456),(466,'Abdelaziz Mohamed  ','Lundi_4_6','lundi_après-midi_4_6_Abdelaziz_Mohamed_*_2023-05-01_123456','2023-05-01','2023',49,123456),(467,'Abdelaziz Mohamed  ','Lundi_10_12','lundi_matin_10_12_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(468,'Abdelaziz Mohamed  ','Lundi_2_4','lundi_après-midi_2_4_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(469,'Abdelaziz Mohamed  ','Lundi_4_6','lundi_après-midi_4_6_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(470,'Abdelaziz Mohamed  ','Mardi_8_10','mardi_matin_8_10_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(471,'Abdelaziz Mohamed  ','Mercredi_8_10','mercredi_matin_8_10_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(472,'Abdelaziz Mohamed  ','Mercredi_10_12','mercredi_matin_10_12_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(473,'Abdelaziz Mohamed  ','Mercredi_2_4','mercredi_après-midi_2_4_Abdelaziz_Mohamed_*_2023-03-27_123456','2023-03-27','2023',49,123456),(474,'El-Amrani Sami  ','Lundi_8_10','lundi_matin_8_10_El-Amrani_Sami_*_2023-05-01_567890','2023-05-01','2023',49,567890),(475,'El-Amrani Sami  ','Lundi_10_12','lundi_matin_10_12_El-Amrani_Sami_*_2023-05-01_567890','2023-05-01','2023',49,567890);
/*!40000 ALTER TABLE `absence` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `absence` with 37 row(s)
--

--
-- Table structure for table `admins`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `isSuperAdmin` enum('1','0') DEFAULT '0',
  `DateCreation` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `admins` VALUES (1,'Oussama El Meriami','oussama@gmail.com','2dd6fa1cb7e91b3485a434b1b5a5850c','1','2023-03-29 12:33:03'),(12,'BIGs','zakibns5@gmail.com','9784ea3da268563469df99b2e6593564','0','2023-05-05 14:34:57');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `admins` with 2 row(s)
--

--
-- Table structure for table `filière`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `filière` (
  `id_fill` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_fill` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fill`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filière`
--

LOCK TABLES `filière` WRITE;
/*!40000 ALTER TABLE `filière` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `filière` VALUES (17,'Développement Informatique'),(18,'Gestion des Entreprises et des Administrations'),(19,'Réseaux Informatiques'),(20,'Moniteur Auto-Ecole '),(24,'Comptable d Entreprises '),(25,'Gestion des filiere'),(26,' Comptable d Entreprises ');
/*!40000 ALTER TABLE `filière` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `filière` with 7 row(s)
--

--
-- Table structure for table `groupe`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groupe` (
  `id_grp` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_grp` varchar(255) NOT NULL,
  `id_fill` int(11) NOT NULL,
  `anne` varchar(255) NOT NULL,
  PRIMARY KEY (`id_grp`),
  KEY `fk1` (`id_fill`),
  CONSTRAINT `fk1` FOREIGN KEY (`id_fill`) REFERENCES `filière` (`id_fill`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groupe`
--

LOCK TABLES `groupe` WRITE;
/*!40000 ALTER TABLE `groupe` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `groupe` VALUES (47,'DI101',17,'1'),(48,'DI201',17,'2'),(49,'DI202',17,'2'),(50,'DI203',17,'2'),(51,'GEA101',18,'1'),(52,'GEA102',18,'1'),(53,'GEA103',18,'1'),(54,'GEA201',18,'2'),(55,'RI101',19,'1'),(56,'RI201',19,'2'),(57,'RI202',19,'2'),(58,'RI203',19,'2'),(59,'MA101',20,'1'),(60,'MA102',20,'1'),(61,'MA201',20,'2'),(62,'MA202',20,'2'),(63,'MA203',20,'2'),(72,'CE101',24,'1'),(73,'CE102',24,'1'),(74,'CE103',24,'1'),(75,'CE104',24,'1'),(76,'GF101',25,'1'),(77,'GF102',25,'1'),(78,'GF103',25,'1'),(79,'GF201',25,'2'),(80,'GF202',25,'2'),(81,'GF203',25,'2'),(82,'CE101',26,'1'),(83,'CE102',26,'1'),(84,'CE103',26,'1'),(85,'CE201',26,'2');
/*!40000 ALTER TABLE `groupe` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `groupe` with 31 row(s)
--

--
-- Table structure for table `stagiaires`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stagiaires` (
  `id_etudiant` bigint(20) NOT NULL,
  `Matricule` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Prenom2` varchar(255) DEFAULT NULL,
  `DatedeNaissance` datetime DEFAULT NULL,
  `Actif` enum('oui','non') NOT NULL,
  `id_g` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_etudiant`),
  KEY `fk2` (`id_g`),
  CONSTRAINT `fk2` FOREIGN KEY (`id_g`) REFERENCES `groupe` (`id_grp`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stagiaires`
--

LOCK TABLES `stagiaires` WRITE;
/*!40000 ALTER TABLE `stagiaires` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `stagiaires` VALUES (12345,20111521,'Jabbari','Karim','','2007-06-14 00:00:00','oui',49,'12345','12345'),(123456,20111512,'Abdelaziz','Mohamed','','2000-06-14 00:00:00','oui',49,'123456','123456'),(142345,201115121,'Jabbari1','Karim1','','2007-06-14 00:00:00','oui',49,'142345','142345'),(456789,20111515,'Djabir','Fatima','','2001-06-14 00:00:00','oui',49,'456789','456789'),(567890,20111516,'El Amrani','Sami','','2002-06-14 00:00:00','oui',49,'567890','567890'),(678901,20111517,'Fathi','Amine','','2003-06-14 00:00:00','oui',49,'678901','678901'),(789012,20111518,'Gharbi','Safia','','2004-06-14 00:00:00','non',49,'789012','789012'),(890123,20111519,'Hamdi','Ali','','2005-06-14 00:00:00','oui',49,'890123','890123'),(901234,20111520,'Idrissi','Salma','','2006-06-14 00:00:00','oui',49,'901234','901234'),(1231456,20111513,'Ben Youssef','Yasmina','','2000-06-14 00:00:00','non',49,'1231456','1231456'),(2314567,20111514,'Chakir','Nour','','2000-06-14 00:00:00','oui',49,'2314567','2314567');
/*!40000 ALTER TABLE `stagiaires` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `stagiaires` with 11 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET AUTOCOMMIT=@OLD_AUTOCOMMIT */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Fri, 12 May 2023 22:49:46 +0200
