<?php

require 'models/Contato.php';


class ContatoDaoMysql implements ContatoDAO 
{
    private $pdo;

    public function __construct(PDO $drive)
    {
        $this->pdo = $drive;
    }

    public function adicionar(Contato $c)
    {
        $sql = $this->pdo->prepare("INSERT INTO listaTelefonica (nome, telefone, email) VALUES (:nome, :telefone, :email)");
        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':telefone', $c->getTelefone());
        $sql->bindValue(':email', $c->getEmail());
        $sql->execute();

        $c->setId( $this->pdo->lastInsertId() );
        return $c;
    }

    public function findByAll()
    {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM listaTelefonica");

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach($data as $item) {
                $c = new Contato();
                $c->setId($item['id']);
                $c->setNome($item['nome']);
                $c->setEmail($item['email']);
                $c->setTelefone($item['telefone']);

                $array[] = $c;
            }
        }

        return $array;
    }

    public function findByEmail($email)
    {

    }

    public function findById($id)
    {
        $sql = $this->pdo->prepare("SELECT * FROM listaTelefonica WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $item = $sql->fetch();

            $c = new Contato();
            $c->setId($item['id']);
            $c->setNome($item['nome']);
            $c->setTelefone($item['telefone']);
            $c->setEmail($item['email']);

            return $c;
        } else {
            return false;
        }
    }

    public function findByTelefone($telefone)
    {
        $sql = $this->pdo->prepare("SELECT * FROM listaTelefonica WHERE telefone = :telefone");
        $sql->bindValue(':telefone', $telefone);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $item = $sql->fetch();

            $c = new Contato();
            $c->setId($item['id']);
            $c->setNome($item['nome']);
            $c->setTelefone($item['telefone']);
            $c->setEmail($item['email']);

            return $c;
        } else {
            return false;
        }
    }

    public function atualizar(Contato $c)
    {
        $sql = $this->pdo->prepare("UPDATE listaTelefonica SET nome = :nome, telefone = :telefone, email = :email WHERE id = :id");
        $sql->bindValue(':nome', $c->getNome());
        $sql->bindValue(':telefone', $c->getTelefone());
        $sql->bindValue(':email', $c->getEmail());
        $sql->bindValue('id', $c->getId());
        $sql->execute();

        return true;
    }

    public function deletar($id)
    {
        $sql = $this->pdo->prepare("DELETE FROM listaTelefonica WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}