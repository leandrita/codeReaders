<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        echo (empty($_GET['id']))
            ? ((strpos($_SERVER['REQUEST_URI'], 'create')) ? "Agregando nuevo libro" : "Index")
            : ((strpos($_SERVER['REQUEST_URI'], 'show')) ? "Detalles del libro" . $_GET['id'] : "Actualizar libro" . $_GET['id']);
        ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../resources/css/style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#">
                <img class="logo" src="../../resources/img/Logo.png" alt="Logo" width="150" height="150">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/codeReaders/index.php">INICIO</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <form action="/codeReaders/view/book/store.php" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Título</label>
            <input type="text" name="titulo" required class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" id="author" name="autor" placeholder="">
        </div>
        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" id="description" name="descripcion" placeholder="">
        </div>
        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" aria-describedby="isbnHelp" placeholder="">
            <small id="isbnHelp" class="form-text text-muted">Introduce únicamente números.</small>
        </div>
        <div class="form-group">
            <label for="image">Sube una imagen:</label>
            <input type="file" class="form-control-file" id="image" name="imagen">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="/codeReaders/index.php" class="btn btn-danger">Cancelar</a>
    </form>

    <?php
    require_once("/Applications/MAMP/htdocs/codeReaders/view/head/footer.php");

    ?>