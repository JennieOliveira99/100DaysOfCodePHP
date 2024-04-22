<?php
//QTD de candidatos
//qtd por sx
//precisa tingir 45 pontos (soma escolaridade + (experiencia *5))
//se houver empate a preferencia : mulher maior escolaridade
//exibir nome do candidato vencedor

//1° criando um array que junte todos
$candidatos = [];

// Candidato 1
$candidato1 = [
    'nome' => 'MARIA',
    'sexo' => 'F',
    'idade' => 23,
    'exp' => 4,
    'escolaridade' => ['ensino medio', 'tecnico']
];

$candidatos[] = $candidato1;

// Candidato 2
$candidato2 = [
    'nome' => 'JOAO',
    'sexo' => 'M',
    'idade' => 30,
    'exp' => 1,
    'escolaridade' => ['ensino medio', 'faculdade', 'especializacao']
];

$candidatos[] = $candidato2;

// Candidato 3
$candidato3 = [
    'nome' => 'JOANA',
    'sexo' => 'F',
    'idade' => 27,
    'exp' => 8,
    'escolaridade' => ['ensino medio']
];

$candidatos[] = $candidato3;

// Quantidade de candidatos
$QTDcandidatos = count($candidatos);
echo "Quantidade de candidatos: $QTDcandidatos<br>";

// Encontrar candidatos do sexo feminino
echo "Candidatos mulheres:<br>";
foreach ($candidatos as $candidato) {
    if ($candidato['sexo'] == 'F') {
        echo $candidato['nome'] . "<br>";
    }
}

// Calcular pontuação e encontrar o vencedor
$pontuacoes = [];
foreach ($candidatos as $candidato) {
    $pontuacao = 0;
    foreach ($candidato['escolaridade'] as $nivel) {
        $pontuacao += array_search($nivel, $candidato['escolaridade']);
    }
    $pontuacao += $candidato['exp'] * 5;
    $pontuacoes[] = $pontuacao;
}

$maxPontuacao = max($pontuacoes); //max retorna o valor maximo que ele encontrar em $pontuacoes
$vencedor = $candidatos[array_search($maxPontuacao, $pontuacoes)]['nome'];

echo "O candidato vencedor é: $vencedor<br>";
?>
