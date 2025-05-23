<?php

    // Definir $menuItems como um array associativo válido
    $submenuItems = [
        "Home" => [
            "url" => ""
        ],
        "Empresa" => [
            "url" => "empresa"
        ],
        "SIG" => [],
        "Contato" => [
            "url" => "contato"
        ],
        "Categorias" => [
            "url" => "categorias",
            "icon" => "fas fa-bars",
            "submenu" => []
        ]
    ];

    // Converter $submenuItems para JSON
    $submenuItemsJson = json_encode($submenuItems, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

if (!function_exists('generateSubmenu')) {
    function generateSubmenu($submenuItems, $url)
    {
        foreach ($submenuItems as $itemName => $itemData) : ?>
            <li <?= isset($itemData['submenu']) ? "class='dropdown'" : "" ?>>
                <a <?= isset($itemData['attr']) ? $itemData['attr'] : '' ?> href="<?= strpos($itemData['url'], 'http') !== false ? $itemData['url'] : $url . $itemData['url'] ?>" title="<?= $itemName ?>">
                    <?= isset($itemData['icon']) ? "<i class='" . $itemData['icon'] . " fa-xl'></i><span class='d-inline-block ml-1'>" . $itemName . "</span>" : $itemName ?>
                </a>
                <?php if (isset($itemData['submenu'])) : ?>
                    <ul class="sub-menu">
                        <?php generateSubmenu($itemData['submenu'], $url); ?>
                    </ul>
                <?php endif; ?>
            </li>
        <?php endforeach;
    }
}

foreach ($menuItems as $itemName => $itemData) :
    if ($itemName === "SIG" && $useSigMenu === true) {

    } else if ($itemName !== "SIG") { ?>
        <li <?= isset($itemData['submenu']) ? "class='dropdown'" : "" ?><?= isset($itemData['icon']) ? " data-icon-menu" : "" ?>>
            <a <?= isset($itemData['attr']) ? $itemData['attr'] : '' ?> href="<?= strpos($itemData['url'], 'http') !== false ? $itemData['url'] : $url . $itemData['url'] ?>" title="<?= $itemName ?>">
                <?= isset($itemData['icon']) ? "<i class='" . $itemData['icon'] . " fa-xl'></i>" : $itemName ?>
                <?= isset($itemData['icon-text']) && isset($itemData['icon']) ? "<span class='d-block mt-2'>" . $itemName . "</span>" : "" ?>
            </a>
            <?php if (isset($itemData['submenu'])) : ?>
                <ul class="<?= $itemName === 'Categorias' ? 'sub-menu-info' : 'sub-menu' ?>">
                    <?php if ($itemName === "Categorias") :
                        include('inc/sub-menu.php');
                    else :
                        generateSubmenu($itemData['submenu'], $url);
                    endif; ?>
                </ul>
            <?php endif; ?>
        </li>
<?php }
endforeach; ?>