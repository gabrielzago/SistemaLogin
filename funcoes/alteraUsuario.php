<?php
  include_once '../conn/conection.php';

  $id = $_POST['id'];
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $senhaCrip = md5(sha1($senha));

  $sql = "Update user_admin set login = '$login', senha = '$senhaCrip', nome = '$nome', email = '$email' where codigo = $id ";
  $resSql = comando($sql);

  if($resSql){
    echo json_encode('success');
  }else {
    echo json_encode('erro');
  }

?>
