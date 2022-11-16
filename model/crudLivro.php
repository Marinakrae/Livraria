<?php
    include 'conexaobd.php';
    function cadastra($livro, $genero, $ano){
        conect();
        $busca_livro  = query("SELECT * FROM livros WHERE nome = '$livro'");
        $busca_genero = query("SELECT id FROM genero WHERE nome = '$genero'");        
        $id_genero = mysqli_fetch_assoc($busca_genero);
        $id = $id_genero['id'];
        if(mysqli_num_rows($busca_livro)){
            $registrado = true;
        } else {
            $registrado = false;
            if(!empty($_POST['genero'])){
                query("INSERT INTO livros(nome, id_genero, ano) VALUE('$livro', $id, '$ano')");
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

    function listarLivro(){
        conect();
        $dados = query("SELECT l.id, l.nome AS 'Título', l.ano AS 'Lançamento', g.nome AS 'Gênero' FROM livros l JOIN genero g ON l.id_genero = g.id");
        close();
        $row = [];
        if (mysqli_num_rows($dados) > 0) {
            while ($rows = mysqli_fetch_assoc($dados)) {
                $row[] = $rows;
            }
        }
        return $row;
    }
?>