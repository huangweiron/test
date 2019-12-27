-- Adminer 4.7.4 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `Id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `grade` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `class` (`Id`, `grade`, `class`) VALUES
(1,	'17',	'网络一班'),
(2,	'17',	'网络二班');

DROP TABLE IF EXISTS `curriculum`;
CREATE TABLE `curriculum` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `curriculum` (`Id`, `name`) VALUES
(1,	'网页设计'),
(2,	'英语');

DROP TABLE IF EXISTS `sktime`;
CREATE TABLE `sktime` (
  `Id` int(20) NOT NULL AUTO_INCREMENT,
  `curriculumId` int(11) NOT NULL,
  `classId` int(20) unsigned NOT NULL,
  `zhouci` int(20) NOT NULL,
  `jieci` int(20) NOT NULL,
  `week` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `curriculumId` (`curriculumId`),
  KEY `classId` (`classId`),
  CONSTRAINT `sktime_ibfk_1` FOREIGN KEY (`curriculumId`) REFERENCES `curriculum` (`Id`),
  CONSTRAINT `sktime_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `class` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sktime` (`Id`, `curriculumId`, `classId`, `zhouci`, `jieci`, `week`) VALUES
(1,	1,	1,	13,	2,	'星期一'),
(2,	2,	2,	13,	2,	'星期二'),
(3,	2,	1,	13,	1,	'星期二'),
(4,	2,	2,	13,	2,	'星期一');

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `Id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `classId` int(20) unsigned NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `classId` (`classId`),
  CONSTRAINT `student_ibfk_1` FOREIGN KEY (`classId`) REFERENCES `class` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `student` (`Id`, `user_id`, `name`, `sex`, `password`, `classId`) VALUES
(1,	'201730622101',	'曾小猫',	'男',	'e10adc3949ba59abbe56e057f20f883e',	1),
(2,	'201730622201',	'李天天',	'女',	'e10adc3949ba59abbe56e057f20f883e',	2),
(3,	'201730622102',	'里富士达',	'男',	'e10adc3949ba59abbe56e057f20f883e',	1),
(4,	'201730622202',	'三大1',	'女',	'e10adc3949ba59abbe56e057f20f883e',	2);

DROP TABLE IF EXISTS `stud_word`;
CREATE TABLE `stud_word` (
  `Id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `studId` int(20) unsigned NOT NULL,
  `tewId` int(20) unsigned NOT NULL,
  `sktimeId` int(20) NOT NULL,
  `content` text,
  `filename` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `studId` (`studId`),
  KEY `tewId` (`tewId`),
  KEY `sktimeId` (`sktimeId`),
  CONSTRAINT `stud_word_ibfk_1` FOREIGN KEY (`studId`) REFERENCES `student` (`Id`),
  CONSTRAINT `stud_word_ibfk_2` FOREIGN KEY (`tewId`) REFERENCES `tea_word` (`Id`),
  CONSTRAINT `stud_word_ibfk_3` FOREIGN KEY (`studId`) REFERENCES `tea_word` (`Id`),
  CONSTRAINT `stud_word_ibfk_4` FOREIGN KEY (`sktimeId`) REFERENCES `sktime` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `Id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `classId` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `teacher` (`Id`, `user_id`, `name`, `sex`, `password`, `classId`) VALUES
(1,	'666666',	'张同辉',	'男',	'e10adc3949ba59abbe56e057f20f883e',	'1'),
(2,	'666661',	'张三',	'男',	'e10adc3949ba59abbe56e057f20f883e',	'1,2');

DROP TABLE IF EXISTS `tea_word`;
CREATE TABLE `tea_word` (
  `Id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `teaId` int(20) unsigned NOT NULL,
  `classId` int(20) unsigned NOT NULL,
  `sktimeId` int(20) NOT NULL,
  `content` text,
  `filename` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `teaId` (`teaId`),
  KEY `classId` (`classId`),
  KEY `sktimeId` (`sktimeId`),
  CONSTRAINT `tea_word_ibfk_1` FOREIGN KEY (`teaId`) REFERENCES `teacher` (`Id`),
  CONSTRAINT `tea_word_ibfk_2` FOREIGN KEY (`classId`) REFERENCES `class` (`Id`),
  CONSTRAINT `tea_word_ibfk_3` FOREIGN KEY (`sktimeId`) REFERENCES `sktime` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2019-12-20 05:19:22
