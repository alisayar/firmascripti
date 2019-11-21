<?php include "header.php"; ?>

    <!-- Banner area -->
    <section class="banner_area" data-stellar-background-ratio="0.5">
        <h2>HİZMETLER</h2>
        <ol class="breadcrumb">
            <li><a href="index.php">ANASAYFA</a></li>
            <li><a href="javascript:void(0);" class="active">HİZMETLER</a></li>
        </ol>
    </section>
    <!-- End Banner area -->
    <?php
        $hizmet_id = $_GET["hizmet_id"]; //gelen hizmet_id'yi burada tutup veri tabanına gönderiyoruz alt satırda
        $hizmetler = $db->prepare("SELECT * FROM hizmetler WHERE hizmet_id=?");
        $hizmetler->execute(array($hizmet_id));
        $hizmet_cek = $hizmetler->fetch(PDO::FETCH_ASSOC);
    ?>
    <!-- Our Services Area -->
    <section class="our_services_tow">
        <div class="container">
            <div class="architecture_area services_pages">
                <div class="portfolio_item portfolio_2">
                   <div class="grid-sizer-2"></div>
                    <div class="single_facilities col-sm-12 painting building painting adversting">
                        <div class="who_we_area">
                            <div class="subtittle">
                                <h2><?php echo $hizmet_cek["hizmet_baslik"]; ?></h2>
                            </div>    
                            
                            <?php echo $hizmet_cek["hizmet_aciklama"]; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Services Area -->

   <?php include "footer.php"; ?>

   