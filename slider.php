<!-- Slider area -->
<section class="slider_area row m0">
        <div class="slider_inner">
            <?php 
                $slider = $db->prepare("SELECT * FROM slider ORDER BY slider_id DESC");
                $slider->execute();
                $slidercek = $slider->fetchAll(PDO::FETCH_ASSOC);//fetchAll yazmamızın sebebi slider tablosuna 2 adet veri girmemiz. Diğerlerinde 1 adet girince yazmadık.
                
                foreach($slidercek as $row){
                    ?>
                    <div data-thumb="images/slider/<?php echo $row["slider_resim"];?>" data-src="images/slider/<?php echo $row["slider_resim"];?>">
                <div class="camera_caption">
                   <div class="container">
                        <h5 class=" wow fadeInUp animated"><?php echo $row["slider_renklibaslik"];?></h5>
                        <h3 class=" wow fadeInUp animated" data-wow-delay="0.5s"><?php echo $row["slider_normalbaslik"];?></h3>
                        <p class=" wow fadeInUp animated" data-wow-delay="0.8s"><?php echo $row["slider_paragraf"];?></p>
                        <a class=" wow fadeInUp animated" data-wow-delay="1s" href="<?php echo $row["slider_link"];?>">Git</a>
                   </div>
                </div>
        </div>
           <?php

                }
           ?>
            
            
            </div>
        </div>
    </section>
    <!-- End Slider area -->