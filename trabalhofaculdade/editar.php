<?php
// Ativar exibição de erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';

// Verifica se um ID foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("ID do produto não informado.");
}

$id = $_GET['id'];

// Busca o produto no banco de dados
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

// Se o produto não for encontrado
if (!$produto) {
    die("Produto não encontrado.");
}

// Atualizar produto se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $stmt = $pdo->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, estoque = ? WHERE id = ?");
    $stmt->execute([$nome, $descricao, $preco, $estoque, $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Editar Produto</h2>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($produto['nome']) ?>" required>

        <label>Descrição:</label>
        <textarea name="descricao" class="form-control" required><?= htmlspecialchars($produto['descricao']) ?></textarea>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" class="form-control" value="<?= $produto['preco'] ?>" required>

        <label>Estoque:</label>
        <input type="number" name="estoque" class="form-control" value="<?= $produto['estoque'] ?>" required>

        <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        <a href="index.php" class="btn btn-secondary mt-3">Cancelar</a>
    </form>

</body>
</html>
