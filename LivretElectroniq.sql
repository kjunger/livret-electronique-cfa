-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 01 Juin 2016 à 15:05
-- Version du serveur :  5.5.49-0+deb8u1
-- Version de PHP :  5.6.20-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `LivretElectroniq`
--
CREATE DATABASE IF NOT EXISTS `LivretElectroniq` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `LivretElectroniq`;

-- --------------------------------------------------------

--
-- Structure de la table `Composante`
--

DROP TABLE IF EXISTS `Composante`;
CREATE TABLE IF NOT EXISTS `Composante` (
`idComposante` int(11) NOT NULL,
  `nomComposante` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `adComposante` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpComposante` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `villeComposante` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Composante`
--

INSERT INTO `Composante` (`idComposante`, `nomComposante`, `adComposante`, `cpComposante`, `villeComposante`) VALUES
(1, 'IUT de Rouen - Site Pasteur', '3 avenue Pasteur', '76000', 'Rouen'),
(2, 'IUT de Rouen - Site d''Elbeuf', '24 cours Gambetta', '76500', 'Elbeuf');

-- --------------------------------------------------------

--
-- Structure de la table `ContratApprentissage`
--

DROP TABLE IF EXISTS `ContratApprentissage`;
CREATE TABLE IF NOT EXISTS `ContratApprentissage` (
`idContratApprentissage` int(11) NOT NULL,
  `idApprenti` int(11) NOT NULL,
  `dateSignatureApprenti` date DEFAULT NULL,
  `idMaitreApprentissage` int(11) NOT NULL,
  `dateSignatureMaitreApprentissage` date DEFAULT NULL,
  `idTuteurPedagogique` int(11) NOT NULL,
  `dateSignatureTuteurPedagogique` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `ContratApprentissage`
--

INSERT INTO `ContratApprentissage` (`idContratApprentissage`, `idApprenti`, `dateSignatureApprenti`, `idMaitreApprentissage`, `dateSignatureMaitreApprentissage`, `idTuteurPedagogique`, `dateSignatureTuteurPedagogique`) VALUES
(1, 2, NULL, 4, NULL, 7, NULL),
(2, 3, NULL, 5, NULL, 6, NULL),
(3, 1, '2016-05-30', 4, NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `DroitAccesFichier`
--

DROP TABLE IF EXISTS `DroitAccesFichier`;
CREATE TABLE IF NOT EXISTS `DroitAccesFichier` (
  `idUtilisateur` int(11) NOT NULL,
  `idFichier` int(11) NOT NULL,
  `typeDroit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `DroitAccesFormulaire`
--

DROP TABLE IF EXISTS `DroitAccesFormulaire`;
CREATE TABLE IF NOT EXISTS `DroitAccesFormulaire` (
  `idUtilisateur` int(11) NOT NULL,
  `idFormulaire` int(11) NOT NULL,
  `typeDroit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `DroitAccesFormulaire`
--

INSERT INTO `DroitAccesFormulaire` (`idUtilisateur`, `idFormulaire`, `typeDroit`) VALUES
(1, 1, 0),
(1, 2, 1),
(1, 3, 2),
(1, 4, 2),
(1, 5, 0),
(1, 6, 2),
(1, 7, 0),
(1, 8, 2),
(1, 9, 1),
(1, 10, 1),
(1, 11, 1),
(1, 12, 1),
(2, 1, 0),
(2, 2, 1),
(2, 3, 2),
(2, 4, 2),
(2, 5, 0),
(2, 6, 2),
(2, 7, 0),
(2, 8, 2),
(2, 9, 1),
(2, 10, 1),
(2, 11, 1),
(2, 12, 1),
(3, 1, 0),
(3, 2, 1),
(3, 3, 2),
(3, 4, 2),
(3, 5, 0),
(3, 6, 2),
(3, 7, 0),
(3, 8, 2),
(3, 9, 1),
(3, 10, 1),
(3, 11, 1),
(3, 12, 1),
(4, 1, 0),
(4, 2, 2),
(4, 3, 0),
(4, 4, 0),
(4, 5, 0),
(4, 6, 0),
(4, 7, 2),
(4, 8, 0),
(4, 9, 1),
(4, 10, 2),
(4, 11, 2),
(4, 12, 2),
(5, 1, 0),
(5, 2, 2),
(5, 3, 0),
(5, 4, 0),
(5, 5, 0),
(5, 6, 0),
(5, 7, 2),
(5, 8, 0),
(5, 9, 1),
(5, 10, 2),
(5, 11, 2),
(5, 12, 2),
(6, 1, 2),
(6, 2, 1),
(6, 3, 0),
(6, 4, 0),
(6, 5, 2),
(6, 6, 0),
(6, 7, 0),
(6, 8, 0),
(6, 9, 2),
(6, 10, 1),
(6, 11, 1),
(6, 12, 1),
(7, 1, 2),
(7, 2, 1),
(7, 3, 0),
(7, 4, 0),
(7, 5, 2),
(7, 6, 0),
(7, 7, 0),
(7, 8, 0),
(7, 9, 2),
(7, 10, 1),
(7, 11, 1),
(7, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Entreprise`
--

DROP TABLE IF EXISTS `Entreprise`;
CREATE TABLE IF NOT EXISTS `Entreprise` (
`idEntreprise` int(11) NOT NULL,
  `raisonSocialeEntreprise` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `adEntreprise` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpEntreprise` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `villeEntreprise` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Entreprise`
--

INSERT INTO `Entreprise` (`idEntreprise`, `raisonSocialeEntreprise`, `adEntreprise`, `cpEntreprise`, `villeEntreprise`) VALUES
(1, 'Entreprise X', '1 rue Truc', '75000', 'Paris'),
(2, 'Entreprise Y', '2 rue Machin', '59000', 'Lille');

-- --------------------------------------------------------

--
-- Structure de la table `Fichier`
--

DROP TABLE IF EXISTS `Fichier`;
CREATE TABLE IF NOT EXISTS `Fichier` (
`idFichier` int(11) NOT NULL,
  `emplacementFichier` varchar(200) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Formation`
--

DROP TABLE IF EXISTS `Formation`;
CREATE TABLE IF NOT EXISTS `Formation` (
`idFormation` int(11) NOT NULL,
  `intituleFormation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `idComposante` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Formation`
--

INSERT INTO `Formation` (`idFormation`, `intituleFormation`, `idComposante`) VALUES
(1, 'DUT Techniques de Commercialisation', 1),
(2, 'LP Activités et Techniques de Communication', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Formulaire`
--

DROP TABLE IF EXISTS `Formulaire`;
CREATE TABLE IF NOT EXISTS `Formulaire` (
`idFormulaire` int(11) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `intitule` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Formulaire`
--

INSERT INTO `Formulaire` (`idFormulaire`, `nom`, `intitule`, `type`) VALUES
(1, 'entrevues', 'Entrevues', 'form'),
(2, 'bilan', 'Bilan de l''année', 'eval'),
(3, 'fiche_renseignements', 'Fiche de renseignements', 'form'),
(4, 'insertion_pro', 'Insertion professionnelle & suivi des diplômés', 'form'),
(5, 'visite_entreprise', 'Visites en entreprise', 'form'),
(6, 'enquete_rentree', 'Enquête rentrée', 'form'),
(7, 'depot-offre-alternance', 'Dépôt d''offre d''alternance', 'form'),
(8, 'autorisation-notes', 'Autorisation de communication des résultats scolaires', 'form'),
(9, 'comportement-app-cours', 'Comportement de l''apprenti en cours', 'eval'),
(10, 'mission-ponctuelle', 'Mission ponctuelle', 'eval'),
(11, 'mission-principale', 'Mission principale', 'eval'),
(12, 'savoir-etre-savoir-faire', 'Savoir-être et savoir-faire', 'eval');

-- --------------------------------------------------------

--
-- Structure de la table `FormulaireRempli`
--

DROP TABLE IF EXISTS `FormulaireRempli`;
CREATE TABLE IF NOT EXISTS `FormulaireRempli` (
`idFormulaireRempli` int(11) NOT NULL,
  `idFormulaireOrigine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `InfosApprenti`
--

DROP TABLE IF EXISTS `InfosApprenti`;
CREATE TABLE IF NOT EXISTS `InfosApprenti` (
  `idApprenti` int(11) NOT NULL,
  `adApprenti` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpApprenti` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `villeApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `InfosApprenti`
--

INSERT INTO `InfosApprenti` (`idApprenti`, `adApprenti`, `cpApprenti`, `villeApprenti`) VALUES
(1, '3 rue Quelque Part', '27000', 'Evreux'),
(2, '4 rue Bidule', '69000', 'Lyon'),
(3, '5 rue Ici', '24000', 'Périgueux');

-- --------------------------------------------------------

--
-- Structure de la table `RattachementEntreprise`
--

DROP TABLE IF EXISTS `RattachementEntreprise`;
CREATE TABLE IF NOT EXISTS `RattachementEntreprise` (
  `idMaitreApprentissage` int(11) NOT NULL,
  `idEntreprise` int(11) NOT NULL,
  `fonction` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `RattachementEntreprise`
--

INSERT INTO `RattachementEntreprise` (`idMaitreApprentissage`, `idEntreprise`, `fonction`) VALUES
(4, 1, 'Réalisateur'),
(5, 2, 'Réalisateur-scénariste');

-- --------------------------------------------------------

--
-- Structure de la table `RattachementFormation`
--

DROP TABLE IF EXISTS `RattachementFormation`;
CREATE TABLE IF NOT EXISTS `RattachementFormation` (
  `idUtilisateur` int(11) NOT NULL,
  `idFormation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `RattachementFormation`
--

INSERT INTO `RattachementFormation` (`idUtilisateur`, `idFormation`) VALUES
(2, 1),
(7, 1),
(1, 2),
(3, 2),
(6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE IF NOT EXISTS `Utilisateur` (
`idUtilisateur` int(11) NOT NULL,
  `login` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `nom` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `type` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `port` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Utilisateur`
--

INSERT INTO `Utilisateur` (`idUtilisateur`, `login`, `pass`, `nom`, `prenom`, `type`, `tel`, `port`, `email`) VALUES
(1, 'miyazaki', 'b154cfd982e333157a690e7679923a0a', 'Miyazaki', 'Hayao', 'apprenti', '0200000000', '0600000000', 'hayao.miyazaki@etu.univ-rouen.fr'),
(2, 'takahata', '6dbbf3c865af23bd2f1cf83bbe08e65d', 'Takahata', 'Iszao', 'apprenti', '0200000000', '0600000000', 'iszao.takahata@etu.univ-rouen.fr'),
(3, 'tezuka', '17b75b0c22300cf8a1b4dd96db2ec120', 'Tezuka', 'Osamu', 'apprenti', '0200000000', '0600000000', 'osamu.tezuka@etu.univ-rouen.fr'),
(4, 'kurosawa', 'a577efa718b09de808898ca4d658099f', 'Kurosawa', 'Akira', 'maitreApprentissage', '0200000000', '0600000000', 'akira.kurosawa@entreprisex.com'),
(5, 'fukasaku', '7ff765bd41987d5dcd97d1dfae28a61a', 'Fukasaku', 'Kinji', 'maitreApprentissage', '0200000000', '0600000000', 'kinji.fukasaku@entreprisey.com'),
(6, 'nomura', 'fc198e7ec26fcbc753d1563b2fcc2ed6', 'Nomura', 'Tetsuya', 'tuteurPedagogique', '0200000000', '0600000000', 'tetsuya.nomura@univ-rouen.fr'),
(7, 'baba', '21661093e56e24cd60b10092005c4ac7', 'Baba', 'Hideo', 'tuteurPedagogique', '0200000000', '0600000000', 'hideo.baba@univ-rouen.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Composante`
--
ALTER TABLE `Composante`
 ADD PRIMARY KEY (`idComposante`);

--
-- Index pour la table `ContratApprentissage`
--
ALTER TABLE `ContratApprentissage`
 ADD PRIMARY KEY (`idContratApprentissage`,`idApprenti`,`idTuteurPedagogique`,`idMaitreApprentissage`), ADD KEY `signatureApprenti_idx` (`idApprenti`), ADD KEY `signatureMaitreApprentissage_idx` (`idMaitreApprentissage`), ADD KEY `signatureTuteurPedagogique_idx` (`idTuteurPedagogique`);

--
-- Index pour la table `DroitAccesFichier`
--
ALTER TABLE `DroitAccesFichier`
 ADD PRIMARY KEY (`idUtilisateur`,`idFichier`), ADD KEY `utilisateur_fi_idx` (`idUtilisateur`), ADD KEY `fichier_idx` (`idFichier`);

--
-- Index pour la table `DroitAccesFormulaire`
--
ALTER TABLE `DroitAccesFormulaire`
 ADD PRIMARY KEY (`idUtilisateur`,`idFormulaire`), ADD KEY `contenuFormVide_idx` (`idFormulaire`);

--
-- Index pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
 ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `Fichier`
--
ALTER TABLE `Fichier`
 ADD PRIMARY KEY (`idFichier`);

--
-- Index pour la table `Formation`
--
ALTER TABLE `Formation`
 ADD PRIMARY KEY (`idFormation`,`idComposante`), ADD KEY `idComposante_F_idx` (`idComposante`);

--
-- Index pour la table `Formulaire`
--
ALTER TABLE `Formulaire`
 ADD PRIMARY KEY (`idFormulaire`);

--
-- Index pour la table `FormulaireRempli`
--
ALTER TABLE `FormulaireRempli`
 ADD PRIMARY KEY (`idFormulaireRempli`,`idFormulaireOrigine`), ADD KEY `formulaire_origine_idx` (`idFormulaireOrigine`);

--
-- Index pour la table `InfosApprenti`
--
ALTER TABLE `InfosApprenti`
 ADD PRIMARY KEY (`idApprenti`), ADD KEY `apprenti_idx` (`idApprenti`);

--
-- Index pour la table `RattachementEntreprise`
--
ALTER TABLE `RattachementEntreprise`
 ADD PRIMARY KEY (`idMaitreApprentissage`), ADD KEY `entreprise_idx` (`idEntreprise`);

--
-- Index pour la table `RattachementFormation`
--
ALTER TABLE `RattachementFormation`
 ADD PRIMARY KEY (`idUtilisateur`,`idFormation`), ADD KEY `formation_idx` (`idFormation`), ADD KEY `utilisateurRattache_idx` (`idUtilisateur`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
 ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Composante`
--
ALTER TABLE `Composante`
MODIFY `idComposante` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ContratApprentissage`
--
ALTER TABLE `ContratApprentissage`
MODIFY `idContratApprentissage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Fichier`
--
ALTER TABLE `Fichier`
MODIFY `idFichier` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Formation`
--
ALTER TABLE `Formation`
MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Formulaire`
--
ALTER TABLE `Formulaire`
MODIFY `idFormulaire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `FormulaireRempli`
--
ALTER TABLE `FormulaireRempli`
MODIFY `idFormulaireRempli` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ContratApprentissage`
--
ALTER TABLE `ContratApprentissage`
ADD CONSTRAINT `signatureApprenti` FOREIGN KEY (`idApprenti`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `signatureMaitreApprentissage` FOREIGN KEY (`idMaitreApprentissage`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `signatureTuteurPedagogique` FOREIGN KEY (`idTuteurPedagogique`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `DroitAccesFichier`
--
ALTER TABLE `DroitAccesFichier`
ADD CONSTRAINT `fichier` FOREIGN KEY (`idFichier`) REFERENCES `Fichier` (`idFichier`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `utilisateur_fichier` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `DroitAccesFormulaire`
--
ALTER TABLE `DroitAccesFormulaire`
ADD CONSTRAINT `form` FOREIGN KEY (`idFormulaire`) REFERENCES `Formulaire` (`idFormulaire`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Formation`
--
ALTER TABLE `Formation`
ADD CONSTRAINT `composante` FOREIGN KEY (`idComposante`) REFERENCES `Composante` (`idComposante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `FormulaireRempli`
--
ALTER TABLE `FormulaireRempli`
ADD CONSTRAINT `formulaire_origine` FOREIGN KEY (`idFormulaireOrigine`) REFERENCES `Formulaire` (`idFormulaire`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `formulaire_rempli` FOREIGN KEY (`idFormulaireRempli`) REFERENCES `Fichier` (`idFichier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `InfosApprenti`
--
ALTER TABLE `InfosApprenti`
ADD CONSTRAINT `apprenti` FOREIGN KEY (`idApprenti`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `RattachementEntreprise`
--
ALTER TABLE `RattachementEntreprise`
ADD CONSTRAINT `employeEntreprise` FOREIGN KEY (`idMaitreApprentissage`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `entreprise` FOREIGN KEY (`idEntreprise`) REFERENCES `Entreprise` (`idEntreprise`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `RattachementFormation`
--
ALTER TABLE `RattachementFormation`
ADD CONSTRAINT `formation` FOREIGN KEY (`idFormation`) REFERENCES `Formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `utilisateurRattache` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
