<?php

require 'config.php';
require 'Dao/ContatoDaoMysql.php';


$contatoDao = new ContatoDaoMysql($pdo);

$id = filter_input(INPUT_POST, 'id');
$nome = filter_input(INPUT_POST, 'nome');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($id && $nome && $telefone) {
    
    $contato = new Contato();
    $contato->setId($id);
    $contato->setNome($nome);
    $contato->setTelefone($telefone);
    $contato->setEmail($email);

    $contatoDao->atualizar($contato);

    header('Location: index.php');
    exit;
} else {
    header('Location: editar.php?id='.$id);
    exit;
}

