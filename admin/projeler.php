    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["proje-guncelle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["proje-guncelle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["proje-guncelle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["proje-ekle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["proje-ekle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Ekleme Başarılı
                </div>
            <?php
            } else if ($_GET["proje-ekle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Ekleme Başarısız
                </div>
            <?php
            } else if ($_GET["proje-ekle"] == "gecersizuzanti") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Geçersiz uzantı!
                </div>
            <?php
            }else if ($_GET["proje-ekle"] == "buyuk") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boyut büyük!
                </div>
            <?php
            }else if($_GET["proje-sil"]=="yes"){
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Silme Başarılı
                </div>
             <?php   
            }else if ($_GET["proje-sil"=="no"]){
                ?>
                 <div class="alert alert-danger">
                    <strong>Hata!</strong> Silme Başarısız
                </div>
                <?php
            }
            ?>
            <div class="block-header">
                <h2>PROJELER</h2>
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
                                        <th>Link</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $projeler = $db->prepare("SELECT * FROM projeler ORDER BY proje_id DESC");
                                    $projeler->execute();
                                    $proje_cek = $projeler->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $projeler->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($proje_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["proje_id"]; ?></th>
                                                <td><img width="100" height="50" src="../images/gallery/<?php echo $row["proje_resim"]; ?>" alt="<?php echo $row["proje_isim"]; ?>"></td>
                                                <td><?php echo $row["proje_isim"]; ?></td>
                                                <td><?php echo $row["proje_link"]; ?></td>

                                                <td>
                                                    <a href="proje-duzenle.php?proje_id=<?php echo $row["proje_id"]; ?>"><button class="btn btn-primary">Düzenle</button></a>
                                                    <a href="islem.php?projesil_id=<?php echo $row["proje_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <td>Proje Bulunmuyor</td>
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