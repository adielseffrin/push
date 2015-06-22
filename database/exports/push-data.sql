-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 21/06/2015 às 22:04
-- Versão do servidor: 5.5.38-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `push`
--
CREATE DATABASE IF NOT EXISTS `push` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `push`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Fazendo dump de dados para tabela `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Hello World!', '2015-06-20 19:59:25', '0000-00-00 00:00:00'),
(2, 'Check it out!', '2015-06-20 19:59:31', '0000-00-00 00:00:00'),
(3, 'I''m Alive!!', '2015-06-21 04:01:26', '2015-06-21 04:01:26'),
(4, 'You have a new message', '2015-06-21 05:14:55', '2015-06-21 05:14:55'),
(5, 'adasdas adsad sad ', '2015-06-21 05:16:39', '2015-06-21 05:16:39'),
(6, 'asdasdasqwewqe', '2015-06-21 05:17:07', '2015-06-21 05:17:07'),
(7, 'New test', '2015-06-21 05:17:46', '2015-06-21 05:17:46'),
(8, 'Another test', '2015-06-21 05:18:16', '2015-06-21 05:18:16'),
(9, 'Another new, but really new test!', '2015-06-21 05:19:50', '2015-06-21 05:19:50'),
(10, 'test', '2015-06-21 05:37:38', '2015-06-21 05:37:38'),
(11, 'broadcast message', '2015-06-21 05:52:51', '2015-06-21 05:52:51'),
(12, 'other broadcast message is waiting for you', '2015-06-21 05:53:43', '2015-06-21 05:53:43'),
(13, 'asd', '2015-06-21 05:54:23', '2015-06-21 05:54:23'),
(14, 'asd', '2015-06-21 05:55:11', '2015-06-21 05:55:11'),
(15, 'asd', '2015-06-21 05:55:26', '2015-06-21 05:55:26'),
(16, 'asd', '2015-06-21 05:55:49', '2015-06-21 05:55:49'),
(17, 'asd', '2015-06-21 05:56:12', '2015-06-21 05:56:12'),
(18, 'asd', '2015-06-21 05:57:08', '2015-06-21 05:57:08'),
(19, 'asd', '2015-06-21 05:57:47', '2015-06-21 05:57:47'),
(20, 'asd', '2015-06-21 05:57:58', '2015-06-21 05:57:58'),
(21, 'asd', '2015-06-21 05:58:26', '2015-06-21 05:58:26'),
(22, 'asd', '2015-06-21 05:59:21', '2015-06-21 05:59:21'),
(23, 'asd', '2015-06-21 05:59:35', '2015-06-21 05:59:35'),
(24, 'asd', '2015-06-21 05:59:45', '2015-06-21 05:59:45'),
(25, 'asd', '2015-06-21 06:00:22', '2015-06-21 06:00:22'),
(26, 'asd', '2015-06-21 06:00:32', '2015-06-21 06:00:32'),
(27, 'asd', '2015-06-21 06:00:45', '2015-06-21 06:00:45'),
(28, 'asd', '2015-06-21 06:01:02', '2015-06-21 06:01:02'),
(29, 'asd', '2015-06-21 06:01:18', '2015-06-21 06:01:18'),
(30, 'asd', '2015-06-21 06:01:51', '2015-06-21 06:01:51'),
(31, 'asd', '2015-06-21 06:02:18', '2015-06-21 06:02:18'),
(32, 'asd', '2015-06-21 06:03:25', '2015-06-21 06:03:25'),
(33, 'asd', '2015-06-21 06:04:19', '2015-06-21 06:04:19'),
(34, 'asd', '2015-06-21 06:05:08', '2015-06-21 06:05:08'),
(35, 'asd', '2015-06-21 06:05:27', '2015-06-21 06:05:27'),
(36, 'asd', '2015-06-21 06:05:42', '2015-06-21 06:05:42'),
(37, 'novo teste', '2015-06-21 06:06:17', '2015-06-21 06:06:17'),
(38, 'qweqwe', '2015-06-21 06:09:25', '2015-06-21 06:09:25'),
(39, 'qweqwe', '2015-06-21 06:10:30', '2015-06-21 06:10:30'),
(40, 'go sleep!', '2015-06-21 06:11:26', '2015-06-21 06:11:26'),
(41, 'iphonezzzzzzz', '2015-06-21 06:11:55', '2015-06-21 06:11:55'),
(42, 'iphonezzzzzzz', '2015-06-21 06:12:07', '2015-06-21 06:12:07'),
(43, 'androidzzzzzzzz', '2015-06-21 06:12:25', '2015-06-21 06:12:25'),
(44, 'messagem de test', '2015-06-21 13:51:24', '2015-06-21 13:51:24'),
(45, 'test with login', '2015-06-21 14:39:17', '2015-06-21 14:39:17'),
(46, 'new message test', '2015-06-21 22:24:05', '2015-06-21 22:24:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages_to_phones`
--

CREATE TABLE IF NOT EXISTS `messages_to_phones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRegister` int(11) NOT NULL,
  `idMessage` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_MESSAGESTOPHONE_REGIDS` (`idRegister`),
  KEY `FK_MESSAGESTOPHONE_MESSAGES` (`idMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- RELACIONAMENTOS PARA TABELAS `messages_to_phones`:
--   `idMessage`
--       `messages` -> `id`
--   `idRegister`
--       `reg_ids` -> `id`
--

--
-- Fazendo dump de dados para tabela `messages_to_phones`
--

INSERT INTO `messages_to_phones` (`id`, `idRegister`, `idMessage`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-06-20 17:53:43', '0000-00-00 00:00:00'),
(2, 2, 1, '2015-06-20 17:53:43', '0000-00-00 00:00:00'),
(3, 0, 0, '2015-06-21 06:03:25', '2015-06-21 06:03:25'),
(4, 0, 0, '2015-06-21 06:03:25', '2015-06-21 06:03:25'),
(5, 0, 0, '2015-06-21 06:03:25', '2015-06-21 06:03:25'),
(6, 0, 0, '2015-06-21 06:03:25', '2015-06-21 06:03:25'),
(7, 0, 0, '2015-06-21 06:05:42', '2015-06-21 06:05:42'),
(8, 0, 0, '2015-06-21 06:05:42', '2015-06-21 06:05:42'),
(9, 0, 0, '2015-06-21 06:05:42', '2015-06-21 06:05:42'),
(10, 0, 0, '2015-06-21 06:05:42', '2015-06-21 06:05:42'),
(11, 0, 0, '2015-06-21 06:06:17', '2015-06-21 06:06:17'),
(12, 0, 0, '2015-06-21 06:06:17', '2015-06-21 06:06:17'),
(13, 0, 0, '2015-06-21 06:06:18', '2015-06-21 06:06:18'),
(14, 0, 0, '2015-06-21 06:06:18', '2015-06-21 06:06:18'),
(15, 0, 0, '2015-06-21 06:09:25', '2015-06-21 06:09:25'),
(16, 1, 39, '2015-06-21 06:10:30', '2015-06-21 06:10:30'),
(17, 1, 40, '2015-06-21 06:11:26', '2015-06-21 06:11:26'),
(18, 3, 40, '2015-06-21 06:11:26', '2015-06-21 06:11:26'),
(19, 4, 40, '2015-06-21 06:11:26', '2015-06-21 06:11:26'),
(20, 2, 40, '2015-06-21 06:11:26', '2015-06-21 06:11:26'),
(21, 2, 42, '2015-06-21 06:12:07', '2015-06-21 06:12:07'),
(22, 1, 43, '2015-06-21 06:12:25', '2015-06-21 06:12:25'),
(23, 3, 43, '2015-06-21 06:12:25', '2015-06-21 06:12:25'),
(24, 4, 43, '2015-06-21 06:12:25', '2015-06-21 06:12:25'),
(25, 1, 44, '2015-06-21 13:51:25', '2015-06-21 13:51:25'),
(26, 3, 44, '2015-06-21 13:51:25', '2015-06-21 13:51:25'),
(27, 4, 44, '2015-06-21 13:51:25', '2015-06-21 13:51:25'),
(28, 2, 44, '2015-06-21 13:51:25', '2015-06-21 13:51:25'),
(29, 1, 45, '2015-06-21 14:39:17', '2015-06-21 14:39:17'),
(30, 3, 45, '2015-06-21 14:39:17', '2015-06-21 14:39:17'),
(31, 4, 45, '2015-06-21 14:39:17', '2015-06-21 14:39:17'),
(32, 2, 45, '2015-06-21 14:39:17', '2015-06-21 14:39:17'),
(33, 1, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05'),
(34, 3, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05'),
(35, 4, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05'),
(36, 2, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05'),
(37, 6, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05'),
(38, 5, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05'),
(39, 7, 46, '2015-06-21 22:24:05', '2015-06-21 22:24:05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `reg_ids`
--

CREATE TABLE IF NOT EXISTS `reg_ids` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phoneId` varchar(55) NOT NULL,
  `system` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Fazendo dump de dados para tabela `reg_ids`
--

INSERT INTO `reg_ids` (`id`, `phoneId`, `system`, `email`, `created_at`, `updated_at`) VALUES
(1, 'HiojKj876kjgh673', 'android', 'a@a.com', '2015-06-21 00:09:41', '0000-00-00 00:00:00'),
(2, 'Hg65765LKjjf', 'ios', 'b@b.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'ohOIjohoiHo987KJHjk', 'android', 'c@c.com', '2015-06-21 00:09:03', '0000-00-00 00:00:00'),
(4, 'khgjFJHLglhj876HHKG', 'android', 'd@d.com', '2015-06-21 00:09:32', '0000-00-00 00:00:00'),
(5, 'm2HT9ANuDz14349216403E51A9gCrB', 'winPhone', 'f@f.com', '2015-06-21 21:24:40', '2015-06-21 21:24:40'),
(6, 'hwWELJn2Z51434922473lD8w2P39Am', 'ios', 'e@e.com', '2015-06-21 21:34:52', '2015-06-21 21:34:52'),
(7, 'G2mxL90zTK1434925365yQnjxmzpgT', 'winPhone', 'dsah@asdsad.com', '2015-06-21 22:23:40', '2015-06-21 22:23:40'),
(8, 'R9eYhyjlFv14349293797ItHcd48ZX', 'android', 'qwe@wre.cmm', '2015-06-21 23:30:11', '2015-06-21 23:30:11'),
(9, 'S8xsBgQm0J1434929680u67RjboF1z', 'android', 'asdasd@qweqwe.com', '2015-06-21 23:34:51', '2015-06-21 23:34:51'),
(10, 'WjZd7fVkG81434930741VgMhUea7qP', 'android', 'new@test.com', '2015-06-21 23:52:41', '2015-06-21 23:52:41'),
(11, '7bMBc4aKH91434931028WkndljUpEK', 'android', 'new2@test.com', '2015-06-21 23:57:35', '2015-06-21 23:57:35'),
(12, 'E58yhk4Prz1434931118X7a6PVNOML', 'android', 'new3@test.com', '2015-06-21 23:58:45', '2015-06-21 23:58:45'),
(13, 'E3ekFxtS6C1434931125BmZRGUyMfX', 'winPhone', 'teste@test.com', '2015-06-21 23:59:25', '2015-06-21 23:59:25'),
(14, '5M1s0mD2AT14349312686XmFiYC4R1', 'winPhone', 'win@pho.nes', '2015-06-22 00:01:32', '2015-06-22 00:01:32'),
(15, 'SjdCKpYkUb1434931411m3wp4TRCjG', 'android', 'adn@roid.com', '2015-06-22 00:03:37', '2015-06-22 00:03:37'),
(16, 'mv10fzLtVS1434932023V2oaKuUhvG', 'ios', 'asdi@aojdias.com', '2015-06-22 00:13:57', '2015-06-22 00:13:57'),
(17, 'ZW1soTB7QG1434932073QIeWFCJw5q', 'ios', 'asd@iofj.com', '2015-06-22 00:14:41', '2015-06-22 00:14:41'),
(18, 'c6hRMgo1Iu1434932217LmtCIWUan7', 'winPhone', 'asdjn@aksd.xom', '2015-06-22 00:17:07', '2015-06-22 00:17:07'),
(19, 'HAvSGWxeEC1434932258EGlLJ4RQk9', 'winPhone', 'asd@qweqwe.com', '2015-06-22 00:17:47', '2015-06-22 00:17:47'),
(20, 'vGr2BJKL6C14349324547U4FnokPx8', 'android', 'asddjn@aksd.xom', '2015-06-22 00:21:00', '2015-06-22 00:21:00'),
(21, 'INKFMZHBkw1434932482KS3A8dFXNc', 'android', 'asdasd@erer.com', '2015-06-22 00:21:29', '2015-06-22 00:21:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `settings`
--

INSERT INTO `settings` (`id`, `config`, `value`, `slug`, `updated_at`) VALUES
(1, 'AndroidKey', 'AAAAAAAAAAAAAAAAAAAAAAAAAA', 'android-key', '0000-00-00 00:00:00'),
(2, 'IphoneKey', 'OIHIjOjbiufy5956465VJHfghdK', 'iphone-key', '2015-06-21 01:35:51'),
(3, 'WindowsPhoneKey', 'WWWWWWWWWWWWWWWWWWWWWWWWWWWWW', 'windows-phone-key', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remember_token` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', 'admin@pushtest.com', '$2a$10$G9SDvR7PgK1A0D6tP1kEJuCL8.wcFO1lC49AbBtJr5yv4tPFvvyLS', '2015-06-21 11:36:09', '2015-06-21 15:04:31', '3vUwR2SKLc0vCdgDDrNgKvSam2cp0LfSbjVUoHAVmvQ9mxGuvHrdbk50jic6');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
