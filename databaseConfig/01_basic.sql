CREATE DATABASE IF NOT EXISTS `expenses`;

DROP TABLE IF EXISTS `expenses`.`users`;

CREATE TABLE `expenses`.`users` (
    `id`        INT(11) NOT NULL,
    `username`  VARCHAR(255) NOT NULL,
    `email`     VARCHAR(255) NOT NULL,
    `password`  VARCHAR(255) NOT NULL,

    PRIMARY KEY(`id`)
)Engine=InnoDB CHARSET=utf8;