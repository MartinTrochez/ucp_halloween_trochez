<?php
if (isset($_POST['nombre']) && $_POST['clave']) {

    $sql = "SELECT * FROM usuarios where nombre = '" . $_POST['nombre'] . "'";
    $sql = mysqli_query($con, $sql);
    if (mysqli_num_rows($sql) != 0) {
        echo "<script>alert('Error: el usuario ya existe en la BD.');</script>";
    } else {
        $sql = "INSERT INTO usuarios (nombre, clave) VALUES ('" . $_POST['nombre'] . "', '" . $_POST['clave'] . "')";
        $sql = mysqli_query($con, $sql);
        if (mysqli_error($con)) {
            echo "<script>alert('Error nose pudo insertar el registro');</script>";
        } else {
            echo "<script>alert('Registro insertado con exito');</script>";
        }
    }
    // limpio el POST
    echo "<script>windows.location='index.php?modulo=procesar_registro';";
}
?>

<section id="registro" class="section">
    <h2>Registro</h2>
    <form action="index.php?modulo=procesar_registro" method="POST">
        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="clave" name="clave" required>

        <button type="submit">Registrarse</button>
    </form>
</section>
