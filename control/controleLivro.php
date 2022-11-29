<?php
    include '../model/crudLivro.php';
    $opcao = $_GET['opcao'];
    switch ($opcao) {
        case 'cadastrar':
            $verificaRegistro = cadastra($_GET['titulo'], $_GET['genero'], $_GET['ano']);
            if($verificaRegistro){
                echo  "<script>alert('Livro já cadastrado.');</script>";
                echo "<script>window.location='../view/cadastroLivro.php';</script>";
            } else {
                echo  "<script>alert('Livro cadastrado com sucesso.');</script>";
                echo "<script>window.location='../view/livros.php';</script>";
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
