-- MySQL Script generated by MySQL Workbench
-- Mon Feb  3 11:57:32 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema weirdoware
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `weirdoware` DEFAULT CHARACTER SET utf8 ;
USE `weirdoware` ;

-- -----------------------------------------------------
-- Table `weirdoware`.`procesos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`procesos` (
  `idproceso` INT NOT NULL AUTO_INCREMENT,
  `proceso` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`idproceso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`actividades` (
  `idactividad` INT NOT NULL AUTO_INCREMENT,
  `actividad` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  `tipo_actividad` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `idproceso` INT NOT NULL,
  PRIMARY KEY (`idactividad`),
  INDEX `fk_actividades_procesos1_idx` (`idproceso` ASC),
  CONSTRAINT `fk_actividades_procesos1`
    FOREIGN KEY (`idproceso`)
    REFERENCES `weirdoware`.`procesos` (`idproceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`users` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `last_name` VARCHAR(250) NOT NULL,
  `email` VARCHAR(120) NULL DEFAULT NULL,
  `password` VARCHAR(120) NULL DEFAULT NULL,
  `mobile` VARCHAR(45) NULL DEFAULT NULL,
  `type_doc` VARCHAR(45) NULL DEFAULT NULL,
  `document` VARCHAR(45) NULL DEFAULT NULL,
  `direction` VARCHAR(45) NULL DEFAULT NULL,
  `score` VARCHAR(45) NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`organizaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`organizaciones` (
  `idorganizacion` INT NOT NULL AUTO_INCREMENT,
  `organizacion` VARCHAR(45) NOT NULL,
  `nit` VARCHAR(45) NOT NULL,
  `telefono_uno` VARCHAR(45) NOT NULL,
  `telefono_dos` VARCHAR(45) NULL,
  `conmutador` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`idorganizacion`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`clientes` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NOT NULL,
  `last_name` VARCHAR(250) NOT NULL,
  `email` VARCHAR(120) NULL DEFAULT NULL,
  `home_address` VARCHAR(120) NULL DEFAULT NULL,
  `mobile` VARCHAR(45) NULL DEFAULT NULL,
  `phone` VARCHAR(45) NULL,
  `type_doc` VARCHAR(45) NULL DEFAULT NULL,
  `document` VARCHAR(45) NULL DEFAULT NULL,
  `score` VARCHAR(45) NULL DEFAULT NULL,
  `remember_token` VARCHAR(100) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`contactos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`contactos` (
  `idcontacto` INT NOT NULL AUTO_INCREMENT,
  `idorganizacion` INT NOT NULL,
  `clientes_id` INT NOT NULL,
  `observaciones` VARCHAR(500) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  INDEX `fk_organizaciones_has_clientes_clientes1_idx` (`clientes_id` ASC),
  INDEX `fk_organizaciones_has_clientes_organizaciones1_idx` (`idorganizacion` ASC),
  PRIMARY KEY (`idcontacto`),
  CONSTRAINT `fk_organizaciones_has_clientes_organizaciones1`
    FOREIGN KEY (`idorganizacion`)
    REFERENCES `weirdoware`.`organizaciones` (`idorganizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_organizaciones_has_clientes_clientes1`
    FOREIGN KEY (`clientes_id`)
    REFERENCES `weirdoware`.`clientes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`cotizaciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`cotizaciones` (
  `idcotizacion` INT NOT NULL AUTO_INCREMENT,
  `idcontacto` INT NOT NULL,
  `users_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`idcotizacion`),
  INDEX `fk_cotizaciones_contactos1_idx` (`idcontacto` ASC),
  INDEX `fk_cotizaciones_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_cotizaciones_contactos1`
    FOREIGN KEY (`idcontacto`)
    REFERENCES `weirdoware`.`contactos` (`idcontacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cotizaciones_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `weirdoware`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`facturas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`facturas` (
  `idfactura` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(500) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `idcotizacion` INT NOT NULL,
  PRIMARY KEY (`idfactura`),
  INDEX `fk_facturas_cotizaciones1_idx` (`idcotizacion` ASC),
  CONSTRAINT `fk_facturas_cotizaciones1`
    FOREIGN KEY (`idcotizacion`)
    REFERENCES `weirdoware`.`cotizaciones` (`idcotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`pagos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`pagos` (
  `idpago` INT NOT NULL AUTO_INCREMENT,
  `valor` VARCHAR(45) NULL,
  `tipo_pago` VARCHAR(45) NULL,
  `descripcion_pago` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `idfactura` INT NOT NULL,
  `idcontacto` INT NOT NULL,
  PRIMARY KEY (`idpago`),
  INDEX `fk_pagos_facturas1_idx` (`idfactura` ASC),
  INDEX `fk_pagos_contactos1_idx` (`idcontacto` ASC),
  CONSTRAINT `fk_pagos_facturas1`
    FOREIGN KEY (`idfactura`)
    REFERENCES `weirdoware`.`facturas` (`idfactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagos_contactos1`
    FOREIGN KEY (`idcontacto`)
    REFERENCES `weirdoware`.`contactos` (`idcontacto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`recursos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`recursos` (
  `idrecurso` INT NOT NULL AUTO_INCREMENT,
  `recurso` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  `tipo_recurso` VARCHAR(45) NULL,
  `costo` INT NULL,
  `tipo_cobro` INT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `users_id` INT(10) NOT NULL,
  `idpago` INT NOT NULL,
  PRIMARY KEY (`idrecurso`),
  UNIQUE INDEX `costo_UNIQUE` (`costo` ASC),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo_recurso` ASC),
  INDEX `fk_recursos_users1_idx` (`users_id` ASC),
  INDEX `fk_recursos_pagos1_idx` (`idpago` ASC),
  CONSTRAINT `fk_recursos_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `weirdoware`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recursos_pagos1`
    FOREIGN KEY (`idpago`)
    REFERENCES `weirdoware`.`pagos` (`idpago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`tareas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`tareas` (
  `idtarea` INT NOT NULL AUTO_INCREMENT,
  `tarea` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(500) NULL,
  `duracion` VARCHAR(45) NOT NULL,
  `estado_tarea` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `idrecurso` INT NOT NULL,
  `idactividad` INT NOT NULL,
  PRIMARY KEY (`idtarea`),
  INDEX `fk_tareas_recursos1_idx` (`idrecurso` ASC),
  INDEX `fk_tareas_actividades1_idx` (`idactividad` ASC),
  CONSTRAINT `fk_tareas_recursos1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `weirdoware`.`recursos` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tareas_actividades1`
    FOREIGN KEY (`idactividad`)
    REFERENCES `weirdoware`.`actividades` (`idactividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weirdoware`.`servicios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`servicios` (
  `idservicio` INT NOT NULL AUTO_INCREMENT,
  `idcotizacion` INT NOT NULL,
  `idactividad` INT NOT NULL,
  `costos` VARCHAR(45) NULL,
  `descuentos` VARCHAR(45) NULL,
  `observaciones` VARCHAR(500) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  INDEX `fk_cotizaciones_has_actividades_actividades1_idx` (`idactividad` ASC),
  INDEX `fk_cotizaciones_has_actividades_cotizaciones1_idx` (`idcotizacion` ASC),
  PRIMARY KEY (`idservicio`),
  CONSTRAINT `fk_cotizaciones_has_actividades_cotizaciones1`
    FOREIGN KEY (`idcotizacion`)
    REFERENCES `weirdoware`.`cotizaciones` (`idcotizacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cotizaciones_has_actividades_actividades1`
    FOREIGN KEY (`idactividad`)
    REFERENCES `weirdoware`.`actividades` (`idactividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `weirdoware` ;

-- -----------------------------------------------------
-- Table `weirdoware`.`ordenes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`ordenes` (
  `idorden` INT(11) NOT NULL AUTO_INCREMENT,
  `orden` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(450) NULL DEFAULT NULL,
  `puntuacion` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idorden`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`compromisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`compromisos` (
  `idcompromiso` INT(11) NOT NULL AUTO_INCREMENT,
  `compromiso` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(450) NULL DEFAULT NULL,
  `corte` DATE NULL DEFAULT NULL,
  `plazo` VARCHAR(45) NOT NULL,
  `estado` VARCHAR(45) NOT NULL,
  `costo` INT(11) NOT NULL,
  `cuotas` INT(11) NOT NULL,
  `puntuacion` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `idorden` INT NOT NULL,
  `idrecurso` INT NOT NULL,
  PRIMARY KEY (`idcompromiso`),
  INDEX `fk_compromisos_ordenes_idx` (`idorden` ASC),
  INDEX `fk_compromisos_recursos1_idx` (`idrecurso` ASC),
  CONSTRAINT `fk_compromisos_ordenes`
    FOREIGN KEY (`idorden`)
    REFERENCES `weirdoware`.`ordenes` (`idorden`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compromisos_recursos1`
    FOREIGN KEY (`idrecurso`)
    REFERENCES `weirdoware`.`recursos` (`idrecurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`permissions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`permissions` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NULL DEFAULT NULL,
  `slug` VARCHAR(120) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updates_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`roles` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(120) NULL DEFAULT NULL,
  `slug` VARCHAR(120) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  `special` ENUM('all-access', 'no-access') CHARACTER SET 'utf8mb4' COLLATE 'utf8mb4_unicode_ci' NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`permission_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`permission_role` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `permission_id` INT(10) NOT NULL,
  `role_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_permissions_has_roles_roles1_idx` (`role_id` ASC),
  INDEX `fk_permissions_has_roles_permissions1_idx` (`permission_id` ASC),
  CONSTRAINT `fk_permissions_has_roles_permissions1`
    FOREIGN KEY (`permission_id`)
    REFERENCES `weirdoware`.`permissions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissions_has_roles_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `weirdoware`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`permission_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`permission_user` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `permission_id` INT(10) NOT NULL,
  `user_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_permissions_has_users_users1_idx` (`user_id` ASC),
  INDEX `fk_permissions_has_users_permissions1_idx` (`permission_id` ASC),
  CONSTRAINT `fk_permissions_has_users_permissions1`
    FOREIGN KEY (`permission_id`)
    REFERENCES `weirdoware`.`permissions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permissions_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `weirdoware`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `weirdoware`.`role_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `weirdoware`.`role_user` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `role_id` INT(10) NOT NULL,
  `user_id` INT(10) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_roles_has_users_users1_idx` (`user_id` ASC),
  INDEX `fk_roles_has_users_roles1_idx` (`role_id` ASC),
  CONSTRAINT `fk_roles_has_users_roles1`
    FOREIGN KEY (`role_id`)
    REFERENCES `weirdoware`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles_has_users_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `weirdoware`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;