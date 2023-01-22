<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">IdCliente</label>
                    <input type="text" class="form-control" id="id-consulta" autocomplete="off" aria-describedby="emailHelp" name="idClienteConsulta" >
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">IdAnimal</label>
                    <input type="text" class="form-control" id="nome-consulta" autocomplete="off" aria-describedby="nomeHelp" name="idAnimalConsulta" >
                    <div id="nomeHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="cpf" class="form-label">OBS</label>
                    <input type="text" class="form-control" id="obs-consulta" autocomplete="off" aria-describedby="cpfHelp" name="obsConsulta" >
                    <div id="cpf" class="form-text"></div>
                </div>
                
                
                
                <input type="hidden" name="formCadastrarConsulta">
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