<?php
    include '../model/crudGenero.php';
    $opcao = $_POST['opcao'];
    switch ($opcao) {
        case 'cadastrar':
            $verificaRegistro = cadastra($_POST['genero']);
            if($verificaRegistro){
                echo "Gênero já cadastrado.";
            } else {
                header('location: ../view/genero.php');
            }
            break;
        default:
            
            break;
    }
?>
