<?php
  define('HOST', 'localhost');
  define('USUARIO', 'andre');
  define('SENHA',  '123456');
  define('DB', 'projeto');

  $conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possível conectar');

  function gravar_tarefa($conexao, $cadastro) {
      $sqlGravar = "
          INSERT INTO Usuario
          (nome, senha,email,formaajuda, formaajudado)
          VALUES
          (
              '{$cadastro['nome']}',
              '{$cadastro['senha']}',
              '{$cadastro['email']}',
              '{$cadastro['formaajuda']}',
              '{$cadastro['formaajudado']}'
          )
      ";
      $inserir = mysqli_query($conexao, $sqlGravar) or die(mysqli_error($conexao));
    }

 ?>
