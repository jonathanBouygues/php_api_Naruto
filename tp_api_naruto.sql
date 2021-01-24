-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  Dim 24 jan. 2021 à 13:23
-- Version du serveur :  5.7.28
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_api_naruto`
--

-- --------------------------------------------------------

--
-- Structure de la table `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(80) NOT NULL,
  `lastName` varchar(80) NOT NULL DEFAULT 'inconnu',
  `idVillage` int(30) NOT NULL,
  `skill` varchar(80) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `key_village` (`idVillage`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `characters`
--

INSERT INTO `characters` (`id`, `firstName`, `lastName`, `idVillage`, `skill`) VALUES
(1, 'Naruto', 'Uzumako', 1, 'Kage Bunshin no Jutsu'),
(2, 'Zabuza', 'Momochi', 2, 'Suiry?dan no Jutsu'),
(3, 'Sasuke ', 'Uchiha', 1, 'Gōkakyū no Jutsu'),
(4, 'Kakashi ', 'Hatake', 1, 'Kamui Sharingan'),
(5, 'Itachi', 'Uchiha', 1, 'MangekyÃ´ Sharingan'),
(6, 'Darui', 'inconnu', 3, 'Raiton - Kuropansa'),
(7, 'Onoki', 'inconnu', 4, 'Doton'),
(8, 'Nagato', 'Pain', 6, 'Ningendo'),
(9, 'Gaara', 'inconnu', 5, 'Sabaku Kyu'),
(10, 'Hinata', 'Hyuga', 1, 'Byakugan');

-- --------------------------------------------------------

--
-- Structure de la table `villages`
--

DROP TABLE IF EXISTS `villages`;
CREATE TABLE IF NOT EXISTS `villages` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `elementCountry` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villages`
--

INSERT INTO `villages` (`id`, `name`, `elementCountry`) VALUES
(1, 'Konoha ', 'Fire'),
(2, 'Kiri', 'Water'),
(3, 'Kumo ', 'Lightning'),
(4, 'Iwa ', 'Earth'),
(5, 'Suna ', 'Wind'),
(6, 'Ame', 'Rain');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `key_village` FOREIGN KEY (`idVillage`) REFERENCES `villages` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
