<?php
    $cpf = filter_input(INPUT_POST, 'cpf');
    $nome = filter_input(INPUT_POST, 'nome');
    $cargo = filter_input(INPUT_POST, 'cargo');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $email = filter_input(INPUT_POST, 'email');
    
    $host = 'localhost';
    $dbname = 'gerenciador_biblioteca';
    $username = 'root';
    $password = '';

    $conexao = mysqli_connect(hostname: $host, 
                              database: $dbname, 
                              username: $username, 
                              password: $password);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }
    
    $inserir = "INSERT INTO funcionario (cpf, nome, cargo, telefone, email) VALUES (?, ?, ?, ?, ?)";

    $stmtseguranca = mysqli_stmt_init($conexao); 

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserir)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "sssss", $cpf, $nome, $cargo, $telefone, $email);

    mysqli_stmt_execute($stmtseguranca);


?> 