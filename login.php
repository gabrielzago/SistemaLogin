<?php
  header('Content-Type: text/html; charset=utf-8');
  include_once "conn/conection.php";
?>

<html>
  <head>
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="/luc/admin-sec/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/luc/admin-sec/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/luc/admin-sec/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="/luc/admin-sec/css/icon-font.min.css" type='text/css' />
    <link href="/luc/admin-sec/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="/luc/admin-sec/js/wow.min.js"></script>
    <script> new WOW().init();</script>
    <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
    <script src="/luc/admin-sec/js/jquery-1.10.2.min.js"></script>
  </head>

  <body class="sign-in-up">
    <div style="width:100%; height: 50px; border-bottom: 1px #eee solid; background-color: #333;">
        <p style="color:#fff; padding: 10px;"><span>Admin</span></p>
    </div>
    <section>
        <div id="page-wrapper" class="sign-in-wrapper">
            <div class="graphs">
                <div class="sign-in-form">
                    <div class="signin">
                        <p id="msgReturn" style="color:#FF0000; font-size: 16px; text-align: center;"></p>
                        <form>
                            <div class="log-input">
                                <div class="log-input-left" style="margin-bottom: 25px;">
                                    <input type="text"  class="user" placeholder="Login" style="margin:0px;"/>
                                    <span style="color:#FF0000; font-size: 12px;" id="msgLogin"></span>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="log-input">
                                <div class="log-input-left" style="margin-bottom: 10px;">
                                    <input type="password" id="senha" class="lock" placeholder="senha" style="margin:0px;"/>
                                    <span style="color:#FF0000; font-size: 12px;" id="msgSenha"></span>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="captcha-coment">
                                <div class="captcha" id="captcha_container"></div>
                            </div>
                            <input  id="btnLogin" type="button" value="Entrar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <section>
            <footer style="z-index: 9999;">
                <p>&copy 2018 Administrador.</p>
             </footer>
        </section>
    </section>

    <script src="/luc/admin-sec/js/jquery.nicescroll.js"></script>
    <script src="/luc/admin-sec/js/scripts.js"></script>
    <script src="/luc/admin-sec/js/bootstrap.min.js"></script>
  </body>

  <script type="text/javascript">
    var captchaContainer = null;
    var dados = null;
    var loadCaptcha = function() {
      captchaContainer = grecaptcha.render('captcha_container', {
        'sitekey' : '6LcibEYUAAAAAJSosUU0HIQiBbybWJ44zm9Osch3',
        'callback' : function(response) {
             dados = response;
        }
      });
    };

    $("#btnLogin").click(function(){
          $.ajax({
              url:"captcha.php",
              type:"post",
              data:"g-recaptcha-response="+dados,
              dataType:"html",
              success:function(response){
                  grecaptcha.reset();
                  if(response == 'successful')
                  {
                      var login = $(".user").val();
                      var senha = $("#senha").val();

                      if(login == ""){
                          $(".user").addClass('border-red');
                          $("#msgLogin").html('Preencha corretamente o campo!');
                      }
                      else if(senha == ""){
                          $("#senha").addClass('border-red');
                          $("#msgSenha").html('Preencha corretamente o campo!');
                      }
                      else{
                          $.ajax({
                              url:"login/autentica.php",
                              type:"post",
                              data:{login:login, senha:senha},
                              dataType:"json",
                              success:function(data){
                                  if(data != "negado"){
                                      for(var i=0; i<data.length; i++){
                                          createSessionUser(data[i].codigo, data[i].nome, data[i].login, data[i].email);
                                      }
                                  }
                                  else{
                                     $("#msgReturn").html('Login e/ou Senha Inválidos!');
                                  }
                              }
                          });
                      }
                  }else{
                      alert("Preencha o Captcha corretamente");
                  }
              }
          });
      });

      $(".user").keyup(function(){
          $(".user").removeClass('border-red');
          $("#msgLogin").empty();
          $("#msgReturn").empty();
      });
      $("#senha").keyup(function(){
          $("#senha").removeClass('border-red');
          $("#msgSenha").empty();
          $("#msgReturn").empty();
      });

      function createSessionUser(codigo, nome, login, email){
          $.ajax({
              url:"login/createSessionUser.php",
              type:"post",
              data:{codigo:codigo, nome:nome, login:login, email:email},
              dataType:"html",
              success:function(data){
                  if(data == "sucesso"){
                      window.location.assign('/luc/admin-sec/index.php');
                  }
                  else{
                      alert('Ocorreu um erro ao criar sessão');
                  }
              }
          });
      }
  </script>

  <script src="https://www.google.com/recaptcha/api.js?hl=pt-BR&onload=loadCaptcha&render=explicit" async defer></script>
  <div id="val"></div>
</html>
