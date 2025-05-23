    <div class="wrapper">
        <article class="full">
            <div class="prod-inc htmlchars">
                <?php
                $Read->ExeRead(TB_PRODUTO, "WHERE prod_status = :stats AND prod_name = :nm", "stats=2&nm={$lastCategory}");
                if (!$Read->getResult()) :
                    WSErro("Desculpe, mas não foi encontrando o conteúdo relacionado a esta página, volte mais tarde", WS_INFOR, null, "Aviso!");
                else :
                    foreach ($Read->getResult() as $dados) :
                        extract($dados); ?>
                        <div class="container">
                            <div class="prod-grid">
                                <div class="prod-cover">
                                    <?php
                                    $Read->ExeRead(TB_GALLERY, "WHERE gallery_rel = :id AND gallery_type = :gtp", "id={$prod_id}&gtp=prod");

                                    include('inc/produto-inc-covers.php');
                                    ?>
                                </div>

                                <div class="prod-info">
                                    <h2 class="prod-info__title">Informações</h2>

                                    <ul class="prod-info__list">
                                        <?php if (!empty($prod_codigo) && $prod_codigo != ' ') : ?>
                                            <li><span>Cód:</span> <?= $prod_codigo ?></li>
                                        <? endif; ?>

                                        <li>
                                            <?php $catInfo = Check::ItemCategory($dados['cat_parent']); ?>
                                            <span>Categoria:</span>
                                            <a href="<?= $catInfo['url'] ?>" title="<?= $catInfo['title'] ?>"><?= $catInfo['title'] ?></a>
                                        </li>

                                        <?php if (!empty($prod_preco_old) && $prod_preco_old != '0.00') : ?>
                                            <li>De: <span>R$:</span> <?= $prod_preco_old; ?></li>
                                        <? endif; ?>
                                        <?php if (!empty($prod_preco) && $prod_preco != '0.00') : ?>
                                            <li>Por: <span>R$:</span> <?= $prod_preco; ?></li>
                                        <? endif; ?>
                                    </ul>

                                    <?php if (WD_PROD_PAGE_BREVEDESC && !empty($prod_brevedescription) && $prod_brevedescription != ' ') : ?>
                                        <p class="prod-info__desc"><?= strip_tags($prod_brevedescription) ?></p>
                                    <?php else: ?>
                                        <p class="prod-info__desc"><?= Check::Words($prod_content, 50); ?></p>
                                    <?php endif; ?>

                                    <?php if (strlen($prod_keywords) > 1) : ?>
                                        <div class="prod-info__tags">
                                            <?php $prodKeywordList = explode(",", $prod_keywords);
                                            foreach ($prodKeywordList as $key => $item) : ?>
                                                <a href="<?= $url ?>prod-tags/<?= queryFilter($item) ?>" title="<?= $item ?>" rel="nofollow"><i class="mr-2 fa-solid fa-tags"></i><?= trim($item) ?></a>
                                            <?php
                                            endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="prod-cart">
                                    <!-- CARRINHO -->
                                    <?php if (WD_CART) : ?>
                                        <div class="prod-inc-cart">
                                            <?php include('inc/produto-inc-cart.php'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!-- CONTEÚDO DESCRITIVO / DOWNLOADS -->

                                <div class="prod-gallery">
                                    <? include('inc/produto-inc-gallery.php'); ?>
                                </div>

                                <div class="prod-content">
                                    <? include('inc/produto-inc-content.php'); ?>
                                </div>
                            </div> <!-- row -->
                        </div> <!-- container -->
                <?php
                    endforeach;
                endif; ?>
            </div> <!-- htmlchars -->
        </article>
        <? include('inc/itens-relacionados-inc.php'); ?>
    </div>