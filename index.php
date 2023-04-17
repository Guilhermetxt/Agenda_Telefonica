<?php

require 'config.php';
require 'Dao/ContatoDaoMysql.php';
require 'style.php';

$contatoDao = new ContatoDaoMysql($pdo);
$lista = $contatoDao->findByAll();


?>

<div class="container">

    <h1 class="display-2 text-center">Agenda Telefonica</h1>

    <a class="btn btn-success" href="adicionar.php">Adicionar contato</a>

    <table border="1" class="table table-hover text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>TELEFONE</th>
                <th>EMAIL</th>
                <th>#</th>
            </tr>
        </thead>
        
        <?php foreach($lista as $contato): ?>
            <tr>
                <td><?=$contato->getId();?></td>
                <td><?=$contato->getNome();?></td>
                <td><?=$contato->getTelefone();?></td>
                <td><?=$contato->getEmail();?></td>
                <td>
                    <a class="btn btn-warning" href="editar.php?id=<?=$contato->getId();?>">Editar</a>
                    <a class="btn btn-danger" href="deletar.php?id=<?=$contato->getId();?>" onclick="return confirm('Tem certeza de deseja excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>
