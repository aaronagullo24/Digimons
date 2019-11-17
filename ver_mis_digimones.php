<?php
include "funciones.php";

$nombre = "";
if (isset($_POST['Mis_digimones'])) {
    $nombre = $_POST['nombre'];
    botonUsuario($nombre);
    verDigimones($nombre);
}
