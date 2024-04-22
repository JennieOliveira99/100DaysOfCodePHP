<?php


// menu principal
function exibirMenuPrincipal() {
    echo "Bem-vindo à nossa loja de maquiagem!\n";
    echo "Escolha uma categoria:\n";
    echo "1. Batons\n";
    echo "2. Sombras\n";
    echo "3. Bases\n";
    echo "4. Sair\n";
}


// exibir  batons disponíveis
function exibirBatons() {
    echo "Batons disponíveis:\n";
    echo "1. Batom Matte - \$15\n";
    echo "2. Batom Líquido - \$20\n";
}


// exibir as sombras disponíveis
function exibirSombras() {
    echo "Sombras disponíveis:\n";
    echo "1. Paleta de Sombras Neutras - \$25\n";
    echo "2. Trio de Sombras Cintilantes - \$18\n";
}


// exibir as bases disponíveis
function exibirBases() {
    echo "Bases disponíveis:\n";
    echo "1. Base Líquida - \$30\n";
    echo "2. Base em Pó - \$25\n";
}

// Função principal
function lojaMaquiagem() {
    $continuar = true;

    while ($continuar) {
        exibirMenuPrincipal();
        
        $opcao = readline("Digite o número da opção desejada: ");

        switch ($opcao) {
            case "1":
                exibirBatons();
                break;
            case "2":
                exibirSombras();
                break;
            case "3":
                exibirBases();
                break;
            case "4":
                echo "Obrigado por visitar nossa loja. Até mais!\n";
                $continuar = false;
                break;
            default:
                echo "Opção inválida. Por favor, escolha uma opção válida.\n";
        }
    }
}

// Chamando a função principal
lojaMaquiagem();

