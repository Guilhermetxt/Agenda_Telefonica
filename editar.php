<?php
require 'config.php';
require 'Dao/ContatoDaoMysql.php';
require 'style.php';


$contatoDao = new ContatoDaoMysql($pdo);
$contato = false;
$id = filter_input(INPUT_GET, 'id');

if ($id) {
    $contato = $contatoDao->findById($id);
}

if ($contato === false) {
    header('Location: index.php');
    exit;
}

?>


<div class="container mt-5 col-md-6">
    <h2 class="h1 text-center">Editar Contato</h2>

    <form class="bg-dark-subtle p-3 rounded" action="editar_action.php" method="POST">
        <input type="hidden" name="id" value="<?=$contato->getId();?>">
        <div class="mb-3 row">
            <label class="form-label fs-4 col">
                Nome: <br>
                <input class="form-control form-control-lg" type="text" name="nome" value="<?=$contato->getNome();?>">
            </label>
        </div>
      
        <div class="mb-3">
            <label class="form-label fs-4">
                Telefone: <br>
                <input class="form-control form-control-lg" type="text" name="telefone" value="<?=$contato->getTelefone();?>">
            </label>
        </div>
      
        <div class="mb-3">
            <label class="form-label fs-4">
                E-mail: <br>
                <input class="form-control form-control-lg" type="email" name="email" value="<?=$contato->getEmail();?>">
            </label>
        </div>
        
        <div class="d-flex justify-content-center">
            <input class="btn btn-success mb-2" type="submit" value="Salvar">
        </div>
    </form>
</div>