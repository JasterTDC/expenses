CREATE DATABASE IF NOT EXISTS `expenses`;

DROP TABLE IF EXISTS `expenses`.`users`;

CREATE TABLE `expenses`.`users` (
    `id`        INT(11) AUTO_INCREMENT NOT NULL,
    `username`  VARCHAR(255) NOT NULL,
    `email`     VARCHAR(255) NOT NULL,
    `password`  VARCHAR(255) NOT NULL,

    PRIMARY KEY(`id`),
    CONSTRAINT `users_username` UNIQUE(`username`),
    CONSTRAINT `users_email` UNIQUE(`email`)
)Engine=InnoDB CHARSET=utf8;

DROP TABLE IF EXISTS `expenses`.`expenses`;

CREATE TABLE `expenses`.`expenses` (
    `id`            INT(11) AUTO_INCREMENT NOT NULL,
    `name`          VARCHAR(255) NOT NULL,
    `price`         FLOAT(12,2) NOT NULL,
    `date`          DATETIME NOT NULL,
    `createdAt`     DATETIME NOT NULL,
    `modifiedAt`    DATETIME NOT NULL,

    PRIMARY KEY (`id`)
)Engine=InnoDB CHARSET=utf8;
