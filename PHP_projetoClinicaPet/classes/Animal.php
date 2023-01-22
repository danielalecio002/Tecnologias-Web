<?php
include("../classes/Conexao.php");
include("../classes/Utilidades.php");
class Animal{

   private $nome;
   private $tipo;
   private $id;
   private $idCliente;
   
  

   public $retornoBD;
   public $conexaoBD;
   
   public function  __construct()   {      
      $objConexao= new Conexao();
      $this->conexaoBD= $objConexao->getConexao();
      $this->utilidades= new Utilidades();

   }

   public function getNome(){
    return $this->nome; 
   }
    public function getId(){
        return $this->id;
    }
    public function getTipo(){
        return $this->tipo;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    
    
    public function setNome($nome){
        //validacao
        return $this->nome =  mb_strtoupper($nome, 'UTF-8');
    }
    public function setId($id){
        //validacao
        return $this->id=$id;
    }
    public function setTipo($tipo){
        //validacao
        return $this->tipo=$tipo;
    }
    public function setIdCliente($idCliente){
          return $this->idCliente = $idCliente;
    }

    public function cadastrar(){
        $n_nome = $this->getNome();
        $t_tipo = $this->getTipo();
        $i_idCliente = $this->getIdCliente();
      
        if($this->getNome()!=null  ){
            
            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO animal (nome_animal, tipo_animal, id_cliente) 
            VALUES (?, ?, ?)");
            $interacaoMySql->bind_param('sss', $n_nome,$t_tipo,$i_idCliente);
            $retorno= $interacaoMySql->execute();

           $id = mysqli_insert_id($this->conexaoBD);
          
          return $this->utilidades->validaRedirecionar( $retorno, $id, "admin.php?rota=visualizar_animal", "O animal foi cadastrado com sucesso!");
        }else{
          return $this->utilidades->mesagemParaUsuario("Erro, cadastro não realizado!");
       }
    }
    public function selecionarPorId($id){
        $sql="select * from animal where id_animal=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarPorNome($nome){
        $sql="select * from animal where nome_animal = '$nome'";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarAnimais(){
        $sql="select * from animal";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
   
    public function editar(){
        
        if($this->getId()!=null){
            $n_nome = $this->getNome();
            $t_tipo = $this->getTipo();
            $i_idCliente = $this->getIdCliente();
            $i_id = $this->getId();
            $interacaoMySql = $this->conexaoBD->prepare("UPDATE  animal set  nome_animal=?, tipo_animal=?, id_cliente=? 
            where id_animal=?");
            $interacaoMySql->bind_param('ssii',$n_nome ,$t_tipo,$i_idCliente,$i_id);
            $retorno=$interacaoMySql->execute();
            if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
              }

          
          return $this->utilidades->validaRedirecionar( $retorno, $this->getId(), "admin.php?rota=visualizar_animal", "Os dados do animal foram alterados com sucesso!");
        }else{
           return $this->utilidades->mesagemParaUsuario("Erro!");
        }
    }
    public function deletar($id){
        $sql="DELETE from animal where id_animal=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD,'admin.php?rota=visualizar_animal','O cliente foi deletado com sucesso!');
    }
   
       
  }

