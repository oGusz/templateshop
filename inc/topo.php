<?php if ($pageLoadingAnimation) include('inc/page-loading-animation.php'); ?>

<?php if (!$isMobile) : ?> <!-- DESKTOP -->
    <header id="scrollheader" class="<?= $urlPagina == '' ? 'header-home' : 'header-pages' ?>">

        <div class="topo">
            <div class="wrapper">
                <div class="d-flex d-flex-wrap align-items-center justify-content-between">
                    <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?= $rua . " - " . $cidade . " - " . $UF ?></span>
                    <div class="d-flex align-items-center justify-content-between gap-8">
                        <?php foreach ($fone as $key => $value) : ?>
                            <?php if ($value[2] != 'fab fa-whatsapp') : ?>
                                <a rel="nofollow" title="Clique e ligue" href="tel:<?= $value[0] . $value[1] ?>">
                                    <i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
                                </a>
                            <?php else : ?>
                                <a rel="nofollow" href="<?= wppLink($value) ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>">
                                    <i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
                                </a>
                            <?php endif; ?>
                            <?php if ($key >= 2) break; ?>
                        <?php endforeach; ?>
                        <a rel="nofollow" title="Envie um e-mail" href="mailto:<?= $emailContato ?>"><i class="fas fa-envelope"></i> <?= $emailContato ?></a>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>

        <div class="wrapper">
            <div class="d-flex d-flex-wrap flex-sm-column flex-align-items-center justify-content-between justify-content-md-center">
                <div class="logo">
                    <a rel="nofollow" href="<?= $url ?>" title="Voltar a página inicial">
                        <?php if (isset($logoEmpresa)): ?>
                            <img src="<?= $url ?>doutor/uploads/<?= $logoEmpresa ?>" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>">
                        <?php else: ?>
                            <img src="<?= $url ?>imagens/logo.png" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>">
                        <?php endif; ?>
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-end justify-content-md-center gap-16">
                    <nav id="menu">
                        <ul>
                            <? include('inc/menu-top.php'); ?>
                        </ul>
                    </nav>
                    <?php include('inc/pesquisa-inc.php'); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </header>
    <div id="header-block"></div>
<?php else: ?> <!-- MOBILE -->
    <header class="header-mobile">
        <div class="wrapper">
            <div class="header-mobile__logo">
                <a rel="nofollow" href="<?= $url ?>" title="Voltar a página inicial">
                    <?php if (isset($logoEmpresa)): ?>
                        <img src="<?= $url ?>doutor/uploads/<?= $logoEmpresa ?>" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>">
                    <?php else: ?>
                        <img src="<?= $url ?>imagens/logo.png" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>">
                    <?php endif; ?>
                </a>
            </div>
            <div class="header__navigation">
                <!--navbar-->
                <nav id="menu-hamburger">
                    <!-- Collapse button -->
                    <div class="menu__collapse">
                        <button class="collapse__icon" aria-label="Menu">
                            <span class="collapse__icon--1"></span>
                            <span class="collapse__icon--2"></span>
                            <span class="collapse__icon--3"></span>
                        </button>
                    </div>
                    <!-- collapsible content -->
                    <div class="menu__collapsible">
                        <div class="wrapper">
                            <!-- links -->
                            <ul class="menu__items droppable">
                                <? include('inc/menu-top-hamburger.php'); ?>
                            </ul>
                            <!-- links -->
                        </div>
                        <div class="clear"></div>
                    </div>
                    <!-- collapsible content -->
                </nav>
                <!--/navbar-->
            </div>
        </div>
    </header>

    <address class="header-mobile-contact">
        <a rel="nofollow" href="tel:<?= $fone[0][0] . $fone[0][1] ?>" title="Clique e ligue"><i class="fas fa-phone"></i></a>
        <?php if (isset($whatsapp)): ?>
            <a rel="nofollow" href="<?= wppLink($whatsapp) ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>"><i class="fab fa-whatsapp"></i></a>
        <?php endif; ?>
        <?php if (isset($emailContato)): ?>
            <a rel="nofollow" href="mailto:<?= $emailContato ?>" title="Envie um E-mail"><i class="fas fa-envelope"></i></a>
        <?php endif; ?>
    </address>
<?php endif; ?>

<? include('inc/barra-inc.php'); ?>