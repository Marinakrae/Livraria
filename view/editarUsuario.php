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
            <a class="navbar-brand" href="index.html">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <form class="d-flex" action="index.html">
                <button class="btn btn-outline-light" type="submit">Voltar</button>
            </form>
        </div>
    </nav>
    <?php 
        include '../model/crudUsuario.php';
        $id = $_SESSION['id'];
        $row = listaUsuarioEditar($id); 
    ?>
    <div class="container">
        <form method="GET" action="../control/controle.php">
            <div class="mb-3">
                <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
                <label for="nome" class="form-label">Usuário</label>
                <input type="text" class="form-control" name="nome_user" value="<?php echo $row['nome']; ?>">
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Password</label>
                <input type="text" class="form-control" name="senha_user" value="<?php echo $row['senha']; ?>">
            </div>
                <button type="submit" class="btn btn-outline-light" name="opcao" value="editar">Editar</button><br>
        </form>
    </div>
</body>
</html>