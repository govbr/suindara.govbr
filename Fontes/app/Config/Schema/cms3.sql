SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

-- CREATE SCHEMA IF NOT EXISTS `cms3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- USE `cms3` ;

-- -----------------------------------------------------
-- Table `templates`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `print` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `caminho` varchar(100) NOT NULL,
  `descricao` text,
  `nome_original` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1
COMMENT = 'Tabela que guarda os templates dos sites.' ;


-- -----------------------------------------------------
-- Table `sites`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sites` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NOT NULL ,
  `descricao` VARCHAR(100) NOT NULL ,
  `instituicao` VARCHAR(45) NULL ,
  `endereco` VARCHAR(100) NULL ,
  `palavras_chave` VARCHAR(200) NULL ,
  `email_contato` VARCHAR(45) NULL ,
  `site_principal` TINYINT(1) NOT NULL DEFAULT 0 ,
  `dominio` VARCHAR(100) NOT NULL,
  `template_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_sites_template1_idx` (`template_id` ASC) ,
  CONSTRAINT `fk_sites_template1`
    FOREIGN KEY (`template_id` )
    REFERENCES `templates` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Tabela dos sites que o sistema gerencia.  TITULO: nome do si' /* comment truncated */;

-- -----------------------------------------------------
-- Table `status`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Os possiveis status das noticias. NOME: nome do status.';

-- -----------------------------------------------------
-- Table `tipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Guarda os tipos de midias utilizados no sistema.';

-- -----------------------------------------------------
-- Table `mimes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mimes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `mime` VARCHAR(100) NOT NULL ,
  `tipo_id` INT(11) NOT NULL ,
  `extensao` VARCHAR(5) NOT NULL ,
  `ativo` TINYINT(1) NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Guarda as informacoes sobre os mimes utilizados no sistema. ' /* comment truncated */;

-- -----------------------------------------------------
-- Table `fontes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `fontes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Aramazena as fontes (tipo de letra).';


-- -----------------------------------------------------
-- Table `contrastes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `contrastes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Armazena os tipos de contrastes cadastrados no sistema.';

-- -----------------------------------------------------
-- Table `perfis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `perfis` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `descricao` VARCHAR(100) NOT NULL ,
  `site_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Guarda os perfis existentes no sistema. NOME: nome do perfil' /* comment truncated */;

-- -----------------------------------------------------
-- Table `categorias`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS  `categorias`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `identificador` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`) )
  ENGINE=InnoDB  
  DEFAULT CHARSET=utf8
  COMMENT = 'Sao as categorias das noticias. TITULO: o nome da categoria.' /* comment truncated */;

  -- -----------------------------------------------------
-- Table `usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `senha` VARCHAR(50) NOT NULL ,
  `root` TINYINT(1) NULL ,
  `departamento` VARCHAR(45) NULL ,
  `telefone` VARCHAR(14) NULL ,
  `instituicao` VARCHAR(45) NULL ,
  `modo_sistema` TINYINT(1) NULL ,
  `fonte_id` INT(11) NOT NULL ,
  `contraste_id` INT(11) NOT NULL ,
  `site_id` INT(11) NOT NULL , 
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Guarda as informacoes dos usuarios cadastrados no sistema. N' /* comment truncated */;

-- -----------------------------------------------------
-- Table `noticias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `noticias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NOT NULL ,
  `resumo` TEXT NOT NULL ,
  `texto` TEXT NOT NULL ,
  `categoria_id` INT(11) NOT NULL ,
  `cartola` VARCHAR(50) NOT NULL ,
  `usuario_id` INT(11) NOT NULL ,
  `bloqueado` TINYINT(1) NOT NULL DEFAULT 0 ,
  `datahora_publicacao` datetime DEFAULT NULL ,
  `status_id` INT(11) NOT NULL ,
  `site_id` INT(11) NOT NULL ,
  `datahora_prog_pub` datetime DEFAULT NULL,
  `datahora_prog_exp` datetime DEFAULT NULL,
  `autor` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Tabela que guarda as informacoes referentes a noticia. TITUL' /* comment truncated */;

-- -----------------------------------------------------
-- Table `midias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `midias` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(50) NOT NULL ,
  `descricao` TEXT NOT NULL ,
  `arquivo` VARCHAR(37) NOT NULL ,
  `fonte` VARCHAR(250) NULL ,
  `versao_textual` TEXT NULL ,
  `tamanho` INT(11) NOT NULL ,
  `banco_imagens` TINYINT(1) NOT NULL DEFAULT 0 ,
  `mime_id` INT(11) NOT NULL ,
  `tipo_id` INT(11) NOT NULL ,
  `crop_x` FLOAT NULL ,
  `crop_y` FLOAT NULL ,
  `crop_x2` FLOAT NULL ,
  `crop_y2` FLOAT NULL ,
  `crop_w` FLOAT NULL ,
  `crop_h` FLOAT NULL ,
  `ativa` TINYINT(1) NOT NULL DEFAULT 0 ,
  `nome_original` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_midias_mimes1` (`mime_id` ASC) ,
  INDEX `fk_midias_tipos1` (`tipo_id` ASC) ,
  CONSTRAINT `fk_midias_mimes1`
    FOREIGN KEY (`mime_id` )
    REFERENCES `mimes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_midias_tipos1`
    FOREIGN KEY (`tipo_id` )
    REFERENCES `tipos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
COMMENT = 'Armazena as informacoes das midias digitais upadas no sistem' /* comment truncated */;

--
-- Triggers `midias`
--
DELIMITER $$
CREATE TRIGGER `value_default_descricao` BEFORE INSERT ON `midias`
 FOR EACH ROW if (NEW.descricao = '') then
      set NEW.descricao = "";   
end if
$$
DELIMITER ;

-- -----------------------------------------------------
-- Table `midias_pn`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `midias_pn` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `pagina_id` INT(11) NOT NULL ,
  `noticia_id` INT(11) NOT NULL ,
  `midia_id` INT(11) NOT NULL ,
  `curso_id` INT(11) NOT NULL ,
  `edital_id` INT(11) NOT NULL ,
  `destaque` TINYINT(1) NOT NULL DEFAULT 0 ,
  `posicao` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Esta tabela serve para relacionar as midias com as paginas e' /* comment truncated */;


-- -----------------------------------------------------
-- Table `paginas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `paginas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(200) NOT NULL ,
  `texto` TEXT NOT NULL ,
  `usuario_id` INT(11) NOT NULL ,
  `bloqueado` TINYINT(1) NOT NULL DEFAULT 0 ,
  `datahora_cadastro` DATETIME NOT NULL ,
  `site_id` INT(11) NOT NULL ,
  `status_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Armazena as informacoes referentes as paginas cadastradas no' /* comment truncated */;


CREATE  TABLE IF NOT EXISTS `recuperar_dados` (
  `usuario_id` INT(11) NOT NULL ,
  `token` VARCHAR(50) NULL ,
  `expires` DATE NULL ,
  PRIMARY KEY (`usuario_id`) ,
  INDEX `fk_recuperar_senha_usuarios1` (`usuario_id` ASC) ,
  CONSTRAINT `fk_recuperar_senha_usuarios1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
COMMENT = 'Guarda informacoes para recuperacao de dados cadastrais';

-- -----------------------------------------------------
-- Table `menus`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `menus` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  `identificador` VARCHAR(50) NOT NULL ,
  `site_id` INT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Tabela que guarda os menus cadastrados no sistemas (nome e s' /* comment truncated */;

-- -----------------------------------------------------
-- Table `menu_itens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `menu_itens` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) DEFAULT NULL,
  `identificador` VARCHAR(50) NOT NULL ,
  `menu_id` INT(11) NOT NULL,
  `link` VARCHAR(255) DEFAULT NULL,
  `pagina_id` INT(11) DEFAULT NULL,
  `categoria_id` INT(11) DEFAULT NULL,
  `bm_tipo_id` INT(11) DEFAULT NULL,
  `parent_id` INT(11) DEFAULT NULL,
  `lft` INT(11) DEFAULT NULL,
  `rght` INT(11) DEFAULT NULL,
  PRIMARY KEY (`id`) ) 
ENGINE = InnoDB
COMMENT = 'Guarda as informacoes dos itens de menu. MENU_ID: id do menu' /* comment truncated */;

-- -----------------------------------------------------
-- Table `bm_tipos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bm_tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Tabela com os tipos de banners e itens de menu utilizados no' /* comment truncated */;


-- -----------------------------------------------------
-- Table `grupos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(46) NOT NULL,
  `site_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- Table `banners`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `banners` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `titulo` VARCHAR(45) NOT NULL ,
  `descricao` VARCHAR(100) NOT NULL ,
  `arquivo` VARCHAR(37) NOT NULL ,
  `link` VARCHAR(255) NULL ,
  `categoria_id` INT NULL ,
  `pagina_id` INT NULL ,
  `bm_tipo_id` INT(11) NOT NULL ,
  `lft` INT(11) NOT NULL ,
  `rght` INT(11) NOT NULL ,
  `site_id` INT NULL ,
  `grupo_id` INT(11) NOT NULL ,
  `parent_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Armazena as informacoes referentes aos banners. TITULO: nome' /* comment truncated */;


-- -----------------------------------------------------
-- Table `pagina_grpbanners`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `pagina_grpbanners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagina_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- Table `usuario_perfis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `usuario_perfis` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT(11) NOT NULL ,
  `perfil_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Tabela de ligacao entre a tabela de usuarios e de perfis. As' /* comment truncated */;


-- -----------------------------------------------------
-- Table `categoria_perfis`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `categoria_perfis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `adicionar` tinyint(1) DEFAULT NULL,
  `editar` tinyint(1) DEFAULT NULL,
  `excluir` tinyint(1) DEFAULT NULL,
  `visualizar` tinyint(1) DEFAULT NULL,
  `publicar` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`) )
 ENGINE=InnoDB  
 DEFAULT CHARSET=utf8
 COMMENT = 'Tabela de ligacao entre categorias e perfil. Guarda o id do ' /* comment truncated */;

-- -----------------------------------------------------
-- Table `configuracoes`
-- -----------------------------------------------------

 CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo_sessao` varchar(50) DEFAULT NULL,
  `upload_tamanho` varchar(50) DEFAULT NULL,
  `memoria_tamanho` varchar(50) DEFAULT NULL,
  `post_tamanho` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`) ) 
 ENGINE=InnoDB  
 DEFAULT CHARSET=utf8 ;

-- -----------------------------------------------------
-- Table `modalidades`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `modalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `identificador` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`) ) 
ENGINE=InnoDB  
DEFAULT CHARSET=utf8 
AUTO_INCREMENT=1
COMMENT = 'Tabela que guarda as modalidades' ;

-- -----------------------------------------------------
-- Table `cursos`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `turno_manha` TINYINT(1) DEFAULT 0,
  `turno_tarde` TINYINT(1) DEFAULT 0,
  `turno_vespertino` TINYINT(1) DEFAULT 0,
  `turno_noite` TINYINT(1) DEFAULT 0,
  `duracao` int(11) DEFAULT NULL,
  `tipo_duracao` VARCHAR(9) DEFAULT 'semestres',
  `nome_coordenador` VARCHAR(100) DEFAULT NULL,
  `email_coordenador` VARCHAR(45) DEFAULT NULL,
  `pre_requisito` varchar(100) DEFAULT NULL,
  `formas_ingresso` varchar(100) DEFAULT NULL,
  `site_id` INT NULL,
  `modalidade_id` INT NULL,
  PRIMARY KEY (`id`) ) 
ENGINE=InnoDB  
DEFAULT CHARSET=utf8 
AUTO_INCREMENT=1
COMMENT = 'Tabela que guarda os cursos dos sites.' ;

-- -----------------------------------------------------
-- Table `tipo_editais`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `tipo_editais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `identificador` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`) ) 
ENGINE=InnoDB  
DEFAULT CHARSET=utf8 
AUTO_INCREMENT=1
COMMENT = 'Tabela que guarda os tipos de editais' ;

-- -----------------------------------------------------
-- Table `editais`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `editais` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_publicao` date DEFAULT NULL,
  `status` VARCHAR(45) DEFAULT 'andamento',
  `site_id` INT NULL,
  `tipo_edital_id` INT NULL,
  PRIMARY KEY (`id`) ) 
ENGINE=InnoDB  
DEFAULT CHARSET=utf8 
AUTO_INCREMENT=1
COMMENT = 'Tabela que guarda os editais dos sites.' ;


# $Id$
#
# Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
#
# Licensed under The MIT License
# For full copyright and license information, please see the LICENSE.txt
# Redistributions of files must retain the above copyright notice.
# MIT License (http://www.opensource.org/licenses/mit-license.php)

CREATE TABLE acos (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  parent_id INTEGER(10) DEFAULT NULL,
  model VARCHAR(255) DEFAULT '',
  foreign_key INTEGER(10) UNSIGNED DEFAULT NULL,
  alias VARCHAR(255) DEFAULT '',
  lft INTEGER(10) DEFAULT NULL,
  rght INTEGER(10) DEFAULT NULL,
  PRIMARY KEY  (id)
);

CREATE TABLE aros_acos (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  aro_id INTEGER(10) UNSIGNED NOT NULL,
  aco_id INTEGER(10) UNSIGNED NOT NULL,
  _create CHAR(2) NOT NULL DEFAULT 0,
  _read CHAR(2) NOT NULL DEFAULT 0,
  _update CHAR(2) NOT NULL DEFAULT 0,
  _delete CHAR(2) NOT NULL DEFAULT 0,
  PRIMARY KEY(id)
);

CREATE TABLE aros (
  id INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  parent_id INTEGER(10) DEFAULT NULL,
  model VARCHAR(255) DEFAULT '',
  foreign_key INTEGER(10) UNSIGNED DEFAULT NULL,
  alias VARCHAR(255) DEFAULT '',
  lft INTEGER(10) DEFAULT NULL,
  rght INTEGER(10) DEFAULT NULL,
  PRIMARY KEY  (id)
);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
