-- MySQL dump 10.13  Distrib 5.5.54, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: monitoria
-- ------------------------------------------------------
-- Server version	5.5.54-0+deb8u1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin@gmail.com','$2y$10$8kf6h8OeerZGyB8xaTb/U.KnxkzJsk9Xp74VmV9eTw1AyYus3Og0y','Js6eDyueJzVwEKNS29jaJMjYOb3OGAwMThihPfBgKfS01X24AyHyB3HFW0lQ','2017-01-11 17:44:02','2017-02-14 17:01:45');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bolsas`
--

DROP TABLE IF EXISTS `bolsas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bolsas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bolsas`
--

LOCK TABLES `bolsas` WRITE;
/*!40000 ALTER TABLE `bolsas` DISABLE KEYS */;
INSERT INTO `bolsas` VALUES (15,40,'2017-01-30 02:00:00'),(16,41,'2017-01-30 17:56:50'),(17,3,'2017-01-30 18:54:12'),(18,40,'2017-01-31 12:29:30'),(19,40,'2017-01-31 19:51:39'),(20,40,'2017-01-31 20:19:09'),(21,40,'2017-02-02 12:02:14'),(22,40,'2017-02-02 12:02:38'),(23,4,'2017-02-02 15:04:40'),(24,4,'2017-02-08 20:07:48'),(25,4,'2017-02-08 20:09:10'),(26,4,'2017-02-08 20:10:05'),(27,4,'2017-02-08 20:15:58'),(28,4,'2017-02-08 20:18:09'),(29,4,'2017-02-08 20:34:43'),(30,4,'2017-02-10 12:48:12'),(31,4,'2017-02-10 14:29:29'),(32,4,'2017-02-10 14:30:21'),(33,4,'2017-02-10 14:31:05'),(34,4,'2017-02-10 15:09:26'),(35,4,'2017-02-10 15:12:14'),(36,4,'2017-02-10 15:27:12'),(37,4,'2017-02-14 16:46:49'),(38,4,'2017-02-14 16:46:50'),(39,4,'2017-02-14 16:46:53'),(40,4,'2017-02-14 16:46:54'),(41,4,'2017-02-14 16:47:07'),(42,4,'2017-02-14 16:47:40');
/*!40000 ALTER TABLE `bolsas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dados_bancarios`
--

DROP TABLE IF EXISTS `dados_bancarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dados_bancarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(11) NOT NULL,
  `agencia` varchar(11) NOT NULL,
  `conta_corrente` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dados_bancarios`
--

LOCK TABLES `dados_bancarios` WRITE;
/*!40000 ALTER TABLE `dados_bancarios` DISABLE KEYS */;
INSERT INTO `dados_bancarios` VALUES (1,'1','20','300'),(2,'1','123456','65487'),(3,'11425','15488','134671'),(4,'2','36013','457302'),(5,'1','36000','447772'),(6,'15','12345','98889897'),(8,'1','2','3'),(10,'1','2','3'),(11,'12','123','123'),(12,'1','2','3'),(13,'1','2','3'),(14,'1','12','123'),(15,'123','0123','0121345'),(16,'1','2','3');
/*!40000 ALTER TABLE `dados_bancarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `descricao_periodo`
--

DROP TABLE IF EXISTS `descricao_periodo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `descricao_periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descricao_periodo`
--

LOCK TABLES `descricao_periodo` WRITE;
/*!40000 ALTER TABLE `descricao_periodo` DISABLE KEYS */;
INSERT INTO `descricao_periodo` VALUES (1,'Inscrição (Monitores)'),(2,'Avaliação (Professores)'),(3,'Frêquencia - Primeira Etapa'),(4,'Frêquencia - Segunda Etapa'),(5,'Frêquencia - Etapa Final'),(6,'Resultado (Monitores/Professores)');
/*!40000 ALTER TABLE `descricao_periodo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disciplinas` (
  `cod_disciplina` int(11) unsigned NOT NULL,
  `nome` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fk_tipo_disciplina_id` int(11) NOT NULL,
  `c_prat` int(11) NOT NULL DEFAULT '0',
  `c_teor` int(11) NOT NULL DEFAULT '0',
  `c_est` int(11) NOT NULL DEFAULT '0',
  `c_ext` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_disciplina`),
  KEY `disciplinas_cod_disciplina_index` (`cod_disciplina`),
  KEY `fk_disciplinas_tipo_disciplina1_idx` (`fk_tipo_disciplina_id`),
  CONSTRAINT `fk_disciplinas_tipo_disciplina1` FOREIGN KEY (`fk_tipo_disciplina_id`) REFERENCES `tipo_disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `disciplinas`
--

LOCK TABLES `disciplinas` WRITE;
/*!40000 ALTER TABLE `disciplinas` DISABLE KEYS */;
INSERT INTO `disciplinas` VALUES (113450,'FUNDAMENTOS TEÓRICOS DA COMPUTAÇÃO',1,0,0,0,0),(113468,'INTRODUÇÃO AOS SISTEMAS COMPUTACIONAIS',1,0,0,0,0),(113476,'ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES',1,2,4,6,0),(113492,'FORMAÇÃO DOCENTE EM COMPUTAÇÃO',1,0,0,0,0),(113913,'INTRODUCAO A CIENCIA DA COMPUTACAO',2,0,0,0,0),(116068,'NOCOES DE SISTEMAS OPERACIONAIS',1,0,0,0,0),(116297,'TOPICOS AVANCADOS EM COMPUTADORES',2,0,4,4,0),(116319,'ESTRUTURAS DE DADOS',1,0,0,0,0),(116327,'ORGANIZAÇÃO DE ARQUIVOS',1,0,0,0,0),(116343,'LINGUAGENS DE PROGRAMACAO',1,0,0,0,0),(116351,'CIRCUITOS DIGITAIS',1,0,0,0,0),(116360,'TEORIA DA COMPUTACAO',1,0,0,0,0),(116378,'BANCOS DE DADOS',1,0,0,0,0),(116394,'ORGANIZACAO E ARQUITETURA DE COMPUTADORES',1,0,4,4,0),(116416,'SISTEMAS DE INFORMACAO',1,0,0,0,0),(116424,'TRANSMISSÃO DE DADOS',1,0,0,0,0),(116432,'SOFTWARE BASICO',1,0,0,0,0),(116441,'ENGENHARIA DE SOFTWARE',1,0,0,0,0),(116459,'TRADUTORES',2,0,0,0,0),(116467,'SISTEMAS OPERACIONAIS',1,0,0,0,0),(116475,'TRABALHO DE GRADUACAO',2,6,0,6,0),(116521,'ESTUDOS EM COMPUTACAO MULTIMIDIA',2,0,0,0,0),(116530,'SEGURANCA DE DADOS',2,0,0,0,0),(116572,'REDES DE COMPUTADORES',1,0,0,0,0),(116599,'PROCESSAMENTO EM TEMPO REAL',1,0,0,0,0),(116629,'ESTUDOS EM SISTEMAS DE COMPUTACAO',2,0,0,0,0),(116661,'ESTUDOS EM INTELIGENCIA ARTIFICIAL',2,0,0,0,0),(116726,'INFORMATICA E SOCIEDADE',1,0,0,0,0),(116734,'ESTUDOS EM SISTEMAS DE INFORMACAO',2,0,0,0,0),(116793,'INTRODUCAO A MICROINFORMATICA',1,0,0,0,0),(116823,'TEORIA E PRATICA PEDAGOGICA EM INFORMATICA 1',1,0,0,0,0),(116831,'TEORIA E PRATICA PEDAGOGICA EM INFORMATICA 2',1,0,0,0,0),(116840,'PROJETO DE LICENCIATURA',1,0,0,0,0),(116882,'AUTÔMATOS E COMPUTABILIDADE',1,0,0,0,0),(116891,'PROJETO DE LICENCIATURA 1',1,0,0,0,0),(116904,'PROJETO DE LICENCIATURA 2',1,0,0,0,0),(116912,'TRABALHO DE GRADUAÇÃO 1',1,0,0,0,0),(116921,'TRABALHO DE GRADUAÇÃO 2',1,0,0,0,0),(117196,'MODELAGEM ORIENTADA A OBJETOS',2,0,0,0,0),(117251,'ARQUITETURA DE PROCESSADORES DIGITAIS',1,0,0,0,0),(117315,'INTRODUÇÃO À PROGRAMAÇÃO PARALELA',2,0,0,0,0),(117366,'LÓGICA COMPUTACIONAL 1',1,0,0,0,0),(117391,'SISTEMAS DIGITAIS INTEGRADOS',2,0,0,0,0),(117528,'INTRODUÇÃO À ENGENHARIA DE COMPUTAÇÃO',1,0,0,0,0),(117536,'PROJETO E ANÁLISE DE ALGORITMOS',1,0,0,0,0),(117609,'PROCESSAMENTO DE SINAIS MULTIMÍDIA',2,0,0,0,0),(117889,'TECNICAS DE PROGRAMAÇÃO 1',1,0,0,0,0),(200379,'FUNDAMENTOS COMPUTACIONAIS DE ROBÓTICA',2,0,4,4,0),(201600,'MÉTODOS DE PROGRAMAÇÃO',1,0,0,0,0),(204315,'TELEINFORMÁTICA E REDES 1',1,0,0,0,0),(204323,'TELEINFORMÁTICA E REDES 2',1,0,0,0,0),(204331,'GERÊNCIA E SEGURANÇA DE REDES',2,0,0,0,0),(206075,'SINAIS E SISTEMAS',1,0,0,0,0),(207314,'ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 2',1,10,0,0,0),(207322,'PROJETO FINAL EM ENGENHARIA DE COMPUTAÇÃO 1',1,0,0,0,0),(207331,'PROJETO FINAL EM ENGENHARIA DE COMPUTAÇÃO 2',1,0,0,0,0),(207438,'ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 1',1,0,0,0,0);
/*!40000 ALTER TABLE `disciplinas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (10,'2016_12_21_153254_create_professors_table',1),(11,'2017_01_11_151616_create_admins_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monitoria`
--

DROP TABLE IF EXISTS `monitoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monitoria` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `remuneracao` varchar(45) NOT NULL,
  `fk_matricula` varchar(11) CHARACTER SET utf8 NOT NULL,
  `fk_cod_disciplina` int(11) unsigned NOT NULL,
  `fk_turmas_id` int(10) NOT NULL,
  `descricao_status` text,
  `prioridade` int(11) DEFAULT NULL,
  `fk_status_monitoria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_monitoria_users_idx` (`fk_matricula`),
  KEY `fk_monitoria_disciplinas1_idx` (`fk_cod_disciplina`),
  KEY `fk_monitoria_turmas1_idx` (`fk_turmas_id`),
  KEY `fk_matricula_UNIQUE` (`fk_matricula`),
  KEY `fk_monitoria_status_monitoria1_idx` (`fk_status_monitoria_id`),
  CONSTRAINT `fk_monitoria_disciplinas1` FOREIGN KEY (`fk_cod_disciplina`) REFERENCES `disciplinas` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_monitoria_status_monitoria1` FOREIGN KEY (`fk_status_monitoria_id`) REFERENCES `status_monitoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_monitoria_turmas1` FOREIGN KEY (`fk_turmas_id`) REFERENCES `turmas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_monitoria_users` FOREIGN KEY (`fk_matricula`) REFERENCES `users` (`matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1230 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monitoria`
--

LOCK TABLES `monitoria` WRITE;
/*!40000 ALTER TABLE `monitoria` DISABLE KEYS */;
INSERT INTO `monitoria` VALUES (977,'voluntaria','16000001',116629,96,'N/A',NULL,3),(978,'voluntaria','16000001',116629,97,'N/A',NULL,3),(979,'remunerada','16000001',116629,97,'Não há mais bolsas.',NULL,6),(980,'remunerada','16000001',116629,98,'Não há mais bolsas.',NULL,6),(981,'voluntaria','16000002',116921,159,'N/A',NULL,3),(982,'voluntaria','16000002',116921,160,'N/A',NULL,3),(983,'remunerada','16000002',116921,160,'Não há mais bolsas.',NULL,6),(984,'remunerada','16000002',116921,161,'Não há mais bolsas.',NULL,6),(985,'voluntaria','16000003',116904,133,'N/A',NULL,3),(986,'voluntaria','16000003',116904,134,'N/A',NULL,3),(987,'remunerada','16000003',116904,134,'Não há mais bolsas.',NULL,6),(988,'remunerada','16000003',116904,135,'Não há mais bolsas.',NULL,6),(989,'voluntaria','16000004',207331,201,'N/A',NULL,3),(990,'voluntaria','16000004',207331,202,'N/A',NULL,3),(991,'remunerada','16000004',207331,202,'Não há mais bolsas.',1,6),(992,'remunerada','16000004',207331,203,'Não há mais bolsas.',NULL,6),(993,'voluntaria','16000005',116734,109,'N/A',NULL,3),(994,'voluntaria','16000005',116734,110,'N/A',NULL,3),(995,'remunerada','16000005',116734,110,'Não há mais bolsas.',NULL,6),(996,'remunerada','16000005',116734,111,'Não há mais bolsas.',NULL,6),(997,'voluntaria','16000006',116530,89,'N/A',NULL,3),(998,'voluntaria','16000006',116572,90,'N/A',NULL,3),(999,'remunerada','16000006',116572,90,'Não há mais bolsas.',NULL,6),(1000,'remunerada','16000006',116599,91,'Não há mais bolsas.',NULL,6),(1001,'voluntaria','16000007',116530,89,'N/A',NULL,3),(1002,'voluntaria','16000007',116572,90,'N/A',NULL,3),(1003,'remunerada','16000007',116572,90,'Não há mais bolsas.',NULL,6),(1004,'remunerada','16000007',116599,91,'Não há mais bolsas.',NULL,6),(1005,'voluntaria','16000008',117528,173,'N/A',NULL,3),(1006,'voluntaria','16000008',117536,174,'N/A',NULL,3),(1007,'remunerada','16000008',117536,174,'Não há mais bolsas.',NULL,6),(1008,'remunerada','16000008',117609,175,'Não há mais bolsas.',NULL,6),(1009,'voluntaria','16000009',207331,200,'N/A',NULL,3),(1010,'voluntaria','16000009',207331,201,'N/A',NULL,3),(1011,'remunerada','16000009',207331,201,'Não há mais bolsas.',NULL,6),(1012,'remunerada','16000009',207331,202,'Não há mais bolsas.',NULL,6),(1013,'voluntaria','16000010',116734,120,'N/A',NULL,3),(1014,'voluntaria','16000010',116734,121,'N/A',NULL,3),(1015,'remunerada','16000010',116734,121,'Não há mais bolsas.',NULL,6),(1016,'remunerada','16000010',116734,122,'Não há mais bolsas.',NULL,6),(1017,'voluntaria','16000011',116297,34,'N/A',NULL,3),(1018,'voluntaria','16000011',116297,35,'N/A',NULL,3),(1019,'remunerada','16000011',116297,35,'Não há mais bolsas.',NULL,6),(1020,'remunerada','16000011',116297,36,'Não há mais bolsas.',NULL,6),(1021,'voluntaria','16000012',117315,168,'N/A',NULL,3),(1022,'voluntaria','16000012',117366,169,'N/A',NULL,3),(1023,'remunerada','16000012',117366,169,'Não há mais bolsas.',NULL,6),(1024,'remunerada','16000012',117366,170,'Não há mais bolsas.',NULL,6),(1025,'voluntaria','16000013',113476,12,'hgjhgjk',NULL,6),(1026,'voluntaria','16000013',113492,13,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES H',NULL,7),(1027,'remunerada','16000013',113492,13,'Não há mais bolsas.',NULL,6),(1028,'remunerada','16000013',113913,14,'Não há mais bolsas.',NULL,6),(1029,'voluntaria','16000014',117889,179,'N/A',NULL,3),(1030,'voluntaria','16000014',200379,180,'N/A',NULL,3),(1031,'remunerada','16000014',200379,180,'Não há mais bolsas.',NULL,6),(1032,'remunerada','16000014',201600,181,'Não há mais bolsas.',NULL,6),(1033,'voluntaria','16000015',116319,41,'N/A',NULL,3),(1034,'voluntaria','16000015',116319,42,'N/A',NULL,3),(1035,'remunerada','16000015',116319,42,'Não há mais bolsas.',NULL,6),(1036,'remunerada','16000015',116319,43,'Não há mais bolsas.',NULL,6),(1037,'voluntaria','16000016',207331,205,'N/A',NULL,3),(1038,'voluntaria','16000016',207331,206,'N/A',NULL,3),(1039,'remunerada','16000016',207331,206,'Não há mais bolsas.',NULL,6),(1040,'remunerada','16000016',207331,207,'Não há mais bolsas.',NULL,6),(1041,'voluntaria','16000017',113476,7,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES B',NULL,7),(1042,'voluntaria','16000017',113476,8,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES B',NULL,7),(1043,'remunerada','16000017',113476,8,'Inscrição no sigra feita com sucesso',NULL,5),(1044,'remunerada','16000017',113476,9,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES B',1,7),(1045,'voluntaria','16000018',116904,134,'N/A',NULL,3),(1046,'voluntaria','16000018',116904,135,'N/A',NULL,3),(1047,'remunerada','16000018',116904,135,'Não há mais bolsas.',NULL,6),(1048,'remunerada','16000018',116904,136,'Não há mais bolsas.',NULL,6),(1049,'voluntaria','16000019',116327,46,'N/A',NULL,3),(1050,'voluntaria','16000019',116327,47,'N/A',NULL,3),(1051,'remunerada','16000019',116327,47,'Não há mais bolsas.',NULL,6),(1052,'remunerada','16000019',116327,48,'Não há mais bolsas.',2,6),(1053,'voluntaria','16000020',113913,16,'N/A',NULL,3),(1054,'voluntaria','16000020',113913,17,'N/A',NULL,3),(1055,'remunerada','16000020',113913,17,'Não há mais bolsas.',1,6),(1056,'remunerada','16000020',113913,18,'Não há mais bolsas.',2,6),(1057,'voluntaria','16000021',113450,3,'N/A',NULL,3),(1058,'voluntaria','16000021',113468,4,'N/A',NULL,3),(1059,'remunerada','16000021',113468,4,'Não há mais bolsas.',NULL,6),(1060,'remunerada','16000021',113468,5,'Não há mais bolsas.',NULL,6),(1061,'voluntaria','16000022',116319,45,'N/A',NULL,3),(1062,'voluntaria','16000022',116327,46,'N/A',NULL,3),(1063,'remunerada','16000022',116327,46,'Não há mais bolsas.',NULL,6),(1064,'remunerada','16000022',116327,47,'Não há mais bolsas.',NULL,6),(1065,'voluntaria','16000023',113913,22,'N/A',NULL,3),(1066,'voluntaria','16000023',113913,23,'N/A',NULL,3),(1067,'remunerada','16000023',113913,23,'Não há mais bolsas.',NULL,6),(1068,'remunerada','16000023',113913,24,'Não há mais bolsas.',NULL,6),(1069,'voluntaria','16000024',116891,129,'N/A',NULL,3),(1070,'voluntaria','16000024',116891,130,'N/A',NULL,3),(1071,'remunerada','16000024',116891,130,'Não há mais bolsas.',NULL,6),(1072,'remunerada','16000024',116891,131,'Não há mais bolsas.',NULL,6),(1073,'voluntaria','16000025',116734,115,'N/A',NULL,3),(1074,'voluntaria','16000025',116734,116,'N/A',NULL,3),(1075,'remunerada','16000025',116734,116,'Não há mais bolsas.',NULL,6),(1076,'remunerada','16000025',116734,117,'Não há mais bolsas.',NULL,6),(1077,'voluntaria','16000026',204331,184,'Aceito em: ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 2 A',NULL,7),(1078,'voluntaria','16000026',206075,185,'Aceito em: ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 2 A',NULL,7),(1079,'remunerada','16000026',206075,185,'Aceito em: ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 2 A',NULL,7),(1080,'remunerada','16000026',207314,186,'Inscrição no sigra feita com sucesso',NULL,5),(1081,'voluntaria','16000027',116912,145,'N/A',NULL,3),(1082,'voluntaria','16000027',116912,146,'N/A',NULL,3),(1083,'remunerada','16000027',116912,146,'Não há mais bolsas.',NULL,6),(1084,'remunerada','16000027',116912,147,'Não há mais bolsas.',NULL,6),(1085,'voluntaria','16000028',116921,163,'N/A',NULL,3),(1086,'voluntaria','16000028',116921,164,'N/A',NULL,3),(1087,'remunerada','16000028',116921,164,'Não há mais bolsas.',NULL,6),(1088,'remunerada','16000028',116921,165,'Não há mais bolsas.',NULL,6),(1089,'voluntaria','16000029',116441,72,'Aceito em: SISTEMAS OPERACIONAIS A',NULL,7),(1090,'voluntaria','16000029',116459,73,'Aceito em: SISTEMAS OPERACIONAIS A',NULL,7),(1091,'remunerada','16000029',116459,73,'Aceito em: SISTEMAS OPERACIONAIS A',NULL,7),(1092,'remunerada','16000029',116467,74,'Inscrição no sigra feita com sucesso',NULL,5),(1093,'voluntaria','16000030',116351,53,'N/A',NULL,3),(1094,'voluntaria','16000030',116351,54,'N/A',NULL,3),(1095,'remunerada','16000030',116351,54,'Não há mais bolsas.',NULL,6),(1096,'remunerada','16000030',116351,55,'Não há mais bolsas.',NULL,6),(1097,'voluntaria','16000031',206075,185,'Aceito em: ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 2 A',NULL,7),(1098,'voluntaria','16000031',207314,186,'ghgjhg',NULL,6),(1099,'remunerada','16000031',207314,186,'Não há mais bolsas.',NULL,6),(1100,'remunerada','16000031',207322,187,'Não há mais bolsas.',NULL,6),(1101,'voluntaria','16000032',116904,140,'N/A',NULL,3),(1102,'voluntaria','16000032',116904,141,'N/A',NULL,3),(1103,'remunerada','16000032',116904,141,'Não há mais bolsas.',NULL,6),(1104,'remunerada','16000032',116904,142,'Não há mais bolsas.',NULL,6),(1105,'voluntaria','16000033',117889,176,'N/A',NULL,3),(1106,'voluntaria','16000033',117889,177,'N/A',NULL,3),(1107,'remunerada','16000033',117889,177,'Não há mais bolsas.',NULL,6),(1108,'remunerada','16000033',117889,178,'Não há mais bolsas.',NULL,6),(1109,'voluntaria','16000034',207314,186,'Inscrição no sigra feita com sucesso',NULL,5),(1110,'voluntaria','16000034',207322,187,'Aceito em: ESTÁGIO SUPERVISIONADO EM ENGENHARIA DE COMPUTAÇÃO 2 A',NULL,7),(1111,'remunerada','16000034',207322,187,'Não há mais bolsas.',NULL,6),(1112,'remunerada','16000034',207322,188,'Não há mais bolsas.',NULL,6),(1113,'voluntaria','16000035',116904,141,'N/A',NULL,3),(1114,'voluntaria','16000035',116904,142,'N/A',NULL,3),(1115,'remunerada','16000035',116904,142,'Não há mais bolsas.',NULL,6),(1116,'remunerada','16000035',116904,143,'Não há mais bolsas.',NULL,6),(1117,'voluntaria','16000036',116726,108,'N/A',NULL,3),(1118,'voluntaria','16000036',116734,109,'N/A',NULL,3),(1119,'remunerada','16000036',116734,109,'Não há mais bolsas.',NULL,6),(1120,'remunerada','16000036',116734,110,'Não há mais bolsas.',NULL,6),(1121,'voluntaria','16000037',113450,1,'N/A',NULL,3),(1122,'voluntaria','16000037',113450,2,'N/A',NULL,3),(1123,'remunerada','16000037',113450,2,'Não há mais bolsas.',NULL,6),(1124,'remunerada','16000037',113450,3,'Não há mais bolsas.',NULL,6),(1125,'voluntaria','16000038',116793,124,'N/A',NULL,3),(1126,'voluntaria','16000038',116823,125,'N/A',NULL,3),(1127,'remunerada','16000038',116823,125,'Não há mais bolsas.',NULL,6),(1128,'remunerada','16000038',116831,126,'Não há mais bolsas.',NULL,6),(1129,'voluntaria','16000039',116394,63,'N/A',NULL,3),(1130,'voluntaria','16000039',116394,64,'N/A',NULL,3),(1131,'remunerada','16000039',116394,64,'Não há mais bolsas.',NULL,6),(1132,'remunerada','16000039',116394,65,'Não há mais bolsas.',NULL,6),(1133,'voluntaria','16000040',116297,32,'N/A',NULL,3),(1134,'voluntaria','16000040',116297,33,'N/A',NULL,3),(1135,'remunerada','16000040',116297,33,'Não há mais bolsas.',NULL,6),(1136,'remunerada','16000040',116297,34,'Não há mais bolsas.',NULL,6),(1137,'voluntaria','16000041',204315,182,'N/A',NULL,3),(1138,'voluntaria','16000041',204323,183,'N/A',NULL,3),(1139,'remunerada','16000041',204323,183,'Não há mais bolsas.',NULL,6),(1140,'remunerada','16000041',204331,184,'Não há mais bolsas.',NULL,6),(1141,'voluntaria','16000042',116521,83,'N/A',NULL,3),(1142,'voluntaria','16000042',116521,84,'N/A',NULL,3),(1143,'remunerada','16000042',116521,84,'Não há mais bolsas.',NULL,6),(1144,'remunerada','16000042',116521,85,'Não há mais bolsas.',NULL,6),(1145,'voluntaria','16000043',116891,129,'N/A',NULL,3),(1146,'voluntaria','16000043',116891,130,'N/A',NULL,3),(1147,'remunerada','16000043',116891,130,'Não há mais bolsas.',NULL,6),(1148,'remunerada','16000043',116891,131,'Não há mais bolsas.',NULL,6),(1149,'voluntaria','16000044',116912,150,'N/A',NULL,3),(1150,'voluntaria','16000044',116921,151,'N/A',NULL,3),(1151,'remunerada','16000044',116921,151,'Não há mais bolsas.',NULL,6),(1152,'remunerada','16000044',116921,152,'Não há mais bolsas.',NULL,6),(1153,'voluntaria','16000045',116297,40,'N/A',NULL,3),(1154,'voluntaria','16000045',116319,41,'N/A',NULL,3),(1155,'remunerada','16000045',116319,41,'Não há mais bolsas.',NULL,6),(1156,'remunerada','16000045',116319,42,'Não há mais bolsas.',NULL,6),(1157,'voluntaria','16000046',117536,174,'N/A',NULL,3),(1158,'voluntaria','16000046',117609,175,'N/A',NULL,3),(1159,'remunerada','16000046',117609,175,'Não há mais bolsas.',NULL,6),(1160,'remunerada','16000046',117889,176,'Não há mais bolsas.',NULL,6),(1161,'voluntaria','16000047',116351,51,'N/A',NULL,3),(1162,'voluntaria','16000047',116351,52,'N/A',NULL,3),(1163,'remunerada','16000047',116351,52,'Não há mais bolsas.',NULL,6),(1164,'remunerada','16000047',116351,53,'Não há mais bolsas.',NULL,6),(1165,'voluntaria','16000048',116297,30,'N/A',NULL,3),(1166,'voluntaria','16000048',116297,31,'N/A',NULL,3),(1167,'remunerada','16000048',116297,31,'Não há mais bolsas.',NULL,6),(1168,'remunerada','16000048',116297,32,'Não há mais bolsas.',NULL,6),(1169,'voluntaria','16000049',116327,47,'N/A',NULL,3),(1170,'voluntaria','16000049',116327,48,'N/A',NULL,3),(1171,'remunerada','16000049',116327,48,'Não há mais bolsas.',3,6),(1172,'remunerada','16000049',116343,49,'Não há mais bolsas.',NULL,6),(1173,'voluntaria','16000050',116629,95,'N/A',NULL,3),(1174,'voluntaria','16000050',116629,96,'N/A',NULL,3),(1175,'remunerada','16000050',116629,96,'Não há mais bolsas.',NULL,6),(1176,'remunerada','16000050',116629,97,'Não há mais bolsas.',NULL,6),(1177,'voluntaria','16000051',116327,48,'N/A',NULL,3),(1178,'voluntaria','16000051',116343,49,'N/A',NULL,3),(1179,'remunerada','16000051',116343,49,'Não há mais bolsas.',NULL,6),(1180,'remunerada','16000051',116343,50,'Não há mais bolsas.',NULL,6),(1181,'voluntaria','16000052',116921,161,'N/A',NULL,3),(1182,'voluntaria','16000052',116921,162,'N/A',NULL,3),(1183,'remunerada','16000052',116921,162,'Não há mais bolsas.',NULL,6),(1184,'remunerada','16000052',116921,163,'Não há mais bolsas.',NULL,6),(1185,'voluntaria','16000053',113913,17,'N/A',NULL,3),(1186,'voluntaria','16000053',113913,18,'N/A',NULL,3),(1187,'remunerada','16000053',113913,18,'Não há mais bolsas.',1,6),(1188,'remunerada','16000053',113913,19,'Não há mais bolsas.',NULL,6),(1189,'voluntaria','16000054',116661,104,'N/A',NULL,3),(1190,'voluntaria','16000054',116661,105,'N/A',NULL,3),(1191,'remunerada','16000054',116661,105,'Não há mais bolsas.',NULL,6),(1192,'remunerada','16000054',116661,106,'Não há mais bolsas.',NULL,6),(1193,'voluntaria','16000055',207322,195,'N/A',NULL,3),(1194,'voluntaria','16000055',207322,196,'N/A',NULL,3),(1195,'remunerada','16000055',207322,196,'Não há mais bolsas.',NULL,6),(1196,'remunerada','16000055',207322,197,'Não há mais bolsas.',NULL,6),(1197,'voluntaria','16000056',116319,43,'N/A',NULL,3),(1198,'voluntaria','16000056',116319,44,'N/A',NULL,3),(1199,'remunerada','16000056',116319,44,'Não há mais bolsas.',NULL,6),(1200,'remunerada','16000056',116319,45,'Não há mais bolsas.',NULL,6),(1201,'voluntaria','16000057',113913,19,'N/A',NULL,3),(1202,'voluntaria','16000057',113913,20,'N/A',NULL,3),(1203,'remunerada','16000057',113913,20,'Não há mais bolsas.',NULL,6),(1204,'remunerada','16000057',113913,21,'Não há mais bolsas.',NULL,6),(1205,'voluntaria','16000058',207331,205,'N/A',NULL,3),(1206,'voluntaria','16000058',207331,206,'N/A',NULL,3),(1207,'remunerada','16000058',207331,206,'Não há mais bolsas.',NULL,6),(1208,'remunerada','16000058',207331,207,'Não há mais bolsas.',NULL,6),(1209,'voluntaria','16000059',116921,162,'N/A',NULL,3),(1210,'voluntaria','16000059',116921,163,'N/A',NULL,3),(1211,'remunerada','16000059',116921,163,'Não há mais bolsas.',NULL,6),(1212,'remunerada','16000059',116921,164,'Não há mais bolsas.',NULL,6),(1213,'voluntaria','16000060',116921,158,'N/A',NULL,3),(1214,'voluntaria','16000060',116921,159,'N/A',NULL,3),(1215,'remunerada','16000060',116921,159,'Não há mais bolsas.',1,6),(1216,'remunerada','16000060',116921,160,'Não há mais bolsas.',NULL,6),(1221,'remunerada','123123',113476,6,'Inscrição no sigra feita com sucesso',NULL,5),(1222,'voluntaria','123123',113476,7,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES A',NULL,7),(1223,'remunerada','123123',113476,7,'ja matriculado',NULL,6),(1224,'voluntaria','123123',116327,48,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES A',NULL,7),(1225,'remunerada','123123',116327,48,'Aceito em: ALGORITMOS E PROGRAMAÇÃO DE COMPUTADORES A',1,7),(1226,'voluntaria','130050725',117251,167,'N/A',NULL,3),(1227,'voluntaria','123698789',117251,167,'N/A',NULL,3),(1228,'voluntaria','123698789',116068,28,'N/A',NULL,3),(1229,'voluntaria','123698789',116467,74,'N/A',NULL,3);
/*!40000 ALTER TABLE `monitoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('valdy@gmail.com','ba5e59c37d1afd39f2c39082d070f5835b65847ff65897ab17e5db4d80455065','2017-01-05 16:58:35'),('chris@gmail.com','5084f9b44772714f9e66df949ead8f9e024de7e3a44c3fa99cc8e69abe258476','2017-01-09 14:49:13');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `periodos`
--

DROP TABLE IF EXISTS `periodos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `periodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` timestamp NULL DEFAULT NULL,
  `fim` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fk_id_descricao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_periodos_descricao_periodo1_idx` (`fk_id_descricao`),
  CONSTRAINT `fk_periodos_descricao_periodo1` FOREIGN KEY (`fk_id_descricao`) REFERENCES `descricao_periodo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periodos`
--

LOCK TABLES `periodos` WRITE;
/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
INSERT INTO `periodos` VALUES (1,'2017-01-01 11:00:00','2017-03-01 21:13:00',NULL,'2017-02-14 16:47:40',1),(2,'2017-01-01 08:14:00','2017-02-02 20:14:00',NULL,'2017-02-14 16:47:40',2),(6,'2017-02-07 02:00:00','2017-02-07 02:00:00',NULL,'2017-02-14 16:47:40',6);
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professors`
--

DROP TABLE IF EXISTS `professors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `professors_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professors`
--

LOCK TABLES `professors` WRITE;
/*!40000 ALTER TABLE `professors` DISABLE KEYS */;
INSERT INTO `professors` VALUES (1,'Alexandre Zaghetto','alexandre','alexandre@cic.unb.br','$2y$10$.ZKetd9oToSPaUUDMDjD/Ogbm7XjUdN8E6.qoUIsKO84Zw81hYVF.',200,'lWq5okQYcR6FJnGin8rw9D32Vchnm3OE9hD6TjddTG56hXEUIOZC9hLbkSD7','2017-01-12 17:09:46','2017-02-10 15:14:28'),(2,'Eduardo Adilo Pelinson Alchieri','alchieri','alchieri@cic.unb.br','$2y$10$bqaJiRe3b40dSu7gNIlke.3thGNODYCHnBz1zR9Hhmj9nNpJciqsW',200,'jg65SwNHxc8QGZ9hvBMnRyRqAc9mxmghsNUurWBGvJocFELb7iBN5aoM2wPD','2017-01-31 17:45:33','2017-02-02 21:21:41'),(3,'Pedro de Azevedo Berger','berger','berger@cic.unb.br','$2y$10$kQTG5v.au2.TN8hm5rKhxecJuHatNkGlnruyXA6EyfTQ1y.d9vBsG',200,'ueYnlcpQgUsD5V3VxojXLOwsdPiZbgJJ4G1jvNY6soJKvuJvh278MynT475J','2017-01-31 17:47:35','2017-02-03 13:52:52'),(4,'Jorge Carlos Lucero','lucero','lucero@cic.unb.br','$2y$10$WLcYbTf0DmAKXkhSutoEI.pSPJv.qzuIFgP7UkM40sVCgX0amJbPK',200,'iB5m1OVw77FbtYTR8w4YhmRVuO9aZgSwHtPgXnNR45xT2wRx92qlgK8GjbnH','2017-01-31 18:18:29','2017-02-03 13:23:59'),(5,'Guilherme Novaes Ramos','gnramos','gnramos@cic.unb.br','$2y$10$NYB7DVCcOGt7nxzKMmpMYOQegMXOw9M7iej1Y.agVjy2vzaaT9.Lq',200,'AJRGAeoVsoO89L8Vj84jh7KPdMByFSFuQuIv0Kk6O0ywyQzBBSKpP3srudTB','2017-02-02 14:30:22','2017-02-02 21:48:02'),(6,'Alba Cristina M. de Melo','albamm','albamm@cic.unb.br','$2y$10$fgPB5QzWkctT3Jhkntdyq.ShXkP5sYRn5KVj9So7goc7pAIyBRvpC',200,'sXCwDtRoIBigFj1W0yaOtK0iceBV2hwoBWBm6PtXwsX2Z00padc4Xzepy8KR','2017-02-02 20:54:08','2017-02-02 21:06:25'),(7,'Aleteia Patricia Favacho de Araujo','aleteia','aleteia@cic.unb.br','$2y$10$wAB3nWmXDZ8RrtmweD.Ivu3l1u.Tjg.yZAFS4Iu8c5i7YNGqF3FbW',200,'ZL4lPQBsVXEAs650WRShADNHqRu0jaH4kIYP8WRJuvErX4ju8hwu21pMI9vs','2017-02-02 21:02:08','2017-02-02 21:07:18'),(8,'Andre Costa Drummond','andred','andred@cic.unb.br','$2y$10$4qA0lsrwcPi6EhYKRDB9heBlB/Uu2qAYBne/CT2S/x62dPv0GHM82',200,'h4W0C5mwzLile8KCebPGKFi6qB9KQ631uHHUQmb3oQlkW6TYytp4owFIFT63','2017-02-02 21:08:20','2017-02-02 21:08:54'),(9,'Bruno Luiggi Macchiavello Espinoza','bruno','macchiavello@unb.br','$2y$10$2.ePS/fhueu4HRAHKqChR.qacTJlglAALPzkyQeg3daoQAe0tk7O6',200,'ibtBgyYLn578W8AxsZ26Q37kwPFJBusa2KEFBkDJNaOEUqptY1A3Glc4sZDm','2017-02-02 21:08:59','2017-02-02 21:10:11'),(10,'Carla Denise Castanho','carlacastanho','carlacastanho@cic.unb.br','$2y$10$qmfJMpw7GfBZKwiyZqkw3Os0LT89TgNiCQZZ9PcP5q4R8dalPLdHi',200,'qHqQA6EgZpoDRjK7DgroP21qeAcFiEZwL7QKgm6Y1yeMmvq3D6s79NPZQpey','2017-02-02 21:10:17','2017-02-02 21:10:56'),(11,'Carla Maria Chagas C. Koike','ckoike','ckoike@cic.unb.br','$2y$10$e5yxIj0c8eFdf4nqY0ZZLeF086q2BHKQzoI9l23c/7dnvw./WehBO',200,'6NSfVsY5OGV4imF14Qp8u73fpe6D2QT7rynnZZRd8sMZd1MkSYHu96Om0KXz','2017-02-02 21:11:02','2017-02-02 21:12:23'),(12,'Celia Ghedini Ralha','ghedini','ghedini@cic.unb.br','$2y$10$MYxF1KyHEAkfYz6WEEbviOhTsjjIzN7IS47t8tXzwL2/A0tID4/3O',200,'AOoYJgEs1Y7EyOmUefQCT2UCt3JdmgsFNc1gYjaHylcx3Et9X8s9t8N5VONR','2017-02-02 21:12:27','2017-02-02 21:13:10'),(13,'Claudia Nalon','nalon','nalon@cic.unb.br','$2y$10$dmZthd3iRd7tViR1zglnk.lcByl1iTeyXGr021Py.CQElqjvQDbmO',200,'cbaaETZns1JSGl0WGvuKOgU1aYVABtzTJamEqFU7Lw1OaAyH9XYTCqbXR4W3','2017-02-02 21:13:14','2017-02-02 21:16:06'),(14,'Dibio Leandro Borges','dibio','dibio@cic.unb.br','$2y$10$GMly8IS/dWucD4wdf.DuoOE7t7KNz/JLQxikrgB4uX/VJ2F9BP96a',200,'vx3R4034A1gIPds44AeY2FVaOOTcPn1ApWmrzl1NIuqqeA17EGuIjhbn0mtg','2017-02-02 21:16:21','2017-02-02 21:19:38'),(15,'Edison Ishikawa','ishikawa','ishikawa@cic.unb.br','$2y$10$IPThe5vyEVxTLzCJi4OuE.pTOnWaWIeFL1YNySlMhqAjykUaL0pya',200,'DttZN8Bp5EMV7IRgi4I3JJEwA8zhVlcCad6dynSHUp9yXQIhCdDxZAuiMRJH','2017-02-02 21:19:42','2017-02-02 21:20:22'),(16,'Fernanda Lima','ferlima','ferlima@cic.unb.br','$2y$10$WYZKEB.EobwNdPMkZSopHO9tw84t26hpt5FBDD6vhM8YGBu2fEPfO',200,'c3qxRe1pKtF3sDgShwiAztAOU0B0MfJYbTz7tN4OZJGF69XCo5jo6Yq72n9v','2017-02-02 21:21:46','2017-02-02 21:23:24'),(17,'Felipe Borges Albuquerque','falbuquerque','falbuquerque@gmx.com','$2y$10$atSBrBe9SRg95LHejiCs/OuNJpHLF8srwEfuNme4SDVFRXi/RtcAW',400,'ZvniUa5773Jmh7LNwqR0WjAZ006xV0RzcetVr9OjvjvKqZfimZT9yhbuZHaf','2017-02-02 21:23:29','2017-02-02 21:24:22'),(18,'Fernando Albuquerque','fernando','fernando@cic.unb.br','$2y$10$.sF6jpwdrkTeD/uGgs4vB.YEuzM73ime.gonkGfsBQS5GXbIQE4nu',200,'wTWhA3kDmWJpya3BJDkkbEtJGzXvErYofCr1pAP5coKRxLlSl7xpyo6EdotI','2017-02-02 21:24:30','2017-02-02 21:25:06'),(19,'Flavio Barros Vidal','fbvidal','fbvidal@cic.unb.br','$2y$10$gOTYCk5B9sZtzo4WdjE/rOLGh/bKSjnlmfdBlL4ysvuoAIa4d3hXS',200,'65xffoROSMEW2ZkVA00lm7GKfZEhXhDWOEr0CjDbzbb7RnhiphsxeQ2FkoA4','2017-02-02 21:25:11','2017-02-02 21:26:58'),(20,'Flavio Leonardo Cavalcanti Moura','flavio','flavio@cic.unb.br','$2y$10$xvigGZhpLacg5kx3k3IC2uGRqggYtnZAX2i8k2EKQJlrS6bYE..HW',200,'uswt9AXBRZjlrA9boaS7w5E2b8WCJGL6bnXd78pAd1HLN27CvMTPOWslXWKk','2017-02-02 21:27:03','2017-02-02 21:27:39'),(21,'Francisco de Assis Cartaxo Pinheiro','facp','facp@cic.unb.br','$2y$10$323HNAciuLWmw7nyYWhsdeUdCim4NCJ43/CzMXigNYAjw4KlhFq0C',200,'ms6cNEsRTUkjDjwfSMyEkfJPweeU2LsQGk4PcgizMSMgNo4HXfxBnNWaFT4J','2017-02-02 21:38:42','2017-02-02 21:40:07'),(22,'Genaina Nunes Rodrigues','genaina','genaina@cic.unb.br','$2y$10$m1rhH1khETHTBaskZLJY2OgjyvWH7v7LB2o.AH2ZGRCGkU1isU20.',200,'d6JfAFdSlrRMVtLIb2E2rOnm4yzqHT7qp7Wr0m5B3YlX0qAmVNbNOYF24ex2','2017-02-02 21:40:18','2017-02-02 21:40:51'),(23,'George Luiz Medeiros Teodoro','teodoro','teodoro@cic.unb.br','$2y$10$Q2k6XW1INgw98EHz8Zd3yOmgMNU8bPW5LsAqgTmBH5e2kEH2billO',200,'k3PoHIAQjJmaYMdh0yYagK96G9Mgz1ZvnT9F8LbxZSyzUzb7touY8g6fc9LK','2017-02-02 21:41:52','2017-02-02 21:44:00'),(24,'Germana Menezes da Nobrega','gmnobrega','gmnobrega@cic.unb.br','$2y$10$XLZZ4DLSxp/D80WXIyKFzOzJQqHAI7ke3/jIGHYcX/nT7eUjDHUMi',200,'bjVHD8TrprR8H3vW4HRUaN1XSfq8HVONdbeWd0YKbAsIcQU9XMsEWtEZwXH5','2017-02-02 21:44:15','2017-02-02 21:44:40'),(25,'Jacir Luiz Bordim','bordim','bordim@cic.unb.br','$2y$10$zeNqVJ0pWQGWdPVB4vgowOzDURnzxps3k7EAZs6agKgEZQhs1c8ma',200,'u9px4UoqJFg83lJvffnAxLOQ8XNebzQZZw8w1F2o2TQzEmCkebJvzMihvAHG','2017-02-02 21:48:12','2017-02-02 21:48:57'),(26,'Jan Mendonca Correa','jan','jan@cic.unb.br','$2y$10$b2kxI/yfgqqe9nLVwnmFI.mLaOCrQOx14Jqfh.iOFFGNrxUjdugmK',200,'jLPFp4iAFkOSSNnjJlLfcSs9ZvNbjsC0fvqd8IM4NdwgReROG56zTJftdXLt','2017-02-02 21:49:49','2017-02-02 21:50:54'),(27,'Joao Jose Costa Gondim','gondim','gondim@cic.unb.br','$2y$10$A9xADDuIElj8x6p4PwXCvOZvT9IreALXyodJTvmsKooQFh9nvMRDG',200,'gpKVGivuBgg5FqQSXUWr1xNsl98rFF9isWw3cC9YEWIuSb3f8MgugAmC7Xu7','2017-02-02 21:51:05','2017-02-02 21:51:37'),(28,'Jorge Henrique Cabral Fernandes','jhcf','jhcf@cic.unb.br','$2y$10$dzhTAXrDeCJA2y6R4TPLregDBev/8W4m1rZyWH6LlzET.LoX.P9Ne',200,'kQPsv60vzNstso8qL38X1JDlRO0lhH3JvBJbrkxeXSBOp5DMroVgkPOFo9jT','2017-02-03 13:24:46','2017-02-03 13:26:36'),(29,'Leticia  Lopes Leite','llleite','llleite@unb.br','$2y$10$O6XvQobhqYzxVrX2JAYV5.NVWScok3DG4D2t12AhgQPS6oB.N902q',200,'Qf0ym6NFXQftczyFIKx7VaI8Mr8XNV4It5Qj8YMZgbsfBBiT8KaIJpKYqBRs','2017-02-03 13:27:15','2017-02-03 13:35:00'),(30,'Li Weigang','weigang','weigang@cic.unb.br','$2y$10$RoPEY5vMwJCuViQ1SYkHMOuBgxDp8KiFnNWP72y0cVcSQ8Ekeibu6',200,'ew1039ppMi0nyl3u9NipV03tgcNqTdKx68ZlJdO7PYzyPp9EDZuenxpiwPqe','2017-02-03 13:32:00','2017-02-03 13:32:24'),(31,'Marcelo Ladeira','mladeira','mladeira@cic.unb.br','$2y$10$FRUpNFB1pLaPUltwp.d8aebSv9I5eEhG.snbwJ9/NDu7T9CYMO9WS',200,'INb7Bf0pOb7VB4EPXw1EyySJXsasR5LCKPYzStpyQSWJl26VdhcMODGSJF8R','2017-02-03 13:38:17','2017-02-03 13:38:48'),(32,'Marcos Fagundes Caetano','caetano','caetano@cic.unb.br','$2y$10$/l31JAzdTygYssh8UtXfiegwl1XILwe3DH8006KKVkGzEI7m98BWy',200,'RrY8tDom4gXZXmugbRkFlEwECJWOsqRRCZwSVKQYfyDbIjYRWvOuJav5miyg','2017-02-03 13:39:37','2017-02-03 13:39:47'),(33,'Marcus Vinicius Lamar','lamar','lamar@cic.unb.br','$2y$10$AwS/dNQwdR6FYOObrBV4DuoO902cKLSMC4nalFd24Moa09fLOJ8bu',200,'aOI4tqyLrwr5Bc1QfCFECwdKoJ9r3xKpTNRC8JMOaVqcjYRla8RUikkBNl8q','2017-02-03 13:41:09','2017-02-03 13:41:41'),(34,'Maria de Fatima R. Brandao','fatima','fatima@cic.unb.br','$2y$10$PnCArkV0.xsh6NPYCpwiY..ahGCQUV6tfOKzPVTLcU00LQKm60kla',200,'9FToin4RRWr7JWZsyZUEB9GWez7Pn6Z59GELbAVrHEjMt56rbFLSHGH5MmwA','2017-02-03 13:42:31','2017-02-03 13:43:17'),(35,'Maria Emilia Machado T. Walter','mia','mia@cic.unb.br','$2y$10$VcEbpYf3CH6W1YUvjUdC1eqUpH2fXRNUaEELUc9ICcCkGnJ2U2hK.',200,'061tlXUYGBR5IXWrPehzrWk4DJ5EMlNhoP4Iw96fMPyYW76U8hXKHXrsOUdG','2017-02-03 13:44:10','2017-02-03 13:44:44'),(36,'Maristela Terto de Holanda','mholanda','mholanda@cic.unb.br','$2y$10$98ktIOtoOR3ctKVTbFPS1upmdqekrhD4MdO/vsTXXzzAvIK6dVSpS',200,'HgZFjjvMwn15bsMWovZxxL280SVQ3VIJ2bOu2mNoP1rygPNMdSeRVitdwnfa','2017-02-03 13:45:31','2017-02-03 14:04:24'),(37,'Mauricio Ayala Rincon ','ayala','ayala@unb.br','$2y$10$tD1QoZPLPI8SqrFxXMpjie6T12BeVSCkpmwxHeafrhawe./3h5ge2',200,'C9bxkZN4skthvXMneMBMX3pZmiTY8psCrdpiq0GMyhZavbQ0op7uEuUtsgyJ','2017-02-03 13:48:21','2017-02-03 13:49:08'),(38,'Mylene Christine Queiroz de Farias','mylene','mylene@cic.unb.br','$2y$10$S3PP3kdC4PriLvykBl6bS.HfXWtxLq/n7wY.xvL2bknNiuuaBLkNC',200,'6OeSDI7TxFtMEib4VKR614xL6jIlEsHR9q46sRmI0IrOJaZpKul3U7c0ykGi','2017-02-03 13:49:16','2017-02-03 13:49:34'),(39,'Pedro Antonio Dourado Rezende','rezende','rezende@cic.unb.br','$2y$10$X0dKlr.gYtVO7n0MSz03hOnNn1ndf1b34QmWM8OPrI4qTQvJykTXC',200,'AyhJ5kCNNPIXqXCWS5ax0boVaODMn9KRBK07EupM4ytQGqVvh5YgHlvoAFqQ','2017-02-03 13:50:23','2017-02-03 13:50:50'),(40,'Priscila America Solis M. Barreto','pris','pris@cic.unb.br','$2y$10$8G.OtpUOqNUbI7k2omOuR.F7J1t5JPL/fDHRA0jhPtnlw5v17aEOu',200,'q04YhN7AOTdHGcriFOMeh1AHc8K6dN05lbf5TnwXcFjl6Ae32yf787JuqAGE','2017-02-03 13:53:03','2017-02-03 13:53:10'),(41,'Ricardo Lopes de Queiroz','queiroz','queiroz@cic.unb.br','$2y$10$qCrIyWdSawvj8IRgxoXNzOqtWT6GITLaCymMZo9fFqb6rJ9q4GDEW',200,'iHhrJq71omrOqEmS2jlAayWYc7QpnPaSJOcxFJtwub0qgG1JbFUEbKdpdSq7','2017-02-03 13:57:16','2017-02-03 13:58:14'),(42,'Ricardo Pezzuol Jacobi','rjacobi','rjacobi@cic.unb.br','$2y$10$btdap94feHaRc.bTCq79jeDf9chcg5d.Yy007pZtVuj/pZRzXHvwS',200,'RfobrGXqttz7DvRu3cOYMBD0e81RPtIeHjsbIOZIhkBLXntKYyrWyjwtZtQ3','2017-02-03 13:58:25','2017-02-03 13:59:32'),(43,'Rodrigo Bonifacio de Almeida','rbonifacio','rbonifacio@cic.unb.br','$2y$10$5NiOL8I5AWDmD8NyorNyhuGnY7jcKPMVyUifTDZ8BcJn5BrUn8Fcu',200,'ixkQdtEGwF8ODSyeEI9AUqNeiP8Q8NSzHdlrj4Btz569MyY2vgRVBVjYt9tQ','2017-02-03 13:59:44','2017-02-03 14:00:27'),(44,'Vander Ramos Alves','valves','valves@cic.unb.br','$2y$10$4WoCJAXDc3M/ktThAozrOe.jJWmtpNqfUzIfJUqrZi6MAKyyzkthK',200,'XAtvnzU33JmXFeYO9X089zLyI8TNBnKaNmACzESt06wSkXoVXf9F63Pe7AGu','2017-02-03 14:01:07','2017-02-03 14:01:57'),(45,'Wilson Henrique Veneziano','wilsonhe','wilsonhe@unb.br','$2y$10$nRsX8jxbhhCn5eINDG5s3./1GxLHfutJEa.Op/t5Oh9/SpXLLxVRu',200,'1jtaeIdVIklNHKTq8iqZmQ2uLag3jicJJBYMWOiXsWqknwstaroQmNTntdaq','2017-02-03 14:02:10','2017-02-03 14:02:43');
/*!40000 ALTER TABLE `professors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_monitoria`
--

DROP TABLE IF EXISTS `status_monitoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_monitoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_monitoria`
--

LOCK TABLES `status_monitoria` WRITE;
/*!40000 ALTER TABLE `status_monitoria` DISABLE KEYS */;
INSERT INTO `status_monitoria` VALUES (1,'Pendente'),(2,'Pré-Selecionado'),(3,'Deferido'),(4,'Indeferido'),(5,'Aceito no SIGRA'),(6,'Recusado no SIGRA'),(7,'Registrado em outra disciplina'),(8,'Presente na primeira frequência');
/*!40000 ALTER TABLE `status_monitoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_turma`
--

DROP TABLE IF EXISTS `status_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_turma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_turma`
--

LOCK TABLES `status_turma` WRITE;
/*!40000 ALTER TABLE `status_turma` DISABLE KEYS */;
INSERT INTO `status_turma` VALUES (1,'Nenhuma ação realizada'),(2,'Monitores Selecionados'),(3,'Todas ações realizadas'),(4,'Primeira frequência feita'),(5,'Segunda frequência feita');
/*!40000 ALTER TABLE `status_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_disciplina`
--

DROP TABLE IF EXISTS `tipo_disciplina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_disciplina`
--

LOCK TABLES `tipo_disciplina` WRITE;
/*!40000 ALTER TABLE `tipo_disciplina` DISABLE KEYS */;
INSERT INTO `tipo_disciplina` VALUES (1,'obr'),(2,'opt');
/*!40000 ALTER TABLE `tipo_disciplina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turmas`
--

DROP TABLE IF EXISTS `turmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turmas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `turma` varchar(255) CHARACTER SET utf8 NOT NULL,
  `professor` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fk_cod_disciplina` int(11) unsigned NOT NULL,
  `fk_status_turma_id` int(11) NOT NULL DEFAULT '3',
  `qnt_bolsas` int(11) NOT NULL DEFAULT '0',
  `fk_vagas_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_turmas_disciplinas1_idx` (`fk_cod_disciplina`),
  KEY `fk_turmas_status_turma1_idx` (`fk_status_turma_id`),
  KEY `fk_turmas_vagas1_idx` (`fk_vagas_id`),
  CONSTRAINT `fk_turmas_disciplinas1` FOREIGN KEY (`fk_cod_disciplina`) REFERENCES `disciplinas` (`cod_disciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmas_status_turma1` FOREIGN KEY (`fk_status_turma_id`) REFERENCES `status_turma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_turmas_vagas1` FOREIGN KEY (`fk_vagas_id`) REFERENCES `vagas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turmas`
--

LOCK TABLES `turmas` WRITE;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` VALUES (1,'A','JORGE CARLOS LUCERO',113450,3,4,0),(2,'C','FLAVIO LEONARDO CAVALCANTI DE MOURA',113450,1,0,0),(3,'B','DANIEL DA SILVA SOUZA',113450,1,0,0),(4,'A','MARCUS VINICIUS LAMAR',113468,1,0,0),(5,'B','RAFAEL MARCONI RAMOS',113468,1,0,0),(6,'A','CARLA DENISE CASTANHO',113476,1,0,5),(7,'C','GUILHERME NOVAES RAMOS',113476,3,0,0),(8,'B','DIBIO LEANDRO BORGES',113476,1,0,0),(9,'E','ALEXANDRE ZAGHETTO',113476,3,0,0),(10,'D','FRANCISCO DE ASSIS CARTAXO PINHEIRO',113476,1,0,0),(11,'F','FRANCISCO DE ASSIS CARTAXO PINHEIRO',113476,1,0,0),(12,'H','ALEXANDRE ZAGHETTO',113476,3,0,0),(13,'A','MARIA DE FATIMA RAMOS BRANDAO',113492,1,0,0),(14,'A','EDISON ISHIKAWA',113913,1,0,0),(15,'C','ANDRÉ COSTA DRUMMOND',113913,1,0,0),(16,'B','EDISON ISHIKAWA',113913,1,0,0),(17,'E','ALEXANDRE ZAGHETTO',113913,3,0,0),(18,'D','ALEXANDRE ZAGHETTO',113913,3,0,0),(19,'G','EDISON ISHIKAWA',113913,1,0,0),(20,'F','EDISON ISHIKAWA',113913,1,0,0),(21,'I','EDISON ISHIKAWA',113913,1,0,0),(22,'H','ANDRÉ COSTA DRUMMOND',113913,1,0,0),(23,'K','EDISON ISHIKAWA',113913,1,0,0),(24,'J','ANDRÉ COSTA DRUMMOND',113913,1,0,0),(25,'M','EDISON ISHIKAWA',113913,1,0,0),(26,'L','EDISON ISHIKAWA',113913,1,0,0),(27,'N','ANDRÉ COSTA DRUMMOND',113913,1,0,0),(28,'A','ALBA CRISTINA MAGALHAES ALVES DE MELO',116068,1,0,0),(29,'A','EDGARD COSTA OLIVEIRA',116297,1,0,0),(30,'C','CARLA DENISE CASTANHO',116297,1,0,0),(31,'B','CELIA GHEDINI RALHA',116297,1,0,0),(32,'E','EDUARDO ADILIO PELINSON ALCHIERI',116297,1,0,0),(33,'D','RODRIGO BONIFÁCIO DE ALMEIDA',116297,1,0,0),(34,'G','JORGE HENRIQUE CABRAL FERNANDES',116297,1,0,0),(35,'F','WILSON HENRIQUE VENEZIANO',116297,1,0,0),(36,'I','MARCELO LADEIRA',116297,1,0,0),(37,'H','MARISTELA TERTO DE HOLANDA',116297,1,0,0),(38,'K','JACIR LUIZ BORDIM',116297,1,0,0),(39,'J','GENAINA NUNES RODRIGUES',116297,1,0,0),(40,'N','EDISON ISHIKAWA',116297,1,0,0),(41,'A','EDUARDO ADILIO PELINSON ALCHIERI',116319,1,0,0),(42,'C','GERMANA MENEZES DA NOBREGA',116319,1,0,0),(43,'B','MARCOS FAGUNDES CAETANO',116319,1,0,0),(44,'E','GEORGE LUIZ MEDEIROS TEODORO',116319,1,0,0),(45,'F','LI WEIGANG',116319,1,0,0),(46,'A','GERMANA MENEZES DA NOBREGA',116327,1,0,0),(47,'C','ANDRÉ COSTA DRUMMOND',116327,1,0,0),(48,'B','PEDRO DE AZEVEDO BERGER',116327,3,0,0),(49,'A','MARCELO LADEIRA',116343,1,0,0),(50,'B','VANDER RAMOS ALVES',116343,1,0,0),(51,'A','CARLA MARIA CHAGAS E CAVALCANTE KOIKE',116351,1,0,0),(52,'C','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116351,1,0,0),(53,'B','CARLA MARIA CHAGAS E CAVALCANTE KOIKE',116351,1,0,0),(54,'E','MARCELO GRANDI MANDELLI',116351,1,0,0),(55,'D','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116351,1,0,0),(56,'G','MARCELO GRANDI MANDELLI',116351,1,0,0),(57,'F','MARCELO GRANDI MANDELLI',116351,1,0,0),(58,'H','CARLA MARIA CHAGAS E CAVALCANTE KOIKE',116351,1,0,0),(59,'A','PEDRO ANTONIO DOURADO DE REZENDE',116360,1,0,0),(60,'A','MARISTELA TERTO DE HOLANDA',116378,1,0,0),(61,'B','PEDRO DE AZEVEDO BERGER',116378,2,0,0),(62,'A','MARCUS VINICIUS LAMAR',116394,1,0,0),(63,'C','RICARDO PEZZUOL JACOBI',116394,1,0,0),(64,'B','FLAVIO DE BARROS VIDAL',116394,1,0,0),(65,'D','FLAVIO DE BARROS VIDAL',116394,1,0,0),(66,'A','CELIA GHEDINI RALHA',116416,1,0,0),(67,'B','FERNANDA LIMA',116416,1,0,0),(68,'A','JOÃO JOSÉ COSTA GONDIM',116424,1,0,0),(69,'A','MARCELO LADEIRA',116432,1,0,0),(70,'B','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116432,1,0,0),(71,'A','FERNANDA LIMA',116441,1,0,0),(72,'B','GENAINA NUNES RODRIGUES',116441,1,0,0),(73,'A','CLAUDIA NALON',116459,1,0,0),(74,'A','ALETEIA PATRICIA FAVACHO DE ARAUJO VON PAUMGARTTEN',116467,1,0,0),(75,'E','JACIR LUIZ BORDIM',116475,1,0,0),(76,'Q','WILSON HENRIQUE VENEZIANO',116521,1,0,0),(77,'B','MARCELO LADEIRA',116521,1,0,0),(78,'EI','EDISON ISHIKAWA',116521,1,0,0),(79,'I','MARISTELA TERTO DE HOLANDA',116521,1,0,0),(80,'L','MARCUS VINICIUS LAMAR',116521,1,0,0),(81,'CE','CELIA GHEDINI RALHA',116521,1,0,0),(82,'GG','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116521,1,0,0),(83,'MM','MARIA EMILIA MACHADO TELLES WALTER',116521,1,0,0),(84,'S','FLAVIO DE BARROS VIDAL',116521,1,0,0),(85,'R','ALETEIA PATRICIA FAVACHO DE ARAUJO VON PAUMGARTTEN',116521,1,0,0),(86,'JJ','JAN MENDONCA CORREA',116521,1,0,0),(87,'E','CARLA DENISE CASTANHO',116521,1,0,0),(88,'AZ','ALEXANDRE ZAGHETTO',116521,3,0,0),(89,'A','PEDRO ANTONIO DOURADO DE REZENDE',116530,1,0,0),(90,'A','MARCOS FAGUNDES CAETANO',116572,1,0,0),(91,'A','GERSON HENRIQUE PFITSCHER',116599,1,0,0),(92,'E','FRANCISCO DE ASSIS CARTAXO PINHEIRO',116629,1,0,0),(93,'D','MARIA EMILIA MACHADO TELLES WALTER',116629,1,0,0),(94,'I','JACIR LUIZ BORDIM',116629,1,0,0),(95,'H','MARCELO LADEIRA',116629,1,0,0),(96,'DD','RODRIGO BONIFÁCIO DE ALMEIDA',116629,1,0,0),(97,'L','MARCUS VINICIUS LAMAR',116629,1,0,0),(98,'O','CARLA DENISE CASTANHO',116629,1,0,0),(99,'GB','GEOVANY ARAUJO BORGES',116629,1,0,0),(100,'Z','GENAINA NUNES RODRIGUES',116629,1,0,0),(101,'DD','CELIA GHEDINI RALHA',116661,1,0,0),(102,'M','GUILHERME NOVAES RAMOS',116661,1,0,0),(103,'L','MARIA DE FATIMA RAMOS BRANDAO',116661,1,0,0),(104,'GG','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116661,1,0,0),(105,'W','WILSON HENRIQUE VENEZIANO',116661,1,0,0),(106,'Z','RODRIGO BONIFÁCIO DE ALMEIDA',116661,1,0,0),(107,'A','RAFAEL MARCONI RAMOS',116726,1,0,0),(108,'B','JORGE HENRIQUE CABRAL FERNANDES',116726,1,0,0),(109,'AA','MARCUS VINICIUS LAMAR',116734,1,0,0),(110,'W','WILSON HENRIQUE VENEZIANO',116734,1,0,0),(111,'EE','FLAVIO DE BARROS VIDAL',116734,1,0,0),(112,'H','JACIR LUIZ BORDIM',116734,1,0,0),(113,'LL','EDISON ISHIKAWA',116734,1,0,0),(114,'L','MARIA DE FATIMA RAMOS BRANDAO',116734,1,0,0),(115,'O','JOÃO JOSÉ COSTA GONDIM',116734,1,0,0),(116,'N','FERNANDO ANTONIO DE ARAUJO CHACON DE ALBUQUERQUE',116734,1,0,0),(117,'HH','EDUARDO ADILIO PELINSON ALCHIERI',116734,1,0,0),(118,'U','MARISTELA TERTO DE HOLANDA',116734,1,0,0),(119,'T','ALETEIA PATRICIA FAVACHO DE ARAUJO VON PAUMGARTTEN',116734,1,0,0),(120,'FF','CELIA GHEDINI RALHA',116734,1,0,0),(121,'V','GENAINA NUNES RODRIGUES',116734,1,0,0),(122,'X','JAN MENDONCA CORREA',116734,1,0,0),(123,'A','FLAVIO JOSÉ FERRO BARROS',116793,1,0,0),(124,'I','DANIEL DA SILVA SOUZA',116793,1,0,0),(125,'B','LETICIA LOPES LEITE',116823,1,0,0),(126,'B','LETICIA LOPES LEITE',116831,1,0,0),(127,'B','WILSON HENRIQUE VENEZIANO',116840,1,0,0),(128,'A','JORGE CARLOS LUCERO',116882,1,0,0),(129,'A','MARIA DE FATIMA RAMOS BRANDAO',116891,1,0,0),(130,'C','MARISTELA TERTO DE HOLANDA',116891,1,0,0),(131,'B','LETICIA LOPES LEITE',116891,1,0,0),(132,'W','WILSON HENRIQUE VENEZIANO',116891,1,0,0),(133,'A','CARLA DENISE CASTANHO',116904,1,0,0),(134,'EE','WILSON HENRIQUE VENEZIANO',116904,1,0,0),(135,'H','EDUARDO ADILIO PELINSON ALCHIERI',116904,1,0,0),(136,'K','MARIA EMILIA MACHADO TELLES WALTER',116904,1,0,0),(137,'J','ALETEIA PATRICIA FAVACHO DE ARAUJO VON PAUMGARTTEN',116904,1,0,0),(138,'L','MARIA DE FATIMA RAMOS BRANDAO',116904,1,0,0),(139,'S','JAN MENDONCA CORREA',116904,1,0,0),(140,'JJ','GENAINA NUNES RODRIGUES',116904,1,0,0),(141,'Z','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116904,1,0,0),(142,'XX','EDISON ISHIKAWA',116904,1,0,0),(143,'LL','ANDRÉ COSTA DRUMMOND',116904,1,0,0),(144,'A','RODRIGO BONIFÁCIO DE ALMEIDA',116912,1,0,0),(145,'C','JAN MENDONCA CORREA',116912,1,0,0),(146,'B','RODRIGO BONIFÁCIO DE ALMEIDA',116912,1,0,0),(147,'E','FRANCISCO DE ASSIS CARTAXO PINHEIRO',116912,1,0,0),(148,'D','GENAINA NUNES RODRIGUES',116912,1,0,0),(149,'G','CELIA GHEDINI RALHA',116912,1,0,0),(150,'FF','FLAVIO DE BARROS VIDAL',116912,1,0,0),(151,'AA','JAN MENDONCA CORREA',116921,1,0,0),(152,'Q','MARIA EMILIA MACHADO TELLES WALTER',116921,1,0,0),(153,'QQ','BRUNO LUIGGI MACCHIAVELLO ESPINOZA',116921,1,0,0),(154,'D','PEDRO ANTONIO DOURADO DE REZENDE',116921,1,0,0),(155,'G','FRANCISCO DE ASSIS CARTAXO PINHEIRO',116921,1,0,0),(156,'I','JACIR LUIZ BORDIM',116921,1,0,0),(157,'W','CARLA DENISE CASTANHO',116921,1,0,0),(158,'DD','MARCUS VINICIUS LAMAR',116921,1,0,0),(159,'II','ALEXANDRE ZAGHETTO',116921,3,0,0),(160,'MM','MARISTELA TERTO DE HOLANDA',116921,1,0,0),(161,'YY','EDISON ISHIKAWA',116921,1,0,0),(162,'NN','GENAINA NUNES RODRIGUES',116921,1,0,0),(163,'U','CELIA GHEDINI RALHA',116921,1,0,0),(164,'VV','CLAUDIA NALON',116921,1,0,0),(165,'V','FLAVIO LEONARDO CAVALCANTI DE MOURA',116921,1,0,0),(166,'A','FERNANDO ANTONIO DE ARAUJO CHACON DE ALBUQUERQUE',117196,1,0,0),(167,'A','WILSON HENRIQUE VENEZIANO',117251,1,0,0),(168,'A','GERSON HENRIQUE PFITSCHER',117315,1,0,0),(169,'A','MAURICIO AYALA RINCON',117366,1,0,0),(170,'B','CLAUDIA NALON',117366,1,0,0),(171,'D','FLAVIO LEONARDO CAVALCANTI DE MOURA',117366,1,0,0),(172,'A','RICARDO PEZZUOL JACOBI',117391,1,0,0),(173,'A','PRISCILA AMERICA SOLIS MENDEZ BARRETO',117528,1,0,0),(174,'A','JAN MENDONCA CORREA',117536,1,0,0),(175,'A','RICARDO LOPES DE QUEIROZ',117609,1,0,0),(176,'A','FLAVIO JOSÉ FERRO BARROS',117889,1,0,0),(177,'C','RODRIGO BONIFÁCIO DE ALMEIDA',117889,1,0,0),(178,'B','FERNANDO ANTONIO DE ARAUJO CHACON DE ALBUQUERQUE',117889,1,0,0),(179,'D','RODRIGO BONIFÁCIO DE ALMEIDA',117889,1,0,0),(180,'A','CARLA MARIA CHAGAS E CAVALCANTE KOIKE',200379,1,0,0),(181,'A','JAN MENDONCA CORREA',201600,1,0,0),(182,'A','PRISCILA AMERICA SOLIS MENDEZ BARRETO',204315,1,0,0),(183,'A','JACIR LUIZ BORDIM',204323,1,0,0),(184,'A','JOÃO JOSÉ COSTA GONDIM',204331,1,0,0),(185,'A','RICARDO LOPES DE QUEIROZ',206075,1,0,0),(186,'A','RICARDO ZELENOVSKY',207314,1,0,0),(187,'A','MARIA EMILIA MACHADO TELLES WALTER',207322,1,0,0),(188,'E','RAFAEL TIMOTEO DE SOUSA JUNIOR',207322,1,0,0),(189,'D','MARISTELA TERTO DE HOLANDA',207322,1,0,0),(190,'I','JOÃO JOSÉ COSTA GONDIM',207322,1,0,0),(191,'L','MARISTELA TERTO DE HOLANDA',207322,1,0,0),(192,'O','RICARDO PEZZUOL JACOBI',207322,1,0,0),(193,'Q','MARCUS VINICIUS LAMAR',207322,1,0,0),(194,'S','MARCOS FAGUNDES CAETANO',207322,1,0,0),(195,'U','RICARDO ZELENOVSKY',207322,1,0,0),(196,'T','MYLENE CHRISTINE QUEIROZ DE FARIAS',207322,1,0,0),(197,'V','LI WEIGANG',207322,1,0,0),(198,'X','CLAUDIA NALON',207322,1,0,0),(199,'A','GENAINA NUNES RODRIGUES',207331,1,0,0),(200,'C','MARIA EMILIA MACHADO TELLES WALTER',207331,1,0,0),(201,'H','ALBA CRISTINA MAGALHAES ALVES DE MELO',207331,1,0,0),(202,'J','ALEXANDRE ZAGHETTO',207331,3,0,0),(203,'O','FERNANDA LIMA',207331,1,0,0),(204,'N','FLAVIO DE BARROS VIDAL',207331,1,0,0),(205,'Q','RAFAEL TIMOTEO DE SOUSA JUNIOR',207331,1,0,0),(206,'P','DANIEL CHAVES CAFÉ',207331,1,0,0),(207,'S','RICARDO PEZZUOL JACOBI',207331,1,0,0),(208,'R','JACIR LUIZ BORDIM',207331,1,0,0),(209,'JJ','ALEXANDRE ZAGHETTO',207331,3,0,0),(210,'A','RICARDO ZELENOVSKY',207438,1,0,0);
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8 NOT NULL,
  `rg` varchar(11) CHARACTER SET utf8 NOT NULL,
  `matricula` varchar(11) CHARACTER SET utf8 NOT NULL,
  `fk_banco` int(11) DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`matricula`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_cpf_unique` (`cpf`),
  UNIQUE KEY `users_rg_unique` (`rg`),
  UNIQUE KEY `users_matricula_unique` (`matricula`),
  KEY `fk_banco` (`fk_banco`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`fk_banco`) REFERENCES `dados_bancarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=494 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (429,'Alexandre Saran Rodrigues','16000001@gmail.com','123456','2222317','1111206','16000001',2,NULL,NULL,NULL),(430,'Amanda Oliveira Alves','16000002@gmail.com','123456','2222289','1111178','16000002',2,NULL,NULL,NULL),(431,'Ana Carolina Lopes de Jesus','16000003@gmail.com','123456','2222333','1111222','16000003',2,NULL,NULL,NULL),(432,'André Filipe da Conceição','16000004@gmail.com','123456','2222257','1111146','16000004',2,NULL,NULL,NULL),(433,'Andre Luiz de Moura Ramos Bittencourt','16000005@gmail.com','123456','2222280','1111169','16000005',2,NULL,NULL,NULL),(434,'Andrei Felipe Silveira Sousa','16000006@gmail.com','123456','2222241','1111130','16000006',2,NULL,NULL,NULL),(435,'Antônio Henrique de Moura Rodrigues','16000007@gmail.com','123456','2222271','1111160','16000007',2,NULL,NULL,NULL),(436,'Camila Ferreira Thé Pontes','16000008@gmail.com','123456','2222231','1111120','16000008',2,NULL,NULL,NULL),(437,'Camila Imbuzeiro Camargo','16000009@gmail.com','123456','2222261','1111150','16000009',2,NULL,NULL,NULL),(438,'Carlos Alberto Alvares Rocha','16000010@gmail.com','123456','2222347','1111236','16000010',2,NULL,NULL,NULL),(439,'Christian Luís Marcondes Costa ','16000011@gmail.com','123456','2222247','1111136','16000011',2,NULL,NULL,NULL),(440,'Daltro Oliveira Vinuto','16000012@gmail.com','123456','2222311','1111200','16000012',2,NULL,NULL,NULL),(441,'Daniel Garcia da Costa','16000013@gmail.com','123456','2222336','1111225','16000013',2,NULL,NULL,NULL),(442,'Débora de Faria Pereira Senise','16000014@gmail.com','123456','2222239','1111128','16000014',2,NULL,NULL,NULL),(443,'Eduardo Castro Serra ','16000015@gmail.com','123456','2222342','1111231','16000015',2,NULL,NULL,NULL),(444,'Elton Araujo de Castro','16000016@gmail.com','123456','2222335','1111224','16000016',2,NULL,NULL,NULL),(445,'Emmanuel Gustavo Rinaldi Perotto','16000017@gmail.com','123456','2222292','1111181','16000017',2,NULL,NULL,NULL),(446,'Erika Japiassu Albuquerque','16000018@gmail.com','123456','2222356','1111245','16000018',2,NULL,NULL,NULL),(447,'Fernando Barbosa Cardoso','16000019@gmail.com','123456','2222295','1111184','16000019',2,NULL,NULL,NULL),(448,'Flávio Henrique Rocha e Silva','16000020@gmail.com','123456','2222355','1111244','16000020',2,NULL,NULL,NULL),(449,'Gabriel Lobão Barroso de Souza','16000021@gmail.com','123456','2222278','1111167','16000021',2,NULL,NULL,NULL),(450,'Gabriel Mesquita de Araujo','16000022@gmail.com','123456','2222235','1111124','16000022',2,NULL,NULL,NULL),(451,'Gabriel Oliveira Taumaturgo','16000023@gmail.com','123456','2222345','1111234','16000023',2,NULL,NULL,NULL),(452,'Gabriel Santos Pereira','16000024@gmail.com','123456','2222341','1111230','16000024',2,NULL,NULL,NULL),(453,'Gabriela da Silva Lopes','16000025@gmail.com','123456','2222337','1111226','16000025',2,NULL,NULL,NULL),(454,'Guilherme Caetano Gonçalves','16000026@gmail.com','123456','2222262','1111151','16000026',2,NULL,NULL,NULL),(455,'Henrique Brant de Moraes Palmeirão Alvarenga ','16000027@gmail.com','123456','2222284','1111173','16000027',2,NULL,NULL,NULL),(456,'Hugo Nascimento Fonseca','16000028@gmail.com','123456','2222332','1111221','16000028',2,NULL,NULL,NULL),(457,'Iago Lobo Ribeiro de Moraes','16000029@gmail.com','123456','2222272','1111161','16000029',2,NULL,NULL,NULL),(458,'Icaro Marcelino Miranda','16000030@gmail.com','123456','2222273','1111162','16000030',2,NULL,NULL,NULL),(459,'Jadiel Teófilo Amorim de Oliveira','16000031@gmail.com','123456','2222281','1111170','16000031',2,NULL,NULL,NULL),(460,'João Paulo Costa de Araujo','16000032@gmail.com','123456','2222352','1111241','16000032',2,NULL,NULL,NULL),(461,'José Luiz Gomes Nogueira ','16000033@gmail.com','123456','2222265','1111154','16000033',2,NULL,NULL,NULL),(462,'José Marcos da Silva Leite','16000034@gmail.com','123456','2222359','1111248','16000034',2,NULL,NULL,NULL),(463,'Juscelino Diógenes Santana ','16000035@gmail.com','123456','2222360','1111249','16000035',2,NULL,NULL,NULL),(464,'Lucas Cruz Torreão','16000036@gmail.com','123456','2222250','1111139','16000036',2,NULL,NULL,NULL),(465,'Luís Eduardo Luz Silva','16000037@gmail.com','123456','2222249','1111138','16000037',2,NULL,NULL,NULL),(466,'Luis Felipe Braga Gebrim Silva','16000038@gmail.com','123456','2222338','1111227','16000038',2,NULL,NULL,NULL),(467,'Marcelo André Winkler','16000039@gmail.com','123456','2222314','1111203','16000039',2,NULL,NULL,NULL),(468,'Marcos Paulo Maciel Bezerra Diniz','16000040@gmail.com','123456','2222324','1111213','16000040',2,NULL,NULL,NULL),(469,'Matheus Rosendo Pedreira','16000041@gmail.com','123456','2222303','1111192','16000041',2,NULL,NULL,NULL),(470,'Matheus Tarchetti Peixoto','16000042@gmail.com','123456','2222248','1111137','16000042',2,NULL,NULL,NULL),(471,'Pablo Barbosa dos santos ','16000043@gmail.com','123456','2222306','1111195','16000043',2,NULL,NULL,NULL),(472,'Paulo Borges Teixeira Neto','16000044@gmail.com','123456','2222244','1111133','16000044',2,NULL,NULL,NULL),(473,'Paulo Victor Gonçalves Farias','16000045@gmail.com','123456','2222255','1111144','16000045',2,NULL,NULL,NULL),(474,'Rafael Cascardo Campos','16000046@gmail.com','123456','2222297','1111186','16000046',2,NULL,NULL,NULL),(475,'Raphael Rodrigues Pereira','16000047@gmail.com','123456','2222270','1111159','16000047',2,NULL,NULL,NULL),(476,'Rebeca Andrade Baldomir','16000048@gmail.com','123456','2222293','1111182','16000048',2,NULL,NULL,NULL),(477,'Renato Carlos Pinto','16000049@gmail.com','123456','2222238','1111127','16000049',2,NULL,NULL,NULL),(478,'Rodrigo Demetrio Plama','16000050@gmail.com','123456','2222245','1111134','16000050',2,NULL,NULL,NULL),(479,'Rodrigo Matias Xavier','16000051@gmail.com','123456','2222283','1111172','16000051',2,NULL,NULL,NULL),(480,'Rogério da Rocha Feitoza','16000052@gmail.com','123456','2222226','1111115','16000052',2,NULL,NULL,NULL),(481,'Rômulo Pires Saraiva','16000053@gmail.com','123456','2222310','1111199','16000053',2,NULL,NULL,NULL),(482,'SAMUEL SILVINO RIBEIRO','16000054@gmail.com','123456','2222225','1111114','16000054',2,NULL,NULL,NULL),(483,'Samuel Vinicius Vieira Pala','16000055@gmail.com','123456','2222243','1111132','16000055',2,NULL,NULL,NULL),(484,'Thiago Luis Rodrigues Pinho','16000056@gmail.com','123456','2222334','1111223','16000056',2,NULL,NULL,NULL),(485,'Uriel de Barcelos Conceição Silva','16000057@gmail.com','123456','2222279','1111168','16000057',2,NULL,NULL,NULL),(486,'Victória Goularte Resende','16000058@gmail.com','123456','2222301','1111190','16000058',2,NULL,NULL,NULL),(487,'Yero Távora Vieira','16000059@gmail.com','123456','2222298','1111187','16000059',2,NULL,NULL,NULL),(488,'Yuri Barcellos Galli','16000060@gmail.com','123456','2222294','1111183','16000060',2,NULL,NULL,NULL),(489,'Chris','chris@gmail.com','$2y$10$JCa2ki85C4iWRDD2Hp2uEOPw5ajOua00fudqERX5PTBurRKOvSxSm','05456238128','30812','150153538',NULL,'nG2G369eYKTZnNnD39zqFuAP8sIrBaWlzJrOC1m5dI3zTdDXR8ODK9aW0aBZ','2017-01-31 19:50:44','2017-02-22 20:07:50'),(490,'joazinho aaaaaaaaaaaaaaaaaaaa ','gnramos@unb.br','$2y$10$bn7PLXISrfQ67y3tKrbHZeP0G6rqUvonF/Ci6nvFe6NEE1MT1KaQq','12345678911','12345','123123',15,'L8gvjUIo1oJXJ15sLj9oL3sWEnlLmAoVzuks4El5S3UiUilb84ZLlL1rz3qs','2017-02-02 14:15:39','2017-02-07 13:08:17'),(491,'Caio Matheus','caio@gmail.com','$2y$10$u.OIN0SZWze3rZ/pM0oS7eGxRssW6TLUNIsySKbJH28ThFTqPRJWC','45465468798','1346797','130050725',16,'IHXzYXy9R9KC0imGY5gpqDvalLAxl7n5JRIi5Ilovl4p4lQ5XLQcpbKQQSO3','2017-02-02 17:45:06','2017-02-22 20:07:16'),(492,'José Valdy','valdy@gmail.com','$2y$10$YcO93OsJRuoKMWiiXlBsruFqPSQriMixhhPIlEdDLz.bsDwT/wuOy','04105584197','123avb','091236589',NULL,'VSfVh2YJVqh81yStRSPmgX04KjwsVSHLcu9wSWiVkdG1fXpDVayYKcVBdZWd','2017-02-02 17:50:08','2017-02-02 19:20:35'),(493,'Luis','luis@gmail.com','$2y$10$aKBEpBFVRvri1DicixQ.s.Nqf/faICB6U/FiN5yb.j9sDbeQ6DSSm','45678912345','456123','123698789',NULL,'F6qUTKuUEDu6eDBtQrYiXnKbAcMOVvi4uqr7XZU9RvQ0jEJk4HCALgaGTVoM','2017-02-02 20:48:19','2017-02-02 20:50:47');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vagas`
--

DROP TABLE IF EXISTS `vagas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vagas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_total` int(11) NOT NULL DEFAULT '0',
  `t_ocupadas` int(11) NOT NULL DEFAULT '0',
  `t_restantes` int(11) NOT NULL DEFAULT '0',
  `c_total` int(11) NOT NULL DEFAULT '0',
  `c_ocupadas` int(11) NOT NULL DEFAULT '0',
  `c_restantes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vagas`
--

LOCK TABLES `vagas` WRITE;
/*!40000 ALTER TABLE `vagas` DISABLE KEYS */;
INSERT INTO `vagas` VALUES (5,50,48,2,0,0,0);
/*!40000 ALTER TABLE `vagas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-22 14:12:21
