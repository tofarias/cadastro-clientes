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

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `email_UNIQUE` ON `user` (`email` ASC);


-- -----------------------------------------------------
-- Data for table `user`
-- -----------------------------------------------------
START TRANSACTION;
USE `cad_clientes`;
INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `active`, `updated_at`, `created_at`) VALUES (1, 'admin', 'admin@email.com', '$2y$10$WFCTyeJm11fPYi0Ln0fYH.w2U6bio3/FPVM/qxaqWUef9rHEGfSB6', 1, now(), now());

COMMIT;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
