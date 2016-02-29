-- phpMyAdmin SQL Dump
-- version 2.9.1.1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Jeudi 07 Janvier 2010 à 10:34
-- Version du serveur: 5.0.27
-- Version de PHP: 5.2.0
-- 
-- Base de données: `portfolio`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `categorie_critere`
-- 

CREATE TABLE `categorie_critere` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `categorie_critere`
-- 

INSERT INTO `categorie_critere` (`id`, `nom`) VALUES 
(1, 'Catégorie 1'),
(2, 'Catégorie 2'),
(3, 'Catégorie 3');

-- --------------------------------------------------------

-- 
-- Structure de la table `comptes_rendus`
-- 

CREATE TABLE `comptes_rendus` (
  `id` int(11) NOT NULL auto_increment,
  `dateDebut` date default NULL,
  `dateFin` date default NULL,
  `travaux` text,
  `objectifs` text,
  `evaluation` text,
  `observationApprenti` text,
  `observationMaitre` text,
  `idStage` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Contenu de la table `comptes_rendus`
-- 

INSERT INTO `comptes_rendus` (`id`, `dateDebut`, `dateFin`, `travaux`, `objectifs`, `evaluation`, `observationApprenti`, `observationMaitre`, `idStage`) VALUES 
(1, '2008-12-12', '2009-01-08', '- Tache 1\r\n- Tache 2\r\n- Tache 3', '- Objectif 1\r\n- Objectif 2\r\n- Objectif 3', 'Le résultat correspond correctement au objectifs voulu. malgré un petit écart pour un fonction.', '<p>observation</p>\r\n<p>gfkgfkgkfdlgl</p>', 'RAS\r\n', 1),
(2, '0000-00-00', '0000-00-00', '', '', '', '', 'RAS', 0),
(3, '0000-00-00', '0000-00-00', '', '', '', '', '', 0),
(4, '0000-00-00', '0000-00-00', '', '', '', '', 'ras', 0),
(5, '0000-00-00', '0000-00-00', '', '', '', '', 'ras', 0),
(6, '0000-00-00', '0000-00-00', '', '', '', '', '', 1),
(7, '0000-00-00', '0000-00-00', '<p>ghjgfhgfgfh</p>', '<p>fdgffdg</p>', '<p>bnbvnbvn</p>', '', '', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `criteres`
-- 

CREATE TABLE `criteres` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(200) default NULL,
  `desc` varchar(500) default NULL,
  `idCategorie` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- 
-- Contenu de la table `criteres`
-- 

INSERT INTO `criteres` (`id`, `nom`, `desc`, `idCategorie`) VALUES 
(1, 'Qualité du Travail', 'Comformité du travail aux instructions reçues - Qualité et fiabilité de la présentation : rédaction, lisibilité, présentation - Rigueur', 2),
(2, 'Respect des objectifs', 'Rapidité d''execution - Résultats obtenus - Constance dans l''effort', 1),
(3, 'Compétence technique', 'Connaissance et respect de règles de l''art - connaissance techniques et technologique - Souci de perfectionnement.', 1),
(4, 'Communication', 'Qualité des rapports avec les autres stagiaires et  l''animateur.', 1),
(5, 'Organisation-Autonomie', 'Aptitude à l''organisation et à l''autonomie dans le travail, en fonction du niveau de qualification.', 1),
(6, 'Assuiduité-Disponibilité', 'Présenteïsme - faculté d''entreprendre les tâches - Acceptation des changement de rythme dans le travail', 3),
(7, 'Respect de l''environnement et des matériels', 'Respect des matériels confiés - Aptitudes au rangement et à l''entretien du matériels- Rangement et propreté des lieux de travail.', 2),
(8, 'Présentation', 'Souci du maintien d''un bonne image au travers des tenues vestimentaures et de la prropreré du matériels utilisé.', 2),
(9, 'Créativité- Innovation-Esprit d''initiative et de décision', 'Aptitude à proposer de nouvelles méthodes et techniques - esprits d''initiative , de décision et de création.', 1),
(10, 'Polyvalence - Adaptabilité', 'Aptitude à aborder des activités différentes - Aptitude à faire face à des situations imprévues.', 3),
(11, 'Adaptation au poste ', 'Adéquation des connaissance et aptitudes professionnelles en rapport avec la qualification face à un environnement en constante évolution.', 3),
(12, 'Capacité d''avolution ', 'Niveau de compétence professionnelle et de connaissance générales, permettant après formation, d''envisager une évolution de carrière.', 3);

-- --------------------------------------------------------

-- 
-- Structure de la table `criteres_formation`
-- 

CREATE TABLE `criteres_formation` (
  `idFormation` int(11) NOT NULL default '0',
  `idCritere` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idFormation`,`idCritere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `criteres_formation`
-- 

INSERT INTO `criteres_formation` (`idFormation`, `idCritere`) VALUES 
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12);

-- --------------------------------------------------------

-- 
-- Structure de la table `entreprise`
-- 

CREATE TABLE `entreprise` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(150) default NULL,
  `raisonSociale` varchar(50) default NULL,
  `nbSalaries` int(11) default NULL,
  `adresse` varchar(200) default NULL,
  `CP` varchar(10) default NULL,
  `ville` varchar(150) default NULL,
  `tel` varchar(20) default NULL,
  `fax` varchar(20) default NULL,
  `mail` varchar(150) default NULL,
  `site` varchar(150) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `entreprise`
-- 

INSERT INTO `entreprise` (`id`, `nom`, `raisonSociale`, `nbSalaries`, `adresse`, `CP`, `ville`, `tel`, `fax`, `mail`, `site`) VALUES 
(1, 'Société', 'rasion sociale', 100, '25 rue quelconque', '76000', 'rouen (elbeuf)', '02.38.56.19.25', '02.38.56.19.26', 'contact@societe.com', 'www.societe.com');

-- --------------------------------------------------------

-- 
-- Structure de la table `evaluation`
-- 

CREATE TABLE `evaluation` (
  `id` int(11) NOT NULL auto_increment,
  `date` date default NULL,
  `idStage` int(11) default NULL,
  `idUtilisateur` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

-- 
-- Contenu de la table `evaluation`
-- 

INSERT INTO `evaluation` (`id`, `date`, `idStage`, `idUtilisateur`, `commentaire`) VALUES 
(2, '0000-00-00', 1, 2, 'Commentaire entreprise qui puet être plus ou moins long en fonction de la personne.\r\n\r\nEn, espérant que cela reste comme ça\r\n'),
(33, '0000-00-00', 1, 3, ''),
(34, '0000-00-00', 1, 1, '');

-- --------------------------------------------------------

-- 
-- Structure de la table `formation`
-- 

CREATE TABLE `formation` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(150) NOT NULL,
  `objectif` text NOT NULL,
  `diplome` varchar(200) NOT NULL,
  `rythme` varchar(100) NOT NULL,
  `idStructure` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `formation`
-- 

INSERT INTO `formation` (`id`, `nom`, `objectif`, `diplome`, `rythme`, `idStructure`) VALUES 
(1, 'nom de la formation', 'Liste des objectifs de la formations :\r\n- obj 1\r\n- obj 2\r\n- ...', 'Diplome avec la formation', '2 semaines en entreprise 3 en cour', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `niveau`
-- 

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL auto_increment,
  `designation` varchar(100) NOT NULL,
  `autorisation` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `niveau`
-- 

INSERT INTO `niveau` (`id`, `designation`, `autorisation`) VALUES 
(1, 'Stagiaire', 0),
(2, 'Tuteur Enseignant', 0),
(3, 'Responsable de Formation', 0);

-- --------------------------------------------------------

-- 
-- Structure de la table `note`
-- 

CREATE TABLE `note` (
  `id` int(11) NOT NULL auto_increment,
  `note` int(11) default NULL,
  `desc` varchar(20) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Contenu de la table `note`
-- 

INSERT INTO `note` (`id`, `note`, `desc`) VALUES 
(1, 0, 'Très Mauvais'),
(2, 1, 'Insufisant'),
(3, 2, 'Moyen'),
(4, 3, 'Satisfaisant'),
(5, 4, 'Bien'),
(6, 5, 'Très Bien');

-- --------------------------------------------------------

-- 
-- Structure de la table `note_critere`
-- 

CREATE TABLE `note_critere` (
  `idCritere` int(11) NOT NULL,
  `idNote` int(11) NOT NULL,
  PRIMARY KEY  (`idCritere`,`idNote`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `note_critere`
-- 

INSERT INTO `note_critere` (`idCritere`, `idNote`) VALUES 
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(5, 6),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(7, 6),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6);

-- --------------------------------------------------------

-- 
-- Structure de la table `note_evaluation`
-- 

CREATE TABLE `note_evaluation` (
  `idEvaluation` int(11) NOT NULL,
  `idCritere` int(11) NOT NULL,
  `note` int(11) default NULL,
  `commentaire` text,
  PRIMARY KEY  (`idEvaluation`,`idCritere`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Contenu de la table `note_evaluation`
-- 

INSERT INTO `note_evaluation` (`idEvaluation`, `idCritere`, `note`, `commentaire`) VALUES 
(1, 1, 6, NULL),
(1, 2, 6, NULL),
(1, 3, 5, NULL),
(1, 4, 5, NULL),
(1, 5, 4, NULL),
(1, 6, 4, NULL),
(1, 7, 3, NULL),
(1, 8, 3, NULL),
(1, 9, 2, NULL),
(1, 10, 2, NULL),
(1, 11, 1, NULL),
(1, 12, 1, NULL),
(2, 1, 5, NULL),
(2, 2, 5, NULL),
(2, 3, 4, NULL),
(2, 4, 4, NULL),
(2, 5, 3, NULL),
(2, 6, 3, NULL),
(2, 7, 2, NULL),
(2, 8, 2, NULL),
(2, 9, 1, NULL),
(2, 10, 1, NULL),
(2, 11, 1, NULL),
(2, 12, 1, NULL),
(3, 1, 3, NULL),
(3, 2, 3, NULL),
(3, 3, 3, NULL),
(3, 4, 3, NULL),
(3, 5, 3, NULL),
(3, 6, 3, NULL),
(3, 7, 3, NULL),
(3, 8, 3, NULL),
(3, 9, 3, NULL),
(3, 10, 3, NULL),
(3, 11, 3, NULL),
(3, 12, 3, NULL),
(4, 1, 3, NULL),
(4, 2, 3, NULL),
(4, 3, 3, NULL),
(4, 4, 3, NULL),
(4, 5, 3, NULL),
(4, 6, 3, NULL),
(4, 7, 3, NULL),
(4, 8, 3, NULL),
(4, 9, 3, NULL),
(4, 10, 3, NULL),
(4, 11, 3, NULL),
(4, 12, 3, NULL),
(5, 1, 3, NULL),
(5, 2, 3, NULL),
(5, 3, 3, NULL),
(5, 4, 3, NULL),
(5, 5, 3, NULL),
(5, 6, 3, NULL),
(5, 7, 3, NULL),
(5, 8, 3, NULL),
(5, 9, 3, NULL),
(5, 10, 3, NULL),
(5, 11, 3, NULL),
(5, 12, 3, NULL),
(6, 1, 3, NULL),
(6, 2, 3, NULL),
(6, 3, 3, NULL),
(6, 4, 3, NULL),
(6, 5, 3, NULL),
(6, 6, 3, NULL),
(6, 7, 3, NULL),
(6, 8, 3, NULL),
(6, 9, 3, NULL),
(6, 10, 3, NULL),
(6, 11, 3, NULL),
(6, 12, 3, NULL),
(7, 1, 3, NULL),
(7, 2, 3, NULL),
(7, 3, 3, NULL),
(7, 4, 3, NULL),
(7, 5, 3, NULL),
(7, 6, 3, NULL),
(7, 7, 3, NULL),
(7, 8, 3, NULL),
(7, 9, 3, NULL),
(7, 10, 3, NULL),
(7, 11, 3, NULL),
(7, 12, 3, NULL),
(8, 1, 3, NULL),
(8, 2, 3, NULL),
(8, 3, 3, NULL),
(8, 4, 3, NULL),
(8, 5, 3, NULL),
(8, 6, 3, NULL),
(8, 7, 3, NULL),
(8, 8, 3, NULL),
(8, 9, 3, NULL),
(8, 10, 3, NULL),
(8, 11, 3, NULL),
(8, 12, 3, NULL),
(9, 1, 3, NULL),
(9, 2, 3, NULL),
(9, 3, 3, NULL),
(9, 4, 3, NULL),
(9, 5, 3, NULL),
(9, 6, 3, NULL),
(9, 7, 3, NULL),
(9, 8, 3, NULL),
(9, 9, 3, NULL),
(9, 10, 3, NULL),
(9, 11, 3, NULL),
(9, 12, 3, NULL),
(10, 1, 3, NULL),
(10, 2, 3, NULL),
(10, 3, 3, NULL),
(10, 4, 3, NULL),
(10, 5, 3, NULL),
(10, 6, 3, NULL),
(10, 7, 3, NULL),
(10, 8, 3, NULL),
(10, 9, 3, NULL),
(10, 10, 3, NULL),
(10, 11, 3, NULL),
(10, 12, 3, NULL),
(11, 1, 3, NULL),
(11, 2, 3, NULL),
(11, 3, 3, NULL),
(11, 4, 3, NULL),
(11, 5, 3, NULL),
(11, 6, 3, NULL),
(11, 7, 3, NULL),
(11, 8, 3, NULL),
(11, 9, 3, NULL),
(11, 10, 3, NULL),
(11, 11, 3, NULL),
(11, 12, 3, NULL),
(0, 1, 1, NULL),
(0, 2, 1, NULL),
(0, 3, 1, NULL),
(0, 4, 1, NULL),
(0, 5, 1, NULL),
(0, 6, 1, NULL),
(0, 7, 1, NULL),
(0, 8, 1, NULL),
(0, 9, 1, NULL),
(0, 10, 1, NULL),
(0, 11, 1, NULL),
(0, 12, 1, NULL),
(12, 1, 1, NULL),
(12, 2, 1, NULL),
(12, 3, 1, NULL),
(12, 4, 1, NULL),
(12, 5, 1, NULL),
(12, 6, 1, NULL),
(12, 7, 1, NULL),
(12, 8, 1, NULL),
(12, 9, 1, NULL),
(12, 10, 1, NULL),
(12, 11, 1, NULL),
(12, 12, 1, NULL),
(13, 1, 5, NULL),
(13, 2, 3, NULL),
(13, 3, 2, NULL),
(13, 4, 4, NULL),
(13, 5, 6, NULL),
(13, 6, 5, NULL),
(13, 7, 5, NULL),
(13, 8, 4, NULL),
(13, 9, 2, NULL),
(13, 10, 1, NULL),
(13, 11, 5, NULL),
(13, 12, 6, NULL),
(14, 1, 1, NULL),
(14, 2, 1, NULL),
(14, 3, 1, NULL),
(14, 4, 1, NULL),
(14, 5, 1, NULL),
(14, 6, 1, NULL),
(14, 7, 1, NULL),
(14, 8, 1, NULL),
(14, 9, 1, NULL),
(14, 10, 3, NULL),
(14, 11, 3, NULL),
(14, 12, 5, NULL),
(15, 2, 6, NULL),
(15, 3, 6, NULL),
(15, 4, 6, NULL),
(15, 5, 6, NULL),
(15, 9, 6, NULL),
(15, 1, 6, NULL),
(15, 7, 6, NULL),
(15, 8, 6, NULL),
(15, 6, 6, NULL),
(15, 10, 6, NULL),
(15, 11, 6, NULL),
(15, 12, 6, NULL),
(16, 2, 6, NULL),
(16, 3, 6, NULL),
(16, 4, 6, NULL),
(16, 5, 6, NULL),
(16, 9, 6, NULL),
(16, 1, 6, NULL),
(16, 7, 6, NULL),
(16, 8, 6, NULL),
(16, 6, 6, NULL),
(16, 10, 6, NULL),
(16, 11, 6, NULL),
(16, 12, 6, NULL),
(17, 2, 6, NULL),
(17, 3, 6, NULL),
(17, 4, 6, NULL),
(17, 5, 6, NULL),
(17, 9, 6, NULL),
(17, 1, 6, NULL),
(17, 7, 6, NULL),
(17, 8, 6, NULL),
(17, 6, 6, NULL),
(17, 10, 6, NULL),
(17, 11, 6, NULL),
(17, 12, 6, NULL),
(18, 2, 6, NULL),
(18, 3, 6, NULL),
(18, 4, 6, NULL),
(18, 5, 6, NULL),
(18, 9, 6, NULL),
(18, 1, 6, NULL),
(18, 7, 6, NULL),
(18, 8, 6, NULL),
(18, 6, 6, NULL),
(18, 10, 6, NULL),
(18, 11, 6, NULL),
(18, 12, 6, NULL),
(19, 2, 6, NULL),
(19, 3, 6, NULL),
(19, 4, 6, NULL),
(19, 5, 6, NULL),
(19, 9, 6, NULL),
(19, 1, 6, NULL),
(19, 7, 6, NULL),
(19, 8, 6, NULL),
(19, 6, 6, NULL),
(19, 10, 6, NULL),
(19, 11, 6, NULL),
(19, 12, 6, NULL),
(20, 2, 6, NULL),
(20, 3, 6, NULL),
(20, 4, 6, NULL),
(20, 5, 6, NULL),
(20, 9, 6, NULL),
(20, 1, 6, NULL),
(20, 7, 6, NULL),
(20, 8, 6, NULL),
(20, 6, 6, NULL),
(20, 10, 6, NULL),
(20, 11, 6, NULL),
(20, 12, 6, NULL),
(21, 2, 6, NULL),
(21, 3, 6, NULL),
(21, 4, 6, NULL),
(21, 5, 6, NULL),
(21, 9, 6, NULL),
(21, 1, 6, NULL),
(21, 7, 6, NULL),
(21, 8, 6, NULL),
(21, 6, 6, NULL),
(21, 10, 6, NULL),
(21, 11, 6, NULL),
(21, 12, 6, NULL),
(22, 2, 6, NULL),
(22, 3, 6, NULL),
(22, 4, 6, NULL),
(22, 5, 6, NULL),
(22, 9, 6, NULL),
(22, 1, 6, NULL),
(22, 7, 6, NULL),
(22, 8, 6, NULL),
(22, 6, 6, NULL),
(22, 10, 6, NULL),
(22, 11, 6, NULL),
(22, 12, 6, NULL),
(23, 2, 6, NULL),
(23, 3, 6, NULL),
(23, 4, 6, NULL),
(23, 5, 6, NULL),
(23, 9, 6, NULL),
(23, 1, 6, NULL),
(23, 7, 6, NULL),
(23, 8, 6, NULL),
(23, 6, 6, NULL),
(23, 10, 6, NULL),
(23, 11, 6, NULL),
(23, 12, 6, NULL),
(24, 2, 6, NULL),
(24, 3, 6, NULL),
(24, 4, 6, NULL),
(24, 5, 6, NULL),
(24, 9, 6, NULL),
(24, 1, 1, NULL),
(24, 7, 1, NULL),
(24, 8, 1, NULL),
(24, 6, 2, NULL),
(24, 10, 3, NULL),
(24, 11, 4, NULL),
(24, 12, 5, NULL),
(25, 2, 4, NULL),
(25, 3, 3, NULL),
(25, 4, 2, NULL),
(25, 5, 5, NULL),
(25, 9, 6, NULL),
(25, 1, 2, NULL),
(25, 7, 3, NULL),
(25, 8, 5, NULL),
(25, 6, 4, NULL),
(25, 10, 6, NULL),
(25, 11, 4, NULL),
(25, 12, 2, NULL),
(26, 2, 1, ''),
(26, 3, 1, ''),
(26, 4, 1, ''),
(26, 5, 1, ''),
(26, 9, 1, ''),
(26, 1, 1, ''),
(26, 7, 1, ''),
(26, 8, 1, ''),
(26, 6, 1, ''),
(26, 10, 1, ''),
(26, 11, 1, ''),
(26, 12, 1, ''),
(27, 2, 1, ''),
(27, 3, 1, ''),
(27, 4, 1, ''),
(27, 5, 1, ''),
(27, 9, 1, ''),
(27, 1, 1, ''),
(27, 7, 1, ''),
(27, 8, 1, ''),
(27, 6, 1, ''),
(27, 10, 1, ''),
(27, 11, 1, ''),
(27, 12, 1, ''),
(28, 2, 1, ''),
(28, 3, 1, ''),
(28, 4, 1, ''),
(28, 5, 1, ''),
(28, 9, 1, ''),
(28, 1, 1, ''),
(28, 7, 1, ''),
(28, 8, 1, ''),
(28, 6, 1, ''),
(28, 10, 1, ''),
(28, 11, 1, ''),
(28, 12, 1, ''),
(29, 2, 1, '<p>xcvxcvx</p>'),
(29, 3, 1, ''),
(29, 4, 1, ''),
(29, 5, 1, ''),
(29, 9, 1, ''),
(29, 1, 1, ''),
(29, 7, 1, ''),
(29, 8, 1, ''),
(29, 6, 1, ''),
(29, 10, 1, ''),
(29, 11, 1, ''),
(29, 12, 1, ''),
(30, 2, 1, '<p>xcvxcvx</p>'),
(30, 3, 1, ''),
(30, 4, 1, ''),
(30, 5, 1, ''),
(30, 9, 1, ''),
(30, 1, 1, ''),
(30, 7, 1, ''),
(30, 8, 1, ''),
(30, 6, 1, ''),
(30, 10, 1, ''),
(30, 11, 1, ''),
(30, 12, 1, ''),
(31, 2, 1, '<p>test 1</p>'),
(31, 3, 3, '<p>Comentaire 2</p>'),
(31, 4, 6, '<p>Commentaire 4</p>'),
(31, 5, 1, ''),
(31, 9, 1, ''),
(31, 1, 1, ''),
(31, 7, 1, ''),
(31, 8, 1, ''),
(31, 6, 1, ''),
(31, 10, 1, ''),
(31, 11, 1, ''),
(31, 12, 1, ''),
(32, 2, 1, '<p>test 1</p>'),
(32, 3, 3, '<p>Comentaire 2</p>'),
(32, 4, 6, '<p>Commentaire 4</p>'),
(32, 5, 1, ''),
(32, 9, 1, ''),
(32, 1, 1, ''),
(32, 7, 1, ''),
(32, 8, 1, ''),
(32, 6, 1, ''),
(32, 10, 1, ''),
(32, 11, 1, ''),
(32, 12, 1, ''),
(33, 2, 1, '<p>test 1</p>'),
(33, 3, 3, '<p>Comentaire 2</p>'),
(33, 4, 6, '<p>Commentaire 4</p>'),
(33, 5, 1, ''),
(33, 9, 1, ''),
(33, 1, 1, ''),
(33, 7, 1, ''),
(33, 8, 1, ''),
(33, 6, 1, ''),
(33, 10, 1, ''),
(33, 11, 1, ''),
(33, 12, 1, ''),
(34, 2, 5, ''),
(34, 3, 2, ''),
(34, 4, 4, ''),
(34, 5, 5, ''),
(34, 9, 6, ''),
(34, 1, 1, ''),
(34, 7, 1, ''),
(34, 8, 1, ''),
(34, 6, 1, ''),
(34, 10, 1, ''),
(34, 11, 1, ''),
(34, 12, 1, '');

-- --------------------------------------------------------

-- 
-- Structure de la table `parcour_professionnel`
-- 

CREATE TABLE `parcour_professionnel` (
  `id` int(11) NOT NULL auto_increment,
  `entreprise` varchar(150) default NULL,
  `annee` varchar(20) default NULL,
  `mission` text,
  `duree` varchar(50) default NULL,
  `idStagiaire` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- 
-- Contenu de la table `parcour_professionnel`
-- 

INSERT INTO `parcour_professionnel` (`id`, `entreprise`, `annee`, `mission`, `duree`, `idStagiaire`) VALUES 
(1, '', '', '2005-2006', '1', 0),
(2, '', '', 'étés 2004-', '1', 0),
(3, '', '', 'sdfsdf', '1', 0),
(4, '', '', 'dfg', '1', 0),
(6, 'France bay', '2006', 'Développeur Web\r\n', '2 mois', 1),
(8, 'SLVS', '2004-2007', 'Manutentionnaire\r\n', '2 mois ', 1),
(12, 'sdf', 'sdf', '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>', 'sdf', 1),
(13, 'sdf', 'sdf', '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>', 'sdf', 1),
(14, 'sdf', 'sdf', '<p>This is some <strong>sample text</strong>. You are using <a href="http://www.fckeditor.net/">FCKeditor</a>.</p>', 'sdf', 1),
(15, '', '', '<p><span style="font-size: larger;"><br />\r\n</span></p>', '', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `parcour_scolaire`
-- 

CREATE TABLE `parcour_scolaire` (
  `id` int(11) NOT NULL auto_increment,
  `diplome` varchar(100) default NULL,
  `lieux` varchar(100) default NULL,
  `annee` varchar(20) default NULL,
  `idStagiaire` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- 
-- Contenu de la table `parcour_scolaire`
-- 

INSERT INTO `parcour_scolaire` (`id`, `diplome`, `lieux`, `annee`, `idStagiaire`) VALUES 
(11, 'dfg', 'dfg', 'dfg', 1),
(3, 'Bac ', 'Saint Valery', '2003-2004', 1),
(4, 'licence Pro', 'elbeuf', '2007-2008', 1),
(10, 'dfg', '', 'fdg', 1),
(12, 'a', 'a', 'aa', 1),
(13, '', '', '', 1),
(14, '', '', 'test', 1),
(15, '', '', 'sdfsdf', 1),
(16, '', '', 'sdfsdfsdf', 1),
(17, '', '', 'qsdqs', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `projet_professionel`
-- 

CREATE TABLE `projet_professionel` (
  `id` int(11) NOT NULL auto_increment,
  `objectif` text,
  `descriptif` text,
  `poste` text,
  `idStagiaire` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `projet_professionel`
-- 

INSERT INTO `projet_professionel` (`id`, `objectif`, `descriptif`, `poste`, `idStagiaire`) VALUES 
(1, '<p><strong>objectif mise en forme </strong>objectyif 1<span style="color: rgb(255, 153, 0);">&nbsp;</span><span style="color: rgb(0, 0, 255);"><u> objctif 2 </u></span></p>', '<p>descriptif</p>', '<p>poste</p>', 1);

-- --------------------------------------------------------

-- 
-- Structure de la table `responsable_formation_entreprise`
-- 

CREATE TABLE `responsable_formation_entreprise` (
  `id` int(11) NOT NULL auto_increment,
  `idEntreprise` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `responsable_formation_entreprise`
-- 

INSERT INTO `responsable_formation_entreprise` (`id`, `idEntreprise`, `idUtilisateur`) VALUES 
(1, 1, 2);

-- --------------------------------------------------------

-- 
-- Structure de la table `responsable_hierarchique`
-- 

CREATE TABLE `responsable_hierarchique` (
  `id` int(11) NOT NULL auto_increment,
  `idEntreprise` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `responsable_hierarchique`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `responsable_service`
-- 

CREATE TABLE `responsable_service` (
  `id` int(11) NOT NULL auto_increment,
  `idEntreprise` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `responsable_service`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `stage`
-- 

CREATE TABLE `stage` (
  `id` int(11) NOT NULL auto_increment,
  `idStagiaire` int(11) default NULL,
  `idResponsableFormation` int(11) default NULL,
  `idResponsableService` int(11) default NULL,
  `idResponsabmeHierarchique` int(11) default NULL,
  `idEnseignant` int(11) default NULL,
  `horaire` varchar(20) default NULL,
  `mission` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Contenu de la table `stage`
-- 

INSERT INTO `stage` (`id`, `idStagiaire`, `idResponsableFormation`, `idResponsableService`, `idResponsabmeHierarchique`, `idEnseignant`, `horaire`, `mission`) VALUES 
(1, 1, 2, NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

-- 
-- Structure de la table `structure`
-- 

CREATE TABLE `structure` (
  `id` int(11) NOT NULL auto_increment,
  `denomination` varchar(100) default NULL,
  `doyen` int(11) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `structure`
-- 


-- --------------------------------------------------------

-- 
-- Structure de la table `utilisateur`
-- 

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL auto_increment,
  `nom` varchar(50) default NULL,
  `prenom` varchar(50) default NULL,
  `login` varchar(10) default NULL,
  `mdp` varchar(32) default NULL,
  `dateNaissance` date default NULL,
  `adresse` varchar(150) default NULL,
  `CP` varchar(10) default NULL,
  `ville` varchar(50) default NULL,
  `tel` varchar(20) default NULL,
  `portable` varchar(20) default NULL,
  `mail` varchar(100) default NULL,
  `photo` varchar(50) default NULL,
  `fax` varchar(20) default NULL,
  `idFormation` int(11) default NULL,
  `idNiveau` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- 
-- Contenu de la table `utilisateur`
-- 

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `login`, `mdp`, `dateNaissance`, `adresse`, `CP`, `ville`, `tel`, `portable`, `mail`, `photo`, `fax`, `idFormation`, `idNiveau`) VALUES 
(1, 'boullen', 'benoit', 'etudiant', 'a3c6c43c72c71ed874d16ce12f8cede1', '1986-07-04', '494 rue Maeterlinck', '76810', 'Gruchet-Saint-Siméon', '02-35-85-06-61', '06-71-89-62-58', 'benoit.boullen@etu.univ-rouen.fr', 'identite.jpg', '', 1, 1),
(2, 'tuteur ', 'entreprise', 'tuteur', '73acd9a5972130b75066c82595a1fae3', '1000-01-10', 'adresse', 'cp', 'vill', 'tel', 'portable', 'mail@a.a', '', 'fax', 0, 3),
(3, 'Sandrine', 'Syrykh', 'enseignant', '3ac3e5a795913a424bb98674764116c9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2);
