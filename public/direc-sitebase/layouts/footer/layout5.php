<!DOCTYPE html>
<html lang='pt-br'>
<head>


                    <?php include(__DIR__ . "/templateshop-busca/infos-head-category.php"); ?>
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
           
            
            
<style>
/* =============================== FOOTER =============================== */

footer { background-color: #f1f1f1; }

footer .address strong { color: var(--dark); font-size: 15px; display: block; margin-bottom: 10px; }
footer .address :is(a, span) { color: var(--dark); font-size: 14px; line-height: 24px; transition: .3s; }
footer .address a:hover { color: var(--primary-color); }

footer .footer__menu nav ul { display: flex; align-items: flex-start; justify-content: flex-end; }
footer .footer__menu nav ul li { display: inline; padding-left: 10px; }
footer .footer__menu nav ul li a { color: var(--dark); font-size: 13px; transition: .3s; }
footer .footer__menu nav ul li a:hover { color: var(--primary-color); }

footer .social { margin-top: 1.75em; display: flex; align-items: center; justify-content: flex-end; gap: 8px }
footer .social .social__icons { display: flex; justify-content: center; align-items: center; width: 30px; height: 30px; border-radius: 5px; font-size: 18px; background-color: var(--primary-color); color: #fff; text-align: center; transition: .3s; }
footer .social .social__icons:hover { background: var(--dark); }

/* LARGE DEVICE */
@media only screen and (max-width: 992px) {
    footer .address * { text-align: center; }
    footer .footer__menu nav ul { align-items: center; justify-content: center; }
    footer .social { justify-content: center; }
}

/* MEDIUM DEVICE */
@media only screen and (max-width: 768px) {
    footer .footer__menu nav ul li { display: block; padding: 0;}
    footer .footer__menu nav ul li a { -webkit-box-sizing: border-box; box-sizing: border-box; padding: 14px; display: block; margin: 0 auto; }
}

/* SMALL DEVICE */
@media only screen and (max-width: 576px) {
    footer .footer__menu nav ul { flex-direction: column; width: 100% }
    footer .footer__menu nav ul li { max-width: 80%; width: 100% }
    footer .footer__menu nav ul li a { width: 100%; margin: 5px auto; border: 1px solid var(--primary-color); color: #fff; background-color: var(--primary-color); }
}
</style>
</head>
<body>

<div class="clear"></div>
<footer>
    <div class="wrapper">
        <div class="row">
            <div class="p-5 col-5 col-md-12 col-lg-12">
                <address class="address">
                    <strong><?=$nomeSite." - ".$slogan?></strong>
                    <span><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?=$rua." - ".$bairro?> <br> <?=$cidade." - ".$UF." - ".$cep?></span>
                    <?php foreach ($fone as $key => $value): ?>
                    <?php if ($value[2] != 'fab fa-whatsapp'): ?>
                    <a rel="nofollow" title="Clique e ligue" href="tel:<?=$value[0].$value[1]?>">
                        <i class="<?=$value[2]?>"></i> (<?=$value[0]?>) <?=$value[1]?>
                    </a>
                    <?php else: ?>
                        <a rel="nofollow" href="<?= wppLink($value) ?>" target="_blank" title="Whatsapp <?= $nomeSite ?>">
                        <i class="<?=$value[2]?>"></i> (<?=$value[0]?>) <?=$value[1]?>
                    </a>
                    <?php endif; ?>
                    <?php if($key >= 2) break; ?>
                    <?php endforeach; ?>
                    <a rel="nofollow" title="Envie um e-mail" href="mailto:<?=$emailContato?>"><i class="fas fa-envelope"></i> <?=$emailContato?></a>
                </address>
            </div>
            <div class="p-5 col-7 col-md-12 col-lg-12">
                <div class="footer__menu">
                <nav>
                <ul>
                    <? include('inc/menu-footer.php'); ?>
                </ul>
            </nav>
                </div>
                <? include('inc/canais.php'); ?>
            </div>
        </div>
    </div>
    <br class="clear">
</footer>
<div class="copyright-footer">
    <div class="wrapper">
        Copyright © <?=$nomeSite?>. (Lei 9610 de 19/02/1998)
        <div class="selos">
            <a rel="nofollow" href="https://validator.w3.org/check?uri=<?=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" target="_blank" title="HTML5 W3C"><i class="fab fa-html5" aria-hidden="true"></i> <strong>W3C</strong></a>
            <a rel="nofollow" href="https://jigsaw.w3.org/css-validator/validator?uri=<?=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>&profile=css3svg&usermedium=all&warning=1&vextwarning=&lang=pt-BR" target="_blank" title="CSS W3C"><i class="fab fa-css3-alt" aria-hidden="true"></i> <strong>W3C</strong></a>
            <img class="object-fit-contain" src="<?= $url ?>imagens/selo.png" alt="Desenvolvido com MPI Technology®" title="Desenvolvido com MPI Technology®" width="50" height="41" loading="lazy">
            </div>
    </div>
    <div class="clear"></div>
</div>
<?php if(isset($whatsapp) && !empty($whatsapp)){ include 'whatsapp-button.php';} ?>

<?include('inc/LAB.php');?>

<!-- end footer -->

<script>
    $(window).on('load', function() {               
        <? include 'js/whatsapp-button.js'; ?>									
    });
</script>

<? include('inc/pop-up-inc.php'); ?>




<script>

</script>
</body>
</html>
