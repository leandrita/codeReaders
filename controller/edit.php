<?php 

  include('../config/Database.php'); 

    $id = $_REQUEST['id'];

    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];
    $isbn = $_POST['isbn'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $query = "UPDATE codereaders SET título='$title', autor='$author', descripción='$description', ISBN='$isbn', imagen='$image' WHERE id='$id'";

    $result = $connection->query($query);

    if ($result == TRUE) {

      header("Location: read.php");

    }else{

      echo "No se insertó";
    }

?>