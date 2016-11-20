-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 20 Novembre 2016 à 13:22
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
  `idEleve` int(11) NOT NULL DEFAULT '0',
  `idSession` int(11) NOT NULL DEFAULT '0',
  `resultatSession` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `idQuestionnaire` int(11) NOT NULL DEFAULT '0',
  `idGroupe` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Structure de la table `generer`
--

CREATE TABLE `generer` (
  `idProfesseur` int(11) NOT NULL DEFAULT '0',
  `idSession` int(11) NOT NULL DEFAULT '0',
  `idQuestionnaire` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `groupequestions`
--

CREATE TABLE `groupequestions` (
  `idGroupe` int(11) NOT NULL,
  `idProfesseur` int(11) DEFAULT NULL,
  `libelleGroupe` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupequestions`
--

INSERT INTO `groupequestions` (`idGroupe`, `idProfesseur`, `libelleGroupe`) VALUES
(1, NULL, 'Standard1'),
(2, NULL, 'Standard2'),
(3, NULL, 'Standard3'),
(4, NULL, 'Standard4'),
(5, NULL, 'Standard5'),
(6, NULL, 'Standard6'),
(7, NULL, 'Standard7'),
(8, NULL, 'Standard8'),
(9, NULL, 'Standard9'),
(10, NULL, 'Standard10'),
(11, NULL, 'Standard11'),
(12, NULL, 'Standard12');

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

-- --------------------------------------------------------

--
-- Structure de la table `questionnaire`
--

CREATE TABLE `questionnaire` (
  `idQuestionnaire` int(11) NOT NULL,
  `idProfesseur` int(11) DEFAULT NULL,
  `libelleQuestionnaire` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `idQuestion` int(11) NOT NULL,
  `idCategorie` int(11) DEFAULT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  `libelleQuestion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `questions`
--

INSERT INTO `questions` (`idQuestion`, `idCategorie`, `idGroupe`, `libelleQuestion`) VALUES
(1, 1, 1, 'Vous aimez avoir des activités à l’extérieur, travailler en plein air'),
(2, 2, 1, 'Vous aimez élargir vos connaissances par l’étude, pouvoir approfondir un sujet'),
(3, 3, 1, 'Vous aimez travailler de façon indépendante, sans méthode ni objectif structurés'),
(4, 4, 1, 'Vous aimez travailler avec d’autres personnes pour les informer'),
(5, 5, 1, 'Vous admirez les personnes qui ont du pouvoir ou gagnent beaucoup d’argent'),
(6, 6, 1, 'Vous aimez travailler avec des chiffres'),
(7, 4, 2, 'Vous admirez les personnes qui travaillent pour soigner les autres'),
(8, 5, 2, 'Vous aimez une organisation claire et bien définie'),
(9, 6, 2, 'Vous aimez contribuer à atteindre les objectifs d’une organisation'),
(10, 1, 2, 'Vous aimez le sport, vous dépenser physiquement'),
(11, 3, 2, 'Vous aimez étudier les choses, les phénomènes ou les comportements'),
(12, 2, 2, 'Vous admirez les personnes qui ont des capacités artistiques'),
(13, 6, 3, 'Vous aimez travailler avec d’autres personnes pour les former, les entraîner'),
(14, 5, 3, 'Vous aimez les changements ou les situations imprévues'),
(15, 2, 3, 'Vous aimez ne faire qu’une seule chose à la fois et vous ne vous laissez pas distraire'),
(16, 1, 3, 'Vous aimez donner des ordres ou consignes et organiser l’activité des autres'),
(17, 4, 3, 'Vous aimez tirer vos propres conclusions de l’analyse d’une situation donnée'),
(18, 3, 3, 'Vous aimez conduire des véhicules ou faire fonctionner des machines'),
(19, 1, 4, 'Vous aimez fabriquer ou réparer des objets'),
(20, 6, 4, 'Vous aimez ne pas savoir précisément ce que vous avez à faire'),
(21, 2, 4, 'Vous aimez mettre en œuvre des " bonnes pratiques " acquises par l’expérience'),
(22, 5, 4, 'Vous aimez faire preuve d’initiative et prendre des décisions rapides'),
(23, 4, 4, 'Vous aimez écouter, dialoguer, essayer de comprendre les autres'),
(24, 3, 4, 'Vous aimez vous fier à votre jugement pour décider comment faire les choses'),
(25, 6, 5, 'Vous aimez faire plusieurs activités en même temps, ou passer d’une action à l’autre'),
(26, 4, 5, 'Vous aimez décider de ce qui doit être fait'),
(27, 1, 5, 'Vous aimez rencontrer des gens nouveaux'),
(28, 3, 5, 'Vous aimez vérifier une conclusion par des tests ou des informations complémentaires'),
(29, 2, 5, 'Vous aimez appuyer vos conclusions sur des bases déjà prouvées'),
(30, 5, 5, 'Vous aimez bricoler, utiliser des outils tels que tournevis, ciseaux, pinces, etc....'),
(31, 2, 6, 'Vous aimez résoudre les problèmes de façon rationnelle, étape par étape'),
(32, 1, 6, 'Vous aimez la nature, les plantes, les animaux...'),
(33, 6, 6, 'Vous aimez respecter les valeurs que vous vous êtes fixées'),
(34, 4, 6, 'Vous aimez faire un travail en commun avec d’autres'),
(35, 5, 6, 'Vous aimez relever des défis'),
(36, 3, 6, 'Vous aimez vous fier à votre intuition pour prendre des décisions'),
(37, 6, 7, 'Vous aimez convaincre les autres d’agir d’une certaine façon'),
(38, 3, 7, 'Vous aimez résoudre un problème sans avoir recours à une méthode logique'),
(39, 2, 7, 'Vous aimez prendre une décision après une réflexion, si possible logique'),
(40, 5, 7, 'Vous aimez suivre attentivement un plan pour atteindre le meilleur résultat possible'),
(41, 1, 7, 'Vous aimez écouter les autres et les conseiller sur la façon de résoudre leurs problèmes'),
(42, 4, 7, 'Vous aimez trouver une solution concrète, réaliste et simple aux problèmes'),
(43, 2, 8, 'Vous aimez concevoir ou améliorer les méthodes de travail'),
(44, 1, 8, 'Vous aimez utiliser votre "bon sens"'),
(45, 5, 8, 'Vous aimez rendre service, venir en aide à d’autres personnes'),
(46, 3, 8, 'Vous aimez répondre aux objections de vos interlocuteurs pour mieux les convaincre'),
(47, 4, 8, 'Vous aimez montrer votre originalité'),
(48, 6, 8, 'Vous aimez travailler avec soin pour obtenir un résultat parfait'),
(49, 3, 9, 'Vous aimez ou aimeriez animer des activités collectives, associatives...'),
(50, 2, 9, 'Vous aimez ou aimeriez étudier la physique, la biologie, ou la technologie'),
(51, 5, 9, 'Vous aimez démonter un appareil pour le réparer vous-même'),
(52, 1, 9, 'Vous aimez discuter avec un commerçant pour obtenir des réductions de prix'),
(53, 4, 9, 'Vous aimez exprimer vos idées, vos points de vue ou vos émotions'),
(54, 6, 9, 'Vous aimez rédiger un résumé, une lettre, un compte-rendu'),
(55, 6, 10, 'Vous aimez faire face aux situations urgentes ou imprévues'),
(56, 4, 10, 'Vous aimez vous occuper de démarches administratives ou d’ordre juridique'),
(57, 5, 10, 'Vous aimez ou aimeriez faire des reportages, écrire des articles, etc...'),
(58, 3, 10, 'Vous aimez chercher à comprendre et à expliquer le pourquoi des choses et des êtres'),
(59, 1, 10, 'Vous aimez imaginer des solutions qui sortent de l’ordinaire'),
(60, 2, 10, 'Vous aimez ou aimeriez utiliser un objet que vous avez fabriqué vous-même'),
(61, 2, 11, 'Vous aimez apprendre aux autres ce que vous savez'),
(62, 5, 11, 'Vous aimez collectionner des choses : timbres, cartes postales, pierres, etc....'),
(63, 6, 11, 'Vous aimez passer une grande partie de votre temps sur des documents écrits'),
(64, 1, 11, 'Vous aimez ou aimeriez vendre des produits ou services'),
(65, 4, 11, 'Vous aimez vous servir d’un microscope ou autre appareil de mesure...'),
(66, 3, 11, 'Vous aimez ou aimeriez avoir des loisirs créatifs : peinture, musique...'),
(67, 4, 12, 'Vous aimez classer, ordonner des documents ou des objets'),
(68, 5, 12, 'Vous aimez conduire une discussion, un débat'),
(69, 6, 12, 'Vous aimez échanger des idées avec les autres'),
(70, 3, 12, 'Vous aimez que ce que vous faites débouche sur des résultats concrets'),
(71, 2, 12, 'Vous aimez ou aimeriez mettre au point et réaliser des expériences scientifiques'),
(72, 1, 12, 'Vous aimez étudier ou inventer plusieurs solutions pour répondre à un problème');

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `idSession` int(11) NOT NULL,
  `codeSession` char(12) DEFAULT NULL,
  `dateSession` date DEFAULT NULL,
  `libelleSession` varchar(30) DEFAULT NULL,
  `departement` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`idEleve`,`idSession`),
  ADD KEY `idSession` (`idSession`);

--
-- Index pour la table `categoriequestion`
--
ALTER TABLE `categoriequestion`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`idQuestionnaire`,`idGroupe`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Index pour la table `eleve`
--
ALTER TABLE `eleve`
  ADD PRIMARY KEY (`idEleve`);

--
-- Index pour la table `generer`
--
ALTER TABLE `generer`
  ADD PRIMARY KEY (`idProfesseur`,`idSession`,`idQuestionnaire`),
  ADD KEY `idSession` (`idSession`),
  ADD KEY `idQuestionnaire` (`idQuestionnaire`);

--
-- Index pour la table `groupequestions`
--
ALTER TABLE `groupequestions`
  ADD PRIMARY KEY (`idGroupe`),
  ADD KEY `idProfesseur` (`idProfesseur`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`idProfesseur`);

--
-- Index pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD PRIMARY KEY (`idQuestionnaire`),
  ADD KEY `idProfesseur` (`idProfesseur`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`),
  ADD KEY `idCategorie` (`idCategorie`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`idSession`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categoriequestion`
--
ALTER TABLE `categoriequestion`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `eleve`
--
ALTER TABLE `eleve`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `groupequestions`
--
ALTER TABLE `groupequestions`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `idProfesseur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  MODIFY `idQuestionnaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT pour la table `session`
--
ALTER TABLE `session`
  MODIFY `idSession` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`idEleve`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `session` (`idSession`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`),
  ADD CONSTRAINT `contenir_ibfk_2` FOREIGN KEY (`idGroupe`) REFERENCES `groupequestions` (`idGroupe`);

--
-- Contraintes pour la table `generer`
--
ALTER TABLE `generer`
  ADD CONSTRAINT `generer_ibfk_1` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProfesseur`),
  ADD CONSTRAINT `generer_ibfk_2` FOREIGN KEY (`idSession`) REFERENCES `session` (`idSession`),
  ADD CONSTRAINT `generer_ibfk_3` FOREIGN KEY (`idQuestionnaire`) REFERENCES `questionnaire` (`idQuestionnaire`);

--
-- Contraintes pour la table `groupequestions`
--
ALTER TABLE `groupequestions`
  ADD CONSTRAINT `groupequestions_ibfk_1` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProfesseur`);

--
-- Contraintes pour la table `questionnaire`
--
ALTER TABLE `questionnaire`
  ADD CONSTRAINT `questionnaire_ibfk_1` FOREIGN KEY (`idProfesseur`) REFERENCES `professeur` (`idProfesseur`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`idCategorie`) REFERENCES `categoriequestion` (`idCategorie`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`idGroupe`) REFERENCES `groupequestions` (`idGroupe`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
