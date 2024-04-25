<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM funcionario";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta Funcionário</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1200px; line-height: 50px;" >
            <tr>
                <th colspan="5"><h1>Consulta Funcionário</h1></th>  
            </tr>
            <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>Cargo</th>
                <th>Telefone</th>
                <th>E-mail</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['cpf']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td><?php echo $linha['cargo']; ?></td>
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