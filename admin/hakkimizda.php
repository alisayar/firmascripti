    <!--- HEADER -->
    <?php include "header.php";?>

    <!-- SIDE BAR -->
   <?php include "sidebar.php";?>

   <?php
    $hakkimizda = $db->prepare("SELECT * FROM hakkimizda");
    $hakkimizda->execute();
    $hakkimizdacek = $hakkimizda->fetch(PDO::FETCH_ASSOC);
   ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
                if($_GET["hakkimizda-guncelle"]=="bos"){
                    ?>
                    <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                    </div>
                    <?php
                } else if($_GET["hakkimizda-guncelle"]=="yes"){
                    ?>
                   <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                    </div>
                    <?php
                } else if($_GET["hakkimizda-guncelle"]=="no"){
                    ?>
                    <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                    </div>
                    <?php
                }
            ?>
            <div class="block-header">
                <h2>HAKKIMIZDA</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="islem.php?hakkimizda_id=<?php echo $hakkimizdacek["hakkimizda_id"]; ?>" method="POST" class="form-horizontal">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Hakkımızda Başlık</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="hakkimizda_baslik" class="form-control" value="<?php echo $hakkimizdacek["hakkimizda_baslik"];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Youtube Video</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="hakkimizda_medya" value="<?php echo $hakkimizdacek["hakkimizda_medya"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Açıklama</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea name="hakkimizda_aciklama" class="ckeditor"><?php echo $hakkimizdacek["hakkimizda_aciklama"];?></textarea> <!--ck editör özelliği ekledik -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Vizyonumuz</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea name="hakkimizda_vizyon" class="ckeditor"><?php echo $hakkimizdacek["hakkimizda_vizyon"];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Misyonumuz</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                            <textarea name="hakkimizda_misyon" class="ckeditor"><?php echo $hakkimizdacek["hakkimizda_misyon"];?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="hakkimizda" class="btn btn-primary m-t-15 waves-effect">Güncelle</button>
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
    <?php include "footer.php";?>

    