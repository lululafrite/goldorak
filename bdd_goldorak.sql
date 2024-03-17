-- MariaDB dump 10.19  Distrib 10.11.5-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: goldorak
-- ------------------------------------------------------
-- Server version	10.11.5-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brand`
--

DROP TABLE IF EXISTS `brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_brand`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Marques des voitures';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brand`
--

LOCK TABLES `brand` WRITE;
/*!40000 ALTER TABLE `brand` DISABLE KEYS */;
INSERT INTO `brand` VALUES
(1,'_'),
(2,'RENAULT'),
(3,'PEUGEOT'),
(4,'CITROEN'),
(5,'DS'),
(6,'ALPINE'),
(7,'WOLKSWAGEN'),
(8,'MERCEDES'),
(9,'BMW'),
(10,'DACIA'),
(11,'OPEL'),
(12,'AUDI');
/*!40000 ALTER TABLE `brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `closed_periods`
--

DROP TABLE IF EXISTS `closed_periods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `closed_periods` (
  `id_closed_periods` int(11) NOT NULL AUTO_INCREMENT,
  `closed_periods` varchar(255) NOT NULL DEFAULT 'Nous serons fermé du 29/07/2024 au 19/08/2024',
  PRIMARY KEY (`id_closed_periods`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Période de fermetue';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `closed_periods`
--

LOCK TABLES `closed_periods` WRITE;
/*!40000 ALTER TABLE `closed_periods` DISABLE KEYS */;
INSERT INTO `closed_periods` VALUES
(1,'Nous serons fermés du 29/07/2024 au 19/08/2024');
/*!40000 ALTER TABLE `closed_periods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `date_` date NOT NULL,
  `pseudo` varchar(30) NOT NULL DEFAULT 'member',
  `rating` int(11) NOT NULL DEFAULT 5,
  `comment` text NOT NULL DEFAULT '`;-)`',
  `publication` tinyint(1) NOT NULL DEFAULT 0,
  `id_member` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_comment`),
  KEY `id_member` (`id_member`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES
(1,'2024-01-02','Vega78',5,'Cette Association est trop géniale, grace à elle, j\'ai enfin réussi à trouver la figurine FX357 du golgoth 12. Merci aux bénévoles qui font un travail formidable.',2,6),
(3,'2024-01-15','PrinceEuphor',5,'Je suis le chanceux qui est parti à Tokyo avec toute l\'équipe, je m\'en souviendrais toute ma vie. Je n\'ai pas de mot! Un énorme merci à toute l\'équipe.',2,7),
(55,'2024-03-05','VénusiaXXL',5,'Je suis allé au dernier rassemblement de septembre 2023, c\'était incroyable, l\'organisation était complétement dingue. Les costumes, la musique, les show, les animations.... Vivement la prochaine, moi c\'est sûr j\'y retourne. Merci à toute l\'équipe.',2,5),
(61,'2024-03-13','PrinceEuphor',4,'Bravo à toutes l\'équipe!',0,7),
(62,'2024-03-15','PrinceEuphor',2,'waou!!',1,7);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home`
--

DROP TABLE IF EXISTS `home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home` (
  `id_home` int(11) NOT NULL AUTO_INCREMENT,
  `titre1` varchar(255) NOT NULL,
  `titre_chapter1` varchar(255) NOT NULL,
  `chapter1` text NOT NULL,
  `img_chapter1` varchar(255) NOT NULL,
  `titre_chapter2` varchar(255) NOT NULL,
  `chapter2` text NOT NULL,
  `img_chapter2` varchar(255) NOT NULL,
  PRIMARY KEY (`id_home`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home`
--

LOCK TABLES `home` WRITE;
/*!40000 ALTER TABLE `home` DISABLE KEYS */;
INSERT INTO `home` VALUES
(1,'Accueil : Bienvenue sur le site de l\'association Club Goldorak','Rôle de l\'association : Club Goldorak',' Le Club Goldorak est une association destinée aux <em>passionnés de Goldorak</em>, dans laquelle ses <em>adhérents</em> ont accès à beaucoup de <em>privilèges et d\'avantages</em> sur différentes thématiques traitées par notre équipe.</br>\r\nLe Gérant avec son équipe de 12 bénévoles, <em>passionnés et pointus</em> sur le sujet, sont tous permanents dans l\'association. C\'est ainsi qu\'ils scrutent la moindre <em>nouveauté sur Goldorak</em>, ainsi que tous ce qui peut y être lié (média, rassemblements, événements, concerts, produits dérivés, cinéma, séries, bons plans, etc...).</br>\r\n<em>L\'association organise</em> tout pour que vous n\'ayez plus qu\'à profiter de ce qui vous est proposé et de dévorer à pleines dents votre passion en compagnie de personnes qui vous ressemblent.</br>\r\n<em>Chaque année</em>, des adhérents sont <em>tirés au sort</em> pour nous <em>accompagner</em> dans nos nombreux <em>déplacements au Japon</em>, afin de <em>chiner</em> dans les quartiers où nous trouvons des dizaines de <em>boutiques spécialisées en mangas</em>, et pour certaines, exclusivement sur Goldorak.                                                                                                                                                                                                                                                                                                                                                                                                                                                ','img_goldorak_aktarus_01.webp','Adhérer au Club Goldorak','Pour rejoindre nos +/-2800 adhérents (au 01/07/2023) au club Goldorak, c\'est très simple! Il suffit de vous munir de votre CB, de cliquer sur lien ci-dessous, de remplir le formulaire et de procéder au paiement de la cotisation annuelle à partir de 35.00€TTC. Nous vous enverrons votre cadeau de bienvenue à l\'encaissement de votre cotisation : Une carte 3D exclusive de Goldorak!!!                                                                                                                                                                                                                                                                                                                                                                            ','img_goldorak_dark_1200x522_02.webp');
/*!40000 ALTER TABLE `home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model`
--

DROP TABLE IF EXISTS `model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model` (
  `id_model` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'modèle_voiture',
  PRIMARY KEY (`id_model`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Modèle de voiture (Scénic, A3, Golf, etc)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model`
--

LOCK TABLES `model` WRITE;
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` VALUES
(1,'_'),
(2,'208'),
(3,'308'),
(4,'408'),
(5,'508'),
(6,'A1'),
(7,'A2'),
(8,'A3'),
(9,'A4'),
(10,'A6'),
(11,'A8'),
(12,'CLASSE A'),
(13,'CLASSE B'),
(14,'CLASSE C'),
(15,'ESPACE'),
(16,'GOLF'),
(17,'MEGANE'),
(18,'PASSAT'),
(19,'POLO'),
(20,'SCENIC'),
(21,'SIROCCO'),
(22,'TWINGO'),
(24,'SANDERO'),
(25,'JOGGER'),
(27,'Q4 E-TRON'),
(29,'C4'),
(31,'CLIO'),
(33,'MEGANE E-TECH'),
(35,'CAPTUR'),
(37,'A110'),
(39,'i8'),
(40,'SERIE1');
/*!40000 ALTER TABLE `model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `id_brand` int(11) NOT NULL DEFAULT 1,
  `id_model` int(11) NOT NULL DEFAULT 1,
  `year` year(4) NOT NULL DEFAULT year(curdate()),
  `mileage` mediumint(9) NOT NULL DEFAULT 0,
  `price` mediumint(9) NOT NULL DEFAULT 0,
  `sold` enum('Oui','Non') NOT NULL DEFAULT 'Non',
  `description` text NOT NULL DEFAULT '\'Options et description\'',
  `image1` varchar(255) NOT NULL DEFAULT 'image.webp',
  `image2` varchar(255) NOT NULL DEFAULT 'image.webp',
  `image3` varchar(255) NOT NULL DEFAULT 'image.webp',
  `image4` varchar(255) NOT NULL DEFAULT 'image.webp',
  `image5` varchar(255) NOT NULL DEFAULT 'image.webp',
  PRIMARY KEY (`id_product`),
  KEY `index_car_id_brand` (`id_brand`) USING BTREE,
  KEY `index_car_id_model` (`id_model`),
  CONSTRAINT `rel_car_id_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id_brand`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `rel_car_id_model` FOREIGN KEY (`id_model`) REFERENCES `model` (`id_model`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table des voitures à vendre ou vendu';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES
(1,7,16,2023,3534,39612,'Oui','Options et description','golf_1.png','golf_2.webp','golf_3.webp','golf_4.webp','golf_5.webp'),
(4,3,2,2022,58600,22500,'Oui','Véhicule en très bon état, 1ère main.\r\nCT OK \r\nEntretien complet Peugeot ','208_1.png','208_2.png','208_3.png','208_4.png','208_5.png'),
(33,10,24,2022,3500,13690,'Oui','Véhicule parfait pour faible budget \r\nProche du neuf\r\nCouleur: bleu électron ','dacia-sandero-stepway_2024-02-17_19_22.png','dacia-sandero-inter1_2024-02-18_10_42.jpg','dacia-sandero-inter2_2024-02-18_10_41.jpg','dacia-sandero-inter3_2024-02-18_10_43.jpg','dacia-sandero-inter4_2024-02-18_10_44.jpg'),
(34,10,25,2021,33600,18650,'Oui','Véhicule 1ère main, 7 places, passe partout aussi bien en ville qu\'en montagne.\r\nEntretien complet Dacia\r\nPas de double des clés\r\nCT OK\r\n','dacia_joggerextreme_2024-02-17_19-22.png','dacia_jogger_inter1_2024-02-18_10-39.jpg','dacia_jogger_inter2_2024-02-18_10-40.jpg','dacia_jogger_inter3_2024-02-18_10-41.jpg','dacia_jogger_inter4_2024-02-18_10-42.jpg'),
(35,6,37,2023,30000,59000,'Oui','Véhicule sportif (possible usage sur circuit)\r\nTrès peu de kilomètre\r\nEntretien complet Renault ','alpine-A110_2024-02-17_19-20.png','Alpine_A110_inter1_2024-02_18_10_49.webp','Alpine_A110_inter2_2024-02_18_10_50.webp','Alpine_A110_inter3_2024-02_18_10_51.webp','Alpine_A110_inter4_2024-02_18_10_52.webp'),
(36,2,31,2022,50000,12000,'Oui','Clio full hybride toutes options. \r\nTrès bon état \r\nPhotos non contractuelles ','renaultcliofullhybride_2024-02-17_19-15.png','renaultcliofullhybride_2024-02-17_19-15.webp','renaultcliofullhybride_2024-02-17_19-16.webp','renaultcliofullhybride_2024-02-17_19-18.webp','renaultcliofullhybride_2024-02-17_19-19.webp'),
(37,9,39,2024,5000,120000,'Oui','Véhicule électrique sportif composer d\'un moteur électrique et d\'un faible moteur essence pour le complément.\r\nFaible kilométrage\r\nEntretien complet BMW\r\nCouleur : Rouge\r\n','bmw-i8-protonic-red_2024-02-17-19-21.png','BMW_i8_inter1_2024-02-18-11-00.jpg','BMW_i8_inter2_2024-02-18-11-01.jpg','BMW_i8_inter3_2024-02-18-11-02.jpg','BMW_i8_inter4_2024-02-18-11-03.jpg'),
(38,2,35,2013,115230,10990,'Oui','CT OK\r\nEtat correct\r\nEntretien complet Renault\r\nDouble des clés\r\n','renaultcaptur_2024-02-17_11-00.png','renaultcaptur_2024-02-17_11-01.png','renaultcaptur_2024-02-17_11-02.png','renaultcaptur_2024-02-17_11-03.png','renaultcaptur_2024-02-17_11-04.png'),
(39,9,40,2021,90000,55000,'Oui','Véhicule compact (citadine) parfait pour la ville.\r\nEntretien complet BMW\r\nCouleur blanc\r\nJante 16\"','bmw_serie_1_2024-02-17-19-09.png','BMW_serie1_inter1_2024_02_18_11_08.jpg','BMW_serie1_inter2_2024_02_18_11_09.jpg','BMW_serie1_inter3_2024_02_18_11_10.jpg','BMW_serie1_inter4_2024_02_18_11_11.jpg'),
(40,2,17,2022,33600,55000,'Oui','Voiture électrique très bon marché, puissante et dynamique.\r\nEntretien Renault \r\nContrôle technique moins de 6 mois','Renault-Megane-e-tech_2024-02-17-19-19.png','renault-megane-e-tech-electric-inter1_2024_02_18_11_11.jpg','renault-megane-e-tech-electric-inter2_2024_02_18_11_12.jpg','renault-megane-e-tech-electric-inter3_2024_02_18_11_13.jpg','renault-megane-e-tech-electric-inter4_2024_02_18_11_14.jpg'),
(41,12,8,2019,8200,25900,'Oui','Audi A3 pack luxe\r\n\r\nVéhicule proche du neuf !\r\nCT OK\r\nEntretien Audi a jour\r\n\r\nCouleur noir\r\nJante 17\"','AudiA3_2024-02-17_17-57.png','AudiA3_2024-02-17_17-58.webp','AudiA3_2024-02-17_17-59.webp','AudiA3_2024-02-17_18-00.webp','AudiA3_2024-02-17_18-01.webp'),
(42,2,20,2024,5000,22000,'Oui','Totalement neuve ! \r\nscenic e-tech 2024 grise presque pas utilisé\r\nToutes options avec toit ouvrant \r\n','renaultscenice-tech_2024-02-17_19-20.png','renaultscenice-tech_2024-02-17_19-20.webp','renaultscenice-tech_2024-02-17_19-21.webp','renaultscenice-tech_2024-02-17_19-23.webp','renaultscenice-tech_2024-02-17_19-24.webp'),
(43,12,27,2023,10,59000,'Oui','Véhicule neuf importé\r\nTrès faible kilométrage \r\nCouleur gris nardo\r\n\r\nA saisir\r\n','AudiQ4e-tron_2024-02-17_18-48.jpg','AudiQ4e-tron_2024-02-17_18-49.webp','AudiQ4e-tron_2024-02-17_18-50.webp','AudiQ4e-tron_2024-02-17_18-51.webp','AudiQ4e-tron_2024-02-17_18-58.webp'),
(44,2,22,2020,80000,6000,'Oui','Jolie Twingo de 4 ans en très bon état. CT OK.\r\ncouleur : Grise\r\nPhotos non contractuelles','RenaultTwingo_2024-02-17_19-05.png','RenaultTwingo_2024-02-17_19-10.webp','RenaultTwingo_2024-02-17_19-11.webp','RenaultTwingo_2024-02-17_19-12.webp','RenaultTwingo_2024-02-17_19-13.webp'),
(45,4,29,2020,67000,23900,'Oui','Véhicule électrique pour un usage quotidien fait pour les petit parcours routier.\r\nEntretien semi complet Citroen\r\nPas de double des clés\r\nCT OK\r\n','Citroen_eC4_2024-02-17_19-27.png','Citroen_eC4_2024-02-17_19-28.webp','Citroen_eC4_2024-02-17_19-29.webp','Citroen_eC4_2024-02-17_19-30.webp','Citroen_eC4_2024-02-17_19-31.webp');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id_schedules` int(11) NOT NULL AUTO_INCREMENT,
  `lundiMatin` varchar(30) NOT NULL DEFAULT '08:00 - 12:00',
  `lundiAM` varchar(30) NOT NULL DEFAULT '14:00 - 18:00',
  `mardiMatin` varchar(30) NOT NULL DEFAULT '08:00 - 12:00',
  `mardiAM` varchar(30) NOT NULL DEFAULT '14:00 - 18:00',
  `mercrediMatin` varchar(30) NOT NULL DEFAULT '08:00 - 12:00',
  `mercrediAM` varchar(30) NOT NULL DEFAULT '14:00 - 18:00',
  `jeudiMatin` varchar(30) NOT NULL DEFAULT '08:00 - 12:00',
  `jeudiAM` varchar(30) NOT NULL DEFAULT '14:00 - 18:00',
  `vendrediMatin` varchar(30) NOT NULL DEFAULT '08:00 - 12:00',
  `vendrediAM` varchar(30) NOT NULL DEFAULT '14:00 - 18:00',
  `samediMatin` varchar(30) NOT NULL DEFAULT '08:00 - 12:00',
  `samediAM` varchar(30) NOT NULL DEFAULT 'Fermè',
  `dimancheMatin` varchar(30) NOT NULL DEFAULT 'Fermè',
  `dimancheAM` varchar(30) NOT NULL DEFAULT 'Fermè',
  PRIMARY KEY (`id_schedules`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='horaires ouverture';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES
(1,'08:00 -12:00','14:00 - 18:00','08:00 -12:00','14:00 - 18:00','08:00 -12:00','14:00 - 18:00','08:00 -12:00','14:00 - 18:00','08:00 -12:00','14:00 - 18:00','08:00 -12:00','Ferme','Ferme','Ferme');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `id_subscription` int(11) NOT NULL AUTO_INCREMENT,
  `subscription` varchar(20) NOT NULL,
  PRIMARY KEY (`id_subscription`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES
(1,'Actarus'),
(2,'Goldorak'),
(3,'Vénusia');
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'NOM',
  `surname` varchar(50) NOT NULL DEFAULT 'Prénom',
  `pseudo` varchar(20) NOT NULL DEFAULT '''pseudo''',
  `email` varchar(255) NOT NULL DEFAULT 'nom.prenom@domaine.com',
  `phone` varchar(18) NOT NULL DEFAULT '## ## ## ## ##',
  `password` varchar(255) NOT NULL DEFAULT 'Mot de passe',
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar_membre_white.webp',
  `id_subscription` int(11) NOT NULL DEFAULT 4,
  `id_type` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id_user`),
  KEY `index_user_id_type` (`id_type`),
  KEY `id_subscription` (`id_subscription`),
  CONSTRAINT `rel_user_id_type` FOREIGN KEY (`id_type`) REFERENCES `user_type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_subscription`) REFERENCES `subscription` (`id_subscription`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Utilisateur pour la gestion de connexion au site';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'GOLDORAK','Goldorak','Goldorak','member@gmail.com','## ## ## ## ##','Member123/','avatar_goldorak_01.webp',3,2),
(2,'ADMIN','Admin','Admin','admin@gmail.com','06 06 06 06 06','Admin123/','avatar_admin_white.webp',2,1),
(3,'USER','User','User','user@gmail.com','06 08 81 83 90','User123/','avatar_user.webp',2,3),
(4,'FOLLACO','Ludovic','Professeur','ludovic.follaco@free.fr','0608818390','Lud123/*-','professeur_procyon.jpg',2,1),
(5,'FOLLACO','Marie','VénusiaXXL','marie.follaco@free.fr','06 59 58 55 15','Marie123/','avatar_venusia_01.webp',3,2),
(6,'MARTEAU','Antonin','Vega78','antonin.marteau@gmail.com','## ## ## ## ##','Antonin123/','avatar_vega_01.webp',1,2),
(7,'TAVERNE','Pierre','PrinceEuphor','pierre.taverne@gmail.com','06 06 07 07 08','Pierre123/','avatar_aktarus_01.webp',2,2),
(106,'CHIP','Pounette','chipounette','chipounette@gmail.com','0102030405','Chip123/','avatar_venusia_01.webp',1,2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL DEFAULT 'Guest',
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Type utilisateur pour la gestion des droits d''utilisation';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES
(1,'Administrator'),
(2,'Member'),
(3,'User');
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-15 14:38:41
