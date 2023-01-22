<?php
session_start();
include_once("classes/Conexao.php");
include_once("classes/Utilidades.php");
include_once("verificarlogin.php");

if(empty($_POST['usuario']) || empty($_POST['senha'])){
    header('Location:produto/index.html');
}

$objConexao = new Conexao();


$conexaoBD= $objConexao->getConexao();

$usuario =  mysqli_real_escape_string($conexaoBD ,$_POST['usuario']);
$senha = mysqli_real_escape_string($conexaoBD ,$_POST['senha']);

$query = "SELECT id_usuario, usuario from login where usuario = '{$usuario}' and senha = '{$senha}'";
$result = mysqli_query($conexaoBD,$query);
$row_affecteds = mysqli_num_rows($result);

if($row_affecteds == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location:produto/admin.php');
    exit();
}
else{
    header('Location:index.html');
    exit();
}





?>
