 <?php 
         $servername="localhost";
         $username="root";
         $password="";
         $dbname="tanıtım";


        // $conn=new mysqli($servername,$username,$password,$dbname);

        $dsn = "mysql:host=$servername;dbname=$dbname;charset=UTF8";



        try{
            $pdo = new PDO($dsn,$username,$password);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
        





        /*if($conn->connect_error){
            echo "Database bağlantısında bir sorun yaşandı";
        }
        else{
            echo "bağlantı başarılı bir şekilde gerçekleşti";
        }
            */



?>