<?php
    session_start();
    if(empty($_SESSION['nome'])){
        header('location:telaLogin.html');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Banch</title>
    <!-- Links necessários para funcionamento do JavaScript e Bootstrap -->
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Fim JavaScript e Bootstrap -->
</head>
<body class="color">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #FF8FB1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="paginaInicial.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <form class="d-flex" method="GET" action="../control/controle.php">
                    <button class="btn btn-outline-light" type="submit" name="opcao" value="sair">Sair</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Senha</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Apagar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include '../model/crudUsuario.php';
                    $id = $_SESSION['id'];
                    $row = listaUsuarioEditar($id);
                    echo "<tr>";
                        echo "<td>", $row['id'], "</td>";
                        echo "<td>", $row['nome'], "</td>";
                        echo "<td>", $row['senha'], "</td>";
                        echo "<td><a href='editarUsuario.php?id=$row[id]'>Editar</a></td>";
                        echo "<td><a href='../control/controleGenero.php?id=$row[id]&opcao=deletar'>Apagar</a></td>";
                    echo "</tr>";
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>