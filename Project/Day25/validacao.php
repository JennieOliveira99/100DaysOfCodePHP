<?php

//criando o array
// versículos de Provérbios 4:1-27 e Provérbios 5:1-23. 
$proverbiosCypher = array (

    "A" => "Ouvi, filhos, a instrução de um pai;
    prestai atenção e obtende discernimento.",
    "B" => "Pois dou-vos boa doutrina;
    não abandoneis o meu ensino.",
    "C"=> "Quando eu era filho aos pés de meu pai,
    tenro e único aos olhos de minha mãe,ele me ensinava e me dizia:
    “Retenha as minhas palavras no coração;
    guarde os meus mandamentos, e você viverá." ,
    "D"=> "Adquira sabedoria, adquira discernimento;
    não se esqueça das palavras da minha boca
    nem delas se afaste." ,
    "E" => "Não a abandone, e ela o protegerá;
    ame-a, e ela o guardará.",
    "F" => "A sabedoria é a coisa principal; adquira a sabedoria,
    e com tudo o que você possui adquira o entendimento.",
    "G" => "Estime-a, e ela o exaltará;
    abraçando-a, ela o honrará." ,
    "H" => "Ela porá sobre a tua cabeça uma grinalda de graça;
    coroar-te-á com um diadema de glória." ,
    "I" => " Ouça, meu filho, e receba minhas palavras,
    e os anos de sua vida aumentarão.",
    "J"  => "Eu o guio no caminho da sabedoria
    e o conduzo por veredas retas.",
    "K" => "Quando você caminhar, seus passos não serão impedidos;
    e se você correr, não tropeçará.",
    "L" => "Apegue-se à instrução, não a deixe ir;
    guarde-a, pois ela é a sua vida.",
    "M" => "Não entre na vereda dos ímpios
    nem ande no caminho dos maus.",
    "N" => "Evite-o, não passe por ele;
    desvie-se dele e passe longe.",
    "O" => "Pois eles não conseguem dormir enquanto não praticam o mal;
    perdem o sono se não fazem alguém tropeçar.",
    "P" => "Eles comem o pão da maldade
    e bebem o vinho da violência.",
    "Q" => "A vereda dos justos é como a luz da alvorada,
    que brilha cada vez mais até a plena luz do dia.",
    "R" => "Mas o caminho dos ímpios é como densas trevas;
    nem sabem em que tropeçam.",
    "S" => "Meu filho, preste atenção às minhas palavras;
    incline o seu ouvido ao que eu digo.",
    "T" => "Não as deixe longe dos seus olhos;
    guarde-as no fundo do seu coração.",
    "U" => "Pois são vida para quem as encontra
    e saúde para todo o seu ser.",
    "V" => "Acima de tudo, guarde o seu coração,
    pois dele depende toda a sua vida.",
    "W" => "Afaste da sua boca palavras perversas;
    fique longe dos seus lábios a falsidade.",
    "X" => "Olhe sempre diretamente para a frente,
    mantenha o olhar fixo no que está adiante de você.",
    "Y" => "Veja bem por onde anda,
    e os seus passos serão seguros.",
    "Z"=> "Veja bem por onde anda,
    e os seus passos serão seguros."
) ;


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se o campo "chosen_operation" está definido no array $_POST
    // Verificando se o usuário enviou os campos
    if (isset($_POST["chosen_Cripto"])) {
        // echo "Cifra de César";

        // Define a função codificarFrase
        function codificarFrase($frase, $proverbiosCypher) {
            $codigo = ''; // Inicializa a variável $codigo

            // Percorre a frase original caractere por caractere
            for ($i = 0; $i < strlen($frase); $i++) {
                // Verifica se o caractere atual é um espaço
                if ($frase[$i] == ' ') {
                    // Se for um espaço, simplesmente o concatena ao código sem modificar
                    $codigo .= ' ';
                } else {
                    // Verifica se o caractere é maiúsculo
                    if (ctype_upper($frase[$i])) {
                        // Se for maiúsculo, exige que o usuário forneça o valor correspondente
                        // Aqui você pode adicionar a lógica desejada para interagir com o usuário e obter o valor correspondente
                        // Por exemplo:
                        // $valor_correspondente = obterValorCorrespondente($frase[$i]);
                        // $codigo .= $valor_correspondente;
                    } else {
                        // Se não for maiúsculo, converte para maiúsculo e executa a função para mostrar a frase correspondente
                        $frase_maiuscula = strtoupper($frase[$i]);
                        if (isset($proverbiosCypher[$frase_maiuscula])) {
                            $codigo .= $proverbiosCypher[$frase_maiuscula];
                        } else {
                            // Caso a letra não tenha uma correspondência no array, mantém o caractere original
                            $codigo .= $frase[$i];
                        }
                    }
                }
            }

            return $codigo; // Retorna o código resultante
        }

        // Chama a função com a frase e o array de códigos
        $frase_original = $_POST["frase"];
        $codigo_resultante = codificarFrase($frase_original, $proverbiosCypher);
        echo $codigo_resultante;
    } else {
        echo "Campo 'chosen_Cripto' não está definido.";
    }
}

?>