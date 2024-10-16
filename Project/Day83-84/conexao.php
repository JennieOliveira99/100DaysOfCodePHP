<?php

$server = "localhost";
$user = "root";
$pass = ""; 
$bd = "empresa";

$conn = mysqli_connect($server, $user, $pass, $bd);

if ($conn) {
   // echo "Conexão bem-sucedida!";
} else {
    echo "Erro: " . mysqli_connect_error();
}

function mensagem($texto, $tipo) {
    echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
}
?>
