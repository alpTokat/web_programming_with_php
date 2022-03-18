<?php
$title = "Kayıt Ol";
require "view/_header.php";
require "view/_navbar.php";
require_once "baglanti.php"


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudfire.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
.
<div class="container container-register mt-5">
    <div class="row row-register mx-auto ">

        <form class="form form-register" method="post" action="">
            <div class="form-group" id="header">
                <h2 class="page-header">Kayıt Ol Sayfası</h2>
            </div>
            <?php
            if (isset($_POST['kayıtol'])) {
                //$uisim=$_POST['isim'];
                if (!empty($_POST['isim']) && !empty($_POST['email']) && !empty($_POST['sifre'])) {
                    $isim = $_POST["isim"];
                    $email = $_POST["email"];
                    $sifre = $_POST["sifre"];
                    echo $_POST["isim"];
                    $sql = "INSERT INTO users(atisim,atemail,atsifre) VALUES (?,?,?)";
                    $stmt = $pdo->prepare($sql); //query çalıştır demek burda mesela sql komutunu çalıştırmasını söylüyoruz
                    $stmt->execute([$isim, $email, $sifre]);
                    echo '<div class="alert alert-success">Başarıyla Kaydınız Oluşturuldu</div>';
                    header(header: "refresh:2,url=login.php");
                } else {
                    echo '<div class="alert alert-danger">Lütfen boş alanları  doldurunuz</div>';
                }
            }
            ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">İsim</label>
                <input type="text" class="form-control" name="isim" id="exampleFormControlInput1" placeholder="İsim Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email adres</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mail Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Şifre</label>
                <input type="password" class="form-control" name="sifre" id="exampleInputPassword1" placeholder="Şifre Giriniz">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" id="kullanıcısozlesme">
                <label class="form-check-label" for="exampleCheck1">Kullanıcı Sözleşmesini Kabul Ediyorum</label>
            </div>
            <button type="submit" class="btn btn-primary" name="kayıtol" onclick="myfunction()">Yeni Kayıt Oluştur </button>
        </form>
    </div>
</div>
<div class="spacing-register">

</div>

<script>
    function myfunction() {
        var ad = document.getElementById("exampleFormControlInput1");
        var mail = document.getElementById("exampleInputEmail1");
        var sifre = document.getElementById("exampleInputPassword1");
        var sozlesme = document.getElementById("exampleCheck1");
        var label = document.getElementById("kullanıcısozlesme");
        if (sozlesme.checked == false) {
            sozlesme.style.border = "3px solid red";
        }
        if (ad.value == "") {
            ad.style.border = "3px solid red";
        }
        if (mail.value == "") {
            mail.style.border = "3px solid red";
        }
        if (sifre.value == "") {
            sifre.style.border = "3px solid red";
        }
        if (ad.value == "" || mail.value == "" || sifre.value == "" || sozlesme.checked == false) {
            alert("Lütfen Kırmızı işaretli bölgeleri doldurunuz");
        }
    }
</script>



<?php


require "view/_footer.php";
?>