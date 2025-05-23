<?php if($categorizedMPIs):
    foreach ($vetKey as $key => $item):
        $asideMpiUrl   = $item['url'];
        $asideMpiTitle = $item['key'];

        if ($item['cat_id'] === $itemCatId): ?>
            <li><a href="<?=$url.$asideMpiUrl?>" title="<?=$asideMpiTitle?>"><?=$asideMpiTitle?></a></li>
        <?php endif;
    endforeach;
    
else:                     
    include('inc/sub-menu.php');
endif; ?>