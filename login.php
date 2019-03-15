<?php
   session_start();
   include('conexao.php');

   if(empty($_POST['usuario']) || empty($_POST['senha']))
   {
     header('Location: index.php');
     exit();
   }
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select idusuario,nome from usuario where nome = '{$usuario}' and senha = '{$senha}'";

$result = mysqli_query($conexao, $query) or die(mysqli_error($conexao));

while ($linha = mysqli_fetch_assoc($result)){
  $id_usuario = $linha['idusuario'];
}

$row = mysqli_num_rows($result);
echo $row;
if($row == 1){
  $_SESSION['usuario'] = $usuario;
  $_SESSION['idusuario'] = $id_usuario;
  header('Location: painel.php');
  exit();
} else {
  $_SESSION['nao_autenticado'] = true;
  header('Location: index.php');
  exit();
}


 ?>
