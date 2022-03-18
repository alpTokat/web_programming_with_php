<?php

use function PHPSTORM_META\elementType;

$title = "İletişim";
require "view/_navbar.php";
require "view/_header.php";
require "baglanti.php";




/*  if(isset($_GET['silid'])){
    $id = intval($_GET['silid']);
    $sql = " delete from adres where id=?";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    }
    if(isset($_GET['id'])){
        $gid = intval($_GET['id']);
        $sql =" SELECT * FROM adres where id=?";
        $stmt=$conn->prepare($sql);
        $stmt->bind_param('i',$gid);
        $stmt->execute();
        $sonuc = $stmt->get_result();
        if( $sonuc !=false && $sonuc->num_rows > 0){
           $row = $sonuc->fetch_assoc(); 
        }
        else{
            echo "Böyle bir kayıt bulunamamıştır";
        }
    }
    

    if($_POST&&isset($_POST['guncelleSubmit'])){
        $gisim = $_POST['isim'];
        $gsoyisim=$_POST['soyisim'];
        $gemail =$_POST['email'];


        $sql = "UPDATE adres SET iisim=?,isoyisim=?,iemail=? WHERE id=?";
        $stmt  = $conn->prepare($sql);
        $stmt->bind_param('sssi',$gisim,$gsoyisim,$gemail,$gid);
        $stmt->execute();
    } */


?>

<script>
    function keylistener() {
        var psayac = document.getElementById("keysayac");
        var dgms = document.getElementById("exampleFormControlTextarea1").value;
        var sayac = 150;
        if (sayac - dgms.length == 1) {
            alert("150 karakteri geçmek üzeresiniz lütfen daha fazla yazmayınız");
        }

        psayac.innerHTML = "Kalan Karekter Sayısı: " + (sayac - dgms.length);
    }
</script>
<div class="container container-contact">
    <div class="row row-contact">
        <?php
        if ($_POST && isset($_POST['ekleSubmit'])) {
            if (!empty($_POST["isim"]) && !empty($_POST["email"]) && !empty($_POST["yas"]) && !empty($_POST["sikayet"]) && !empty($_POST["konu"])) {
                $isim = $_POST["isim"];
                $email = $_POST["email"];
                $yas = $_POST["yas"];
                $sikayet = $_POST["sikayet"];
                $konu = $_POST['konu'];
                $sql = "INSERT INTO adana(atisim,atmail,atyas,atsorun,atkonu) VALUES (?,?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$isim, $email, $yas, $sikayet, $konu]);
                echo '<div class="alert alert-success">Şikayetiniz Başarılı bir şekilde oluşturuldu.</div>';
                header(header: "refresh:2,url=contact.php");
            } else {
                echo '<div class="alert alert-danger">Lütfen boşlukları doldurunuz</div>';
            }
        }

        ?>
        <form action="" method="post">
            <div class="try mx-auto mt-4">


                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="formControl">İsim Soyisim</label>
                        <input type="text" class="form-control" name="isim" id="exampleFormControlInput1" placeholder="İsim giriniz" value="<?php if (isset($row)) {
                                                                                                                                                echo  $row['atisim'];
                                                                                                                                            } ?>">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1" class="formControl">Email Adres</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email giriniz " value="<?php if (isset($row)) {
                                                                                                                                                    echo $row['atmail'];
                                                                                                                                                }   ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2" class="formControl">Şikayet Konusu</label>
                        <select multiple class="form-control" name="konu" id="exampleFormControlSelect2">
                            <option>Fiyat</option>
                            <option>Konum</option>
                            <option>Tanıtım</option>
                            <option>Yanlışlık</option>
                            <option>Websitesi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" class="formControl">Yaşınızı seçin</label>
                        <select class="form-control" name="yas" id="exampleFormControlSelect1">
                            <?php for ($i = 1; $i <= 60; $i++) { ?>
                                <option><?php echo $i ?></option>
                            <?php }    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="formControl">Şikayet Kutusu <p id="keysayac"></p></label>
                        <textarea class="form-control" name="sikayet" id="exampleFormControlTextarea1" rows="3" onkeypress="keylistener()"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="İletişime Geç" name="ekleSubmit" class="btn btn-primary">Sikayet Oluştur</button>
                        <!-- <button type="submit" value="Güncelle" name="guncelleSubmit" class="btn btn-primary">Güncelle</button> -->
                    </div>
                </form>


            </div>
    </div>



</div>

<!-- <div class="row-table" style="overflow-x:auto;">
        <table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Ad Soyad</th>
      <th scope="col">Email</th>
      <th scope="col">Konu</th>
      <th scope="col">Yas</th>
      <th scope="col">Şikayet</th>
      <th scope="col">Tarih</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $i = 1;
    $sql = "SELECT * FROM adana ORDER BY atkonu, attarih desc ";
    $stmt = $pdo->query($sql);
    while ($row = $stmt->fetch()) { ?>
    <tr>

      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['atisim'] ?></td>
      <td><?php echo $row['atmail'] ?></td>
      <td><?php echo $row['atkonu'] ?></td>    
      <td><?php echo $row['atyas'] ?></td>
      <td><?php echo $row['atsorun'] ?></td>
      <td><?php echo $row['attarih'] ?></td>
      
    </tr>
               
  </tbody>
  <?php $i++;
    }
    ?>
  
</table>
</div>
</table>
<div id="spacing"></div> -->