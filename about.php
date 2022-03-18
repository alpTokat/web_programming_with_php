<?php
$title = "Hakkımızda";
require "view/_navbar.php";
require "view/_header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="babout">
<div class="about-section">
  <div class="inner-container">
    <h1>Adana</h1>
    <p class="text">
    Adana, Türkiye'nin güneyinde, Akdeniz Bölgesi'sinde yer alan ilidir. İl merkezinin adı da Adana olup; Seyhan, Yüreğir, Çukurova, Sarıçam ve Karaisalı metropol ilçelerinin birleşimiyle oluşur. Adana kent merkezi 5 ilçeden, Adana ili ise toplam 15 ilçeden oluşmaktadır. Adana ilinin nüfusu, 2009 yılı sayımları itibarı ile 2.062.226' dır. Kent merkezi ise 1.623.545 nüfusa sahiptir. Ayrıca Adana İli'nin yüzölçümü 14.030 km²'dir. Adana, Türkiye'nin İstanbul, Ankara, İzmir ve Bursa'dan sonra 5. büyük ilidir. 

İLÇELERİ: Seyhan, Yüreğir, Aladağ, Ceyhan, Feke, İmamoğlu, Karaisalı, Karataş, Kozan, Pozantı, Saimbeyli, Tufanbeyli, Yumurtalık, Çukurova ve Sarıçam’ dır.
    </p>
    <div class="skills">
      <span>Taş Köprü</span>
      <span>Koca Köprü</span>
      <span>Yılan Kale</span>
    </div>
  </div>
</div>
  <?php
  require "view/_footer.php";
  ?>
</body>

</html>