<?php
$Read = new Read;
$Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent IS NULL ORDER BY cat_order ASC", "stats=2");
if ($Read->getResult()):
  foreach ($Read->getResult() as $sessao): ?>
    <li>  
      <a class="footer__link" href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($sessao['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $sessao['cat_title'] ?>"><?= $sessao['cat_title'] ?></a>                        
    </li>
  <? endforeach;
  endif; ?>