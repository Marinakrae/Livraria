<?php
    include 'conexaobd.php';
    function registraUsuario($nome, $senha){
        conect();
        $buscaUsuario = query("SELECT nome FROM usuarios WHERE nome = '$nome'");
        if(mysqli_num_rows($buscaUsuario) > 0){
            $registrado = true;
        } else {
            if(!empty($_GET['nome'] && !empty($_GET['senha']))){
                $registrado = false;
                query("INSERT INTO usuarios(nome, senha) VALUES('$nome', '$senha')");
            } elseif(empty($_GET['nome'])){
                echo "Nome não pode ser vazio.";
            } elseif(empty($_GET['senha'])){
                echo "Senha não pode ser vazia.";
            } else {
                echo "Nome e senha não podem ser vazios.";
            }
        }
        close();
        return $registrado;
    }
    function acessa($nome, $senha){
        conect();
        $valida_usuario = query("SELECT id, nome, senha FROM usuarios WHERE nome = '$nome'");
        $dados = mysqli_fetch_array($valida_usuario);
        if(mysqli_num_rows($valida_usuario) == 0){
            echo  "<script>alert('Usuário não encontrado.');</script>";
            echo "<script>window.location='../view/telaLogin.html';</script>";
        } elseif($nome == $dados['nome'] && $senha != $dados['senha']){
            echo  "<script>alert('Senha incorreta');</script>";
            echo "<script>window.location='../view/telaLogin.html';</script>";
        } else {
            session_start();
            $_SESSION['id'] = $dados['id'];
            $_SESSION['nome'] = $_GET['nome'];
            header("Location: ../view/paginaInicial.php");
        }
        close();
    }
    function listaUsuarioEditar($id){
        conect();
        $query = query("SELECT * FROM usuarios WHERE id = $id");
        close();
        if(mysqli_num_rows($query)){
            $row = mysqli_fetch_assoc($query); 
        }
        return $row;
    }
    function edita($id, $nome, $senha){
        session_start();
        conect();
        $dados = query("SELECT * FROM usuarios WHERE id = $id");
        $row = mysqli_fetch_assoc($dados);
        $id = $row['id'];
        if(($nome != $row['nome'])){
            query("UPDATE usuarios SET nome = '$nome' WHERE id = $id");
            unset($_SESSION['nome']);
            $_SESSION['nome'] = $nome;
            echo  "<script>alert('Nome e senha atualizados com sucesso!');</script>";
            echo  "<script>window.location='../view/paginaInicial.php';</script>";

        } else if($nome != $row['nome'] && $senha != $row['senha']){
            query("UPDATE usuarios SET nome = '$nome' AND senha = '$senha' WHERE id = $id");
            $_SESSION['nome'] = $nome;

            echo  "<script>alert('Nome atualizado com sucesso!');</script>";
            echo  "<script>window.location='../view/paginaInicial.php';</script>";

        } else if ($senha != $row['senha']){

            query("UPDATE usuarios SET senha = '$senha' WHERE id = $id");

            echo  "<script>alert('Senha atualizada com sucesso!');</script>";
            echo  "<script>window.location='../view/paginaInicial.php';</script>";

        }
        close();
    }
?>