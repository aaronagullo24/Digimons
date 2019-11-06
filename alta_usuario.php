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
<?php
    include "funciones.php";
    boton();
    if (isset($_POST['Nombre'])) {
        $Nombre = $_POST['Nombre'];
        $contraseña = $_POST['contraseña'];

        


    $file = fopen("usuarios.txt", "w");

    fwrite($file, "Esto es una nueva linea de texto" . PHP_EOL);

    fwrite($file, "Otra más" . PHP_EOL);

    fclose($file);
    }
    ?>