<?php


if(isset($_POST['idClienteDeletar'])){
    include_once("../classes/Cliente.php");

    $objCliente = new Cliente();
    $objCliente->deletar($_POST['idClienteDeletar']);
}
if(isset($_POST['idAnimalDeletar'])){
    include_once("../classes/Animal.php");
    $objAnimal = new Animal();
    $objAnimal->deletar($_POST['idAnimalDeletar']);
}
if(isset($_POST['idConsultaDeletar'])){
    include_once("../classes/Consulta.php");
    $objConsulta = new Consulta();
    $objConsulta->deletar($_POST['idConsultaDeletar']);
}
