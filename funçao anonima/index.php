funcao anonima em php
O ChatGPT disse:
Uma função anônima em PHP é uma função que não possui um nome e é geralmente usada como argumento para outras funções ou atribuída a variáveis. Elas são úteis para operações rápidas sem a necessidade de definir uma função nomeada.

Sintaxe básica:

$minhaFuncao = function($nome) {
    return "Olá, $nome!";
};

echo $minhaFuncao("Josué"); // Saída: Olá, Josué!


Uso em callbacks:
As funções anônimas são muito utilizadas em funções como array_map, array_filter, etc.


$numeros = [1, 2, 3, 4, 5];

$quadrados = array_map(function($num) {
    return $num * $num;
}, $numeros);

print_r($quadrados); // Saída: [1, 4, 9, 16, 25]
Fechamento (Closure) com use
Se precisar usar variáveis externas dentro da função anônima, utilize use.


$prefixo = "Olá, ";

$saudacao = function($nome) use ($prefixo) {
    return $prefixo . $nome;
};

echo $saudacao("Josué"); // Saída: Olá, Josué