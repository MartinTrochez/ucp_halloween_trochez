<?php

if (isset($_GET['salir'])) {
    session_destroy();
    echo "<script>window.location='index.php';</script>";
}

if (isset($_POST['nombre']) && isset($_POST['clave'])) {
    $sql = "SELECT * FROM usuarios WHERE nombre= '" . $_POST['nombre'] . "' AND clave='" . $_POST['clave'] . "'";
    $sql = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql) != 0) {
        $r = mysqli_fetch_array($sql);
        $_SESSION['id'] = $r['id'];
        $_SESSION['nombre_usuario'] = $r['nombre'];
        echo "<script> alert ('Bienvenido: " . $_SESSION['nombre_usuario'] . "');</script>";
    } else {
        echo "<script> alert('Verificar los datos.');</script>";
    }
    echo "<script>window.location='index.php?modulo=procesar_login';</script>";
}
?>

<section id="login" class="section">
    <h2>Iniciar Sesión</h2>
    <form action="index.php?modulo=procesar_login" method="POST">
        <label for="login-username">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="login-password">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
</section>
