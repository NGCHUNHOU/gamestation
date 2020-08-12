-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2020-04-16 08:26:32
-- 服务器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `gamestation`
--

-- --------------------------------------------------------

--
-- 表的结构 `metainfo`
--

CREATE TABLE `metainfo` (
  `meta_id` int(5) NOT NULL,
  `metaname` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `metainfo`
--

INSERT INTO `metainfo` (`meta_id`, `metaname`) VALUES
(1, 'description'),
(2, 'keywords'),
(3, 'author');

-- --------------------------------------------------------

--
-- 表的结构 `siteinfo`
--

CREATE TABLE `siteinfo` (
  `page_id` int(11) NOT NULL,
  `title_id` int(5) NOT NULL,
  `meta_id` int(5) NOT NULL,
  `metacontent` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `siteinfo`
--

INSERT INTO `siteinfo` (`page_id`, `title_id`, `meta_id`, `metacontent`) VALUES
(1, 1, 1, 'GameStation is a social networking service for gaming discussion and news. Share your game experience to your friend. We provide the latest news and complete game information for the majority of players'),
(2, 2, 1, 'error description content'),
(3, 3, 1, 'help description content'),
(4, 1, 2, 'game, gaming forum, GameStation, game information, player, social networking service'),
(5, 2, 2, 'error keywords'),
(6, 3, 2, 'help keywords'),
(7, 1, 3, 'HOU'),
(8, 4, 1, 'GameStation is a social networking service for gaming discussion and news. Share your game experience to your friend. We provide the latest news and complete game information for the majority of players');

-- --------------------------------------------------------

--
-- 表的结构 `titleinfo`
--

CREATE TABLE `titleinfo` (
  `title_id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `css_path` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `titleinfo`
--

INSERT INTO `titleinfo` (`title_id`, `name`, `css_path`) VALUES
(1, 'home', '/view/assets/css/custom.css'),
(2, 'error', '/view/assets/css/error.css'),
(3, 'help', ''),
(4, 'about-us', '');

--
-- 转储表的索引
--

--
-- 表的索引 `metainfo`
--
ALTER TABLE `metainfo`
  ADD PRIMARY KEY (`meta_id`);

--
-- 表的索引 `siteinfo`
--
ALTER TABLE `siteinfo`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `meta_id` (`meta_id`),
  ADD KEY `title_id` (`title_id`);

--
-- 表的索引 `titleinfo`
--
ALTER TABLE `titleinfo`
  ADD PRIMARY KEY (`title_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `metainfo`
--
ALTER TABLE `metainfo`
  MODIFY `meta_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `siteinfo`
--
ALTER TABLE `siteinfo`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `titleinfo`
--
ALTER TABLE `titleinfo`
  MODIFY `title_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 限制导出的表
--

--
-- 限制表 `siteinfo`
--
ALTER TABLE `siteinfo`
  ADD CONSTRAINT `fk_meta_id` FOREIGN KEY (`meta_id`) REFERENCES `metainfo` (`meta_id`),
  ADD CONSTRAINT `fk_title_id` FOREIGN KEY (`title_id`) REFERENCES `titleinfo` (`title_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
