    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["hizmet-guncelle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["hizmet-guncelle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["hizmet-guncelle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["hizmet-ekle"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["hizmet-ekle"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Ekleme Başarılı
                </div>
            <?php
            } else if ($_GET["hizmet-ekle"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Ekleme Başarısız
                </div>
            <?php
            }
            ?>
            <div class="block-header">
                <h2>HİZMETLERİMİZ</h2>
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
                                        <th>Başlık</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $hizmetler = $db->prepare("SELECT * FROM hizmetler ORDER BY hizmet_id DESC");
                                    $hizmetler->execute();
                                    $hizmet_cek = $hizmetler->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $hizmetler->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($hizmet_cek as $row) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $row["hizmet_id"]; ?></th>
                                                <td><big><i class="fa fa-<?php echo $row["hizmet_icon"]; ?>"></i></big></td>
                                                <td><?php echo $row["hizmet_baslik"]; ?></td>

                                                <td>
                                                    <a href="hizmet-duzenle.php?hizmet_id=<?php echo $row["hizmet_id"]; ?>"><button class="btn btn-primary">Düzenle</button></a>
                                                    <a href="islem.php?hizmetsil_id=<?php echo $row["hizmet_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                </td>
                                            </tr>
                                        <?php
                                            }
                                        } else {
                                            ?>
                                        <td>Hizmet Bulunmuyor</td>
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