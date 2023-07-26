<?php 

  include('../config/Database.php'); 

    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $isbn = $_POST['isbn'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $query = "INSERT INTO codereaders(título, autor, descripción, ISBN, imagen) VALUES ('$title','$author','$description','$isbn','$image')";

    $result = $connection->query($query);

    if ($result == TRUE) {

      echo "Se ha creado el registro.";

    }else{

      echo "No se insertó";
    }

?>