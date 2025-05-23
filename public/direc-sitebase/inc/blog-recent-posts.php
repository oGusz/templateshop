<div class="recent-posts">
    <h2 class="recent-posts__title">Últimas postagens</h2>
    <nav class="recent-posts__nav">
        <ul class="recent-posts__list">
            <?php

            if(count($activeCategories) > 0):
                $Read = new Read;
                $Read->ExeRead(TB_BLOG, "WHERE blog_status = :stats AND cat_parent IN (".implode(',', $activeCategories).") ORDER BY blog_date DESC LIMIT 0, 4", "stats=2");
                if ($Read->getResult()) :
                    foreach ($Read->getResult() as $dados) :
                        extract($dados); ?>
                        <li class="recent-posts__item">
                            <a rel="nofollow" href="<?= RAIZ . '/' . Check::CatByParent($cat_parent, EMPRESA_CLIENTE) . $blog_name; ?>" title="<?= $blog_title; ?>"><?= $blog_title; ?></a>
                        </li>
                <?php endforeach;
                endif; 
            endif;    
            ?>
        </ul>
    </nav>
</div>