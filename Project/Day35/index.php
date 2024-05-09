
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--passando parametros atraves do link 
   <a href="produto.php?codigo=345&status=Ativo"> meus produtos</a>-->
   
<h1>Produtos</h1>
   <hr>
   <table>
    <thead>
<tr>
    <td>codigo</td>
    <td>nome</td>
    <td>ver</td>
    </thead>

    <tbody>
        <tr>
        <td>2</td>
        <td>Coca cola</td>
        <td><a href="produto.php?arquivo=2.json"> detalhes/a></td>
</tr>
<tr>
    <td>3</td>
    <td>fanta</td>
    <td><a href="produto.php?arquivo=2.json"> detalhes/a></td>
   </table>
</body>
</html>