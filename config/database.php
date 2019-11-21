<?php
session_start();
ob_start();

try{
    $db = new PDO("mysql:host=localhost; dbname=firma; charset=utf8;","root","12345678");
} catch(PDOException $hata){
    echo "database bağlantısı kurulamadı"; $hata->getMessage();
}

?>