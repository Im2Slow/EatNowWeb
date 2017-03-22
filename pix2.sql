-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3388
-- Généré le :  Mer 22 Mars 2017 à 17:13
-- Version du serveur :  5.6.19
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pix2`
--

-- --------------------------------------------------------

--
-- Structure de la table `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
`Number` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id` int(11) NOT NULL,
  `pseudo` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pass` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `valide` enum('0','1','2') COLLATE latin1_general_ci NOT NULL,
  `statut` enum('0','1') COLLATE latin1_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`number` int(11) NOT NULL,
  `number restaurant` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`number` int(11) NOT NULL,
  `number user` int(11) NOT NULL,
  `number restaurant` int(11) NOT NULL,
  `number menu` int(11) NOT NULL,
  `payed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
`Number` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `Location` text NOT NULL,
  `Open` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `dishes`
--
ALTER TABLE `dishes`
 ADD PRIMARY KEY (`Number`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`number`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`number`), ADD KEY `number user` (`number user`), ADD KEY `number restaurant` (`number restaurant`), ADD KEY `number menu` (`number menu`);

--
-- Index pour la table `restaurants`
--
ALTER TABLE `restaurants`
 ADD PRIMARY KEY (`Number`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `dishes`
--
ALTER TABLE `dishes`
MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
MODIFY `number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
MODIFY `number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `restaurants`
--
ALTER TABLE `restaurants`
MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
