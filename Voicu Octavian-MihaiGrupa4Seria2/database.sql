create database test;

use test;

CREATE TABLE `Elevi` (
  `id` int(11) NOT NULL auto_increment,
  `nume` varchar(100) NOT NULL,
  `ani` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);