<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("C://xampp/htdocs/codeReaders/view/head/head.php");
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$date = $obj->show($_GET['id']);
?>

<h2 class="text-center">Detalles del libro</h2>
<div class="pb-3">
    <a href="/codeReaders/index.php" class="btn btn-primary">Regresar</a>
    <a href="edit.php?id=<?= $date[0] ?>" class="btn btn-success">Editar</a>
    <!-- Button trigger modal -->
    <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</a>

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
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
                    <a href="delete.php?id=<?= $date[0] ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<table class="table container-fluid">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Título</th>
            <th scope="col">Autor</th>
            <th scope="col">Descripción</th>
            <th scope="col">ISBN</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td scope="col">
                <?= $date[0] ?>
            </td>
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
        </tr>
    </tbody>
</table>

<?php
require_once("/Applications/MAMP/htdocs/codeReaders/view/head/footer.php")
    ?>