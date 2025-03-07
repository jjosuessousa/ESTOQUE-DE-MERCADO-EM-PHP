<?php
$host = 'localhost'; // ou seu servidor
$dbname = 'sistema_produtos';
$username = 'root'; // seu usuário do MySQL
$password = ''; // sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
} catch (PDOException $e) {
   
}
