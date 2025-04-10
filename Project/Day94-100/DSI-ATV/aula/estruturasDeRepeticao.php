<?php
/*
while
 Ele testa uma condição e executa 
um comando, ou um bloco de comandos, até que a condição testada seja falsa.

 Do ... While 
O laço do..while funciona de maneira bastante semelhante ao while, com a simples 
diferença que a expressão é testada ao final do bloco de comandos. 

*/


$i = 1;
while ($i <=10){
    print $i++;
    print "<br>";
}


print "<br>";
print "<br>";

$a= 1;
do {
    echo $a++;
    echo "<br>";
}while($a <=5);


print "<br>";
print "<br>";
/* For 

As três expressões que ficam entre parênteses têm as seguintes finalidades: 
** Inicialização: comando ou seqüência de comandos a serem realizados antes do inicio 
do laço. Serve para inicializar variáveis. 
*** Condição: Expressão booleana que define se os comandos que estão dentro do laço 
serão executados ou não. Enquanto a expressão for verdadeira (valor diferente de zero) os 
comandos serão executados. 
****Incremento: Comando executado ao final de cada execução do laço.

*/

for($b = 1; $b < 7; $b++){
    echo "o valor de B é: ". $b;
    echo "<br>";
}


print "<br>";
print "<br>";

/*  Foreach 
O FOREACH tem o mesmo funcionamento do FOR, porém, ele não precisa de contador. 
Ou seja, você vai correr o laço sabendo em que posição está
*/

$frutas = array('maçã', 'banana', 'manga');
foreach($frutas as $fruta)
{
    echo " A ruta é:  ". $fruta . "<br>";
}