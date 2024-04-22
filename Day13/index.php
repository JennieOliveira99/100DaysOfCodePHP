<?php

//****WHILE****
//estrutura de controle usada para executar um conjunto de instruções enquanto uma condição específica for avaliada como verdadeira



$senhaCorreta = "senha123";
$tentativas_restantes = 3;


while ($tentativas_restantes > 0) {
    $tentativa = readline("Digite a senha: ");

    if ($tentativa === $senhaCorreta) {

        echo "Bem-vindo!";

        break; // Sai do loop se a senha estiver correta
    } else {

        $tentativas_restantes--;

        echo "Senha incorreta, tentativas restantes: $tentativas_restantes\n";
    }
}

if ($tentativas_restantes === 0) {

    echo "vc utilizou o n° máximo de tentativas, sua conta foi bloqueada";
}


//Gerando numeros aleatorios


$soma = 0;
$limite = 10;

while ($soma <= $limite) {
    $numero = rand(1, 5); 
    echo "$numero ";
    $soma += $numero; 
}

echo "Soma total: $soma";


//contagem regressiva

$contador = 10;

while ($contador >= 1) {
    echo "$contador... ";
    $contador--;
}

echo "Fogo!";



//Suponha que você tenha um arquivo de texto chamado "dados.txt" com várias linhas de dados e queira processar cada linha desse arquivo.

//Neste exemplo, o programa abre o arquivo "dados.txt" para leitura e usa o loop "while" para ler e processar cada linha do arquivo até que não haja mais linhas para ler. Dentro do loop, cada linha é exibida e pode ser processada conforme necessário. Ao final, o arquivo é fechado.


// Abrir o arquivo para leitura
$arquivo = fopen("dados.txt", "r");

// Verificar se o arquivo foi aberto com sucesso
if ($arquivo) {
    // Processar cada linha do arquivo
    while (($linha = fgets($arquivo)) !== false) {
        // Exibir cada linha
        echo $linha;
        // Realizar algum processamento com cada linha, se necessário
    }

    // Fechar o arquivo
    fclose($arquivo);
} else {
    echo "Não foi possível abrir o arquivo.";
}
