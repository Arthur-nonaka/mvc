<?php
public class Produto {
    private $nome;
    private $fabricante;
    private $descricao;
    private $valor;

    public function __construct($nome, $fabricante, $descricao, $valor) {
        $this->nome = $nome;
        $this->fabricante = $fabricante;
        $this->descricao = $descricao;
        $this->valor = $valor;
    }

    public function getNome() {
        return $this->nome;
    }
    public function getFabricante() {
        return $this->fabricante;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function getValor() {
        return $this->valor;
    }

    public function aplicarCupom($cupomTaxa) {
        $valorDesconto = ($this->valor * $cupomTaxa) / 100;
        $this->valor = $this->valor - $valorDesconto;
    }
}