-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2015 at 10:40 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yug`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `href` varchar(20) NOT NULL,
  `idname` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `href`, `idname`) VALUES
(1, 'Sana''a', '#sanaa', 'sanaa'),
(2, 'Taiz', '#taiz', 'taiz'),
(3, 'Aden', '#aden', 'aden'),
(4, 'Hadhramout', '#had', 'had');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(190) NOT NULL,
  `contact` varchar(300) NOT NULL,
  `de` varchar(500) NOT NULL,
  `href` varchar(20) NOT NULL,
  `cityname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `de` (`de`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `address`, `contact`, `de`, `href`, `cityname`) VALUES
(10, 'Sana''a University', 'Bi''r Ash Shaif', '+967 1 214076', 'Sana''a University (Arabic: &#1580;&#1575;&#1605;&#1593;&#1577; &#1589;&#1606;&#1593;&#1600;&#1600;&#1575;&#1569;) was established in 1970 as the first and the primary university in the Yemen Arab Republic (North Yemen), now the Republic of Yemen (see also Aden University). It is located in Sana''a, the capital of Yemen, and is currently organized with 17 faculties.It was built on the grounds of the old', '#su', 'sanaa'),
(13, 'University of Science and technology', 'Sanaa rd.', '+967 4 205190', 'University of Science and Technology is a private university in Sana''a, Yemen. It was established in 1994 as the College of Science and Technology by Dr. Tareq Sinan Abulohom and later became a major university.', '#ust', 'taiz'),
(14, 'LIU', '50 st. near Shahran Hotel', 'info@ye.liu.edu.lb', 'Lebanese International University is a university located in the Hadda neighborhood of the southern outskirts of Sana''a, Yemen. It is located south of the Lebanon Heart Hospital and west by road from Aljabowbi Castle.[1]It is a branch of the Lebanese International University, founded in Beqaa.', '#liu', 'sanaa'),
(15, 'University of Science and technology', '60 st.', '+967 1 205190', 'University of Science and Technology is a private university in Sana''a, Yemen. It was established in 1994 as the College of Science and Technology by Dr. Tareq Sinan Abulohom and later became a major university.', '#ust', 'sanaa'),
(16, 'LIU', 'Sanaa rd.', 'info@ye.liu.edu.lb', 'Lebanese International University is a university located in the Hadda neighborhood of the southern outskirts of Sana''a, Yemen. It is located south of the Lebanon Heart Hospital and west by road from Aljabowbi Castle.[1]It is a branch of the Lebanese International University, founded in Beqaa.', '#liu', 'taiz'),
(17, 'LIU', 'khormaksar ash shaik othman st.', 'info@ye.liu.edu.lb', 'Lebanese International University is a university located in the Hadda neighborhood of the southern outskirts of Sana''a, Yemen. It is located south of the Lebanon Heart Hospital and west by road from Aljabowbi Castle.[1]It is a branch of the Lebanese International University, founded in Beqaa.', '#liu', 'aden'),
(18, 'Queen Arwa University', '60 st.', '+967 1 445994', 'Queen Arwa University is a Yemeni private, university founded in 1996 in Yemen and named after Queen Arwa. The university has some different fields of study including Humanities and Social Sciences, Commercial Sciences and Administration, Engineering, Science, Higher Education, Art, Law, and Microbiology.', '#qau', 'sanaa'),
(19, 'LIU', '60 st.', 'info@ye.liu.edu.lb', 'Lebanese International University is a university located in the Hadda neighborhood of the southern outskirts of Sana''a, Yemen. It is located south of the Lebanon Heart Hospital and west by road from Aljabowbi Castle.[1]It is a branch of the Lebanese International University, founded in Beqaa.	', '#liu', 'had'),
(20, 'Hadhramout University of Science and Technology', 'Sanaa rd.', '+967 5 360865', 'Hadramout University of Science and Technology, (Arabic: &#1580;&#1575;&#1605;&#1593;&#1577; &#1581;&#1590;&#1585;&#1605;&#1608;&#1578; &#1604;&#1604;&#1593;&#1604;&#1608;&#1605; &#1608; &#1575;&#1604;&#1578;&#1603;&#1606;&#1608;&#1604;&#1608;&#1580;&#1610;&#1575;&#8206;) was established in Hadramout as an official University in 1996. It includes a college of medicine.', '#hu', 'had'),
(21, 'Taiz University', 'taizz 3086', '+967 4 230642', 'Taiz University was founded in Yemen, Taiz, on April 19, 1993 and opened on October 11, 1995.[1] The university consists of 8 colleges and 5 Science centres.', '#tu', 'taiz');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(70) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Hisham Ali Alshami', 'ahishamali', 'ahishamali10@gmail.com', 'd555f42d94780233af72c13d956f02fa'),
(17, 'basheer adel', 'basheer009', 'basheer009@gmail.com', 'c3697dfb827d4dfe72fcfba374c2138a'),
(18, 'fdfdg', 'gfdq', 'esdf', 'cc4599f080f7990c5aed1d844676b15d');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
