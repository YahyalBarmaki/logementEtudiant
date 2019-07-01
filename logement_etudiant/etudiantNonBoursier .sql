-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Lun 01 Juillet 2019 à 09:37
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `logementEtu`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiantNonBoursier`
--

CREATE TABLE `etudiantNonBoursier` (
  `id_etu` int(11) UNSIGNED NOT NULL,
  `adresse` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etudiantNonBoursier`
--

INSERT INTO `etudiantNonBoursier` (`id_etu`, `adresse`) VALUES
(102, 'Yeumbeul'),
(103, 'Grand Yoff'),
(104, 'Guel tapÃ©'),
(105, 'Kaolack');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `etudiantNonBoursier`
--
ALTER TABLE `etudiantNonBoursier`
  ADD KEY `id_etu` (`id_etu`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
