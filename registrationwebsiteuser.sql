-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 11:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrationwebsiteuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
    `Username` varchar(30) NOT NULL,
    `ImageName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Full Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `BirthDate` date NOT NULL,
  `PhoneNumber` int(12) NOT NULL,
  `Address` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Full Name`, `Username`, `BirthDate`, `PhoneNumber`, `Address`, `Email`, `Password`) VALUES
('Aisha Hesham', 'AishaKandil', '1995-08-11', 1019591427, '130 ard elmokhabarat', 'aishahesham23@gmail.com', '03b9d6595125a0d76e1dc0a607d505'),
('Sarah Hesham', 'SarahHesham', '1997-02-28', 1019591428, '4a juhayna street el', 'sarahhesham97@gmail.com', '9b350c966533055234f6b193ae7177'),
('Laila Hesham Kandil', 'LailaKandil', '2005-04-06', 1012960328, '1a mesaha street el ', 'lailakandil64@gmail.com', 'c95ceb39368b12380af4bb53d3b2dd'),
('Zeina Hesham', 'ZeinaHesham99', '1999-10-10', 1019591429, '120 narges buildings', 'zeinak99@gmail.com', '91bbf8506556eddf2f380b684f9aa7'),
('Fares Mostafa', 'FaresFekry20', '2020-12-26', 1015131305, '123 okda street taga', 'faresmostafa2020@gmail.com', 'f222cd4465f612020d3091a646659d'),
('Mariam Hesham Mohamed', 'MariamKandil', '1996-10-10', 1011334948, 'abbas elakkad street', 'marhkandil@gmail.com', '52626e1b60fd7305beb1ef11dafa4d'),
('Salma Gamal', 'SalmaEzzat03', '2004-06-06', 1111993729, '140 ard elmokhabarat', 'salmaGamal2003@gmail.com', '8a23a4eb578c7fe1626044e9fcf678'),
('Dana Khaled', 'DanaKhaled2004', '2004-11-12', 1019591422, 'mohi eldin aboelezz ', 'Danakhaled2004@gmail.com', '55afc1302138e86eb8b57788d162ef'),
('Hesham', 'Hesham Kandil', '2024-04-09', 1012960328, '1a mesaha street el ', 'lailakandil64@gmail.com', '91bbf8506556eddf2f380b684f9aa7');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
