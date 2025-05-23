<?php
require_once "config/database.php";

class Template
{
    public static function listarPorCategoria($categoria)
    {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM templates WHERE categoria = ?");
        $stmt->execute([$categoria]);
        return $stmt->fetchAll();
    }

    public static function buscarPorId($id)
    {
        $pdo = Database::conectar();
        $stmt = $pdo->prepare("SELECT * FROM templates WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }



    public static function adicionar($nome, $categoria, $descricao, $codigo_css, $codigo_js, $codigo_php, $imagem)
    {
        $pdo = Database::conectar();
        $sql = "INSERT INTO templates (nome, categoria, descricao, codigo_css, codigo_js, codigo_php, imagem)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$nome, $categoria, $descricao, $codigo_css, $codigo_js, $codigo_php, $imagem]);
    }


    public static function criarCategoria($nome)
    {
        $pdo = Database::conectar();

        $stmt = $pdo->prepare("SELECT * FROM `categorias` WHERE `nome` = :nome");
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();

        if ($stmt->rowCount() === 0) {
            $insert = $pdo->prepare("INSERT INTO `categorias` (`nome`) VALUES (:nome)");
            $insert->bindParam(':nome', $nome);
            $insert->execute();

            return "Categoria '$nome' criada com sucesso.";
        } else {
            return "A categoria '$nome' já existe.";
        }
    }
}
