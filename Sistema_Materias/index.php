<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Materias</title>
    <link rel="stylesheet" href="styless.css">
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="index.php" method="post">
                <div>
                    <h1>Sistema Universitario</h1>
                    <h3>Regristro de materias</h3>
                    <label for="nombre">Nombre de la materia:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div>
                    <label for="profesor">Profesor:</label>
                    <input type="text" id="profesor" name="profesor" required>
                </div>
                <button type="submit" name="submit">Añadir Materia</button>
            </form>
        </div>

        <h1>Buscar Materias</h1>
        <div class="form-container">

            <form action="index.php" method="get">
                <div>
                    <label for="buscar">Buscar por nombre:</label>
                    <input type="text" id="buscar" name="buscar">
                </div>
                <button type="submit">Buscar</button>
            </form>
        </div>

        <?php

        require_once 'db.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $nombre = $_POST['nombre'];
            $profesor = $_POST['profesor'];
            agregarMateria($nombre, $profesor);
            echo "<p>Materia agregada exitosamente.</p>";
        }
        if (isset($_GET['buscar'])) {
            $nombre = $_GET['buscar'];
            $materias = buscarMaterias($nombre);
            if ($materias) {
                echo "<div class='resultados'>";
                echo "<h2>Resultados de la búsqueda:</h2>";
                echo "<ul>";
                foreach ($materias as $materia) {
                    echo "<li>ID: $materia->id, Nombre: $materia->nombre, Profesor: $materia->profesor</li>";
                }
                echo "</ul>";
                echo "</div>";
            } else {
                echo "<p>La materia que busca no se encontro.</p>";
            }
        }
        ?>
    </div>
</body>

</html>