-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 21 avr. 2020 à 07:27
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tdl`
--
CREATE DATABASE IF NOT EXISTS `tdl` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tdl`;

-- --------------------------------------------------------

--
-- Structure de la table `taches`
--

DROP TABLE IF EXISTS `taches`;
CREATE TABLE IF NOT EXISTS `taches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateurs` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `date_creation` date NOT NULL,
  `description` varchar(1000) NOT NULL,
  `etat` varchar(25) NOT NULL DEFAULT 'todo',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taches`
--

INSERT INTO `taches` (`id`, `id_utilisateurs`, `titre`, `date_creation`, `description`, `etat`) VALUES
(13, 7, 'test2', '2020-04-19', 'test2', 'done'),
(12, 7, 'test1', '2020-04-17', 'test1', 'done'),
(16, 6, 'test1', '2020-04-17', 'test1', 'done'),
(20, 6, 'test5', '2020-04-20', 'tructruc', 'todo'),
(21, 6, 'test4', '2020-04-20', 'testtest', 'todo');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(6, 'CHARDON', 'Amélie', 'amelie.chardon@laplateforme.io', '$2y$12$mM6Iyk4dURlspEWRyjoEuOsoR5L8PgS7HlidABzrUDSQp7VA31XP6'),
(7, 'Chaouati', 'Sarah', 'nana', '$2y$12$tdePJ7Ii.riZmaEoac50AOq2VUdYiat4x0lkVkYLl1zRRkIb4nRV6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
