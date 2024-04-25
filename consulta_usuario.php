<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM usuario";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta Usuário</title>
    </head>
    <body>
        <table align="center" border="25px" style="width: 1200px; line-height: 50px;" >
            <tr>
                <th colspan="9"><h1>Consulta Usuário</h1></th>  
            </tr>
            <tr>
                <th>CPF</th>
                <th>Nome</th> 
                <th>Endereço_ID</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Data de Nascimento</th>
                <th>Pendências</th>
                <th>Curso</th>
                <th>Data de Ingresso</th>
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['cpf']; ?></td>
                    <td><?php echo $linha['nome_completo']; ?></td>
                    <td><?php echo $linha['endereco_id']; ?></td>
                    <td><?php echo $linha['telefone']; ?></td>
                    <td><?php echo $linha['email']; ?></td>
                    <td><?php echo $linha['data_nascimento']; ?></td>
                    <td><?php echo $linha['pendencias']; ?></td>
                    <td><?php echo $linha['curso']; ?></td>
                    <td><?php echo $linha['data_de_ingresso']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <br>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>