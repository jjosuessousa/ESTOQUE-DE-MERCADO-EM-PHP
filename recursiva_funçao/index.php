Funções Recursivas em PHP 🔄
Uma função recursiva é uma função que se chama dentro do próprio corpo, até atingir uma condição de parada.



1️⃣ Exemplo Básico – Contagem Regressiva ⏳
php
Copiar
Editar
function contagemRegressiva($n) {
    if ($n <= 0) { // Condição de parada
        echo "Fim! 🚀";
        return;
    }

    echo "$n\n";
    contagemRegressiva($n - 1); // Chamada recursiva
}

contagemRegressiva(5);
🔹 Explicação:

A função chama a si mesma com um valor decrementado ($n - 1).
A recursão para quando $n chega a 0 (condição de parada).
🔹 Saída esperada:

Copiar
Editar
5
4
3
2
1
Fim! 🚀