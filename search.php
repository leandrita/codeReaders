<!DOCTYPE html>
<html lang="es">
<head>
    <title>Búsqueda</title>
    <!-- Aquí va el CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <form method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="search" name="search" placeholder="" aria-label="Buscar" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-primary" type="submit" name="buscar" id="button-addon2">Buscar</button>
            </div>
        </div>
    </form>

    <?php
    $con = new PDO("mysql:host=localhost;dbname=bibliotecaphp", "root", "");

    if (isset($_POST["buscar"])) {
        $str = $_POST["search"];
        $sth = $con->prepare('SELECT * FROM search WHERE Titulo = :titulo');
        $sth->bindParam(':titulo', $str, PDO::PARAM_STR);
        $sth->setFetchMode(PDO::FETCH_OBJ);
        $sth->execute();

        if ($row = $sth->fetch()) {
    ?>
            <div class="row">
                <div class="col">
                    <br><br><br>
                    <table class="table table-bordered">
                        <tr>
                            <th>Título</th>
                            <th>Autor</th>
                        </tr>
                        <tr>
                            <td><?php echo $row->titulo; ?></td>
                            <td><?php echo $row->autor; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
    <?php
        } else {
            echo '<div class="row"><div class="col"><p>Título no existe</p></div></div>';
        }
    }
    ?>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


