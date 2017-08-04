-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 03 Novembre 2015 à 19:09
-- Version du serveur :  5.6.26
-- Version de PHP :  5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `olivier`
--

-- --------------------------------------------------------

--
-- Structure de la table `agences`
--

CREATE TABLE IF NOT EXISTS `agences` (
  `id` int(11) NOT NULL,
  `agence` varchar(50) NOT NULL,
  `marchandise` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agences`
--

INSERT INTO `agences` (`id`, `agence`, `marchandise`, `qte`) VALUES
(1, 'mkf', 'cabelo', 0),
(2, 'mkf', 'telephones', 0),
(3, 'mkf', 'body', 0),
(4, 'mkf', 'materiel_informatique', 0),
(5, 'kabba', 'cabelo', 1),
(6, 'kabba', 'telephones', 2),
(7, 'kabba', 'body', 2),
(8, 'kabba', 'materiel_informatique', 2),
(9, 'drames', 'cabelo', 0),
(10, 'drames', 'telephones', 0),
(11, 'drames', 'body', 0),
(12, 'drames', 'materiel_informatique', 0),
(13, 'sk5', 'cabelo', 0),
(14, 'sk5', 'telephones', 0),
(15, 'sk5', 'body', 0),
(16, 'sk5', 'materiel_informatique', 0),
(17, 'atc', 'cabelo', 23),
(18, 'atc', 'telephones', 0),
(19, 'atc', 'body', 40),
(20, 'atc', 'materiel_informatique', 0),
(21, 'pm', 'cabelo', 10),
(22, 'pm', 'telephones', 0),
(23, 'pm', 'body', 30),
(24, 'pm', 'materiel_informatique', 0),
(25, 'mkf', 'autres', 0),
(26, 'kabba', 'autres', 0),
(27, 'pm', 'autres', 0),
(28, 'atc', 'autres', 0),
(29, 'sk5', 'autres', 0),
(30, 'drames', 'autres', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `id` int(11) NOT NULL,
  `agence` varchar(50) NOT NULL,
  `cash` decimal(64,5) NOT NULL DEFAULT '0.00000'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cash`
--

INSERT INTO `cash` (`id`, `agence`, `cash`) VALUES
(1, 'mkf', '2568.00000'),
(2, 'kabba', '537.00000'),
(3, 'drames', '85.00000'),
(4, 'sk5', '170.00000'),
(5, 'atc', '3.00000'),
(6, 'pm', '2400.00000');

-- --------------------------------------------------------

--
-- Structure de la table `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `id` int(11) NOT NULL,
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
  `balance` decimal(64,5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `marchandise`, `qte`, `prix`, `montant`, `agence`, `jour`, `mois`, `annee`, `heure`, `transaction`, `user`, `balance`) VALUES
(1, 'cabelo', 23, '75.00000', '1725.00000', 'mkf', '03-11-2015', '11-2015', '2015', '02:56:50', 'douane', 'souve', '1725.00000'),
(2, 'telephones', 13, '80.00000', '1040.00000', 'mkf', '03-11-2015', '11-2015', '2015', '02:56:50', 'douane', 'souve', '2765.00000'),
(3, 'body', 5, '55.00000', '275.00000', 'mkf', '03-11-2015', '11-2015', '2015', '02:56:50', 'douane', 'souve', '3040.00000'),
(4, 'materiel_informatique', 24, '55.00000', '1320.00000', 'mkf', '03-11-2015', '11-2015', '2015', '02:56:50', 'douane', 'souve', '4360.00000'),
(5, 'autres', 45, '80.00000', '3600.00000', 'mkf', '03-11-2015', '11-2015', '2015', '02:56:51', 'douane', 'souve', '7960.00000'),
(6, '----', 0, '0.00000', '5000.00000', 'mkf', '03-11-2015', '11-2015', '2015', '03:01:24', 'rembourser', 'souve', '3010.00000'),
(7, '----', 0, '0.00000', '100.00000', 'mkf', '03-11-2015', '11-2015', '2015', '03:01:41', 'rembourser', 'souve', '2910.00000'),
(8, '----', 0, '0.00000', '342.00000', 'mkf', '03-11-2015', '11-2015', '2015', '03:01:59', 'rembourser', 'souve', '2568.00000');

-- --------------------------------------------------------

--
-- Structure de la table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL,
  `symbol` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `shares` int(11) NOT NULL
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
  `id` int(11) NOT NULL,
  `marchandise` varchar(50) NOT NULL,
  `prix` decimal(64,5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`id`, `marchandise`, `prix`) VALUES
(1, 'cabelo', '75.00000'),
(2, 'telephones', '80.00000'),
(3, 'body', '55.00000'),
(4, 'materiel_informatique', '55.00000'),
(5, 'autres', '80.00000');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `code`) VALUES
(1, 'souve', '75uxqw2uembt2', '56dn6ovWzEsxo'),
(2, 'nowan', '$1$0N1.HN4.$obJ3AEqZL3cGRaw6BSifn1', '56dn6ovWzEsxo'),
(3, 'azerty', '264Rgu.UdC3cQ', '56dn6ovWzEsxo'),
(4, 'zer', '56dn6ovWzEsxo', '56dn6ovWzEsxo');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`symbol`);

--
-- Index pour la table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id` (`id`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `agences`
--
ALTER TABLE `agences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
