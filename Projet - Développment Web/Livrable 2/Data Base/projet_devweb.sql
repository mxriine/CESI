-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 mars 2024 à 09:26
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
-- Base de données : `projet_devweb`
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
(3, 3);

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
(1, 'CampusA', 'Université', 1),
(2, 'CampusB', 'École d’ingénieurs', 2),
(3, 'CampusC', 'École de commerce', 3),
(4, 'CampusD', 'Université', 4),
(5, 'CampusE', 'École d’art', 5),
(6, 'CampusF', 'Université', 6),
(7, 'CampusG', 'École d’ingénieurs', 7),
(8, 'CampusH', 'École de commerce', 8),
(9, 'CampusI', 'École d’art', 9),
(10, 'CampusJ', 'Université', 10);

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
(1, 'EntrepriseA', 5, 'B', 'Technologie', 1, 1),
(2, 'EntrepriseB', 3, 'A', 'Finance', 2, 1),
(3, 'EntrepriseC', 4, 'C', 'Éducation', 1, 2),
(4, 'EntrepriseD', 2, 'B', 'Santé', 2, 2),
(5, 'EntrepriseE', 6, 'A', 'Logistique', 3, 3),
(6, 'EntrepriseF', 1, 'C', 'Art', 1, 1),
(7, 'EntrepriseG', 3, 'B', 'Restauration', 2, 2),
(8, 'EntrepriseH', 7, 'A', 'Droit', 3, 3),
(9, 'EntrepriseI', 5, 'C', 'Agriculture', 1, 1),
(10, 'EntrepriseJ', 4, 'B', 'Sport', 2, 2);

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
(1, 1, 1, 1, 8),
(2, 2, 2, 2, 9),
(3, 3, 1, 3, 10),
(4, 1, 2, 4, 11),
(5, 2, 3, 5, 12),
(6, 3, 3, 6, 13),
(7, 1, 1, 7, 14),
(8, 2, 2, 8, 15),
(9, 3, 1, 9, 16),
(10, 1, 2, 1, 17),
(11, 2, 2, 2, 18),
(12, 3, 1, 7, 19),
(13, 1, 2, 10, 20);

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
(1, 1, 5),
(2, 2, 4),
(3, 3, 5),
(4, 4, 4),
(5, 5, 4),
(6, 6, 3),
(7, 7, 4),
(8, 8, 5),
(9, 9, 3),
(10, 10, 5);

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
(1, 1, 15.00),
(2, 2, 14.50),
(3, 3, 16.75),
(4, 4, 13.20),
(5, 5, 12.00),
(6, 6, 17.50),
(7, 7, 11.00),
(8, 8, 15.25),
(9, 9, 14.00),
(10, 10, 16.00);

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
(1, 'OffreA', 'Débutant', 20, 2, 6, '2024-01-01', 500, 1, 1, 1),
(2, 'OffreB', 'Intermédiaire', 15, 3, 12, '2024-02-01', 700, 2, 1, 2),
(3, 'OffreC', 'Expert', 10, 1, 9, '2024-03-01', 1000, 3, 2, 3),
(4, 'OffreD', 'Débutant', 25, 4, 3, '2024-04-01', 400, 1, 2, 4),
(5, 'OffreE', 'Intermédiaire', 18, 2, 6, '2024-05-01', 600, 2, 3, 5),
(6, 'OffreF', 'Expert', 8, 1, 12, '2024-06-01', 1200, 3, 1, 6),
(7, 'OffreG', 'Débutant', 22, 3, 6, '2024-07-01', 500, 1, 2, 7),
(8, 'OffreH', 'Intermédiaire', 12, 2, 9, '2024-08-01', 800, 2, 3, 8),
(9, 'OffreI', 'Expert', 5, 1, 12, '2024-09-01', 1500, 3, 1, 9),
(10, 'OffreJ', 'Débutant', 30, 5, 3, '2024-10-01', 450, 1, 2, 10);

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
(1, 'France'),
(2, 'Belgique'),
(3, 'Canada'),
(4, 'Suisse'),
(5, 'Luxembourg');

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
(1, 'MAZOU', 'Marine', 'mdp1', 'marine.mazou@example.com'),
(2, 'ROSAS', 'Elisa', 'mdp2', 'elisa.rosas@example.com'),
(3, 'LAULHE', 'Estelle', 'mdp3', 'estelle.laulhe@example.com'),
(4, 'Clausse', 'Pauline', 'mdp4', 'pauline.clausse@example.com'),
(5, 'Dupont', 'Lucas', 'mdp5', 'lucas.dupont@example.com'),
(6, 'Martin', 'Sophie', 'mdp6', 'sophie.martin@example.com'),
(7, 'Bernard', 'Alexandre', 'mdp7', 'alexandre.bernard@example.com'),
(8, 'Thomas', 'Julie', 'mdp8', 'julie.thomas@example.com'),
(9, 'Roux', 'Nicolas', 'mdp9', 'nicolas.roux@example.com'),
(10, 'Lefebvre', 'Camille', 'mdp10', 'camille.lefebvre@example.com'),
(11, 'Lecomte', 'Manon', 'mdp11', 'manon.lecomte@example.com'),
(12, 'Petit', 'Antoine', 'mdp12', 'antoine.petit@example.com'),
(13, 'Leroy', 'Laura', 'mdp13', 'laura.leroy@example.com'),
(14, 'Morel', 'Thomas', 'mdp14', 'thomas.morel@example.com'),
(15, 'Fournier', 'Marie', 'mdp15', 'marie.fournier@example.com'),
(16, 'Garcia', 'David', 'mdp16', 'david.garcia@example.com'),
(17, 'Martinez', 'Sarah', 'mdp17', 'sarah.martinez@example.com'),
(18, 'Girard', 'Kevin', 'mdp18', 'kevin.girard@example.com'),
(19, 'Sanchez', 'Julia', 'mdp19', 'julia.sanchez@example.com'),
(20, 'Perez', 'Mathilde', 'mdp20', 'mathilde.perez@example.com');

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
(1, 1, 4),
(2, 2, 5),
(3, 3, 6);

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
(1, 1, 'CV1.pdf', 'Lettre1.pdf'),
(2, 2, 'CV2.pdf', 'Lettre2.pdf'),
(3, 3, 'CV3.pdf', 'Lettre3.pdf'),
(4, 4, 'CV4.pdf', 'Lettre4.pdf'),
(5, 5, 'CV5.pdf', 'Lettre5.pdf'),
(6, 6, 'CV6.pdf', 'Lettre6.pdf'),
(7, 7, 'CV7.pdf', 'Lettre7.pdf'),
(8, 8, 'CV8.pdf', 'Lettre8.pdf'),
(9, 9, 'CV9.pdf', 'Lettre9.pdf'),
(10, 10, 'CV10.pdf', 'Lettre10.pdf');

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
(1, 'Licence', 'Informatique 2024', 2024, 1),
(2, 'Master', 'Finance 2024', 2024, 2),
(3, 'Doctorat', 'Droit 2024', 2024, 3),
(4, 'Licence', 'Biologie 2024', 2024, 4),
(5, 'Master', 'Arts Plastiques 2024', 2024, 5),
(6, 'Doctorat', 'Physique 2024', 2024, 6),
(7, 'Licence', 'Mathématiques 2024', 2024, 7),
(8, 'Master', 'Histoire 2024', 2024, 8),
(9, 'Doctorat', 'Philosophie 2024', 2024, 9),
(10, 'Licence', 'Chimie 2024', 2024, 10);

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
(1, 'Île-de-France', 1),
(2, 'Nouvelle-Aquitaine', 1),
(3, 'Auvergne-Rhône-Alpes', 1),
(4, 'Bretagne', 1),
(5, 'Provence-Alpes-Côte d\'Azur', 1),
(6, 'Occitanie', 1),
(7, 'Normandie', 1),
(8, 'Grand Est', 1),
(9, 'Hauts-de-France', 1),
(10, 'Pays de la Loire', 1);

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
(1, 'SiteA', 1),
(2, 'SiteB', 2),
(3, 'SiteC', 3),
(4, 'SiteD', 4),
(5, 'SiteE', 5),
(6, 'SiteF', 6),
(7, 'SiteG', 7),
(8, 'SiteH', 8),
(9, 'SiteI', 9),
(10, 'SiteJ', 10);

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
(1, 'Paris', 1, 1),
(2, 'Bordeaux', 2, 2),
(3, 'Lyon', 3, 3),
(4, 'Rennes', 4, 4),
(5, 'Marseille', 5, 5),
(6, 'Toulouse', 6, 6),
(7, 'Rouen', 7, 7),
(8, 'Strasbourg', 8, 8),
(9, 'Lille', 9, 9),
(10, 'Nantes', 10, 10);

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
