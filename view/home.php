<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca PHP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="view/css/style.css">
</head>
<body>
<header>
        <div class="container">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="#">
                    <img class="logo" src="../view/assests/logo.png" alt="Logo" width="150" height="150">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">INICIO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="abrirModal()">CREAR</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main>
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Título:</th>
                        <th>Autor:</th>
                        <th>Descripción:</th>
                        <th>ISBN:</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $numLibros = 15;
                    for ($i = 1; $i <= $numLibros; $i++) {
                        echo "<tr>";
                        echo "<td>Libro $i</td>";
                        echo "<td>Autor $i</td>";
                        echo "<td>Descripción:</td>";
                        echo "<td>ISBN: $i</td>";
                        echo "<td>";
                        echo "<button class='btn btn-primary'>Editar</button>";
                        echo "<button class='btn btn-danger'>Eliminar</button>";
                        echo "<button class='btn btn-info'>+Info</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div id="myModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">CREAR LIBRO</h2>
                <button type="button" class="close" onclick="cerrarModal()">&times;</button>
            </div>
            <div class="modal-body">
                <form action="controladores/registro.php" method="post">
                    <div class="form-group">
                        <label for="titulo">Titulo:</label>
                        <input type="text" class="form-control" name="titulo" required>
                    </div>
                    <div class="form-group">
                        <label for="autor">Autor:</label>
                        <input type="text" class="form-control" name="autor" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" class="form-control" name="isbn" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen del libro (URL):</label>
                        <input type="url" class="form-control" name="imagen">
                    </div>
                    <button type="submit" class="btn btn-danger btn-lg">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    </main>

    <footer>
        <div class="container">
            @2023 - Todos los derechos reservados - CodeReaders
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function abrirModal() {
            $("#myModal").modal("show");
        }

        function cerrarModal() {
            $("#myModal").modal("hide");
        }
    </script>
</body>
</html>
