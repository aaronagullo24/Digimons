<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Seleccionar una imagen</legend>
        <div><input type="file" name="foto" /></div>
        <div style="margin-top: 10px;"><input type="submit" name="submit" />
            <a href="<?php echo $_SERVER['PHP_SELF']; ?>">Reiniciar</a></div>
    </fieldset>
</form>

<?php
if (isset($_POST['submit'])) { // comprobamos que se ha enviado el formulario

    // comprobar que han seleccionado una foto
    if ($_FILES['foto']['name'] != "") { // El campo foto contiene una imagen...

        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");
        $extension = end(explode(".", $_FILES["foto"]["name"]));
        if ((($_FILES["foto"]["type"] == "image/gif")
                || ($_FILES["foto"]["type"] == "image/jpeg")
                || ($_FILES["foto"]["type"] == "image/png")
                || ($_FILES["foto"]["type"] == "image/pjpeg"))
            && in_array($extension, $allowedExts)
        ) {
            // el archivo es un JPG/GIF/PNG, entonces...

            //$extension = end(explode('.', $_FILES['foto']['name']));
            $foto = $nombre . "." . $extension;
            $directorio = dirname("digimones/" . $nombre); // directorio de tu elección

            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['foto']['tmp_name'], $directorio);
            $minFoto = 'min_' . $foto;
            $resFoto = 'res_' . $foto;
            resizeImagen($directorio . '/', $foto, 65, 65, $minFoto, $extension);
            resizeImagen($directorio . '/', $foto, 500, 500, $resFoto, $extension);
            unlink($directorio . '/' . $foto);
        } else { // El archivo no es JPG/GIF/PNG
            $malformato = $_FILES["foto"]["type"];
            header("Location: cargarImagen.php?error=noFormato&formato=$malformato");
            exit;
        }
    } else { // El campo foto NO contiene una imagen
        header("Location: cargarImagen.php?error=noImagen");
        exit;
    }
} // fin del submit

?>