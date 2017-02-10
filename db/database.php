<?php

  function create_db()
  {
    $db = "CREATE DATABASE IF NOT EXISTS camagru; USE camagru;";

    $commentTable = "CREATE TABLE IF NOT EXISTS `CAMAGRU`.`comment`(
                  `ID` INT NOT NULL AUTO_INCREMENT ,
                  `ID_PHOTO` INT NOT NULL ,
                  `ID_USER` INT NOT NULL ,
                  `COM` VARCHAR(140) NOT NULL ,
                  PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    $likeTable = "CREATE TABLE IF NOT EXISTS `CAMAGRU`.`like`(
                  `ID` INT NOT NULL AUTO_INCREMENT ,
                  `ID_PHOTO` INT NOT NULL ,
                  `ID_USER` INT NOT NULL ,
                  PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    $userTable = "CREATE TABLE IF NOT EXISTS `CAMAGRU`.`users`(
                  `ID` INT NOT NULL AUTO_INCREMENT ,
                  `LOGIN` VARCHAR(15) NOT NULL ,
                  `MAIL` VARCHAR(50) NOT NULL ,
                  `PASSWD` VARCHAR(150) NOT NULL ,
                  `VERIFIED` BOOLEAN NOT NULL DEFAULT FALSE,
                  `ACC_HASH` VARCHAR(50) NOT NULL,
                  PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    $photoTable = "CREATE TABLE IF NOT EXISTS `CAMAGRU`.`photo`(
                  `ID` INT NOT NULL AUTO_INCREMENT ,
                  `DATE` DATE NOT NULL ,
                  `ID_USER` INT NOT NULL ,
                  `PATH` VARCHAR(140) NOT NULL ,
                  PRIMARY KEY (`ID`)) ENGINE = InnoDB;";

    $DB_DSN = "mysql:host=localhost;";
    $DB_USER = "root";
    $DB_PASSWORD = "root";

    $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $pdo->exec($db . $commentTable . $likeTable . $userTable . $photoTable);
  }
 ?>
