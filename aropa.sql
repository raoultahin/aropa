-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Octobre 2017 à 14:17
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aropa`
--

-- --------------------------------------------------------

--
-- Structure de la table `appui_menage`
--

CREATE TABLE `appui_menage` (
  `ID_APPUI_MENAGE` int(11) NOT NULL,
  `ID_MENAGE` int(11) NOT NULL,
  `ID_PARENT` int(11) DEFAULT NULL,
  `ID_FORMATION` int(11) DEFAULT NULL,
  `OBJET_NATURE` varchar(255) DEFAULT NULL,
  `QTE` decimal(7,2) DEFAULT NULL,
  `UNITE` varchar(10) DEFAULT NULL,
  `DATE_COLLECTE` date DEFAULT NULL,
  `DATE_SAISIE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appui_menage`
--

INSERT INTO `appui_menage` (`ID_APPUI_MENAGE`, `ID_MENAGE`, `ID_PARENT`, `ID_FORMATION`, `OBJET_NATURE`, `QTE`, `UNITE`, `DATE_COLLECTE`, `DATE_SAISIE`) VALUES
(1, 1, NULL, NULL, 'Semence', '20.00', 'kg', '2017-09-03', '2017-09-18'),
(2, 2, 23, 30, '', '0.00', NULL, '2017-09-12', '2017-09-18'),
(3, 5, 30, NULL, 'Semence', '250.00', 'kg', '0000-00-00', '2017-09-20'),
(5, 5, 32, 32, NULL, NULL, NULL, '0000-00-00', '2017-09-29');

-- --------------------------------------------------------

--
-- Structure de la table `appui_op`
--

CREATE TABLE `appui_op` (
  `ID_APPUI_OP` int(11) NOT NULL,
  `ID_DETAIL` int(11) NOT NULL,
  `ID_FORMATION` int(11) DEFAULT NULL,
  `ID_MECANISME` int(11) DEFAULT NULL,
  `ID_CAT_OP` int(11) DEFAULT NULL,
  `ID_PARENT` int(11) DEFAULT NULL,
  `ID_TYPE` int(11) NOT NULL,
  `TYPE_OP` smallint(6) DEFAULT NULL,
  `ID_OP` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `OBJET_NATURE` varchar(255) DEFAULT NULL,
  `QTE` decimal(7,2) DEFAULT NULL,
  `UNITE` varchar(10) DEFAULT NULL,
  `DATE_COLLECTE` date DEFAULT NULL,
  `DATE_SAISIE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `appui_op`
--

INSERT INTO `appui_op` (`ID_APPUI_OP`, `ID_DETAIL`, `ID_FORMATION`, `ID_MECANISME`, `ID_CAT_OP`, `ID_PARENT`, `ID_TYPE`, `TYPE_OP`, `ID_OP`, `DESCRIPTION`, `OBJET_NATURE`, `QTE`, `UNITE`, `DATE_COLLECTE`, `DATE_SAISIE`) VALUES
(13, 13, 13, 1, 1, NULL, 7, 1, 1, 'formation sur la ..........', '', '0.00', NULL, '2017-08-01', '2017-08-31'),
(14, 14, 14, 1, 1, 13, 7, 2, 4, 'formation 2', '', '0.00', NULL, '2017-09-18', '2017-09-18'),
(23, 23, 23, 4, 1, 14, 7, 4, 1, '', '', '0.00', NULL, '2017-09-22', '2017-09-18'),
(29, 29, 29, NULL, NULL, 14, 7, 3, 2, '', '', '0.00', NULL, '2017-09-19', '2017-09-18'),
(30, 30, NULL, 1, 1, NULL, 2, 4, 3, 'Semence', 'Semence', '250.00', 'kg', '2017-09-01', '2017-09-20'),
(32, 32, 31, 1, 1, NULL, 7, 4, 3, 'formation 22', '', '0.00', NULL, '2017-09-29', '2017-09-29');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `appui_opb`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `appui_opb` (
`ID_APPUI_OP` int(11)
,`DATE_SAISIE` date
,`CODE_OP` varchar(20)
,`NOM_OP` varchar(50)
,`DATE_FINANCEMENT` date
,`MONTANT` decimal(12,2)
,`NOM_FILIERE` varchar(100)
,`LIBELLE` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `appui_opf`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `appui_opf` (
`ID_APPUI_OP` int(11)
,`DATE_SAISIE` date
,`CODE_OP` varchar(20)
,`NOM_OP` varchar(100)
,`DATE_FINANCEMENT` date
,`MONTANT` decimal(12,2)
,`NOM_FILIERE` varchar(100)
,`LIBELLE` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `appui_opr`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `appui_opr` (
`ID_APPUI_OP` int(11)
,`DATE_SAISIE` date
,`CODE_OP` varchar(20)
,`NOM_OP` varchar(50)
,`DATE_FINANCEMENT` date
,`MONTANT` decimal(12,2)
,`NOM_FILIERE` varchar(100)
,`LIBELLE` varchar(50)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `appui_union`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `appui_union` (
`ID_APPUI_OP` int(11)
,`DATE_SAISIE` date
,`CODE_OP` varchar(20)
,`NOM_OP` varchar(100)
,`DATE_FINANCEMENT` date
,`MONTANT` decimal(12,2)
,`NOM_FILIERE` varchar(100)
,`LIBELLE` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure de la table `campagnes_opb`
--

CREATE TABLE `campagnes_opb` (
  `ID_CAMPAGNE` int(11) NOT NULL,
  `ID_OPB` int(11) NOT NULL,
  `ID_FILIERE` int(11) NOT NULL,
  `ID_MENAGE` int(11) NOT NULL,
  `NUM_CAMPAGNE` tinyint(4) NOT NULL,
  `SUPERFICIE` decimal(6,2) NOT NULL,
  `QTE_PRODUITE` decimal(7,2) NOT NULL,
  `QTE_COMMERCIALISEE` decimal(7,2) NOT NULL,
  `MONTANT` decimal(11,2) NOT NULL,
  `ANNEE` smallint(6) NOT NULL,
  `DATE_COLLECTE` date NOT NULL,
  `DATE_SAISIE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cat_op`
--

CREATE TABLE `cat_op` (
  `ID_CAT_OP` int(11) NOT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `cat_op`
--

INSERT INTO `cat_op` (`ID_CAT_OP`, `LIBELLE`) VALUES
(1, 'OPB'),
(2, 'AUE'),
(3, 'AEL'),
(4, 'VOI'),
(5, 'GPF'),
(6, 'GPM');

-- --------------------------------------------------------

--
-- Structure de la table `communes`
--

CREATE TABLE `communes` (
  `ID_COMMUNE` int(11) NOT NULL,
  `ID_DISTRICT` int(11) NOT NULL,
  `CODE_COMMUNE` varchar(5) DEFAULT NULL,
  `NOM_COMMUNE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `communes`
--

INSERT INTO `communes` (`ID_COMMUNE`, `ID_DISTRICT`, `CODE_COMMUNE`, `NOM_COMMUNE`) VALUES
(1, 1, '50', 'Commune 1'),
(2, 3, '51', 'Commune 12'),
(3, 3, '999', 'Bevitiky'),
(4, 4, '100', 'Ambanisarika'),
(5, 4, '101', 'Ambazoa'),
(6, 4, '104', 'Ambondro'),
(7, 4, '105', 'Ampamata'),
(8, 4, '106', 'Andalatanosy'),
(9, 4, '107', 'Anjeky Beanatara'),
(10, 4, '108', 'Antanimora Atsimo'),
(11, 4, '109', 'Erada'),
(12, 4, '110', 'Imanombo'),
(13, 4, '111', 'Maroalomainty'),
(14, 4, '112', 'Maroalopoty'),
(15, 4, '113', 'Sihanamaro'),
(16, 3, '200', 'Ambahita'),
(17, 3, '201', 'Ambatosola'),
(18, 3, '202', 'Ankaranabo Nord'),
(19, 3, '203', 'Antsakoamaro'),
(20, 3, '204', 'Bekitro'),
(21, 3, '205', 'Belindo Mahasoa'),
(22, 3, '206', 'Beraketa'),
(23, 3, '207', 'Besakoa'),
(24, 3, '208', 'Beteza'),
(25, 3, '209', 'Tanandava'),
(26, 3, '210', 'Vohimanga'),
(27, 7, '300', 'Marolinta'),
(28, 8, '400', 'Anjampaly'),
(29, 8, '401', 'Antaritarika'),
(30, 8, '402', 'Faux Cap'),
(31, 8, '403', 'Marovato');

-- --------------------------------------------------------

--
-- Structure de la table `details_appui`
--

CREATE TABLE `details_appui` (
  `ID_DETAIL` int(11) NOT NULL,
  `ID_FILIERE` int(11) DEFAULT NULL,
  `DATE_FINANCEMENT` date DEFAULT NULL,
  `MONTANT` decimal(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `details_appui`
--

INSERT INTO `details_appui` (`ID_DETAIL`, `ID_FILIERE`, `DATE_FINANCEMENT`, `MONTANT`) VALUES
(13, 1, '2017-08-31', '100000.00'),
(14, 2, '2017-09-17', '100000.00'),
(23, 2, '2017-09-19', '100000.00'),
(29, 2, '2017-09-18', '100000.00'),
(30, 2, '2017-09-01', '50000.00'),
(32, 1, '2017-09-29', '10.00');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `detail_appui_opb`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `detail_appui_opb` (
`ID_MENAGE` int(11)
,`ID_OP` int(11)
,`ID_TYPE` int(11)
,`DATE_COLLECTE` date
);

-- --------------------------------------------------------

--
-- Structure de la table `detail_formation`
--

CREATE TABLE `detail_formation` (
  `ID_FORMATION` int(11) NOT NULL,
  `ID_FOKONTANY` int(11) DEFAULT NULL,
  `THEME` varchar(255) DEFAULT NULL,
  `DATE_DEBUT` date DEFAULT NULL,
  `DATE_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `detail_formation`
--

INSERT INTO `detail_formation` (`ID_FORMATION`, `ID_FOKONTANY`, `THEME`, `DATE_DEBUT`, `DATE_FIN`) VALUES
(13, 1, 'theme 1', '2017-09-01', '2017-09-02'),
(14, 1, 'Fampianarana fambolena vary', '2017-09-27', '2017-09-30'),
(23, 1, 'Fampianarana fambolena vary', '2017-09-25', '2017-09-30'),
(29, 1, 'Fampianarana fambolena vary', '2017-09-21', '2017-09-25'),
(30, 1, 'Fampianarana fambolena vary', '2017-09-26', '2017-09-30'),
(31, 1, 'formation momba ny katsaka', '2017-09-30', '2017-10-08'),
(32, 1, 'formation momba ny katsaka', '2017-09-30', '2017-10-08');

-- --------------------------------------------------------

--
-- Structure de la table `districts`
--

CREATE TABLE `districts` (
  `ID_DISTRICT` int(11) NOT NULL,
  `ID_REGION` int(11) NOT NULL,
  `CODE_DISTRICT` varchar(5) DEFAULT NULL,
  `NOM_DISTRICT` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `districts`
--

INSERT INTO `districts` (`ID_DISTRICT`, `ID_REGION`, `CODE_DISTRICT`, `NOM_DISTRICT`) VALUES
(1, 1, '23', 'Ambositra'),
(2, 1, '24', 'Fandriana'),
(3, 2, '518', 'Bekily'),
(4, 2, '516', 'Ambovombe-Androy'),
(7, 2, '513', 'Beloha'),
(8, 2, '514', 'Tsihombe');

-- --------------------------------------------------------

--
-- Structure de la table `filieres`
--

CREATE TABLE `filieres` (
  `ID_FILIERE` int(11) NOT NULL,
  `NOM_FILIERE` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `filieres`
--

INSERT INTO `filieres` (`ID_FILIERE`, `NOM_FILIERE`) VALUES
(1, 'Mais'),
(2, 'Riz'),
(3, 'Arachide'),
(4, 'Oignon'),
(5, 'Manioc\r\n'),
(6, 'Cuma'),
(7, 'PG'),
(8, 'Haricot'),
(9, 'Caprins');

-- --------------------------------------------------------

--
-- Structure de la table `fokontany`
--

CREATE TABLE `fokontany` (
  `ID_FOKONTANY` int(11) NOT NULL,
  `ID_COMMUNE` int(11) NOT NULL,
  `CODE_FOKONTANY` varchar(5) DEFAULT NULL,
  `NOM_FOKONTANY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fokontany`
--

INSERT INTO `fokontany` (`ID_FOKONTANY`, `ID_COMMUNE`, `CODE_FOKONTANY`, `NOM_FOKONTANY`) VALUES
(1, 3, '120', 'Fkt 301'),
(2, 3, '99', 'fkt 99'),
(3, 7, '1051', 'Ampamata Centre'),
(4, 7, '1052', 'Andalipito'),
(5, 7, '1053', 'Ankaramanoy Andrasofo'),
(6, 7, '1054', 'Ankilimijoro'),
(7, 7, '1055', 'Antafianampela'),
(8, 7, '1056', 'Antanimavo II'),
(9, 7, '1057', 'Besatra Soarano'),
(10, 7, '1058', 'Lapeloha Androbinelo'),
(11, 7, '1059', 'Mafilefy'),
(12, 7, '10510', 'Tsimirombo'),
(13, 8, '1061', 'Ambasy I'),
(14, 8, '1062', 'Ambendra'),
(15, 8, '1063', 'Amboasary'),
(16, 8, '1064', 'Ambondrombe'),
(17, 8, '1065', 'Andalatanosy Sud'),
(18, 8, '1066', 'Antranonan\'Akoho'),
(19, 8, '1067', 'Bekopiky Nord'),
(20, 8, '1068', 'Vohipandrany'),
(21, 8, '1069', 'Vohitrarivo'),
(22, 8, '10610', 'Vohitsara'),
(23, 10, '1081', 'Ambingobingo'),
(24, 10, '1082', 'Andriamanarina Imangory'),
(25, 10, '1083', 'Antanimora Centre'),
(26, 10, '1084', 'Antsira'),
(27, 10, '1085', 'Betoko'),
(28, 10, '1086', 'Manavy'),
(29, 10, '1087', 'Marolava Antratra'),
(30, 12, '1101', 'Ambalantany I'),
(31, 12, '1102', 'Ambanenato mahazoarivo'),
(32, 12, '1103', 'Ambaninato I'),
(33, 12, '1104', 'Ambaninato Ianaboro'),
(34, 12, '1105', 'Ambaninato II'),
(35, 12, '1106', 'Andemby'),
(36, 12, '1107', 'Ankilivohitse'),
(37, 12, '1108', 'Antehalomboro'),
(38, 12, '1109', 'Antesomay'),
(39, 12, '11010', 'Finday'),
(40, 12, '11011', 'Iaborano'),
(41, 12, '11012', 'Imanombo'),
(42, 16, '2001', 'Ambahita'),
(43, 16, '2002', 'Ambahita Centre'),
(44, 16, '2003', 'Ambatomainty Haut'),
(45, 16, '2004', 'Ampany'),
(46, 16, '2005', 'Ampisopiso'),
(47, 16, '2006', 'Anaviavy'),
(48, 16, '2007', 'Antaly'),
(49, 16, '2008', 'Antaratsy'),
(50, 16, '2009', 'Beamalo I'),
(51, 16, '20010', 'Beamalo II'),
(52, 16, '20011', 'Beza'),
(53, 16, '20012', 'Sakoampolo'),
(54, 16, '20013', 'Soakabany'),
(55, 16, '20014', 'Vohipeno'),
(56, 17, '2011', 'Ambalabe'),
(57, 17, '2012', 'Ambalabe Sud'),
(58, 17, '2013', 'Ambatosola'),
(59, 17, '2014', 'Ambatosola Centre'),
(60, 17, '2015', 'Anadabolava'),
(61, 17, '2016', 'Ankily'),
(62, 17, '2017', 'Bemanondrotsy'),
(64, 17, '2019', 'Fenoarivo Sud'),
(65, 17, '20110', 'Mahabo Atsimo'),
(66, 17, '20111', 'Mahabo Mitsinjo'),
(67, 17, '20112', 'Nagnarena'),
(68, 17, '20113', 'Soaserana Sud'),
(69, 18, '2021', 'Ambinanivelo'),
(70, 18, '2022', 'Andriabe'),
(71, 18, '2023', 'Ankaranabo centre'),
(72, 18, '2024', 'Ankaranabo Nord'),
(73, 18, '2025', 'Ankilimasy Bas'),
(74, 18, '2026', 'Antsohamamy'),
(75, 18, '2027', 'Vohimary I'),
(76, 18, '2028', 'Vohimary II'),
(77, 19, '2031', 'Andranofotsy'),
(78, 19, '2032', 'Anjabotretriky'),
(79, 19, '2033', 'Ankazota'),
(80, 19, '2034', 'Ankilimalangy'),
(81, 19, '2035', 'Ankilimihamy'),
(82, 19, '2036', 'Ankiliroe'),
(83, 19, '2037', 'Antaboara Haut'),
(84, 19, '2038', 'Antaboara Ouest'),
(85, 19, '2039', 'Antanimary'),
(86, 19, '20310', 'Antsakoamaro'),
(87, 19, '20311', 'Behera'),
(88, 19, '20312', 'Beparo'),
(89, 20, '2041', 'Ambaroabo'),
(90, 20, '2042', 'Ankarantsokatra'),
(91, 20, '2043', 'Antanamanitsy'),
(92, 20, '2044', 'Antariby'),
(93, 20, '2045', 'Besakoa ouest'),
(94, 20, '2046', 'Malagniraho'),
(95, 20, '2047', 'Manambahy I'),
(96, 21, '2051', 'Ambasy'),
(97, 21, '2052', 'Andranofotsy'),
(98, 21, '2053', 'Andranomavo'),
(99, 21, '2054', 'Ankoty'),
(100, 21, '2055', 'Antsakoamiary'),
(101, 21, '2056', 'Belindo'),
(102, 21, '2057', 'Berohondroho'),
(103, 21, '2058', 'Liolambo'),
(104, 21, '2059', 'Mahabo'),
(105, 21, '20510', 'Mahasoa Be'),
(106, 21, '20511', 'Mahasoa I'),
(107, 21, '20512', 'Mahasoabe'),
(108, 21, '20513', 'Morarano Anja'),
(109, 22, '2061', 'Ambalasaraky'),
(110, 22, '2062', 'Andriabe'),
(111, 22, '2063', 'Antsely Be'),
(112, 22, '2064', 'Beraketa'),
(113, 22, '2065', 'Beraketa Centre'),
(114, 22, '2066', 'Ifarantsa'),
(115, 23, '2071', 'Andranomasy Vohitany'),
(116, 16, '20016', 'Andranomatavy'),
(117, 23, '2073', 'Besakoa'),
(118, 23, '2074', 'Besakoa Centre'),
(119, 23, '2075', 'Besohihy'),
(120, 23, '2076', 'Bevoa'),
(121, 23, '2077', 'Fenoarivo I'),
(122, 23, '2078', 'Fenoarivo II'),
(123, 23, '2079', 'Vohitany Mahasoa'),
(124, 24, '2081', 'Anaratoka'),
(125, 24, '2082', 'Androidroy'),
(126, 24, '2083', 'Anjamivony'),
(127, 24, '2084', 'Ankarenatsoa'),
(128, 24, '2085', 'Ankilivalo Haut'),
(129, 24, '2086', 'Antsakoambevositra'),
(130, 24, '2087', 'Antsakoampolo'),
(131, 24, '2088', 'Behavo Haut'),
(132, 24, '2089', 'Behevo Haut'),
(133, 24, '20810', 'Behezo Haut'),
(134, 24, '20811', 'Beteza'),
(135, 24, '20812', 'Marofototsy'),
(136, 24, '20813', 'Reromotsy'),
(137, 25, '2091', 'Ambararata Toby I'),
(138, 25, '2092', 'Ambararata Toby II'),
(139, 25, '2093', 'Analamary I'),
(140, 25, '2094', 'Analamary II'),
(141, 25, '2095', 'Bedona Centre'),
(142, 25, '2096', 'Bedona Fenoarivo'),
(143, 25, '2097', 'Belamoty'),
(144, 25, '2098', 'Iabomary'),
(145, 25, '2099', 'Mahasoa'),
(146, 26, '2101', 'Besamata'),
(147, 26, '2102', 'Bevaho'),
(148, 26, '2103', 'Mahatalaky'),
(149, 26, '2104', 'Manakoliva'),
(150, 3, '9991', 'Betania'),
(151, 20, '2048', 'Ambaroabo'),
(152, 22, '2067', 'Analadaro'),
(153, 18, '2029', 'Analampangitse'),
(154, 24, '20814', 'Ananaboro I'),
(155, 19, '20313', 'Anarabe'),
(157, 19, '20314', 'Ankilimalangy II'),
(158, 19, '20315', 'Ankilimihary'),
(159, 20, '2049', 'Antanamanitsy I'),
(160, 20, '20410', 'Antanamanitsy II'),
(161, 19, '20316', 'Antanamanoka'),
(162, 19, '20317', 'Antanantsoa'),
(163, 20, '20411', 'Antariby Avaradalana'),
(164, 20, '20412', 'Antarobia II'),
(165, 19, '20318', 'Antsakoandroa'),
(166, 24, '20815', 'Antsosa I'),
(167, 24, '20816', 'Behevo'),
(168, 26, '2105', 'Mahabe'),
(170, 26, '2106', 'Vohimanga'),
(171, 18, '20210', 'Marofoty'),
(172, 16, '20015', 'SOAKIBANY II'),
(173, 25, '20910', 'Sarisambo');

-- --------------------------------------------------------

--
-- Structure de la table `fonctioninop`
--

CREATE TABLE `fonctioninop` (
  `ID_FONCTION` int(11) NOT NULL,
  `NOM_FONCTION` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fonctioninop`
--

INSERT INTO `fonctioninop` (`ID_FONCTION`, `NOM_FONCTION`) VALUES
(1, 'Président'),
(2, 'Sécretaire'),
(3, 'Trésorier'),
(4, 'Membre'),
(5, 'Vice-Président');

-- --------------------------------------------------------

--
-- Structure de la table `mecanisme`
--

CREATE TABLE `mecanisme` (
  `ID_MECANISME` int(11) NOT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mecanisme`
--

INSERT INTO `mecanisme` (`ID_MECANISME`, `LIBELLE`) VALUES
(1, 'MCV'),
(2, 'MP'),
(3, 'PP'),
(4, 'CGEAF'),
(5, 'CEP');

-- --------------------------------------------------------

--
-- Structure de la table `menages`
--

CREATE TABLE `menages` (
  `ID_MENAGE` int(11) NOT NULL,
  `ID_FOKONTANY` int(11) NOT NULL,
  `CODE_MENAGE` varchar(20) DEFAULT NULL,
  `NOM_MENAGE` varchar(50) DEFAULT NULL,
  `SURNOM` varchar(25) DEFAULT NULL,
  `SEXE` char(1) DEFAULT NULL,
  `TYPE` smallint(6) DEFAULT NULL,
  `IMF` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menages`
--

INSERT INTO `menages` (`ID_MENAGE`, `ID_FOKONTANY`, `CODE_MENAGE`, `NOM_MENAGE`, `SURNOM`, `SEXE`, `TYPE`, `IMF`) VALUES
(1, 1, 'EAF00001', 'Valohery Dina', 'benaz', 'H', 1, 0),
(2, 1, 'EAF00002', 'Nom prenom', 'test', 'F', 1, 0),
(5, 1, 'EAF00003', 'Andriamalala Raoul', 'black', 'H', 3, 0);

-- --------------------------------------------------------

--
-- Structure de la table `menages_filieres`
--

CREATE TABLE `menages_filieres` (
  `ID_FILIERE` int(11) NOT NULL,
  `ID_MENAGE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `menages_filieres`
--

INSERT INTO `menages_filieres` (`ID_FILIERE`, `ID_MENAGE`) VALUES
(1, 1),
(2, 2),
(2, 5);

-- --------------------------------------------------------

--
-- Structure de la table `opb`
--

CREATE TABLE `opb` (
  `ID_OPB` int(11) NOT NULL,
  `ID_FOKONTANY` int(11) NOT NULL,
  `CODE_OPB` varchar(20) DEFAULT NULL,
  `NOM_OPB` varchar(50) DEFAULT NULL,
  `DATE_CREATION` date DEFAULT NULL,
  `STATUT` varchar(50) DEFAULT NULL,
  `FORMELLE` tinyint(1) DEFAULT NULL,
  `ID_REPRESENTANT` int(11) DEFAULT NULL,
  `CONTACT` text,
  `TYPE` smallint(6) DEFAULT NULL,
  `OBSERVATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `opb`
--

INSERT INTO `opb` (`ID_OPB`, `ID_FOKONTANY`, `CODE_OPB`, `NOM_OPB`, `DATE_CREATION`, `STATUT`, `FORMELLE`, `ID_REPRESENTANT`, `CONTACT`, `TYPE`, `OBSERVATION`) VALUES
(199, 3, 'OPB00005', 'Arembelo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(200, 37, 'OPB00006', 'Ambaninato Mandroso', '2016-04-15', NULL, NULL, NULL, NULL, 1, NULL),
(201, 25, 'OPB00007', 'Firaisankina', '2014-11-10', 'Association', 0, NULL, '', 0, '                                                                                                        '),
(202, 25, 'OPB00008', 'Miaregne', '2014-11-10', NULL, NULL, NULL, NULL, 1, NULL),
(203, 132, 'OPB00009', 'Fivoarana', '2014-09-28', NULL, NULL, NULL, NULL, 1, NULL),
(204, 132, 'OPB00010', 'Fahasoavana', '2014-09-27', NULL, NULL, NULL, NULL, 1, NULL),
(205, 132, 'OPB00011', 'Miray', '2014-09-27', NULL, NULL, NULL, NULL, 1, NULL),
(206, 138, 'OPB00012', 'Liaharoa', '2014-09-18', NULL, NULL, NULL, NULL, 1, NULL),
(207, 138, 'OPB00013', 'Tsilialonjafy', '2014-09-18', NULL, NULL, NULL, NULL, 1, NULL),
(208, 28, 'OPB00014', 'Magniry', '2014-09-14', NULL, NULL, NULL, NULL, 1, NULL),
(209, 28, 'OPB00015', 'Miharesoa', '2014-09-14', NULL, NULL, NULL, NULL, 1, NULL),
(210, 28, 'OPB00016', 'Miompisoa', '2014-09-14', NULL, NULL, NULL, NULL, 1, NULL),
(211, 130, 'OPB00017', 'Mandroso', '2014-09-12', NULL, NULL, NULL, NULL, 1, NULL),
(212, 142, 'OPB00018', 'Miray Hina', '2014-09-11', NULL, NULL, NULL, NULL, 1, NULL),
(213, 102, 'OPB00019', 'Mavitriky', '2014-09-08', NULL, NULL, NULL, NULL, 1, NULL),
(214, 145, 'OPB00020', 'Tombomaro hoany', '2014-09-08', NULL, NULL, NULL, NULL, 1, NULL),
(215, 143, 'OPB00021', 'Maitsomavana', '2014-08-30', NULL, NULL, NULL, NULL, 1, NULL),
(216, 124, 'OPB00022', 'Mandrosolavasoa', '2014-08-28', NULL, NULL, NULL, NULL, 1, NULL),
(217, 75, 'OPB00023', 'Mahasoa', '2014-08-27', NULL, NULL, NULL, NULL, 1, NULL),
(218, 75, 'OPB00024', 'Miraiky', '2014-08-27', NULL, NULL, NULL, NULL, 1, NULL),
(219, 124, 'OPB00025', 'Miray Hina Mazoto', '2014-08-27', NULL, NULL, NULL, NULL, 1, NULL),
(220, 90, 'OPB00026', 'Fidirantsoa', '2014-08-26', NULL, NULL, NULL, NULL, 1, NULL),
(221, 90, 'OPB00027', 'Fanomezantsoa', '2014-08-26', NULL, NULL, NULL, NULL, 1, NULL),
(222, 73, 'OPB00028', 'Taratra', '2014-08-25', NULL, NULL, NULL, NULL, 1, NULL),
(223, 106, 'OPB00029', 'Fitarihantsoa', '2014-08-12', NULL, NULL, NULL, NULL, 1, NULL),
(224, 127, 'OPB00030', 'Soa Ny Fiarahantsika', '2014-08-11', NULL, NULL, NULL, NULL, 1, NULL),
(225, 43, 'OPB00031', 'Mahatarika', '2014-08-05', NULL, NULL, NULL, NULL, 1, NULL),
(226, 126, 'OPB00032', 'Mahavelo', '2014-08-05', NULL, NULL, NULL, NULL, 1, NULL),
(227, 46, 'OPB00033', 'Miray Asa', '2014-08-03', NULL, NULL, NULL, NULL, 1, NULL),
(228, 69, 'OPB00034', 'Miray Hina', '2014-08-03', NULL, NULL, NULL, NULL, 1, NULL),
(229, 125, 'OPB00035', 'Tsarajoro', '2014-08-03', NULL, NULL, NULL, NULL, 1, NULL),
(230, 137, 'OPB00036', 'Tsimalaindongo', '2014-08-03', NULL, NULL, NULL, NULL, 1, NULL),
(231, 137, 'OPB00037', 'Tahiendraza', '2014-08-02', NULL, NULL, NULL, NULL, 1, NULL),
(232, 118, 'OPB00038', 'Tsilegnalegna', '2014-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(233, 130, 'OPB00039', 'Fokonolona Mikambana', '2014-07-17', NULL, NULL, NULL, NULL, 1, NULL),
(234, 43, 'OPB00040', 'Miaro', '2014-07-15', NULL, NULL, NULL, NULL, 1, NULL),
(235, 21, 'OPB00041', 'Tehiavotra', '2014-07-14', NULL, NULL, NULL, NULL, 1, NULL),
(236, 18, 'OPB00042', 'Ankilemionjo', '2014-07-12', NULL, NULL, NULL, NULL, 1, NULL),
(237, 144, 'OPB00043', 'Soamiavotse', '2014-07-10', NULL, NULL, NULL, NULL, 1, NULL),
(238, 144, 'OPB00044', 'Soamiray', '2014-07-09', NULL, NULL, NULL, NULL, 1, NULL),
(239, 134, 'OPB00045', 'Tafara Mahatratsy', '2014-07-03', NULL, NULL, NULL, NULL, 1, NULL),
(240, 116, 'OPB00046', 'Kinga', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(241, 116, 'OPB00047', 'Mahavita Azy', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(242, 116, 'OPB00048', 'Mahavitrika', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(243, 116, 'OPB00049', 'Mazoto', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(244, 116, 'OPB00050', 'Miray', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(245, 118, 'OPB00051', 'Betsifeno', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(246, 118, 'OPB00052', 'Milavonjy', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(247, 118, 'OPB00053', 'Miombosoa', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(248, 118, 'OPB00054', 'Miray Hina', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(249, 118, 'OPB00055', 'Tany Maintso', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(250, 119, 'OPB00056', 'Amendoravy', '2014-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(251, 151, 'OPB00057', 'Avotra Mahasoa', '2014-06-28', NULL, NULL, NULL, NULL, 1, NULL),
(252, 151, 'OPB00058', 'Fifaliantsoa', '2014-06-28', NULL, NULL, NULL, NULL, 1, NULL),
(253, 21, 'OPB00059', 'Mahavotse', '2014-06-22', NULL, NULL, NULL, NULL, 1, NULL),
(254, 19, 'OPB00060', 'Mamiratra', '2014-06-19', NULL, NULL, NULL, NULL, 1, NULL),
(255, 43, 'OPB00061', 'Avotra', '2014-06-02', NULL, NULL, NULL, NULL, 1, NULL),
(256, 76, 'OPB00062', 'Mahafaly', '2014-05-29', NULL, NULL, NULL, NULL, 1, NULL),
(257, 76, 'OPB00063', 'Mahavotse', '2014-05-29', NULL, NULL, NULL, NULL, 1, NULL),
(258, 154, 'OPB00064', 'Tafitasoa', '2014-05-15', NULL, NULL, NULL, NULL, 1, NULL),
(259, 167, 'OPB00065', 'Vitamina Miara Miasa', '2014-05-12', NULL, NULL, NULL, NULL, 1, NULL),
(260, 69, 'OPB00066', 'Vonjy', '2014-05-10', NULL, NULL, NULL, NULL, 1, NULL),
(261, 145, 'OPB00067', 'Scolaire', '2014-04-10', NULL, NULL, NULL, NULL, 1, NULL),
(262, 145, 'OPB00068', 'Soahoanay', '2014-04-05', NULL, NULL, NULL, NULL, 1, NULL),
(263, 137, 'OPB00069', 'Avotra', '2014-04-03', NULL, NULL, NULL, NULL, 1, NULL),
(264, 134, 'OPB00070', 'Todisoa', '2013-12-10', NULL, NULL, NULL, NULL, 1, NULL),
(265, 52, 'OPB00071', 'Hamboly', '2013-11-03', NULL, NULL, NULL, NULL, 1, NULL),
(266, 172, 'OPB00072', 'Mazava Loha', '2013-10-25', NULL, NULL, NULL, NULL, 1, NULL),
(267, 172, 'OPB00073', 'Mavitriky', '2013-10-23', NULL, NULL, NULL, NULL, 1, NULL),
(268, 172, 'OPB00074', 'Manaosoa', '2013-10-22', NULL, NULL, NULL, NULL, 1, NULL),
(269, 46, 'OPB00075', 'Ezaka', '2013-10-14', NULL, NULL, NULL, NULL, 1, NULL),
(270, 139, 'OPB00076', 'Milavonje', '2013-10-14', NULL, NULL, NULL, NULL, 1, NULL),
(271, 140, 'OPB00077', 'Ankilesoa', '2013-10-11', NULL, NULL, NULL, NULL, 1, NULL),
(272, 52, 'OPB00078', 'Mamokatra', '2013-10-11', NULL, NULL, NULL, NULL, 1, NULL),
(273, 140, 'OPB00079', 'Milasoa', '2013-10-10', NULL, NULL, NULL, NULL, 1, NULL),
(274, 48, 'OPB00080', 'Fandrosoana', '2013-10-02', NULL, NULL, NULL, NULL, 1, NULL),
(275, 3, 'OPB00081', 'Vehivavy Ampamanta Mijoro (Vam)', '2013-10-01', NULL, NULL, NULL, NULL, 1, NULL),
(276, 17, 'OPB00082', 'Ftmtk', '2013-10-01', NULL, NULL, NULL, NULL, 1, NULL),
(277, 135, 'OPB00083', 'Fikambanantsoa', '2013-10-01', NULL, NULL, NULL, NULL, 1, NULL),
(278, 166, 'OPB00084', 'Mazoto', '2013-10-01', NULL, NULL, NULL, NULL, 1, NULL),
(279, 139, 'OPB00085', 'Miaramonina', '2013-09-20', NULL, NULL, NULL, NULL, 1, NULL),
(280, 139, 'OPB00086', 'Miraiasa', '2013-09-19', NULL, NULL, NULL, NULL, 1, NULL),
(281, 139, 'OPB00087', 'Tsimanavake', '2013-09-19', NULL, NULL, NULL, NULL, 1, NULL),
(282, 47, 'OPB00088', 'Tanjona', '2013-09-17', NULL, NULL, NULL, NULL, 1, NULL),
(283, 135, 'OPB00089', 'Samy Mikamba', '2013-09-17', NULL, NULL, NULL, NULL, 1, NULL),
(284, 51, 'OPB00090', 'Fitaratra', '2013-09-16', NULL, NULL, NULL, NULL, 1, NULL),
(285, 127, 'OPB00091', 'Mahasoa', '2013-09-14', NULL, NULL, NULL, NULL, 1, NULL),
(286, 145, 'OPB00092', 'Tombosoahoanay', '2013-09-13', NULL, NULL, NULL, NULL, 1, NULL),
(287, 51, 'OPB00093', 'Mendrika', '2013-09-13', NULL, NULL, NULL, NULL, 1, NULL),
(288, 136, 'OPB00094', 'Miray Hina', '2013-09-13', NULL, NULL, NULL, NULL, 1, NULL),
(289, 50, 'OPB00095', 'Mazava    ', '2013-09-10', 'Association', 0, NULL, '', 0, '                                                                                                        '),
(290, 131, 'OPB00096', 'Miray Lahatse', '2013-09-10', NULL, NULL, NULL, NULL, 1, NULL),
(291, 50, 'OPB00097', 'Maharitra', '2013-09-09', NULL, NULL, NULL, NULL, 1, NULL),
(292, 132, 'OPB00098', 'Mazoto', '2013-09-08', NULL, NULL, NULL, NULL, 1, NULL),
(293, 129, 'OPB00099', 'Miraisoa', '2013-09-07', NULL, NULL, NULL, NULL, 1, NULL),
(294, 135, 'OPB00100', 'Soamiray', '2013-09-04', NULL, NULL, NULL, NULL, 1, NULL),
(295, 3, 'OPB00101', 'Hazolava', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(296, 4, 'OPB00102', 'Famonjea Mahavita Azy (Fma)', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(297, 17, 'OPB00103', 'Soanatoly', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(298, 58, 'OPB00104', 'Firaisankina', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(299, 58, 'OPB00105', 'Fitiavana', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(300, 58, 'OPB00106', 'Fomba Mendrika', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(301, 58, 'OPB00107', 'Mahafa Po', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(302, 58, 'OPB00108', 'Mandrosoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(303, 58, 'OPB00109', 'Rahanavotra', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(304, 58, 'OPB00110', 'Taviala Mandroso', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(305, 58, 'OPB00111', 'Taviala Mivoatra', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(306, 58, 'OPB00112', 'Tavohi', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(307, 58, 'OPB00113', 'Tehiavotegna', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(308, 58, 'OPB00114', 'Vokatra Ny Fahasoavana', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(309, 64, 'OPB00115', 'Firaisamonin\'Ny Mpamboly', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(310, 92, 'OPB00116', 'Hasoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(311, 94, 'OPB00117', 'Tehosoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(312, 95, 'OPB00118', 'Mandroso', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(313, 159, 'OPB00119', 'Mahavotse', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(314, 96, 'OPB00120', 'Fandrosoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(315, 96, 'OPB00121', 'Firaisantsoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(316, 97, 'OPB00122', 'Fitiava', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(317, 97, 'OPB00123', 'Mazoto', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(318, 97, 'OPB00124', 'Miraikina', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(319, 100, 'OPB00125', 'Mirailahatse', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(320, 103, 'OPB00126', 'Mandroso', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(321, 103, 'OPB00127', 'Mendrika', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(322, 117, 'OPB00128', 'Tantsaha Mpamokatra', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(323, 95, 'OPB00129', 'Malio Arofo', '2013-09-01', 'Association', 0, NULL, '', 0, '                                                    '),
(324, 66, 'OPB00130', 'Fanavotana', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(325, 66, 'OPB00131', 'Fandrosoana', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(326, 66, 'OPB00132', 'Finafa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(327, 160, 'OPB00133', 'Mahatombofeno', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(328, 163, 'OPB00134', 'Tahirisoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(329, 164, 'OPB00135', 'Mahasoa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(330, 105, 'OPB00136', 'Avotra', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(331, 105, 'OPB00137', 'Fitsimbinana', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(332, 106, 'OPB00138', 'Tantsaha Miezaka Ho Soa', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(333, 106, 'OPB00139', 'Tantsaha Miharofo', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(334, 135, 'OPB00140', 'Miraitsay', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(335, 136, 'OPB00141', 'Tanjona', '2013-09-01', NULL, NULL, NULL, NULL, 1, NULL),
(336, 141, 'OPB00142', 'Mahasoa', '2013-08-27', NULL, NULL, NULL, NULL, 1, NULL),
(337, 141, 'OPB00143', 'Mahavelo', '2013-08-27', NULL, NULL, NULL, NULL, 1, NULL),
(338, 129, 'OPB00144', 'Fahasambarana', '2013-08-23', NULL, NULL, NULL, NULL, 1, NULL),
(339, 129, 'OPB00145', 'Firaisana', '2013-08-11', NULL, NULL, NULL, NULL, 1, NULL),
(340, 128, 'OPB00146', 'Soamandroso', '2013-08-09', NULL, NULL, NULL, NULL, 1, NULL),
(341, 128, 'OPB00147', 'Tantsaha Androy', '2013-08-09', NULL, NULL, NULL, NULL, 1, NULL),
(342, 137, 'OPB00148', 'Soajoro', '2013-08-03', NULL, NULL, NULL, NULL, 1, NULL),
(343, 136, 'OPB00149', 'Vanona', '2013-08-02', NULL, NULL, NULL, NULL, 1, NULL),
(344, 16, 'OPB00150', 'Lovasoa', '2013-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(345, 17, 'OPB00151', 'Mahavonjy', '2013-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(346, 26, 'OPB00152', 'Vinda Vato', '2013-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(347, 27, 'OPB00153', 'Falaza', '2013-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(348, 28, 'OPB00154', 'Mazoto', '2013-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(349, 52, 'OPB00155', 'Miray', '2013-08-01', NULL, NULL, NULL, NULL, 1, NULL),
(350, 10, 'OPB00156', 'Magneva', '2013-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(351, 17, 'OPB00157', 'Ainga', '2013-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(352, 95, 'OPB00158', 'Miray Amin\'Ny Famokarana', '2013-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(353, 95, 'OPB00159', 'Tantsaha Miray', '2013-07-01', NULL, NULL, NULL, NULL, 1, NULL),
(354, 95, 'OPB00160', 'Miray Hina', '2013-07-01', 'Association', 0, NULL, '', 0, '                                                    '),
(355, 3, 'OPB00161', 'Voatse', '2013-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(356, 70, 'OPB00162', 'Vohitany Mandroso', '2010-10-12', NULL, NULL, NULL, NULL, 1, NULL),
(357, 71, 'OPB00163', 'Mandroso', '2010-10-12', NULL, NULL, NULL, NULL, 1, NULL),
(358, 71, 'OPB00164', 'Fandresena', '2010-09-06', NULL, NULL, NULL, NULL, 1, NULL),
(359, 71, 'OPB00165', 'Mahavonjy', '2010-09-06', NULL, NULL, NULL, NULL, 1, NULL),
(360, 71, 'OPB00166', 'Manaovasoa', '2010-09-06', NULL, NULL, NULL, NULL, 1, NULL),
(361, 116, 'OPB00167', 'Fita', '2010-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(362, 118, 'OPB00168', 'Mahavotra', '2010-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(363, 118, 'OPB00169', 'Mirarisoa', '2010-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(364, 118, 'OPB00170', 'Tsipilay', '2010-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(365, 118, 'OPB00171', 'Vonona', '2010-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(366, 122, 'OPB00172', 'Mahasoa', '2010-05-01', NULL, NULL, NULL, NULL, 1, NULL),
(367, 3, 'OPB00173', 'Vehivavy Miray Hina Miavotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(368, 5, 'OPB00174', 'Vehivavy Miray Hina 3T', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(369, 6, 'OPB00175', 'Tsy Lanimamy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(370, 7, 'OPB00176', 'Famonjena', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(371, 7, 'OPB00177', 'Firaisankina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(372, 7, 'OPB00178', 'Mahavelo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(373, 9, 'OPB00179', 'Taratra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(374, 11, 'OPB00180', 'Miray Hina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(375, 13, 'OPB00181', 'Tsy Lany Mamy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(376, 14, 'OPB00182', 'Haliambato', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(377, 15, 'OPB00183', 'Mazoto', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(378, 17, 'OPB00184', 'Vantiogne', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(379, 17, 'OPB00185', 'Rahavavy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(380, 19, 'OPB00186', 'Miray Miavotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(381, 20, 'OPB00187', 'Havelo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(382, 23, 'OPB00188', 'Amimi', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(383, 24, 'OPB00189', 'Avotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(384, 26, 'OPB00190', 'Mijoro', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(385, 26, 'OPB00191', 'Avotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(386, 27, 'OPB00192', 'Soalava', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(387, 29, 'OPB00193', 'Ampela Miharo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(388, 30, 'OPB00194', 'TARATRA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(389, 31, 'OPB00195', 'MATESANA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(390, 32, 'OPB00196', 'AMBANINATO MIRAY HINA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(391, 34, 'OPB00197', 'MAVITRIKA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(392, 35, 'OPB00198', 'MIRAY HINA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(393, 36, 'OPB00199', 'FIALONGNATSOA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(394, 37, 'OPB00200', 'AMBANINATO MANDROSO', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(395, 38, 'OPB00201', 'TOMBOTSOA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(396, 42, 'OPB00202', 'Mandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(397, 42, 'OPB00203', 'Miray Hina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(398, 42, 'OPB00204', 'Mivoatse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(399, 43, 'OPB00205', 'Fanilo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(400, 43, 'OPB00206', 'Tantsaha Mandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(401, 44, 'OPB00207', 'Fanantenana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(402, 44, 'OPB00208', 'Mandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(403, 45, 'OPB00209', 'Fikasana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(404, 45, 'OPB00210', 'Miray Dia', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(405, 47, 'OPB00211', 'Mahavita', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(406, 47, 'OPB00212', 'Mahefa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(407, 47, 'OPB00213', 'Mitambatra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(408, 48, 'OPB00214', 'Fanavotana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(409, 49, 'OPB00215', 'Vahomilaly', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(410, 50, 'OPB00216', 'Fitamabe', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(411, 50, 'OPB00217', 'Mamiratra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(412, 50, 'OPB00218', 'Mikolo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(413, 50, 'OPB00219', 'Soa Asa Miray', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(414, 56, 'OPB00220', 'Fivoarana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(415, 56, 'OPB00221', 'Mahatsara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(416, 57, 'OPB00222', 'Miatrika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(417, 57, 'OPB00223', 'Vonona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(418, 60, 'OPB00224', 'Miezaka', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(419, 60, 'OPB00225', 'Mihetsika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(420, 60, 'OPB00226', 'Vahomilaly', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(421, 61, 'OPB00227', 'Tsaradia', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(422, 62, 'OPB00228', 'Fiarahamonina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(423, 69, 'OPB00229', 'Taratra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(424, 70, 'OPB00230', 'Firaisan-Kina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(425, 71, 'OPB00231', 'Fampandrosoana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(426, 72, 'OPB00232', 'Iavotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(427, 72, 'OPB00233', 'Magnirisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(428, 72, 'OPB00234', 'Mahavotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(429, 72, 'OPB00235', 'Maromainty Avaratra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(430, 72, 'OPB00236', 'Tenisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(431, 72, 'OPB00237', 'Fahasoavana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(432, 72, 'OPB00238', 'Soamanoha', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(433, 74, 'OPB00239', 'Fangavota', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(434, 74, 'OPB00240', 'Mandrososoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(435, 74, 'OPB00241', 'Mazotosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(436, 75, 'OPB00242', 'Miraihina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(437, 153, 'OPB00243', 'Soalava', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(438, 153, 'OPB00244', 'Tongasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(439, 77, 'OPB00245', 'Avotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(440, 77, 'OPB00246', 'Mahaona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(441, 77, 'OPB00247', 'Malakilaky', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(442, 77, 'OPB00248', 'Masika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(443, 77, 'OPB00249', 'Miray Hina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(444, 77, 'OPB00250', 'Tafara Mahatratra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(445, 77, 'OPB00251', 'Tafara Mandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(446, 77, 'OPB00252', 'Tafara Maroroka', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(447, 77, 'OPB00253', 'Tafara Mihetsika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(448, 77, 'OPB00254', 'Tsivalike', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(449, 77, 'OPB00255', 'Vonona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(450, 77, 'OPB00256', 'Zoegnantanae', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(451, 78, 'OPB00257', 'Mahavotsy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(452, 79, 'OPB00258', 'Tehosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(453, 80, 'OPB00259', 'Azotsohohitae', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(454, 80, 'OPB00260', 'Mbehohita eo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(455, 80, 'OPB00261', 'Mbehohita Zahay', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(456, 81, 'OPB00262', 'Avotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(457, 81, 'OPB00263', 'Mazoto', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(458, 81, 'OPB00264', 'Soa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(459, 81, 'OPB00265', 'Tealongo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(460, 81, 'OPB00266', 'Tehivoatsy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(461, 82, 'OPB00267', 'Mamokatsoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(462, 82, 'OPB00268', 'Miraikasa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(463, 82, 'OPB00269', 'Tsimagnovalahatse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(464, 82, 'OPB00270', 'Tsimagnovasafiry', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(465, 83, 'OPB00271', 'Mahakarakara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(466, 83, 'OPB00272', 'Manantena', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(467, 83, 'OPB00273', 'Mandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(468, 83, 'OPB00274', 'Milamina Tehivoatra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(469, 84, 'OPB00275', 'Mandray Anjara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(470, 84, 'OPB00276', 'Mandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(471, 84, 'OPB00277', 'Mazoto', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(472, 85, 'OPB00278', 'Mavitrika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(473, 85, 'OPB00279', 'Tafara Mahavelo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(474, 85, 'OPB00280', 'Tafara Manaosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(475, 85, 'OPB00281', 'Tafara Mazoto', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(476, 85, 'OPB00282', 'Tafara Mionjo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(477, 85, 'OPB00283', 'Tafaratsiafake', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(478, 95, 'OPB00284', 'Ezaka', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(479, 151, 'OPB00285', 'Mandroso Tsara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(480, 96, 'OPB00286', 'COGE', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(481, 98, 'OPB00287', 'Fikaroha-Mahavotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(482, 98, 'OPB00288', 'Fikaroha-Mandrombake', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(483, 98, 'OPB00289', 'Fikaroha-Mandrosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(484, 98, 'OPB00290', 'Fikaroha-Mitarike', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(485, 98, 'OPB00291', 'Soajoro', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(486, 98, 'OPB00292', 'Tafarina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(487, 99, 'OPB00293', 'Tanterahosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(488, 99, 'OPB00294', 'Tohizotsara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(489, 100, 'OPB00295', 'Tezasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(490, 100, 'OPB00296', 'Tsimagnovalahatse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(491, 101, 'OPB00297', 'Soamiray', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(492, 101, 'OPB00298', 'Tantsaha Mahasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(493, 103, 'OPB00299', 'Mijoro', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(494, 104, 'OPB00300', 'Mandrosohatrany', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(495, 104, 'OPB00301', 'Soamijoro', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(496, 110, 'OPB00302', 'Fanilo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(497, 110, 'OPB00303', 'Miray 1', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(498, 110, 'OPB00304', 'Soanasara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(499, 110, 'OPB00305', 'Soavole', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(500, 111, 'OPB00306', 'Manantenaina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(501, 112, 'OPB00307', 'Soamivoatse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(502, 113, 'OPB00308', 'Ampela Mivoatsy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(503, 113, 'OPB00309', 'Tanjona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(504, 113, 'OPB00310', 'Tsaradoria', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(505, 113, 'OPB00311', 'Lazasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(506, 114, 'OPB00312', 'Avotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(507, 114, 'OPB00313', 'Fanjakalahy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(508, 114, 'OPB00314', 'Fanomezantsoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(509, 114, 'OPB00315', 'Mahitasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(510, 114, 'OPB00316', 'Manombosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(511, 114, 'OPB00317', 'Miraisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(512, 114, 'OPB00318', 'Miray', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(513, 114, 'OPB00319', 'Mitsinjotena', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(514, 114, 'OPB00320', 'Soafaniry', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(515, 114, 'OPB00321', 'Soafianatra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(516, 114, 'OPB00322', 'Soamandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(517, 114, 'OPB00323', 'Soamiezaka', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(518, 114, 'OPB00324', 'Tialongo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(519, 114, 'OPB00325', 'Tombosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(520, 114, 'OPB00326', 'Vatosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(521, 152, 'OPB00327', 'Fanantenana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(522, 152, 'OPB00328', 'Manirisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(523, 152, 'OPB00329', 'Miraihina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(524, 115, 'OPB00330', 'Soa Mahafaly', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(525, 116, 'OPB00331', 'Vonona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(526, 117, 'OPB00332', 'Maharitra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(527, 117, 'OPB00333', 'Miraisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(528, 117, 'OPB00334', 'Tany Miaramandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(529, 117, 'OPB00335', 'Tsiory', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(530, 119, 'OPB00336', 'Miaramandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(531, 119, 'OPB00337', 'Miaramiombona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(532, 119, 'OPB00338', 'Miaramiombona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(533, 120, 'OPB00339', 'Fikambanana Mahasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(534, 121, 'OPB00340', 'Miavotena', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(535, 122, 'OPB00341', 'Tanosy Miray Hina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(536, 123, 'OPB00342', 'Manavotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(537, 123, 'OPB00343', 'Zanatany', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(538, 144, 'OPB00344', 'Manirisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(539, 146, 'OPB00345', 'Liaraiky', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(540, 148, 'OPB00346', 'Mendrika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(541, 148, 'OPB00347', 'Soavoly', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(542, 149, 'OPB00348', 'Ezakay', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(543, 149, 'OPB00349', 'Fenoarivo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(544, 149, 'OPB00350', 'Mahasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(545, 149, 'OPB00351', 'Nagnasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(546, 149, 'OPB00352', 'Tolonasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(547, 149, 'OPB00353', 'Tsaramandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(548, 168, 'OPB00354', 'Mateza', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(549, 170, 'OPB00355', 'Avotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(550, 170, 'OPB00356', 'Belavenir', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(551, 170, 'OPB00357', 'Fanilo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(552, 170, 'OPB00358', 'Ho Avotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(553, 170, 'OPB00359', 'Iarahamiaina', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(554, 170, 'OPB00360', 'Manirisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(555, 170, 'OPB00361', 'Soa Ny Fiarahantsika', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(556, 170, 'OPB00362', 'Soanatao', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(557, 170, 'OPB00363', 'Tolotra Manja', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(558, 170, 'OPB00364', 'Tsodrano', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(559, 170, 'OPB00365', 'Vato Fehizoro', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(560, 170, 'OPB00366', 'Vonona', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(561, 150, 'OPB00367', 'Fitafafa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(562, 150, 'OPB00368', 'Fitamihabe', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(563, 12, 'OPB00369', 'FMF Fahasoavana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(564, 22, 'OPB00370', 'Vokatsoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(565, 39, 'OPB00371', 'MAHAVOTSE', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(566, 40, 'OPB00372', 'SOALIA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(567, 41, 'OPB00373', 'MILA FANDROSOANA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(568, 41, 'OPB00374', 'ANTAGNANIVO', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(569, 41, 'OPB00375', 'TOMBOSOA', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(570, 53, 'OPB00376', 'Fitahiantsoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(571, 54, 'OPB00377', 'Fanjiry', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(572, 55, 'OPB00378', 'Iraisana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(573, 55, 'OPB00379', 'Mahavelo', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(574, 65, 'OPB00380', 'Mazoto', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(575, 67, 'OPB00381', 'Mahavita', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(576, 67, 'OPB00382', 'Miavotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(577, 68, 'OPB00383', 'Tsaramandroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(578, 68, 'OPB00384', 'Tsaranohotonga', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(579, 171, 'OPB00385', 'Miray', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(580, 171, 'OPB00386', 'Soafiasa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(581, 86, 'OPB00387', 'Fale Ze Avy', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(582, 86, 'OPB00388', 'Miaramilanja', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(583, 86, 'OPB00389', 'Tantarasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(584, 86, 'OPB00390', 'Tea Vokatse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(585, 87, 'OPB00391', 'Mandrosoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(586, 87, 'OPB00392', 'Mandrososoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(587, 88, 'OPB00393', 'Tehivoatsy Soa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(588, 88, 'OPB00394', 'Vononasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(589, 88, 'OPB00395', 'Miaramiezaka Handroso', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(590, 155, 'OPB00396', 'Tehoavotra', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(591, 157, 'OPB00397', 'Tsitara', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(592, 158, 'OPB00398', 'Miraibola', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(593, 158, 'OPB00399', 'Miraisoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(594, 158, 'OPB00400', 'Miray I', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(595, 158, 'OPB00401', 'Miray II', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(596, 161, 'OPB00402', 'Mahavoaray Zahay', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(597, 162, 'OPB00403', 'Fanantenana', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(598, 165, 'OPB00404', 'Avotse', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(599, 105, 'OPB00405', 'Fms', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(600, 105, 'OPB00406', 'Lovasoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(601, 105, 'OPB00407', 'Malaky', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(602, 106, 'OPB00408', 'Fihareantsoa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(603, 106, 'OPB00409', 'Fikambanana Mikatsaka Ny Soa', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(604, 108, 'OPB00410', 'Azahadignove', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(605, 108, 'OPB00411', 'Mtf', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(606, 108, 'OPB00412', 'Tsiarovy Ny Hatsarana', NULL, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `opb_filieres`
--

CREATE TABLE `opb_filieres` (
  `ID_FILIERE` int(11) NOT NULL,
  `ID_OPB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `opb_filieres`
--

INSERT INTO `opb_filieres` (`ID_FILIERE`, `ID_OPB`) VALUES
(3, 199),
(6, 199),
(9, 200),
(3, 201),
(6, 201),
(3, 202),
(3, 203),
(3, 204),
(3, 205),
(3, 206),
(3, 207),
(7, 208),
(7, 209),
(7, 210),
(3, 211),
(3, 212),
(3, 213),
(6, 213),
(3, 214),
(3, 215),
(6, 215),
(3, 216),
(3, 217),
(6, 218),
(3, 219),
(3, 220),
(3, 221),
(3, 222),
(3, 223),
(7, 223),
(3, 224),
(3, 225),
(3, 226),
(3, 227),
(3, 228),
(6, 228),
(3, 229),
(3, 230),
(3, 231),
(3, 232),
(6, 232),
(3, 233),
(6, 233),
(3, 234),
(3, 235),
(3, 236),
(6, 236),
(3, 237),
(6, 237),
(3, 238),
(6, 238),
(3, 239),
(4, 240),
(3, 241),
(4, 241),
(3, 242),
(4, 242),
(2, 243),
(4, 243),
(3, 244),
(4, 244),
(3, 245),
(3, 246),
(3, 247),
(3, 248),
(3, 249),
(3, 250),
(3, 251),
(6, 252),
(3, 253),
(3, 254),
(6, 254),
(3, 255),
(3, 256),
(3, 257),
(3, 258),
(3, 259),
(3, 260),
(6, 261),
(6, 262),
(3, 263),
(3, 264),
(6, 264),
(3, 265),
(6, 265),
(3, 266),
(3, 267),
(3, 268),
(3, 269),
(3, 270),
(3, 271),
(3, 272),
(3, 273),
(3, 274),
(3, 275),
(3, 276),
(3, 277),
(7, 278),
(3, 279),
(3, 280),
(3, 281),
(3, 282),
(3, 283),
(4, 284),
(3, 285),
(3, 286),
(4, 287),
(3, 288),
(6, 288),
(4, 289),
(6, 289),
(3, 290),
(4, 291),
(3, 292),
(3, 293),
(6, 293),
(3, 294),
(6, 294),
(3, 295),
(3, 296),
(3, 297),
(3, 298),
(3, 299),
(3, 300),
(3, 301),
(3, 302),
(3, 303),
(3, 304),
(3, 305),
(3, 306),
(3, 307),
(4, 307),
(3, 308),
(4, 308),
(3, 309),
(3, 310),
(3, 311),
(3, 312),
(3, 313),
(3, 314),
(3, 315),
(3, 316),
(6, 316),
(3, 317),
(3, 318),
(3, 319),
(3, 320),
(3, 321),
(3, 322),
(3, 323),
(3, 324),
(3, 325),
(4, 325),
(3, 326),
(3, 327),
(3, 328),
(3, 329),
(3, 330),
(6, 330),
(3, 331),
(6, 331),
(3, 332),
(3, 333),
(3, 334),
(3, 335),
(3, 336),
(3, 337),
(3, 338),
(6, 338),
(3, 339),
(6, 339),
(3, 340),
(3, 341),
(3, 342),
(3, 343),
(3, 344),
(3, 345),
(2, 346),
(6, 346),
(7, 347),
(6, 348),
(3, 349),
(3, 350),
(3, 351),
(3, 352),
(2, 353),
(3, 354),
(3, 355),
(3, 356),
(6, 357),
(3, 358),
(4, 358),
(6, 359),
(4, 360),
(3, 361),
(6, 361),
(3, 362),
(6, 362),
(3, 363),
(4, 364),
(3, 365),
(6, 365),
(3, 366),
(6, 366),
(3, 367),
(6, 367),
(3, 368),
(6, 368),
(3, 369),
(3, 370),
(3, 371),
(6, 371),
(3, 372),
(3, 373),
(6, 373),
(3, 374),
(3, 375),
(6, 375),
(3, 376),
(6, 377),
(3, 378),
(3, 379),
(3, 380),
(6, 380),
(3, 381),
(6, 381),
(2, 382),
(3, 383),
(7, 384),
(7, 385),
(6, 386),
(7, 386),
(3, 387),
(6, 387),
(3, 396),
(3, 397),
(3, 398),
(3, 399),
(3, 400),
(3, 401),
(3, 402),
(3, 403),
(3, 404),
(3, 405),
(3, 406),
(3, 407),
(3, 408),
(3, 409),
(4, 410),
(4, 411),
(4, 412),
(4, 413),
(6, 413),
(3, 414),
(3, 415),
(3, 416),
(3, 417),
(3, 418),
(3, 419),
(3, 420),
(3, 421),
(4, 421),
(3, 422),
(3, 423),
(3, 424),
(3, 425),
(3, 426),
(3, 427),
(3, 428),
(3, 429),
(3, 430),
(3, 431),
(4, 431),
(3, 432),
(4, 432),
(3, 433),
(3, 434),
(3, 435),
(3, 436),
(3, 437),
(4, 437),
(3, 438),
(4, 438),
(3, 439),
(6, 439),
(3, 440),
(3, 441),
(3, 442),
(3, 443),
(3, 444),
(6, 444),
(3, 445),
(6, 445),
(3, 446),
(3, 447),
(3, 448),
(3, 449),
(3, 450),
(2, 451),
(3, 451),
(3, 452),
(3, 453),
(3, 454),
(3, 455),
(3, 456),
(3, 457),
(3, 458),
(3, 459),
(3, 460),
(3, 461),
(3, 462),
(6, 462),
(3, 463),
(3, 464),
(3, 465),
(3, 466),
(3, 467),
(3, 468),
(3, 469),
(3, 470),
(3, 471),
(3, 472),
(3, 473),
(3, 474),
(3, 475),
(3, 476),
(3, 479),
(3, 480),
(3, 481),
(7, 481),
(3, 482),
(3, 483),
(7, 483),
(3, 484),
(7, 484),
(3, 485),
(7, 485),
(3, 486),
(3, 487),
(7, 487),
(3, 488),
(7, 488),
(7, 489),
(6, 490),
(3, 491),
(3, 492),
(3, 493),
(3, 494),
(7, 494),
(3, 495),
(7, 495),
(2, 496),
(4, 496),
(8, 496),
(2, 497),
(4, 497),
(3, 498),
(4, 499),
(4, 500),
(4, 501),
(4, 502),
(4, 503),
(2, 504),
(4, 504),
(8, 504),
(4, 505),
(2, 506),
(4, 506),
(8, 506),
(4, 507),
(8, 507),
(2, 508),
(4, 508),
(8, 508),
(4, 509),
(8, 509),
(2, 510),
(4, 510),
(8, 510),
(2, 511),
(4, 511),
(8, 511),
(2, 512),
(4, 512),
(8, 512),
(2, 513),
(4, 513),
(8, 513),
(4, 514),
(8, 514),
(4, 515),
(8, 515),
(4, 516),
(2, 517),
(4, 517),
(4, 518),
(8, 518),
(4, 519),
(8, 519),
(3, 520),
(8, 520),
(4, 521),
(4, 522),
(4, 523),
(3, 524),
(3, 525),
(6, 525),
(3, 526),
(3, 527),
(3, 528),
(3, 529),
(3, 530),
(3, 531),
(3, 532),
(3, 533),
(3, 534),
(3, 535),
(3, 536),
(3, 537),
(3, 538),
(2, 539),
(4, 539),
(4, 540),
(2, 541),
(2, 542),
(4, 542),
(2, 543),
(4, 543),
(2, 544),
(4, 544),
(2, 545),
(4, 545),
(2, 546),
(4, 546),
(2, 547),
(4, 547),
(2, 548),
(4, 549),
(2, 550),
(4, 550),
(2, 551),
(2, 552),
(4, 552),
(2, 553),
(4, 553),
(2, 554),
(4, 554),
(4, 555),
(2, 556),
(4, 556),
(2, 557),
(4, 557),
(4, 558),
(2, 559),
(4, 559),
(2, 560),
(3, 561),
(3, 562),
(3, 563),
(6, 564),
(3, 570),
(3, 571),
(3, 572),
(3, 573),
(6, 574),
(3, 575),
(4, 575),
(3, 576),
(3, 577),
(4, 577),
(3, 578),
(3, 579),
(4, 579),
(3, 580),
(4, 580),
(3, 581),
(3, 582),
(3, 583),
(4, 583),
(3, 584),
(3, 585),
(3, 586),
(3, 587),
(6, 587),
(3, 588),
(6, 588),
(3, 589),
(6, 589),
(3, 590),
(6, 590),
(3, 591),
(3, 592),
(3, 593),
(3, 594),
(3, 595),
(3, 596),
(3, 597),
(6, 597),
(3, 598),
(7, 599),
(3, 600),
(7, 600),
(3, 601),
(7, 602),
(3, 603),
(3, 604),
(3, 605),
(7, 605),
(3, 606),
(7, 606);

-- --------------------------------------------------------

--
-- Structure de la table `opb_menages`
--

CREATE TABLE `opb_menages` (
  `ID_OPB_MENAGE` int(11) NOT NULL,
  `ID_MENAGE` int(11) NOT NULL,
  `ID_FONCTION` int(11) NOT NULL,
  `ID_OPB` int(11) NOT NULL,
  `DATE_ADHESION` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `opf`
--

CREATE TABLE `opf` (
  `ID_OPF` int(11) NOT NULL,
  `ID_FOKONTANY` int(11) NOT NULL,
  `CODE_OPF` varchar(20) DEFAULT NULL,
  `NOM_OPF` varchar(100) DEFAULT NULL,
  `DATE_CREATION` date DEFAULT NULL,
  `STATUT` varchar(50) DEFAULT NULL,
  `FORMELLE` tinyint(1) DEFAULT NULL,
  `ID_REPRESENTANT` int(11) DEFAULT NULL,
  `CONTACT` text,
  `OBSERVATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `opf_filieres`
--

CREATE TABLE `opf_filieres` (
  `ID_OPF` int(11) NOT NULL,
  `ID_FILIERE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `opr`
--

CREATE TABLE `opr` (
  `ID_OPR` int(11) NOT NULL,
  `ID_OPF` int(11) DEFAULT NULL,
  `ID_FOKONTANY` int(11) NOT NULL,
  `CODE_OPR` varchar(20) DEFAULT NULL,
  `NOM_OPR` varchar(50) DEFAULT NULL,
  `DATE_CREATION` date DEFAULT NULL,
  `STATUT` varchar(50) DEFAULT NULL,
  `FORMELLE` tinyint(1) DEFAULT NULL,
  `ID_REPRESENTANT` int(11) DEFAULT NULL,
  `CONTACT` text,
  `OBSERVATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `opr`
--

INSERT INTO `opr` (`ID_OPR`, `ID_OPF`, `ID_FOKONTANY`, `CODE_OPR`, `NOM_OPR`, `DATE_CREATION`, `STATUT`, `FORMELLE`, `ID_REPRESENTANT`, `CONTACT`, `OBSERVATION`) VALUES
(6, NULL, 56, 'OPR03', 'FAHASOAVAGNE', '2013-12-23', 'Association', 1, NULL, '033 20 225 41', 'Activités : Appuis à la commercialisation des produits agricoles, accompagnements des Unions/OPB membres à la négociation avec les opérateurs de marchés et à l\'approvisionnement des intrants agricoles.                        ');

-- --------------------------------------------------------

--
-- Structure de la table `opr_filieres`
--

CREATE TABLE `opr_filieres` (
  `ID_OPR` int(11) NOT NULL,
  `ID_FILIERE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `opr_filieres`
--

INSERT INTO `opr_filieres` (`ID_OPR`, `ID_FILIERE`) VALUES
(6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `opr_opb`
--

CREATE TABLE `opr_opb` (
  `ID_OPR` int(11) NOT NULL,
  `ID_OPB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `ID_REGION` int(11) NOT NULL,
  `CODE_REGION` varchar(10) DEFAULT NULL,
  `NOM_REGION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `regions`
--

INSERT INTO `regions` (`ID_REGION`, `CODE_REGION`, `NOM_REGION`) VALUES
(1, '12', 'Amoron\'i Mania'),
(2, '52', 'Androy');

-- --------------------------------------------------------

--
-- Structure de la table `tab_union`
--

CREATE TABLE `tab_union` (
  `ID_UNION` int(11) NOT NULL,
  `ID_FOKONTANY` int(11) NOT NULL,
  `ID_OPR` int(11) DEFAULT NULL,
  `CODE_UNION` varchar(20) DEFAULT NULL,
  `NOM_UNION` varchar(100) DEFAULT NULL,
  `TYPE` tinyint(4) DEFAULT NULL,
  `DATE_CREATION` date DEFAULT NULL,
  `STATUT` varchar(50) DEFAULT NULL,
  `ID_REPRESENTANT` int(11) DEFAULT NULL,
  `CONTACT` text,
  `FORMELLE` tinyint(1) DEFAULT NULL,
  `OBSERVATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tab_union`
--

INSERT INTO `tab_union` (`ID_UNION`, `ID_FOKONTANY`, `ID_OPR`, `CODE_UNION`, `NOM_UNION`, `TYPE`, `DATE_CREATION`, `STATUT`, `ID_REPRESENTANT`, `CONTACT`, `FORMELLE`, `OBSERVATION`) VALUES
(4, 112, NULL, 'U04', 'Tsimialonjafy', NULL, '2014-11-25', 'Association', NULL, '', 1, ''),
(10, 3, 6, 'U05', 'Ampamata Mivoatse', NULL, '2013-12-15', 'Association', NULL, '033 29 195 09', 1, '                                                                                                        '),
(11, 41, NULL, 'U06', 'Firaisankina', NULL, '2014-12-13', NULL, NULL, '033 41 117 15', NULL, NULL),
(12, 50, NULL, 'U07', 'Mahasoa', NULL, '2014-10-11', NULL, NULL, '033 79 227 68,033 32 455 99', NULL, NULL),
(13, 86, NULL, 'U08', 'Mahavonjy', NULL, '2014-06-12', NULL, NULL, '033 80 505 41', NULL, NULL),
(14, 173, 6, 'U09', 'Mahavotse', NULL, '2014-06-25', NULL, NULL, '033 61 188 40', NULL, NULL),
(15, 17, 6, 'U10', 'Mamiratra', NULL, '2013-10-28', NULL, NULL, '033 06 909 54', NULL, NULL),
(16, 116, NULL, 'U11', 'Mandrososoa', NULL, NULL, NULL, NULL, '', NULL, NULL),
(17, 43, 6, 'U12', 'Mazoto', NULL, '2014-08-12', NULL, NULL, '033 04 299 29', NULL, NULL),
(18, 73, NULL, 'U13', 'Moravotse', NULL, '2015-12-19', NULL, NULL, '', NULL, NULL),
(19, 113, NULL, 'U14', 'Tantsaha Miavotsy', NULL, NULL, NULL, NULL, '', NULL, NULL),
(20, 149, NULL, 'U15', 'Tantsaha Mijoro', NULL, '2010-10-18', NULL, NULL, '033 19 826 84', NULL, NULL),
(21, 71, NULL, 'U16', 'Tantsaha Miray', NULL, '2016-01-07', NULL, NULL, '', NULL, NULL),
(22, 59, 6, 'U17', 'Taratra', NULL, '2014-07-06', NULL, NULL, '033 20 225 41', NULL, NULL),
(23, 101, 6, 'U18', 'Tsaratsodrano', NULL, '2013-10-14', NULL, NULL, '033 84 725 79', NULL, NULL),
(24, 118, NULL, 'U19', 'Tsimanavaka', NULL, '2014-09-01', NULL, NULL, '', NULL, NULL),
(25, 112, NULL, 'U20', 'Tsimialonjafy', NULL, '2014-11-25', NULL, NULL, '', NULL, NULL),
(26, 93, 6, 'U21', 'Velomionjo', NULL, '2013-10-02', NULL, NULL, '033 46 671 13', NULL, NULL),
(27, 134, 6, 'U22', 'Vonona', NULL, '2013-10-13', NULL, NULL, '033 90 241 36', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_appui`
--

CREATE TABLE `type_appui` (
  `ID_TYPE` int(11) NOT NULL,
  `LIBELLE` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_appui`
--

INSERT INTO `type_appui` (`ID_TYPE`, `LIBELLE`) VALUES
(1, 'Appui Technique'),
(2, 'Intrants et petits matériels'),
(3, 'Equipements'),
(4, 'Infrastructure'),
(5, 'Appuis conseils'),
(6, 'Structuration'),
(7, 'Formation');

-- --------------------------------------------------------

--
-- Structure de la table `union_filieres`
--

CREATE TABLE `union_filieres` (
  `ID_FILIERE` int(11) NOT NULL,
  `ID_UNION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `union_filieres`
--

INSERT INTO `union_filieres` (`ID_FILIERE`, `ID_UNION`) VALUES
(3, 4),
(4, 4),
(5, 4),
(3, 10),
(3, 11),
(4, 12),
(3, 13),
(3, 14),
(3, 15),
(4, 16),
(3, 17),
(3, 18),
(8, 19),
(2, 20),
(4, 20),
(3, 21),
(3, 22),
(3, 23),
(7, 23),
(3, 24),
(3, 25),
(4, 25),
(5, 25),
(2, 26),
(3, 26),
(3, 27);

-- --------------------------------------------------------

--
-- Structure de la table `union_opb`
--

CREATE TABLE `union_opb` (
  `ID_OPB` int(11) NOT NULL,
  `ID_UNION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `union_opb`
--

INSERT INTO `union_opb` (`ID_OPB`, `ID_UNION`) VALUES
(199, 10),
(275, 10),
(295, 10),
(296, 10),
(350, 10),
(355, 10),
(367, 10),
(368, 10),
(369, 10),
(370, 10),
(371, 10),
(372, 10),
(373, 10),
(374, 10),
(563, 10),
(254, 12),
(284, 12),
(287, 12),
(289, 12),
(291, 12),
(410, 12),
(411, 12),
(412, 12),
(413, 12),
(442, 13),
(454, 13),
(455, 13),
(456, 13),
(457, 13),
(465, 13),
(466, 13),
(467, 13),
(468, 13),
(469, 13),
(470, 13),
(471, 13),
(476, 13),
(477, 13),
(581, 13),
(582, 13),
(583, 13),
(584, 13),
(587, 13),
(588, 13),
(589, 13),
(597, 13),
(206, 14),
(207, 14),
(214, 14),
(230, 14),
(231, 14),
(261, 14),
(262, 14),
(263, 14),
(270, 14),
(271, 14),
(273, 14),
(279, 14),
(280, 14),
(281, 14),
(286, 14),
(336, 14),
(337, 14),
(342, 14),
(354, 14),
(253, 15),
(254, 15),
(276, 15),
(297, 15),
(344, 15),
(345, 15),
(351, 15),
(375, 15),
(376, 15),
(378, 15),
(379, 15),
(381, 15),
(243, 16),
(225, 17),
(227, 17),
(234, 17),
(255, 17),
(265, 17),
(266, 17),
(267, 17),
(268, 17),
(269, 17),
(272, 17),
(274, 17),
(282, 17),
(349, 17),
(396, 17),
(397, 17),
(398, 17),
(399, 17),
(400, 17),
(403, 17),
(404, 17),
(405, 17),
(406, 17),
(408, 17),
(570, 17),
(571, 17),
(572, 17),
(539, 20),
(540, 20),
(541, 20),
(542, 20),
(543, 20),
(544, 20),
(545, 20),
(546, 20),
(547, 20),
(548, 20),
(549, 20),
(550, 20),
(551, 20),
(552, 20),
(553, 20),
(554, 20),
(555, 20),
(556, 20),
(557, 20),
(558, 20),
(559, 20),
(560, 20),
(222, 21),
(228, 21),
(356, 21),
(357, 21),
(358, 21),
(359, 21),
(360, 21),
(423, 21),
(424, 21),
(425, 21),
(426, 21),
(427, 21),
(430, 21),
(431, 21),
(432, 21),
(433, 21),
(434, 21),
(435, 21),
(437, 21),
(438, 21),
(579, 21),
(580, 21),
(298, 22),
(299, 22),
(300, 22),
(301, 22),
(302, 22),
(303, 22),
(304, 22),
(305, 22),
(306, 22),
(307, 22),
(308, 22),
(309, 22),
(324, 22),
(325, 22),
(326, 22),
(414, 22),
(415, 22),
(416, 22),
(419, 22),
(420, 22),
(574, 22),
(575, 22),
(577, 22),
(578, 22),
(245, 24),
(246, 24),
(247, 24),
(248, 24),
(362, 24),
(363, 24),
(364, 24),
(365, 24),
(526, 24),
(527, 24),
(530, 24),
(531, 24),
(497, 25),
(498, 25),
(499, 25),
(501, 25),
(502, 25),
(503, 25),
(505, 25),
(516, 25),
(517, 25),
(521, 25),
(523, 25),
(220, 26),
(221, 26),
(251, 26),
(313, 26),
(322, 26),
(323, 26),
(327, 26),
(328, 26),
(329, 26),
(352, 26),
(354, 26),
(479, 26),
(216, 27),
(219, 27),
(224, 27),
(239, 27),
(258, 27),
(264, 27),
(277, 27),
(278, 27),
(283, 27),
(288, 27),
(292, 27),
(293, 27),
(294, 27),
(334, 27),
(338, 27),
(339, 27),
(341, 27),
(343, 27);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `zone_intervention`
-- (Voir ci-dessous la vue réelle)
--
CREATE TABLE `zone_intervention` (
`ID_REGION` int(11)
,`CODE_REGION` varchar(10)
,`NOM_REGION` varchar(100)
,`ID_DISTRICT` int(11)
,`CODE_DISTRICT` varchar(5)
,`NOM_DISTRICT` varchar(100)
,`ID_COMMUNE` int(11)
,`CODE_COMMUNE` varchar(5)
,`NOM_COMMUNE` varchar(100)
,`ID_FOKONTANY` int(11)
,`CODE_FOKONTANY` varchar(5)
,`NOM_FOKONTANY` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure de la vue `appui_opb`
--
DROP TABLE IF EXISTS `appui_opb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appui_opb`  AS  select `appui_op`.`ID_APPUI_OP` AS `ID_APPUI_OP`,`appui_op`.`DATE_SAISIE` AS `DATE_SAISIE`,`opb`.`CODE_OPB` AS `CODE_OP`,`opb`.`NOM_OPB` AS `NOM_OP`,`details_appui`.`DATE_FINANCEMENT` AS `DATE_FINANCEMENT`,`details_appui`.`MONTANT` AS `MONTANT`,`filieres`.`NOM_FILIERE` AS `NOM_FILIERE`,`type_appui`.`LIBELLE` AS `LIBELLE` from ((((`appui_op` join `details_appui` on((`details_appui`.`ID_DETAIL` = `appui_op`.`ID_DETAIL`))) join `opb` on((`opb`.`ID_OPB` = `appui_op`.`ID_OP`))) join `type_appui` on((`type_appui`.`ID_TYPE` = `appui_op`.`ID_TYPE`))) join `filieres` on((`filieres`.`ID_FILIERE` = `details_appui`.`ID_FILIERE`))) where (`appui_op`.`TYPE_OP` = 4) ;

-- --------------------------------------------------------

--
-- Structure de la vue `appui_opf`
--
DROP TABLE IF EXISTS `appui_opf`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appui_opf`  AS  select `appui_op`.`ID_APPUI_OP` AS `ID_APPUI_OP`,`appui_op`.`DATE_SAISIE` AS `DATE_SAISIE`,`opf`.`CODE_OPF` AS `CODE_OP`,`opf`.`NOM_OPF` AS `NOM_OP`,`details_appui`.`DATE_FINANCEMENT` AS `DATE_FINANCEMENT`,`details_appui`.`MONTANT` AS `MONTANT`,`filieres`.`NOM_FILIERE` AS `NOM_FILIERE`,`type_appui`.`LIBELLE` AS `LIBELLE` from ((((`appui_op` join `details_appui` on((`details_appui`.`ID_DETAIL` = `appui_op`.`ID_DETAIL`))) join `opf` on((`opf`.`ID_OPF` = `appui_op`.`ID_OP`))) join `type_appui` on((`type_appui`.`ID_TYPE` = `appui_op`.`ID_TYPE`))) join `filieres` on((`filieres`.`ID_FILIERE` = `details_appui`.`ID_FILIERE`))) where (`appui_op`.`TYPE_OP` = 1) ;

-- --------------------------------------------------------

--
-- Structure de la vue `appui_opr`
--
DROP TABLE IF EXISTS `appui_opr`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appui_opr`  AS  select `appui_op`.`ID_APPUI_OP` AS `ID_APPUI_OP`,`appui_op`.`DATE_SAISIE` AS `DATE_SAISIE`,`opr`.`CODE_OPR` AS `CODE_OP`,`opr`.`NOM_OPR` AS `NOM_OP`,`details_appui`.`DATE_FINANCEMENT` AS `DATE_FINANCEMENT`,`details_appui`.`MONTANT` AS `MONTANT`,`filieres`.`NOM_FILIERE` AS `NOM_FILIERE`,`type_appui`.`LIBELLE` AS `LIBELLE` from ((((`appui_op` join `details_appui` on((`details_appui`.`ID_DETAIL` = `appui_op`.`ID_DETAIL`))) join `opr` on((`opr`.`ID_OPR` = `appui_op`.`ID_OP`))) join `type_appui` on((`type_appui`.`ID_TYPE` = `appui_op`.`ID_TYPE`))) join `filieres` on((`filieres`.`ID_FILIERE` = `details_appui`.`ID_FILIERE`))) where (`appui_op`.`TYPE_OP` = 2) ;

-- --------------------------------------------------------

--
-- Structure de la vue `appui_union`
--
DROP TABLE IF EXISTS `appui_union`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `appui_union`  AS  select `appui_op`.`ID_APPUI_OP` AS `ID_APPUI_OP`,`appui_op`.`DATE_SAISIE` AS `DATE_SAISIE`,`tab_union`.`CODE_UNION` AS `CODE_OP`,`tab_union`.`NOM_UNION` AS `NOM_OP`,`details_appui`.`DATE_FINANCEMENT` AS `DATE_FINANCEMENT`,`details_appui`.`MONTANT` AS `MONTANT`,`filieres`.`NOM_FILIERE` AS `NOM_FILIERE`,`type_appui`.`LIBELLE` AS `LIBELLE` from ((((`appui_op` join `details_appui` on((`details_appui`.`ID_DETAIL` = `appui_op`.`ID_DETAIL`))) join `tab_union` on((`tab_union`.`ID_UNION` = `appui_op`.`ID_OP`))) join `type_appui` on((`type_appui`.`ID_TYPE` = `appui_op`.`ID_TYPE`))) join `filieres` on((`filieres`.`ID_FILIERE` = `details_appui`.`ID_FILIERE`))) where (`appui_op`.`TYPE_OP` = 3) ;

-- --------------------------------------------------------

--
-- Structure de la vue `detail_appui_opb`
--
DROP TABLE IF EXISTS `detail_appui_opb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_appui_opb`  AS  select `appui_menage`.`ID_MENAGE` AS `ID_MENAGE`,`appui_op`.`ID_OP` AS `ID_OP`,`appui_op`.`ID_TYPE` AS `ID_TYPE`,`appui_op`.`DATE_COLLECTE` AS `DATE_COLLECTE` from ((`appui_menage` join `appui_op` on((`appui_op`.`ID_APPUI_OP` = `appui_menage`.`ID_PARENT`))) join `type_appui` on((`type_appui`.`ID_TYPE` = `appui_op`.`ID_TYPE`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `zone_intervention`
--
DROP TABLE IF EXISTS `zone_intervention`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `zone_intervention`  AS  select `regions`.`ID_REGION` AS `ID_REGION`,`regions`.`CODE_REGION` AS `CODE_REGION`,`regions`.`NOM_REGION` AS `NOM_REGION`,`districts`.`ID_DISTRICT` AS `ID_DISTRICT`,`districts`.`CODE_DISTRICT` AS `CODE_DISTRICT`,`districts`.`NOM_DISTRICT` AS `NOM_DISTRICT`,`communes`.`ID_COMMUNE` AS `ID_COMMUNE`,`communes`.`CODE_COMMUNE` AS `CODE_COMMUNE`,`communes`.`NOM_COMMUNE` AS `NOM_COMMUNE`,`fokontany`.`ID_FOKONTANY` AS `ID_FOKONTANY`,`fokontany`.`CODE_FOKONTANY` AS `CODE_FOKONTANY`,`fokontany`.`NOM_FOKONTANY` AS `NOM_FOKONTANY` from (((`regions` left join `districts` on((`districts`.`ID_REGION` = `regions`.`ID_REGION`))) left join `communes` on((`communes`.`ID_DISTRICT` = `districts`.`ID_DISTRICT`))) left join `fokontany` on((`fokontany`.`ID_COMMUNE` = `communes`.`ID_COMMUNE`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appui_menage`
--
ALTER TABLE `appui_menage`
  ADD PRIMARY KEY (`ID_APPUI_MENAGE`),
  ADD KEY `FK_ASSOCIATION_22` (`ID_MENAGE`),
  ADD KEY `FK_ASSOCIATION_32` (`ID_FORMATION`),
  ADD KEY `FK_ASSOCIATION_34` (`ID_PARENT`);

--
-- Index pour la table `appui_op`
--
ALTER TABLE `appui_op`
  ADD PRIMARY KEY (`ID_APPUI_OP`),
  ADD KEY `FK_ASSOCIATION_25` (`ID_MECANISME`),
  ADD KEY `FK_ASSOCIATION_28` (`ID_DETAIL`),
  ADD KEY `FK_ASSOCIATION_29` (`ID_TYPE`),
  ADD KEY `FK_ASSOCIATION_30` (`ID_CAT_OP`),
  ADD KEY `FK_ASSOCIATION_33` (`ID_FORMATION`),
  ADD KEY `FK_ASSOCIATION_35` (`ID_PARENT`);

--
-- Index pour la table `campagnes_opb`
--
ALTER TABLE `campagnes_opb`
  ADD PRIMARY KEY (`ID_CAMPAGNE`),
  ADD KEY `ID_OPB` (`ID_OPB`),
  ADD KEY `ID_FILIERE` (`ID_FILIERE`),
  ADD KEY `ID_MENAGE` (`ID_MENAGE`);

--
-- Index pour la table `cat_op`
--
ALTER TABLE `cat_op`
  ADD PRIMARY KEY (`ID_CAT_OP`);

--
-- Index pour la table `communes`
--
ALTER TABLE `communes`
  ADD PRIMARY KEY (`ID_COMMUNE`),
  ADD UNIQUE KEY `CODE_COMMUNE` (`CODE_COMMUNE`),
  ADD KEY `FK_ASSOCIATION_2` (`ID_DISTRICT`);

--
-- Index pour la table `details_appui`
--
ALTER TABLE `details_appui`
  ADD PRIMARY KEY (`ID_DETAIL`),
  ADD KEY `FK_ASSOCIATION_26` (`ID_FILIERE`);

--
-- Index pour la table `detail_formation`
--
ALTER TABLE `detail_formation`
  ADD PRIMARY KEY (`ID_FORMATION`),
  ADD KEY `FK_ASSOCIATION_31` (`ID_FOKONTANY`);

--
-- Index pour la table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`ID_DISTRICT`),
  ADD UNIQUE KEY `CODE_DISTRICT` (`CODE_DISTRICT`),
  ADD KEY `FK_ASSOCIATION_1` (`ID_REGION`);

--
-- Index pour la table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`ID_FILIERE`);

--
-- Index pour la table `fokontany`
--
ALTER TABLE `fokontany`
  ADD PRIMARY KEY (`ID_FOKONTANY`),
  ADD UNIQUE KEY `CODE_FOKONTANY` (`CODE_FOKONTANY`),
  ADD KEY `FK_ASSOCIATION_7` (`ID_COMMUNE`);

--
-- Index pour la table `fonctioninop`
--
ALTER TABLE `fonctioninop`
  ADD PRIMARY KEY (`ID_FONCTION`);

--
-- Index pour la table `mecanisme`
--
ALTER TABLE `mecanisme`
  ADD PRIMARY KEY (`ID_MECANISME`);

--
-- Index pour la table `menages`
--
ALTER TABLE `menages`
  ADD PRIMARY KEY (`ID_MENAGE`),
  ADD UNIQUE KEY `CODE_MENAGE` (`CODE_MENAGE`),
  ADD KEY `FK_SIEGE_MENAGES` (`ID_FOKONTANY`);

--
-- Index pour la table `menages_filieres`
--
ALTER TABLE `menages_filieres`
  ADD PRIMARY KEY (`ID_FILIERE`,`ID_MENAGE`),
  ADD KEY `FK_MENAGES_FILIERES2` (`ID_MENAGE`);

--
-- Index pour la table `opb`
--
ALTER TABLE `opb`
  ADD PRIMARY KEY (`ID_OPB`),
  ADD UNIQUE KEY `CODE_OPB` (`CODE_OPB`),
  ADD KEY `FK_SIEGE_OPB` (`ID_FOKONTANY`),
  ADD KEY `ID_REPRESENTANT` (`ID_REPRESENTANT`);

--
-- Index pour la table `opb_filieres`
--
ALTER TABLE `opb_filieres`
  ADD PRIMARY KEY (`ID_FILIERE`,`ID_OPB`),
  ADD KEY `FK_OPB_FILIERES2` (`ID_OPB`);

--
-- Index pour la table `opb_menages`
--
ALTER TABLE `opb_menages`
  ADD PRIMARY KEY (`ID_OPB_MENAGE`),
  ADD KEY `FK_ASSOCIATION_17` (`ID_OPB`),
  ADD KEY `FK_ASSOCIATION_18` (`ID_MENAGE`),
  ADD KEY `FK_ASSOCIATION_19` (`ID_FONCTION`);

--
-- Index pour la table `opf`
--
ALTER TABLE `opf`
  ADD PRIMARY KEY (`ID_OPF`),
  ADD UNIQUE KEY `CODE_OPF` (`CODE_OPF`),
  ADD KEY `FK_SIEGE_OPF` (`ID_FOKONTANY`),
  ADD KEY `FK_REPRESENTANT_OPF` (`ID_REPRESENTANT`);

--
-- Index pour la table `opf_filieres`
--
ALTER TABLE `opf_filieres`
  ADD PRIMARY KEY (`ID_OPF`,`ID_FILIERE`),
  ADD KEY `FK_OPF_FILIERES2` (`ID_FILIERE`);

--
-- Index pour la table `opr`
--
ALTER TABLE `opr`
  ADD PRIMARY KEY (`ID_OPR`),
  ADD UNIQUE KEY `CODE_OPR` (`CODE_OPR`),
  ADD KEY `FK_ASSOCIATION_27` (`ID_OPF`),
  ADD KEY `FK_SIEGE_OPR` (`ID_FOKONTANY`),
  ADD KEY `FK_REPRESENTANT_OPR` (`ID_REPRESENTANT`);

--
-- Index pour la table `opr_filieres`
--
ALTER TABLE `opr_filieres`
  ADD PRIMARY KEY (`ID_OPR`,`ID_FILIERE`),
  ADD KEY `FK_OPR_FILIERES2` (`ID_FILIERE`);

--
-- Index pour la table `opr_opb`
--
ALTER TABLE `opr_opb`
  ADD PRIMARY KEY (`ID_OPR`,`ID_OPB`),
  ADD KEY `FK_OPR_OBP2` (`ID_OPB`);

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`ID_REGION`),
  ADD UNIQUE KEY `CODE_REGION` (`CODE_REGION`);

--
-- Index pour la table `tab_union`
--
ALTER TABLE `tab_union`
  ADD PRIMARY KEY (`ID_UNION`),
  ADD UNIQUE KEY `CODE_UNION` (`CODE_UNION`),
  ADD KEY `FK_ASSOCIATION_4` (`ID_OPR`),
  ADD KEY `FK_SIEGE_UNION` (`ID_FOKONTANY`),
  ADD KEY `ID_REPRESENTANT` (`ID_REPRESENTANT`);

--
-- Index pour la table `type_appui`
--
ALTER TABLE `type_appui`
  ADD PRIMARY KEY (`ID_TYPE`);

--
-- Index pour la table `union_filieres`
--
ALTER TABLE `union_filieres`
  ADD PRIMARY KEY (`ID_FILIERE`,`ID_UNION`),
  ADD KEY `FK_UNION_FILIERES2` (`ID_UNION`);

--
-- Index pour la table `union_opb`
--
ALTER TABLE `union_opb`
  ADD PRIMARY KEY (`ID_OPB`,`ID_UNION`),
  ADD KEY `FK_UNION_OPB2` (`ID_UNION`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `appui_menage`
--
ALTER TABLE `appui_menage`
  MODIFY `ID_APPUI_MENAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `appui_op`
--
ALTER TABLE `appui_op`
  MODIFY `ID_APPUI_OP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `campagnes_opb`
--
ALTER TABLE `campagnes_opb`
  MODIFY `ID_CAMPAGNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `cat_op`
--
ALTER TABLE `cat_op`
  MODIFY `ID_CAT_OP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `ID_COMMUNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `details_appui`
--
ALTER TABLE `details_appui`
  MODIFY `ID_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `detail_formation`
--
ALTER TABLE `detail_formation`
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT pour la table `districts`
--
ALTER TABLE `districts`
  MODIFY `ID_DISTRICT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `ID_FILIERE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `fokontany`
--
ALTER TABLE `fokontany`
  MODIFY `ID_FOKONTANY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT pour la table `fonctioninop`
--
ALTER TABLE `fonctioninop`
  MODIFY `ID_FONCTION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `mecanisme`
--
ALTER TABLE `mecanisme`
  MODIFY `ID_MECANISME` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `menages`
--
ALTER TABLE `menages`
  MODIFY `ID_MENAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `opb`
--
ALTER TABLE `opb`
  MODIFY `ID_OPB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=607;
--
-- AUTO_INCREMENT pour la table `opb_menages`
--
ALTER TABLE `opb_menages`
  MODIFY `ID_OPB_MENAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `opf`
--
ALTER TABLE `opf`
  MODIFY `ID_OPF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `opr`
--
ALTER TABLE `opr`
  MODIFY `ID_OPR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `ID_REGION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tab_union`
--
ALTER TABLE `tab_union`
  MODIFY `ID_UNION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `type_appui`
--
ALTER TABLE `type_appui`
  MODIFY `ID_TYPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appui_menage`
--
ALTER TABLE `appui_menage`
  ADD CONSTRAINT `FK_ASSOCIATION_22` FOREIGN KEY (`ID_MENAGE`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_ASSOCIATION_32` FOREIGN KEY (`ID_FORMATION`) REFERENCES `detail_formation` (`ID_FORMATION`),
  ADD CONSTRAINT `FK_ASSOCIATION_34` FOREIGN KEY (`ID_PARENT`) REFERENCES `appui_op` (`ID_APPUI_OP`);

--
-- Contraintes pour la table `appui_op`
--
ALTER TABLE `appui_op`
  ADD CONSTRAINT `FK_ASSOCIATION_25` FOREIGN KEY (`ID_MECANISME`) REFERENCES `mecanisme` (`ID_MECANISME`),
  ADD CONSTRAINT `FK_ASSOCIATION_28` FOREIGN KEY (`ID_DETAIL`) REFERENCES `details_appui` (`ID_DETAIL`),
  ADD CONSTRAINT `FK_ASSOCIATION_29` FOREIGN KEY (`ID_TYPE`) REFERENCES `type_appui` (`ID_TYPE`),
  ADD CONSTRAINT `FK_ASSOCIATION_30` FOREIGN KEY (`ID_CAT_OP`) REFERENCES `cat_op` (`ID_CAT_OP`),
  ADD CONSTRAINT `FK_ASSOCIATION_33` FOREIGN KEY (`ID_FORMATION`) REFERENCES `detail_formation` (`ID_FORMATION`),
  ADD CONSTRAINT `FK_ASSOCIATION_35` FOREIGN KEY (`ID_PARENT`) REFERENCES `appui_op` (`ID_APPUI_OP`);

--
-- Contraintes pour la table `campagnes_opb`
--
ALTER TABLE `campagnes_opb`
  ADD CONSTRAINT `FK_CAMPAGNE_FILIERE` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`),
  ADD CONSTRAINT `FK_CAMPAGNE_MENAGE` FOREIGN KEY (`ID_MENAGE`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_CAMPAGNE_OPB` FOREIGN KEY (`ID_OPB`) REFERENCES `opb` (`ID_OPB`);

--
-- Contraintes pour la table `communes`
--
ALTER TABLE `communes`
  ADD CONSTRAINT `FK_ASSOCIATION_2` FOREIGN KEY (`ID_DISTRICT`) REFERENCES `districts` (`ID_DISTRICT`);

--
-- Contraintes pour la table `details_appui`
--
ALTER TABLE `details_appui`
  ADD CONSTRAINT `FK_ASSOCIATION_26` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`);

--
-- Contraintes pour la table `detail_formation`
--
ALTER TABLE `detail_formation`
  ADD CONSTRAINT `FK_ASSOCIATION_31` FOREIGN KEY (`ID_FOKONTANY`) REFERENCES `fokontany` (`ID_FOKONTANY`);

--
-- Contraintes pour la table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `FK_ASSOCIATION_1` FOREIGN KEY (`ID_REGION`) REFERENCES `regions` (`ID_REGION`);

--
-- Contraintes pour la table `fokontany`
--
ALTER TABLE `fokontany`
  ADD CONSTRAINT `FK_ASSOCIATION_7` FOREIGN KEY (`ID_COMMUNE`) REFERENCES `communes` (`ID_COMMUNE`);

--
-- Contraintes pour la table `menages`
--
ALTER TABLE `menages`
  ADD CONSTRAINT `FK_SIEGE_MENAGES` FOREIGN KEY (`ID_FOKONTANY`) REFERENCES `fokontany` (`ID_FOKONTANY`);

--
-- Contraintes pour la table `menages_filieres`
--
ALTER TABLE `menages_filieres`
  ADD CONSTRAINT `FK_MENAGES_FILIERES` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`),
  ADD CONSTRAINT `FK_MENAGES_FILIERES2` FOREIGN KEY (`ID_MENAGE`) REFERENCES `menages` (`ID_MENAGE`);

--
-- Contraintes pour la table `opb`
--
ALTER TABLE `opb`
  ADD CONSTRAINT `FK_REPRESENTANT_OPB` FOREIGN KEY (`ID_REPRESENTANT`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_SIEGE_OPB` FOREIGN KEY (`ID_FOKONTANY`) REFERENCES `fokontany` (`ID_FOKONTANY`);

--
-- Contraintes pour la table `opb_filieres`
--
ALTER TABLE `opb_filieres`
  ADD CONSTRAINT `FK_OPB_FILIERES` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`),
  ADD CONSTRAINT `FK_OPB_FILIERES2` FOREIGN KEY (`ID_OPB`) REFERENCES `opb` (`ID_OPB`);

--
-- Contraintes pour la table `opb_menages`
--
ALTER TABLE `opb_menages`
  ADD CONSTRAINT `FK_ASSOCIATION_17` FOREIGN KEY (`ID_OPB`) REFERENCES `opb` (`ID_OPB`),
  ADD CONSTRAINT `FK_ASSOCIATION_18` FOREIGN KEY (`ID_MENAGE`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_ASSOCIATION_19` FOREIGN KEY (`ID_FONCTION`) REFERENCES `fonctioninop` (`ID_FONCTION`);

--
-- Contraintes pour la table `opf`
--
ALTER TABLE `opf`
  ADD CONSTRAINT `FK_REPRESENTANT_OPF` FOREIGN KEY (`ID_REPRESENTANT`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_SIEGE_OPF` FOREIGN KEY (`ID_FOKONTANY`) REFERENCES `fokontany` (`ID_FOKONTANY`);

--
-- Contraintes pour la table `opf_filieres`
--
ALTER TABLE `opf_filieres`
  ADD CONSTRAINT `FK_OPF_FILIERES` FOREIGN KEY (`ID_OPF`) REFERENCES `opf` (`ID_OPF`),
  ADD CONSTRAINT `FK_OPF_FILIERES2` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`);

--
-- Contraintes pour la table `opr`
--
ALTER TABLE `opr`
  ADD CONSTRAINT `FK_ASSOCIATION_27` FOREIGN KEY (`ID_OPF`) REFERENCES `opf` (`ID_OPF`),
  ADD CONSTRAINT `FK_REPRESENTANT_OPR` FOREIGN KEY (`ID_REPRESENTANT`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_SIEGE_OPR` FOREIGN KEY (`ID_FOKONTANY`) REFERENCES `fokontany` (`ID_FOKONTANY`);

--
-- Contraintes pour la table `opr_filieres`
--
ALTER TABLE `opr_filieres`
  ADD CONSTRAINT `FK_OPR_FILIERES` FOREIGN KEY (`ID_OPR`) REFERENCES `opr` (`ID_OPR`),
  ADD CONSTRAINT `FK_OPR_FILIERES2` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`);

--
-- Contraintes pour la table `opr_opb`
--
ALTER TABLE `opr_opb`
  ADD CONSTRAINT `FK_OPR_OBP` FOREIGN KEY (`ID_OPR`) REFERENCES `opr` (`ID_OPR`),
  ADD CONSTRAINT `FK_OPR_OBP2` FOREIGN KEY (`ID_OPB`) REFERENCES `opb` (`ID_OPB`);

--
-- Contraintes pour la table `tab_union`
--
ALTER TABLE `tab_union`
  ADD CONSTRAINT `FK_ASSOCIATION_4` FOREIGN KEY (`ID_OPR`) REFERENCES `opr` (`ID_OPR`),
  ADD CONSTRAINT `FK_REPRESENTANT_UNION` FOREIGN KEY (`ID_REPRESENTANT`) REFERENCES `menages` (`ID_MENAGE`),
  ADD CONSTRAINT `FK_SIEGE_UNION` FOREIGN KEY (`ID_FOKONTANY`) REFERENCES `fokontany` (`ID_FOKONTANY`);

--
-- Contraintes pour la table `union_filieres`
--
ALTER TABLE `union_filieres`
  ADD CONSTRAINT `FK_UNION_FILIERES` FOREIGN KEY (`ID_FILIERE`) REFERENCES `filieres` (`ID_FILIERE`),
  ADD CONSTRAINT `FK_UNION_FILIERES2` FOREIGN KEY (`ID_UNION`) REFERENCES `tab_union` (`ID_UNION`);

--
-- Contraintes pour la table `union_opb`
--
ALTER TABLE `union_opb`
  ADD CONSTRAINT `FK_UNION_OPB` FOREIGN KEY (`ID_OPB`) REFERENCES `opb` (`ID_OPB`),
  ADD CONSTRAINT `FK_UNION_OPB2` FOREIGN KEY (`ID_UNION`) REFERENCES `tab_union` (`ID_UNION`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
