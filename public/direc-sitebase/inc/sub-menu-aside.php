<?php

$asideSigCategory = isset($asideCategory) ? $asideCategory : $URL[0];

$Read = new Read;
$Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_id = :cat ORDER BY cat_title, ABS(cat_title)", "stats=2&cat=" . Check::CatByName($asideSigCategory, EMPRESA_CLIENTE));
if ($Read->getResult()):
  foreach ($Read->getResult() as $categItem): ?>
    <h2 class="aside-sig-menu__title"><a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categItem['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categItem['cat_title'] ?>"><?= $categItem['cat_title'] ?></a></h2>
    <nav itemscope itemtype="https://schema.org/SiteNavigationElement">
      <ul class="sub-menu">
        <?php $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent = :cat ORDER BY cat_title, ABS(cat_title)", "stats=2&cat={$categItem['cat_id']}");
        if ($Read->getResult()):
          foreach ($Read->getResult() as $categ): ?>
            <li>
              <!--// Nível da categoria-->
              <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categ['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categ['cat_title'] ?>" class="submenu-item submenu-item--first"><?= $categ['cat_title'] ?></a>
              <?php $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent = :cat ORDER BY cat_title, ABS(cat_title)", "stats=2&cat={$categ['cat_id']}");
              if ($Read->getResult()): ?>
                <ul class="sub-menu <?= (in_array($categ['cat_name'], $URL) ? 'sub-menu--first' : ''); ?>">
                  <?php foreach ($Read->getResult() as $categSub): ?>
                    <li>
                      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categSub['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categSub['cat_title'] ?>" class="submenu-item submenu-item--intermediary"><?= $categSub['cat_title'] ?></a>
                      <ul class="sub-menu<?= (Check::GetLastCategory($URL) == $categSub['cat_name'] ? ' sub-menu--first' : ''); ?>">
                        <!-- Nível do item final -->
                        <?php $itemCat = $categSub['cat_id'];
                        include("inc/categorias-itens-inc.php"); ?>
                      </ul>
                    </li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </li>
            <!-- Nível do item final -->
        <?php $itemCat = $categ['cat_id'];
            include("inc/categorias-itens-inc.php");
          endforeach;
        endif; ?>
        <!-- Nível do item final -->
        <?php $itemCat = $categItem['cat_id'];
        include("inc/categorias-itens-inc.php"); ?>
      </ul>
    </nav>
<?php endforeach;
endif; ?>