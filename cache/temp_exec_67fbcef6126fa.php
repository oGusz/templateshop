
<footer>
<div class=container>
<div class="wrapper bg-primary-color wrapper-footer">
<div class="row justify-content-between">
<div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
<div class=logo-footer>
<a rel=nofollow href="<?= $url ?>" title="Voltar a página inicial">
<img src="<?= $url ?>imagens/logo-branca.png" alt="<?= $nomeSite ?>" title="<?= $nomeSite ?>">
</a>
</div>
<p class=white>
Psicóloga comportamental infantojuvenil em São Paulo. Especialista em crianças com atraso no desenvolvimento e crianças e adolescentes diagnosticados com TEA (Transtorno do Espectro Autismo).
</p>
</div>
<div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
<h3 class=footer__title>ENDEREÇO</h3>
<address class=address>
<span class=footer__link><i class="fas fa-map-marker-alt" aria-hidden=true></i> <?= $rua . " - " . $bairro ?> <?= $cidade ?></span>
</address>
<br>
<h3 class=footer__title>SIGA-NOS!</h3>
<?php include("canais.php")?>
</div>
<div class="col-3 col-xl-3 col-lg-3 col-md-3 col-sm-12">
<h3 class=footer__title>CONTATO</h3>
<?php foreach ($fone as $key => $value) : ?>
<?php if ($value[2] != 'fab fa-whatsapp') : ?>
<a class=footer__link rel=nofollow title="Clique e ligue" href="tel:<?= $value[0] . $value[1] ?>">
<i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
</a>
<?php else : ?>
<a class=footer__link rel=nofollow href="<?= wppLink($value) ?>" target=_blank title="Whatsapp <?= $nomeSite ?>">
<i class="<?= $value[2] ?>"></i> (<?= $value[0] ?>) <?= $value[1] ?>
</a>
<?php endif; ?>
<?php if ($key >= 2) break; ?>
<?php endforeach; ?>
<a class=footer__link rel=nofollow title="Envie um e-mail" href="mailto:<?= $emailContato ?>"><i class="fas fa-envelope"></i> <?= $emailContato ?></a>
</div>
<div class="col-2 col-xl-3 col-lg-3 col-md-3 col-sm-12">
<h3 class=footer__title>MENU</h3>
<div class=footer__menu>
<nav>
<ul>
<? include('inc/menu-footer.php'); ?>
</ul>
</nav>
</div>
</div>
</div>
<div class=footer__copyright>
<div class="wrapper bg-gradient">
<div class="row align-items-center">
<div class=col-6>
<span class=copyright__text>Copyright © <?= $nomeSite ?>. (Lei 9610 de 19/02/1998)</span>
</div>
<div class=col-6>
<div class=copyright__selos>
<a rel=nofollow href="https://validator.w3.org/nu/?doc=<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" target=_blank title="HTML5 W3C"><i class="fab fa-html5" aria-hidden=true></i> <strong>W3C</strong></a>
<a rel=nofollow href="https://jigsaw.w3.org/css-validator/validator?uri=<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>&amp;profile=css3svg&amp;usermedium=all&amp;warning=1&amp;vextwarning=&amp;lang=pt-BR" target=_blank title="CSS W3C"><i class="fab fa-css3-alt" aria-hidden=true></i> <strong>W3C</strong></a>
<img src="<?= $url ?>imagens/selo.png" alt="Desenvolvido com MPI Technology®" title="Desenvolvido com MPI Technology®" width=38 height=31 loading=lazy>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>
<? include('inc/functions-footer.php'); ?>