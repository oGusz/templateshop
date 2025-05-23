<?php
// ******************** MOBILE DETECT ********************
$isMobile =  preg_match("/(android|webos|avantgo|iphone|ipad|ipod|blackberry|iemobile|bolt|boost|cricket|docomo|fone|hiptop|mini|opera mini|kitkat|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);

// ******************** ARR PREPOSIÇÕES *****************
$prepos = array(' a ', ' á ', ' à ', ' ante ', ' até ', ' após ', ' de ', ' desde ', ' em ', ' entre ', ' com ', ' para ', ' por ', ' perante ', ' sem ', ' sob ', ' sobre ', ' na ', ' no ', ' e ', ' do ', ' da ', ' ', '(', ')', '\'', '"', '.', '/', ':', ' | ', ',, ');

// ******************** WHATSAPP LINK  ********************
if (!function_exists('wppLink')) {
  function wppLink($phoneNumber, $altMessage = null) {
    global $isMobile, $nomeSite, $urlPagina;
    $wppNumber          = is_array($phoneNumber) ? $phoneNumber[0] . $phoneNumber[1] : $phoneNumber;
    $wppClearStr        = array(' ', '-', '(', ')');
    $excludedPages      = ['empresa', 'quem-somos', 'sobre-nos', 'contato', 'orcamento', 'categorias', ''];
    $wppSubject         = in_array($urlPagina, $excludedPages) ? '.' : ' para ' . $urlPagina;
    $defaultMessage     = 'Olá! Gostaria de solicitar um orçamento' . $wppSubject;
    $wppMessage         = isset($altMessage) && !empty($altMessage) ? $altMessage : $defaultMessage;
// $wppVerifyDevice    = $isMobile ? 'api' : 'web';
// return 'https://' . $wppVerifyDevice . '.whatsapp.com/send?phone=+55' . str_replace($wppClearStr, '', $wppNumber) . '&amp;text=' . rawurlencode($wppMessage);
    return 'https://wa.me/55' . str_replace($wppClearStr, '', $wppNumber) . '?text=' . rawurlencode($wppMessage);
  }
}
// ******************** GET COORDINATES ********************
if (!function_exists('GetCoordinates')) {
  function GetCoordinates($map) {
    preg_match_all('/!2d([0-9|.|-]+)\!3d([0-9|.|-]+)/', $map, $coordinates, PREG_SET_ORDER, 0);
    return $coordinates[0][2] . ';' . $coordinates[0][1];
  }
}
if(!function_exists('textFilter')) {
  function textFilter($inputText){
    $specialCharacters = array(
      'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
      'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
      'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
      'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
      'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
      'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
      'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
      'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
    );
    $inputText = strtr($inputText, $specialCharacters);
    $inputText = strtolower(str_replace(' ', '-', $inputText));
    $inputText = preg_replace("(\-+)", "-", $inputText);
    return $inputText;
  }
}

// Função para remover acentuação e converter para lowercase
if(!function_exists('normalizeString')) {
  function normalizeString($string){
    $unwantedArray = ['Á' => 'A', 'À' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'Í' => 'I', 'Ì' => 'I', 'Î' => 'I', 'Ï' => 'I', 'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i', 'Ó' => 'O', 'Ò' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'Ú' => 'U', 'Ù' => 'U', 'Û' => 'U', 'Ü' => 'U', 'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'Ç' => 'C', 'ç' => 'c', 'Ñ' => 'N', 'ñ' => 'n'];
    return strtolower(strtr($string, $unwantedArray));
  }
}
if(!function_exists('queryFilter')) {
  function queryFilter($inputText){
    $specialCharacters = array(
      'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj',''=>'Z', ''=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
      'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
      'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
      'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
      'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
      'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
      'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
      'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
    );
    $inputText = strtr($inputText, $specialCharacters);
    $inputText = strtolower(str_replace(' ', '+', $inputText));
    $inputText = preg_replace("(\++)", "+",  $inputText);
    return $inputText;
  }
}
if(!function_exists('renameImages')) {
  function renameImages($dir){
    foreach (glob($dir . '*') as $file) {
      $newName = textFilter(basename($file));
      if (rename($file, $dir.$newName)) {
        echo 'Arquivo renomeado com sucesso: ' . $newName . '<br>';
      } else {
        echo 'Erro ao renomear arquivo: ' . $file . '<br>';
      }
    }
  }
}
/** Google Fonts Tag and Call CSS Generator
*
* Como usar:
*
* Propriedade de configuração 1 - Sete para TRUE caso for usar as fontes do Google no site, caso contrario, sete para FALSE.
*
* Exemplo:
* define('USE_GOOGLE_FONTS', true); - habilitado
* define('USE_GOOGLE_FONTS', false); - desabilitado
*
*
* Propriedade de configuração 2 - Defina as fontes que seram usadas entre aspas simples e separadas por virgula dentro do array.
*
* Exemplo:
* $fontFamily = ['nome da fonte', 'nome da fonte'];
*
*
* Propriedade de configuração 3 - Defina as espessuras(weight) PARA CADA UMA das fontes setadas no array $fontFamily, do passo anterior, em formato de array e separadas por virgula.
*
* Exemplo:
* $weights = [[400, 800], [400, 600, 800]];
*
*
* Propriedade de configuração 4 - Caso necessario o uso, defina as espessuras(weight) do estilo italico (italic) PARA CADA UMA das fontes setadas no array $fontFamily, assim como no passo anterior, em formato de array e separadas por virgula. Se não, deixe o array vazio.
*
* Exemplo:
* $italicWeights = [[400, 800], [300, 500]]; - habilitado
* $italicWeights = []; - desabilitado
*
* ATENÇAO:
* Use no mínimo um estilo e no maximo três estilos de fonte.
* A fonte "Montserrat" é setada por padrão, caso não ocorra nenhuma especificade de outras fontes nesta função.
*/
// Google Fonts Tag Generator
if (!function_exists('GoogleFontsTagGenerator')) {
define('USE_GOOGLE_FONTS', true); // Propriedade de configuração 1
$fontFamily = ['Poppins']; // Propriedade de configuração 2
$weights = [[200, 300, 400, 500, 600, 700]]; // Propriedade de configuração 3
$italicWeights = [[400, 700]]; // Propriedade de configuração 4
function GoogleFontsTagGenerator($fontFamily, $weights, $italicWeights)
{
  $gfQuery = '';
  if (USE_GOOGLE_FONTS) {
    foreach ($fontFamily as $fontIndex => $font) {
      $fSeparator = $fontIndex == 0 ? '' : '&';
      $hasItalic = $italicWeights[$fontIndex] ? 'ital,' : '';
      $fontToUrl = str_replace(' ', '+', $font);
      $gfQuery .= $fSeparator . 'family=' . $fontToUrl . ':' . $hasItalic . 'wght@';
      foreach ($weights[$fontIndex] as $weightIndex => $weight) {
        $hasItalic = $italicWeights[$fontIndex] ? '0,' : '';
        $wSeparator = (count($weights[$fontIndex]) - 1 != $weightIndex) ? ';' : '';
        $gfQuery .= $hasItalic . $weight . $wSeparator;
      }
      if ($italicWeights[$fontIndex]) {
        foreach ($italicWeights[$fontIndex] as $italicWeightIndex => $iWeight) {
          $gfQuery .= ';1,' . $iWeight;
        }
      }
    }
    return '<link
    rel="preload"
    href="https://fonts.googleapis.com/css2?' . $gfQuery . '&amp;display=swap"
    as="style"
    onload="this.onload=null;this.rel=\'stylesheet\'"
    >
    <noscript>
    <link
    href="https://fonts.googleapis.com/css2?' . $gfQuery . '&amp;display=swap"
    rel="stylesheet"
    type="text/css"
    >
    </noscript>';
  }
  return '';
}
}
    // Google Fonts Call CSS Generator
if (!function_exists('GoogleFontsStyleGenerator')) {
  function GoogleFontsStyleGenerator($fontFamily)
  {
    $varName = ['--primary-font', '--secondary-font', '--tertiary-font'];
    $varQuery = '';
    if (USE_GOOGLE_FONTS) {
      foreach ($fontFamily as $fontIndex => $font) {
        $varQuery .= $varName[$fontIndex] . ': "' . $font . '", sans-serif; ';
      }
      return '<style> :root { ' . $varQuery . ' } </style>';
    }
    return '';
  }
}
?>