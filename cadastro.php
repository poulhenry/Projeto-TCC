<?php
session_start();
include "conexao.php";
unset($_SESSION['cadastro_invalido']);
if(isset($_GET['nome']) && $_GET['nome'] != '' && isset($_GET['senha']) && $_GET['senha'] && isset($_GET['email']) && $_GET['email']){
  $cadastro = array();
  $cadastro['nome'] = $_GET['nome'];
  $cadastro['senha'] = $_GET['senha'];
  $cadastro['email'] = $_GET['email'];

  if(isset($_GET['formaajuda'])){
    $cadastro['formaajuda'] = $_GET['formaajuda'];
  } else {
    $cadastro['formaajuda'] = '';
  }
  if(isset($_GET['formaajudado'])){
    $cadastro['formaajudado'] = $_GET['formaajudado'];
  } else {
    $cadastro['formaajudado'] = '';
  }
  gravar_tarefa($conexao, $cadastro);
  header('Location: login.php');
} 
include "telacadastro.php";
