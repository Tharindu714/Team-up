-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for tms2
CREATE DATABASE IF NOT EXISTS `tms2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tms2`;

-- Dumping structure for table tms2.attendance_info
CREATE TABLE IF NOT EXISTS `attendance_info` (
  `aten_id` int NOT NULL AUTO_INCREMENT,
  `atn_user_id` int NOT NULL,
  `in_time` varchar(200) DEFAULT NULL,
  `out_time` varchar(150) DEFAULT NULL,
  `total_duration` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`aten_id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table tms2.attendance_info: 7 rows
/*!40000 ALTER TABLE `attendance_info` DISABLE KEYS */;
INSERT INTO `attendance_info` (`aten_id`, `atn_user_id`, `in_time`, `out_time`, `total_duration`) VALUES
	(37, 21, '22-03-2021 13:49:26', NULL, NULL),
	(39, 23, '22-03-2021 13:51:51', NULL, NULL),
	(41, 25, '22-03-2021 15:09:00', '06-10-2023 06:38:43', '15:29:43'),
	(42, 1, '22-03-2021 22:01:43', NULL, NULL),
	(43, 22, '06-10-2023 06:18:02', '06-10-2023 06:18:04', '00:00:02');
/*!40000 ALTER TABLE `attendance_info` ENABLE KEYS */;

-- Dumping structure for table tms2.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int NOT NULL,
  `from` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `to` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user_idx` (`from`),
  KEY `fk_chat_user1_idx` (`to`),
  CONSTRAINT `fk_chat_user` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `fk_chat_user1` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table tms2.chat: ~3 rows (approximately)
INSERT INTO `chat` (`id`, `content`, `datetime`, `status`, `from`, `to`) VALUES
	(1, 'hi', '2023-10-06 00:06:04', 1, 'tharinduchanaka6@gmail.com', 'dhanushka@gmail.com'),
	(3, 'hello', '2023-10-06 00:14:27', 1, 'geethkalhara@gmail.com', 'kasunijayamali@gmail.com'),
	(4, 'good morning', '2023-10-06 00:14:38', 1, 'tharinduchanaka6@gmail.com', 'maleesha@gmail.com'),
	(5, 'how are you ', '2023-10-06 05:48:58', 0, 'kasunijayamali@gmail.com', 'tharinduchanaka6@gmail.com'),
	(6, 'hi', '2023-10-06 05:49:15', 0, 'geethkalhara@gmail.com', 'dhanushka@gmail.com'),
	(7, 'hello', '2023-10-06 05:49:31', 0, 'tharinduchanaka6@gmail.com', 'maleesha@gmail.com'),
	(8, 'hey', '2023-10-06 05:50:04', 0, 'geethkalhara@gmail.com', 'tharinduchanaka6@gmail.com');

-- Dumping structure for table tms2.task_info
CREATE TABLE IF NOT EXISTS `task_info` (
  `task_id` int NOT NULL AUTO_INCREMENT,
  `t_title` varchar(120) NOT NULL,
  `t_description` text,
  `t_start_time` varchar(100) DEFAULT NULL,
  `t_end_time` varchar(100) DEFAULT NULL,
  `t_user_id` int NOT NULL,
  `status` int NOT NULL DEFAULT '0' COMMENT '0 = incomplete, 1 = In progress, 2 = complete',
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table tms2.task_info: 4 rows
/*!40000 ALTER TABLE `task_info` DISABLE KEYS */;
INSERT INTO `task_info` (`task_id`, `t_title`, `t_description`, `t_start_time`, `t_end_time`, `t_user_id`, `status`) VALUES
	(20, 'Communications', 'You\'re assigned to handle incoming calls and other communications within the office.', '2021-03-22 12:00', '2021-03-22 13:00', 17, 2),
	(21, 'Filing', 'You&#039;re assigned to management of filing system.', '2021-03-22 10:00', '2021-03-22 15:10', 22, 1),
	(22, 'Virtual Meeting', 'Please join the virtual meeting with your senior manager regarding your works on this placement.', '2021-03-22 15:00', '2021-03-22 15:20', 24, 0),
	(23, 'Data Entry', 'Go through some data!', '2021-03-22 14:00', '2021-03-22 17:00', 25, 1);
/*!40000 ALTER TABLE `task_info` ENABLE KEYS */;

-- Dumping structure for table tms2.tbl_admin
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_password` varchar(100) DEFAULT NULL,
  `user_role` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table tms2.tbl_admin: 10 rows
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` (`user_id`, `fullname`, `username`, `email`, `password`, `temp_password`, `user_role`) VALUES
	(1, 'Tharindu Chanaka', 'Tharindu_admin', 'tharindu@gmail.com', 'cac29d7a34687eb14b37068ee4708e7b', NULL, 1),
	(19, 'Tharindu Chanaka', 'tharindu', 'tharindu@gmail.com', 'e455776e5fd673c70532eee9d30de398', '', 1),
	(21, 'Maleesha Shehan', 'Maleesha', 'mille96@gmail.com', 'dd5cad7bd1a514ea7c3cc53f7c5ff4a0', '', 1),
	(22, 'Jayani Basnayaka', 'Jayani', 'jayani@gmail.com', '7ef97a56d3c6bf04faa4e3e8baa71b7d', '', 2),
	(23, 'Harry willson', 'harry', 'harryden@gmail.com', 'd0d2b883ffe11676af7e678cf45a36fa', '', 2),
	(24, 'Naduni Gunasekara', 'Naduni', 'naduni@gmail.com', 'a5be7fd161991e79a3d93c1597f5ce1e', '', 2),
	(25, 'Sahan Perera', 'Sahan', 'sahan@gmail.com', '44395557ea81b45cbcc9ebce0523517a', '', 2);
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;

-- Dumping structure for table tms2.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- Dumping data for table tms2.user: ~5 rows (approximately)
INSERT INTO `user` (`email`, `name`, `password`) VALUES
	('dhanushka@gmail.com', 'Dhanushka', 'danushka456'),
	('geethkalhara@gmail.com', 'geeth', 'geeth12345'),
	('kasunijayamali@gmail.com', 'kasuni', 'kasuni112'),
	('maleesha@gmail.com', 'maleesha', 'maleesha123'),
	('tharinduchanaka6@gmail.com', 'tharindu', 'tharindu123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
