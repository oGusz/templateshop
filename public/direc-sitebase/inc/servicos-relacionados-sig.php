<div class="container">
  <div class="wrapper">
    <?php
    $servRelatedItems = array_unique(explode("-", $serv_name));
    $servRelatedQuery = "";
    $servRelatedFilter = ['da', 'de', 'do', 'e', 'em', 'para', 'sob', 'tipo']; //Lista de palavras genéricas para desconsiderar na pesquisa (Use apenas letras minúsculas e sem acentuação)
    $servRelatedItems = array_diff($servRelatedItems, $servRelatedFilter);
    foreach ($servRelatedItems as $key => $servWord) {
      $servRelatedQuery .= "serv_name LIKE '%' '" . $servWord . "' '%'";
      if ($servWord !== end($servRelatedItems)) {
        $servRelatedQuery .= " OR ";
      }
    }
    $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :st AND serv_id != :id AND (" . $servRelatedQuery . ") ORDER BY RAND() LIMIT 0,4", "st=2&id={$serv_id}");
    if ($Read->getResult()) : ?>
      <h2 class="text-center">Serviços Relacionados</h2>
      <div class="row justify-content-center">
        <?php
        foreach ($Read->getResult() as $serv_related) :
          extract($serv_related); ?>
          <div class="col-3">
            <div class="card card--serv">
              <a class="card__image" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $serv_name; ?>" title="<?= $serv_title; ?>">
                <img src="<?= RAIZ ?>/doutor/uploads/<?= $serv_cover ?>" alt="<?= $serv_title ?>" title="<?= $serv_title ?>" loading="lazy">
              </a>
              <a class="card__title" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $serv_name; ?>" title="<?= $serv_title; ?>">
                <h2><?= $serv_title ?></h2>
              </a>
              <?php if (WD_SERV_CARD_BREVEDESC) : ?>
                <p class="card__description">
                  <?= !empty($serv_brevedescription) ? Check::Words(strip_tags($serv_brevedescription), 20) : Check::Words($serv_content, 20); ?>
                </p>
              <?php endif; ?>
              <a class="card__link" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $serv_name; ?>" title="<?= $serv_title ?>">
                <span>Saiba mais</span> <i class="fa-solid fa-chevron-right"></i>
              </a>
            </div>
          </div>
        <? endforeach; ?>
      </div>
    <? else:
      $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :st AND serv_id != :id ORDER BY RAND() LIMIT 0,4", "st=2&id={$serv_id}");
    ?>
      <h2 class="text-center">Serviços Relacionados</h2>
      <div class="row justify-content-center">
        <?php
        foreach ($Read->getResult() as $serv_related) :
          extract($serv_related); ?>
          <div class="col-3">
            <div class="card card--serv">
              <a class="card__image" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $serv_name; ?>" title="<?= $serv_title; ?>">
                <img src="<?= RAIZ ?>/doutor/uploads/<?= $serv_cover ?>" alt="<?= $serv_title ?>" title="<?= $serv_title ?>" loading="lazy">
              </a>
              <a class="card__title" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $serv_name; ?>" title="<?= $serv_title; ?>">
                <h2><?= $serv_title ?></h2>
              </a>
              <?php if (WD_SERV_CARD_BREVEDESC) : ?>
                <p class="card__description">
                  <?= !empty($serv_brevedescription) ? Check::Words(strip_tags($serv_brevedescription), 20) : Check::Words($serv_content, 20); ?>
                </p>
              <?php endif; ?>
              <a class="card__link" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $serv_name; ?>" title="<?= $serv_title ?>">
                <span>Saiba mais</span> <i class="fa-solid fa-chevron-right"></i>
              </a>
            </div>
          </div>
        <? endforeach; ?>
      </div>
    <?php endif ?>
  </div>
</div>