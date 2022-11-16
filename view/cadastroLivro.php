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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="cadastroGenero.html">Cadastrar gênero</a>
                    </li>
                </ul>
                <form class="d-flex" method="POST" action="../control/controle.php">
                    <button class="btn btn-outline-light" type="submit" name="opcao" value="sair">Sair</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <form method="POST" action="../control/controleLivro.php">
            <div class="mb-3">
                <label for="nome_titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="nome_titulo" name="titulo">
                <label for="ano_lanc" class="form-label">Ano</label>
                <input type="text" class="form-control" id="ano_lanc" name="ano">
                <label for="generos" class="form-label">Gênero</label>
                <input class="form-control" list="genero" id="generos" name="genero" placeholder="Digite para buscar...">
                <datalist id="genero">
                    <?php
                        include '../model/crudLivro.php';
                        $row = listarGenero();
                        foreach($row as $rows){
                            echo "<option value='$rows[nome]'>";
                        }
                    ?>
                </datalist>
            </div>
            <button type="submit" class="btn btn-outline-light" name="opcao" value="cadastrar">Cadastrar</button>
        </form>
    </div>
</body>
</html>