<!-- Our Partners Area -->
<section class="our_partners_area">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>SPONSORLARIMIZ</h2>
            </div>
            <div class="partners">
            <?php
                $logo = $db->prepare("SELECT * FROM sponsorlar ORDER BY sponsor_id DESC");
                $logo->execute();
                $logo_cek = $logo->fetchAll(PDO::FETCH_ASSOC);

                foreach($logo_cek as $row){
                    ?>
                    <div class="item"><img src="images/sponsorlar/<?php echo $row["sponsor_resim"]; ?>" alt=""></div>
            <?php        
                }
            ?>
                
            </div>
        </div>
        <div class="book_now_aera">
            <div class="container">
                <?php
                    $rez = $db->prepare("SELECT * FROM rezervasyon ORDER BY rez_id DESC");
                    $rez->execute();
                    $rez_cek = $rez->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="row book_now">
                    <div class="col-md-10 booking_text">
                        <h4><?php echo $rez_cek["rez_kalinyazi"]; ?></h4>
                        <p><?php echo $rez_cek["rez_normalyazi"]; ?></p>
                    </div>
                    <div class="col-md-2 p0 book_bottun">
                        <a href="<?php echo $rez_cek["rez_link"]; ?>" class="button_all">REZERVASYON</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Partners Area -->