<?php
class OrigemDAO {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }
    public function listar() {
        $sql = "SELECT * FROM origem ORDER BY nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function buscarPorId($id) {
        $sql = "SELECT * FROM origem WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function inserir($origem) {
        $sql = "INSERT INTO origem (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome",$origem['nome']);
        $stmt->execute();
    }
    public function atualizar($origem) {
        $sql = "UPDATE origem SET nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome",$origem['nome']);
        $stmt->bindValue(":id",$origem['id'],PDO::PARAM_INT);
        $stmt->execute();
    }
    public function excluir($id) {
        $sql = "DELETE FROM origem WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}
