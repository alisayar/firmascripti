    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <?php
    $admin_id = 1;
    $admin = $db->prepare("SELECT * FROM admin WHERE admin_id=?");
    $admin->execute(array($admin_id));
    $admin_cek = $admin->fetch(PDO::FETCH_ASSOC);
    ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
            if ($_GET["update"] == "bos") {
                ?>
                <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                </div>
            <?php
            } else if ($_GET["update"] == "yes") {
                ?>
                <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                </div>
            <?php
            } else if ($_GET["update"] == "no") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                </div>
            <?php
            } else if ($_GET["update"] == "eskisifrehata") {
                ?>
                <div class="alert alert-danger">
                    <strong>Hata!</strong> Eski Şifrenizi Yanlış Girdiniz!
                </div>
            <?php
            }
            ?>
            <div class="block-header">
                <h2>PROFİL DÜZENLE</h2>
            </div>

            <!-- Kullanıcı Adı -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="islem.php?admin_id=<?php echo $admin_id; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Kullanici Adı Değiştir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="admin_kadi" class="form-control" value="<?php echo $admin_cek["admin_kadi"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="kadi_degistir" class="btn btn-primary m-t-15 waves-effect">Düzenle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Şifre -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="islem.php?admin_id=<?php echo $admin_id ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Eski Şifre</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="eski_sifre" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Yeni Şifre</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="yeni_sifre" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="sifre_degistir" class="btn btn-primary m-t-15 waves-effect">Düzenle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>