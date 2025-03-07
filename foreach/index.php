<?php 


//exemplo com indice
$idades = ["Ana" => 25, "Bruno" => 30, "Carlos" => 22,"josue" => 34,"ellen" => 47,];

foreach ($idades as $nome => $idade) 
    echo "$nome tem $idade anos. <br>";


  //  Exemplo com array associativo dentro de um array:

$pessoas = [
    ["nome" => "Ana", "idade" => 25],
    ["nome" => "Bruno", "idade" => 30],
    ["nome" => "Carlos", "idade" => 22]
];

foreach ($pessoas as $pessoa) {
    echo "{$pessoa['nome']} tem {$pessoa['idade']} anos. <br>";
}
?>



