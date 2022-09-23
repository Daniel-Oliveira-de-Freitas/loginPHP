<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Student Create</title>
</head>

<body>

    <div class="menu">
        <?php include 'menu.php'; ?>
    </div>
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Usuario
                            
                            
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Senha</label>
                                <input type="password" name="senha_usuario" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Telefone</label>
                                <input type="text" name="fone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Curso</label>
                                <input type="text" name="curso" class="form-control">
                            </div>
                            <br>
                            <div class="mb-3">
                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                    Selecione a imagem para upload:
                                    <input class="btn btn-info" type="file" name="fileToUpload" id="fileToUpload" >
                                    <input class="btn btn-info" type="submit" value="Upload Image" name="submit">
                                </form>
                                <button type="submit" name='save_usuario' class="btn btn-primary float-end">Salvar</button>
                                <a href="index.php" style="margin-right: 15px;" class="btn btn-danger float-end">Voltar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>