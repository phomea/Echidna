# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.12-MariaDB-10.2.12+maria~jessie)
# Database: cartiamotwig
# Generation Time: 2018-07-19 22:07:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table api
# ------------------------------------------------------------

DROP TABLE IF EXISTS `api`;

CREATE TABLE `api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text DEFAULT NULL,
  `applicazione` text DEFAULT NULL,
  `metodo` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `mappa_parametri` text DEFAULT NULL,
  `associazione_parametri` text DEFAULT NULL,
  `colonne_risultato` text DEFAULT NULL,
  `public_token` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table applicazioni
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicazioni`;

CREATE TABLE `applicazioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicazione` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table articolo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `articolo`;

CREATE TABLE `articolo` (
  `id` int(11) NOT NULL,
  `autore` int(11) DEFAULT NULL,
  `titolo` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `contenuto` longtext DEFAULT NULL,
  `riassunto` mediumtext DEFAULT NULL,
  `ordine` int(11) DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `data_creazione` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table banner
# ------------------------------------------------------------

DROP TABLE IF EXISTS `banner`;

CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` text DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `contenuto` longtext DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `hook` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;

INSERT INTO `banner` (`id`, `titolo`, `tipo`, `link`, `contenuto`, `id_media`, `hook`, `alt`)
VALUES
	(1,'Banner personalizzazione modificatgo','top-page','','',4,'',''),
	(2,'Banner chi siamo','TOP-PAGE','',NULL,5,'',NULL),
	(3,'Banner pagina contatti','top-page','',NULL,6,'',NULL),
	(4,'LIVE-PREVIEW-TOP-PAGE','','',NULL,7,'',NULL),
	(5,'FAQ','','',NULL,8,'',NULL),
	(6,'COME FUNZIONA','','',NULL,9,'',NULL),
	(7,'METODI DI PAGAMENTO','','',NULL,10,'',NULL),
	(8,'RESI-&-RECESSI','','',NULL,11,'',NULL),
	(9,'RICHIEDI-ASSISTENZA','','',NULL,12,'',NULL),
	(10,'CAMPIONE-GRATUITO','','',NULL,13,'',NULL),
	(11,'COLLABORA-CON','','',NULL,14,'',NULL),
	(12,'Lasciati ispirare','','',NULL,15,'',NULL),
	(13,'Banner Save the children','','http://cartiamo.it/collaborazione-save-the-children',NULL,17,'','Partecipazioni di matrimonio save the children'),
	(14,'Matrimonio classico','','',NULL,45,'','Partecipazioni di matrimonio classiche'),
	(15,'La prima comunione','','https://cartiamo.it/auguri-prima-comunione',NULL,60,'','Auguri prima comunione'),
	(16,'Banner idea','','',NULL,61,'','Idee matrimonio');

/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `entity` text DEFAULT NULL,
  `entity_id` text DEFAULT NULL,
  `descrizione` longtext DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `ordine` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;

INSERT INTO `categoria` (`id`, `nome`, `slug`, `entity`, `entity_id`, `descrizione`, `id_media`, `ordine`)
VALUES
	(1,'Il Matrimonio perfetto','il-matrimonio-perfetto',NULL,NULL,'<p>Non sai <strong>come organizzare il matrimonio perfetto</strong>? In questa rubrica scriveremo tante <strong>idee matrimonio</strong> che potranno servirti per organizzare il tuo <em>matrimonio perfetto</em>!&nbsp;</p>\r\n<p>Dai matrimoni invernali a quelli country, casual o, perch&egrave; no, sportivi! Lasciati ispirare e preparati per il tuo giorno perfetto insieme a noi!</p>',27,NULL);

/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cl_articolo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cl_articolo`;

CREATE TABLE `cl_articolo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prezzo` double DEFAULT NULL,
  `articolo_padre` int(11) DEFAULT -1,
  `tipo_prezzo` varchar(10) DEFAULT NULL,
  `id_composizione` int(11) DEFAULT NULL,
  `id_tipokit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table cl_campioneomaggio
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cl_campioneomaggio`;

CREATE TABLE `cl_campioneomaggio` (
  `id` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `cognome` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `indirizzo` text DEFAULT NULL,
  `numero` text DEFAULT NULL,
  `cap` text DEFAULT NULL,
  `spedito` int(2) DEFAULT NULL,
  `value` text DEFAULT NULL,
  `citta` text DEFAULT NULL,
  `data_richiesta` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table cl_categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cl_categoria`;

CREATE TABLE `cl_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `immagine1` int(11) DEFAULT NULL,
  `immagine2` int(11) DEFAULT NULL,
  `nomemacchina` text DEFAULT NULL,
  `descrizione_breve` text DEFAULT NULL,
  `descrizione` longtext DEFAULT NULL,
  `visualizzazione` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cl_categoria` WRITE;
/*!40000 ALTER TABLE `cl_categoria` DISABLE KEYS */;

INSERT INTO `cl_categoria` (`id`, `immagine1`, `immagine2`, `nomemacchina`, `descrizione_breve`, `descrizione`, `visualizzazione`)
VALUES
	(1,2,3,'default','Partecipazioni di matrimonio e comunione ','<p>&nbsp;Nicola Santini , giornalista esperto di bon ton e autore di &ldquo; domani mi sposo ! Manuale completo per un matrimonio &ldquo; ha indicato , all&rsquo;interno del suo decalogo di comportamento , l&rsquo;utilizzo categorico delle care vecchie partecipazioni cartacee , le quali devono rigorosamente essere spedite , come da tradizione , via posta . assolutamente out inviarle via mail o tramite sms</p>',NULL),
	(2,2,3,'creativa','Partecipazioni di matrimonio creative','<p>La cretivit&agrave; come capacita&rsquo; di produrre nuove idee , uno stile di pensiero che da origine a design , concetti nuovi , invenzioni o scoperte tanto originali quanto efficaci.<br />Su Cartiamo trovi le migliori partecipazioni per il tuo <strong>matrimonio creativo</strong></p>',NULL),
	(3,2,3,'vintage','Partecipazioni di matrimonio vintage','<p>Cio&rsquo; che e&rsquo; di moda .. ma non segue la moda .. vintage non &egrave; solo sinonimo di passato , ma anche un nuovo modo di guardare al futuro acquistando un valore di rarit&agrave; e irrepetibilit&agrave; .<br />Eravamo insieme , tutto il resto del tempo l&rsquo;ho scordato ( walt whitman )<br />Costruisci il tuo matrimonio con le nostre <strong>partecipazioni vintage!</strong></p>',NULL),
	(4,2,3,'chic','Partecipazioni di matrimonio chic','<p>Quando l&rsquo;eleganza , la raffinatezza e il buon gusto si amalgano fino a diventare un tutt&rsquo;uno con la modernit&agrave; , l&rsquo;innovazione , l&rsquo;immaginazione e l&rsquo;audacia .<br />Quando vuoi davvero l&rsquo;amore , lo troverai che ti aspetta ( oscar wilde )<br /><strong>Organizzare il matrimonio perfetto</strong>? Adesso puoi, con le nostre partecipazioni di matrimonio chic!</p>',NULL),
	(5,2,3,'glamour','Partecipazioni di matrimoni glamour','<p>Il fascino e l&rsquo;eleganza senza rinunciare alla sensualit&agrave; ed alla seduzione , l&rsquo;innovazione intesa soprattutto come ricerca di nuovi prodotti mediante il riutilizzo creativo dell&rsquo;esistente Il nostro amore &egrave; come pioggerella d&rsquo;autunno , che cade piano ma fa straripare i fiumi (proverbio africano )</p>',NULL),
	(6,2,3,'comunioniold','Partecipazioni per comunioni','<p>Grazie alla creativit&agrave; che porta alla nascita di nuove idee, all\'intuizione che da origine a design e contenuti originali ed &nbsp;efficaci, da oggi sar&agrave; possibile comunicare con classe ed eleganza, un momento importante della vita familiare, come quello della prima comunione, contribuendo a renderlo unico ed indelebile nella memoria dei vostri cari.</p>',NULL),
	(7,18,19,'comunioni','Partecipazioni per comunioni','<p>Grazie alla creativit&agrave; che porta alla nascita di nuove idee, all\'intuizione che da origine a design e contenuti originali ed &nbsp;efficaci, da oggi sar&agrave; possibile comunicare con classe ed eleganza, un momento importante della vita familiare, come quello della prima comunione, contribuendo a renderlo unico ed indelebile nella memoria dei vostri cari.<br />Rendi la comunione di tuo figlio un giorno speciale!</p>',NULL),
	(8,25,0,'natale','Biglietti di auguri Natale 2017','<p>Su Cartiamo trovi i migliori biglietti di auguri per il Natale 2017.</p>','unacolonna');

/*!40000 ALTER TABLE `cl_categoria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cl_meta_fields
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cl_meta_fields`;

CREATE TABLE `cl_meta_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl_strutturadati` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `label` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cl_meta_fields` WRITE;
/*!40000 ALTER TABLE `cl_meta_fields` DISABLE KEYS */;

INSERT INTO `cl_meta_fields` (`id`, `id_cl_strutturadati`, `name`, `value`, `label`)
VALUES
	(1,0,'nome_sposo','text','Nome sposo'),
	(2,0,'nome_sposa','text','Nome sposa'),
	(3,0,'data','text','data'),
	(7,0,'citta','text','CittÃ '),
	(8,0,'chiesa','text','Chiesa'),
	(9,0,'indirizzo_chiesa','text','Indirizzo chiesa'),
	(10,0,'indirizzo_sposo','text','Indirizzo sposo'),
	(11,0,'indirizzo_sposa','text','Indirizzo sposa'),
	(13,0,'Nome sposi','text','nome_sposi'),
	(14,0,'Nome sposi','text','nome_sposi'),
	(15,0,'Nome sposi',NULL,'nome_sposi'),
	(16,2,'nome_sposi','text','Nome sposi'),
	(18,2,'data','text','Data'),
	(19,1,'nome_sposo','text','Nome sposo'),
	(20,1,'nome_sposa','text','Nome sposa'),
	(21,1,'data','text','Giorno/mese/anno - ore'),
	(22,1,'citta','text','CittÃ '),
	(23,1,'chiesa','text','Luogo matrimonio (comune, chiesa, parrocchia, villa...)'),
	(24,1,'indirizzo_chiesa','text','Indirizzo luogo matrimonio'),
	(25,1,'indirizzo_sposo','text','Indirizzo sposo (... o sposi in caso di convivenza)'),
	(26,1,'indirizzo_sposa','text','Indirizzo sposa (lasciare vuoto in caso di convivenza)'),
	(27,0,'nome_sposi',NULL,'Nome sposi'),
	(28,3,'nome_sposi','text','Nome sposi'),
	(29,3,'ringraziamento',NULL,'Ringraziamento'),
	(31,0,'nome',NULL,'Nome del battezzando'),
	(32,4,'nome','text','Nome del battezzando'),
	(33,4,'data','text','Data'),
	(34,4,'ora','text','Ora'),
	(35,4,'chiesa','text','Chiesa'),
	(36,4,'indirizzo','text','Indirizzo chiesa'),
	(38,5,'nome_luogo','text','Nome luogo'),
	(39,5,'indirizzo_luogo',NULL,'Indirizzo luogo'),
	(42,6,'nome_luogo','text','Nome luogo'),
	(43,6,'indirizzo_luogo','text','Indirizzo luogo'),
	(45,1,'font','font','Font'),
	(46,1,'colore_font','colori','Colore del font'),
	(47,8,'colore','colore-thanksgiving','Colore'),
	(48,8,'nome_sposi','text','Nome dello sposo e della sposa'),
	(49,8,'ringraziano','text','Ringraziano'),
	(50,8,'indirizzo','text','Indirizzo'),
	(51,1,'note',NULL,'Note');

/*!40000 ALTER TABLE `cl_meta_fields` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cl_strutturadati
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cl_strutturadati`;

CREATE TABLE `cl_strutturadati` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `slug` varchar(20) NOT NULL,
  `nome` text NOT NULL,
  `cognome` text NOT NULL,
  `email` text NOT NULL,
  `indirizzo` text NOT NULL,
  `numero` text NOT NULL,
  `cap` text NOT NULL,
  `spedito` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cl_strutturadati` WRITE;
/*!40000 ALTER TABLE `cl_strutturadati` DISABLE KEYS */;

INSERT INTO `cl_strutturadati` (`id`, `name`, `value`, `slug`, `nome`, `cognome`, `email`, `indirizzo`, `numero`, `cap`, `spedito`)
VALUES
	(1,'Default',NULL,'default','','','','','','',0),
	(2,'Bomboniera data',NULL,'bomboniera-data','','','','','','',0),
	(3,'Bomboniera default',NULL,'bomboniera-default','','','','','','',0),
	(4,'Comunioni',NULL,'comunioni/comunioni','','','','','','',0),
	(5,'Invito default',NULL,'invito-default','','','','','','',0),
	(6,'Invito party',NULL,'invito-party','','','','','','',0),
	(7,'natale',NULL,'natale/natale','','','','','','',0),
	(8,'Ringraziamento',NULL,'thanksgiving','','','','','','',0);

/*!40000 ALTER TABLE `cl_strutturadati` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cl_template
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cl_template`;

CREATE TABLE `cl_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `nomemacchina` text DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `altezza` int(11) DEFAULT NULL,
  `larghezza` int(11) DEFAULT NULL,
  `contenuto` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table clprodotto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `clprodotto`;

CREATE TABLE `clprodotto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cl` int(11) NOT NULL,
  `slug` text DEFAULT NULL,
  `id_cl_strutturadati` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `clprodotto` WRITE;
/*!40000 ALTER TABLE `clprodotto` DISABLE KEYS */;

INSERT INTO `clprodotto` (`id`, `id_cl`, `slug`, `id_cl_strutturadati`)
VALUES
	(1,499,'tandem',NULL),
	(2,500,'farfalla',NULL),
	(3,501,'evoluzione',NULL),
	(4,502,'rondine',NULL),
	(5,503,'lucciola',NULL),
	(6,504,'on-the-road',NULL),
	(7,505,'freedom',NULL),
	(8,506,'gabbiano',NULL),
	(9,507,'anatroccolo',NULL),
	(10,508,'pulcino',NULL),
	(11,509,'pettirosso',NULL),
	(12,510,'magnetica',NULL),
	(13,511,'leonessa',NULL),
	(14,512,'tortora',NULL),
	(15,513,'cerbiatto',NULL),
	(16,514,'usignolo',NULL),
	(17,515,'libellula',NULL),
	(499,0,'tandem',NULL),
	(500,0,'farfalla',NULL),
	(501,0,'evoluzione',NULL),
	(502,0,'rondine',NULL),
	(503,0,'lucciola',NULL),
	(504,0,'on-the-road',NULL),
	(505,0,'freedom',NULL),
	(506,0,'gabbiano',NULL),
	(507,0,'anatroccolo',NULL),
	(508,0,'pulcino',NULL),
	(509,0,'pettirosso',NULL),
	(510,0,'magnetica',NULL),
	(511,0,'leonessa',NULL),
	(512,0,'tortora',NULL),
	(513,0,'cerbiatto',NULL),
	(514,0,'usignolo',NULL),
	(515,0,'libellula',NULL),
	(518,0,'diana',NULL),
	(519,0,'fiorella',NULL),
	(520,0,'araldica',NULL),
	(521,0,'dark',NULL),
	(522,0,'silver',NULL),
	(523,0,'nicole',NULL),
	(524,0,'pochette',NULL),
	(525,0,'valentina',NULL),
	(526,0,'rebecca',NULL),
	(527,0,'veronica',NULL),
	(528,0,'lucrezia',NULL),
	(529,0,'silvia',NULL),
	(530,0,'antonietta',NULL),
	(531,0,'katherine',NULL),
	(532,0,'costanza',NULL),
	(533,0,'annalisa',NULL),
	(534,0,'charme',NULL),
	(535,0,'olivia',NULL),
	(536,0,'rubino',NULL),
	(537,0,'poetica',NULL),
	(538,0,'cioccolato',NULL),
	(539,0,'stella-marina',NULL),
	(541,0,'ciliegia',NULL),
	(542,0,'rugiada',NULL),
	(543,0,'corallo',NULL),
	(544,0,'floreale',NULL),
	(545,0,'nature',NULL),
	(546,0,'argentea',NULL),
	(547,0,'fiore-di-campo',NULL),
	(548,0,'ellisse',NULL),
	(549,0,'rainbow',NULL),
	(550,0,'paradiso',NULL),
	(551,0,'aurora',NULL),
	(552,0,'jeans',NULL),
	(553,0,'perla',NULL),
	(554,0,'pink-heart',NULL),
	(555,0,'hong-kong',NULL),
	(556,0,'miami',NULL),
	(557,0,'armadillo',NULL),
	(558,0,'new-orleans',NULL),
	(559,0,'lisbona',NULL),
	(561,0,'new-york',NULL),
	(562,0,'london',NULL),
	(563,0,'sidney',NULL),
	(564,0,'buenos-aires',NULL),
	(565,0,'elegance',NULL),
	(566,0,'amsterdam',NULL),
	(567,0,'boston',NULL),
	(568,0,'parigi',NULL),
	(570,0,'tokyo',NULL),
	(571,0,'islanda',NULL),
	(572,0,'casablanca',NULL),
	(573,0,'gardenia',NULL),
	(574,0,'sweet',NULL),
	(575,0,'ginestra',NULL),
	(576,0,'dafne',NULL),
	(577,0,'volare',NULL),
	(578,0,'azalea',NULL),
	(579,0,'burano',NULL),
	(580,0,'giglio',NULL),
	(581,0,'gomitolo',NULL),
	(584,0,'girasole',NULL),
	(585,0,'mimosa',NULL),
	(586,0,'blanche',NULL),
	(587,0,'petunia',NULL),
	(588,0,'ardisia',NULL),
	(589,0,'clessidra',NULL),
	(590,0,'lavanda',NULL),
	(591,0,'ciclamino',NULL),
	(592,0,'alice',NULL),
	(593,0,'primavera',NULL),
	(594,0,'betulla',NULL),
	(595,0,'yellowstone',NULL),
	(596,0,'kuala-lumpur',NULL),
	(597,0,'singapore',NULL),
	(598,0,'sequoia',NULL),
	(599,0,'fiordaliso',NULL),
	(600,0,'castagno',NULL),
	(601,0,'eucalipto',NULL),
	(602,0,'alloro',NULL),
	(603,0,'new-jersey',NULL),
	(604,0,'salice',NULL),
	(605,0,'oleandro',NULL),
	(606,0,'larice',NULL),
	(607,0,'stella-alpina',NULL),
	(608,0,'baobab',NULL),
	(609,0,'invito',NULL),
	(610,0,'invito',NULL),
	(611,0,'invito',NULL),
	(612,0,'invito',NULL),
	(613,0,'invito',NULL),
	(614,0,'invito',NULL),
	(615,0,'invito',NULL),
	(616,0,'invito',NULL),
	(617,0,'invito',NULL),
	(618,0,'invito',NULL),
	(619,0,'invito',NULL),
	(620,0,'invito',NULL),
	(621,0,'invito',NULL),
	(622,0,'invito',NULL),
	(623,0,'invito',NULL),
	(624,0,'invito',NULL),
	(625,0,'invito',NULL),
	(630,0,'invito',NULL),
	(631,0,'invito',NULL),
	(632,0,'invito',NULL),
	(634,0,'invito',NULL),
	(635,0,'invito',NULL),
	(636,0,'invito',NULL),
	(637,0,'invito',NULL),
	(638,0,'invito',NULL),
	(639,0,'invito',NULL),
	(641,0,'invito',NULL),
	(643,0,'invito',NULL),
	(646,0,'invito',NULL),
	(647,0,'invito',NULL),
	(648,0,'invito',NULL),
	(651,0,'invito',NULL),
	(652,0,'bomboniera',NULL),
	(653,0,'bomboniera',NULL),
	(656,0,'bomboniera',NULL),
	(657,0,'bomboniera',NULL),
	(658,0,'bomboniera',NULL),
	(659,0,'bomboniera',NULL),
	(660,0,'bomboniera',NULL),
	(661,0,'bomboniera',NULL),
	(662,0,'bomboniera',NULL),
	(667,0,'bomboniera',NULL),
	(668,0,'bomboniera',NULL),
	(669,0,'bomboniera',NULL),
	(670,0,'bomboniera',NULL),
	(672,0,'bomboniera',NULL),
	(674,0,'bomboniera',NULL),
	(675,0,'bomboniera',NULL),
	(678,0,'bomboniera',NULL),
	(679,0,'bomboniera',NULL),
	(680,0,'bomboniera',NULL),
	(681,0,'bomboniera',NULL),
	(683,0,'bomboniera',NULL),
	(685,0,'bomboniera',NULL),
	(686,0,'bomboniera',NULL),
	(687,0,'bomboniera',NULL),
	(688,0,'bomboniera',NULL),
	(689,0,'bomboniera',NULL),
	(690,0,'bomboniera',NULL),
	(692,0,'bomboniera',NULL),
	(693,0,'bomboniera',NULL),
	(695,0,'bomboniera',NULL),
	(696,0,'bomboniera',NULL),
	(699,0,'bomboniera',NULL),
	(700,0,'bomboniera',NULL),
	(703,0,'bomboniera',NULL),
	(704,0,'invito',NULL),
	(705,0,'invito',NULL),
	(706,0,'invito',NULL),
	(707,0,'invito',NULL),
	(709,0,'invito',NULL),
	(710,0,'invito',NULL),
	(711,0,'invito',NULL),
	(713,0,'invito',NULL),
	(2115,0,'maddalena',NULL),
	(2116,0,'alfea',NULL),
	(2117,0,'ariele',NULL),
	(2118,0,'rachele',NULL),
	(2119,0,'zaccaria',NULL),
	(2120,0,'betsabea',NULL),
	(2121,0,'giosuÃ¨',NULL),
	(2122,0,'cleofe',NULL),
	(2124,0,'giuseppe',NULL),
	(2125,0,'giuseppina',NULL),
	(2126,0,'emanuele',NULL),
	(2127,0,'emanuela',NULL),
	(2129,0,'beniamina',NULL),
	(2130,0,'angelo',NULL),
	(2131,0,'angelina',NULL),
	(2132,0,'abramo',NULL),
	(2133,0,'abramina',NULL),
	(2134,0,'isacco',NULL),
	(2135,0,'ezechiele',NULL),
	(2137,0,'noemi',NULL),
	(2138,0,'giovanni',NULL),
	(2139,0,'giovanna',NULL),
	(2140,0,'invito-ristorante',NULL),
	(2141,0,'invito-ristorante',NULL),
	(2142,0,'invito-ristorante',NULL),
	(2143,0,'invito-ristorante',NULL),
	(2145,0,'invito-ristorante',NULL),
	(2146,0,'invito-ristorante',NULL),
	(2147,0,'invito-ristorante',NULL),
	(2148,0,'invito-ristorante',NULL),
	(2150,0,'invito-ristorante',NULL),
	(2151,0,'invito-ristorante',NULL),
	(2152,0,'invito-ristorante',NULL),
	(2153,0,'invito-ristorante',NULL),
	(2154,0,'invito-ristorante',NULL),
	(2155,0,'invito-ristorante',NULL),
	(2156,0,'invito-ristorante',NULL),
	(2157,0,'invito-ristorante',NULL),
	(2158,0,'invito-ristorante',NULL),
	(2159,0,'invito-ristorante',NULL),
	(2161,0,'invito-ristorante',NULL),
	(2162,0,'invito-ristorante',NULL),
	(2165,0,'invito-ristorante',NULL),
	(2166,0,'invito-ristorante',NULL),
	(2167,0,'invito-ristorante',NULL),
	(2168,0,'invito-ristorante',NULL),
	(2169,0,'invito-ristorante',NULL),
	(2170,0,'invito-ristorante',NULL),
	(2171,0,'invito-ristorante',NULL),
	(2172,0,'invito-ristorante',NULL),
	(2173,0,'invito-ristorante',NULL),
	(2174,0,'invito-ristorante',NULL),
	(2175,0,'invito-ristorante',NULL),
	(2176,0,'invito-ristorante',NULL),
	(2178,0,'invito-ristorante',NULL),
	(2179,0,'invito-ristorante',NULL),
	(2180,0,'invito-ristorante',NULL),
	(2181,0,'invito-ristorante',NULL),
	(2182,0,'invito-ristorante',NULL),
	(2183,0,'invito-ristorante',NULL),
	(2184,0,'invito-ristorante',NULL),
	(2185,0,'invito-ristorante',NULL),
	(2186,0,'invito-ristorante',NULL),
	(2187,0,'invito-ristorante',NULL),
	(2188,0,'invito-ristorante',NULL),
	(2189,0,'invito-ristorante',NULL),
	(2190,0,'invito-ristorante',NULL),
	(2191,0,'invito-ristorante',NULL),
	(2196,0,'iniziali-partecipazione-in-oro',NULL),
	(2197,0,'iniziali-partecipazione-in-argento',NULL),
	(2198,0,'iniziali-partecipazione-in-rilievo',NULL),
	(2199,0,'iniziali-buste-in-oro',NULL),
	(2200,0,'iniziali-buste-in-argento',NULL),
	(2201,0,'iniziali-buste-in-rilievo',NULL),
	(2202,0,'montaggio-partecipazione',NULL),
	(2203,0,'messa-in-stampa',NULL),
	(2204,0,'bomboniera',NULL),
	(2205,0,'bomboniera',NULL),
	(2206,0,'bomboniera',NULL),
	(2209,0,'bomboniera',NULL),
	(2210,0,'bomboniera',NULL),
	(2211,0,'bomboniera',NULL),
	(2212,0,'bomboniera',NULL),
	(2213,0,'bomboniera',NULL),
	(2214,0,'bomboniera',NULL),
	(2215,0,'bomboniera',NULL),
	(2216,0,'bomboniera',NULL),
	(2218,0,'bomboniera',NULL),
	(2219,0,'bomboniera',NULL),
	(2220,0,'bomboniera',NULL),
	(2221,0,'bomboniera',NULL),
	(2222,0,'bomboniera',NULL),
	(2223,0,'bomboniera',NULL),
	(2224,0,'bomboniera',NULL),
	(2226,0,'bomboniera',NULL),
	(2227,0,'bomboniera',NULL),
	(2228,0,'bomboniera',NULL),
	(2231,0,'bomboniera',NULL),
	(2232,0,'bomboniera',NULL),
	(2233,0,'bomboniera',NULL),
	(2234,0,'bomboniera',NULL),
	(2235,0,'bomboniera',NULL),
	(2236,0,'bomboniera',NULL),
	(2237,0,'bomboniera',NULL),
	(2238,0,'bomboniera',NULL),
	(2240,0,'bomboniera',NULL),
	(2241,0,'bomboniera',NULL),
	(2242,0,'bomboniera',NULL),
	(2243,0,'bomboniera',NULL),
	(2244,0,'bomboniera',NULL),
	(2245,0,'bomboniera',NULL),
	(2246,0,'bomboniera',NULL),
	(2247,0,'bomboniera',NULL),
	(2248,0,'bomboniera',NULL),
	(2249,0,'bomboniera',NULL),
	(2252,0,'bomboniera',NULL),
	(2255,0,'bomboniera',NULL),
	(2447,0,'n-101',NULL),
	(2454,0,'n-108',NULL),
	(2463,0,'n-117',NULL),
	(2466,0,'n-120',NULL),
	(2566,0,'n-220',NULL),
	(2574,0,'n-228',NULL),
	(2659,0,'delfino',NULL),
	(2660,0,'alcatraz',NULL),
	(2661,0,'charleston',NULL),
	(2662,0,'valigia',NULL),
	(2663,0,'old-england',NULL),
	(2664,0,'love-wheel',NULL),
	(2665,0,'wedding-ring',NULL),
	(2666,0,'aquila',NULL),
	(2672,0,'honeymoon',NULL),
	(2675,0,'work-in-progress',NULL),
	(2676,0,'news',NULL),
	(2677,0,'nemo',NULL),
	(2678,0,'camoscio',NULL),
	(2679,0,'daylight',NULL),
	(2682,0,'istanbul',NULL),
	(2688,0,'nocciola',NULL),
	(2701,0,'henriette',NULL),
	(2702,0,'isabella',NULL),
	(2704,0,'matilde',NULL),
	(2705,0,'dorotea',NULL),
	(2708,0,'elisa',NULL),
	(2709,0,'pamela',NULL),
	(2710,0,'audrey',NULL),
	(2711,0,'tiffany',NULL),
	(2712,0,'mosaico',NULL),
	(2713,0,'sabrina',NULL),
	(2715,0,'acqua-marina',NULL),
	(2716,0,'garden',NULL),
	(2718,0,'maria',NULL),
	(2726,0,'candide',NULL),
	(2727,0,'cobalto',NULL),
	(2728,0,'magenta',NULL),
	(2729,0,'crema',NULL),
	(2739,0,'las-vegas',NULL),
	(2742,0,'triple-heart',NULL),
	(2744,0,'panama',NULL),
	(2745,0,'irlanda',NULL),
	(2748,0,'praga',NULL),
	(2749,0,'nizza',NULL),
	(2750,0,'easy',NULL),
	(2751,0,'dalia',NULL),
	(2752,0,'ornella',NULL),
	(2753,0,'togheter',NULL),
	(2754,0,'opale',NULL),
	(2756,0,'begonia',NULL),
	(2762,0,'bucaneve',NULL),
	(2763,0,'mughetto',NULL),
	(2765,0,'ginepro',NULL),
	(2766,0,'erica',NULL),
	(2767,0,'primula',NULL),
	(2768,0,'bouchet',NULL),
	(2769,0,'altea',NULL),
	(2770,0,'ninfea',NULL),
	(2772,0,'tulipano',NULL),
	(2774,0,'calendula',NULL),
	(2775,0,'camelia',NULL),
	(2776,0,'orchidea',NULL),
	(2777,0,'edera',NULL),
	(2778,0,'geometrica',NULL),
	(2779,0,'frassino',NULL),
	(2790,0,'quercia',NULL),
	(2791,0,'viennese',NULL),
	(2792,0,'gelso',NULL),
	(2793,0,'oregon',NULL),
	(2794,0,'flora',NULL),
	(2795,0,'forever',NULL),
	(2796,0,'cupido',NULL),
	(2799,0,'onda-marina',NULL),
	(2801,0,'invito',NULL),
	(2802,0,'invito',NULL),
	(2803,0,'invito',NULL),
	(2804,0,'invito',NULL),
	(2807,0,'invito',NULL),
	(2816,0,'invito',NULL),
	(2817,0,'invito',NULL),
	(2820,0,'invito',NULL),
	(2822,0,'invito',NULL),
	(2828,0,'invito',NULL),
	(2830,0,'invito',NULL),
	(2831,0,'invito',NULL),
	(2832,0,'invito',NULL),
	(2833,0,'invito',NULL),
	(2834,0,'invito',NULL),
	(2836,0,'invito',NULL),
	(2842,0,'invito',NULL),
	(2846,0,'invito',NULL),
	(2849,0,'invito',NULL),
	(2853,0,'invito',NULL),
	(2854,0,'invito',NULL),
	(2855,0,'invito',NULL),
	(2856,0,'invito',NULL),
	(2857,0,'invito',NULL),
	(2858,0,'invito',NULL),
	(2861,0,'bomboniera',NULL),
	(2864,0,'bomboniera',NULL),
	(2865,0,'bomboniera',NULL),
	(2875,0,'bomboniera',NULL),
	(2876,0,'bomboniera',NULL),
	(2877,0,'bomboniera',NULL),
	(2887,0,'bomboniera',NULL),
	(2888,0,'bomboniera',NULL),
	(2889,0,'bomboniera',NULL),
	(2894,0,'bomboniera',NULL),
	(2899,0,'bomboniera',NULL),
	(2900,0,'bomboniera',NULL),
	(2904,0,'bomboniera',NULL),
	(2905,0,'bomboniera',NULL),
	(2907,0,'bomboniera',NULL),
	(2908,0,'bomboniera',NULL),
	(2909,0,'ringraziamento',NULL),
	(3037,0,'giuditta',NULL),
	(3049,0,'amos',NULL);

/*!40000 ALTER TABLE `clprodotto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contenuto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contenuto`;

CREATE TABLE `contenuto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` text DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `contenuto` longtext DEFAULT NULL,
  `hook` text DEFAULT NULL,
  `ordine` int(11) DEFAULT NULL,
  `pagine_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `contenuto` WRITE;
/*!40000 ALTER TABLE `contenuto` DISABLE KEYS */;

INSERT INTO `contenuto` (`id`, `titolo`, `tipo`, `contenuto`, `hook`, `ordine`, `pagine_id`)
VALUES
	(1,NULL,NULL,NULL,NULL,NULL,NULL),
	(2,NULL,NULL,NULL,NULL,NULL,NULL),
	(3,NULL,NULL,NULL,NULL,NULL,NULL),
	(4,NULL,NULL,NULL,NULL,NULL,NULL),
	(5,'Banner top personalizzazione','banner','{\"id\":\"1\"}','banner',0,15),
	(6,'Banner top chi siamo','banner','{\"id\":\"2\"}','banner',0,3),
	(7,'Banner cima contatti','banner','{\"id\":\"3\"}','banner',0,7),
	(8,'BANNER-LIVE-PREVIEW','banner','{\"id\":\"4\"}','banner',0,11),
	(9,'Carousel Comunioni','carousel-descrizione-prodotti','{\"titolo\":\"Prima comunione\",\"descrizione\":\"Grazie alla <b>creativitÃ  che porta alla nascita di nuove idee</b>, all\'intuizione che da origine a design e contenuti originali ed  efficaci, da oggi sarÃ  possibile comunicare con classe ed eleganza, un <em>momento importante della vita familiare</em>, come quello della <strong>prima comunione</strong>, contribuendo a renderlo unico ed indelebile nella memoria dei vostri cari.\",\"id\":\"2115,2116,2117,2118\",\"right\":\"true\",\"testolink\":\"Vedi tutti\",\"link\":\"/shop/comunioni\"}','spazioCarousel',2,1),
	(10,'BANNER-TOP-FAQ','banner','{\"id\":\"5\"}','banner',0,4),
	(11,'Carousel Matrimonio','carousel-descrizione-prodotti','{\"titolo\":\"Matrimonio\",\"descrizione\":\"<b>Finalmente lui ti ha chiesto di sposarlo</b> e tu sei al settimo cielo , adesso perÃ² Ã¨ arrivato il momento di <strong>organizzare il matrimonio</strong> . stabilita la data matrimoniale , la chiesa per la cerimonia , il ristorante e la lista degli invitati â€¦ non rimane altro che passare alla scelta della <em>partecipazione di nozze</em>, <strong>inviti matrimonio</strong> e <em>biglietti matrimonio</em> piÃ¹ adatti al tuo stile ed al tipo di cerimonia che hai intenzione di organizzare .  tradizione vuole che tale compito spetti alla <strong>sposa</strong> , solitamente piÃ¹ predisposta dello <strong>sposo</strong> nella scelta di questo indispensabile accessorio nuziale .\",\"id\":\"499,536,538,539\",\"right\":\"\",\"testolink\":\"Vedi tutti\",\"link\":\"/shop/matrimoni/trendy\"}','spazioCarousel',8,1),
	(12,'BANNER-TOP-COME-FUNZIONA','banner','{\"id\":\"6\"}','banner',0,8),
	(14,'BANNER-TOP-METODI-DI-PAGAMENTO','banner','{\"id\":\"7\"}','banner',0,9),
	(15,'BANNER-TOP-RESI-RECESSI','banner','{\"id\":\"8\"}','banner',0,10),
	(16,'BANNER-TOP-RICHIEDI-ASSISTENZA','banner','{\"id\":\"9\"}','banner',0,12),
	(17,'BANNER-TOP-CAMPIONE-GRATUITO','banner','{\"id\":\"10\"}','banner',0,13),
	(18,'BANNER-TOP-COLLABORA-CON','banner','{\"id\":\"11\"}','banner',0,14),
	(19,'Testo centrale','titolo-testo','{\"titolo\":\"\",\"testo\":\"<div class=\\\"container\\\">\\r\\n<h2 style=\\\"text-align: center;\\\">Partecipazioni e matrimonio, inviti e bomboniere per le tue nozze, in collaborazione con Save the Chidren.</h2>\\r\\n</div>\\r\\n<div class=\\\"banner top-page\\\" style=\\\"text-align: center;\\\">\\r\\n<p style=\\\"text-align: center;\\\">Â Arte Sposa, azienda leader nella creazione di <strong>partecipazioni di matrimonio</strong>, si trasforma in Cartiamo, realtÃ Â  piÃ¹ completa che tratta ogni aspetto della vita familiare.<br />Cartiamo da il via al progetto basandosi sul principale punto di forza che, per anni, ha distinto Arte Sposa: le <em>partecipazioni di matrimonio</em>.<br />La scelta delle <strong>partecipazioni nuziali</strong> sarÃ Â  molto piÃ¹ ampia e in continuo aggiornamento, sarÃ Â  possibile selezionare in base al colore preferito e alla qualitÃ Â  della carta. Puoi trovare <em>inviti per matrimonio</em> ma anche una vasta gamma di <strong>inviti per le comunioni</strong>, ed a breve, saranno disponibili anche <em>inviti per battesimi, nascite, diplomi e tutto ciÃ² che racchiude il quadro familiare</em>.</p>\\r\\n<p style=\\\"text-align: center;\\\">Il tuo matrimonio, la nascita del tuo bambino, il suo battesimo, il primo natale, sono solo alcune delle occasioni speciali della tua vita, momenti unici da ricordare con gioia e amore per sempre. <strong>CARTIAMO Ã¨ qui per questo, per rendere speciale ogni tuo momento e per comunicarlo con felicitÃ Â  e armonia.</strong></p>\\r\\n<p style=\\\"text-align: center;\\\"><br />Cartiamo ha scelto di sostenere <strong>Save the Children</strong>, la piÃ¹ grande organizzazione internazionale indipendente che lavora per migliorare concretamente la vita dei bambini in Italia e nel mondo.</p>\\r\\n<br /><br /><a class=\\\"btn btn-cool btn-red\\\" href=\\\"/chi-siamo\\\">Esperti nel matrimonio</a></div>\\r\\n</div>\"}','contenutoCentrale',6,1),
	(20,'Lasciati ispirare','gallery-5-img','{\"img1\":\"https://cartiamo.it/media//350x400-true-partecipazione_di_matrimonio_rosa.jpg\",\"img2\":\"https://cartiamo.it/media//350x400-true-partecipazione_matrimonio_rossa.jpg\",\"img3\":\"https://cartiamo.it/media//350x400-true-partecipazione_matrimonio_tiffany.jpg\",\"img4\":\"https://cartiamo.it/media//350x400-true-partecipazione_shabby_chic.jpg\",\"img5\":\"https://cartiamo.it/media//350x400-true-partecipazione_di_matrimonio.jpg\"}','prefooter',11,1),
	(22,'Lasciati ispirare testo','titolo-testo','{\"titolo\":\"LASCIATI ISPIRARE\",\"testo\":\"Laciati ispirare per il tuo matrimonio! Scopri tutte le nuove tendenze in coordinato con le tu partecipazioni di matrimonio.\"}','prefooter',10,1),
	(25,'Banner','banner','{\"id\":\"9\"}','banner',NULL,18),
	(26,'Ultimi articoli blog','ultimi-articoli-blog','{\"numero\":\"2\"}','prefooter',0,1),
	(27,'Banner top','banner','{\"id\":\"14\"}','banner',NULL,22),
	(28,'Lista slug','griglia-slug-prodotti','{\"slugs\":\"ginepro;dafne;petunia;girasole;togheter;margherita;erica;easy\",\"colonne\":\"\"}','ciao',NULL,22),
	(29,'Pulsante vedi tutti','titolo-testo','{\"titolo\":\"\",\"testo\":\"<span class=\\\"text-center\\\"><a href=\\\"/shop/matrimoni/classica\\\" title=\\\"matrimonio al sud\\\" class=\\\"btn btn-cool btn-red btn\\\">Vedi tutte le partecipazioni classiche</a></span>\"}','ciao',NULL,22),
	(31,'Bannerini matrimoni','immagini-link-affiancate','{\"immagini\":\"/media/bannerino-matrimonio-trendy.jpg;/media/bannerino-matrimonio-classico.jpg;/media/bannerino-matrimonio-chic.jpg;/media/bannerino-matrimonio-glamour.jpg;/media/bannerino-matrimonio-creativo.jpg;/media/bannerino-matrimonio-vintage.jpg\",\"alt\":\"Partecipazioni di nozze trendy;Partecipazioni matrimonio classiche;Partecipazioni di nozze chic;Partecipazioni per nozze glamour;Partecipazioni matrimonio creativo;Partecipazioni matrimonio vintage\",\"link\":\"/shop/matrimoni/trendy;/shop/matrimoni/classica;/shop/matrimoni/chic;/shop/matrimoni/glamour;/shop/matrimoni/creativa;shop/matrimoni/vintage\",\"colonne\":\"3\",\"full\":\"0\"}','contenutoCentrale',9,1),
	(32,'Separatore','separatore','{\"tipo\":\"0\"}','contenutoCentrale',5,1),
	(33,'Le piu vendute titolo','titolo-testo','{\"titolo\":\"Le piÃ¹ vendute\",\"testo\":\"Le nostre partecipazioni matrimonio piÃ¹ vendute, per delle nozze di qualitÃ !\"}','contenutoCentrale',3,1),
	(34,'Le piu vendut','griglia-slug-prodotti','{\"slugs\":\"elisa;salice;cioccolato;amsterdam;togheter;ornella;tortora;miami\",\"colonne\":\"4\"}','contenutoCentrale',4,1),
	(35,'Partecipazioni comunioni','griglia-slug-prodotti','{\"slugs\":\"giuseppina;emanuele;angelina;abramo;davide;ezechiele;isacco;noemi\",\"colonne\":\"4\"}','ciao',NULL,23),
	(36,'Pulsante vedi tutti','titolo-testo','{\"titolo\":\"\",\"testo\":\"<span class=\\\"text-center\\\"><a href=\\\"/shop/comunioni\\\" title=\\\"Partecipazioni prima comunione\\\" class=\\\"btn btn-cool btn-red btn\\\">Vedi tutte le partecipazioni per auguri prima comunione</a></span>\"}','ciao',NULL,23),
	(37,'Banner','banner','{\"id\":\"15\"}','banner',NULL,23),
	(38,'Banner prima comunione','banner','{\"id\":\"15\"}','contenutoCentrale',7,1),
	(39,'Testo prima comunione','titolo-testo','{\"titolo\":\"La prima comunione\",\"testo\":\"Scopri anche le nostre partecipazioni per la <strong>prima comunione</strong> di tuo figlio! Trova <em>idee per frasi</em> di <a href=\\\"https://cartiamo.it/auguri-prima-comunione\\\">auguri prima comunione</a> e partecipazioni da personalizzare!\"}','contenutoCentrale',1,1),
	(40,'Banner top','banner','{\"id\":\"16\"}','banner',NULL,24),
	(41,'Prima riha','riga-2-colonne','{\"dimsinistra\":\"\",\"sinistra\":\"<h3 style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\">Partecipazioni senza Montaggio</h3><p style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\"><img src=\\\"https://cartiamo.it/media//SCATOLA 1.jpg\\\" alt=\\\"Scatola senza montaggio\\\" data-mce-src=\\\"https://cartiamo.it/media//SCATOLA 1.jpg\\\"></p>\",\"dimdestra\":\"\",\"destra\":\"<h2 style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\">Procedura di Montaggio</h2><p style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\">Tutte le partecipazioni vengono montate rigorosamente a mano per garantire una qualità eccellente</p><h4 style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\"><img src=\\\"https://cartiamo.it/media//SFUSTELLAMENTO.jpg\\\" alt=\\\"Sfustellamento partecipazione\\\" data-mce-src=\\\"https://cartiamo.it/media//SFUSTELLAMENTO.jpg\\\"><br></h4><h4 style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\"><em>Montaggio</em></h4><p style=\\\"text-align: center;\\\" data-mce-style=\\\"text-align: center;\\\"><img src=\\\"https://cartiamo.it/media//MONTAGGIO.jpg\\\" alt=\\\"Montaggio Partecipazione\\\" data-mce-src=\\\"https://cartiamo.it/media//MONTAGGIO.jpg\\\"></p>\"}','ciao',0,21),
	(42,'seconda riga','html','{\"html\":\"<div class=\\\"container\\\" style=\\\"max-width: 900px\\\">\\r\\n<h3 style=\\\"text-align: center;\\\">Partecipazioni Montate</h3>\\r\\n\\r\\n<p>\\r\\nL\' attenzione che mettiamo nel montaggio della vostra partecipazione di matrimonio vi garantirà un risultato eccezionale, elegante e curato nei minimi dettagli. Con un piccolo costo aggiuntivo ci occuperemo noi di farvi arrivare le partecipazioni già pronte, pronte per essere inviate... non dovrete fare altro! Solo godervi il vostro meraviglioso matrimonio!\\r\\n</p>\\r\\n\\r\\n<p style=\\\"text-align: center;\\\"><img src=\\\"https://cartiamo.it/media//SCATOLA 2.jpg\\\" alt=\\\"Scatola con partecipazione montata\\\" /></p>\\r\\n</div>\"}','ciao',1,21);

/*!40000 ALTER TABLE `contenuto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_attributo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_attributo`;

CREATE TABLE `ecommerce_attributo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `descrizione` text COLLATE utf8_bin DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `variante` int(11) DEFAULT 1,
  `parent` int(11) DEFAULT NULL,
  `parent_value` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_attributo` WRITE;
/*!40000 ALTER TABLE `ecommerce_attributo` DISABLE KEYS */;

INSERT INTO `ecommerce_attributo` (`id`, `slug`, `nome`, `descrizione`, `tipo`, `variante`, `parent`, `parent_value`)
VALUES
	(8,X'76657273696F6E65',X'56657273696F6E65','',1,1,NULL,NULL),
	(9,X'726976657374696D656E746F',X'526976657374696D656E746F','',1,0,8,''),
	(12,X'636F6C6F72652D7465737375746F',X'436F6C6F7265207465737375746F','',1,1,9,X'5465737375746F'),
	(13,X'636F6C6F72652D70656C6C65',X'436F6C6F72652070656C6C65','',1,1,9,X'50656C6C65');

/*!40000 ALTER TABLE `ecommerce_attributo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_attributo_entita
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_attributo_entita`;

CREATE TABLE `ecommerce_attributo_entita` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entita` text COLLATE utf8_bin DEFAULT NULL,
  `id_attributo` int(11) DEFAULT NULL,
  `id_entita` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_attributo_entita` WRITE;
/*!40000 ALTER TABLE `ecommerce_attributo_entita` DISABLE KEYS */;

INSERT INTO `ecommerce_attributo_entita` (`id`, `entita`, `id_attributo`, `id_entita`)
VALUES
	(2,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',1,1),
	(6,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',4,1),
	(7,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',2,1),
	(8,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',3,1),
	(9,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',5,1),
	(10,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',6,1),
	(11,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',7,1),
	(12,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',6,2),
	(13,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',7,2),
	(14,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',5,2),
	(23,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',8,3),
	(24,X'65636F6D6D657263655F7469706F6C6F6769615F70726F646F74746F',5,5);

/*!40000 ALTER TABLE `ecommerce_attributo_entita` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_attributo_tipo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_attributo_tipo`;

CREATE TABLE `ecommerce_attributo_tipo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_attributo_tipo` WRITE;
/*!40000 ALTER TABLE `ecommerce_attributo_tipo` DISABLE KEYS */;

INSERT INTO `ecommerce_attributo_tipo` (`id`, `tipo`)
VALUES
	(1,X'6C69737461'),
	(2,X'746573746F'),
	(3,X'6E756D65726F');

/*!40000 ALTER TABLE `ecommerce_attributo_tipo` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_attributo_valore
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_attributo_valore`;

CREATE TABLE `ecommerce_attributo_valore` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ecommerce_attributo` int(11) DEFAULT NULL,
  `valore` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_attributo_valore` WRITE;
/*!40000 ALTER TABLE `ecommerce_attributo_valore` DISABLE KEYS */;

INSERT INTO `ecommerce_attributo_valore` (`id`, `id_ecommerce_attributo`, `valore`)
VALUES
	(10,1,X'6466736466'),
	(11,1,X'736164617364'),
	(12,2,X'617364646173'),
	(13,3,X'726F73736F'),
	(14,3,X'7665726465'),
	(15,4,X'32'),
	(16,4,X'33'),
	(18,2,X'7361736164736164617364617364617364617364617364617364'),
	(19,5,X'32'),
	(20,5,X'33'),
	(21,5,X'34'),
	(25,6,X'5465737375746F'),
	(26,6,X'50656C6C65'),
	(27,7,X'4269616E636F'),
	(28,7,X'4265696765'),
	(29,7,X'4D6172726F6E65'),
	(30,7,X'4E65726F'),
	(31,8,X'323030'),
	(32,8,X'323131'),
	(33,8,X'373839'),
	(34,5,X'322E35'),
	(39,8,X'373931'),
	(40,8,X'373933'),
	(41,8,X'373935'),
	(42,8,X'383037'),
	(43,8,X'383038'),
	(44,8,X'383132'),
	(45,8,X'383133'),
	(46,8,X'383134'),
	(47,8,X'383336'),
	(48,8,X'383338'),
	(49,5,X'31'),
	(50,5,X'30'),
	(51,10,X'70726F7661'),
	(52,10,X'70726F766132'),
	(53,11,X'6669676C696F20323131'),
	(54,11,X'6669676C696F3220323131'),
	(55,9,X'5465737375746F'),
	(56,9,X'50656C6C65'),
	(57,12,X'4E65726F'),
	(58,12,X'426C75'),
	(59,13,X'4E65726F'),
	(60,13,X'526F73736F');

/*!40000 ALTER TABLE `ecommerce_attributo_valore` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_categoria`;

CREATE TABLE `ecommerce_categoria` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `nome` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `descrizione` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_categoria` WRITE;
/*!40000 ALTER TABLE `ecommerce_categoria` DISABLE KEYS */;

INSERT INTO `ecommerce_categoria` (`id`, `slug`, `nome`, `descrizione`)
VALUES
	(3,X'646976616E69',X'446976616E69',X'646976616E69'),
	(4,X'706F6C74726F6E65',X'506F6C74726F6E65',''),
	(5,X'646976616E692D6C6574746F',X'446976616E69206C6574746F','');

/*!40000 ALTER TABLE `ecommerce_categoria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_categoria_prodotto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_categoria_prodotto`;

CREATE TABLE `ecommerce_categoria_prodotto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_prodotto` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_categoria_prodotto` WRITE;
/*!40000 ALTER TABLE `ecommerce_categoria_prodotto` DISABLE KEYS */;

INSERT INTO `ecommerce_categoria_prodotto` (`id`, `id_prodotto`, `id_categoria`)
VALUES
	(2,1,1),
	(6,3,2),
	(7,4,3),
	(8,5,5),
	(10,6,4),
	(11,7,3),
	(12,7,5),
	(13,7,4),
	(14,9,3);

/*!40000 ALTER TABLE `ecommerce_categoria_prodotto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_cliente
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_cliente`;

CREATE TABLE `ecommerce_cliente` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `cognome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `password` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `id_braintree` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_cliente` WRITE;
/*!40000 ALTER TABLE `ecommerce_cliente` DISABLE KEYS */;

INSERT INTO `ecommerce_cliente` (`id`, `nome`, `cognome`, `email`, `tipo`, `password`, `id_braintree`)
VALUES
	(1,X'666162696F',X'706F636369',X'70686F6D656140676D61696C2E636F6D',1,NULL,NULL),
	(2,X'666162696F',X'706F636369',X'70686F6D656140676D61696C2E636F6D',1,NULL,NULL),
	(3,X'666162696F',X'706F636369',X'70686F6D656140676D61696C2E636F6D',1,NULL,NULL),
	(4,X'666162696F',X'706F636369',X'70686F6D656140676D61696C2E636F6D',1,NULL,NULL),
	(5,X'666162696F',X'706F636369',X'70686F6D656140676D61696C2E636F6D',1,NULL,X'323434303636393831'),
	(6,X'617364',X'617364',X'70726F766140656D61696C2E636F6D',1,NULL,X'363735353739373531'),
	(7,X'736164617364',X'617364',X'61736461736440646173642E636F6D',1,NULL,X'323233393539393139'),
	(8,X'666162696F20',X'706F636369',X'70686F6D656140686F746D61696C2E636F6D',1,X'6138613435623162356462396564643639373938346139353862303566393262',X'353138323838323531');

/*!40000 ALTER TABLE `ecommerce_cliente` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_cliente_spedizione
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_cliente_spedizione`;

CREATE TABLE `ecommerce_cliente_spedizione` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `cognome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `via` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `numero` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `citta` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_cliente_spedizione` WRITE;
/*!40000 ALTER TABLE `ecommerce_cliente_spedizione` DISABLE KEYS */;

INSERT INTO `ecommerce_cliente_spedizione` (`id`, `nome`, `cognome`, `via`, `numero`, `id_zona`, `id_provincia`, `id_cliente`, `citta`)
VALUES
	(1,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'35',NULL,198,4,NULL),
	(2,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'35',NULL,198,4,NULL),
	(3,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,NULL),
	(4,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,NULL),
	(5,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,NULL),
	(6,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,NULL),
	(7,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,NULL),
	(8,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,X'706973746F6961'),
	(9,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,X'706973746F6961'),
	(10,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,X'706973746F6961'),
	(11,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'34',NULL,198,4,X'706973746F6961'),
	(12,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'',NULL,198,4,X'706973746F6961'),
	(13,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'',NULL,198,4,X'706973746F6961'),
	(14,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'33',NULL,198,5,X'706973746F6961'),
	(15,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'33',NULL,198,5,X'706973746F6961'),
	(16,X'666162696F',X'706F636369',X'766961206469207175692C2033',X'33',NULL,198,6,X'706973746F6961'),
	(17,X'736164617364',X'617364',X'736164617364207361642061732064',X'313233',NULL,198,7,X'706973746F6961'),
	(18,X'666162696F20747265747265657274',X'706F636369',X'766961206469207175692C2033',X'33',NULL,198,8,X'706973746F6961'),
	(19,X'666162696F2063616D626961746F',X'706F636369',X'766961206469207175692C2033',X'33',NULL,198,8,X'706973746F6961');

/*!40000 ALTER TABLE `ecommerce_cliente_spedizione` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_country
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_country`;

CREATE TABLE `ecommerce_country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_zone` int(10) unsigned NOT NULL,
  `id_currency` int(10) unsigned NOT NULL DEFAULT 0,
  `iso_code` varchar(3) NOT NULL,
  `call_prefix` int(10) NOT NULL DEFAULT 0,
  `active` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `contains_states` tinyint(1) NOT NULL DEFAULT 0,
  `need_identification_number` tinyint(1) NOT NULL DEFAULT 0,
  `need_zip_code` tinyint(1) NOT NULL DEFAULT 1,
  `zip_code_format` varchar(12) NOT NULL DEFAULT '',
  `display_tax_label` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_iso_code` (`iso_code`),
  KEY `country_` (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ecommerce_country` WRITE;
/*!40000 ALTER TABLE `ecommerce_country` DISABLE KEYS */;

INSERT INTO `ecommerce_country` (`id`, `id_zone`, `id_currency`, `iso_code`, `call_prefix`, `active`, `contains_states`, `need_identification_number`, `need_zip_code`, `zip_code_format`, `display_tax_label`)
VALUES
	(1,1,0,'DE',49,0,0,0,1,'NNNNN',1),
	(2,1,0,'AT',43,0,0,0,1,'NNNN',1),
	(3,1,0,'BE',32,0,0,0,1,'NNNN',1),
	(4,2,0,'CA',1,0,1,0,1,'LNL NLN',0),
	(5,3,0,'CN',86,0,0,0,1,'NNNNNN',1),
	(6,1,0,'ES',34,0,0,1,1,'NNNNN',1),
	(7,1,0,'FI',358,0,0,0,1,'NNNNN',1),
	(8,1,0,'FR',33,0,0,0,1,'NNNNN',1),
	(9,1,0,'GR',30,0,0,0,1,'NNNNN',1),
	(10,1,0,'IT',39,1,1,0,1,'NNNNN',1),
	(11,3,0,'JP',81,0,1,0,1,'NNN-NNNN',1),
	(12,1,0,'LU',352,0,0,0,1,'NNNN',1),
	(13,1,0,'NL',31,0,0,0,1,'NNNN LL',1),
	(14,1,0,'PL',48,0,0,0,1,'NN-NNN',1),
	(15,1,0,'PT',351,0,0,0,1,'NNNN-NNN',1),
	(16,1,0,'CZ',420,0,0,0,1,'NNN NN',1),
	(17,1,0,'GB',44,0,0,0,1,'',1),
	(18,1,0,'SE',46,0,0,0,1,'NNN NN',1),
	(19,7,0,'CH',41,0,0,0,1,'NNNN',1),
	(20,1,0,'DK',45,0,0,0,1,'NNNN',1),
	(21,2,0,'US',1,0,1,0,1,'NNNNN',0),
	(22,3,0,'HK',852,0,0,0,0,'',1),
	(23,7,0,'NO',47,0,0,0,1,'NNNN',1),
	(24,5,0,'AU',61,0,0,0,1,'NNNN',1),
	(25,3,0,'SG',65,0,0,0,1,'NNNNNN',1),
	(26,1,0,'IE',353,0,0,0,0,'',1),
	(27,5,0,'NZ',64,0,0,0,1,'NNNN',1),
	(28,3,0,'KR',82,0,0,0,1,'NNNNN',1),
	(29,3,0,'IL',972,0,0,0,1,'NNNNNNN',1),
	(30,4,0,'ZA',27,0,0,0,1,'NNNN',1),
	(31,4,0,'NG',234,0,0,0,1,'',1),
	(32,4,0,'CI',225,0,0,0,1,'',1),
	(33,4,0,'TG',228,0,0,0,1,'',1),
	(34,6,0,'BO',591,0,0,0,1,'',1),
	(35,4,0,'MU',230,0,0,0,1,'',1),
	(36,1,0,'RO',40,0,0,0,1,'NNNNNN',1),
	(37,1,0,'SK',421,0,0,0,1,'NNN NN',1),
	(38,4,0,'DZ',213,0,0,0,1,'NNNNN',1),
	(39,2,0,'AS',0,0,0,0,1,'',1),
	(40,7,0,'AD',376,0,0,0,1,'CNNN',1),
	(41,4,0,'AO',244,0,0,0,0,'',1),
	(42,8,0,'AI',0,0,0,0,1,'',1),
	(43,2,0,'AG',0,0,0,0,1,'',1),
	(44,6,0,'AR',54,0,1,0,1,'LNNNNLLL',1),
	(45,3,0,'AM',374,0,0,0,1,'NNNN',1),
	(46,8,0,'AW',297,0,0,0,1,'',1),
	(47,3,0,'AZ',994,0,0,0,1,'CNNNN',1),
	(48,2,0,'BS',0,0,0,0,1,'',1),
	(49,3,0,'BH',973,0,0,0,1,'',1),
	(50,3,0,'BD',880,0,0,0,1,'NNNN',1),
	(51,2,0,'BB',0,0,0,0,1,'CNNNNN',1),
	(52,7,0,'BY',0,0,0,0,1,'NNNNNN',1),
	(53,8,0,'BZ',501,0,0,0,0,'',1),
	(54,4,0,'BJ',229,0,0,0,0,'',1),
	(55,2,0,'BM',0,0,0,0,1,'',1),
	(56,3,0,'BT',975,0,0,0,1,'',1),
	(57,4,0,'BW',267,0,0,0,1,'',1),
	(58,6,0,'BR',55,0,0,0,1,'NNNNN-NNN',1),
	(59,3,0,'BN',673,0,0,0,1,'LLNNNN',1),
	(60,4,0,'BF',226,0,0,0,1,'',1),
	(61,3,0,'MM',95,0,0,0,1,'',1),
	(62,4,0,'BI',257,0,0,0,1,'',1),
	(63,3,0,'KH',855,0,0,0,1,'NNNNN',1),
	(64,4,0,'CM',237,0,0,0,1,'',1),
	(65,4,0,'CV',238,0,0,0,1,'NNNN',1),
	(66,4,0,'CF',236,0,0,0,1,'',1),
	(67,4,0,'TD',235,0,0,0,1,'',1),
	(68,6,0,'CL',56,0,0,0,1,'NNN-NNNN',1),
	(69,6,0,'CO',57,0,0,0,1,'NNNNNN',1),
	(70,4,0,'KM',269,0,0,0,1,'',1),
	(71,4,0,'CD',242,0,0,0,1,'',1),
	(72,4,0,'CG',243,0,0,0,1,'',1),
	(73,8,0,'CR',506,0,0,0,1,'NNNNN',1),
	(74,7,0,'HR',385,0,0,0,1,'NNNNN',1),
	(75,8,0,'CU',53,0,0,0,1,'',1),
	(76,1,0,'CY',357,0,0,0,1,'NNNN',1),
	(77,4,0,'DJ',253,0,0,0,1,'',1),
	(78,8,0,'DM',0,0,0,0,1,'',1),
	(79,8,0,'DO',0,0,0,0,1,'',1),
	(80,3,0,'TL',670,0,0,0,1,'',1),
	(81,6,0,'EC',593,0,0,0,1,'CNNNNNN',1),
	(82,4,0,'EG',20,0,0,0,1,'NNNNN',1),
	(83,8,0,'SV',503,0,0,0,1,'',1),
	(84,4,0,'GQ',240,0,0,0,1,'',1),
	(85,4,0,'ER',291,0,0,0,1,'',1),
	(86,1,0,'EE',372,0,0,0,1,'NNNNN',1),
	(87,4,0,'ET',251,0,0,0,1,'',1),
	(88,8,0,'FK',0,0,0,0,1,'LLLL NLL',1),
	(89,7,0,'FO',298,0,0,0,1,'',1),
	(90,5,0,'FJ',679,0,0,0,1,'',1),
	(91,4,0,'GA',241,0,0,0,1,'',1),
	(92,4,0,'GM',220,0,0,0,1,'',1),
	(93,3,0,'GE',995,0,0,0,1,'NNNN',1),
	(94,4,0,'GH',233,0,0,0,1,'',1),
	(95,8,0,'GD',0,0,0,0,1,'',1),
	(96,7,0,'GL',299,0,0,0,1,'',1),
	(97,7,0,'GI',350,0,0,0,1,'',1),
	(98,8,0,'GP',590,0,0,0,1,'',1),
	(99,5,0,'GU',0,0,0,0,1,'',1),
	(100,8,0,'GT',502,0,0,0,1,'',1),
	(101,7,0,'GG',0,0,0,0,1,'LLN NLL',1),
	(102,4,0,'GN',224,0,0,0,1,'',1),
	(103,4,0,'GW',245,0,0,0,1,'',1),
	(104,6,0,'GY',592,0,0,0,1,'',1),
	(105,8,0,'HT',509,0,0,0,1,'',1),
	(106,5,0,'HM',0,0,0,0,1,'',1),
	(107,7,0,'VA',379,0,0,0,1,'NNNNN',1),
	(108,8,0,'HN',504,0,0,0,1,'',1),
	(109,7,0,'IS',354,0,0,0,1,'NNN',1),
	(110,3,0,'IN',91,0,0,0,1,'NNN NNN',1),
	(111,3,0,'ID',62,0,1,0,1,'NNNNN',1),
	(112,3,0,'IR',98,0,0,0,1,'NNNNN-NNNNN',1),
	(113,3,0,'IQ',964,0,0,0,1,'NNNNN',1),
	(114,7,0,'IM',0,0,0,0,1,'CN NLL',1),
	(115,8,0,'JM',0,0,0,0,1,'',1),
	(116,7,0,'JE',0,0,0,0,1,'CN NLL',1),
	(117,3,0,'JO',962,0,0,0,1,'',1),
	(118,3,0,'KZ',7,0,0,0,1,'NNNNNN',1),
	(119,4,0,'KE',254,0,0,0,1,'',1),
	(120,5,0,'KI',686,0,0,0,1,'',1),
	(121,3,0,'KP',850,0,0,0,1,'',1),
	(122,3,0,'KW',965,0,0,0,1,'',1),
	(123,3,0,'KG',996,0,0,0,1,'',1),
	(124,3,0,'LA',856,0,0,0,1,'',1),
	(125,1,0,'LV',371,0,0,0,1,'C-NNNN',1),
	(126,3,0,'LB',961,0,0,0,1,'',1),
	(127,4,0,'LS',266,0,0,0,1,'',1),
	(128,4,0,'LR',231,0,0,0,1,'',1),
	(129,4,0,'LY',218,0,0,0,1,'',1),
	(130,1,0,'LI',423,0,0,0,1,'NNNN',1),
	(131,1,0,'LT',370,0,0,0,1,'NNNNN',1),
	(132,3,0,'MO',853,0,0,0,0,'',1),
	(133,7,0,'MK',389,0,0,0,1,'',1),
	(134,4,0,'MG',261,0,0,0,1,'',1),
	(135,4,0,'MW',265,0,0,0,1,'',1),
	(136,3,0,'MY',60,0,0,0,1,'NNNNN',1),
	(137,3,0,'MV',960,0,0,0,1,'',1),
	(138,4,0,'ML',223,0,0,0,1,'',1),
	(139,1,0,'MT',356,0,0,0,1,'LLL NNNN',1),
	(140,5,0,'MH',692,0,0,0,1,'',1),
	(141,8,0,'MQ',596,0,0,0,1,'',1),
	(142,4,0,'MR',222,0,0,0,1,'',1),
	(143,1,0,'HU',36,0,0,0,1,'NNNN',1),
	(144,4,0,'YT',262,0,0,0,1,'',1),
	(145,2,0,'MX',52,0,1,1,1,'NNNNN',1),
	(146,5,0,'FM',691,0,0,0,1,'',1),
	(147,7,0,'MD',373,0,0,0,1,'C-NNNN',1),
	(148,7,0,'MC',377,0,0,0,1,'980NN',1),
	(149,3,0,'MN',976,0,0,0,1,'',1),
	(150,7,0,'ME',382,0,0,0,1,'NNNNN',1),
	(151,8,0,'MS',0,0,0,0,1,'',1),
	(152,4,0,'MA',212,0,0,0,1,'NNNNN',1),
	(153,4,0,'MZ',258,0,0,0,1,'',1),
	(154,4,0,'NA',264,0,0,0,1,'',1),
	(155,5,0,'NR',674,0,0,0,1,'',1),
	(156,3,0,'NP',977,0,0,0,1,'',1),
	(157,8,0,'AN',599,0,0,0,1,'',1),
	(158,5,0,'NC',687,0,0,0,1,'',1),
	(159,8,0,'NI',505,0,0,0,1,'NNNNNN',1),
	(160,4,0,'NE',227,0,0,0,1,'',1),
	(161,5,0,'NU',683,0,0,0,1,'',1),
	(162,5,0,'NF',0,0,0,0,1,'',1),
	(163,5,0,'MP',0,0,0,0,1,'',1),
	(164,3,0,'OM',968,0,0,0,1,'',1),
	(165,3,0,'PK',92,0,0,0,1,'',1),
	(166,5,0,'PW',680,0,0,0,1,'',1),
	(167,3,0,'PS',0,0,0,0,1,'',1),
	(168,8,0,'PA',507,0,0,0,1,'NNNNNN',1),
	(169,5,0,'PG',675,0,0,0,1,'',1),
	(170,6,0,'PY',595,0,0,0,1,'',1),
	(171,6,0,'PE',51,0,0,0,1,'',1),
	(172,3,0,'PH',63,0,0,0,1,'NNNN',1),
	(173,5,0,'PN',0,0,0,0,1,'LLLL NLL',1),
	(174,8,0,'PR',0,0,0,0,1,'NNNNN',1),
	(175,3,0,'QA',974,0,0,0,1,'',1),
	(176,4,0,'RE',262,0,0,0,1,'',1),
	(177,7,0,'RU',7,0,0,0,1,'NNNNNN',1),
	(178,4,0,'RW',250,0,0,0,1,'',1),
	(179,8,0,'BL',0,0,0,0,1,'',1),
	(180,8,0,'KN',0,0,0,0,1,'',1),
	(181,8,0,'LC',0,0,0,0,1,'',1),
	(182,8,0,'MF',0,0,0,0,1,'',1),
	(183,8,0,'PM',508,0,0,0,1,'',1),
	(184,8,0,'VC',0,0,0,0,1,'',1),
	(185,5,0,'WS',685,0,0,0,1,'',1),
	(186,7,0,'SM',378,0,0,0,1,'NNNNN',1),
	(187,4,0,'ST',239,0,0,0,1,'',1),
	(188,3,0,'SA',966,0,0,0,1,'',1),
	(189,4,0,'SN',221,0,0,0,1,'',1),
	(190,7,0,'RS',381,0,0,0,1,'NNNNN',1),
	(191,4,0,'SC',248,0,0,0,1,'',1),
	(192,4,0,'SL',232,0,0,0,1,'',1),
	(193,1,0,'SI',386,0,0,0,1,'C-NNNN',1),
	(194,5,0,'SB',677,0,0,0,1,'',1),
	(195,4,0,'SO',252,0,0,0,1,'',1),
	(196,8,0,'GS',0,0,0,0,1,'LLLL NLL',1),
	(197,3,0,'LK',94,0,0,0,1,'NNNNN',1),
	(198,4,0,'SD',249,0,0,0,1,'',1),
	(199,8,0,'SR',597,0,0,0,1,'',1),
	(200,7,0,'SJ',0,0,0,0,1,'',1),
	(201,4,0,'SZ',268,0,0,0,1,'',1),
	(202,3,0,'SY',963,0,0,0,1,'',1),
	(203,3,0,'TW',886,0,0,0,1,'NNNNN',1),
	(204,3,0,'TJ',992,0,0,0,1,'',1),
	(205,4,0,'TZ',255,0,0,0,1,'',1),
	(206,3,0,'TH',66,0,0,0,1,'NNNNN',1),
	(207,5,0,'TK',690,0,0,0,1,'',1),
	(208,5,0,'TO',676,0,0,0,1,'',1),
	(209,6,0,'TT',0,0,0,0,1,'',1),
	(210,4,0,'TN',216,0,0,0,1,'',1),
	(211,7,0,'TR',90,0,0,0,1,'NNNNN',1),
	(212,3,0,'TM',993,0,0,0,1,'',1),
	(213,8,0,'TC',0,0,0,0,1,'LLLL NLL',1),
	(214,5,0,'TV',688,0,0,0,1,'',1),
	(215,4,0,'UG',256,0,0,0,1,'',1),
	(216,1,0,'UA',380,0,0,0,1,'NNNNN',1),
	(217,3,0,'AE',971,0,0,0,1,'',1),
	(218,6,0,'UY',598,0,0,0,1,'',1),
	(219,3,0,'UZ',998,0,0,0,1,'',1),
	(220,5,0,'VU',678,0,0,0,1,'',1),
	(221,6,0,'VE',58,0,0,0,1,'',1),
	(222,3,0,'VN',84,0,0,0,1,'NNNNNN',1),
	(223,2,0,'VG',0,0,0,0,1,'CNNNN',1),
	(224,2,0,'VI',0,0,0,0,1,'',1),
	(225,5,0,'WF',681,0,0,0,1,'',1),
	(226,4,0,'EH',0,0,0,0,1,'',1),
	(227,3,0,'YE',967,0,0,0,1,'',1),
	(228,4,0,'ZM',260,0,0,0,1,'',1),
	(229,4,0,'ZW',263,0,0,0,1,'',1),
	(230,7,0,'AL',355,0,0,0,1,'NNNN',1),
	(231,3,0,'AF',93,0,0,0,1,'NNNN',1),
	(232,5,0,'AQ',0,0,0,0,1,'',1),
	(233,1,0,'BA',387,0,0,0,1,'',1),
	(234,5,0,'BV',0,0,0,0,1,'',1),
	(235,5,0,'IO',0,0,0,0,1,'LLLL NLL',1),
	(236,1,0,'BG',359,0,0,0,1,'NNNN',1),
	(237,8,0,'KY',0,0,0,0,1,'',1),
	(238,3,0,'CX',0,0,0,0,1,'',1),
	(239,3,0,'CC',0,0,0,0,1,'',1),
	(240,5,0,'CK',682,0,0,0,1,'',1),
	(241,6,0,'GF',594,0,0,0,1,'',1),
	(242,5,0,'PF',689,0,0,0,1,'',1),
	(243,5,0,'TF',0,0,0,0,1,'',1),
	(244,7,0,'AX',0,0,0,0,1,'NNNNN',1);

/*!40000 ALTER TABLE `ecommerce_country` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_metodopagamento
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_metodopagamento`;

CREATE TABLE `ecommerce_metodopagamento` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(512) DEFAULT NULL,
  `nome` varchar(512) DEFAULT NULL,
  `prezzo` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ecommerce_metodopagamento` WRITE;
/*!40000 ALTER TABLE `ecommerce_metodopagamento` DISABLE KEYS */;

INSERT INTO `ecommerce_metodopagamento` (`id`, `type`, `nome`, `prezzo`)
VALUES
	(1,'braintree','asdasd','43'),
	(2,'contrassegno','Contrassegno','321');

/*!40000 ALTER TABLE `ecommerce_metodopagamento` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_ordine
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_ordine`;

CREATE TABLE `ecommerce_ordine` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_cliente` int(11) DEFAULT NULL,
  `gateway` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `id_transaction` varchar(512) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL,
  `id_metodospedizione` int(11) DEFAULT NULL,
  `id_indirizzospedizione` int(11) DEFAULT NULL,
  `subtotale` int(11) DEFAULT NULL,
  `totale` int(11) DEFAULT NULL,
  `spedizione` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ecommerce_ordine` WRITE;
/*!40000 ALTER TABLE `ecommerce_ordine` DISABLE KEYS */;

INSERT INTO `ecommerce_ordine` (`id`, `id_cliente`, `gateway`, `id_transaction`, `created_at`, `update_at`, `id_metodospedizione`, `id_indirizzospedizione`, `subtotale`, `totale`, `spedizione`)
VALUES
	(13,8,X'627261696E74726565',X'657865616D793038','2018-07-19 10:23:52',NULL,2,18,100,130,30),
	(14,8,X'636F6E747261737365676E6F',NULL,'2018-07-19 10:25:03',NULL,2,18,789,819,30);

/*!40000 ALTER TABLE `ecommerce_ordine` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto`;

CREATE TABLE `ecommerce_prodotto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8_bin DEFAULT NULL,
  `descrizione` text COLLATE utf8_bin DEFAULT NULL,
  `id_ecommerce_tipologia_prodotto` int(11) DEFAULT NULL,
  `sku` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto` (`id`, `nome`, `slug`, `descrizione`, `id_ecommerce_tipologia_prodotto`, `sku`)
VALUES
	(9,X'466972656E7A65',X'666972656E7A65',X'3C703E0D0A4C6F72656D20697073756D20646F6C6F722073697420616D65742C20636F6E73656374657475722061646970697363696E6720656C69742E2043757261626974757220706C616365726174206D616C6573756164612073616769747469732E20467573636520696163756C697320756C6C616D636F72706572207472697374697175652E204372617320656765742065726F73206F7263692E204E756C6C616D207075727573206F7263692C2073656D7065722076656C20657820677261766964612C207363656C6572697371756520636F6E736571756174206C656F2E20446F6E6563207665686963756C6120636F6E73657175617420656C656966656E642E2050656C6C656E7465737175652066696E696275732C2075726E61206E6F6E20617563746F72207363656C657269737175652C206E696268207175616D20677261766964612070757275732C206575206F726E61726520646F6C6F7220646F6C6F7220696E206E6962682E204E616D206469616D206A7573746F2C20636F6E64696D656E74756D20766974616520616E74652076697461652C206672696E67696C6C612076656E656E6174697320646F6C6F722E2050686173656C6C757320706F72746120747572706973206E69736C2C20696E20626C616E646974206D6175726973206C6F626F72746973207365642E20436C61737320617074656E742074616369746920736F63696F737175206164206C69746F726120746F727175656E742070657220636F6E75626961206E6F737472612C2070657220696E636570746F732068696D656E61656F732E2050726F696E2071756973207363656C65726973717565206C6967756C612E0D0A0D0A0D0A3C2F703E0D0A200D0A3C703E0D0A3C696D67207372633D2268747470733A2F2F7777772E73796E63726F6E69612E636F6D2F73697465732F64656661756C742F66696C65732F6F6C642F796F75617263682F75706C6F6164732F66696C65732F703133372F6269672F312D6D2D74692D72697661313932305F7061746D6F735F646976616E6F5F64697365676E695F7465636E6963695F7064662E6A7067223E0D0A3C2F703E0D0A0D0A0D0A0D0A3C703E0D0A3C7374726F6E673E4E6F6D65206D6F64656C6C6F203A203C2F7374726F6E673E20466972656E7A650D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E537472757474757261203A203C2F7374726F6E673E206C65676E6F206D617373656C6C6F2072696E666F727A61746F2064612070616E6E656C6C69206469206D756C746973747261746F2E0D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E4D6F6C6C656767696F203A203C2F7374726F6E673E2043696E6768696520656C6173746963686520696E63726F63696174650D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E506F676769617465737461203A203C2F7374726F6E673E20506F6C6975726574616E6F2064656E73697461203231204B472E202B205069756D650D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E5370616C6C69657261203A203C2F7374726F6E673E20506F6C6975726574616E6F2064656E73697461CC80203233204B472E2B205069756D610D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E536564757461203A203C2F7374726F6E673E20506F6C6975726574616E6F2048522064656E73697461CC80203330204B472E0D0A3C2F703E0D0A0D0A0D0A3C703E0D0A3C7374726F6E673E4272616363696F6C69203A203C2F7374726F6E673E20506F6C6975726574616E6F2064656E73697461CC80203231204B472E0D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E5069656469203A203C2F7374726F6E673E20506965646520696E206D6574616C6C6F2063726F6D61746F0D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E4D656363616E69736D6F203A203C2F7374726F6E673E20506F676769617465737461206D656363616E69636F206D616E75616C6520636F6E206372696363686574746F2E0D0A3C2F703E0D0A0D0A3C703E0D0A3C7374726F6E673E416C74657A7A61205069656469203A203C2F7374726F6E673E20202031312C3020434D2E0D0A3C2F703E0D0A',3,X'4954432D32303139');

/*!40000 ALTER TABLE `ecommerce_prodotto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto_campi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto_campi`;

CREATE TABLE `ecommerce_prodotto_campi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(512) COLLATE utf8_bin NOT NULL,
  `id_ecommerce_prodotto` int(11) NOT NULL,
  `valore` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto_campi` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto_campi` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto_campi` (`id`, `slug`, `id_ecommerce_prodotto`, `valore`)
VALUES
	(1,X'73636869656E616C65',1,X'50726F76612071'),
	(2,X'6173646173646173',1,X'617364'),
	(3,X'7072657A7A6F',1,X'6173'),
	(4,X'74657374617461',1,X'61616161'),
	(5,X'617364',1,X'313233'),
	(6,X'6173646173646173',3,X'6173'),
	(7,X'7072657A7A6F',3,X'6173'),
	(8,X'74657374617461',3,X'736164'),
	(9,X'617364',3,X'63'),
	(10,X'6C61726768657A7A61',6,X'3838'),
	(11,X'70726F666F6E64697461',6,X'313135'),
	(12,X'616C74657A7A612D736564757461',6,X'3435'),
	(13,X'766F6C756D65',6,X'302E3830'),
	(14,X'7065736F',6,X'3434'),
	(15,X'746167',6,X'70726F7661'),
	(16,X'70726F766163616D706F',6,X'617364617364'),
	(17,X'70726F766163616D706F',9,''),
	(18,X'6C61726768657A7A61',9,''),
	(19,X'70726F666F6E64697461',9,''),
	(20,X'616C74657A7A612D736564757461',9,''),
	(21,X'766F6C756D65',9,''),
	(22,X'7065736F',9,''),
	(23,X'746167',9,''),
	(24,X'7269617373756E746F',9,X'50726F7661');

/*!40000 ALTER TABLE `ecommerce_prodotto_campi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto_immagine
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto_immagine`;

CREATE TABLE `ecommerce_prodotto_immagine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodotto` int(11) NOT NULL,
  `permalink` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto_immagine` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto_immagine` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto_immagine` (`id`, `id_prodotto`, `permalink`)
VALUES
	(10,3,X'2F6D656469612F53636865726D61746120323031382D30362D323620616C6C652031362E34332E30322E706E67'),
	(12,4,X'2F6D656469612F636174616C6F676F2F70726F646F7474692F646976616E312E706E67'),
	(13,4,X'2F6D656469612F636174616C6F676F2F70726F646F7474692F646976616E6F31616D6269656E742E706E67'),
	(14,5,X'2F6D656469612F636174616C6F676F2F70726F646F7474692F646976616E6F322E706E67'),
	(15,5,X'2F6D656469612F636174616C6F676F2F70726F646F7474692F646976616E6F32616D6269656E742E706E67'),
	(16,4,X'2F6D656469612F42616E6E6572546F70446F6E6E612E6A7067'),
	(17,6,X'2F6D656469612F42616E6E6572546F70446F6E6E612E6A7067'),
	(18,9,X'2F6D656469612F636174616C6F676F2F70726F646F7474692F3230313920464952454E5A455F656E762E706E67');

/*!40000 ALTER TABLE `ecommerce_prodotto_immagine` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto_variante
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto_variante`;

CREATE TABLE `ecommerce_prodotto_variante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prodotto` int(11) NOT NULL,
  `sku` varchar(512) COLLATE utf8_bin NOT NULL,
  `prezzo` int(11) NOT NULL,
  `nome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `descrizione` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto_variante` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto_variante` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto_variante` (`id`, `id_prodotto`, `sku`, `prezzo`, `nome`, `descrizione`)
VALUES
	(52,9,X'4954432D323031392D323030',100,X'43757363696E6574746F',X'43757363696E6574746F20636F6D6F646F20657463206574632070726F7661206465736372697A696F6E65'),
	(53,9,X'4954432D323031392D323131',211,X'506F75662072657474616E676F6C617265',NULL),
	(54,9,X'4954432D323031392D373839',789,X'506F6C74726F6E6120636F6E20506F676769617465737461204D656363616E69636F',NULL),
	(55,9,X'4954432D323031392D373931',791,X'446976616E6F203220706F73746920636F6E20706F676769617465737461206D656363616E69636F',NULL),
	(56,9,X'4954432D323031392D373933',793,X'446976616E6F20322E3520706F73746920636F6E20706F676769617465737461206D656363616E69636F',NULL),
	(57,9,X'4954432D323031392D373935',795,X'446976616E6F203320706F73746920636F6E20706F676769617465737461206D656363616E69636F',NULL);

/*!40000 ALTER TABLE `ecommerce_prodotto_variante` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto_variante_attributi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto_variante_attributi`;

CREATE TABLE `ecommerce_prodotto_variante_attributi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ecommerce_prodotto_variante` int(11) NOT NULL,
  `id_ecommerce_attributo` int(11) NOT NULL,
  `id_valore` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto_variante_attributi` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto_variante_attributi` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto_variante_attributi` (`id`, `id_ecommerce_prodotto_variante`, `id_ecommerce_attributo`, `id_valore`)
VALUES
	(9,18,1,11),
	(10,19,1,10),
	(11,19,2,12),
	(12,19,3,13),
	(13,19,4,15),
	(14,20,1,10),
	(15,20,2,12),
	(16,20,3,13),
	(17,20,4,16),
	(18,21,1,10),
	(19,21,2,12),
	(20,21,3,13),
	(21,21,4,17),
	(22,22,1,11),
	(23,22,2,12),
	(24,22,3,13),
	(25,22,4,15),
	(26,23,1,11),
	(27,23,2,18),
	(28,23,3,13),
	(29,23,4,15),
	(30,24,1,10),
	(31,24,2,12),
	(32,24,3,14),
	(33,24,4,15),
	(34,25,1,10),
	(35,25,2,12),
	(36,25,3,13),
	(37,25,4,16),
	(38,26,1,10),
	(39,26,2,12),
	(40,26,3,13),
	(41,26,4,16),
	(42,27,1,10),
	(43,27,2,12),
	(44,27,3,13),
	(45,27,4,15),
	(46,28,1,10),
	(47,28,2,12),
	(48,28,3,13),
	(49,28,4,15),
	(50,29,1,10),
	(51,29,2,12),
	(52,29,3,13),
	(53,29,4,15),
	(54,30,1,10),
	(55,30,2,12),
	(56,30,3,13),
	(57,30,4,15),
	(58,31,1,10),
	(59,31,2,12),
	(60,31,3,13),
	(61,31,4,15),
	(62,32,1,10),
	(63,32,2,12),
	(64,32,3,13),
	(65,32,4,15),
	(66,33,1,10),
	(67,33,2,12),
	(68,33,3,13),
	(69,33,4,15),
	(70,36,1,10),
	(71,36,2,12),
	(72,36,3,13),
	(73,36,4,15),
	(83,40,7,30),
	(86,42,8,33),
	(87,42,9,35),
	(88,43,8,33),
	(89,43,9,36),
	(93,45,7,28),
	(94,46,6,26),
	(95,46,7,30),
	(110,51,8,31),
	(114,52,8,31),
	(118,53,8,32),
	(122,54,8,33),
	(126,55,8,39),
	(130,56,8,40),
	(134,57,8,41);

/*!40000 ALTER TABLE `ecommerce_prodotto_variante_attributi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto_variante_campi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto_variante_campi`;

CREATE TABLE `ecommerce_prodotto_variante_campi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `id_ecommerce_prodotto_variante` int(11) DEFAULT NULL,
  `valore` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto_variante_campi` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto_variante_campi` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto_variante_campi` (`id`, `slug`, `id_ecommerce_prodotto_variante`, `valore`)
VALUES
	(1,X'6C61726768657A7A61',42,X'3838'),
	(2,X'70726F666F6E64697461',42,X'313135'),
	(3,X'616C74657A7A612D736564757461',42,X'3435'),
	(4,X'766F6C756D65',42,X'302E3830'),
	(5,X'7065736F',42,X'3434'),
	(6,X'6C61726768657A7A61',43,X'3838'),
	(7,X'70726F666F6E64697461',43,X'313135'),
	(8,X'616C74657A7A612D736564757461',43,X'3435'),
	(9,X'766F6C756D65',43,X'302E3830'),
	(10,X'7065736F',43,X'3434'),
	(11,X'6C61726768657A7A61',44,X'3838'),
	(12,X'70726F666F6E64697461',44,X'313135'),
	(13,X'616C74657A7A612D736564757461',44,X'3435'),
	(14,X'766F6C756D65',44,X'302E3830'),
	(15,X'7065736F',44,X'3434'),
	(16,X'6C61726768657A7A61',45,X'3838'),
	(17,X'70726F666F6E64697461',45,X'313135'),
	(18,X'616C74657A7A612D736564757461',45,X'3435'),
	(19,X'766F6C756D65',45,X'302E3830'),
	(20,X'7065736F',45,X'3434'),
	(21,X'6C61726768657A7A61',46,X'3838'),
	(22,X'70726F666F6E64697461',46,X'313135'),
	(23,X'616C74657A7A612D736564757461',46,X'3435'),
	(24,X'766F6C756D65',46,X'302E3830'),
	(25,X'7065736F',46,X'3434'),
	(26,X'6C61726768657A7A61',47,X'3838'),
	(27,X'70726F666F6E64697461',47,X'313135'),
	(28,X'616C74657A7A612D736564757461',47,X'3435'),
	(29,X'766F6C756D65',47,X'302E3830'),
	(30,X'7065736F',47,X'3434'),
	(31,X'746167',47,X'70726F7661'),
	(32,X'70726F766163616D706F',47,X'617364617364'),
	(33,X'6C61726768657A7A61',48,X'3838'),
	(34,X'70726F666F6E64697461',48,X'313135'),
	(35,X'616C74657A7A612D736564757461',48,X'3435'),
	(36,X'766F6C756D65',48,X'302E3830'),
	(37,X'7065736F',48,X'3434'),
	(38,X'746167',48,X'70726F7661'),
	(39,X'70726F766163616D706F',48,X'617364617364'),
	(40,X'6C61726768657A7A61',49,X'3838'),
	(41,X'70726F666F6E64697461',49,X'313135'),
	(42,X'616C74657A7A612D736564757461',49,X'3435'),
	(43,X'766F6C756D65',49,X'302E3830'),
	(44,X'7065736F',49,X'3434'),
	(45,X'746167',49,X'70726F7661'),
	(46,X'70726F766163616D706F',49,X'617364617364'),
	(47,X'70726F766163616D706F',50,''),
	(48,X'6C61726768657A7A61',50,''),
	(49,X'70726F666F6E64697461',50,X'3535'),
	(50,X'616C74657A7A612D736564757461',50,''),
	(51,X'766F6C756D65',50,X'302E3030'),
	(52,X'7065736F',50,''),
	(53,X'746167',50,''),
	(54,X'70726F766163616D706F',51,''),
	(55,X'6C61726768657A7A61',51,''),
	(56,X'70726F666F6E64697461',51,X'3535'),
	(57,X'616C74657A7A612D736564757461',51,''),
	(58,X'766F6C756D65',51,X'302E3030'),
	(59,X'7065736F',51,''),
	(60,X'746167',51,''),
	(61,X'70726F766163616D706F',52,''),
	(62,X'6C61726768657A7A61',52,''),
	(63,X'70726F666F6E64697461',52,X'3535'),
	(64,X'616C74657A7A612D736564757461',52,''),
	(65,X'766F6C756D65',52,X'302E3030'),
	(66,X'7065736F',52,''),
	(67,X'746167',52,X'63757363696E6F'),
	(68,X'70726F766163616D706F',53,''),
	(69,X'6C61726768657A7A61',53,X'3434'),
	(70,X'70726F666F6E64697461',53,X'3635'),
	(71,X'616C74657A7A612D736564757461',53,''),
	(72,X'766F6C756D65',53,X'302E3138'),
	(73,X'7065736F',53,X'30'),
	(74,X'746167',53,X'706F7566'),
	(75,X'70726F766163616D706F',54,''),
	(76,X'6C61726768657A7A61',54,X'3732'),
	(77,X'70726F666F6E64697461',54,X'313135'),
	(78,X'616C74657A7A612D736564757461',54,X'3435'),
	(79,X'766F6C756D65',54,X'302E3830'),
	(80,X'7065736F',54,''),
	(81,X'746167',54,X'706F6C74726F6E61'),
	(82,X'70726F766163616D706F',55,''),
	(83,X'6C61726768657A7A61',55,X'3732'),
	(84,X'70726F666F6E64697461',55,X'313135'),
	(85,X'616C74657A7A612D736564757461',55,X'3435'),
	(86,X'766F6C756D65',55,X'312E3330'),
	(87,X'7065736F',55,X'37312E3530'),
	(88,X'746167',55,''),
	(89,X'70726F766163616D706F',56,''),
	(90,X'6C61726768657A7A61',56,X'3732'),
	(91,X'70726F666F6E64697461',56,X'313135'),
	(92,X'616C74657A7A612D736564757461',56,X'3435'),
	(93,X'766F6C756D65',56,X'312E3434'),
	(94,X'7065736F',56,X'37382E3130'),
	(95,X'746167',56,X'646976616E6F'),
	(96,X'70726F766163616D706F',57,''),
	(97,X'6C61726768657A7A61',57,X'3732'),
	(98,X'70726F666F6E64697461',57,X'313135'),
	(99,X'616C74657A7A612D736564757461',57,X'3435'),
	(100,X'766F6C756D65',57,X'312E3537'),
	(101,X'7065736F',57,X'38352E3830'),
	(102,X'746167',57,X'646976616E6F');

/*!40000 ALTER TABLE `ecommerce_prodotto_variante_campi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_prodotto_variante_immagine
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_prodotto_variante_immagine`;

CREATE TABLE `ecommerce_prodotto_variante_immagine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_variante` int(11) NOT NULL,
  `permalink` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_prodotto_variante_immagine` WRITE;
/*!40000 ALTER TABLE `ecommerce_prodotto_variante_immagine` DISABLE KEYS */;

INSERT INTO `ecommerce_prodotto_variante_immagine` (`id`, `id_variante`, `permalink`)
VALUES
	(1,52,X'2F6D656469612F53636865726D61746120323031382D30362D323620616C6C652031362E34332E30322E706E67'),
	(2,57,X'2F6D656469612F636174616C6F676F2F76617269616E74692F6C6F676F2D646F74746F722D636963636172656C6C692D696769656E652D636F72706F2E706E67'),
	(3,57,X'2F6D656469612F636174616C6F676F2F76617269616E74692F6C6F676F322E706E67');

/*!40000 ALTER TABLE `ecommerce_prodotto_variante_immagine` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_provincia
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_provincia`;

CREATE TABLE `ecommerce_provincia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_country` int(11) unsigned NOT NULL,
  `id_zone` int(11) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `iso_code` varchar(7) NOT NULL,
  `tax_behavior` smallint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `id_country` (`id_country`),
  KEY `name` (`name`),
  KEY `id_zone` (`id_zone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ecommerce_provincia` WRITE;
/*!40000 ALTER TABLE `ecommerce_provincia` DISABLE KEYS */;

INSERT INTO `ecommerce_provincia` (`id`, `id_country`, `id_zone`, `name`, `iso_code`, `tax_behavior`, `active`)
VALUES
	(1,21,2,'Alabama','AL',0,1),
	(2,21,2,'Alaska','AK',0,1),
	(3,21,2,'Arizona','AZ',0,1),
	(4,21,2,'Arkansas','AR',0,1),
	(5,21,2,'California','CA',0,1),
	(6,21,2,'Colorado','CO',0,1),
	(7,21,2,'Connecticut','CT',0,1),
	(8,21,2,'Delaware','DE',0,1),
	(9,21,2,'Florida','FL',0,1),
	(10,21,2,'Georgia','GA',0,1),
	(11,21,2,'Hawaii','HI',0,1),
	(12,21,2,'Idaho','ID',0,1),
	(13,21,2,'Illinois','IL',0,1),
	(14,21,2,'Indiana','IN',0,1),
	(15,21,2,'Iowa','IA',0,1),
	(16,21,2,'Kansas','KS',0,1),
	(17,21,2,'Kentucky','KY',0,1),
	(18,21,2,'Louisiana','LA',0,1),
	(19,21,2,'Maine','ME',0,1),
	(20,21,2,'Maryland','MD',0,1),
	(21,21,2,'Massachusetts','MA',0,1),
	(22,21,2,'Michigan','MI',0,1),
	(23,21,2,'Minnesota','MN',0,1),
	(24,21,2,'Mississippi','MS',0,1),
	(25,21,2,'Missouri','MO',0,1),
	(26,21,2,'Montana','MT',0,1),
	(27,21,2,'Nebraska','NE',0,1),
	(28,21,2,'Nevada','NV',0,1),
	(29,21,2,'New Hampshire','NH',0,1),
	(30,21,2,'New Jersey','NJ',0,1),
	(31,21,2,'New Mexico','NM',0,1),
	(32,21,2,'New York','NY',0,1),
	(33,21,2,'North Carolina','NC',0,1),
	(34,21,2,'North Dakota','ND',0,1),
	(35,21,2,'Ohio','OH',0,1),
	(36,21,2,'Oklahoma','OK',0,1),
	(37,21,2,'Oregon','OR',0,1),
	(38,21,2,'Pennsylvania','PA',0,1),
	(39,21,2,'Rhode Island','RI',0,1),
	(40,21,2,'South Carolina','SC',0,1),
	(41,21,2,'South Dakota','SD',0,1),
	(42,21,2,'Tennessee','TN',0,1),
	(43,21,2,'Texas','TX',0,1),
	(44,21,2,'Utah','UT',0,1),
	(45,21,2,'Vermont','VT',0,1),
	(46,21,2,'Virginia','VA',0,1),
	(47,21,2,'Washington','WA',0,1),
	(48,21,2,'West Virginia','WV',0,1),
	(49,21,2,'Wisconsin','WI',0,1),
	(50,21,2,'Wyoming','WY',0,1),
	(51,21,2,'Puerto Rico','PR',0,1),
	(52,21,2,'US Virgin Islands','VI',0,1),
	(53,21,2,'District of Columbia','DC',0,1),
	(54,145,2,'Aguascalientes','AGS',0,1),
	(55,145,2,'Baja California','BCN',0,1),
	(56,145,2,'Baja California Sur','BCS',0,1),
	(57,145,2,'Campeche','CAM',0,1),
	(58,145,2,'Chiapas','CHP',0,1),
	(59,145,2,'Chihuahua','CHH',0,1),
	(60,145,2,'Coahuila','COA',0,1),
	(61,145,2,'Colima','COL',0,1),
	(62,145,2,'Distrito Federal','DIF',0,1),
	(63,145,2,'Durango','DUR',0,1),
	(64,145,2,'Guanajuato','GUA',0,1),
	(65,145,2,'Guerrero','GRO',0,1),
	(66,145,2,'Hidalgo','HID',0,1),
	(67,145,2,'Jalisco','JAL',0,1),
	(68,145,2,'Estado de México','MEX',0,1),
	(69,145,2,'Michoacán','MIC',0,1),
	(70,145,2,'Morelos','MOR',0,1),
	(71,145,2,'Nayarit','NAY',0,1),
	(72,145,2,'Nuevo León','NLE',0,1),
	(73,145,2,'Oaxaca','OAX',0,1),
	(74,145,2,'Puebla','PUE',0,1),
	(75,145,2,'Querétaro','QUE',0,1),
	(76,145,2,'Quintana Roo','ROO',0,1),
	(77,145,2,'San Luis Potosí','SLP',0,1),
	(78,145,2,'Sinaloa','SIN',0,1),
	(79,145,2,'Sonora','SON',0,1),
	(80,145,2,'Tabasco','TAB',0,1),
	(81,145,2,'Tamaulipas','TAM',0,1),
	(82,145,2,'Tlaxcala','TLA',0,1),
	(83,145,2,'Veracruz','VER',0,1),
	(84,145,2,'Yucatán','YUC',0,1),
	(85,145,2,'Zacatecas','ZAC',0,1),
	(86,4,2,'Ontario','ON',0,1),
	(87,4,2,'Quebec','QC',0,1),
	(88,4,2,'British Columbia','BC',0,1),
	(89,4,2,'Alberta','AB',0,1),
	(90,4,2,'Manitoba','MB',0,1),
	(91,4,2,'Saskatchewan','SK',0,1),
	(92,4,2,'Nova Scotia','NS',0,1),
	(93,4,2,'New Brunswick','NB',0,1),
	(94,4,2,'Newfoundland and Labrador','NL',0,1),
	(95,4,2,'Prince Edward Island','PE',0,1),
	(96,4,2,'Northwest Territories','NT',0,1),
	(97,4,2,'Yukon','YT',0,1),
	(98,4,2,'Nunavut','NU',0,1),
	(99,44,6,'Buenos Aires','B',0,1),
	(100,44,6,'Catamarca','K',0,1),
	(101,44,6,'Chaco','H',0,1),
	(102,44,6,'Chubut','U',0,1),
	(103,44,6,'Ciudad de Buenos Aires','C',0,1),
	(104,44,6,'Córdoba','X',0,1),
	(105,44,6,'Corrientes','W',0,1),
	(106,44,6,'Entre Ríos','E',0,1),
	(107,44,6,'Formosa','P',0,1),
	(108,44,6,'Jujuy','Y',0,1),
	(109,44,6,'La Pampa','L',0,1),
	(110,44,6,'La Rioja','F',0,1),
	(111,44,6,'Mendoza','M',0,1),
	(112,44,6,'Misiones','N',0,1),
	(113,44,6,'Neuquén','Q',0,1),
	(114,44,6,'Río Negro','R',0,1),
	(115,44,6,'Salta','A',0,1),
	(116,44,6,'San Juan','J',0,1),
	(117,44,6,'San Luis','D',0,1),
	(118,44,6,'Santa Cruz','Z',0,1),
	(119,44,6,'Santa Fe','S',0,1),
	(120,44,6,'Santiago del Estero','G',0,1),
	(121,44,6,'Tierra del Fuego','V',0,1),
	(122,44,6,'Tucumán','T',0,1),
	(123,10,1,'Agrigento','AG',0,1),
	(124,10,1,'Alessandria','AL',0,1),
	(125,10,1,'Ancona','AN',0,1),
	(126,10,1,'Aosta','AO',0,1),
	(127,10,1,'Arezzo','AR',0,1),
	(128,10,1,'Ascoli Piceno','AP',0,1),
	(129,10,1,'Asti','AT',0,1),
	(130,10,1,'Avellino','AV',0,1),
	(131,10,1,'Bari','BA',0,1),
	(132,10,1,'Barletta-Andria-Trani','BT',0,1),
	(133,10,1,'Belluno','BL',0,1),
	(134,10,1,'Benevento','BN',0,1),
	(135,10,1,'Bergamo','BG',0,1),
	(136,10,1,'Biella','BI',0,1),
	(137,10,1,'Bologna','BO',0,1),
	(138,10,1,'Bolzano','BZ',0,1),
	(139,10,1,'Brescia','BS',0,1),
	(140,10,1,'Brindisi','BR',0,1),
	(141,10,1,'Cagliari','CA',0,1),
	(142,10,1,'Caltanissetta','CL',0,1),
	(143,10,1,'Campobasso','CB',0,1),
	(144,10,1,'Carbonia-Iglesias','CI',0,1),
	(145,10,1,'Caserta','CE',0,1),
	(146,10,1,'Catania','CT',0,1),
	(147,10,1,'Catanzaro','CZ',0,1),
	(148,10,1,'Chieti','CH',0,1),
	(149,10,1,'Como','CO',0,1),
	(150,10,1,'Cosenza','CS',0,1),
	(151,10,1,'Cremona','CR',0,1),
	(152,10,1,'Crotone','KR',0,1),
	(153,10,1,'Cuneo','CN',0,1),
	(154,10,1,'Enna','EN',0,1),
	(155,10,1,'Fermo','FM',0,1),
	(156,10,1,'Ferrara','FE',0,1),
	(157,10,1,'Firenze','FI',0,1),
	(158,10,1,'Foggia','FG',0,1),
	(159,10,1,'Forlì-Cesena','FC',0,1),
	(160,10,1,'Frosinone','FR',0,1),
	(161,10,1,'Genova','GE',0,1),
	(162,10,1,'Gorizia','GO',0,1),
	(163,10,1,'Grosseto','GR',0,1),
	(164,10,1,'Imperia','IM',0,1),
	(165,10,1,'Isernia','IS',0,1),
	(166,10,1,'L\'Aquila','AQ',0,1),
	(167,10,1,'La Spezia','SP',0,1),
	(168,10,1,'Latina','LT',0,1),
	(169,10,1,'Lecce','LE',0,1),
	(170,10,1,'Lecco','LC',0,1),
	(171,10,1,'Livorno','LI',0,1),
	(172,10,1,'Lodi','LO',0,1),
	(173,10,1,'Lucca','LU',0,1),
	(174,10,1,'Macerata','MC',0,1),
	(175,10,1,'Mantova','MN',0,1),
	(176,10,1,'Massa','MS',0,1),
	(177,10,1,'Matera','MT',0,1),
	(178,10,1,'Medio Campidano','VS',0,1),
	(179,10,1,'Messina','ME',0,1),
	(180,10,1,'Milano','MI',0,1),
	(181,10,1,'Modena','MO',0,1),
	(182,10,1,'Monza e della Brianza','MB',0,1),
	(183,10,1,'Napoli','NA',0,1),
	(184,10,1,'Novara','NO',0,1),
	(185,10,1,'Nuoro','NU',0,1),
	(186,10,1,'Ogliastra','OG',0,1),
	(187,10,1,'Olbia-Tempio','OT',0,1),
	(188,10,1,'Oristano','OR',0,1),
	(189,10,1,'Padova','PD',0,1),
	(190,10,1,'Palermo','PA',0,1),
	(191,10,1,'Parma','PR',0,1),
	(192,10,1,'Pavia','PV',0,1),
	(193,10,1,'Perugia','PG',0,1),
	(194,10,1,'Pesaro-Urbino','PU',0,1),
	(195,10,1,'Pescara','PE',0,1),
	(196,10,1,'Piacenza','PC',0,1),
	(197,10,1,'Pisa','PI',0,1),
	(198,10,1,'Pistoia','PT',0,1),
	(199,10,1,'Pordenone','PN',0,1),
	(200,10,1,'Potenza','PZ',0,1),
	(201,10,1,'Prato','PO',0,1),
	(202,10,1,'Ragusa','RG',0,1),
	(203,10,1,'Ravenna','RA',0,1),
	(204,10,1,'Reggio Calabria','RC',0,1),
	(205,10,1,'Reggio Emilia','RE',0,1),
	(206,10,1,'Rieti','RI',0,1),
	(207,10,1,'Rimini','RN',0,1),
	(208,10,1,'Roma','RM',0,1),
	(209,10,1,'Rovigo','RO',0,1),
	(210,10,1,'Salerno','SA',0,1),
	(211,10,1,'Sassari','SS',0,1),
	(212,10,1,'Savona','SV',0,1),
	(213,10,1,'Siena','SI',0,1),
	(214,10,1,'Siracusa','SR',0,1),
	(215,10,1,'Sondrio','SO',0,1),
	(216,10,1,'Taranto','TA',0,1),
	(217,10,1,'Teramo','TE',0,1),
	(218,10,1,'Terni','TR',0,1),
	(219,10,1,'Torino','TO',0,1),
	(220,10,1,'Trapani','TP',0,1),
	(221,10,1,'Trento','TN',0,1),
	(222,10,1,'Treviso','TV',0,1),
	(223,10,1,'Trieste','TS',0,1),
	(224,10,1,'Udine','UD',0,1),
	(225,10,1,'Varese','VA',0,1),
	(226,10,1,'Venezia','VE',0,1),
	(227,10,1,'Verbano-Cusio-Ossola','VB',0,1),
	(228,10,1,'Vercelli','VC',0,1),
	(229,10,1,'Verona','VR',0,1),
	(230,10,1,'Vibo Valentia','VV',0,1),
	(231,10,1,'Vicenza','VI',0,1),
	(232,10,1,'Viterbo','VT',0,1),
	(233,111,3,'Aceh','AC',0,1),
	(234,111,3,'Bali','BA',0,1),
	(235,111,3,'Bangka','BB',0,1),
	(236,111,3,'Banten','BT',0,1),
	(237,111,3,'Bengkulu','BE',0,1),
	(238,111,3,'Central Java','JT',0,1),
	(239,111,3,'Central Kalimantan','KT',0,1),
	(240,111,3,'Central Sulawesi','ST',0,1),
	(241,111,3,'Coat of arms of East Java','JI',0,1),
	(242,111,3,'East kalimantan','KI',0,1),
	(243,111,3,'East Nusa Tenggara','NT',0,1),
	(244,111,3,'Lambang propinsi','GO',0,1),
	(245,111,3,'Jakarta','JK',0,1),
	(246,111,3,'Jambi','JA',0,1),
	(247,111,3,'Lampung','LA',0,1),
	(248,111,3,'Maluku','MA',0,1),
	(249,111,3,'North Maluku','MU',0,1),
	(250,111,3,'North Sulawesi','SA',0,1),
	(251,111,3,'North Sumatra','SU',0,1),
	(252,111,3,'Papua','PA',0,1),
	(253,111,3,'Riau','RI',0,1),
	(254,111,3,'Lambang Riau','KR',0,1),
	(255,111,3,'Southeast Sulawesi','SG',0,1),
	(256,111,3,'South Kalimantan','KS',0,1),
	(257,111,3,'South Sulawesi','SN',0,1),
	(258,111,3,'South Sumatra','SS',0,1),
	(259,111,3,'West Java','JB',0,1),
	(260,111,3,'West Kalimantan','KB',0,1),
	(261,111,3,'West Nusa Tenggara','NB',0,1),
	(262,111,3,'Lambang Provinsi Papua Barat','PB',0,1),
	(263,111,3,'West Sulawesi','SR',0,1),
	(264,111,3,'West Sumatra','SB',0,1),
	(265,111,3,'Yogyakarta','YO',0,1),
	(266,11,3,'Aichi','23',0,1),
	(267,11,3,'Akita','05',0,1),
	(268,11,3,'Aomori','02',0,1),
	(269,11,3,'Chiba','12',0,1),
	(270,11,3,'Ehime','38',0,1),
	(271,11,3,'Fukui','18',0,1),
	(272,11,3,'Fukuoka','40',0,1),
	(273,11,3,'Fukushima','07',0,1),
	(274,11,3,'Gifu','21',0,1),
	(275,11,3,'Gunma','10',0,1),
	(276,11,3,'Hiroshima','34',0,1),
	(277,11,3,'Hokkaido','01',0,1),
	(278,11,3,'Hyogo','28',0,1),
	(279,11,3,'Ibaraki','08',0,1),
	(280,11,3,'Ishikawa','17',0,1),
	(281,11,3,'Iwate','03',0,1),
	(282,11,3,'Kagawa','37',0,1),
	(283,11,3,'Kagoshima','46',0,1),
	(284,11,3,'Kanagawa','14',0,1),
	(285,11,3,'Kochi','39',0,1),
	(286,11,3,'Kumamoto','43',0,1),
	(287,11,3,'Kyoto','26',0,1),
	(288,11,3,'Mie','24',0,1),
	(289,11,3,'Miyagi','04',0,1),
	(290,11,3,'Miyazaki','45',0,1),
	(291,11,3,'Nagano','20',0,1),
	(292,11,3,'Nagasaki','42',0,1),
	(293,11,3,'Nara','29',0,1),
	(294,11,3,'Niigata','15',0,1),
	(295,11,3,'Oita','44',0,1),
	(296,11,3,'Okayama','33',0,1),
	(297,11,3,'Okinawa','47',0,1),
	(298,11,3,'Osaka','27',0,1),
	(299,11,3,'Saga','41',0,1),
	(300,11,3,'Saitama','11',0,1),
	(301,11,3,'Shiga','25',0,1),
	(302,11,3,'Shimane','32',0,1),
	(303,11,3,'Shizuoka','22',0,1),
	(304,11,3,'Tochigi','09',0,1),
	(305,11,3,'Tokushima','36',0,1),
	(306,11,3,'Tokyo','13',0,1),
	(307,11,3,'Tottori','31',0,1),
	(308,11,3,'Toyama','16',0,1),
	(309,11,3,'Wakayama','30',0,1),
	(310,11,3,'Yamagata','06',0,1),
	(311,11,3,'Yamaguchi','35',0,1),
	(312,11,3,'Yamanashi','19',0,1);

/*!40000 ALTER TABLE `ecommerce_provincia` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_spedizione
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_spedizione`;

CREATE TABLE `ecommerce_spedizione` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `sku` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `prezzo` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `id_zona` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_spedizione` WRITE;
/*!40000 ALTER TABLE `ecommerce_spedizione` DISABLE KEYS */;

INSERT INTO `ecommerce_spedizione` (`id`, `nome`, `sku`, `prezzo`, `id_zona`)
VALUES
	(1,X'61736461732064617320',NULL,NULL,NULL),
	(2,X'53706564697A696F6E652064686C',X'73706564697A696F6E652D64686C',X'3330',1);

/*!40000 ALTER TABLE `ecommerce_spedizione` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_spedizione_prezzo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_spedizione_prezzo`;

CREATE TABLE `ecommerce_spedizione_prezzo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_ecommerce_spedizione` int(11) DEFAULT NULL,
  `min` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `type` enum('PREZZO','PESO') COLLATE utf8_bin DEFAULT 'PESO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table ecommerce_tipologia_prodotto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_tipologia_prodotto`;

CREATE TABLE `ecommerce_tipologia_prodotto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(64) COLLATE utf8_bin DEFAULT '',
  `descrizione` text COLLATE utf8_bin DEFAULT NULL,
  `prezzo` int(11) DEFAULT NULL,
  `id_tipologia_prodotto` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_tipologia_prodotto` WRITE;
/*!40000 ALTER TABLE `ecommerce_tipologia_prodotto` DISABLE KEYS */;

INSERT INTO `ecommerce_tipologia_prodotto` (`id`, `nome`, `slug`, `descrizione`, `prezzo`, `id_tipologia_prodotto`)
VALUES
	(1,X'446976616E6F2061203320706F737469',X'646976616E6F2D612D332D706F737469',X'446976616E6F20706963636F6C6F2061203320706F737469',1200,NULL),
	(2,X'446976616E6F2061203520706F737469',X'646976616E6F2D612D352D706F737469','',500,NULL),
	(3,X'466972656E7A65',X'666972656E7A65',X'4E6F6D65206D6F64656C6C6F205374727574747572610D0A4D6F6C6C656767696F20506F676769617465737461205370616C6C6965726120536564757461204272616363696F6C69205069656469204D656363616E69736D6F20416C74657A7A612050696564690D0A464952454E5A450D0A6C65676E6F206D617373656C6C6F2072696E666F727A61746F2064612070616E6E656C6C69206469206D756C746973747261746F2E0D0A43696E6768696520656C6173746963686520696E63726F63696174650D0A506F6C6975726574616E6F2064656E73697461203231204B472E202B205069756D6520506F6C6975726574616E6F2064656E736974613F203233204B472E2B205069756D610D0A506F6C6975726574616E6F2048522064656E736974613F203330204B472E0D0A506F6C6975726574616E6F2064656E736974613F203231204B472E0D0A506965646520696E206D6574616C6C6F2063726F6D61746F0D0A506F676769617465737461206D656363616E69636F206D616E75616C6520636F6E206372696363686574746F2E2031312C3020434D2E',1200,5),
	(4,X'50726F646F74746F2047656E657269636F',X'70726F646F74746F2D67656E657269636F','',123,0),
	(5,X'446976616E6F',X'646976616E6F','',123,4);

/*!40000 ALTER TABLE `ecommerce_tipologia_prodotto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_tipologia_prodotto_campi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_tipologia_prodotto_campi`;

CREATE TABLE `ecommerce_tipologia_prodotto_campi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `slug` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `valore` varchar(512) COLLATE utf8_bin DEFAULT NULL,
  `id_ecommerce_tipologia_prodotto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `ecommerce_tipologia_prodotto_campi` WRITE;
/*!40000 ALTER TABLE `ecommerce_tipologia_prodotto_campi` DISABLE KEYS */;

INSERT INTO `ecommerce_tipologia_prodotto_campi` (`id`, `nome`, `slug`, `valore`, `id_ecommerce_tipologia_prodotto`)
VALUES
	(1,X'7361',X'6173646173646173',X'546573746F',1),
	(2,X'5072657A7A6F',X'7072657A7A6F',X'4E756D65726F',1),
	(3,X'53636869656E616C65',X'73636869656E616C65',X'4E756D65726F',2),
	(4,X'54657374617461',X'74657374617461',X'546573746F',1),
	(5,X'617364',X'617364',X'4E756D65726F',1),
	(6,X'736461',X'617364',X'546573746F',1),
	(7,X'4C61726768657A7A61',X'6C61726768657A7A61',X'546573746F',3),
	(8,X'416C74657A7A61',X'6C61726768657A7A61',X'546573746F',3),
	(9,X'50726F666F6E646974C3A0',X'70726F666F6E64697461',X'546573746F',3),
	(10,X'416C74657A7A6120736564757461',X'616C74657A7A612D736564757461',X'546573746F',3),
	(11,X'566F6C756D65',X'766F6C756D65',X'546573746F',3),
	(12,X'5065736F',X'7065736F',X'546573746F',3),
	(13,X'546167',X'746167',X'546573746F',3),
	(14,X'70726F766163616D706F',X'70726F766163616D706F',X'546573746F',4),
	(15,X'5269617373756E746F',X'7269617373756E746F',X'546573746F',3);

/*!40000 ALTER TABLE `ecommerce_tipologia_prodotto_campi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ecommerce_zona
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ecommerce_zona`;

CREATE TABLE `ecommerce_zona` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `active` tinyint(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ecommerce_zona` WRITE;
/*!40000 ALTER TABLE `ecommerce_zona` DISABLE KEYS */;

INSERT INTO `ecommerce_zona` (`id`, `name`, `active`)
VALUES
	(1,'Europe',1),
	(2,'North America',1),
	(3,'Asia',1),
	(4,'Africa',1),
	(5,'Oceania',1),
	(6,'South America',1),
	(7,'Europe (non-EU)',1),
	(8,'Central America/Antilla',1),
	(9,'Spagnesi',0),
	(10,'Italia zona isole',0);

/*!40000 ALTER TABLE `ecommerce_zona` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gp_attivita
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gp_attivita`;

CREATE TABLE `gp_attivita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_progetto` int(11) DEFAULT NULL,
  `nome` text DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `inizio` text DEFAULT NULL,
  `fine` text DEFAULT NULL,
  `tempoAttivita` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gp_progetti
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gp_progetti`;

CREATE TABLE `gp_progetti` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `descrizione` longtext DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `budget` text DEFAULT NULL,
  `costo_orario` text DEFAULT NULL,
  `ore_preventivate` text DEFAULT NULL,
  `data_inizio` text DEFAULT NULL,
  `data_fine` text DEFAULT NULL,
  `tecnologie` longtext DEFAULT NULL,
  `note` longtext DEFAULT NULL,
  `cliente_nome` text DEFAULT NULL,
  `cliente_cognome` text DEFAULT NULL,
  `cliente_email` text DEFAULT NULL,
  `cliente_telefono` text DEFAULT NULL,
  `cliente_note` longtext DEFAULT NULL,
  `stato` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gp_progetti` WRITE;
/*!40000 ALTER TABLE `gp_progetti` DISABLE KEYS */;

INSERT INTO `gp_progetti` (`id`, `nome`, `descrizione`, `tipo`, `budget`, `costo_orario`, `ore_preventivate`, `data_inizio`, `data_fine`, `tecnologie`, `note`, `cliente_nome`, `cliente_cognome`, `cliente_email`, `cliente_telefono`, `cliente_note`, `stato`, `type`, `modified`)
VALUES
	(1,'prova','','asd','123','','','','','','','','','','','','','progetto',NULL);

/*!40000 ALTER TABLE `gp_progetti` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gp_scadenze
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gp_scadenze`;

CREATE TABLE `gp_scadenze` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_attivita` int(11) DEFAULT NULL,
  `stato` text DEFAULT NULL,
  `scadenza` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table gp_tipologie_attivita
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gp_tipologie_attivita`;

CREATE TABLE `gp_tipologie_attivita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table homepage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `homepage`;

CREATE TABLE `homepage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pagina_id` int(11) DEFAULT NULL,
  `meta_title` varchar(256) COLLATE utf8_bin DEFAULT NULL,
  `meta_description` varchar(1024) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

LOCK TABLES `homepage` WRITE;
/*!40000 ALTER TABLE `homepage` DISABLE KEYS */;

INSERT INTO `homepage` (`id`, `pagina_id`, `meta_title`, `meta_description`)
VALUES
	(1,1,X'79726A686466647366736120646673',X'3161642061736164207364');

/*!40000 ALTER TABLE `homepage` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table media
# ------------------------------------------------------------

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permalink` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `data_creazione` datetime DEFAULT NULL,
  `titolo` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;

INSERT INTO `media` (`id`, `permalink`, `path`, `data_creazione`, `titolo`, `alt`)
VALUES
	(1,'https://cartiamo.it/media//1500x500-true-partecipazioni_di_matrimonio (1).jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(2,'https://cartiamo.it/media//creativa-img1.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(3,'https://cartiamo.it/media//creativa-img2.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(4,'https://cartiamo.it/media//slide-personalizzazione2.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(5,'https://cartiamo.it/media//1500x500-true-slide1.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(6,'https://cartiamo.it/media//slide-contatti.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(7,'https://cartiamo.it/media//1500x500-true-slide_personalizzazione_1.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(8,'https://cartiamo.it/media//slide-faq.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(9,'https://cartiamo.it/media//1500x500-true-slide_comefunziona.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(10,'https://cartiamo.it/media//1500x500-true-slide_pagamenti.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(11,'https://cartiamo.it/media//1500x500-true-resi_e_recessi_arte_sposa.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(12,'https://cartiamo.it/media//slide-assistenza-artesposa.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(13,'https://cartiamo.it/media//1500x500-true-carta2.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(14,'https://cartiamo.it/media//creativo.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(15,'https://cartiamo.it/media//lasciatiispirare.png','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(16,'https://cartiamo.it/media//lasciatiispirare.png','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(17,'https://cartiamo.it/media//Banner_STC.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(18,'https://cartiamo.it/media//comunioni1','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(19,'https://cartiamo.it/media//comunioni2','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(20,'https://cartiamo.it/media//350x400-true-partecipazione_di_matrimonio_rosa.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(21,'https://cartiamo.it/media//350x400-true-partecipazione_matrimonio_rossa.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(22,'https://cartiamo.it/media//350x400-true-partecipazione_matrimonio_tiffany.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(23,'https://cartiamo.it/media//350x400-true-partecipazione_shabby_chic.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(24,'https://cartiamo.it/media//350x400-true-partecipazione_di_matrimonio.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(25,'https://cartiamo.it/media//categorianatale.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(26,'https://cartiamo.it/media//5-idee-per-sposarsi-in-inverno.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(27,'https://cartiamo.it/media//il-matrimonio-perfetto-category.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(28,'https://cartiamo.it/media//blog-bouquet-preview.png','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(29,'https://cartiamo.it/media//blog-matrimonio-country-chic-intro.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(30,'https://cartiamo.it/media//blog-matrimonio-country-chic-m.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(31,'https://cartiamo.it/media//blog-matrimonio-country-chic4.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(32,'https://cartiamo.it/media//blog-matrimonio-country-chic1.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(33,'https://cartiamo.it/media//blog-matrimonio-country-chic2.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(34,'https://cartiamo.it/media//blog-matrimonio-country-chic3.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(35,'https://cartiamo.it/media//MONTAGGIO.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(36,'https://cartiamo.it/media//SFUSTELLAMENTO.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(37,'https://cartiamo.it/media//SCATOLA 2.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(38,'https://cartiamo.it/media//SCATOLA 1.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(39,'https://cartiamo.it/media//matrimonio-a-tema-viaggio-aereoplano.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(40,'https://cartiamo.it/media//matrimonio-a-tema-viaggio.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(41,'https://cartiamo.it/media//matrimonio-viaggio-mezzi-di-trasporto.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(42,'https://cartiamo.it/media//matrimonio-viaggio-torta-valigia-bussola.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(43,'https://cartiamo.it/media//matrimonio-con-aeroplani.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(44,'https://cartiamo.it/media//matrimonio-in-viaggio.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(45,'https://cartiamo.it/media//matrimonio-al-sud.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(46,'https://cartiamo.it/media//matrimonio-vintage.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(47,'https://cartiamo.it/media//matrimonio-trendy.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(48,'https://cartiamo.it/media//bannerino-matrimonio-chic.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(49,'https://cartiamo.it/media//bannerino-matrimonio-glamour.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(50,'https://cartiamo.it/media//bannerino-matrimonio-trendy.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(51,'https://cartiamo.it/media//bannerino-matrimonio-creativo.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(52,'https://cartiamo.it/media//bannerino-matrimonio-classico.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(53,'https://cartiamo.it/media//bannerino-matrimonio-vintage.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(54,'https://cartiamo.it/media//banner-save-the-children.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(55,'https://cartiamo.it/media//banner-save-the-children-mobile.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(56,'https://cartiamo.it/media//banner-matrimonio-al-sud-mobile.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(57,'https://cartiamo.it/media//banner-matrimonio-al-sud.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(58,'https://cartiamo.it/media//banner-matrimonio-country-chic-mobile.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(59,'https://cartiamo.it/media//banner-matrimonio-country-chic.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(60,'https://cartiamo.it/media//la-prima-comunione.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL),
	(61,'https://cartiamo.it/media//idea.jpg','https://cartiamo.it/media/','0000-00-00 00:00:00',NULL,NULL);

/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table meta
# ------------------------------------------------------------

DROP TABLE IF EXISTS `meta`;

CREATE TABLE `meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `entity` text DEFAULT NULL,
  `entity_id` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `og_image` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `meta` WRITE;
/*!40000 ALTER TABLE `meta` DISABLE KEYS */;

INSERT INTO `meta` (`id`, `title`, `entity`, `entity_id`, `description`, `og_image`)
VALUES
	(1,'prova','Pagina','1','Partecipazioni matrimonio online con Save the children . Acquista partecipazioni nozze, inviti e bomboniere per le tue nozze da sogno. Trovi inviti matrimonio e partecipazioni per nozze solidali e prima comunione, regala un pÃ² di felicitÃ  ai bambini meno fortunati.',NULL),
	(2,'','Pagina','2','',NULL),
	(3,'Esperti nella stampa di partecipazioni di nozze - Cartiamo','Pagina','3','Grazie alla nostra pluriennale esperienza nel settore delle partecipazioni di nozze, possiamo offrirvi un vasto assortimento di articoli che potranno soddisfare ogni vostra esigenza.',NULL),
	(4,'Faq, quello che ti serve per il tuo matrimonio perfetto','Pagina','4','Le risposte alla domande piÃ¹ importanti sulle partecipazioni di matrimonio di Cartiamo e save the children! Compra le tue partecipazioni di nozze solidali.',NULL),
	(5,'Termini e condizioni asdasd','Pagina','5','Termini e condizioni',NULL),
	(6,'Sicurezza e privacy','Pagina','6','Sicurezza e privacy',NULL),
	(7,'Contatti Cartiamo','Pagina','7','Contatti',NULL),
	(8,'','Pagina','8','',NULL),
	(9,'','Pagina','9','',NULL),
	(10,'','Pagina','10','',NULL),
	(11,'','Pagina','11','',NULL),
	(12,'','Pagina','12','',NULL),
	(13,'Campione gratuito partecipazioni - idee matrimonio','Pagina','13','Richiedi un campione gratuito delle nostre partecipazioni di nozze, tocca con mano le tue idee matrimonio.',NULL),
	(14,'Collabora con Cartiamo | Partecipazioni di nozze','Pagina','14','Puoi collaborare con noi, inviaci le tue idee per partecipzioni di nozze e comunioni.',NULL),
	(15,'','Pagina','15','',NULL),
	(16,'Il tuo sostegno a Save the Children con le partecipazioni di matrimonio di Cartiamo','Pagina','16','Con le partecipazioni di matrimonio di Cartiamo puoi dare Il tuo sostegno a Save the Children, la piÃ¹ grande Organizzazione internazionale indipendente che lavora per migliorare concretamente la vita dei bambini in Italia e nel mondo',NULL),
	(17,'','Pagina','18','',NULL),
	(18,'Metodi di pagamento Cartiamo','Pagina','19','Metodi di pagamento disponibili su Cartiamo',NULL),
	(19,'','Articolo','','',NULL),
	(20,'Sposarsi in Inverno: 5 idee per un matrimonio invernale | Blog Matrimonio Cartiamo','Articolo','1','Matrimonio invernale? Sposarsi il 31 dicembre? Sposarsi in Inverno? Ti sei mai chiesto come potrebbe essere? Ecco 5 idee per un matrimonio invernale!',NULL),
	(21,'','Articolo','','',NULL),
	(22,'Scegliere il Bouquet: tutti gli stili per una sposa perfetta li trovi su Cartiamo','Articolo','2','Come scegliere il Bouquet per la sposa perfetta, tante idee per un bouquet classico, romantico, minimal o colorato! ',NULL),
	(23,'','Articolo','','',NULL),
	(24,'Il matrimonio country chic: consigli, idee e dettagli, naked cake e decorazioni country chic','Articolo','3','Matrimonio country chic, scopri le location per un matrimonio semplice, idee per decorazioni country chic, bomboniere e le naked cake',NULL),
	(25,'Montaggio della partecipazione di matrimonio','Pagina','21','Scopri come montiamo a mano la tua partecipazione di nozze. Ci mettiamo tutta la cura possibile, come se fosse il nostro matrimonio!',NULL),
	(26,'','Articolo','','',NULL),
	(27,'Matrimonio a tema viaggio: mappe, valigie, aeroplanini e tante idee per un matrimonio originale','Articolo','4','Matrimonio a tema viaggio: mappe, valigie, aeroplanini e tante idee per un matrimonio originale',NULL),
	(28,'Matrimonio al sud, luoghi comuni e partecipazioni','Pagina','22','Oltre ai luoghi comuni sul matrimonio al sud ti presentiamo la nostra selezione di partecipazioni di matrimonio classiche.',NULL),
	(29,'Frasi per prima comunione su partecipazioni personalizzate - Cartiamo','Pagina','23','Il giorno piÃ¹ importante di tuo figlio deve essere perfetto! Vedi le frasi prima comunioni che ti seggeriamo per personalizzare le partecipazioni.',NULL),
	(30,'Idee matrimonio - tema per matrimonio - Cartiamo','Pagina','24','Ti proponiamo le nostre idee matrimonio, da qui puoi iniziare a pensare il tema per il tuo matrimonio per poi personalizzarlo e renderlo unico',NULL),
	(31,'asdasd','Pagina','37','asdasd',NULL);

/*!40000 ALTER TABLE `meta` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table pagina
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pagina`;

CREATE TABLE `pagina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `layout` text DEFAULT NULL,
  `prova` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `pagina` WRITE;
/*!40000 ALTER TABLE `pagina` DISABLE KEYS */;

INSERT INTO `pagina` (`id`, `title`, `slug`, `description`, `content`, `layout`, `prova`)
VALUES
	(1,'Homepage','/','','','page-home.php',''),
	(3,'Chi siamo','chi-siamo',NULL,'<h2 class=\"title\">CHI SIAMO</h2>\r\n<p><strong>Cartiamo</strong> &egrave; il negozio on-line, attraverso il quale puoi ordinare direttamente le tue partecipazioni sul web e fartele recapitare comodamente a casa. Grazie alla nostra pluriennale esperienza nel settore delle partecipazioni di nozze, possiamo offrirvi un vasto assortimento di articoli che potranno soddisfare ogni vostra esigenza. Ordinare le partecipazioni di nozze Cartiamo &egrave; semplice e veloce: il nostro servizio clienti &egrave; a vostra disposizione per chiarimenti e informazioni.</p>\r\n<p><strong>Cartiamo</strong> ha scelto di sostenere <strong>Save the Children</strong>, la pi&ugrave; grande organizzazione internazionale indipendente che lavora per migliorare concretamente la vita dei bambini in Italia e nel mondo. Per il tuo matrimonio potrai decidere se contribuire a sostenere il lavoro di Save the Children scegliendo le Linee Partecipazioni di <strong>Cartiamo</strong>. Il tuo gesto di solidariet&agrave; trasformer&agrave; un momento felice della tua vita in un contributo per i regalare un futuro a migliaia di bambini.</p>\r\n<p>&nbsp;</p>\r\n<p>Per conoscere il lavoro di Save the Children vai su <a href=\"http://www.savethechildren.it/?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=sito&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">www.savethechildren.it</a> e se vuoi aiutare ad assicurare un futuro migliore a tanti bambini vai su <a href=\"http://www.savethechildren.it/donaora?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=sito-cta&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">www.savethechildren.it/donaora</a></p>\r\n<p>Per i tuoi momenti speciali Save the Children puoi scegliese su <a href=\"http://savethechildren.it/bomboniere?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=bmb&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">savethechildren.it/bomboniere</a>&nbsp;le bomboniere solidali, sacchetti e scatoline porta-confetti, e hai la possibilit&agrave; di creare online una Lista Nozze per invitare amici e parenti a regalarti simbolicamente vaccini, kit nascita, latte terapeutico, a sostegno dei bambini di tutto il mondo su&nbsp;<a href=\"http://savethechildren.it/listenozze?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=liste-nozze&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">savethechildren.it/listenozze</a></p>\r\n<div class=\"colonna standardPage\">&nbsp;</div>','page-default.php',NULL),
	(4,'Faq','faq',NULL,'<h3><strong class=\"title\">FAQ</strong></h3>\r\n<h3>&nbsp;</h3>\r\n<h3>Come richiedere un campione gratuito?</h3>\r\n<p>Con <strong>Cartiamo</strong>&nbsp;puoi richiedere fino a 3 campioni e la spedizione &egrave; gratuita! Come fare &egrave; semplicissimo!</p>\r\n<p>Accedi a questa sezione e segui le indicazioni:&nbsp;<a href=\"http://www.partecipazionimatrimonioartesposa.com/info/6/Campione-gratuito.html\" target=\"_blank\">Richiedi un Campione gratuito</a></p>\r\n<p>&nbsp;</p>\r\n<h3>Quanto tempo ci vuole per ricevere i campioni gratuiti?</h3>\r\n<p>Ci vogliono in circa 2 settimane per ricevere i campioni. Vengono spediti tramite posta ordinaria ed il postino li lascia dentro la cassetta postale.</p>\r\n<h3>&nbsp;</h3>\r\n<h3>Quanto tempo ci vuole per fare un ordine?</h3>\r\n<p>Per fare un ordine con noi, ci vogliono in circa due settimane. Dal momento dell&rsquo;ordine fino alla ricezione delle partecipazioni a casa tua.</p>\r\n<h3>&nbsp;</h3>\r\n<h3>Le buste sono comprese nelle partecipazioni?</h3>\r\n<p>Si, tutte le nostre partecipazioni sono comprese di busta.</p>\r\n<h3>&nbsp;</h3>\r\n<h3>Il prezzo indicato in ogni partecipazione &egrave; comprensivo anche dell\'invito al ristorante?</h3>\r\n<p>In alcune partecipazioni l\'invito al ristorante &egrave; gi&agrave; compreso ed in alcuni li dovresti ordinare a parte. Nei casi dove l\'invito &egrave; compreso troverai scritto \"Inviti inclusi nel prezzo\", quando clicchi sulla partecipazione scelta. Nei casi dove l\'invito non &egrave; compreso dovrai cliccare sulla casella \"Invito al Ristorante\" per poter inserire la quantit&agrave; desiderata, qui troverai anche il prezzo corrispondente dell\'invito.</p>\r\n<p>&nbsp;</p>\r\n<h3>Qual &egrave; la differenza tra invito al ristorante e invito al party?</h3>\r\n<p>Con l&rsquo;invito al ristorante inviti i tuoi cari a pranzo o a cena dopo la cerimonia, con l&rsquo;invito al party poi invitare altre persone soltanto ad un party che segue al pranzo o la cena o al taglio della torta.</p>\r\n<p>&nbsp;</p>\r\n<h3>Quanto &egrave; il costo per la stampa delle partecipazioni?</h3>\r\n<p>Il costo di stampa &egrave; &euro; 45,00 per l&rsquo;intero ordine.</p>\r\n<p>&nbsp;</p>\r\n<h3>&Egrave; possibile avere un\'anteprima del risultato finale prima di andare in stampa?</h3>\r\n<p>Dopo aver ricevuto il tuo ordine sul nostro sito, prepareremo una bozza di stampa con il tuo testo personale. Questa bozza ti sar&agrave; inviata per e-mail entro massimo due giorni. Qui hai la possibilit&agrave; di fare tutte le modifiche che vuoi al testo e pi&ugrave; che altro di verificare che non ci siano errori nel testo. Andremo in stampa soltanto con la tua approvazione finale della bozza.</p>\r\n<h3>&nbsp;</h3>\r\n<h3>Per le nostre partecipazioni avremmo bisogno di personalizzare le frasi. &Eacute; possibile effettuare delle modifiche al testo?</h3>\r\n<p>Si, &egrave; possibile. Quando riceverai la nostra bozza di stampa, ci poi confermare tutte le modifiche da fare al testo che desideri.</p>\r\n<p>&nbsp;</p>\r\n<h3>In cosa consiste la bomboniera da poter ordinare insieme alla partecipazione?</h3>\r\n<p>Con Bomboniera intendiamo soltanto il bigliettino che viene inserito nella bomboniera, non la bomboniera stessa.</p>\r\n<p>&nbsp;</p>\r\n<h3>Quanti sono le spese di trasporto?</h3>\r\n<p>La spedizione &egrave; gratuita.</p>\r\n<p>&nbsp;</p>\r\n<h3>Avrei bisogno di inserire anche il biglietto per il regalo con codice iban. &Egrave; possibile?</h3>\r\n<p>Si, &egrave; possibile di inserire un bigliettino per il regalo. Possiamo usare lo stesso bigliettino dell\'invito al ristorante, se non &egrave; incluso nella partecipazione. Altrimenti abbiamo dei cartoncini generici nello stesso formato degli inviti disponibili da poter aggiungere.</p>\r\n<p>&nbsp;</p>\r\n<h3>E&rsquo; possibile cambiare colore della partecipazione?</h3>\r\n<p>Tutte le nostre partecipazioni sono gi&agrave; disponibili cos&igrave; come le vedi sul sito nel nostro magazzino e quindi purtroppo non modificabili nel colore.</p>\r\n<p>&nbsp;</p>\r\n<h3>E\' possibile cambiare il colore del fiocco compreso nella partecipazione?</h3>\r\n<p>In generale non &egrave; un problema cambiare il colore del fiocco se abbiamo il colore richiesto disponibile.</p>\r\n<p>&nbsp;</p>\r\n<h3>Cosa si intende per montaggio? Ha un costo a parte?</h3>\r\n<p>Con \"montaggio\" ci riferiamo al confezionamento della partecipazione. Cio&egrave; finiamo le partecipazioni qui da noi prima della spedizione, p.e. montaggio di un eventuale fiocco, piegatura e/o sfustellatura del biglietto, incollatura di un eventuale accessorio etc. Se non viene richiesto il montaggio, le partecipazioni vengono inviati stesi e divisi in tutti i suoi componenti. Il costo del montaggio &egrave; &euro; 0,37 per ogni partecipazione.</p>\r\n<p>&nbsp;</p>\r\n<h3>Dopo l\'invio e l\'ordine, se per qualche motivo dovessimo avere necessit&agrave; di aggiungere altre partecipazioni, dovremmo pagare nuovamente i costi di messa in stampa?</h3>\r\n<p>Se dobbiamo mettere i biglietti nuovamente in macchina per la stampa, dobbiamo addebitare un piccolo costo per la stampa. Non saranno ovviamente i 45,00 &euro; iniziali, ma un piccolo costo a secondo cosa dobbiamo ristampare purtroppo si.</p>\r\n<p>&nbsp;</p>\r\n<h3>Vorrei sapere se il campo \"indirizzo sposa\" si deve lasciare senza testo oppure con il testo segnaposto \"inserisci in seguito\" in caso di convivenza.</h3>\r\n<p>In caso di convivenza lascia pure il testo \"inserisci in seguito\" nel campo &ldquo;indirizzo sposa&rdquo;.</p>\r\n<p>&nbsp;</p>\r\n<h3>Quale partecipazioni fanno parte delle partecipazioni solidali?</h3>\r\n<p>Tutte le nostre partecipazioni che vedi sul nostro sito Cartiamo.it sono partecipazioni solidali e provvedano il sostegno a Save the Children.</p>\r\n<p>&nbsp;</p>\r\n<h3>Quanto &egrave; la quota che viene trasferito a Save the Children?</h3>\r\n<p>Noi trasferiamo il 15% del valore dei biglietti che vengono acquistate a Save the Children.</p>\r\n<p>&nbsp;</p>\r\n<h3>Scegliendo una partecipazione solidale si ha un foglio dove vi &egrave; scritto che &egrave; una partecipazione solidale? O viene scritto sulla partecipazione?</h3>\r\n<p>Riceverai nel pacco insieme alle tue partecipazioni una pergamenina, nella stessa quantit&agrave; delle partecipazioni, che conferma il sostegno che avete fatto a Save the Children. Potete aggiungere una pergamenina ad ogni partecipazione. Non viene scritto sulla partecipazione.</p>\r\n<p>&nbsp;</p>\r\n<h3>Possiamo detrarre la quota che viene trasferita a Save the Children dalla denuncia dei redditi?</h3>\r\n<p>Purtroppo il sostegno che fate a Save the Children non &egrave; detraibile dal reddito, perch&eacute; si tratta di una donazione indiretta.</p>\r\n<p>&nbsp;</p>','page-default.php',NULL),
	(5,'prova','termini-e-condizioni','','<h1 class=\"title\">TERMINI &amp; CONDIZIONI</h1><div class=\"colonna standardPage\"><h2>OGGETTO DELLE CONDIZIONI GENERALI</h2><p>Le presenti Condizioni Generali hanno per oggetto l\'acquisto di prodotti e di servizi, effettuato a distanza tramite rete telematica sul sito cartiamo.it. Sono esclusi i soggetti quali commercianti, grossisti, rivenditori, professionisti, ecc. che intendano rivendere a terzi i relativi prodotti. Ogni operazione d\'acquisto sar&agrave; regolata dalle disposizioni di cui al Dlgs n. 185/99per la protezione dei consumatori in materia di contratti a distanza e sar&agrave;sottoposta alla normativa di cui al D.Lgs. 196/2003 per quanto concerne latutela della privacy.</p><h2>CONCLUSIONE CONTRATTO E CONDIZIONI GENERALI DI VENDITA</h2><p>Prima di procedere alla conclusione di un contratto di vendita &egrave; necessario registrarsi al Sito, inserendo nome, cognome, indirizzo mail e password (di seguito \"credenziali di registrazione\"). La registrazione sul sito &egrave; gratuita. La registrazione viene confermata a mezzo mail inviata all\'indirizzo fornito dall\'utente. Le credenziali di registrazione devono essere utilizzate esclusivamente dall\'utente e non possono essere cedute a terzi. L\'utente riterr&agrave; Cartiamo&nbsp;indenne da qualsiasi obbligo risarcitorio, sanzione derivante e/o in qualsiasi modo collegati alla violazione da parte dell\'utente delle regole sulla registrazione al Sito. L\'utente &egrave; esclusivo responsabile dell\'accesso al Sito mediante le Credenziali di Registrazione e risponde direttamente di ogni danno o pregiudizio arrecato a&nbsp;Cartiamo o a terze parti da un uso improprio, dalla perdita, dall\'appropriazione indebita da parte di altri ovvero dalla mancata tutela di un\'adeguata segretezza delle proprie Credenziali di Registrazione. Tutte le operazioni effettuate tramite le Credenziali di Registrazione sono considerate effettuate dal cliente a cui le Credenziali stesse si riferiscono.<br />I contratti di vendita dei prodotti sul sito cartiamo.it&nbsp;, si considerano conclusi al momento in cui l\'ordine di acquisto, in formato elettronico, viene trasmesso per via telematica dal cliente a Cartiamo&nbsp;seguendo le istruzioni che compariranno di volta in volta sul sito e quest\'ultima lo accetta inviando all\'utente, all\'indirizzo di posta elettronica indicato, una mail di conferma contenente un link con il quale accedere ad un riepilogo delle Condizioni Generali, delle informazioni relative alle caratteristiche del prodotto acquistato, dell\'indicazione dettagliata del prezzo, del mezzo di pagamento utilizzato, delle modalit&agrave; per l\'esercizio del diritto di recesso, dei costi di spedizione e di eventuali costi aggiuntivi. In ogni modo nessun contratto verr&agrave; ritenuto concluso, senza che il cliente abbia accettato telematicamente le Condizioni Generali di Vendita durante l\'acquisto.<br />Il cliente, con l\'invio telematico del proprio ordine d\'acquisto, dichiara di aver preso visione e di aver accettato le presenti condizioni generali di contratto e si obbliga ad osservarle e rispettarle nei suoi rapporti con Cartiamo.</p><h2>PREZZI</h2><p>I prezzi sono espressi in EURO. Possono subire variazioni. All&rsquo;atto dell&rsquo;acquisto si considerer&agrave; valido il prezzo indicato nel listino. Tutti i prezzi si riferiscono al singolo pezzo.</p><h2>PAGAMENTI</h2><p>Il Cliente potr&agrave; effettuare il pagamento dei prodotti acquistati all&rsquo;atto della conferma d&rsquo;ordine (approvazione bozza di stampa). mediante bonifico bancario, oppure alla consegna della merce mediante contrassegno.</p><h2>COSTI DI SPEDIZIONE</h2><p>I costi di spedizione sono a carico del destinatario, e verranno addebitati in fattura. Al momento della consegna da parte del corriere espresso non deve essere pagata alcuna somma.</p><h2>&nbsp;</h2></div><div class=\"colonna standardPage\"><h2>MODALIT&Agrave; D\'ACQUISTO</h2><p>Le offerte pubblicate sul Sito sono disponibili in durata temporale limitata e con quantit&agrave; di prodotti limitata. La data di validit&agrave; delle offerte &egrave; indicata sul Sito. Tutti i prezzi indicati sul Sito sono espressi in Euro e si intendono comprensivi di IVA. Tale importo sar&agrave; evidenziato separatamente, per ciascun prodotto, sul modulo d\'ordine e sulla mail di conferma dell\'ordine. I prodotti resteranno di propriet&agrave; di Cartiamo&nbsp;fino all\'avvenuto pagamento del prezzo di acquisto e delle spese da parte del Cliente. Cartiamo&nbsp;dar&agrave; corso all\'ordine di acquisto solo dopo aver ricevuto conferma dell\'autorizzazione al pagamento dell\'importo totale dovuto come indicato nell\'ordine. Il cliente acquista il prodotto, le cui caratteristiche sono illustrate on-line nelle relative schede descrittive e tecniche, al prezzo ivi indicato a cui si aggiungono le spese di consegna precisate sul sito. Prima dell\'inoltro dell\'ordine di acquisto viene riepilogato il costo unitario di ogni prodotto prescelto, il costo complessivo in caso di acquisto di pi&ugrave; prodotti e le relative spese di consegna.</p><p>Una volta inoltrato l\'ordine di acquisto, il cliente ricever&agrave; da Cartiamo&nbsp;un messaggio di posta elettronica attestante conferma di avvenuta ricezione dell\'ordine di acquisto e contenente le informazioni relative alle caratteristiche principali del bene acquistato, l\'indicazione dettagliata del prezzo, dei costi di consegna, dei tributi applicabili e dei mezzi di pagamento e contenente un rinvio alle condizioni generali di contratto e alle informazioni circa l\'esistenza del diritto di recesso, alle condizioni e alle modalit&agrave; del suo esercizio visualizzate sul sito.</p><h2>RESPONSABILIT&Agrave; DEGLI UTENTI SUI CONTENUTI CARICATI</h2><p>La selezione dei contenenti da stampare, nonch&eacute; l&rsquo;acquisizione delle relative autorizzazioni alla loro riproduzione, ove necessarie, resta di esclusiva responsabilit&agrave; degli utenti. Nuovaedart non proceder&agrave; in nessun caso alla verifica dei contenuti.</p><h2>DISDETTA ORDINI</h2><p>Lei ha il diritto di recedere dal contratto, senza indicarne le ragioni, entro 14 giorni. Il periodo di recesso scade dopo 14 giorni dal giorno nel caso di un contratto di vendita: &laquo;in cui Lei o un terzo, diverso dal vettore e da Lei designato, acquisisce il possesso fisico dei beni.&raquo;.&nbsp;<br />Per esercitare il diritto di recesso, Lei &egrave; tenuto a informarci della sua decisione di recedere dal presente contratto tramite una dichiarazione esplicita. Per gli ordini gi&agrave; evasi il cliente dovr&agrave; attendere il recapito della merce ed esercitare il Diritto di Recesso.</p><h2>CONSEGNA</h2><p>I prodotti acquistati saranno consegnati da Nuovaedart divisione Cartiamo&nbsp;all\'indirizzo indicato dal Cliente. La consegna avverr&agrave; tramite corriere espresso. Generalmente i corrieri presso cui ci serviamo consegnano la merce nel 95% dei casi entro uno o due giorni dalla spedizione. Al momento della spedizione saranno comunicati, via posta elettronica, gli estremi per monitorare il processo di consegna. La fattura sar&agrave; inserita al l\'interno del pacco contenente le partecipazioni.</p><h2>CONFEZIONI</h2><p>Le confezioni utilizzate sono scatole di cartone. Alla consegna il Cliente deve verificare l&rsquo;integrit&agrave; del pacco, che non sia danneggiato o bagnato o non sigillato In caso di non corrispondenza tra quanto ordinato e quanto consegnato, secondo le caratteristiche sopra descritte, il Cliente dovr&agrave; darne immediata comunicazione contattando il Servizio Clienti.</p></div>','page-default.php',NULL),
	(6,'SICUREZZA & PRIVACY','sicurezza-e-privacy',NULL,'<h1 class=\"title\">SICUREZZA &amp; PRIVACY</h1>\r\n<div class=\"colonna standardPage\">\r\n<h2>PRIVACY POLICY</h2>\r\n<p>Il presente sito internet adotta il trattamento dei dati personali in ossequio alla normativa sulla privacy (D.Lgs. 196/2003) e successive modificazioni. La presente Privacy policy pu&ograve; essere suscettibile di integrazioni e modifiche in virt&ugrave; dell&rsquo;evoluzione normativa, tecnologica, delle migliori prassi e sulla scorta di esigenze interne di ristrutturazione dell&rsquo;architettura digitale.</p>\r\n<p>Il Titolare del trattamento &egrave;&nbsp;Nuovaedart srl&nbsp;SEDE LEGALE:&nbsp;Via Fucini, 7 - 51010 Massa e Cozzile, Pistoia In relazione al trattamento dei propri dati personali, l&rsquo;utente potr&agrave; esercitare i diritti previsti dalla legge scrivendo al seguente indirizzo elettronico:&nbsp;info@nuovaedart.it</p>\r\n<p>Il Responsabile del trattamento dei dati elettronici per la piattaforma web &egrave; il Signor Marco Focosiche si occupa delle richieste privacy inoltrate all&rsquo;e.mail indicata sopra.</p>\r\n<p>Dati raccolti e Finalit&agrave;. I dati di contenuto raccolti vengono trattati nel rispetto della legge e unicamente secondo le finalit&agrave; del servizio richiesto.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"colonna standardPage\">\r\n<p>I dati di navigazione non sono sottoposti a cookies. Non &egrave; applicato nessun meccanismo di archiviazione ne&rsquo; di memorizzazione anche solo temporanea.</p>\r\n<p>Modalit&agrave; di trattamento: i tuoi dati sono trattati temporaneamente, anche elettronicamente nella misura strettamente necessaria per il servizio di vendita online.</p>\r\n<p>Comunicazione a Terzi e diffusione. I Tuoi dati non potranno da noi essere comunicati a terzi o diffusi in alcun modo salvo Tuo esplicito consenso espresso o per eseguire un preciso obbligo di legge o un ordine imperativo dell&rsquo;Autorit&agrave;.</p>\r\n<p>Esercizio diritti Interessato.<br />Ai fini di garantire l&rsquo;esercizio dei diritti dell&rsquo;Interessato di cui all&rsquo;art.&nbsp;7 del D.Lgs. 196/2003&nbsp;il Titolare del trattamento stabilisce come punto di contatto privacy la presente e.mail:&nbsp;info@nuovaedart.it</p>\r\n</div>','page-default.php',NULL),
	(7,'Contatti','contatti',NULL,'<h2 class=\"title\">CONTATTI</h2>\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-md-4 col-lg-4 content-center\">\r\n<p class=\"centered\"><br />CARTIAMO<br />P.IVA 00895050474</p>\r\n</div>\r\n<div class=\"col-sm-6 col-md-4 col-lg-4 content-center\">\r\n<p class=\"centered\"><br />CARTIAMO<br />VIA RENATO FUCINI, 7<br />51010 MASSA E COZZILE (PT)</p>\r\n</div>\r\n<div class=\"col-sm-6 col-md-4 col-lg-4 content-center\">\r\n<p class=\"centered\"><br /><a href=\"mailto:info@cartiamo.it\">INFO@CARTIAMO.IT</a></p>\r\n</div>\r\n</div>','page-default.php',NULL),
	(8,'Come Funziona','come-funziona',NULL,'<h2 class=\"title\">COME FUNZIONA</h2>\r\n<div class=\"row\">\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_shop.jpg\" alt=\"\" /><br />ACCEDI ALLO SHOP</div>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_scelta.jpg\" alt=\"\" /><br />SCEGLI E AGGIUNGI I PRODOTTI PER LE TUE NOZZE</div>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_bottone.jpg\" alt=\"\" /><br />CLICCA SUL PULSANTE PERSONALIZZA E ACQUISTA</div>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_live_preview.jpg\" alt=\"\" /><br />PERSONALIZZA I PRODOTTI INSERENDO I TUOI DATI</div>\r\n<p>&nbsp;<br /><br /><br /></p>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_acquisti.jpg\" alt=\"\" /><br />&nbsp;CLICCA SUL PULSANTE ACQUISTA</div>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_carte_credito.jpg\" alt=\"\" /><br />VAI AL CARRELLO E PAGA</div>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_spedizione.jpg\" alt=\"\" /><br />NOI TE LI FACCIAMO ARRIVARE A CASA TUA</div>\r\n<div class=\"col-sm-6 col-md-3 col-lg-3 \"><img class=\"responsive-full\" title=\"\" src=\"http://beta.websm.it/artesposa.com/images/pagine_footer/come_funziona_anelli.jpg\" alt=\"\" /><br />TI RINGRAZIAMO DI AVERE SCELTO ARTESPOSA</div>\r\n</div>','page-default.php',NULL),
	(9,'Metodo di Pagamento','metodo-di-pagamento',NULL,'<h1 class=\"title\">METODI DI PAGAMENTO</h1>\r\n<div class=\"colonna standardPage\">\r\n<p>Qualit&agrave; e sicurezza, questi sono i requisiti per la vendita online di Arte Sposa!&nbsp;<br />Il nostro shop online utilizza i pi&ugrave; comuni metodi di pagamento, dal <strong>bonifico</strong> al pagamento con <strong>contrassegno</strong>.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"colonna standardPage\">\r\n<p>Per i pi&ugrave; tecnologici &egrave; possibile pagare con <strong>Paypal</strong>, piattaforma di pagamento online pi&ugrave; sicura a livello modiale.</p>\r\n</div>','page-default.php',NULL),
	(10,'Resi & Recessi','resi-e-recessi',NULL,'<h2 class=\"title\">RESI &amp; RECESSI</h2>\r\n<div class=\"colonna standardPage\">\r\n<h2>GARANZIE E PRODOTTI DIFETTOSI</h2>\r\n<p>I prodotti acquistati su&nbsp;<a href=\"http://cartiamo.it\">cartiamo.it</a>&nbsp;sono soggetti alla disciplina, per quanto applicabile, di cui al D.lgs 2.2.2002 n. 24 (G.U. n. 57, 8.3.2002) sui contratti di vendita e sulle garanzie concernenti i beni di consumo e, per quanto non ivi contemplato, alle specifiche disposizioni previste in materia dal Codice Civile. La garanzia si applica al prodotto che presenti difetti di conformit&agrave; e/o malfunzionamenti non riscontrabili al momento dell&rsquo;acquisto. La garanzia sar&agrave; valida purch&egrave; il prodotto sia utilizzato correttamente, nel rispetto della sua destinazione, e sia integro. Condizione necessaria per la validit&agrave; della garanzia &egrave; l&rsquo;integrit&agrave; del prodotto. La garanzia &egrave; personale e si applicher&agrave; solo all\' acquirente originario, essendo riservata ai clienti diretti e non a commercianti, rivenditori, ecc. L&rsquo;eventuale difetto dei prodotti dovr&agrave; essere segnalato entro 24 ore dalla ricezione della merce tramite mail al Servizio Clienti.</p>\r\n<h2>I PASSI DA SEGUIRE SONO I SEGUENTI:</h2>\r\n<p>- segnalare entro le 24 ore dal ricevimento del prodotto il difetto/malfunzionamento al Servizio Clienti&nbsp;Cartiamo&nbsp;si riserva la possibilit&agrave; di effettuare la sostituzione del prodotto dopo opportuna verifica sui campioni delle partecipazioni stampate in ns. possesso. Se non ritenessimo che esistano i presupposti per una sostituzione del prodotto potete a norma di legge recedere dal contratto, facendo gli ulteriori passi</p>\r\n<p>- compilare il modulo di reso/recesso in tutte le sue parti e inviarlo tramite fax al n&deg; +39 0572.773888</p>\r\n<h2>&nbsp;</h2>\r\n</div>\r\n<div class=\"colonna standardPage\">\r\n<h2>DIRITTO DI RECESSO</h2>\r\n<p>Gli acquisti effettuati sul sito&nbsp;<a href=\"http://cartiamo.it\">cartiamo.it</a>&nbsp;sono regolati dalla legge italiana sulle vendite per corrispondenza. In caso di errore nell&rsquo;ordine o ricezione di prodotti non richiesti, il Cliente pu&ograve; esercitare il diritto di recesso, ossia la possibilit&agrave; di restituire il prodotto, entro 10 giorni dalla data di consegna.</p>\r\n<h2>I PASSI DA SEGUIRE SONO I SEGUENTI:</h2>\r\n<p>- compilare il modulo di reso/recesso barrando l&rsquo;opzione &ldquo;voglio avvalermi del D.L. 50 del 15 Gennaio 1992 secondo cui &egrave; consentito il diritto di recesso entro 10 (dieci) giorni lavorativi dalla data di ricezione della merce&rdquo; includendo le proprie coordinate bancarie per il riaccredito del costo del prodotto, e inviarlo tramite fax al n&deg; +39 0572.773888 entro e non oltre i 10 giorni (far&agrave; fede la data ricevimento e la data postale della Raccomandata AR) effettuare una Raccomandata con ricevuta di ritorno ( Raccomandata AR) all&rsquo;indirizzo: Nuovaedart S.p.A Via Renato Fucini, 7 51010 Massa e Cozzile (PT) includendo copia stampata di Modulo di reso/recesso compilato, il prodotto sigillato, il relativo imballo, copia stampata della mail di conferma d&rsquo;ordine (fattura). Valido solo per ordine senza stampa.</p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p>&nbsp;</p>','page-default.php',NULL),
	(11,'Live Preview','live-preview',NULL,'<h1 class=\"title\">LIVE PREVIEW</h1>\r\n<div class=\"colonna standardPage\">\r\n<p><strong>Arte Sposa</strong> ti da la possobilit&agrave; di rendere ancora pi&ugrave; speciale il tuo grande giorno con un nuovo servizio: la personalizzazione delle partecipazioni di matrimonio!&nbsp;<br />Sarai direttamente tu a scegliere cosa e come scrivere sulla tua partecipazione! Come?</p>\r\n<p>1. Accedi al nostro <strong>shop.</strong></p>\r\n<p>2. Selezione la partecipazione che preferisci.</p>\r\n<p>3. Aggiungi i prodotti correlati di cui hai bisogno, es. inviti al ristorante, inviti al party, bomboniere, ecc...</p>\r\n<p>4. Selezione la quantit&agrave; dal preventivo online e premi su \"<strong>Personalizza e Acquista</strong>\".</p>\r\n</div>\r\n<div class=\"colonna standardPage\">\r\n<p>5. Accederai alle sezione <strong>Live preview</strong>.<br />In questa sezione puoi digitare direttamente i <strong>contenuti</strong> della tua partecipazione, scegliere il <strong>tipo di carattere</strong> che preferisci ed il <strong>colore</strong>.<br /><br />6. Se vuoi scegliere altri caratteri o colori per la tua partecipazione clicca nella live preview su&nbsp;<a href=\"http://www.partecipazionimatrimonioartesposa.com/personalizzazione.html\"><strong>vai alla personalizzazione</strong></a>.</p>\r\n<p>7. Terminata la tua personalizzazione potrai procedere con l\'acquisto.</p>\r\n<p>8. Vuoi rivedere la tua Live Preview?&nbsp;<br />Una volta terminato l\'acquisto potrai sempre controllare la tua partecipazione accedendo al tuo account nella sezione \"<strong>live preview</strong>\".<br /><br /></p>\r\n<p>&nbsp;</p>\r\n</div>','page-default.php',NULL),
	(12,'Richiedi Assistenza','assistenza',NULL,'<h1 class=\"title\">RICHIEDI ASSISTENZA</h1>\r\n<p class=\"centered\">Arte Sposa &egrave; sempre vicina ai proprio clienti!<br />Puoi richiedere assistenza per qualsiasi dubbio sui nostri prodotti o su un ordine effettuato.<br /><br />Compila il form sottostante e scrivici le motivazioni per cui richiedi assistenza.<br />Nel caso di un ordine ricordati di indicare il numero d\'ordine che trovi nel tuo account e allega un file. <br />Sarai contattato il prima possibile dal nostro team di specialisti.</p>\r\n<p><br class=\"clear\" /><strong class=\"title\">COMPILA CON I TUOI DATI</strong></p>','page-default.php',NULL),
	(13,'Campione Gratuito','campione-gratuito',NULL,'<header>\r\n<h1 class=\"title\"><strong>CAMPIONE GRATUITO, VALUTA LE TUE IDEE MATRIMONIO</strong></h1>\r\n<h2>Tantissime idee matrimonio, da richiedere gratis per decidere con sicurezza</h2>\r\n</header>\r\n<div class=\"colonna standardPage\">\r\n<p>Con <strong>Cartiamo</strong>&nbsp;richiedere un <strong>Campione Gratuito</strong> per la tua <strong>partecipazione di matrimonio</strong> &egrave; una procedura semplice:</p>\r\n<p>1) Accedi alle sezione del nostro Shop di partecipazioni di matrimonio : Matrimonio chic, glamour, vintage, classico, creativo, trendy.</p>\r\n<p class=\"p1\">3) Lasciati ispirare dalle nostre <strong>idee matrimonio</strong> e scegli la partecipazioni di matrimonio per le quali vuoi richiedere il campione gratuito.</p>\r\n</div>\r\n<div class=\"colonna standardPage\">\r\n<p class=\"p1\">4) Clicca su \"Richiedi un campione\".<br />Hai a disposizione 3 campioni gratuiti, puoi ordinare un solo campione come tutti e tre.</p>\r\n<p>5) Completa l\'ordine ed inserisci i tuoi dati.<br />Ti ricordiamo che i campioni sono gratuiti come anche la spedizione.<strong> I tempi di consegna sono 10/15 giorni lavorativi dalla richiesta d\'invio</strong>.</p>\r\n<p>Se hai dei dubbi puoi sempre contattarci, trovi i nostri dai nella sezione Contatti.</p>\r\n<p>&nbsp;</p>\r\n<h2>Qualche idea per il tuo matrimonio</h2>\r\n<p>Sei indecisa sul tipo di matrimonio che vuoi fare? Non sai quale potrebbe essere la migliore partecipazione per le tue nozze?</p>\r\n<p>Puoi esplorare il nostro shop di partecipzioni di matrimonio oppure consultare il nostro blog per qualche <strong>idea matrimonio!</strong></p>\r\n<ul>\r\n<li class=\"\"><strong><a href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/sposarsi-in-inverno-5-idee-per-un-matrimonio-invernale\">Sposarsi in Inverno: 5 idee per un matrimonio invernale<br /><br /></a></strong></li>\r\n<li class=\"\"><strong><a href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/scegliere-il-bouquet-tutti-gli-stili-per-una-sposa-perfetta\">Scegliere il Bouquet: tutti gli stili per una sposa perfetta<br /><br /></a></strong></li>\r\n<li class=\"\"><strong><a href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/il-matrimonio-country-chic-consigli-idee-e-dettagli\">Il matrimonio country chic: consigli, idee e dettagli<br /><br /></a></strong></li>\r\n<li class=\"\"><strong><a href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/idee-per-matrimonio-tema-viaggio\">Matrimonio a tema viaggio: mappe, valigie, aeroplanini e tante idee per un matrimonio originale</a></strong></li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n<p class=\"clear\">&nbsp;</p>','page-default.php',NULL),
	(14,'Collabora','collabora-con-noi',NULL,'<h2 class=\"title\">COLLABORA CON CARTIAMO</h2>\r\n<p>Il team di Cartiamo &egrave; sempre alla ricerca di nuove idee per offrire ogni anno partecipazioni di matrimonio nuove e contemporanee alle coppie di sposi.<br /><br />Se sei un giovane creativo appassionato di grafica ed hai qualche idea da proporci non esitare a contattarci!</p>\r\n<p><strong>Come funziona?</strong><br /><br />Puoi scriverci all\'indirizzo email <a href=\"mailto:info@cartiamo.it\">info@cartiamo.it</a>&nbsp;per richiedere informazioni pi&ugrave; dettagliate</p>','page-default.php',NULL),
	(15,'Personalizzazione','personalizzazione',NULL,'<h1 class=\"title\">PERSONALIZZAZIONE</h1>\r\n<p>Con&nbsp;Cartiamo&nbsp;sei tu a realizzare le partecipazioni del tuo matrimonio.<br />Ma come fare se vuoi un carattere o un colore differente da quelli presenti nella partecipazione?Nessun problema sei nella sezione giusta!</p>\r\n<p>In fase di aggiunta al carrello e modifica dati potrai scegliere il colore ed il font&nbsp;che vorrai per le scritte.</p>\r\n<p>Qui sotto puoi vedere quelli attualmente disponibili :&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<h2>Colori disponibili per il testo su Cartiamo</h2>\r\n<img src=\"https://cartiamo.it/assets/img/tipi-colore.png\" alt=\"\" /></div>\r\n<div class=\"col-md-6\">\r\n<h2>Tipi di font disponibili su Cartiamo</h2>\r\n<img src=\"https://cartiamo.it/assets/img/tipi-font.png\" alt=\"\" /></div>\r\n</div>','page-default.php',NULL),
	(16,'Save the children - Partecipazioni','collaborazione-save-the-children',NULL,'<h2>&nbsp;</h2>\r\n<h2>IL TUO SOSTEGNO A SAVE THE CHILDREN!</h2>\r\n<p><img src=\"http://cartiamo.it/assets/img/save-the-children-logo.png\" alt=\"\" /></p>\r\n<p>Dal 2008 insieme a migliaia di coppie di sposi, Cartiamo, con le sue di Partecipazioni di Matrimonio sostiene Save the Children, la pi&ugrave; grande Organizzazione internazionale indipendente che dal 1919 lotta per salvare la vita dei bambini e garantire loro un futuro, a ogni costo. Con il tuo importante gesto di solidariet&agrave; trasformerai, infatti, un momento felice della tua vita in un contributo per garantire scuole, libri, cure mediche, acqua potabile e molto altro ancora a migliaia di bambini.</p>\r\n<h5>Ordinando le Partecipazioni di Matrimonio Cartiamo riceverai, per ogni partecipazione ordinata, una piccola pergamena che testimonier&agrave; l&rsquo;impegno a sostegno dell&rsquo;Organizzazione.</h5>\r\n<p>Questo il testo:&nbsp;</p>\r\n<p>&ldquo;Con questa partecipazione solidale gli sposi hanno sostenuto il lavoro di Save the Children per i diritti dei bambini e per migliorare le loro condizioni di vita in tutto il mondo&rdquo;</p>\r\n<p>&nbsp;</p>\r\n<p>Save the Children &egrave; nata nel 1919 e opera in 125 paesi del mondo con programmi di salute e nutrizione, risposta alle emergenze, educazione e protezione e contrasto alla povert&agrave;.</p>\r\n<p>Per conoscere il lavoro di Save the Children vai su <a href=\"http://www.savethechildren.it?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=sito&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">www.savethechildren.it</a>&nbsp;e se vuoi aiutare ad assicurare un futuro migliore a tanti bambini vai su <a href=\"http://www.savethechildren.it/donaora?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=sito-cta&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">www.savethechildren.it/donaora</a></p>\r\n<p>Per tutti i tuoi momenti speciali puoi scegliere anche le bomboniere solidali, sacchetti e scatoline porta-confetti, su <a href=\"http://savethechildren.it/bomboniere?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=bmb&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">savethechildren.it/bomboniere</a>&nbsp;e hai anche la possibilit&agrave; di creare online una Lista Nozze per invitare amici e parenti a regalarti simbolicamente vaccini, kit nascita e latte terapeutico per sostenere i bambini di tutto il mondo. Crea la tua Lista su&nbsp;<a href=\"http://savethechildren.it/listenozze?utm_source=crtm&amp;utm_medium=partner&amp;utm_content=liste-nozze&amp;utm_campaign=rf-bmb&amp;utm_term=lnk\" target=\"_blank\">savethechildren.it/listenozze</a>.</p>\r\n<p>&nbsp;</p>\r\n<h3>Che cos\'&egrave; una lista nozze di Save the Children e come faccio a crearla online?</h3>\r\n<p>In occasione del tuo matrimonio, puoi creare la tua lista nozze su savethechildren.it/listenozze personalizzandola con un messaggio, una foto, un video e con i doni simbolici che desideri ricevere.</p>\r\n<p>I tuoi invitati avranno l&rsquo;occasione di scegliere tra, ad esempio, latte terapeutico, vaccini, kit nascita e alberi da frutto e tu riceverai una cartolina per ogni regalo, con il loro messaggio. La donazione andr&agrave; concretamente a beneficio dei bambini delle aree in cui Save the Children lavora.</p>\r\n<p>&nbsp;</p>\r\n<h3>Come posso ordinare le bomboniere di Save the Children?</h3>\r\n<p>Per ordinare le tue bomboniere vai su savethechildren.it/bomboniere , scegli il modello che preferisci, seleziona la quantit&agrave; e segui il processo d\'acquisto.</p>\r\n<p>Puoi scegliere tra : scatoline porta-confetti e pergamene (cartacee o digitali), cartoline salva-vita (vaccini/latte terapeutico/kit scolastici/Sostegno a Distanza) e Card usb.</p>\r\n<p>Le bomboniere sono spedite tramite corriere non oltre 7 giorni dalla ricezione dell\'ordine.</p>\r\n<p>&nbsp;</p>\r\n<h3>Come posso sostenere Save the Children con una donazione?</h3>\r\n<p>Puoi sostenere i progetti di Save the Children in aiuto di tanti bambini in Italia e nel mondo, direttamente online su savethechildren.it/donaora. Con la tua donazione, sempre pi&ugrave; bambini avranno tutto ci&ograve; che serve per crescere e diventare grandi. Puoi scegliere di donare anche :</p>\r\n<ul>\r\n<li>\r\n<p>chiamando il numero verde 800 98 88 19 (tutti i giorni dalle 9 alle 21)</p>\r\n</li>\r\n<li>\r\n<p>Con BONIFICO BANCARIO. Intesta il tuo bonifico, ricordandoti di indicare il tuo nome, cognome e recapito nelle note, a:</p>\r\n<p>Save the Children Italia ONLUS - Via Volturno, 58 - 00185 ROMA</p>\r\n<p><strong>Banca Popolare Etica</strong></p>\r\n<p>IT60N0501803200000000118400</p>\r\n<p>Bic-Swift CCRTIT2T84A</p>\r\n<p>&nbsp;</p>\r\n<p>Banca Prossima</p>\r\n<p>IT67A0335901600100000005071</p>\r\n<p>Bic-Swift BCITITMX</p>\r\n<p>&nbsp;</p>\r\n<p>Bancoposta</p>\r\n<p>IT19Z0760101600000043019207</p>\r\n<p>Bic-Swift BPPIITRRXXX</p>\r\n</li>\r\n<li>\r\n<p>Con CONTO CORRENTE POSTALE</p>\r\n<p>C/C POSTALE n.43019207</p>\r\n<p>Intestato a Save the Children Italia ONLUS</p>\r\n<p>Via Volturno 58 - 00185 Roma</p>\r\n</li>\r\n<li>\r\n<p>Destinando il tuo 5 X MILLE a Save the Children, inserendo il codice fiscale 97227450158 e la tua firma nell\'apposito spazio &ldquo;Sostegno del volontariato, delle Organizzazioni Non Lucrative di Utilit&agrave; Sociale&rdquo; della tua dichiarazione dei redditi.</p>\r\n</li>\r\n</ul>','page-default.php',NULL),
	(17,'Prova','prova',NULL,NULL,NULL,NULL),
	(18,'Supporto ordini','supporto-ordini',NULL,'<h2>Hai effettuato un ordine e non sai come andare avanti?</h2>\r\n<p>Puoi contattarci direttamente alla mail&nbsp;<a href=\"mailto:info@cartiamo.it\">info@cartiamo.it</a>&nbsp;per spiegarci i tuoi problemi o i tuoi dubbi oppure utilizzare la chat sul sito e parlare con un nostro operatore.</p>\r\n<p>&nbsp;</p>\r\n<h3>Grazie mille</h3>','page-default.php',NULL),
	(19,'Metodi di pagamento','metodi-di-pagamento',NULL,'<h1>Metodi di pagamento</h1>\r\n<p>I metodi di pagamento accettati su <strong>Cartiamo</strong> sono :</p>\r\n<ul>\r\n<li>Bonifico Bancario</li>\r\n<li>Carta di credito</li>\r\n</ul>\r\n<p>&nbsp;</p>','page-default.php',NULL),
	(20,'Il Montaggio della Partecipazione','montaggio partecipazione',NULL,NULL,NULL,NULL),
	(21,'Il Montaggio','montaggio-della-partecipazione',NULL,'<h1 style=\"text-align: center;\"><strong><span style=\"font-size: 1.5em;\">Il Montaggio della Partecipazione</span></strong></h1>\r\n<p>Per Montaggio della Partecipazione, dove disponibile, intendiamo la separazione di ogni singola parte dal&nbsp;foglio di taglio e la composizione della partecipazione con eventuali innesti, collegamenti di cordicelle, fiocchi e tutto ci&ograve; che serve per completare la partecipazione e renderla pronta all\'invio per posta.&nbsp;</p>\r\n<p>&nbsp;</p>','page-default.php',NULL),
	(22,'Matrimonio al sud','matrimonio-al-sud',NULL,'<header>\r\n<h1 style=\"text-align: center;\"><span style=\"font-size: 1.3em;\"><strong>Matrimonio al sud</strong></span></h1>\r\n<h2>Luoghi comuni e partecipazioni per matrimoni al sud</h2>\r\n</header>\r\n<div class=\"row\">\r\n<div class=\"col-md-7\">\r\n<p>I luoghi comuni sul <strong>matrimonio al sud</strong> li conosciamo un p&ograve; tutti, tradizionale, esuberante ed infinito. Al Nord si tende a celebrare le nozze in posti ricercati, come spiagge, castelli o giardini fioriti; sposarsi al sud vuol dire invece&nbsp;<strong>sposarsi rigorosamente in chiesa</strong> con presenti tutti i parenti, amici, parenti di amici, amici di parenti di amici di parenti... insomma tutta la famiglia allargata deve essere presente al tuo matrimonio.</p>\r\n<p>L\'abito da sposa non pu&ograve; essere minimale, tutto deve essere classico ed in grande stile.</p>\r\n<p>il tuo matrimonio rappresenta il giorno pi&ugrave; importante della tua vita e per questo ogni <strong>matrimonio al sud&nbsp;</strong>deve terminare con un enorme banchetto con almeno 10 portate.</p>\r\n<p>&nbsp;</p>\r\n<h2>Partecipazioni di matrimonio classiche</h2>\r\n<p>Per un <strong>matrimonio al sud</strong> le&nbsp;<a title=\"Partecipazioni classiche\" href=\"http://localhost/shop/matrimoni/classica\">partecipazioni migliori</a> sono sicuramente quelle della nostra <strong>linea classica.&nbsp;Cartiamo</strong> ti propone una&nbsp;grandissima variet&agrave; di partecipazioni di matrimonio, da quelle creative a quelletrendy, vintage e glamour ma qui sotto puoi trovare una selezione delle nostre migliori <strong>partecipazioni di matrimonio classiche</strong>, sicuramente le migliori per un <em>matrimonio al sud.</em></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-md-5\">\r\n<p>Questi sono solo alcuni dei luoghi comuni sui <strong>matrimoni al sud</strong> ma ne esistono tanti altri... ci sono anche molte commedie e film che li rappresentano ma sicuramente un buon concentrato lo possiamo trovare proprio nel film \"<strong>Matrimonio al sud</strong>\"</p>\r\n<h4>Trailer Matrimonio al sud</h4>\r\n<iframe style=\"max-width: 100%;\" src=\"https://www.youtube.com/embed/rvsQfkfB4sQ\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></div>\r\n</div>','page-default.php',NULL),
	(23,'Prima comunione','auguri-prima-comunione',NULL,'<div class=\"row\">\r\n<div class=\"col-md-7\">\r\n<h1><strong>La prima comunione, frasi e partecipazioni</strong></h1>\r\n<p>Come sappiamo tutti, la <strong>prima comunione</strong>&nbsp;&egrave; il momento in cui i ragazzi si accostano per la prima volta al sacramento dell\'Eucaristia. Da sempre &egrave; un momento importantissimo per la vita di chiunque che viene atteso e festeggiato da tutta la famiglia.</p>\r\n<p>Qui a cartiamo ci occupiamo e teniamo a cuore tutto quello che riguarda la famiglia, non solo il matrimonio ma anche <strong>partecipazioni per la prima comunione</strong> di tuo figlio, siamo sempre a disposizione per domande o suggerimenti, ci puoi contattare quando vuoi tramite la chat sul sito!</p>\r\n<p><strong>La prima comunione di tuo figlio deve essere indimenticabile!</strong></p>\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"col-md-5 bg1 \" style=\"padding: 2em;\">\r\n<h2>In collaborazione con Save the Children</h2>\r\n<p>La nostra collaborazione con&nbsp;<a title=\"Partecipazioni prima comunione Save the Children\" href=\"https://cartiamo.it/collaborazione-save-the-children\">Save the Children</a> risulta forse ancora pi&ugrave; importante se accostata alle <strong>partecipazioni per prima comunione</strong>.</p>\r\n<p>Facendo gli <strong>auguri prima comunione</strong> tramite <strong>Cartiamo</strong> scegli di devolvere una percentuale ai bambini che ne hanno bisogno tramite Save the Children.</p>\r\n</div>\r\n</div>\r\n<h2>Frasi prima comunione</h2>\r\n<p>Prima cosa da&nbsp;trovare&nbsp;per una perfetta <strong>prima comunione</strong> sono le giuste <em>frasi auguri per prima comunione</em>. Ci siamo presi la liberta di&nbsp;farti una piccola lista di <strong>frasi da dedicare</strong> alla <strong>prima comunione</strong> di tuo figlio dalle quali puoi prendere spunto.</p>\r\n<p>Ecco alcune <strong>frasi per la prima comunione</strong> :&nbsp;</p>\r\n<ul>\r\n<li>\r\n<p><em>Ricevere la Prima Comunione &egrave; come nascere di nuovo con Ges&ugrave;. Tanti auguri per questo giorno importante</em></p>\r\n</li>\r\n<li>\r\n<p><em>Oggi con la Prima Comunione, riceverai un bene prezioso; conservalo per sempre nel tuo cuore. Che il Signore ti accompagni in una vita piena di gioia.</em></p>\r\n</li>\r\n<li>\r\n<p><em>Vivi e credi per raggiungere i tuoi sogni.</em></p>\r\n</li>\r\n<li>\r\n<p><em>La tua Prima Comunione &egrave; il primo passo verso la strada del Signore.</em></p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<h2>Partecipazioni per prima comunione</h2>\r\n<h3>Personalizza le frasi per comunione da inserire nelle partecipazioni</h3>\r\n<p>Sulle&nbsp;<strong>partecipazioni per comunioni</strong>&nbsp;di cartiamo puoi modificare tutto quello che vuoi, quindi potrai tranquillamente inserire&nbsp;i tuoi&nbsp;<em>auguri prima comunione preferiti</em>!&nbsp;</p>\r\n<p>Ecco alcune partecipazioni che ti consigliamo per fare gli <strong>auguri di prima comunione</strong> per questo giorno importantissimo!</p>\r\n<p>&nbsp;</p>','page-default.php',NULL),
	(24,'Idee matrimonio','idee-matrimonio',NULL,'<header>\r\n<h1><span style=\"font-size: 1.2em;\"><strong>Raccolta di idee matrimonio</strong></span></h1>\r\n<h2>Tantissime idee per matrimonio, dal matrimonio country chic al viaggio, fino al matrimonio al sud</h2>\r\n</header>\r\n<p>Siamo sempre attivi per trovare nuove <strong>idee matrimonio&nbsp;</strong>da suggerirvi, dai post del nostro blog e idee un p&ograve; pi&ugrave; particolari su pagine di approfondimento su <strong>Cartiamo.</strong>&nbsp;</p>\r\n<p>Ecco, questa pagina deve essere per te, per facilitarti la ricerca e trovare immediatamente l\'<em>idea giusta per il tuo matrimonio.</em></p>\r\n<p>&nbsp;</p>\r\n<div class=\"row\">\r\n<div class=\"col-md-7\">\r\n<h2><strong>Idee matrimonio particolari</strong></h2>\r\n<p>Ecco una lista di <strong>idee per matrimonio</strong> particolari, per delle nozze perfette!</p>\r\n<div class=\"list-group \"><strong><a class=\"list-group-item\" title=\"Idee matrimonio tema viaggio\" href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/idee-per-matrimonio-tema-viaggio\">MATRIMONIO A TEMA VIAGGIO: MAPPE, VALIGIE, AEROPLANINI E TANTE IDEE PER UN MATRIMONIO ORIGINALE</a></strong> <strong><a class=\"list-group-item\" title=\"Idee matrimonio - matrimonio country chic\" href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/il-matrimonio-country-chic-consigli-idee-e-dettagli\">IL MATRIMONIO COUNTRY CHIC: CONSIGLI, IDEE E DETTAGLI</a></strong> <strong><a class=\"list-group-item\" title=\"Idee matrimonio - matrimonio invernale\" href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/sposarsi-in-inverno-5-idee-per-un-matrimonio-invernale\">SPOSARSI IN INVERNO: 5 IDEE PER UN MATRIMONIO INVERNALE</a></strong> <strong><a class=\"list-group-item\" title=\"Idee matrimonio - matrimonio al sud\" href=\"https://cartiamo.it/matrimonio-al-sud\">MATRIMONIO AL SUD</a></strong></div>\r\n</div>\r\n<div class=\"col-md-5\">\r\n<h2><strong>Idee accessori e gadget per nozze</strong></h2>\r\n<p>Un matrimonio perfetto ha bisogno anche di accessori e gadget correlati, ecco qualche idea per scegliere quelli giusti!</p>\r\n<div class=\"list-group \"><strong><a class=\"list-group-item\" title=\"Idee matrimonio- bouquet\" href=\"https://cartiamo.it/blog/il-matrimonio-perfetto/scegliere-il-bouquet-tutti-gli-stili-per-una-sposa-perfetta\"> SCEGLIERE IL BOUQUET: TUTTI GLI STILI PER UNA SPOSA PERFETTA</a></strong></div>\r\n</div>\r\n</div>\r\n<h2>&nbsp;</h2>\r\n<h2><strong>Facci conoscere la tua storia!</strong></h2>\r\n<p>Hai avuto una <strong>idea particolare per il tuo matrimonio</strong>?&nbsp;</p>\r\n<p>O semplicemente vuoi condividere anche con noi il giorno pi&ugrave; importante della tua vita?</p>\r\n<p>Se vuoi, a noi fa piacere leggere le tue <strong>idee matrimonio&nbsp;</strong>e potrebbero essere utilissime anche ad altre altre persone, per realizzare il loro <strong>matrimonio da sogno!</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Inviaci una mail a <strong><a href=\"mailto:info@cartiamo.it\">info@cartiamo.it</a>&nbsp;,</strong>&nbsp;condividi con noi le tue idee per matrimonio&nbsp;e la tua storia, le pubblicheremo su questa pagina in modo che siano d\'aiuto per i prossimi sposini :)</p>\r\n<p>Grazie!</p>','page-default.php',NULL),
	(25,'asdasd','asdsd','asd','<p>asdas</p>','asdad',NULL),
	(26,'asdasd','asdsd','asd','<p>asdas</p>','asdad',NULL),
	(27,'asdasd','asdsd','asd','<p>asdas</p>','asdad',NULL),
	(28,'asdasd','asdsd','asd','<p>asdas</p>','asdad',NULL),
	(29,'asdasd','asdsd','asd','<p>asdas</p>','asdad',NULL),
	(30,'dasd','asdasd','asdsd','','asdasd',NULL),
	(31,'dasd','asdasd','asdsd','<p>asdasd</p>','asdasd',NULL),
	(32,'dasd','asdasd','asdsd','<p>asdasd</p>','asdasd',NULL),
	(33,'dasd','asdasd','asdsd','<p>asdasd</p>','asdasd',NULL),
	(34,'sadsd','asd','asd','','asdasd',NULL),
	(35,'sadasd','asdasd','asddas','','32',NULL),
	(36,'weqrwteyruti74352rwef','asasd','123','','asdasd',NULL),
	(37,'Prova nuova pagina','prova-nuova-pagina','asdasd','','asdasd',NULL),
	(38,'prova2','asasd','opo','','asd',NULL),
	(39,'sadasd','ddsa','asd','','asd',NULL),
	(40,'Prova nuova pagina ye ye','prova-nuova-pagina-ye-ye','','','as',NULL);

/*!40000 ALTER TABLE `pagina` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table popup
# ------------------------------------------------------------

DROP TABLE IF EXISTS `popup`;

CREATE TABLE `popup` (
  `id` int(11) NOT NULL,
  `nome` text DEFAULT NULL,
  `titolo` text DEFAULT NULL,
  `testo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `layout` text DEFAULT NULL,
  `immagine` int(11) DEFAULT NULL,
  `immagine_mobile` int(11) DEFAULT NULL,
  `data_creazione` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `author` bigint(20) NOT NULL,
  `data` datetime NOT NULL,
  `content` longtext NOT NULL,
  `title` text NOT NULL,
  `excerpt` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `slug` text NOT NULL,
  `permalink` text NOT NULL,
  `modified` datetime NOT NULL,
  `type` text NOT NULL,
  `layout` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table settings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(2) DEFAULT NULL,
  `key_name` varchar(512) DEFAULT NULL,
  `key_value` text DEFAULT NULL,
  `key_group` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;

INSERT INTO `settings` (`id`, `created_on`, `modified_on`, `active`, `key_name`, `key_value`, `key_group`)
VALUES
	(1,'2016-12-13 22:48:18','0000-00-00 00:00:00',NULL,'web_url','',''),
	(2,'2018-04-06 10:43:00','0000-00-00 00:00:00',NULL,'frontend_template','cartiamo',''),
	(3,'2016-12-13 22:48:18','0000-00-00 00:00:00',NULL,'media_path','','media'),
	(4,'2016-12-31 12:37:53','0000-00-00 00:00:00',NULL,'home_page','1',''),
	(5,'2017-12-07 15:59:36','0000-00-00 00:00:00',NULL,'blog_titolo_home','Blog Cartiamo',''),
	(6,'2017-12-07 15:59:36','0000-00-00 00:00:00',NULL,'blog_description_home','Il blog dedicato al matrimonio by Cartiamo! Potrai trovare tanti spunti per organizzare una cerimonia perfetta per te e per i tuo invitai. Noi ti proporremo tante idee originali matrimonio, cerimonia, inviti e abiti da sposa e da sposa, TU deciderai quelle migliori per il tuo giorno perfetto!',''),
	(7,'2017-12-07 15:59:36','0000-00-00 00:00:00',NULL,'blog_testosidebar_articolo','','');

/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sitemap
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sitemap`;

CREATE TABLE `sitemap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titolo` text DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `tipo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `contenuto` longtext DEFAULT NULL,
  `id_media` int(11) DEFAULT NULL,
  `hook` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table slide
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slide`;

CREATE TABLE `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `titolo` text DEFAULT NULL,
  `testo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `link_text` text DEFAULT NULL,
  `hook` text DEFAULT NULL,
  `ordine` int(11) DEFAULT NULL,
  `immagine` int(11) DEFAULT NULL,
  `immagine_mobile` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `slide` WRITE;
/*!40000 ALTER TABLE `slide` DISABLE KEYS */;

INSERT INTO `slide` (`id`, `nome`, `titolo`, `testo`, `link`, `link_text`, `hook`, `ordine`, `immagine`, `immagine_mobile`)
VALUES
	(1,'Prova','Partecipazioni matrimonio 2017','Esplora il nostro shop, scopri le nostre partecipazioni ed inviti per ogni occasione','/shop/matrimoni','Vai allo shop','home',NULL,54,55),
	(2,'Matrimonio al sud','Matrimonio al sud, un matrimonio classico','Il matrimonio al sud Ã¨ da sempre un matrimonio classico nel rispetto delle tradizioni','/matrimonio-al-sud','','home',NULL,57,56),
	(3,'Matrimonio country chic','Idee matrimonio country chic','Tante idee per matrimonio country chic','https://cartiamo.it/blog/il-matrimonio-perfetto/il-matrimonio-country-chic-consigli-idee-e-dettagli','Idee matrimonio country chic','home',NULL,59,58);

/*!40000 ALTER TABLE `slide` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table stats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `stats`;

CREATE TABLE `stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chiave` varchar(10) COLLATE utf8_bin NOT NULL,
  `valore` varchar(256) COLLATE utf8_bin NOT NULL,
  `token` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table template
# ------------------------------------------------------------

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text DEFAULT NULL,
  `nomemacchina` text DEFAULT NULL,
  `descrizione` text DEFAULT NULL,
  `altezza` int(11) DEFAULT NULL,
  `larghezza` int(11) DEFAULT NULL,
  `contenuto` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table terms
# ------------------------------------------------------------

DROP TABLE IF EXISTS `terms`;

CREATE TABLE `terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_bin NOT NULL,
  `slug` text COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `featured_image` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table terms_posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `terms_posts`;

CREATE TABLE `terms_posts` (
  `posts_id` int(11) NOT NULL,
  `terms_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `type` int(2) DEFAULT NULL,
  `active` int(2) DEFAULT NULL,
  `nome` varchar(512) DEFAULT NULL,
  `cognome` varchar(512) DEFAULT NULL,
  `data_di_nascita` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `profile_img` int(11) DEFAULT NULL,
  `storia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`, `last_modified`, `last_login`, `type`, `active`, `nome`, `cognome`, `data_di_nascita`, `profile_img`, `storia`)
VALUES
	(1,'limulow','3da9d81ee8a2d9411a7e05a1d1b3834c','asdas','2017-03-07 21:35:00','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,NULL,NULL,'2018-07-19 08:18:21',NULL,NULL),
	(2,'paolo','3140a05ab2e0be1fbc92043ccab60f3e','','2017-12-13 17:16:11','0000-00-00 00:00:00','0000-00-00 00:00:00',0,1,'Paolo','Biancalana','0000-00-00 00:00:00',1,NULL);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table widget
# ------------------------------------------------------------

DROP TABLE IF EXISTS `widget`;

CREATE TABLE `widget` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class` text COLLATE utf8_bin DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `data` text COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
