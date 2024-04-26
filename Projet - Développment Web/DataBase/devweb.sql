-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 avr. 2024 à 16:18
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `devweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `campus`
--

CREATE TABLE `campus` (
  `ID_Campus` bigint(20) NOT NULL,
  `ID_Ville` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campus`
--

INSERT INTO `campus` (`ID_Campus`, `ID_Ville`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Entreprise` bigint(20) NOT NULL,
  `Nom_Entreprise` varchar(50) NOT NULL,
  `ID_Ville` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Entreprise`, `Nom_Entreprise`, `ID_Ville`) VALUES
(1, 'Entreprise 1', 1),
(2, 'Entreprise 2', 2),
(3, 'Entreprise 3', 3),
(4, 'Entreprise 4', 4),
(5, 'Entreprise 5', 5);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_Etudiant` bigint(20) NOT NULL,
  `ID_Promo` bigint(20) NOT NULL,
  `ID_User` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `ID_Promo`, `ID_User`) VALUES
(1, 1, 5),
(2, 2, 6),
(3, 3, 7),
(4, 4, 8),
(5, 5, 9),
(6, 1, 10),
(7, 2, 11),
(8, 3, 12),
(9, 4, 13),
(10, 5, 14),
(11, 1, 15),
(12, 2, 16),
(13, 3, 17),
(14, 4, 18),
(15, 5, 19),
(16, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `ID_Offre` bigint(20) NOT NULL,
  `Nom_Offre` varchar(50) NOT NULL,
  `Description_Offre` varchar(100) DEFAULT NULL,
  `Domaine_Offre` varchar(50) DEFAULT NULL,
  `Competences_Offre` varchar(100) DEFAULT NULL,
  `Niveau_Offre` varchar(50) DEFAULT NULL,
  `Postulation_Offre` int(11) DEFAULT NULL,
  `Durée_Offre` int(11) DEFAULT NULL,
  `Remuneration_Offre` int(11) DEFAULT NULL,
  `Date_Offre` date DEFAULT NULL,
  `Place_Offre` int(11) DEFAULT NULL,
  `ID_Entreprise` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`ID_Offre`, `Nom_Offre`, `Description_Offre`, `Domaine_Offre`, `Competences_Offre`, `Niveau_Offre`, `Postulation_Offre`, `Durée_Offre`, `Remuneration_Offre`, `Date_Offre`, `Place_Offre`, `ID_Entreprise`) VALUES
(1, 'Stage Développeur Web', 'Stage de développement web', 'Informatique', 'HTML, CSS, JavaScript', 'Bac+2', 5, 6, 1000, '2024-05-01', 5, 1),
(2, 'CDI Ingénieur en Électronique', 'Ingénieur électronique pour conception de circuits', 'Électronique', 'Connaissances en électronique analogique et numérique', 'Bac+5', 10, NULL, 3000, '2024-04-30', 5, 2),
(3, 'CDD Assistant Administratif', 'Soutien administratif et organisationnel', 'Administration', 'Maîtrise des outils bureautiques', 'Bac', 8, 12, 2000, '2024-05-02', 3, 3),
(4, 'Stage Marketing Digital', 'Stage de marketing numérique', 'Marketing', 'Connaissances en marketing digital', 'Bac+3', 7, 4, 1200, '2024-05-05', 2, 4),
(5, 'CDI Analyste financier', 'Analyse financière et gestion des risques', 'Finance', 'Connaissances en analyse financière', 'Bac+4', 12, NULL, 3500, '2024-05-10', 8, 5);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `ID_Pays` bigint(20) NOT NULL,
  `Nom_Pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`ID_Pays`, `Nom_Pays`) VALUES
(1, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID_Pilote` bigint(20) NOT NULL,
  `ID_Promo` bigint(20) NOT NULL,
  `ID_Etudiant` bigint(20) NOT NULL,
  `ID_Offre` bigint(20) NOT NULL,
  `ID_User` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`ID_Pilote`, `ID_Promo`, `ID_Etudiant`, `ID_Offre`, `ID_User`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2),
(3, 3, 3, 3, 3),
(4, 4, 4, 4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

CREATE TABLE `postuler` (
  `ID_Etudiant` bigint(20) NOT NULL,
  `ID_Offre` bigint(20) NOT NULL,
  `Motivation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `ID_Promo` bigint(20) NOT NULL,
  `Nom_Promo` varchar(50) DEFAULT NULL,
  `Domaine_Promo` varchar(50) DEFAULT NULL,
  `ID_Campus` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`ID_Promo`, `Nom_Promo`, `Domaine_Promo`, `ID_Campus`) VALUES
(1, 'Promotion 2024', 'Informatique', 1),
(2, 'Promotion 2023', 'Ingénierie', 2),
(3, 'Promotion 2022', 'Gestion', 3),
(4, 'Promotion 2021', 'Marketing', 4),
(5, 'Promotion 2020', 'Finance', 5);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `ID_Region` bigint(20) NOT NULL,
  `Nom_Region` varchar(50) DEFAULT NULL,
  `ID_Pays` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`ID_Region`, `Nom_Region`, `ID_Pays`) VALUES
(1, 'Île-de-France', 1),
(2, 'Provence-Alpes-Côte d\'Azur', 1),
(3, 'Auvergne-Rhône-Alpes', 1),
(4, 'Occitanie', 1),
(5, 'Nouvelle-Aquitaine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `ID_User` bigint(20) NOT NULL,
  `Nom_User` varchar(50) DEFAULT NULL,
  `Prenom_User` varchar(50) DEFAULT NULL,
  `Password_User` varchar(50) DEFAULT NULL,
  `Email_User` varchar(50) DEFAULT NULL,
  `ID_Ville` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`ID_User`, `Nom_User`, `Prenom_User`, `Password_User`, `Email_User`, `ID_Ville`) VALUES
(1, 'Mazou', 'Marine', 'mdp1', 'marine.mazou@example.com', 1),
(2, 'Laulhe', 'Estelle', 'mdp2', 'laulhe.estelle@example.com', 2),
(3, 'Clausse', 'Pauline', 'mdp3', 'clausse.pauline@example.com', 3),
(4, 'Rosas', 'Elisa', 'mdp4', 'rosas.elisa@example.com', 4),
(5, 'Moreau', 'Luc', 'qwerty', 'luc.moreau@example.com', 5),
(6, 'Lefebvre', 'Emma', 'azerty', 'emma.lefebvre@example.com', 1),
(7, 'Garcia', 'Thomas', 'motdepasse', 'thomas.garcia@example.com', 2),
(8, 'Roux', 'Camille', 'secure', 'camille.roux@example.com', 3),
(9, 'Fournier', 'Louis', 'password1', 'louis.fournier@example.com', 4),
(10, 'Girard', 'Manon', 'mdp123', 'manon.girard@example.com', 5),
(11, 'Bonnet', 'Alexandre', 'letmein', 'alexandre.bonnet@example.com', 1),
(12, 'Caron', 'Chloé', 'test123', 'chloe.caron@example.com', 2),
(13, 'Dumas', 'Mathieu', 'abcdef', 'mathieu.dumas@example.com', 3),
(14, 'Leroy', 'Laura', 'abcdefg', 'laura.leroy@example.com', 4),
(15, 'Gauthier', 'Antoine', '123abc', 'antoine.gauthier@example.com', 5),
(16, 'Martinez', 'Charlotte', 'abc123', 'charlotte.martinez@example.com', 1),
(17, 'Guerin', 'Kevin', '123456abc', 'kevin.guerin@example.com', 2),
(18, 'Garnier', 'Elise', 'abcdef123', 'elise.garnier@example.com', 3),
(19, 'Chevalier', 'Maxime', 'qwerty123', 'maxime.chevalier@example.com', 4),
(20, 'Lopez', 'Margot', 'password1234', 'margot.lopez@example.com', 5);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `ID_Ville` bigint(20) NOT NULL,
  `Nom_Ville` varchar(50) DEFAULT NULL,
  `ID_Region` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`ID_Ville`, `Nom_Ville`, `ID_Region`) VALUES
(1, 'Paris', 1),
(2, 'Marseille', 2),
(3, 'Lyon', 3),
(4, 'Toulouse', 4),
(5, 'Bordeaux', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`ID_Campus`),
  ADD KEY `ID_Ville` (`ID_Ville`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`ID_Entreprise`),
  ADD KEY `ID_Ville` (`ID_Ville`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID_Etudiant`),
  ADD UNIQUE KEY `ID_User` (`ID_User`),
  ADD KEY `ID_Promo` (`ID_Promo`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`ID_Offre`),
  ADD KEY `ID_Entreprise` (`ID_Entreprise`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`ID_Pays`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID_Pilote`),
  ADD UNIQUE KEY `ID_User` (`ID_User`),
  ADD KEY `ID_Promo` (`ID_Promo`),
  ADD KEY `ID_Etudiant` (`ID_Etudiant`),
  ADD KEY `ID_Offre` (`ID_Offre`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`ID_Etudiant`,`ID_Offre`),
  ADD KEY `ID_Offre` (`ID_Offre`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ID_Promo`),
  ADD KEY `ID_Campus` (`ID_Campus`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID_Region`),
  ADD KEY `ID_Pays` (`ID_Pays`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `ID_Ville` (`ID_Ville`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`ID_Ville`),
  ADD KEY `ID_Region` (`ID_Region`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `campus_ibfk_1` FOREIGN KEY (`ID_Ville`) REFERENCES `ville` (`ID_Ville`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`ID_Ville`) REFERENCES `ville` (`ID_Ville`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`ID_Promo`) REFERENCES `promotion` (`ID_Promo`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`ID_User`) REFERENCES `utilisateur` (`ID_User`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`ID_Entreprise`) REFERENCES `entreprise` (`ID_Entreprise`);

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `pilote_ibfk_1` FOREIGN KEY (`ID_Promo`) REFERENCES `promotion` (`ID_Promo`),
  ADD CONSTRAINT `pilote_ibfk_2` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`),
  ADD CONSTRAINT `pilote_ibfk_3` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`),
  ADD CONSTRAINT `pilote_ibfk_4` FOREIGN KEY (`ID_User`) REFERENCES `utilisateur` (`ID_User`);

--
-- Contraintes pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `postuler_ibfk_1` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`),
  ADD CONSTRAINT `postuler_ibfk_2` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`ID_Campus`) REFERENCES `campus` (`ID_Campus`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`ID_Pays`) REFERENCES `pays` (`ID_Pays`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`ID_Ville`) REFERENCES `ville` (`ID_Ville`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`ID_Region`) REFERENCES `region` (`ID_Region`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
