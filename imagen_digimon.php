<?php
include "funciones.php";
boton();
$nombre = "";
$nombre = $_POST['nombre'];
if (isset($_POST['submit'])) { // comprobamos que se ha enviado el formulario

    $nombre = $_POST['nombre'];

    if ($_FILES['normal']['name'] != "") { // El campo foto contiene una imagen...

        $fichero = $_FILES["normal"]["type"];
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $ext = explode(".", $_FILES["normal"]["name"]);
        $extension = end($ext);
        if ((($_FILES["normal"]["type"] == "image/png")
                || ($_FILES["normal"]["type"] == "image/jpg")
                || ($_FILES["normal"]["type"] == "image/gif")
                || ($_FILES["normal"]["type"] == "image/jpeg"))
            && in_array($extension, $allowedExts)
        ) {

            $directorio = "digimones/" . $nombre . "/"; // directorio 

            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['normal']['tmp_name'], $directorio . "n.jpg");
           
        } else { // El archivo no es JPG/GIF/PNG

            echo "El archivo debe ser una imagen";
        }
    } else { // El campo foto NO contiene una imagen

        echo "erroe";
    }

    if ($_FILES['victoria']['name'] != "") { // El campo foto contiene una imagen...

        $fichero = $_FILES["victoria"]["type"];
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $ext = explode(".", $_FILES["normal"]["name"]);
        $extension = end($ext);
        if ((($_FILES["victoria"]["type"] == "image/png")
                || ($_FILES["victoria"]["type"] == "image/jpg")
                || ($_FILES["victoria"]["type"] == "image/gif")
                || ($_FILES["victoria"]["type"] == "image/jpeg"))
            && in_array($extension, $allowedExts)
        ) {
            $directorio = "digimones/" . $nombre . "/"; // directorio 

            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['victoria']['tmp_name'], $directorio . "v.jpg");
           
        } else { // El archivo no es JPG/GIF/PNG

            echo "El archivo debe ser una imagen";
        }
    } else { // El campo foto NO contiene una imagen

        echo "erroe";
    }

    if ($_FILES['derrota']['name'] != "") { // El campo foto contiene una imagen...
        // Primero, hay que validar que se trata de un JPG/GIF/PNG

        $fichero = $_FILES["derrota"]["type"];
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $ext = explode(".", $_FILES["normal"]["name"]);
        $extension = end($ext);
        if ((($_FILES["derrota"]["type"] == "image/png")
                || ($_FILES["derrota"]["type"] == "image/jpg")
                || ($_FILES["derrota"]["type"] == "image/gif")
                || ($_FILES["derrota"]["type"] == "image/jpeg"))
            && in_array($extension, $allowedExts)
        ) {
            $directorio = "digimones/" . $nombre . "/"; // directorio de tu elección

            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['derrota']['tmp_name'], $directorio . "d.jpg");
           
        } else { // El archivo no es JPG/GIF/PNG

            echo "El archivo debe ser una imagen";
        }
    } else { // El campo foto NO contiene una imagen

        echo "debe conteneer una imagen";
    }
    echo "la foto de " . $nombre . " a sido añadida con exito";
}


?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Imagen del digimon</legend>
        <legend>Seleccionar imagen normal</legend>
        <div><input type="file" name="normal" id="normal" /></div>
        <legend>Seleccionar imagen victoria</legend>
        <div><input type="file" name="victoria" id="victoria" /></div>
        <legend>Seleccionar imagen derrota</legend>
        <div><input type="file" name="derrota" id="derrota" /></div>
        <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
        <div style="margin-top: 10px;"><input type="submit" name="submit" />
    </fieldset>
</form>