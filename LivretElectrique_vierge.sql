-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema LivretElectroniq
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `LivretElectroniq` ;

-- -----------------------------------------------------
-- Schema LivretElectroniq
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `LivretElectroniq` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `LivretElectroniq` ;

-- -----------------------------------------------------
-- Table `LivretElectroniq`.`Composante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`Composante` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`Composante` (
  `idComposante` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nomComposante` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `adComposante` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `cpComposante` VARCHAR(5) NULL COMMENT '',
  `villeComposante` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  PRIMARY KEY (`idComposante`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`Formation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`Formation` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`Formation` (
  `idFormation` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `intituleFormation` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `idComposante` INT NOT NULL COMMENT '',
  PRIMARY KEY (`idFormation`, `idComposante`)  COMMENT '',
  INDEX `idComposante_F_idx` (`idComposante` ASC)  COMMENT '',
  CONSTRAINT `composante`
    FOREIGN KEY (`idComposante`)
    REFERENCES `LivretElectroniq`.`Composante` (`idComposante`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`Entreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`Entreprise` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`Entreprise` (
  `idEntreprise` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `raisonSocialeEntreprise` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `adEntreprise` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `cpEntreprise` VARCHAR(5) NULL COMMENT '',
  `villeEntreprise` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  PRIMARY KEY (`idEntreprise`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`Utilisateur`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`Utilisateur` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`Utilisateur` (
  `idUtilisateur` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `login` VARCHAR(8) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `pass` VARCHAR(32) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `nom` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `prenom` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `type` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `tel` VARCHAR(10) NULL COMMENT '',
  `port` VARCHAR(10) NULL COMMENT '',
  `email` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  PRIMARY KEY (`idUtilisateur`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`ContratApprentissage`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`ContratApprentissage` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`ContratApprentissage` (
  `idContratApprentissage` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idApprenti` INT NOT NULL COMMENT '',
  `dateSignatureApprenti` DATE NULL COMMENT '',
  `idMaitreApprentissage` INT NOT NULL COMMENT '',
  `dateSignatureMaitreApprentissage` DATE NULL COMMENT '',
  `idTuteurPedagogique` INT NOT NULL COMMENT '',
  `dateSignatureTuteurPedagogique` DATE NULL COMMENT '',
  PRIMARY KEY (`idContratApprentissage`, `idApprenti`, `idTuteurPedagogique`, `idMaitreApprentissage`)  COMMENT '',
  INDEX `signatureApprenti_idx` (`idApprenti` ASC)  COMMENT '',
  INDEX `signatureMaitreApprentissage_idx` (`idMaitreApprentissage` ASC)  COMMENT '',
  INDEX `signatureTuteurPedagogique_idx` (`idTuteurPedagogique` ASC)  COMMENT '',
  CONSTRAINT `signatureApprenti`
    FOREIGN KEY (`idApprenti`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `signatureMaitreApprentissage`
    FOREIGN KEY (`idMaitreApprentissage`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `signatureTuteurPedagogique`
    FOREIGN KEY (`idTuteurPedagogique`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`RattachementEntreprise`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`RattachementEntreprise` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`RattachementEntreprise` (
  `idMaitreApprentissage` INT NOT NULL COMMENT '',
  `idEntreprise` INT NOT NULL COMMENT '',
  `fonction` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  INDEX `entreprise_idx` (`idEntreprise` ASC)  COMMENT '',
  PRIMARY KEY (`idMaitreApprentissage`)  COMMENT '',
  CONSTRAINT `employeEntreprise`
    FOREIGN KEY (`idMaitreApprentissage`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `entreprise`
    FOREIGN KEY (`idEntreprise`)
    REFERENCES `LivretElectroniq`.`Entreprise` (`idEntreprise`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`RattachementFormation`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`RattachementFormation` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`RattachementFormation` (
  `idUtilisateur` INT NOT NULL COMMENT '',
  `idFormation` INT NOT NULL COMMENT '',
  INDEX `formation_idx` (`idFormation` ASC)  COMMENT '',
  INDEX `utilisateurRattache_idx` (`idUtilisateur` ASC)  COMMENT '',
  PRIMARY KEY (`idUtilisateur`, `idFormation`)  COMMENT '',
  CONSTRAINT `utilisateurRattache`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `formation`
    FOREIGN KEY (`idFormation`)
    REFERENCES `LivretElectroniq`.`Formation` (`idFormation`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`Formulaire`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`Formulaire` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`Formulaire` (
  `idFormulaire` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `nom` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `intitule` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `type` VARCHAR(10) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  PRIMARY KEY (`idFormulaire`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`DroitAccesFormulaire`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`DroitAccesFormulaire` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`DroitAccesFormulaire` (
  `idUtilisateur` INT NOT NULL COMMENT '',
  `idFormulaire` INT NOT NULL COMMENT '',
  `typeDroit` INT NULL COMMENT '',
  INDEX `contenuFormVide_idx` (`idFormulaire` ASC)  COMMENT '',
  PRIMARY KEY (`idUtilisateur`, `idFormulaire`)  COMMENT '',
  CONSTRAINT `utilisateur`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `form`
    FOREIGN KEY (`idFormulaire`)
    REFERENCES `LivretElectroniq`.`Formulaire` (`idFormulaire`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`InfosApprenti`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`InfosApprenti` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`InfosApprenti` (
  `idApprenti` INT NOT NULL COMMENT '',
  `adApprenti` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  `cpApprenti` VARCHAR(5) NULL COMMENT '',
  `villeApprenti` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  INDEX `apprenti_idx` (`idApprenti` ASC)  COMMENT '',
  PRIMARY KEY (`idApprenti`)  COMMENT '',
  CONSTRAINT `apprenti`
    FOREIGN KEY (`idApprenti`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`Fichier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`Fichier` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`Fichier` (
  `idFichier` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `emplacementFichier` VARCHAR(45) CHARACTER SET 'utf8' COLLATE 'utf8_general_ci' NULL COMMENT '',
  PRIMARY KEY (`idFichier`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`FormulaireRempli`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`FormulaireRempli` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`FormulaireRempli` (
  `idFormulaireRempli` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `idFormulaireOrigine` INT NOT NULL COMMENT '',
  INDEX `formulaire_origine_idx` (`idFormulaireOrigine` ASC)  COMMENT '',
  PRIMARY KEY (`idFormulaireRempli`, `idFormulaireOrigine`)  COMMENT '',
  CONSTRAINT `formulaire_origine`
    FOREIGN KEY (`idFormulaireOrigine`)
    REFERENCES `LivretElectroniq`.`Formulaire` (`idFormulaire`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `formulaire_rempli`
    FOREIGN KEY (`idFormulaireRempli`)
    REFERENCES `LivretElectroniq`.`Fichier` (`idFichier`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `LivretElectroniq`.`DroitAccesFichier`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `LivretElectroniq`.`DroitAccesFichier` ;

CREATE TABLE IF NOT EXISTS `LivretElectroniq`.`DroitAccesFichier` (
  `idUtilisateur` INT NOT NULL COMMENT '',
  `idFichier` INT NOT NULL COMMENT '',
  `typeDroit` INT NULL COMMENT '',
  INDEX `utilisateur_fi_idx` (`idUtilisateur` ASC)  COMMENT '',
  INDEX `fichier_idx` (`idFichier` ASC)  COMMENT '',
  PRIMARY KEY (`idUtilisateur`, `idFichier`)  COMMENT '',
  CONSTRAINT `utilisateur_fichier`
    FOREIGN KEY (`idUtilisateur`)
    REFERENCES `LivretElectroniq`.`Utilisateur` (`idUtilisateur`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fichier`
    FOREIGN KEY (`idFichier`)
    REFERENCES `LivretElectroniq`.`Fichier` (`idFichier`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
