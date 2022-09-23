<?php
session_start();
ob_start();
include_once 'conexao.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student View</title>
</head>

<body>
    <?php
    if (isset($_GET['id'])) {
        $student_id = mysqli_real_escape_string($con, $_GET['id']);
        $query = "SELECT * FROM usuarios WHERE id='$student_id' ";
        $query_run = mysqli_query($con, $query);

        if (mysqli_num_rows($query_run) > 0) {
            $usuario = mysqli_fetch_array($query_run);
    ?>
            <div class="container mt-5">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Detalhes do Usuario</h4>
                                <h4 name="id" class="float-end">Identificação do Usuario: <?= $usuario['id']; ?></h4>
                            </div>
                            <div class="card-body">

                                <div class="mb-3" >
                                    <h5 > Nome: <?= $usuario['nome']; ?></h5>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <h5>Email: <?= $usuario['usuario']; ?></h5>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <h5>Senha: <?= $usuario['senha_usuario']; ?></h5>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <h5>Telefone: <?= $usuario['fone']; ?></h5>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <h5>Curso: <?= $usuario['curso']; ?></h5>
                                </div>
                                <hr>
                                <a href="index.php" class="btn btn-danger float-end">Voltar</a>

                        <?php
                    } else {
                        echo "<h4>Usuario n�o encontrado</h4>";
                    }
                }
                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>