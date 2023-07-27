<?php
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
$obj = new controller();
$obj->update($_POST['id'], $_POST['titulo']);
?>