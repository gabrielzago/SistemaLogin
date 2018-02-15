<?php
  include_once ("topo.php");

  $users = "Select * from user_admin";
  $resUsers = query($users);
?>
  <table>
    <tr>
      <th>Nome</th>
      <th>Login</th>
      <th>Email</th>
      <th>Excluir</th>
      <th>Editar</th>
    </tr>
    <?php foreach ($resUsers as $user) { ?>
    <tr id="<?php echo $user['codigo'];?>">
      <td><?php echo $user['nome'];?></td>
      <td><?php echo $user['login'];?></td>
      <td><?php echo $user['email'];?></td>
      <td><span onclick="deletaUser(<?php echo $user['codigo'];?>)">X</span></td>
      <td><a href="cadastroUsuario.php?user=<?php echo $user['codigo'];?>">Editar</a></td>
    </tr>
  <?php } ?>
</table>

  <script>
    function deletaUser(id){
      $.ajax({
        url:"funcoes/deletaUsuario.php",
        type:"post",
        data:{id:id},
        dataType:"json",
        success:function(response){
          if(response == 'erro'){
            alert("Erro ao Excluir");
          }else {
            alert("Excluido com sucesso");
            $('#'+id).hide();
          }
        }
      });
    }
  </script>
<?php
  include_once ("footer.php");
?>
