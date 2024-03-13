-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 13 mars 2024 à 14:51
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
-- Base de données : `db_projetweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_Admin` int(11) NOT NULL,
  `ID_Pers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_Admin`, `ID_Pers`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `campus`
--

CREATE TABLE `campus` (
  `ID_Campus` int(11) NOT NULL,
  `Nom_Campus` varchar(50) DEFAULT NULL,
  `Type_Campus` varchar(50) DEFAULT NULL,
  `ID_Ville` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campus`
--

INSERT INTO `campus` (`ID_Campus`, `Nom_Campus`, `Type_Campus`, `ID_Ville`) VALUES
(1, 'University of California', 'University', 1),
(2, 'University of Toronto', 'University', 2),
(3, 'Sorbonne University', 'University', 3),
(4, 'Technical University of Munich', 'University', 4),
(5, 'Peking University', 'University', 5),
(6, 'Complutense University of Madrid', 'University', 6),
(7, 'University of Mumbai', 'University', 7),
(8, 'University of Tokyo', 'University', 8),
(9, 'University of Sydney', 'University', 9),
(10, 'University of São Paulo', 'University', 10);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Ent` int(11) NOT NULL,
  `Nom_Ent` varchar(50) DEFAULT NULL,
  `Stagiaire_Ent` int(11) DEFAULT NULL,
  `Moyenne_Ent` varchar(50) DEFAULT NULL,
  `Secteur_Ent` varchar(50) DEFAULT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Ent`, `Nom_Ent`, `Stagiaire_Ent`, `Moyenne_Ent`, `Secteur_Ent`, `ID_Pilote`, `ID_Admin`) VALUES
(1, 'ABC Corporation', 50, 'A', 'Technology', 1, 1),
(2, 'XYZ Ltd', 30, 'B', 'Finance', 2, 2),
(3, 'LMN Inc', 20, 'C', 'Healthcare', 3, 3),
(4, 'PQR Enterprises', 40, 'A-', 'Automotive', 4, 4),
(5, 'UVW Corporation', 60, 'B+', 'Retail', 5, 5),
(6, 'RST Ltd', 25, 'C+', 'Manufacturing', 6, 6),
(7, 'EFG Inc', 35, 'B-', 'Consulting', 7, 7),
(8, 'HIJ Enterprises', 45, 'A+', 'Hospitality', 8, 8),
(9, 'MNO Corporation', 55, 'C-', 'Education', 9, 9),
(10, 'STU Ltd', 15, 'D', 'Construction', 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_Etudiant` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `ID_Promo` int(11) NOT NULL,
  `ID_Pers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `ID_Admin`, `ID_Pilote`, `ID_Promo`, `ID_Pers`) VALUES
(1, 1, 1, 1, 1),
(2, 2, 2, 2, 2),
(3, 3, 3, 3, 3),
(4, 4, 4, 4, 4),
(5, 5, 5, 5, 5),
(6, 6, 6, 6, 6),
(7, 7, 7, 7, 7),
(8, 8, 8, 8, 8),
(9, 9, 9, 9, 9),
(10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `evaluer`
--

CREATE TABLE `evaluer` (
  `ID_Ent` int(11) NOT NULL,
  `ID_Pers` int(11) NOT NULL,
  `Evaluation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evaluer`
--

INSERT INTO `evaluer` (`ID_Ent`, `ID_Pers`, `Evaluation`) VALUES
(1, 1, 1),
(2, 2, 0),
(3, 3, 1),
(4, 4, 0),
(5, 5, 1),
(6, 6, 0),
(7, 7, 1),
(8, 8, 0),
(9, 9, 1),
(10, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `noter`
--

CREATE TABLE `noter` (
  `ID_Offre` int(11) NOT NULL,
  `ID_Etudiant` int(11) NOT NULL,
  `Notes` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `noter`
--

INSERT INTO `noter` (`ID_Offre`, `ID_Etudiant`, `Notes`) VALUES
(1, 1, 4.50),
(2, 2, 4.20),
(3, 3, 4.00),
(4, 4, 4.70),
(5, 5, 4.10),
(6, 6, 4.30),
(7, 7, 4.90),
(8, 8, 4.60),
(9, 9, 3.80),
(10, 10, 3.50);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `ID_Offre` int(11) NOT NULL,
  `Titre_Offre` varchar(50) DEFAULT NULL,
  `Niveau_Offre` varchar(50) DEFAULT NULL,
  `Nb_Postulation` int(11) DEFAULT NULL,
  `Nb_Place` int(11) DEFAULT NULL,
  `Duree_Offre` int(11) DEFAULT NULL,
  `Date_Offre` date DEFAULT NULL,
  `Remuneration_Offre` int(11) DEFAULT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `ID_Ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`ID_Offre`, `Titre_Offre`, `Niveau_Offre`, `Nb_Postulation`, `Nb_Place`, `Duree_Offre`, `Date_Offre`, `Remuneration_Offre`, `ID_Pilote`, `ID_Admin`, `ID_Ent`) VALUES
(1, 'Software Engineer', 'Entry', 100, 5, 6, '2024-03-12', 60000, 1, 1, 1),
(2, 'Financial Analyst', 'Mid', 80, 3, 6, '2024-03-12', 70000, 2, 2, 2),
(3, 'Nurse', 'Entry', 50, 2, 6, '2024-03-12', 50000, 3, 3, 3),
(4, 'Mechanical Engineer', 'Senior', 70, 4, 6, '2024-03-12', 80000, 4, 4, 4),
(5, 'Sales Associate', 'Entry', 90, 6, 6, '2024-03-12', 45000, 5, 5, 5),
(6, 'Production Supervisor', 'Mid', 60, 3, 6, '2024-03-12', 65000, 6, 6, 6),
(7, 'Management Consultant', 'Senior', 40, 2, 6, '2024-03-12', 90000, 7, 7, 7),
(8, 'Hotel Manager', 'Mid', 30, 2, 6, '2024-03-12', 75000, 8, 8, 8),
(9, 'Teacher', 'Entry', 20, 1, 6, '2024-03-12', 40000, 9, 9, 9),
(10, 'Construction Worker', 'Entry', 10, 2, 6, '2024-03-12', 35000, 10, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `ID_Pays` int(11) NOT NULL,
  `Nom_Pays` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`ID_Pays`, `Nom_Pays`) VALUES
(1, 'United States'),
(2, 'Canada'),
(3, 'France'),
(4, 'Germany'),
(5, 'China'),
(6, 'Spain'),
(7, 'India'),
(8, 'Japan'),
(9, 'Australia'),
(10, 'Brazil');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `ID_Pers` int(11) NOT NULL,
  `Nom_Pers` varchar(50) DEFAULT NULL,
  `Prenom_Pers` varchar(50) DEFAULT NULL,
  `Mdp_Pers` varchar(50) DEFAULT NULL,
  `Mail_Pers` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`ID_Pers`, `Nom_Pers`, `Prenom_Pers`, `Mdp_Pers`, `Mail_Pers`) VALUES
(1, 'Mazou', 'Marine', 'password', 'mazou.marine@example.com'),
(2, 'Rosas', 'Elisa', 'secret', 'rosas.elisa@example.com'),
(3, 'Laulhe', 'Estelle', '123456', 'laulhe.estelle@example.com'),
(4, 'Clausse', 'Pauline', 'pass123', 'clausse.pauline@example.com'),
(5, 'Kim', 'Seong', 'kims123', 'seong.kim@example.com'),
(6, 'Müller', 'Hans', 'pass1234', 'hans.muller@example.com'),
(7, 'Wang', 'Li', '123abc', 'li.wang@example.com'),
(8, 'Martinez', 'Ana', 'abc123', 'ana.martinez@example.com'),
(9, 'Kumar', 'Raj', 'raj123', 'raj.kumar@example.com'),
(10, 'Chan', 'Wei', 'password123', 'wei.chan@example.com');

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID_Pilote` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `ID_Pers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`ID_Pilote`, `ID_Admin`, `ID_Pers`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10);

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

CREATE TABLE `postuler` (
  `ID_Offre` int(11) NOT NULL,
  `ID_Etudiant` int(11) NOT NULL,
  `CV` varchar(50) DEFAULT NULL,
  `Lettre_Motivation` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postuler`
--

INSERT INTO `postuler` (`ID_Offre`, `ID_Etudiant`, `CV`, `Lettre_Motivation`) VALUES
(1, 1, 'cv_john_smith.pdf', 'lettre_motivation_john_smith.pdf'),
(2, 2, 'cv_emily_johnson.pdf', 'lettre_motivation_emily_johnson.pdf'),
(3, 3, 'cv_david_lee.pdf', 'lettre_motivation_david_lee.pdf'),
(4, 4, 'cv_maria_garcia.pdf', 'lettre_motivation_maria_garcia.pdf'),
(5, 5, 'cv_seong_kim.pdf', 'lettre_motivation_seong_kim.pdf'),
(6, 6, 'cv_hans_muller.pdf', 'lettre_motivation_hans_muller.pdf'),
(7, 7, 'cv_li_wang.pdf', 'lettre_motivation_li_wang.pdf'),
(8, 8, 'cv_ana_martinez.pdf', 'lettre_motivation_ana_martinez.pdf'),
(9, 9, 'cv_raj_kumar.pdf', 'lettre_motivation_raj_kumar.pdf'),
(10, 10, 'cv_wei_chan.pdf', 'lettre_motivation_wei_chan.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `promo`
--

CREATE TABLE `promo` (
  `ID_Promo` int(11) NOT NULL,
  `Type_Promo` varchar(50) DEFAULT NULL,
  `Nom_Promo` varchar(50) DEFAULT NULL,
  `Annee_Promo` int(11) DEFAULT NULL,
  `ID_Campus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promo`
--

INSERT INTO `promo` (`ID_Promo`, `Type_Promo`, `Nom_Promo`, `Annee_Promo`, `ID_Campus`) VALUES
(1, 'Bachelor', 'Computer Science', 2024, 1),
(2, 'Bachelor', 'Business Administration', 2024, 2),
(3, 'Master', 'French Literature', 2024, 3),
(4, 'Master', 'Mechanical Engineering', 2024, 4),
(5, 'Bachelor', 'Economics', 2024, 5),
(6, 'Master', 'Spanish Language and Literature', 2024, 6),
(7, 'Bachelor', 'Computer Engineering', 2024, 7),
(8, 'Master', 'Robotics', 2024, 8),
(9, 'Bachelor', 'Civil Engineering', 2024, 9),
(10, 'Master', 'Environmental Science', 2024, 10);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `ID_Region` int(11) NOT NULL,
  `Nom_Region` varchar(50) DEFAULT NULL,
  `ID_Pays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`ID_Region`, `Nom_Region`, `ID_Pays`) VALUES
(1, 'California', 1),
(2, 'Ontario', 2),
(3, 'Île-de-France', 3),
(4, 'Bavaria', 4),
(5, 'Beijing', 5),
(6, 'Madrid', 6),
(7, 'Maharashtra', 7),
(8, 'Tokyo', 8),
(9, 'New South Wales', 9),
(10, 'São Paulo', 10);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

CREATE TABLE `site` (
  `ID_Site` int(11) NOT NULL,
  `Nom_Site` varchar(50) DEFAULT NULL,
  `ID_Ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`ID_Site`, `Nom_Site`, `ID_Ent`) VALUES
(1, 'Headquarters', 1),
(2, 'Branch Office 1', 2),
(3, 'Branch Office 2', 3),
(4, 'Plant 1', 4),
(5, 'Retail Store 1', 5),
(6, 'Factory 1', 6),
(7, 'Consulting Office 1', 7),
(8, 'Hotel 1', 8),
(9, 'School 1', 9),
(10, 'Construction Site 1', 10);

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `ID_Ville` int(11) NOT NULL,
  `Nom_Ville` varchar(50) DEFAULT NULL,
  `ID_Region` int(11) NOT NULL,
  `ID_Site` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`ID_Ville`, `Nom_Ville`, `ID_Region`, `ID_Site`) VALUES
(1, 'Los Angeles', 1, 1),
(2, 'Toronto', 2, 2),
(3, 'Paris', 3, 3),
(4, 'Munich', 4, 4),
(5, 'Beijing', 5, 5),
(6, 'Madrid', 6, 6),
(7, 'Mumbai', 7, 7),
(8, 'Tokyo', 8, 8),
(9, 'Sydney', 9, 9),
(10, 'São Paulo', 10, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`ID_Admin`),
  ADD UNIQUE KEY `ID_Pers` (`ID_Pers`);

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
  ADD PRIMARY KEY (`ID_Ent`),
  ADD KEY `ID_Pilote` (`ID_Pilote`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`ID_Etudiant`),
  ADD UNIQUE KEY `ID_Pers` (`ID_Pers`),
  ADD KEY `ID_Admin` (`ID_Admin`),
  ADD KEY `ID_Pilote` (`ID_Pilote`),
  ADD KEY `ID_Promo` (`ID_Promo`);

--
-- Index pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD PRIMARY KEY (`ID_Ent`,`ID_Pers`),
  ADD KEY `ID_Pers` (`ID_Pers`);

--
-- Index pour la table `noter`
--
ALTER TABLE `noter`
  ADD PRIMARY KEY (`ID_Offre`,`ID_Etudiant`),
  ADD KEY `ID_Etudiant` (`ID_Etudiant`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`ID_Offre`),
  ADD KEY `ID_Pilote` (`ID_Pilote`),
  ADD KEY `ID_Admin` (`ID_Admin`),
  ADD KEY `ID_Ent` (`ID_Ent`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`ID_Pays`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`ID_Pers`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID_Pilote`),
  ADD UNIQUE KEY `ID_Pers` (`ID_Pers`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`ID_Offre`,`ID_Etudiant`),
  ADD KEY `ID_Etudiant` (`ID_Etudiant`);

--
-- Index pour la table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_Promo`),
  ADD KEY `ID_Campus` (`ID_Campus`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`ID_Region`),
  ADD KEY `ID_Pays` (`ID_Pays`);

--
-- Index pour la table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`ID_Site`),
  ADD KEY `ID_Ent` (`ID_Ent`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`ID_Ville`),
  ADD KEY `ID_Region` (`ID_Region`),
  ADD KEY `ID_Site` (`ID_Site`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `administrateur_ibfk_1` FOREIGN KEY (`ID_Pers`) REFERENCES `personne` (`ID_Pers`);

--
-- Contraintes pour la table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `campus_ibfk_1` FOREIGN KEY (`ID_Ville`) REFERENCES `ville` (`ID_Ville`);

--
-- Contraintes pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD CONSTRAINT `entreprise_ibfk_1` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`),
  ADD CONSTRAINT `entreprise_ibfk_2` FOREIGN KEY (`ID_Admin`) REFERENCES `administrateur` (`ID_Admin`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `administrateur` (`ID_Admin`),
  ADD CONSTRAINT `etudiant_ibfk_2` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`),
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`ID_Promo`) REFERENCES `promo` (`ID_Promo`),
  ADD CONSTRAINT `etudiant_ibfk_4` FOREIGN KEY (`ID_Pers`) REFERENCES `personne` (`ID_Pers`);

--
-- Contraintes pour la table `evaluer`
--
ALTER TABLE `evaluer`
  ADD CONSTRAINT `evaluer_ibfk_1` FOREIGN KEY (`ID_Ent`) REFERENCES `entreprise` (`ID_Ent`),
  ADD CONSTRAINT `evaluer_ibfk_2` FOREIGN KEY (`ID_Pers`) REFERENCES `personne` (`ID_Pers`);

--
-- Contraintes pour la table `noter`
--
ALTER TABLE `noter`
  ADD CONSTRAINT `noter_ibfk_1` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`),
  ADD CONSTRAINT `noter_ibfk_2` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`);

--
-- Contraintes pour la table `offre`
--
ALTER TABLE `offre`
  ADD CONSTRAINT `offre_ibfk_1` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`),
  ADD CONSTRAINT `offre_ibfk_2` FOREIGN KEY (`ID_Admin`) REFERENCES `administrateur` (`ID_Admin`),
  ADD CONSTRAINT `offre_ibfk_3` FOREIGN KEY (`ID_Ent`) REFERENCES `entreprise` (`ID_Ent`);

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `pilote_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `administrateur` (`ID_Admin`),
  ADD CONSTRAINT `pilote_ibfk_2` FOREIGN KEY (`ID_Pers`) REFERENCES `personne` (`ID_Pers`);

--
-- Contraintes pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD CONSTRAINT `postuler_ibfk_1` FOREIGN KEY (`ID_Offre`) REFERENCES `offre` (`ID_Offre`),
  ADD CONSTRAINT `postuler_ibfk_2` FOREIGN KEY (`ID_Etudiant`) REFERENCES `etudiant` (`ID_Etudiant`);

--
-- Contraintes pour la table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`ID_Campus`) REFERENCES `campus` (`ID_Campus`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`ID_Pays`) REFERENCES `pays` (`ID_Pays`);

--
-- Contraintes pour la table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `site_ibfk_1` FOREIGN KEY (`ID_Ent`) REFERENCES `entreprise` (`ID_Ent`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `ville_ibfk_1` FOREIGN KEY (`ID_Region`) REFERENCES `region` (`ID_Region`),
  ADD CONSTRAINT `ville_ibfk_2` FOREIGN KEY (`ID_Site`) REFERENCES `site` (`ID_Site`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
