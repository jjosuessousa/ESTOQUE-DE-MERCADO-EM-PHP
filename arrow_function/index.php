<?php $soma = fn($a, $b) => $a + $b;

echo $soma(5, 3) ; // Saída: 8 


$soma= fn($a, $b) => $a+$b;

echo $soma(10, 20);

/*📌 Leitura técnica correta:

A variável $soma está recebendo uma função anônima do tipo arrow function. Essa função recebe dois parâmetros, $a e $b, e retorna automaticamente o resultado da soma de $a com $b.



🔹 Explicação detalhada:
fn($a, $b) => $a + $b; → Define uma arrow function.
fn($a, $b) → Declaração dos parâmetros da função.
=> $a + $b → Expressão que será retornada automaticamente (não precisa de return).
$soma = → A função é atribuída à variável $soma, permitindo que seja chamada como uma função normal.*/