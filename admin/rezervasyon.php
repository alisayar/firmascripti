    <!--- HEADER -->
    <?php include "header.php";?>

    <!-- SIDE BAR -->
   <?php include "sidebar.php";?>

   <?php
    $rezervasyon = $db->prepare("SELECT * FROM rezervasyon");
    $rezervasyon->execute();
    $rezervasyoncek = $rezervasyon->fetch(PDO::FETCH_ASSOC);
   ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <!-- Geri dönüş uyarıları -->
            <?php
                if($_GET["rezervasyon-guncelle"]=="bos"){
                    ?>
                    <div class="alert alert-warning">
                    <strong>Dikkat!</strong> Boş alan bırakmayınız
                    </div>
                    <?php
                } else if($_GET["rezervasyon-guncelle"]=="yes"){
                    ?>
                   <div class="alert alert-success">
                    <strong>Tebrikler!</strong> Güncelleme başarılı...
                    </div>
                    <?php
                } else if($_GET["rezervasyon-guncelle"]=="no"){
                    ?>
                    <div class="alert alert-danger">
                    <strong>Hata!</strong> Güncelleme Başarısız!
                    </div>
                    <?php
                }
            ?>
            <div class="block-header">
                <h2>REZERVASYON</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="islem.php?rez_id=<?php echo $rezervasyoncek["rez_id"]; ?>" method="POST" class="form-horizontal">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Kalın Yazı</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="rez_kalinyazi" class="form-control" value="<?php echo $rezervasyoncek["rez_kalinyazi"];?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Link</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="rez_link" value="<?php echo $rezervasyoncek["rez_link"]; ?>">
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
                                                <textarea name="rez_normalyazi" class="ckeditor"><?php echo $rezervasyoncek["rez_normalyazi"];?></textarea> <!--ck editör özelliği ekledik -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="rezervasyon" class="btn btn-primary m-t-15 waves-effect">Güncelle</button>
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

    