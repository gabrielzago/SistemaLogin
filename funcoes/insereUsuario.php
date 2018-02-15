<?php
  include_once '../conn/conection.php';
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];

  $senhaCrip = md5(sha1($senha));

  $sql = "Insert into user_admin (login, senha, nome, email) VALUES ('$login', '$senhaCrip', '$nome', '$email')";
  $cmd = comando($sql);

  if($cmd)
  {
    echo json_encode('success');
  }else {
    echo json_encode('erro');
  }
 ?>
