php_code = """<?php
// Lista Linear Sequencial em PHP

// 1. Criação de uma lista de compras (inicialmente vazia)
// A lista é representada por um array em PHP.
$listaCompras = [];

// 2. Adicionando elementos na lista (sequencialmente)
// Utilizamos o operador [] para adicionar itens ao array.
$listaCompras[] = "Maçã";
$listaCompras[] = "Banana";
$listaCompras[] = "Laranja";

// 3. Exibindo os elementos da lista
// Utilizamos um loop foreach para percorrer cada item do array e exibi-los.
echo "Lista de Compras:\\n";
foreach ($listaCompras as $item) {
    echo "- $item\\n";
}

// 4. Acessando um elemento específico da lista pelo índice
// Lembrando que o índice do array começa em 0.
echo "\\nO segundo item da lista é: " . $listaCompras[1] . "\\n";

// 5. Adicionando um item no início da lista
// array_unshift() adiciona um item no começo do array.
array_unshift($listaCompras, "Uva");
echo "\\nLista após adicionar 'Uva' no início:\\n";
print_r($listaCompras);

// 6. Removendo o último item da lista
// array_pop() remove o último elemento do array.
array_pop($listaCompras);
echo "\\nLista após remover o último item:\\n";
print_r($listaCompras);

// 7. Removendo um item específico da lista
// unset() remove o elemento pelo índice especificado.
unset($listaCompras[1]); // Remove "Maçã"
echo "\\nLista após remover o item no índice 1:\\n";
print_r($listaCompras);

// 8. Reindexando os índices do array
// array_values() reorganiza os índices do array, começando do zero.
$listaCompras = array_values($listaCompras);
echo "\\nLista após reindexar:\\n";
print_r($listaCompras);