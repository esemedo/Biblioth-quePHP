-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 21 oct. 2022 à 07:26
-- Version du serveur :  5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `Bibliotheque`
--
CREATE DATABASE IF NOT EXISTS `Bibliotheque` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Bibliotheque`;

-- --------------------------------------------------------

--
-- Structure de la table `Auteur`
--

DROP TABLE IF EXISTS `Auteur`;
CREATE TABLE IF NOT EXISTS `Auteur` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Categorie`
--

DROP TABLE IF EXISTS `Categorie`;
CREATE TABLE IF NOT EXISTS `Categorie` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Link_C_L`
--

DROP TABLE IF EXISTS `Link_C_L`;
CREATE TABLE IF NOT EXISTS `Link_C_L` (
  `id_categorie` int(10) UNSIGNED NOT NULL,
  `id_livre` int(10) UNSIGNED NOT NULL,
  UNIQUE KEY `livre` (`id_livre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `Livre`
--

DROP TABLE IF EXISTS `Livre`;
CREATE TABLE IF NOT EXISTS `Livre` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `Synopsis` text NOT NULL,
  `id_auteur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
