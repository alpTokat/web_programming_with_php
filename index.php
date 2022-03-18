    <?php
    $title = "Anasayfa";
    require "view/_header.php";
    require "view/_navbar.php";
    require_once "baglanti.php";



    ?>
    <div id="content">
        <!--<a href="contact.php">İletişim Sayfasına git</a>
        <a href="about.php">Hakkımızda Sayfasına Git</a> -->

        <div class="container">
            <div class="row g-3">
                <?php
                $sql = "SELECT * FROM urunler";
                $data = $pdo->query($sql)->fetchAll();
                foreach ($data as $row) {

                ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="card mx-auto" style="width: 18rem;">
                            <img class="card-img-top" src="img/<?php echo $row['aturl'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['aturunisim']  ?></h5>
                                <p class="card-text"><?php echo $row['ataciklama'] ?></p>
                            </div>
                            <ul class="list-group list-group-flush" id="list">
                                <li class="list-group-item"><?php echo $row['atfiyat'] ?></li>
                                <li class="list-group-item"><?php if ($row['atkategori'] == "0") {
                                                                echo "Yiyecek";
                                                            } else if ($row['atkategori'] == "1") {
                                                                echo "İçecek";
                                                            } else {
                                                                echo "Tarihi";
                                                            }

                                                            ?></li>
                                <li class="list-group-item"><?php echo $row['atsekil'] ?></li>
                                <li class="list-group-item"><?php echo $row['atekstra'] ?></li>
                            </ul>
                            <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>


    </div>
    <?php
    require "view/_footer.php";
    ?>