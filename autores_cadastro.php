<?php
    $id_autores = filter_input(INPUT_POST, 'id_autores');
    $nome_completo = filter_input(INPUT_POST, 'nome_completo');
    $biografia = filter_input(INPUT_POST, 'biografia');
    $nacionalidade = filter_input(INPUT_POST, 'nacionalidade');
    $data_nascimento = filter_input(INPUT_POST, 'data_nascimento');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO utores (id_autores, nome_completo, biografia, nacionalidade, data_nascimento) 
                       VALUES (?, ?, ?, ?, ?)";
    
    $stmtseguranca = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "sssss", $id_autores, $nome_completo, $biografia, $nacionalidade, $data_nascimento);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');
?>