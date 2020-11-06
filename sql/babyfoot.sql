-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 19 avr. 2019 à 08:51
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `babyfoot`
--

-- --------------------------------------------------------

--
-- Structure de la table `histo_but`
--

DROP TABLE IF EXISTS `histo_but`;
CREATE TABLE IF NOT EXISTS `histo_but` (
  `id_histo` int(11) NOT NULL AUTO_INCREMENT,
  `id_match` int(11) NOT NULL,
  `id_joueur` int(11) NOT NULL,
  `heure` time NOT NULL,
  PRIMARY KEY (`id_histo`),
  KEY `histo_but_ibfk_3` (`id_joueur`),
  KEY `id_match` (`id_match`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(10) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `creation` datetime NOT NULL,
  `motdepasse` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo` (`pseudo`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `nom`, `prenom`, `pseudo`, `mail`, `creation`, `motdepasse`, `avatar`) VALUES
(1, '', '', 'admin', 'admin@babyfoot.fr', '2019-04-09 20:16:21', 'd033e22ae348aeb5660fc2140aec35850c4da997', '');

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `id_match` int(11) NOT NULL AUTO_INCREMENT,
  `idjoueur1` int(11) NOT NULL,
  `idjoueur2` int(11) NOT NULL,
  `butjoueur1` int(11) NOT NULL,
  `butjoueur2` int(11) NOT NULL,
  PRIMARY KEY (`id_match`),
  KEY `idjoueur1` (`idjoueur1`),
  KEY `idjoueur2` (`idjoueur2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idreservation` int(11) NOT NULL AUTO_INCREMENT,
  `idmembre` int(11) NOT NULL,
  `heure` time NOT NULL,
  `jour` date NOT NULL,
  PRIMARY KEY (`idreservation`),
  KEY `idmembre` (`idmembre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `idstatistique` int(11) NOT NULL AUTO_INCREMENT,
  `idmembre` int(11) NOT NULL,
  `marquer` int(11) NOT NULL,
  `encaisser` int(11) NOT NULL,
  `victoire` int(11) NOT NULL,
  `defaite` int(11) NOT NULL,
  `nbpartie` int(11) NOT NULL,
  PRIMARY KEY (`idstatistique`),
  KEY `idmembre` (`idmembre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `histo_but`
--
ALTER TABLE `histo_but`
  ADD CONSTRAINT `histo_but_ibfk_3` FOREIGN KEY (`id_joueur`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `histo_but_ibfk_4` FOREIGN KEY (`id_match`) REFERENCES `partie` (`id_match`);

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`idjoueur1`) REFERENCES `membres` (`id`),
  ADD CONSTRAINT `partie_ibfk_2` FOREIGN KEY (`idjoueur2`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idmembre`) REFERENCES `membres` (`id`);

--
-- Contraintes pour la table `statistique`
--
ALTER TABLE `statistique`
  ADD CONSTRAINT `statistique_ibfk_1` FOREIGN KEY (`idmembre`) REFERENCES `membres` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
