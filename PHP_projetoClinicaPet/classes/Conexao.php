<?php

class Conexao{

    private $url;
    private $usuario;
    private $senha;
    private $baseDeDados;


    public function __construct() {
        $this->url = "127.0.0.1";
        $this->usuario = "root";
        $this->senha = "qwerty123";
        $this->baseDeDados = 'clinica_pet';
    }

    public function getConexao() {
        return  new mysqli( $this->url, $this->usuario, $this->senha, $this->baseDeDados);
    }
}
