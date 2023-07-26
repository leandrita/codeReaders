<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <!-- Here goes the Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form method="post">
        <div class="form-group">
            <label for="search">Search</label>
            <input type="text" class="form-control" id="search" name="search">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <?php
    $con = new PDO("mysql:host=localhost;dbname=new_biblioteca", "root", "");
    if (isset($_POST["submit"])) {
        $str = $_POST["search"];
        $sth = $con->prepare('SELECT * FROM search WHERE Titulo = :titulo');
        $sth->bindParam(':titulo', $str, PDO::PARAM_STR);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->execute();

        if ($row = $sth->fetch()) {
    ?>
            <br><br><br>
            <table class="table table-bordered">
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                </tr>
                <tr>
                    <td><?php echo $row->Titulo; ?></td>
                    <td><?php echo $row->autor; ?></td>
                </tr>
            </table>
    <?php
        } else {
            echo "Titulo no existe";
        }
    }
    ?>

</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
