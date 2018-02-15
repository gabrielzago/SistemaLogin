<?php
session_start();

if(isset($_POST['codigo'])){
    $codigo = $_POST['codigo'];
}
if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
}
if(isset($_POST['login'])){
    $login = $_POST['login'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['senha'])){
    $senha = $_POST['senha'];
}

$_SESSION['codigo'] = $codigo;
$_SESSION['nome']   = $nome;
$_SESSION['login']  = $login;
$_SESSION['email']  = $email;
$_SESSION['senha']  = $senha;

if($_SESSION['codigo'] != null){
    echo "sucesso";
}
else{
    echo "erro";
}
?>
