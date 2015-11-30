-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2015 at 09:29 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.23

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `akatsolc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `BEACONS`
--

DROP TABLE IF EXISTS `BEACONS`;
CREATE TABLE IF NOT EXISTS `BEACONS` (
  `beacon_id` int(11) NOT NULL,
  `static_time` bigint(20) NOT NULL,
  PRIMARY KEY (`beacon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BEACONS`
--

INSERT INTO `BEACONS` (`beacon_id`, `static_time`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `BUSSTOPS`
--

DROP TABLE IF EXISTS `BUSSTOPS`;
CREATE TABLE IF NOT EXISTS `BUSSTOPS` (
  `stop_id` int(11) NOT NULL,
  `stop_name` varchar(100) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  PRIMARY KEY (`stop_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `BUSSTOPS`
--

INSERT INTO `BUSSTOPS` (`stop_id`, `stop_name`, `lat`, `lng`) VALUES
(1, 'Plenty Road', -37.717315, 145.044521),
(2, 'Thomas Cherry', -37.720829, 145.04642),
(3, 'Union', -37.723318, 145.048517),
(4, 'Barnes Way', -37.72539, 145.0507),
(5, 'AgriBio', -37.724395, 145.054122),
(6, 'Terraces', -37.722429, 145.05765),
(7, 'Uni Lodge', -37.721569, 145.061371),
(8, 'Gresswell', -37.714967, 145.061428),
(9, 'Graduate House', -37.714665, 145.050137),
(10, 'Polaris', -37.712437, 145.048269);

-- --------------------------------------------------------

--
-- Table structure for table `DISTANCES`
--

DROP TABLE IF EXISTS `DISTANCES`;
CREATE TABLE IF NOT EXISTS `DISTANCES` (
  `start_id` int(11) NOT NULL,
  `end_id` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  PRIMARY KEY (`start_id`,`end_id`),
  KEY `end_id` (`end_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `DRIVERS`
--

DROP TABLE IF EXISTS `DRIVERS`;
CREATE TABLE IF NOT EXISTS `DRIVERS` (
  `driver_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nickname` varchar(30) NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `DRIVERS`
--

INSERT INTO `DRIVERS` (`driver_id`, `username`, `password`, `nickname`) VALUES
(1, 'johndriver', 'davidjohn', 'Driver John');

-- --------------------------------------------------------

--
-- Table structure for table `STATIC_TIME`
--

DROP TABLE IF EXISTS `STATIC_TIME`;
CREATE TABLE IF NOT EXISTS `STATIC_TIME` (
  `stop_id` int(11) NOT NULL,
  `static_time` bigint(20) NOT NULL,
  PRIMARY KEY (`stop_id`,`static_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STATIC_TIME`
--

INSERT INTO `STATIC_TIME` (`stop_id`, `static_time`) VALUES
(1, 30600),
(1, 31800),
(1, 33000),
(1, 34200),
(1, 35400),
(1, 36600),
(1, 37800),
(1, 39000),
(1, 40200),
(1, 41400),
(1, 42600),
(1, 43800),
(1, 45000),
(1, 46200),
(1, 47400),
(1, 48600),
(1, 49800),
(1, 51000),
(1, 52200),
(1, 53400),
(1, 54600),
(1, 55800),
(1, 57000),
(1, 58200),
(1, 59400),
(1, 60600),
(1, 61800),
(1, 63000),
(1, 64200),
(1, 65400),
(1, 66600),
(1, 67800),
(1, 69000),
(1, 70200),
(1, 71400),
(1, 72600),
(1, 73800),
(1, 75000),
(1, 76200),
(2, 30720),
(2, 31920),
(2, 33120),
(2, 34320),
(2, 35520),
(2, 36720),
(2, 37920),
(2, 39120),
(2, 40320),
(2, 41520),
(2, 42720),
(2, 43920),
(2, 45120),
(2, 46320),
(2, 47520),
(2, 48720),
(2, 49920),
(2, 51120),
(2, 52320),
(2, 53520),
(2, 54720),
(2, 55920),
(2, 57120),
(2, 58320),
(2, 59520),
(2, 60720),
(2, 61920),
(2, 63120),
(2, 64320),
(2, 65520),
(2, 66720),
(2, 67920),
(2, 69120),
(2, 70320),
(2, 71520),
(2, 72720),
(2, 73920),
(2, 75120),
(2, 76320),
(3, 30780),
(3, 31980),
(3, 33180),
(3, 34380),
(3, 35580),
(3, 36780),
(3, 37980),
(3, 39180),
(3, 40380),
(3, 41580),
(3, 42780),
(3, 43980),
(3, 45180),
(3, 46380),
(3, 47580),
(3, 48780),
(3, 49980),
(3, 51180),
(3, 52380),
(3, 53580),
(3, 54780),
(3, 55980),
(3, 57180),
(3, 58380),
(3, 59580),
(3, 60780),
(3, 61980),
(3, 63180),
(3, 64380),
(3, 65580),
(3, 66780),
(3, 67980),
(3, 69180),
(3, 70380),
(3, 71580),
(3, 72780),
(3, 73980),
(3, 75180),
(3, 76380),
(4, 30840),
(4, 32040),
(4, 33240),
(4, 34440),
(4, 35640),
(4, 36840),
(4, 38040),
(4, 39240),
(4, 40440),
(4, 41640),
(4, 42840),
(4, 44040),
(4, 45240),
(4, 46440),
(4, 47640),
(4, 48840),
(4, 50040),
(4, 51240),
(4, 52440),
(4, 53640),
(4, 54840),
(4, 56040),
(4, 57240),
(4, 58440),
(4, 59640),
(4, 60840),
(4, 62040),
(4, 63240),
(4, 64440),
(4, 65640),
(4, 66840),
(4, 68040),
(4, 69240),
(4, 70440),
(4, 71640),
(4, 72840),
(4, 74040),
(4, 75240),
(4, 76440),
(5, 30960),
(5, 32160),
(5, 33360),
(5, 34560),
(5, 35760),
(5, 36960),
(5, 38160),
(5, 39360),
(5, 40560),
(5, 41760),
(5, 42960),
(5, 44160),
(5, 45360),
(5, 46560),
(5, 47760),
(5, 48960),
(5, 50160),
(5, 51360),
(5, 52560),
(5, 53760),
(5, 54960),
(5, 56160),
(5, 57360),
(5, 58560),
(5, 59760),
(5, 60960),
(5, 62160),
(5, 63360),
(5, 64560),
(5, 65760),
(5, 66960),
(5, 68160),
(5, 69360),
(5, 70560),
(5, 71760),
(5, 72960),
(5, 74160),
(5, 75360),
(5, 76560),
(6, 31080),
(6, 32280),
(6, 33480),
(6, 34680),
(6, 35880),
(6, 37080),
(6, 38280),
(6, 39480),
(6, 40680),
(6, 41880),
(6, 43080),
(6, 44280),
(6, 45480),
(6, 46680),
(6, 47880),
(6, 49080),
(6, 50280),
(6, 51480),
(6, 52680),
(6, 53880),
(6, 55080),
(6, 56280),
(6, 57480),
(6, 58680),
(6, 59880),
(6, 61080),
(6, 62280),
(6, 63480),
(6, 64680),
(6, 65880),
(6, 67080),
(6, 68280),
(6, 69480),
(6, 70680),
(6, 71880),
(6, 73080),
(6, 74280),
(6, 75480),
(6, 76680),
(7, 31140),
(7, 32340),
(7, 33540),
(7, 34740),
(7, 35940),
(7, 37140),
(7, 38340),
(7, 39540),
(7, 40740),
(7, 41940),
(7, 43140),
(7, 44340),
(7, 45540),
(7, 46740),
(7, 47940),
(7, 49140),
(7, 50340),
(7, 51540),
(7, 52740),
(7, 53940),
(7, 55140),
(7, 56340),
(7, 57540),
(7, 58740),
(7, 59940),
(7, 61140),
(7, 62340),
(7, 63540),
(7, 64740),
(7, 65940),
(7, 67140),
(7, 68340),
(7, 69540),
(7, 70740),
(7, 71940),
(7, 73140),
(7, 74340),
(7, 75540),
(7, 76740),
(8, 31260),
(8, 32460),
(8, 33660),
(8, 34860),
(8, 36060),
(8, 37260),
(8, 38460),
(8, 39660),
(8, 40860),
(8, 42060),
(8, 43260),
(8, 44460),
(8, 45660),
(8, 46860),
(8, 48060),
(8, 49260),
(8, 50460),
(8, 51660),
(8, 52860),
(8, 54060),
(8, 55260),
(8, 56460),
(8, 57660),
(8, 58860),
(8, 60060),
(8, 61260),
(8, 62460),
(8, 63660),
(8, 64860),
(8, 66060),
(8, 67260),
(8, 68460),
(8, 69660),
(8, 70860),
(8, 72060),
(8, 73260),
(8, 74460),
(8, 75660),
(8, 76860),
(9, 31380),
(9, 32580),
(9, 33780),
(9, 34980),
(9, 36180),
(9, 37380),
(9, 38580),
(9, 39780),
(9, 40980),
(9, 42180),
(9, 43380),
(9, 44580),
(9, 45780),
(9, 46980),
(9, 48180),
(9, 49380),
(9, 50580),
(9, 51780),
(9, 52980),
(9, 54180),
(9, 55380),
(9, 56580),
(9, 57780),
(9, 58980),
(9, 60180),
(9, 61380),
(9, 62580),
(9, 63780),
(9, 64980),
(9, 66180),
(9, 67380),
(9, 68580),
(9, 69780),
(9, 70980),
(9, 72180),
(9, 73380),
(9, 74580),
(9, 75780),
(9, 76980),
(10, 31440),
(10, 32640),
(10, 33840),
(10, 35040),
(10, 36240),
(10, 37440),
(10, 38640),
(10, 39840),
(10, 41040),
(10, 42240),
(10, 43440),
(10, 44640),
(10, 45840),
(10, 47040),
(10, 48240),
(10, 49440),
(10, 50640),
(10, 51840),
(10, 53040),
(10, 54240),
(10, 55440),
(10, 56640),
(10, 57840),
(10, 59040),
(10, 60240),
(10, 61440),
(10, 62640),
(10, 63840),
(10, 65040),
(10, 66240),
(10, 67440),
(10, 68640),
(10, 69840),
(10, 71040),
(10, 72240),
(10, 73440),
(10, 74640),
(10, 75840),
(10, 77040),
(11, 31680),
(11, 32880),
(11, 34080),
(11, 35280),
(11, 36480),
(11, 37680),
(11, 38880),
(11, 40080),
(11, 41280),
(11, 42480),
(11, 43680),
(11, 44880),
(11, 46080),
(11, 47280),
(11, 48480),
(11, 49680),
(11, 50880),
(11, 52080),
(11, 53280),
(11, 54480),
(11, 55680),
(11, 56880),
(11, 58080),
(11, 59280),
(11, 60480),
(11, 61680),
(11, 62880),
(11, 64080),
(11, 65280),
(11, 66480),
(11, 67680),
(11, 68880),
(11, 70080),
(11, 71280),
(11, 72480),
(11, 73680),
(11, 74880),
(11, 76080),
(11, 77280);

-- --------------------------------------------------------

--
-- Table structure for table `STATIC_TIMES`
--

DROP TABLE IF EXISTS `STATIC_TIMES`;
CREATE TABLE IF NOT EXISTS `STATIC_TIMES` (
  `stop_id` int(11) NOT NULL,
  `static_time` bigint(20) NOT NULL,
  PRIMARY KEY (`stop_id`,`static_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `STATIC_TIMES`
--

INSERT INTO `STATIC_TIMES` (`stop_id`, `static_time`) VALUES
(1, 30600),
(2, 30720),
(3, 30780),
(4, 30840),
(5, 30960),
(6, 31080),
(7, 31140),
(8, 31260),
(9, 31380),
(10, 31440);

-- --------------------------------------------------------

--
-- Table structure for table `TIMES`
--

DROP TABLE IF EXISTS `TIMES`;
CREATE TABLE IF NOT EXISTS `TIMES` (
  `start_id` int(11) NOT NULL,
  `end_id` int(11) NOT NULL,
  `travel_time` bigint(20) NOT NULL,
  PRIMARY KEY (`start_id`,`end_id`),
  KEY `end_id` (`end_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;