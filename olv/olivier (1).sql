-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 13 Juillet 2016 à 11:11
-- Version du serveur: 5.5.25a
-- Version de PHP: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `olivier`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE IF NOT EXISTS `agences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agence` varchar(50) NOT NULL,
  `marchandise` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `agences`
--

INSERT INTO `agences` (`id`, `agence`, `marchandise`, `qte`) VALUES
(21, 'mkf', 'cabelo', 0),
(22, 'mkf', 'telephones', 0),
(23, 'mkf', 'materiel_informatique', 0),
(24, 'mkf', 'body', 0),
(25, 'mkf', 'autres', 0);

-- --------------------------------------------------------

--
-- Structure de la table `autre`
--

CREATE TABLE IF NOT EXISTS `autre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `montant` decimal(65,4) NOT NULL DEFAULT '0.0000',
  `agence` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `autre`
--

INSERT INTO `autre` (`id`, `montant`, `agence`) VALUES
(11, 0.0000, 'herman'),
(12, 0.0000, 'Nowan');

-- --------------------------------------------------------

--
-- Structure de la table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agence` varchar(50) NOT NULL,
  `cash` decimal(64,5) NOT NULL DEFAULT '0.00000',
  `chef` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `cash`
--

INSERT INTO `cash` (`id`, `agence`, `cash`, `chef`, `telephone`) VALUES
(5, 'mkf', 0.00000, 'mohamed kebbeh', '0999935929');

-- --------------------------------------------------------

--
-- Structure de la table `cash_autre`
--

CREATE TABLE IF NOT EXISTS `cash_autre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cash` decimal(64,5) NOT NULL,
  `chef` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `cash_autre`
--

INSERT INTO `cash_autre` (`id`, `cash`, `chef`, `telephone`) VALUES
(2, 0.00000, 'herman', '00000000'),
(3, 0.00000, 'Nowan', '999999999999999999');

-- --------------------------------------------------------

--
-- Structure de la table `historic`
--

CREATE TABLE IF NOT EXISTS `historic` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `montant` decimal(65,4) NOT NULL,
  `action` varchar(65) NOT NULL,
  `heure` datetime NOT NULL,
  `jour` text NOT NULL,
  `mois` varchar(65) NOT NULL,
  `annee` varchar(65) NOT NULL,
  `session` varchar(64) NOT NULL,
  `agence` varchar(65) NOT NULL,
  `balance` decimal(65,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `historic`
--

INSERT INTO `historic` (`id`, `montant`, `action`, `heure`, `jour`, `mois`, `annee`, `session`, `agence`, `balance`) VALUES
(1, 5000.0000, 'emprunte', '2016-05-01 08:17:45', '01-05-2016', '05-2016', '2016', 'nowan', 'Nowan', 5000.0000),
(2, 5000.0000, 'rembourser', '2016-05-01 08:18:36', '01-05-2016', '05-2016', '2016', 'nowan', 'Nowan', 0.0000),
(3, 1500.0000, 'emprunte', '2016-05-01 08:26:21', '01-05-2016', '05-2016', '2016', 'nowan', 'Nowan', 1500.0000),
(4, 5000.0000, 'emprunte', '2016-05-01 08:28:11', '01-05-2016', '05-2016', '2016', 'nowan', 'herman', 5000.0000),
(5, 5000.0000, 'emprunte', '2016-05-01 08:28:30', '01-05-2016', '05-2016', '2016', 'nowan', 'herman', 10000.0000),
(6, 10000.0000, 'rembourser', '2016-05-01 08:28:56', '01-05-2016', '05-2016', '2016', 'nowan', 'herman', 0.0000),
(7, 250.0000, 'emprunte', '2016-05-01 08:31:16', '01-05-2016', '05-2016', '2016', 'nowan', 'Nowan', 250.0000),
(8, 250.0000, 'rembourser', '2016-05-01 08:31:35', '01-05-2016', '05-2016', '2016', 'nowan', 'Nowan', 0.0000);

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marchandise` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL,
  `prix` decimal(64,5) NOT NULL,
  `montant` decimal(64,5) NOT NULL,
  `agence` varchar(50) NOT NULL,
  `jour` varchar(15) NOT NULL,
  `mois` varchar(10) NOT NULL,
  `annee` varchar(5) NOT NULL,
  `heure` time NOT NULL,
  `transaction` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `balance` decimal(64,5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `olv_marchandises`
--

CREATE TABLE IF NOT EXISTS `olv_marchandises` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marchandise` varchar(50) NOT NULL,
  `agence` varchar(50) NOT NULL,
  `prix` decimal(64,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL,
  `symbol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`symbol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `portfolio`
--

INSERT INTO `portfolio` (`id`, `symbol`, `shares`) VALUES
(20, 'FREE', 8),
(20, 'KJ', 3);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

CREATE TABLE IF NOT EXISTS `tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marchandise` varchar(50) NOT NULL,
  `prix` decimal(64,5) DEFAULT '0.00000',
  `agence` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`id`, `marchandise`, `prix`, `agence`) VALUES
(21, 'cabelo', 0.00000, 'mkf'),
(22, 'telephones', 0.00000, 'mkf'),
(23, 'materiel_informatique', 0.00000, 'mkf'),
(24, 'body', 0.00000, 'mkf'),
(25, 'autres', 0.00000, 'mkf');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`),
  KEY `username_2` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `code`) VALUES
(1, 'souve', '75uxqw2uembt2', '56dn6ovWzEsxo'),
(2, 'nowan', '$1$0N1.HN4.$obJ3AEqZL3cGRaw6BSifn1', '56dn6ovWzEsxo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
