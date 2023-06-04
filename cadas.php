<?php
session_start();
include("conexao.php");

$login = $_POST['login'];
$senha = MD5($_POST['senha']);

$sql = "select count(*) as total from usuario where login = '$login'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadas.html');
}

$sql = "INSERT INTO usuario VALUES(0, '$login', '$senha');";
if($con->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}
$con->close();

header('Location: log.html');
?>