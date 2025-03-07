🔹 1. Funções Básicas
📌 Soma, Subtração, Multiplicação e Divisão
Essas operações podem ser feitas com operadores normais: +, -, *, /.

php
Copiar
Editar
$a = 10;
$b = 5;

echo $a + $b; // Soma: 15
echo $a - $b; // Subtração: 5
echo $a * $b; // Multiplicação: 50
echo $a / $b; // Divisão: 2
📌 Obter o valor absoluto (abs)
Retorna o valor positivo de um número.


echo abs(-10); // Saída: 10
📌 Máximo (max) e Mínimo (min)
Encontra o maior ou menor número de uma lista.


echo max(10, 5, 8, 20); // Saída: 20
echo min(10, 5, 8, 20); // Saída: 5
🔹 2. Arredondamentos e Formatação
📌 Arredondar para cima (ceil) e para baixo (floor)
ceil() arredonda para cima.
floor() arredonda para baixo.
php
Copiar
Editar
echo ceil(4.3);  // Saída: 5
echo floor(4.8); // Saída: 4
📌 Arredondamento com precisão (round)
Arredonda um número para o inteiro mais próximo ou para um número específico de casas decimais.

php
Copiar
Editar
echo round(4.6);     // Saída: 5
echo round(4.4);     // Saída: 4
echo round(4.567, 2); // Saída: 4.57
🔹 3. Potências e Raízes
📌 Potenciação (pow)
Eleva um número a uma potência.

php
Copiar
Editar
echo pow(2, 3); // 2³ = 8
✅ Alternativa mais moderna (PHP 5.6+):

php
Copiar
Editar
echo 2 ** 3; // Saída: 8
📌 Raiz quadrada (sqrt)
php
Copiar
Editar
echo sqrt(25); // Saída: 5
🔹 4. Logaritmos e Exponenciais
📌 Exponencial (exp)
Calcula e^x, onde e é a constante de Euler (~2.718).

php
Copiar
Editar
echo exp(1); // Saída: 2.718 (aproximadamente)
📌 Logaritmo natural (log)
Calcula o logaritmo natural (base e) de um número.

php
Copiar
Editar
echo log(10); // Saída: 2.302 (aproximadamente)
📌 Logaritmo em bases diferentes
php
Copiar
Editar
echo log(100, 10); // Logaritmo de 100 na base 10 → Saída: 2
🔹 5. Números Aleatórios
📌 Gerar um número aleatório (rand)
php
Copiar
Editar
echo rand(); // Número aleatório qualquer
echo rand(1, 100); // Número entre 1 e 100
✅ No PHP 7+, uma alternativa melhor é random_int() para valores mais seguros:

php
Copiar
Editar
echo random_int(1, 100); // Número aleatório entre 1 e 100 (seguro)
🔹 6. Trigonometria
📌 As funções trigonométricas do PHP trabalham com radianos!
Use deg2rad() e rad2deg() para converter entre graus e radianos.

php
Copiar
Editar
echo sin(deg2rad(30)); // Seno de 30 graus
echo cos(deg2rad(60)); // Cosseno de 60 graus
echo tan(deg2rad(45)); // Tangente de 45 graus
📌 Arco (inversas de funções trigonométricas)

php
Copiar
Editar
echo rad2deg(asin(0.5)); // arcsen(0.5) em graus → 30°
🔹 7. Outras Funções Úteis
📌 Número π (M_PI)
O PHP possui constantes matemáticas como M_PI (π).

php
Copiar
Editar
echo M_PI; // Saída: 3.1415926535898
echo round(M_PI, 2); // Saída: 3.14
📌 Módulo (fmod)
Retorna o resto da divisão entre dois números (útil para números decimais).

php
Copiar
Editar
echo fmod(10.5, 3); // Saída: 1.5
📌 Hipotenusa (hypot)
Calcula a hipotenusa de um triângulo retângulo.

php
Copiar
Editar
echo hypot(3, 4); // Saída: 5
📌 Resumo
Função	Descrição
abs($x)	Valor absoluto
ceil($x), floor($x), round($x, $precisao)	Arredondamentos
pow($x, $y) ou $x ** $y	Potência
sqrt($x)	Raiz quadrada
exp($x), log($x, $base)	Exponencial e logaritmo
rand($min, $max), random_int($min, $max)	Números aleatórios
sin(), cos(), tan(), asin(), acos(), atan()	Funções trigonométricas
M_PI	Constante π
hypot($a, $b)	Hipotenusa
