<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM endereco";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta de Endereços</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1200px; line-height: 50px;" >
            <tr>
                <th colspan="5"><h1>Consulta de Endereços</h1></th>  
            </tr>
            <tr>
                <th>ID</th>
                <th>Rua</th> 
                <th>Bairro</th>
                <th>Cidade</th>
                <th>Número da Residência</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['id_endereco']; ?></td>
                    <td><?php echo $linha['rua']; ?></td>
                    <td><?php echo $linha['bairro']; ?></td>
                    <td><?php echo $linha['cidade']; ?></td>
                    <td><?php echo $linha['numero_residencia']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>