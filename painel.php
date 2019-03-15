<?php
   session_start();
   include('verifica_login.php');
   include('conexao.php')
?>
<h2>Ola, <?php echo $_SESSION['usuario'];?></h2>
<h2><a href="logout.php">Sair</a></h2>
<h2><a href="meusrelatos.php?id_usuario=<?php echo $_SESSION['id_usuario']; ?>">Meus relatos </a></h2>

<?php
    $depoimentos = "SELECT * FROM Relato AS relato INNER JOIN Usuario AS usuario ON relato.id_usuario = usuario.id_usuario ORDER BY id_relato desc";
    $resultado = mysqli_query($conexao, $depoimentos);

    if(!$resultado){
      die("Falha na conexão a tabela Relato");
    }

 ?>

<?php
  if(isset($_GET["historia"])){
    $historia = utf8_decode($_GET["historia"]);
    $categoria = utf8_decode($_GET["categoria"]);
    $id_usuario = $_SESSION['id_usuario'];

    $inserir = "INSERT INTO Relato ";
    $inserir .= "(id_usuario,historia,categoria) ";
    $inserir .= "VALUES ";
    $inserir .= "('$id_usuario','$historia','$categoria')";

    $operacao_inserir = mysqli_query($conexao,$inserir);
    if(!$operacao_inserir){
      die("erro" . mysqli_error($conexao));

    }

  }

 ?>


<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Depoimentos</title>
  </head>
  <body>
    <form action="painel.php" method="get">
      <input type="text" name="historia" placeholder="Compartilhe">
      <input type="text" name="categoria" placeholder="Do que você deseja falar?">
      <input type="submit" value="inserir">
      <?php header("Refresh: 60; url=painel.php") ?>
    </form>
    <main>
        <div id="listagem_depoimentos">
            <?php while ($linha = mysqli_fetch_assoc($resultado)) { ?>

             <ul>
               <li><?php echo utf8_encode($linha['nome']); ?></li>
               <li><?php echo utf8_encode($linha['categoria']); ?></li>
               <li><?php echo utf8_encode($linha['historia']); ?></li>
               <li><a href="grupo_apoio.php?id_relato=<?php echo $linha['id_relato'] ?>">Faça parte</a> </li>
             </ul>

           <?php } ?>
        </div>
      </main>
  </body>
</html>
