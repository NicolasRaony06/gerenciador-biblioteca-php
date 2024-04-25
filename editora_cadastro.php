<?php
    $nome = filter_input(INPUT_POST, 'nome');
    $pais = filter_input(INPUT_POST, 'pais');
    $endereco_id = filter_input(INPUT_POST, 'endereco_id');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');

    $hostname = 'localhost';
    $password = '';
    $bdnome = 'gerenciador_biblioteca';
    $username = 'root';

    $conexao = mysqli_connect(hostname: $hostname, password: $password, database: $bdnome, username: $username);

    $stmtseguranca = mysqli_stmt_init($conexao);

    if (mysqli_connect_errno()) {
        die('Error conexão:' . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO editora (nome, pais, endereco_id, telefone, email) VALUES (?, ?, ?, ?, ?)";

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, 'sssss', $nome, $pais, $endereco_id, $telefone, $email);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');

?>