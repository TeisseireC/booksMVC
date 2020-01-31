-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 31 jan. 2020 à 09:07
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `booksmvc`
--
CREATE DATABASE IF NOT EXISTS `booksmvc` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `booksmvc`;

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `owner` varchar(50) DEFAULT NULL,
  `genre` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `owner`, `genre`) VALUES
(1, 'Candide', 'Voltaire', 'cyril.teisseire@mail.com', 1),
(2, 'Madame Bovary', 'Gustave Flaubert', 'dimitri.gottin@mail.com', 1),
(3, 'Escoffier, le guide culinaire', 'Auguste Escoffier', 'cyril.teisseire@mail.com', 2),
(4, 'Grand livre de cuisine', 'Alain Ducasse', 'dimitri.gottin@mail.com', 2),
(5, 'La Guerre des mondes', 'Herbert George Wells', 'cyril.teisseire@mail.com', 3),
(6, 'Ravage', 'René Barjavel', 'dimitri.gottin@mail.com', 3),
(7, 'Les Amours de Marie', 'Pierre de Ronsard', 'cyril.teisseire@mail.com', 4),
(8, 'Les Regrets', 'Joachim Du Bellay', 'dimitri.gottin@mail.com', 4),
(9, 'Le Seigneur des anneaux - Intégrale', 'John Ronald Reuel Tolkien', 'cyril.teisseire@mail.com', 5),
(10, 'Le Trône de fer : L\'Intégrale', 'George Raymond Richard Martin', 'dimitri.gottin@mail.com', 5),
(11, 'Le Horla', 'Guy de Maupassant', 'cyril.teisseire@mail.com', 6),
(12, 'Le Joueur d\'échecs', 'Stefan Zweig', 'dimitri.gottin@mail.com', 6),
(13, 'Peter Pan', 'James Matthew Barrie', 'cyril.teisseire@mail.com', 7),
(14, 'Le vilain petit canard', 'Hans Christian Andersen', 'dimitri.gottin@mail.com', 7),
(30, 'Bilbo le Hobbit', 'John Ronald Reuel Tolkien', 'cyril.teisseire@mail.com', 5);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int(10) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `description`) VALUES
(1, 'Roman'),
(2, 'Cuisine'),
(3, 'Science-Fiction'),
(4, 'Poésie'),
(5, 'Fantaisie'),
(6, 'Nouvelle'),
(7, 'Conte');

-- --------------------------------------------------------

--
-- Structure de la table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(10) NOT NULL,
  `description` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `usergroup`
--

INSERT INTO `usergroup` (`id`, `description`) VALUES
(1, 'Utilisateur'),
(2, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `usergroup` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `usergroup`, `password`) VALUES
('cyril.teisseire@mail.com', 'Cyril', 'Teisseire', 2, '$2y$10$GBwHxmNswp3RFH9eXZj3ReIBXPy6m8dojULU4F1rwQ3TLljUsnc2a'),
('dimitri.gottin@mail.com', 'Dimitri', 'Gottin', 2, '$2y$10$PWXYs9Ujb/wzvN8vuTqCFufCH.pFtzToorw2OzlHG9XI/VqR0.UCu'),
('test@mail.com', 'Test', 'Test', 1, '$2y$10$id.yLsDnkOnKYWZMg1f7V.72Eo/jb8HCEqSqP3PKp1m0V9zsaA.7u');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FOREIGN KEY OWNER` (`owner`),
  ADD KEY `FOREIGN KEY GENRE` (`genre`) USING BTREE;

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`),
  ADD KEY `FOREIGN KEY USERGROUP` (`usergroup`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_Genre_Books` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `FK_Owner_Books` FOREIGN KEY (`owner`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_UserGroup_Users` FOREIGN KEY (`usergroup`) REFERENCES `usergroup` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
