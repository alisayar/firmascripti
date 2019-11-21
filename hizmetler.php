<!-- Professional Builde -->
<section class="professional_builder row">
        <div class="container">
        <?php 
            $hizmet = $db->prepare("SELECT * FROM hizmetler ORDER BY hizmet_id DESC");
            $hizmet->execute();
            $hizmetcek = $hizmet->fetchAll(PDO::FETCH_ASSOC);

            foreach($hizmetcek as $row){
        ?>
           <div class="row builder_all">
                <div class="col-md-3 col-sm-6 builder">
                    <i class="fa fa-<?php echo $row["hizmet_icon"];?>" aria-hidden="true"></i>
                    <h4><?php echo $row["hizmet_baslik"];?></h4>
                    <p><?php echo $row["hizmet_aciklama"];?></p>
                </div>
                <?php
                }
                ?>
           </div>
        </div>
    </section>
    <!-- End Professional Builde -->