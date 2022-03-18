<?php
$title = "Giriş";
require "view/_header.php";
require "view/_navbar.php";
require_once "baglanti.php";

?>

<div class="container container-login mt-5">
    <div class="row row-login mx-auto">

        <form class="form form-login" method="post">
            <div class="form-group" id="header">
                <h2 class="page-header">Giriş Sayfası</h2>
            </div>
            <?php
            if (isset($_POST['email']) && isset($_POST['sifre'])) {
                $email = $_POST['email'];
                $sifre = $_POST['sifre'];
                $user = $pdo->query(" SELECT * FROM users where atemail='$email' AND atsifre='$sifre'")->fetch();
                if ($user) {
                    $_SESSION['user'] = $email;
                    echo '<div class="alert alert-success">Giriş işlemi başarılı</div>';
                    header(header: "refresh:2,url=index.php");
                } else {
                    if (empty($_POST['email']) && empty($_POST['sifre'])) {
                        echo '<div class="alert alert-danger">Lütfen Boş alanları doldurunuz</div>';
                    } else {
                        echo '<div class="alert alert-danger">Bu bilgilere ait kullanıcı bulunamadı</div>';
                    }
                }
            }                          ?>
            <div class="form-group">
                <label for="exampleInputEmail1">Email adres</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mail Giriniz">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Şifre</label>
                <input type="password" class="form-control" name="sifre" id="exampleInputPassword1" placeholder="Şifre Giriniz">
            </div>
            <button type="submit" class="btn btn-primary">Giriş Yap </button>
        </form>
    </div>
</div>



<?php



require "view/_footer.php";
?>