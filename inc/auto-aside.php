<?php
    $asideHeading = []; //URL - TITLE
    $asideMenu = [];
    function generateAside($menuItems, $url, $urlPagina, &$asideMenu = [], &$asideHeading = []) {
        foreach ($menuItems as $itemName => $itemData): 
            if(isset($itemData['submenu'])):
                foreach($itemData['submenu'] as $item): 
                    if($item['url'] === $urlPagina):
                        array_push($asideHeading, $itemData['url']);
                        array_push($asideHeading, $itemName);
                        $asideMenu = $itemData['submenu'];
                    endif;
                ?>   
            <?php endforeach;  
            generateAside($itemData['submenu'], $url, $urlPagina, $asideMenu, $asideHeading);
            endif;
        endforeach;
    }
    generateAside($menuItems, $url, $urlPagina, $asideMenu, $asideHeading);
?>

<aside class="aside">
    <a href="<?=$url?>contato" class="aside__btn btn-orc" title="Solicite um orçamento">Solicite um orçamento</a>
    <div class="aside__menu">
        <h2><a href="<?=$url.$asideHeading[0]?>" title="<?=$asideHeading[1]?>"><?=$asideHeading[1]?></a></h2>
        <nav class="aside__nav">
            <ul>
                <?php foreach($asideMenu as $itemName => $asideItem): ?>
                    <li><a href="<?=$url.$asideItem['url']?>" title="<?=$itemName?>" <?= isset($asideItem['attr']) ? $asideItem['attr'] : ''?>><?=$itemName?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
    <div class="aside__contato">
        <h2>Entre em contato</h2>  
        <?php foreach ($fone as $key => $value): ?>
            <?php if ($value[2] != 'fab fa-whatsapp'): ?>
                <a rel="nofollow" title="Clique e ligue" href="tel:<?=$value[0].$value[1]?>">
                    <i class="<?=$value[2]?>"></i> (<?=$value[0]?>) <?=$value[1]?>
                </a>
            <?php else: ?>
                <a rel="nofollow" href="<?= wppLink($value); ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>">
                    <i class="<?=$value[2]?>"></i> (<?=$value[0]?>) <?=$value[1]?>
                </a>
            <?php endif; ?>
            <?php if($key >= 2) break; ?>
        <?php endforeach; ?>
    </div>
</aside>
<div class="clear"></div>