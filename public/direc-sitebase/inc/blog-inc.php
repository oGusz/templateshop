<div class="container">
  <article>
    <div class="blog-inc htmlchars">
      <?php
      $Read->ExeRead(TB_BLOG, "WHERE blog_status = :stats AND blog_name = :nm LIMIT 0, 8", "stats=2&nm={$lastCategory}");
      if ($Read->getResult()):
        foreach ($Read->getResult() as $dados):
          extract($dados);
      ?>
          <div class="container">
            <div class="blog-inc__cover">
              <img src="<?= RAIZ . '/doutor/uploads/' . $blog_cover; ?>" title="<?= $blog_title; ?>" alt="<?= $blog_title; ?>" />
            </div>
            <div class="blog-inc__date">
              <time datetime="<?= date("Y-m-d", strtotime($blog_date)); ?>"> <i class="fa fa-calendar" aria-hidden="true"></i> <?= date("d/m/Y", strtotime($blog_date)); ?></time>
            </div>

            <div class="blog-inc__author">
              <i class="fa-solid fa-user"></i>
              <?php
              $authorKey = array_search($user_id, array_column($authors, 'user_id'));
              $itemAuthor = $authors[$authorKey]['user_name'];
              ?>
              <a href="<?= $url ?>autor/<?= urlencode($itemAuthor) ?>" rel="nofollow" title="<?= $itemAuthor ?>"><?= $itemAuthor ?></a>
            </div>

            <div class="blog-inc__content">
              <?php Check::PrintContent($blog_content); ?>
            </div>

            <?php if (strlen($blog_keywords) > 1) : ?>
              <div class="blog-tag-list">
                <p>Tags:</p>
                <?php $blogTagList = explode(",", $blog_keywords);
                foreach ($blogTagList as $key => $item) : ?>
                  <a href="<?= $url ?>blog-tags/<?= queryFilter($item) ?>" title="<?= $item ?>" rel="nofollow"><?= $item ?></a>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
          <?php
          $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND gallery_type = :gtp", "id={$blog_id}&gtp=blog");
          if ($Read->getResult()):
          ?>
            <div class="blog-inc__gallery">
              <?php foreach ($Read->getResult() as $gallery): extract($gallery); ?>
                <div class="gallery__item">
                  <a href="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" data-fancybox="group1" class="lightbox" title="<?= $blog_title; ?>">
                    <img src="<?= RAIZ . '/doutor/uploads/' . $gallery_file; ?>" alt="<?= $blog_title; ?>" title="<?= $blog_title; ?>">
                  </a>
                </div>
              <?php endforeach; ?>
            </div>
      <?php
          endif;
        endforeach;
      endif; ?>
    </div> <!-- htmlchars -->
  </article>
  <?php include('inc/aside.php'); ?>
</div> <!-- container -->
<script>
  <? include('slick/slick.min.js'); ?>
  $(document).ready(function() {
    $('.blog-inc__gallery').slick({
      autoplaySpeed: 3000,
      autoplay: true,
      slidesToShow: 3,
      slidesToScroll: 1,
      cssEase: 'ease',
      dots: false,
      arrows: true,
      responsive: [{
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        }
      }]
    });
  });
</script>