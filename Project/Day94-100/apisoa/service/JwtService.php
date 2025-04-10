<?php
//definir uma constante
define('CHAVE_PRIVADA', 'fatec2024');


class JWTService{
    public static function gerarJWT(){
        //1-Definir uma chave privada para a assinatura
        //fizemos ali em cima

        //2-Criar o json no header com os campos obrigatórios
        $header = json_encode([
            'alg'=>'HS256',
            'typ'=>'JWT'
        ]);
        //3-Criar o PAYLOAD (corpo do token), com as minhas informações
        $payload = json_encode([
            'id_usuario'=>23,
            'usuario'=>'ADMIN',
            'iat'=>time(),
            'exp'=>time()+3600, //quando o tokem vai expirar
        ]);
        //4- Tratar caracteres que causam problema
        //+,/,=
        $base64Header=base64_encode($header);
        $base64Payload=base64_encode($payload);

        $base64Header = JwtService::replaceCaracteresParaGerarJwt($base64Header);
        $base64Payload = JwtService::replaceCaracteresParaGerarJwt($base64Payload);

        //5- Assinar a String (header + payload) usando a função HMAC SHA256
        $assinatura=hash_hmac('SHA256',"$base64Header.$base64Payload",CHAVE_PRIVADA, true);
        $base64Assinatura=base64_encode($assinatura);
        $base64Assinatura= JWTService::replaceCaracteresParaGerarJwt($base64Assinatura);

        //6- Retornar o token para quem pediu
        return "$base64Header.$base64Payload.$base64Assinatura";


    }

    private static function replaceCaracteresParaGerarJwt($dados){
        return str_replace(['+','/','='],['-','_',''],$dados);

    }
}