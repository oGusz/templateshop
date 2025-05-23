<?php $Read = new Read;
$Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent IS NULL ORDER BY cat_order ASC", "stats=2");
if ($Read->getResult()):
  $numMenuItem = 0;
  foreach ($Read->getResult() as $sessao): ?>
    <li class="<?= isset($useHamburgerMenu) ? 'hamburger-dropdown' : 'dropdown' ?>" <?= count($sigMenuIcons) > 0 ? 'data-icon-menu': ''?>>
      <!-- Nível da sessão-->
      <!-- Menu brasmodulos -->
      <?php
      if(isset($sigMenuIcons) && count($sigMenuIcons) > 0): ?>
        <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($sessao['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $sessao['cat_title'] ?>">
          <i class="<?=$sigMenuIcons[$numMenuItem]?> fa-xl"></i>
          <?php if($sigIconText): ?>
            <span class="d-block mt-2"><?= $sessao['cat_title'] ?></span>
          <?php endif; 
          $numMenuItem++; ?>
        </a>
      <?php else: ?>
        <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($sessao['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $sessao['cat_title'] ?>"><?= $sessao['cat_title'] ?></a>
        <?
      endif; ?>
      <!-- end Menu brasmodulos -->
      <?php $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent = :id ORDER BY cat_title ASC", "stats=2&id={$sessao['cat_id']}");
      if ($Read->getResult()): ?>
        <ul class="sub-menu">
          <?php foreach ($Read->getResult() as $categ): ?>
            <li class="dropdown">
              <!-- Nível da categoria-->
              <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($categ['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $categ['cat_title'] ?>"><?= $categ['cat_title'] ?></a>
              <?php
              $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent = :id ORDER BY cat_title ASC", "stats=2&id={$categ['cat_id']}");
              if (!$Read->getResult()): ?>
                <ul class="sub-menu">
                  <?php
                  $itemCat = $categ['cat_id'];
                  include("inc/categorias-itens-inc.php"); ?>
                </ul>
              <?php else: ?>
                <ul class="sub-menu">
                  <?php foreach ($Read->getResult() as $subcateg): ?>
                    <li class="dropdown">
                      <!-- Nível da subcategoria-->
                      <a href="<?= RAIZ; ?>/<?= trim(Check::CatByParent($subcateg['cat_id'], EMPRESA_CLIENTE), '/'); ?>" title="<?= $subcateg['cat_title'] ?>"><?= $subcateg['cat_title'] ?></a>
                      <?php //if (!Check::CatByName($lastCategory, EMPRESA_CLIENTE)): ?>
                      <!-- Nível final do item-->
                      <ul class="sub-menu">
                        <?php $itemCat = $subcateg['cat_id'];
                        include("inc/categorias-itens-inc.php"); ?>
                      </ul>
                      <?php //endif; ?>
                    </li>
                  <?php endforeach;
                  $itemCat = $subcateg['cat_parent'];
                  include("inc/categorias-itens-inc.php"); ?>
                </ul>
              <?php endif; ?>
            </li>
          <?php endforeach;
          $itemCat = $categ['cat_parent'];
          include("inc/categorias-itens-inc.php"); ?>
        </ul>
      <?php else: ?>
        <ul class="sub-menu">
          <?php $itemCat = $sessao['cat_id'];
          include("inc/categorias-itens-inc.php"); ?>
        </ul>
      <?php endif; ?>
    </li>
  <?php endforeach;
  endif; ?>