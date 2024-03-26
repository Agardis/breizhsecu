-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mar 25 Janvier 2022 à 13:22
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bzhsec`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE IF NOT EXISTS `avis` (
  `idavis` int(11) NOT NULL AUTO_INCREMENT,
  `idcompte` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `date` date NOT NULL,
  `titre` varchar(30) NOT NULL,
  `texte` mediumtext NOT NULL,
  PRIMARY KEY (`idavis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`idavis`, `idcompte`, `idproduit`, `date`, `titre`, `texte`) VALUES
(1, 2, 1, '2022-01-05', 'Magnifique et sobre', 'Très content de mon achat, un régal pour les yeux'),
(3, 4, 1, '2022-01-18', 'mon mari adore', 'tres beau'),
(4, 6, 14, '2022-01-19', 'Mangifique, tres féminin', 'Très joli pour un cadeau'),
(5, 4, 1, '2022-01-19', 'je vais l''acheter', 'je reve d''en faire l''achat');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `idcat` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(25) NOT NULL DEFAULT '0',
  `ordre` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcat`, `titre`, `ordre`) VALUES
(1, 'Montres', 1),
(2, 'Bagues', 2),
(3, 'Colliers', 3),
(4, 'Bracelets', 4),
(5, 'Boucles d''oreilles', 5);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idcde` int(11) NOT NULL AUTO_INCREMENT,
  `idcompte` int(11) NOT NULL,
  `date` date NOT NULL,
  `statut` varchar(10) NOT NULL,
  PRIMARY KEY (`idcde`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`idcde`, `idcompte`, `date`, `statut`) VALUES
(1, 4, '2022-01-18', 'Payée'),
(4, 4, '2022-01-18', 'Payée'),
(5, 4, '2022-01-18', 'Payée'),
(6, 4, '2022-01-18', 'Payée'),
(7, 6, '2022-01-19', 'Payée');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `identifiant` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id`, `nom`, `prenom`, `identifiant`, `password`, `adresse`, `statut`) VALUES
(1, 'Alderson', 'Elliot', 'admin', 'admin', '217 E Broadway, 10002 New York', 'admin'),
(2, 'Durand', 'Pierre', 'pdurand', 'motdepasse', '', 'Utilisateur'),
(3, 'Smith', 'John', 'jsmith', 'password', '', 'Utilisateur'),
(4, 'user', 'user', 'user', 'user', '242 avenue de la Libération, 29000 Quimper', 'Utilisateur'),
(5, 'Potter', 'Harry', 'poudlard', 'magie', '', 'Utilisateur'),
(6, 'Wayne', 'John', 'wayne', 'john', 'Old River, Colorado', 'Utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `detailcommande`
--

CREATE TABLE IF NOT EXISTS `detailcommande` (
  `iddetail` int(11) NOT NULL AUTO_INCREMENT,
  `idcde` int(11) NOT NULL,
  `idproduit` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`iddetail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `detailcommande`
--

INSERT INTO `detailcommande` (`iddetail`, `idcde`, `idproduit`, `qte`) VALUES
(1, 1, 1, 2),
(2, 1, 2, 2),
(3, 5, 20, 1),
(4, 5, 21, 1),
(5, 6, 20, 1),
(6, 6, 21, 1),
(7, 7, 1, 1),
(8, 7, 25, 2);

-- --------------------------------------------------------

--
-- Structure de la table `nouveautes`
--

CREATE TABLE IF NOT EXISTS `nouveautes` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `nouveautes`
--

INSERT INTO `nouveautes` (`id`) VALUES
(1),
(4),
(5),
(12),
(3),
(11),
(22),
(21),
(20);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `idproduit` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` mediumtext NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `idcat` int(11) NOT NULL,
  PRIMARY KEY (`idproduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idproduit`, `titre`, `description`, `prix`, `idcat`) VALUES
(1, 'Montre homme classique', 'Bracelet cuir, élégant et discret', '150', 1),
(2, 'Gentleman today', 'Montre pour les hommes de caractère', '99', 1),
(3, 'Highway', 'Branché et classique', '250', 1),
(4, 'Waterproof', 'Montre sport, waterproof, profondeur 5m', '120', 1),
(5, 'Classique Homme', 'Elegante et discret', '119', 1),
(6, 'Brazilian style', 'Bracelet cuir blanc', '350', 1),
(7, 'Montre femme élégante', 'Délicate et féminine', '129', 1),
(8, 'Milano Sun', 'Bracelet cuir, élégante et discrete', '99', 1),
(9, 'Del Sol', 'Brillante, bracelet large', '119', 1),
(10, 'Montre homme classique', 'Bracelet argent', '149', 1),
(11, 'Femina', 'Délicate et superbement ouvragée', '139', 1),
(12, 'Spain Style', 'Forte et puissante', '99', 1),
(13, 'Bague Dragon', 'Magnifique bague Dragon Dreamworks', '99', 2),
(14, 'Bague Coeur rouge', 'Or blanc', '99', 2),
(15, 'Histoire et passion', 'Or blanc, coeur précieux', '199', 2),
(16, 'Solitaire', 'Délicatement ouvragrée', '129', 2),
(17, 'Amour Eternel', 'Idéale fiançailles', '399', 2),
(19, 'Goutte d''Amour', 'Magnifique bague Dragon Dreamworks', '99', 3),
(20, 'Cendrillon', 'Pour les princesses', '199', 3),
(21, 'Coeur Eternel', 'Idéale fiançailles', '139', 3),
(22, 'Collier precioso', 'Or blanc', '399', 3),
(23, 'Histoire De coeur', 'Or, un bijou authentique de notre collection', '339', 3),
(24, 'Fleur de diamant', 'Or blanc, ciselée avec zircon', '339', 3),
(25, 'Bracelet passionnata', 'Métal doré, attache avec fermoir', '99', 4),
(26, 'Rouge passion', 'Elégant et raffiné, ce bracelet saura vous séduire', '199', 4),
(27, 'Maillage or', 'Maillage précieux et fin pour les poignets précieux', '349', 4),
(28, 'Maillage argent', 'Bracelet en argent', '79', 4),
(29, 'Un jour', 'Original et contemporain', '99', 5),
(30, 'Etoile', 'D''un brillant éclatant pour mettre en valeur une parure', '199', 5),
(31, 'Eclat de neige', 'Du Zircon dans tous ses états', '359', 5),
(32, 'Noeud Zirconia', 'Féminin et élégant', '79', 5),
(33, 'Améthia', 'Cloux précieux', '79', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
