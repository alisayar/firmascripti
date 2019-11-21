    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["mesaj-sil"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["mesaj-sil"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["mesaj-sil"] == "no") { 
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
                <?php
            }
           ?>
            <div class="block-header">
                <h2>MESAJLAR</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Gönderen</th>
                                        <th>İsim</th>
                                        <th>Konu</th>
                                        <th>Tarih</th>
                                        <th>Durum</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $mesajlar = $db->prepare("SELECT * FROM mesajlar ORDER BY mesaj_id DESC");
                                    $mesajlar->execute();
                                    $mesaj_cek = $mesajlar->fetchAll(PDO::FETCH_ASSOC);
                                    $say = $mesajlar->rowCount();

                                    if ($say) { //say'da veri var ise döngüye girecek
                                        foreach ($mesaj_cek as $row) {
                                            if ($row["mesaj_okuma"] == 1) {

                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row["mesaj_id"]; ?></th>
                                                    <td><?php echo $row["mesaj_gonderenisim"]; ?></td>
                                                    <td><?php echo $row["mesaj_konu"]; ?></td>
                                                    <td><?php echo $row["mesaj_tarih"]; ?></td>
                                                    <td><span class="fa fa-eye" style="color: #ddd;"></span></td>
                                                    <td>
                                                        <a href="mesaj-oku.php?mesaj_id=<?php echo $row["mesaj_id"]; ?>"><button class="btn btn-primary">Oku</button></a>
                                                        <a href="islem.php?mesajsil_id=<?php echo $row["mesaj_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                    } else {
                                                        ?>
                                                <tr>
                                                    <th scope="row"><?php echo $row["mesaj_id"]; ?></th>
                                                    <td><?php echo $row["mesaj_gonderenisim"]; ?></td>
                                                    <td><?php echo $row["mesaj_konu"]; ?></td>
                                                    <td><?php echo $row["mesaj_tarih"]; ?></td>
                                                    <td><span class="fa fa-eye"></span></td>
                                                    <td>
                                                        <a href="mesaj-oku.php?mesaj_id=<?php echo $row["mesaj_id"]; ?>"><button class="btn btn-primary">Oku</button></a>
                                                        <a href="islem.php?mesajsil_id=<?php echo $row["mesaj_id"]; ?>"><button class="btn btn-danger">Sil</button></a>
                                                    </td>
                                                </tr>
                                        <?php
                                                }
                                            }
                                        } else {
                                            ?>
                                        <td>Mesaj Bulunmuyor</td>
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