-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 01 Novembre 2016 à 15:20
-- Version du serveur :  10.1.9-MariaDB
-- Version de PHP :  5.6.15

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
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `idAdresse` int(11) NOT NULL,
  `Ville` varchar(20) DEFAULT NULL,
  `Pays` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`idAdresse`, `Ville`, `Pays`) VALUES
(1, 'Montpellier', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `code`
--

CREATE TABLE `code` (
  `code` varchar(10) NOT NULL,
  `idProf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `code`
--

INSERT INTO `code` (`code`, `idProf`) VALUES
('testcode', 2);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `idEcole` int(11) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Adresse` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ecole`
--

INSERT INTO `ecole` (`idEcole`, `Nom`, `Adresse`) VALUES
(1, 'Polytech', 1);

-- --------------------------------------------------------

--
-- Structure de la table `elève`
--

CREATE TABLE `elève` (
  `idEleve` int(11) NOT NULL,
  `idEcole` int(11) DEFAULT NULL,
  `pseudo` varchar(11) NOT NULL,
  `code` varchar(10) DEFAULT NULL,
  `resultat` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `pseudo` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `motdepasse` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `personne`
--

INSERT INTO `personne` (`pseudo`, `nom`, `prenom`, `email`, `motdepasse`) VALUES
('hugo', 'hugo', 'hugo', '', 'f1f58e8c06b2a61ce13e0c0aa9473a72'),
('hy', 'hy', 'hy', '', '035ed2311b96d2a65ec6a6fe71046c14'),
('profTest', 'prof', 'test', 'proftest@test.fr', 'f1f58e8c06b2a61ce13e0c0aa9473a72');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `idProf` int(11) NOT NULL,
  `idEcole` int(11) DEFAULT NULL,
  `pseudo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professeur`
--

INSERT INTO `professeur` (`idProf`, `idEcole`, `pseudo`) VALUES
(2, 1, 'profTest');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`idAdresse`);

--
-- Index pour la table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code`),
  ADD UNIQUE KEY `idProf` (`idProf`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`idEcole`),
  ADD UNIQUE KEY `Adresse` (`Adresse`);

--
-- Index pour la table `elève`
--
ALTER TABLE `elève`
  ADD PRIMARY KEY (`idEleve`),
  ADD UNIQUE KEY `idEcole` (`idEcole`,`pseudo`,`code`),
  ADD KEY `pseudo` (`pseudo`),
  ADD KEY `code` (`code`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`pseudo`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`idProf`),
  ADD UNIQUE KEY `pseudo` (`pseudo`,`idEcole`),
  ADD KEY `idEcole` (`idEcole`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `idAdresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ecole`
--
ALTER TABLE `ecole`
  MODIFY `idEcole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `elève`
--
ALTER TABLE `elève`
  MODIFY `idEleve` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `professeur`
--
ALTER TABLE `professeur`
  MODIFY `idProf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `code_ibfk_1` FOREIGN KEY (`idProf`) REFERENCES `professeur` (`idProf`);

--
-- Contraintes pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD CONSTRAINT `ecole_ibfk_1` FOREIGN KEY (`Adresse`) REFERENCES `adresse` (`idAdresse`);

--
-- Contraintes pour la table `elève`
--
ALTER TABLE `elève`
  ADD CONSTRAINT `elève_ibfk_1` FOREIGN KEY (`idEcole`) REFERENCES `ecole` (`idEcole`),
  ADD CONSTRAINT `elève_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `personne` (`pseudo`),
  ADD CONSTRAINT `elève_ibfk_3` FOREIGN KEY (`code`) REFERENCES `code` (`code`);

--
-- Contraintes pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD CONSTRAINT `professeur_ibfk_1` FOREIGN KEY (`idEcole`) REFERENCES `ecole` (`idEcole`),
  ADD CONSTRAINT `professeur_ibfk_2` FOREIGN KEY (`pseudo`) REFERENCES `personne` (`pseudo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
