<?php
    include '../model/crudGenero.php';
    $opcao = $_GET['opcao'];
    switch ($opcao) {
        case 'cadastrar':
            $verificaRegistro = cadastra($_GET['genero']);
            if($verificaRegistro){
                echo "Gênero já cadastrado.";
            } else {
                header('location: ../view/genero.php');
            }
            break;
        case 'editar':
            editarGenero($_GET['id'], $_GET['genero']);
            header('location: ../view/genero.php');
            break;
        case 'deletar':
            deletarGenero($_GET['id']);
            header('location: ../view/genero.php');
            break;
        default:
            echo "Opção inválida!";
            break;
    }
?>
