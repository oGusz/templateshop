<!-- <div class="container">
  <div class="wrapper">
    <?php
    $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :st ORDER BY serv_date DESC LIMIT 0,20", "st=2");
    if ($Read->getResult()): ?>
      <h2 class="title text-center"><span>Nossos</span> Serviços</h2>
      <div class="row">
        <?php
        foreach ($Read->getResult() as $serv_home):
          extract($serv_home); ?>
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
    <? endif; ?>
  </div>
  <div class="clear"></div>
</div> -->
<section>
  <?php
  if (isset($homeContent)):
    if ($homeContent['hc_serv_show'] === "1"):
      $Read->ExeRead(TB_USERS, "WHERE user_status = :st", "st=0");
      $authors = $Read->getResult();
      $Read = new Read; ?>
      <div class="serv-home <?= $homeServLayout ?>">
        <div class="container">
          <div class="wrapper">
            <?php
            // ID do produto
            $homeServConfig = $homeContent['hc_serv_config'];
            if ($homeServConfig === "1"):
              $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :st ORDER BY serv_id DESC LIMIT 0, 6", "st=2");
              $homeServItems = $Read->getResult();
            elseif ($homeServConfig === "2"):
              $homeServIds = $homeContent['hc_serv_ids'];
              if ($homeServIds !== NULL):
                $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :st AND serv_id IN (" . $homeServIds . ") ORDER BY field(serv_id," . $homeServIds . ")", "st=2");
                $homeServItems = $Read->getResult();
              endif;
            endif;
            if (isset($homeServItems)) : ?>
              <?php
              if ($Read->getResult()) : ?>
                <div class="row align-items-center gap-32">
                  <div class="col-4 ">
                    <h2>BSE Saúde</h2>
                    <p>A Clínica BSE conta com uma equipe multidisciplinar com médicos, nutricionistas, psicólogos e acupunturistas. Nossos profissionais estão preparados para proporcionar mais qualidade de vida e bem-estar, além de auxiliar no manejo de transtornos alimentares, tratamento e prevenção de doenças.</p>
                  </div>
                  <div class="col-8">
                    <div class="row">
                      <?php foreach ($Read->getResult() as $dados) :
                        extract($dados); ?>
                        <div class="col-4">
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
                      <?php endforeach; ?>
                    </div>
                  </div>
                </div>
            <?php endif;
            endif; ?>
          </div>
          <div class="clear"></div>
        </div>
      </div>
  <?php endif;
  endif;
  ?>
</section>