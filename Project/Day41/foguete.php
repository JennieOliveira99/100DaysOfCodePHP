<?php

class Foguete {
    // Propriedades
    public $velocidade = 0; // em km/h
    public $altitude = 0; // em metros
    public $ligado = false;

    // Métodos
    public function ligar() {
        $this->ligado = true;
        echo "Foguete ligado.<br>";
    }

    public function desligar() {
        $this->ligado = false;
        echo "Foguete desligado.<br>";
    }

    public function aumentarVelocidade($valor) {
        if ($this->ligado) {
            $this->velocidade += $valor;
            echo "Velocidade aumentada para {$this->velocidade} km/h.<br>";
        } else {
            echo "O foguete está desligado, não é possível aumentar a velocidade.<br>";
        }
    }

    public function diminuirVelocidade($valor) {
        if ($this->ligado) {
            $this->velocidade -= $valor;
            if ($this->velocidade < 0) {
                $this->velocidade = 0;
            }
            echo "Velocidade diminuída para {$this->velocidade} km/h.<br>";
        } else {
            echo "O foguete está desligado, não é possível diminuir a velocidade.<br>";
        }
    }

    public function alterarAltitude($valor) {
        if ($this->ligado) {
            $this->altitude += $valor;
            echo "Altitude alterada para {$this->altitude} metros.<br>";
        } else {
            echo "O foguete está desligado, não é possível alterar a altitude.<br>";
        }
    }
}

// Criar objeto Foguete
$foguete = new Foguete();

// Operações com o foguete
$foguete->ligar();
$foguete->aumentarVelocidade(1000);
$foguete->alterarAltitude(5000);
$foguete->diminuirVelocidade(500);
$foguete->desligar();
