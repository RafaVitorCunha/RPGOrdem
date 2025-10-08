<?php
require_once __DIR__ . "/../dao/OrigemDAO.php";
require_once __DIR__ . "/../util/Connection.php";
class OrigemController {
    private $dao;
    public function __construct() {
        $this->dao = new OrigemDAO(Connection::getConn());
    }
    public function listar() {
        $origens = $this->dao->listar();
        include __DIR__ . "/../view/origens/listar.php";
    }
    public function inserir() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            if(trim($nome) === '') { $erro = "Nome obrigatório"; } else {
                $this->dao->inserir(['nome'=>$nome]);
                header("Location: index.php?rota=origem&acao=listar");
                exit;
            }
        }
        include __DIR__ . "/../view/origens/inserir.php";
    }
    public function alterar() {
        $id = $_GET['id'] ?? null;
        if(!$id) { header("Location: index.php?rota=origem&acao=listar"); exit; }
        $origem = $this->dao->buscarPorId($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'] ?? '';
            if(trim($nome) === '') { $erro = "Nome obrigatório"; } else {
                $this->dao->atualizar(['id'=>$id,'nome'=>$nome]);
                header("Location: index.php?rota=origem&acao=listar");
                exit;
            }
        }
        include __DIR__ . "/../view/origens/alterar.php";
    }
    public function excluir() {
        $id = $_GET['id'] ?? null;
        if(!$id) { header("Location: index.php?rota=origem&acao=listar"); exit; }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->dao->excluir($_POST['id']);
            header("Location: index.php?rota=origem&acao=listar");
            exit;
        }
        $origem = $this->dao->buscarPorId($id);
        include __DIR__ . "/../view/origens/excluir.php";
    }
}
