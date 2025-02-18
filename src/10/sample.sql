-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-09-23 21:28
-- 서버 버전: 10.1.35-MariaDB
-- PHP 버전: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `sample`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `friend`
--

CREATE TABLE `friend` (
  `num` int(11) NOT NULL,
  `name` char(20) NOT NULL,
  `tel` char(20) NOT NULL,
  `address` char(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `num` int(11) NOT NULL,
  `id` char(20) NOT NULL,
  `name` char(20) NOT NULL,
  `gender` char(1) DEFAULT NULL,
  `post_num` char(8) DEFAULT NULL,
  `address` char(80) DEFAULT NULL,
  `tel` char(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`num`, `id`, `name`, `gender`, `post_num`, `address`, `tel`, `age`) VALUES
(1, 'yjhwang', '황영주', 'M', '100-011', '서울시 중구 충무로1가', '234-8879', 35),
(2, 'khshul', '설기형', 'M', '607-010', '부산시 동래구 명륜동', '764-3784', 33),
(3, 'chpark', '박철호', 'M', '503-200', '광주시 남구 지석동', '298-9730', 34),
(4, 'shlee', '이상훈', 'M', '503-201', '광주시 남구 도금동', '838-4347', 32),
(5, 'jyjang', '장영숙', 'W', '606-065', '부산시 영도구 봉래동5가', '399-9809', 24),
(6, 'yjbae', '배용진', 'M', '122-014', '서울시 은평구 응암4동', '857-5683', 30),
(7, 'hbpark', '박혜빈', 'W', '427-760', '경기도 과천시 중앙동', '234-7677', 22),
(8, 'mskim', '김문수', 'M', '429-020', '경기도 시흥시 신천동', '370-6003', 63),
(9, 'bkcha', '차범길', 'M', '302-121', '대전시 서구 둔산1동', '432-9877', 49),
(10, 'kskim', '김길수', 'M', '440-747', '경기도 수원시 장안구 파장동', '324-5875', 54),
(11, 'srkim', '김수련', 'M', '704-701', '대구시 달서구 신당동', '987-3688', 23),
(12, 'shlee', '이성현', 'M', '441-081', '경기도 수원시 권선구 매산로1가', '243-6844', 36),
(13, 'hnjang', '정한나', 'W', '502-763', '광주시 서구 화정4동', '845-4547', 58),
(14, 'mylee', '이명연', 'W', '502-791', '광주시 서구 쌍촌동', '837-9432', 33),
(15, 'yskim', '김영숙', 'W', '429-010', '경기도 시흥시 대야동', '374-8438', 53),
(16, 'jekim', '김정은', 'W', '503-202', '광주시 남구 원산동', '347-8873', 29),
(17, 'yjko', '고영주', 'W', '122-020', '서울시 은평구 녹번동', '479-3874', 32),
(18, 'cyahn', '안철영', 'M', '122-030', '서울시 은평구 대조동', '347-4687', 34),
(19, 'jmkim', '김진모', 'M', '530-140', '전라남도 목포시 항동', '379-8349', 28),
(20, 'ycshul', '설영찬', 'M', '606-070', '부산시 영도구 청학동', '983-8748', 41),
(21, 'jjko', '고재진', 'M', '100-013', '서울시 중구 충무로3가', '836-4655', 28),
(22, 'hwlee', '이현우', 'M', '606-071', '부산시 영도구 청학1동', '346-8892', 32),
(23, 'cskang', '강찬숙', 'W', '668-890', '경상남도 남해군 설천면', '377-6879', 21),
(24, 'ypji', '지영필', 'M', '122-040', '서울시 은평구 불광동', '366-3747', 52),
(25, 'jbkim', '김진배', 'M', '427-600', '경기도 과천시 과천동', '382-4993', 47),
(26, 'jepark', '박지은', 'W', '670-800', '경상남도 거창군 거창읍', '328-8743', 26),
(27, 'jhlee', '이지현', 'W', '704-702', '대구시 달서구 월성동', '386-7988', 27),
(28, 'bykang', '강부영', 'M', '302-120', '대전시 서구 둔산동', '798-3243', 62),
(29, 'jymoon', '문진영', 'W', '302-122', '대전시 서구 둔산2동', '987-3248', 18),
(30, 'jyjun', '전지연', 'W', '100-012', '서울시 중구 충무로2가', '347-2236', 28),
(31, 'jkko', '고진길', 'M', '122-013', '서울시 은평구 응암3동', '234-7466', 27),
(32, 'myjung', '정명윤', 'M', '502-771', '광주시 서구 치평동', '374-8786', 47),
(33, 'jsyou', '유지수', 'W', '502-772', '광주시 서구 치평동', '309-3897', 49),
(34, 'dsshin', '신달성', 'W', '530-145', '전라남도 신안군 장산면', '399-8789', 53),
(35, 'sjshin', '신수진', 'W', '606-796', '부산시 영도구 봉래동5가', '389-8930', 47);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`num`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`num`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `friend`
--
ALTER TABLE `friend`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
