-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2024-10-17 15:39:29
-- 服务器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `lab6`
--
CREATE DATABASE lab6
-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE `books` (
  `ISBN` int(11) NOT NULL,
  `b_title` varchar(128) NOT NULL,
  `author` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `return` int(11) NOT NULL,
  `borrow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `course`
--

CREATE TABLE `course` (
  `c_name` varchar(128) NOT NULL,
  `credits` int(11) NOT NULL,
  `domain` varchar(64) NOT NULL,
  `c_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `enroll`
--

CREATE TABLE `enroll` (
  `id` int(11) NOT NULL,
  `c_name` varchar(128) NOT NULL,
  `s_number` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `i_name` varchar(64) NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `program` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `offer`
--

CREATE TABLE `offer` (
  `p_code` int(11) NOT NULL,
  `c_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `programs`
--

CREATE TABLE `programs` (
  `p_code` int(11) NOT NULL,
  `p_name` varchar(128) NOT NULL,
  `division` varchar(64) DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `section`
--

CREATE TABLE `section` (
  `c_name` varchar(128) NOT NULL,
  `s_number` int(11) NOT NULL,
  `sem` int(11) NOT NULL,
  `venue` varchar(128) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 表的结构 `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `s_name` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `gpa` int(11) DEFAULT NULL,
  `major` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`ISBN`);

--
-- 表的索引 `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- 表的索引 `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`,`phone`);

--
-- 表的索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_name`);

--
-- 表的索引 `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`,`c_name`,`s_number`,`sem`),
  ADD KEY `c_name` (`c_name`);

--
-- 表的索引 `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`p_code`,`c_name`),
  ADD KEY `c_name` (`c_name`);

--
-- 表的索引 `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`p_code`);

--
-- 表的索引 `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`c_name`,`s_number`,`sem`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- 表的索引 `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- 限制导出的表
--

--
-- 限制表 `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`),
  ADD CONSTRAINT `borrow_ibfk_3` FOREIGN KEY (`ISBN`) REFERENCES `books` (`ISBN`);

--
-- 限制表 `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `contact_ibfk_2` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `contact_ibfk_3` FOREIGN KEY (`id`) REFERENCES `instructors` (`id`);

--
-- 限制表 `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `enroll_ibfk_3` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `enroll_ibfk_4` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `enroll_ibfk_5` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `enroll_ibfk_6` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `enroll_ibfk_7` FOREIGN KEY (`id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `enroll_ibfk_8` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`);

--
-- 限制表 `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`p_code`) REFERENCES `programs` (`p_code`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `offer_ibfk_3` FOREIGN KEY (`p_code`) REFERENCES `programs` (`p_code`),
  ADD CONSTRAINT `offer_ibfk_4` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `offer_ibfk_5` FOREIGN KEY (`p_code`) REFERENCES `programs` (`p_code`),
  ADD CONSTRAINT `offer_ibfk_6` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`);

--
-- 限制表 `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `section_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`),
  ADD CONSTRAINT `section_ibfk_3` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `section_ibfk_4` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`),
  ADD CONSTRAINT `section_ibfk_5` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `section_ibfk_6` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`),
  ADD CONSTRAINT `section_ibfk_7` FOREIGN KEY (`c_name`) REFERENCES `course` (`c_name`),
  ADD CONSTRAINT `section_ibfk_8` FOREIGN KEY (`instructor_id`) REFERENCES `instructors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
