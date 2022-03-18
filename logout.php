<?php 
    session_start();
    unset($_SESSION["user"]);
    header(header: "refresh:3,url=index.php");


?>
<div class="row">
    <h1>Çıkış İşlemi Gerçekleşti</h1>
    <h3>Anasayfaya Yönlendiriliyorsunuz</h3>
</div>