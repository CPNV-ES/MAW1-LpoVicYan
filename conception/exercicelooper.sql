-- MySQL Workbench Synchronization
-- Generated: 2022-09-16 08:07
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: Luís Pedro Pinheiro

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `exerciselooper` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `exerciselooper`.`questions` (
  `idquestions` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `type` VARCHAR(45) NOT NULL,
  `order` INT(11) NOT NULL,
  `exercises_idexercises` INT(11) NOT NULL,
  PRIMARY KEY (`idquestions`),
  UNIQUE INDEX `idquestions_UNIQUE` (`idquestions` ASC) VISIBLE,
  INDEX `fk_questions_exercises1_idx` (`exercises_idexercises` ASC) VISIBLE,
  CONSTRAINT `fk_questions_exercises1`
    FOREIGN KEY (`exercises_idexercises`)
    REFERENCES `exerciselooper`.`exercises` (`idexercises`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `exerciselooper`.`exercises` (
  `idexercises` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL DEFAULT NULL,
  `state` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idexercises`),
  UNIQUE INDEX `idexercises_UNIQUE` (`idexercises` ASC) VISIBLE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `exerciselooper`.`answers` (
  `idanswers` INT(11) NOT NULL,
  `date` DATE NOT NULL,
  `answer` VARCHAR(255) NOT NULL,
  `questions_idquestions` INT(11) NOT NULL,
  PRIMARY KEY (`idanswers`),
  INDEX `fk_answers_questions_idx` (`questions_idquestions` ASC) VISIBLE,
  CONSTRAINT `fk_answers_questions`
    FOREIGN KEY (`questions_idquestions`)
    REFERENCES `exerciselooper`.`questions` (`idquestions`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
