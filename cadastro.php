<?php

    $nome = filter_input(INPUT_GET, 'nome');
    $sobrenome = filter_input(INPUT_GET, 'sobrenome');
    $data_Nascimento = filter_input(INPUT_GET, 'data_Nascimento');
    $sexo = filter_input(INPUT_GET, 'Sexo');
    $email = filter_input(INPUT_GET, 'email');
    $niveldeacesso = filter_input(INPUT_GET, 'acesso');
    $senha = filter_input(INPUT_GET, 'senha');

    $conexao = mysqli_connect('localhost', 'root', '', 'controledeusuarios') or die('Erro ao conectar');
    $inserir = "INSERT INTO usuarios VALUES('', '$nome', '$sobrenome',
    '$data_Nascimento', '$sexo', '$email', '$senha', '$niveldeacesso', now())";
    mysqli_query($conexao, $inserir) or die("Erro ao tentar cadastrar registro");
    mysqli_close($conexao);
    echo "Cliente cadastrado com sucesso!";
    
?>

<style>
    a{
        text-decoration: none;
        background-color: white;
        color: black;
        border: 2px solid black;
        padding:3px 3px; 
    }
</style>

<br><br><a href="forms.php"> Cadastrar novo usuário</a>
<br><br><a href="exibir.php"> Visualizar Usuarios</a>