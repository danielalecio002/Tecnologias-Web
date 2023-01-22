<?php
if (isset($_SESSION['administrador'])){
?>

<div class="container">
    <div class="row">
        <div class="col-10">
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="nome-cliente" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome-animal" aria-describedby="emailHelp" autocomplete="off" name="nomeAnimal" >
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <label for="tipo-animal" class="form-label">Tipo</label>
                <div class="mb-3">
                    <select class="form-control" name="tipoAnimal" id="tipo-animal">
                        <option value="cachorro">Cachorro</option>
                        <option value="gato">Gato</option>
                        <option value="passaro">Passaro</option>
                    </select>
                   <!-- <label for="tipo-animal" class="form-label">Tipo</label>
                    <input type="" class="form-control" id="tipo-animal" aria-describedby="nomeHelp" autocomplete="off" name="tipoAnimal" >
                    <div id="nomeHelp" class="form-text"></div> -->
                </div>
               
                <div class="mb-3">
                    <label for="id-donoAnimal" class="form-label">idDono</label>
                    <input type="text" class="form-control" id="id-donoAnimal" aria-describedby="cpfHelp" autocomplete="off" name="idDonoAnimal" >
                    <div id="id-donoAnimal" class="form-text"></div>
                </div>
               
                
                
                <input type="hidden" name="formCadastrarAnimal">
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