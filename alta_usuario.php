
<?php
include "funciones.php";
boton();
$Nombre="";
$contraseña="";
if (isset($_POST['Nombre'])) {
    $Nombre = $_POST['Nombre'];
    $contraseña = $_POST['contraseña'];
   
    $correcto = false;

    $fichero = fopen("usuarios.txt", "r");
    while (($linea = fgets($fichero)) && !$encontrado) {
        $linea = trim($linea);
        $posicion_espacio = strpos($linea, " ");
        $nombre = substrt($linea, 0, $posicion_espacio);

        $longitud_pass = strlen($linea) - ($posicion_espacio + 1);

        $pass = trim($pass);
        $pass = substr($linea, $posicion_espacio + 1, $longitud_pass);

        if ($usu == $nombre && $contraseña == $contraseña) $encontrado = true;
    }
    fclose($fichero);

    if ($encontrado && !$error) {
        $file = fopen("usuarios.txt", "w");
        fwrite($file, $Nombre . PHP_EOL);

        fwrite($file,$contraseña . PHP_EOL);
        fclose($file);
    } else echo "USUARIO NO VALIDO";
}
?>
<html>

<head>
    <title>Administración</title>
</head>

<body>
    <form>
        Introduce Nombre: <input type="text" name="nombre" id="nombre" value="<?php echo $Nombre; ?>">
        Introduce contraseña: <input type="text" name="contraseña" id="contraseña" value="<?php echo $contraseña; ?>">
        <input name="cadena" type="hidden" value="<?php echo $cadena_datos; ?>">
        <input type="submit" value="dar de alta" name="ver" id="ver todo">
    </form>



</body>

</html>