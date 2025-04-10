<?php


 //Estrutura if / else / elseif 


$nota1 = 6;
$nota2 = 8;

$media = ($nota1  + $nota2);

if ($media > 7){
    echo "Média: " .$media . "<br>";
    echo "Aprovado";
}else if($media < 7){
    echo "Média: " .$media . "<br>";
    echo "Reprovado";
}else{
    echo "Média: " .$media . "<br>";
    echo "Recuperção";
}

echo "<br>";
echo "<br>";

//Estrutura Switch Case 
/*. O comando switch testa linha a linha os cases encontrados, e a partir do momento que encontra um 
valor igual ao da variável testada, passa a executar todos os comandos seguintes, mesmo os que 
fazem parte de outro teste, até o fim do bloco. 
Por isso usa-se o comando break, quebrando o fluxo e fazendo com que o código seja 
executado da maneira desejada. Veremos mais sobre o break mais adiante
*/

$i = 0;

switch ($i){
    case 0:
        print "i = 0";
        break;
        case 1:
            print "i = 1";
            break;
            case 2:
                print "i = 2";
                break;
}