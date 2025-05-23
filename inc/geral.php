<?php
// SETAR O TIPO DE PROJETO
$hibrido = false;
$buscaone = true;

// SETAR SE O CLIENTE TEM DEPOIMENTOS
// $depoimentos = true;

// ******************** MONTAGEM URL DINÂMICA ********************
$dir = $_SERVER['SCRIPT_NAME'];
$dir = pathinfo($dir);
$host = $_SERVER['HTTP_HOST'];
$http = $_SERVER['REQUEST_SCHEME'];

if ($dir["dirname"] == "/") {
  $url = $http . "://" . $host . "/";
} else {
  $url = $http . "://" . $host . $dir["dirname"] . "/";
}

$isLocalhost = strpos($host, 'localhost') !== false ? true : false;

$explode = explode("/", $_SERVER['REQUEST_URI']);
$urlPagina = end($explode);
$urlPagina = str_replace('.php', '', $urlPagina);
$urlPagina == "index" ? $urlPagina = "" : "";

// ******************** CONFIG FINAL DEPLOY ********************

// INTERNO
$idProjetoBusca = '6392';
$idCliente = '';
$senhaEmailEnvia = '102030'; // PADRÃO

// GOOGLE
$idAnalytics = '';
$tagmanager = '';
$googleSearchConsole = '';

// RECAPTCHA
$siteKey = '';
$secretKey = '';

// ******************** END CONFIG FINAL DEPLOY ********************

// ******************** SIG ********************

// CONFIGURAÇÕES NO ARQUIVO EMPRESA.CLASS.PHP

//INSTITUCIONAL

$nomeSite = 'Teste';
$slogan = 'Teste';
$logoEmpresa ='logo.png';

//TELEFONES

$fone = "(11)9999-9999"; //Array contendo todos os telefones e whatsapps

$whatsapp = "(11)9999-9999";
$whatsapp2 = "(11)9999-9992";
$whatsapp3 = "(11)9999-9993";

//EMAILS

$emailContato = "teste@teste.com.br";
$emailContato2 = "teste2@teste.com.br";
$emailContato3 = "teste3@teste.com.br";

//REDES SOCIAIS

$urlFacebook = "https://www.facebook.com/";
$urlInstagram = "https://www.facebook.com/";
$urlTwitter = "https://www.facebook.com/";
$urlLinkedIn = "https://www.facebook.com/";
$urlYouTube = "https://www.facebook.com/";
$urlThreads = "https://www.facebook.com/";
$urlTikTok = "https://www.facebook.com/";
$urlPinterest = "https://www.facebook.com/";

//LOCALIZAÇÃO

$rua = 'Rua Alexandre Dumas, 2100';
$bairro = 'Vila Cruzeiro';
$cidade = 'São Paulo';
$UF = 'SP';
$cep = 'CEP: 04717-004';

$mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.2834627405105!2d-46.7098276246678!3d-23.630017478752677!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce50dfcfd8a265%3A0x679c6f18552e3dfc!2sRua%20Alexandre%20Dumas%2C%202100%20-%20Santo%20Amaro%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004717-004!5e0!3m2!1spt-BR!2sbr!4v1726385022227!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
preg_match('/src="([^"]+)"/', $mapa, $out);
$mapa = $out[1];

// ******************** MENU ********************
// HEADER FIXO
$headerFixed = true;

// CONFIG MENU
$useSigMenu = true;
$sigIconText = false;
$sigMenuIcons = []; //EX: ['fas fa-home', 'fas-fa-user']





$jsonMenu = file_get_contents("public/js/menu-items.json");

$menuItems = json_decode($jsonMenu, true);
$menuKeys = array_keys($menuItems);

// ******************** BREADCRUMB SCHEMA ********************

$breadPosition = 1;
$breadJsonSchema = array(
  "@context" => "https://schema.org",
  "@type" => "BreadcrumbList",
  "itemListElement" => array(
    [
      "@type" => "ListItem",
      "position" => $breadPosition,
      "item" => array(
        "@id" => trim($url, '/'),
        "name" => "Home"
      )
    ]
  )
);

if (!function_exists('addBreadJson')) {
  function addBreadJson($urlBread, $title)
  {
    global $breadPosition, $breadJsonSchema, $url;
    $breadPosition++;
    array_push($breadJsonSchema["itemListElement"], ["@type" => "ListItem", "position" => $breadPosition, "item" => array("@id" => $url . $urlBread, "name" => $title)]);
  }
}

// ******************** PAGE LOADING ANIMATION ********************
$pageLoadingAnimation = false; //Habilita animações de carregamento
$pageLoadingAllPages = false; //Animação em todas as páginas ou apenas na index/home (false=index, true=todas)
$pageLoadingTimeout = 200; //Adiciona tempo extra na animação, a contagem é iniciada após o carregamento da página. Valor em milisegundos (1 segundo=1000 milisegundos).

$pageLoadingLogo = true; //Animação com logo
$pageLoadingSpinner = true; //Animação com spinner
//OBS: É possível usar as duas animações simultaneamente

// ******************** TESTE PARA ENVIO DE E-MAIL ********************
// 1 - Altere para ** TRUE ** para realizar o teste de envio dos formulários do site e volte para ** FALSE ** após finalizá-lo
$envioTeste = true;
// 2 - Insira seu email para fazer o teste de envio dos formulários do site
$emailTeste = 'teste@buscacliente.com.br';

// ******************** PASTA DE IMAGENS, GALERIA, URL FACEBOOK, ETC. ********************
$pasta = 'imagens/categorias/';
$author = ''; // Link do perfil da empresa no g+ ou deixar em branco

// ******************** FUNCTIONS *****************
include('public/direc-sitebase/inc/functions.php');
