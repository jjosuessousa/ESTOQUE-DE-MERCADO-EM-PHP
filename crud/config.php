<?php
$host = 'localhost';
$dbname = 'crud_produtos';
$username = 'root'; // Altere conforme seu banco
$password = ''; // Deixe vazio se não tiver senha no MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
