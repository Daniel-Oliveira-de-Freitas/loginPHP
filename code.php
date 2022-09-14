<?php
session_start();
require 'conexao.php';

if(isset($_POST['update_student'])){
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $usuario = mysqli_real_escape_string($con, $_POST['usuario']);
    $senha_usuario = mysqli_real_escape_string($con, $_POST['senha_usuario']);
    $fone = mysqli_real_escape_string($con, $_POST['fone']);
    $curso = mysqli_real_escape_string($con, $_POST['curso']);

    $query = "UPDATE SET usuarios nome='$nome', usuario='$usuario', senha_usuario='$senha_usuario', fone='$fone', curso='$curso' WHERE id='$id'";

}

if(isset($_POST['save_student'])){
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
        $_SESSION['message'] = "Student Created Successfully";
        exit(0);

    }else{

        $_SESSION['message'] = "Student Not Created";
        header("Location: index.php");
        exit(0);

    }
}

?>