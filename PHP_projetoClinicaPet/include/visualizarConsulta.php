<?php
include_once("../classes/Consulta.php");
if (isset($_SESSION['administrador'])){
?>
<div class="row">
    <div class="col-lg-6">
        <!-- Collapsable Card Example -->
        <div class="card shadow mb-8">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Pesquisar Consultas</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="nome" class="form-label">ID</label>
                            <input type="text" class="form-control" id="id-cliente" aria-describedby="cpfHelp" name="idConsulta">
                            <div id="cpf" class="form-text"></div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
$objConsulta = new Consulta();
$objConsulta->selecionarPorId(1);

if (isset($_POST['idConsulta'])) {
    $objConsulta->selecionarPorId($_POST['idConsulta' ]);
}else{
    $objConsulta->selecionarConsultas();
}

if ($objConsulta->retornoBD != null) {
?>
    <br/>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-hover">
                <tr>
                    <th width="5%">#</th>
                    <th width="25%">IdCliente</th>
                    <th width="25%">IdAnimal</th>
                    <th width="25%">Obs</th>
                    <th width="10%">Editar</th>
                    <th width="10%">Deletar</th>
                </tr>

                <?php
            
                while ($retorno = $objConsulta->retornoBD->fetch_object()) {
                    echo '<tr><td>' . $retorno->id_consulta . '</td><td>' .
                        $retorno->id_cliente . '</td><td>' .
                        $retorno->id_animal . '</td><td>' . 
                        
                        $retorno->obs_consulta  . '</td>';
                    echo '<td><a href="?rota=editar_consulta&id='.$retorno->id_consulta.'" class="btn btn-info btn-circle btn-sm"><i class="fas fa-list"></i></a></td>';
                    echo '<td><a href="#" class="btn btn-danger btn-circle btn-sm" onclick=\'deletarConsulta("' . $retorno->id_consulta . '")\';><i class="fas fa-trash"></i></a></td></tr>';
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