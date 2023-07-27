<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca PHP</title>
    <link rel="stylesheet" type="text/css" href="<?php echo dirname($_SERVER['PHP_SELF']); ?>/frontend/css/style.css">
</head>
<body>
    <header>
        <div>
            <img class="logo" src="frontend/assests/logo.png">
        </div>
        <nav class="nav-links">
            <a href="#">INICIO</a>
            <a href="#" onclick="abrirModal()">CREAR</a>
        </nav>
        <div class="search-bar">
            <input type="text" class="search-input" placeholder="Realice su búsqueda...">
            <button class="search-button">Buscar</button>
        </div>
    </header>
    <main>
        <table>
            <tr>
                <th>Título:</th>
                <th>Autor:</th>
                <th>Descripción:</th>
                <th>ISBN:</th>
            </tr>
             <?php
                $numLibros = 15;
                for ($i = 1; $i <= $numLibros; $i++) {
                    echo "<tr>";
                    echo "<td>Libro $i</td>";
                    echo "<td>Autor $i</td>";
                    echo "<td>Descripción:</td>";
                    echo "<td>ISBN: $i</td>";
                    echo "<td>";
                    echo "<button class='btn'>Editar</button>";
                    echo "<button class='btn-e'>Eliminar</button>";
                    echo "<button class='btn'>+Info</button>";
                    echo "</td>";
                    echo "</tr>";
                }
              ?>

        </table>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="cerrarModal()">&times;</span>
                <form action="controladores/registro.php" method="post">
                    <h2>CREAR LIBRO</h2>
                    <label for="titulo">Titulo:</label><br>
                    <input type="text" name="titulo" required><br>
                    <label for="autor">Autor:</label><br>
                    <input type="text" name="autor" required><br>
                    <label for="descripcion">Descripción:</label><br>
                    <textarea name="descripcion" required></textarea><br>
                    <label for="isbn">ISBN:</label><br>
                    <input type="text" name="isbn" required><br>
                    <label for="imagen">Imagen del libro (URL):</label><br>
                    <input type="url" name="imagen"><br>
                    <button type="submit" class="btn btn-danger btn-lg">Registrar</button>
                </form>
            </div>
        </div>
        </div>

        <script>

            function abrirModal() {
                document.getElementById("myModal").style.display = "block";
            }


            function cerrarModal() {
                document.getElementById("myModal").style.display = "none";
            }
        </script>
    </main>

    <footer>
        @2023 - Todos los derechos reservados - CodeReaders
    </footer>

    <script src="frontend/js/script.js"></script>
</body>
</html>
