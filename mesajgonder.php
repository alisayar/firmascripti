<?php 

include "config/database.php"; //veritabanına gönderilen mesajların kaydını gerçekleştirecek

extract($_POST); //post ile gönderilen verileri değişken olarak alabiliyoruz
if($_POST){
    if(!$isim || !$mail || !$konu ||!$mesaj){
        echo "bos";
    } else{
        $query = $db->prepare("INSERT INTO mesajlar SET mesaj_gonderenisim=?, mesaj_gonderenmail=?, mesaj_konu=?, mesaj_aciklama=?");
        $insert = $query->execute(array($isim,$mail,$konu,$mesaj));//formdaki name'ler

        if($insert){
            echo "yes";
        } else{
            echo "no";
        }
        
    }
}

?>