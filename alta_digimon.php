<?php
include "funciones.php";
boton();
$nombre = "";
$ataque = "";
$defensa = "";
$tipo = "";
$nivel = "";
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $ataque = $_POST['ataque'];
    $defensa = $_POST['defensa'];
    $tipo = $_POST['tipo'];
    $nivel = $_POST['nivel'];

    $correcto = false;
    $encontrado = "";


    $fichero = fopen("digimones.txt", "a+");
    while (($linea = fgets($fichero)) && !$encontrado) {
        $linea = trim($linea);
        $posicion_espacio = strpos($linea, " ");
        $user = substr($linea, 0, $posicion_espacio);

        if ($nombre == $user) $encontrado = true;
    }
    fclose($fichero);

    if ($encontrado) {
        echo "El digimo ya existe";
    } else if (!is_numeric($ataque) || is_null($ataque) || $ataque < 1) {
        echo "El ataque debe ser un numero positivo";
    } else if (!is_numeric($defensa) || is_null($defensa) || $defensa < 1) {
        echo "La defensa debe ser un numero positivo";
    } else if (is_null($tipo)) {
        echo "debes elegir un tipo";
    } else if (is_null($nivel)) {
        echo "debes elegir un nivel";
    } else {
        $file = fopen("digimones.txt", "a+");
        fwrite($file, $nombre . " ");
        fwrite($file, $ataque . " ");
        fwrite($file, $defensa . " ");
        fwrite($file, $tipo . " ");
        fwrite($file, $nivel . "\n");
        mkdir("digimones/" . $nombre, 0777);

        fclose($file);
        echo "El digimon " . $nombre . " fue creado con exito";
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
        <select name="tipo">

            <option value="Vacuna">Vacuna</option>
            <option value="Virus">Virus</option>
            <option value="Animal">Animal</option>
            <option value="Planta">Planta</option>
            <option value="Elemento">Elemento</option>
        </select>
        <select name="nivel">

            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="dar de alta" name="ver" id="ver todo">
    </form>



</body>

</html>