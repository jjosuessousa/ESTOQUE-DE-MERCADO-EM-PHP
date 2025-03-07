<?php

for($i = 1; $i <= 10; $i++ ) {
    echo "-------------- <br>";
}

for ($num = 0; $num <= 10; $num += 2) {
    echo "$num é par <br>";
}

$nomes = ["Ana", "Bruno", "Carlos", "Daniela"];

for ($i = 0; $i < count($nomes); $i++) {
    echo "Nome: $nomes[$i] <br>";
}



//O for em PHP é uma estrutura de repetição usada   QUANDO SABEMOS quantas vezes o loop deve ser executado. Ele possui uma sintaxe mais compacta em comparação ao while.

//Sintaxe do for

//for (inicialização; condição; incremento/decremento) {
    // Código a ser executado

//Inicialização: Define a variável de controle (executado apenas uma vez).
//Condição: Enquanto for true, o loop continua.
///Incremento/Decremento: Atualiza a variável de controle após cada iteração.
//Exemplo básico: Contagem de 1 a 5


for ($i = 1; $i <= 5; $i++) {
    echo "Número: $i <br>";
}
?>