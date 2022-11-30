<?php
    include '../model/crudUsuario.php';
    $opcao = $_GET['opcao'];
    switch($opcao){
        case 'cadastrar':
            $verifica_registro = registraUsuario($_GET['nome'], sha1($_GET['senha']));
            if($verifica_registro){
                echo  "<script>alert('Usuário já cadastrado.');</script>";
                echo  "<script>window.location='../view/telaLogin.html';</script>";
            } else {
                echo  "<script>alert('Usuário cadastrado com sucesso!');</script>";
                echo  "<script>window.location='../view/telaLogin.html';</script>";
            }
            break;
        case 'logar':
            acessa($_GET['nome'], sha1($_GET['senha']));
            break;
        case 'sair':
            session_start();
            session_destroy();
            header('location: ../view/telaLogin.html');
            break;
        case 'editar':
            edita($_GET['id'], $_GET['nome_user'], $_GET['senha_user']);
            break;
        case 'deletar':
            apaga($_GET['id']);
            session_start();
            session_destroy();
            header('location: ../view/telaLogin.html');
            break;
        default:
            echo "Opção inválida!";
    }
?>