<?php
function getBreadcrumb($menuItems, $urlPagina, &$breadcrumb = [])
{
    foreach ($menuItems as $item => $data):
        if ($data['url'] == $urlPagina):
            $breadcrumb[] = [$item, $data['url']];
            return true;
        elseif (isset($data['submenu']) && is_array($data['submenu'])):
            if (getBreadcrumb($data['submenu'], $urlPagina, $breadcrumb)):
                $breadcrumb[] = [$item, $data['url']];
                return true;
            endif;
        endif;
    endforeach;
    return false;
}

$breadcrumb = [];
getBreadcrumb($menuItems, $urlPagina, $breadcrumb);
$breadcrumb = array_reverse($breadcrumb);
$breadActive = end(array_keys($breadcrumb));

foreach ($breadcrumb as $key => $item):
    addBreadJson($item[1], $item[0]);
endforeach;

$breadJsonEncoded = json_encode($breadJsonSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>
<div class="bread bread--default">
    <div class="wrapper">
        <div class="bread__row">
            <nav aria-label="breadcrumb">
                <ol id="breadcrumb">
                    <li class="bread__column">
                        <a href="<?= $url ?>" title="Home">Home</a>
                    </li>

                    <?php foreach ($breadcrumb as $key => $item):
                        if ($key === $breadActive): ?>
                            <li class="bread__column active"><?= $item[0] ?></li>
                        <?php else: ?>
                            <li class="bread__column">
                                <a href="<?= $url . $item[1] ?>" title="<?= $item[0] ?>"><?= $item[0] ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </nav>
            <h1 class="bread__title"><?= $title ?></h1>
        </div>
    </div>
</div>