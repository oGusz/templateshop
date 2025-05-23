<?php
// Verifico se foi feita a postagem do Captcha
if ((isset($post['g-recaptcha-response']) && !empty($post['g-recaptcha-response'])) || $envioTeste):
  //Variaveis globais do site
  include_once('inc/geral.php');
  /* Valido se a ação do usuário foi correta junto ao google passando o SITE KEY e a resposta do Captcha */
  $answer = json_decode(file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $post['g-recaptcha-response']));
  // Se a ação do usuário foi correta executo o restante do meu formulário
  if (($answer->success) || $envioTeste):
    $data = date("d/m/Y H:i:s");
    $produtos = null;
    foreach ($_SESSION['CARRINHO'] as $IDPRO => $PRODUCT):
      $produtos .= "
    <tr>
    <td colspan='2' style='font-family:Arial, sans-serif;font-size:16px;padding:20px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#eee;text-align: center;'>
    <strong>ITEM ADICIONADO</strong>
    </td>
    </tr>";
      if ($PRODUCT['prod_codigo'] && $PRODUCT['prod_codigo'] != ' '):
        $produtos .= "
      <tr>
      <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#f9f9f9;'><strong>CÓDIGO:</strong></td>
      <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;color:#333;background-color:#f9f9f9;'>{$PRODUCT['prod_codigo']}</td>
      </tr>";
      endif;
      $produtos .= "
    <tr>
    <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#f9f9f9;'><strong>PRODUTO:</strong></td>
    <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;color:#333;background-color:#f9f9f9;'>{$PRODUCT['prod_title']}</td>
    </tr>";
      foreach ($PRODUCT['modelos'] as $itens => $quantidade):
        if ($itens):
          $produtos .= "
        <tr>
        <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#f9f9f9;'><strong>MODELOS:</strong></td>
        <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;color:#333;background-color:#f9f9f9;'>{$itens}</td>
        </tr>";
        endif;
      endforeach;
      foreach ($PRODUCT['modelos'] as $itens => $quantidade):
        $produtos .= "
      <tr>
      <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#f9f9f9;'><strong>QUANTIDADE:</strong></td>
      <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;color:#333;background-color:#f9f9f9;'>{$quantidade}</td>
      </tr>";
      endforeach;
    endforeach;

    // Atenticador do e-mail com SSL
    include_once('inc/contato/mailSend.php');

    // Armazena se houver um arquivo na variavel
    $file = ($post['anexo']['tmp_name'] ? $post['anexo'] : null);

    // Depois de setar os arquivos, remove do scopo de verificação e libera a memoria
    unset($post['g-recaptcha-response'], $post['anexo']);

    // INFORMAÇÕES QUE SERÃO GRAVADAS NO PAINEL DE LEAD
    $nameUser = $post['orc_nome'];
    $emailUser = $post['orc_email'];
    $messageUser = $post['orc_mensagem'];
    $phoneUser = $post['orc_celular'];

    $urlProject = $post['urlProject'];
    $urlPage = $post['urlPage'];
    $titlePage = $post['titlePage'];
    $idProject = $post['idProject'];
    $emailProject = $post['emailProject'];

    // REMOVE INFORMAÇÃO SOBRE USER_EMPRESA DA TEBELA
    unset($post['user_empresa']);

    // MENSAGEM
    $corpo = null;
    $corpo .= "
  <table style='border-collapse:collapse;border-spacing:0;border-color:#761919'>
  <tr>
  <th style='font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;vertical-align:top;text-align: center;' colspan='2'>
  <a href='{$url}' title='{$nomeSite}'><img src='{$url}/imagens/logo.png' width='300' title='{$nomeSite}' alt='{$nomeSite}'></a>
  </th>
  </tr>
  <tr>
  <th colspan='2' style='font-family:Arial, sans-serif;font-size:16px;padding:20px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#eee;text-align: center;'>
  <strong>Pedido de orçamento recebido de {$recebenome}, via carrinho do site.</strong>
  </th>
  </tr>
  <tr>";
    foreach ($post as $key => $value):
      $corpo .= "
    <tr>
    <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;background-color:#f9f9f9;'>
    <strong>" . strtoupper(str_replace(array('orc_', '_'), '', $key)) . ": </strong>
    </td>
    <td style='font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;border-color:#ccc;overflow:hidden;word-break:normal;color:#333;background-color:#f9f9f9;'>
    {$value}
    </td>
    </tr>";
    endforeach;
    $corpo .= "</tr>
  {$produtos}
  <tr>
  <td style='text-align:center;font-family:Arial, sans-serif;font-size:9px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;text-align:center;vertical-align:top' colspan='2'>
  Mensagem automática enviada por - {$nomeSite} em " . date('d/m/Y H:i:s') . "
  </td>
  </tr>
  <tr>
  <td style='text-align:center;font-family:Arial, sans-serif;font-size:9px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;text-align:center;vertical-align:top' colspan='2'>
  <a href='{$url}' title='{$nomeSite}'>{$url}</a>
  </td>
  </tr>
  </table>";
    // ENVIO EMPRESA
    $mail->From = $EMAIL;   // Remetente
    $mail->FromName = $post['orc_nome'];  // Remetente nome
    $mail->Sender = $EMAIL;   // Seu e-mail
    $mail->AddAddress($envioTeste ? $emailTeste : $emailContato, $EMPRESA);   // Destinatário principal
    //Se houver anexo
    if (isset($file) && !empty($file)):
      $mail->AddAttachment($file['tmp_name'], $file['name']);   // Anexo
    endif;
    //$mail->AddCC('adm@site.com.br', 'Teste');   // Copia
    //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva');  // Cópia Oculta
    $mail->AddReplyTo($post['orc_email'], $post['orc_nome']);   // Reply-to
    $mail->Subject = 'Pedido de orçamento recebido de ' . $recebenome;  // Assunto da mensagem
    $mail->Body = $corpo;   // corpo da mensagem
    $mail->Send();  // Enviando o e-mail
    $mail->ClearAllRecipients();  // Limpando os destinatários
    $mail->ClearAttachments();  // Limpando anexos
    // ENVIO USUÁRIO
    $mail->From = $recebemail;  // Remetente
    $mail->FromName = $EMPRESA;   // Remetente nome
    $mail->Sender = $EMAIL;   // Seu e-mail
    $mail->AddAddress($post['orc_email'], $post['orc_nome']);   // Destinatário principal
    //Se houver anexo
    if (isset($file) && !empty($file)):
      $mail->AddAttachment($file['tmp_name'], $file['name']);   // Anexo
    endif;
    $mail->Subject = $EMPRESA . ': Recebemos seu pedido de orçamento';   // Assunto da mensagem
    $mail->Body = $corpo;   // corpo da mensagem
    $mail->Send();  // Enviando o e-mail
    $mail->ClearAllRecipients();  // Limpando os destinatários
    $mail->ClearAttachments();  // Limpando anexos

    require('inc/contato/emailBusca.php');

    // Inicializar a string para armazenar as informações
    $itensCarrinho = "";

    // Iterar sobre o array
    foreach ($_SESSION['CARRINHO'] as $produto) {
      $codigo = trim($produto['prod_codigo']) ?: "N/A"; // Código do produto (usa 'N/A' se vazio)
      $titulo = $produto['prod_title']; // Título do produto
      $preco = number_format((float)$produto['prod_preco'], 2, ',', '.'); // Preço formatado
      $modelos = "";

      // Iterar sobre os modelos (caso existam)
      foreach ($produto['modelos'] as $modelo => $quantidade) {
        $modelos .= "Modelo: $modelo | Quantidade: $quantidade\n";
      }

      // Concatenar os dados do produto e seus modelos na string final
      $itensCarrinho .= "Código: $codigo | Produto: $titulo | Preço: R$ $preco\n";
      $itensCarrinho .= $modelos . "\n"; // Adicionar os modelos
    }

    if (carrinhoEnvia($nameUser, $phoneUser, $emailUser, $messageUser, $itensCarrinho, $urlProject, $urlPage, $titlePage, $idProject, $emailProject)): ?>
      <script>
        $(function() {
          swal({
            title: "Tudo certo!",
            text: "Obrigado por entrar em contato, sua mensagem foi enviada com sucesso",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: "btn-success",
            confirmButtonText: "Ok",
            closeOnConfirm: true
          }, function() {
            location.href = "<?= $url ?>";
          });
        });
      </script>
    <?php else: ?>
      <script>
        $(function() {
          swal("Opsss!", "Desculpe, mas houve um erro ao enviar a mensagem, por favor tente novamente.", "error");
        });
      </script>
    <?php endif; ?>
    <!-- // END INSERE LEADS -->
  <?php else: ?>
    <script>
      $(function() {
        swal("Opsss!", "Desculpe, mas não foi possível verificar o reCaptcha, tente novamente.", "error");
      });
    </script>
  <?php endif; ?>
  <!-- // END SE A AÇÃO DO USUÁRIO FOI CORRETA EXECUTO O RESTANTE DO MEU FORMULÁRIO -->
<?php else: ?>
  <script>
    $(function() {
      swal("Opsss!", "Confirme que não é um robô e marque o reCaptcha.", "error");
    });
  </script>
<?php endif; ?>
<!-- // END VERIFICO SE FOI FEITA A POSTAGEM DO CAPTCHA -->