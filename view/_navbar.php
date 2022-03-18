
<?php 
session_start();
require "view/_header.php";
?> 
<div id="navbar">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a class="navbar-brand" id="algitsin" href="index.php">ADANA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#drowdownmenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="drowdownmenu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-black" aria-current="page" href="index.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="about.php">Hakkımızda</a>
        </li>
        <li class="nav-item">
                <a class="nav-link text-black" href="contact.php">İletişim</a>
        </li>
      </ul>
      </div>
      <div class="navbar-nav">
        <!-- kesin çıkacak soru 2 defa değindi hoca -->
      <ul class="navbar-nav">
        <?php if(!isset($_SESSION['user'])) {?>
        <li class="nav-item">
          <a class="nav-link text-black" aria-current="page" href="login.php"> Giriş</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-black" href="register.php">Kayıt Ol</a>
        </li>
        <?php }else if($_SESSION['user']=="alp-tokat@hotmail.com" && isset($_SESSION['user'])){?>
        <li class="nav-item">
                <a class="nav-link text-black" href="urunekle.php">Ürün Ekle</a>
        </li>
        <?php }if(isset($_SESSION['user'])){ ?>
        <li class="nav-item">
                <a class="nav-link text-black" href="logout.php">Çıkış</a>
        </li>

        <?php  }?>
      </ul>
      </div>
  </div>
</nav>  
</div>