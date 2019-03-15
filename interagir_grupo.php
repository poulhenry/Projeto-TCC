<?php session_start();
      include('conexao.php');
 ?>

<?php
  echo $_SESSION['id_relato'];
  echo $_SESSION['id_usuario'];
 ?>

 <?php
     if (isset($_GET["mensagens"])) {
       $id_relato = $_SESSION['id_relato'];
       $id_usuario = $_SESSION['id_usuario'];
       $mensagens = $_GET['mensagens'];

       $inserir = "INSERT INTO Grupo_Apoio ";
       $inserir .= "(id_usuario,id_relato,mensagens) ";
       $inserir .= "VALUES ";
       $inserir .= "('$id_usuario','$id_relato','$mensagens')";

       $operacao_inserir = mysqli_query($conexao,$inserir);
       if(!$operacao_inserir){
         die("erro" . mysqli_error($conexao));

       } else {
         header('Location: painel.php');
       }

     }

  ?>
