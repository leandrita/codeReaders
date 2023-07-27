<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../resources/css/form.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <?php

    include('../config/Database.php');
    $id = $_REQUEST['id'];

    $query = "SELECT * FROM codereaders WHERE id='$id'";
    $result = $connection->query($query);
    $row = $result->fetch_assoc();
    ?>
    
    <form action="../controller/edit.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
    <div>
        <label for="title">Título</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="" value="<?php echo $row['título']; ?>">
    </div>
    <div class="form-group">
        <label for="author">Autor</label>
        <input type="text" class="form-control" id="author" name="author" placeholder="" value="<?php echo $row['autor']; ?>">
    </div>
    <div class="form-group">
        <label for="description">Descripción</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="" value="<?php echo $row['descripción']; ?>">
    </div>
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" id="isbn" name="isbn" aria-describedby="isbnHelp" placeholder="" value="<?php echo $row['ISBN']; ?>">
        <small id="isbnHelp" class="form-text text-muted">Introduce únicamente números.</small>
</div>
    <div class="form-group">
        <!-- <label for="image">Sube una imagen:</label> -->
        <img class="card-img-top" src="data:image;base64,<?php echo base64_encode($row['imagen']); ?>">
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>