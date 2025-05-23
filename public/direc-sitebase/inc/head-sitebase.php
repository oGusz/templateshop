<?php
//Montagem da busca
$search = filter_input(INPUT_POST, 'busca', FILTER_DEFAULT);
if (!empty($search)):
  $search = strip_tags(trim(urlencode($search)));
  header('Location: ' . $url . '/pesquisa-sig/' . $search);
endif;
//Inclusão da geral com dados e variaveis do cliente
include __DIR__ . '/../../../public/direc-sitebase/inc/geral.php';




$rua = "Av. Paulista, 1000";
$cidade = "São Paulo";
$UF = "SP";

$fone = [
  ["11", "98765-4321", "fas fa-phone"], // Telefone comum
  ["11", "91234-5678", "fab fa-whatsapp"], // WhatsApp
  ["11", "97654-3210", "fas fa-phone"], // Outro telefone
];

$nomeSite = "Minha Empresa";
$emailContato = "contato@minhaempresa.com";

function wppLink($value)
{
  return "https://wa.me/55" . $value[0] . $value[1];
}
$pagina = "";


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
  <base href="<?= $url ?>">
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



  <link rel="shortcut icon" href="<?= $url ?>/imagens/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <?php
  include('public/direc-sitebase/inc/jquery.php');
  include('public/direc-sitebase/inc/fancy.php');


  ?>

  <style>
    <?php
    // include("public/direc-sitebase/css/normalize.css");
    include("public/direc-sitebase/css/doutor.css");
    include("public/direc-sitebase/css/style-base.css");
    include("public/direc-sitebase/css/style.css");
    // include("public/direc-sitebase/sweetalert/css/sweetalert.css");
 

    ?>
  </style>


  <?php if ($isMobile) : ?>
    <style>
      <?php include("public/direc-sitebase/css/menu-hamburger.css"); ?>
    </style>
  <?php endif; ?>

 



  <script>
    <?php
    
  

   

    if ($isMobile) {
      include("public/direc-sitebase/js/menu-hamburger.js");
    }

    include("public/direc-sitebase/sweetalert/js/sweetalert.min.js");
    include("public/direc-sitebase/js/ajax.js");
    ?>
  </script>

  <?php include('public/direc-sitebase/inc/contato/formScripts.php'); ?>
  <?php include('public/direc-sitebase/inc/contato/formPost.php'); ?>