<?php
// Primeira função (corrigida)
function menos($n1, $n2) {
    $total = $n1 - $n2;
    return $total;
}

// Chamada correta da função
$resultado = menos(5, 10);
echo "A soma é: $resultado <br>";

// Segunda função
function soma($a, $b) {
    return $a + $b;
}

// Chamada correta da segunda função
$resultado = soma(5, 3);
echo "A soma é: $resultado <br>";


/*1. Definindo Tipos de Parâmetros
Desde o PHP 7, você pode especificar tipos de dados nos parâmetros, como int, float, string, bool e array.

Exemplo: Função com Tipagem*/


function teste(int $a, int $b) {
    return $a + $b ;
}

echo teste(5, 10); // Saída: 15

/*🔹 Para forçar um erro em caso de tipo errado, ative declare(strict_types=1); no início do script.



2. Definindo Valor Padrão para Parâmetros
Se um parâmetro não for passado na chamada da função, ele assume um valor padrão.




Exemplo: Parâmetro Opcional com Valor Padrão*/

function saudacao(string $nome = "Visitante") {
    return "Olá, $nome! <br>";
}
echo saudacao();        // Saída: Olá, Visitante!
echo saudacao("Josué"); // Saída: Olá, Josué!

/*🔹 Se nenhum nome for passado, o padrão "Visitante" será usado.

3. Definindo Tipo do Valor de Retorno
Podemos também definir o tipo de retorno da função usando : tipo após os parênteses.



Exemplo: Função com Tipo de Retorno
<?php*/
function multiplicar(float $x, float $y): float {
    return $x * $y;
}

echo multiplicar(3.5, 2); // Saída: 7

/*🔹 O : float indica que a função sempre retornará um número decimal.
🔹 Se precisar de um retorno inteiro, use : int.



4. Combinação de Tipagem + Valor Padrão
<?php*/
function dividir(float $a, float $b = 2): float {
    return $a / $b;
}

echo dividir(10);   // Saída: 5 (pois $b assume o padrão 2)
echo dividir(10, 5); // Saída: 2
echo"<br>";



//passagem de parametro po valor
function calc($n1,$n2,) {
    $total = $n1 + $n2;
    return $total;
}
    $x = 3;
    $y = 2;
    $somi = calc($x, $y);
echo "total: ".$somi;