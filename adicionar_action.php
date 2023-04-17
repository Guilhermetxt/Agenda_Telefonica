<?php

require 'config.php';
require 'Dao/ContatoDaoMysql.php';


$contatoDao = new ContatoDaoMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome');
$telefone = filter_input(INPUT_POST, 'telefone');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if ($nome && $telefone) {
    if ($contatoDao->findByTelefone($telefone) === false) {
        $c = new Contato();
        $c->setNome($nome);
        $c->setTelefone($telefone);
        $c->setEmail($email);

        $contatoDao->adicionar($c);
    }

    header('Location: index.php');
    exit;
} else {
    header('Location: adicionar.php');
    exit;
}