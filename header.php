<?php include "config/database.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $site = $db->prepare("SELECT * FROM ayarlar");
    $site->execute();
    $ayarcek = $site->fetch(PDO::FETCH_ASSOC);
    
    $logofavicon = $db->prepare("SELECT * FROM logofavicon");
    $logofavicon->execute();
    $logofaviconcek = $logofavicon->fetch(PDO::FETCH_ASSOC);
    ?>
    <title><?php echo $ayarcek["site_title"]; ?></title> <!-- Sitenin default başlığını silip veritabanındaki başlığı çektik -->
    <meta name="description" content="<?php echo $ayarcek["site_desc"]; ?>">
    <meta name="keyworlds" content="<?php echo $ayarcek["site_keyw"]; ?>">

    <!--Sonradan ekleme sweet alert -->
    <script src="js/swal.min.js"></script>
    <link rel="stylesheet" href="css/swal.css">


    <!-- Favicon -->
    <link rel="icon" href="images/logofavicon/<?php echo $logofaviconcek["lf_favicon"]; ?>" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="vendors/animate/animate.css" rel="stylesheet">
    <!-- Icon CSS-->
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <!-- Camera Slider -->
    <link rel="stylesheet" href="vendors/camera-slider/camera.css">
    <!-- Owlcarousel CSS-->
    <link rel="stylesheet" type="text/css" href="vendors/owl_carousel/owl.carousel.css" media="all">

    <!--Theme Styles CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Top Header_Area -->
    <section class="top_header_area">
        <div class="container">
            <ul class="nav navbar-nav top_nav">
                <li><a href="#"><i class="fa fa-phone"></i><?php echo $ayarcek["site_tel"]; ?></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i><?php echo $ayarcek["site_mail"]; ?></a></li>
                <li><a href="#"><i class="fa fa-clock-o"></i><?php echo $ayarcek["site_saat"]; ?></a></li>
            </ul>
            <?php
            $sm = $db->prepare("SELECT * FROM sosyalmedya");
            $sm->execute();
            $smcek = $sm->fetch(PDO::FETCH_ASSOC);
            ?>
            <ul class="nav navbar-nav navbar-right social_nav">
                <li><a href="<?php echo $smcek["sm_facebook"]; ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $smcek["sm_twitter"]; ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $smcek["sm_google"]; ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $smcek["sm_instagram"]; ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="<?php echo $smcek["sm_linkedin"]; ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </section>
    <!-- End Top Header_Area -->

    <!-- Header_Area -->
    <nav class="navbar navbar-default header_aera" id="main_navbar">
        <div class="container">
            <!-- searchForm -->
            <div class="searchForm">
                <form action="#" class="row m0">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                        <span class="input-group-addon form_hide"><i class="fa fa-times"></i></span>
                    </div>
                </form>
            </div><!-- End searchForm -->
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 p0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#min_navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logofavicon/<?php echo $logofaviconcek["lf_logo"]; ?>" alt=""></a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="col-md-10 p0">
                <div class="collapse navbar-collapse" id="min_navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="index.php">ANASAYFA</a>
                        </li>
                        <li>
                            <a href="hakkimizda.php">HAKKIMIZDA</a>
                        </li>
                        <li class="dropdown submenu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">HİZMETLER</a>
                            <ul class="dropdown-menu other_dropdwn">
                                <?php
                                $hizmetler = $db->prepare("SELECT * FROM hizmetler ORDER BY hizmet_id DESC");
                                $hizmetler->execute();
                                $hizmet_cek = $hizmetler->fetchAll(PDO::FETCH_ASSOC);

                                foreach ($hizmet_cek as $row) {
                                    ?>
                                    <li><a href="hizmet-detay.php?hizmet_id=<?php echo $row["hizmet_id"]; ?>"><?php echo $row["hizmet_baslik"]; ?></a></li>
                                <?php
                                }
                                ?>


                            </ul>
                        </li>
                        <li><a href="iletisim.php">İLETİŞİM</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>