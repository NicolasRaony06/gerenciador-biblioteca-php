<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM emprestimo";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta de Empréstimos</title>
    </head>
    <body>
        <table align='center' border="5px" style="width: 1200px; line-height: 50px;" >
            <tr>
                <th colspan="9"><h1>Consulta de Empréstimos</h1></th>  
            </tr>
            <tr>
                <th>ID</th>
                <th>Data do Empréstimo</th> 
                <th>Data de Devolução Prevista</th>
                <th>Data de Devolução Efetuada</th>
                <th>Status do Empréstimo</th>
                <th>ISBN do Livro</th>
                <th>ID do Exemplar</th>
                <th>CPF do Usuário</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['id_emprestimo']; ?></td>
                    <td><?php echo $linha['data_emprestimo']; ?></td>
                    <td><?php echo $linha['data_devolu_prevista']; ?></td>
                    <td><?php echo $linha['data_devolu_efetuada']; ?></td>
                    <td><?php echo $linha['status_emprestimo']; ?></td>
                    <td><?php echo $linha['isbn_livro']; ?></td>
                    <td><?php echo $linha['id_exemplar']; ?></td>
                    <td><?php echo $linha['usuario_cpf']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>