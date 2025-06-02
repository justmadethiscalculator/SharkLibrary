-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.7.2-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for librarydb
CREATE DATABASE IF NOT EXISTS `librarydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
USE `librarydb`;

-- Dumping structure for table librarydb.book
CREATE TABLE IF NOT EXISTS `book` (
  `bookID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT 'Book title',
  `description` text NOT NULL DEFAULT 'This is a book description.' COMMENT 'Book description',
  `category` varchar(25) DEFAULT '' COMMENT 'Book category',
  `file_path` varchar(255) NOT NULL DEFAULT '' COMMENT 'Path to PDF file',
  `image_path` varchar(255) NOT NULL DEFAULT '' COMMENT 'Path to cover image',
  `download_count` int(11) NOT NULL DEFAULT 0 COMMENT 'Number of downloads',
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Dumping data for table librarydb.book: ~0 rows (approximately)

-- Dumping structure for table librarydb.comment
CREATE TABLE IF NOT EXISTS `comment` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `content` text NOT NULL COMMENT 'Comment content',
  `bookID` int(11) NOT NULL DEFAULT 0 COMMENT 'Foreign key to book table',
  PRIMARY KEY (`commentID`),
  KEY `fk_bookID` (`bookID`),
  CONSTRAINT `fk_bookID` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Dumping data for table librarydb.comment: ~0 rows (approximately)

-- Dumping structure for table librarydb.visitcount
CREATE TABLE IF NOT EXISTS `visitcount` (
  `visit_count` int(11) NOT NULL COMMENT 'Total number of homepage visits'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Dumping data for table librarydb.visitcount: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
