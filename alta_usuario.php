<?php
include "funciones.php";
boton();
$nombre = "";
$contraseña = "";
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $contraseña = $_POST['contraseña'];

    $encontrado = "";


    $fichero = fopen("usuarios.txt", "a+");
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
        mkdir("Usuarios/" . $nombre, 0777);

        fclose($file);
        $directorio = "Usuarios/" . $nombre . "/";

        $file_digimon = fopen($directorio . "Digimons_usuarios.txt", "a+");
        $digimones = fopen("digimones.txt", "a+");
        while ($info = fscanf($digimones, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombreD = $info[0];
            list(
                $arrayDigimones[$nombreD]['nombre'], $arrayDigimones[$nombreD]['ataque'], $arrayDigimones[$nombreD]['defensa'], $arrayDigimones[$nombreD]['tipo'], $arrayDigimones[$nombreD]['nivel'], $arrayDigimones[$nombreD]['evolucion']
            ) = $info;
            if ($arrayDigimones[$nombreD]['nivel'] == 1) {
                var_dump($arrayDigimones);
                $digimonAleatorio = array_rand($arrayDigimones, 2);
               
            }
        }
     
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