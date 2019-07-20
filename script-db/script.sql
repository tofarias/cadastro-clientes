-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema cad_clientes
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `cad_clientes` ;

-- -----------------------------------------------------
-- Schema cad_clientes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cad_clientes` DEFAULT CHARACTER SET utf8 ;
USE `cad_clientes` ;

-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `user` ;

CREATE TABLE IF NOT EXISTS `cad_clientes`.`user` (
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,  
  `is_admin` TINYINT(4) NOT NULL DEFAULT '0',
  `email` VARCHAR(100) NULL,
  `key` VARCHAR(45) NULL,
  `password` VARCHAR(100) NOT NULL,
  `active` TINYINT(4) NOT NULL DEFAULT '0',
  `updated_at` DATETIME NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`))
  #UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `cad_clientes`.`client` (
  `id_client` INT NOT NULL,
  `id_user` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NULL,  
  `nr_matricula` VARCHAR(45) NULL,
  `nr_turma` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `cpf_cnpj` VARCHAR(100) NOT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  INDEX `fk_client_user_idx` (`id_user` ASC),
  UNIQUE INDEX `id_user_UNIQUE` (`id_user` ASC),
  UNIQUE INDEX `cpf_cnpj_UNIQUE` (`cpf_cnpj` ASC),
  CONSTRAINT `fk_client_user`
    FOREIGN KEY (`id_user`)
    REFERENCES `cad_clientes`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Data for table `user`
-- -----------------------------------------------------
START TRANSACTION;
USE `cad_clientes`;

INSERT INTO `cad_clientes`.`user` (`id_user`, `key`, `email`, `password`, `active`, `updated_at`, `created_at`,`is_admin`) VALUES (1, '12345678901', 'admin@email.com', '$2y$10$o174pfUoHaAtqtE82E/o..sM2FSY065D4LdMpyHHsdiJPMJ9.F1A6', 1, now(), now(), 1);
INSERT INTO `cad_clientes`.`user` (`id_user`, `key`,`email`, `password`, `active`, `updated_at`, `created_at`,`is_admin`) VALUES (2, '95175385246','', '$2y$10$o174pfUoHaAtqtE82E/o..sM2FSY065D4LdMpyHHsdiJPMJ9.F1A6', 1, now(), now(), 0);
INSERT INTO `cad_clientes`.`user` (`id_user`, `key`,`email`, `password`, `active`, `updated_at`, `created_at`,`is_admin`) VALUES (3, '35774136985','', '$2y$10$o174pfUoHaAtqtE82E/o..sM2FSY065D4LdMpyHHsdiJPMJ9.F1A6', 1, now(), now(), 0);

INSERT INTO `cad_clientes`.`client` (`id_client`, `id_user`, `name`, `phone`, `cpf_cnpj`, `nr_matricula`, `nr_turma`, `email`, `updated_at`, `created_at`) VALUES (1, 2, 'cliente 02', '321456987', '654753951', '222333555', '951', 'cliente2@email.com',now(), now());
INSERT INTO `cad_clientes`.`client` (`id_client`, `id_user`, `name`, `phone`, `cpf_cnpj`, `nr_matricula`, `nr_turma`, `email`, `updated_at`, `created_at`) VALUES (2, 3, 'cliente 03', '321698745', '659514753', '225523335', '321','cliente3@email.com',now(), now());

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
