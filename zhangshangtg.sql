-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- 主机: localhost:/tmp/mysql-generic-5.5.40.sock
-- 生成日期: 2016-03-04 10:37:40
-- 服务器版本: 5.5.40-log
-- PHP 版本: 5.3.28p1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `weixinv2`
--

-- --------------------------------------------------------

--
-- 表的结构 `tbl_ad`
--

CREATE TABLE IF NOT EXISTS `tbl_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_title` varchar(255) DEFAULT NULL,
  `ad_link` varchar(255) DEFAULT NULL,
  `ad_img` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `addtime` varchar(255) DEFAULT NULL,
  `adtelnumber` varchar(20) DEFAULT NULL,
  `erweima` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=93 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `logintimes` int(5) NOT NULL DEFAULT '0',
  `logintime` datetime DEFAULT NULL,
  `lasttime` datetime DEFAULT NULL,
  `add_time` int(10) NOT NULL,
  `loginip` varchar(50) NOT NULL DEFAULT '',
  `jb` int(1) NOT NULL COMMENT '管理员级别',
  `xtgl` int(1) NOT NULL DEFAULT '0' COMMENT '系统管理',
  `dyxx` int(1) NOT NULL DEFAULT '0' COMMENT '单页信息',
  `lbxx` int(1) NOT NULL DEFAULT '0' COMMENT '类别信息',
  `xwgl` int(1) NOT NULL DEFAULT '0' COMMENT '类别信息',
  `sjgl` int(1) NOT NULL DEFAULT '0' COMMENT '商家管理',
  `hyqx` varchar(255) DEFAULT '0' COMMENT '行业权限',
  `hygl` int(10) NOT NULL DEFAULT '0' COMMENT '会员管理',
  `cjgl` int(1) NOT NULL DEFAULT '0' COMMENT '插件管理',
  `chao` int(1) NOT NULL DEFAULT '0' COMMENT '超级管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `logintimes`, `logintime`, `lasttime`, `add_time`, `loginip`, `jb`, `xtgl`, `dyxx`, `lbxx`, `xwgl`, `sjgl`, `hyqx`, `hygl`, `cjgl`, `chao`) VALUES
(16, 'admin', 'e241150329e0423ec62f619c89df756e', 899, '2016-03-04 08:32:28', '2016-03-04 08:27:32', 1338364688, '182.125.18.95', 1, 0, 0, 0, 0, 0, '0', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_info`
--

CREATE TABLE IF NOT EXISTS `tbl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'è®¿éšé¡¹ç›®ç¼–å·',
  `content` text COMMENT 'éšè®¿åˆ†æ•°',
  `adpic` varchar(255) DEFAULT NULL COMMENT 'äº¤æIP',
  `adlink` varchar(255) DEFAULT NULL COMMENT 'æäº¤æ—¶é—´',
  `userid` varchar(255) DEFAULT NULL COMMENT 'éšè®¿æ—¶é—´',
  `wcount` int(11) DEFAULT NULL COMMENT 'éšè®¿æ—¶é—´ä¸Šåˆ/ä¸‹åˆ',
  `acount` int(11) DEFAULT NULL,
  `addtime` varchar(100) DEFAULT NULL,
  `telnum` varchar(100) DEFAULT NULL,
  `ifweizhi` int(10) DEFAULT NULL,
  `gongzhonghao` text,
  `ifPublicNumber` int(10) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `ywyuedu` text,
  `infoid` varchar(200) DEFAULT '0',
  `daili` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=895 ;

-- --------------------------------------------------------

--
-- 表的结构 `tbl_jigou`
--

CREATE TABLE IF NOT EXISTS `tbl_jigou` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评估项目ID',
  `name` varchar(255) DEFAULT NULL COMMENT '估评项目',
  `paid` int(11) DEFAULT NULL COMMENT '评估分类',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `tbl_jigou`
--

INSERT INTO `tbl_jigou` (`id`, `name`, `paid`) VALUES
(1, '张', 0),
(2, '常', 0),
(3, '昆', 0),
(4, '太', 0),
(5, '吴', 0),
(6, '张1', 1),
(7, '张2', 1),
(8, '张3', 1),
(9, '张4', 1),
(10, '常1', 2),
(11, '常2', 2),
(12, '常3', 2),
(13, '昆1', 3),
(14, '昆2', 3),
(15, '昆3', 3),
(16, '昆4', 3),
(17, '昆5', 3),
(18, '太1', 4),
(19, '太2', 4),
(20, '太3', 4),
(21, '太4', 4),
(22, '太5', 4),
(23, '太6', 4),
(24, '吴1', 5),
(25, '吴2', 5),
(26, '吴3', 5);

-- --------------------------------------------------------

--
-- 表的结构 `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `sort` int(11) DEFAULT NULL COMMENT '序排',
  `img` varchar(255) DEFAULT NULL COMMENT '标题图片',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `tbl_type`
--

INSERT INTO `tbl_type` (`id`, `name`, `sort`, `img`) VALUES
(1, '客户管理', 1, 'images/bar1.png'),
(2, '访前准备', 2, 'images/bar2.png'),
(3, '产品知识', 3, 'images/bar3.png'),
(4, '销售技巧', 4, 'images/bar4.png'),
(5, '访后记录', 5, 'images/bar5.png'),
(6, '随访总结', 6, 'images/bar5.png');

-- --------------------------------------------------------

--
-- 表的结构 `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `userpwd` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `anums` int(11) DEFAULT NULL,
  `ctime` varchar(255) DEFAULT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `beizhu1` text,
  `beizhu2` text,
  `shuyu` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=357 ;

--
-- 转存表中的数据 `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `userpwd`, `qq`, `anums`, `ctime`, `userid`, `beizhu1`, `beizhu2`, `shuyu`) VALUES
(354, '体验用户', 'test', '', 99999, '2016-03-04 08:33:20', 'test', '2017-02-17', '', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
