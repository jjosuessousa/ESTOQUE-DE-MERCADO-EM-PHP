<?php
require_once 'conexao.php';
require_once 'Produto.php';
//O conexao.php contém a configuração do banco de dados via PDO.
//O Produto.php contém a classe Produto, que possui os métodos para criar, listar, editar e excluir produtos.



$produto = new Produto($pdo);
//Instancia a classe Produto, passando a conexão PDO para que os métodos da classe possam acessar o banco.




$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : '';
//Verifica se há uma mensagem passada pela URL (via GET) e a armazena na variável $mensagem.
//Isso permite exibir mensagens de sucesso ou erro na tela.



// Processar o formulário de criação
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && $_POST['acao'] === 'cadastrar') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];

    // Verifica se a criação do produto foi bem-sucedida
    if ($produto->criar($nome, $descricao, $preco, $estoque)) {
        header("Location: index.php?mensagem=" . urlencode("Produto cadastrado com sucesso!"));
        exit;
    } else {
        header("Location: index.php?mensagem=" . urlencode("Erro ao cadastrar produto."));
        exit;
    }
}           //Verifica se o formulário foi submetido via POST.
            //Recebe os dados do formulário (nome, descricao, preco, estoque).
            //Chama o método criar() da classe Produto para inserir o novo produto no banco.
            //Redireciona para index.php com uma mensagem de sucesso ou erro.



// //Chama o método listar() da classe Produto,
// que retorna um array de produtos cadastrados no banco.
$produtos = $produto->listar();
?>  







<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Produtos</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <h2>Cadastro de Produtos</h2>

    <!-- Exibir mensagem de sucesso ou erro -->
    <?php if (!empty($mensagem)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>

    <!-- Formulário de Cadastro -->
    <form method="POST">
        <input type="hidden" name="acao" value="cadastrar">
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <input type="text" class="form-control" name="nome" id="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" name="descricao" id="descricao" required></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" step="0.01" class="form-control" name="preco" id="preco" required>
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <input type="number" class="form-control" name="estoque" id="estoque" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>

    <h3 class="mt-4">Lista de Produtos</h3>

    <!-- Tabela de Produtos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produtos as $produto): ?>
                <tr>
                    <td><?= $produto['id'] ?></td>
                    <td><?= $produto['nome'] ?></td>
                    <td><?= $produto['descricao'] ?></td>
                    <td><?= number_format($produto['preco'], 2, ',', '.') ?></td>
                    <td><?= $produto['estoque'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $produto['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id=<?= $produto['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
