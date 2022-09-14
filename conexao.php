<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "celke";
$port = 3306;

try{
   $conn = new PDO("mysql:host=$host; port=$port; dbname=" . $dbname, $user, $pass);
   //echo "Conexao com o banco de dados realizada com sucesso!";
}catch(PDOException $err){
   //echo "ERRO!: conexao com o banco de dados nao realizada! <br> Erro gerado " . $err->getMessage();
}

?>

<?php

$con = mysqli_connect("localhost","root","","celke");

if(!$con){
    die('Connection Failed'. mysqli_connect_error());
}

?>