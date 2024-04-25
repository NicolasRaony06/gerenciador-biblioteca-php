<?php
    $cpf = filter_input(INPUT_POST, 'cpf');
    $nome = filter_input(INPUT_POST, 'nome');
    $endereco_id = filter_input(INPUT_POST, 'endereco_id');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento');
    $pendencias = filter_input(INPUT_POST, 'pendencias');
    $curso = filter_input(INPUT_POST, 'curso');
    $data_de_ingresso = filter_input(INPUT_POST, 'data_de_ingresso');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO usuario (cpf, nome_completo, endereco_id, telefone, email, data_nascimento, pendencias, curso, data_de_ingresso) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmtseguranca = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "sssssssss", $cpf, $nome, $endereco_id, $telefone, $email, $data_nascimento, $pendencias, $curso, $data_de_ingresso);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');
?>