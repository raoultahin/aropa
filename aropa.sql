-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Septembre 2017 à 08:05
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
  `ID_APPUI_OP` int(11) DEFAULT NULL,
  `ID_FORMATION` int(11) DEFAULT NULL,
  `OBJET_NATURE` varchar(255) DEFAULT NULL,
  `QTE` decimal(7,2) DEFAULT NULL,
  `UNITE` varchar(10) DEFAULT NULL,
  `DATE_COLLECTE` date DEFAULT NULL,
  `DATE_SAISIE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(13, 13, 13, 1, 1, NULL, 7, 1, 1, 'formation sur la ..........', '', '0.00', NULL, '2017-08-01', '2017-08-31');

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
(2, 3, '51', 'Commune 12');

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
(13, 1, '2017-08-31', '100000.00');

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
(13, 1, 'theme 1', '2017-09-01', '2017-09-02');

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
(3, 2, '44', 'Bekily');

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
(2, 'Riz');

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
(1, 1, '120', 'Fkt 30');

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
(1, 1, 'eaf', 'Valohery Dina', 'benaz', 'H', 1, 0),
(2, 1, 'EAF0002', 'Nom prenom', 'test', 'F', 1, 0);

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
(2, 2);

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
(1, 1, 'OPB00001', 'opb1', '2017-09-06', 'Cooperative', 1, 2, '', NULL, '');

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
(2, 1);

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

--
-- Contenu de la table `opb_menages`
--

INSERT INTO `opb_menages` (`ID_OPB_MENAGE`, `ID_MENAGE`, `ID_FONCTION`, `ID_OPB`, `DATE_ADHESION`) VALUES
(4, 2, 1, 1, '2017-09-28');

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

--
-- Contenu de la table `opf`
--

INSERT INTO `opf` (`ID_OPF`, `ID_FOKONTANY`, `CODE_OPF`, `NOM_OPF`, `DATE_CREATION`, `STATUT`, `FORMELLE`, `ID_REPRESENTANT`, `CONTACT`, `OBSERVATION`) VALUES
(1, 1, 'OPF01', 'opf1', '2017-08-24', 'Cooperative', 1, NULL, '0340145012', ''),
(2, 1, 'OPF02', 'opf2', '2017-09-06', 'Association', 0, 1, '0331665417', ''),
(3, 1, 'OPF03', 'opf3', '2017-09-06', 'Association', 1, 2, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `opf_filieres`
--

CREATE TABLE `opf_filieres` (
  `ID_OPF` int(11) NOT NULL,
  `ID_FILIERE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `opf_filieres`
--

INSERT INTO `opf_filieres` (`ID_OPF`, `ID_FILIERE`) VALUES
(1, 1),
(2, 1),
(1, 2),
(2, 2),
(3, 2);

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
(4, 1, 1, 'OPR01', 'opr1', '2017-09-08', 'Association', 1, NULL, '', ''),
(5, NULL, 1, 'OPR02', 'opr2', '2017-09-24', 'Cooperative', 0, NULL, '', '');

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
(4, 1),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `opr_opb`
--

CREATE TABLE `opr_opb` (
  `ID_OPR` int(11) NOT NULL,
  `ID_OPB` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `opr_opb`
--

INSERT INTO `opr_opb` (`ID_OPR`, `ID_OPB`) VALUES
(4, 1);

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
(2, '08', 'Androy');

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
  `DATE_CREATION` date DEFAULT NULL,
  `STATUT` varchar(50) DEFAULT NULL,
  `ID_REPRESENTANT` int(11) DEFAULT NULL,
  `CONTACT` text,
  `FORMELLE` tinyint(1) DEFAULT NULL,
  `TYPE` smallint(6) DEFAULT NULL,
  `OBSERVATION` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `tab_union`
--

INSERT INTO `tab_union` (`ID_UNION`, `ID_FOKONTANY`, `ID_OPR`, `CODE_UNION`, `NOM_UNION`, `DATE_CREATION`, `STATUT`, `ID_REPRESENTANT`, `CONTACT`, `FORMELLE`, `TYPE`, `OBSERVATION`) VALUES
(1, 1, 4, 'U01', 'union1', '2017-09-26', 'Association', NULL, '', 1, NULL, '');

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
(2, 1);

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
(1, 1);

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
  ADD KEY `FK_ASSOCIATION_34` (`ID_APPUI_OP`);

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
  MODIFY `ID_APPUI_MENAGE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `appui_op`
--
ALTER TABLE `appui_op`
  MODIFY `ID_APPUI_OP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `cat_op`
--
ALTER TABLE `cat_op`
  MODIFY `ID_CAT_OP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `communes`
--
ALTER TABLE `communes`
  MODIFY `ID_COMMUNE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `details_appui`
--
ALTER TABLE `details_appui`
  MODIFY `ID_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `detail_formation`
--
ALTER TABLE `detail_formation`
  MODIFY `ID_FORMATION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `districts`
--
ALTER TABLE `districts`
  MODIFY `ID_DISTRICT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `ID_FILIERE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `fokontany`
--
ALTER TABLE `fokontany`
  MODIFY `ID_FOKONTANY` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `ID_MENAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `opb`
--
ALTER TABLE `opb`
  MODIFY `ID_OPB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `opb_menages`
--
ALTER TABLE `opb_menages`
  MODIFY `ID_OPB_MENAGE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `opf`
--
ALTER TABLE `opf`
  MODIFY `ID_OPF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `opr`
--
ALTER TABLE `opr`
  MODIFY `ID_OPR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `ID_REGION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tab_union`
--
ALTER TABLE `tab_union`
  MODIFY `ID_UNION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `FK_ASSOCIATION_34` FOREIGN KEY (`ID_APPUI_OP`) REFERENCES `appui_op` (`ID_APPUI_OP`);

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
