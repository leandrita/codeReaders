<?php
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");

$obj = new controller();

$id = $_GET['id']; // Obtén el id del libro a actualizar

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$descripcion = $_POST['descripcion'];
$isbn = $_POST['isbn'];
$imagen = addslashes(file_get_contents($_FILES['image']['tmp_name']));

$obj->update($id, $titulo, $autor, $descripcion, $isbn, $imagen);
?>

