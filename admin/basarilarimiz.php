﻿    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
             <!-- Geri dönüş uyarıları -->
             <?php
                if($_GET["basari-guncelle"]=="bos"){
                    ?>
                    <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                    </div>
                    <?php
                } else if($_GET["basari-guncelle"]=="yes"){
                    ?>
                   <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                    </div>
                    <?php
                } else if($_GET["basari-guncelle"]=="no"){
                    ?>
                    <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                    </div>
                    <?php
                }
            ?>
            <div class="block-header">
                <h2>BAŞARILARIMIZ</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Icon</th>
                                        <th>İsim</th>
                                        <th>Sayı</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $basarilar = $db->prepare("SELECT * FROM basarilarimiz ORDER BY basari_id DESC");
                                    $basarilar->execute();
                                    $basari_cek = $basarilar->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $basarilar->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($basari_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["basari_id"];?></th>
                                                <td><big><i class="fa fa-<?php echo $row["basari_icon"];?>"></i></big></td>
                                                <td><?php echo $row["basari_isim"]; ?></td>
                                                <td><?php echo $row["basari_sayi"]; ?></td>
                                                <td>
                                                    <a href="basari-duzenle.php?basari_id=<?php echo $row["basari_id"];?>"><button class="btn btn-primary">Düzenle</button></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    } else{
                                        ?>
                                        <td>Başarı Bulunmuyor</td>
                                        <?php
                                    }

                                    ?>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>