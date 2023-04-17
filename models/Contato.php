<?php

class Contato {

    private $id;
    private $nome;
    private $email;
    private $telefone;

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = ucwords(trim($nome));
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = strtolower(trim($email));
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
}

interface ContatoDAO {
    public function adicionar(Contato $c);
    public function findByAll();
    public function findByEmail($email);
    public function findById($id);
    public function findByTelefone($telefone);
    public function atualizar(Contato $c);
    public function deletar($id);
}