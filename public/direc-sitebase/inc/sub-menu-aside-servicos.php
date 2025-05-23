<?php 

$servCatUrl = rtrim(Check::CatByParent($itemParent, EMPRESA_CLIENTE), '/');

$asideMenuTitle = Check::CatByUrl(end(explode('/', $servCatUrl)), EMPRESA_CLIENTE);
?>
<h2 class="aside-title"><a href="<?= RAIZ.'/'.$servCatUrl ?>" title="<?= $asideMenuTitle ?>">
<?= $asideMenuTitle ?></a></h2>
<nav class="aside__nav" itemscope itemtype="https://schema.org/SiteNavigationElement">
    <ul class="sub-menu">
        <?php $Read->ExeRead(TB_CATEGORIA, "WHERE cat_status = :stats AND cat_parent = :cat ORDER BY cat_title", "stats=2&cat={$itemParent}");
        if ($Read->getResult()): ?>
            <?php foreach ($Read->getResult() as $item): ?>
            <li>
                <a href="<?= RAIZ.'/'.$servCatUrl.'/'.$item['cat_name']; ?>" title="<?= $item['cat_title'] ?>"><?= $item['cat_title'] ?></a>
            </li>
            <?php endforeach; ?>
        <?php endif;

        $Read->ExeRead(TB_SERVICO, "WHERE serv_status = :stats AND cat_parent = :cat ORDER BY serv_title", "stats=2&cat={$itemParent}");
        if ($Read->getResult()): ?>
            <?php foreach ($Read->getResult() as $item): ?>
            <li>
                <a href="<?= RAIZ.'/'.$servCatUrl.'/'.$item['serv_name']; ?>" title="<?= $item['serv_title'] ?>"><?= $item['serv_title'] ?></a>
            </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>
</nav>