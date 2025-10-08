<?php
class PersonagemDAO {
    private $conn;
    public function __construct($conn) { $this->conn = $conn; }
    public function listar() {
        $sql = "SELECT p.*, c.nome AS classe, o.nome AS origem FROM personagem p JOIN classe c ON p.classe_id = c.id JOIN origem o ON p.origem_id = o.id ORDER BY p.nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function buscarPorId($id) {
        $sql = "SELECT * FROM personagem WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function inserir($p) {
        $sql = "INSERT INTO personagem (nome,idade,nex,classe_id,origem_id,historia) VALUES (:nome,:idade,:nex,:classe_id,:origem_id,:historia)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":nome",$p['nome']);
        $stmt->bindValue(":idade",$p['idade'],PDO::PARAM_INT);
        $stmt->bindValue(":nex",$p['nex'],PDO::PARAM_INT);
        $stmt->bindValue(":classe_id",$p['classe_id'],PDO::PARAM_INT);
        $stmt->bindValue(":origem_id",$p['origem_id'],PDO::PARAM_INT);
        $stmt->bindValue(":historia",$p['historia']);
        $stmt->execute();
    }
    
    public function excluir($id) {
        $sql = "DELETE FROM personagem WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }
}
