-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 18 mars 2024 à 16:13
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
(7, 'CampusG', 'École d’ingénieurs', 6),
(8, 'CampusH', 'École de commerce', 2),
(9, 'CampusI', 'École d’art', 1),
(10, 'CampusJ', 'Université', 4);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `ID_Ent` int(11) NOT NULL,
  `Nom_Ent` varchar(50) DEFAULT NULL,
  `Nb_Stag_Ent` int(11) DEFAULT NULL,
  `Moyenne_Eval_Ent` varchar(50) DEFAULT NULL,
  `Secteur_Act_Ent` varchar(50) DEFAULT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`ID_Ent`, `Nom_Ent`, `Nb_Stag_Ent`, `Moyenne_Eval_Ent`, `Secteur_Act_Ent`, `ID_Pilote`, `ID_Admin`) VALUES
(1, 'EntrepriseA', 5, '2', 'Informatique', 1, 1),
(2, 'EntrepriseB', 3, '5', 'Mathématiques', 2, 1),
(3, 'EntrepriseC', 0, '3', 'Développement web', 1, 2),
(4, 'EntrepriseD', 2, '2', 'BTP', 2, 2),
(5, 'EntrepriseE', 6, '5', 'Robotique', 3, 3),
(6, 'EntrepriseF', 1, '3', 'Mathématiques', 1, 1),
(7, 'EntrepriseG', 3, '2', 'Robotique', 2, 2),
(8, 'EntrepriseH', 7, '5', 'BTP', 3, 3),
(9, 'EntrepriseI', 5, '3', 'Informatique', 1, 1),
(10, 'EntrepriseJ', 4, '4', 'Développement web', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `ID_Etudiant` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `ID_Promotion` int(11) NOT NULL,
  `ID_Pers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`ID_Etudiant`, `ID_Admin`, `ID_Pilote`, `ID_Promotion`, `ID_Pers`) VALUES
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
(1, 1, 5.00),
(2, 2, 3.00),
(3, 3, 2.00),
(4, 4, 4.00),
(5, 5, 1.00),
(6, 6, 5.00),
(7, 7, 2.00),
(8, 8, 3.00),
(9, 9, 5.00),
(10, 10, 1.00);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `ID_Offre` int(11) NOT NULL,
  `Titre_Offre` varchar(50) DEFAULT NULL,
  `Niveau` varchar(50) DEFAULT NULL,
  `NB_Postulation` int(11) DEFAULT NULL,
  `Duree_Stage` varchar(50) DEFAULT NULL,
  `Remuneration` int(11) DEFAULT NULL,
  `Date_Offre` date DEFAULT NULL,
  `NB_Places` int(11) DEFAULT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `ID_Ent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`ID_Offre`, `Titre_Offre`, `Niveau`, `NB_Postulation`, `Duree_Stage`, `Remuneration`, `Date_Offre`, `NB_Places`, `ID_Pilote`, `ID_Admin`, `ID_Ent`) VALUES
(1, 'OffreA', 'Bac +4', 20, '6 semaines', 500, '2024-01-01', 2, 1, 1, 1),
(2, 'OffreB', 'Bac +1', 15, '12 semaines', 700, '2024-02-01', 3, 2, 1, 2),
(3, 'OffreC', 'Bac +5', 10, '9 semaines', 1000, '2024-03-01', 1, 3, 2, 3),
(4, 'OffreD', 'Bac +2', 25, '3 semaines', 400, '2024-04-01', 4, 1, 2, 4),
(5, 'OffreE', 'Bac +1', 18, '6 semaines', 600, '2024-05-01', 2, 2, 3, 5),
(6, 'OffreF', 'Bac +3', 8, '12 semaines', 1200, '2024-06-01', 1, 3, 1, 6),
(7, 'OffreG', 'Bac +2', 22, '6 semaines', 500, '2024-07-01', 3, 1, 2, 7),
(8, 'OffreH', 'Bac +5', 12, '9 semaines', 800, '2024-08-01', 2, 2, 3, 8),
(9, 'OffreI', 'Bac +5', 5, '12 semaines', 1500, '2024-09-01', 1, 3, 1, 9),
(10, 'OffreJ', 'Bac +1', 30, '3 semaines', 450, '2024-10-01', 5, 1, 2, 10);

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
(1, 'Mazou', 'Marine', 'mdp1', 'marine.mazou@example.com'),
(2, 'Rosas', 'Elisa', 'mdp2', 'elisa.rosas@example.com'),
(3, 'Laulhe', 'Estelle', 'mdp3', 'estelle.laulhe@example.com'),
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

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `ID_Promotion` int(11) NOT NULL,
  `Specialite_Promotion` varchar(50) DEFAULT NULL,
  `Nom_Promo` varchar(50) DEFAULT NULL,
  `Annee_Etude` int(11) DEFAULT NULL,
  `ID_Campus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`ID_Promotion`, `Specialite_Promotion`, `Nom_Promo`, `Annee_Etude`, `ID_Campus`) VALUES
(1, 'Informatique', 'A1', 0, 1),
(2, 'BTP', 'A1', 0, 2),
(3, 'Développement web', 'A4', 0, 3),
(4, 'Mathématiques', 'A3', 0, 4),
(5, 'Robotique', 'A5', 0, 5),
(6, 'Informatique', 'A1', 0, 6),
(7, 'Robotique', 'A2', 0, 7),
(8, 'Mathématiques', 'A4', 0, 8),
(9, 'Développement web', 'A5', 0, 9),
(10, 'BTP', 'A2', 0, 10);

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
  ADD KEY `ID_Promotion` (`ID_Promotion`);

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
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ID_Promotion`),
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `campus`
--
ALTER TABLE `campus`
  MODIFY `ID_Campus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `ID_Ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `ID_Etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `ID_Offre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `ID_Pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `ID_Pers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `pilote`
--
ALTER TABLE `pilote`
  MODIFY `ID_Pilote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `ID_Promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `ID_Region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `site`
--
ALTER TABLE `site`
  MODIFY `ID_Site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `ID_Ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `etudiant_ibfk_3` FOREIGN KEY (`ID_Promotion`) REFERENCES `promotion` (`ID_Promotion`),
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
