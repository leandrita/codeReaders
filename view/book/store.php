<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("C://xampp/htdocs/codeReaders/controller/BookController.php");
require_once("C://xampp/htdocs/codeReaders//config/Database.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new db();
    $connection = $db->conection();
    if ($connection) {
        $obj = new controller();
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $descripcion = $_POST['descripcion'];
        $isbn = $_POST['isbn'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $query = "INSERT INTO codereaders(titulo, autor, descripcion, isbn, imagen) VALUES ('$titulo','$autor','$descripcion','$isbn','$imagen')";
        $result = $connection->query($query);
        if ($result == TRUE) {
            echo "Se ha creado el registro.";
        } else {
            echo "No se insertó";
        }
        $obj->guardar($titulo, $autor, $descripcion, $isbn, $imagen);
    } else {
        echo "Falló la conexión con la base de datos.";
    }
    header("Location: /codeReaders/index.php");
    exit();
}
?>