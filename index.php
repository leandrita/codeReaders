<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("/Applications/MAMP/htdocs/codeReaders/view/header/header.php");
require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");

$obj = new controller();
$rows = array();

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records = $obj->index($currentPage);

if (isset($_POST["buscar"])) {
    $con = new PDO("mysql:host=localhost;dbname=biblioteca", "root", "root");
    $str = $_POST["codereaders"];
    $sth = $con->prepare('SELECT * FROM codereaders WHERE titulo LIKE :search OR autor LIKE :search');
    $searchParam = '%' . $str . '%';
    $sth->bindParam(':search', $searchParam, PDO::PARAM_STR);
    $sth->setFetchMode(PDO::FETCH_OBJ);
    $sth->execute();
    $rows = $sth->fetchAll(PDO::FETCH_OBJ);
} else {
    $rows = $obj->index($currentPage);
}

?>
<div class="container mb-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Autor</th>
                <th scope="col">Imagen</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $key => $row) {
                if (!is_object($row)) {
                    $rows[$key] = (object) $row;
                }
            }
            ?>
            <?php if ($rows) : ?>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <th><?= htmlspecialchars($row->titulo) ?></th>
                <th><?= htmlspecialchars($row->autor) ?></th>
                <th class="tapa">
                    <img class="card-img-top" src="data:image;base64,<?= base64_encode($row->imagen) ?>">
                </th>
                <th class="d-flex flex-column">
                    <a href="/codeReaders/view/book/edit.php?id=<?= htmlspecialchars($row->id) ?>"
                        class="btn btn-primary">Editar</a>
                    <a class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal_<?= htmlspecialchars($row->id) ?>">Eliminar</a>
                    <a href="view/book/show.php?id=<?= htmlspecialchars($row->id) ?>" class="btn btn-info">+ Info</a>
                </th>

                <div class="modal fade" id="exampleModal_<?= htmlspecialchars($row->id) ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel_<?= htmlspecialchars($row->id) ?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Desea eliminar el registro?</h1>
                            </div>
                            <div class="modal-body">
                                Una vez eliminado no se podrá recuperar.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                                <a href="view/book/delete.php?id=<?= htmlspecialchars($row->id) ?>"
                                    class="btn btn-danger">Eliminar</a>
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

    <div class="d-flex justify-content-between align-items-center">
        <p class="m-0">Página actual: <?= $currentPage ?></p>

        <?php if ($currentPage > 1) : ?>
        <a href="?page=<?= ($currentPage - 1) ?>">Anterior</a>
        <?php endif; ?>
        <a href="?page=<?= ($currentPage + 1) ?>">Siguiente</a>
    </div>

    <?php
    require_once("/Applications/MAMP/htdocs/codeReaders/view/footer/footer.php");
    ?>