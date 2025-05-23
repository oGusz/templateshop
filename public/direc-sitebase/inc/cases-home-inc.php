<div class="container">
  <div class="wrapper">
    <?php
    $Read->ExeRead(TB_CASE, "WHERE case_status = :st ORDER BY serv_date DESC LIMIT 0,20", "st=2");
    if ($Read->getResult()): ?>
      <h2 class="title text-center"><span>Nossos</span> Serviços</h2>
      <div class="row">
        <?php
        foreach ($Read->getResult() as $case_home):
          extract($case_home); ?>
          <div class="col-3">
            <div class="card card--serv">
              <a class="card__image" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $case_name; ?>" title="<?= $case_title; ?>">
                <img src="<?= RAIZ ?>/doutor/uploads/<?= $case_cover ?>" alt="<?= $case_title ?>" title="<?= $case_title ?>" loading="lazy">
              </a>
              <a class="card__title" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $case_name; ?>" title="<?= $case_title; ?>">
                <h2><?= $case_title ?></h2>
              </a>
              <?php if (WD_SERV_CARD_BREVEDESC) : ?>
                <p class="card__description">
                  <?= !empty($case_brevedescription) ? Check::Words(strip_tags($case_brevedescription), 20) : Check::Words($case_content, 20); ?>
                </p>
              <?php endif; ?>
              <a class="card__link" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $case_name; ?>" title="<?= $case_title ?>">
                <span>Saiba mais</span> <i class="fa-solid fa-chevron-right"></i>
              </a>
            </div>
          </div>
        <? endforeach; ?>
      </div>
    <? endif; ?>
  </div>
  <div class="clear"></div>
</div>