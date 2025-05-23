<?php
$titulo_pagina = "Lista de Templates";

?>

<div class="container p-5">
    <h2 class="fs-30 text-center mb-16">Lista de Templates</h2>
    <div class="wrapper">
        <div class="grid-col-5 grid-list-page">
            <?php if (!empty($templates)): ?>
                <?php foreach ($templates as $template): ?>
                    <div class="content-card-list">


                        <h3 class="card-title"><?= $template['nome'] ?></h3>

                        <?php if (!empty($template['imagem'])): ?>
                            <a href="/templateshop-mvc/<?= $template['imagem'] ?>" class="glightbox image-hover" data-gallery="galeria1" data-title="<?= htmlspecialchars($template['nome']) ?>" data-glightbox="<?= $template['descricao'] ?>">
                                <figure class="image-list-template">
                                    <img class="img-template" src="/templateshop-mvc/<?= $template['imagem'] ?>" alt="<?= htmlspecialchars($template['nome']) ?>">
                                </figure>
                            </a>
                        <?php endif; ?>

                        <p><?= $template['descricao'] ?></p>

                        <a href="/templateshop-mvc/template/<?= urlencode($template['categoria']) ?>/<?= $template['id'] ?>" class="btn btn-list-page">
                            Visualizar
                        </a>


                    </div>
                <?php endforeach; ?>
            <?php else: ?>


        </div>
        <div class="no-exist">
            <p class="text-center">Não existe nenhuma categoria a ser apresentada.</p>
        </div>

    <?php endif; ?>
    </div>

</div>
<script>
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
</script>

</body>

</html>