    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["slider-guncelle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["slider-guncelle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["slider-guncelle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["slider-ekle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["slider-ekle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Ekleme Başarılı
                </div>
            <?php
            } else if ($_GET["slider-ekle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Ekleme Başarısız
                </div>
            <?php
            } else if ($_GET["slider-ekle"] == "gecersizuzanti") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Geçersiz uzantı!
                </div>
            <?php
            }else if ($_GET["slider-ekle"] == "buyuk") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boyut büyük!
                </div>
            <?php
            }else if($_GET["slider-sil"]=="yes"){
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Silme Başarılı
                </div>
             <?php   
            }else if ($_GET["slider-sil"=="no"]){
                ?>
                 <div class="alert alert-danger">
                    <strong>Hata!</strong> Silme Başarısız
                </div>
                <?php
            }
            ?>
            <div class="block-header">
                <h2>SLİDERLER</h2>
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
                                        <th>Renkli Başlık</th>
                                        <th>Normal Başlık</th>
                                        <th>Link</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sliderler = $db->prepare("SELECT * FROM slider ORDER BY slider_id DESC");
                                    $sliderler->execute();
                                    $slider_cek = $sliderler->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $sliderler->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($slider_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["slider_id"]; ?></th>
                                                <td><img width="100" height="50" src="../images/slider/<?php echo $row["slider_resim"]; ?>" alt="<?php echo $row["slider_renklibaslik"]; ?>"></td>
                                                <td><?php echo $row["slider_renklibaslik"]; ?></td>
                                                <td><?php echo $row["slider_normalbaslik"]; ?></td>
                                                <td><?php echo $row["slider_link"];?></td>
                                                <td>
                                                <a>
                                                    <a href="slider-duzenle.php?slider_id=<?php echo $row["slider_id"]; ?>"><button class="btn btn-primary">Düzenle</button></a>
                                                    <a href="islem.php?slidersil_id=<?php echo $row["slider_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                </a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <td>Slider Bulunmuyor</td>
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