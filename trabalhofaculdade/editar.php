<?php
require_once 'conexao.php';
require_once 'Produto.php';

$produto = new Produto($pdo);

// Verifica se o ID foi passado pela URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID não informado.');
}

$id = $_GET['id'];

// Buscar as informações do produto
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$produtoInfo = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o produto foi encontrado
if (!$produtoInfo) {
    die('Produto não encontrado.');
}

// Processar a atualização do produto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $mensagem = $produto->editar($id, $nome, $descricao, $preco, $estoque);

    // Redireciona de volta para a lista com mensagem de sucesso ou erro
    header("Location: index.php?mensagem=" . urlencode($mensagem));
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Editar Produto</h2>

    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= htmlspecialchars($produtoInfo['nome']) ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" required><?= htmlspecialchars($produtoInfo['descricao']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" id="preco" value="<?= htmlspecialchars($produtoInfo['preco']) ?>" required>
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <input type="number" class="form-control" name="estoque" id="estoque" value="<?= htmlspecialchars($produtoInfo['estoque']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

    <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
</div>

</body>
</html>
