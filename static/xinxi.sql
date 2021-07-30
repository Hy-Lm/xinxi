-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2021-07-30 07:46:26
-- 服务器版本： 10.4.13-MariaDB
-- PHP 版本： 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `xinxi`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '账号',
  `pass` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `pass`) VALUES
(1, 'huidait', 'huidait'),
(2, '140882200106230054', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '姓名',
  `sex` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '性别',
  `age` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '年龄',
  `codes` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证',
  `tel` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '联系电话',
  `HomeAddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '家庭住址',
  `newAddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '现居地',
  `fatherName` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '父亲姓名',
  `fatherTel` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '父亲电话',
  `motherName` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '母亲姓名',
  `motherTel` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '母亲电话',
  `schooling` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '学制',
  `enrollment` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '入学时间',
  `major` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '所学专业',
  `majorTeacher` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '专业老师',
  `referrer` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '推荐人',
  `remark` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '备注信息',
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '学员照片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `info`
--

INSERT INTO `info` (`id`, `name`, `sex`, `age`, `codes`, `tel`, `HomeAddress`, `newAddress`, `fatherName`, `fatherTel`, `motherName`, `motherTel`, `schooling`, `enrollment`, `major`, `majorTeacher`, `referrer`, `remark`, `img`) VALUES
(2, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(3, 'l刘12121', '男', '22', '22', '1234567891212', '河南12121', '河南12121', '1', '2', '1', '2', '2', '3', '34', '324', '34', '32424阿文i第四十八岁1212', '9831627609174.jpg'),
(7, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(8, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(9, 'l刘12121', '男', '22', '22', '1234567891212', '河南12121', '河南12121', '1', '2', '1', '2', '2', '3', '34', '324', '34', '32424阿文i第四十八岁1212', '9831627609174.jpg'),
(10, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(11, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(12, 'l刘12121', '男', '22', '22', '1234567891212', '河南12121', '河南12121', '1', '2', '1', '2', '2', '3', '34', '324', '34', '32424阿文i第四十八岁1212', '9831627609174.jpg'),
(13, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(14, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg'),
(15, 'l刘12121', '男', '22', '22', '1234567891212', '河南12121', '河南12121', '1', '2', '1', '2', '2', '3', '34', '324', '34', '32424阿文i第四十八岁1212', '9831627609174.jpg'),
(16, '叶飞', '男1', '201', '140882200106230054', '157356299461', '山西省运城市河津市僧楼镇郭庄村11', '山西省运城市河津市僧楼镇郭庄村11', '叶晓云1', '15735629946', '尉彩琴1', '1234567891', '10个月12', '2019-08-251', 'Web前端1', '李老师1', '忘了1', '没事1', '9191627621077.jpg');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
