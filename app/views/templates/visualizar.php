<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$titulo_pagina = "Visualização";




?>



<?php
// Verifica se $template é um array e não está vazio
if (!is_array($template) || empty($template)) {
    die("Erro: Template não encontrado ou inválido.");
}

// Função para validar o código PHP
function validatePhpCode($code)
{
    // Remove a tag de abertura do PHP, se presente
    $code = trim($code);
    if (strpos($code, '<?php') === 0) {
        $code = substr($code, 5);
    }

    // Verifica a sintaxe do código
    try {
        token_get_all("<?php " . $code);
        return true;
    } catch (Throwable $e) {
        return false;
    }
}

// Função para executar o código PHP e retornar o resultado
function executePhpCode($code)
{
    ob_start(); // Inicia o buffer de saída

    // Cria um nome de arquivo temporário único na pasta 'cache'
    $tempFile = 'cache/temp_exec_' . uniqid() . '.php';

    // Adiciona `<?php` no início se necessário
    // if (strpos(trim($code), '<?php') !== 0) {
    //     $code = "<?php\n" . $code;
    // }

    // Salva o código no arquivo temporário
    file_put_contents($tempFile, $code);

    // Includes necessários
    include_once 'public/direc-sitebase/inc/head-sitebase.php';
    include_once 'public/direc-sitebase/inc/functions.php';
    include_once 'public/direc-sitebase/inc/functions-footer.php';

    // Executa o código do arquivo temporário
    include $tempFile;

    // Remove o arquivo temporário
    unlink($tempFile);

    return ob_get_clean(); // Retorna a saída gerada


}


// Verifica se o código PHP está presente e é válido
$phpOutput = '';
if (!empty($template['codigo_php']) && validatePhpCode($template['codigo_php'])) {
    $phpOutput = executePhpCode($template['codigo_php'], $template['codigo_css']);
} else {
    $phpOutput = "Erro: O código PHP contém erros de sintaxe.";
}


?>


<div class="container my-1 px-5 container-visu-page">
    <a class="black" href="/templateshop-mvc/template/<?= $template["categoria"] ?>">
        Voltar
    </a>
    <h2 class="text-center"><?= htmlspecialchars($template['nome']) ?></h2>
    <p class="text-center text-muted"><?= htmlspecialchars($template['descricao']) ?></p>

    <!-- Área de Visualização -->
    <div id="previewArea" class="border p-3 mb-5">
        <h4>Visualização</h4>
        <div id="previewOutput" class="p-3 bg-light">
            <?php if (!empty($template['codigo_css'])): ?>
                <style>
                    <?= $template['codigo_css']; ?>
                </style>
            <?php endif; ?>
            <?= $phpOutput ?> <!-- Exibe o resultado do código PHP processado -->
        </div>
    </div>

    <!-- PHP -->
    <?php if (!empty($template['codigo_php'])): ?>
        <pre class="pre-code-style"><code id="codeBlockPhp" class="php"><?= htmlspecialchars($template['codigo_php']) ?></code></pre>
        <button id="copyButtonPhp" class="btn btn-primary mt-1 mb-5" data-clipboard-target="#codeBlockPhp">
            Copiar Código PHP
        </button>
    <?php endif; ?>



    <?php if (!empty($template['codigo_css'])): ?>
        <pre class="pre-code-style"><code id="codeBlockCss" class="css"><?= htmlspecialchars($template['codigo_css']) ?></code></pre>
        <button id="copyButtonCss" class="btn btn-primary mt-1 mb-5" data-clipboard-target="#codeBlockCss">
            Copiar Código CSS
        </button>
    <?php endif; ?>

    <?php if (!empty($template['codigo_js'])): ?>
        <pre class="pre-code-style"><code id="codeBlockJs" class="javascript"><?= htmlspecialchars($template['codigo_js']) ?></code></pre>
        <button id="copyButtonJs" class="btn btn-primary mt-1 mb-5" data-clipboard-target="#codeBlockJs">
            Copiar Código JS
        </button>
    <?php endif; ?>


</div>


<!-- Scripts -->


<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Toastr JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- Clipboard.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
<script>
    // Configuração do Toastr
    toastr.options = {
        closeButton: true, // Mostra um botão para fechar
        progressBar: true, // Mostra uma barra de progresso
        positionClass: "toast-top-right", // Posição da notificação
        timeOut: 5000, // Tempo de exibição (3 segundos)
    };

    // Inicializa o Clipboard.js para todos os botões de cópia
    new ClipboardJS('[data-clipboard-target]');

    // Exibir notificação Toastr quando o código for copiado
    document.querySelectorAll('[data-clipboard-target]').forEach(button => {
        button.addEventListener('click', function() {
            toastr.success('Código copiado para a área de transferência!');
        });
    });



    // Executa a função de pré-visualização ao carregar a página
    document.addEventListener('DOMContentLoaded', previewPhpCode);
</script>



</body>

</html>