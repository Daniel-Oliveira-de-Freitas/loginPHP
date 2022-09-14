<?php 
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = Strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Verifique se o arquivo de imagem é uma imagem real ou uma imagem falsa
if (isset($_POST["submit"])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !==false){
        echo "File is an image - ". $check . "...";
        $uploadOk = 1;
    }else{
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

//checa se o arquivo de imagem ja existe na pasta
if(file_exists($target_file)){
    echo "File already exists.";
    $uploadOk = 0;
}

//checa 0 tamanho imagem 
if($_FILES["fileToUpload"]["size"] > 5000000){
    echo "O tamanho da imagem é maior que o suportado...";
}

//Permitir determinado formato de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && 
    $imageFileType != "jpeg" && $imageFileType != "gif"){

        echo "Os arquivos são permitidos somente no formato= JPG, JPEG, PNG & GIF.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
