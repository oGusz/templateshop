<?php
function enviar($nameUser, $phoneUser, $emailUser, $messageUser, $produtos = null, $urlProject, $urlPage, $titlePage, $idProject, $emailProject)
{
  try {
    // Validação de parâmetros obrigatórios
    if (empty($nameUser) || empty($phoneUser) || empty($emailUser) || empty($urlProject) || empty($urlPage)) {
      throw new Exception("Parâmetros obrigatórios estão ausentes.");
    }

    // Construção da mensagem e URL
    $produtos = $produtos ? " | Itens do carrinho: $produtos" : "";
    $messageUser .= PHP_EOL . $produtos . PHP_EOL;

    $url = $urlProject . $urlPage;

    // Dados do POST
    $postData = [
      'acao' => 'Cotação Site',
      'produto_nome' => $titlePage,
      'produto_url' => $url,
      'produtoref' => $produtos,
      'imagem' => '',
      'site' => $urlProject,
      'email' => $emailProject,
      'projeto' => $idProject,
      'nome' => $nameUser,
      'email_contato' => $emailUser,
      'telefone' => $phoneUser,
      'mensagem' => $messageUser
    ];

    // URL encode automático
    $post = http_build_query($postData);

    // Inicialização do cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://painel.buscacliente.com.br/criador/cotacao");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // Execução da requisição
    $result = curl_exec($ch);
    if ($result === false) {
      throw new Exception(curl_error($ch));
    }
    curl_close($ch);

    // Retorna a resposta do servidor
    return $result;
  } catch (Exception $e) {
    error_log("Erro ao enviar cotação: " . $e->getMessage());
    return false;
  }
}

function carrinhoEnvia($nameUser, $phoneUser, $emailUser, $messageUser, $carrinho = null, $urlProject, $urlPage, $titlePage, $idProject, $emailProject)
{
  if (enviar($nameUser, $phoneUser, $emailUser, $messageUser, $carrinho, $urlProject, $urlPage, $titlePage, $idProject, $emailProject)) {
    unset($_SESSION['CARRINHO']);
    return true;
  }

  return false;
}

function contatoEnvia($nameUser, $phoneUser, $emailUser, $messageUser, $produtos = null, $urlProject, $urlPage, $titlePage, $idProject, $emailProject)
{

  return enviar($nameUser, $phoneUser, $emailUser, $messageUser, $produtos, $urlProject, $urlPage, $titlePage, $idProject, $emailProject);
}

if (isset($_POST['formulario']) && $_POST['formulario'] === "whatsapp") {

  $nameUser = $_POST['nome'];
  $emailUser = $_POST['email'];
  $messageUser = $_POST['mensagem'];
  $phoneUser = $_POST['telefone'];

  $urlProject = $_POST['urlProject'];
  $urlPage = $_POST['urlPage'];
  $titlePage = $_POST['titlePage'];
  $idProject = $_POST['idProject'];
  $emailProject = $_POST['emailProject'];

  die(enviar($nameUser, $phoneUser, $emailUser, $messageUser, null, $urlProject, $urlPage, $titlePage, $idProject, $emailProject));
}
