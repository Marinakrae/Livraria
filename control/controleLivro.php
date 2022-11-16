<?php
    include '../model/crudLivro.php';
    $opcao = $_POST['opcao'];
    switch ($opcao) {
        case 'cadastrar':
            $verificaRegistro = cadastra($_POST['titulo'], $_POST['genero'], $_POST['ano']);
            if($verificaRegistro){
                echo "Livro já cadastrado.";
            } else {
                echo "Livro cadastrado com sucesso!";
            }
            break;
        default:
            
            break;
    }
?>
