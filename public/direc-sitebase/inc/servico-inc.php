<div class="wrapper">
  <div class="service-inc htmlchars">
    <?php
    $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :stats AND serv_name = :nm", "stats=2&nm={$lastCategory}");
    if (!$Read->getResult()):
      WSErro("Desculpe, mas não foi encontrando o conteúdo relacionado a esta página, volte mais tarde", WS_INFOR, null, "Aviso!");
    else:
      foreach ($Read->getResult() as $dados):
        extract($dados); ?>
        <div class="container">
          <div class="row">
            <div class="<?= WD_SERV_FULL ? 'col-12' : 'col-5' ?> col-md-12">
              <div class="service-inc__cover">
                <a class="lightbox fancy-card-overlay" href="<?= RAIZ . '/doutor/uploads/' . $serv_cover; ?>" title="<?= $serv_title; ?>" data-caption="<?= $serv_title ?>">
                  <img class="w-100 d-block border p-1" src="<?= RAIZ . '/doutor/uploads/' . $serv_cover; ?>" alt="<?= $serv_title; ?>" title="<?= $serv_title; ?>">
                </a>
              </div>
            </div>
            <div class="<?= WD_SERV_FULL ? 'col-12' : 'col-7' ?> col-md-12">
              <?php Check::PrintContent($serv_content); ?>
              <?php if ($url_relation != 0):
                $prodDownloads = array();
                $Read = new Read;
                $url_relation = explode(',', trim($url_relation, ','));
                foreach ($url_relation as $urlsr):
                  $Read->ExeRead(TB_DOWNLOAD, "WHERE dow_id = :id ORDER BY dow_title ASC", "id={$urlsr}");
                  if ($Read->getResult()):
                    foreach ($Read->getResult() as $downs):
                      array_push($prodDownloads, array("dow_title" => $downs['dow_title'], "dow_file" => $downs['dow_file']));
                    endforeach;
                  endif;
                endforeach;
              endif; ?>
              <?php if (count($prodDownloads) > 0): ?>
                <h2>Downloads disponíveis</h2>
                <div class="row">
                  <?php foreach ($prodDownloads as $downloadItem): ?>
                    <div class="col-3">
                      <a class="btn btn--primary my-0 w-100" href="<?= RAIZ . "/doutor/uploads/" . $downloadItem['dow_file']; ?>" title="<?= $downloadItem['dow_title']; ?>" target="_blank"><?= $downloadItem['dow_title']; ?> <i class="fas fa-download"></i></a>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-12">
              <?php
              $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND gallery_type = :gtp", "id={$serv_id}&gtp=serv");
              if ($Read->getResult()): ?>
                <div class="service-inc__gallery">
                  <?php foreach ($Read->getResult() as $gallery):
                    extract($gallery); ?>
                    <a class="gallery__item lightbox fancy-card-overlay" href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" title="<?= $serv_title; ?>" data-fancybox="group1" data-caption="<?= $serv_title ?>">
                      <img src="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" alt="<?= $serv_title; ?>" title="<?= $serv_title; ?>">
                    </a>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div> <!-- htmlchars -->
</div>
<!-- CTA -->
<?php include('inc/cta.php'); ?>
<?php include('inc/servicos-relacionados-sig.php'); ?>
<?php include('inc/aside-sig-servicos.php'); ?>
<script>
  <? include('slick/slick.min.js'); ?>
  $(document).ready(function() {
    $('.service-inc__gallery').slick({
      autoplaySpeed: 3000,
      autoplay: true,
      slidesToShow: 4,
      slidesToScroll: 1,
      cssEase: 'ease',
      arrows: true,
      dots: false,
      responsive: [{
        breakpoint: 577,
        settings: {
          slidesToShow: 1
        }
      }]
    });
  });
</script>