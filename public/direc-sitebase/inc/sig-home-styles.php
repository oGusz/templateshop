<?php
    $Read->ExeRead(TB_HOMECONTENT);
    if($Read->getResult()):
        $homeContent = $Read->getResult()[0];
        if($homeContent['hc_prod_show'] === "1"):
            switch($homeContent['hc_prod_theme']){
                case "1": $homeProdLayout = "prod-layout-01";
                    break;
                case "2": $homeProdLayout = "prod-layout-02";
                    break;
                case "3": $homeProdLayout = "prod-layout-03";
                    break;
                default: $homeProdLayout = "prod-layout-01";
                    break;
            } ?>

            <style>
                <?php include('css/'.$homeProdLayout.'.css'); ?>
            </style>
        <?php endif;

        if($homeContent['hc_blog_show'] === "1"):
            switch($homeContent['hc_blog_theme']){
                case "1": $homeBlogLayout = 'blog-grid';
                    break;
                case "2": $homeBlogLayout = 'blog-list';
                    break;
                case "3": $homeBlogLayout = 'blog-full';
                    break;
                default: $homeBlogLayout = 'blog-grid';
                    break;
            } ?>

            <style>
                <?php include('css/'.$homeBlogLayout.'.css'); ?>
            </style>
        <?php endif;

        if($homeContent['hc_cat_show'] === "1"):
            switch($homeContent['hc_cat_theme']){
                case "1": $homeCatLayout = 'prod-layout-01';
                    break;
                case "2": $homeCatLayout = 'prod-layout-02';
                    break;
                case "3": $homeCatLayout = 'prod-layout-03';
                    break;
                default: $homeCatLayout = 'prod-layout-01';
                    break;
            } ?>

            <style>
                <?php include_once('css/'.$homeCatLayout.'.css'); ?>
            </style>
        <?php endif;
    endif;
?>

