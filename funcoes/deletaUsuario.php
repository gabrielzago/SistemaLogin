<?php
  include_once '../conn/conection.php';

  $id = $_POST['id'];

  $sql = "delete from user_admin where codigo = $id";
  $cmd = comando($sql);

  if($cmd)
  {
    echo json_encode('success');
  }else {
    echo json_encode('erro');
  }
 ?>
