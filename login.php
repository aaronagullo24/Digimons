<?php
$nombre = ""; //usuario
$contraseña = "";

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $contraseña = $_GET['contraseña'];
    $encontrado = false;


    $fichero = fopen("usuarios.txt", "r");
    while (($linea = fscanf($fichero, "%s %s")) && !$encontrado) {
        if ($linea[0] == $nombre && $linea[1] == $contraseña) $encontrado = true;
    }
    fclose($fichero);

    if ($encontrado) {
        echo "correcto";
        header('location:inicio_usuario.php?nombre=' . $nombre);
    } else {
        echo "USUARIO NO VALIDO";
    }
}


?>

<form method='GET' action="<?= $_SERVER['PHP_SELF'] ?>">

    Nombre: <input type='text' name='nombre' id='nombre' value="<?= $nombre ?>"><br>

    Contraseña: <input type='password' name='contraseña' id='contraseña' value="<?= $contraseña ?>"><br>

    <input type='submit' value="enviar" name="Enviar" id="Enviar">

</form>