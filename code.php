<?php
session_start();
require 'conexao.php';

if(isset($_POST['update_usuario'])){
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $senha_usuario = mysqli_real_escape_string($con, $_POST['senha_usuario']);
    $fone = mysqli_real_escape_string($con, $_POST['fone']);
    $curso = mysqli_real_escape_string($con, $_POST['curso']);
    $query = "UPDATE SET usuarios nome='$nome', usuario='$usuario', senha_usuario='$senha_usuario', fone='$fone', curso='$curso' WHERE id='$id'";

}

if(isset($_POST['save_usuario'])){
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $senha_usuario = mysqli_real_escape_string($con, $_POST['senha_usuario']);
    $senha_usuario = password_hash($senha_usuario, PASSWORD_DEFAULT);
    $fone = mysqli_real_escape_string($con, $_POST['fone']);
    $curso = mysqli_real_escape_string($con, $_POST['curso']);

    $query = "INSERT INTO usuarios (nome,usuario,senha_usuario,fone,curso) 
                   VALUES ('$nome', '$usuario', '$senha_usuario', '$fone', '$curso')";
    $query_run = mysqli_query($con, $query);
    if($query_run){

        header("Location: index.php");
        $_SESSION['message'] = "Usuario Cadastrado com Sucesso";
        exit(0);

    }else{

        $_SESSION['message'] = "Usuario não cadastrado";
        header("Location: index.php");
        exit(0);

    }
}

if(isset($_POST['delete_usuario'])){
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM usuarios WHERE id='$student_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run){

        $_SESSION['message'] = "Usuario Deletado com Sucesso!!";
        header("Location: index.php");
        exit(0);

    }else{

        $_SESSION['message'] = "Usuario Não Deletado!!";
        header("Location: index.php");
        exit(0);

    }

}

?>