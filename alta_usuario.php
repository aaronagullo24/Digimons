<?php
include "funciones.php";
boton();
$nombre = "";
$contraseña = "";
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    Echo "entra;";
    $correcto = false;

     $fichero = fopen("usuarios.txt", "r");
    while (($linea = fgets($fichero)) && !$encontrado) {
        $linea = trim($linea);
        $posicion_espacio = strpos($linea, " ");
        $nombre = substrt($linea, 0, $posicion_espacio);

        $longitud_pass = strlen($linea) - ($posicion_espacio + 1);

        $contraseña = trim($contraseña);
        $contraseña = substr($linea, $posicion_espacio + 1, $longitud_pass);

        if ($nombre == $nombre && $contraseña == $contraseña) $encontrado = true;
    }
    fclose($fichero);

     if ($encontrado && !$error) {
        echo "El usuario ya existe";
    } else {
    $file = fopen("usuarios.txt", "a");
    fwrite($file, $nombre. PHP_EOL);
    fwrite($file, $contraseña . PHP_EOL);
    fclose($file);
}
}

?>
<html>

<head>
    <title>Administración</title>
</head>

<body>
    <form method='POST' action="<?= $_SERVER['PHP_SELF'] ?>">
        Introduce Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        Introduce contraseña: <input type="text" name="contraseña" id="contraseña" value="<?php echo $contraseña; ?>">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="dar de alta" name="ver" id="ver todo">
    </form>



</body>

</html>