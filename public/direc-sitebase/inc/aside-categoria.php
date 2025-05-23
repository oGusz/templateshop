<aside class="aside">
  <a href="<?= $url ?>contato" class="aside__btn btn-orc" title="Solicite um orçamento">Solicite um orçamento</a>
  <div class="aside__menu">
    <h2><a href="<?= $url ?>categorias" title="Categorias">Outras Categorias</a></h2>
    <nav class="aside__nav">
      <ul>
        <?php foreach ($vetProjetoBusca as $categoria): ?>
          <li>
            <a data-mpi href="<?= $url . $categoria['url'] ?>" title="<?= $url . $categoria['key'] ?>"><?= $categoria['key'] ?></a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
  </div>
  <div class="aside__contato">
    <h2>Entre em contato</h2>
    <?php foreach ($fone as $key => $value): ?>
      <?php if ($value[2] != 'fab fa-whatsapp'): ?>
        <a rel="nofollow" title="Clique e ligue" href="tel:<?= $value[0] . $value[1] ?>">
          <i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
        </a>
      <?php else: ?>
        <a rel="nofollow" href="<?= wppLink($value); ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>">
          <i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
        </a>
      <?php endif; ?>
      <?php if ($key >= 2) break; ?>
    <?php endforeach; ?>
  </div>
</aside>
<div class="clear"></div>