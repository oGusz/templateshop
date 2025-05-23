<?php
require_once "config/database.php";

class Categoria {
    public static function listarTodas() {
        $pdo = Database::conectar();
        $stmt = $pdo->query("SELECT nome FROM categorias ORDER BY nome ASC");
        $categorias = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
        // Retorna as categorias com acento (para exibição) e a versão formatada (para URL)
        return array_map(function ($categoria) {
            return [
                'nome' => $categoria, // Nome para exibição
                'url' => self::formatarParaURL($categoria) // Nome formatado para URL
            ];
        }, $categorias);
    }
    

    public static function formatarParaURL($texto) {
        // Remove acentos mas preserva caracteres especiais
        $texto = preg_replace(
            '/[áàãâä]/u', 'a', $texto); // Replace accented 'a'
        $texto = preg_replace(
            '/[éèêë]/u', 'e', $texto); // Replace accented 'e'
        $texto = preg_replace(
            '/[íìîï]/u', 'i', $texto); // Replace accented 'i'
        $texto = preg_replace(
            '/[óòõôö]/u', 'o', $texto); // Replace accented 'o'
        $texto = preg_replace(
            '/[úùûü]/u', 'u', $texto); // Replace accented 'u'
        $texto = preg_replace(
            '/[ç]/u', 'c', $texto); // Replace 'ç'
        $texto = preg_replace(
            '/[ñ]/u', 'n', $texto); // Replace 'ñ'
        $texto = preg_replace('/[^a-z0-9]+/i', '-', $texto); // Remove non-alphanumeric characters
        $texto = strtolower($texto); // Convert to lowercase
        
        return trim($texto, '-'); // Remove any leading/trailing dashes
    }
    
}

?>
