<?php
addBreadJson($urlPagina, $title);
$breadJsonEncoded = json_encode($breadJsonSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<div class="bread bread--mpi">
  <div class="wrapper">
    <div class="bread__row">
      <nav aria-label="breadcrumb">
        <ol id="breadcrumb">
          <li class="bread__column">
            <a href="<?= $url ?>" title="Home">Home</a>
          </li>

          <li class="bread__column">
            <a href="<?= $url ?>categorias" title="categorias">Categorias</a>
          </li>

          <li class="bread__column active"><?= $title ?></li>
        </ol>
      </nav>
      <h1 class="bread__title"><?= $title ?></h1>
    </div>
  </div>
</div>