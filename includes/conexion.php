<?php
function conectar()
{
    global $con;
    $con = mysqli_connect("localhost", "root", "", "halloween");
    $ret = false;
    if (mysqli_connect_errno()) {
        printf("Fallo la conexion: %s\n", mysqli_connect_error());
    } else {
        $con->set_charset("utf8");
        $ret = true;
    }
    return $ret;
}

function desconectar()
{
}

