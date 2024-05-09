<?php

// Definindo a constante para o limite de solicitações por minuto
define('MAX_REQUESTS_PER_MINUTE', 10);

// Inicializando a fila de solicitações (vazia no início)
$filaDeSolicitacoes = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $nomeLivro = $_POST["nome_livro"];
    $categoria = $_POST["categoria"];
    $autor = $_POST["autor"];
    $nomeUsuario = $_POST["nome"];
    $email = $_POST["email"];

    // Verificar se o número de solicitações na fila excede o limite
    if (count($filaDeSolicitacoes) >= MAX_REQUESTS_PER_MINUTE) {
        // Limite de solicitações excedido
        echo "Limite de solicitações excedido. Tente novamente mais tarde.";
        exit;
    }

    // Adicionar a nova solicitação à fila
    $novaSolicitacao = [
        "nome_livro" => $nomeLivro,
        "categoria" => $categoria,
        "autor" => $autor,
        "nome_usuario" => $nomeUsuario,
        "email" => $email
    ];

    array_push($filaDeSolicitacoes, $novaSolicitacao);

// Exibir mensagem de sucesso para o usuário
// Exibir mensagem de sucesso para o usuário
echo "<link rel='stylesheet' type='text/css' href='style.css'>";
echo "<div class='message-container'>";
echo "<p class='success-message'>Obrigado, $nomeUsuario! Você solicitou o livro '$nomeLivro'. Aguarde e em breve adicionaremos!</p>";
echo "</div>";


}

// Função para processar uma solicitação (substitua pela lógica real de processamento)
function processarSolicitacao($solicitacao) {
    // Lógica para processar a solicitação aqui
}

// Processamento das solicitações na fila (em um cron job ou script agendado)
foreach ($filaDeSolicitacoes as $solicitacao) {
    // Processar a solicitação
    processarSolicitacao($solicitacao);

    // Remover a solicitação da fila
    $filaDeSolicitacoes = array_diff($filaDeSolicitacoes, [$solicitacao]);

    // Verificar o tempo de execução e aguardar um intervalo antes de processar a próxima solicitação
    usleep(60000000 / MAX_REQUESTS_PER_MINUTE); // Aguarda 60 segundos dividido pelo número máximo de solicitações
}

?>
