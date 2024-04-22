
<?php

$arrayCores = [
    'azul',
    'rosa',
    'verde',
    'amarelo',
    'preto',
    'branco'
];



//analisar arrayCores

//exiba cores que -existem- na bandeira do brasil
//e as que nao existem



foreach ($arrayCores as $value ){

    if ($value == 'amarelo' && $value == 'verde' && $value == 'azul'){
       
        echo "A cor $value esta presente na bandeira do Brasil <br>";
    
    }else {
        echo "A cor que nao esta é: $value <br>";
}
}

