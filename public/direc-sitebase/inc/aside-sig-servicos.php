<form>
  <input type="hidden" class="j_url" value="<?= RAIZ ?>/<?= $getURL; ?>">
</form>
<aside class="aside-sig-fixed">
  <div class="aside__menu">
    <?php include 'inc/sub-menu-aside-servicos.php'; ?>
  </div>

  <div class="aside__contact">
    <?php if (isset($whatsapp)) : ?>
      <a class="aside__contact-item whatsapp" rel="nofollow" href="<?= wppLink($whatsapp); ?>" target="_blank" title="WhatsApp <?= $nomeSite ?>">
        <i class="fab fa-whatsapp"></i>
      </a>
    <?php endif; ?>

    <a class="aside__contact-item" href="<?= $url ?>contato" title="Contato">
      <i class="fas fa-envelope"></i>
    </a>
  </div>
</aside>