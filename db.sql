CREATE TABLE `user` (
  `userId` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(64) NOT NULL,
  `gender` VARCHAR (16) NOT NULL,
  `email` VARCHAR(64) NOT NULL,
  `birthdate` DATETIME NOT NULL,
  `createdAt` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`));