<?php
include("../classes/Conexao.php");
include("../classes/Utilidades.php");
class Consulta{

   private $id;
   private $idCliente;
   private $idAnimal;
   private $Obs;
   
  

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
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getIdAnimal(){
        return $this->idAnimal;
    }
    public function getObs(){
        return $this->Obs;
    }
    
    public function setId($id){
        //validacao
        return $this->id=$id;
    }
    public function setIdCliente($idCliente){
        return $this->idCliente = $idCliente;
    }
    public function setIdAnimal($idAnimal){
        return $this->idAnimal = $idAnimal;
    }
    
    public function setObs($Obs){
            //validacao
        return $this->Obs=$Obs;
    }
    

    public function cadastrar(){
        $i_idCliente = $this->getIdCliente();
        $i_idAnimal = $this->getIdAnimal();
        $o_obs = $this->getObs();
            if($this->getIdCliente() != null && $this->getIdAnimal() != null){
            $interacaoMySql = $this->conexaoBD->prepare("INSERT INTO consulta (id_cliente, id_animal, obs_consulta) 
            VALUES (?, ?, ?)");
            $interacaoMySql->bind_param('iis', $i_idCliente,$i_idAnimal,$o_obs);
            $retorno= $interacaoMySql->execute();

           $id= mysqli_insert_id($this->conexaoBD);
          
           return $this->utilidades->validaRedirecionar( $retorno, $id, "admin.php?rota=visualizar_consulta", "A consulta foi cadastrada com sucesso!");
        }else{
            return $this->utilidades->mesagemParaUsuario("Erro! Preenca os campos idCliente e idAnimal");
        }
    }

    public function selecionarPorId($id){
        $sql="select * from consulta where id_consulta=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
    public function selecionarConsultas(){
        $sql="select * from consulta";
        $this->retornoBD=$this->conexaoBD-> query($sql);
    }
   
   
    public function editar(){
        
        if($this->getId()!=null){
            
            $i_idAnimal = $this->getIdAnimal();
            $i_idCliente = $this->getIdCliente();
            $o_obs = $this->getObs();
            $i_id = $this->getId();
           
           $interacaoMySql = $this->conexaoBD->prepare("UPDATE  consulta set  id_cliente=?, id_animal=?, obs_consulta=? 
            where id_consulta=?");
           
           $interacaoMySql->bind_param('iisi',$i_idCliente ,$i_idAnimal,$o_obs,$i_id);
           $retorno=$interacaoMySql->execute();
           
           if ($retorno === false) {
                trigger_error($this->conexaoBD->error, E_USER_ERROR);
              }

          
          return $this->utilidades->validaRedirecionar( $retorno, $this->getId(), "admin.php?rota=visualizar_consulta", "Os dados da consulta foram alterados com sucesso!");
        }else{
           return $this->utilidades->mesagemParaUsuario("Erro!");
        }
    }


    public function deletar($id){
        $sql="DELETE from consulta where id_consulta=$id";
        $this->retornoBD=$this->conexaoBD-> query($sql);
        $this->utilidades->validaRedirecionaAcaoDeletar($this->retornoBD,'admin.php?rota=visualizar_consulta','A consulta foi deletada com sucesso!');
    }
   
  }

