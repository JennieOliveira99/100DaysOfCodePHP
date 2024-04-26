<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["radio_nome"] === "primeiro") {
        // Código para a primeira opção
        $frase = $_POST["frase"];
        $codigo = transformarCodigo($frase);
        exibirCodigoTransformado($codigo);
    } elseif ($_POST["radio_nome"] === "segundo") {
        // Código para a segunda opção
        exibirFraseCorrespondente($_POST["letra"]);
    }
}

function transformarCodigo($frase) {
    $codigo = '';
    for ($i = 0; $i < strlen($frase); $i++) {
        if ($frase[$i] == ' ') {
            $codigo .= ' ';
        } else {
            $atualCode = ord($frase[$i]);
            $nextCode = $atualCode + 3;
            if ($nextCode > ord('z')) {
                $nextCode -= 26;
            }
            $nextLetter = chr($nextCode);
            $codigo .= $nextLetter;
        }
    }
    return $codigo;
}

function exibirCodigoTransformado($codigo) {
    echo '<div style="background-color: #040205; color: #cdedee; text-align: center; height: 100%; margin-top: 20px;  padding:30px; font-size:30px;">';
    echo 'Código: ' . $codigo;
    echo '</div>';
}
function exibirFraseCorrespondente($letra) {
    $letrasParaFrases = array(
        'A' => 'Bom dia!',
        'B' => 'Boa tarde!',
        'C' => 'Boa noite!'
    );

    if(isset($letrasParaFrases[$letra])) {
        $frase = $letrasParaFrases[$letra];
        echo '<div style="background-color: #040205; color: #cdedee; text-align: center; height: 100%; margin-top: 20px;  padding:30px; font-size:30px;">';
        echo "Para a letra '$letra', a frase é: '$frase'";
        echo '</div>';
    } else {
        echo '<div style="background-color: #040205; color: #cdedee; text-align: center; height: 100%; margin-top: 20px;  padding:30px; font-size:30px;">';
        echo "A letra '$letra' não possui uma frase correspondente";
        echo '</div>';
    }
}
