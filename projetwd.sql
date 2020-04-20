-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 avr. 2020 à 20:46
-- Version du serveur :  10.4.10-MariaDB
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
-- Base de données :  `projetwd`
--

-- --------------------------------------------------------

--
-- Structure de la table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `acheteur`
--

INSERT INTO `acheteur` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`) VALUES
(1, 'Ferrier', 'Thomas', 'thom.ferrier@gmail.com', 'bleudywind99'),
(79, 'Robert', 'Pierre', 'robespierre@gmail.com', 'rob'),
(80, 'Mesquita', 'Octave', 'octy@gmail.com', 'blop');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Rue` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CodePostal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Numero` varchar(255) NOT NULL,
  `Roles` int(2) NOT NULL,
  `IDacheteur` int(11) NOT NULL,
  `IDvendeur` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `IDacheteur` (`IDacheteur`),
  KEY `IDvendeur` (`IDvendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`ID`, `Nom`, `Prenom`, `Rue`, `Ville`, `CodePostal`, `Pays`, `Numero`, `Roles`, `IDacheteur`, `IDvendeur`) VALUES
(1, 'blop', 'blip', '37 rue Charles Laffitte', 'neuilly', '92200 ', 'France', '0661656459', 0, 1, 0),
(2, 'Robert', 'Pierre', '10 place de la bastille', 'Paris', '75004', 'France', '0654685921', 0, 79, 0),
(3, 'Pierre', 'Marie', '3 place de la Motte ', 'Paris', '75011', 'France', '0645829365', 1, 0, 3),
(4, 'Red', 'Boule', '45 rue paul deroulÃ¨de', 'Neuilly Sur Seine ', '92200', 'France', '0654823957', 1, 0, 4),
(5, 'Mesquita', 'Octave', '218 rue gabriel peri', 'Vitry sur Seine', '94140', 'France', '0648897754', 0, 80, 0);

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Prix` int(10) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Heure` varchar(255) NOT NULL,
  `DateFin` varchar(255) NOT NULL,
  `objetID` int(11) NOT NULL,
  `acheteurID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `objetID` (`objetID`),
  KEY `acheteurID` (`acheteurID`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enchere`
--

INSERT INTO `enchere` (`ID`, `Prix`, `Date`, `Heure`, `DateFin`, `objetID`, `acheteurID`) VALUES
(1, 700, '2020-04-20', '20:15', '2021-04-20', 28, 80),
(2, 10000, '2020-04-20', '20:15', '2021-04-20', 29, -1),
(3, 86000, '2020-04-20', '20:15', '2021-04-25', 30, 1),
(4, 354210, '2020-04-20', '20:10', '2021-04-20', 31, -1),
(5, 1, '2020-04-20', '20:15', '2021-04-20', 27, -1),
(6, 50, '2020-04-20', '20:15', '2021-04-20', 32, -1),
(7, 1501, '2020-04-20', '21:15', '2021-04-20', 33, 79),
(8, 1000, '2020-04-20', '21:15', '2025-04-20', 35, 1);

-- --------------------------------------------------------

--
-- Structure de la table `meilleursoffres`
--

DROP TABLE IF EXISTS `meilleursoffres`;
CREATE TABLE IF NOT EXISTS `meilleursoffres` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Prix` int(10) NOT NULL,
  `Essaie` int(10) NOT NULL,
  `objetID` int(11) NOT NULL,
  `acheteurID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `acheteurID` (`acheteurID`),
  KEY `objetID` (`objetID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `objet`
--

DROP TABLE IF EXISTS `objet`;
CREATE TABLE IF NOT EXISTS `objet` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Categorie` varchar(255) NOT NULL,
  `Prix` int(11) NOT NULL,
  `extension_img` varchar(255) NOT NULL,
  `vendeurID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `vendeurID` (`vendeurID`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `objet`
--

INSERT INTO `objet` (`ID`, `Description`, `Nom`, `Categorie`, `Prix`, `extension_img`, `vendeurID`) VALUES
(28, 'Couteau ayant dÃ©ja servi mais de trÃ¨s bonne qualitÃ©', 'Couteau ', 'Ferraille ou Tresors', 601, '.png.png.png', 3),
(29, 'Cannette de pepsi ayant appartenu a Mickael Jackson en personne', 'Cannette', 'Accessoire VIP', 10000, '.png.png.png', 3),
(30, 'Lot de peinture moderne rÃ©alisÃ© pas le grand artiste Red Boule', 'Lot de peinture', 'Bon pour le Musee', 85431, '.png.png.png', 4),
(31, 'magnifique sculpture homme taureau', 'L\'homme et le taureau', 'Bon pour le Musee', 354210, '.png.png.png', 4),
(27, 'Vend clou bonne qualite promis', 'Clou', 'Ferraille ou Tresors', 1, '.png.png.png', 3),
(32, 'lot de piece de collection 5 francs ', 'Piece', 'Ferraille ou Tresors', 50, '.png.png.jpg', 4),
(33, 'Lunnettes de collection portÃ©e par Charles de Gaulle', 'Lunnette', 'Ferraille ou Tresors', 1501, '.png.png.png', 1),
(35, 'C\'est notre Rais a nous : c\'est monsieur Rene Coty. Un grand homme. Il marquera l\'Histoire. Il aime les Cochinchinois, les Malgaches, les Marocains, les Senegalais. c\'est donc ton ami.', 'Rene Coty', 'Ferraille_ou_Tresors', 801, '.png.png.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `CVC` int(4) NOT NULL,
  `acheteurID` int(11) NOT NULL,
  `numero` varchar(16) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `acheteurID` (`acheteurID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `acheteurID` int(11) NOT NULL,
  `objetID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `acheteurID` (`acheteurID`),
  KEY `objetID` (`objetID`)
) ENGINE=MyISAM AUTO_INCREMENT=366 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`ID`, `acheteurID`, `objetID`) VALUES
(363, 79, 28),
(362, 1, 30),
(361, 1, 35),
(360, 1, 33),
(359, 1, 29);

-- --------------------------------------------------------

--
-- Structure de la table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  `Role` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vendeur`
--

INSERT INTO `vendeur` (`ID`, `Nom`, `Prenom`, `Email`, `MotDePasse`, `Role`) VALUES
(1, 'Dessouki', 'Lucas', 'lulu.dessouki@gmail.com', 'lulu', 1),
(3, 'Pierre', 'Marie', 'pierre.marie@gmail.com', 'pm', 1),
(4, 'Red', 'Boule', 'red.boule@edu.ece.fr', 'redbull', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
