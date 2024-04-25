<?php
    $isbn = filter_input(INPUT_POST, 'isbn');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO exemplar (isbn) 
                       VALUES (?)";
    
    $stmtseguranca = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "s", $isbn);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');
?>