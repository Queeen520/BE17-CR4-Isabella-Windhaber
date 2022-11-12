-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 12. Nov 2022 um 16:39
-- Server-Version: 10.4.25-MariaDB
-- PHP-Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `be17_cr4_isabellawindhaber_biglibrary`
--
CREATE DATABASE IF NOT EXISTS `be17_cr4_isabellawindhaber_biglibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `be17_cr4_isabellawindhaber_biglibrary`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `titel` varchar(90) NOT NULL,
  `type` enum('Book','DVD','CD') NOT NULL,
  `release_year` int(4) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `ISBN` bigint(20) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `pages` int(5) NOT NULL,
  `producer` varchar(80) DEFAULT NULL,
  `FSK` tinyint(2) NOT NULL,
  `genre` varchar(60) DEFAULT NULL,
  `status` enum('Available','Not Available') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`id`, `picture`, `titel`, `type`, `release_year`, `description`, `ISBN`, `author`, `pages`, `producer`, `FSK`, `genre`, `status`) VALUES
(1, '636eae9a18a80.png', 'Think and Grow Rich', 'Book', 1937, 'Think and Grow Rich by Napoleon Hill examines the psychological power of thought and the brain in the process of furthering your career for both monetary and personal satisfaction. Originally published in 1937, this is one of the all-time self-help classi', 9781585424337, 'Napoleon Hill', 243, '', 0, '', 'Not Available'),
(2, '636fa860c4594.png', 'inFAMOUS Second Son', 'CD', 2014, '', 0, '', 0, 'Sucker Punch Productions', 16, 'Action', 'Available'),
(3, '636facf58cfc8.png', 'Wrong Turn 5 Bloodlines', 'DVD', 2012, '', 0, '', 0, 'Declan OBrien', 18, 'Horror', 'Available'),
(4, '636faa5850833.png', 'RAYMAN Legends', 'CD', 2014, 'Rayman Legend is a popular jump and run video game', 0, '', 0, 'Ubisoft', 6, 'Jump and Run, Adventure', 'Available'),
(5, '636fbdfbe87b0.png', 'Between Past and Future', 'Book', 1961, 'The book is a collection of various essays written between 1954 and 1968. The final version of the book includes essays dealing with different philosophical subjects including freedom, education, authority, tradition, history and politics. The subtitle of', 9783492301749, 'Hannah Arendt', 439, '', 0, '', 'Available'),
(6, '636faac4b506f.png', 'Days Gone', 'CD', 2016, '', 0, '', 0, 'SIE Bend Studio', 18, 'Action, Adventure', 'Available'),
(7, '636fabcac2bef.png', 'Schindlers Liste', 'DVD', 1994, '', 0, '', 0, 'Steven Spielberg', 12, 'Drama, Historical-Drama, War', 'Not Available'),
(8, '636fa33910f72.png', 'Rich Dad Poor Dad', 'Book', 1997, 'Rich Dad Poor Dad is about Robert Kiyosaki and his two dads—his real father (poor dad) and the father of his best friend (rich dad)—and the ways in which both men shaped his thoughts about money and investing. He says that his poor dad went to Stanford an', 9783898798822, 'Robert T. Kiyosaki', 302, '', 0, '', 'Not Available'),
(9, '636fab5caf1ef.png', 'G. I. Jane', 'DVD', 1997, 'The film tells the fictional story of the first woman to undergo special operations training similar to the U.S. Navy SEALs.', 0, '', 0, 'Ridley Scott', 16, 'Action, Drama', 'Available'),
(10, '636fa71f9d9c3.png', 'Saving Private Ryan', 'DVD', 1998, '', 0, '', 0, 'Steven Spielberg', 16, 'Drama, War, Action', 'Available'),
(11, '636fa7bcc726b.png', 'Dying Light', 'CD', 2015, '', 0, '', 0, 'Techland', 18, 'Horro, Action, Jump and Run', 'Available');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
