<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Student Edit</title>
</head>

<body>
    <div class="menu">
        <?php include 'menu.php'; ?>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $student_id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM usuarios WHERE id = $student_id";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {

            $student = mysqli_fetch_array($query_run);
    ?>

            <div class="container mt-5">

                <?php include('message.php'); ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                
                                <h4>Editar Usuario</h4>
                                <h4 name="id" class="float-end" >Identificação do Usuario: <?= $student['id']; ?></h4>
                               
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST">

                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <input type="text" name="nome" value="<?= $student['nome']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="usuario" value="<?= $student['usuario']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Senha</label>
                                        <input type="password" name="senha_usuario" value="<?= $student['senha_usuario']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Fone</label>
                                        <input type="text" name="fone" value="<?= $student['fone']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Curso</label>
                                        <input type="text" name="curso" value="<?= $student['curso']; ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name='update_usuario' class="btn btn-primary float-end">Alterar Usuario</button>
                                        <a href="index.php" style="margin-right: 15px;" class="btn btn-danger float-end">Voltar</a>
                                    </div>

                                </form>
                        <?php
                    } else {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>