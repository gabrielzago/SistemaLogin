<?php
  session_start();

  if ($_SESSION['login'] == false){
      unset($_SESSION['login']);
      header('location: /luc/admin-sec/login.php');
  }

  include_once "conn/conection.php";
?>

<html>
  <head>
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="/luc/admin-sec/js/wow.min.js"></script>
    <script> new WOW().init();</script>
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <script src="/luc/admin-sec/js/jquery-1.10.2.min.js"></script>
    <script src="/luc/admin-sec/js/jquery.nicescroll.js"></script>
    <script src="/luc/admin-sec/js/scripts.js"></script>
    <script src="/luc/admin-sec/js/bootstrap.min.js"></script>
  </head>

  <body class="">
    <a href="login/logout.php">Logout</a>
