<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Inclui a classe Produto para manipulação dos produtos
require_once 'Produto.php';

// Cria um objeto da classe Produto, passando a conexão PDO para que os métodos da classe possam acessar o banco.
$produto = new Produto($pdo);


// Verifica se o ID do produto foi passado na URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die('ID não informado.');
}
$id = $_GET['id'];
//Verifica se o ID foi passado na URL (GET).
//Se não houver ID, o script exibe uma mensagem de erro e interrompe a execução.



// Prepara a consulta para buscar as informações do produto no banco de dados
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$produtoInfo = $stmt->fetch(PDO::FETCH_ASSOC);
//Prepara uma consulta SQL para buscar o produto pelo ID.
//Usa bindParam() para evitar SQL Injection.
//Executa a consulta e armazena o resultado em $produtoInfo.




// Verifica se o produto foi encontrado no banco de dados
if (!$produtoInfo) {
    die('Produto não encontrado.');
}//Se $produtoInfo estiver vazio, significa que o produto não foi encontrado no banco.
//O script exibe uma mensagem e interrompe a execução.



// Verifica se o formulário foi submetido via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $estoque = $_POST['estoque'];
    $mensagem = $produto->editar($id, $nome, $descricao, $preco, $estoque);
    header("Location: index.php?mensagem=" . urlencode($mensagem));
    exit;
}//Verifica se o formulário foi enviado (POST).
//Obtém os dados do formulário (nome, descricao, preco, estoque).
//Chama o método editar() da classe Produto para atualizar os dados no banco.
//Redireciona para index.php com uma mensagem de sucesso ou erro.





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <!-- Inclui o Bootstrap para estilização -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h2>Editar Produto</h2>

    <!-- Formulário para edição do produto -->
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome do Produto</label>
            <!-- Campo de entrada preenchido com o nome do produto atual -->
            <input type="text" class="form-control" name="nome" id="nome" value="<?= htmlspecialchars($produtoInfo['nome']) ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <!-- Área de texto preenchida com a descrição do produto -->
            <textarea class="form-control" name="descricao" id="descricao" required><?= htmlspecialchars($produtoInfo['descricao']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <!-- Campo de entrada para o preço, com suporte a números decimais -->
            <input type="number" step="0.01" class="form-control" name="preco" id="preco" value="<?= htmlspecialchars($produtoInfo['preco']) ?>" required>
        </div>
        <div class="form-group">
            <label for="estoque">Estoque</label>
            <!-- Campo de entrada para o estoque do produto -->
            <input type="number" class="form-control" name="estoque" id="estoque" value="<?= htmlspecialchars($produtoInfo['estoque']) ?>" required>
        </div>
        <!-- Botão para enviar o formulário e atualizar o produto -->
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

    <!-- Link para voltar à página inicial -->
    <a href="index.php" class="btn btn-secondary mt-4">Voltar</a>
</div>

</body>
</html>

