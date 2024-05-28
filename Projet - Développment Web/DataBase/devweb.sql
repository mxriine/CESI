-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 28 mai 2024 à 09:21
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
-- Structure de la table `apply`
--

CREATE TABLE `apply` (
  `ID_Offer` int(11) NOT NULL,
  `ID_Student` int(11) NOT NULL,
  `letter` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `apply`
--

INSERT INTO `apply` (`ID_Offer`, `ID_Student`, `letter`) VALUES
(1, 1, 'Lettre de motivation pour le stage de développeur web'),
(2, 2, 'Lettre de motivation pour le CDI ingénieur en électronique'),
(3, 3, 'Lettre de motivation pour l\'alternance chef de projet'),
(4, 4, 'Lettre de motivation pour le CDD analyste financier'),
(5, 5, 'Lettre de motivation pour le stage assistant marketing');

-- --------------------------------------------------------

--
-- Structure de la table `campus`
--

CREATE TABLE `campus` (
  `ID_Campus` int(11) NOT NULL,
  `ID_City` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `campus`
--

INSERT INTO `campus` (`ID_Campus`, `ID_City`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

CREATE TABLE `city` (
  `ID_City` int(11) NOT NULL,
  `Name_City` varchar(50) DEFAULT NULL,
  `ID_Region` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`ID_City`, `Name_City`, `ID_Region`) VALUES
(1, 'Paris', 1),
(2, 'Marseille', 2),
(3, 'Lyon', 3),
(4, 'Toulouse', 4),
(5, 'Bordeaux', 5);

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `ID_Company` int(11) NOT NULL,
  `name_company` varchar(50) DEFAULT NULL,
  `ID_City` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `company`
--

INSERT INTO `company` (`ID_Company`, `name_company`, `ID_City`) VALUES
(1, 'Entreprise 1', 1),
(2, 'Entreprise 2', 2),
(3, 'Entreprise 3', 3),
(4, 'Entreprise 4', 4),
(5, 'Entreprise 5', 5);

-- --------------------------------------------------------

--
-- Structure de la table `country`
--

CREATE TABLE `country` (
  `ID_Country` int(11) NOT NULL,
  `Name_Country` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `country`
--

INSERT INTO `country` (`ID_Country`, `Name_Country`) VALUES
(1, 'France');

-- --------------------------------------------------------

--
-- Structure de la table `offer`
--

CREATE TABLE `offer` (
  `ID_Offer` int(11) NOT NULL,
  `name_offer` varchar(50) DEFAULT NULL,
  `description_offer` varchar(50) DEFAULT NULL,
  `domaine_offer` varchar(50) DEFAULT NULL,
  `competences_offer` varchar(50) DEFAULT NULL,
  `niveau_offer` varchar(50) DEFAULT NULL,
  `postulation_offer` int(11) DEFAULT NULL,
  `duree_offer` int(11) DEFAULT NULL,
  `remuneration_offer` int(11) DEFAULT NULL,
  `date_offer` date DEFAULT NULL,
  `place_offer` int(11) DEFAULT NULL,
  `ID_Company` int(11) NOT NULL,
  `ID_Pilote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `offer`
--

INSERT INTO `offer` (`ID_Offer`, `name_offer`, `description_offer`, `domaine_offer`, `competences_offer`, `niveau_offer`, `postulation_offer`, `duree_offer`, `remuneration_offer`, `date_offer`, `place_offer`, `ID_Company`, `ID_Pilote`) VALUES
(1, 'Stage Développeur Web', 'Stage de développement web', 'Informatique', 'HTML, CSS, JavaScript', 'Bac+2', 5, 6, 1000, '2024-05-01', 5, 1, 1),
(2, 'CDI Ingénieur en Électronique', 'Ingénieur électronique pour conception de circuits', 'Électronique', 'Connaissances en circuits intégrés', 'Bac+5', 10, 36, 3000, '2024-06-01', 3, 2, 2),
(3, 'Alternance Chef de Projet', 'Chef de projet junior', 'Gestion de projet', 'Management, Communication', 'Bac+3', 3, 12, 1500, '2024-09-01', 2, 3, 3),
(4, 'CDD Analyste Financier', 'Analyste financier pour une durée de 6 mois', 'Finance', 'Analyse de données, Excel', 'Bac+4', 2, 6, 2000, '2024-07-01', 1, 4, 4),
(5, 'Stage Assistant Marketing', 'Assistant marketing pour une durée de 3 mois', 'Marketing', 'Communication, Réseaux Sociaux', 'Bac+3', 4, 3, 800, '2024-08-01', 2, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pilote`
--

CREATE TABLE `pilote` (
  `ID_Pilote` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `pilote`
--

INSERT INTO `pilote` (`ID_Pilote`, `id_user`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `ID_Promotion` int(11) NOT NULL,
  `name_promotion` varchar(50) DEFAULT NULL,
  `domaine_promotion` varchar(50) DEFAULT NULL,
  `ID_Campus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`ID_Promotion`, `name_promotion`, `domaine_promotion`, `ID_Campus`) VALUES
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
  `ID_Region` int(11) NOT NULL,
  `Name_Region` varchar(50) DEFAULT NULL,
  `ID_Country` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`ID_Region`, `Name_Region`, `ID_Country`) VALUES
(1, 'Île-de-France', 1),
(2, 'Provence-Alpes-Côte d\'Azur', 1),
(3, 'Auvergne-Rhône-Alpes', 1),
(4, 'Occitanie', 1),
(5, 'Nouvelle-Aquitaine', 1);

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

CREATE TABLE `student` (
  `ID_Student` int(11) NOT NULL,
  `ID_Promotion` int(11) NOT NULL,
  `ID_Pilote` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`ID_Student`, `ID_Promotion`, `ID_Pilote`, `id_user`) VALUES
(1, 1, 1, 5),
(2, 2, 2, 6),
(3, 3, 3, 7),
(4, 4, 4, 8),
(5, 5, 1, 9),
(6, 1, 2, 10),
(7, 2, 3, 11),
(8, 3, 4, 12),
(9, 4, 1, 13),
(10, 5, 2, 14),
(11, 1, 3, 15),
(12, 2, 4, 16),
(13, 3, 1, 17),
(14, 4, 2, 18),
(15, 5, 3, 19),
(16, 1, 4, 20);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(50) DEFAULT NULL,
  `surname_user` varchar(50) DEFAULT NULL,
  `password_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `ID_City` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `surname_user`, `password_user`, `email_user`, `ID_City`) VALUES
(1, 'Marine', 'Mazou', 'mdp1', 'marine.mazou@example.com', 1),
(2, 'Estelle', 'Laulhe', 'mdp2', 'laulhe.estelle@example.com', 2),
(3, 'Pauline', 'Clausse', 'mdp3', 'clausse.pauline@example.com', 3),
(4, 'Elisa', 'Rosas', 'mdp4', 'rosas.elisa@example.com', 4),
(5, 'Luc', 'Moreau', 'qwerty', 'luc.moreau@example.com', 5),
(6, 'Emma', 'Lefebvre', 'azerty', 'emma.lefebvre@example.com', 1),
(7, 'Thomas', 'Garcia', 'motdepasse', 'thomas.garcia@example.com', 2),
(8, 'Camille', 'Roux', 'secure', 'camille.roux@example.com', 3),
(9, 'Louis', 'Fournier', 'password1', 'louis.fournier@example.com', 4),
(10, 'Manon', 'Girard', 'mdp123', 'manon.girard@example.com', 5),
(11, 'Alexandre', 'Bonnet', 'letmein', 'alexandre.bonnet@example.com', 1),
(12, 'Chloé', 'Caron', 'test123', 'chloe.caron@example.com', 2),
(13, 'Mathieu', 'Dumas', 'abcdef', 'mathieu.dumas@example.com', 3),
(14, 'Laura', 'Leroy', 'abcdefg', 'laura.leroy@example.com', 4),
(15, 'Antoine', 'Gauthier', '123abc', 'antoine.gauthier@example.com', 5),
(16, 'Charlotte', 'Martinez', 'abc123', 'charlotte.martinez@example.com', 1),
(17, 'Kevin', 'Guerin', '123456abc', 'kevin.guerin@example.com', 2),
(18, 'Elise', 'Garnier', 'abcdef123', 'elise.garnier@example.com', 3),
(19, 'Maxime', 'Chevalier', 'qwerty123', 'maxime.chevalier@example.com', 4),
(20, 'Margot', 'Lopez', 'password1234', 'margot.lopez@example.com', 5);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `apply`
--
ALTER TABLE `apply`
  ADD PRIMARY KEY (`ID_Offer`,`ID_Student`),
  ADD KEY `ID_Student` (`ID_Student`);

--
-- Index pour la table `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`ID_Campus`),
  ADD KEY `ID_City` (`ID_City`);

--
-- Index pour la table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID_City`),
  ADD KEY `ID_Region` (`ID_Region`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID_Company`),
  ADD KEY `ID_City` (`ID_City`);

--
-- Index pour la table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID_Country`);

--
-- Index pour la table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`ID_Offer`),
  ADD KEY `ID_Company` (`ID_Company`),
  ADD KEY `ID_Pilote` (`ID_Pilote`);

--
-- Index pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD PRIMARY KEY (`ID_Pilote`),
  ADD UNIQUE KEY `id_user` (`id_user`);

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
  ADD KEY `ID_Country` (`ID_Country`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID_Student`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `ID_Promotion` (`ID_Promotion`),
  ADD KEY `ID_Pilote` (`ID_Pilote`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `ID_City` (`ID_City`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`ID_Offer`) REFERENCES `offer` (`ID_Offer`),
  ADD CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`ID_Student`) REFERENCES `student` (`ID_Student`);

--
-- Contraintes pour la table `campus`
--
ALTER TABLE `campus`
  ADD CONSTRAINT `campus_ibfk_1` FOREIGN KEY (`ID_City`) REFERENCES `city` (`ID_City`);

--
-- Contraintes pour la table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`ID_Region`) REFERENCES `region` (`ID_Region`);

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`ID_City`) REFERENCES `city` (`ID_City`);

--
-- Contraintes pour la table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`ID_Company`) REFERENCES `company` (`ID_Company`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`);

--
-- Contraintes pour la table `pilote`
--
ALTER TABLE `pilote`
  ADD CONSTRAINT `pilote_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`ID_Campus`) REFERENCES `campus` (`ID_Campus`);

--
-- Contraintes pour la table `region`
--
ALTER TABLE `region`
  ADD CONSTRAINT `region_ibfk_1` FOREIGN KEY (`ID_Country`) REFERENCES `country` (`ID_Country`);

--
-- Contraintes pour la table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`ID_Promotion`) REFERENCES `promotion` (`ID_Promotion`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`ID_Pilote`) REFERENCES `pilote` (`ID_Pilote`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`ID_City`) REFERENCES `city` (`ID_City`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
