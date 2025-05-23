<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once "app/controllers/TemplateController.php";
require_once "app/models/Template.php";

require_once "app/models/Categoria.php"; // Importa o modelo de categorias
include "app/views/layouts/header.php";

$controller = new TemplateController();

// Captura a URL amigável
$url = isset($_GET['url']) ? $_GET['url'] : null;

// Divide a URL em partes
$urlParts = explode('/', $url);

if ($urlParts[0] == 'file-template') {

    $idComponente = $_GET['componente'];
    include './cache/template.php';
    return;
}

// Roteamento baseado na URL

if ($urlParts[0] == 'template' && isset($urlParts[1]) && isset($urlParts[2])) {
    // URL do tipo /template/categoria/id
    $categoria = $urlParts[1];
    $id = $urlParts[2];
    $controller->visualizar($id);
} elseif ($urlParts[0] == 'template' && isset($urlParts[1])) {
    // URL do tipo /template/categoria
    $categoria = $urlParts[1];
    $controller->listar($categoria);
} elseif ($urlParts[0] == 'add') {
    // URL do tipo /add
    $controller->adicionarForm();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_template'])) {
    // Processa o formulário de adição
    $controller->adicionar();
} elseif ($urlParts[0] == 'add-categoria') {
    // URL do tipo /add-categoria
    $controller->adicionarFormCategoria();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adicionar_categoria'])) {
    // Processa o formulário de adição
    $controller->adicionarCategoria();
} else {
    // Página inicial: lista todas as categorias
    $categorias = Categoria::listarTodas();

?>
    <div class="container p-5">
        <h1 class="fs-30 text-center mb-16">Bem-vindo ao TemplateBusca!</h1>

        <div class="wrapper">


            <!-- Lista de Categorias -->
            <div class="row list-category-home">
                <?php foreach ($categorias as $categoria): ?>
                    <div class="col-3 p-2">
                        <!-- Gera a URL com o nome formatado sem acento, mas exibe o nome com acento -->
                        <a class="btn btn-home-page" style="background-color: #1e88e5; color: white;"
                            href="/templateshop-mvc/template/<?= urlencode($categoria['url']) ?>">
                            <?= ucfirst($categoria['nome']) ?> <!-- Exibe o nome com o acento -->
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>


            <!-- Botões de Ação -->
            <div class="row  justify-content-center align-items-center gap-16">
                <div class="col s12 m6">
                    <a class="waves-effect waves-light btn btn-outline-success" href="/templateshop-mvc/add">Adicionar Novo Template</a>
                </div>
                <div class="col s12 m6">
                    <a href="/templateshop-mvc/add-categoria" class="waves-effect waves-light btn btn-success" id="btn-category">
                        Adicionar Categoria
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php
}

include "app/views/layouts/footer.php";
?>