<?php
    $conexao;

    function conect(){
        global $conexao;
        $server  = 'localhost';
        $user    = 'root';
        $pass    = '';
        $banco   = 'livraria';
        $conexao = mysqli_conect($servidor, $user, $pass, $banco) or die(mysqli_conect_error());
    }

    function query($sql){
        global $conexao;
        mysqli_query($conexao, "SET CHARACTER SET utf8");
        $query = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
        return $query;
    }

    function close(){
        global $conexao;
        mysqli_close($conexao);
    }
?>