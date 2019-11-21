    <!--- HEADER -->
    <?php include "header.php";?>

    <!-- SIDE BAR -->
   <?php include "sidebar.php";?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>YÖNETİM PANELİ</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <?php
                    $hizmetler = $db->prepare("SELECT *  FROM hizmetler");
                    $hizmetler->execute();
                    $hizmetler->fetchAll(PDO::FETCH_ASSOC);
                    $toplam= $hizmetler->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">graphic_eq</i>
                        </div>
                        <div class="content">
                            <div class="text">HİZMETLER</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplam; ?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <?php
                    $projeler = $db->prepare("SELECT *  FROM projeler");
                    $projeler->execute();
                    $projeler->fetchAll(PDO::FETCH_ASSOC);
                    $toplamproje= $projeler->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">work</i>
                        </div>
                        <div class="content">
                            <div class="text">PROJELER</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplamproje ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <?php
                    $slider = $db->prepare("SELECT *  FROM slider");
                    $slider->execute();
                    $slider->fetchAll(PDO::FETCH_ASSOC);
                    $toplamslider= $slider->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">view_carousel</i>
                        </div>
                        <div class="content">
                            <div class="text">SLAYTLAR</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplamslider; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <?php
                    $ekipler = $db->prepare("SELECT *  FROM ekipler");
                    $ekipler->execute();
                    $ekipler->fetchAll(PDO::FETCH_ASSOC);
                    $toplamekipler= $ekipler->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">EKİP</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplamekipler ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <?php
                    $sponsorlar = $db->prepare("SELECT *  FROM sponsorlar");
                    $sponsorlar->execute();
                    $sponsorlar->fetchAll(PDO::FETCH_ASSOC);
                    $toplamsponsorlar= $sponsorlar->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">grain</i>
                        </div>
                        <div class="content">
                            <div class="text">SPONSORLAR</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplamsponsorlar ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <?php
                    $yorumlar = $db->prepare("SELECT *  FROM yorumlar");
                    $yorumlar->execute();
                    $yorumlar->fetchAll(PDO::FETCH_ASSOC);
                    $toplamyorumlar= $yorumlar->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">comment</i>
                        </div>
                        <div class="content">
                            <div class="text">YORUMLAR</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplamyorumlar ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>

                <?php
                    $mesajlar = $db->prepare("SELECT *  FROM mesajlar");
                    $mesajlar->execute();
                    $mesajlar->fetchAll(PDO::FETCH_ASSOC);
                    $toplammesajlar= $mesajlar->rowCount();
                ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">message</i>
                        </div>
                        <div class="content">
                            <div class="text">MESAJLAR</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $toplammesajlar ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
                
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php";?>