<?php
    if(count($activeCategories) > 0):
        $Read->ExeRead(TB_BLOG, "WHERE blog_status = :stats AND blog_keywords IS NOT NULL AND blog_keywords <> '' AND cat_parent IN (".implode(',', $activeCategories).")", "stats=2");
        $tagList = $Read->getResult();
        if ($tagList) : ?>
            <div class="blog-tag-list blog-tag-list--aside">
                <h2 class="blog-tag-list__title">Tags</h2>
                <div class="blog-tag-list__cards">
                    <?php
                        $arrayTags = [];
                        foreach ($tagList as $key => $item) : ?>
                            <?php $itemTagList = explode(",", $item['blog_keywords']);
                            foreach ($itemTagList as $key => $blogTag) :
                                array_push($arrayTags, $blogTag);
                            endforeach; ?>
                        <?php endforeach;
                        $arrayTags = array_unique($arrayTags);
                        sort($arrayTags);
                        foreach ($arrayTags as $key => $item) : ?>
                        <a href="<?= $url ?>blog-tags/<?= queryFilter($item) ?>" title="<?= $item ?>" rel="nofollow"><?= $item ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif;
    endif;
?>    