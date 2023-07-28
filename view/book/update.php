<?php
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");


var_dump($_POST);
var_dump($id, $titulo, $autor, $descripcion, $isbn);

$obj = new controller();
$obj->update($_POST['id'], $_POST['titulo'], $_POST['autor'], $_POST['descripcion'], $_POST['isbn']);

?>