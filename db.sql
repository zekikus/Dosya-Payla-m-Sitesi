-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 12 Haz 2015, 12:15:05
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `site`
--
CREATE DATABASE IF NOT EXISTS `site` DEFAULT CHARACTER SET latin5 COLLATE latin5_turkish_ci;
USE `site`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `ipadres` varchar(255) NOT NULL,
  `dosyaKodu` varchar(255) NOT NULL,
  `indirilmeSayisi` int(11) NOT NULL,
  PRIMARY KEY (`dosyaKodu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`ipadres`, `dosyaKodu`, `indirilmeSayisi`) VALUES
('127.0.0.1', 'A26062015104412', 9),
('127.0.0.1', 'A26062015104947', 7),
('127.0.0.1', 'A26062015105752', 6),
('127.0.0.1', 'A26062015110258', 5),
('127.0.0.1', 'A27062015074537', 6),
('127.0.0.1', 'A27062015074613', 7),
('127.0.0.1', 'A27062015074819', 5),
('127.0.0.1', 'A27062015075927', 4),
('127.0.0.1', 'A27062015093120', 6),
('127.0.0.1', 'A27062015100029', 3),
('127.0.0.1', 'A27062015103043', 6),
('127.0.0.1', 'A27062015104503', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `dosyaKodu` varchar(15) NOT NULL,
  `dosyaAdi` varchar(255) NOT NULL,
  `dosyaTur` varchar(255) NOT NULL,
  `dosyaBoyut` int(11) NOT NULL,
  `yuklenmeTarih` varchar(255) NOT NULL,
  `sonTarih` varchar(255) NOT NULL,
  `gorunurluk` int(11) NOT NULL,
  `kopyasiVarmi` int(11) NOT NULL,
  `silinmisMi` int(11) NOT NULL,
  PRIMARY KEY (`dosyaKodu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Tablo döküm verisi `uploads`
--

INSERT INTO `uploads` (`dosyaKodu`, `dosyaAdi`, `dosyaTur`, `dosyaBoyut`, `yuklenmeTarih`, `sonTarih`, `gorunurluk`, `kopyasiVarmi`, `silinmisMi`) VALUES
('A12062015130246', 'A12062015130246-openssl-0.9.8r-i386-win32-rev2.zip', 'zip', 850543, '12.06.2015 13:02:46', '2015-06-12', 1, 1, 1),
('A26062015102111', 'A26062015102111-akinsoft_daire_logo.zip', 'zip', 2895977, '26.06.2015 10:21:11', '2015-06-28', 1, 1, 0),
('A26062015104412', 'wampserver2.5-Apache-2.4.9-Mysql-5.6.17-php5.5.12-32b.zip', 'zip', 39751036, '26.06.2015 10:44:12', '2015-06-27', 0, 0, 0),
('A26062015104947', 'Terazi Scripti.zip', 'zip', 6470, '26.06.2015 10:49:47', '2015-08-14', 1, 0, 0),
('A26062015105752', 'asd.zip', 'zip', 13700515, '26.06.2015 10:57:52', '2015-06-30', 1, 0, 0),
('A26062015110258', 'Dizaynlar.zip', 'zip', 29279, '26.06.2015 11:02:58', '2015-06-29', 1, 0, 1),
('A26062015144249', 'akinsoft_yatay_logo.zip', 'zip', 1354891, '26.06.2015 14:42:49', '2015-06-30', 0, 0, 0),
('A26062015174534', 'openssl-0.9.8r-i386-win32-rev2.zip', 'zip', 850543, '26.06.2015 17:45:34', '2015-06-30', 1, 0, 0),
('A26062015174602', 'qwe.zip', 'zip', 9353637, '26.06.2015 17:46:02', '2015-06-27', 1, 0, 0),
('A27062015074441', 'Terazi Scripti (1).zip', 'zip', 6470, '27.06.2015 07:44:41', '2015-06-29', 1, 0, 0),
('A27062015074613', 'firebird.zip', 'zip', 8711, '27.06.2015 07:46:13', '2015-06-24', 1, 0, 0),
('A27062015074819', '5691.rar', 'rar', 58797, '27.06.2015 07:48:19', '2015-06-29', 1, 0, 0),
('A27062015075927', 'akinsoft_daire_logo.zip', 'zip', 2895977, '27.06.2015 07:59:27', '2015-06-29', 1, 0, 0),
('A27062015093120', 'A27062015093120-openssl-0.9.8r-i386-win32-rev2.zip', 'zip', 850543, '27.06.2015 09:31:20', '2015-06-30', 1, 1, 0),
('A27062015100029', 'A27062015100029-qwe.zip', 'zip', 9353637, '27.06.2015 10:00:29', '2015-06-30', 1, 1, 1),
('A27062015103043', 'A27062015103043-5691.rar', 'rar', 58797, '27.06.2015 10:30:43', '2015-06-28', 1, 1, 0),
('A27062015104503', 'firebird.zip', 'zip', 8711, '27.06.2015 10:45:03', '2015-06-30', 1, 0, 0),
('A27062015130520', 'A27062015130520-Terazi Scripti.zip', 'zip', 6470, '27.06.2015 13:05:20', '2015-06-28', 1, 1, 0),
('A27062015131124', 'firebird.zip', 'zip', 8711, '27.06.2015 13:11:24', '2015-06-30', 1, 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
