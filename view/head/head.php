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
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="#">
                <img class="logo" src="resources/img/Logo.png" alt="Logo" width="150" height="150">
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
    <div class=" container-fluid">
        <div class="container mt-5">
            <form method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="codereaders" name="codereaders"
                        placeholder="Buscar por Título o Autor" aria-label="Buscar" aria-describedby="button-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="buscar" id="button-addon2">Buscar</button>
                    </div>
                </div>
            </form>

            <?php
            $con = new PDO("mysql:host=localhost;dbname=BibliotecaPHP", "root", "root");

            if (isset($_POST["buscar"])) {
                $str = $_POST["codereaders"];
                $sth = $con->prepare('SELECT * FROM codereaders WHERE titulo LIKE :search OR autor LIKE :search');
                $searchParam = '%' . $str . '%';
                $sth->bindParam(':search', $searchParam, PDO::PARAM_STR);
                $sth->setFetchMode(PDO::FETCH_OBJ);
                $sth->execute();
                $rows = $sth->fetchAll(PDO::FETCH_OBJ);

                if (count($rows) > 0) {
                    ?>
                    <div class="row">
                        <div class="col">
                            <br><br><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Título</th>
                                        <th scope="col">Autor</th>
                                        <th scope="col">Imagen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rows as $book): ?>
                                        <tr>
                                            <td>
                                                <?php echo $book->titulo; ?>
                                            </td>
                                            <td>
                                                <?php echo $book->autor; ?>
                                            </td>

                                            <td class="tapa">
                                                <img class="card-img-top"
                                                    src="data:image;base64,<?php echo base64_encode($book->imagen); ?>">
                                            </td>
                                            <td class="d-flex flex-column">
                                                <a href="/codeReaders/view/book/edit.php?id=<?= $book->id ?>"
                                                    class="btn btn-primary">Editar</a>
                                                <!-- Button trigger modal -->
                                                <a class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal_<?= $book->id ?>">Eliminar</a>
                                                <a href="view/book/show.php?id=<?= $book->id ?>" class="btn btn-info">+ Info</a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_<?= $book->id ?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Desea eliminar el
                                                            registro?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Una vez eliminado no se podrá recuperar el registro.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <a href="view/book/delete.php?id=<?= $book->id ?>"
                                                            class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                } else {
                    echo '<div class="row"><div class="col"><p>No se encontraron resultados</p></div></div>';
                }
            }
            ?>
        </div>