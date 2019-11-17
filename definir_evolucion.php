<html>

<body>
    <?php include "funciones.php";
    boton(); ?>
    <h1>Evolucion a nivel 2</h1>
    <form method='POST' action="<?= $_SERVER['PHP_SELF'] ?>">

        <select name="evolucion1">
            <?php
            $file = fopen("digimones.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
                list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;
                if ($nivel == 1) {
                    ?>
                    <option value="<?php echo $nombre ?>"><?php echo $nombre, "-", $tipo ?></option>
            <?php
                }
            }
            ?>
        </select>


        <select name="evolucion2">
            <?php
            $file = fopen("digimones.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
                list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;
                if ($nivel == 2) {
                    ?>
                    <option value="<?php echo $nombre ?>"><?php echo $nombre, "-", $tipo ?></option>

            <?php
                }
            }
            ?>
        </select>
        <input type='submit' value='Evolucionar' name='Evolucion'>
    </form>

    <?php
    if (isset($_POST['Evolucion'])) {
        $nombre1 = "";
        $nombre1 = $_POST['evolucion1'];
        $nombre2 = "";
        $nombre2 = $_POST['evolucion2'];
        $arrayDigimones = [];
        $arrayInicio = [];
        $file = fopen("digimones.txt", "a+");
        while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombre = $info[0];
            list(
                $arrayDigimones[$nombre]['nombre'], $arrayDigimones[$nombre]['ataque'], $arrayDigimones[$nombre]['defensa'], $arrayDigimones[$nombre]['tipo'], $arrayDigimones[$nombre]['nivel'], $arrayDigimones[$nombre]['evolucion']
            ) = $info;
        }



        if ($arrayDigimones[$nombre1]['tipo'] == $arrayDigimones[$nombre2]['tipo']) {

            $arrayDigimones[$nombre1]['evolucion'] = $nombre2;
            $file = fopen("digimones.txt", "w");
            foreach ($arrayDigimones as $linea) {
                fwrite($file, $linea['nombre'] . " ");
                fwrite($file, $linea['ataque'] . " ");
                fwrite($file, $linea['defensa'] . " ");
                fwrite($file, $linea['tipo'] . " ");
                fwrite($file, $linea['nivel'] . " ");
                fwrite($file, $linea['evolucion'] . "\n");
            }
            echo "el Digmons " . $arrayDigimones[$nombre1]['nombre'] . " evoluciona a " . $arrayDigimones[$nombre2]['nombre'];
        } else echo "El digimon debe ser del mismo tipo";

        fclose($file);
    }



    ?>
    <h1>Evolucion a nivel 3</h1>
    <form method='POST' action="<?= $_SERVER['PHP_SELF'] ?>">

        <select name="evolucion4">
            <?php
            $file = fopen("digimones.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
                list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;
                if ($nivel == 2) {
                    ?>
                    <option value="<?php echo $nombre ?>"><?php echo $nombre, "-", $tipo ?></option>
            <?php
                }
            }
            ?>
        </select>


        <select name="evolucion5">
            <?php
            $file = fopen("digimones.txt", "a+");
            while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\n")) {
                list($nombre, $Ataque, $defensa, $tipo, $nivel) = $info;
                if ($nivel == 3) {
                    ?>
                    <option value="<?php echo $nombre ?>"><?php echo $nombre, "-", $tipo ?></option>

            <?php
                }
            }
            ?>
        </select>
        <input type='submit' value='Evolucionar' name='Evolucion2'>
    </form>

    <?php
    if (isset($_POST['Evolucion2'])) {
        $nombre1 = "";
        $nombre1 = $_POST['evolucion4'];
        $nombre2 = "";
        $nombre2 = $_POST['evolucion5'];
        $arrayDigimones = [];
        $file = fopen("digimones.txt", "a+");
        while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombre = $info[0];
            list(
                $arrayDigimones[$nombre]['nombre'], $arrayDigimones[$nombre]['ataque'], $arrayDigimones[$nombre]['defensa'], $arrayDigimones[$nombre]['tipo'], $arrayDigimones[$nombre]['nivel'], $arrayDigimones[$nombre]['evolucion']
            ) = $info;
        }

        if ($arrayDigimones[$nombre1]['tipo'] == $arrayDigimones[$nombre2]['tipo']) {

            $arrayDigimones[$nombre1]['evolucion'] = $nombre2;
            $file = fopen("digimones.txt", "w");
            foreach ($arrayDigimones as $linea) {
                fwrite($file, $linea['nombre'] . " ");
                fwrite($file, $linea['ataque'] . " ");
                fwrite($file, $linea['defensa'] . " ");
                fwrite($file, $linea['tipo'] . " ");
                fwrite($file, $linea['nivel'] . " ");
                fwrite($file, $linea['evolucion'] . "\n");
            }
            echo "el Digmons " . $arrayDigimones[$nombre1]['nombre'] . " evoluciona a " . $arrayDigimones[$nombre2]['nombre'];
        } else echo "El digimon debe ser del mismo tipo para que pueda evolucionar";

        fclose($file);
    }

    ?>


</body>

</html>