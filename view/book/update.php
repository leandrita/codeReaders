<?php
require_once("/Applications/MAMP/htdocs/codeReaders/controller/BookController.php");

var_dump($_POST);

if (isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['autor']) && isset($_POST['descripcion']) && isset($_POST['isbn']) && isset($_POST['imagen'])) {
    // Obtén los valores del formulario.
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];
    $isbn = $_POST['isbn'];
    $imagen = $_POST['imagen'];

    var_dump($id, $titulo, $autor, $descripcion, $isbn, $imagen);
    // Crea el objeto del controlador y llama a la función update() con todos los argumentos necesarios.
    $obj = new controller();
    $result = $obj->update($id, $titulo, $autor, $descripcion, $isbn, $imagen);

    // Puedes hacer algo con el resultado si es necesario.
} else {
    // Manejar el caso en el que no se envíen todos los campos necesarios desde el formulario.
    // Puedes redirigir a una página de error o mostrar un mensaje al usuario, por ejemplo.
}
?>