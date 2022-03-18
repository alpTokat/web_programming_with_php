<?php 
    $title = "Ürün Ekle";
    require "view/_header.php";
    require "view/_navbar.php";
    require_once "baglanti.php";
    // isim,açıklama,kategori(selectbox),ürünfotosu,renk(radiobutton),reklam(checkbox)
?>
<div class="spacing-register">

</div>
<div class="cointainer-register">
    <div class="row-register">
    <?php 
        if (isset($_POST['urunekle'])) {

            //$uisim=$_POST['isim'];
            if(!empty($_POST['urunisim'])&&!empty($_POST['urunaciklama'])&&!empty($_POST['urunkategori'])&&!empty($_POST['sekil'])&&!empty($_POST['urunekstra'])){
                $isim=$_POST["urunisim"];
                $aciklama=$_POST["urunaciklama"];
                $fiyat=$_POST["urunfiyat"];
                $kategori=$_POST["urunkategori"];
                $sekil=$_POST["sekil"];
                $ekstra=$_POST["urunekstra"];
                $metin="";
                for($i=0;$i<=count($ekstra)-1;$i++){
                    if($i!=(count($ekstra)-1)){
                        $metin .= $ekstra[$i].",";
                    }
                    else{
                        $metin .= $ekstra[$i];
                    }
                }
                $uploadOK = 1;
                if (isset($_FILES["ufoto"]) && empty($_FILES["ufoto"])) {
                $check = getimagesize($_FILES["ufoto"]["tmp_name"]);
                if ($check !== false) {
                    $ufoto = " Foto türü " . $check["mime"] . ".";
                    $uploadOK = 1;
                } else {
                $ufoto_err = "Lütfen Bir fotoğraf seçiniz";
                $uploadOK = 0;
                }
                } else {
                $ufoto_err = "Lütfen Bir fotoğraf seçiniz";
                $uploadOK = 0;
                }
    
                $foto_name = "";
                if ($uploadOK == 1 || file_exists($_FILES["ufoto"]["tmp_name"]) || is_uploaded_file($_FILES["ufoto"]["tmp_name"])) {
                $fname = $_FILES["ufoto"]["name"];
                $tmpName = $_FILES["ufoto"]["tmp_name"];
                $ext = strtolower(pathinfo($fname, PATHINFO_EXTENSION));  //dosya yolu
                $yeni_isim = $fname . "_" . uniqid(rand(), true) . "." . $ext;
                $path = "img/" . $yeni_isim;
                if (move_uploaded_file($tmpName, $path)) {
                    $foto_name = $yeni_isim;
                } else {
                $ufoto_err = "Dosya Yüklenirken bir hata oluştu.";
                }
                }  
                $sql="INSERT INTO urunler(aturunisim,ataciklama,atfiyat,atkategori,aturl,atsekil,atekstra) VALUES (?,?,?,?,?,?,?)"; 
                $stmt=$pdo->prepare($sql); //query çalıştır demek burda mesela sql komutunu çalıştırmasını söylüyoruz
                $stmt->execute([$isim,$aciklama,$fiyat,$kategori,$foto_name,$sekil,$metin]);
                echo '<div class="alert alert-success">Başarıyla Kaydınız Oluşturuldu</div>';
                }
                else{
                    echo '<div class="alert alert-danger">Lütfen boş alanları doldurunuz</div>';
                }  
            }
        
        ?>
    <form class="form-register" method="post" action="urunekle.php" enctype="multipart/form-data">
        <div class="form-group" id="header">
            <h2>Ürün Ekleme</h2>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ürün İsmi</label>
            <input type="text" class="form-control" name="urunisim" id="exampleFormControlInput1" placeholder="Ürün İsmi Giriniz">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ürün Açıklama</label>
            <input type="text" class="form-control" name="urunaciklama" id="exampleFormControlInput1" placeholder="Ürün Açıklaması Giriniz">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ürün Fiyatı</label>
            <input type="text" class="form-control" name="urunfiyat" id="exampleFormControlInput1" placeholder="Ürün Fiyatı Giriniz">
        </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1" class="formControl">Kategori seçin</label>
        <select class="form-control" name="urunkategori" id="exampleFormControlSelect1">
        <option>Yiyecek</option>
        <option>İçecek</option>
        <option>Tarihi</option> 
        </select>
        </div>
    <div class="form-group">
    <label for="exampleFormControlFile1">Ürünün Fotağrafını Seçin:</label>
    <input type="file" class="form-control-file" name="ufoto" id="ufoto">
  </div>
  <div class="form-check">
  <input class="form-check-input" type="radio" name="sekil" id="exampleRadios1" value="Paket" checked>
  <label class="form-check-label" for="exampleRadios1">
    Paket
  </label>
</div>
    <div class="form-check">
    <input class="form-check-input" type="radio" name="sekil" id="exampleRadios2" value="Servis">
    <label class="form-check-label" for="exampleRadios2">
        Servis
    </label>
    </div>
    
    
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="urunekstra[]" id="inlineCheckbox1" value="Şalgam">
  <label class="form-check-label" for="inlineCheckbox1">Şalgam</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="urunekstra[]" id="inlineCheckbox1" value="Limon">
  <label class="form-check-label" for="inlineCheckbox1">Limon</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="urunekstra[]" id="inlineCheckbox1" value="Su">
  <label class="form-check-label" for="inlineCheckbox1">Su</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="urunekstra[]" id="inlineCheckbox2" value="Acıbiber">
  <label class="form-check-label" for="inlineCheckbox2">Acıbiber</label>
</div>
    <button type="submit" class="btn btn-primary" name="urunekle">Yeni Ürün Ekle </button>
    </form>
</div>
</div>
<div class="spacing-register">
    
</div>