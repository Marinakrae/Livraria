<?php
    include '../model/crudLivro.php';
    $opcao = $_GET['opcao'];
    switch ($opcao) {
        case 'cadastrar':
            $verificaRegistro = cadastra($_GET['titulo'], $_GET['genero'], $_GET['ano']);
            if($verificaRegistro){
                echo "Livro já cadastrado.";
            } else {
                echo "Livro cadastrado com sucesso!";
            }
            break;
        case 'editar':
            break;
        case 'deletar':
            deletarLivro($_GET['id']);
            header('location: ../view/livros.php');
            break;
        default:
            
            break;
    }
?>
