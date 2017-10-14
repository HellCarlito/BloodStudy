-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 13 Octobre 2017 à 16:32
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blood`
--

-- --------------------------------------------------------

--
-- Structure de la table `analyse`
--

CREATE TABLE `analyse` (
  `idAnalyse` int(11) NOT NULL,
  `GR` varchar(25) NOT NULL,
  `GB` varchar(25) DEFAULT NULL,
  `Plaquettes` varchar(25) DEFAULT NULL,
  `dateSaisie` date NOT NULL,
  `visitName` enum('VINC','V1','V2') DEFAULT NULL,
  `visiteDate` date NOT NULL,
  `idPatient` varchar(25) NOT NULL,
  `semaineDateSaisie` int(11) DEFAULT NULL,
  `moisDateSaisie` int(11) NOT NULL,
  `anneeDateSaisie` int(11) DEFAULT NULL,
  `resGR` enum('En attente de traitement','Faible','Bon','Important') DEFAULT NULL,
  `resGB` enum('En attente de traitement','Faible','Bon','Important') DEFAULT NULL,
  `resPlaquettes` enum('En attente de traitement','Faible','Bon','Important') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `idPatient` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtil` varchar(25) NOT NULL,
  `mdpUtil` varchar(25) NOT NULL,
  `niveauAcces` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtil`, `mdpUtil`, `niveauAcces`) VALUES
('clr', 'azerty', 1),
('cs', 'azerty', 2),
('lph', 'azerty', 3);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `analyse`
--
ALTER TABLE `analyse`
  ADD PRIMARY KEY (`idAnalyse`),
  ADD KEY `FK_Analyse_idPatient` (`idPatient`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`idPatient`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtil`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `analyse`
--
ALTER TABLE `analyse`
  MODIFY `idAnalyse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `analyse`
--
ALTER TABLE `analyse`
  ADD CONSTRAINT `FK_Analyse_idPatient` FOREIGN KEY (`idPatient`) REFERENCES `patient` (`idPatient`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
