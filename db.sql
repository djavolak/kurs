CREATE TABLE `user` (
  `userId` INT NOT NULL AUTO_INCREMENT,
  `fullname` VARCHAR(45) NOT NULL,
  `gender` INTEGER (1) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `birthdate` VARCHAR(45) NOT NULL,
  `createdAt` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`userId`));
