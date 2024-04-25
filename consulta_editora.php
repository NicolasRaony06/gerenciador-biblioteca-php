<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM editora";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Consulta de Editoras</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1000px; line-height: 50px;" >
            <tr>
                <th colspan="9"><h1>Consulta de Editoras</h1></th>  
            </tr>
            <tr>
                <th>ID</th>
                <th>Nome</th> 
                <th>País</th>
                <th>Endereço ID</th>
                <th>Telefone</th>
                <th>E-mail</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['id_editora']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['pais']; ?></td>
                    <td><?php echo $linha['endereco_id']; ?></td>
                    <td><?php echo $linha['telefone']; ?></td>
                    <td><?php echo $linha['email']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>