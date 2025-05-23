<?php
// Menu de páginas, incluir no menu-top.php
$Read = new Read;
$Read->ExeRead(TB_PAGINA, "WHERE pag_status = :status ORDER BY pag_title ASC", "status=2");
if ($Read->getResult()):
    foreach ($Read->getResult() as $pageItem): ?>
        <li><a href="<?= RAIZ; ?>/<?= $pageItem['pag_name']; ?>" title="<?= $pageItem['pag_title'] ?>"><?= $pageItem['pag_title'] ?></a></li>
    <? endforeach;
    endif; ?>