<?php
include "funciones.php";
boton();
$nombre = "";
$contraseña = "";
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];
    echo "entra;";
    $correcto = false;
    $encontrado = "";
    $pass = "";

    $fichero = fopen("usuarios.txt", "r");
    while (($linea = fgets($fichero)) && !$encontrado) {
        $linea = trim($linea);
        $posicion_espacio = strpos($linea, " ");
        $user = substr($linea, 0, $posicion_espacio);

        if ($nombre == $user) $encontrado = true;
    }
    fclose($fichero);

    if ($encontrado) {
        echo "El usuario ya existe";
    } else {
        $file = fopen("usuarios.txt", "a+");
        fwrite($file, $nombre . " ");
        fwrite($file, $contraseña . "\n");
        mkdir($nombre, 0777);

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
        Introduce Ataque: <input type="text" name="ataque" id="ataque" value="<?php echo $ataque; ?>">
        Introduce Defensa: <input type="text" name="defensa" id="defensa" value="<?php echo $defensa; ?>">
        <select name="seccion">
                <option value="Vacuna">Vacuna</option>
                <option value="Virus">Virus</option>
                <option value="Animal">Animal</option>
                <option value="Planta">Planta</option>
                <option value="Elemento">Elemento</option>
            </select>
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="dar de alta" name="ver" id="ver todo">
    </form>



</body>

</html>