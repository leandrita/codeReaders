<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("C://xampp/htdocs/codeReaders/view/head/head.php");

?>

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
        <input type="text" class="form-control" id="description" name="descripcin" placeholder="">
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
require_once("C://xampp/htdocs/codeReaders/view/head/footer.php");

?>