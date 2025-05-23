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

header { background-color: #fff; }
header .logo img { display: block; margin: 1.75rem auto; width: 100%; max-width: 200px; height: auto; }

/* TOPO */
header .topo { background-color: var(--primary-color); padding: 8px 0; font-size: 13px; color: #fff; }
header .topo :is(span, a) { font: 13px var(--primary-font); color: #fff; transition: .3s; }
header .topo a:hover { opacity: 0.75;}


/* MENU */
header #menu > ul { display: flex; align-items: center; justify-content: center; height: 100%; gap: 4px;}
header #menu > ul > li { margin: 0; }
header #menu > ul > li > a { color: var(--grey); padding: 11px 15px; }
header #menu > ul > li:hover > a,
header #menu > ul > li > a.active-menu-topo { color: var(--primary-color); }
header #menu > ul > li.dropdown [class*='sub-menu'] { background-color: var(--primary-color); }
header #menu > ul > li.dropdown [class*='sub-menu'] > li:hover > a,
header #menu > ul > li.dropdown [class*='sub-menu'] > li > a.active-menu-topo { background-color: #fff; color: var(--primary-color); }

/* MENU DROPDOWN ARROWS */

header #menu > ul > li.dropdown:not([data-icon-menu]) > a::after {
    content: \f107;
    font-family: 'FontAwesome';
    color: var(--grey);
    margin-left: 4px;
    font-size: 12px;
    transition: 0.3s;
}

header #menu > ul > li.dropdown:not([data-icon-menu]) > a.active-menu-topo::after,
header #menu > ul > li.dropdown:not([data-icon-menu]):hover > a::after {
    color: var(--primary-color);
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

<header id="scrollheader">
        <div class="topo">
            <div class="wrapper">
                <div class="d-flex align-items-center justify-content-between">
                    <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?= $rua . " - " . $cidade . " - " . $UF ?></span>
                    <div class="d-flex align-items-center justify-content-between gap-10">
                        <?php foreach ($fone as $key => $value) : ?>
                            <?php if ($value[2] != "fab fa-whatsapp") : ?>
                                <a rel="nofollow" title="Clique e ligue" href="tel:<?= $value[0] . $value[1] ?>">
                                    <i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
                                </a>
                            <?php else : ?>
                                <a data-analytics rel="nofollow" href="<?= wppLink($value) ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>">
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
            <div class="d-flex flex-sm-column flex-align-items-center justify-content-between justify-content-md-center gap-20">
                <div class="logo">
                    <a rel="nofollow" href="<?= $url ?>" title="Voltar a página inicial">
                        <img src="https://img.logoipsum.com/288.svg" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>" width="399" height="88">
                    </a>
                </div>
                <div class="d-flex align-items-center justify-content-end justify-content-md-center gap-20">
                    <nav id="menu">
                        <ul>
                            <? include("inc/menu-top.php"); ?>
                        </ul>
                    </nav>
                    <? include("inc/pesquisa-inc.php"); ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </header>
    <div id="header-block"></div>


<script>

</script>
</body>
</html>
