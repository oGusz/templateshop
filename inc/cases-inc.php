<div class="container">
  <article>
    <div class="cases-inc htmlchars">
      <?php
      $Read->ExeRead(TB_CASE, "WHERE case_status = :stats AND case_name = :nm LIMIT 0, 8", "stats=2&nm={$lastCategory}");
      if ($Read->getResult()):
        foreach ($Read->getResult() as $dados):
          extract($dados); ?>
          <div class="container">
            <img class="cases-inc__cover" src="<?= RAIZ . '/doutor/uploads/' . $case_cover; ?>" title="<?= $case_title; ?>" alt="<?= $case_title; ?>"/>
            <blockquote>
              <?= $case_content; ?>
            </blockquote>
          </div>
          <?php
          $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND gallery_type = :gtp", "id={$case_id}&gtp=case");
          if ($Read->getResult()): ?>
            <div class="container">
              <h3>Confira mais imagens:</h3>
              <div class="cases-inc__gallery">
                <?php foreach ($Read->getResult() as $gallery): extract($gallery); ?>
                  <div class="gallery__item">
                    <a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" data-fancybox-group="group-img" class="lightbox" title="<?= $case_title; ?>"><?= Check::Image('doutor/uploads/' . $gallery_file, $case_title, NULL, 300, 300) ?></a>
                  </div>
                <? endforeach; ?>
              </div>
            </div>
          <? endif;
        endforeach;
      endif; ?>
    </div> <!-- htmlchars -->
  </article>
  <?php include('inc/aside.php'); ?>
</div> <!-- container -->
<script>
  <? include('slick/slick.min.js'); ?>
  $(document).ready(function(){
    $('.cases-inc__gallery').slick({
      autoplaySpeed: 3000,
      autoplay: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      cssEase: 'ease',
      arrows: true,
      responsive: [{breakpoint: 767, settings: {slidesToShow: 1}}]
    });
  });
</script>