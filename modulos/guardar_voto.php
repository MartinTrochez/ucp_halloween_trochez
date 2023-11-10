<?php
session_start();
include("../includes/conexion.php");
conectar();

// echo $_SERVER;

$sql = mysqli_query($con, "INSERT into votos (id_disfraz, id_usuario) values ({$_POST['id']},{$_SESSION['id']})");
if (!mysqli_error($con)) {
    echo "Voto emitido correctamente";
} else {
    echo "Error: no se puedo emitir el voto";
}
