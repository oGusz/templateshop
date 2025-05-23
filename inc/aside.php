<form>
  <input type="hidden" class="j_url" value="<?= RAIZ ?>/<?= $getURL; ?>">
</form>
<aside class="aside-sig">
  <?php
  if (isset($urlFacebook) && !empty($urlFacebook)) {
    echo "
    <div class=\"fb-page\" data-href=\"$urlFacebook\" data-small-header=\"false\" data-adapt-container-width=\"true\" data-hide-cover=\"false\" data-show-facepile=\"false\" data-show-posts=\"false\"><div class=\"fb-xfbml-parse-ignore\"><blockquote cite=\"$urlFacebook\"><a href=\"$urlFacebook\" title=\"Facebook\">$nomeSite</a></blockquote></div></div>
    ";
  } ?>
  <?php include 'inc/sub-menu-aside.php'; ?>
  <div class="aside__contact">
    <?php foreach ($fone as $key => $value): ?>
      <?php if ($value[2] != 'fab fa-whatsapp'): ?>
        <a class="btn" rel="nofollow" title="Clique e ligue" href="tel:<?= $value[0] . $value[1] ?>">
          <i class="<?= $value[2] ?>"></i> Clique e ligue!
        </a>
      <?php else: ?>
        <a class="btn" rel="nofollow" href="https://<?= (!$isMobile) ? 'web' : 'api' ?>.whatsapp.com/send?phone=55<?= $value[0] . str_replace('-', '', $value[1]); ?>&text=<?= rawurlencode("Olá! Gostaria de mais informações sobre " . RAIZ . "/" . $getURL) ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>">
          Orçamento por <i class="<?= $value[2] ?>"></i>
        </a>
      <?php endif; ?>
      <?php if ($key >= 2) break; ?>
    <?php endforeach; ?>
    <a class="btn btn_orc" href="<?= RAIZ ?>/contato" title="Entre em contato"><i class="fas fa-envelope"></i> Orçamento por E-mail</a>
  </div>
</aside>