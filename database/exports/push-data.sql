-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 22/06/2015 às 06:30
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

--
-- Fazendo dump de dados para tabela `messages`
--

INSERT INTO `messages` (`id`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Test Message!', '2015-06-22 12:12:53', '2015-06-22 12:12:53');

--
-- Fazendo dump de dados para tabela `messages_to_phones`
--

INSERT INTO `messages_to_phones` (`id`, `idRegister`, `idMessage`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2015-06-22 12:12:53', '2015-06-22 12:12:53'),
(2, 2, 1, '2015-06-22 12:12:53', '2015-06-22 12:12:53'),
(3, 3, 1, '2015-06-22 12:12:53', '2015-06-22 12:12:53');

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

--
-- Fazendo dump de dados para tabela `reg_ids`
--

INSERT INTO `reg_ids` (`id`, `phoneId`, `system`, `email`, `created_at`, `updated_at`) VALUES
(1, 'qLWa0tuki81434964344GIBzegqTy0', 'android', 'user@android.com', '2015-06-22 12:12:29', '2015-06-22 12:12:29'),
(2, 'YGoud4KFUO1434964349Na4Yl5Wf0H', 'ios', 'user@ios.com', '2015-06-22 12:12:34', '2015-06-22 12:12:34'),
(3, 'YnmOHc5S6E1434964355S3aCi25zmg', 'winPhone', 'user@windows.com', '2015-06-22 12:12:39', '2015-06-22 12:12:39');

--
-- Fazendo dump de dados para tabela `settings`
--

INSERT INTO `settings` (`id`, `config`, `value`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Android Key', '$2a$10$G9SDvR7PgK1A0D6tP1kEJuCL8', 'android-key', '2015-06-22 12:12:15', '2015-06-22 12:12:15'),
(2, 'iOS Key', '$wcFO1lC49AbBtJr5yv4tPFvvyLS', 'ios-key', '2015-06-22 12:12:15', '2015-06-22 12:12:15'),
(3, 'Windows Phone Key', 'wcFO1lC49AbvvyLStP1kEJuCL8', 'winPhone-key', '2015-06-22 12:12:16', '2015-06-22 12:12:16');

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2a$10$G9SDvR7PgK1A0D6tP1kEJuCL8.wcFO1lC49AbBtJr5yv4tPFvvyLS', NULL, '2015-06-22 12:12:14', '2015-06-22 12:12:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
