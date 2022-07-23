-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 21 Mars 2022 à 14:09
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `cms`
--
CREATE DATABASE `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Structure de la table `apropos`
--

CREATE TABLE IF NOT EXISTS `apropos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slogan` text NOT NULL,
  `detail` longtext NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `apropos`
--

INSERT INTO `apropos` (`id`, `titre`, `slogan`, `detail`, `image`) VALUES
(1, 'Jeunes Ennemis de la Faim JEF asbl', 'Nous sommes une association sans but lucratif de droit (RD Congo)', '<h2 style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; font-family: Roboto, sans-serif; color: rgb(85, 85, 85); font-size: 16px;"><strong>NOS OBJECTIFS</strong></h2>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">L&#39;objet&nbsp;social de l&#39;asbl JEF est de contribuer &agrave; l&#39;am&eacute;lioration de la qualit&eacute; de vie de la population par leur acc&egrave;s facile, durable et permanent &agrave; une alimenetation saine, suffisante et &eacute;quilibr&eacute;e &agrave; travers une implication active de la jeunesse dans la production agricole.</span></font></p>\r\n\r\n<p><b>MISSION</b></p>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">JEF&rsquo;Cette mission consiste particuli&egrave;rement en un engagement formel &agrave; : </span></font></p>\r\n\r\n<ul>\r\n	<li><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Eradiquer les causes conjoncturelles, structurelles et syst&eacute;miques de la sous-alimentation, de la malnutrition, du marasme,</span></font></li>\r\n	<li><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Promouvoir la promotion, l&rsquo;am&eacute;lioration et le renforcement du secteur productif et de l&rsquo;entrepreneurship juv&eacute;nile dans le domaine de la production agricole et animale,</span></font></li>\r\n	<li><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Mettre en place un syst&egrave;me de protection des groupes sociaux vuln&eacute;rables expos&eacute;s aux risques de sous-alimentation, de malnutrition et autres maladies d&rsquo;origine carentielle, </span></font></li>\r\n	<li><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Assurer une formation appropri&eacute;e des jeunes impliqu&eacute;s dans la lutte contre la faim et la pauvret&eacute;,</span></font></li>\r\n	<li><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Int&eacute;grer les nouvelles technologies notamment de l&rsquo;information et de la communication dans le syst&egrave;me de la production agricole, animale, halieutique, etc., </span></font></li>\r\n	<li><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Garantir des investissements et &eacute;quipements suffisants, viables, durables et de qualit&eacute; aux jeunes entrepreneurs agricoles</span></font>â€‹</li>\r\n</ul>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif"><b>VISION</b></font></p>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">L&rsquo;asbl JEF r&ecirc;ve d&rsquo;une soci&eacute;t&eacute; congolaise au sein de laquelle, la s&eacute;curit&eacute; alimentaire pour tous, sans discrimination bas&eacute;e sur des consid&eacute;rations g&eacute;n&eacute;ralement quelconques, constitue une priorit&eacute; nationaleâ€‹</span></font></p>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif"><b>AUTRES OBJECTIFS</b></font></p>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Contribuer &agrave; la r&eacute;alisation des Objectifs de D&eacute;veloppement Durable &agrave; l&rsquo;horizon 2030, particuli&egrave;rement les Objectifs / - 1 : Eliminer la pauvret&eacute; et la faim, - 2 : Eliminer la faim, assurer la s&eacute;curit&eacute; alimentaire, am&eacute;liorer la nutrition, promouvoir l&rsquo;agriculture durable</span></font></p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Renforcer les capacit&eacute;s de production agricole (agriculture, p&ecirc;che, &eacute;levage) des jeunes afin de passer d&rsquo;une agriculture de subsistance &agrave; une agriculture stable et r&eacute;mun&eacute;ratrice. Promouvoir l&rsquo;entrepreneurship agricole des jeunes, notamment en : leur octroyant des micro-cr&eacute;dits agricoles, les intrants agricoles (semences de qualit&eacute;, outils aratoires), renfor&ccedil;ant leur participation dans la cha&icirc;ne de valeur des cultures rentables, les organisant en coop&eacute;ratives des producteurs agricoles afin de faciliter leur acc&egrave;s durable &agrave; des d&eacute;bouch&eacute;s, vulgarisant les mod&egrave;les de production agricole moins p&eacute;nibles mais plus productifs, leur facilitant l&rsquo;acc&egrave;s &agrave; de nouvelles technologies&hellip;</span></font></p>\r\n	</li>\r\n	<li>\r\n	<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Constituer un pont entre les jeunes agriculteurs et les consommateurs urbains;Promouvoir le droit des jeunes filles &agrave; la terre et &agrave; la destination de la terre;Contribuer &agrave; la compr&eacute;hension et &agrave; l&rsquo;int&eacute;gration de l&rsquo;approche &laquo; genre &raquo; au sein de l&rsquo;association, dans le monde des affaires et dans la vie des communaut&eacute;s,</span></font></p>\r\n	</li>\r\n	<li>\r\n	<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Solliciter des partenariats avec d&rsquo;autres organisations, institutions et initiatives, tant au niveau local, national, provincial qu&rsquo;international qui militent en faveur de la s&eacute;curit&eacute; alimentaire, de la nutrition et de l&rsquo;agriculture intelligente; Mettre en place des strat&eacute;gies pour assurer une &eacute;ducation de qualit&eacute; pour tous et toutes.</span></font></p>\r\n	</li>\r\n	<li>\r\n	<p><font color="#555555" face="Roboto, sans-serif"><span style="font-size: 16px;">Collecter et diffuser des informations n&eacute;cessaires &agrave; la promotion et le d&eacute;veloppement de la s&eacute;curit&eacute; alimentaire pour tous, en tous temps, tous lieux et toutes circonstances.</span></font></p>\r\n	</li>\r\n</ul>\r\n\r\n<p><font color="#555555" face="Roboto, sans-serif">&nbsp;</font></p>\r\n', 'current-pro1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(30) NOT NULL,
  `detail` longtext NOT NULL,
  `datePub` date NOT NULL,
  `img_one` text,
  `img_two` text,
  `img_tree` text,
  `idUser` int(11) NOT NULL,
  `idCat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idCat` (`idCat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `detail`, `datePub`, `img_one`, `img_two`, `img_tree`, `idUser`, `idCat`) VALUES
(1, 'Lancement', '<p>D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;articleD&eacute;tail de l&#39;articleD&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article D&eacute;tail de l&#39;article</p>\r\n', '2022-01-18', 'b2c-7.jpg', '', '', 1, 2),
(2, 'Lancement', '<p>D&eacute;tail de l&#39;article</p>\r\n', '2022-01-18', 'bf1.jpg', '', '', 1, 2),
(3, 'Lancement', '<p>D&eacute;tail de l&#39;article</p>\r\n', '2022-01-18', 'b2c-8.jpg', '', '', 1, 2),
(4, 'Lancement', '<p>D&eacute;tail de l&#39;article</p>\r\n', '2022-01-18', 'b2c-6.jpg', '', '', 1, 2),
(5, 'Lancement', 'DÃ©tail de l''article', '2022-01-18', '1633524596016.jpeg', NULL, NULL, 1, 2),
(6, 'Lancement', 'DÃ©tail de l''article', '2022-01-18', '1633524596016.jpeg', NULL, NULL, 1, 2),
(7, 'Lancement', 'DÃ©tail de l''article', '2022-01-18', '1633524596016.jpeg', '1632807750753.jpeg', '1632807750375.jpeg', 1, 1),
(8, 'Test', 'DÃ©tail de l''article', '2022-01-18', '1632807757542.jpeg', '1633524597118.jpeg', '', 1, 1),
(9, 'Test 2', 'DÃ©tail de l''article', '2022-01-18', '1632807739272.jpeg', '', '1632807754632.jpeg', 1, 2),
(10, 'Test', 'DÃ©tail de l''article', '2022-01-18', '1632807739272.jpeg', '1633524596016.jpeg', '1632807754632.jpeg', 1, 1),
(11, 'Test Lancement ', '<h1>Lancement&nbsp;</h1>\r\n\r\n<h3>Nous sommes heureux de vous annoncer le lancement de notre plateforme</h3>\r\n\r\n<blockquote>\r\n<p>Vueillez trouver tout ce don vous avez besoiun sur notre plateforme</p>\r\n</blockquote>\r\n\r\n<p><span style="background-color: rgb(255, 255, 0);">Bienvenu encore</span></p>\r\n', '2022-01-17', '1632807750753.jpeg', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(1, 'Produit'),
(2, 'Projet'),
(3, 'Projet');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `datePub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idArticle` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idArticle` (`idArticle`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `nom`, `email`, `comment`, `datePub`, `idArticle`) VALUES
(1, 'Lupete Placide', 'test@gmail.com', 'Merci pour l''article', '2022-01-21 08:48:23', 7),
(2, 'Test Comment', 'comment@gmail.com', 'Test commentaire', '2022-01-21 08:52:13', 7),
(3, 'Blaise Bula', 'blaise@gmail.com', 'Bien. Merci', '2022-01-21 08:53:49', 7),
(4, 'Anita Moto', 'anita@gmail.com', 'Vous trouverez des articles qui parlent de nous, nous vous feront part des nos nouvelles, nos produits, nos services offerts et plus encore.Souscrivez Ã  notre News pour ne rien rater lors des nouvelles publications', '2022-01-21 10:05:53', 7);

-- --------------------------------------------------------

--
-- Structure de la table `compteur_succes`
--

CREATE TABLE IF NOT EXISTS `compteur_succes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(255) NOT NULL,
  `nbVille` int(11) NOT NULL,
  `projet` varchar(255) NOT NULL,
  `nbProjet` int(11) NOT NULL,
  `population` varchar(255) NOT NULL,
  `nbPopulation` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `compteur_succes`
--

INSERT INTO `compteur_succes` (`id`, `ville`, `nbVille`, `projet`, `nbProjet`, `population`, `nbPopulation`) VALUES
(1, 'Villes bÃ©nÃ©ficiaires', 3, 'Total Projets', 4, 'Nombre des clients', 300);

-- --------------------------------------------------------

--
-- Structure de la table `contact_company`
--

CREATE TABLE IF NOT EXISTS `contact_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `contact_company`
--

INSERT INTO `contact_company` (`id`, `adresse`, `email`, `phone`) VALUES
(1, 'Sud-Kivu, Bukavu, Ibanda ', 'info@jefrdc.org, contact@jefrdc.org', '+243 991 324 932');

-- --------------------------------------------------------

--
-- Structure de la table `email_box`
--

CREATE TABLE IF NOT EXISTS `email_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `datePub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `email_box`
--

INSERT INTO `email_box` (`id`, `nom`, `email`, `contact`, `objet`, `comment`, `datePub`, `statut`) VALUES
(1, 'Lupete Placide', 'placide@gmail.com', '0987654542', 'Test', 'Merci pour cette plateforme', '2022-01-30 11:20:16', 'lu'),
(2, 'Test Contact', 'test@gmail.com', '0987876543', 'Test', 'Merci pour cette opportunitÃ©', '2022-01-30 11:23:31', 'lu');

-- --------------------------------------------------------

--
-- Structure de la table `engagement`
--

CREATE TABLE IF NOT EXISTS `engagement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `engagement`
--

INSERT INTO `engagement` (`id`, `detail`) VALUES
(1, 'Eradiquer les causes conjoncturelles, structurelles et systÃ©miques de la sous-alimentation, de la malnutrition, du marasme,'),
(2, 'Promouvoir la promotion, lâ€™amÃ©lioration et le renforcement du secteur productif et de lâ€™entrepreneurship juvÃ©nile dans le domaine de la production agricole et animale,'),
(3, 'Mettre en place un systÃ¨me de protection des groupes sociaux vulnÃ©rables exposÃ©s aux risques de sous-alimentation, de malnutrition et autres maladies dâ€™origine carentielle,'),
(4, 'Assurer une formation appropriÃ©e des jeunes impliquÃ©s dans la lutte contre la faim et la pauvretÃ©,'),
(5, 'IntÃ©grer les nouvelles technologies notamment de lâ€™information et de la communication dans le systÃ¨me de la production agricole, animale, halieutique, etc.'),
(7, 'Garantir des investissements et Ã©quipements suffisants, viables, durables et de qualitÃ© aux jeunes entrepreneurs agricoles');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `fonction` varchar(255) NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `equipe`
--

INSERT INTO `equipe` (`id`, `nom`, `fonction`, `image`) VALUES
(10, 'Doudou', 'Directeur', 'Doudou.png'),
(11, 'Annie', 'Projet Cordinator', 'Annie.png'),
(12, 'Raphael', 'IT Manager', 'Raphael.png');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE IF NOT EXISTS `partenaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  `entreprise` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `image`, `entreprise`) VALUES
(9, 'femnet.png', 'femnet'),
(11, 'unw_logo.jpg', 'Onu Femmes'),
(12, 'UERHA.jpg', 'Uerha'),
(13, 'tÃ©lÃ©charger.jpg', 'Xpp');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire_box`
--

CREATE TABLE IF NOT EXISTS `partenaire_box` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `message` text NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `datePub` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`id`, `titre`, `detail`, `datePub`, `image`) VALUES
(1, 'PARK AGRO ALIMENTAIRE', '<p><span style="color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 16px;">The environment includes; the surface of the earth, natural re&shy;sources, land and water, mountains and plains, fertile lands and deserts, oceans, storms and cy&shy;clones, weather and climatic factors, seasons, etc. It also includes biological conditions.</span></p>\r\n', '2022-01-30 09:30:44', 'current-pro1.jpg'),
(2, 'PROJET VENTES PRODUITS', '<p><span style="color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 16px;">The environment includes; the surface of the earth, natural re&shy;sources, land and water, mountains and plains, fertile lands and deserts, oceans, storms and cy&shy;clones, weather and climatic factors, seasons, etc. It also includes biological conditions.</span></p>\r\n', '2022-01-30 09:32:09', 'current-pro2.jpg'),
(3, 'PROJET ENVIRONEMENT', '<p><span style="color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 16px;">The environment includes; the surface of the earth, natural re&shy;sources, land and water, mountains and plains, fertile lands and deserts, oceans, storms and cy&shy;clones, weather and climatic factors, seasons, etc. It also includes biological conditions.</span></p>\r\n', '2022-01-30 09:32:51', 'flp3.jpg'),
(4, 'PROJET PISCICULTURE ', '<p><span style="color: rgb(85, 85, 85); font-family: Roboto, sans-serif; font-size: 16px;">The environment includes; the surface of the earth, natural re&shy;sources, land and water, mountains and plains, fertile lands and deserts, oceans, storms and cy&shy;clones, weather and climatic factors, seasons, etc. It also includes biological conditions.</span></p>\r\n', '2022-01-30 09:33:46', 'current-pro4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `titre`, `detail`) VALUES
(2, 'Environnement', 'Protection de la nature'),
(3, 'ElÃ©vage', 'Booster l''Ã©levage en RD Congo '),
(4, 'Autonomisation', 'Autonomisation Ã©conomique de la femme'),
(5, 'Agriculture', 'Distribuer partout en RDC'),
(7, 'Paix', 'Gestion et consolidation de la paix');

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `detail` longtext NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `subscribe`
--

INSERT INTO `subscribe` (`id`, `nom`, `email`, `contact`) VALUES
(1, 'Gloire', 'gloire@gmail.com', '0987654321'),
(2, 'Test', 'test@gmail.com', '');

-- --------------------------------------------------------

--
-- Structure de la table `temoignage`
--

CREATE TABLE IF NOT EXISTS `temoignage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `fonction` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Contenu de la table `temoignage`
--

INSERT INTO `temoignage` (`id`, `nom`, `fonction`, `detail`, `avatar`) VALUES
(1, 'Danny Scotten', 'Florida', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using lorem sum is that it has a more or less normal distribution', 'tuser1.jpg'),
(2, 'Richardson', 'Florida Partner ', 'As opposed to using ''Content here, content here'', making it look like readable English. Many Desktop and Web Pages are using lorem ipsum.', 'tuser2.jpg'),
(3, 'Anna Lillian', 'Goma Partener', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 'tuser3.jpg'),
(4, 'Placide', 'Bukavu Partener', 'Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain.', 'vol-2.jpg'),
(5, 'Danny Scotten', 'Florida', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using lorem sum is that it has a more or less normal distribution', 'tuser1.jpg'),
(6, 'Richardson', 'Florida Partner ', 'As opposed to using ''Content here, content here'', making it look like readable English. Many Desktop and Web Pages are using lorem ipsum.', 'tuser2.jpg'),
(7, 'Anna Lillian', 'Goma Partener', 'It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.', 'tuser3.jpg'),
(8, 'Placide', 'Bukavu Partener', 'Those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain.', 'vol-2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `role` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `login`, `password`, `role`) VALUES
(1, 'Lupete Placide', 'admin ', 'admin', 'admin'),
(2, 'Gloire Zihalirwa', 'gloire', '1234', 'editeur');

-- --------------------------------------------------------

--
-- Structure de la table `vision`
--

CREATE TABLE IF NOT EXISTS `vision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `vision`
--

INSERT INTO `vision` (`id`, `titre`, `detail`) VALUES
(1, 'JEF Promess', 'Contribuer Ã  la rÃ©alisation des objectifs de dÃ©veloppement durable Ã  l''horizon 2030');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`idCat`) REFERENCES `categorie` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
