<?php
    include 'conexaobd.php';
    function registraUsuario($nome, $senha){
        conect();
        $buscaUsuario = query("SELECT nome FROM usuarios WHERE nome = '$nome'");
        if(mysqli_num_rows($buscaUsuario) > 0){
            $registrado = true;
        } else {
            if(!empty($_POST['nome'] && !empty($_POST['senha']))){
                $registrado = false;
                query("INSERT INTO usuarios(nome, senha) VALUES('$nome', '$senha')");
            } elseif(empty($_POST['nome'])){
                echo "Nome não pode ser vazio.";
            } elseif(empty($_POST['senha'])){
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
        $valida_usuario = query("SELECT nome, senha FROM usuarios WHERE nome = '$nome'");
        $dados = mysqli_fetch_array($valida_usuario);
        if(mysqli_num_rows($valida_usuario) == 0){
            echo "Usuário não encontrado!";
        } elseif($nome == $dados['nome'] && $senha != $dados['senha']){
            echo "Senha incorreta!";
        } else {
            session_start();
            $_SESSION['nome'] = $_POST['nome'];
            header("Location: ../view/paginaInicial.php");
        }
        close();
    }
?>