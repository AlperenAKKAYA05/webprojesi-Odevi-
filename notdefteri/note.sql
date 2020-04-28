-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Nis 2020, 18:22:20
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `note`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name_surname` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `mail` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `subject` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `message` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `additional` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `detail` text NOT NULL,
  `title` varchar(300) NOT NULL,
  `read_count` int(11) NOT NULL DEFAULT 0,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `limit` bigint(11) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT current_timestamp(),
  `owner` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `notes`
--

INSERT INTO `notes` (`id`, `additional`, `password`, `detail`, `title`, `read_count`, `status`, `limit`, `upload_date`, `owner`) VALUES
(1, '6v3c4', '', 'not ekle', 'a', 1, b'1', 0, '2020-04-28 17:15:08', 'admin@localhost.com'),
(2, 'bHaKq', '', 'gg', '', 1, b'1', 0, '2020-04-28 18:56:08', 'admin@localhost.com'),
(3, 'HMq3z', '', 'asdfgh', 'b', 2, b'1', 0, '2020-04-28 17:51:23', 'admin@localhost.com'),
(4, 'UZDHz', '', 'Test', 'Test', 11, b'1', 0, '2020-04-22 06:36:42', 'admin@localhost.com'),
(5, 'VWlRj', '', 'aaa', 'c', 0, b'1', 0, '2020-04-28 18:39:26', 'Anonim-VWlRj');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `logo` longblob NOT NULL,
  `title` varchar(350) NOT NULL,
  `explanation` varchar(300) NOT NULL,
  `footer` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `ads_right` text NOT NULL,
  `ads_left` text NOT NULL,
  `admin_mail` varchar(100) NOT NULL,
  `mail_host` varchar(100) NOT NULL,
  `mail_mail` varchar(100) NOT NULL,
  `mail_port` int(11) NOT NULL,
  `mail_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `logo`, `title`, `explanation`, `footer`, `url`, `ads_right`, `ads_left`, `admin_mail`, `mail_host`, `mail_mail`, `mail_port`, `mail_pass`) VALUES
(1, '', 'OurNote', 'Site buglar var finale kadar düzeltilmeye çalışacağım.', 'Copyright © 2020 Tüm Hakları Saklıdır.', 'http://localhost/new', 'Ads Sağ', 'Ads Sol', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `authority` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `mail`, `password`, `telephone`, `authority`) VALUES
(1, 'Admin', '', 'admin@localhost.com', 'e10adc3949ba59abbe56e057f20f883e', '+90', 1),
(2, 'Test', 'Test', 'test@localhost.com', 'e10adc3949ba59abbe56e057f20f883e', '+90', 0),
(3, 'Test2', 'Test2', 'Test2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '+90', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
