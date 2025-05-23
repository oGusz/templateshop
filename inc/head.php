<?php
//Montagem da busca
$search = filter_input(INPUT_POST, 'busca', FILTER_DEFAULT);
if (!empty($search)):
  $search = strip_tags(trim(urlencode($search)));
  header('Location: ' . RAIZ . '/pesquisa-sig/' . $search);
endif;
//Inclusão da geral com dados e variaveis do cliente
include __DIR__ . '/../../../public/direc-sitebase/inc/geral.php';

//Verificação se a categoria ou página existe no banco de dados
$pagina = false;
if (isset($URL) && !in_array('', $URL)):
  //Armazena sempre o ultimo item da url
  $lastCategory = end($URL);
foreach ($URL as $paginas => $value):
  if (!empty($value)):
    $Read->ExeRead(TB_PAGINA, "WHERE pag_name = :nm AND pag_status = :status", "nm={$value}&status=2");
    if ($Read->getResult()):
      $pagina = true;
    endif;
    $Read->ExeRead(TB_CATEGORIA, "WHERE cat_name = :nm AND cat_status = :status", "nm={$value}&status=2");
    if ($Read->getResult()):
      $pagina = true;
    endif;
  endif;
endforeach;
endif;

if ($pagina):
  $getURL = trim(strip_tags(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
  $setURL = (empty($getURL) ? 'index' : $getURL);
  $URL = explode('/', $setURL);
  $SEO = new Seo($setURL);
endif;
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="pt-br"> <!--<![endif]-->

  <head>
    <!-- HEAD REPOSÁVEL PELAS PÁGINAS ESTÁTICAS -->
    <meta charset="utf-8">

    <?= GoogleFontsTagGenerator($fontFamily, $weights, $italicWeights); ?>
    <?= GoogleFontsStyleGenerator($fontFamily); ?>

    <link rel="preload" as="style" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" onload="this.rel='stylesheet'">

    <title><?= $pagina ? $SEO->getTitle() : $title . " - " . $nomeSite; ?></title>
    <base href="<?= RAIZ; ?>">
    <?php

    if (!isset($urlPagInterna)) {
      $desc = $pagina ? $SEO->getDescription() : "Teste title - Descrição teste";
    }


    $desc = strip_tags($desc);
    $desc = str_replace('  ', ' ', $desc);
    $desc = str_replace(' ,', ',', $desc);
    $desc = str_replace(' .', '.', $desc);
    $desc = str_replace(' ?', '?', $desc);
    if (mb_strlen($desc, "UTF-8") > 160) {
      $desc = mb_substr($desc, 0, 159);
      $finalSpace = strrpos($desc, " ");
      $desc = substr($desc, 0, $finalSpace);
      $desc .= ".";
    } else if (mb_strlen($desc, "UTF-8") < 140 && mb_strlen($desc, "UTF-8") > 130) {
      $desc .= "... Saiba mais.";
    }
    ?>
    <meta name="description" content="<?= $desc ?>">
    <meta name="keywords" content="<?= $pagina ? $SEO->getkeywords() : str_replace($prepos, ', ', $title) . ', ' . $nomeSite ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="geo.position" content="<?= GetCoordinates($mapa); ?>">
    <meta name="geo.placename" content="<?= $cidade . "-" . $UF ?>">
    <meta name="geo.region" content="<?= $UF ?>-BR">
    <meta name="ICBM" content="<?= GetCoordinates($mapa); ?>">
    <meta name="robots" content="index,follow">
    <meta name="rating" content="General">
    <meta name="revisit-after" content="7 days">
    <link rel="canonical" href="<?= RAIZ . '/' . ($pagina ? $getURL : $urlPagina) ?>">
    <?php
    if (empty($author)):
      echo '<meta name="author" content="' . $nomeSite . '">';
    else:
      echo '<link rel="author" href="' . $author . '">';
    endif;
    ?>

    <link rel="shortcut icon" href="<?= RAIZ; ?>/imagens/favicon.png">
    <meta property="og:region" content="Brasil">
    <meta property="og:type" content="article">
    <meta property="og:title" content="<?= $pagina ? $SEO->getTitle() : $title . " - " . $nomeSite ?>">
    <?php if (file_exists($url . $pasta . $urlPagina . "-01.webp")): ?>
      <meta property="og:image" content="<?= $pagina ? $SEO->getImage() : RAIZ . '/' . $pasta . $urlPagina ?>-01.webp">
    <?php endif; ?>
    <meta property="og:url" content="<?= RAIZ; ?>/<?= $pagina ? $getURL : $urlPagina ?>">
    <meta property="og:locale" content="pt_BR">
    <meta property="og:description" content="<?= $desc ?>">
    <meta property="og:site_name" content="<?= $nomeSite ?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="google-site-verification" content="<?= $googleSearchConsole ?>">

    <?php
    include('public/direc-sitebase/inc/jquery.php');
 
    ?>

    <style>
      <?php
      include("public/direc-sitebase/css/normalize.css");
      include("public/direc-sitebase/css/doutor.css");
      include("public/direc-sitebase/css/style-base.css");
      include("public/direc-sitebase/css/style.css");
      include("public/direc-sitebase/sweetalert/css/sweetalert.css");
      ?>
    </style>

    <?php if ($isMobile) : ?>
      <style>
        <?php include("public/direc-sitebase/css/menu-hamburger.css"); ?>
      </style>
    <?php endif; ?>

    <?php if ($pageLoadingAnimation) : ?>
      <style>
        <?php include("public/direc-sitebase/css/page-loading.css"); ?>
      </style>
    <?php endif; ?>

    <?php if (isset($whatsapp) && !empty($whatsapp)) : ?>
    <style>
      <?php include("public/direc-sitebase/css/whatsapp.css"); ?>
    </style>
  <?php endif; ?>

  <script>
    <?php
    include("public/direc-sitebase/js/default-passive-events.js");

    if ($headerFixed && !$isMobile) {
      include("public/direc-sitebase/js/header-scroll.js");
    }

    if ($isMobile) {
      include("public/direc-sitebase/js/menu-hamburger.js");
    }

    include("public/direc-sitebase/sweetalert/js/sweetalert.min.js");
    include("public/direc-sitebase/js/ajax.js");
    ?>
  </script>

  <?php include('public/direc-sitebase/inc/contato/formScripts.php'); ?>
  <?php include('public/direc-sitebase/inc/contato/formPost.php'); ?>