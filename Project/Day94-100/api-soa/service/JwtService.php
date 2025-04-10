<?php
//passo 1 - definindo uma constante nome e valor(não deve ficar trocando senao invalida os tokens)
define('CHAVE_PRIVADA', 'fatec2024');

class JwtService{
    //todas as regras de negocio aqui e depois chamar no Controller
    //metodo para gerar o token
    public static function gerarJWT(){
        //***passos obrigatorios para gerar o token:
        //1- gerar assinatura com chave privada
        //2- criar o json que vai no header com os campos obrigatorios
        //3- criar o payload (corpo do token), com as informações
        //4- base 64 gera caracetres, tratar os caracteres que causam problemas
        //5- assinar a String(header + payload) usando a function HMAC(SHA256)
        //6- retornar o token para o usuario

        //1- gerar assinatura com chave privada

        //2- criar o json que vai no header com os campos obrigatorios

        $header = json_encode([
            'alg' => 'HS256',
            'typ' => 'JWT'
        ]);

        //3- criar o payload (corpo do token), com as informações
        $payload = json_encode([
            'id_usuario' => 23,
            'usuario' => 'ADMIN',
            'iat' => time(), //essa funcao retorna o timestamp que se esta tabalhoando
            'exp' => time() + 3600,// o token gerado vai expirar 3600 segundos apos gerado
        ]);

        //4- base 64 gera caracetres, tratar os caracteres que causam problemas
        //caractere que é gerado +, /, =
        //
        $base64Header = base64_encode($header);
        $base64Payload = base64_encode($payload);
        $base64Header = JwtService::replaceCaracteresParaGerarJWT($base64Header);
        $base64Payload = JwtService::replaceCaracteresParaGerarJWT($base64Payload);

        //5- assinar a String(header + payload) usando a function HMAC(SHA256)
        //concatenar os dois parametros
        $assinatura = hash_hmac('SHA256', "$base64Header.$base64Payload", CHAVE_PRIVADA, TRUE);//hash_hmac: FUNCAO NATIVA QUE realiza assinatura com base no argumento(recebe 4 parametros obrigatoriamnte)
        //convertendo assinatura em base 64
        $base64Assinatura = base64_encode($assinatura);
        $base64Assinatura = JwtService::replaceCaracteresParaGerarJWT($base64Assinatura);//limpando os caracetres

        //6- retornar o token para o usuario
        return "$base64Header.$base64Payload.$base64Assinatura";
        
    }

    //passo 4
    private static function replaceCaracteresParaGerarJWT($dados){
        //receber os caracteres +, /, =
        //return str_replace([],[], $dados);//primeiro array: os caracteres, 2° inserir o que quero substituir
        return str_replace(['+', '/', '='],['-', '_', ''], $dados);
    }
}