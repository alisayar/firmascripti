    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["yorum-guncelle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["yorum-guncelle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["yorum-guncelle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["yorum-ekle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["yorum-ekle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Ekleme Başarılı
                </div>
            <?php
            } else if ($_GET["yorum-ekle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Ekleme Başarısız
                </div>
            <?php
            } else if ($_GET["yorum-ekle"] == "gecersizuzanti") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Geçersiz uzantı!
                </div>
            <?php
            }else if ($_GET["yorum-ekle"] == "buyuk") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boyut büyük!
                </div>
            <?php
            }else if($_GET["yorum-sil"]=="yes"){
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Silme Başarılı
                </div>
             <?php   
            }else if ($_GET["yorum-sil"=="no"]){
                ?>
                 <div class="alert alert-danger">
                    <strong>Hata!</strong> Silme Başarısız
                </div>
                <?php
            }
            ?>
            <div class="block-header">
                <h2>YORUMLAR</h2>
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
                                        <th>Meslek</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $yorumlar = $db->prepare("SELECT * FROM yorumlar ORDER BY yorum_id DESC");
                                    $yorumlar ->execute();
                                    $yorum_cek = $yorumlar ->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $yorumlar->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($yorum_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["yorum_id"]; ?></th>
                                                <td><img width="85" height="80" src="../images/yorumlar/<?php echo $row["yorum_resim"]; ?>" alt="<?php echo $row["yorum_isim"]; ?>"></td>
                                                <td><?php echo $row["yorum_isim"]; ?></td>
                                                <td><?php echo $row["yorum_meslek"]; ?></td>

                                                <td>
                                                    <a href="yorum-duzenle.php?yorum_id=<?php echo $row["yorum_id"]; ?>"><button class="btn btn-primary">Düzenle</button></a>
                                                    <a href="islem.php?yorumsil_id=<?php echo $row["yorum_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <td>Yorum Bulunmuyor</td>
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