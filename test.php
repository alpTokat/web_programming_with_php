<?php 


    echo "<h1> Merhaba PHP";
    echo "<br>";
    $degisken = "halil";

    $x=10;
    $y=5;

    //if(++$x>9/*11*/and ++$y>5){
    //    echo "merhaba";
    //}else{
    //    echo "Güle güle";
    //}

    //echo "<br>";
    //echo  $y;
    //sınavda çıkacaktır evulation yani and or arttırma 





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> <?php $degisken //sınavda gelecek noktalardan 1 tanesi ?>  </h1> 

    <?php for($i=0;$i<10; $i++) {  //sınavda çıkacak bir kısım ?>
        <h1> Merhaba <?php echo $degisken; // kesinlikle çıkacak bir kısım muhtemelen formdan aldığım girdileri table'da yazdırma işlemi gerçekleştireceğiz?>
        
    <?php }?>    
</body>
</html>