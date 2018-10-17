CREATE DATABASE  IF NOT EXISTS `assignment` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `assignment`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: assignment
-- ------------------------------------------------------
-- Server version	8.0.11

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
INSERT INTO `items` VALUES (1,'7th Brigade Park, Chermside','Delaware Street','Chermside',4032,-27.378930,153.044610),(2,'Annerley Library Wifi','450 Ipswich Road','Annerley',4103,-27.509423,153.033322),(3,'Ashgrove Library Wifi','87 Amarina Avenue','Ashgrove',4060,-27.443946,152.987098),(4,'Banyo Library Wifi','284 St Vincents Road','Banyo',4014,-27.373966,153.078323),(5,'Booker Place Park','Birkin Road & Sugarwood Street','Bellbowrie',4070,-27.563530,152.893720),(6,'Bracken Ridge Library Wifi','Corner Bracken and Barrett Street','Bracken Ridge',4017,-27.317973,153.037874),(7,'Brisbane Botanic Gardens','Mt Coot-tha Road','Toowong',4066,-27.477240,152.975990),(8,'Brisbane Square Library Wifi','Brisbane Square, 266 George Street','Brisbane City',4000,-27.470912,153.022460),(9,'Bulimba Library Wifi','Corner Riding Road & Oxford Street','Bulimba',4171,-27.452031,153.062824),(10,'Calamvale District Park','Formby & Ormskirk Streets','Calamvale',4116,-27.621520,153.036650),(11,'Carina Library Wifi','Corner Mayfield Road & Nyrang Street','Carina',4152,-27.491693,153.091213),(12,'Carindale Library Wifi','The Home and Leisure Centre, Corner Carindale Street & Banchory Court, Westfield Carindale Shopping Centre','Carindale',4152,-27.504759,153.100397),(13,'Carindale Recreation Reserve','Cadogan and Bedivere Streets','Carindale',4152,-27.497000,153.111050),(14,'Chermside Library Wifi','375 Hamilton Road','Chermside',4032,-27.385603,153.034903),(15,'City Botanic Gardens Wifi','Alice Street','Brisbane City',4000,-27.475610,153.030050),(16,'Coopers Plains Library Wifi','107 Orange Grove Road','Coopers Plains',4108,-27.565105,153.040318),(17,'Corinda Library Wifi','641 Oxley Road','Corinda',4075,-27.538802,152.980909),(18,'D.M. Henderson Park','Granadilla Street','MacGregor',4109,-27.577450,153.076030),(19,'Einbunpin Lagoon','Brighton Road','Sandgate',4017,-27.319470,153.068220),(20,'Everton Park Library Wifi','561 South Pine Road','Everton park',4053,-27.405334,152.990421),(21,'Fairfield Library Wifi','Fairfield Gardens Shopping Centre, 180 Fairfield Road','Fairfield',4103,-27.509090,153.025971),(22,'Forest Lake Parklands','Forest Lake Boulevard','Forest Lake',4078,-27.620200,152.966250),(23,'Garden City Library Wifi','Garden City Shopping Centre, Corner Logan and Kessels Road','Upper Mount Gravatt',4122,-27.562442,153.080918),(24,'Glindemann Park','Logan Road','Holland Park West',4121,-27.525520,153.069230),(25,'Grange Library Wifi','79 Evelyn Street','Grange',4051,-27.425312,153.017473),(26,'Gregory Park','Baroona Road','Paddington',4064,-27.467000,152.999810),(27,'Guyatt Park','Sir Fred Schonell Drive','St Lucia',4067,-27.492970,153.001870),(28,'Hamilton Library Wifi','Corner Racecourt Road and Rossiter Parade','Hamilton',4007,-27.437901,153.064223),(29,'Hidden World Park','Roghan Road','Fitzgibbon',4018,-27.339717,153.034981),(30,'Holland Park Library Wifi','81 Seville Road','Holland Park',4121,-27.522923,153.072292),(31,'Inala Library Wifi','Inala Shopping centre, Corsair Ave','Inala',4077,-27.598286,152.973522),(32,'Indooroopilly Library Wifi','Indrooroopilly Shopping centre, Level 4, 322 Moggill Road','Indooroopilly',4068,-27.497643,152.973647),(33,'Kalinga Park','Kalinga St','Clayfield',4011,-27.406660,153.052170),(34,'Kenmore Library Wifi','Kenmore Village Shopping Centre, Brookfield Road','Kenmore',4069,-27.505929,152.938644),(35,'King Edward Park (Jacob\'s Ladder)','Turbot Street and Wickham Terrace','Brisbane City',4000,-27.465890,153.024060),(36,'King George Square','Ann & Adelaide Streets','Brisbane City',4000,-27.468430,153.024220),(37,'Mitchelton Library Wifi','37 Helipolis Parada','Mitchelton',4053,-27.417042,152.978340),(38,'Mt Coot-tha Botanic Gardens Library Wifi','Administration Building, Brisbane Botanic Gardens (Mt Coot-tha), Mt Coot-tha Road','Toowong',4066,-27.475299,152.976041),(39,'Mt Gravatt Library Wifi','8 Creek Road','Mt Gravatt',4122,-27.538555,153.080263),(40,'Mt Ommaney Library Wifi','Mt Ommaney Shopping Centre, 171 Dandenong Road','Mt Ommaney',4074,-27.548242,152.937810),(41,'New Farm Library Wifi','135 Sydney Street','New Farm',4005,-27.467366,153.049584),(42,'New Farm Park Wifi','Brunswick Street','New Farm',4005,-27.470460,153.052230),(43,'Nundah Library Wifi','1 Bage Street','Nundah',4012,-27.401259,153.058375),(44,'Oriel Park','Corner of Alexandra & Lancaster Roads','Ascot',4007,-27.429280,153.057680),(45,'Orleigh Park','Hill End Terrace','West End',4101,-27.489950,153.003260),(46,'Post Office Square','Queen & Adelaide Streets','Brisbane City',4000,-27.467350,153.027350),(47,'Rocks Riverside Park','Counihan Road','Seventeen Mile Rocks',4073,-27.541530,152.959130),(48,'Sandgate Library Wifi','Seymour Street','Sandgate',4017,-27.320605,153.070493),(49,'Stones Corner Library Wifi','280 Logan Road','Stones Corner',4120,-27.498036,153.043655),(50,'Sunnybank Hills Library Wifi','Sunnybank Hills Shopping Centre, Corner Compton and Calam Roads','Sunnybank Hills',4109,-27.610925,153.055071),(51,'Teralba Park','Pullen & Osborne Roads','Everton Park',4053,-27.402860,152.980590),(52,'Toowong Library Wifi','Toowon Village Shopping Centre, Sherwood Road','Toowong',4066,-27.485051,152.992509),(53,'West End Library Wifi','178 - 180 Boundary Street','West End',4101,-27.482451,153.012076),(54,'Wynnum Library Wifi','Wynnum Civic Centre, 66 Bay Terrace','Wynnum',4178,-27.442449,153.173197),(55,'Zillmere Library Wifi','Corner Jennings Street and Zillmere Road','Zillmere',4034,-27.360142,153.040790);
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,'Kristian','test@test.test',1234567890,'10/05/1999','$2y$10$8ekVvbwT91d2O4wFJq2ETecMvrUKnsTOh0Q/8HPbUBT9L6uuS0lUy'),(18,'RealHuman','test@real.test',1234567891,'10/05/1999','$2y$10$ZzhXlKvRjgPpJUaWukFDUuZX7iIpM9aYGurbrGmEXSOHyW2lHP16K'),(19,'AnotherRealHuman','test@vreal.com',1234567892,'10/05/1999','$2y$10$DIsKYf.chXBw7GMpM2wK9.J.MYbHMrSF64A8eqnCBuDKwW.cQcngW'),(20,'Vaibhav','test@vaibhav.test',1234567893,'10/05/1999','$2y$10$f5fl2e0LGugFCjYCaLNr7.Pg6Jr.9/iCtX2c9dedBdyKpyVx9z8se'),(21,'NewUser','newuser@gmail.com',1234567895,'10/05/1999','$2y$10$0HCclZNTJG8TmCFRPl9Q4OJdjSiKsnIyrLMS8btd2uubpIVUm5hni'),(22,'Newuser2','Newuser2@arbitrary.com',1234567896,'10/05/1999','$2y$10$IZu6OQHjORg8Gcs0Bbjeiu6uT0x5QEejk5TsDZsS8mhcJ4L6vsaeu');
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
  CONSTRAINT `itemID` FOREIGN KEY (`itemID`) REFERENCES `items` (`itemid`) ON DELETE CASCADE,
  CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `members` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (15,'2018-05-28',1,5.00,'Wow what a fantastic spot',46),(16,'2018-05-28',18,2.00,'Tell my wifi love her',27),(17,'2018-05-29',20,4.00,'Bill Wi the science Fi',16),(18,'2018-05-30',18,3.00,'Pretty fly for a WiFi',39),(19,'2018-05-31',19,1.00,'The LAN before time',39),(20,'2018-06-01',19,5.00,'VERY GOOD WIFI I LIKE',10),(21,'2018-06-02',20,3.00,'Better than the NBN',2),(22,'2018-06-03',1,2.00,'Signal drops off quickly',18),(23,'2018-06-04',1,1.00,'Meh',20),(24,'2018-06-05',1,2.00,'Awful',2),(25,'2018-06-06',1,3.00,'Takes forever to load',40),(26,'2018-06-07',19,3.00,'Clippy was here',43),(27,'2018-06-08',20,3.00,'Unsecured do not use',49),(28,'2018-06-09',19,3.00,'Wifi that works unlike the NBN',12),(29,'2018-06-10',19,4.00,'NBN complaint here',5),(30,'2018-06-11',18,2.00,'Low quality NBN joke',32),(31,'2018-06-12',19,1.00,'Sample text',13),(32,'2018-06-13',18,2.00,'Lorem ipsum',36),(33,'2018-06-14',20,3.00,'Good wifi',36),(34,'2018-06-15',18,1.00,'Excellent Wifi',18),(35,'2018-06-16',18,3.00,'Magnificent Wifi',47),(36,'2018-06-17',20,3.00,'Awful wifi',46),(37,'2018-06-18',1,5.00,'Terrific wifi',52),(38,'2018-06-19',18,1.00,'Terrible wifi',49),(39,'2018-06-20',1,1.00,'Generic wifi review',5),(40,'2018-06-21',20,3.00,'Why did I type these reviews',4),(41,'2018-06-22',1,4.00,'Busy',11),(42,'2018-06-23',18,3.00,'Not busy',37),(43,'2018-06-24',19,1.00,'Back in my day we did not have wifi',6),(44,'2018-06-25',20,5.00,'Something something insecure',35),(45,'2018-06-26',1,1.00,'V good',17),(46,'2018-06-27',18,5.00,'I like',5),(47,'2018-06-28',19,3.00,'I do not like',14),(48,'2018-06-29',20,4.00,'I am mildly satisfied',15),(49,'2018-06-30',20,5.00,'Goood',14),(50,'2018-07-01',1,5.00,'Ten out of ten',22),(51,'2018-07-02',19,1.00,'I mean it works',18),(52,'2018-07-03',1,3.00,'I mean it has not exploded yet',45),(53,'2018-07-04',20,5.00,'It could be a little easier to access',6),(54,'2018-07-05',20,5.00,'Who needs wifi when you have mobile data',25),(55,'2018-07-06',18,5.00,'Using this is like watching paint dry digitally',40),(56,'2018-07-07',20,1.00,'Yes very nice',5),(57,'2018-07-08',1,4.00,'Hurrah it works',43),(58,'2018-07-09',1,3.00,'Okay',28),(59,'2018-07-10',20,2.00,'Ehh',18),(60,'2018-07-11',1,1.00,'Insert well written review here',21),(61,'2018-07-12',19,2.00,'Uncovered area',11),(62,'2018-07-13',1,3.00,'Joke here',39),(63,'2018-07-14',20,4.00,'Mildly okay wifi',19),(64,'2018-07-15',19,2.00,'Very good wifi but a little slow',45),(65,'2018-07-16',19,3.00,'Wonderful',46),(66,'2018-05-28',1,5.00,'Great wifi',1),(67,'2018-05-28',21,5.00,'Great wifi',1),(68,'2018-05-28',22,4.00,'Great hotspot',1),(69,'2018-05-28',1,4.00,'Review text',8);
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

-- Dump completed on 2018-05-28 14:40:02
