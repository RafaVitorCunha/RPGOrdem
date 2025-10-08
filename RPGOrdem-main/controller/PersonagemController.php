<?php
require_once __DIR__ . "/../service/PersonagemService.php";
require_once __DIR__ . "/../dao/ClasseDAO.php";
require_once __DIR__ . "/../dao/OrigemDAO.php";
require_once __DIR__ . "/../util/Connection.php";
class PersonagemController {
    private $service;
    private $classeDao;
    private $origemDao;
    public function __construct() {
        $this->service = new PersonagemService();
        $conn = Connection::getConn();
        $this->classeDao = new ClasseDAO($conn);
        $this->origemDao = new OrigemDAO($conn);
    }
    public function listar() {
        $personagens = $this->service->listar();
        include __DIR__ . "/../view/personagens/listar.php";
    }
    public function inserir() {
        $classes = $this->classeDao->listar();
        $origens = $this->origemDao->listar();
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'nome'=>$_POST['nome'] ?? '',
                    'idade'=>$_POST['idade'] ?? '',
                    'nex'=>$_POST['nex'] ?? '',
                    'classe_id'=>$_POST['classe_id'] ?? '',
                    'origem_id'=>$_POST['origem_id'] ?? '',
                    'historia'=>$_POST['historia'] ?? ''
                ];
                $this->service->inserir($data);
                header("Location: index.php?rota=personagem&acao=listar");
                exit;
            } catch(Exception $e) {
                $erro = $e->getMessage();
            }
        }
        include __DIR__ . "/../view/personagens/inserir.php";
    }
    public function alterar() {
        $classes = $this->classeDao->listar();
        $origens = $this->origemDao->listar();
        $id = $_GET['id'] ?? null;
        if(!$id) { header("Location: index.php?rota=personagem&acao=listar"); exit; }
        $personagem = $this->service->buscarPorId($id);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $data = [
                    'id'=>$_POST['id'] ?? '',
                    'nome'=>$_POST['nome'] ?? '',
                    'idade'=>$_POST['idade'] ?? '',
                    'nex'=>$_POST['nex'] ?? '',
                    'classe_id'=>$_POST['classe_id'] ?? '',
                    'origem_id'=>$_POST['origem_id'] ?? '',
                    'historia'=>$_POST['historia'] ?? ''
                ];
                $this->service->atualizar($data);
                header("Location: index.php?rota=personagem&acao=listar");
                exit;
            } catch(Exception $e) {
                $erro = $e->getMessage();
            }
        }
        include __DIR__ . "/../view/personagens/alterar.php";
    }
    public function excluir() {
        $id = $_GET['id'] ?? null;
        if(!$id) { header("Location: index.php?rota=personagem&acao=listar"); exit; }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->service->excluir($_POST['id']);
            header("Location: index.php?rota=personagem&acao=listar");
            exit;
        }
        $personagem = $this->service->buscarPorId($id);
        include __DIR__ . "/../view/personagens/excluir.php";
    }
}
