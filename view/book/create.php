<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("/Applications/MAMP/htdocs/codeReaders/view/head/head.php");

?>

<form action="/codeReaders/view/book/store.php" method="POST" autocomplete="off">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Título del libro</label>
        <input type="text" name="titulo" required class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="/codeReaders/index.php" class="btn btn-danger">Cancelar</a>
</form>

<?php
require_once("/Applications/MAMP/htdocs/codeReaders/view/head/footer.php");

?>