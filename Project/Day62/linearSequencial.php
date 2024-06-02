<?php

//similar a array, nao é tão utilizada por ser praticamente um vetor

class SequentialList {
    private $elements; // Vetor para armazenar os elementos

    // Construtor para criar uma lista vazia com capacidade inicial
    public function __construct($capacity) {
        $this->elements = array_fill(0, $capacity, null);
    }

    // Função para adicionar um elemento ao final da lista
    public function append($element) {
        $this->elements[] = $element;
    }

    // Função para imprimir os elementos da lista
    public function printList() {
        foreach ($this->elements as $element) {
            echo $element . " ";
        }
    }
}

// Exemplo de uso
$list = new SequentialList(5);
$list->append(1);
$list->append(2);
$list->append(3);
$list->printList(); // Saída: 1 2 3


/*
Uma Lista Linear Sequencial, também conhecida como Array ou Vetor em algumas linguagens de programação, é uma estrutura de dados que organiza elementos de forma contígua na memória. Aqui estão algumas situações em que uma Lista Linear Sequencial pode ser útil:

    Acesso Aleatório e Rápido: Uma lista sequencial permite acesso rápido aos elementos através de índices. Isso significa que você pode acessar qualquer elemento diretamente, sem precisar percorrer toda a lista. Isso é útil quando você precisa acessar elementos de forma aleatória.

    Espaço Contíguo na Memória: Os elementos de uma lista sequencial são armazenados em um espaço contíguo na memória, o que facilita operações como cópia e transferência de dados. Isso é útil em situações onde a localidade espacial é importante.

    Implementação de Estruturas de Dados Simples: Listas sequenciais são frequentemente usadas como base para implementar outras estruturas de dados mais complexas, como pilhas, filas e árvores. Elas oferecem uma base sólida para construir estruturas mais avançadas.

    Operações de Ordenação e Busca Eficientes: Devido ao acesso aleatório, listas sequenciais são adequadas para algoritmos de ordenação e busca eficientes, como busca binária e algoritmos de ordenação como o QuickSort e o MergeSort.

    Facilidade de Implementação e Uso: Listas sequenciais são fáceis de entender e implementar, tornando-as uma escolha popular em muitas situações de programação.




        Facilidade de Uso:
        Utilizar um array em PHP é mais simples e direto do que implementar uma lista sequencial do zero. O PHP fornece muitas funções nativas para lidar com arrays, como array_push(), array_pop(), array_shift(), array_unshift(), entre outras, que facilitam a manipulação de elementos.

    Limitações de Tamanho:
        Um array em PHP é dinâmico, o que significa que ele pode crescer ou encolher conforme necessário. Não há uma capacidade máxima definida, ao contrário de uma lista sequencial que geralmente é inicializada com um tamanho fixo.

    Eficiência de Memória:
        Em PHP, arrays dinâmicos podem alocar mais memória do que o necessário, já que eles podem crescer dinamicamente. Uma lista sequencial inicializada com um tamanho fixo pode ser mais eficiente em termos de memória, especialmente se você sabe de antemão quantos elementos serão armazenados.

    Controle sobre a Implementação:
        Implementar sua própria Lista Linear Sequencial oferece controle total sobre como os elementos são armazenados e manipulados. Isso pode ser útil se você precisa de funcionalidades específicas que não são fornecidas pelos arrays padrão do PHP.

Em suma, usar um array em PHP é mais conveniente na maioria das situações simples. No entanto, se você precisa de um controle mais preciso sobre o armazenamento de elementos, limitações de tamanho ou deseja entender melhor como as estruturas de dados funcionam, implementar sua própria Lista Linear Sequencial pode ser benéfico como um exercício de aprendizado.


*/