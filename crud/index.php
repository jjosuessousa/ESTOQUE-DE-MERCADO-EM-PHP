<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

    <h2 class="text-center">Gerenciamento de Produtos</h2>

    <a href="cadastrar.php" class="btn btn-success mb-3">Cadastrar Produto</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

        <?php
        $stmt = $pdo->query("SELECT * FROM produtos ORDER BY id DESC");
        while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                    <td>{$produto['id']}</td>
                    <td>{$produto['nome']}</td>
                    <td>{$produto['descricao']}</td>
                    <td>R$ {$produto['preco']}</td>
                    <td>{$produto['estoque']}</td>
                    <td>
                        <a href='editar.php?id={$produto['id']}' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='excluir.php?id={$produto['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>
                    </td>
                </tr>";
        }
        ?>
    </table>
</body>
</html>
