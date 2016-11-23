-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 23 Novembre 2016 à 19:19
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

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

INSERT INTO `appartenir` (`idPromo`, `idEleve`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categoriequestion`
--

CREATE TABLE `categoriequestion` (
  `idCategorie` int(11) NOT NULL,
  `libelleCategorie` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categoriequestion`
--

INSERT INTO `categoriequestion` (`idCategorie`, `libelleCategorie`) VALUES
(1, 'Réaliste'),
(2, 'Investigateur'),
(3, 'Artiste'),
(4, 'Social'),
(5, 'Entreprenant'),
(6, 'Conventionnel');

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
(1, 'testE', 'nomE', 'preE', 'e@eleve', 'aa36dc6e81e2ac7ad03e12fedcb6a2c0');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE `participer` (
  `idEleve` int(11) NOT NULL DEFAULT '0',
  `idSession` int(11) NOT NULL DEFAULT '0',
  `resultatSession` char(1) DEFAULT NULL
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
(1, 1, 1, 'promo', '2016-11-23', 'IG3 2016', 50);

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
(8, 1, 5, 'Vous aimez une organisation claire et bien définie'),
(9, 1, 6, 'Vous aimez contribuer à atteindre les objectifs d’une organisation'),
(10, 1, 1, 'Vous aimez le sport, vous dépenser physiquement'),
(11, 1, 3, 'Vous aimez étudier les choses, les phénomènes ou les comportements'),
(12, 1, 2, 'Vous admirez les personnes qui ont des capacités artistiques'),
(13, 1, 6, 'Vous aimez travailler avec d’autres personnes pour les former, les entraîner'),
(14, 1, 5, 'Vous aimez les changements ou les situations imprévues'),
(15, 1, 2, 'Vous aimez ne faire qu’une seule chose à la fois et vous ne vous laissez pas distraire'),
(16, 1, 1, 'Vous aimez donner des ordres ou consignes et organiser l’activité des autres'),
(17, 1, 4, 'Vous aimez tirer vos propres conclusions de l’analyse d’une situation donnée'),
(18, 1, 3, 'Vous aimez conduire des véhicules ou faire fonctionner des machines'),
(19, 1, 1, 'Vous aimez fabriquer ou réparer des objets'),
(20, 1, 6, 'Vous aimez ne pas savoir précisément ce que vous avez à faire'),
(21, 1, 2, 'Vous aimez mettre en œuvre des " bonnes pratiques " acquises par l’expérience'),
(22, 1, 5, 'Vous aimez faire preuve d’initiative et prendre des décisions rapides'),
(23, 1, 4, 'Vous aimez écouter, dialoguer, essayer de comprendre les autres'),
(24, 1, 3, 'Vous aimez vous fier à votre jugement pour décider comment faire les choses'),
(25, 1, 6, 'Vous aimez faire plusieurs activités en même temps, ou passer d’une action à l’autre'),
(26, 1, 4, 'Vous aimez décider de ce qui doit être fait'),
(27, 1, 1, 'Vous aimez rencontrer des gens nouveaux'),
(28, 1, 3, 'Vous aimez vérifier une conclusion par des tests ou des informations complémentaires'),
(29, 1, 2, 'Vous aimez appuyer vos conclusions sur des bases déjà prouvées'),
(30, 1, 5, 'Vous aimez bricoler, utiliser des outils tels que tournevis, ciseaux, pinces, etc....'),
(31, 1, 2, 'Vous aimez résoudre les problèmes de façon rationnelle, étape par étape'),
(32, 1, 1, 'Vous aimez la nature, les plantes, les animaux...'),
(33, 1, 6, 'Vous aimez respecter les valeurs que vous vous êtes fixées'),
(34, 1, 4, 'Vous aimez faire un travail en commun avec d’autres'),
(35, 1, 5, 'Vous aimez relever des défis'),
(36, 1, 3, 'Vous aimez vous fier à votre intuition pour prendre des décisions'),
(37, 1, 6, 'Vous aimez convaincre les autres d’agir d’une certaine façon'),
(38, 1, 3, 'Vous aimez résoudre un problème sans avoir recours à une méthode logique'),
(39, 1, 2, 'Vous aimez prendre une décision après une réflexion, si possible logique'),
(40, 1, 5, 'Vous aimez suivre attentivement un plan pour atteindre le meilleur résultat possible'),
(41, 1, 1, 'Vous aimez écouter les autres et les conseiller sur la façon de résoudre leurs problèmes'),
(42, 1, 4, 'Vous aimez trouver une solution concrète, réaliste et simple aux problèmes'),
(43, 1, 2, 'Vous aimez concevoir ou améliorer les méthodes de travail'),
(44, 1, 1, 'Vous aimez utiliser votre "bon sens"'),
(45, 1, 5, 'Vous aimez rendre service, venir en aide à d’autres personnes'),
(46, 1, 3, 'Vous aimez répondre aux objections de vos interlocuteurs pour mieux les convaincre'),
(47, 1, 4, 'Vous aimez montrer votre originalité'),
(48, 1, 6, 'Vous aimez travailler avec soin pour obtenir un résultat parfait'),
(49, 1, 3, 'Vous aimez ou aimeriez animer des activités collectives, associatives...'),
(50, 1, 2, 'Vous aimez ou aimeriez étudier la physique, la biologie, ou la technologie'),
(51, 1, 5, 'Vous aimez démonter un appareil pour le réparer vous-même'),
(52, 1, 1, 'Vous aimez discuter avec un commerçant pour obtenir des réductions de prix'),
(53, 1, 4, 'Vous aimez exprimer vos idées, vos points de vue ou vos émotions'),
(54, 1, 6, 'Vous aimez rédiger un résumé, une lettre, un compte-rendu'),
(55, 1, 6, 'Vous aimez faire face aux situations urgentes ou imprévues'),
(56, 1, 4, 'Vous aimez vous occuper de démarches administratives ou d’ordre juridique'),
(57, 1, 5, 'Vous aimez ou aimeriez faire des reportages, écrire des articles, etc...'),
(58, 1, 3, 'Vous aimez chercher à comprendre et à expliquer le pourquoi des choses et des êtres'),
(59, 1, 1, 'Vous aimez imaginer des solutions qui sortent de l’ordinaire'),
(60, 1, 2, 'Vous aimez ou aimeriez utiliser un objet que vous avez fabriqué vous-même'),
(61, 1, 2, 'Vous aimez apprendre aux autres ce que vous savez'),
(62, 1, 5, 'Vous aimez collectionner des choses : timbres, cartes postales, pierres, etc....'),
(63, 1, 6, 'Vous aimez passer une grande partie de votre temps sur des documents écrits'),
(64, 1, 1, 'Vous aimez ou aimeriez vendre des produits ou services'),
(65, 1, 4, 'Vous aimez vous servir d’un microscope ou autre appareil de mesure...'),
(66, 1, 3, 'Vous aimez ou aimeriez avoir des loisirs créatifs : peinture, musique...'),
(67, 1, 4, 'Vous aimez classer, ordonner des documents ou des objets'),
(68, 1, 5, 'Vous aimez conduire une discussion, un débat'),
(69, 1, 6, 'Vous aimez échanger des idées avec les autres'),
(70, 1, 3, 'Vous aimez que ce que vous faites débouche sur des résultats concrets'),
(71, 1, 2, 'Vous aimez ou aimeriez mettre au point et réaliser des expériences scientifiques'),
(72, 1, 1, 'Vous aimez étudier ou inventer plusieurs solutions pour répondre à un problème');

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
(1, 1, '2016-11-23 19:17:38', 'IG3 2016 début', 0);

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
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromo`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`);

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `session` (`idSession`);

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
  ADD CONSTRAINT `session_ibfk_1` FOREIGN KEY (`idPromo`) REFERENCES `promotion` (`idPromo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
