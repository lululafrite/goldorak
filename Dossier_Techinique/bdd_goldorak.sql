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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES
(1,'2024-01-02','Vega78',5,'Cette Association est trop géniale, grace à elle, j\'ai enfin réussi à trouver la figurine FX357 du golgoth 12. Merci aux bénévoles qui font un travail formidable.',2,6),
(2,'2024-01-15','PrinceEuphor',5,'Je suis le chanceux qui est parti à Tokyo avec toute l\'équipe, je m\'en souviendrais toute ma vie. Je n\'ai pas de mot! Un énorme merci à toute l\'équipe.',2,7),
(3,'2024-03-05','VénusiaXXL',5,'Je suis allé au dernier rassemblement de septembre 2023, c\'était incroyable, l\'organisation était complétement dingue. Les costumes, la musique, les show, les animations.... Vivement la prochaine, moi c\'est sûr j\'y retourne. Merci à toute l\'équipe.',2,5),
(4,'2024-03-18','Thomaslehooo',5,'Bravo! Super site!',0,11),
(5,'2024-03-18','Thomaslehooo',5,'Bravo Ludo pour ce travail remarquable!',1,11);
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
(1,'Accueil : Bienvenue sur le site de l\'association Club Goldorak','Rôle de l\'association : Club Goldorak','Le Club Goldorak est une association destinée aux <em>passionnés de Goldorak</em>, dans laquelle ses <em>adhérents</em> ont accès à beaucoup de <em>privilèges et d\'avantages</em> sur différentes thématiques traitées par notre équipe.</br>\r\nLe Gérant avec son équipe de 12 bénévoles, <em>passionnés et pointus</em> sur le sujet, sont tous permanents dans l\'association. C\'est ainsi qu\'ils scrutent la moindre <em>nouveauté sur Goldorak</em>, ainsi que tous ce qui peut y être lié (média, rassemblements, événements, concerts, produits dérivés, cinéma, séries, bons plans, etc...).</br>\r\n<em>L\'association organise</em> tout pour que vous n\'ayez plus qu\'à profiter de ce qui vous est proposé et de dévorer à pleines dents votre passion en compagnie de personnes qui vous ressemblent.</br>\r\n<em>Chaque année</em>, des adhérents sont <em>tirés au sort</em> pour nous <em>accompagner</em> dans nos nombreux <em>déplacements au Japon</em>, afin de <em>chiner</em> dans les quartiers où nous trouvons des dizaines de <em>boutiques spécialisées en mangas</em>, et pour certaines, exclusivement sur Goldorak.','img_goldorak_aktarus_01.webp','Adhérer au Club Goldorak','Pour rejoindre nos +/-2800 adhérents (au 01/07/2023) au club Goldorak, c\'est très simple! Il suffit de vous munir de votre CB, de cliquer sur lien ci-dessous, de remplir le formulaire et de procéder au paiement de la cotisation annuelle à partir de 35.00€TTC. Nous vous enverrons votre cadeau de bienvenue à l\'encaissement de votre cotisation : Une carte 3D exclusive de Goldorak!!!','img_goldorak_dark_1200x522_02.webp');
/*!40000 ALTER TABLE `home` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Utilisateur pour la gestion de connexion au site';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(1,'GOLDORAK','Goldorak','goldorak','goldorak@gmail.com','0102030405','Goldorak123/','avatar_goldorak_01.webp',2,2),
(2,'ADMIN','Admin','Admin','admin@gmail.com','06 06 06 06 06','Admin123/','avatar_admin_white.webp',2,1),
(3,'USER','User','User','user@gmail.com','06 08 81 83 90','User123/','avatar_user.webp',2,3),
(4,'FOLLACO','Ludovic','Professeur','ludovic.follaco@free.fr','0608818390','Lud123/*-','professeur_procyon.webp',2,1),
(5,'FOLLACO','Marie','VénusiaXXL','marie.follaco@free.fr','06 59 58 55 15','Marie123/','avatar_venusia_01.webp',3,2),
(6,'MARTEAU','Antonin','Vega78','antonin.marteau@gmail.com','## ## ## ## ##','Antonin123/','avatar_vega_01.webp',1,2),
(7,'TAVERNE','Pierre','PrinceEuphor','pierre.taverne@gmail.com','06 06 07 07 08','Pierre123/','avatar_princeEuphor.webp',2,2),
(8,'ACTARUS','Actarus','actarus','actarus@gmail.com','0102030405','Actarus123/','avatar_actarus.webp',1,2),
(9,'VENUSIA','Venusia','venusia','venusia@gmail.com','0102030405','Venusia123/','avatar_venusia_01.webp',3,2),
(10,'CHIP','Pounette','chipounette','chipounette@gmail.com','0102030405','Chip123/','avatar_venusia_01.webp',1,2),
(11,'LEHOMME','Thomas','Thomaslehooo','tho@gmail.com','0613427516','Tho123!!','avatar_soldat_vega.webp',2,2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Type utilisateur pour la gestion des droits d''utilisation';
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

-- Dump completed on 2024-04-07 14:58:35
