<?php

class Database {
    private $host;
    private $login;
    private $password;
    private $database;

    public function __construct($host, $login, $password, $database) {
        $this->host = $host;
        $this->login = $login;
        $this->password = $password;
        $this->database = $database;
    }

    public function ConnectDB() {
        $conexao = mysqli_connect($this->host, $this->login, $this->password, $this->database);
        return $conexao;
    }

    public function inserirCliente($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $senha){
    
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO cliente (cpf, nome, sobrenome, dataNascimento, telefone, email, senha) 
                     VALUES ('$cpf','$nome','$sobrenome','$dataNasc','$telefone','$email','$senha')";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirProduto(Produto $produto){
        
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO produto (nome, fabricante, descricao, valor) 
                     VALUES ('$produto->getNome()','$produto->getFabricante','$produto->getDescricao','$produto->getValor')";
        mysqli_query($conexao,$consulta);
    }
    
    public function inserirFuncionario($cpf, $nome, $sobrenome, $dataNasc, $telefone, $email, $salario){
        
        $conexao = $this->conectarBD();
        $consulta = "INSERT INTO funcionario (cpf, nome, sobrenome, dataNascimento, telefone, email, salario) 
                     VALUES ('$cpf','$nome','$sobrenome','$dataNasc','$telefone','$email','$salario')";
        mysqli_query($conexao,$consulta);
    }

    function retornarClientes(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM cliente";
        $listaClientes = mysqli_query($conexao,$consulta);
        return $listaClientes;
    }
    
    function retornarProdutos(){
        $conexao = conectarBD();
        $consulta = "SELECT * FROM produto";
        $listaProdutos = mysqli_query($conexao,$consulta);
        return $listaProdutos;
    }

    function retornarFuncionarios(){
        $conexao = conectarBD();
        $consulta = "SELECT * FROM funcionario";
        $listaProdutos = mysqli_query($conexao,$consulta);
        return $listaFuncionarios;
    }
}