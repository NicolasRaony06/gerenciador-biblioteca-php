<?php
    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    $inserircomando = "SELECT * FROM exemplar";

    $resultado = mysqli_query($conexao, $inserircomando);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        
        <title>Consulta de Exemplares</title>
    </head>
    <body>
        <table align="center" border="5px" style="width: 600px; line-height: 50px;" >
            <tr>
                <th colspan="2"><h1>Consulta de Exemplares</h1></th>  
            </tr>
            <tr>
                <th>ID</th>
                <th>ISBN</th> 
            </tr>
        <?php
            while($linha=mysqli_fetch_assoc($resultado)) {

        ?>
                <tr>
                    <td><?php echo $linha['id_exemplar']; ?></td>
                    <td><?php echo $linha['isbn']; ?></td>
                </tr>
        <?php
            }
        ?>
        </table>
        <button><a href="LOBBY.html">Anterior</a></button>
    </body>
</html>