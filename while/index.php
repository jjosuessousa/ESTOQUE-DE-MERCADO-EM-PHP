<?php 
    $numero=1;

    while ($numero <= 10) {
        echo "N: $numero <br>";
          

        $numero++;


    }



    
  
    $contador = 1;
    
    while ($contador <= 5) {
        echo "Número: $contador <br>";
        $contador++; // Incrementa o contador
    }





    //Exemplo prático: Listar números pares de 0 a 10

    $numero = 0;
    
    while ($numero <= 10) {
        echo "$numero é par <br>";
        $numero += 2; // Incremento de 2 em 2
    }
   
   


   // Cuidado com loops infinitos!
   // Se a condição nunca for falsa, o loop rodará para sempre e pode travar o sistema.
   // Exemplo de loop infinito (⚠️ NÃO EXECUTAR ⚠️):
    
   // $x = 1;
    
    //while ($x > 0) { // Sempre verdadeiro
      //  echo "Loop infinito!";
  //  }

   // Para evitar isso, garanta que a variável usada na condição está sendo modificada dentro do loop.
    
?>