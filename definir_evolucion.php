<html>

<body>
    <h1>evolucion a nivel 2</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <select id="evolucion1">
            <?php
            $file = fopen("digimones.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
                list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;
                if ($nivel == 1) {
                    ?>
                    <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
                    <input type="hidden" name="nombre1" id="nombre1" value="<?php echo $nombre; ?>">
            <?php
                }
            }
            ?>
        </select>


        <select id="evolucion2">
            <?php
            $file = fopen("digimones.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
                list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;
                if ($nivel == 2) {
                    ?>
                    <option value="<?php echo $nombre ?>"><?php echo $nombre ?></option>
                    <input type="hidden" name="nombre2" id="nombre2" value="<?php echo $nombre; ?>">
            <?php
                }
            }
            ?>
        </select>
        <input type='submit' value='Evolucionar'>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nombre1 = "";
        $nombre1 = $_POST['nombre1'];
        $nombre2 = "";
        $nombre2 = $_POST['nombre2'];
        while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            list($nombre, $Ataque, $defensa, $tipo, $nivel, $evolucion) = $info;
            if ($nombre1 == $nombre) {
                $file = fopen("digimones.txt", "a+");
                fwrite($file, $nombre . " ");
                fwrite($file, $ataque . " ");
                fwrite($file, $defensa . " ");
                fwrite($file, $tipo . " ");
                fwrite($file, $nivel . " ");
                fwrite($file, $nombre2 . "\n");
            }
        }
    }
    ?>


</body>

</html>