<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM autores";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta de Autores</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1300px; line-height: 50px;" >
            <tr>
                <th colspan="9"><h1>Consulta de Autores</h1></th>  
            </tr>
            <tr>
                <th>ID</th>
                <th>Biografia</th> 
                <th>Nacionalidade</th>
                <th>Data de Nascimento</th>
                <th>Nome</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['id_autores']; ?></td>
                    <td><?php echo $linha['biografia']; ?></td>
                    <td><?php echo $linha['nacionalidade']; ?></td>
                    <td><?php echo $linha['data_nascimento']; ?></td>
                    <td><?php echo $linha['nome_completo']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>