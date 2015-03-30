-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 08:43 PM
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `href`) VALUES
(1, 'Sana''a', '#sanaa'),
(2, 'Taiz', '#taiz');

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
  PRIMARY KEY (`id`),
  FULLTEXT KEY `de` (`de`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `address`, `contact`, `de`, `href`) VALUES
(10, 'liu', 'hbkbcsubkj', 'bhsddb csdjbj', 'kjbvdkblksvk ss ksd n kjsdb  jsddsujvjb  sju sjb ubkvu vh h vhhvhvl blk vibk vh hvkvivhhv ibhvlk vkv h;k oubdsk voub jsdbusdnuduibcosovcnih ciojdugpoc[shdco ci ubnswo  obdbiusdjbihjbvvb fosbl oiuhbsoblkso foiosbl saoibbd;ob coi''dnvoihjjv;odv oisvoopjhvsobp[bosboidvoibklmsio vsoilsbo vsd;onb;kv ;ioa sdkj sikb iu kkjiusd uijssdkj ;dius uoibsw volbol ', '#liu'),
(11, 'ugklhfkuhyfkhd', 'fdchdnvf', 'NFDCN,FMH', 'KJHB JH FKJG KFKJF LJGFLJ LKJLKJ LKJ L H LH H KJ KJ KHV LJHVFJBKHGL JHF ', '#qau'),
(12, 'kju', 'htrdkhgckhgd', 'tfdcljhvcjgd', 'hfdxkhvlj lkj giu lkg l lk gfi ilyfiyf l i gi rfuy', '#kju');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Hisham Ali Alshami', 'ahishamali', 'ahishamali10@gmail.com', 'd555f42d94780233af72c13d956f02fa'),
(17, 'basheer adel', 'basheer009', 'basheer009@gmail.com', 'c3697dfb827d4dfe72fcfba374c2138a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
