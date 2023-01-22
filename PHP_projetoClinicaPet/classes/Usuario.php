<?php
include("../classes/Conexao.php");
include("../classes/Utilidades.php");
class Usuario{

   private $id;
   private $usuario;
   private $senha;


   public $retornoBD;
   public $conexaoBD;
   
   public function  __construct()   {      
      $objConexao= new Conexao();
      $this->conexaoBD= $objConexao->getConexao();
      $this->utilidades= new Utilidades();

   }

    public function getId(){
        return $this->id;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getSenha(){
        return $this->senha;
    }
   
    
    public function setUsuario($usuario){
        //validacao
        return $this->usuario= $usuario;
    }
    public function setSenha($senha){
        //validacao
        return $this->senha = $senha;
    }
   
    public function setId($id){
        //validacao
        return $this->id=$id;
    }
   
    public function login(){

        echo "teste php";
    }
   

   
   
  }

