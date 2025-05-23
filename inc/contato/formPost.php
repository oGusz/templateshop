<?php
$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
define('POST', $post);

if (!function_exists('RecoverForm')) {
	function RecoverForm($contentType)
	{
		return isset(POST[$contentType]) ? POST[$contentType] : '';
	}
}

if (isset($post) && isset($post['EnviaContato'])) :
	// INCLUE O VERIFICADOR DE SPAMMERS DO FORMULÁRIO
	include_once('inc/contato/searchSpammer.php');
	// ARMAZENA O RECAPCHA
	$recapt = $post['g-recaptcha-response'];
	// REMOVE O SUBMIT E O RECPATCHA PARA VALIDAÇÃO DE CAMPOS VAZIOS
	unset($post['EnviaContato'], $post['g-recaptcha-response']);
	// ARQUIVOS VÁLIDOS QUE PODEM SER ENVIADOS
	$MimeTypes = array(
		'application/pdf',
		'application/msword',
		'application/vnd.ms-excel',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'application/x-excel',
		'application/x-msexcel',
		'image/png',
		'image/pjpeg',
		'image/jpeg',
		'image/jpg',
		'image/pjpeg',
		'image/gif'
	);
	// VERIFICA SE OS CAMPOS OBRIGATÓRIOS FORAM TODOS PREENCHIDOS
	if (in_array('', $post)) :
		echo '<script>'
			. '$(function () {';
		echo 'swal("Aviso!", "Campos com * são obrigatórios.", "info");';
		echo '});'
			. '</script>';
	// VERIFICA SE EXISTEM SPAMMERS NOS CAMPOS DO FORMULÁRIO
	elseif (SearchSpammer($post)) :
		// INCLUI O EMAILFAKE, QUE FARÁ A NOTIFICAÇÃO AOS ADMS DO SITE
		// include_once('inc/contato/emailFake.php');
		include_once('inc/contato/contatoEnvia.php');
	// VERIFICA SE EXISTE ANEXO PARA ENVIO E SE O ANEXO ESTÁ NA LISTA DO MIMETYPES
	elseif (isset($_FILES['anexo']) && !empty($_FILES['anexo']['tmp_name']) && !in_array($_FILES['anexo']['type'], $MimeTypes)) :
		echo '<script>'
			. '$(function () {';
		echo 'swal("Aviso!", "Escolha um arquivo válido para enviar como anexo da mensagem", "info");';
		echo '});'
			. '</script>';
	else :
		// CASO AS CONDIÇÕES SEJAM ATENDIDAS, O RECAPTCHA VOLTA PARA O POST E O ANEXO É ADICIONADO AO POST
		$post['g-recaptcha-response'] = $recapt;
		$post['anexo'] = ($_FILES['anexo']['tmp_name'] ? $_FILES['anexo'] : null);
		// ARQUIVO QUE FAZ A VERIFICAÇÃO DO RECAPTCHA E O ENVIO DOS E-MAILS
		include_once('inc/contato/contatoEnvia.php');
	endif;
elseif (isset($post) && isset($post['enviar_orc'])):
	$post['user_empresa'] = EMPRESA_CLIENTE;
	//Inclue o verificador de Spammers do formulário
	include_once('inc/contato/searchSpammer.php');
	//Armazena o reCapcha
	$recapt = $post['g-recaptcha-response'];
	//Remove o submit e o reCpatcha para validação de campos vazios
	unset($post['enviar_orc'], $post['g-recaptcha-response']);
	//Arquivos válidos que podem ser enviados
	$MimeTypes = array(
		'application/pdf',
		'application/msword',
		'application/vnd.ms-excel',
		'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
		'application/x-excel',
		'application/x-msexcel',
		'image/png',
		'image/pjpeg',
		'image/jpeg',
		'image/jpg',
		'image/pjpeg',
		'image/gif'
	);
	//Verifica se os campos obrigatórios foram todos preenchidos
	if (in_array('', $post)):
		echo '<script>'
			. '$(function () {';
		echo 'swal("Aviso!", "Campos com * são obrigatórios.", "info");';
		echo '});'
			. '</script>';
	//Verifica se existem spammers nos campos do formulário
	elseif (SearchSpammer($post)):
		//Inclui o emailFake, que fará a notificação aos adms do site
		// include_once('inc/contato/emailFake.php');
		include_once('inc/contato/carrinhoEnvia.php');
	// Verifica se existe anexo para envio e se o anexo está na lista do MimeTypes
	elseif (isset($_FILES['anexo']) && !empty($_FILES['anexo']['tmp_name']) && !in_array($_FILES['anexo']['type'], $MimeTypes)):
		echo '<script>'
			. '$(function () {';
		echo 'swal("Aviso!", "Escolha um arquivo válido para enviar como anexo da mensagem", "info");';
		echo '});'
			. '</script>';
	else:
		$Contact = new Orcamento($post);
		$error = $Contact->getError();
		if (!$Contact->getResult()):
			WSErro($error[0], $error[1]);
		else:
			//Caso as condições sejam atendidas, o reCaptcha volta para o post e o anexo é adicionado ao post
			$post['g-recaptcha-response'] = $recapt;
			include_once('inc/contato/carrinhoEnvia.php');
		endif;
	endif;
endif;
