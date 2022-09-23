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

<br>
<div class="container mt-5">

    <?php include('message.php'); ?>
    
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4> Detalhes do estudante
              <!-- <a href="student-create.php" class="btn btn-primary float-end">Add Student</a> -->
            </h4>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Telefone</th>
                  <th>Curso</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM usuarios";
                $query_run = mysqli_query($con, $query);
                
                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $usuario) {
                ?>
                    <tr>
                      <td><?= $usuario['id'] ?></td>
                      <td><?= $usuario['nome'] ?></td>
                      <td><?= $usuario['usuario'] ?></td>
                      <td><?= $usuario['fone'] ?></td>
                      <td><?= $usuario['curso'] ?></td>
                      <td>
                        <a href="visualizar.php?id=<?= $usuario['id']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                        <a href="editar.php?id=<?= $usuario['id']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <form action="code.php" method="POST" class="d-inline">
                        <button type="submit" name="delete_usuario" value="<?= $usuario['id']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                        </form>
                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "<h5> No Record Found </h5>";
                }
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

    <br>
        <div class="menu">
        <?php include 'footer.php'; ?>
    </div>

</body>
</html>