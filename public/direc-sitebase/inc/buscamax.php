<?php include('inc/vetKey.php'); ?>
<div class="container">
  <div class="wrapper">
    <h2 class="text-center">Páginas relacionadas</h2>
    <div class="row justify-content-center">
      <?php foreach ($vetProjetoBusca as $categoria): ?>
        <?php if ($categoria['url'] == $urlPagina): ?>
          <?php if (!empty($categoria['sub-menu'])): ?>
            <?php foreach ($categoria['sub-menu'] as $subItem): ?>
              <div class="col-3 col-md-6">
                <div class="card card--categorias card--page">
                  <a class="card__link" href="<?= $url . $subItem['url'] ?>" title="<?= $subItem['key'] ?>">
                    <img width="300" height="300" class="card__cover" src="<?= $url ?>imagens/categorias/<?= $subItem['url'] ?>.webp" alt="<?= $subItem['key'] ?>" title="<?= $subItem['key'] ?>">
                    <h2 class="card__title"><?= $subItem['key'] ?></h2>
                  </a>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>
</div>