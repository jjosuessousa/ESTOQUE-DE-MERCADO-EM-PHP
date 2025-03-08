<?php
class Produto {
    private $pdo;
    //Armazena a instância do PDO que será usada para executar consultas no banco de dados.

    
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }      //Recebe a conexão PDO como parâmetro e armazena na variável $pdo para ser usada nos métodos da classe.
            //Permite reutilização da conexão sem precisar instanciar novas conexões repetidamente.




    // Método para cadastrar um novo produto no banco
    public function criar($nome, $descricao, $preco, $estoque) {
        try {
            // SQL de inserção do produto
            $sql = "INSERT INTO produtos (nome, descricao, preco, estoque) 
                    VALUES (:nome, :descricao, :preco, :estoque)";
    
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':estoque', $estoque);

            if ($stmt->execute()) {
                return "Produto cadastrado com sucesso!";
            } else {
                return "Erro ao cadastrar o produto.";
            }
        } catch (PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }              // Cria um comando SQL INSERT INTO com placeholders (:nome, :descricao, etc.).
                     //Usa prepare() para preparar a query (evita SQL Injection).
                      //Usa bindParam() para associar valores às variáveis.
                      //Executa a query com execute().
                     //Retorna uma mensagem informando o resultado da operação.




    // Método para listar todos os produtos
    public function listar() {
        try {
            $sql = "SELECT * FROM produtos";
            // Executa a consulta e retorna todos os resultados
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Retorna os produtos como um array associativo
        } catch (PDOException $e) {
            // Em caso de erro, retorna a mensagem de erro
            return "Erro ao buscar produtos: " . $e->getMessage();
        }
    }

    // Método para editar um produto existente
    public function editar($id, $nome, $descricao, $preco, $estoque) {
        try {
            // SQL de atualização de um produto
            $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, 
                    preco = :preco, estoque = :estoque WHERE id = :id";
            // Prepara a consulta de atualização
            $stmt = $this->pdo->prepare($sql);
            // Vincula os parâmetros à consulta
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':estoque', $estoque);

            // Executa a consulta e verifica se deu sucesso
            if ($stmt->execute()) {
                return "Produto atualizado com sucesso!";
            } else {
                return "Erro ao atualizar o produto.";
            }
        } catch (PDOException $e) {
            // Caso ocorra erro, retorna a mensagem de erro
            return "Erro: " . $e->getMessage();
        }
    }

    // Método para excluir um produto
    public function excluir($id) {
        try {
            // SQL de exclusão de um produto
            $sql = "DELETE FROM produtos WHERE id = :id";
            // Prepara a consulta de exclusão
            $stmt = $this->pdo->prepare($sql);
            // Vincula o parâmetro à consulta
            $stmt->bindParam(':id', $id);

            // Executa a consulta e verifica se deu sucesso
            if ($stmt->execute()) {
                return "Produto excluído com sucesso!";
            } else {
                return "Erro ao excluir o produto.";
            }
        } catch (PDOException $e) {
            // Caso ocorra erro, retorna a mensagem de erro
            return "Erro: " . $e->getMessage();
        }
    }
}
?>
