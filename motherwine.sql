CREATE DATABASE  IF NOT EXISTS `motherwine` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `motherwine`;
-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: motherwine
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.39-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `grade`
--

DROP TABLE IF EXISTS `grade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grade`
--

LOCK TABLES `grade` WRITE;
/*!40000 ALTER TABLE `grade` DISABLE KEYS */;
INSERT INTO `grade` VALUES (0,'Com vinagre tinha sido melhor!'),(1,'Ó mãe! Que mal foi que eu te fiz?'),(2,'Mais valia não ter aberto a garrafa!'),(3,'Assim, assim…'),(4,'A mãe nunca se engana!'),(5,'És a melhor mãe do mundo!');
/*!40000 ALTER TABLE `grade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gv`
--

DROP TABLE IF EXISTS `gv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `gv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gv_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gv`
--

LOCK TABLES `gv` WRITE;
/*!40000 ALTER TABLE `gv` DISABLE KEYS */;
INSERT INTO `gv` VALUES (1,'Arinto dos Açores'),(2,'Terrantez do Pico'),(3,'Verdelho'),(4,'Aragonez'),(5,'Trincadeira'),(6,'Alicante Bouschet'),(7,'Cabernet Sauvignon'),(8,'Syrah'),(9,'Touriga Nacional'),(10,'Castelão'),(11,'Chardonnay'),(12,'Arinto'),(13,'Viogner'),(14,'Tinta Roriz'),(15,'Touriga Franca'),(16,'Tinta Barroca'),(17,'Trajadura'),(18,'Loureiro'),(19,'Azal'),(20,'Alvarinho'),(21,'Pedernã'),(22,'Tinto Cão'),(23,'Viosinho'),(24,'Malvasia Fina'),(25,'Códega'),(26,'Rabigato'),(27,'Moscatel'),(28,'Gouveio'),(29,'Baga'),(30,'Maria Gomes'),(31,'Tinta Amarela');
/*!40000 ALTER TABLE `gv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pairing`
--

DROP TABLE IF EXISTS `pairing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pairing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_id` int(11) NOT NULL,
  `wine_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `wine_id` (`wine_id`),
  CONSTRAINT `pairing_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`),
  CONSTRAINT `pairing_ibfk_2` FOREIGN KEY (`wine_id`) REFERENCES `wine` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pairing`
--

LOCK TABLES `pairing` WRITE;
/*!40000 ALTER TABLE `pairing` DISABLE KEYS */;
INSERT INTO `pairing` VALUES (1,1,1),(2,2,2),(3,3,5),(4,2,3),(5,7,5),(6,4,4),(7,7,4),(8,1,6),(9,7,8),(10,7,7),(12,21,1),(13,10,1),(14,6,1),(15,8,7),(16,8,5),(17,17,9),(18,11,9),(19,8,10),(20,4,10),(21,14,10),(22,15,10),(23,21,11),(24,10,11),(25,6,11),(26,14,12),(27,33,12),(28,1,13),(29,23,13),(30,21,13),(31,8,14),(32,14,14),(33,42,14),(34,2,15),(37,21,17),(38,23,17),(39,22,18),(40,9,19),(41,33,19),(42,15,20),(43,1,20),(44,23,20),(45,7,22),(46,33,22),(47,1,23),(48,21,23),(49,31,23),(50,43,23),(51,45,10),(52,45,5),(53,45,14),(54,46,10),(55,46,8),(56,18,24),(57,21,20);
/*!40000 ALTER TABLE `pairing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producer`
--

DROP TABLE IF EXISTS `producer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `producer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producer_name` varchar(255) DEFAULT NULL,
  `producer_shortname` varchar(100) DEFAULT NULL,
  `post_code` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(100) DEFAULT NULL,
  `latitude` varchar(100) DEFAULT NULL,
  `longitude` varchar(100) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`),
  CONSTRAINT `producer_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producer`
--

LOCK TABLES `producer` WRITE;
/*!40000 ALTER TABLE `producer` DISABLE KEYS */;
INSERT INTO `producer` VALUES (1,'Cooperativa Vitivinicola da Ilha do Pico','PicoWines','9950-302','Madalena do Pico','https://www.picowines.net','geral@picowines.com','292622262','38.531123','-28.532924',1),(2,'Adega da Cartuxa','Cartuxa','7005-003','Évora','https://www.cartuxa.pt/','geral@fea.pt','266748300','38.586305','-7.917642',2),(3,'Sogrape Vinhos SA','Sogrape','4430-809','Avintes','https://www.sograpevinhos.com/',NULL,'227838104','41.091811','-8.536433',10),(4,'Casa Ermelinda Freitas','Ermelinda Freitas','2965-595','Águas de Moura','http://www.ermelindafreitas.pt/','geral@ermelindafreitas.pt','265988000','38.635599','-8.694470',9),(5,'Adega Cooperativa de Redondo','Adega de Redondo','7170-999','Redondo','http://acr.com.pt','geral@acr.com.pt','266989100',' 38.643506','-7.555319',2),(6,'Casa Santos Lima','Casa Santos Lima','2580-081','Alenquer','https://www.casasantoslima.com/','geral@casasantoslima.com','263760621','39.070189','-9.118028',7),(7,'Bacalhôa Vinhos de Portugal','Bacalhôa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,9),(8,'Herdade do Esporão','Esporão',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),(9,'Quinta da Aveleda','Aveleda',NULL,NULL,NULL,NULL,NULL,NULL,NULL,14),(10,'Parras Wines','Parras Wines',NULL,NULL,NULL,NULL,NULL,NULL,NULL,7),(11,'Adega de Monção','Adega de Monção',NULL,NULL,NULL,NULL,NULL,NULL,NULL,14),(12,'Sociedade Agrícola da Herdade das Mouras de Arraiolos','Herdade das Mouras',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),(13,'Monte da Ravasqueira','Ravasqueira',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),(14,'Adega Cooperativa da Vidigueira, Cuba e Alvito','Cooperativa da Vidigueira, Cuba e Alvito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),(15,'Adega Vila Real','Adega Vila Real',NULL,NULL,NULL,NULL,NULL,NULL,NULL,10),(16,'Cooperativa Agrícola de Reguengos de Monsaraz','CARMIM',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2),(17,'Quinta da Mata da Fidalga','QMF',NULL,NULL,NULL,NULL,NULL,NULL,NULL,4);
/*!40000 ALTER TABLE `producer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pairing_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pairing_id` (`pairing_id`),
  KEY `grade_id` (`grade_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`pairing_id`) REFERENCES `pairing` (`id`),
  CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`id`),
  CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rating`
--

LOCK TABLES `rating` WRITE;
/*!40000 ALTER TABLE `rating` DISABLE KEYS */;
INSERT INTO `rating` VALUES (1,1,5,2),(2,2,5,2),(3,1,2,3),(5,3,5,3),(7,4,2,2),(8,4,3,3),(9,5,5,3),(10,5,1,2),(11,6,2,3),(12,6,3,2),(13,7,5,3),(15,8,5,3),(17,9,5,2),(19,3,3,1),(25,4,3,1),(27,2,2,1),(31,1,3,1),(41,12,3,1),(42,10,4,1),(43,15,4,1),(44,33,3,1),(45,25,4,1),(46,23,4,1),(47,24,3,1),(48,55,4,1),(49,49,4,1),(50,50,3,1),(51,48,4,1),(52,47,4,1),(53,16,3,1),(54,52,4,1),(55,14,3,1),(56,13,4,1),(57,38,3,1),(58,37,4,1),(59,18,3,1),(60,17,3,1),(61,19,4,1),(62,51,4,1),(63,54,3,1),(64,21,3,1),(65,22,2,1),(66,20,3,1),(67,26,3,1),(68,27,3,1),(69,29,3,1),(70,28,3,1),(71,30,4,1),(72,32,4,1),(73,31,4,1),(74,53,4,1),(75,56,5,1),(76,45,4,1),(77,46,4,1),(78,34,4,1),(79,39,4,1),(80,40,4,1),(81,41,3,1),(82,12,4,3),(83,48,3,3),(84,23,2,3),(85,12,1,2),(86,37,5,2),(87,38,2,2),(88,30,3,2),(89,29,4,2),(90,28,2,2),(91,25,3,2),(92,23,4,2),(93,24,3,2),(94,55,2,2),(95,54,5,2),(96,51,3,2),(97,19,4,2),(98,20,1,2),(99,21,4,2),(100,22,3,2),(101,12,3,4),(102,14,4,4),(103,1,4,4),(104,13,2,4),(105,37,4,4),(106,38,3,4),(107,47,4,4),(108,49,2,4),(109,48,4,4),(110,50,2,4),(111,29,3,4),(112,30,2,4),(113,28,2,4),(114,4,4,4),(115,2,4,4),(116,25,4,4),(117,23,4,4),(118,24,3,4),(119,9,4,4),(120,55,4,4),(121,52,4,4),(122,3,3,4),(123,5,4,4),(124,16,4,4),(125,19,4,4),(126,54,4,4),(127,51,4,4),(128,21,3,4),(129,22,3,4),(130,20,3,4),(131,44,4,4),(132,42,3,4),(133,39,3,4),(134,40,4,4),(135,41,4,4),(136,12,4,5),(137,37,4,5),(138,48,3,5),(139,23,3,5),(140,30,3,5),(141,43,4,5),(142,12,4,6),(143,37,4,6),(144,48,4,6),(145,23,3,6),(146,30,3,6);
/*!40000 ALTER TABLE `rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `recipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipe_name` varchar(255) DEFAULT NULL,
  `recipe_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (1,'Bife de atum grelhado','upload/atum_grelhado.jpg'),(2,'Ensopado de borrego','upload/ensopado_borrego.jpg'),(3,'Bacalhau com natas','upload/bacalhau_com_natas.jpg'),(4,'Cozido à portuguesa','upload/cozido_a_portuguesa.jpg'),(5,'Polvo à lagareiro','upload/polvo_a_lagareiro.jpg'),(6,'Choco frito à moda de Setúbal','upload/choco_frito_setubal.jpg'),(7,'Queijo de São Jorge - 7 meses','upload/queijo_sao_jorge_6_meses.jpg'),(8,'Carne de porco à alentejana','upload/carne_porco_alentejana.jpg'),(9,'Feijoada à transmontana','upload/Feijoada à transmontana.jpg'),(10,'Choquinhos à algarvia','upload/Choquinhos à algarvia.jpg'),(11,'Bacalhau à Gomes de Sá','upload/Bacalhau à Gomes de Sá.jpg'),(12,'Caldeirada de bacalhau','upload/Caldeirada de bacalhau.jpg'),(13,'Açorda de camarão','upload/Açorda de camarão.jpg'),(14,'Rojões de porco','upload/Rojões de porco.jpg'),(15,'Arroz de pato','upload/Arroz de pato.jpg'),(17,'Bacalhau à Brás','upload/Bacalhau à Brás.jpg'),(18,'Leitão à Bairrada','upload/Leitão à Bairrada.jpg'),(19,'Polvo guisado à moda do Pico','upload/Polvo guisado à moda do Pico.jpg'),(20,'Caldeirada de peixe','upload/Caldeirada de peixe.jpg'),(21,'Ameijoas à Bulhão Pato','upload/Ameijoas à bulhão pato.jpg'),(22,'Queijo da Serra','upload/Queijo da Serra.jpg'),(23,'Sardinhas assadas','upload/Sardinhas assadas.jpg'),(31,'Arroz de marisco','upload/Arroz de marisco.jpg'),(33,'Alheira assada','upload/Alheira assada.jpg'),(42,'Bife da vazia em molho de pimenta','upload/Bife da vazia em molho de pimenta.jpg'),(43,'Lasanha de legumes','upload/Lasanha de legumes.jpg'),(44,'Coelho à caçador','upload/Coelho à caçador.jpg'),(45,'Secretos de porco preto grelhados','upload/Secretos de porco preto grelhados.jpg'),(46,'Bitoque de vaca','upload/bitoquevaca.jpg');
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'Açores'),(2,'Alentejo'),(3,'Algarve'),(4,'Bairrada'),(5,'Beira Interior'),(6,'Dão'),(7,'Lisboa'),(8,'Madeira'),(9,'Península de Setúbal'),(10,'Porto e Douro'),(11,'Távora e Varosa'),(12,'Tejo'),(13,'Trás-os-Montes'),(14,'Vinho Verde');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `date_birth` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `usertype_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype_id` (`usertype_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `usertype` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin','admin@motherwine.pt',NULL,NULL,NULL,NULL,NULL,1),(2,'RicardoR','ricardor','utilizador1@utilizador.pt','Utilizador','1','Male','01/01/1990','Evora',2),(3,'AndreiaC','andreiac','utilizador2@utilizador.pt','Utilizador','2','Female','01/01/1991','Evora',2),(4,'LuisR','luisr','comercial1@comercial1.pt','Comercial','1',NULL,NULL,'Evora',3),(5,'JoaquimR','joaquimr','joaquim@gmail.com',NULL,NULL,NULL,NULL,NULL,2),(6,'MariaR','mariar','maria@gmail.com',NULL,NULL,NULL,NULL,NULL,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usertype` (
  `id` int(11) NOT NULL,
  `usertype_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usertype`
--

LOCK TABLES `usertype` WRITE;
/*!40000 ALTER TABLE `usertype` DISABLE KEYS */;
INSERT INTO `usertype` VALUES (1,'Admin'),(2,'NC_User'),(3,'C_Client');
/*!40000 ALTER TABLE `usertype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wine`
--

DROP TABLE IF EXISTS `wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `wine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wine_name` varchar(100) DEFAULT NULL,
  `wine_year` varchar(100) DEFAULT NULL,
  `alcohol` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `wine_img` varchar(255) DEFAULT NULL,
  `wine_img_big` varchar(255) DEFAULT NULL,
  `winetype_id` int(11) DEFAULT NULL,
  `producer_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `sponsored` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`),
  KEY `winetype_id` (`winetype_id`),
  KEY `producer_id` (`producer_id`),
  CONSTRAINT `wine_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  CONSTRAINT `wine_ibfk_2` FOREIGN KEY (`winetype_id`) REFERENCES `winetype` (`id`),
  CONSTRAINT `wine_ibfk_3` FOREIGN KEY (`producer_id`) REFERENCES `producer` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine`
--

LOCK TABLES `wine` WRITE;
/*!40000 ALTER TABLE `wine` DISABLE KEYS */;
INSERT INTO `wine` VALUES (1,'Frei Gigante','2018','13%',NULL,'upload/freigigante.png','upload/freigigante_big.jpg',2,1,1,1),(2,'Cartuxa Reserva','2014','15%',NULL,'upload/cartuxatintoreserva.png','upload/cartuxatintoreserva_big.jpg',1,2,2,0),(3,'AR Triplo','2015','15%',NULL,'upload/artriplo.png','upload/artriplo_big.jpg',1,5,2,0),(4,'Porta da Ravessa Reserva','2017','14.3%',NULL,'upload/portaravessareserva.png','upload/portaravessareserva_big.jpg',1,5,2,1),(5,'Dona Ermelinda','2017','14%',NULL,'upload/ermelindatinto.png','upload/ermelindatinto_big.jpg',1,4,9,0),(6,'Dona Ermelinda Reserva','2018','13.5%',NULL,'upload/ermelindareserva.png','upload/ermelindareserva_big.jpg',2,4,9,1),(7,'Papa Figos','2018','13%',NULL,'upload/papafigos.png','upload/papafigos_big.jpg',1,3,10,1),(8,'Colossal Reserva','2015','14.5%',NULL,'upload/colossal.png','upload/colossal_big.jpg',1,6,7,0),(9,'JP Azeitão','2018','13%','2.99','upload/jp_azeitao.png','upload/jp_azeitao_big.jpg',1,7,9,0),(10,'Monte Velho','2018','13%','4.49','upload/montevelho_tinto.png','upload/montevelho_tinto_big.jpg',1,8,2,0),(11,'Casal Garcia','2018','9.5%','4.49','upload/casalgarcia.png','upload/casalgarcia_big.jpg',2,9,14,0),(12,'Mula Velha Reserva','2018','13.5%','5.49','upload/mulavelha_reserva.png','upload/mulavelha_reserva_big.jpg',1,10,7,0),(13,'Muralhas de Monção','2018','12.5%','3.99','upload/muralhasmoncao.png','upload/muralhasmoncao_big.jpg',2,11,14,0),(14,'Pêra Doce Reserva','2015','13.5%','7.99','upload/peradoce_reserva.png','upload/peradoce_reserva_big.jpg',1,10,2,0),(15,'Tapada das Lebres Premium','2018','14%','6.99','upload/tapadadaslebres.png','upload/tapadadaslebres_big.jpg',1,12,2,0),(17,'Gazela','2017','9%','3.99','upload/gazela.png','upload/gazela_big.jpg',2,3,14,0),(18,'Vidigueira Alicante Bouschet','2015','14.5%','7.29','upload/vidigueiraalicantebouschet.png','upload/vidigueiraalicantebouschet_big.jpg',1,14,2,1),(19,'Vila Real Grande Reserva','2016','14%','6.45','upload/vilarealgrandereserva.png','upload/vilarealgrandereserva_big.jpg',1,15,10,0),(20,'Planalto Reserva','2018','12.5%','5.99','upload/planalto_branco.png','upload/planalto_branco_big.jpg',2,3,10,0),(21,'Esteva','2018','13%','4.20','upload/esteva.png','upload/esteva_big.jpg',1,3,10,0),(22,'Reguengos','2017','14.5%','2.50','upload/reguengos.png','upload/reguengos_big.jpg',1,16,2,0),(23,'Defesa','2017','13.5%','5.99','upload/defesa_rose.png','upload/defesa_rose_big.jpg',3,8,2,0),(24,'qmf Branco Bruto','2014','12.4%','5.90','upload/qmfbruto.png','upload/qmfbruto_big.jpg',5,17,4,1),(25,'Offley Tawny','N/A','19.5%','6.00','upload/offleytawny.png','upload/offleytawny_big.jpg',5,3,10,0),(26,'Coutada Velha','2017','13.1%','7.99','upload/coutadavelha.png','upload/coutadavelha_big.jpg',1,13,2,0);
/*!40000 ALTER TABLE `wine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `winegv`
--

DROP TABLE IF EXISTS `winegv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `winegv` (
  `wine_id` int(11) DEFAULT NULL,
  `gv_id` int(11) DEFAULT NULL,
  KEY `wine_id` (`wine_id`),
  KEY `gv_id` (`gv_id`),
  CONSTRAINT `winegv_ibfk_1` FOREIGN KEY (`wine_id`) REFERENCES `wine` (`id`),
  CONSTRAINT `winegv_ibfk_2` FOREIGN KEY (`gv_id`) REFERENCES `gv` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `winegv`
--

LOCK TABLES `winegv` WRITE;
/*!40000 ALTER TABLE `winegv` DISABLE KEYS */;
INSERT INTO `winegv` VALUES (1,1),(1,2),(1,3),(2,4),(2,5),(2,6),(3,7),(3,8),(3,9),(4,6),(4,8),(4,9),(5,10),(5,7),(5,9),(6,11),(6,12),(6,13),(7,14),(7,15),(7,16),(7,9),(7,6),(8,8),(8,9),(8,6),(8,14),(9,8),(9,10),(9,4),(10,9),(10,8),(10,4),(10,5),(11,19),(11,12),(11,17),(11,18),(12,8),(12,14),(12,9),(13,20),(13,17),(14,5),(14,4),(14,8),(15,8),(15,4),(15,6),(15,7),(17,18),(17,21),(17,17),(17,19),(18,6),(19,16),(19,14),(19,22),(19,15),(19,9),(19,16),(19,14),(19,22),(19,15),(19,9),(20,23),(20,24),(20,28),(20,12),(20,25),(20,26),(20,27),(21,14),(21,16),(21,15),(21,9),(22,5),(22,4),(22,10),(23,4),(23,8),(24,30),(24,11),(24,29),(24,12),(25,15),(25,14),(25,31),(25,16),(25,22),(26,4),(26,5),(26,8),(26,7);
/*!40000 ALTER TABLE `winegv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `winetype`
--

DROP TABLE IF EXISTS `winetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `winetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `winetype_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `winetype`
--

LOCK TABLES `winetype` WRITE;
/*!40000 ALTER TABLE `winetype` DISABLE KEYS */;
INSERT INTO `winetype` VALUES (1,'Tinto'),(2,'Branco'),(3,'Rosé'),(5,'Outros');
/*!40000 ALTER TABLE `winetype` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-27 16:43:35
