-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Mars 2016 à 15:22
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `livretelectronique`
--

-- --------------------------------------------------------

--
-- Structure de la table `apprenti`
--

DROP TABLE IF EXISTS `apprenti`;
CREATE TABLE `apprenti` (
  `idApprenti` int(11) NOT NULL,
  `loginApprenti` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `mdpApprenti` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `nomApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prenomApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `adApprenti` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `compAdApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cpApprenti` int(5) DEFAULT NULL,
  `villeApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telApprenti` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `portApprenti` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `mailApprenti` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `idFormation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `apprenti`
--

INSERT INTO `apprenti` (`idApprenti`, `loginApprenti`, `mdpApprenti`, `nomApprenti`, `prenomApprenti`, `adApprenti`, `compAdApprenti`, `cpApprenti`, `villeApprenti`, `telApprenti`, `portApprenti`, `mailApprenti`, `idFormation`) VALUES
(1, 'wamozart', '3720f54e919b22cce392b05de57102dd', 'MOZART', 'Wolfgang A.', '1 rue Quelquepart', NULL, 27000, 'Evreux', '0232020202', '0606060606', 'w-a.mozart@etu.univ-rouen.fr', 2),
(2, 'jhisaish', '8ff32489f92f33416694be8fdc2d4c22', 'HISAISHI', 'Joe', '1 rue Autrepart', NULL, 76000, 'Rouen', '0235353535', '0707070707', 'j.hisaishi@etu.univ-rouen.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `contratapprentissage`
--

DROP TABLE IF EXISTS `contratapprentissage`;
CREATE TABLE `contratapprentissage` (
  `idContratApprentissage` int(11) NOT NULL,
  `idApprenti` int(11) DEFAULT NULL,
  `signatureApprentiContratApprentissage` int(11) DEFAULT NULL,
  `idMaitreApprentissage` int(11) DEFAULT NULL,
  `signatureMaitreApprentissageContratApprentissage` int(11) DEFAULT NULL,
  `idTuteurPedagogique` int(11) DEFAULT NULL,
  `signatureTuteurPedagogiqueContratApprentissage` int(11) DEFAULT NULL,
  `dateSignatureContratApprentissage` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `contratapprentissage`
--

INSERT INTO `contratapprentissage` (`idContratApprentissage`, `idApprenti`, `signatureApprentiContratApprentissage`, `idMaitreApprentissage`, `signatureMaitreApprentissageContratApprentissage`, `idTuteurPedagogique`, `signatureTuteurPedagogiqueContratApprentissage`, `dateSignatureContratApprentissage`) VALUES
(1, 1, 0, 2, 0, 1, 0, NULL),
(2, 2, 0, 1, 0, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `droitsformulairestandard`
--

DROP TABLE IF EXISTS `droitsformulairestandard`;
CREATE TABLE `droitsformulairestandard` (
  `idDroitsFormulaireStandard` int(11) NOT NULL,
  `idFormulaireStandard` int(11) NOT NULL,
  `idContratApprentissage` int(11) DEFAULT NULL,
  `idApprenti` int(11) DEFAULT NULL,
  `droitsApprentiDroitsFormulaireStandard` int(11) DEFAULT NULL,
  `idMaitreApprentissage` int(11) DEFAULT NULL,
  `droitsMaitreApprentissageDroitsFormulaireStandard` int(11) DEFAULT NULL,
  `idTuteurPedagogique` int(11) DEFAULT NULL,
  `droitsTuteurPedagogiqueDroitsFormulaireStandard` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `droitsformulairesupplementaire`
--

DROP TABLE IF EXISTS `droitsformulairesupplementaire`;
CREATE TABLE `droitsformulairesupplementaire` (
  `idDroitsFormulaireSupplementaire` int(11) NOT NULL,
  `idFormulaireSupplementaire` int(11) DEFAULT NULL,
  `idFormation` int(11) DEFAULT NULL,
  `idApprenti` int(11) DEFAULT NULL,
  `droitsApprentiDroitsFormulaireSupplementaire` int(11) DEFAULT NULL,
  `idMaitreApprentissage` int(11) DEFAULT NULL,
  `droitsMaitreApprentiDroitsFormulaireSupplementaire` int(11) DEFAULT NULL,
  `idTuteurPedagogique` int(11) DEFAULT NULL,
  `droitsTuteurPedagogiqueDroitsFormulaireSupplementaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `editionformulairesupplementaire`
--

DROP TABLE IF EXISTS `editionformulairesupplementaire`;
CREATE TABLE `editionformulairesupplementaire` (
  `idEditionFormulaireSupplementaire` int(11) NOT NULL,
  `idFormation` int(11) DEFAULT NULL,
  `idFormulaireSupplementaire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE `formation` (
  `idFormation` int(11) NOT NULL,
  `nomFormation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `composanteFormation` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `adFormation` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `compAdFormation` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `cpFormation` int(5) DEFAULT NULL,
  `villeFormation` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `idRepresentantPedagogique` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`idFormation`, `nomFormation`, `composanteFormation`, `adFormation`, `compAdFormation`, `cpFormation`, `villeFormation`, `idRepresentantPedagogique`) VALUES
(1, 'Licence Pro Activités et Techniques de Communication', 'IUT de Rouen - Antenne d''Elbeuf', '24 cours Gambetta', NULL, 76500, 'Elbeuf', NULL),
(2, 'DUT Réseaux et Télécommunications', 'IUT de Rouen - Antenne d''Elbeuf', '24 cours Gambetta', NULL, 76500, 'Elbeuf', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formulairestandard`
--

DROP TABLE IF EXISTS `formulairestandard`;
CREATE TABLE `formulairestandard` (
  `idFormulaireStandard` int(11) NOT NULL,
  `slugFormulaireStandard` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `catFormulaireStandard` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nomFormulaireStandard` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `contenuFormulaireStandard` longtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `formulairestandard`
--

INSERT INTO `formulairestandard` (`idFormulaireStandard`, `slugFormulaireStandard`, `catFormulaireStandard`, `nomFormulaireStandard`, `contenuFormulaireStandard`) VALUES
(1, 'ficheRenseignements', 'form', 'Fiche de renseignements', '<h1>Fiche de renseignements</h1>\r\n<form action="" method="">\r\n    <div class="conteneur_large">\r\n        <div class="titre">\r\n            <h1>Apprenti</h1>\r\n        </div>\r\n        <div class="contenu">\r\n            <p>\r\n                <input placeholder="Nom" id="nomApprenti" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Prénom" id="prenomApprenti" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Date de naissance (XX/XX/XXXX)" id="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\\/](0[1-9]|1[012]))|((29|30|31)[\\/](0[13578]|1[02]))|((29|30)[\\/](0[4,6,9]|11)))[\\/](19|[2-9][0-9])\\d\\d$)|(^29[\\/]02[\\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Lieu de naissance" id="lieuNaissanceApprenti" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Adresse" id="adresseApprenti" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Complément d''adresse" id="complementAdApprenti" type="text" />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Code postal" id="cpApprenti" type="text" pattern="[0-9]{5}" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Ville" id="villeApprenti" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Email" id="mailApprenti" type="email" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" required />\r\n            </p>\r\n        </div>\r\n    </div>\r\n    <div class="conteneur_large">\r\n        <div class="titre">\r\n            <h1>Entreprise</h1>\r\n        </div>\r\n        <div class="contenu">\r\n            <p>\r\n                <input placeholder="Raison sociale" id="raisonSocialeEnt" type="text" required />\r\n            </p>\r\n            <h2>Siège social</h2>\r\n            <p>\r\n                <input placeholder="Adresse du siège social" id="adSiege" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Complément d''adresse" id="complementAdSiege" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Ville" id="villeSiege" type="text" required />\r\n            </p>\r\n            <h2>Site d''accueil de l''apprenti(e) <span class="info">(si différent du siège social)</span></h2>\r\n            <p>\r\n                <input placeholder="Adresse du site d''accueil" id="adAccueil" type="text" />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Complément d''adresse" id="complementAdSiege" type="text" />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Code postal" id="cpSiege" type="text" pattern="[0-9]{5}" />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Ville" id="villeSiege" type="text" />\r\n            </p>\r\n            <h2>Maître d''apprentissage</h2>\r\n            <p>\r\n                <input placeholder="Nom" id="nomMaitreApp" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Prénom" id="prenomMaitreApp" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Fonction" id="fonctionMaitreApp" type="text" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Email" id="mailMaitreApp" type="email" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Téléphone" id="telMaitreApp" type="tel" pattern="0[0-9]{9}" required />\r\n            </p>\r\n            <p>\r\n                <input placeholder="Portable" id="portMaitreApp" type="tel" pattern="0[6-7]{1}[0-9]{8}" />\r\n            </p>\r\n        </div>\r\n    </div>\r\n    <p class="btn">\r\n        <input type="submit" value="Valider" />\r\n    </p>\r\n</form>'),
(2, 'insertionPro', 'form', 'Insertion professionnelle et suivi des diplômés', '<h1>Insertion professionnelle & suivi des diplômés</h1>\r\n<form action="" method="">\r\n    <div class="conteneur_large">\r\n        <div class="titre">\r\n            <h1>Promotion <?php echo date(''Y''); ?></h1>\r\n        </div>\r\n        <div class="contenu">\r\n            <input placeholder="Nom" id="nomApprenti" type="text" required />\r\n            <input placeholder="Prénom" id="prenomApprenti" type="text" required />\r\n            <input placeholder="Date de naissance" id="dateNaissanceApprenti" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\\/](0[1-9]|1[012]))|((29|30|31)[\\/](0[13578]|1[02]))|((29|30)[\\/](0[4,6,9]|11)))[\\/](19|[2-9][0-9])\\d\\d$)|(^29[\\/]02[\\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />\r\n            <input placeholder="Âge" id="ageApprenti" type="text" required />\r\n            <p class="info">Adresse personnelle (en dehors du cadre des études, p.ex. parents)</p>\r\n            <input placeholder="Adresse" id="adressePersoApprenti" type="text" required />\r\n            <input placeholder="Complément d''adresse" id="complementAdPersoApprenti" type="text" />\r\n            <input placeholder="Code postal" id="cpPersoApprenti" type="text" pattern="[0-9]{5}" required />\r\n            <input placeholder="Ville" id="villePersoApprenti" type="text" required />\r\n            <input placeholder="Email" id="mailApprenti" type="email" required />\r\n            <input placeholder="Téléphone" id="telApprenti" type="tel" pattern="0[0-9]{9}" required />\r\n            <input placeholder="Portable" id="portApprenti" type="tel" pattern="0[6-7]{1}[0-9]{8}" required />\r\n            <textarea id="diversApprenti" placeholder="Autres renseignements (réseau social, blog, portfolio...)"></textarea>\r\n        </div>\r\n    </div>\r\n    <div class="conteneur_large">\r\n        <div class="titre">\r\n            <h1>L''année prochaine...</h1>\r\n        </div>\r\n        <div class="contenu">\r\n            <select id="anneeProchaine" name="anneeProchaine" required>\r\n                <option value="default" selected disabled>Choisissez une option...</option>\r\n                <option value="poursuiteEtudes">Vous poursuivez vos études</option>\r\n                <option value="recherchePoursuiteEtudes">Vous êtes toujours en recherche d''une poursuite d''études</option>\r\n                <option value="emploi">Vous avez trouvé un emploi</option>\r\n                <option value="rechercheEmploi">Vous êtes toujours en recherche d''un emploi</option>\r\n            </select>\r\n            <div id="choixAnneePro"></div>\r\n            <h2>L''association des Anciens</h2>\r\n            <p>Acceptez-vous l''inscription de ces données dans notre fichier des Anciens et à un éventuel contact entre votre composante et vous par la suite (transmission d''offres, information des anciens, proposition de témoignage...) ?</p>\r\n            <input type="checkbox" id="inscriptionAnciensApp" />\r\n            <label for="inscriptionAnciensApp" class="checkbox">Oui, je l''accepte.</label>\r\n        </div>\r\n    </div>\r\n    <p class="btn">\r\n        <input type="submit" value="Valider" />\r\n    </p>\r\n</form>\r\n<script type="application/javascript">\r\n    $(''document'').ready(function () {\r\n        $(''#anneeProchaine'').change(function () {\r\n            var choixSelect = $(''#anneeProchaine option:selected'').val();\r\n            if (choixSelect != "recherchePoursuiteEtudes") {\r\n                $(''#choixAnneePro'').load(''_views/form/_includes/'' + choixSelect + ''.php'');\r\n            } else {\r\n                $(''#choixAnneePro'').empty();\r\n            }\r\n        });\r\n    });\r\n</script>'),
(3, 'entrevues', 'form', 'Entrevues', '<h1>Entrevues</h1>\r\n<form action="" method="">\r\n    <div class="conteneur_large">\r\n        <div class="contenu">\r\n            <input placeholder="Date de l''entrevue (JJ/MM/AAAA)" id="dateEntrevue" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\\/](0[1-9]|1[012]))|((29|30|31)[\\/](0[13578]|1[02]))|((29|30)[\\/](0[4,6,9]|11)))[\\/](19|[2-9][0-9])\\d\\d$)|(^29[\\/]02[\\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />\r\n            <textarea id="obsEntrevue" placeholder="Observations"></textarea>\r\n        </div>\r\n    </div>\r\n    <p class="btn">\r\n        <input type="submit" value="Valider" />\r\n    </p>\r\n</form>'),
(4, 'visiteEnt', 'form', 'Visites en entreprise', '<h1>Visites en entreprise</h1>\r\n<form action="" method="">\r\n    <div class="conteneur_large">\r\n        <div class="contenu">\r\n            <input placeholder="Date de la visite (JJ/MM/AAAA)" id="dateEntrevue" type="text" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\\/](0[1-9]|1[012]))|((29|30|31)[\\/](0[13578]|1[02]))|((29|30)[\\/](0[4,6,9]|11)))[\\/](19|[2-9][0-9])\\d\\d$)|(^29[\\/]02[\\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required />\r\n            <h2>Apprenti(e)</h2>\r\n            <input placeholder="Nom" id="nomApprenti" type="text" required />\r\n            <input placeholder="Prénom" id="prenomApprenti" type="text" required />\r\n            <h2>Tuteur pédagogique</h2>\r\n            <input placeholder="Nom" id="nomTuteur" type="text" required />\r\n            <input placeholder="Prénom" id="prenomTuteur" type="text" required />\r\n            <h2>Maître d''apprentissage</h2>\r\n            <input placeholder="Nom" id="nomMaitre" type="text" required />\r\n            <input placeholder="Prénom" id="prenomMaitre" type="text" required />\r\n            <p>Apprenti(e) présent(e) à l''entretien ?</p>\r\n            <select id="presenceApp" name="presenceApp" required>\r\n                <option value="default" selected disabled>Choisissez une option...</option>\r\n                <option value="present">Oui</option>\r\n                <option value="absent">Non</option>\r\n            </select>\r\n            <div id="choixPresenceApp"></div>\r\n            <input placeholder="Durée de l''entretien" id="duree" type="text" required />\r\n            <span>Lieu de la soutenance</span>\r\n            <select id="lieu" name="lieu" required>\r\n                <option value="default" selected disabled>Choisissez une option...</option>\r\n                <option value="etablissement">Etablissement de l''apprenti(e)</option>\r\n                <option value="entreprise">Entreprise</option>\r\n            </select>\r\n        </div>\r\n    </div>\r\n    <p class="btn">\r\n        <input type="submit" value="Valider" />\r\n    </p>\r\n</form>\r\n<script type="application/javascript">\r\n    $(''#presenceApp'').change(function () {\r\n        var choixSelect = $(''#presenceApp option:selected'').val();\r\n        if (choixSelect == "absent") {\r\n            $(''#choixPresenceApp'').load(''_views/form/_includes/'' + choixSelect + ''.php'');\r\n        } else {\r\n            $(''#choixPresenceApp'').empty();\r\n        }\r\n    });\r\n</script>');

-- --------------------------------------------------------

--
-- Structure de la table `formulairesupplementaire`
--

DROP TABLE IF EXISTS `formulairesupplementaire`;
CREATE TABLE `formulairesupplementaire` (
  `idFormulaireSupplementaire` int(11) NOT NULL,
  `slugFormulaireSupplementaire` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `catFormulaireSupplementaire` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `nomFormulaireSupplementaire` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `contenuFormulaireSupplementaire` longtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `maitreapprentissage`
--

DROP TABLE IF EXISTS `maitreapprentissage`;
CREATE TABLE `maitreapprentissage` (
  `idMaitreApprentissage` int(11) NOT NULL,
  `loginMaitreApprentissage` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `mdpMaitreApprentissage` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `nomMaitreApprentissage` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prenomMaitreApprentissage` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `fonctionMaitreApprentissage` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telMaitreApprentissage` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `portMaitreApprentissage` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `mailMaitreApprentissage` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `maitreapprentissage`
--

INSERT INTO `maitreapprentissage` (`idMaitreApprentissage`, `loginMaitreApprentissage`, `mdpMaitreApprentissage`, `nomMaitreApprentissage`, `prenomMaitreApprentissage`, `fonctionMaitreApprentissage`, `telMaitreApprentissage`, `portMaitreApprentissage`, `mailMaitreApprentissage`) VALUES
(1, 'cdickens', 'a5410ee37744c574ba5790034ea08f79', 'DICKENS', 'Charles', 'Ecrivain', '0265789632', '0678521473', 'contact@cdickens.fr'),
(2, 'arimbaud', '68830aef4dbfad181162f9251a1da51b', 'RIMBAUD', 'Arthur', 'Poète', '0123654879', '0765112594', 'contact@arimbaud.com');

-- --------------------------------------------------------

--
-- Structure de la table `representantpedagogique`
--

DROP TABLE IF EXISTS `representantpedagogique`;
CREATE TABLE `representantpedagogique` (
  `idRepresentantPedagogique` int(11) NOT NULL,
  `nomRepresentantPedagogique` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prenomRepresentantPedagogique` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telRepresentantPedagogique` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `portRepresentantPedagogique` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `mailRepresentantPedagogique` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `representantpedagogique`
--

INSERT INTO `representantpedagogique` (`idRepresentantPedagogique`, `nomRepresentantPedagogique`, `prenomRepresentantPedagogique`, `telRepresentantPedagogique`, `portRepresentantPedagogique`, `mailRepresentantPedagogique`) VALUES
(1, 'KUROSAWA', 'Akira', '0235000000', '0600000000', 'a.kurosawa@univ-rouen.fr'),
(2, 'MIYAZAKI', 'Hayao', '0232000000', '0700000000', 'h.miyazaki@univ-rouen.fr');

-- --------------------------------------------------------

--
-- Structure de la table `tuteurpedagogique`
--

DROP TABLE IF EXISTS `tuteurpedagogique`;
CREATE TABLE `tuteurpedagogique` (
  `idTuteurPedagogique` int(11) NOT NULL,
  `loginTuteurPedagogique` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `mdpTuteurPedagogique` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `nomTuteurPedagogique` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `prenomTuteurPedagogique` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `telTuteurPedagogique` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `portTuteurPedagogique` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `mailTuteurPedagogique` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Contenu de la table `tuteurpedagogique`
--

INSERT INTO `tuteurpedagogique` (`idTuteurPedagogique`, `loginTuteurPedagogique`, `mdpTuteurPedagogique`, `nomTuteurPedagogique`, `prenomTuteurPedagogique`, `telTuteurPedagogique`, `portTuteurPedagogique`, `mailTuteurPedagogique`) VALUES
(1, 'ppicasso', '7e4b64eb65e34fdfad79e623c44abd94', 'PICASSO', 'Pablo', '0235532048', '0698754321', 'p.picasso@univ-rouen.fr'),
(2, 'vvangogh', 'b15ab3f829f0f897fe507ef548741afb', 'VAN GOGH', 'Vincent', '0232232045', '0770659802', 'v.vangogh@univ-rouen.fr');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `apprenti`
--
ALTER TABLE `apprenti`
  ADD PRIMARY KEY (`idApprenti`),
  ADD KEY `idFormation_idx` (`idFormation`);

--
-- Index pour la table `contratapprentissage`
--
ALTER TABLE `contratapprentissage`
  ADD PRIMARY KEY (`idContratApprentissage`),
  ADD KEY `idApprenti_idx` (`idApprenti`),
  ADD KEY `idMaitreApprentissage_idx` (`idMaitreApprentissage`),
  ADD KEY `idTuteurPedagogique_idx` (`idTuteurPedagogique`);

--
-- Index pour la table `droitsformulairestandard`
--
ALTER TABLE `droitsformulairestandard`
  ADD PRIMARY KEY (`idDroitsFormulaireStandard`),
  ADD KEY `idFormulaireStandard_idx` (`idFormulaireStandard`),
  ADD KEY `idContratApprentissage_idx` (`idContratApprentissage`),
  ADD KEY `idApprenti_idx` (`idApprenti`),
  ADD KEY `idMaitreApprentissage_idx` (`idMaitreApprentissage`),
  ADD KEY `idTuteurPedagogique_idx` (`idTuteurPedagogique`);

--
-- Index pour la table `droitsformulairesupplementaire`
--
ALTER TABLE `droitsformulairesupplementaire`
  ADD PRIMARY KEY (`idDroitsFormulaireSupplementaire`),
  ADD KEY `idFormulaireSupplementaire_idx` (`idFormulaireSupplementaire`),
  ADD KEY `idFormation_DFSu_idx` (`idFormation`),
  ADD KEY `idApprenti_DFSu_idx` (`idApprenti`),
  ADD KEY `idMaitreApprentissage_idx` (`idMaitreApprentissage`),
  ADD KEY `idTuteurPedagogique_idx` (`idTuteurPedagogique`);

--
-- Index pour la table `editionformulairesupplementaire`
--
ALTER TABLE `editionformulairesupplementaire`
  ADD PRIMARY KEY (`idEditionFormulaireSupplementaire`),
  ADD KEY `idFormation_idx` (`idFormation`),
  ADD KEY `idFormulaireSupplementaire_idx` (`idFormulaireSupplementaire`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`idFormation`),
  ADD KEY `idRepresentantPedagogique_idx` (`idRepresentantPedagogique`);

--
-- Index pour la table `formulairestandard`
--
ALTER TABLE `formulairestandard`
  ADD PRIMARY KEY (`idFormulaireStandard`);

--
-- Index pour la table `formulairesupplementaire`
--
ALTER TABLE `formulairesupplementaire`
  ADD PRIMARY KEY (`idFormulaireSupplementaire`);

--
-- Index pour la table `maitreapprentissage`
--
ALTER TABLE `maitreapprentissage`
  ADD PRIMARY KEY (`idMaitreApprentissage`);

--
-- Index pour la table `representantpedagogique`
--
ALTER TABLE `representantpedagogique`
  ADD PRIMARY KEY (`idRepresentantPedagogique`);

--
-- Index pour la table `tuteurpedagogique`
--
ALTER TABLE `tuteurpedagogique`
  ADD PRIMARY KEY (`idTuteurPedagogique`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `apprenti`
--
ALTER TABLE `apprenti`
  MODIFY `idApprenti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `contratapprentissage`
--
ALTER TABLE `contratapprentissage`
  MODIFY `idContratApprentissage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `droitsformulairestandard`
--
ALTER TABLE `droitsformulairestandard`
  MODIFY `idDroitsFormulaireStandard` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `droitsformulairesupplementaire`
--
ALTER TABLE `droitsformulairesupplementaire`
  MODIFY `idDroitsFormulaireSupplementaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `editionformulairesupplementaire`
--
ALTER TABLE `editionformulairesupplementaire`
  MODIFY `idEditionFormulaireSupplementaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `idFormation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `formulairestandard`
--
ALTER TABLE `formulairestandard`
  MODIFY `idFormulaireStandard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `formulairesupplementaire`
--
ALTER TABLE `formulairesupplementaire`
  MODIFY `idFormulaireSupplementaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `maitreapprentissage`
--
ALTER TABLE `maitreapprentissage`
  MODIFY `idMaitreApprentissage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `representantpedagogique`
--
ALTER TABLE `representantpedagogique`
  MODIFY `idRepresentantPedagogique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tuteurpedagogique`
--
ALTER TABLE `tuteurpedagogique`
  MODIFY `idTuteurPedagogique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `apprenti`
--
ALTER TABLE `apprenti`
  ADD CONSTRAINT `idFormation` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `contratapprentissage`
--
ALTER TABLE `contratapprentissage`
  ADD CONSTRAINT `idApprenti_CA` FOREIGN KEY (`idApprenti`) REFERENCES `apprenti` (`idApprenti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idMaitreApprentissage_CA` FOREIGN KEY (`idMaitreApprentissage`) REFERENCES `maitreapprentissage` (`idMaitreApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTuteurPedagogique_CA` FOREIGN KEY (`idTuteurPedagogique`) REFERENCES `tuteurpedagogique` (`idTuteurPedagogique`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `droitsformulairestandard`
--
ALTER TABLE `droitsformulairestandard`
  ADD CONSTRAINT `idApprenti_DFS` FOREIGN KEY (`idApprenti`) REFERENCES `apprenti` (`idApprenti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idContratApprentissage_DFS` FOREIGN KEY (`idContratApprentissage`) REFERENCES `contratapprentissage` (`idContratApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idFormulaireStandard_DFS` FOREIGN KEY (`idFormulaireStandard`) REFERENCES `formulairestandard` (`idFormulaireStandard`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idMaitreApprentissage_DFS` FOREIGN KEY (`idMaitreApprentissage`) REFERENCES `maitreapprentissage` (`idMaitreApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTuteurPedagogique_DFS` FOREIGN KEY (`idTuteurPedagogique`) REFERENCES `tuteurpedagogique` (`idTuteurPedagogique`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `droitsformulairesupplementaire`
--
ALTER TABLE `droitsformulairesupplementaire`
  ADD CONSTRAINT `idApprenti_DFSu` FOREIGN KEY (`idApprenti`) REFERENCES `apprenti` (`idApprenti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idFormation_DFSu` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idFormulaireSupplementaire_DFSu` FOREIGN KEY (`idFormulaireSupplementaire`) REFERENCES `formulairesupplementaire` (`idFormulaireSupplementaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idMaitreApprentissage_DFSu` FOREIGN KEY (`idMaitreApprentissage`) REFERENCES `maitreapprentissage` (`idMaitreApprentissage`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idTuteurPedagogique_DFSu` FOREIGN KEY (`idTuteurPedagogique`) REFERENCES `tuteurpedagogique` (`idTuteurPedagogique`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `editionformulairesupplementaire`
--
ALTER TABLE `editionformulairesupplementaire`
  ADD CONSTRAINT `idFormation_EFS` FOREIGN KEY (`idFormation`) REFERENCES `formation` (`idFormation`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idFormulaireSupplementaire_EFS` FOREIGN KEY (`idFormulaireSupplementaire`) REFERENCES `formulairesupplementaire` (`idFormulaireSupplementaire`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `idRepresentantPedagogique_F` FOREIGN KEY (`idRepresentantPedagogique`) REFERENCES `representantpedagogique` (`idRepresentantPedagogique`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
