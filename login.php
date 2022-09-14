<?php
session_start();
ob_start();
require 'conexao.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Daniel Login-PHP</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="images/favicon.jpg" type="image/x-icon">
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

    <form class="container" method="POST" action="">
        <div class="col-md-4 col-md-offset-4">
            <br><br><br><br><br>
            <h1 class="text-center">Login</h1>

            <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            if (!empty($dados['SendLogin'])) {
                //var_dump($dados);
                $query_usuario = "SELECT id, nome, usuario, senha_usuario 
                                FROM usuarios 
                                WHERE usuario =:usuario  
                                LIMIT 1";
                $result_usuario = $conn->prepare($query_usuario);
                var_dump($dados);
                $result_usuario->bindParam(':usuario', $dados['usuario']);
                $result_usuario->execute();
                
                if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
                $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
                //var_dump($row_usuario);
                    if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
                        $_SESSION['id'] =  $row_usuario['id'];
                        $_SESSION['nome'] =  $row_usuario['nome'];
                        header("Location: dashboard.php");
                    }else{
                        $_SESSION['msg'] = "<p style='color: red'> Erro: Usuario ou senha invalida!</p>";
                    }
                }else{
                    $_SESSION['msg'] = "<p style='color: red'> Erro: Usuario ou senha invalida!</p>";
                }
            }

            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>

            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Digite seu nome de usuario" required autofocus>
            </div>
            <br>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha_usuario" class="form-control" placeholder="Digite sua Senha" required autofocus>
            </div>
            <br>
            <input type="submit" class="btn btn-primary col-md-12 col-md-offset-12" value="Acessar" name="SendLogin"></input>
        </div>
        </section>

        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <br><br><br><br><br><br><br><br><br>
        <div class="menu">
        <?php include 'footer.php'; ?>
    </div>
    </body>

</html>