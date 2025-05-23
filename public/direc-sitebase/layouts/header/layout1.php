<!DOCTYPE html>
<html lang='pt-br'>
<head>


                               
                    <?php include(__DIR__ . "/templateshop-busca/inc/jquery.php"); ?>


                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Painel Codes</title>
                    <link rel="icon" type="image/png" href="favicon.png">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
                    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" onload="this.rel='stylesheet'">




                    <link rel="stylesheet" href= "/templateshop-busca/css/normalize.css"?>>
                    <link rel="stylesheet" href="/templateshop-busca/css/doutor.css">
                    <link rel="stylesheet" href="/templateshop-busca/css/style-base.css">
                    <link rel="stylesheet" href="/templateshop-busca/css/style.css">
                    <link rel="stylesheet" href="/templateshop-busca/sweetalert/css/sweetalert.css">
                    <link rel="stylesheet" href="/templateshop-busca/slick/slick.css">
                    <link rel="stylesheet" href="/templateshop-busca/slick/slick-banner.css">
                    
                    <link rel="import" href="/templateshop-busca/inc/jquery.php">
                    <link rel="import" href="/templateshop-busca/inc/menu-top.php">
           
            
            
<style>
/* =============================== HEADER =============================== */

/* HEADER */
header {
  background-color: #fff;
}

header .logo img {
  display: block;
  margin: 8px 0;
  aspect-ratio: 2/2;
  object-fit: contain;
}

/* TOPO */
header .topo {
  background-color: var(--dark);
  padding: 8px 0;
  font-size: 13px;
  color: #fff;
}

header .topo :is(span, a) {
  font: 13px var(--primary-font);
  color: #fff;
  outline: transparent solid 1px;
  outline-offset: 5px;
  border-bottom: 1px solid transparent;
  transition: .3s;
}

header .topo a:hover {
  border-bottom-color: var(--primary-color);
  color: var(--primary-color);
}

/* MENU */
header #menu {
  text-align: center;
  width: 100%;
  position: relative;
}

header #menu ul {
  list-style: none;
  margin: 0;
  padding: 0;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  height: 100%;
  width: 100%;
  gap: 8px;
  margin: 8px 0
}

header #menu li {
  position: relative;
  display: inline-block;
  margin: 0;
}

header #menu a {
  font-size: 14px;
  display: block;
  box-sizing: border-box;
  padding: 14px;
  text-align: center;
  color: var(--dark);
  border-bottom: 2px solid transparent;
  transition: .3s;
}

header #menu>ul>li:hover>a,
header #menu>ul>li>a.active-menu-topo {
  border-bottom-color: var(--primary-color);
  color: var(--primary-color);
}

/* SUB MENU */
header #menu .dropdown :is(.sub-menu, .sub-menu-info) {
  display: none;
  margin: 0;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 7;
  width: 230px;
  height: auto;
  background-color: var(--primary-color);
}

header #menu ul>li.dropdown:hover> :is(.sub-menu, .sub-menu-info) {
  display: block;
}

header #menu ul>li.dropdown>:where(.sub-menu, .sub-menu-info)>li.dropdown>:where(.sub-menu, .sub-menu-info) {
  display: none;
  top: 0;
  left: 100%;
}

header #menu>ul>li:nth-last-child(-n+3).dropdown> :is(.sub-menu, .sub-menu-info) {
  left: initial;
  right: 0;
}

header #menu>ul>li:nth-last-child(-n+3).dropdown> :is(.sub-menu, .sub-menu-info) :is(.sub-menu, .sub-menu-info) {
  left: initial;
  right: 100%;
}

header #menu ul>li.dropdown> :is(.sub-menu, .sub-menu-info)>li.dropdown:hover> :is(.sub-menu, .sub-menu-info) {
  display: block;
}

header #menu .dropdown :is(.sub-menu, .sub-menu-info) li {
  position: relative;
  display: block;
  margin: 0;
  width: 100%;
  padding: 0 12px;
  box-sizing: border-box;
}

header #menu .dropdown :is(.sub-menu, .sub-menu-info) li:first-of-type {
  padding-top: 12px;
}

header #menu .dropdown :is(.sub-menu, .sub-menu-info) li:last-of-type {
  padding-bottom: 12px;
}

header #menu .dropdown :is(.sub-menu, .sub-menu-info) li a {
  display: block;
  width: 100%;
  font-size: 12px;
  padding: 12px;
  text-align: left;
  text-decoration: none;
  color: #fff;
  border-bottom: 2px solid transparent;
}

header #menu .dropdown> :is(.sub-menu, .sub-menu-info)>li:hover>a,
header #menu .dropdown> :is(.sub-menu, .sub-menu-info)>li>a.active-menu-topo {
  border-bottom-color: #fff;
}

/* SUB MENU SCROLL */
header #menu .dropdown :is(.sub-menu, .sub-menu-info).sub-menu-scroll {
  max-height: 400px;
  height: auto;
  overflow-y: auto;
  overflow-x: hidden;
}

/* MENU DROPDOWN ARROWS */
header #menu>ul>li.dropdown:not([data-icon-menu])>a::after {
  content: "\f107";
  font-family: "FontAwesome";
  color: var(--grey);
  margin-left: 4px;
  font-size: 14px;
  transition: 0.3s;
}

header #menu>ul>li.dropdown:not([data-icon-menu])>a.active-menu-topo::after,
header #menu>ul>li.dropdown:not([data-icon-menu]):hover>a::after {
  color: var(--primary-color);
}

/* HEADER HOME */

header.header-home:not(.headerFixed) {
  position: absolute;
  max-width: var(--window-width);
  width: 100%;
  top: 0;
  left: 50%;
  transform: translateX(-50%);
  z-index: 999;
  background: linear-gradient(to bottom, rgb(104 100 100 / 50%), transparent);
}

header.header-home:not(.headerFixed) #menu a {
  color: #fff;
}

header.header-home:not(.headerFixed) #menu>ul>li:hover>a,
header.header-home:not(.headerFixed) #menu>ul>li>a.active-menu-topo {
  color: var(--primary-color);
}

header.header-home:not(.headerFixed) #menu>ul>li.dropdown:not([data-icon-menu])>a::after {
  color: #fff;
}

header.header-home:not(.headerFixed) #menu>ul>li.dropdown:not([data-icon-menu]):hover>a::after {
  color: var(--primary-color);
}

header.header-home:not(.headerFixed) .search input,
header.header-home:not(.headerFixed) .search input::placeholder,
header.header-home:not(.headerFixed) .search button {
  color: #FFF;
}

/* SEARCH */
.search {
  position: relative;
}

.search input {
  width: 100%;
  box-sizing: border-box;
  padding: 12px 12px;
  border: 1px solid #ccc;
  border-radius: var(--border-radius);
  color: var(--grey);
  background-color: transparent;
  font: normal 12px/normal var(--primary-font);
}

.search input::placeholder {
  font: normal 14px/normal var(--primary-font);
  color: var(--grey);
}

.search button {
  border: none;
  outline: none;
  text-decoration: none;
  background-color: transparent;
  color: var(--grey);
  font-size: 18px;
  width: max-content;
  -webkit-transition: .3s;
  -o-transition: .3s;
  transition: .3s;
}

.search--topo {
  margin: 8px 0
}

.search--topo button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 12px;
  width: max-content;
}

.search button:hover {
  color: var(--dark);
}

.search .button-group {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  right: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.search-content {
  opacity: 0;
  transition: opacity .2s ease .2s;
}

.search-content.search-active {
  opacity: 1;
}

.search-content .no-results {
  margin: 0 0 32px 0;
  text-align: left;
  font-size: 18px;
}

.search-content ul {
  margin: 0;
}

.search-content ul li {
  margin: 0;
  list-style: none;
}

.search-content ul li a {
  float: left;
  appearance: button;
  background-color: var(--primary-color);
  background-image: none;
  border: 1px solid var(--primary-color);
  border-radius: var(--border-radius);
  box-shadow: #fff 4px 4px 0 0, var(--primary-color) 4px 4px 0 1px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-size: 14px;
  font-weight: 400;
  line-height: 20px;
  margin: 6px 6px 12px 6px;
  overflow: visible;
  padding: 12px 40px;
  text-align: center;
  text-transform: none;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
  transition: .3s;
}

.search-content ul li a:focus {
  text-decoration: none;
}

.search-content ul li a:not([disabled]):active,
.search-content li a:not([disabled]):hover {
  box-shadow: unset;
  transform: translate(3px, 3px);
}
</style>
</head>
<body>
<?php
$infosphp = array (
  '' => 
  array (
    0 => 
    array (
      0 => '11',
      1 => '987654321',
      2 => 'fas fa-phone-alt',
    ),
    1 => 
    array (
      0 => '21',
      1 => '912345678',
      2 => 'fas fa-phone',
    ),
    2 => 
    array (
      0 => '31',
      1 => '998765432',
      2 => 'fab fa-whatsapp',
    ),
  ),
);
$emailContato = 'contato@contato.com.br';
$logoEmpresa = 'logo.svg';
$url = 'http://localhost/templateshop-busca/';
$rua = 'Rua Alexandre Dumas, 2100';
$bairro = 'Vila Cruzeiro';
$cidade = 'São Paulo';
$UF = 'SP';
$cep = 'CEP: 04717-004';
$submenuItems = array (
  'Home' => 
  array (
    'url' => '',
  ),
  'Empresa' => 
  array (
    'url' => 'empresa',
  ),
  'SIG' => 
  array (
  ),
  'Contato' => 
  array (
    'url' => 'contato',
  ),
  'Categorias' => 
  array (
    'url' => 'categorias',
    'icon' => 'fas fa-bars',
    'submenu' => 
    array (
    ),
  ),
);
$useSigMenu = true;
?>

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


<script>

</script>
</body>
</html>
