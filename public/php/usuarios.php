<?php
session_start(); // Inicia a sessão

//Verifica se a sessão está vazia
if (empty($_SESSION)) {
    header("Location:../index.php");
    exit;
}

// Conexão com o banco de dados
require 'config.php'; // Inclusão com arquivo de configuração com a conexão com o banco de dados

// Consulta o banco de dados para verificar o nível de acesso do usuário
$sql = $pdo->prepare("SELECT permissoes FROM usuarios WHERE login = ?");
$sql->bindValue(1, $_SESSION['usuario']['login']); // Supondo que 'login' seja o nome do campo de login na sua tabela de usuários
$sql->execute();
$dados_usuario = $sql->fetch(PDO::FETCH_ASSOC);

// Verifica se o usuário é administrador
if ($dados_usuario && $dados_usuario['permissoes'] === 1) {
    $administrador = true;
} else {
    $administrador = false;
}

// Obtém o ID do usuário da sessão
$userId = $_SESSION['usuario']['id'];

// Verifica se a variável de sessão 'usuario' está definida e possui um nome
if (isset($_SESSION['usuario']) && isset($_SESSION['usuario']['nome'])) {
  $nomeCompleto = $_SESSION['usuario']['nome'];

  // Consulta para recuperar os dados do usuário
  $sql = $pdo->prepare("SELECT email, senha, login, telefone, descricao, imagens FROM usuarios WHERE id = ?");
  $sql->bindValue(1, $userId);
  $sql->execute();

  $userData = $sql->fetch(PDO::FETCH_ASSOC);

  if ($userData) {
      $email = $userData['email'];
      $senha = $userData['senha'];
      $login = $userData['login'];
      $telefone = $userData['telefone'];
      $descricao = $userData['descricao'];
      $imagens = $userData['imagens'];
  }
}

?>