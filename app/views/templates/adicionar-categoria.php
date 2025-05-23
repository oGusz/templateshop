<?php
$titulo_pagina = "Adicionar Nova Categoria";

?>

<div class="container ">
    <div class="wrapper">
       
            <h2 class="card-title text-center">Adicionar Nova Categoria</h2>
            <form action="index.php" method="POST" class="form-adicionar">
            <input type="hidden" name="adicionar_categoria" value="1">

                <div class="mb-3">
                    <label class="form-label">Nome da Categoria:</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
        

                <button type="submit" class="btn btn-primary w-100">Salvar Categoria</button>
            </form>
     
    </div>
</div>
