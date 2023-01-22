<?php
include_once("../classes/Animal.php");
if (isset($_SESSION['administrador'])){
?>
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Animais</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nome" class="form-label">id</label>
                            <input type="text" class="form-control" id="id-cliente" aria-describedby="cpfHelp" name="idAnimal">
                            <div id="cpf" class="form-text"></div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!--Pesquisar por nome-->
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Animais</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nome-cliente" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="nome-cliente" aria-describedby="cpfHelp" name="nomeAnimal">
                            <div id="nome" class="form-text"></div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$objAnimal = new Animal();
$objAnimal->selecionarPorId(2);

if (isset($_POST['idAnimal'])) {
    $objAnimal->selecionarPorId($_POST['idAnimal']);
}else if(isset($_POST['nomeAnimal'])){
     $objAnimal->selecionarPorNome($_POST['nomeAnimal']);
}else{
    $objAnimal->selecionarAnimais();
}
//$objAnimal->qtdTipoAnimal();

if ($objAnimal->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="5%">#</th>
                    <th width="25%">Nome</th>
                    <th width="25%">Tipo</th>
                    <th width="25%">IdCliente</th>
                    <th width="10%">Editar</th>
                    <th width="10%">Deletar</th>
                </tr>

                <?php

                while ($retorno = $objAnimal->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->id_animal . '</td><td>' .
                        $retorno->nome_animal . '</td><td>' .
                        $retorno->tipo_animal . '</td><td>' .                       
                        $retorno->id_cliente  . '</td>';
                    echo '<td><a href="?rota=editar_animal&id='.$retorno->id_animal.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarAnimal("' . $retorno->id_animal . '")\';><i class="fas fa-trash"></i></a></td></tr>';
                }

                ?>
            </table>
        </div>
    </div>
<?php
}
}else{
    header("Location:../index.php");
}
?>