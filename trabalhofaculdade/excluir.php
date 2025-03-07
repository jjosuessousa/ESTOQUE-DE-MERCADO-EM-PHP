<?php
require_once 'conexao.php';
require_once 'Produto.php';

$produto = new Produto($pdo);

// Verifica se o id foi passado pela URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Excluir o produto
    if ($produto->excluir($id)) {
        echo "Produto excluído com sucesso!";
        header('Location: index.php'); // Redireciona para a lista de produtos
        exit;
    } else {
        echo "Erro ao excluir produto.";
    }
} else {
    die('ID não informado.');
}
?>
