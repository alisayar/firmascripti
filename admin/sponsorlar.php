    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["sponsor-guncelle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["sponsor-guncelle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["sponsor-guncelle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["sponsor-ekle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["sponsor-ekle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Ekleme Başarılı
                </div>
            <?php
            } else if ($_GET["sponsor-ekle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Ekleme Başarısız
                </div>
            <?php
            } else if ($_GET["sponsor-ekle"] == "gecersizuzanti") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Geçersiz uzantı!
                </div>
            <?php
            }else if ($_GET["sponsor-ekle"] == "buyuk") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boyut büyük!
                </div>
            <?php
            }else if($_GET["sponsor-sil"]=="yes"){
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Silme Başarılı
                </div>
             <?php   
            }else if ($_GET["sponsor-sil"=="no"]){
                ?>
                 <div class="alert alert-danger">
                    <strong>Hata!</strong> Silme Başarısız
                </div>
                <?php
            }
            ?>
            <div class="block-header">
                <h2>SPONSORLAR</h2>
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
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sponsorlar = $db->prepare("SELECT * FROM sponsorlar ORDER BY sponsor_id DESC");
                                    $sponsorlar->execute();
                                    $sponsor_cek = $sponsorlar->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $sponsorlar->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($sponsor_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["sponsor_id"]; ?></th>
                                                <td><img width="100" height="50" src="../images/sponsorlar/<?php echo $row["sponsor_resim"]; ?>" alt="<?php echo $row["sponsor_isim"]; ?>"></td>
                                                <td><?php echo $row["sponsor_isim"]; ?></td>

                                                <td>
                                                    <a href="sponsor-duzenle.php?sponsor_id=<?php echo $row["sponsor_id"]; ?>"><button class="btn btn-primary">Düzenle</button></a>
                                                    <a href="islem.php?sponsorsil_id=<?php echo $row["sponsor_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <td>Sponsor Bulunmuyor</td>
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