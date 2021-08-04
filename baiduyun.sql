-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2021-08-04 15:21:32
-- 服务器版本： 5.6.48-log
-- PHP 版本： 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `baiduyun`
--

-- --------------------------------------------------------

--
-- 表的结构 `bdwp`
--

CREATE TABLE `bdwp` (
  `id` int(11) NOT NULL,
  `userip` text NOT NULL COMMENT '用户ip',
  `filename` text NOT NULL COMMENT '文件名',
  `size` text NOT NULL COMMENT '文件大小',
  `md5` text NOT NULL COMMENT '文件效验码',
  `path` text NOT NULL COMMENT '文件路径',
  `server_ctime` text NOT NULL COMMENT '文件创建时间',
  `realLink` text NOT NULL COMMENT '文件下载地址',
  `ptime` datetime NOT NULL COMMENT '解析时间',
  `paccount` int(11) NOT NULL COMMENT '解析账号id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `bdwp_ip`
--

CREATE TABLE `bdwp_ip` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL COMMENT 'ip地址',
  `remark` text NOT NULL COMMENT '备注',
  `add_time` datetime NOT NULL COMMENT '白黑名单添加时间',
  `type` tinyint(4) NOT NULL COMMENT '状态(0:允许,-1:禁止)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bdwp_svip`
--

CREATE TABLE `bdwp_svip` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL COMMENT '账号名称',
  `svip_bduss` text NOT NULL COMMENT '会员bduss',
  `svip_stoken` text NOT NULL COMMENT '会员stoken',
  `add_time` datetime NOT NULL COMMENT '会员账号加入时间',
  `state` tinyint(4) NOT NULL COMMENT '会员状态(0:正常,-1:限速)',
  `is_using` datetime NOT NULL COMMENT '是否正在使用(非零表示真)'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转储表的索引
--

--
-- 表的索引 `bdwp`
--
ALTER TABLE `bdwp`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `bdwp_ip`
--
ALTER TABLE `bdwp_ip`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `bdwp_svip`
--
ALTER TABLE `bdwp_svip`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bdwp`
--
ALTER TABLE `bdwp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `bdwp_ip`
--
ALTER TABLE `bdwp_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `bdwp_svip`
--
ALTER TABLE `bdwp_svip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
