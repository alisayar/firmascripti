-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 Kas 2019, 21:04:40
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `firma`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_kadi` varchar(500) NOT NULL,
  `admin_sifre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_kadi`, `admin_sifre`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `site_desc` varchar(255) NOT NULL,
  `site_keyw` varchar(255) NOT NULL,
  `site_tel` varchar(255) NOT NULL,
  `site_mail` varchar(255) NOT NULL,
  `site_saat` varchar(255) NOT NULL,
  `site_adres` varchar(255) NOT NULL,
  `site_harita` varchar(255) NOT NULL,
  `site_footer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_id`, `site_title`, `site_url`, `site_desc`, `site_keyw`, `site_tel`, `site_mail`, `site_saat`, `site_adres`, `site_harita`, `site_footer`) VALUES
(1, 'İnşaat Scripti', 'http://localhost/firmascripti', 'İnşaat Hizmetleri', 'İnşaat,script,tuğla', '02125874785', 'inşaat@gmail.com', 'Pazartesi-Cumartesi 08:00-18:00', 'Beykoz/İstanbul', '        <iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d233533.81021805512!2d90.44069804466251!3d23.85534870087626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1482565625375\"></iframe>\n', 'Tüm Hakları Saklıdır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `basarilarimiz`
--

CREATE TABLE `basarilarimiz` (
  `basari_id` int(11) NOT NULL,
  `basari_icon` varchar(255) NOT NULL,
  `basari_isim` varchar(255) NOT NULL,
  `basari_sayi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `basarilarimiz`
--

INSERT INTO `basarilarimiz` (`basari_id`, `basari_icon`, `basari_isim`, `basari_sayi`) VALUES
(1, 'bullseye', 'TAMAMLANAN PROJE', '800'),
(2, 'building', 'EV İÇİ YENİLEME', '234'),
(3, 'certificate', 'İŞVEREN İŞÇİLERİ', '542'),
(4, 'briefcase', 'KAZANILAN ÖDÜLLER', '12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ekipler`
--

CREATE TABLE `ekipler` (
  `ekip_id` int(11) NOT NULL,
  `ekip_resim` varchar(500) NOT NULL,
  `ekip_isim` varchar(255) NOT NULL,
  `ekip_mevki` varchar(500) NOT NULL,
  `ekip_facebook` varchar(255) NOT NULL,
  `ekip_twitter` varchar(255) NOT NULL,
  `ekip_linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `ekipler`
--

INSERT INTO `ekipler` (`ekip_id`, `ekip_resim`, `ekip_isim`, `ekip_mevki`, `ekip_facebook`, `ekip_twitter`, `ekip_linkedin`) VALUES
(1, 'tm-2.jpg', 'Selim ASLAN', 'Mimar', '#', '#', '#'),
(2, 'tm-4.jpg', 'Mehmet YILMAZ', 'Mühendis', '#', '#', '#'),
(3, 'tm-6.jpg', 'Ahmet YALÇIN', 'Usta', '#', '#', '#'),
(4, 'tm-8.jpg', 'Kerem Ali YILDIZ', 'CEO', '#', '#', '#'),
(5, '284545dc585_photo.jpg', 'Ali Sayar', 'Developer', 'www.facebook.com', 'www.twitter.com', 'www.linkedin.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_baslik` varchar(255) NOT NULL,
  `hakkimizda_aciklama` text NOT NULL,
  `hakkimizda_medya` varchar(500) NOT NULL,
  `hakkimizda_vizyon` text NOT NULL,
  `hakkimizda_misyon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `hakkimizda`
--

INSERT INTO `hakkimizda` (`hakkimizda_id`, `hakkimizda_baslik`, `hakkimizda_aciklama`, `hakkimizda_medya`, `hakkimizda_vizyon`, `hakkimizda_misyon`) VALUES
(1, 'BİZ KİMİZ', '<p>Şirket hakkında a&ccedil;ıklama yapılmaktadır...</p>\r\n', 'obKyHbEI9vA', '<p>Şirketin vizyonu.</p>\r\n', '<p>Şirketin Misyonu</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hizmetler`
--

CREATE TABLE `hizmetler` (
  `hizmet_id` int(11) NOT NULL,
  `hizmet_icon` varchar(255) NOT NULL,
  `hizmet_baslik` varchar(255) NOT NULL,
  `hizmet_aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `hizmetler`
--

INSERT INTO `hizmetler` (`hizmet_id`, `hizmet_icon`, `hizmet_baslik`, `hizmet_aciklama`) VALUES
(1, 'bandcamp', 'Profesyonel İnşa', 'Profesyonel Çalışmalar'),
(2, 'building', 'Kaliteyi Sunuyoruz', 'Kaliteli Çalışmalar'),
(3, 'asterisk', 'Her Zaman', 'Her Zaman Çalışıyoruz'),
(4, 'bolt', 'Tutkuluyuz', '<p>İşimizi Tutkuyla Yapıyoruz</p>\r\n');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `logofavicon`
--

CREATE TABLE `logofavicon` (
  `lf_id` int(11) NOT NULL,
  `lf_logo` varchar(500) NOT NULL,
  `lf_favicon` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `logofavicon`
--

INSERT INTO `logofavicon` (`lf_id`, `lf_logo`, `lf_favicon`) VALUES
(1, '72205dd03c3_logo.png', '204655dd03c_favicon.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesajlar`
--

CREATE TABLE `mesajlar` (
  `mesaj_id` int(11) NOT NULL,
  `mesaj_gonderenisim` varchar(500) NOT NULL,
  `mesaj_gonderenmail` varchar(500) NOT NULL,
  `mesaj_konu` varchar(500) NOT NULL,
  `mesaj_aciklama` text NOT NULL,
  `mesaj_tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mesaj_okuma` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `mesajlar`
--

INSERT INTO `mesajlar` (`mesaj_id`, `mesaj_gonderenisim`, `mesaj_gonderenmail`, `mesaj_konu`, `mesaj_aciklama`, `mesaj_tarih`, `mesaj_okuma`) VALUES
(1, 'ALi SAYAR', 'alysayar@gmail.com', 'İlk Mesaj', 'Mesaj Gönderim Denemesi vol:1', '2019-11-18 22:09:06', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `projeler`
--

CREATE TABLE `projeler` (
  `proje_id` int(11) NOT NULL,
  `proje_resim` varchar(500) NOT NULL,
  `proje_isim` varchar(500) NOT NULL,
  `proje_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `projeler`
--

INSERT INTO `projeler` (`proje_id`, `proje_resim`, `proje_isim`, `proje_link`) VALUES
(1, 'gl-1.jpg', 'Proje1', '#'),
(2, 'gl-2.jpg', 'Proje2', '#'),
(3, 'gl-3.jpg', 'Proje3', '#'),
(4, 'gl-4.jpg', 'Proje4', '#'),
(5, 'gl-5.jpg', 'Proje5', '#'),
(6, 'gl-6.jpg', 'Proje6', '#'),
(7, 'gl-7.jpg', 'Proje7', '#'),
(8, 'gl-8.jpg', 'Proje8', '#');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervasyon`
--

CREATE TABLE `rezervasyon` (
  `rez_id` int(11) NOT NULL,
  `rez_kalinyazi` varchar(500) NOT NULL,
  `rez_normalyazi` varchar(500) NOT NULL,
  `rez_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `rezervasyon`
--

INSERT INTO `rezervasyon` (`rez_id`, `rez_kalinyazi`, `rez_normalyazi`, `rez_link`) VALUES
(1, 'Hayalinizdeki evi inşa etmek istiyorsanız hemen rezervasyon yapın.', 'Rezervasyon yaptırarak size daha kaliteli bir hizmet veriyoruz...', 'iletisim.php');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_resim` varchar(500) NOT NULL,
  `slider_renklibaslik` varchar(500) NOT NULL,
  `slider_normalbaslik` varchar(500) NOT NULL,
  `slider_paragraf` text NOT NULL,
  `slider_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_resim`, `slider_renklibaslik`, `slider_normalbaslik`, `slider_paragraf`, `slider_link`) VALUES
(1, 'slider-1.jpg', 'HOŞGELDİNİZ', 'LOREM IPSUMDAN BAHSEDER.', 'Lorem Ipsum Metni ...', 'https://www.inşaatscripti.com'),
(2, 'slider-2.jpg', 'WELCOME', 'LOREM IPSUM METNİ 2', 'Lorem Ipsum Metni 2', 'https://www.inşaatscripti2.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sosyalmedya`
--

CREATE TABLE `sosyalmedya` (
  `sm_id` int(11) NOT NULL,
  `sm_facebook` varchar(255) NOT NULL,
  `sm_twitter` varchar(255) NOT NULL,
  `sm_google` varchar(255) NOT NULL,
  `sm_instagram` varchar(255) NOT NULL,
  `sm_linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `sosyalmedya`
--

INSERT INTO `sosyalmedya` (`sm_id`, `sm_facebook`, `sm_twitter`, `sm_google`, `sm_instagram`, `sm_linkedin`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.instagram.com', 'https://www.linkedin.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sponsorlar`
--

CREATE TABLE `sponsorlar` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_isim` varchar(500) NOT NULL,
  `sponsor_resim` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `sponsorlar`
--

INSERT INTO `sponsorlar` (`sponsor_id`, `sponsor_isim`, `sponsor_resim`) VALUES
(2, 'LOGO 2', 'logo-2.png'),
(3, 'LOGO 3', 'logo-3.png'),
(4, 'LOGO 4', 'logo-4.png'),
(5, 'LOGO 5', 'logo-5.png'),
(13, 'LOGO1', '138055dbded_logo-1.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `yorum_resim` varchar(500) NOT NULL,
  `yorum_isim` varchar(500) NOT NULL,
  `yorum_meslek` varchar(500) NOT NULL,
  `yorum_aciklama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`yorum_id`, `yorum_resim`, `yorum_isim`, `yorum_meslek`, `yorum_aciklama`) VALUES
(1, 'testimonial-1.jpg', 'Mehmet Kerem Yıldız', 'Daire Sahibi', 'Çok iyi bir çalışma çıkarmışlar teşekkür ediyorum.'),
(2, 'testimonial-2.jpg', 'Selim Akça', 'Arsa Sahibi', 'Arsamı işinin ehli kişilere teslim ettiğim için mutluyum.'),
(3, 'testimonial-3.jpg', 'Volkan Arıcı', 'Bina içi dekorasyon', 'Evimin iç dekorasyona ihtiyacı vardı ve güvenim boşa çıkmadı.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`site_id`);

--
-- Tablo için indeksler `basarilarimiz`
--
ALTER TABLE `basarilarimiz`
  ADD PRIMARY KEY (`basari_id`);

--
-- Tablo için indeksler `ekipler`
--
ALTER TABLE `ekipler`
  ADD PRIMARY KEY (`ekip_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `hizmetler`
--
ALTER TABLE `hizmetler`
  ADD PRIMARY KEY (`hizmet_id`);

--
-- Tablo için indeksler `logofavicon`
--
ALTER TABLE `logofavicon`
  ADD PRIMARY KEY (`lf_id`);

--
-- Tablo için indeksler `mesajlar`
--
ALTER TABLE `mesajlar`
  ADD PRIMARY KEY (`mesaj_id`);

--
-- Tablo için indeksler `projeler`
--
ALTER TABLE `projeler`
  ADD PRIMARY KEY (`proje_id`);

--
-- Tablo için indeksler `rezervasyon`
--
ALTER TABLE `rezervasyon`
  ADD PRIMARY KEY (`rez_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  ADD PRIMARY KEY (`sm_id`);

--
-- Tablo için indeksler `sponsorlar`
--
ALTER TABLE `sponsorlar`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `basarilarimiz`
--
ALTER TABLE `basarilarimiz`
  MODIFY `basari_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `ekipler`
--
ALTER TABLE `ekipler`
  MODIFY `ekip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `hizmetler`
--
ALTER TABLE `hizmetler`
  MODIFY `hizmet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tablo için AUTO_INCREMENT değeri `logofavicon`
--
ALTER TABLE `logofavicon`
  MODIFY `lf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `mesajlar`
--
ALTER TABLE `mesajlar`
  MODIFY `mesaj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `projeler`
--
ALTER TABLE `projeler`
  MODIFY `proje_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Tablo için AUTO_INCREMENT değeri `rezervasyon`
--
ALTER TABLE `rezervasyon`
  MODIFY `rez_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tablo için AUTO_INCREMENT değeri `sosyalmedya`
--
ALTER TABLE `sosyalmedya`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Tablo için AUTO_INCREMENT değeri `sponsorlar`
--
ALTER TABLE `sponsorlar`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
