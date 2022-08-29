-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema exercice_looper
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema exercice_looper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `exercice_looper` DEFAULT CHARACTER SET utf8 ;
USE `exercice_looper` ;

-- -----------------------------------------------------
-- Table `exercice_looper`.`exercices`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercice_looper`.`exercices` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exercice_looper`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercice_looper`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `key` VARCHAR(45) NOT NULL,
  `value` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exercice_looper`.`exercices_include_questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exercice_looper`.`exercices_include_questions` (
  `FK_exercice` INT NOT NULL,
  `FK_question` INT NOT NULL,
  PRIMARY KEY (`FK_exercice`, `FK_question`),
  INDEX `fk_exercices_has_questions_questions1_idx` (`FK_question` ASC) VISIBLE,
  INDEX `fk_exercices_has_questions_exercices_idx` (`FK_exercice` ASC) VISIBLE,
  CONSTRAINT `fk_exercices_has_questions_exercices`
    FOREIGN KEY (`FK_exercice`)
    REFERENCES `exercice_looper`.`exercices` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_exercices_has_questions_questions1`
    FOREIGN KEY (`FK_question`)
    REFERENCES `exercice_looper`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
