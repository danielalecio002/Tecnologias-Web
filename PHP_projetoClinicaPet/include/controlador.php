<?php


//Get
if (isset($_GET['rota'])) {
 
    switch ($_GET['rota']) {
        case "cadastrar_cliente":
            include("../include/cadastrarCliente.php");
            break;

        case "visualizar_cliente":
            include("../include/visualizarCliente.php");
            break;

        case "editar_cliente":
            include("../include/editarCliente.php");
            break;
        case "cadastrar_animal":
            include("../include/cadastrarAnimal.php");
            break;
        case "visualizar_animal":    
            include("../include/visualizarAnimal.php");
            break;
        case "editar_animal":
            include("../include/editarAnimal.php");
            break;
        case "cadastrar_consulta":
            include("../include/cadastrarConsulta.php");
            break; 
        case "visualizar_consulta":
           include("../include/visualizarConsulta.php");
           break;  
        case "editar_consulta":
             include("../include/editarConsulta.php");
            break;   
        case "dashboard":
            include("../include/dashboard.php");
            break;         
    }
}


//Post
if (isset($_POST['formCadastrarCliente'])) {
    include_once("../classes/Cliente.php");
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setEndereco($_POST['enderecoCliente']);
    $objCliente->setCelular($_POST['celularCliente']);
    $objCliente->cadastrar();

} else if (isset($_POST['formEditarCliente'])) {
    include_once("../classes/Cliente.php");
    $objCliente = new Cliente();
    $objCliente->setNome($_POST['nomeCliente']);
    $objCliente->setCPF($_POST['cpfCliente']);
    $objCliente->setEmail($_POST['emailCliente']);
    $objCliente->setEndereco($_POST['enderecoCliente']);
    $objCliente->setCelular($_POST['celularCliente']);
    $objCliente->setId($_POST['idCliente']);
    $objCliente->editar();

}
if(isset($_POST['formCadastrarAnimal'])){
    include_once("../classes/Animal.php");
    $objAnimal  = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setTipo($_POST['tipoAnimal']);
    $objAnimal->setIdCliente($_POST['idDonoAnimal']);
    $objAnimal->cadastrar();

}else if (isset($_POST['formEditarAnimal'])) {
    include_once("../classes/Animal.php");
    $objAnimal = new Animal();
    $objAnimal->setNome($_POST['nomeAnimal']);
    $objAnimal->setTipo($_POST['tipoAnimal']);
    $objAnimal->setIdCliente($_POST['idDonoAnimal']);
    $objAnimal->setId($_POST['idAnimal']);
    $objAnimal->editar();

}
if(isset($_POST['formCadastrarConsulta'])){
    include_once("../classes/Consulta.php");
    $objConsulta  = new Consulta();
    $objConsulta->setIdCliente($_POST['idClienteConsulta']);
    $objConsulta->setIdAnimal($_POST['idAnimalConsulta']);
    $objConsulta->setObs($_POST['obsConsulta']);
    $objConsulta->cadastrar();

}else if(isset($_POST['formEditarConsulta'])){
    include_once("../classes/Consulta.php");
    $objConsulta  = new Consulta();
    $objConsulta->setIdCliente($_POST['idClienteConsulta']);
    $objConsulta->setIdAnimal($_POST['idAnimalConsulta']);
    $objConsulta->setObs($_POST['obsConsulta']);
    $objConsulta->setId($_POST['idConsulta']);
    $objConsulta->editar();

}