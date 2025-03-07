<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    $stmt = $pdo->prepare("INSERT INTO produtos (nome, descricao, preco, estoque) VALUES (?, ?, ?, ?)");
    $stmt->execute([$nome, $descricao, $preco, $estoque]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2>Cadastrar Produto</h2>
    <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" class="form-control" required>

        <label>Descrição:</label>
        <textarea name="descricao" class="form-control" required></textarea>

        <label>Preço:</label>
        <input type="number" step="0.01" name="preco" class="form-control" required>

        <label>Estoque:</label>
        <input type="number" name="estoque" class="form-control" required>

        <button type="submit" class="btn btn-success mt-3">Cadastrar</button>
        <a href="index.php" class="btn btn-secondary mt-3">Voltar</a>
    </form>
</body>
</html>
