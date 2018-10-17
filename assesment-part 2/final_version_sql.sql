CREATE DATABASE  IF NOT EXISTS `assignment` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `assignment`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: assignment
-- ------------------------------------------------------
-- Server version	5.7.22-log

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `locationName` varchar(145) DEFAULT NULL,
  `address` varchar(145) DEFAULT NULL,
  `suburb` varchar(145) DEFAULT NULL,
  `postcode` int(4) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  PRIMARY KEY (`itemID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'7th Brigade Park, Chermside','Delaware Street','Chermside',4032,-27.378930,153.044610),(2,'Annerley Library Wifi','450 Ipswich Road','Annerley',4103,-27.509423,153.033322),(3,'Ashgrove Library Wifi','87 Amarina Avenue','Ashgrove',4060,-27.443946,152.987098),(4,'Banyo Library Wifi','284 St Vincents Road','Banyo',4014,-27.373966,153.078323),(5,'Booker Place Park','Birkin Road & Sugarwood Street','Bellbowrie',4070,-27.563530,152.893720),(6,'Bracken Ridge Library Wifi','Corner Bracken and Barrett Street','Bracken Ridge',4017,-27.317973,153.037874),(7,'Brisbane Botanic Gardens','Mt Coot-tha Road','Toowong',4066,-27.477240,152.975990),(8,'Brisbane Square Library Wifi','Brisbane Square, 266 George Street','Brisbane',4000,-27.470912,153.022460),(9,'Bulimba Library Wifi','Corner Riding Road & Oxford Street','Bulimba',4171,-27.452031,153.062824),(10,'Calamvale District Park','Formby & Ormskirk Streets','Calamvale',4116,-27.621520,153.036650),(11,'Carina Library Wifi','Corner Mayfield Road & Nyrang Street','Carina',4152,-27.491693,153.091213),(12,'Carindale Library Wifi','The Home and Leisure Centre, Corner Carindale Street & Banchory Court, Westfield Carindale Shopping Centre','Carindale',4152,-27.504759,153.100397),(13,'Carindale Recreation Reserve','Cadogan and Bedivere Streets','Carindale',4152,-27.497000,153.111050),(14,'Chermside Library Wifi','375 Hamilton Road','Chermside',4032,-27.385603,153.034903),(15,'City Botanic Gardens Wifi','Alice Street','Brisbane City',4000,-27.475610,153.030050),(16,'Coopers Plains Library Wifi','107 Orange Grove Road','Coopers Plains',4108,-27.565105,153.040318),(17,'Corinda Library Wifi','641 Oxley Road','Corinda',4075,-27.538802,152.980909),(18,'D.M. Henderson Park','Granadilla Street','MacGregor',4109,-27.577450,153.076030),(19,'Einbunpin Lagoon','Brighton Road','Sandgate',4017,-27.319470,153.068220),(20,'Everton Park Library Wifi','561 South Pine Road','Everton park',4053,-27.405334,152.990421),(21,'Fairfield Library Wifi','Fairfield Gardens Shopping Centre, 180 Fairfield Road','Fairfield',4103,-27.509090,153.025971),(22,'Forest Lake Parklands','Forest Lake Boulevard','Forest Lake',4078,-27.620200,152.966250),(23,'Garden City Library Wifi','Garden City Shopping Centre, Corner Logan and Kessels Road','Upper Mount Gravatt',4122,-27.562442,153.080918),(24,'Glindemann Park','Logan Road','Holland Park West',4121,-27.525520,153.069230),(25,'Grange Library Wifi','79 Evelyn Street','Grange',4051,-27.425312,153.017473),(26,'Gregory Park','Baroona Road','Paddington',4064,-27.467000,152.999810),(27,'Guyatt Park','Sir Fred Schonell Drive','St Lucia',4067,-27.492970,153.001870),(28,'Hamilton Library Wifi','Corner Racecourt Road and Rossiter Parade','Hamilton',4007,-27.437901,153.064223),(29,'Hidden World Park','Roghan Road','Fitzgibbon',4018,-27.339717,153.034981),(30,'Holland Park Library Wifi','81 Seville Road','Holland Park',4121,-27.522923,153.072292),(31,'Inala Library Wifi','Inala Shopping centre, Corsair Ave','Inala',4077,-27.598286,152.973522),(32,'Indooroopilly Library Wifi','Indrooroopilly Shopping centre, Level 4, 322 Moggill Road','Indooroopilly',4068,-27.497643,152.973647),(33,'Kalinga Park','Kalinga St','Clayfield',4011,-27.406660,153.052170),(34,'Kenmore Library Wifi','Kenmore Village Shopping Centre, Brookfield Road','Kenmore',4069,-27.505929,152.938644),(35,'King Edward Park (Jacob\'s Ladder)','Turbot Street and Wickham Terrace','Brisbane City',4000,-27.465890,153.024060),(36,'King George Square','Ann & Adelaide Streets','Brisbane City',4000,-27.468430,153.024220),(37,'Mitchelton Library Wifi','37 Helipolis Parada','Mitchelton',4053,-27.417042,152.978340),(38,'Mt Coot-tha Botanic Gardens Library Wifi','Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road','Toowong',4066,-27.475299,152.976041),(39,'Mt Gravatt Library Wifi','8 Creek Road','Mt Gravatt',4122,-27.538555,153.080263),(40,'Mt Ommaney Library Wifi','Mt Ommaney Shopping Centre, 171 Dandenong Road','Mt Ommaney',4074,-27.548242,152.937810),(41,'New Farm Library Wifi','135 Sydney Street','New Farm',4005,-27.467366,153.049584),(42,'New Farm Park Wifi','Brunswick Street','New Farm',4005,-27.470460,153.052230),(43,'Nundah Library Wifi','1 Bage Street','Nundah',4012,-27.401259,153.058375),(44,'Oriel Park','Corner of Alexandra & Lancaster Roads','Ascot',4007,-27.429280,153.057680),(45,'Orleigh Park','Hill End Terrace','West End',4101,-27.489950,153.003260),(46,'Post Office Square','Queen & Adelaide Streets','Brisbane City',4000,-27.467350,153.027350),(47,'Rocks Riverside Park','Counihan Road','Seventeen Mile Rocks',4073,-27.541530,152.959130),(48,'Sandgate Library Wifi','Seymour Street','Sandgate',4017,-27.320605,153.070493),(49,'Stones Corner Library Wifi','280 Logan Road','Stones Corner',4120,-27.498036,153.043655),(50,'Sunnybank Hills Library Wifi','Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads','Sunnybank Hills',4109,-27.610925,153.055071),(51,'Teralba Park','Pullen & Osborne Roads','Everton Park',4053,-27.402860,152.980590),(52,'Toowong Library Wifi','Toowon Village Shopping Centre, Sherwood Road','Toowong',4066,-27.485051,152.992509),(53,'West End Library Wifi','178 - 180 Boundary Street','West End',4101,-27.482451,153.012076),(54,'Wynnum Library Wifi','Wynnum Civic Centre, 66 Bay Terrace','Wynnum',4178,-27.442449,153.173197),(55,'Zillmere Library Wifi','Corner Jennings Street and Zillmere Road','Zillmere',4034,-27.360142,153.040790);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(145) NOT NULL,
  `email` varchar(145) NOT NULL,
  `phonenumber` int(10) NOT NULL,
  `dateofbirth` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (8,'vaibhav_test','vaibhav_dd@connect.qut.edu.au',401850202,'15/04/1994','$2y$10$uCfO16xJ8Wmv7crkbG9bqe5CnUMAdRN1sxL.HY5wQ9o2nroQim76S'),(9,'testing','testing@connect.qut.edu.au',407040303,'15/08/1998','$2y$10$DAcn08lDZb91Gsc1nD0uN.wtMm2nDJs8zCAjtbHgiJpJsVloQ8CYe'),(10,'test02','vaitest@connect.qut.edu.au',405850204,'15/08/1998','$2y$10$WsGo1QGehit9Y1Sq0vbCdeEgKS511Tg21yiP5LO6C8W7iDp1VQ.y6');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `rating` decimal(10,2) DEFAULT NULL,
  `reviewText` varchar(280) DEFAULT NULL,
  `itemID` int(11) DEFAULT NULL,
  PRIMARY KEY (`reviewID`),
  KEY `itemID_idx` (`itemID`),
  KEY `userID_idx` (`userID`),
  CONSTRAINT `itemID` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemID`),
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `members` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-27 14:13:14
