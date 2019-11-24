<?php
include "funciones.php";
$nombre = "";
if (isset($_POST['Evolucionar'])) {
    $nombre = $_POST['nombre'];
    botonUsuario($nombre);

    $directorio = "Usuarios/" . $nombre . "/";
    $file_registro = fopen($directorio . "registro.txt", "a+");

    while ($info = fscanf($file_registro, "%s\t%s\t%s")) {
        $nombreR = $info[0];
        list(
            $arrayregistro['jugadas'], $arrayregistro['ganadas'], $arrayregistro['evolucion']
        ) = $info;
    }

    if ($arrayregistro['evolucion'] == 1) {
        $file = fopen("./Usuarios/$nombre/Digimons_usuarios.txt", "a+");
        while ($info = fscanf($file, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            list($nombreD, $Ataque, $defensa, $tipo, $nivel, $evolucion) = $info;
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <?php
                            echo ("<table style='HEIGHT:20%;WIDTH:20% ;display:inline-table'; border=1;");
                            echo ("<tr>");
                            echo "<td COLSPAN='2' align='center' valign='middle'><img src=./digimones/" . $nombreD . "/n.jpg heigth='100' width='100' ></td>";
                            echo ("<tr>");
                            echo ("<td>Nombre</td>");
                            echo "<td>" . $nombreD . "</td>";
                            echo ("<tr >");
                            echo ("<td>Ataque</td>");
                            echo "<td>" . $Ataque . "</td>";
                            echo ("<tr >");
                            echo ("<td>Defensa</td>");
                            echo "<td>" . $defensa . "</td>";
                            echo ("<tr >");
                            echo ("<td>Tipo</td>");
                            echo "<td>" . $tipo . "</td>";
                            echo ("<tr >");
                            echo ("<td>Nivel</td>");
                            echo "<td>" . $nivel . "</td>";
                            echo ("<tr >");
                            echo ("<td>Evolucion</td>");
                            echo "<td>" . $evolucion . "</td>";
                            echo "<tr>";
                            echo "<td>Elejir para tu equipo</td>";
                            echo "<td>"
                            ?>


                <input type="hidden" name="nombreD" id="nombreD" value="<?php echo $nombreD; ?>">
                <input type="hidden" name="nombre" id="nombre" value="<?php echo $nombre; ?>">
                <input type='submit' value='Evolucionar' name='Evolucion2'>

            <?php
                        echo ("</table>");
                    }
                    ?>

            </form>
    <?php
        } else echo "No tienes evoluciones disponibles";
    }

    $nombreD = "";
    if (isset($_POST['Evolucion2'])) {
        $nombre = $_POST['nombre'];
        $nombre_digimon = $_POST['nombreD'];
        botonUsuario($nombre);
        $directorio = "Usuarios/" . $nombre . "/";
        $file_digimon = fopen($directorio . "Digimons_usuarios.txt", "a+");

        //transformacion a array
        while ($info = fscanf($file_digimon, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombreD = $info[0];
            list(
                $arrayDigimones[$nombreD]['nombre'], $arrayDigimones[$nombreD]['ataque'], $arrayDigimones[$nombreD]['defensa'], $arrayDigimones[$nombreD]['tipo'], $arrayDigimones[$nombreD]['nivel'], $arrayDigimones[$nombreD]['evolucion']
            ) = $info;
        }

        
        $file_Todos = fopen( "digimones.txt", "a+");

        //transformacion a array
        while ($info = fscanf($file_Todos, "%s\t%s\t%s\t%s\t%s\t%s\n")) {
            $nombreT = $info[0];
            list(
                $arrayDigimonesTotal[$nombreT]['nombre'], $arrayDigimonesTotal[$nombreT]['ataque'], $arrayDigimonesTotal[$nombreT]['defensa'], $arrayDigimonesTotal[$nombreT]['tipo'], $arrayDigimonesTotal[$nombreT]['nivel'], $arrayDigimonesTotal[$nombreT]['evolucion']
            ) = $info;
        }
        var_dump($arrayDigimones);

        foreach($arrayDigimones as $caracteristica => $valor){
            if ($valor['nombre'] == $nombre_digimon){
                unset($arrayDigimones[$nombre_digimon]);
            }
        }
    }
    ?>