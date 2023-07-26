<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("/Applications/MAMP/htdocs/codeReaders/view/head/head.php");
require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$user = $obj->show($_GET['id']);
?>
<form action="update.php" method="post" autocomplete="off">
    <h2>Modificando registro</h2>
    <div class="mb-3 row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
            <input type="text" name="id" readonly class="form-control-plaintext" id="staticEmail"
                value="<?= $user[0] ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Nuevo título</label>
        <div class="col-sm-10">
            <input type="text" name="titulo" class="form-control" value="<?= $user[1] ?>" id="inputPassword">
        </div>
    </div>
    <div>
        <input type="submit" class="btn btn-success" value="Actualizar"></input>
        <a class="btn btn-danger" href="show.php?id=<?= $user[0] ?>">Cancelar</a>
    </div>
</form>
<?php
require_once("/Applications/MAMP/htdocs/codeReaders/view/head/footer.php")
    ?>