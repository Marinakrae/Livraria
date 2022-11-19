<?php
    include '../model/crudUsuario.php';
    $opcao = $_POST['opcao'];
    switch($opcao){
        case 'cadastrar':
            $verifica_registro = registraUsuario($_POST['nome'], sha1($_POST['senha']));
            if($verifica_registro){
                echo "Usuário já cadastrado";
            } else {
                header("Location: ../view/telaLogin.html");
            }
            break;
        case 'logar':
            acessa($_POST['nome'], sha1($_POST['senha']));
            break;
        case 'sair':
            session_start();
            session_destroy();
            header('location: ../view/telaLogin.html');
            break;
        default:
            echo "Opção inválida!";
    }
?>