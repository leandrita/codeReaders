<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("C://xampp/htdocs/codeReaders/view/head/head.php");
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$rows = $obj->index();
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
            <?php if ($rows): ?>
                <?php foreach ($rows as $row): ?>
                    <tr>
                        <th>
                            <?= $row[1] ?>
                        </th>
                        <th>
                            <?= $row[2] ?>
                        </th>
                        <th class="tapa">
                            <img class="card-img-top" src="data:image;base64,<?php echo base64_encode($row[4]); ?>">
                        </th>
                        <th class="d-flex flex-column">
                            <a href="/codeReaders/view/book/edit.php?id=<?= $row[0] ?>" class="btn btn-primary m-1">Editar</a>
                            <a class="btn btn-danger m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>
                            <a href="view/book/show.php?id=<?= $row[0] ?>" class="btn btn-info m-1">+ Info</a>
                        </th>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">¿Desea eliminar el registro?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
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
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">No hay registros</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <?php
    require_once("C://xampp/htdocs/codeReaders/view/head/footer.php");
    ?>