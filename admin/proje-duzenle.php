    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <?php
    $proje_id = $_GET["proje_id"];
    $projeler = $db->prepare("SELECT * FROM projeler WHERE proje_id=?");
    $projeler->execute(array($proje_id));
    $proje_cek = $projeler->fetch(PDO::FETCH_ASSOC);
    ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PROJE DÜZENLE</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <form action="islem.php?proje_id=<?php echo $proje_cek["proje_id"]; ?>" method="POST" class="form-horizontal" enctype="multipart/form-data">

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Fotoğraf</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <img width="150" height="100" src="../images/gallery/<?php echo $proje_cek["proje_resim"]; ?>" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Fotoğraf</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="file" name="proje_resim" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>İsim</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="proje_isim" value="<?php echo $proje_cek["proje_isim"]; ?>">
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
                                                <input type="text" class="form-control" name="proje_link" value="<?php echo $proje_cek["proje_link"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row clearfix">
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" name="proje_duzenle" class="btn btn-primary m-t-15 waves-effect">Düzenle</button>
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