<?php
$prodRelatedItems = array_unique(explode("-", $prod_name));
$prodRelatedQuery = "";
$prodRelatedFilter = ['da', 'de', 'do', 'e', 'em', 'para', 'sob', 'tipo']; //Lista de palavras genéricas para desconsiderar na pesquisa (Use apenas letras minúsculas e sem acentuação)
$prodRelatedItems = array_diff($prodRelatedItems, $prodRelatedFilter);

foreach ($prodRelatedItems as $key => $prodWord) {
  $prodRelatedQuery .= "prod_name LIKE '%' '" . $prodWord . "' '%'";
  if ($prodWord !== end($prodRelatedItems)) {
    $prodRelatedQuery .= " OR ";
  }
}

$Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :st AND prod_id != :id AND (" . $prodRelatedQuery . ") AND cat_parent IN (" . implode(',', $activeCategories) . ") ORDER BY RAND() LIMIT 0,4", "st=2&id={$prod_id}");

if ($Read->getResult()) : ?>
  <div class="container">
    <div class="prod-inc__related">
      <h2 class="text-center">Páginas relacionadas</h2>
      <div class="row justify-content-center">
        <?php
        foreach ($Read->getResult() as $prod_related) :
          extract($prod_related); ?>
          <div class="col-3">
            <div class="card card--prod">
              <a class="card__cover" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title; ?>">
                <img class="card__image" src="<?= RAIZ ?>/doutor/uploads/<?= $prod_cover ?>" alt="<?= $prod_title ?>" title="<?= $prod_title ?>">
              </a>

              <div class="card__info">
                <h2 class="card__title"><?= $prod_title; ?></h2>

                <div class="card__category">
                  <?php $catInfo = Check::ItemCategory($cat_parent); ?>
                  <a href="<?= $catInfo['url'] ?>" title="<?= $catInfo['title'] ?>"><?= $catInfo['title'] ?></a>
                </div>
              </div>

              <div class="card__controls">
                <a class="card__control-item" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $prod_name; ?>" title="<?= $prod_title ?>">
                  <span aria-label="Acessar página"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                </a>

                <?php if (WD_PROD_CARD_BREVEDESC) : ?>
                  <div class="card__control-item">
                    <span aria-label="Breve descrição">
                      <i class="fa-solid fa-book"></i>
                    </span>
                    <div class="card__control-info">
                      <?php if (empty($prod_brevedescription) && $prod_brevedescription != ' ') : ?>
                        <p class="card__description">
                          <?= Check::Words($prod_brevedescription, 20); ?>
                        </p>
                      <?php else : ?>
                        <p class="card__description">
                          <?= Check::Words($prod_content, 20); ?>
                        </p>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endif; ?>

                <?php if (strlen($prod_keywords) > 1) : ?>
                  <div class="card__control-item">
                    <span aria-label="Tags">
                      <i class="fa-solid fa-tags" aria-hidden="true"></i>
                    </span>
                    <div class="card__control-info">
                      <div class="card__keywords">
                        <?php $prodKeywordList = explode(",", $prod_keywords);
                        foreach ($prodKeywordList as $key => $item) : ?>
                          <a href="<?= $url ?>prod-tags/<?= queryFilter($item) ?>" title="<?= $item ?>" rel="nofollow"><?= $item ?></a>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <? endforeach; ?>
      </div>
    </div>
  </div>
<? endif; ?>