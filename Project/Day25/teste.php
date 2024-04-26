<?php

// Criando o array com os versículos de Provérbios
$proverbiosCypher = array (

    "A" => "Ouvi, filhos, a instrução de um pai;
    prestai atenção e obtende discernimento.<br>",
    "B" => "Pois dou-vos boa doutrina;
    não abandoneis o meu ensino.<br>",
    "C"=> "Quando eu era filho aos pés de meu pai,
    tenro e único aos olhos de minha mãe,ele me ensinava e me dizia:
    “Retenha as minhas palavras no coração;
    guarde os meus mandamentos, e você viverá.<br>" ,
    "D"=> "Adquira sabedoria, adquira discernimento;
    não se esqueça das palavras da minha boca
    nem delas se afaste.<br>" ,
    "E" => "Não a abandone, e ela o protegerá;
    ame-a, e ela o guardará.<br>",
    "F" => "A sabedoria é a coisa principal; adquira a sabedoria,
    e com tudo o que você possui adquira o entendimento.<br>",
    "G" => "Estime-a, e ela o exaltará;
    abraçando-a, ela o honrará.<br>" ,
    "H" => "Ela porá sobre a tua cabeça uma grinalda de graça;
    coroar-te-á com um diadema de glória.<br>" ,
    "I" => " Ouça, meu filho, e receba minhas palavras,
    e os anos de sua vida aumentarão.<br>",
    "J"  => "Eu o guio no caminho da sabedoria
    e o conduzo por veredas retas.<br>",
    "K" => "Quando você caminhar, seus passos não serão impedidos;
    e se você correr, não tropeçará.<br>",
    "L" => "Apegue-se à instrução, não a deixe ir;
    guarde-a, pois ela é a sua vida.<br>",
    "M" => "Não entre na vereda dos ímpios
    nem ande no caminho dos maus.<br>",
    "N" => "Evite-o, não passe por ele;
    desvie-se dele e passe longe.<br>",
    "O" => "Pois eles não conseguem dormir enquanto não praticam o mal;
    perdem o sono se não fazem alguém tropeçar.<br>",
    "P" => "Eles comem o pão da maldade
    e bebem o vinho da violência.<br>",
    "Q" => "A vereda dos justos é como a luz da alvorada,
    que brilha cada vez mais até a plena luz do dia.",
    "R" => "Mas o caminho dos ímpios é como densas trevas;
    nem sabem em que tropeçam.<br>",
    "S" => "Meu filho, preste atenção às minhas palavras;
    incline o seu ouvido ao que eu digo.<br>",
    "T" => "Não as deixe longe dos seus olhos;
    guarde-as no fundo do seu coração.<br>",
    "U" => "Pois são vida para quem as encontra
    e saúde para todo o seu ser.<br>",
    "V" => "Acima de tudo, guarde o seu coração,
    pois dele depende toda a sua vida.<br>",
    "W" => "Afaste da sua boca palavras perversas;
    fique longe dos seus lábios a falsidade.<br>",
    "X" => "Olhe sempre diretamente para a frente,
    mantenha o olhar fixo no que está adiante de você.<br>",
    "Y" => "Veja bem por onde anda,
    e os seus passos serão seguros.<br>",
    "Z"=> "Veja bem por onde anda,
    e os seus passos serão seguros.<br>"
) ;

// Verificando se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verificando se o usuário selecionou uma opção (name)
    if (isset($_POST['chosen_Cripto'])) {
        $opcao_selecionada = $_POST['chosen_Cripto'];

        // Se o usuário selecionou a primeira opção (Cifra de César value=primeiro) 
        if ($opcao_selecionada == 'primeiro') {
            // Pegando o valor enviado pelo formulário com o name "frase"
            $frase = $_POST["frase"];

            // Inicializando uma nova string para armazenar o código transformado
            $codigo = '';// comeca vazio pq conforme ocorre o loop, as letras serao armazenadas nele

            // Percorre a frase original caractere por caractere
            for ($i = 0; $i < strlen($frase); $i++) {
                // Obtém o código ASCII do caractere atual

                 // ****explicacao do FOR
        //$i = 0;
        // Esta é a inicialização do contador do loop, percorrer cada caractere na string $frase 
        //-----------------------------------------------------------
        //$i < strlen($frase); 
        //enquanto o valor de $i for menor que o comprimento da frase
        // strlen  =  retorna  o n° total de caracteres na frase digitada
        //o loop continuará até que $i seja igual ao n° de caracteres na frase para que cada caractere seja processado
        //-----------------------------------------------------------
        //$i++
        //move o loop para o próximo caractere na string $frase


                $atualCode = ord($frase[$i]); 
                 //estamos calculando o valor ASCII do caractere na posição $i da string $frase e armazenando esse valor na variável $codigo
        //uando utilizamos $frase[$i], estamos acessando o caractere na posição indicada pelo contador $i na string $frase
        // E assim, $i vem do loop for, que está controlando o processo de iteração sobre os caracteres da string $frase


        // Calcula o codigo ASCII da terceira letra seguinte atraves da FUNCAO NATIVA chr
        //Aqui, o código ASCII do caractere atual ($atualCode) é deslocado por três posições para frente.
        //Como exemplo, se o $atualCode for 65 (correspondente a 'A' em ASCII), então $nextCode será 65 + 3 = 68, que corresponde a 'D' em ASCII.
                $nextCode = $atualCode + 3;
                
                //letra correspondente ao código ASCII calculado
                $nextLetter = chr($nextCode);

                // Concatena a letra ao código
                $codigo .= $nextLetter;
            }

            // Exibe o código transformado
            echo '<div style="background-color: #040205; color: #cdedee; text-align: center; height: 100%; margin-top: 20px;  padding:30px; font-size:30px;">';
            echo 'Código: ' . $codigo;
            echo '</div>';
        } 
        // Se o usuário selecionou a segunda opção (Provérbios name = segundo)
        elseif ($opcao_selecionada == 'segundo') {
            // Pega o valor enviado pelo formulário com o name "frase"
            $frase = $_POST["frase"];

            // Inicializa uma nova string para armazenar o código transformado
            $codigo = '';

            // Percorre a frase original caractere por caractere
            for ($i = 0; $i < strlen($frase); $i++) {
                // Verificando se o caractere atual é alfabético com ctype_alpha
                if (ctype_alpha($frase[$i])) {
                    // Verificando se o caractere é maiúsculo com strtoupper
                    $frase_maiuscula = strtoupper($frase[$i]);
                    // Verifica se há uma correspondência no array de versículos de Provérbios
                    if (isset($proverbiosCypher[$frase_maiuscula])) {
                        // Adiciona o versículo correspondente ao caractere atual ao código final
                        $codigo .= $proverbiosCypher[$frase_maiuscula];
                    } else {
                        // Caso não haja correspondência, mantém o caractere original
                        $codigo .= $frase[$i];
                    }
                } else {
                    // Se o caractere não for alfabético, mantém o caractere original
                    $codigo .= $frase[$i];
                }
            }

            // Exibe o código transformado
            echo '<div style="background-color: #040205; color: #cdedee; text-align: center; height: 100%; margin-top: 20px;  padding:30px; font-size:30px;">';
            echo 'Código: ' . $codigo;
            echo '</div>';
        }
    } else {
        // Caso o usuário não tenha selecionado uma opção
        echo '<div style="background-color: #ff0000; color: #ffffff; text-align: center; height: 100%; margin-top: 20px; padding: 30px; font-size: 30px;">';
        echo 'Por favor, selecione uma opção.';
        echo '</div>';
    }
}
?>
