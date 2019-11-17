<html>

<head>
    <title>Usuario</title>
</head>

<body>
    <?php
    include "funciones.php";
    $nombre = "";
   
    if (isset($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
        botonUsuario($nombre);
        echo $nombre;
    }
    ?>

</body>

</html>