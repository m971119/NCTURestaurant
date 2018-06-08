-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2018-06-08 07:39:03
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
-- 資料表結構 `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
CREATE TABLE IF NOT EXISTS `restaurant` (
  `rid` int(100) NOT NULL AUTO_INCREMENT,
  `rname` varchar(100) NOT NULL,
  `rlocate` int(100) NOT NULL,
  `rfloor` varchar(100) NOT NULL,
  `rveg` int(100) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM AUTO_INCREMENT=312 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `restaurant`
--

INSERT INTO `restaurant` (`rid`, `rname`, `rlocate`, `rfloor`, `rveg`) VALUES
(211, '素食部', 2, '2', 1),
(210, '和風風味屋', 2, '2', 0),
(209, '漢城烤肉飯', 2, '1', 0),
(208, '八方雲集', 2, '1', 0),
(207, 'Morning House 早餐店', 2, '1', 0),
(206, '姊妹飯桶', 2, '1', 0),
(205, '紅鼎香滷味燙', 2, '1', 0),
(204, '米克Q手作調飲', 2, '1', 1),
(203, '自助餐', 2, '1', 0),
(202, '中式早餐', 2, '1', 0),
(201, '7-11', 2, '1', 0),
(106, '萊爾富便利店', 1, '1', 0),
(105, '華記快餐', 1, '1', 0),
(104, '陳隆滷味', 1, '1', 0),
(103, '隆太郎名廚燒臘', 1, '1', 0),
(102, '好食佳餐房 ', 1, '1', 0),
(101, '非羹不可', 1, '1', 0),
(212, '水果部', 2, '2', 1),
(213, '快餐 麵食部', 2, '2', 0),
(214, '多多咖啡廳', 2, '2', 0),
(215, '教職員工自助餐', 2, '3', 0),
(301, '教職員工自助餐', 3, '1', 0),
(302, '美麗果水果廣場', 3, '1', 1),
(303, 'Myhome', 3, '1', 0),
(304, '元氣綜合蓋飯', 3, '1', 0),
(305, 'A華滷味', 3, '1', 0),
(306, '金鑽自助餐', 3, '1', 0),
(307, 'COMEBUY', 3, '1', 1),
(308, '極麵道', 3, '2', 0),
(309, '鼎天麵食館', 3, '1', 0),
(310, '全家', 3, '1', 0),
(311, '麥當勞', 3, '1', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
