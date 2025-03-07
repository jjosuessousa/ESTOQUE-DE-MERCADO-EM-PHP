<?php

$pdo = new PDO("mysql:dbname=test;host=localhost" , "root" , "");//CONEXAO COM BANCO DE DADOS

$sql = $pdo->query('select * from usuarios2');

echo "total:".$sql->rowcount();

$dados= $sql->fetchall(PDO::FETCH_ASSOC);
 echo  '<pre>';
 print_r ($dados);




?>



// Cria uma conexão com o banco de dados utilizando PDO
// "mysql:dbname=test;host=localhost" -> Define o banco de dados (test) e o host (localhost)
// "root" -> Nome de usuário do banco de dados
// "" -> Senha (vazia, nesse caso)

$pdo = new PDO("mysql:dbname=test;host=localhost", "root", "");

// Executa uma consulta SQL para selecionar todos os registros da tabela "usuarios2"
// O método query retorna um objeto PDOStatement contendo o resultado da consulta

$sql = $pdo->query('select * from usuarios2');

// Exibe o número total de registros retornados pela consulta
// rowCount() conta quantas linhas foram retornadas na consulta SQL

echo "total:" . $sql->rowCount();

// Obtém todos os dados da consulta e os armazena em um array associativo
// PDO::FETCH_ASSOC faz com que os dados sejam retornados como um array associativo (chaves são os nomes das colunas)
$dados = $sql->fetchAll(PDO::FETCH_ASSOC);

// Exibe os dados formatados para melhor visualização
echo '<pre>'; // A tag <pre> do HTML mantém a formatação do array para facilitar a leitura
print_r($dados); // print_r imprime os dados do array de forma legível


