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
            if(!empty($_GET['titulo'])){
                query("INSERT INTO livros(nome, id_genero, ano) VALUE('$livro', $id, '$ano')");
            }
        }
        close();
        return $registrado;
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
    function listarLivroEditar($id){
        conect();
        $dados = query("SELECT l.id, l.nome AS 'Título', l.ano AS 'Lançamento', g.nome AS 'Gênero' FROM livros l JOIN genero g ON l.id_genero = g.id WHERE l.id = '$id'");
        close();
        if (mysqli_num_rows($dados) > 0) {
            $row = mysqli_fetch_assoc($dados);
        }
        return $row;
    }
    function deletarLivro($id){
        conect();
        query("DELETE FROM livros WHERE id = '$id'");
        close();
    }
    function editarLivro($id, $titulo, $ano){
        conect();
        $dados = query("SELECT * FROM livros WHERE id = $id");
        $row = mysqli_fetch_assoc($dados);
        if($titulo != $row['nome'] && $ano != $row['ano']){
            query("UPDATE livros SET nome = '$titulo', ano = $ano");
            echo  "<script>alert('Título e ano editados com sucesso.');</script>";
            echo "<script>window.location='../view/livros.php';</script>";
        } else if($titulo != $row['nome']){
            query("UPDATE livros SET nome = '$titulo'");
            echo  "<script>alert('Título editado com sucesso.');</script>";
            echo "<script>window.location='../view/livros.php';</script>";
        } else {
            query("UPDATE livros SET ano = $ano");
            echo  "<script>alert('Ano editado com sucesso.');</script>";
            echo "<script>window.location='../view/livros.php';</script>";
        }
    }
?>