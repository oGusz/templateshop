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
<div class="prod-inc-tab">
  <?php $tabCounter = 1; ?>
  <h2 class="tab__link active" onclick="openAba(event, 'desc')">Descrição</h2>

  <?php if (isset($prod_content2) && $prod_content2 !== " "):
    $tabCounter++;
    if (isset($prod_tabname1) && $prod_tabname1 !== " "): ?>
      <h2 class="tab__link" onclick="openAba(event, 'desc2')"><?= $prod_tabname1 ?></h2>
    <?php else: ?>
      <h2 class="tab__link" onclick="openAba(event, 'desc2')">Descrição <?= $tabCounter ?></h2>
  <?php endif;
  endif; ?>

  <?php if (isset($prod_content3) && $prod_content3 !== " "):
    $tabCounter++;
    if (isset($prod_tabname2) && $prod_tabname2 !== " "): ?>
      <h2 class="tab__link" onclick="openAba(event, 'desc3')"><?= $prod_tabname2 ?></h2>
    <?php else: ?>
      <h2 class="tab__link" onclick="openAba(event, 'desc3')">Descrição <?= $tabCounter ?></h2>
  <?php endif;
  endif; ?>

  <?php if (count($prodDownloads) > 0): ?>
    <h2 class="tab__link" onclick="openAba(event, 'down')">Downloads</h2>
  <?php endif; ?>
</div>
<div class="prod-inc-content">
  <div id="desc" class="tab__content" style="display: block;">
    <?php Check::PrintContent($prod_content); ?>
  </div>

  <?php if (isset($prod_content2) && $prod_content2 !== ""): ?>
    <div id="desc2" class="tab__content" style="display: none;">
      <?php Check::PrintContent($prod_content2); ?>
    </div>
  <?php endif;

  if (isset($prod_content3) && $prod_content3 !== ""): ?>
    <div id="desc3" class="tab__content" style="display: none;">
      <?php Check::PrintContent($prod_content3); ?>
    </div>
  <?php endif;

  if (count($prodDownloads) > 0): ?>
    <div id="down" class="tab__content" style="display: none;">
      <p class="dark"><strong>Confira os downloads disponíveis para este produto:</strong></p>
      <?php foreach ($prodDownloads as $downloadItem): ?>
        <a href="<?= RAIZ . "/doutor/uploads/" . $downloadItem['dow_file']; ?>" title="<?= $downloadItem['dow_title']; ?>" class="btn" target="_blank"><i class="fas fa-file-pdf"></i> <?= $downloadItem['dow_title']; ?></a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>