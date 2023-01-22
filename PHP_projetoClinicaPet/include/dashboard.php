<?php
include_once("../classes/Conexao.php");
?>

<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total de Animais cadastrados</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php $objConexao = new Conexao();
                            $conexaoBD = $objConexao->getConexao();

                            $query = "SELECT COUNT(id_animal) FROM animal";
                            $result = mysqli_query($conexaoBD, $query);
                            $row = mysqli_fetch_row($result);
                            echo $row[0];
                            ?>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Número de Clientes da ClinicaPet</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php $objConexao = new Conexao();
                            $conexaoBD = $objConexao->getConexao();

                            $query = "SELECT COUNT(id_cliente) FROM cliente";
                            $result = mysqli_query($conexaoBD, $query);
                            $row = mysqli_fetch_row($result);
                            echo $row[0];
                            ?>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Número total de consultas realizadas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php $objConexao = new Conexao();
                            $conexaoBD = $objConexao->getConexao();

                            $query = "SELECT COUNT(id_consulta) FROM consulta";
                            $result = mysqli_query($conexaoBD, $query);
                            $row = mysqli_fetch_row($result);
                            echo $row[0];
                            ?>

                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>