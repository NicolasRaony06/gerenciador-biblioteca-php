<?php
    $nome_tabela = filter_input(INPUT_POST, 'nome_tabela');
    $nome_id_tabela = filter_input(INPUT_POST, 'nome_id_tabela');
    $valor_id_tabela = filter_input(INPUT_POST, 'valor_id_tabela');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "DELETE FROM $nome_tabela WHERE ($nome_id_tabela = $valor_id_tabela)";

    $stmtseguranca = mysqli_prepare($conexao, $inserircomando);

    if (!mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_execute($stmtseguranca);

    $conexao->commit();

    header('Location: http://localhost/PHP%20BD/lobby');

?>
