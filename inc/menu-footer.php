<?php foreach ($menuItems as $itemName => $item) : ?>
    <?php if ($itemName !== "SIG") : ?>
        <li>
            <a class="footer__link" href="<?= empty($item['url']) ? $url : $url . $item['url'] ?>" title="<?= $itemName ?>">
                <?= $itemName ?>
            </a>
        </li>
    <?php endif; ?>
<?php endforeach; ?>
<li>
    <a class="footer__link" href="<?= $url ?>mapa-site" title="Mapa do site <?= $nomeSite ?>">Mapa do site</a>
</li>
