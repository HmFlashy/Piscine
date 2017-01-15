-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 09 Janvier 2017 à 19:41
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `testdehollande`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `idPromo` int(11) NOT NULL,
  `idEleve` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartenir`
--

INSERT INTO `appartenir` (`idPromo`, `idEleve`) VALUES (1, 1), (1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30);

-- --------------------------------------------------------

--
-- Structure de la table `categoriequestion`
--

CREATE TABLE `categoriequestion` (
  `idCategorie` int(11) NOT NULL,
  `libelleCategorie` varchar(20) DEFAULT NULL,
  `descriptionCategorie` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categoriequestion`
--

INSERT INTO `categoriequestion` (`idCategorie`, `libelleCategorie`, `descriptionCategorie`) VALUES
(1, 'Réaliste', 'Les personnes de ce type exercent surtout des tâches concrètes. Habiles de leurs mains, elles savent coordonner leurs gestes. Elles se servent d''outils, font fonctionner des appareils, des machines, des véhicules. Les réalistes ont le sens de la mécanique, le souci de la précision. Plusieurs exercent leur profession à l''extérieur plutôt qu''à l''intérieur. Leur travail demande souvent une bonne endurance physique, et même des capacités athlétiques. Ces personnes sont patientes, minutieuses, constantes, sensées, naturelles, franches, pratiques, concrètes, simples.'),
(2, 'Investigateur', 'La plupart des personnes de ce type ont des connaissances théoriques pour agir. Elles disposent de renseignements spécialisés dont elles se servent pour résoudre des problèmes. Ce sont des personnes qui observent. Leur principale compétence tient à la compréhension qu''elles ont des phénomènes. Elles aiment bien se laisser absorber dans leurs réflexions. Elles aiment jouer avec les idées. Elles valorisent le savoir. Ces personnes sont critiques, curieuses, soucieuses de se renseigner, calmes, réservées, persévérantes, tolérantes, prudentes dans leurs jugements, logiques, objectives, rigoureuses, intellectuelles.'),
(3, 'Artiste', 'Les personnes de ce type aiment les activités qui leur permettent de s''exprimer librement, à partir de leurs perceptions, de leur sensibilité et de leur intuition. Elles s''intéressent au travail de création, qu''il s''agisse d''art visuel, de littérature, de musique, de publicité ou de spectacle. D''esprit indépendant et non conformiste, elles sont à l''aise dans des situations qui sortent de l''ordinaire. Elles sont dotées d''une grande sensibilité et imagination. Bien qu''elles soient rebutées par les tâches méthodiques et routinières, elles sont néanmoins capables de travailler avec discipline. Ces personnes sont spontanées, expressives, imaginatives, émotives, indépendantes, originales, intuitives, passionnées, fières, flexibles, disciplinées.'),
(4, 'Social', 'Les personnes de ce type aiment être en contact avec les autres dans le but de les aider, de les informer, de les éduquer, de les divertir, de les soigner ou encore de favoriser leur croissance. Elles s''intéressent aux comportements humains et sont soucieuses de la qualité de leurs relations avec les autres. Elles utilisent leur savoir ainsi que leurs impressions et leurs émotions pour agir et pour interagir. Elles aiment communiquer et s''expriment facilement. Ces personnes sont attentives aux autres, coopératives, collaboratrices, compréhensives, dévouées, sensibles, sympathiques, perspicaces, bienveillantes, communicatives, encourageantes.'),
(5, 'Entreprenant', 'Les personnes de ce type aiment influencer leur entourage. Leur capacité de décision, le sens de l''organisation et une habileté particulière à communiquer leur enthousiasme les appuient dans leurs objectifs. Elles savent vendre des idées autant que des biens matériels. Elles ont le sens de l''organisation, de la planification et de l''initiative et savent mener à bien leurs projets. Elles savent faire preuve d''audace et d''efficacité. Ces personnes sont persuasives, énergiques, optimistes, audacieuses, sûres d''elles-mêmes, ambitieuses, déterminées, diplomates, débrouillardes, sociables.'),
(6, 'Conventionnel', 'Les personnes de ce type ont une préférence pour les activités précises, méthodiques, axées sur un résultat prévisible. Elles se préoccupent de l''ordre et de la bonne organisation matérielle de leur environnement. Elles préfèrent se conformer à des conventions bien établies et à des consignes claires plutôt que d''agir avec improvisation. Elles aiment calculer, classer, tenir à jour des registres ou des dossiers. Elles sont efficaces dans tout travail qui exige de l''exactitude et à l''aise dans les tâches routinières. Ces personnes sont loyales, organisées, efficaces, respectueuses de l''autorité, perfectionnistes, raisonnables, consciencieuses, ponctuelles, discrètes, strictes.');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE `departement` (
  `idDepartement` int(11) NOT NULL,
  `libelleDepartement` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`idDepartement`, `libelleDepartement`) VALUES
(1, 'IG3'),
(2, 'IG4'),
(3, 'IG5'),
(4, 'GBA3'),
(5, 'GBA4'),
(6, 'GBA5'),
(7, 'MAT3'),
(8, 'MAT4'),
(9, 'MAT5'),
(10, 'MI3'),
(11, 'MI4'),
(12, 'MI5'),
(13, 'MEA3'),
(14, 'MEA4'),
(15, 'MEA5'),
(16, 'STE3'),
(17, 'STE4'),
(18, 'STE5'),
(19, 'EGC3'),
(20, 'EGC4'),
(21, 'EGC5'),
(22, 'ENR3'),
(23, 'ENR4'),
(24, 'ENR5');

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE `eleve` (
  `idEleve` int(11) NOT NULL,
  `pseudoEleve` varchar(25) DEFAULT NULL,
  `nomEleve` varchar(40) DEFAULT NULL,
  `prenomEleve` varchar(40) DEFAULT NULL,
  `emailEleve` varchar(100) DEFAULT NULL,
  `motDePasseEleve` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `eleve`
--

INSERT INTO `eleve` (`idEleve`, `pseudoEleve`, `nomEleve`, `prenomEleve`, `emailEleve`, `motDePasseEleve`) VALUES
(1, 'testE', 'nomE', 'preE', 'e@eleve', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(2, 'Virliaw', 'Vir', 'Lucas', 'lucas@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(3, 'Glaepinn', 'Glae', 'Hugo', 'hugo@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(4, 'Bolmog', 'Bol', 'Louis', 'louis@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(5, 'Notnard', 'Not', 'Gabriel', 'gabriel@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(6, 'Linvara', 'Lin', 'Nathan', 'nathan@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(7, 'Pwenty', 'Pwen', 'Adam', 'adam@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(8, 'Rambysek', 'Ramby', 'Jules', 'jules@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(9, 'Morema', 'More', 'Arthur', 'arthur@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(10, 'Fateter', 'Fat', 'Mathis', 'mathis@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(11, 'Nelshara', 'Nel', 'Tom', 'tom@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(12, 'Whareog', 'Wha', 'Sacha', 'sacha@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(13, 'Moreell', 'More', 'Paul', 'paul@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(14, 'Lurgubal', 'Lurgu', 'Maxime', 'maxime@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(15, 'Neill', 'Nei', 'Axel', 'axel@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(16, 'Viith', 'Vi', 'Gabin', 'gabin@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(17, 'Scoffgal', 'Scoff', 'Emma', 'emma@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(18, 'Taeell', 'Tae', 'Louise', 'louise@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(19, 'Oozeyard', 'Ooze', 'Jade', 'jade@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(20, 'Rajnel', 'Raj', 'Manon', 'manon@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(21, 'Cantiand', 'Canti', 'Lola', 'lola@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(22, 'Thendena', 'Thende', 'Camille', 'camille@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(23, 'Esmess', 'Es', 'Sarah', 'sarah@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(24, 'Lurgrod', 'Lurg', 'Alice', 'alice@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(25, 'Sayshara', 'Say', 'Lucie', 'lucie@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(26, 'Morelad', 'Morela', 'Ambre', 'ambre@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(27, 'Tarkhog', 'Tark', 'Juliette', 'juliette@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(28, 'Lanwynn', 'Lanwy', 'Julia', 'julia@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(29, 'Glutwerth', 'Glutwe', 'Clara', 'clara@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(30, 'Ogubal', 'Ogu', 'Romane', 'romane@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0'),
(31, 'Bowerfram', 'Bower', 'Eva', 'eva@yopmail.com', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `idEleve` int(11) NOT NULL DEFAULT '0',
  `idSession` int(11) NOT NULL DEFAULT '0',
  `resultatSession` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `idProfesseur` int(11) NOT NULL,
  `pseudoProfesseur` varchar(25) DEFAULT NULL,
  `nomProfesseur` varchar(40) DEFAULT NULL,
  `prenomProfesseur` varchar(40) DEFAULT NULL,
  `emailProfesseur` varchar(100) DEFAULT NULL,
  `motDePasseProfesseur` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`idProfesseur`, `pseudoProfesseur`, `nomProfesseur`, `prenomProfesseur`, `emailProfesseur`, `motDePasseProfesseur`) VALUES
(1, 'testP', 'nomP', 'preP', 'p@prof', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `idPromo` int(11) NOT NULL,
  `idProfesseur` int(11) DEFAULT NULL,
  `idDepartement` int(11) DEFAULT NULL,
  `codePromo` char(12) DEFAULT NULL,
  `anneePromo` date DEFAULT NULL,
  `libellePromo` varchar(25) DEFAULT NULL,
  `taillePromo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `promotion`
--

INSERT INTO `promotion` (`idPromo`, `idProfesseur`, `idDepartement`, `codePromo`, `anneePromo`, `libellePromo`, `taillePromo`) VALUES
(1, 1, 1, 'promo', '2016-11-23', 'IG3 2016', 50),
(2, 1, 2, 'promo2', '2016-11-23', 'IG5 2016', 50),
(3, 1, 5, 'promo3', '2016-11-23', 'GBA4 2016', 50),
(4, 1, 7, 'promo4', '2016-11-23', 'MAT3 2016', 50),
(5, 1, 9, 'promo5', '2016-11-23', 'MAT5 2016', 50),
(6, 1, 11, 'promo6', '2016-11-23', 'MI4 2016', 50),
(7, 1, 13, 'promo7', '2016-11-23', 'MEA3 2016', 50),
(8, 1, 15, 'promo8', '2016-11-23', 'MEA5 2016', 50),
(9, 1, 17, 'promo9', '2016-11-23', 'STE4 2016', 50),
(10, 1, 19, 'promo10', '2016-11-23', 'EGC3 2016', 50);

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `idQuestion` int(11) NOT NULL,
  `idProfesseur` int(11) DEFAULT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  `libelleQuestion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`idQuestion`, `idProfesseur`, `idCategorie`, `libelleQuestion`) VALUES
(1, 1, 1, 'Vous aimez avoir des activités à l’extérieur, travailler en plein air'),
(2, 1, 2, 'Vous aimez élargir vos connaissances par l’étude, pouvoir approfondir un sujet'),
(3, 1, 3, 'Vous aimez travailler de façon indépendante, sans méthode ni objectif structurés'),
(4, 1, 4, 'Vous aimez travailler avec d’autres personnes pour les informer'),
(5, 1, 5, 'Vous admirez les personnes qui ont du pouvoir ou gagnent beaucoup d’argent'),
(6, 1, 6, 'Vous aimez travailler avec des chiffres'),
(7, 1, 4, 'Vous admirez les personnes qui travaillent pour soigner les autres'),
(8, 1, 6, 'Vous aimez une organisation claire et bien définie'),
(9, 1, 5, 'Vous aimez contribuer à atteindre les objectifs d’une organisation'),
(10, 1, 1, 'Vous aimez le sport, vous dépenser physiquement'),
(11, 1, 2, 'Vous aimez étudier les choses, les phénomènes ou les comportements'),
(12, 1, 3, 'Vous admirez les personnes qui ont des capacités artistiques'),
(13, 1, 4, 'Vous aimez travailler avec d’autres personnes pour les former, les entraîner'),
(14, 1, 3, 'Vous aimez les changements ou les situations imprévues'),
(15, 1, 6, 'Vous aimez ne faire qu’une seule chose à la fois et vous ne vous laissez pas distraire'),
(16, 1, 5, 'Vous aimez donner des ordres ou consignes et organiser l’activité des autres'),
(17, 1, 1, 'Vous aimez tirer vos propres conclusions de l’analyse d’une situation donnée'),
(18, 1, 2, 'Vous aimez conduire des véhicules ou faire fonctionner des machines'),
(19, 1, 1, 'Vous aimez fabriquer ou réparer des objets'),
(20, 1, 3, 'Vous aimez ne pas savoir précisément ce que vous avez à faire'),
(21, 1, 6, 'Vous aimez mettre en œuvre des " bonnes pratiques " acquises par l’expérience'),
(22, 1, 5, 'Vous aimez faire preuve d’initiative et prendre des décisions rapides'),
(23, 1, 4, 'Vous aimez écouter, dialoguer, essayer de comprendre les autres'),
(24, 1, 2, 'Vous aimez vous fier à votre jugement pour décider comment faire les choses'),
(25, 1, 3, 'Vous aimez faire plusieurs activités en même temps, ou passer d’une action à l’autre'),
(26, 1, 5, 'Vous aimez décider de ce qui doit être fait'),
(27, 1, 4, 'Vous aimez rencontrer des gens nouveaux'),
(28, 1, 2, 'Vous aimez vérifier une conclusion par des tests ou des informations complémentaires'),
(29, 1, 6, 'Vous aimez appuyer vos conclusions sur des bases déjà prouvées'),
(30, 1, 1, 'Vous aimez bricoler, utiliser des outils tels que tournevis, ciseaux, pinces, etc....'),
(31, 1, 2, 'Vous aimez résoudre les problèmes de façon rationnelle, étape par étape'),
(32, 1, 1, 'Vous aimez la nature, les plantes, les animaux...'),
(33, 1, 6, 'Vous aimez respecter les valeurs que vous vous êtes fixées'),
(34, 1, 4, 'Vous aimez faire un travail en commun avec d’autres'),
(35, 1, 5, 'Vous aimez relever des défis'),
(36, 1, 3, 'Vous aimez vous fier à votre intuition pour prendre des décisions'),
(37, 1, 5, 'Vous aimez convaincre les autres d’agir d’une certaine façon'),
(38, 1, 3, 'Vous aimez résoudre un problème sans avoir recours à une méthode logique'),
(39, 1, 2, 'Vous aimez prendre une décision après une réflexion, si possible logique'),
(40, 1, 6, 'Vous aimez suivre attentivement un plan pour atteindre le meilleur résultat possible'),
(41, 1, 4, 'Vous aimez écouter les autres et les conseiller sur la façon de résoudre leurs problèmes'),
(42, 1, 1, 'Vous aimez trouver une solution concrète, réaliste et simple aux problèmes'),
(43, 1, 2, 'Vous aimez concevoir ou améliorer les méthodes de travail'),
(44, 1, 1, 'Vous aimez utiliser votre "bon sens"'),
(45, 1, 4, 'Vous aimez rendre service, venir en aide à d’autres personnes'),
(46, 1, 5, 'Vous aimez répondre aux objections de vos interlocuteurs pour mieux les convaincre'),
(47, 1, 3, 'Vous aimez montrer votre originalité'),
(48, 1, 6, 'Vous aimez travailler avec soin pour obtenir un résultat parfait'),
(49, 1, 4, 'Vous aimez ou aimeriez animer des activités collectives, associatives...'),
(50, 1, 2, 'Vous aimez ou aimeriez étudier la physique, la biologie, ou la technologie'),
(51, 1, 1, 'Vous aimez démonter un appareil pour le réparer vous-même'),
(52, 1, 5, 'Vous aimez discuter avec un commerçant pour obtenir des réductions de prix'),
(53, 1, 3, 'Vous aimez exprimer vos idées, vos points de vue ou vos émotions'),
(54, 1, 6, 'Vous aimez rédiger un résumé, une lettre, un compte-rendu'),
(55, 1, 5, 'Vous aimez faire face aux situations urgentes ou imprévues'),
(56, 1, 6, 'Vous aimez vous occuper de démarches administratives ou d’ordre juridique'),
(57, 1, 4, 'Vous aimez ou aimeriez faire des reportages, écrire des articles, etc...'),
(58, 1, 2, 'Vous aimez chercher à comprendre et à expliquer le pourquoi des choses et des êtres'),
(59, 1, 3, 'Vous aimez imaginer des solutions qui sortent de l’ordinaire'),
(60, 1, 1, 'Vous aimez ou aimeriez utiliser un objet que vous avez fabriqué vous-même'),
(61, 1, 4, 'Vous aimez apprendre aux autres ce que vous savez'),
(62, 1, 1, 'Vous aimez collectionner des choses : timbres, cartes postales, pierres, etc....'),
(63, 1, 6, 'Vous aimez passer une grande partie de votre temps sur des documents écrits'),
(64, 1, 5, 'Vous aimez ou aimeriez vendre des produits ou services'),
(65, 1, 2, 'Vous aimez vous servir d’un microscope ou autre appareil de mesure...'),
(66, 1, 3, 'Vous aimez ou aimeriez avoir des loisirs créatifs : peinture, musique...'),
(67, 1, 6, 'Vous aimez classer, ordonner des documents ou des objets'),
(68, 1, 5, 'Vous aimez conduire une discussion, un débat'),
(69, 1, 4, 'Vous aimez échanger des idées avec les autres'),
(70, 1, 1, 'Vous aimez que ce que vous faites débouche sur des résultats concrets'),
(71, 1, 2, 'Vous aimez ou aimeriez mettre au point et réaliser des expériences scientifiques'),
(72, 1, 3, 'Vous aimez étudier ou inventer plusieurs solutions pour répondre à un problème');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `idSession` int(11) NOT NULL,
  `idPromo` int(11) DEFAULT NULL,
  `dateSession` datetime DEFAULT NULL,
  `libelleSession` varchar(30) DEFAULT NULL,
  `activeSession` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `session`
--

INSERT INTO `session` (`idSession`, `idPromo`, `dateSession`, `libelleSession`, `activeSession`) VALUES
(1, 1, '2016-11-23 19:17:38', 'IG3 2016 début', 0),
(2, 2, '2016-11-23 19:17:38', 'IG5 2016 2', 0),
(3, 3, '2016-11-23 19:17:38', 'GBA4 2016 début', 0),
(4, 4, '2016-11-23 19:17:38', 'MAT3 2016 début', 0),
(5, 5, '2016-11-23 19:17:38', 'MAT5 2016 début', 0),
(6, 6, '2016-11-23 19:17:38', 'MI4 2016 début', 0),
(7, 7, '2016-11-23 19:17:38', 'MEA3 2016 début', 0),
(8, 8, '2016-11-23 19:17:38', 'MEA5 2016 début', 0),
(9, 9, '2016-11-23 19:17:38', 'STE4 2016 début', 0);


--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`idPromo`,`idEleve`),
  ADD KEY `idEleve` (`idEleve`);

--
-- Index pour la table `categoriequestion`
--
ALTER TABLE `categoriequestion`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`idDepartement`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`idEleve`);

--
-- Index pour la table `participer`
--
ALTER TABLE `participer`
  ADD PRIMARY KEY (`idEleve`,`idSession`),
  ADD KEY `idSession` (`idSession`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`idProfesseur`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`idPromo`),
  ADD KEY `idProfesseur` (`idProfesseur`),
  ADD KEY `idDepartement` (`idDepartement`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `idProfesseur` (`idProfesseur`),
  ADD KEY `idCategorie` (`idCategorie`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`),
  ADD KEY `idPromo` (`idPromo`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `appartenir`
--
ALTER TABLE `appartenir`
  MODIFY `idPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `categoriequestion`
--
ALTER TABLE `categoriequestion`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `departement`
--
ALTER TABLE `departement`
  MODIFY `idDepartement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `idProfesseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `idPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromo`)
  ON DELETE CASCADE,
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `session` (`idSession`)
  ON DELETE CASCADE;

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProfesseur`),
  ADD CONSTRAINT `promotion_ibfk_2` FOREIGN KEY (`idDepartement`) REFERENCES `departement` (`idDepartement`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProfesseur`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`idCategorie`) REFERENCES `categoriequestion` (`idCategorie`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromo`)
  ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
