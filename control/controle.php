<?php
    include '../model/crudUsuario.php';
    $opcao = $_POST['opcao'];
    switch($opcao){
        case 'cadastrar':
            $verifica_registro = registraUsuario($_POST['nome'], sha1($_POST['senha']));
            if($verifica_registro){
                echo  "<script>alert('Usuário já cadastrado.');</script>";
                echo  "<script>window.location='../view/telaLogin.html';</script>";
            } else {
                echo  "<script>alert('Usuário cadastrado com sucesso!');</script>";
                echo  "<script>window.location='../view/telaLogin.html';</script>";
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
        case 'editar':
            edita($_POST['nome_user'], sha1($_POST['senha_user']));
            break;
        default:
            echo "Opção inválida!";
    }
?>