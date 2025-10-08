<?php
class ClasseDAO {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }
    public function listar() {
        $sql = "SELECT * FROM classe ORDER BY nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function buscarPorId($id) {
        $sql = "SELECT * FROM classe WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function inserir($classe) {
        $sql = "INSERT INTO classe (nome) VALUES (:nome)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome",$classe['nome']);
        $stmt->execute();
    }
    public function atualizar($classe) {
        $sql = "UPDATE classe SET nome = :nome WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome",$classe['nome']);
        $stmt->bindValue(":id",$classe['id'],PDO::PARAM_INT);
        $stmt->execute();
    }
    public function excluir($id) {
        $sql = "DELETE FROM classe WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}
