-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2018-06-08 07:38:33
-- 伺服器版本: 5.7.19
-- PHP 版本： 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `group9_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `eid` int(20) NOT NULL AUTO_INCREMENT,
  `eacc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `epw` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ename` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ephone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `emngr` int(100) DEFAULT '0',
  `erid` int(11) DEFAULT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `employee`
--

INSERT INTO `employee` (`eid`, `eacc`, `epw`, `ename`, `ephone`, `emngr`, `erid`) VALUES
(26, 'mic', '123', '我4顧客', '0981390958', 0, NULL),
(25, 'ruru', '2202', 'yun-ru', '0983660998', 1, 105);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
