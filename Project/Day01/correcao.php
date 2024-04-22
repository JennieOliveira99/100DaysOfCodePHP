<?php

//QTD de candidatos
//qtd por sx
//precisa tingir 45 pontos (soma escolaridade + (experiencia *5))
//se houver empate a preferencia : mulher maior escolaridade
//exibir nome do candidato vencedor

//1° criando um array que junte todos
$candidatos = [];
//------------
$pessoa1 =[
    'nome' => 'MARIA',
    'sexo' => 'F',
    'idade' => 23,
    'exp' => 4,
    'escolaridade' => [ 5 => 'ensino medio',
                        10 => 'tecnico'
                        ]

];

//2°adcionando o curriculo na variavel candidato
$candidato [] = $pessoa1;

//---------
$pessoa2 =[
    'nome' => 'JOAO',
    'sexo' => 'M',
    'idade' => 30,
    'exp' => 1,
    'escolaridade' => [ 5 => 'ensino medio',
                        15 => 'faculdade',
                        20 => 'especializacao'
    ]

];

//2°adcionando o curriculo na variavel candidato
$candidato [] = $pessoa2;

//------------
$pessoa3 =[
    'nome' => 'JOANA',
    'sexo' => 'F',
    'idade' => 27,
    'exp' => 8,
    'escolaridade' => [ 5 => 'ensino medio',]
];

//2°adcionando o curriculo na variavel candidato
$candidato [] = $pessoa3;


$qtdF = 0;
$qtdM = 0;
$pontos = 0;
foreach($candidatos as $candidato){
    $qtdF += ($candidato['sexo'] == 'F') ? 1: 0;//ternario: ? entao e : else
    $qtdM += ($candidato['sexo'] == 'M') ? 1: 0;
    $pontos = ($candidato['experiencia'] *5);
    foreach($candidato['escolaridade'] as $chave =>  $valor){
        $pontos += $chave;
    }
    echo "<br>" . $candidato ['nome'] ."pontos: $pontos<br>";
} 
echo "total feminino $qtdF ,Total masc $qtdM";
//var_dump($candidatos);

//ternarios
//burlando indices de array chaveados:
// defina uma variavel: $indice = 0; 
//depois defina:$candidato[$indice]['ponto]= $pontos(isso quer dizer que em candidado vai inserir 'pontos' fazendo com que esses pontos seja uma variavel: $pontos) 
//e no final de tudo incremente, o ++ vira 0, 1, 2... $indice++;

//saber criar funcoes para identificar maior ou menor valor dentro de array

$pontoAnterior = 0;
$indiceFeminino = -1;//iniciando com valor que nunca vai existir(resetando valor para que nao bug quando chegar no segundo if, ja que array comeca em 0 e essa variavel precisa ser vazia, e se colocar 0 cai la no if)
$indice = 0;//serve so pra saber onde esta o indice de vencedores e para incrementar
$vencedores = [];

    foreach($candidatos as $candidato)
{
    if ($candidato['pontos'] >= $pontoAnterior && $candidato['pontos'] >= 45){
        $vencedores[] = $candidato;
        $pontoAnterior = $candidato['pontos'];

        if ($candidato['sexo'] == 'F'){
            $indiceFeminino = $indice;
        }
    }
    $indice++;
}
echo "<br>VENCEDORES<br>";
    foreach ($vencedores as $vencedor){
        echo '--' . $vencedor['nome'] . '(' .$vencedor['pontos'] . ')<br>';
    }

    echo '<br>contratado: <br>';

    if($indiceFeminino >=1 ){
        echo    '-' . $vencedores[$indiceFeminino]['nome'];
    }else{
        echo    '-' . $vencedores[0]['nome'];//0 pq masculino nao definimos indice 
    }