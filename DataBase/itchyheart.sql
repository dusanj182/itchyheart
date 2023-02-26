-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 09:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itchyheart`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(100) NOT NULL,
  `id_user` int(3) NOT NULL,
  `ftitle` varchar(255) DEFAULT NULL COMMENT 'Name of the file that is being sent',
  `pdate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Date of posting the post',
  `ptitle` varchar(255) NOT NULL COMMENT 'Header of the post',
  `ptext` varchar(255) NOT NULL COMMENT 'Text of the post'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `id_user`, `ftitle`, `pdate`, `ptitle`, `ptext`) VALUES
(27, 21, 'post_img/2163cbc6ebb8bed.jpg', '2023-01-21 12:05:15', 'Hello Everyone', 'This is the first post on this app'),
(28, 19, NULL, '2023-01-21 12:05:55', 'Ahoj', 'Hi Mandy, how are you? :)'),
(29, 21, NULL, '2023-01-21 12:07:25', 'Pretty Awesome', 'Have you realized that none of us exists here actually?? We are just a bunch of random profiles Dusan made.'),
(30, 14, 'post_img/1463cbc79c35cb5.jpg', '2023-01-21 12:08:12', 'That\'s True', 'I am the only real person here, so yeah....'),
(31, 15, NULL, '2023-01-21 12:13:58', 'Hello', 'Finally, it\'s snowing!!'),
(32, 25, NULL, '2023-01-21 12:15:12', 'I don\'t like the snow', 'It\'s freezin\' cold man. '),
(33, 14, NULL, '2023-01-29 18:59:31', 'Hello', '123');

-- --------------------------------------------------------

--
-- Table structure for table `relationships`
--

CREATE TABLE `relationships` (
  `id_relation` int(5) NOT NULL,
  `id_user1` int(3) NOT NULL COMMENT 'Id of the user who initiates relationship ',
  `id_user2` int(3) NOT NULL COMMENT 'Id of the user who gets invitation for relationship',
  `rdate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Date of creating relationship (Changed by status)',
  `status` int(3) NOT NULL DEFAULT 0 COMMENT 'Status of the relationship:\r\n0 - New\r\n1 - Active\r\n2 - Rejected'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationships`
--

INSERT INTO `relationships` (`id_relation`, `id_user1`, `id_user2`, `rdate`, `status`) VALUES
(65, 15, 14, '2023-01-12 13:20:06', 1),
(66, 15, 16, '2023-01-12 13:20:13', 3),
(67, 15, 19, '2023-01-12 13:20:25', 3),
(68, 14, 15, '2023-01-12 13:20:56', 1),
(69, 14, 19, '2023-01-12 13:24:00', 3),
(70, 19, 15, '2023-01-12 13:55:15', 3),
(71, 13, 19, '2023-01-12 13:57:06', 4),
(72, 19, 13, '2023-01-12 14:11:59', 4),
(73, 19, 23, '2023-01-17 11:30:29', 4),
(74, 23, 18, '2023-01-17 11:35:34', 3),
(75, 23, 19, '2023-01-18 10:49:57', 4),
(76, 14, 21, '2023-01-21 12:10:48', 4),
(77, 21, 14, '2023-01-21 12:12:22', 3),
(78, 25, 21, '2023-01-22 10:40:40', 4),
(79, 23, 21, '2023-01-22 10:42:32', 0),
(80, 21, 16, '2023-01-29 19:02:50', 4),
(81, 21, 26, '2023-01-29 19:04:32', 1),
(82, 26, 21, '2023-01-29 19:04:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rposts`
--

CREATE TABLE `rposts` (
  `id_rpost` int(5) NOT NULL,
  `id_sender` int(3) NOT NULL COMMENT 'ID OF THE SENDER',
  `id_recipient` int(3) NOT NULL COMMENT 'ID OF THE RECIPIENT',
  `rptext` varchar(255) NOT NULL DEFAULT 'I miss you' COMMENT 'RELATIONSHIP POST TEXT',
  `emoji` varchar(150) NOT NULL DEFAULT '&#128151;',
  `rpdate` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'RELATIONSHIP POST DATE',
  `path` varchar(255) DEFAULT NULL COMMENT 'Path of the image file',
  `unavailable` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rposts`
--

INSERT INTO `rposts` (`id_rpost`, `id_sender`, `id_recipient`, `rptext`, `emoji`, `rpdate`, `path`, `unavailable`) VALUES
(6, 14, 15, 'I miss you', '🐻', '2023-01-03 13:25:09', 'chat_img/1463b41ea51f8ec.jpg', 1),
(7, 14, 15, 'I miss you', '🐼', '2023-01-03 14:01:49', 'chat_img/1463b4273d9f8fb.jpg', 1),
(8, 14, 15, 'I miss you', '💗', '2023-01-03 14:04:52', NULL, 1),
(9, 14, 15, 'I miss you', '💛', '2023-01-03 14:05:07', NULL, 1),
(10, 14, 15, 'I miss you', '🍣', '2023-01-03 14:05:20', 'chat_img/1463b42810affe3.jpg', 1),
(11, 15, 14, 'I miss you', '🌞', '2023-01-03 14:05:38', NULL, 1),
(33, 14, 15, 'I miss you', '💗', '2023-01-04 11:59:15', NULL, 1),
(34, 14, 15, 'I miss you', '💗', '2023-01-04 12:03:38', NULL, 1),
(35, 14, 15, 'I miss you', '🍩', '2023-01-04 12:03:42', NULL, 1),
(36, 14, 15, 'I miss you', '🐻', '2023-01-04 12:05:15', NULL, 1),
(112, 14, 15, 'I miss you', '💗', '2023-01-08 11:26:46', NULL, 1),
(113, 14, 15, 'I miss you', '🌙', '2023-01-08 11:27:01', NULL, 1),
(114, 14, 15, 'I miss you', '💗', '2023-01-08 11:28:36', NULL, 1),
(115, 14, 15, 'I miss you', '💟', '2023-01-08 11:28:45', NULL, 1),
(116, 14, 15, 'I miss you', '💗', '2023-01-08 11:29:14', 'chat_img/1463ba9afa58fa6.jpg', 1),
(117, 15, 14, 'I miss you', '🍣', '2023-01-08 11:30:11', 'chat_img/1563ba9b333bcbc.jpg', 1),
(118, 14, 15, 'I miss you', '💗', '2023-01-08 11:30:37', NULL, 1),
(119, 14, 15, 'I miss you', '💗', '2023-01-08 11:30:52', 'chat_img/1463ba9b5ca2e52.jpg', 1),
(120, 14, 15, 'I miss you', '💗', '2023-01-08 12:19:36', NULL, 1),
(121, 14, 15, 'I miss you', '🍨', '2023-01-09 20:26:29', NULL, 1),
(122, 15, 14, 'I miss you', '🌞', '2023-01-09 20:41:23', NULL, 1),
(123, 14, 15, 'I miss you', '💗', '2023-01-09 20:42:05', NULL, 1),
(124, 14, 15, 'I miss you', '💗', '2023-01-09 20:42:07', NULL, 1),
(125, 15, 14, 'I miss you', '💗', '2023-01-09 20:46:38', NULL, 1),
(126, 15, 14, 'I miss you', '💗', '2023-01-09 20:51:46', NULL, 1),
(127, 15, 13, 'I miss you', '🌻', '2023-01-09 20:57:52', NULL, 1),
(128, 15, 13, 'I miss you', '💗', '2023-01-09 20:57:56', 'chat_img/1563bc71c4649f5.jpg', 1),
(129, 13, 15, 'I miss you', '💗', '2023-01-09 20:58:01', NULL, 1),
(131, 15, 14, 'I miss you', '🍩', '2023-01-12 13:21:42', NULL, 1),
(132, 14, 15, 'I miss you', '🌙', '2023-01-12 13:21:54', NULL, 1),
(133, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:00', NULL, 1),
(134, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:01', NULL, 1),
(135, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:02', NULL, 1),
(136, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:03', NULL, 1),
(137, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:05', NULL, 1),
(138, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:06', NULL, 1),
(139, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:08', NULL, 1),
(140, 15, 14, 'I miss you', '💗', '2023-01-12 13:22:09', NULL, 1),
(141, 15, 14, 'I miss you', '🍨', '2023-01-12 13:26:55', NULL, 1),
(142, 14, 15, 'I miss you', '🍨', '2023-01-12 13:59:46', NULL, 1),
(143, 19, 13, 'I miss you', '🍩', '2023-01-12 14:08:15', 'chat_img/1963c0063f63715.jpg', 1),
(144, 13, 19, 'I miss you', '🌙', '2023-01-12 14:08:33', NULL, 1),
(145, 19, 13, 'I miss you', '🍨', '2023-01-12 14:11:04', NULL, 1),
(146, 14, 15, 'I miss you', '🍩', '2023-01-14 17:32:21', NULL, 1),
(147, 14, 15, 'I miss you', '🌺', '2023-01-15 14:42:18', NULL, 1),
(148, 14, 15, 'I miss you', '🍩', '2023-01-15 14:42:21', NULL, 1),
(149, 14, 15, 'I miss you', '🐻', '2023-01-17 09:41:34', NULL, 1),
(150, 23, 19, 'I miss you', '🌞', '2023-01-18 10:08:05', 'chat_img/2363c7b6f5867aa.jpg', 1),
(151, 19, 23, 'I miss you', '💗', '2023-01-18 10:08:53', NULL, 1),
(152, 19, 23, 'I miss you', '💗', '2023-01-18 10:49:33', NULL, 1),
(153, 23, 19, 'I miss you', '🍨', '2023-01-18 10:51:52', NULL, 1),
(154, 23, 19, 'I miss you', '🍨', '2023-01-18 10:52:34', NULL, 1),
(155, 23, 19, 'I miss you', '💗', '2023-01-18 10:52:42', 'chat_img/2363c7c16a70da4.jpg', 1),
(156, 14, 15, 'I miss you', '💗', '2023-01-18 16:39:09', 'chat_img/1463c8129d2830c.jpg', 1),
(157, 14, 15, 'I miss you', '🍩', '2023-01-18 17:24:07', NULL, 1),
(158, 14, 15, 'I miss you', '🍨', '2023-01-20 10:46:51', NULL, 1),
(159, 14, 15, 'I miss you', '🌞', '2023-01-21 12:09:58', NULL, 1),
(160, 15, 14, 'I miss you', '🍨', '2023-01-21 12:10:34', NULL, 1),
(161, 14, 15, 'I miss you', '🍨', '2023-01-21 12:12:33', NULL, 0),
(162, 15, 14, 'I miss you', '🌞', '2023-01-21 12:12:50', NULL, 0),
(163, 25, 21, 'I miss you', '🍨', '2023-01-22 10:54:34', NULL, 1),
(164, 21, 25, 'I miss you', '🌙', '2023-01-22 10:59:56', NULL, 1),
(165, 25, 21, 'I miss you', '🍨', '2023-01-22 11:01:38', NULL, 1),
(166, 25, 21, 'I miss you', '🌺', '2023-01-22 11:11:24', NULL, 1),
(167, 21, 25, 'I miss you', '🌞', '2023-01-22 11:11:37', NULL, 1),
(168, 25, 21, 'I miss you', '💞', '2023-01-22 11:11:45', NULL, 1),
(169, 21, 25, 'I miss you', '💗', '2023-01-22 11:11:54', 'chat_img/2163cd0bea263f1.jpg', 1),
(170, 25, 21, 'I miss you', '🍨', '2023-01-22 11:11:59', NULL, 1),
(171, 21, 25, 'I miss you', '🌞', '2023-01-22 11:12:07', NULL, 1),
(172, 21, 25, 'I miss you', '🌻', '2023-01-22 11:12:14', NULL, 1),
(173, 21, 25, 'I miss you', '💗', '2023-01-22 11:12:20', NULL, 1),
(174, 21, 25, 'I miss you', '🌞', '2023-01-22 11:12:22', NULL, 1),
(175, 25, 21, 'I miss you', '🍩', '2023-01-22 11:12:28', NULL, 1),
(176, 21, 25, 'I miss you', '🌞', '2023-01-22 11:12:32', NULL, 1),
(177, 25, 21, 'I miss you', '🍨', '2023-01-22 11:12:36', NULL, 1),
(178, 21, 25, 'I miss you', '🌞', '2023-01-22 11:12:57', NULL, 1),
(179, 14, 15, 'I miss you', '🐻', '2023-01-29 19:00:33', NULL, 0),
(180, 15, 14, 'I miss you', '🐼', '2023-01-29 19:01:24', 'chat_img/1563d6b4741117a.jpg', 0),
(181, 21, 25, 'I miss you', '💗', '2023-01-29 19:02:29', NULL, 1),
(182, 16, 21, 'I miss you', '🌞', '2023-01-29 19:03:19', NULL, 1),
(183, 21, 16, 'I miss you', '🍨', '2023-01-29 19:03:28', NULL, 1),
(184, 21, 26, 'I miss you', '🍩', '2023-01-29 19:04:56', NULL, 0),
(185, 21, 26, 'I miss you', '🍨', '2023-01-29 19:12:04', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `pwd` varchar(128) NOT NULL,
  `taken` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Is person already in relationship',
  `pimg` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `lname`, `fname`, `pwd`, `taken`, `pimg`) VALUES
(13, 'dimitrid@gmail.com', 'D', 'Dimitri', '$2y$10$PFton2jpeGAZt9CgNpu.hu6CRrCo1gyzXQUQyy8e4RLmqc74keQW6', 0, 1),
(14, 'dusanj@gmail.com', 'J', 'Dusan', '$2y$10$sS2.FP8aabLKKADBdtPw4e4jw85gXD9l3lOk4GqqS9tqpMNbwS8TS', 1, 1),
(15, 'emilyj@gmail.com', 'J', 'Emily', '$2y$10$iczDrh1YdDUNin9dywjFfOscn7Cv76gjIecWc/TOKLjMhZgli5R0m', 1, 1),
(16, 'dusanp@gmail.com', 'P', 'Dusan', '$2y$10$flvN3E8JFjlQCFVWVYT.YOHyS3TI6EU8PoHENGSlDC28Sxf7EAOkS', 0, 1),
(18, 'amya@gmail.com', 'A', 'Amy', '$2y$10$5M8HeuyDJzpn2SzLOyaHOOY3aY8a9RTvzC4OD8ROTQqPSfpTL5V4i', 0, 1),
(19, 'jenny@gmail.com', 'J', 'Jenny', '$2y$10$BCmn/y.BJt7IzbZzJT8rm.4gUT6LxIZa6UJgOLLXUR4quFC1HVhsO', 0, 1),
(20, 'lena@gmail.com', 'L', 'Lena', '$2y$10$HlHRWI4StctYcdlj0qF6n.xR8muo8G.ZeZR3ZYnqVu3t2MJjVXpda', 0, 0),
(21, 'mandy@gmail.com', 'M', 'Mandy', '$2y$10$gPx9MjmxaufhgXsexbNpi.m0UkfjvculVzg/w/hfI2UZE2gBn1iu6', 1, 1),
(22, 'jack@gmail.com', 'T', 'Jack', '$2y$10$cvCbQS8ODcx811UrkHR0RugPe9a4Hqf1dERC5KTryJcxMdxosyIFi', 0, 0),
(23, 'mark@gmail.com', 'J', 'Mark', '$2y$10$siUuOEkTiefSxmrFkRMsoe0R2QUeUxdm1M2xytucyp9heVbfx/aqq', 0, 1),
(25, 'jake@gmail.com', 'L', 'Jake', '$2y$10$adqQc40hfI3tJatEJ.7iTebPQy4tq.eQTqOOmtof1gB90aPXo6qE6', 0, 1),
(26, 'jack1@gmail.com', 'Q', 'Jack', '$2y$10$E17XtiwVlkE/B.ySZ2guFO00avnLhRPN9J3h9C/uiBNO041eBy1p2', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `ID_USER` (`id_user`);

--
-- Indexes for table `relationships`
--
ALTER TABLE `relationships`
  ADD PRIMARY KEY (`id_relation`),
  ADD KEY `USER1` (`id_user1`),
  ADD KEY `USER2` (`id_user2`);

--
-- Indexes for table `rposts`
--
ALTER TABLE `rposts`
  ADD PRIMARY KEY (`id_rpost`),
  ADD KEY `SENDER` (`id_sender`),
  ADD KEY `RECIPIENT` (`id_recipient`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `relationships`
--
ALTER TABLE `relationships`
  MODIFY `id_relation` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `rposts`
--
ALTER TABLE `rposts`
  MODIFY `id_rpost` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `ID_USER` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `relationships`
--
ALTER TABLE `relationships`
  ADD CONSTRAINT `USER1` FOREIGN KEY (`id_user1`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `USER2` FOREIGN KEY (`id_user2`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `rposts`
--
ALTER TABLE `rposts`
  ADD CONSTRAINT `RECIPIENT` FOREIGN KEY (`id_recipient`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `SENDER` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
