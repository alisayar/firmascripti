            <?php
                $site = $db->prepare("SELECT * FROM ayarlar");
                $site->execute();
                $ayarcek = $site->fetch(PDO::FETCH_ASSOC);
             ?>

           