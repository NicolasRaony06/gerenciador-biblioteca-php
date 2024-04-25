<?php
    $data_emprestimo = filter_input(INPUT_POST, 'data_emprestimo');
    $data_devolu_prevista = filter_input(INPUT_POST, 'data_devolu_prevista');
    $data_devolu_efetuada = filter_input(INPUT_POST, 'data_devolu_efetuada');
    $isbn_livro = filter_input(INPUT_POST, 'isbn_livro');
    $id_exemplar = filter_input(INPUT_POST, 'id_exemplar');
    $usuario_cpf = filter_input(INPUT_POST, 'usuario_cpf');

    $hostname = 'localhost';
    $password = '';
    $username = 'root';
    $bdname = 'gerenciador_biblioteca';

    $conexao = mysqli_connect(hostname:$hostname, password:$password, username:$username, database:$bdname);

    if (mysqli_connect_errno()) {
        die("Error de conexão:" . mysqli_connect_errno());
    }

    $inserircomando = "INSERT INTO emprestimo (data_emprestimo, data_devolu_prevista, data_devolu_efetuada, isbn_livro, id_exemplar, usuario_cpf) 
                       VALUES (?, ?, ?, ?, ?, ?)";
    
    $stmtseguranca = mysqli_stmt_init($conexao);

    if ( ! mysqli_stmt_prepare($stmtseguranca, $inserircomando)) {
        die(mysqli_error($conexao));
    }

    mysqli_stmt_bind_param($stmtseguranca, "ssssss", $data_emprestimo, $data_devolu_prevista, $data_devolu_efetuada, $isbn_livro, $id_exemplar, $usuario_cpf);

    mysqli_stmt_execute($stmtseguranca);

    header('Location: http://localhost/PHP%20BD/lobby');
?>