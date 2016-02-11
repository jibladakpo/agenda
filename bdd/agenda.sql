-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 11 Février 2016 à 11:59
-- Version du serveur :  5.5.39
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `agenda`
--

-- --------------------------------------------------------

--
-- Structure de la table `agenda_absence`
--

CREATE TABLE IF NOT EXISTS `agenda_absence` (
`id_absence` int(11) NOT NULL,
  `id_praticien` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `agenda_absence`
--

INSERT INTO `agenda_absence` (`id_absence`, `id_praticien`, `date`) VALUES
(18, '3', '11/02/2016'),
(19, '3', '12/02/2016');

-- --------------------------------------------------------

--
-- Structure de la table `agenda_calendrier`
--

CREATE TABLE IF NOT EXISTS `agenda_calendrier` (
`id` int(11) NOT NULL,
  `mois_nbre` char(2) NOT NULL DEFAULT '',
  `mois_libelle` varchar(20) NOT NULL DEFAULT '',
  `annee` varchar(4) NOT NULL DEFAULT '',
  `debut` varchar(25) NOT NULL DEFAULT '',
  `fin` varchar(25) NOT NULL DEFAULT '',
  `jour_fin` char(2) NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Contenu de la table `agenda_calendrier`
--

INSERT INTO `agenda_calendrier` (`id`, `mois_nbre`, `mois_libelle`, `annee`, `debut`, `fin`, `jour_fin`) VALUES
(1, '01', 'Janvier', '2015', '1420066800', '1422745200', '31'),
(2, '02', 'Février', '2015', '1422745200', '1425164400', '28'),
(3, '03', 'Mars', '2015', '1425164400', '1427842800', '31'),
(4, '04', 'Avril', '2015', '1427842800', '1430434800', '30'),
(5, '05', 'Mai', '2015', '1430434800', '1433113200', '31'),
(6, '06', 'Juin', '2015', '1433113200', '1435705200', '30'),
(7, '07', 'Juillet', '2015', '1435705200', '1438383600', '31'),
(8, '08', 'Aout', '2015', '1438383600', '1441062000', '31'),
(9, '09', 'Septembre', '2015', '1441062000', '1443654000', '30'),
(10, '10', 'Octobre', '2015', '1443654000', '1446332400', '31'),
(11, '11', 'Novembre', '2015', '1446332400', '1448924400', '30'),
(12, '12', 'Décembre', '2015', '1448924400', '1451602800', '31'),
(13, '01', 'Janvier', '2016', '14516002800', '1454281200', '31'),
(14, '02', 'Février', '2016', '1454281200', '1456786800', '29'),
(15, '03', 'Mars', '2016', '1456786800', '1459465200', '31'),
(16, '04', 'Avril', '2016', '1459465200', '1462057200', '30'),
(17, '05', 'Mai', '2016', '1462057200', '1464735600', '31'),
(18, '06', 'Juin', '2016', '1464735600', '1467327600', '30'),
(19, '07', 'Juillet', '2016', '1467327600', '1470006000', '31'),
(20, '08', 'Août', '2016', '1470006000', '1472684400', '31'),
(21, '09', 'Septembre', '2016', '1472684400', '1475276400', '30'),
(22, '10', 'Octobre', '2016', '1475276400', '1477954800', '31'),
(23, '11', 'Novembre', '2016', '1477954800', '1480546800', '30'),
(24, '12', 'Décembre', '2016', '1480546800', '1483225200', '31');

-- --------------------------------------------------------

--
-- Structure de la table `agenda_patient`
--

CREATE TABLE IF NOT EXISTS `agenda_patient` (
`id_patient` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL DEFAULT '',
  `prenom` varchar(50) NOT NULL DEFAULT '',
  `date_naissance` varchar(15) NOT NULL DEFAULT '',
  `tel_fixe` varchar(15) NOT NULL DEFAULT '',
  `mail` varchar(100) NOT NULL,
  `adresse` varchar(50) NOT NULL DEFAULT '',
  `cp` varchar(5) NOT NULL DEFAULT '',
  `ville` varchar(50) NOT NULL DEFAULT '',
  `medecin_traitant` varchar(50) NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=132 ;

--
-- Contenu de la table `agenda_patient`
--

INSERT INTO `agenda_patient` (`id_patient`, `nom`, `prenom`, `date_naissance`, `tel_fixe`, `mail`, `adresse`, `cp`, `ville`, `medecin_traitant`) VALUES
(12, 'DASSIN', 'Joe', '10/11/2012', '0233388343', '', '', '', '', 'Dr DELMAS'),
(13, 'GILBERT', 'Valentine', '20/02/1986', '0233388343', '', '', '', '', 'Dr DELMAS'),
(16, 'BARON', 'Jean Michel ', '14/11/1959 ', '0233308298 ', '', ' ', '', '', 'Dr DELMAS'),
(15, 'HALLYDAY', 'Johnny', '09/06/1961', '0233305030', '', '', '', '', 'Dr LELANDAIS'),
(11, 'BIANCA', 'Bernard', '20/09/1987', '0233305079', '', 'Rue Soeur Marie Boitier', '61600', 'LA FERTE MACE', 'Dr DELMAS'),
(17, 'PIAF', 'Edith', '15/12/1956', '0233308298', '', '', '', '', 'Dr DELMAS'),
(18, 'BARON', 'Aurélie  ', '29/02/1984  ', '0233373082  ', ' test 2', '  ', '', '', 'Dr DELMAS'),
(19, 'TEST', 'Test   ', '01/01/2015   ', 'Test   ', ' test ', ' test', '', '', 'Test'),
(20, 'GOSSELIN', 'Marvin', '14/06/1986', '0233305079', '', '', '', '', 'Dr DE CHAMPS'),
(21, 'VERAQUIN', 'Marcel', '12/11/1927', '0233372176', '', '', '', '', 'Dr BOISSELIER'),
(22, 'LAINE', 'Pascaline', '01/01/1965', '0233305079', '', '', '', '', 'DR X'),
(23, 'BRUEL', 'Patrick', '01/01/2014', '0233305079', '', '', '', '', 'Dr Y'),
(24, 'DUPOND', 'Martin', '01/01/2000', '0233302020', '', '', '', '', 'DR XXXXX'),
(54, 'LORPHELIN', 'Monique', 'LA MOTTE FOUQUE', 'La touche', '61600', '31/05/1953', '09 70', '', 'Dr ASTUDILLO'),
(55, 'GUINIO', 'Frédéric', '', '', '', '07/03/1968', '', '', ''),
(56, 'LEBLANC', 'Bernard', '', '', '', '05/07/1952', '', '', ''),
(57, 'LIOCHON', 'Jean Paul', '', '', '', '27/08/1984', '', '', ''),
(105, '1', '2', '7', '6', '8', '3', '4', '5', '9'),
(106, '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1324'),
(107, '66', '66', '66', '66', '66', '66', '66', '66', ''),
(108, '99', '999', '', '', '', '999', '', '', ''),
(109, '999', '99', '', '99', '', '999', '999', '999', ''),
(110, '5', '5', '5', '5', '5', '5', '5', '5', ''),
(111, '44', '44', '44', '44', '44', '44', '44', '44', '44'),
(112, '44', '44', '44', '44', '44', '44', '44', '44', '44'),
(113, '44', '44', '44', '44', '44', '44', '44', '44', '44'),
(114, 'mESSAGE', 'Cath', '', '', '', '01/06/1987', '123', '', ''),
(115, 'Patient', 'Bidule', '', '', '', '03/02/1625', '', '', ''),
(117, 'BOIVIN', 'Jocelyne', '', '', '', '06/04/1946', '', '', ''),
(104, '123', '123', '123', '123', '123', '123', '123', '123', '132'),
(103, 'Fuji', 'FUJKI', '', '', '', '432345', '', '', ''),
(102, 'bonjour', 'bonjour', '', '', '', 'bonjour', '', '', ''),
(101, 'bonjour', 'bonjour', '', '', '', 'bonjour', '', '', ''),
(100, 'bonjour', 'bonjour', 'bonjour', 'bonjour', '', 'bonjour', 'bonjo', 'bonjour', ''),
(99, 'CHESNEAU', 'Francine', '', '', '', '25/03/1962', '02333', 'f.ponchon@chic-andaines.fr', ''),
(98, 'CHESNEAU', 'Francine', '', '', '', '25/03/1962', '02333', 'f.ponchon@chic-andaines.fr', ''),
(118, 'BARON', 'Léonie', 'LA FERTE MACE', 'Rue Soeur Marie', '61600', '10/11/2012', '02333', 'test@chic-andaines.fr', 'Dr DELMAS'),
(119, 'PHILIPPE', 'Lydie', 'LA FERTE MACE', 'Rue Soeur Marie', '61600', '02/10/1987', '02333', 'l.philippe@chic-andaines.fr', 'Dr FLIPO'),
(120, 'PHILIPPE', 'Lydie', '02/10/1987', '0233305079', 'l.philippe@chic-andaines.fr', 'Rue Soeur Marie Boitier', '61600', 'LA FERTE MACE', 'Dr FLIPO'),
(121, 'PHILIPPE', 'Lydie', '02/10/1987', '0233305079', 'l.philippe@chic-andaines.fr', 'Rue Soeur Marie Boitier', '61600', 'LA FERTE MACE', 'Dr FLIPO'),
(122, 'aaa', 'zaz', '12/13/21', '0235153', 'qsdflk', 'ho', 'ohoho', 'h', 'ohoiho'),
(123, 'BEGYN', 'Lionel', '27/02/1974', '0233526545', '', '', '', '', ''),
(124, 'VILLAIN', 'Vincent', '03/05/1981', '0782376139', '', '', '', '', 'Dr AUBIN'),
(125, 'guibout', ' Hubert', '14/03/1945', ' ', ' ', ' ', '', '', ''),
(126, 'ATICINSON', 'Roger', '06/05/1935', '', '', '', '', '', ''),
(127, 'GERAULT', 'Marcel', '22/02/1933', '', '', '', '', '', ''),
(128, 'DEBOTTE', 'Marie Josephe', '23/04/1955', '', '', '', '', '', ''),
(129, 'CORBIERE', 'Bernard', '26/11/1934', '', '', '', '', '', ''),
(130, 'ROCHER', 'Jean', '01/01/2011', '', '', '', '', '', ''),
(131, 'BONNET', 'Nadine ', '05/04/1969 ', ' 02.33.30.50.23', ' ', ' ', '', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `agenda_praticien`
--

CREATE TABLE IF NOT EXISTS `agenda_praticien` (
  `id_praticien` int(11) NOT NULL DEFAULT '0',
  `nom_medecin` varchar(50) NOT NULL DEFAULT '',
  `specialite` varchar(50) NOT NULL DEFAULT '',
  `jour_presence` varchar(200) NOT NULL DEFAULT '',
  `heure_debut` varchar(25) NOT NULL DEFAULT '',
  `heure_fin` varchar(25) NOT NULL DEFAULT '',
  `duree_rdv` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agenda_praticien`
--

INSERT INTO `agenda_praticien` (`id_praticien`, `nom_medecin`, `specialite`, `jour_presence`, `heure_debut`, `heure_fin`, `duree_rdv`) VALUES
(1, 'Dr GOMBERT', 'Otho-Rhino-Laryngologie                           ', 'lundi mardi mercredi jeudi vendredi ', '08:00                    ', '13:00                    ', '900'),
(2, 'Dr PAGES', 'Chirurgie Orthopédique     ', 'lundi mardi mercredi jeudi vendredi ', '08:00:00     ', '12:00:00     ', '600'),
(3, 'Dr GHABCHE', 'Cardiologie  ', 'lundi mardi mercredi jeudi vendredi ', '08:00:00  ', '12:00:00  ', '1200'),
(4, 'Dr FATTAL', 'Cardiologie              ', 'lundi mardi mercredi jeudi vendredi ', '11:30:00              ', '16:30:00              ', '900'),
(5, 'Dr GHAZAL', 'Diabétologie Endocrinoloqie              ', 'lundi mardi mercredi jeudi vendredi ', '13:00:00              ', '18:00:00              ', '1200'),
(6, 'Dr DALATI', 'Chirurgie Viscérale           ', 'lundi mardi mercredi jeudi vendredi ', '09:30:00           ', '13:00:00           ', '1200'),
(7, 'Dr ISMAIL ', 'Urologie    ', 'lundi mardi mercredi jeudi vendredi ', '08:30:00    ', '12:00:00    ', '900');

-- --------------------------------------------------------

--
-- Structure de la table `agenda_rdv`
--

CREATE TABLE IF NOT EXISTS `agenda_rdv` (
`id_rdv` int(11) NOT NULL,
  `id_praticien` int(11) NOT NULL DEFAULT '0',
  `id_patient` int(11) NOT NULL DEFAULT '0',
  `date_debut` varchar(50) NOT NULL,
  `heure_deb` varchar(50) NOT NULL,
  `observation` varchar(250) NOT NULL DEFAULT '',
  `dossier` varchar(25) NOT NULL DEFAULT '',
  `dossier_lieu` varchar(50) NOT NULL DEFAULT '',
  `motif` varchar(50) NOT NULL DEFAULT '',
  `examen` varchar(100) NOT NULL DEFAULT '',
  `articulation` text NOT NULL,
  `raison` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=176 ;

--
-- Contenu de la table `agenda_rdv`
--

INSERT INTO `agenda_rdv` (`id_rdv`, `id_praticien`, `id_patient`, `date_debut`, `heure_deb`, `observation`, `dossier`, `dossier_lieu`, `motif`, `examen`, `articulation`, `raison`) VALUES
(45, 5, 23, '20/01/2016', '16h20', '', '', '', '', '', '', ''),
(57, 1, 11, '18/01/2016', '11h00', 'test', '', '', '', '', '', ''),
(93, 2, 23, '04/01/2016', '09h00', 'bdfb', '', '', '', 'irm', '', ''),
(56, 4, 23, '19/01/2016', '16h30', '', '', '', '', '', '', ''),
(58, 1, 18, '18/01/2016', '08h45', '', '', '', '', '', '', ''),
(60, 1, 23, '06/06/2016', '10h30', 'test', '', '', 'test', 'test', '', ''),
(62, 1, 18, '25/01/2016', '08h00', 'test1', '', 'test', 'test1', 'test1', '', ''),
(63, 7, 23, '06/01/2016', '13h00', '', '', 'LE MANS', '', '', '', ''),
(64, 2, 18, '04/01/2016', '08h00', '', '', '', '', '', 'test 2', ''),
(65, 3, 16, '11/01/2016', '08h40', '', '', 'Caen', '', '', '', ''),
(69, 3, 18, '11/01/2016', '08h00', '', '', '', '', '', '', ''),
(70, 3, 23, '11/01/2016', '08h20', '', '', '', '', '', '', ''),
(75, 3, 18, '11/01/2016', '08h00', '', '', '', '', '', '', ''),
(80, 1, 23, '19/01/2016', '08h30', '', '', '', '', '', '', ''),
(92, 2, 16, '04/01/2016', '09h00', 'ddd', '', '', '', 'irm', '', ''),
(83, 1, 18, '19/01/2016', '09h00', '', '', '', '', '', '', ''),
(89, 1, 16, '05/01/2016', '08h15', '', '', '', '', '', '', ''),
(94, 1, 23, '04/01/2016', '08h00', '', '', '', '', '', '', ''),
(96, 2, 23, '08/02/2016', '08h10', '', 'LFM', '', '', 'A prévoir', '', ''),
(97, 1, 18, '02/02/2016', '08h00', 'test', 'LFM', '', '', '', '', ''),
(98, 3, 23, '02/02/2016', '08h00', '', '', '', '', '', '', ''),
(99, 1, 23, '02/02/2016', '08h15', '', 'LFM', '', '', '', '', ''),
(100, 3, 18, '02/02/2016', '08h20', '', '', '', '', '', '', ''),
(101, 3, 16, '02/02/2016', '08h40', 'test', 'LFM', '', '', '', '', ''),
(102, 3, 23, '02/02/2016', '09h00', '', 'LFM', '', '', '', '', ''),
(103, 3, 23, '02/02/2016', '09h20', 'testy', 'LFM', '', '', '', '', ''),
(104, 3, 23, '02/02/2016', '08h00', 'tesgt', 'LFM', '', '', '', '', ''),
(105, 3, 23, '02/02/2016', '09h40', 'test', 'LFM', '', '', '', '', ''),
(106, 3, 23, '02/02/2016', '10h00', 'test', 'ailleurs', '', '', '', '', ''),
(107, 3, 23, '02/02/2016', '10h20', '', 'LFM', '', '', '', '', ''),
(108, 3, 18, '03/02/2016', '12h00', '', 'LFM', '', '', '', '', ''),
(109, 3, 18, '03/02/2016', '09h40', '', 'LFM', '', '', '', '', ''),
(110, 1, 18, '02/02/2016', '08h30', '', '', '', '', '', '', ''),
(111, 1, 18, '02/02/2016', '08h45', 'test test test', 'ailleurs', 'LE MANS', '', '', '', 'nez gorge oreille '),
(112, 1, 23, '03/02/2016', '08h00', '', 'LFM', '', '', '', 'Array', 'gorge '),
(113, 1, 18, '04/02/2016', '08h00', 'test', 'ailleurs', 'Caen', '', '', '', 'nez '),
(114, 1, 20, '04/02/2016', '08h45', 'Rdv test', 'LFM', '', '', '', 'Array', 'nez '),
(115, 2, 18, '04/02/2016', '08h00', 'examen genou', 'LFM', '', '', 'A prévoir', 'genou', ''),
(117, 1, 16, '04/02/2016', '08h15', '', 'LFM', '', '', '', '', 'oreille '),
(118, 2, 20, '05/02/2016', '08h00', 'Reconvocation pour voir', 'ailleurs', 'Flers', '', '', '', ''),
(119, 1, 16, '12/02/2016', '08h45', 'test', 'LFM', '', '', '', '', 'gorge '),
(120, 2, 18, '05/02/2016', '08h10', '', 'LFM', '12', '', 'Déja réalisé', '1', ''),
(133, 1, 19, '03/02/2016', '08h15', '', 'LFM', '', '', '', '', 'gorge '),
(134, 1, 23, '08/02/2016', '08h15', '', 'aucun', '', '', '', '', 'nez '),
(123, 1, 23, '08/02/2016', '08h30', 'test', 'ailleurs', 'LE MANS', '', '', '', 'nez gorge '),
(135, 1, 18, '08/02/2016', '08h00', '', 'LFM', '', '', '', '', 'oreille '),
(131, 1, 23, '09/02/2016', '08h00', '', 'ailleurs', 'Caen', '', '', '', 'gorge '),
(127, 1, 23, '10/02/2016', '08h00', '', 'ailleurs', '', '', '', '', 'oreille '),
(128, 1, 23, '10/02/2016', '08h15', '', 'LFM', '', '', '', '', 'gorge '),
(129, 1, 18, '10/02/2016', '08h45', '', 'LFM', '', '', '', '', 'nez '),
(130, 1, 16, '10/02/2016', '08h30', 'test', 'aucun', '', '', '', '', 'gorge '),
(136, 4, 23, '09/02/2016', '11h45', '', 'LFM', '', '', '', '', ''),
(137, 2, 23, '01/02/2016', '08h10', '', 'LFM', '', '', 'A prévoir', '', ''),
(138, 2, 16, '08/02/2016', '08h10', '', 'LFM', '', '', 'Déjà réalisé', '', ''),
(139, 2, 23, '01/02/2016', '08h20', '', 'LFM', '', '', '', '', ''),
(140, 2, 18, '09/02/2016', '08h00', 'test', 'LFM', '', '', 'Déjà réalisé', 'test arti', ''),
(141, 2, 23, '09/02/2016', '08h00', 'test ob', 'ailleurs', 'LE MANS', '', 'A prévoir', 'test articulation', ''),
(142, 2, 19, '09/02/2016', '09h00', 'test', 'aucun', '', '', 'A prévoir', 'test', ''),
(143, 1, 23, '01/02/2016', '08h15', '', '', '', '', '', '', ''),
(144, 2, 20, '01/02/2016', '08h10', '', 'LFM', '', '', 'Déjà réalisé', 'os', ''),
(158, 7, 54, '16/02/2016', '08h30', '', 'LFM', '', '', '', '', ''),
(159, 7, 55, '16/02/2016', '08h30', '', 'ailleurs', 'Caen', '', '', '', ''),
(160, 7, 56, '16/02/2016', '08h45', '', 'LFM', '', '', '', '', ''),
(148, 2, 57, '15/02/2016', '08h50', '', 'ailleurs', 'Caen', '', 'A prévoir', 'Clavicule', ''),
(161, 7, 123, '16/02/2016', '08h45', '', 'ailleurs', 'Caen', '', '', '', ''),
(150, 2, 20, '16/02/2016', '09h00', '', 'LFM', '', '', '', '', ''),
(151, 2, 117, '15/02/2016', '10h00', 'RAS', 'LFM', '', '', 'A prévoir', 'Cheville gauche', ''),
(152, 2, 23, '16/02/2016', '09h00', '', 'LFM', '', '', 'Déjà réalisé', '', ''),
(153, 2, 23, '01/02/2016', '08h00', '', 'LFM', '', '', 'A prévoir', 'test', ''),
(162, 7, 124, '16/02/2016', '09h00', '', 'aucun', '', '', '', '', ''),
(163, 7, 125, '16/02/2016', '09h30', '', 'LFM', '', '', '', '', ''),
(164, 7, 126, '16/02/2016', '09h30', '', 'LFM', '', '', '', '', ''),
(165, 7, 127, '16/02/2016', '09h45', '', 'aucun', '', '', '', '', ''),
(166, 7, 128, '16/02/2016', '09h45', '', 'LFM', '', '', '', '', ''),
(167, 7, 129, '16/02/2016', '10h00', '', 'LFM', '', '', '', '', ''),
(168, 7, 130, '16/02/2016', '09h15', '', 'LFM', '', '', '', '', ''),
(169, 2, 131, '15/02/2016', '08h40', '', 'LFM', '', '', 'Déjà réalisé', 'bras g', ''),
(170, 1, 131, '01/02/2016', '08h00', '', 'ailleurs', 'test', '', '', '', ''),
(171, 1, 23, '02/02/2016', '08h00', '', 'LFM', '', '', '', '', 'nez '),
(172, 2, 23, '05/02/2016', '08h20', '', 'LFM', '', '', 'Déjà réalisé', '', ''),
(173, 1, 23, '05/02/2016', '08h00', '', 'LFM', '', '', '', '', 'gorge '),
(174, 1, 23, '10/02/2016', '08h00', '', 'LFM', '', '', '', '', 'oreille '),
(175, 1, 23, '11/02/2016', '08h00', '', 'LFM', '', '', '', '', 'oreille ');

-- --------------------------------------------------------

--
-- Structure de la table `agenda_util`
--

CREATE TABLE IF NOT EXISTS `agenda_util` (
`id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL DEFAULT '',
  `prenom` varchar(50) NOT NULL DEFAULT '',
  `login` varchar(25) NOT NULL DEFAULT '',
  `mdp` varchar(25) NOT NULL DEFAULT '',
  `connexion` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `agenda_util`
--

INSERT INTO `agenda_util` (`id`, `nom`, `prenom`, `login`, `mdp`, `connexion`) VALUES
(2, 'Ladakpo', 'Jibril', 'admin', '123456', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agenda_absence`
--
ALTER TABLE `agenda_absence`
 ADD PRIMARY KEY (`id_absence`);

--
-- Index pour la table `agenda_calendrier`
--
ALTER TABLE `agenda_calendrier`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agenda_patient`
--
ALTER TABLE `agenda_patient`
 ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `agenda_praticien`
--
ALTER TABLE `agenda_praticien`
 ADD PRIMARY KEY (`id_praticien`);

--
-- Index pour la table `agenda_rdv`
--
ALTER TABLE `agenda_rdv`
 ADD PRIMARY KEY (`id_rdv`);

--
-- Index pour la table `agenda_util`
--
ALTER TABLE `agenda_util`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agenda_absence`
--
ALTER TABLE `agenda_absence`
MODIFY `id_absence` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `agenda_calendrier`
--
ALTER TABLE `agenda_calendrier`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `agenda_patient`
--
ALTER TABLE `agenda_patient`
MODIFY `id_patient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=132;
--
-- AUTO_INCREMENT pour la table `agenda_rdv`
--
ALTER TABLE `agenda_rdv`
MODIFY `id_rdv` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT pour la table `agenda_util`
--
ALTER TABLE `agenda_util`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
