-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema exerciselooper
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema exerciselooper
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `exerciselooper` DEFAULT CHARACTER SET utf8 ;
USE `exerciselooper` ;

-- -----------------------------------------------------
-- Table `exerciselooper`.`exercises`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exerciselooper`.`exercises` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `state` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idexercises_UNIQUE` (`id` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exerciselooper`.`questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exerciselooper`.`questions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `type` VARCHAR(45) NOT NULL,
  `order` INT NOT NULL,
  `exercise_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `idquestions_UNIQUE` (`id` ASC) VISIBLE,
  INDEX `fk_questions_exercises1_idx` (`exercise_id` ASC) VISIBLE,
  CONSTRAINT `fk_questions_exercises1`
    FOREIGN KEY (`exercise_id`)
    REFERENCES `exerciselooper`.`exercises` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `exerciselooper`.`answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `exerciselooper`.`answers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `date` DATETIME NOT NULL,
  `answer` VARCHAR(255) NOT NULL,
  `question_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_answers_questions_idx` (`question_id` ASC) VISIBLE,
  UNIQUE INDEX `idanswers_UNIQUE` (`id` ASC) VISIBLE,
  CONSTRAINT `fk_answers_questions`
    FOREIGN KEY (`question_id`)
    REFERENCES `exerciselooper`.`questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
