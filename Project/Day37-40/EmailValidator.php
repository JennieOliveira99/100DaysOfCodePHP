<?php

class EmailValidator {
    public static function validate($email) { //o método pertence à classe em si, e não a instâncias específicas da classe. Isso significa que você pode chamar o método validate() diretamente, sem precisar criar um objeto da classe EmailValidator
       //validate() : método 
        // Verificando se o e-mail possui um formato válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }
}

//EmailValidator::validate($email), está chamando diretamente o método validate() da classe EmailValidator sem precisar instanciar a classe
// Isso é útil quando se tem métodos que são mais úteis em um contexto geral e não dependem do estado de uma instância específica da classe
