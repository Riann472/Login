<?php
include('conexao.php');
$login = $_POST['login'];
$entrar = $_POST['entrar'];
$senha = md5($_POST['senha']);  

  if (isset($entrar)) {

    $verifica = mysqli_query($con, "SELECT * FROM usuario WHERE login =
    '$login' AND senha = '$senha'") or die("erro ao selecionar");
      if (mysqli_num_rows($verifica) == 1){
        setcookie("login",$login);
header("Location:index.php");
        die();
      }else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='log.html';</script>";
      }
  }

?>