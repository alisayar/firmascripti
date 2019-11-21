    <!--- HEADER -->
    <?php include "header.php"; ?>

    <!-- SIDE BAR -->
    <?php include "sidebar.php"; ?>

    <?php
    $mesaj_id = $_GET["mesaj_id"];
    $mesajlar = $db->prepare("SELECT * FROM mesajlar WHERE mesaj_id=?");
    $mesajlar->execute(array($mesaj_id));
    $mesaj_cek = $mesajlar->fetch(PDO::FETCH_ASSOC);

    $okuma = $db->prepare("UPDATE mesajlar SET mesaj_okuma=? WHERE mesaj_id=?");
    $okuma->execute(array(1, $mesaj_id));
    ?>

    <!-- CONTENT -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>MESAJ OKU</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <h2>
                                <?php echo $mesaj_cek["mesaj_gonderenisim"]; ?> <small><?php echo $mesaj_cek["mesaj_gonderenmail"]; ?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <span><?php echo $mesaj_cek["mesaj_tarih"]; ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <p><b>Konu:</b><?php echo $mesaj_cek["mesaj_konu"]; ?></p>
                            <?php echo $mesaj_cek["mesaj_aciklama"]; ?>
                        </div>
                    </div>
                    <a href="mesajlar.php"><button class="btn btn-primary">Mesajlara Dön</button></a>
                </div>
            </div>
    </section>

    <!-- FOOTER -->
    <?php include "footer.php"; ?>