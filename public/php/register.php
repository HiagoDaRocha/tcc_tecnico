<?php 

//conexão com o banco de dados 
require 'config.php';  

session_start(); 

$nome = filter_input(INPUT_POST,'name-complete',FILTER_SANITIZE_SPECIAL_CHARS); 
//(FILTER_SANITIZE_SPECIAL_CHARS)Esse filtro serve para transformar tudo escrito em string, caso alguem tente colocar um código no input
$email = filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
//(FILTER_VALIDATE_EMAIL)Esse filtro serve para que o dado email seja enviado so se colocar um @
$senha = password_hash($_POST['password-register'], PASSWORD_DEFAULT);


if($name && $email && $idade){ 
    //validação do e-mail: 
    $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email"); 
    //sempre qdo vamos enviar dados, fazer com prepare() 
    $sql->bindvalue(':email', $email); 
    $sql->execute(); 
    if($sql-> rowCount() === 0){ 
    //query de inserção 
    $sql = $pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:name, 
    :email)"); //templates 
    $sql->bindvalue(':name-complete', $name);  
    $sql->bindvalue(':email', $email); 
    $sql->execute(); 
    header("Location: index.php"); 
    exit; 
    } else { 
    header("Location: adicionar.php"); 
    exit; 
    } 
    } else { 
    header("Location: adicionar.php"); 
    exit; 
}


?>