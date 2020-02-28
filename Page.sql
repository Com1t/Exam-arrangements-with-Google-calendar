-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2019 年 01 月 17 日 21:25
-- 伺服器版本: 10.1.37-MariaDB-0+deb9u1
-- PHP 版本： 7.3.0-2+0~20181217092659.24+stretch~1.gbp54e52f

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `Page`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Page`
--

CREATE TABLE `Page` (
  `pkey` int(10) NOT NULL,
  `contact_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `contact_email` varchar(30) COLLATE utf8_bin NOT NULL,
  `contact_text` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 資料表的匯出資料 `Page`
--

INSERT INTO `Page` (`pkey`, `contact_name`, `contact_email`, `contact_text`) VALUES
(1, '富強', 'fuchiang137@gmail.com', '123'),
(2, 'John', 'fuchiang137@gmail.com', '123456');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `Page`
--
ALTER TABLE `Page`
  ADD PRIMARY KEY (`pkey`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `Page`
--
ALTER TABLE `Page`
  MODIFY `pkey` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
