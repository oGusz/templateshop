<?php
if (!$Read):
  $Read = new Read;
endif;
if (!empty($URL[0])):
  $Read->ExeRead(TB_HOME);
  $itemSessao = $Read->getResult();
  extract($itemSessao[0]);
endif;
$title = $home_title;
$desc = $home_description;
$key = $home_keywords;
include('inc/head.php');
include('inc/fancy.php'); ?>
<style>
  <?php include('slick/slick.css'); ?><?php
                                      if (!$isMobile):
                                        include('slick/slick-banner.css');
                                      endif;
                                      ?>
</style>
</head>

<body>
  <?php
  include('inc/topo.php');
  include('inc/banner-inc.php'); ?>
  <main>
    <div class="content">
      <section>
        <?php
        if ($home_status != 2):
          echo "<h1>Esta página está em manutenção, volte mais tarde.</h1>";
        else: ?>
          <div class="wrapper">
            <h1 class="title"><?= $home_title; ?></h1>
            <div class="clear"></div>
            <?= $home_content; ?>
            <?php Check::SetAtributosInc($attr_id); ?>
          </div>
          <div class="clear"></div>
        <?php endif; ?>
      </section>
    </div>
  </main>
  <?php include('inc/footer.php'); ?>
  <script>
    <? include('slick/slick.min.js'); ?>
    $(document).ready(function() {
      <?php if (!$isMobile): ?>
        $('.slick-banner').slick({
          fade: true,
          cssEase: 'linear',
          autoplay: true,
          infinite: true,
          lazyLoad: 'ondemand',
          swipeToSlide: true
        });
      <?php endif; ?>
    });
  </script>
</body>

</html>