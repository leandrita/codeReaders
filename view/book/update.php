<?php
require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$obj->update($_POST['id'], $_POST['titulo']);
?>