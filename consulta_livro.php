<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM livro";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta de Livros</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1300px; line-height: 50px;" >
            <tr>
                <th colspan="8"><h1>Consulta de Livros</h1></th>  
            </tr>
            <tr>
                <th>Título</th>
                <th>ISBN</th> 
                <th>Categoria</th>
                <th>Número de Páginas</th>
                <th>Ano de Publicação</th>
                <th>Quantidade disponível</th>
                <th>ID do Autor</th>
                <th>ID da Editora</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['titulo']; ?></td>
                    <td><?php echo $linha['isbn']; ?></td>
                    <td><?php echo $linha['categoria']; ?></td>
                    <td><?php echo $linha['numero_pag']; ?></td>
                    <td><?php echo $linha['ano_public']; ?></td>
                    <td><?php echo $linha['quant_disponivel']; ?></td>
                    <td><?php echo $linha['autor_id']; ?></td>
                    <td><?php echo $linha['editora_id']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>