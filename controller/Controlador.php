<?php

require_once '../model/Database.php';
require_once '../model/Produto.php';

class Controlador {
    private $database;

    public function __construct() {
        $this->database = new Database("localhost", "root", "", "xhopii");
    }

    public function cadastrarProduto($nome,$fabricante,$descricao,$valor) {
        $produto = new Produto($nome, $fabricante, $descricao, $valor);
        $this->database->inserirProduto($produto);
    }

    public function visualizarProduto() {
        $listaProdutos = $this->database->retornarProdutos();
        while($produto = mysqli_fetch_assoc($listaProdutos)) {
            return "<section class=\"conteudo-bloco\">" .
            "<h2>" . $produto["nome"] . "</h2>" .
            "<p>Fabricante: " . $produto["fabricante"] . "</p>" . 
            "<p>Descrição: " . $produto["descricao"] . "</p>" . 
            "<p>Valor: " . $produto["valor"] . "</p>" . 
            "</section>";
        }
    }
}
