<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("/Applications/MAMP/htdocs/codeReaders/view/head/head.php");
require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");

$obj = new controller();
$rows = array();

if (isset($_POST["buscar"])) {
    // Lógica de búsqueda
    $con = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "root");
    $str = $_POST["codereaders"];
    $sth = $con->prepare('SELECT * FROM codereaders WHERE titulo LIKE :search OR autor LIKE :search');
    $searchParam = '%' . $str . '%';
    $sth->bindParam(':search', $searchParam, PDO::PARAM_STR);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_OBJ);
} else {
    // Mostrar todos los registros si no se realiza una búsqueda
    $rows = $obj->index();
}

?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($rows) : ?>
                <?php foreach ($rows as $row) : ?>
                    <tr>
                        <th>
                            <?= $row->titulo ?? $row[1] ?>
                        </th>
                        <th>
                            <?= $row->autor ?? $row[2] ?>
                        </th>
                        <th class="tapa">
                            <img class="card-img-top" src="data:image;base64,<?php echo base64_encode($row->imagen ?? $row[4]); ?>">
                        </th>
                        <th class="d-flex flex-column">
                            <a href="/codeReaders/view/book/edit.php?id=<?= $row[0] ?>" class="btn btn-primary">Editar</a>
                            <!-- Button trigger modal -->
                            <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
                            <a href="view/book/show.php?id=<?= $row[0] ?>" class="btn btn-info">+ Info</a>
                        </th>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <a href="view/book/delete.php?id=<?= $row[0] ?>" class="btn btn-danger">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </th>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="3" class="text-center">No hay registros</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
    require_once("/Applications/MAMP/htdocs/codeReaders/view/head/footer.php");
    ?>