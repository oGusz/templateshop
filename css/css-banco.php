<?php
header("Content-Type: text/css"); // Define o tipo de conteúdo como CSS

// Exibe o CSS salvo no banco, se existir
if (!empty($template['codigo_css'])) {
    echo $template['codigo_css'];
} else {
    echo "/* CSS não encontrado */";
}
?>