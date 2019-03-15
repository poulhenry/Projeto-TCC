<?php
    include('conexao.php');
 ?>

 <?php
    $depoimentos = "SELECT * FROM Relato where idusuario = '{$_GET['id_usuario']}' ORDER BY id_relato desc";
    $resultado = mysqli_query($conexao, $depoimentos) or die(mysqli_error($conexao));
  ?>

<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Meus relatos</title>
    <h3><a href="painel.php">Relatos</a></h3>
    <h3><h2><a href="logout.php">Sair</a></h2></h3>
  </head>
  <body>
      <?php while ($linha = mysqli_fetch_assoc($resultado)){?>
      <ul>
        <li><?php echo utf8_encode($linha['historia']); ?></li>
        <li><?php echo utf8_encode($linha['categoria']); ?></li>
        <li><a href="grupo_apoio.php?id_relato=<?php echo $linha['id_relato'] ?>">Grupo de apoio</a> </li>
      </ul>
      <?php } ?>
  </body>
</html>
