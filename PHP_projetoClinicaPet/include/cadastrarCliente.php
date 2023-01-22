<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email-cliente" autocomplete="off" aria-describedby="emailHelp" name="emailCliente" >
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome-cliente" autocomplete="off" aria-describedby="nomeHelp" name="nomeCliente" >
                    <div id="nomeHelp" class="form-text"></div>
                </div>
               
                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" id="cpf-cliente" autocomplete="off" aria-describedby="cpfHelp" name="cpfCliente" >
                    <div id="cpf" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" id="endereco-cliente" autocomplete="off" aria-describedby="cpfHelp" name="enderecoCliente" >
                    <div id="endereco" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular</label>
                    <input type="text" class="form-control" id="celular-cliente" autocomplete="off" aria-describedby="cpfHelp" name="celularCliente" >
                    <div id="celular" class="form-text"></div>
                </div>
                
                
                <input type="hidden" name="formCadastrarCliente">
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