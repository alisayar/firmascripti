<?php

include "../config/database.php";
include "kontrol.php";

//SİTE AYARLARI

extract($_POST);
if (isset($_POST["ayarlar"])) {
    $site_id = $_GET["site_id"];

    if (!$site_title || !$site_url || !$site_desc || !$site_keyw || !$site_tel || !$site_mail || !$site_saat || !$site_adres || !$site_footer || !$site_harita) {
        header("Location: site-ayarlari.php?site-guncelle=bos");
    } else {
        $query = $db->prepare("UPDATE ayarlar SET site_title=?,site_url=?,site_desc=?,site_keyw=?,site_tel=?,site_mail=?,site_saat=?,site_adres=?,site_footer=?,site_harita=? WHERE site_id=?");
        $update = $query->execute(array($site_title, $site_url, $site_desc, $site_keyw, $site_tel, $site_mail, $site_saat, $site_adres, $site_footer, $site_harita, $site_id));
        if ($update) {
            header("Location: site-ayarlari.php?site-guncelle=yes");
        } else {
            header("Location: site-ayarlari.php?site-guncelle=no");
        }
    }
}

//HAKKIMIZDA AYARLARI

extract($_POST);
if (isset($_POST["hakkimizda"])) {
    $hakkimizda_id = $_GET["hakkimizda_id"];

    if (!$hakkimizda_baslik || !$hakkimizda_medya || !$hakkimizda_aciklama || !$hakkimizda_vizyon || !$hakkimizda_misyon) {
        header("Location: hakkimizda.php?site-guncelle=bos");
    } else {
        $query = $db->prepare("UPDATE hakkimizda SET hakkimizda_baslik=?,hakkimizda_medya=?,hakkimizda_aciklama=?,hakkimizda_vizyon=?,hakkimizda_misyon=? WHERE hakkimizda_id=?");
        $update = $query->execute(array($hakkimizda_baslik, $hakkimizda_medya, $hakkimizda_aciklama, $hakkimizda_vizyon, $hakkimizda_misyon, $hakkimizda_id));
        if ($update) {
            header("Location: hakkimizda.php?hakkimizda-guncelle=yes");
        } else {
            header("Location: hakkimizda.php?hakkimizda-guncelle=no");
        }
    }
}

//REZERVASYON AYARLARI

extract($_POST);
if (isset($rezervasyon)) {
    $rez_id = $_GET["rez_id"];

    if (!$rez_link || !$rez_normalyazi || !$rez_kalinyazi) {
        header("Location: rezervasyon.php?rezervasyon-guncelle=bos");
    } else {
        $query = $db->prepare("UPDATE rezervasyon SET rez_link=?,rez_normalyazi=?,rez_kalinyazi=? WHERE rez_id=?");
        $update = $query->execute(array($rez_link, $rez_normalyazi, $rez_kalinyazi, $rez_id));
        if ($update) {
            header("Location: rezervasyon.php?rezervasyon-guncelle=yes");
        } else {
            header("Location: rezervasyon.php?rezervasyon-guncelle=no");
        }
    }
}

//BAŞARI GÜNCELLE
extract($_POST);
if (isset($basari_duzenle)) {
    $basari_id = $_GET["basari_id"];

    if (!$basari_icon || !$basari_isim || !$basari_sayi) {
        header("Location: basarilarimiz.php?basari-guncelle=bos");
    } else {
        $query = $db->prepare("UPDATE basarilarimiz SET basari_icon=?,basari_isim=?,basari_sayi=? WHERE basari_id=?");
        $update = $query->execute(array($basari_icon, $basari_isim, $basari_sayi, $basari_id));
        if ($update) {
            header("Location: basarilarimiz.php?basari-guncelle=yes");
        } else {
            header("Location: basarilarimiz.php?basari-guncelle=no");
        }
    }
}

//Hizmet Ekleme
extract($_POST);
if (isset($hizmet_ekle)) {
    if (!$hizmet_icon || !$hizmet_baslik || !$hizmet_aciklama) {
        header("Location: hizmetler.php?hizmet-ekle=bos");
    } else {
        $query = $db->prepare("INSERT INTO hizmetler SET hizmet_icon=?, hizmet_baslik=?, hizmet_aciklama=?");
        $insert = $query->execute(array($hizmet_icon, $hizmet_baslik, $hizmet_aciklama));
        if ($insert) {
            header("Location: hizmetler.php?hizmet-ekle=yes");
        } else {
            header("Location: hizmetler.php?hizmet-ekle=no");
        }
    }
}

//HİZMET GÜNCELLE
extract($_POST);
if (isset($hizmet_duzenle)) {
    $hizmet_id = $_GET["hizmet_id"];

    if (!$hizmet_icon || !$hizmet_baslik || !$hizmet_aciklama) {
        header("Location: hizmetler.php?hizmet-guncelle=bos");
    } else {
        $query = $db->prepare("UPDATE hizmetler SET hizmet_icon=?,hizmet_baslik =?,hizmet_aciklama=? WHERE hizmet_id=?");
        $update = $query->execute(array($hizmet_icon, $hizmet_baslik, $hizmet_aciklama, $hizmet_id));
        if ($update) {
            header("Location: hizmetler.php?hizmet-guncelle=yes");
        } else {
            header("Location: hizmetler.php?hizmet-guncelle=no");
        }
    }
}

//HİZMET SİLME
extract($_GET);
if (isset($hizmetsil_id)) {
    $query = $db->prepare("DELETE FROM hizmetler WHERE hizmet_id=?");
    $delete = $query->execute(array($hizmetsil_id));
    if ($delete) {
        header("Location:hizmetler.php?hizmet-sil=yes");
    } else {
        header("Location: hizmetler.php?hizmet-sil=no");
    }
}

//SPONSOR EKLE //Bilgisayardan yükleme işlemi yapacağımız için (foto) farklı diğerlerinden

extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");

if (isset($sponsor_ekle)) {
    $kaynak = $_FILES["sponsor_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
    $isim = $_FILES["sponsor_resim"]["name"]; //fotonun ismi
    $boyut = $_FILES["sponsor_resim"]["size"]; //fotonun boyutu
    $turu = $_FILES["sponsor_resim"]["type"]; //fotonun türü

    $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
    $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
    $hedef = "../images/sponsorlar/" . $resimAd; //fotonun ekleneceği yeri gösterdik

    if (!$_FILES["sponsor_resim"]["size"] > 0 || !$sponsor_isim) {
        header("Location:sponsorlar.php?sponsor-ekle=bos");
    } else {

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: sponsorlar.php?sponsor-ekle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: sponsorlar.php?sponsor-ekle=buyuk");
            } else {
                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("INSERT INTO sponsorlar SET sponsor_resim=?,sponsor_isim=?");
                    $insert = $query->execute(array($resimAd, $sponsor_isim));
                    if ($insert) {
                        header("Location: sponsorlar.php?sponsor-ekle=yes");
                    } else {
                        header("Location: sponsorlar.php?sponsor-ekle=no");
                    }
                }
            }
        }
    }
}

//SPONSOR GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($sponsor_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $sponsor_id = $_GET["sponsor_id"];

    if ($_FILES["sponsor_resim"]["size"] > 0) {

        $kaynak = $_FILES["sponsor_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["sponsor_resim"]["name"]; //fotonun ismi
        $boyut = $_FILES["sponsor_resim"]["size"]; //fotonun boyutu
        $turu = $_FILES["sponsor_resim"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/sponsorlar/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: sponsorlar.php?sponsor-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: sponsorlar.php?sponsor-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM sponsorlar WHERE sponsor_id=?");
                $sil->execute(array($sponsor_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["sponsor_resim"]; //eski resmi silmek için gerekli

                unlink("../images/sponsorlar/" . $eski_resim["sponsor_resim"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE sponsorlar SET sponsor_resim=?,sponsor_isim=? WHERE sponsor_id=?");
                    $insert = $query->execute(array($resimAd, $sponsor_isim, $sponsor_id));
                    if ($insert) {
                        header("Location: sponsorlar.php?sponsor-guncelle=yes");
                    } else {
                        header("Location: sponsorlar.php?sponsor-guncelle=no");
                    }
                }
            }
        }
    } else {
        $query = $db->prepare("UPDATE sponsorlar SET sponsor_isim=? WHERE sponsor_id");
        $update = $query->execute(array($sponsor_isim, $sponsor_id));
        if ($update) {
            header("Location: sponsorlar.php?sponsor-guncelle=yes");
        } else {
            header("Location: sponsorlar.php?sponsor-guncelle=no");
        }
    }
}

//SPONSOR SİLME
extract($_GET);
if (isset($sponsorsil_id)) {
    // önceki resmi silme
    $sil = $db->prepare("SELECT * FROM sponsorlar WHERE sponsor_id=?");
    $sil->execute(array($sponsorsil_id));
    $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["sponsor_resim"]; //eski resmi silmek için gerekli

    unlink("../images/sponsorlar/" . $eski_resim["sponsor_resim"]);

    $query = $db->prepare("DELETE FROM sponsorlar WHERE sponsor_id=?");
    $delete = $query->execute(array($sponsorsil_id));
    if ($delete) {
        header("Location: sponsorlar.php?sponsor-sil=yes");
    } else {
        header("Location: sponsorlar.php?sponsor-sil=no");
    }
}


//PROJE EKLE 

extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");

if (isset($proje_ekle)) {
    $kaynak = $_FILES["proje_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
    $isim = $_FILES["proje_resim"]["name"]; //fotonun ismi
    $boyut = $_FILES["proje_resim"]["size"]; //fotonun boyutu
    $turu = $_FILES["proje_resim"]["type"]; //fotonun türü

    $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
    $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
    $hedef = "../images/gallery/" . $resimAd; //fotonun ekleneceği yeri gösterdik

    if (!$_FILES["proje_resim"]["size"] > 0 || !$proje_isim || !$proje_link) {
        header("Location:projeler.php?proje-ekle=bos");
    } else {

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: projeler.php?proje-ekle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: projeler.php?proje-ekle=buyuk");
            } else {
                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("INSERT INTO projeler SET proje_resim=?,proje_isim=?,proje_link=?");
                    $insert = $query->execute(array($resimAd, $proje_isim, $proje_link));
                    if ($insert) {
                        header("Location: projeler.php?proje-ekle=yes");
                    } else {
                        header("Location: projeler.php?proje-ekle=no");
                    }
                }
            }
        }
    }
}

//PROJE GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($proje_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $proje_id = $_GET["proje_id"];

    if ($_FILES["proje_resim"]["size"] > 0) {

        $kaynak = $_FILES["proje_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["proje_resim"]["name"]; //fotonun ismi
        $boyut = $_FILES["proje_resim"]["size"]; //fotonun boyutu
        $turu = $_FILES["proje_resim"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/gallery/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: projeler.php?proje-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: projeler.php?proje-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM projeler WHERE proje_id=?");
                $sil->execute(array($proje_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["proje_resim"]; //eski resmi silmek için gerekli

                unlink("../images/gallery/" . $eski_resim["proje_resim"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE projeler SET proje_resim=?,proje_isim=?,proje_link=? WHERE proje_id=?");
                    $insert = $query->execute(array($resimAd, $proje_isim, $proje_link, $proje_id));
                    if ($insert) {
                        header("Location: projeler.php?proje-guncelle=yes");
                    } else {
                        header("Location: projeler.php?proje-guncelle=no");
                    }
                }
            }
        }
    } else {
        $query = $db->prepare("UPDATE projeler SET proje_isim=?, proje_link=? WHERE proje_id=?");
        $update = $query->execute(array($proje_isim, $proje_link, $proje_id));
        if ($update) {
            header("Location: projeler.php?proje-guncelle=yes");
        } else {
            header("Location: projeler.php?proje-guncelle=no");
        }
    }
}

//PROJE SİLME
extract($_GET);
if (isset($projesil_id)) {
    // önceki resmi silme
    $sil = $db->prepare("SELECT * FROM projeler WHERE proje_id=?");
    $sil->execute(array($projesil_id));
    $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["proje_resim"]; //eski resmi silmek için gerekli

    unlink("../images/gallery/" . $eski_resim["proje_resim"]);

    $query = $db->prepare("DELETE FROM projeler WHERE proje_id=?");
    $delete = $query->execute(array($projesil_id));
    if ($delete) {
        header("Location: projeler.php?proje-sil=yes");
    } else {
        header("Location: projeler.php?proje-sil=no");
    }
}

//YORUM EKLE 

extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");

if (isset($yorum_ekle)) {
    $kaynak = $_FILES["yorum_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
    $isim = $_FILES["yorum_resim"]["name"]; //fotonun ismi
    $boyut = $_FILES["yorum_resim"]["size"]; //fotonun boyutu
    $turu = $_FILES["yorum_resim"]["type"]; //fotonun türü

    $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
    $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
    $hedef = "../images/yorumlar/" . $resimAd; //fotonun ekleneceği yeri gösterdik

    if (!$_FILES["yorum_resim"]["size"] > 0 || !$yorum_isim || !$yorum_meslek || !$yorum_aciklama) {
        header("Location:yorumlar.php?yorum-ekle=bos");
    } else {

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location:yorumlar.php?yorum-ekle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location:yorumlar.php?yorum-ekle=buyuk");
            } else {
                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("INSERT INTO yorumlar SET yorum_resim=?,yorum_isim=?,yorum_meslek=?,yorum_aciklama=?");
                    $insert = $query->execute(array($resimAd, $yorum_isim, $yorum_meslek, $yorum_aciklama));
                    if ($insert) {
                        header("Location:yorumlar.php?yorum-ekle=yes");
                    } else {
                        header("Location:yorumlar.php?yorum-ekle=no");
                    }
                }
            }
        }
    }
}

//YORUM GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($yorum_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $yorum_id = $_GET["yorum_id"];

    if ($_FILES["yorum_resim"]["size"] > 0) {

        $kaynak = $_FILES["yorum_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["yorum_resim"]["name"]; //fotonun ismi
        $boyut = $_FILES["yorum_resim"]["size"]; //fotonun boyutu
        $turu = $_FILES["yorum_resim"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/yorumlar/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: yorumlar.php?yorum-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: yorumlar.php?yorum-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM yorumlar WHERE yorum_id=?");
                $sil->execute(array($yorum_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["yorum_resim"]; //eski resmi silmek için gerekli

                unlink("../images/yorumlar/" . $eski_resim["yorum_resim"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE yorumlar SET yorum_resim=?,yorum_isim=?,yorum_meslek=?,yorum_aciklama=? WHERE yorum_id=?");
                    $update = $query->execute(array($resimAd, $yorum_isim, $yorum_meslek, $yorum_aciklama, $yorum_id));
                    if ($update) {
                        header("Location: yorumlar.php?yorum-guncelle=yes");
                    } else {
                        header("Location: yorumlar.php?yorum-guncelle=no");
                    }
                }
            }
        }
    } else {
        $query = $db->prepare("UPDATE yorumlar SET yorum_isim=?, yorum_meslek=?, yorum_aciklama=? WHERE yorum_id=?");
        $update = $query->execute(array($yorum_isim, $yorum_meslek, $yorum_aciklama, $yorum_id));
        if ($update) {
            header("Location: yorumlar.php?yorum-guncelle=yes");
        } else {
            header("Location: yorumlar.php?yorum-guncelle=no");
        }
    }
}

//YORUM SİLME
extract($_GET);
if (isset($yorumsil_id)) {
    // önceki resmi silme
    $sil = $db->prepare("SELECT * FROM yorumlar WHERE yorum_id=?");
    $sil->execute(array($projesil_id));
    $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["yorum_resim"]; //eski resmi silmek için gerekli

    unlink("../images/yorumlar/" . $eski_resim["yorum_resim"]);

    $query = $db->prepare("DELETE FROM yorumlar WHERE yorum_id=?");
    $delete = $query->execute(array($yorumsil_id));
    if ($delete) {
        header("Location: yorumlar.php?yorum-sil=yes");
    } else {
        header("Location: yorumlar.php?yorum-sil=no");
    }
}

//EKİP EKLE 

extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");

if (isset($ekip_ekle)) {
    $kaynak = $_FILES["ekip_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
    $isim = $_FILES["ekip_resim"]["name"]; //fotonun ismi
    $boyut = $_FILES["ekip_resim"]["size"]; //fotonun boyutu
    $turu = $_FILES["ekip_resim"]["type"]; //fotonun türü

    $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
    $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
    $hedef = "../images/team/" . $resimAd; //fotonun ekleneceği yeri gösterdik

    if (!$_FILES["ekip_resim"]["size"] > 0 || !$ekip_isim || !$ekip_mevki || !$ekip_facebook || !$ekip_twitter || !$ekip_linkedin) {
        header("Location:ekipler.php?ekip-ekle=bos");
    } else {

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location:ekipler.php?ekip-ekle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location:ekipler.php?ekip-ekle=buyuk");
            } else {
                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("INSERT INTO ekipler SET ekip_resim=?,ekip_isim=?,ekip_mevki=?,ekip_facebook=?,ekip_twitter=?,ekip_linkedin=?");
                    $insert = $query->execute(array($resimAd, $ekip_isim, $ekip_mevki, $ekip_facebook, $ekip_twitter, $ekip_linkedin));
                    if ($insert) {
                        header("Location:ekipler.php?ekip-ekle=yes");
                    } else {
                        header("Location:ekipler.php?ekip-ekle=no");
                    }
                }
            }
        }
    }
}

//EKİP GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($ekip_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $ekip_id = $_GET["ekip_id"];

    if ($_FILES["ekip_resim"]["size"] > 0) {

        $kaynak = $_FILES["ekip_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["ekip_resim"]["name"]; //fotonun ismi
        $boyut = $_FILES["ekip_resim"]["size"]; //fotonun boyutu
        $turu = $_FILES["ekip_resim"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/team/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: ekipler.php?ekip-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: ekipler.php?ekip-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM ekipler WHERE ekip_id=?");
                $sil->execute(array($yorum_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["ekip_resim"]; //eski resmi silmek için gerekli

                unlink("../images/team/" . $eski_resim["ekip_resim"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE ekipler SET ekip_resim=?,ekip_isim=?,ekip_mevki=?,ekip_facebook=?,ekip_twitter=?,ekip_linkedin=? WHERE ekip_id=?");
                    $update = $query->execute(array($resimAd, $ekip_isim, $ekip_mevki, $ekip_facebook, $ekip_twitter, $ekip_linkedin, $ekip_id));
                    if ($update) {
                        header("Location: ekipler.php?ekip-guncelle=yes");
                    } else {
                        header("Location: ekipler.php?ekip-guncelle=no");
                    }
                }
            }
        }
    } else {
        $query = $db->prepare("UPDATE ekipler SET ekip_isim=?, ekip_mevki=?, ekip_facebook=?, ekip_twitter=?, ekip_linkedin=? WHERE ekip_id=?");
        $update = $query->execute(array($ekip_isim, $ekip_mevki, $ekip_facebook, $ekip_twitter, $ekip_linkedin, $ekip_id));
        if ($update) {
            header("Location: ekipler.php?ekip-guncelle=yes");
        } else {
            header("Location: ekipler.php?ekip-guncelle=no");
        }
    }
}

//EKİP SİLME
extract($_GET);
if (isset($ekipsil_id)) {
    // önceki resmi silme
    $sil = $db->prepare("SELECT * FROM ekipler WHERE ekip_id=?");
    $sil->execute(array($ekipsil_id));
    $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["ekip_resim"]; //eski resmi silmek için gerekli

    unlink("../images/team/" . $eski_resim["ekip_resim"]);

    $query = $db->prepare("DELETE FROM ekipler WHERE ekip_id=?");
    $delete = $query->execute(array($ekipsil_id));
    if ($delete) {
        header("Location: ekipler.php?ekip-sil=yes");
    } else {
        header("Location: ekipler.php?ekip-sil=no");
    }
}

//SLİDER EKLE 

extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");

if (isset($slider_ekle)) {
    $kaynak = $_FILES["slider_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
    $isim = $_FILES["slider_resim"]["name"]; //fotonun ismi
    $boyut = $_FILES["slider_resim"]["size"]; //fotonun boyutu
    $turu = $_FILES["slider_resim"]["type"]; //fotonun türü

    $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
    $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
    $hedef = "../images/slider/" . $resimAd; //fotonun ekleneceği yeri gösterdik

    if (!$_FILES["slider_resim"]["size"] > 0 || !$slider_renklibaslik || !$slider_normalbaslik || !$slider_paragraf || !$slider_link) {
        header("Location:slider.php?slider-ekle=bos");
    } else {

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location:slider.php?slider-ekle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location:slider.php?slider-ekle=buyuk");
            } else {
                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("INSERT INTO slider SET slider_resim=?,slider_renklibaslik=?,slider_normalbaslik=?,slider_paragraf=?,slider_link=?");
                    $insert = $query->execute(array($resimAd, $slider_renklibaslik, $slider_normalbaslik, $slider_paragraf, $slider_link));
                    if ($insert) {
                        header("Location:slider.php?slider-ekle=yes");
                    } else {
                        header("Location:slider.php?slider-ekle=no");
                    }
                }
            }
        }
    }
}

//SLİDER GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($slider_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $slider_id = $_GET["slider_id"];

    if ($_FILES["slider_resim"]["size"] > 0) {

        $kaynak = $_FILES["slider_resim"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["slider_resim"]["name"]; //fotonun ismi
        $boyut = $_FILES["slider_resim"]["size"]; //fotonun boyutu
        $turu = $_FILES["slider_resim"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/slider/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: slider.php?slider-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: slider.php?slider-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM slider WHERE slider_id=?");
                $sil->execute(array($slider_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["slider_resim"]; //eski resmi silmek için gerekli

                unlink("../images/slider/" . $eski_resim["slider_resim"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE slider SET slider_resim=?,slider_renklibaslik=?,slider_normalbaslik=?,slider_paragraf=?,slider_link=? WHERE slider_id=?");
                    $update = $query->execute(array($resimAd, $slider_renklibaslik, $slider_normalbaslik, $slider_paragraf, $slider_link, $slider_id));
                    if ($update) {
                        header("Location: slider.php?slider-guncelle=yes");
                    } else {
                        header("Location: slider.php?slider-guncelle=no");
                    }
                }
            }
        }
    } else {
        $query = $db->prepare("UPDATE slider SET slider_renklibaslik=?, slider_normalbaslik=?, slider_paragraf=?, slider_link=? WHERE slider_id=?");
        $update = $query->execute(array($slider_renklibaslik, $slider_normalbaslik, $slider_paragraf, $slider_link, $slider_id));
        if ($update) {
            header("Location: slider.php?slider-guncelle=yes");
        } else {
            header("Location: slider.php?slider-guncelle=no");
        }
    }
}

//SLİDER SİLME
extract($_GET);
if (isset($slidersil_id)) {
    // önceki resmi silme
    $sil = $db->prepare("SELECT * FROM slider WHERE slider_id=?");
    $sil->execute(array($slidersil_id));
    $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
    $eski_resim["slider_resim"]; //eski resmi silmek için gerekli

    unlink("../images/slider/" . $eski_resim["slider_resim"]);

    $query = $db->prepare("DELETE FROM slider WHERE slider_id=?");
    $delete = $query->execute(array($slidersil_id));
    if ($delete) {
        header("Location: slider.php?slider-sil=yes");
    } else {
        header("Location: slider.php?slider-sil=no");
    }
}

//LOGO GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($logo_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $logo_id = $_GET["logo_id"];

    if ($_FILES["lf_logo"]["size"] > 0) {

        $kaynak = $_FILES["lf_logo"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["lf_logo"]["name"]; //fotonun ismi
        $boyut = $_FILES["lf_logo"]["size"]; //fotonun boyutu
        $turu = $_FILES["lf_logo"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/logofavicon/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: logo-favicon.php?logo-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: logo-favicon.php?logo-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM logofavicon WHERE lf_id=?");
                $sil->execute(array($logo_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["lf_logo"]; //eski resmi silmek için gerekli

                unlink("../images/logofavicon/" . $eski_resim["lf_logo"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE logofavicon SET lf_logo=? WHERE lf_id=?");
                    $update = $query->execute(array($resimAd, $logo_id));
                    if ($update) {
                        header("Location: logo-favicon.php?logo-guncelle=yes");
                    } else {
                        header("Location: logo-favicon.php?logo-guncelle=no");
                    }
                }
            }
        }
    }
}

//FAVICON GÜNCELLE
extract($_POST);
$DosyaTuru = array("image/jpeg", "image/jpg", "image/png", "image/x-png"); //yüklenebilecek dosyaları belirledik
$DosyaUzanti = array("jpeg", "jpg", "png", "x-png");
if (isset($favicon_duzenle)) { //butonun name'ini değişken olarak aldık extract sayesinde
    $favicon_id = $_GET["favicon_id"];

    if ($_FILES["lf_favicon"]["size"] > 0) {

        $kaynak = $_FILES["lf_favicon"]["tmp_name"]; //tmp_name fotonun geçici yüklendiği isim
        $isim = $_FILES["lf_favicon"]["name"]; //fotonun ismi
        $boyut = $_FILES["lf_favicon"]["size"]; //fotonun boyutu
        $turu = $_FILES["lf_favicon"]["type"]; //fotonun türü

        $uzanti = substr($isim, strpos($isim, ".") + 1); // isimdeki noktayı bulup oradan sonra okuyacak yani uzantıyı bulacak
        $resimAd = substr(uniqid(rand()), 0, 11) . "_" . $isim; //fotonun yeni ismini belirledik
        $hedef = "../images/logofavicon/" . $resimAd; //fotonun ekleneceği yeri gösterdik

        if ($kaynak) {
            if (!in_array($turu, $DosyaTuru) && !in_array($uzanti, $DosyaUzanti)) { //dosya türünde ve dosya uzantısı belirttiklerimizin içinde mi kontrolü
                header("Location: logo-favicon.php?favicon-guncelle=gecersizuzanti");
            } else if ($boyut > 1024 * 1024 * 5) {
                header("Location: logo-favicon.php?favicon-guncelle=buyuk");
            } else {
                // önceki resmi silme
                $sil = $db->prepare("SELECT * FROM logofavicon WHERE lf_id=?");
                $sil->execute(array($favicon_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["lf_favicon"]; //eski resmi silmek için gerekli

                unlink("../images/logofavicon/" . $eski_resim["lf_favicon"]);

                if (move_uploaded_file($kaynak, $hedef)) {
                    $query = $db->prepare("UPDATE logofavicon SET lf_favicon=? WHERE lf_id=?");
                    $update = $query->execute(array($resimAd, $favicon_id));
                    if ($update) {
                        header("Location: logo-favicon.php?favicon-guncelle=yes");
                    } else {
                        header("Location: logo-favicon.php?favicon-guncelle=no");
                    }
                }
            }
        }
    }
}

//Admin Güncelleme
extract($_POST);
if (isset($kadi_degistir)) {
    $admin_id = $_GET["admin_id"];

    if ($admin_kadi) {
        $adminguncelle = $db->prepare("UPDATE admin SET admin_kadi=? WHERE admin_id=?");
        $adminupdate = $adminguncelle->execute(array($admin_kadi, $admin_id));

        if ($adminupdate) {
            header("Location: profil.php?update=yes");
        } else {
            header("Location: profil.php?update=no");
        }
    } else {
        header("Location:profil.php?update=bos");
    }
}

//Şifre Güncelle
if (isset($_POST["sifre_degistir"])) {
    $id = $_GET["admin_id"];

    $eski_sifre = md5($_POST["eski_sifre"]);
    $yeni_sifre = md5($_POST["yeni_sifre"]);

    $kullanicisor = $db->prepare("SELECT * FROM admin where admin_sifre=:admin_sifre");
    $kullanicisor->execute(array(
        'admin_sifre' => $eski_sifre
    ));

    //dönen satır sayısını belirtir
    $say = $kullanicisor->rowCount();

    if ($say == 0) {
        header("Location:profil.php?update=eskisifrehata");
    } else {
        $adminguncelle = $db->prepare("UPDATE admin SET admin_sifre=? WHERE admin_id=?");
        $adminupdate = $adminguncelle->execute(array($yeni_sifre, $id));

        if ($adminupdate) {
            header("Location: profil.php?update=yes");
        } else {
            header("Location: profil.php?update=no");
        }
    }
}
//Admin Giriş İşlemi 
if(isset($_POST["giris"])){
    $admin_kadi = htmlspecialchars(trim($_POST["admin_kadi"]));
    $admin_sifre = htmlspecialchars(trim(md5($_POST["admin_sifre"])));

    if(!$admin_kadi || !$admin_sifre){
        header("Location:login.php?giris=bos");
    } else{
        $query = $db->prepare("SELECT *  FROM  admin WHERE admin_kadi=? AND admin_sifre=?");
        $query->execute(array($admin_kadi,$admin_sifre));
        $admin_giris = $query->fetch(PDO::FETCH_ASSOC);

        if($admin_giris){

            $_SESSION["login"] = true;
            $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
            $_SESSION["admin_id"] = $admin_giris["admin_id"];

            header("Location:index.php");
        } else {
            header("Location:login.php?giris=no");
        }
    }
}
//Mesaj Silme İşlemi
extract($_GET);
if (isset($mesajsil_id)) {
    $query = $db->prepare("DELETE FROM mesajlar WHERE mesaj_id=?");
    $delete = $query->execute(array($mesajsil_id));
    if ($delete) {
        header("Location:mesajlar.php?mesaj-sil=yes");
    } else {
        header("Location: mesajlar.php?mesaj-sil=no");
    }
}