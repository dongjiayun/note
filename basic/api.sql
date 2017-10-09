-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-02-04 10:32:43
-- 服务器版本： 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api`
--

-- --------------------------------------------------------

--
-- 表的结构 `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `population` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `city`
--

INSERT INTO `city` (`id`, `name`, `population`) VALUES
(1, 'Shanghai', 100000000),
(2, 'Beijing', 0);

-- --------------------------------------------------------

--
-- 表的结构 `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `auth` varchar(100) NOT NULL,
  `content` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `post`
--

INSERT INTO `post` (`id`, `title`, `auth`, `content`, `create_time`, `update_time`) VALUES
(7, '美要求韩国逮捕潘基文弟弟 潘基文重申不知情', '22', '美国一名检察官20日说，美国政府打算要求韩国逮捕联合国前秘书长潘基文的弟弟潘基祥。潘基祥及其子潘周贤先前被美国检方指控参与一起行贿案。\r\n\r\n潘基文同一天就亲戚卷入贪腐丑闻一事出面向公众道歉，重申自己“不知情”。\r\n\r\n【请求逮捕】\r\n\r\n美国助理检察官丹尼尔·诺布尔20日在纽约曼哈顿联邦法院的庭审过程中说，他们已经申请逮捕潘基祥。\r\n\r\n诺布尔说，美国当局计划引渡潘基祥，“眼下他还未被捕”。\r\n\r\n韩联社援引匿名消息人士的话报道，韩国法务部正就逮捕潘基祥的请求与美国政府展开对话，“但并非正式磋商”。\r\n\r\n一名法务部官员说，法务部正在核查相关法律，“正式商讨还没开始，双方正就此事交换意见”。\r\n\r\n韩国警方一名分管外事的官员说，警方尚未收到正式逮捕请求。\r\n\r\n路透社记者暂时无法联络上潘基祥。韩国建筑公司京南企业一名高管说，潘基祥2015年3月已离开这家公司，目前不知其下落。\r\n\r\n本月10日，曼哈顿的一家联邦法院对潘基祥和潘周贤提起诉讼，指控两人参与一起行贿案。潘基祥现年69岁，潘周贤现年38岁，后者的身份是曼哈顿房地产经纪人，生活在新泽西州。\r\n\r\n美方起诉书说，京南企业在越南首都河内建有一座72层高的“京南地标大厦”，建筑成本超过10亿美元(约合68.7亿元人民币)。这家公司陷入清偿危机后，身为公司高管的潘基祥安排公司雇用潘周贤为经纪人，希望以高于8亿美元(约合55亿元人民币)的价格出售“京南地标大厦”。\r\n\r\n2013年3月，在寻找卖家过程中，潘周贤结识了自称与“中东某国王室有关系”的美国人马尔科姆·哈里斯。2014年4月，潘基祥和潘周贤同意向哈里斯支付50万美元(约合343.6万元人民币)“预付款”，让他帮忙“走关系”找买家，并承诺事成后再支付200万美元(约合1374.6万元人民币)。没想到，哈里斯是个“大忽悠”，根本没有所谓的关系。没兑现承诺不说，他还将50万美元挥霍一空。\r\n\r\n现阶段，潘周贤和哈里斯均已被捕并宣称无罪。\r\n\r\n【“毫不知情”】\r\n\r\n潘基文20日就亲戚卷入行贿案引发公众关切表示道歉。\r\n\r\n潘基文在一份声明中说，希望韩国和美国执法机关能够在调查过程中“严谨并透明”，从而让韩国民众消除疑虑。\r\n\r\n他重申自己对于弟弟和侄子涉嫌行贿“毫不知情”。\r\n\r\n路透社认为，潘基祥和潘周贤涉嫌行贿将给潘基文回国参选总统的前景制造更多麻烦。\r\n\r\n韩国政局因“亲信干政”事件动荡不安，总统选举将提前举行。现年72岁的潘基文12日回到韩国，但对是否参加下届韩国大选尚未正式表态。\r\n\r\n总部设在韩国首尔的民调机构“盖洛普韩国”最近一份民调结果显示，最大在野党共同民主党前党首文在寅以31%的支持率位居首位，潘基文以20%的支持率排名第二，共同民主党籍城南市市长李在明以12%的支持率位列第三。(郑思远 新华社专特稿)', 1485228117, 1485228960),
(14, '1', '23', '12', 1485241861, 1485323787),
(15, '1', '23', '1', 1485246155, 1485246155),
(16, '1', '23', '1', 1485322756, 1485322756),
(17, '1', '23', '1', 1485322765, 1485322765),
(18, '123213', '20', '21321', 1486091357, 1486091357),
(19, '3213123213213', '20', '321321321', 1486091365, 1486191354);

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(4, 'xiaopang'),
(5, 'jaffar'),
(6, 'tommy');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) NOT NULL,
  `authKey` varchar(50) NOT NULL,
  `accessToken` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `accessToken`, `email`) VALUES
(19, '213213321', '123456', 'HZ7uuUfHGXZggFoqfPVHgtv1h61fxOGG', '', '12345678911@12345.com2321223213131'),
(20, 'tom', '123456', 'VWgKEU7Vbo_2KYdDfBixz0108wmNtcrk', '', '123@123.com'),
(21, '123', '123456', 'Rbgts5JP7DAs4WeWLAFL9bUr9GL3PhMX', '', '1009008432@qq.com'),
(22, '123123123', '123456', 'vnqaWdjmlRvU6q_lbwDZp4rnXprWnXMs', '', '12311@1111.com'),
(23, '董嘉昀', '123456', '8TceybZhrcDSkFJi39LUNk6sXq28RZas', '', '13818769969@163.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
