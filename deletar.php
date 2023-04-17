<?php

require 'config.php';
require 'Dao/ContatoDaoMysql.php';


$contatoDao = new ContatoDaoMysql($pdo);

$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $contatoDao->deletar($id);
}

header('Location: index.php');
exit;