-- --------------------------------------------------------
-- Tested Using:
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
  `author` varchar(255) DEFAULT NULL COMMENT 'Book''s author',
  `category` varchar(25) DEFAULT '' COMMENT 'Book category',
  `file_path` varchar(255) NOT NULL DEFAULT '' COMMENT 'Path to PDF file',
  `image_path` varchar(255) NOT NULL DEFAULT '' COMMENT 'Path to cover image',
  `download_count` int(11) NOT NULL DEFAULT 0 COMMENT 'Number of downloads',
  PRIMARY KEY (`bookID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

-- Dumping data for table librarydb.book: ~9 rows (approximately)
INSERT INTO `book` (`bookID`, `title`, `description`, `author`, `category`, `file_path`, `image_path`, `download_count`) VALUES
	(1, 'Jaws', 'A great white shark terrorizes the beautiful summer getaway of Amity Island, and a motley group of men take to the water to do battle with the beast. Jaws is one of the most iconic thrillers ever written. ', '	Peter Benchley', 'Fiction', 'books/jaws.pdf', 'images/covers/jaws_cover.jpg', 0),
	(2, 'The Secret History of Sharks: The Rise of the Ocean\'s Most Fearsome Predators', 'The Secret History of Sharks showcases the global search to discover sharks’ largely unknown evolution, led by Long and dozens of other extraordinary scientists to reveal never-before-found fossils and the clues to sharks’ singular story. ', 'John A. Long', 'History', 'books/the_secret_history_of_sharks.pdf', 'images/covers/the_secret_history_of_sharks_cover.jpg', 0),
	(3, 'Everything You Know About Sharks is Wrong!', 'Do you know all there is to know about sharks? They\'re all giant, cold-blooded creatures that enjoy eating humans, right? Well, this book is here to show you that you\'re WRONG! But don\'t worry, even the experts can\'t be right all the time.', 'Nick Crumpton & Gavin Scott', 'Non-Fiction', 'books/everything_you_know_about_sharks_is_wrong.pdf', 'images/covers/everything_you_know_about_sharks_is_wrong_cover.jpg', 0),
	(4, 'Why Sharks Matter: A Deep Dive with the World\'s Most Misunderstood Predator', 'Get submerged in the amazing world of sharks! Your expert host, award-winning marine biologist Dr. David Shiffman, will show you how―and why―we should protect these mysterious, misunderstood guardians of the ocean.', 'David Shiffman', 'Science', 'books/why_sharks_matter.pdf', 'images/covers/why_sharks_matter_cover.jpg', 0),
	(5, 'Who Would Win? Killer Whale vs. Great White Shark', 'This nonfiction reader compares and contrasts two ferocious underwater creatures. Kids learn about the killer whale and the great white shark\'s anatomies, behaviors, and more. This book is packed with photos, charts, illustrations, and amazing facts.', 'Jerry Pallotta', 'Non-Fiction', 'books/who_would_win_whale_vs_shark.pdf', 'images/covers/who_would_win_whale_vs_shark_cover.jpg', 0),
	(6, 'Marine Biology: Function, Biodiversity, Ecology 5th Edition', 'This book is regarded by many as the most authoritative marine biology text that has balanced organismal and ecological focus by including the latest developments on molecular biology, global climate change, and ocean processes.', 'Jeffrey Levinton', 'Science', 'books/marine_biology_ecology_5th_edition.pdf', 'images/covers/marine_biology_ecology_5th_edition.jpg', 0),
	(7, 'Marine Biology 11th Edition', 'Marine Biology covers the basics of marine biology with a global approach, using examples from numerous regions and ecosystems worldwide. This introductory, one-semester text is designed for non-majors. ', 'Peter Castro & Michael Huber', 'Science', 'books/marine_biology_11th_edition.pdf', 'images/covers/marine_biology_11th_edition.jpg', 0),
	(8, 'Shark Lady: The True Story of How Eugenie Clark Became the Ocean\'s Most Fearless Scientist', 'This is the story of a woman who dared to dive, defy, discover, and inspire. This is the story of Shark Lady. One of the best science picture books for children, Shark Lady is a must for both teachers and parents alike!', 'Jess Keating', 'Non-Fiction', 'books/shark_lady.pdf', 'images/covers/shark_lady_cover.jpeg', 0),
	(9, 'Shark vs. Train', 'If you think Superman vs. Batman would be an exciting matchup, wait until you see Shark vs. Train. In this hilarious and wacky picture book, Shark and Train egg each other on for one competition after another!', 'Chris Barton', 'Fiction', 'books/shark_vs_train.pdf', 'images/covers/shark_vs_train_cover.jpg', 0);

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

-- Dumping data for table librarydb.visitcount: ~1 rows (approximately)
INSERT INTO `visitcount` (`visit_count`) VALUES
	(0);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
