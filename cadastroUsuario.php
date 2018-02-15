<?php
  include_once ("topo.php");

  $id_user = $_GET["user"];

  if(isset($id_user)){
    $sql = "Select * from user_admin where codigo = ".$id_user." limit 1";
    $resSql = query($sql);

    $caminho = "funcoes/alteraUsuario.php";
  }else {
    $caminho = "funcoes/insereUsuario.php";
    $id_user= 0;
  }

?>
    <input type="text" id="user" name="usuario" value="<?php echo $resSql[0]['login']?>" placeholder="User">
    <input type="password" id="senha" name="senha" value="" placeholder="Senha">
    <input type="text" id="nome" name="nome" value="<?php echo $resSql[0]['nome']?>" placeholder="Nome">
    <input type="email" id="email" name="email" value="<?php echo $resSql[0]['email']?>" placeholder="E-mail">

    <button id="save">Salvar</button>

  <script>
    $("#msgErro").hide();
    $("#save").click(function(){
      var login = $("#user").val();
      var senha = $("#senha").val();
      var nome = $("#nome").val();
      var email = $("#email").val();
      if(login == "" || senha == "" || nome == "" || email == ""){
          alert("Por favor Preencha todos os campos");
      }else {
        var id = <?php echo $id_user?>;
        $.ajax({
            url:"<?php echo $caminho; ?>",
            type:"post",
            data:{login:login, senha:senha, nome:nome, email:email, id:id},
            dataType:"json",
            success:function(response){
              if(response == 'erro'){
                alert("Erro ao salvar");
              }else {
                alert("Salvo com sucesso");
              }
            }
        });
      }
    });
  </script>

<?php
  include_once ("footer.php");
?>
