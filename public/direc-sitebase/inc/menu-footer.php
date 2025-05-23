<?php foreach ($menuItems as $itemName => $item) :
    if ($itemName === "SIG" && $useSigMenu === true) {
        include('inc/menu-footer-inc.php');
    } else if ($itemName !== "SIG") { ?>
        <li><a class="footer__link" href="<?= strpos($item['url'], 'http') !== false ? $item['url'] : $url . $item['url'] ?>" title="<?= $itemName ?>" <?= isset($item['attr']) ? $item['attr'] : '' ?>><?= $itemName ?></a></li>
<?php }
endforeach; ?>
<li><a class="footer__link" href="<?= $url ?>mapa-site" title="Mapa do site <?= $nomeSite ?>">Mapa do site</a></li>