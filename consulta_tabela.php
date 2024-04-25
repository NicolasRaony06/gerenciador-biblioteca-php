<?php
    $nome_tabelas = filter_input(INPUT_POST, 'nome_tabelas', FILTER_VALIDATE_INT);

    if ($nome_tabelas == 1) {
        header('Location: http://localhost/PHP%20BD/consulta_funcionario.php');
    }

    elseif ($nome_tabelas == 2) {
        header('Location: http://localhost/PHP%20BD/consulta_usuario.php');
    }

    elseif ($nome_tabelas == 3) {
        header('Location: http://localhost/PHP%20BD/consulta_autores.php');
    }

    elseif ($nome_tabelas == 4) {
        header('Location: http://localhost/PHP%20BD/consulta_endereco.php');
    }

    elseif ($nome_tabelas == 5) {
        header('Location: http://localhost/PHP%20BD/consulta_editora.php');
    }

    elseif ($nome_tabelas == 6) {
        header('Location: http://localhost/PHP%20BD/consulta_livro.php');
    }

    elseif ($nome_tabelas == 7) {
        header('Location: http://localhost/PHP%20BD/consulta_emprestimo.php');
    }

    elseif ($nome_tabelas == 8) {
        header('Location: http://localhost/PHP%20BD/consulta_reserva.php');
    }

    elseif ($nome_tabelas == 9) {
        header('Location: http://localhost/PHP%20BD/consulta_exemplar.php');
    }
?>
