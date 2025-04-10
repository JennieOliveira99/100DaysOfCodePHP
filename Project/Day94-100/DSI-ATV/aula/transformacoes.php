<?php
/*
 Coerções 
 A coerção no PHP é uma conversão automática de tipos que ocorre quando você realiza operações entre valores de tipos diferentes. O PHP decide o tipo de conversão baseado nas regras:

Se um dos operandos for float, o outro será convertido para float.
Se não houver float, mas um dos operandos for integer, o outro será convertido para integer.



 Transformação explícita de tipos 
 Os tipos permitidos na Transformação explícita são: 
· (int), (integer) ----------------- = muda para integer; 
· (real), (double), (float) ------ = muda para float; 
· (string)-------------------------- = muda para string; 
· (array) -------------------------- = muda para array; 
· (object) ------------------------- = muda para objeto.
*/

$vivas = "1";
$vivas = $vivas + 1;
$vivas = $vivas + 3.7;
$vivas = 1 + 1.5 ;

//o PHP converteu string para integer ou double mantendo o valor

echo "O valor é: $vivas <br>";

$vivas = "15"; //$ vivas =int 15
$vivas = (double)$vivas; //$vivas = double 15.0
$vivas = 3.9; //$vivas = double 3.9
$vivas = (int)$vivas; //$vivas = int 3
//valor decimal é truncado
echo "O valor é: $vivas <br>";

/* Com a função settype 
A função settype converte uma variável para o tipo especificado, que pode ser “integer”, 
“double”, “string”,“array” ou “object”. 
Sintaxe: 
Settype(nomedavariável,novo tipo da variável)
*/
// Definindo a variável como um inteiro
$vivas = 15;  // Inicialmente, $vivas é um inteiro com valor 15.
settype($vivas, "double");  // Converte $vivas para o tipo double (float).
echo "O valor é: $vivas <br>";  // Exibe o valor de $vivas (que agora é 15.0)

// Definindo novamente a variável como um inteiro
$vivas = 15;  // Inicialmente, $vivas é um inteiro com valor 15.
settype($vivas, "string");  // Converte $vivas para o tipo string.
echo "O valor é: $vivas <br>";  // Exibe o valor de $vivas (que agora é "15")
