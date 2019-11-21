<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="images/user.png" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION["admin_kadi"]; ?></div>
                <div class="email">Administrator</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li><a href="profil.php"><i class="material-icons">person</i>Profil</a></li>
                        <li role="seperator" class="divider"></li>
                        <li><a href="cikis.php"><i class="material-icons">input</i>Çıkış</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Menüler</li>
                <li class="active">
                    <a href="index.php">
                        <i class="material-icons">home</i>
                        <span>ANASAYFA</span>
                    </a>
                </li>
                <?php
                $mesajlar = $db->prepare("SELECT * FROM mesajlar  WHERE mesaj_okuma=?");
                $mesajlar->execute(array(0));
                $mesajlar->fetchAll(PDO::FETCH_ASSOC);
                $say = $mesajlar->rowCount();
                ?>
                <li>
                    <a href="mesajlar.php">
                        <i class="material-icons">message</i>
                        <span>Mesaj Ayarları</span>
                        <small class="badge bg-red pull-right"><?php echo $say; ?> Okunmayan</small>
                    </a>
                </li>
                <li>
                    <a href="hakkimizda.php">
                        <i class="material-icons">info</i>
                        <span>Hakkımızda</span>
                    </a>
                </li>
                <li>
                    <a href="rezervasyon.php">
                        <i class="material-icons">contactless</i>
                        <span>Duyurular</span>
                    </a>
                </li>
                <li>
                    <a href="basarilarimiz.php">
                        <i class="material-icons">trending_up</i>
                        <span>Başarılar</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">graphic_eq</i>
                        <span>Hizmet Ayarları</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="hizmetler.php">
                                <span>Hizmetler</span>
                            </a>
                        </li>
                        <li>
                            <a href="hizmet-ekle.php">
                                <span>Hizmet Ekle</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">settings_applications</i>
                        <span>Genel Ayarlar</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="site-ayarlari.php">
                                <span>Site Ayarları</span>
                            </a>
                        </li>
                        <li>
                            <a href="logo-favicon.php">
                                <span>Logo-Favicon Ayarları</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">grain</i>
                        <span>Sponsor Ayarları</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="sponsorlar.php">
                                <span>Sponsorlar</span>
                            </a>
                        </li>
                        <li>
                            <a href="sponsor-ekle.php">
                                <span>Sponsor Ekle</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">work</i>
                        <span>Proje Ayarları</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="projeler.php">
                                <span>Projeler</span>
                            </a>
                        </li>
                        <li>
                            <a href="proje-ekle.php">
                                <span>Proje Ekle</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">comment</i>
                        <span>Yorum Ayarları</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="yorumlar.php">
                                <span>Yorumlar</span>
                            </a>
                        </li>
                        <li>
                            <a href="yorum-ekle.php">
                                <span>Yorum Ekle</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person</i>
                        <span>Ekip Ayarları</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="ekipler.php">
                                <span>Ekipler</span>
                            </a>
                        </li>
                        <li>
                            <a href="ekip-ekle.php">
                                <span>Ekip Ekle</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">view_carousel</i>
                        <span>Slider Ayarları</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="slider.php">
                                <span>Sliderlar</span>
                            </a>
                        </li>
                        <li>
                            <a href="slider-ekle.php">
                                <span>Slider Ekle</span>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red" class="active">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="settings">
                <div class="demo-settings">
                    <p>GENERAL SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Report Panel Usage</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Email Redirect</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>SYSTEM SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Notifications</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Auto Updates</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                    <p>ACCOUNT SETTINGS</p>
                    <ul class="setting-list">
                        <li>
                            <span>Offline</span>
                            <div class="switch">
                                <label><input type="checkbox"><span class="lever"></span></label>
                            </div>
                        </li>
                        <li>
                            <span>Location Permission</span>
                            <div class="switch">
                                <label><input type="checkbox" checked><span class="lever"></span></label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>