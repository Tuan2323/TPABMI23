-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Mer 14 Décembre 2016 à 12:28
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bdformulaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `ladate` date NOT NULL,
  `lieu` varchar(25) NOT NULL,
  `adressepostale` text NOT NULL,
  `cp` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `site` varchar(100) NOT NULL,
  `telephone` varchar(25) NOT NULL,
  `semestre` varchar(3) NOT NULL,
  `niveauhtml` int(11) NOT NULL,
  `connaissances` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `date`, `lieu`, `adressepostale`, `cp`, `email`, `site`, `telephone`, `semestre`, `niveauhtml`, `connaissances`) VALUES
(1, 'MINKOUE OBAME', 'Anouchka', '1987-04-25', 'Reste du monde', '17 rue de la rÃ©publique', 76190, 'minkoueobamea@yahoo.fr', '0', '', '065', 0, ''),
(2, 'HAUCHARD', 'Kasic', '1980-04-01', 'Reste du monde', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76190, 'minkoueobamea@yahoo.fr', '0', '', '065', 0, ''),
(3, 'HAUCHARD', 'Kasic', '1980-04-01', 'Reste du monde', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76190, 'minkoueobamea@yahoo.fr', '0', '', '065', 0, ''),
(4, 'MINKOUE OBAME', 'Anouchka', '2016-11-10', '', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76190, 'minkoueobamea@yahoo.fr', '0', '', '066', 0, ''),
(5, 'TOTO', 'TATA', '2016-11-10', 'Reste du monde', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76190, 'minkoueobamea@yahoo.fr', '0', '', '066', 0, ''),
(6, 'skl!g!l', 'fgbhfbh', '2016-12-15', 'Saint Denis', 'b fb fngffdwcserbg', 89000, 'contact@cvflashjob.com', '0', '0664302278', '', 7, ''),
(7, 'skl!g!l', 'fgbhfbh', '2016-12-15', 'Saint Denis', 'b fb fngffdwcserbg', 89000, 'contact@cvflashjob.com', '0', '0664302278', '', 7, ''),
(8, 'skl!g!l', 'fgbhfbh', '2016-12-15', 'Saint Denis', 'b fb fngffdwcserbg', 89000, 'contact@cvflashjob.com', '0', '0664302278', '', 7, ''),
(9, 'Votre nomfrbhfddd', 'votre prÃ©nomdnhbnf', '2016-11-02', 'Saint Denis', 'b fxb fcxhngc', 75000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0664302278', '', 7, ''),
(10, 'Votre nomfgggdg', 'votre prÃ©nomdgrtg', '2016-11-27', 'Saint Denis', 'bgvdbvrdt', 75000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0664302278', '', 7, ''),
(11, 'Votre nomfgggdg', 'votre prÃ©nomdgrtg', '2016-11-27', 'Saint Denis', 'bgvdbvrdt', 75000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0664302278', '', 7, ''),
(12, 'Votre nomrfdq', 'votre prÃ©nomseqgd', '2016-12-23', 'Saint Denis', 'dwsvs', 76000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0658898531', '', 5, ''),
(13, 'Votre nomrfdq', 'votre prÃ©nomseqgd', '2016-12-23', 'Saint Denis', 'dwsvs', 76000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0658898531', '', 5, ''),
(14, 'Votre nomrfdq', 'votre prÃ©nomseqgd', '2016-12-23', 'Saint Denis', 'dwsvs', 76000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0658898531', '', 5, ''),
(15, 'Votre nomrfdq', 'votre prÃ©nomseqgd', '2016-12-23', 'Saint Denis', 'dwsvs', 76000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0658898531', '', 5, ''),
(16, 'Votre nomrfdq', 'votre prÃ©nomseqgd', '2016-12-23', 'Saint Denis', 'dwsvs', 76000, 'contact@cvflashjob.com', 'http://www.allkers.com', '0658898531', '', 5, ''),
(17, 'minkoue obame', 'anouchka', '2016-11-03', 'Reste du monde', 'qegtewrqdh', 67000, 'minkoueobamea@yahoo.fr', 'https://www.facebook.com/', '0658898341', 'S1', 7, ''),
(18, 'Lucien', 'Henry', '2016-11-18', 'Saint Denis', 'Rouen', 76000, 'contact@allkers.com', 'https://www.facebook.com/', '0658898341', 'S2', 8, ''),
(19, 'toutou', 'tutu', '2016-12-28', 'Reste du monde', 'zvzs', 76000, 'minkoueobamea@yahoo.fr', 'http://www.allkers.com', '0658898531', 'S2', 5, ''),
(20, 'ryyy', 'votre prÃ©nom', '0000-00-00', '', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76000, 'minkoueobamea@yahoo.fr', 'http://www.allkers.com', '0658898531', 'S2', 5, 'HTML.Formulaires.JavaScript'),
(21, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.Formulaires.JavaScript'),
(22, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.Formulaires.JavaScript'),
(23, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.CSS.Formulaires.JavaScript'),
(24, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.CSS.Formulaires'),
(25, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.CSS.JavaScript'),
(26, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.Formulaires.JavaScript'),
(27, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML.Formulaires.JavaScript'),
(28, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML,CSS,Formulaires'),
(29, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML,Formulaires,JavaScript'),
(30, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML,Formulaires,JavaScript'),
(31, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', '', 76000, 'toto@gmail.com', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 8, 'HTML,Formulaires,JavaScript'),
(32, 'Votre nom', 'votre prÃ©nom', '0000-00-00', '', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76000, 'minkoueobamea@yahoo.fr', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 2, 'Array'),
(33, 'Votre nom', 'votre prÃ©nom', '2016-11-13', '', 'Appartement 42 Immeuble Adolphe Adam, Rue RÃ©timare', 76000, 'minkoueobamea@yahoo.fr', 'http://www.CVFLASHJOB.com', '0658898531', 'S2', 2, 'HTML,Formulaires,JavaScript');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
