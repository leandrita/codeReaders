<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$user = $obj->show($_GET['id']);
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
                    <li class="nav-item">
                        <a class="nav-link" href="view/book/create.php" onclick="abrirModal()">CREAR</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <form action="update.php" method="post" autocomplete="off">
        <h2>Modificando registro</h2>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-10">
                <input type="text" name="id" readonly class="form-control-plaintext" id="id" value="<?= $user[0] ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="titulo" class="col-sm-2 col-form-label">Nuevo título</label>
            <div class="col-sm-10">
                <input type="text" name="titulo" class="form-control" value="<?= $user[1] ?>" id="titulo">
            </div>
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar"></input>
        <a class="btn btn-danger" href="/codeReaders/index.php?id=<?= $user[0] ?>">Cancelar</a>
    </div>
</form>
<?php
require_once("C://xampp/htdocs/codeReaders/view/head/footer.php")
    ?>
