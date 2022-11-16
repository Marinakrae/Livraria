<?php
    include 'conexaobd.php';
    function registraUsuario($nome, $senha){
        conect();
        $buscaUsuario = query("SELECT nome FROM usuarios WHERE nome = '$nome'");
        if(mysqli_num_rows($buscaUsuario) > 0){
            $registrado = true;
        } else {
            query("INSERT INTO usuarios(nome, senha) VALUES('$nome', '$senha')");
            $registrado = false;
        }
        close();
        return $registrado;
    }
    function acessa($nome, $senha){
        $teste = query("SELECT nome, senha FROM usuarios WHERE nome = '$nome'");
        if(mysqli_num_rows($teste) > 0){
            echo "Acesso permitido!";
        }
    }
?>