<?php
    $titulo = filter_input(INPUT_POST, 'titulo');
    $isbn = filter_input(INPUT_POST, 'isbn');
    $categoria = filter_input(INPUT_POST, 'categoria');
    $numero_pag = filter_input(INPUT_POST, 'numero_pag');
    $ano_public = filter_input(INPUT_POST, 'ano_public');
    $quant_disponivel = filter_input(INPUT_POST, 'quant_disponivel');
    $autor_id = filter_input(INPUT_POST, 'autor_id');
    $editora_id = filter_input(INPUT_POST, 'editora_id');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO livro (titulo, isbn, categoria, numero_pag, ano_public, quant_disponivel, autor_id, editora_id) 
                       VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmtseguranca = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "ssssssss", $titulo, $isbn, $categoria, $numero_pag, $ano_public, $quant_disponivel, $autor_id, $editora_id);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');
?>