<?php
require "includes/conexion.php";
conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Concurso de disfraces de Halloween</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<nav>
    <ul>
        <li><a href="index.php">Index</a></li>
        <li><a href="index.php">Ver Disfraces</a></li>
        <li><a href="index.php?modulo=procesar_registro">Registro</a></li>
        <li><a href="index.php?modulo=procesar_login">Iniciar Sesión</a></li>
        <li><a href="index.php?modulo=procesar_disfraz">Panel de Administración</a></li>
    </ul>
</nav>
<header>
    <h1>Concurso de disfraces de Halloween</h1>
</header>
<main>
    <?php
    if (!empty($_GET['modulo'])) {
        include('modulos/' . $_GET['modulo'] . '.php');
    } else {
        $sql = "SELECT * FROM disfraces ORDER BY votos DESC";
        $sql = mysqli_query($con, $sql);
        if (mysqli_num_rows($sql) != 0) {
            while ($r = mysqli_fetch_array($sql)) {
                ?>
                <section id="disfraces-list" class="section">
                    <!-- Aquí se mostrarán los disfraces -->
                    <div class="disfraz">
                        <h2><?php echo $r['nombre']; ?></h2>
                        <p><<?php echo $r['descripcion'] ?>/p>
                        <p><img src="imagenes/<?php echo $r['foto']; ?>" width="100%"></p>
                        <p>Votos: <?php echo $r['votos'] ?></p>
                        <button>Votar</button>
                    </div>
                    <!-- Repite la estructura para más disfraces -->
                </section>
                <?php
            }
        } else {
            ?>
            <section id="disfraces-list" class="section">
                <!-- Aquí se mostrarán los disfraces -->
                <div class="disfraz">
                    <h2>No hay datos </h2>
                </div>
                <hr>
                <!-- Repite la estructura para más disfraces -->
            </section>
            <?php
        }
    }
    ?>
</main>
<script src="js/script.js"></script>
</body>
</html>
