-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema botodb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema botodb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `botodb` DEFAULT CHARACTER SET latin1 ;
USE `botodb` ;

-- -----------------------------------------------------
-- Table `botodb`.`betting_competition`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `botodb`.`betting_competition` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `compname` VARCHAR(200) NOT NULL,
  `creator` BIGINT(20) NULL DEFAULT NULL,
  `allowedusers` VARCHAR(3000) NULL DEFAULT NULL,
  `time_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `numUsers` INT(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 242
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `botodb`.`bet_question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `botodb`.`bet_question` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `compid` INT(10) UNSIGNED NOT NULL,
  `quest_type` VARCHAR(300) NOT NULL,
  `ans_type` VARCHAR(300) NOT NULL,
  `cor_ans` VARCHAR(300) NULL DEFAULT NULL,
  `team1` VARCHAR(45) NULL DEFAULT NULL,
  `team2` VARCHAR(45) NULL DEFAULT NULL,
  `textq` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `betting_comp_fk` (`compid` ASC),
  CONSTRAINT `betting_comp_fk`
    FOREIGN KEY (`compid`)
    REFERENCES `botodb`.`betting_competition` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 211
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `botodb`.`team`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `botodb`.`team` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `teamname` VARCHAR(100) NULL DEFAULT NULL,
  `category` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `botodb`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `botodb`.`user` (
  `userid` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(100) NOT NULL,
  `lastname` VARCHAR(100) NOT NULL,
  `facebook_id` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  `email` VARCHAR(100) NULL DEFAULT NULL,
  `pass` VARCHAR(200) NULL DEFAULT NULL,
  `points` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE INDEX `email` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 24
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
