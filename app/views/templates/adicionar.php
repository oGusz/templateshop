<?php
$titulo_pagina = "Adicionar Novo Template";
include_once("app/controllers/TemplateController.php");

?>



<div class="container">

    <div class="card-body">
        <h2 class="card-title text-center">Adicionar Novo Template</h2>
        <div class="wrapper">


            <form action="index.php?rota=adicionar_template" method="POST" enctype="multipart/form-data" class="form-adicionar">

                <div class="row flex-column">
                    <input type="hidden" name="adicionar_template" value="1">

                    <div class="col-12">
                        <label class="form-label">Nome do Template:</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Imagem do Template:</label>
                        <input type="file" name="imagem" class="form-control" accept="image/*" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Categoria:</label>
                        <select name="categoria" class="form-select" required>

                            <?php foreach ($categorias as $categoria): ?>
                                <option value="<?= $categoria ?>"><?= $categoria ?></option>

                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descrição:</label>
                        <textarea name="descricao" class="form-control"></textarea>
                    </div>



                    <div class="col-12">
                        <label class="form-label">Código PHP:</label>
                        <textarea name="codigo_php" class="form-control"></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Código CSS:</label>
                        <textarea name="codigo_css" class="form-control"></textarea>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Código JavaScript:</label>
                        <textarea name="codigo_js" class="form-control"></textarea>
                    </div>


                    <button type="submit" class="btn btn-primary w-100">Salvar Template</button>
                </div>
            </form>
        </div>
    </div>

</div>