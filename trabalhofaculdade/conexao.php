<?php
// Configuração do banco de dados
$host = 'localhost'; // O host do banco de dados. Geralmente 'localhost' se o banco está na mesma máquina.
$dbname = 'sistema_produtos'; // Nome do banco de dados a ser acessado.
$username = 'root'; // Usuário para acessar o banco de dados (geralmente 'root' em ambientes locais).
$password = ''; // Senha do banco de dados. Vazia em configurações locais padrão.

// Tenta se conectar ao banco de dados utilizando PDO (PHP Data Objects)

    // Cria uma instância PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Define o modo de erro do PDO para exceções, facilitando o tratamento de erros.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   

  

