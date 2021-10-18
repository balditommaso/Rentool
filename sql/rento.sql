SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';



CREATE SCHEMA IF NOT EXISTS `rentool` DEFAULT CHARACTER SET latin1 ;



USE `rentool` ;



-- -----------------------------------------------------

-- Table `rentool`.`utente`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `rentool`.`utente` ;



CREATE  TABLE IF NOT EXISTS `rentool`.`utente` (

  `utenteId` INT NOT NULL AUTO_INCREMENT ,

  `nome` VARCHAR(45) NOT NULL ,

  `cognome` VARCHAR(45) NOT NULL ,

  `codfiscale` VARCHAR(16) NOT NULL ,

  `telefono` VARCHAR(10) NOT NULL ,

  `documento` MEDIUMBLOB NOT NULL ,

  `email` VARCHAR(45) NOT NULL ,

  `nascita` DATE NOT NULL ,

  `foto` MEDIUMBLOB NULL ,

  `descrizione` VARCHAR(512) NULL ,

  PRIMARY KEY (`utenteId`) )

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `rentool`.`regione`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `rentool`.`regione` ;



CREATE  TABLE IF NOT EXISTS `rentool`.`regione` (

  `citta` VARCHAR(45) NOT NULL ,

  `regioneId` VARCHAR(45) NOT NULL ,

  PRIMARY KEY (`citta`) )

ENGINE = InnoDB;





-- -----------------------------------------------------

-- Table `rentool`.`oggetto`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `rentool`.`oggetto` ;



CREATE  TABLE IF NOT EXISTS `rentool`.`oggetto` (

  `OggettoId` INT NOT NULL AUTO_INCREMENT ,

  `utenteId` INT NOT NULL ,

  `luogo` VARCHAR(45) NOT NULL ,

  `nome` VARCHAR(45) NOT NULL ,

  `categoria` VARCHAR(45) NOT NULL ,

  `tariffa` FLOAT NOT NULL DEFAULT 0 ,

  `descrizione` VARCHAR(512) NULL ,

  `foto` MEDIUMBLOB NULL ,

  `istruzioni` MEDIUMBLOB NULL ,

  `certificato` MEDIUMBLOB NULL ,

  PRIMARY KEY (`OggettoId`) ,

  CONSTRAINT `fk_utente`

    FOREIGN KEY (`utenteId` )

    REFERENCES `rentool`.`utente` (`utenteId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE,

  CONSTRAINT `fk_reg`

    FOREIGN KEY (`luogo` )

    REFERENCES `rentool`.`regione` (`citta` )

    ON DELETE CASCADE

    ON UPDATE CASCADE)

ENGINE = InnoDB;



CREATE INDEX `fk_utente` ON `rentool`.`oggetto` (`utenteId` ASC) ;



CREATE INDEX `fk_reg` ON `rentool`.`oggetto` (`luogo` ASC) ;





-- -----------------------------------------------------

-- Table `rentool`.`preferite`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `rentool`.`preferite` ;



CREATE  TABLE IF NOT EXISTS `rentool`.`preferite` (

  `preferitiId` INT NOT NULL AUTO_INCREMENT ,

  `untenteId` INT NOT NULL ,

  `oggettoId` INT NOT NULL ,

  PRIMARY KEY (`preferitiId`) ,

  CONSTRAINT `fk_utente_ogg`

    FOREIGN KEY (`untenteId` )

    REFERENCES `rentool`.`utente` (`utenteId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE,

  CONSTRAINT `fk_ogg_utente`

    FOREIGN KEY (`oggettoId` )

    REFERENCES `rentool`.`oggetto` (`OggettoId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE)

ENGINE = InnoDB;



CREATE INDEX `fk_utente_ogg` ON `rentool`.`preferite` (`untenteId` ASC) ;



CREATE INDEX `fk_ogg_utente` ON `rentool`.`preferite` (`oggettoId` ASC) ;





-- -----------------------------------------------------

-- Table `rentool`.`noleggio`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `rentool`.`noleggio` ;



CREATE  TABLE IF NOT EXISTS `rentool`.`noleggio` (

  `noleggioId` INT NOT NULL AUTO_INCREMENT ,

  `oggettoId` INT NOT NULL ,

  `utenteId` INT NOT NULL ,

  `datainizio` DATE NOT NULL ,

  `datafine` DATE NOT NULL ,

  `certificazione` TINYINT NOT NULL DEFAULT 0 ,

  `conferma` TINYINT NOT NULL DEFAULT 0 ,

  `messaggio` VARCHAR(512) NULL ,

  PRIMARY KEY (`noleggioId`) ,

  CONSTRAINT `fk_nol1`

    FOREIGN KEY (`utenteId` )

    REFERENCES `rentool`.`utente` (`utenteId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE,

  CONSTRAINT `fk_nol2`

    FOREIGN KEY (`oggettoId` )

    REFERENCES `rentool`.`oggetto` (`OggettoId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE)

ENGINE = InnoDB;



CREATE INDEX `fk_nol1` ON `rentool`.`noleggio` (`utenteId` ASC) ;



CREATE INDEX `fk_nol2` ON `rentool`.`noleggio` (`oggettoId` ASC) ;





-- -----------------------------------------------------

-- Table `rentool`.`recensione`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `rentool`.`recensione` ;



CREATE  TABLE IF NOT EXISTS `rentool`.`recensione` (

  `recensioneId` INT NOT NULL AUTO_INCREMENT ,

  `noleggioId` INT NOT NULL ,

  `oggettoId` INT NOT NULL ,

  `voto` INT NOT NULL ,

  `descrizione` VARCHAR(45) NULL ,

  PRIMARY KEY (`recensioneId`) ,

  CONSTRAINT `fk_rec`

    FOREIGN KEY (`oggettoId` )

    REFERENCES `rentool`.`oggetto` (`OggettoId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE,

  CONSTRAINT `fk_re1`

    FOREIGN KEY (`noleggioId` )

    REFERENCES `rentool`.`noleggio` (`noleggioId` )

    ON DELETE CASCADE

    ON UPDATE CASCADE)

ENGINE = InnoDB;



CREATE INDEX `fk_rec` ON `rentool`.`recensione` (`oggettoId` ASC) ;



CREATE INDEX `fk_re1` ON `rentool`.`recensione` (`noleggioId` ASC) ;







SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

