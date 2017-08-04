-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 25 Décembre 2015 à 18:09
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `agences`
--

INSERT INTO `agences` (`id`, `agence`, `marchandise`, `qte`) VALUES
(1, 'MKF', 'cabelo', 0),
(2, 'MKF', 'telephones', 0),
(3, 'MKF', 'materiel_informatique', 0),
(4, 'MKF', 'body', 0),
(5, 'MKF', 'autres', 0),
(6, 'SK Corporation', 'cabelo', 0),
(7, 'SK Corporation', 'telephones', 0),
(8, 'SK Corporation', 'materiel_informatique', 0),
(9, 'SK Corporation', 'body', 0),
(10, 'SK Corporation', 'autres', 0),
(11, 'yan', 'cabelo', 0),
(12, 'yan', 'telephones', 0),
(13, 'yan', 'materiel_informatique', 0),
(14, 'yan', 'body', 0),
(15, 'yan', 'autres', 0),
(16, 'Lukaya', 'cabelo', 0),
(17, 'Lukaya', 'telephones', 0),
(18, 'Lukaya', 'materiel_informatique', 0),
(19, 'Lukaya', 'body', 2),
(20, 'Lukaya', 'autres', 0);

-- --------------------------------------------------------

--
-- Structure de la table `autre`
--

CREATE TABLE IF NOT EXISTS `autre` (
  `id` int(11) NOT NULL,
  `montant` decimal(65,4) NOT NULL DEFAULT '0.0000',
  `agence` varchar(65) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `autre`
--

INSERT INTO `autre` (`id`, `montant`, `agence`) VALUES
(1, '0.0000', 'autre'),
(2, '0.0000', 'kebbe'),
(4, '0.0000', 'uufez'),
(5, '0.0000', 'nowan');

-- --------------------------------------------------------

--
-- Structure de la table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `id` int(11) NOT NULL,
  `agence` varchar(50) NOT NULL,
  `cash` decimal(64,5) NOT NULL DEFAULT '0.00000',
  `chef` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cash`
--

INSERT INTO `cash` (`id`, `agence`, `cash`, `chef`, `telephone`) VALUES
(1, 'MKF', '150.00000', 'nowan', '8913423333'),
(2, 'SK Corporation', '67.00000', 'Souvenance', '0896358335'),
(3, 'yan', '0.00000', 'Muluku', '625253764376'),
(4, 'Lukaya', '570.00000', 'Kimba', '98786');

-- --------------------------------------------------------

--
-- Structure de la table `cash_autre`
--

CREATE TABLE IF NOT EXISTS `cash_autre` (
  `id` int(11) NOT NULL DEFAULT '0',
  `cash` decimal(64,5) NOT NULL DEFAULT '0.00000',
  `chef` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cash_autre`
--

INSERT INTO `cash_autre` (`id`, `cash`, `chef`, `telephone`) VALUES
(0, '370.00000', 'kebbe', '08976535'),
(0, '1567.00000', 'souve', '0896358335'),
(0, '170.00000', 'uufez', '7665'),
(0, '110.00000', 'nowan', '87');

-- --------------------------------------------------------

--
-- Structure de la table `historic`
--

CREATE TABLE IF NOT EXISTS `historic` (
  `id` int(15) NOT NULL,
  `montant` decimal(65,4) NOT NULL,
  `action` varchar(65) NOT NULL,
  `heure` datetime NOT NULL,
  `jour` text NOT NULL,
  `mois` varchar(65) NOT NULL,
  `annee` varchar(65) NOT NULL,
  `session` varchar(64) NOT NULL,
  `agence` varchar(65) NOT NULL,
  `balance` decimal(65,4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `historic`
--

INSERT INTO `historic` (`id`, `montant`, `action`, `heure`, `jour`, `mois`, `annee`, `session`, `agence`, `balance`) VALUES
(8, '200.0000', 'emprunte', '2015-11-05 19:03:43', '05-11-2015', '11-2015', '2015', 'nowan', 'autre', '300.0000'),
(9, '300.0000', 'rembourser', '2015-11-05 19:06:00', '05-11-2015', '11-2015', '2015', 'nowan', 'autre', '0.0000'),
(10, '200.0000', 'emprunte', '2015-11-05 19:06:42', '05-11-2015', '11-2015', '2015', 'nowan', 'autre', '200.0000'),
(11, '100.0000', 'rembourser', '2015-11-05 19:06:49', '05-11-2015', '11-2015', '2015', 'nowan', 'autre', '100.0000'),
(12, '234.0000', 'emprunte', '2015-11-07 10:12:15', '07-11-2015', '11-2015', '2015', 'souve', 'autre', '334.0000'),
(13, '34.0000', 'rembourser', '2015-11-07 10:12:25', '07-11-2015', '11-2015', '2015', 'souve', 'autre', '300.0000'),
(14, '300.0000', 'rembourser', '2015-11-18 15:51:16', '18-11-2015', '11-2015', '2015', 'nowan', 'autre', '0.0000'),
(15, '3000.0000', 'emprunte', '2015-11-18 15:51:32', '18-11-2015', '11-2015', '2015', 'nowan', 'autre', '3000.0000'),
(16, '2700.0000', 'rembourser', '2015-11-18 15:51:48', '18-11-2015', '11-2015', '2015', 'nowan', 'autre', '300.0000'),
(17, '2000.0000', 'emprunte', '2015-11-18 15:52:01', '18-11-2015', '11-2015', '2015', 'nowan', 'autre', '2300.0000'),
(18, '2300.0000', 'rembourser', '2015-11-18 15:52:12', '18-11-2015', '11-2015', '2015', 'nowan', 'autre', '0.0000'),
(19, '100.0000', 'emprunte', '2015-12-25 16:35:59', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '0.0000'),
(20, '100.0000', 'emprunte', '2015-12-25 16:37:46', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '100.0000'),
(21, '20.0000', 'emprunte', '2015-12-25 16:37:57', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '120.0000'),
(22, '30.0000', 'emprunte', '2015-12-25 16:40:20', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '150.0000'),
(23, '30.0000', 'rembourser', '2015-12-25 16:40:27', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '120.0000'),
(24, '50.0000', 'emprunte', '2015-12-25 16:42:07', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '170.0000'),
(25, '32.0000', 'emprunte', '2015-12-25 16:46:30', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '202.0000'),
(26, '32.0000', 'rembourser', '2015-12-25 16:46:37', '25-12-2015', '12-2015', '2015', 'souve', 'uufez', '170.0000'),
(27, '1000.0000', 'emprunte', '2015-12-25 16:49:49', '25-12-2015', '12-2015', '2015', 'souve', 'souve', '1567.0000'),
(31, '1351.0000', 'emprunte', '2015-12-25 17:06:50', '25-12-2015', '12-2015', '2015', 'souve', 'nowan', '1440.0000'),
(33, '25.0000', 'emprunte', '2015-12-25 17:07:01', '25-12-2015', '12-2015', '2015', 'souve', 'nowan', '1409.0000'),
(34, '543.0000', 'emprunte', '2015-12-25 17:07:27', '25-12-2015', '12-2015', '2015', 'souve', 'nowan', '1952.0000'),
(35, '1942.0000', 'rembourser', '2015-12-25 17:07:43', '25-12-2015', '12-2015', '2015', 'souve', 'nowan', '10.0000'),
(36, '100.0000', 'emprunte', '2015-12-25 17:07:56', '25-12-2015', '12-2015', '2015', 'souve', 'nowan', '110.0000'),
(37, '100.0000', 'emprunte', '2015-12-25 17:09:40', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '100.0000'),
(38, '10.0000', 'emprunte', '2015-12-25 17:09:44', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '110.0000'),
(39, '234.0000', 'emprunte', '2015-12-25 17:10:34', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '234.0000'),
(40, '4.0000', 'rembourser', '2015-12-25 17:10:39', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '230.0000'),
(41, '5.0000', 'emprunte', '2015-12-25 17:10:50', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '235.0000'),
(42, '45.0000', 'emprunte', '2015-12-25 17:11:11', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '275.0000'),
(43, '10.0000', 'emprunte', '2015-12-25 17:11:30', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '285.0000'),
(44, '14.0000', 'emprunte', '2015-12-25 17:14:06', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '244.0000'),
(45, '100.0000', 'emprunte', '2015-12-25 17:14:14', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '344.0000'),
(46, '6.0000', 'emprunte', '2015-12-25 17:15:01', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '350.0000'),
(47, '20.0000', 'emprunte', '2015-12-25 17:15:51', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '370.0000'),
(48, '30.0000', 'emprunte', '2015-12-25 17:16:00', '25-12-2015', '12-2015', '2015', 'souve', 'kebbe', '400.0000');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `history`
--

INSERT INTO `history` (`id`, `marchandise`, `qte`, `prix`, `montant`, `agence`, `jour`, `mois`, `annee`, `heure`, `transaction`, `user`, `balance`) VALUES
(2, 'Transport', 0, '0.00000', '1230.00000', 'MKF', '24-12-2015', '12-2015', '2015', '08:58:54', 'Aj. Cash', 'souve', '1940.00000'),
(3, '----', 0, '0.00000', '170.00000', 'MKF', '24-12-2015', '12-2015', '2015', '08:59:39', 'rembourser', 'souve', '3000.00000'),
(5, '----', 0, '0.00000', '3000.00000', 'MKF', '24-12-2015', '12-2015', '2015', '09:20:48', 'rembourser', 'souve', '50.00000'),
(6, 'oiu', 0, '0.00000', '100.00000', 'MKF', '24-12-2015', '12-2015', '2015', '09:21:12', 'Aj. Cash', 'souve', '150.00000'),
(7, 'Transport', 0, '0.00000', '100.00000', 'SK Corporation', '16-3-1995', '3-1995', '1995', '07:40:33', 'Aj. Cash', 'souve', '100.00000'),
(8, '----', 0, '0.00000', '56.00000', 'SK Corporation', '25-12-2015', '12-2015', '2015', '07:42:50', 'rembourser', 'souve', '44.00000'),
(9, 'rr', 0, '0.00000', '23.00000', 'SK Corporation', '25-12-2015', '12-2015', '2015', '07:43:14', 'Aj. Cash', 'souve', '67.00000'),
(10, 'cabelo', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:19:54', 'douane', 'souve', '20.00000'),
(11, 'telephones', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:19:54', 'douane', 'souve', '40.00000'),
(12, 'materiel_informatique', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:19:54', 'douane', 'souve', '60.00000'),
(13, 'body', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:19:54', 'douane', 'souve', '80.00000'),
(14, 'autres', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:19:55', 'douane', 'souve', '100.00000'),
(15, '----', 0, '0.00000', '50.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:20:49', 'rembourser', 'souve', '50.00000'),
(16, 'cabelo', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:21:03', 'douane', 'souve', '70.00000'),
(17, 'body', 2, '10.00000', '20.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:21:03', 'douane', 'souve', '90.00000'),
(18, 'Transport Nowan', 0, '0.00000', '500.00000', 'Lukaya', '25-12-2015', '12-2015', '2015', '17:22:27', 'Aj. Cash', 'souve', '570.00000');

-- --------------------------------------------------------

--
-- Structure de la table `olv_marchandises`
--

CREATE TABLE IF NOT EXISTS `olv_marchandises` (
  `id` int(11) NOT NULL,
  `marchandise` varchar(50) NOT NULL,
  `agence` varchar(50) NOT NULL,
  `prix` decimal(64,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `prix` decimal(64,5) DEFAULT '0.00000',
  `agence` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tarif`
--

INSERT INTO `tarif` (`id`, `marchandise`, `prix`, `agence`) VALUES
(1, 'cabelo', '70.00000', 'MKF'),
(2, 'telephones', '10.00000', 'MKF'),
(3, 'materiel_informatique', '25.00000', 'MKF'),
(4, 'body', '35.00000', 'MKF'),
(5, 'autres', '123.00000', 'MKF'),
(6, 'cabelo', '10.00000', 'SK Corporation'),
(7, 'telephones', '25.00000', 'SK Corporation'),
(8, 'materiel_informatique', '35.00000', 'SK Corporation'),
(9, 'body', '15.00000', 'SK Corporation'),
(10, 'autres', '45.00000', 'SK Corporation'),
(11, 'cabelo', '0.00000', 'yan'),
(12, 'telephones', '0.00000', 'yan'),
(13, 'materiel_informatique', '0.00000', 'yan'),
(14, 'body', '0.00000', 'yan'),
(15, 'autres', '0.00000', 'yan'),
(16, 'cabelo', '10.00000', 'Lukaya'),
(17, 'telephones', '10.00000', 'Lukaya'),
(18, 'materiel_informatique', '10.00000', 'Lukaya'),
(19, 'body', '10.00000', 'Lukaya'),
(20, 'autres', '10.00000', 'Lukaya');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`, `code`) VALUES
(1, 'souve', '75uxqw2uembt2', '56dn6ovWzEsxo'),
(2, 'nowan', '$1$0N1.HN4.$obJ3AEqZL3cGRaw6BSifn1', '56dn6ovWzEsxo'),
(3, 'azerty', '264Rgu.UdC3cQ', '56dn6ovWzEsxo'),
(4, 'zer', '56dn6ovWzEsxo', '56dn6ovWzEsxo'),
(5, 'judith', '30W/iNqQHFCS2', '56dn6ovWzEsxo'),
(6, 'giresse', '2200sFH4/8Njw', '56dn6ovWzEsxo'),
(7, 'jose', '90Fpd408Fdbmw', 'intel'),
(9, 'joseline', '55Gl2tLMjuvYc', 'intel'),
(10, 'pascal', '58NiB7Sy5luvo', '$1$AR..JC5.$9d235HeqlA8Bny6Uw9M051');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `agences`
--
ALTER TABLE `agences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `autre`
--
ALTER TABLE `autre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cash`
--
ALTER TABLE `cash`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `historic`
--
ALTER TABLE `historic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `olv_marchandises`
--
ALTER TABLE `olv_marchandises`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `autre`
--
ALTER TABLE `autre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `cash`
--
ALTER TABLE `cash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `historic`
--
ALTER TABLE `historic`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `olv_marchandises`
--
ALTER TABLE `olv_marchandises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
