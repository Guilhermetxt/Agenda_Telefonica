<?php
require 'style.php';
?>

<div class="container mt-5 col-md-6">
    <h2 class="h1 text-center">Adicionar Contato</h2>

    <form class="bg-dark-subtle p-3 rounded" action="adicionar_action.php" method="POST">
        <div class="mb-3 row">
            <label class="form-label fs-4 col">
                Nome: <br>
                <input class="form-control form-control-lg" type="text" name="nome">
            </label>
        </div>
      
        <div class="mb-3">
            <label class="form-label fs-4">
                Telefone: <br>
                <input class="form-control form-control-lg" type="text" name="telefone">
            </label>
        </div>
      
        <div class="mb-3">
            <label class="form-label fs-4">
                E-mail: <br>
                <input class="form-control form-control-lg" type="email" name="email">
            </label>
        </div>
        
        <div class="d-flex justify-content-center">
            <input class="btn btn-success mb-2" type="submit" value="Adicionar">
        </div>
    </form>
</div>


