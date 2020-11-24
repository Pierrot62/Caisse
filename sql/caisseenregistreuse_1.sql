-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 nov. 2020 à 11:01
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `caisseenregistreuse`
--
CREATE DATABASE IF NOT EXISTS `caisseenregistreuse` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `caisseenregistreuse`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `idArticle` int(11) NOT NULL AUTO_INCREMENT,
  `libelleArticle` varchar(50) NOT NULL,
  `prixHt` float NOT NULL,
  `codeBarre` varchar(50) NOT NULL,
  `idTva` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`),
  KEY `fk_article_tva` (`idTva`),
  KEY `fk_article_categorie` (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `libelleArticle`, `prixHt`, `codeBarre`, `idTva`, `idCategorie`) VALUES(3, 'Crayon', 25.45, '5447746843515', 1, 1);
INSERT INTO `article` (`idArticle`, `libelleArticle`, `prixHt`, `codeBarre`, `idTva`, `idCategorie`) VALUES(4, 'pate', 1.5, '548475484845', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `caisse`
--

DROP TABLE IF EXISTS `caisse`;
CREATE TABLE IF NOT EXISTS `caisse` (
  `idCaisse` int(11) NOT NULL AUTO_INCREMENT,
  `nomCaisse` varchar(50) NOT NULL,
  `totalCaisse` int(11) NOT NULL,
  `date` date NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`idCaisse`),
  KEY `fk_caisse_user` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `caisse`
--

INSERT INTO `caisse` (`idCaisse`, `nomCaisse`, `totalCaisse`, `date`, `idUser`) VALUES(1, 'caisse1', 1500, '2020-11-24', 2);
INSERT INTO `caisse` (`idCaisse`, `nomCaisse`, `totalCaisse`, `date`, `idUser`) VALUES(2, 'caisse2', 120, '2020-11-24', 3);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idCategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelleCategorie` varchar(50) NOT NULL,
  PRIMARY KEY (`idCategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelleCategorie`) VALUES(1, 'papeterie');
INSERT INTO `categorie` (`idCategorie`, `libelleCategorie`) VALUES(2, 'alimentaire');

-- --------------------------------------------------------

--
-- Structure de la table `ligneticket`
--

DROP TABLE IF EXISTS `ligneticket`;
CREATE TABLE IF NOT EXISTS `ligneticket` (
  `idLigneTicket` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL,
  `prixHt` float NOT NULL,
  `montantTva` float NOT NULL,
  `idTicket` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`idLigneTicket`),
  KEY `fk_ligneTicket_ticket` (`idTicket`),
  KEY `fk_ligneTicket_article` (`idArticle`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ligneticket`
--

INSERT INTO `ligneticket` (`idLigneTicket`, `quantite`, `prixHt`, `montantTva`, `idTicket`, `idArticle`) VALUES(1, 5, 10, 3, 1, 3);
INSERT INTO `ligneticket` (`idLigneTicket`, `quantite`, `prixHt`, `montantTva`, `idTicket`, `idArticle`) VALUES(2, 2, 2.5, 2, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `modepaiement`
--

DROP TABLE IF EXISTS `modepaiement`;
CREATE TABLE IF NOT EXISTS `modepaiement` (
  `idModePaiement` int(11) NOT NULL AUTO_INCREMENT,
  `typePaiement` varchar(50) NOT NULL,
  PRIMARY KEY (`idModePaiement`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modepaiement`
--

INSERT INTO `modepaiement` (`idModePaiement`, `typePaiement`) VALUES(1, 'Carte bancaire');
INSERT INTO `modepaiement` (`idModePaiement`, `typePaiement`) VALUES(2, 'Cheque');
INSERT INTO `modepaiement` (`idModePaiement`, `typePaiement`) VALUES(3, 'espece');

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `idPaiement` int(11) NOT NULL AUTO_INCREMENT,
  `idModePaiement` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL,
  `prixTTC` float NOT NULL,
  PRIMARY KEY (`idPaiement`),
  KEY `fk_paiement_ModePaiement` (`idModePaiement`),
  KEY `fk_paiement_Ticket` (`idTicket`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`idPaiement`, `idModePaiement`, `idTicket`, `prixTTC`) VALUES(1, 1, 1, 10);
INSERT INTO `paiement` (`idPaiement`, `idModePaiement`, `idTicket`, `prixTTC`) VALUES(2, 3, 1, 3.75);

-- --------------------------------------------------------

--
-- Structure de la table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `prixHT` float NOT NULL,
  `date` date NOT NULL,
  `montantTVA` float NOT NULL,
  PRIMARY KEY (`idTicket`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ticket`
--

INSERT INTO `ticket` (`idTicket`, `prixHT`, `date`, `montantTVA`) VALUES(1, 12.5, '2020-11-24', 1.25);

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

DROP TABLE IF EXISTS `tva`;
CREATE TABLE IF NOT EXISTS `tva` (
  `idTva` int(11) NOT NULL AUTO_INCREMENT,
  `tauxTva` float NOT NULL,
  PRIMARY KEY (`idTva`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`idTva`, `tauxTva`) VALUES(1, 20);
INSERT INTO `tva` (`idTva`, `tauxTva`) VALUES(2, 10);
INSERT INTO `tva` (`idTva`, `tauxTva`) VALUES(3, 5.5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(50) NOT NULL,
  `motDePasse` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `identifiant`, `motDePasse`, `role`) VALUES(2, 'user', 'user', 1);
INSERT INTO `user` (`idUser`, `identifiant`, `motDePasse`, `role`) VALUES(3, 'admin', 'admin', 100);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_article_categorie` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`),
  ADD CONSTRAINT `fk_article_tva` FOREIGN KEY (`idTva`) REFERENCES `tva` (`idTva`);

--
-- Contraintes pour la table `caisse`
--
ALTER TABLE `caisse`
  ADD CONSTRAINT `fk_caisse_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `ligneticket`
--
ALTER TABLE `ligneticket`
  ADD CONSTRAINT `fk_ligneTicket_article` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`),
  ADD CONSTRAINT `fk_ligneTicket_ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `fk_paiement_ModePaiement` FOREIGN KEY (`idModePaiement`) REFERENCES `modepaiement` (`idModePaiement`),
  ADD CONSTRAINT `fk_paiement_Ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
