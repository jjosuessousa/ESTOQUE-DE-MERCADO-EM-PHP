<?php
require_once 'conexao.php';
require_once 'Produto.php';

$produto = new Produto($pdo);

// Verifica se o ID foi passado pela URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID não informado.');
}

$id = $_GET['id'];

// Excluir o produto
if ($produto->excluir($id)) {
    // Redireciona para index.php com mensagem de sucesso
    header("Location: index.php?mensagem=" . urlencode("Produto excluído com sucesso!"));
    exit;
} else {
    header("Location: index.php?mensagem=" . urlencode("Erro ao excluir produto."));
    exit;
}
?>
