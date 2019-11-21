 <!-- Our Testimonial Area -->
 <section class="testimonial_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>MÜŞTERİ YORUMLARI</h2>
            </div>
            <div class="testimonial_carosel">
            <?php
                $yorum = $db->prepare("SELECT * FROM yorumlar ORDER BY yorum_id DESC");
                $yorum->execute();
                $yorumcek = $yorum->fetchAll(PDO::FETCH_ASSOC);

                foreach($yorumcek as $row){
                    ?>
                    <div class="item">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img style="border-radius: 50px;" class="media-object" src="images/yorumlar/<?php echo $row["yorum_resim"]; ?>" alt="">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><?php echo $row["yorum_isim"]; ?></h4>
                            <h6><?php echo $row["yorum_meslek"]; ?></h6>
                        </div>
                    </div>
                    <p><?php echo $row["yorum_aciklama"]; ?></p>
                </div> 
                <?php }
                 ?>    
                
            
                              
            </div>
        </div>
    </section>
    <!-- End Our testimonial Area -->
