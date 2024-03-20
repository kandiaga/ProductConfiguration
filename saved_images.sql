-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 20 mars 2024 à 16:25
-- Version du serveur :  5.7.17
-- Version de PHP :  7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `voitures`
--

-- --------------------------------------------------------

--
-- Structure de la table `saved_images`
--

CREATE TABLE `saved_images` (
  `id_temp` int(11) NOT NULL,
  `session_id` varchar(250) NOT NULL,
  `file_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `saved_images`
--

INSERT INTO `saved_images` (`id_temp`, `session_id`, `file_name`) VALUES
(1, 'j0f9ia4r4nri31mcma0vhtru6n', 'design_20240320142235_j0f9ia4r4nri31mcma0vhtru6n.png'),
(2, 'j0f9ia4r4nri31mcma0vhtru6n', 'design_20240320142630_j0f9ia4r4nri31mcma0vhtru6n.png'),
(3, 'j0f9ia4r4nri31mcma0vhtru6n', 'design_20240320145846_j0f9ia4r4nri31mcma0vhtru6n.png'),
(4, 'j0f9ia4r4nri31mcma0vhtru6n', 'design_20240320151210_j0f9ia4r4nri31mcma0vhtru6n.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `saved_images`
--
ALTER TABLE `saved_images`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `saved_images`
--
ALTER TABLE `saved_images`
  MODIFY `id_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
