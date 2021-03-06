-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/06/2015 às 06:13
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

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Test Message!', '2015-06-22 12:12:53', '2015-06-22 12:12:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `messages_to_phones`
--

DROP TABLE IF EXISTS `messages_to_phones`;
CREATE TABLE IF NOT EXISTS `messages_to_phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idRegister` int(10) unsigned NOT NULL,
  `idMessage` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `messages_to_phones_idregister_foreign` (`idRegister`),
  KEY `messages_to_phones_idmessage_foreign` (`idMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

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
(1, 1, 1, '2015-06-22 12:12:53', '2015-06-22 12:12:53'),
(2, 2, 1, '2015-06-22 12:12:53', '2015-06-22 12:12:53'),
(3, 3, 1, '2015-06-22 12:12:53', '2015-06-22 12:12:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_06_22_010635_create_reg_ids_table', 1),
('2015_06_22_011059_create_setting_table', 1),
('2015_06_22_011518_create_messages_table', 1),
('2015_06_22_021336_create_messages_to_phones_table', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reg_ids`
--

DROP TABLE IF EXISTS `reg_ids`;
CREATE TABLE IF NOT EXISTS `reg_ids` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phoneId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `reg_ids_phoneid_unique` (`phoneId`),
  UNIQUE KEY `reg_ids_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `reg_ids`
--

INSERT INTO `reg_ids` (`id`, `phoneId`, `system`, `email`, `created_at`, `updated_at`) VALUES
(1, 'qLWa0tuki81434964344GIBzegqTy0', 'android', 'user@android.com', '2015-06-22 12:12:29', '2015-06-22 12:12:29'),
(2, 'YGoud4KFUO1434964349Na4Yl5Wf0H', 'ios', 'user@ios.com', '2015-06-22 12:12:34', '2015-06-22 12:12:34'),
(3, 'YnmOHc5S6E1434964355S3aCi25zmg', 'winPhone', 'user@windows.com', '2015-06-22 12:12:39', '2015-06-22 12:12:39');

-- --------------------------------------------------------

--
-- Estrutura para tabela `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `config` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `settings`
--

INSERT INTO `settings` (`id`, `config`, `value`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Android Key', '$2a$10$G9SDvR7PgK1A0D6tP1kEJuCL8', 'android-key', '2015-06-22 12:12:15', '2015-06-22 12:12:15'),
(2, 'iOS Key', '$wcFO1lC49AbBtJr5yv4tPFvvyLS', 'ios-key', '2015-06-22 12:12:15', '2015-06-22 12:12:15'),
(3, 'Windows Phone Key', 'wcFO1lC49AbvvyLStP1kEJuCL8', 'winPhone-key', '2015-06-22 12:12:16', '2015-06-22 12:12:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2a$10$G9SDvR7PgK1A0D6tP1kEJuCL8.wcFO1lC49AbBtJr5yv4tPFvvyLS', NULL, '2015-06-22 12:12:14', '2015-06-22 12:12:14');

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `messages_to_phones`
--
ALTER TABLE `messages_to_phones`
  ADD CONSTRAINT `messages_to_phones_idmessage_foreign` FOREIGN KEY (`idMessage`) REFERENCES `messages` (`id`),
  ADD CONSTRAINT `messages_to_phones_idregister_foreign` FOREIGN KEY (`idRegister`) REFERENCES `reg_ids` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
