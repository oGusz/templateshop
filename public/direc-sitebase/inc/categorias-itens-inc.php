<?php
/* Como funciona:
*  Listagem de modulos e seus itens para os menus
*  Como alguns modulos podem deixar o menu muito grande, pode ser necessário comentar algumas
*  consultas para não ficar muito extenso no menu.
*  Você pode ter muitas postagens de blogs, então não é interessante exibir os itens do blog no menu porém serão exibidas as   categorias do blogs, a mesma dinâmica serve para outros modulos.
*/
// TODAS AS LISTAGENS DE CADA MODULO DE MENU ESTÃO DISPONÍVEIS ABAIXO
//
//
// PRODUTOS
$Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :stats AND FIND_IN_SET(:cat, cat_parent) ORDER BY prod_title ASC", "stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $prodItem): ?>
    <li><a class="submenu-item submenu-item--last" href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($prodItem['cat_parent'], EMPRESA_CLIENTE) . $prodItem['prod_name'], '/'); ?>" title="<?= $prodItem['prod_title'] ?>"> <?= $prodItem['prod_title'] ?></a></li>
  <?php endforeach;
endif;
//
// SERVICOS
$Read->ExeRead(TB_SERVICO, "WHERE serv_status = :stats AND cat_parent = :cat ORDER BY serv_title ASC", "stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $servItem): ?>
    <li><a class="submenu-item submenu-item--last" href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($servItem['cat_parent'], EMPRESA_CLIENTE) . $servItem['serv_name'], '/'); ?>" title="<?= $servItem['serv_title'] ?>"><?= $servItem['serv_title'] ?></a></li>
  <?php endforeach;
endif;
//
// BLOG
$Read->ExeRead(TB_BLOG, "WHERE blog_status = :stats AND cat_parent = :cat ORDER BY blog_title ASC", "stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $blogItem): ?>
    <li><a class="submenu-item submenu-item--last" href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($blogItem['cat_parent'], EMPRESA_CLIENTE) . $blogItem['blog_name'], '/'); ?>" title="<?= $blogItem['blog_title'] ?>"><?= $blogItem['blog_title'] ?></a></li>
  <?php endforeach;
endif;
//
// CASES
$Read->ExeRead(TB_CASE, "WHERE case_status = :stats AND cat_parent = :cat ORDER BY case_title ASC", "stats=2&cat={$itemCat}");
if ($Read->getResult()):
  foreach ($Read->getResult() as $caseItem): ?>
    <li><a class="submenu-item submenu-item--last" href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($caseItem['cat_parent'], EMPRESA_CLIENTE) . $caseItem['case_name'], '/'); ?>" title="<?= $caseItem['case_title'] ?>"><?= $caseItem['case_title'] ?></a></li>
  <?php endforeach;
endif;
