-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1:3388
-- Généré le :  Dim 02 Avril 2017 à 12:27
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
  `ID Restaurant` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Type` text NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Contenu de la table `dishes`
--

INSERT INTO `dishes` (`Number`, `ID Restaurant`, `Name`, `Type`, `Cost`) VALUES
(1, 1, 'Gourde à boire', 'Fruit', 1.9),
(2, 1, 'Salade de fruits', 'Fruit', 0),
(3, 1, 'Cristaline 50cL', 'Boisson', 0),
(4, 1, 'Liégeois au chocolat', 'Dessert', 1.9),
(5, 1, 'PastaBOX - Fusilli à la Bolognaise', 'Plat chaud', 0),
(6, 1, 'CremioBOX - Poulet à la crème avec Emmental', 'Plat chaud', 0),
(7, 1, 'Muffin nature', 'Dessert', 1.8),
(8, 1, 'CremioBOX - Jambon à la crème avec Emmental', 'Plat chaud', 0),
(9, 1, 'PastaBOX - Fusilli à la Carbonara', 'Plat chaud', 0),
(10, 1, 'PastaBOX - Tortellini Ricotta Epinards\r\nSauce au parmesan', 'Plat chaud', 0),
(11, 1, 'Fusilli aux Fromages Italiens', 'Plat chaud', 0),
(12, 1, 'Minute Maid Pomme', 'Boisson', 0),
(13, 1, 'Fromage blanc au fruits rouges', 'Dessert', 0),
(14, 1, 'Lipton Ice Tea Pêche', 'Boisson', 0),
(15, 1, 'Compote', 'Fruit', 1.9),
(16, 1, 'Cookie', 'Dessert', 1.5),
(17, 1, 'Donut Nature', 'Dessert', 1.3),
(18, 1, 'Cristaline Gazéifiée 0.5L', 'Boisson', 0),
(19, 1, 'Coca-Cola', 'Boisson', 0),
(20, 1, 'Coca-Cola Light', 'Boisson', 0),
(21, 1, 'Cristaline 1.5cL', 'Boisson', 0),
(22, 1, 'Banane', 'Fruit', 0),
(23, 1, 'Minute Maid Tropical', 'Boisson', 0),
(24, 1, 'Donut Chocolat', 'Dessert', 0),
(25, 1, 'Beignet aux pommes', 'Dessert', 1.5),
(26, 1, 'Brownie', '', 1.8),
(27, 1, 'Minute Maid Orange', '', 0),
(28, 1, 'Orangina', '', 0),
(29, 1, 'Fanta Orange', '', 0),
(30, 1, 'Minute Maid Rouge Sensation', '', 0),
(31, 1, 'Coca-Cola Zero', '', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `login`
--

INSERT INTO `login` (`id`, `pseudo`, `pass`, `email`, `valide`, `statut`, `date`) VALUES
(2, 'DerpyCat', '060298', 'juliette.desormonts@gmail.com', '1', '1', '2017-03-31');

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`Number` int(11) NOT NULL,
  `ID Restaurant` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Cost` double NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `menu`
--

INSERT INTO `menu` (`Number`, `ID Restaurant`, `Name`, `Description`, `Cost`) VALUES
(1, 1, 'Formule Maison 1', 'Sandwich Maison\r\nDessert', 4),
(2, 1, 'Formule Maison 2', 'Salade Maison\r\nDessert', 4.5),
(3, 1, 'Formule Toastée', 'Panini\r\nDessert', 5),
(4, 1, 'Formule Libertée', 'Wrap ou Sandwich Club\r\nDessert', 5.5);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`Number` int(11) NOT NULL,
  `ID Login` int(11) NOT NULL,
  `ID Restaurant` int(11) NOT NULL,
  `ID Menu` int(11) NOT NULL,
  `Payed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `restaurants`
--

CREATE TABLE IF NOT EXISTS `restaurants` (
`Number` int(11) NOT NULL,
  `Name` tinytext NOT NULL,
  `Location` text NOT NULL,
  `Open` tinyint(1) NOT NULL,
  `Type` text NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `restaurants`
--

INSERT INTO `restaurants` (`Number`, `Name`, `Location`, `Open`, `Type`, `Description`) VALUES
(1, 'Cafeteria', 'Rue Haute, 12 Avenue Leonard De Vinci, 92400 Courbevoie', 1, 'Cafe & Snacks', ''),
(2, 'Grill', 'Rue Basse, 12 Avenue Leonard De Vinci, 92400 Courbevoie', 1, 'Restauration classique', ''),
(3, 'Lounge', 'Rue Haute, 12 Avenue Leonard De Vinci, 92400 Courbevoie', 1, 'Cafe & Snacks', 'Ouvert de 10h à 16h');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `dishes`
--
ALTER TABLE `dishes`
 ADD PRIMARY KEY (`Number`), ADD KEY `ID Restaurant` (`ID Restaurant`);

--
-- Index pour la table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`Number`), ADD KEY `ID Restaurant` (`ID Restaurant`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`Number`), ADD KEY `number user` (`ID Login`), ADD KEY `number restaurant` (`ID Restaurant`), ADD KEY `number menu` (`ID Menu`);

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
MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `login`
--
ALTER TABLE `login`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `restaurants`
--
ALTER TABLE `restaurants`
MODIFY `Number` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `dishes`
--
ALTER TABLE `dishes`
ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`ID Restaurant`) REFERENCES `restaurants` (`Number`);

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID Restaurant`) REFERENCES `restaurants` (`Number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
