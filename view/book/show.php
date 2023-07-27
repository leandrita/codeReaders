<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$date = $obj->show($_GET['id']);
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
                        <a class="nav-link" href="create.php" onclick="abrirModal()">CREAR</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class=" container-fluid">
        <h2 class="text-center">Detalles del libro</h2>
        <div class="pb-3">
            <a href="/codeReaders/index.php" class="btn btn-primary">Regresar</a>
            <a href="edit.php?id=<?= $date[0] ?>" class="btn btn-primary">Editar</a>
            <!-- Button trigger modal -->
            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Desea eliminar el registro?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Una vez eliminado no se podrá recuperar el registro.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="delete.php?id=<?= $date[0] ?>" class="btn btn-danger">Eliminar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="table container-fluid">
            <thead>
                <tr>
                    <th scope="col">Título</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Imagen</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope=" col">
                        <?= $date[1] ?>
                    </td>
                    <td scope=" col">
                        <?= $date[2] ?>
                    </td>
                    <td scope=" col">
                        <?= $date[3] ?>
                    </td>
                    <td scope=" col">
                        <?= $date[5] ?>
                    </td>
                    <th scope=" col" class="tapa">
                        <img class="card-img-top" src="data:image;base64,<?php echo base64_encode($date[4]); ?>">
                    </th>
                </tr>
            </tbody>
        </table>

        <?php
        require_once("/Applications/MAMP/htdocs/codeReaders/view/head/footer.php")
            ?>