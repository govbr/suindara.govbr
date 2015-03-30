SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `cms3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `cms3` ;

-- -----------------------------------------------------
-- Table `cms3`.`noticias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cms3`.`noticias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NOT NULL ,
  `resumo` TEXT NOT NULL ,
  `texto` TEXT NOT NULL ,
  `categoria_id` INT NOT NULL ,
  `cartola` VARCHAR(50) NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `bloqueado` TINYINT(1) NOT NULL DEFAULT 0 ,
  `datahora_publicacao` TIMESTAMP NOT NULL ,
  `status_id` INT NOT NULL ,
  `datahora_prog_pub` DATETIME NULL ,
  `datahora_prog_exp` DATETIME NULL ,
  `autor` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Tabela que guarda as informações referentes a notícia. TITUL' /* comment truncated */;


-- -----------------------------------------------------
-- Table `cms3`.`status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `cms3`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Os possíveis status das notícias. NOME: nome do status.';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



-- INSERT'S

INSERT INTO `status` VALUES(1, 'Público');
INSERT INTO `status` VALUES(2, 'Rascunho');
-- INSERT INTO `status` VALUES(3, 'Aguardando revisão');



