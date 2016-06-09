-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 09 Juin 2016 à 13:34
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
-- Structure de la table `Bilan`
--

DROP TABLE IF EXISTS `Bilan`;
CREATE TABLE IF NOT EXISTS `Bilan` (
  `idEvalRemplie` int(11) NOT NULL,
  `bilan` longtext COLLATE utf8_bin,
  `commentairesPostSoutenance` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `ComportementAppCours`
--

DROP TABLE IF EXISTS `ComportementAppCours`;
CREATE TABLE IF NOT EXISTS `ComportementAppCours` (
  `idEvalRemplie` int(11) NOT NULL,
  `commentaires` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(3, 1, NULL, 4, NULL, 6, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `DepotOffreAlternance`
--

DROP TABLE IF EXISTS `DepotOffreAlternance`;
CREATE TABLE IF NOT EXISTS `DepotOffreAlternance` (
  `idFormRempli` int(11) NOT NULL,
  `siteInternet` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `service` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `activiteEntreprise` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `descriptifPoste` longtext COLLATE utf8_bin,
  `missions` longtext COLLATE utf8_bin,
  `profitCandidatSouhaite` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `DroitAccesEvaluation`
--

DROP TABLE IF EXISTS `DroitAccesEvaluation`;
CREATE TABLE IF NOT EXISTS `DroitAccesEvaluation` (
  `idContratApprentissage` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idEvaluation` int(11) NOT NULL,
  `typeDroit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `DroitAccesEvaluation`
--

INSERT INTO `DroitAccesEvaluation` (`idContratApprentissage`, `idUtilisateur`, `idEvaluation`, `typeDroit`) VALUES
(1, 2, 1, 1),
(1, 2, 2, 1),
(1, 2, 3, 1),
(1, 2, 4, 1),
(1, 2, 5, 1),
(1, 4, 1, 2),
(1, 4, 2, 2),
(1, 4, 3, 1),
(1, 4, 4, 1),
(1, 4, 5, 2),
(1, 7, 1, 1),
(1, 7, 2, 1),
(1, 7, 3, 2),
(1, 7, 4, 2),
(1, 7, 5, 1),
(2, 3, 1, 1),
(2, 3, 2, 1),
(2, 3, 3, 1),
(2, 3, 4, 1),
(2, 3, 5, 1),
(2, 5, 1, 2),
(2, 5, 2, 2),
(2, 5, 3, 1),
(2, 5, 4, 1),
(2, 5, 5, 2),
(2, 6, 1, 1),
(2, 6, 2, 1),
(2, 6, 3, 2),
(2, 6, 4, 2),
(2, 6, 5, 1),
(3, 1, 1, 1),
(3, 1, 2, 1),
(3, 1, 3, 1),
(3, 1, 4, 1),
(3, 1, 5, 1),
(3, 4, 1, 2),
(3, 4, 2, 2),
(3, 4, 3, 1),
(3, 4, 4, 1),
(3, 4, 5, 2),
(3, 6, 1, 1),
(3, 6, 2, 1),
(3, 6, 3, 2),
(3, 6, 4, 2),
(3, 6, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `DroitAccesFormulaire`
--

DROP TABLE IF EXISTS `DroitAccesFormulaire`;
CREATE TABLE IF NOT EXISTS `DroitAccesFormulaire` (
  `idContratApprentissage` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idFormulaire` int(11) NOT NULL,
  `typeDroit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `DroitAccesFormulaire`
--

INSERT INTO `DroitAccesFormulaire` (`idContratApprentissage`, `idUtilisateur`, `idFormulaire`, `typeDroit`) VALUES
(3, 1, 1, 2),
(3, 1, 2, 2),
(3, 1, 3, 2),
(3, 1, 4, 1),
(3, 1, 5, 0),
(3, 1, 6, 2),
(3, 1, 7, 1),
(1, 2, 1, 2),
(1, 2, 2, 2),
(1, 2, 3, 2),
(1, 2, 4, 1),
(1, 2, 5, 0),
(1, 2, 6, 2),
(1, 2, 7, 1),
(2, 3, 1, 2),
(2, 3, 2, 2),
(2, 3, 3, 2),
(2, 3, 4, 1),
(2, 3, 5, 0),
(2, 3, 6, 2),
(2, 3, 7, 1),
(1, 4, 1, 0),
(3, 4, 1, 0),
(1, 4, 2, 0),
(3, 4, 2, 0),
(1, 4, 3, 0),
(3, 4, 3, 0),
(1, 4, 4, 1),
(3, 4, 4, 1),
(1, 4, 5, 2),
(3, 4, 5, 2),
(1, 4, 6, 0),
(3, 4, 6, 0),
(1, 4, 7, 1),
(3, 4, 7, 1),
(2, 5, 1, 0),
(2, 5, 2, 0),
(2, 5, 3, 0),
(2, 5, 4, 1),
(2, 5, 5, 2),
(2, 5, 6, 0),
(2, 5, 7, 1),
(2, 6, 1, 0),
(3, 6, 1, 0),
(2, 6, 2, 0),
(3, 6, 2, 0),
(2, 6, 3, 0),
(3, 6, 3, 0),
(2, 6, 4, 2),
(3, 6, 4, 2),
(2, 6, 5, 0),
(3, 6, 5, 0),
(2, 6, 6, 1),
(3, 6, 6, 1),
(2, 6, 7, 2),
(3, 6, 7, 2),
(1, 7, 1, 0),
(1, 7, 2, 0),
(1, 7, 3, 0),
(1, 7, 4, 2),
(1, 7, 5, 0),
(1, 7, 6, 1),
(1, 7, 7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `EnqueteRentree`
--

DROP TABLE IF EXISTS `EnqueteRentree`;
CREATE TABLE IF NOT EXISTS `EnqueteRentree` (
  `idFormRempli` int(11) NOT NULL,
  `connaissanceFormation` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `raisonChoixApprentissage` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `infosNecessaires` int(11) DEFAULT NULL,
  `participationAteliers` int(11) DEFAULT NULL,
  `avisAteliers` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `recommandationAteliers` int(11) DEFAULT NULL,
  `difficulteTrouverEntreprise` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `consultationOffresCfa` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `trouverEntreprise` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `facebook` int(11) DEFAULT NULL,
  `twitter` int(11) DEFAULT NULL,
  `linkedin` int(11) DEFAULT NULL,
  `viadeo` int(11) DEFAULT NULL,
  `avisAlternance` longtext COLLATE utf8_bin,
  `identificationCfa` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `difficulteTrouverLogement` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `remarques` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- Structure de la table `Entrevue`
--

DROP TABLE IF EXISTS `Entrevue`;
CREATE TABLE IF NOT EXISTS `Entrevue` (
  `idFormRempli` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `observations` longtext COLLATE utf8_bin,
  `Entrevuecol` varchar(45) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `EvalRemplie`
--

DROP TABLE IF EXISTS `EvalRemplie`;
CREATE TABLE IF NOT EXISTS `EvalRemplie` (
  `idEvalRemplie` int(11) NOT NULL,
  `idContratApprentissage` int(11) NOT NULL,
  `idEvalOrigine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Evaluation`
--

DROP TABLE IF EXISTS `Evaluation`;
CREATE TABLE IF NOT EXISTS `Evaluation` (
`idEvaluation` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `intitule` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Evaluation`
--

INSERT INTO `Evaluation` (`idEvaluation`, `nom`, `intitule`) VALUES
(1, 'missionPonctuelle', 'Mission ponctuelle'),
(2, 'savoirFaireSavoirEtre', 'Savoir-faire et savoir-être'),
(3, 'comportementAppCours', 'Comportement de l''apprenti en cours'),
(4, 'bilan', 'Bilan'),
(5, 'missionPrincipale', 'Mission principale');

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
  `dateEcheance` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `Formulaire`
--

INSERT INTO `Formulaire` (`idFormulaire`, `nom`, `intitule`, `dateEcheance`) VALUES
(1, 'ficheRenseignements', 'Fiche de renseignements', NULL),
(2, 'insertionProfessionnelle', 'Insertion professionnelle et suivi des diplômés', NULL),
(3, 'enqueteRentree', 'Enquête rentrée', NULL),
(4, 'visiteEntreprise', 'Visite en entreprise', NULL),
(5, 'depotOffreAlternance', 'Dépôt d''offre d''alternance', NULL),
(6, 'autorisationNotes', 'Autorisation de communication des résultats scolaires', NULL),
(7, 'entrevue', 'Entrevue', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `FormulaireRempli`
--

DROP TABLE IF EXISTS `FormulaireRempli`;
CREATE TABLE IF NOT EXISTS `FormulaireRempli` (
`idFormulaireRempli` int(11) NOT NULL,
  `idContratApprentissage` int(11) NOT NULL,
  `idFormulaireOrigine` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `InfosApprenti`
--

DROP TABLE IF EXISTS `InfosApprenti`;
CREATE TABLE IF NOT EXISTS `InfosApprenti` (
  `idApprenti` int(11) NOT NULL,
  `adApprenti` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `cpApprenti` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `villeApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `villeNaissance` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `autresRenseignements` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `autorisationNotes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `InfosApprenti`
--

INSERT INTO `InfosApprenti` (`idApprenti`, `adApprenti`, `cpApprenti`, `villeApprenti`, `dateNaissance`, `villeNaissance`, `age`, `autresRenseignements`, `autorisationNotes`) VALUES
(1, '3 rue Quelque Part', '27000', 'Evreux', '1997-04-04', 'Bordeaux', 61, 'http://www.ghibli.jp/', NULL),
(2, '4 rue Bidule', '69000', 'Lyon', '1978-06-17', 'Valenciennes', 42, 'http://www.ghibli.jp/', NULL),
(3, '5 rue Ici', '24000', 'Périgueux', '2000-12-02', 'Strasbourg', 74, 'http://tezukaosamu.net/jp/', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `InsertionProfessionnelle`
--

DROP TABLE IF EXISTS `InsertionProfessionnelle`;
CREATE TABLE IF NOT EXISTS `InsertionProfessionnelle` (
  `idFormRempli` int(11) NOT NULL,
  `poursuiteEtudes_nomEtablissement` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_lieu` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_adresse` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_cp` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_ville` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_diplome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_typeFormation` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_alternance_raisonSocialeEntreprise` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_alternance_adEntreprise` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_alternance_cpEntreprise` varchar(5) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_alternance_villeEntreprise` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `poursuiteEtudes_alternance_fonctionExercee` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `emploi_typeContrat` varchar(3) COLLATE utf8_bin DEFAULT NULL,
  `emploi_fonctions` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `emploi_nomEntreprise` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `rechercheEmploi_mobilite` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `rechercheEmploi_souhaits` longtext COLLATE utf8_bin,
  `associationAnciens` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `MissionPonctuelle`
--

DROP TABLE IF EXISTS `MissionPonctuelle`;
CREATE TABLE IF NOT EXISTS `MissionPonctuelle` (
  `idEvalRemplie` int(11) NOT NULL,
  `description` longtext COLLATE utf8_bin,
  `actionRealisee` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `observations` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `MissionPrincipale`
--

DROP TABLE IF EXISTS `MissionPrincipale`;
CREATE TABLE IF NOT EXISTS `MissionPrincipale` (
  `idEvalRemplie` int(11) NOT NULL,
  `description` longtext COLLATE utf8_bin,
  `actionRealisee` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `evaluation` int(11) DEFAULT NULL,
  `observations` longtext COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
-- Structure de la table `SavoirEtreSavoirFaire`
--

DROP TABLE IF EXISTS `SavoirEtreSavoirFaire`;
CREATE TABLE IF NOT EXISTS `SavoirEtreSavoirFaire` (
  `idEvalRemplie` int(11) NOT NULL,
  `consciencePro` int(11) DEFAULT NULL,
  `sociabiliteVieGroupe` int(11) DEFAULT NULL,
  `tenacite` int(11) DEFAULT NULL,
  `respectRegles` int(11) DEFAULT NULL,
  `aptitudesVisAVisPersonnel` int(11) DEFAULT NULL,
  `efficacite` int(11) DEFAULT NULL,
  `comprehensionInfos` int(11) DEFAULT NULL,
  `autonomie` int(11) DEFAULT NULL,
  `initiative` int(11) DEFAULT NULL,
  `methodeEtOrganisation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE IF NOT EXISTS `Utilisateur` (
`idUtilisateur` int(11) NOT NULL,
  `login` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
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
(1, 'miyazaki', '35d9c6f2c843caa5f72bc90993b916788eaa0c8d1abfaa8594f50b1566bcb36805b648a53bb3835beb80d3a6937d3861b08b8f4e809825fba29634560e7e61b1', 'Miyazaki', 'Hayao', 'apprenti', '0200000000', '0600000000', 'hayao.miyazaki@etu.univ-rouen.fr'),
(2, 'takahata', '48c085ce003b8d807c9308ca3b8b75d03cbbae7ad85f07fcaed64dd218841e9003ead20c04747a0ba4093d2c8e4f0b9551e0b915d918b7faae884fa98074a550', 'Takahata', 'Iszao', 'apprenti', '0200000000', '0600000000', 'iszao.takahata@etu.univ-rouen.fr'),
(3, 'tezuka', '9872c3c7ba0b7ce68ef4bd348918d98b282e1ec46a4920ddfbcd86ade62b0a19085f44a6b143244c644a85a217262b5136c3c7d8b0a796aac4443aa83ae55322', 'Tezuka', 'Osamu', 'apprenti', '0200000000', '0600000000', 'osamu.tezuka@etu.univ-rouen.fr'),
(4, 'kurosawa', '2e6182f39b18467de3c4b56fd63752b5a375d69cfee4b078c8329123cc44c04711e5ca9b897fdcd258011e227f72b3222096f001a0fff08b4f10067833f700af', 'Kurosawa', 'Akira', 'maitreApprentissage', '0200000000', '0600000000', 'akira.kurosawa@entreprisex.com'),
(5, 'fukasaku', '5e5cdba46f516b4c70d978c8db15bb176d2e31582165d76bcf1a400eacef8ebec9d0c96b8eb5441bba672c00d66280f94a2dcadc606d6e26c99092a28b63e2c2', 'Fukasaku', 'Kinji', 'maitreApprentissage', '0200000000', '0600000000', 'kinji.fukasaku@entreprisey.com'),
(6, 'nomura', '73a75e4511046845e2cdfc3917b065432baa6ab4939705e25646a7a254ca226e75dbf6c7781189dc3423e8308f8cbe11cca6e6dd9f9f01712b1052d9d766fc38', 'Nomura', 'Tetsuya', 'tuteurPedagogique', '0200000000', '0600000000', 'tetsuya.nomura@univ-rouen.fr'),
(7, 'baba', '8d86eb09ff42189be46d828d51238501bc3345de6d3ea4fda2e1b589558a17f9262b80a8ae5e978b820d14c04f0f386a9ab7f8fe1044ca9e59ba536a2b3c046a', 'Baba', 'Hideo', 'tuteurPedagogique', '0200000000', '0600000000', 'hideo.baba@univ-rouen.fr');

-- --------------------------------------------------------

--
-- Structure de la table `VisiteEntreprise`
--

DROP TABLE IF EXISTS `VisiteEntreprise`;
CREATE TABLE IF NOT EXISTS `VisiteEntreprise` (
  `idFormRempli` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `presenceApprenti` int(11) DEFAULT NULL,
  `raisonAbsence` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dureeEntretien` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `lieuEntretien` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Bilan`
--
ALTER TABLE `Bilan`
 ADD PRIMARY KEY (`idEvalRemplie`), ADD KEY `eval_bilan_idx` (`idEvalRemplie`);

--
-- Index pour la table `ComportementAppCours`
--
ALTER TABLE `ComportementAppCours`
 ADD PRIMARY KEY (`idEvalRemplie`), ADD KEY `eval_comportement-app-cours_idx` (`idEvalRemplie`);

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
-- Index pour la table `DepotOffreAlternance`
--
ALTER TABLE `DepotOffreAlternance`
 ADD PRIMARY KEY (`idFormRempli`), ADD KEY `form_depot-offre-alternance_idx` (`idFormRempli`);

--
-- Index pour la table `DroitAccesEvaluation`
--
ALTER TABLE `DroitAccesEvaluation`
 ADD PRIMARY KEY (`idContratApprentissage`,`idUtilisateur`,`idEvaluation`), ADD KEY `utilisateur_eval_idx` (`idUtilisateur`), ADD KEY `eval_idx` (`idEvaluation`);

--
-- Index pour la table `DroitAccesFormulaire`
--
ALTER TABLE `DroitAccesFormulaire`
 ADD PRIMARY KEY (`idUtilisateur`,`idFormulaire`,`idContratApprentissage`), ADD KEY `contenuFormVide_idx` (`idFormulaire`), ADD KEY `contrat_idx` (`idContratApprentissage`);

--
-- Index pour la table `EnqueteRentree`
--
ALTER TABLE `EnqueteRentree`
 ADD PRIMARY KEY (`idFormRempli`), ADD KEY `form_enquete-rentree_idx` (`idFormRempli`);

--
-- Index pour la table `Entreprise`
--
ALTER TABLE `Entreprise`
 ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `Entrevue`
--
ALTER TABLE `Entrevue`
 ADD PRIMARY KEY (`idFormRempli`), ADD KEY `form_entrevue_idx` (`idFormRempli`);

--
-- Index pour la table `EvalRemplie`
--
ALTER TABLE `EvalRemplie`
 ADD PRIMARY KEY (`idEvalRemplie`,`idContratApprentissage`,`idEvalOrigine`), ADD KEY `eval_origine_idx` (`idEvalOrigine`), ADD KEY `eval_contrat_idx` (`idContratApprentissage`);

--
-- Index pour la table `Evaluation`
--
ALTER TABLE `Evaluation`
 ADD PRIMARY KEY (`idEvaluation`);

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
 ADD PRIMARY KEY (`idFormulaireRempli`,`idContratApprentissage`,`idFormulaireOrigine`), ADD KEY `formulaire_origine_idx` (`idFormulaireOrigine`), ADD KEY `formulaire_contrat` (`idContratApprentissage`);

--
-- Index pour la table `InfosApprenti`
--
ALTER TABLE `InfosApprenti`
 ADD PRIMARY KEY (`idApprenti`), ADD KEY `apprenti_idx` (`idApprenti`);

--
-- Index pour la table `InsertionProfessionnelle`
--
ALTER TABLE `InsertionProfessionnelle`
 ADD PRIMARY KEY (`idFormRempli`), ADD KEY `form_insertion-pro_idx` (`idFormRempli`);

--
-- Index pour la table `MissionPonctuelle`
--
ALTER TABLE `MissionPonctuelle`
 ADD PRIMARY KEY (`idEvalRemplie`), ADD KEY `eval_mission-ponctuelle_idx` (`idEvalRemplie`);

--
-- Index pour la table `MissionPrincipale`
--
ALTER TABLE `MissionPrincipale`
 ADD PRIMARY KEY (`idEvalRemplie`), ADD KEY `eval_mission-principale_idx` (`idEvalRemplie`);

--
-- Index pour la table `RattachementEntreprise`
--
ALTER TABLE `RattachementEntreprise`
 ADD PRIMARY KEY (`idMaitreApprentissage`,`idEntreprise`), ADD KEY `entreprise_idx` (`idEntreprise`);

--
-- Index pour la table `RattachementFormation`
--
ALTER TABLE `RattachementFormation`
 ADD PRIMARY KEY (`idUtilisateur`,`idFormation`), ADD KEY `formation_idx` (`idFormation`), ADD KEY `utilisateurRattache_idx` (`idUtilisateur`);

--
-- Index pour la table `SavoirEtreSavoirFaire`
--
ALTER TABLE `SavoirEtreSavoirFaire`
 ADD PRIMARY KEY (`idEvalRemplie`), ADD KEY `eval_savoir-etre_idx` (`idEvalRemplie`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
 ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `VisiteEntreprise`
--
ALTER TABLE `VisiteEntreprise`
 ADD PRIMARY KEY (`idFormRempli`), ADD KEY `form_visite-entreprise_idx` (`idFormRempli`);

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
-- AUTO_INCREMENT pour la table `Evaluation`
--
ALTER TABLE `Evaluation`
MODIFY `idEvaluation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Formation`
--
ALTER TABLE `Formation`
MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Formulaire`
--
ALTER TABLE `Formulaire`
MODIFY `idFormulaire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `FormulaireRempli`
--
ALTER TABLE `FormulaireRempli`
MODIFY `idFormulaireRempli` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Bilan`
--
ALTER TABLE `Bilan`
ADD CONSTRAINT `eval_bilan` FOREIGN KEY (`idEvalRemplie`) REFERENCES `EvalRemplie` (`idEvalRemplie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ComportementAppCours`
--
ALTER TABLE `ComportementAppCours`
ADD CONSTRAINT `eval_comportement-app-cours` FOREIGN KEY (`idEvalRemplie`) REFERENCES `EvalRemplie` (`idEvalRemplie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ContratApprentissage`
--
ALTER TABLE `ContratApprentissage`
ADD CONSTRAINT `signatureApprenti` FOREIGN KEY (`idApprenti`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `signatureMaitreApprentissage` FOREIGN KEY (`idMaitreApprentissage`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `signatureTuteurPedagogique` FOREIGN KEY (`idTuteurPedagogique`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `DepotOffreAlternance`
--
ALTER TABLE `DepotOffreAlternance`
ADD CONSTRAINT `form_depot-offre-alternance` FOREIGN KEY (`idFormRempli`) REFERENCES `FormulaireRempli` (`idFormulaireRempli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `DroitAccesEvaluation`
--
ALTER TABLE `DroitAccesEvaluation`
ADD CONSTRAINT `contrat_eval` FOREIGN KEY (`idContratApprentissage`) REFERENCES `ContratApprentissage` (`idContratApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `utilisateur_eval` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `eval` FOREIGN KEY (`idEvaluation`) REFERENCES `Evaluation` (`idEvaluation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `DroitAccesFormulaire`
--
ALTER TABLE `DroitAccesFormulaire`
ADD CONSTRAINT `utilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `form` FOREIGN KEY (`idFormulaire`) REFERENCES `Formulaire` (`idFormulaire`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `contrat` FOREIGN KEY (`idContratApprentissage`) REFERENCES `ContratApprentissage` (`idContratApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `EnqueteRentree`
--
ALTER TABLE `EnqueteRentree`
ADD CONSTRAINT `form_enquete-rentree` FOREIGN KEY (`idFormRempli`) REFERENCES `FormulaireRempli` (`idFormulaireRempli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Entrevue`
--
ALTER TABLE `Entrevue`
ADD CONSTRAINT `form_entrevue` FOREIGN KEY (`idFormRempli`) REFERENCES `FormulaireRempli` (`idFormulaireRempli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `EvalRemplie`
--
ALTER TABLE `EvalRemplie`
ADD CONSTRAINT `eval_origine` FOREIGN KEY (`idEvalOrigine`) REFERENCES `Evaluation` (`idEvaluation`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `eval_contrat` FOREIGN KEY (`idContratApprentissage`) REFERENCES `ContratApprentissage` (`idContratApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `formulaire_contrat` FOREIGN KEY (`idContratApprentissage`) REFERENCES `ContratApprentissage` (`idContratApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `InfosApprenti`
--
ALTER TABLE `InfosApprenti`
ADD CONSTRAINT `apprenti` FOREIGN KEY (`idApprenti`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `InsertionProfessionnelle`
--
ALTER TABLE `InsertionProfessionnelle`
ADD CONSTRAINT `form_insertion-pro` FOREIGN KEY (`idFormRempli`) REFERENCES `FormulaireRempli` (`idFormulaireRempli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `MissionPonctuelle`
--
ALTER TABLE `MissionPonctuelle`
ADD CONSTRAINT `eval_mission-ponctuelle` FOREIGN KEY (`idEvalRemplie`) REFERENCES `EvalRemplie` (`idEvalRemplie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `MissionPrincipale`
--
ALTER TABLE `MissionPrincipale`
ADD CONSTRAINT `eval_mission-principale` FOREIGN KEY (`idEvalRemplie`) REFERENCES `EvalRemplie` (`idEvalRemplie`) ON DELETE CASCADE ON UPDATE CASCADE;

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
ADD CONSTRAINT `utilisateurRattache` FOREIGN KEY (`idUtilisateur`) REFERENCES `Utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `formation` FOREIGN KEY (`idFormation`) REFERENCES `Formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `SavoirEtreSavoirFaire`
--
ALTER TABLE `SavoirEtreSavoirFaire`
ADD CONSTRAINT `eval_savoir-etre` FOREIGN KEY (`idEvalRemplie`) REFERENCES `EvalRemplie` (`idEvalRemplie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `VisiteEntreprise`
--
ALTER TABLE `VisiteEntreprise`
ADD CONSTRAINT `form_visite-entreprise` FOREIGN KEY (`idFormRempli`) REFERENCES `FormulaireRempli` (`idFormulaireRempli`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
