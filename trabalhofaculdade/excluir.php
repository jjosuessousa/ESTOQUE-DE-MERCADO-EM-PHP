<?php
require_once 'conexao.php';
require_once 'Produto.php';
//conexao.php: Estabelece a conexão com o banco de dados.
//Produto.php: Contém a classe Produto, que tem os métodos para manipular produtos.



// Passa a conexão PDO para que a classe possa executar comandos no banco.
$produto = new Produto($pdo);

// Verifica se o ID do produto foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID não informado.');
}   //Se não houver ID na URL, o script exibe uma mensagem e para a execução.

$id = $_GET['id'];

// Chama o método excluir() da classe Produto para deletar o produto do banco de dados
if ($produto->excluir($id)) {
    // Se a exclusão for bem-sucedida, redireciona para index.php com uma mensagem de sucesso
    header("Location: index.php?mensagem=" . urlencode("Produto excluído com sucesso!"));
    exit; // Encerra o script para evitar execução de código desnecessário
} else {
    // Se ocorrer um erro, redireciona para index.php com uma mensagem de erro
    header("Location: index.php?mensagem=" . urlencode("Erro ao excluir produto."));
    exit;
}
?>
