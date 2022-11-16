<?php
    include 'conexaobd.php';
    function cadastra($genero){
        conect();
        $busca_genero = query("SELECT * FROM genero WHERE nome = '$genero'");
        if(mysqli_num_rows($busca_genero)){
            $registrado = true;
        } else {
            $registrado = false;
            if(!empty($_GET['genero'])){
                query("INSERT INTO genero(nome) VALUE('$genero')");
            } else {
                echo "Gênero não pode ser vazio!";
            }
        }
        close();
        return $registrado;
    }
    function listarGenero(){
        conect();
        $dados = query("SELECT * FROM genero ORDER BY nome");
        close();
        $row = [];
        if (mysqli_num_rows($dados) > 0) {
            while ($rows = mysqli_fetch_assoc($dados)) {
                $row[] = $rows;
            }
        }
        return $row;
    }
    function listarGeneroEditar($id){
        conect();
        $dados = query("SELECT * FROM genero WHERE id = $id");
        close();
        
        if (mysqli_num_rows($dados) > 0) {
            $row = mysqli_fetch_assoc($dados);
        }
        return $row;
    }
    function editarGenero($genero){
        
    }
?>