<?php
//classes
//é como um molde que define as propriedades e métodos que os objetos de um determinado tipo terão
//Esta classe pode ter propriedades como cor, modelo e ano, e métodos como ligar(), desligar(), acelerar() e frear()

class Carro {
    // Propriedades
    public $cor;
    public $modelo;
    public $ano;

    // Métodos
    public function ligar() {
        echo "O carro está ligado.";
    }

    public function acelerar() {
        echo "O carro está acelerando.";
    }

    public function frear() {
        echo "O carro está freando.";
    }
}
//Após definir a classe Carro, pode-se criar objetos específicos dela, cada um com suas próprias propriedades e comportamentos:

// Criar objetos Carro
$carro1 = new Carro();
$carro1->cor = "Azul";
$carro1->modelo = "Fusca";
$carro1->ano = 1975;

$carro2 = new Carro();
$carro2->cor = "Vermelho";
$carro2->modelo = "Civic";
$carro2->ano = 2020;

// Usar métodos dos objetos Carro
$carro1->ligar(); // Saída: O carro está ligado.
$carro2->acelerar(); // Saída: O carro está acelerando.
