<?php
    $data_reserva = filter_input(INPUT_POST, 'data_reserva');
    $isbn_livro = filter_input(INPUT_POST, 'isbn_livro');
    $status_reserva = filter_input(INPUT_POST, 'status_reserva');
    $cpf_usuario = filter_input(INPUT_POST, 'cpf_usuario');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO reserva (data_reserva, isbn_livro, status_reserva, cpf_usuario) 
                       VALUES (?, ?, ?, ?)";
    
    $stmtseguranca = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "ssss", $data_reserva, $isbn_livro, $status_reserva, $cpf_usuario);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');
?>