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
        echo $nombre;
        botonUsuario();
    }
    ?>
</body>

</html>