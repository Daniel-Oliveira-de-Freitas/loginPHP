<?php
session_start();
ob_start();
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>BootStrapNav</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src='main.js'></script>
</head>

<body>

    <?php
    // Exemplo para criptografar a senha_usuario
    //echo password_hash(123, PASSWORD_DEFAULT);
    ?>

<div class="menu">
    <?php include 'menu.php'; ?>
</div>
<br>
<?php include('message.php'); ?>
<h1 style="text-align: center;">Bem Vindo ao Site!!!</h1>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>

    <br>
        <div class="menu">
        <?php include 'footer.php'; ?>
    </div>

</body>
</html>