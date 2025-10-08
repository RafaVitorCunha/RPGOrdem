<?php
require_once __DIR__ . "/../dao/PersonagemDAO.php";
require_once __DIR__ . "/../util/Connection.php";
class PersonagemService {
    private $dao;
    public function __construct() {
        $conn = Connection::getConn();
        $this->dao = new PersonagemDAO($conn);
    }
    public function listar() { return $this->dao->listar(); }
    public function buscarPorId($id) { return $this->dao->buscarPorId($id); }
    public function inserir($data) {
        $this->validar($data);
        $this->dao->inserir($data);
    }
    public function atualizar($data) {
        $this->validar($data,true);
        $this->dao->atualizar($data);
    }
    public function excluir($id) { $this->dao->excluir($id); }
    private function validar($data,$isUpdate=false) {
        if($isUpdate && (!isset($data['id']) || !filter_var($data['id'],FILTER_VALIDATE_INT))) { throw new Exception("ID inválido"); }
        if(!isset($data['nome']) || trim($data['nome']) === '') { throw new Exception("Nome obrigatório"); }
        if(!isset($data['idade']) || !filter_var($data['idade'],FILTER_VALIDATE_INT)) { throw new Exception("Idade inválida"); }
        if(!isset($data['nex']) || !filter_var($data['nex'],FILTER_VALIDATE_INT)) { throw new Exception("NEX inválido"); }
        if(!isset($data['classe_id']) || !filter_var($data['classe_id'],FILTER_VALIDATE_INT)) { throw new Exception("Classe inválida"); }
        if(!isset($data['origem_id']) || !filter_var($data['origem_id'],FILTER_VALIDATE_INT)) { throw new Exception("Origem inválida"); }
        if(!isset($data['historia']) || trim($data['historia']) === '') { throw new Exception("História obrigatória"); }
        if((int)$data['idade'] < 0 || (int)$data['idade'] > 1000) { throw new Exception("Idade fora do intervalo"); }
        if((int)$data['nex'] < 0 || (int)$data['nex'] > 100) { throw new Exception("NEX fora do intervalo"); }
    }
}
