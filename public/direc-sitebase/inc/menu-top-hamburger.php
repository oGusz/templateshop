<?php

if(!function_exists('generateSubmenu')) {
    function generateSubmenu($submenuItems, $url) {
        foreach($submenuItems as $itemName => $itemData):
            $itemUrl = (strpos($itemData['url'], 'http') === 0) ? $itemData['url'] : $url . $itemData['url']; ?>
            <li>
                <a <?= isset($itemData['attr']) ? $itemData['attr'] : ''?> href="<?= $itemUrl ?>" title="<?=$itemName ?>">
                    <?= $itemName ?>
                </a>
                <?php if (isset($itemData['submenu'])): ?>
                    <ul class="sub-menu droppable">
                        <?php generateSubmenu($itemData['submenu'], $url); ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach;
    }
}

foreach ($menuItems as $itemName => $itemData):
    if($itemName === "SIG" && $useSigMenu === true){
        $useHamburgerMenu = true;
        include('inc/menu-top-inc.php');
    }
    else if($itemName !== "SIG") { 
        $itemUrl = (strpos($itemData['url'], 'http') === 0) ? $itemData['url'] : $url . $itemData['url'];?>
        <li <?=isset($itemData['submenu']) ? "class='hamburger-dropdown'" : ""?>>
            <a <?= isset($itemData['attr']) ? $itemData['attr'] : ''?> href="<?= $itemUrl ?>" title="<?=$itemName ?>">
                <?= $itemName ?>
            </a>
            <?php if (isset($itemData['submenu'])): ?>
                <ul class="<?= $itemName === 'Informações' ? 'sub-menu-info' : 'sub-menu' ?> droppable">
                    <?php if($itemName === "Informações"): 
                        include('inc/sub-menu.php');
                    else:
                        generateSubmenu($itemData['submenu'], $url); 
                    endif; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php }
endforeach; ?>