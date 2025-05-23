<?php
require_once "app/models/Template.php";

class TemplateController
{

    public function listar($categoria)
    {
        $templates = Template::listarPorCategoria($categoria);
        include "app/views/templates/listar.php";
    }

    public function visualizar($id)
    {
        $template = Template::buscarPorId($id);
        include "app/views/templates/visualizar.php";
    }

    public function adicionarForm()
    {
        $categorias = Categoria::listarTodas();
        include "app/views/templates/adicionar.php";
    }


    public function adicionar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $categoria = $_POST['categoria'];
            $descricao = $_POST['descricao'];
            $codigo_css = $_POST['codigo_css'];
            $codigo_js = $_POST['codigo_js'];
            $codigo_php = $_POST['codigo_php'];

            $caminhoImagem = null;

            // Pasta onde as imagens serão salvas
            $pastaDestino = "image-template/";

            if (!is_dir($pastaDestino)) {
                mkdir($pastaDestino, 0755, true);
            }

            // Tratamento da imagem
            if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === 0) {
                $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
                $nomeImagem = uniqid() . '.' . $extensao;
                $caminhoImagem = $pastaDestino . $nomeImagem;

                move_uploaded_file($_FILES['imagem']['tmp_name'], $caminhoImagem);
            }

            // Enviar tudo para o Model
            $resultado = Template::adicionar($nome, $categoria, $descricao, $codigo_css, $codigo_js, $codigo_php, $caminhoImagem);

            include "app/views/templates/feedback.php";
        }
    }


    public function adicionarFormCategoria()
    {
        include "app/views/templates/adicionar-categoria.php";
    }
    public function adicionarCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];

            $resultado = Template::criarCategoria($nome);

            include "app/views/templates/feedback.php";
        }
    }
}
