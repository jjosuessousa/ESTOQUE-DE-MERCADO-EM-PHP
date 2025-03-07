<?php
class Produto {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Criar produto
    public function criar($nome, $descricao, $preco, $estoque) {
        try {
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
    }

    // Listar todos os produtos
    public function listar() {
        try {
            $sql = "SELECT * FROM produtos";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Erro ao buscar produtos: " . $e->getMessage();
        }
    }

    // Editar produto
    public function editar($id, $nome, $descricao, $preco, $estoque) {
        try {
            $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, 
                    preco = :preco, estoque = :estoque WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':estoque', $estoque);

            if ($stmt->execute()) {
                return "Produto atualizado com sucesso!";
            } else {
                return "Erro ao atualizar o produto.";
            }
        } catch (PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }

    // Excluir produto
    public function excluir($id) {
        try {
            $sql = "DELETE FROM produtos WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id);

            if ($stmt->execute()) {
                return "Produto excluído com sucesso!";
            } else {
                return "Erro ao excluir o produto.";
            }
        } catch (PDOException $e) {
            return "Erro: " . $e->getMessage();
        }
    }
}
?>
