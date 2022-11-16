<?php
    include 'conexaobd.php';
    function cadastra($genero){
        conect();
        $busca_genero = query("SELECT * FROM genero WHERE nome = '$genero'");
        if(mysqli_num_rows($busca_genero)){
            $registrado = true;
        } else {
            $registrado = false;
            if(!empty($_POST['genero'])){
                query("INSERT INTO genero(nome) VALUE('$genero')");
            } else {
                echo "Gênero não pode ser vazio!";
            }
        }
        close();
        return $registrado;
    }
?>