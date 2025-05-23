<aside class="mpi-aside" itemscope itemtype="https://schema.org/WPSideBar">
    <h2>FAÇA UM ORÇAMENTO</h2>
    <?php include('inc/form-coluna-lateral-mpi.php'); ?>
    <hr>
    <div class="aside-social">
        <?php if (isset($whatsapp)): ?>
            <a href="<?= wppLink($whatsapp) ?>" target="_blank" rel="nofollow" class="btn btn--green my-1" title="Orçamento por Whatsapp"
                itemprop="potentialAction" itemscope itemtype="https://schema.org/ContactPoint">
                <span itemprop="contactType">Orçamento por Whatsapp</span>
            </a>
        <?php endif; ?>
        <a href="tel:<?= $fone[0][1] ?>" class="btn btn--primary my-1" title="Orçamento pelo Telefone"
            itemprop="telephone">Orçamento pelo Telefone</a>
    </div>
    <hr>
    <h2 class="collapse-aside">Páginas Relacionadas <i class="fas fa-caret-down"></i></h2>
    <nav style="display: none;">
        <ul>
            <?php if ($hibrido):
                $currentPage = $urlPagina;
                $result = "";
                foreach ($vetProjetoBusca as $category):
                    if (isset($category['key'], $category['url'], $category['sub-menu'])):
                        foreach ($category['sub-menu'] as $subCategory):
                            if (isset($subCategory['key'], $subCategory['url'])):
                                if ($subCategory['url'] === $currentPage):
                                    $result = $category['url'] . "_" . $subCategory['url'] . "_";
                                    $links = glob($result . "*", GLOB_BRACE);
                                    if (!empty($links)):
                                        foreach ($links as $link):
                                            $linkUrl = explode('.php', $link);
                                            $linkTitle = explode('_', $linkUrl[0]);
                                            $linkTitle = str_replace('-', ' ', $linkTitle); ?>
                                            <li itemprop="relatedLink" itemscope itemtype="https://schema.org/LinkRole">
                                                <a data-mpi href="<?= htmlspecialchars($url . $linkUrl[0]) ?>" title="<?= htmlspecialchars($linkTitle[2]) ?>" itemprop="url">
                                                    <span itemprop="name"><?= htmlspecialchars($linkTitle[2]) ?></span>
                                                </a>
                                            </li>
                <?php endforeach;
                                    endif;
                                    break 2;
                                endif;
                            endif;
                        endforeach;
                    endif;
                endforeach; ?>
                <?php elseif ($buscaone):
                foreach ($vetKey as $key => $vetor): ?>
                    <li itemprop="relatedLink" itemscope itemtype="https://schema.org/LinkRole">
                        <a data-mpi href="<?= $url . $vetor['url'] ?>" title="<?= $vetor['key'] ?>" itemprop="url">
                            <span itemprop="name"><?= $vetor['key'] ?></span>
                        </a>
                    </li>
            <?php endforeach;
            endif; ?>
        </ul>
    </nav>
</aside>

<script>
    $(document).ready(function() {
        $('.tabs-btn [data-tab]').on('click', function() {
            let currentTab = $(this).attr('data-tab');
            if (!$(this).hasClass('active-tab')) {
                $('.tabs-btn [data-tab]').removeClass('active-tab');
                $(this).addClass('active-tab');
            }
            if ($('.tabs-content .active-tab').attr('data-tab') != currentTab) {
                $('.tabs-content .active-tab').fadeOut(function() {
                    $(this).removeClass('active-tab');
                    $(`.tabs-content [data-tab='${currentTab}']`).addClass('active-tab');
                    $(`.tabs-content [data-tab='${currentTab}']`).fadeIn();
                });
            }
        });
        $('aside .collapse-aside').on('click', function() {
            $(this).next().slideToggle();
            $(this).find("i").toggleClass('collapse-aside-active');
        });
    });
</script>