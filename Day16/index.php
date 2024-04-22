<?php

// Pega o valor enviado pelo formulário com o name "frase"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $frase = $_POST["frase"];

    //**************$_SERVER
    //Quando um navegador solicita uma página da web a um servidor, ele envia várias informações junto com essa solicitação.
    // Essas informações são acessíveis no lado do servidor através da superglobal $_SERVER.
    // O PHP organiza essas informações em um array associativo, onde cada chave é um nome específico que representa um aspecto da solicitação.

    //$_SERVER["REQUEST_METHOD"] nos dá o método de solicitação HTTP usado para acessar a página, seja "GET", "POST" ou outro método HTTP.

    // Inicializa uma nova string para armazenar o código transformado
    $codigo = '';  

    // Percorre a frase original caractere por caractere
    for ($i = 0; $i < strlen($frase); $i++) {
        // Verifica se o caractere atual é um espaço
        if ($frase[$i] == ' ') {
            // Se for um espaço, simplesmente o concatena ao código sem modificar
            $codigo .= ' ';
        } else {
            // Obtém o codigo ASCII do caractere atual através da FUNCAO NATIVA ord
            $atualCode = ord($frase[$i]); 

            // Calcula o codigo ASCII da terceira letra seguinte através da FUNCAO NATIVA chr
            // Aqui, o código ASCII do caractere atual ($atualCode) é deslocado por três posições para frente.
            // Como exemplo, se o $atualCode for 113 (correspondente a 'q' em ASCII), então $nextCode será 113 + 3 = 116, que corresponde a 't' em ASCII.
            $nextCode = $atualCode + 3;
            
            // Verifica se o deslocamento ultrapassa a letra 'z'
            if ($nextCode > ord('z')) {
                // Se ultrapassar, ajusta para começar de novo em 'a'
                $nextCode -= 26;
            }
            
            // Obtém a letra correspondente ao código ASCII calculado
            $nextLetter = chr($nextCode);

            $codigo .= $nextLetter;
            // .= é um operador de concatenação em PHP, é usado para concatenar o valor à direita com a variável à esquerda e atribuir o resultado à variável à esquerda. 
        }
    }

    // Exibe o código transformado
    echo '<div style="background-color: #040205; color: #cdedee; text-align: center; height: 100%; margin-top: 20px;  padding:30px; font-size:30px;">';
    echo 'codigo: ' . $codigo;
    echo '</div>';
}

?>
