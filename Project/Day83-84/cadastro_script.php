<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    
<div class="container">
    <div class="row">

        <?php
        include "conexao.php";
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $data_nascimento = $_POST['data_nascimento'];

        $sql = "INSERT INTO `pessoas`
        (`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES 
        ('$nome','$endereco','$telefone','$email','$data_nascimento')";

        
        if(mysqli_query($conn, $sql)){
            mensagem ("$nome cadastrado com sucesso", 'sucess');
        } else{
            mensagem ("$nome não cadastrado ", 'danger');
        }





?>
    </div>
</div>


</body>
</html>