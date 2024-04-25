<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM reserva";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta de Reservas</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1200px; line-height: 50px;" >
            <tr>
                <th colspan="5"><h1>Consulta de Reservas</h1></th>  
            </tr>
            <tr>
                <th>ID</th>
                <th>Data de Reserva</th> 
                <th>Status da Reserva</th>
                <th>ISBN do Livro</th>
                <th>CPF do Usuário</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['id_reserva']; ?></td>
                    <td><?php echo $linha['data_reserva']; ?></td>
                    <td><?php echo $linha['status_reserva']; ?></td>
                    <td><?php echo $linha['isbn_livro']; ?></td>
                    <td><?php echo $linha['cpf_usuario']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>