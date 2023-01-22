<?php

include_once("../classes/Consulta.php");
if (isset($_SESSION['administrador'])){
$objConsulta = new Consulta();

if (isset($_GET['id'])) {
    $objConsulta->selecionarPorId($_GET['id']);
}
$retorno = $objConsulta->retornoBD->fetch_object();
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
            <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">IdCliente</label>
                    <input type="text" class="form-control" id="id-consulta" autocomplete="off" aria-describedby="emailHelp" name="idClienteConsulta" value="<?php echo $retorno->id_cliente; ?> " >
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">IdAnimal</label>
                    <input type="text" class="form-control" id="nome-consulta" autocomplete="off" aria-describedby="nomeHelp" name="idAnimalConsulta" value="<?php echo $retorno->id_animal; ?> ">
                    <div id="nomeHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="cpf" class="form-label">OBS</label>
                    <input type="text" class="form-control" id="obs-consulta" autocomplete="off" aria-describedby="cpfHelp" name="obsConsulta" value="<?php echo $retorno->obs_consulta; ?> ">
                    <div id="cpf" class="form-text"></div>
                </div>
                
               
                <input type="hidden" value="<?php echo $retorno->id_consulta; ?>" name="idConsulta" >
                <input type="hidden" name="formEditarConsulta">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>


        </div>
    </div>
</div>
<?php

}else{
    header("Location:../index.html");
}

?>