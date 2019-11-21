 <?php 
    $hakkimizda = $db->prepare("SELECT * FROM hakkimizda");
    $hakkimizda->execute();
    $hakkimizda_cek = $hakkimizda->fetch(PDO::FETCH_ASSOC);
 ?>
 
 <!-- About Us Area -->
 <section class="about_us_area row">
        <div class="container">
            <div class="tittle wow fadeInUp">
                <h2>HAKKIMIZDA</h2>
            </div>
            <div class="row about_row">
                <div class="who_we_area col-md-7 col-sm-6">
                    <div class="subtittle">
                        <h2><?php echo $hakkimizda_cek["hakkimizda_baslik"];?></h2>
                    </div>
                    <p><?php echo $hakkimizda_cek["hakkimizda_aciklama"]; ?></p>
                    <a href="hakkimizda.php" class="button_all">Hakkımızda</a>
                </div>
                <div class="col-md-5 col-sm-6 about_client">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $hakkimizda_cek["hakkimizda_medya"]; ?>" 
                frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>
    <hr style="background-color: #ccc; height:2px;">
    <!-- End About Us Area -->