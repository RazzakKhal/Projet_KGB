-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 27 mars 2022 à 15:49
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `kgb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(36) NOT NULL,
  `pass` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

CREATE TABLE `agent` (
  `CODE_AGENT` int(11) NOT NULL,
  `NOM` varchar(36) NOT NULL,
  `PRENOM` varchar(36) NOT NULL,
  `DATE_AGENT` date NOT NULL,
  `NATIONALITE` varchar(36) NOT NULL,
  `MISSION_AGENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `agent`
--

INSERT INTO `agent` (`CODE_AGENT`, `NOM`, `PRENOM`, `DATE_AGENT`, `NATIONALITE`, `MISSION_AGENT`) VALUES
(1, 'Pepy', 'Marvin', '1979-03-21', 'France', 2),
(2, 'Gabin', 'Jean', '1995-03-23', 'Espagne', 1),
(3, 'Delau', 'Victor', '2022-03-23', 'USA', 3);

-- --------------------------------------------------------

--
-- Structure de la table `cible`
--

CREATE TABLE `cible` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(36) NOT NULL,
  `PRENOM` varchar(36) NOT NULL,
  `DATE_CIBLE` date NOT NULL,
  `NOMCODE_CIBLE` varchar(36) NOT NULL,
  `NATIONALITE` varchar(36) NOT NULL,
  `MISSION_CIBLE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `cible`
--

INSERT INTO `cible` (`ID`, `NOM`, `PRENOM`, `DATE_CIBLE`, `NOMCODE_CIBLE`, `NATIONALITE`, `MISSION_CIBLE`) VALUES
(1, 'Southpark', 'Kenny', '1999-03-10', 'immortel', 'USA', 1),
(2, 'Laden', 'Ben', '1972-04-19', 'le terroriste', 'Afghanisthan', 2),
(3, 'Abidin', 'Kaya', '1983-03-17', 'la belle', 'Turquie', 3);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `NOM` varchar(36) NOT NULL,
  `PRENOM` varchar(36) NOT NULL,
  `DATE_CONTACT` date NOT NULL,
  `NOMCODE_CONTACT` varchar(36) NOT NULL,
  `NATIONALITE` varchar(36) NOT NULL,
  `MISSION_CONTACT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`ID`, `NOM`, `PRENOM`, `DATE_CONTACT`, `NOMCODE_CONTACT`, `NATIONALITE`, `MISSION_CONTACT`) VALUES
(1, 'Boulet', 'George', '1992-03-23', 'le cinglé', 'USA', 2),
(2, 'Palerme', 'Tanguy', '1994-03-02', 'le peureux', 'Espagne', 1),
(3, 'Pipeau', 'François', '1982-03-16', 'le truand', 'Espagne', 3);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `ID` int(11) NOT NULL,
  `TITRE_M` varchar(36) NOT NULL,
  `DESCRIPTION_M` varchar(255) NOT NULL,
  `NOMCODE_M` varchar(36) NOT NULL,
  `PAYS_M` varchar(36) NOT NULL,
  `TYPE_M` varchar(36) NOT NULL,
  `STATUT_M` varchar(36) NOT NULL,
  `DATEDEBUT_M` date NOT NULL,
  `DATEFIN_M` date DEFAULT NULL,
  `SPECIALITE_M` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`ID`, `TITRE_M`, `DESCRIPTION_M`, `NOMCODE_M`, `PAYS_M`, `TYPE_M`, `STATUT_M`, `DATEDEBUT_M`, `DATEFIN_M`, `SPECIALITE_M`) VALUES
(1, 'Tuer Kenny', 'Votre mission consistera à tuer Mr Kenny', 'killer', 'USA', 'Assassinat', 'en cours', '2022-03-01', '0000-00-00', 'Assassinat'),
(2, 'Surveiller Ben Laden', 'Votre mission consistera à surveiller Ben Laden', 'look', 'Afghanisthan', 'Surveillance', 'en cours', '2022-03-12', '0000-00-00', 'Surveillance'),
(3, 'Infiltration du palace', 'Votre mission consistera à Infiltrer le palace de Mr Kaya', 'gogo', 'Turquie', 'Infiltration', 'en cours', '2022-03-03', '0000-00-00', 'Infiltration');

-- --------------------------------------------------------

--
-- Structure de la table `planque`
--

CREATE TABLE `planque` (
  `CODE_PLANQUE` int(11) NOT NULL,
  `ADRESSE` varchar(36) NOT NULL,
  `PAYS` varchar(36) NOT NULL,
  `TYPE_PLANQUE` varchar(36) NOT NULL,
  `MISSION_PLANQUE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `planque`
--

INSERT INTO `planque` (`CODE_PLANQUE`, `ADRESSE`, `PAYS`, `TYPE_PLANQUE`, `MISSION_PLANQUE`) VALUES
(1, '14 chemin dici', 'USA', 'Eglise', 1),
(2, '11 chemin dici', 'Afghanisthan', 'Cabane', 2),
(3, '9 chemin dici', 'Turquie', 'Maison', 3);

-- --------------------------------------------------------

--
-- Structure de la table `speagent`
--

CREATE TABLE `speagent` (
  `AGENT_ID` int(11) NOT NULL,
  `SPECIALITE_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `speagent`
--

INSERT INTO `speagent` (`AGENT_ID`, `SPECIALITE_ID`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 3),
(3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE `specialite` (
  `ID` int(11) NOT NULL,
  `TYPE` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`ID`, `TYPE`) VALUES
(1, 'assassinat'),
(2, 'surveillance'),
(3, 'infiltration');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`CODE_AGENT`),
  ADD KEY `MISSION` (`MISSION_AGENT`);

--
-- Index pour la table `cible`
--
ALTER TABLE `cible`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NOMCODE` (`NOMCODE_CIBLE`),
  ADD KEY `MISSION` (`MISSION_CIBLE`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NOMCODE` (`NOMCODE_CONTACT`),
  ADD KEY `MISSION` (`MISSION_CONTACT`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `NOMCODE` (`NOMCODE_M`),
  ADD UNIQUE KEY `NOMCODE_M` (`NOMCODE_M`);

--
-- Index pour la table `planque`
--
ALTER TABLE `planque`
  ADD PRIMARY KEY (`CODE_PLANQUE`),
  ADD KEY `MISSION` (`MISSION_PLANQUE`);

--
-- Index pour la table `speagent`
--
ALTER TABLE `speagent`
  ADD PRIMARY KEY (`AGENT_ID`,`SPECIALITE_ID`),
  ADD KEY `SPECIALITE_ID` (`SPECIALITE_ID`);

--
-- Index pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cible`
--
ALTER TABLE `cible`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `planque`
--
ALTER TABLE `planque`
  MODIFY `CODE_PLANQUE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `specialite`
--
ALTER TABLE `specialite`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`MISSION_AGENT`) REFERENCES `mission` (`ID`);

--
-- Contraintes pour la table `cible`
--
ALTER TABLE `cible`
  ADD CONSTRAINT `cible_ibfk_1` FOREIGN KEY (`MISSION_CIBLE`) REFERENCES `mission` (`ID`);

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`MISSION_CONTACT`) REFERENCES `mission` (`ID`);

--
-- Contraintes pour la table `planque`
--
ALTER TABLE `planque`
  ADD CONSTRAINT `planque_ibfk_1` FOREIGN KEY (`MISSION_PLANQUE`) REFERENCES `mission` (`ID`);

--
-- Contraintes pour la table `speagent`
--
ALTER TABLE `speagent`
  ADD CONSTRAINT `speagent_ibfk_1` FOREIGN KEY (`AGENT_ID`) REFERENCES `agent` (`CODE_AGENT`),
  ADD CONSTRAINT `speagent_ibfk_2` FOREIGN KEY (`SPECIALITE_ID`) REFERENCES `specialite` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
