    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["ekip-guncelle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["ekip-guncelle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["ekip-guncelle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["ekip-ekle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["ekip-ekle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Ekleme Başarılı
                </div>
            <?php
            } else if ($_GET["ekip-ekle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Ekleme Başarısız
                </div>
            <?php
            } else if ($_GET["ekip-ekle"] == "gecersizuzanti") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Geçersiz uzantı!
                </div>
            <?php
            }else if ($_GET["ekip-ekle"] == "buyuk") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boyut büyük!
                </div>
            <?php
            }else if($_GET["ekip-sil"]=="yes"){
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Silme Başarılı
                </div>
             <?php   
            }else if ($_GET["ekip-sil"=="no"]){
                ?>
                 <div class="alert alert-danger">
                    <strong>Hata!</strong> Silme Başarısız
                </div>
                <?php
            }
            ?>
            <div class="block-header">
                <h2>EKİPLER</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fotoğraf</th>
                                        <th>İsim</th>
                                        <th>Mevki</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ekipler = $db->prepare("SELECT * FROM ekipler ORDER BY ekip_id DESC");
                                    $ekipler ->execute();
                                    $ekip_cek = $ekipler ->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $ekipler->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($ekip_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["ekip_id"]; ?></th>
                                                <td><img width="85" height="80" src="../images/team/<?php echo $row["ekip_resim"]; ?>" alt="<?php echo $row["ekip_isim"]; ?>"></td>
                                                <td><?php echo $row["ekip_isim"]; ?></td>
                                                <td><?php echo $row["ekip_mevki"]; ?></td>

                                                <td>
                                                    <a href="ekip-duzenle.php?ekip_id=<?php echo $row["ekip_id"]; ?>"><button class="btn btn-primary">Düzenle</button></a>
                                                    <a href="islem.php?ekipsil_id=<?php echo $row["ekip_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <td>Ekip Bulunmuyor</td>
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