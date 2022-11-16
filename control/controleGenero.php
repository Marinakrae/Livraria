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
            
        default:
            
            break;
    }
?>
