<?php
session_start();
include('conexao.php');
$_SESSION['id_relato'] = $_GET['id_relato'];
$id_usuario = $_SESSION['id_usuario'];
?>

<?php
    $query = "SELECT * FROM Grupo_Apoio AS grupoapoio INNER JOIN Usuario AS usuario ON grupoapoio.id_usuario = usuario.id_usuario where id_relato = '{$_SESSION['id_relato']}'  ORDER BY id_grupo desc";
    $result = mysqli_query($conexao, $query) or die(mysqli_error($conexao));
  ?>

    <!DOCTYPE html>
    <html lang="pt" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
          <h3><a href="painel.php">Relatos</a></h3>
          <h3><a href="logout.php">Sair</a></h3>
      </head>
      <body>

        <form action="interagir_grupo.php" method="get">
          <input type="text" name="mensagens" placeholder="Compartilhe">
          <input type="submit" name="" value="inserir">
        </form>

        <?php while ($linha = mysqli_fetch_assoc($result)) { ?>
          <ul>
            <li><?php echo utf8_encode($linha['nome']); ?></li>
            <li><?php echo utf8_encode($linha['mensagens']); ?></li>
          </ul>
        <?php } ?>

      </body>
    </html>
